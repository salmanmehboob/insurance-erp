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
use Illuminate\Support\Str;
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
        $title = 'Agents';
        $agents = Agent::with(['state', 'bank', 'user.permissions', 'agencies.locations'])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($agent) {
                $assignedLocations = [];
                foreach ($agent->agencies as $agency) {
                    $location = $agency->locations;
                          $assignedLocations[] = $location->agency_name;

                }
                // Remove duplicates and convert to a string
                $agent->assignedLocations = implode(', ', array_unique($assignedLocations));
                return $agent;
            });

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
//        dd($request->all());
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
            'commission_fee' => 'nullable|string',
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

            $roleName = $data['name']; // If you need just the first name as a string

            $agentRole = Role::create(['name' => $roleName]);

            // Create the user associated with this agent
            $user = User::create([
                'email' => $data['email'],
                'name' => $data['username'],
                'password' => ($data['password']),  // Encrypt password
                'role' => '$roleName',  // Assuming a role 'agent'
            ]);


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
                'commission_fee' => str_replace(['$', ' '], '', $data['commission_fee'] )?? null,
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
        $allAgencies = Agency::all(); // Assuming `Agency` model for locations

        // Collect assigned agency IDs
        $assignedLocationIds = $agent->agencies->pluck('agency_id')->toArray();

//        dd($assignedLocationIds);
        return view('admin.agent.edit', compact(
            'title',
            'agent',
            'states',
            'banks',
            'permissions',
            'allAgencies',
            'assignedLocationIds'
        ));
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
            'commission_fee' => 'nullable|string',
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

            $agentRole = $agent->user->roles[0];


            // Update role name if the name changes
            if ($data['name'] !== $agentRole->name) {
                $roleName = $data['name']; // Use the updated name as the new role name
                $agentRole = $agent->user->roles[0]; // Get the current role
                $role = Role::find($agentRole->id);
                $role->name = $roleName; // Update the role name
                $role->save(); // Save the updated role
            }


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
                'commission_fee' => str_replace(['$', ' '], '', $data['commission_fee'] )?? null,
            ]);


            $role = Role::find($agentRole->id);

            // Update permissions
            if ($request->has('permissions')) {
                $validPermissionIds = Permission::whereIn('id', $data['permissions'])->pluck('id')->toArray();
                 $role->syncPermissions($validPermissionIds);
            }else{
                $role->syncPermissions([]);

            }
// Update location associations (agent_agencies)
            if (!empty($data['selected_location_ids']) && is_array($data['selected_location_ids'])) {
                $locationIds = array_filter(
                    array_map('intval', explode(',', trim($data['selected_location_ids'][0], ','))),
                    fn($id) => $id > 0 // Ensure only valid positive integers
                );

                if (!empty($locationIds)) {
                    // Remove unselected agencies
                    $agent->agencies()->whereNotIn('agency_id', $locationIds)->delete();

                    // Add or update selected agencies
                    foreach ($locationIds as $locationId) {
                        $agent->agencies()->updateOrCreate(
                            ['agency_id' => $locationId],
                            ['agent_id' => $agent->id]
                        );
                    }
                } else {
                    // No valid IDs, detach all
                    $agent->agencies()->delete();
                }
            } else {
                // No IDs provided, detach all
                $agent->agencies()->delete();
            }


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


    public function trashed()
    {
        $title = 'Trashed Agents';
        $agents = Agent::onlyTrashed()
            ->with(['state', 'bank', 'user.permissions', 'agencies.locations'])
            ->orderBy('deleted_at', 'DESC')
            ->get()
            ->map(function ($agent) {
                $assignedLocations = [];
                foreach ($agent->agencies as $agency) {
                    $location = $agency->locations;
                    $assignedLocations[] = $location->agency_name;
                }
                $agent->assignedLocations = implode(', ', array_unique($assignedLocations));
                return $agent;
            });

        return view('admin.agent.trashed', compact('title', 'agents'));
    }

    public function restore($id)
    {
        $agent = Agent::onlyTrashed()->findOrFail($id);
        $agent->restore();

        return redirect()->route('trashed-agents')->with('success', 'Agent restored successfully.');
    }

    public function forceDelete($id)
    {
        $agent = Agent::onlyTrashed()->findOrFail($id);
        $agent->forceDelete();

        return redirect()->route('trashed-agents')->with('success', 'Agent permanently deleted.');
    }

}
