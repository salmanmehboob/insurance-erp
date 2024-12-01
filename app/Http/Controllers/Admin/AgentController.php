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
        $agents = Agent::with(['state', 'bank', 'user.permissions', 'agencies.locations'])->orderBy('created_at', 'DESC')->get();
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
        $agent = Agent::with(['agencies.locations', 'user.permissions'])->find($id);

        if (!$agent) {
            return redirect()->route('show-agent')->with('error', 'Agent not found.');
        }

        $title = 'Edit Agent';
        $states = UsState::all();
        $banks = BankAccount::all();
        $permissions = Permission::where('module', 4)->get(); // Module 4 Permissions
        $agencies = Agency::all(); // Assuming `Agency` model for locations

//        dd($agent->agencies);
        return view('admin.agent.edit', compact('title', 'agent', 'states', 'banks', 'permissions', 'agencies'));
    }


    /**
     * Update an existing agent in the database.
     */
    public function update(Request $request, $id)
    {
        $agent = Agent::with('user', 'agencies')->find($id);

        if (!$agent) {
            return redirect()->route('show-agent')->with('error', 'Agent not found.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone_no' => 'required|string',
            'notes' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $agent->user->id,
            'username' => 'required|string|max:255',
            'password' => 'nullable|string|min:8', // Only update if provided
            'commission_in_percentage' => 'nullable|numeric',
            'commission_fee' => 'nullable|numeric',
            'selected_location_ids' => 'nullable|array',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Validated data
            $data = $validator->validated();

            // Update user details
            $updateData = [
                'email' => $data['email'],
                'name' => $data['username'],
            ];

            // Only update the password if provided
            if (!empty($data['password'])) {
                $updateData['password'] = ($data['password']); // Hash the password before saving
            }

            $agent->user->update($updateData);


            // Update agent details
            $agent->update([
                'name' => $data['name'],
                'address' => $data['address'],
                'city' => $data['city'],
                'state_id' => $data['state_id'],
                'zip_code' => $data['zip_code'],
                'phone_no' => $data['phone_no'],
                'email' => $data['email'],
                'note' => $data['notes'],
                'commission_in_percentage' => $data['commission_in_percentage'] ?? null,
                'commission_fee' => $data['commission_fee'] ?? null,
            ]);

            // Update permissions
            if ($request->has('permissions')) {
                $allPermissions = Permission::whereIn('id', $data['permissions'])->get();
                $agent->user->syncPermissions($allPermissions);
            }
//            dd($agent);
            // Update location associations (agent_agencies)
            if (!empty($data['selected_location_ids'])) {
                $locationIds = array_map('intval', explode(',', trim($data['selected_location_ids'][0], ',')));
                $agent->agencies()->whereNotIn('agency_id', $locationIds)->delete(); // Remove unselected
                foreach ($locationIds as $locationId) {
                    $agent->agencies()->updateOrCreate(
                        ['agency_id' => $locationId],
                        ['agent_id' => $agent->id]
                    );
                }
            } else {
                $agent->agencies()->delete(); // Remove all if none provided
            }

//            dd($agent);

            DB::commit();
            return redirect()->route('show-agent')->with('success', 'Agent and User updated successfully.');
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
