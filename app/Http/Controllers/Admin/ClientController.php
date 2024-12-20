<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\Client;
 use App\Models\BankAccount;
use App\Models\EducationLevel;
use App\Models\EmailStatus;
use App\Models\Gender;
use App\Models\InsuranceCompany;
use App\Models\MaritalStatus;
use App\Models\Permission;
use App\Models\PolicyStatus;
use App\Models\PolicyType;
use App\Models\PrimaryLanguage;
use App\Models\Relationship;
use App\Models\Term;
use App\Models\User;
use App\Models\UsState;
use App\Models\Year;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-client'])->only(['index', 'show']);
        $this->middleware(['permission:create-client'])->only(['create', 'store']);
        $this->middleware(['permission:edit-client'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-client'])->only('destroy');
    }

    /**
     * Display a listing of the clients.
     */
    public function index()
    {
        $title = 'Clients';
        $clients = Client::with(['state', 'bank', 'user.permissions', 'agencies.locations'])
            ->orderBy('created_at', 'DESC')
            ->get()
            ->map(function ($client) {
                $assignedLocations = [];
                foreach ($client->agencies as $agency) {
                    $location = $agency->locations;
                          $assignedLocations[] = $location->agency_name;

                }
                // Remove duplicates and convert to a string
                $client->assignedLocations = implode(', ', array_unique($assignedLocations));
                return $client;
            });

        return view('admin.client.index', compact('title', 'clients'));
    }


    public function showPolicyType()
    {
        $title = 'Create a New Policy';
        $types = PolicyType::all();
        return view('admin.client.type', compact('title', 'types'));
    }
    /**
     * Show the form for creating a new client.
     */
    public function create(Request $request)
    {
        $title = 'Add Client';
        $states = UsState::all();
        $emailStatues = EmailStatus::all();
        $languages = PrimaryLanguage::all();
        $policyStatuses = PolicyStatus::all();
        $terms = Term::all();
        $insuranceCompanies = InsuranceCompany::all();
        $agents = Agent::all();
        $locations = Agency::all();
        $genders = Gender::all();
        $maritalStatus = MaritalStatus::all();
        $relationships = Relationship::all();
        $educationLevels = EducationLevel::all();

        $policyType = PolicyType::find($request->policy_type_id);
        return view('admin.client.create', compact('title',
            'policyType' ,'states' ,'emailStatues' , 'languages' ,
            'policyStatuses','terms','insuranceCompanies','agents' ,'locations','genders','maritalStatus','relationships','educationLevels'));
    }

    /**
     * Store a newly created client in the database.
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
            // Client data
            $data = $validator->validated();

            $roleName = $data['name']; // If you need just the first name as a string

            $clientRole = Role::create(['name' => $roleName]);

            // Create the user associated with this client
            $user = User::create([
                'email' => $data['email'],
                'name' => $data['username'],
                'password' => ($data['password']),  // Encrypt password
                'role' => '$roleName',  // Assuming a role 'client'
            ]);


            // If permissions are provided in the form
            if ($request->has('permissions')) {
                // Get the permissions based on the IDs provided in the form
                $allPermissions = Permission::whereIn('id', $request->permissions)->get();

                // Assign the 'Super Admin' role to the user
                $user->assignRole($clientRole);

                // Assign the selected permissions to the 'Super Admin' role
                $clientRole->givePermissionTo($allPermissions);
            }


            // Create the client record
            $client = Client::create([
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

//            dd($client);

            // Handling selected location associations (client_agencies)
            if (!empty($data['selected_location_ids'])) {
                $locationIds = array_map('intval', explode(',', trim($data['selected_location_ids'][0], ',')));

                foreach ($locationIds as $locationId) {
                    // Add location to client_agencies (assumes you have a pivot table named client_agencies)
                    ClientAgency::create([
                        'client_id' => $client->id,
                        'agency_id' => $locationId, // Assuming agency_id is the foreign key
                    ]);
                }
            }

            DB::commit();
            return redirect()->route('show-client')->with('success', 'Client and User created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for editing an client.
     */
    public function edit($id)
    {
        $client = Client::with(['agencies.locations', 'user.permissions'])->find($id);

        if (!$client) {
            return redirect()->route('show-client')->with('error', 'Client not found.');
        }

        $title = 'Edit Client';
        $states = UsState::all();
        $banks = BankAccount::all();
        $permissions = Permission::where('module', 4)->get(); // Module 4 Permissions
        $allAgencies = Agency::all(); // Assuming `Agency` model for locations

        // Collect assigned agency IDs
        $assignedLocationIds = $client->agencies->pluck('agency_id')->toArray();

//        dd($assignedLocationIds);
        return view('admin.client.edit', compact(
            'title',
            'client',
            'states',
            'banks',
            'permissions',
            'allAgencies',
            'assignedLocationIds'
        ));
    }


    /**
     * Update an existing client in the database.
     */
    public function update(Request $request, $id)
    {
        $client = Client::with('user', 'agencies')->find($id);

        if (!$client) {
            return redirect()->route('show-client')->with('error', 'Client not found.');
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'required|string|max:255',
            'state_id' => 'required|exists:us_states,id',
            'zip_code' => 'nullable|string|max:10',
            'phone_no' => 'required|string',
            'notes' => 'required|string',
            'email' => 'required|string|email|max:255|unique:users,email,' . $client->user->id,
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

            $client->user->update($updateData);

            $clientRole = $client->user->roles[0];


            // Update role name if the name changes
            if ($data['name'] !== $clientRole->name) {
                $roleName = $data['name']; // Use the updated name as the new role name
                $clientRole = $client->user->roles[0]; // Get the current role
                $role = Role::find($clientRole->id);
                $role->name = $roleName; // Update the role name
                $role->save(); // Save the updated role
            }


            // Update client details
            $client->update([
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


            $role = Role::find($clientRole->id);

            // Update permissions
            if ($request->has('permissions')) {
                $validPermissionIds = Permission::whereIn('id', $data['permissions'])->pluck('id')->toArray();
                 $role->syncPermissions($validPermissionIds);
            }else{
                $role->syncPermissions([]);

            }
// Update location associations (client_agencies)
            if (!empty($data['selected_location_ids']) && is_array($data['selected_location_ids'])) {
                $locationIds = array_filter(
                    array_map('intval', explode(',', trim($data['selected_location_ids'][0], ','))),
                    fn($id) => $id > 0 // Ensure only valid positive integers
                );

                if (!empty($locationIds)) {
                    // Remove unselected agencies
                    $client->agencies()->whereNotIn('agency_id', $locationIds)->delete();

                    // Add or update selected agencies
                    foreach ($locationIds as $locationId) {
                        $client->agencies()->updateOrCreate(
                            ['agency_id' => $locationId],
                            ['client_id' => $client->id]
                        );
                    }
                } else {
                    // No valid IDs, detach all
                    $client->agencies()->delete();
                }
            } else {
                // No IDs provided, detach all
                $client->agencies()->delete();
            }


            DB::commit();
            return redirect()->route('show-client')->with('success', 'Client and User updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }

    /**
     * Delete an client.
     */
    public function destroy(Request $request)
    {

        $client = Client::find($request->id);

        if (!$client) {
            return response()->json(['error' => 'Client not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the client
            $client->delete();
            DB::commit();

            return response()->json(['success' => 'Client deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function trashed()
    {
        $title = 'Trashed Clients';
        $clients = Client::onlyTrashed()
            ->with(['state', 'bank', 'user.permissions', 'agencies.locations'])
            ->orderBy('deleted_at', 'DESC')
            ->get()
            ->map(function ($client) {
                $assignedLocations = [];
                foreach ($client->agencies as $agency) {
                    $location = $agency->locations;
                    $assignedLocations[] = $location->agency_name;
                }
                $client->assignedLocations = implode(', ', array_unique($assignedLocations));
                return $client;
            });

        return view('admin.client.trashed', compact('title', 'clients'));
    }

    public function restore($id)
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->restore();

        return redirect()->route('trashed-clients')->with('success', 'Client restored successfully.');
    }

    public function forceDelete($id)
    {
        $client = Client::onlyTrashed()->findOrFail($id);
        $client->forceDelete();

        return redirect()->route('trashed-clients')->with('success', 'Client permanently deleted.');
    }

}
