<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\AgentAgency;
use App\Models\BankAccount;
use App\Models\Permission;
use App\Models\User;
use App\Models\UsState;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class AgentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-agent'])->only(['index', 'show']);
        $this->middleware(['permission:create-agent'])->only(['create', 'store']);
        $this->middleware(['permission:edit-agent'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-agent'])->only('destroy');
    }

    /**
     * Display a listing of the agents.
     */
    public function index()
    {
        $agents = Agent::with('state', 'bank')->orderBy('created_at', 'DESC')->get();
        $title = 'Agents';
        return view('admin.agent.index', compact('title', 'agents'));
    }

    /**
     * Show the form for creating a new agent.
     */
    public function create()
    {
        $title = 'Add Agent';
        $states = UsState::all();
        $banks = BankAccount::all();
        $agencies = Agency::all();
        $permissions = Permission::where('module', 4)->get();
        return view('admin.agent.create', compact('title', 'states', 'banks', 'agencies', 'permissions'));
    }

    /**
     * Store a newly created agent in the database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone_no' => 'required|string',
            'notes' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email',
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'bank_id' => 'nullable|exists:bank_accounts,id',
            'commission_in_percentage' => 'nullable|numeric',
            'commission_fee' => 'nullable|numeric',
            'selected_location_ids' => 'nullable|array',
            'selected_location_names' => 'nullable|array',
            'permissions' => 'nullable|array',  // ensure permissions are passed as an array
            'permissions.*' => 'exists:permissions,id', // make sure each permission ID is valid
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Agent data
            $data = $validator->validated();

            // Create the user associated with this agent
            $user = User::create([
                'email' => $data['email'],
                'name' => $data['username'],
                'password' => ($data['password']),  // Encrypt password
                'role' => 'agent',  // Assuming a role 'agent'
            ]);

            // Get the 'Super Admin' role
            $agentRole = Role::where('name', 'Agent')->first();

            // If permissions are provided in the form
            if ($request->has('permissions')) {
                // Get the permissions based on the IDs provided in the form
                $allPermissions = Permission::whereIn('id', $request->permissions)->get();

                // Assign the 'Super Admin' role to the user
                $user->assignRole($agentRole);

                // Assign the selected permissions to the 'Super Admin' role
                $agentRole->givePermissionTo($allPermissions);
            }


            // Create the agent record
            $agent = Agent::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state_id' => $data['state_id'],
                'zip_code' => $data['zip_code'],
                'phone_no' => $data['phone_no'],
                'email' => $data['email'],
                'note' => $data['notes'],
                'bank_id' => $data['bank_id'] ?? null,
                'commission_in_percentage' => $data['commission_in_percentage'] ?? null,
                'commission_fee' => $data['commission_fee'] ?? null,
            ]);

//            dd($agent);

            // Handling selected location associations (agent_agencies)
            if (!empty($data['selected_location_ids'])) {
                $locationIds = array_map('intval', explode(',', trim($data['selected_location_ids'][0], ',')));

                foreach ($locationIds as $locationId) {
                    // Add location to agent_agencies (assumes you have a pivot table named agent_agencies)
                    AgentAgency::create([
                        'agent_id' => $agent->id,
                        'agency_id' => $locationId, // Assuming agency_id is the foreign key
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('show-agent')->with('success', 'Agent and User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing an agent.
     */
    public function edit($id)
    {
        $agent = Agent::find($id);

        if (!$agent) {
            return redirect()->route('show-agent')->with('error', 'Agent not found.');
        }

        $title = 'Edit Agent';
        $states = UsState::all();
        $banks = BankAccount::all();
        return view('admin.agent.edit', compact('title', 'agent', 'states', 'banks'));
    }

    /**
     * Update an existing agent in the database.
     */
    public function update(Request $request, $id)
    {
        $agent = Agent::find($id);

        if (!$agent) {
            return redirect()->route('show-agent')->with('error', 'Agent not found.');
        }

        $validator = Validator::make($request->all(), [
            'agent_name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone' => 'required|string|max:15',
            'secondary_phone' => 'nullable|string|max:15',
            'fax' => 'nullable|string|max:15',
            'account_number' => 'nullable|string|max:255',
            'bank_id' => 'nullable|exists:bank_accounts,id',
            'custom_message' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            $data = $validator->validated();

            // Handle logo upload
            if ($request->hasFile('logo')) {
                // Delete old logo if exists
                if ($agent->logo && \Storage::exists('public/' . $agent->logo)) {
                    \Storage::delete('public/' . $agent->logo);
                }

                $logoPath = $request->file('logo')->store('logos', 'public');
                $data['logo'] = $logoPath;
            }

            $agent->update($data);

            DB::commit();
            return redirect()->route('show-agent')->with('success', 'Agent updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Delete an agent.
     */
    public function destroy(Request $request)
    {

        $agent = Agent::find($request->id);

        if (!$agent) {
            return response()->json(['error' => 'Agent not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the agent
            $agent->delete();
            DB::commit();

            return response()->json(['success' => 'Agent deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }
}
