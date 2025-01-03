<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\Client;
use App\Models\BankAccount;
use App\Models\ClientCoverage;
use App\Models\ClientDriver;
use App\Models\ClientNotes;
use App\Models\ClientPayment;
use App\Models\ClientPolicy;
use App\Models\ClientVehicle;
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
use App\Models\VehicleMake;
use App\Models\VehicleModel;
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
        $years = Year::orderBy('year', 'asc')->get();
        $vehicleMakes = VehicleMake::all();
        $vehicleModels = VehicleModel::all();

        $policyType = PolicyType::find($request->policy_type_id);

        return view('admin.client.create', compact('title',
            'policyType', 'states', 'emailStatues', 'languages',
            'policyStatuses', 'terms', 'insuranceCompanies', 'agents', 'locations',
            'genders', 'maritalStatus', 'relationships', 'educationLevels', 'years',
            'vehicleMakes', 'vehicleModels'));
    }

    /**
     * Store a newly created client in the database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'policy_type_id' => 'required',
            'applicant_name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state_id' => 'required',
            'zip_code' => 'required',
            'email' => 'required',
            'email_status_id' => 'required',
            'anniversary' => 'required',
            'primary_language_id' => 'required',
            'home_phone_no' => 'required',
            'cell_phone_no' => 'required',
            'work_phone_no' => 'required',
            'fax_phone_no' => 'required',
            'policy_status_id' => 'required',
            'effective_date' => 'required',
            'term_id' => 'required',
            'expiration_date' => 'required',
            'file_number' => 'required',
            'sold_date' => 'required',
            'policy_number' => 'required',
            'insurance_company_id' => 'required',
            'agent_id' => 'required',
            'agency_id' => 'required',
            'body_injury' => 'required',
            'property_damage' => 'required',
            'medical_payments' => 'required',
            'pip' => 'required',
            'uninsured_body_injury' => 'required',
            'uninsured_property_damage' => 'required',
            'under_insured_body_injury' => 'required',
            'under_insured_property_damage' => 'required',
            'initial_premium' => 'required',
            'prorated_endorsement' => 'required',
            'premium_addon' => 'required',
            'company_fee' => 'required',
            'agency_fee' => 'required',
            'total_prorated' => 'required',
            'down_payment' => 'required',
            'monthly_payment' => 'required',
            'initial_agency_commission' => 'required',
            'primary_agency_commission' => 'required',
            'secondary_agency_commission' => 'required',
            'total_premium' => 'required',
            'total_company_fee' => 'required',
            'total_agency_fee' => 'required',
            'total' => 'required',
            'payment_due_days' => 'required',
            'coverage' => 'required',
            'referral_resource' => 'required',
            'notes' => 'required',
        ]);
         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {

            // Create Client
            $clientData = [
                'user_id' => auth()->user()->id,
                'policy_type_id' => $request->policy_type_id,
                'applicant_name' => $request->applicant_name,
                'address' => $request->address,
                'city' => $request->city,
                'state_id' => $request->state_id,
                'zip_code' => $request->zip_code,
                'email' => $request->email,
                'home_phone_no' => $request->home_phone_no,
                'cell_phone_no' => $request->cell_phone_no,
                'work_phone_no' => $request->work_phone_no,
                'fax_phone_no' => $request->fax_phone_no,
                'email_status_id' => $request->email_status_id,
                'primary_language_id' => $request->primary_language_id,
                'anniversary' => $request->anniversary,
            ];

            $client = Client::create($clientData);

            // Create Client Policy
            $clientPolicyData = [
                'client_id' => $client->id,
                'policy_status_id' => $request->policy_status_id,
                'term_id' => $request->term_id,
                'effective_date' => $request->effective_date,
                'expiration_date' => $request->expiration_date,
                'sold_date' => $request->sold_date,
                'file_number' => $request->file_number,
                'policy_number' => $request->policy_number,
                'insurance_company_id' => $request->insurance_company_id,
                'agent_id' => $request->agent_id,
                'agency_id' => $request->agency_id,
            ];

            $clientPolicy = ClientPolicy::create($clientPolicyData);

            // Create Client Drivers
            foreach ($request->first_name as $key => $firstName) {
                ClientDriver::create([
                    'client_id' => $client->id,
                    'first_name' => $firstName,
                    'last_name' => $request->last_name[$key],
                    'dob' => $request->dob[$key],
                    'age' => $request->age[$key],
                    'ssn_no' => $request->ssn_no[$key],
                    'gender_id' => $request->gender_id[$key],
                    'marital_status_id' => $request->marital_status_id[$key],
                    'relationship_id' => $request->relationship_id[$key],
                    'license_no' => $request->license_no[$key],
                    'us_state_id' => $request->us_state_id[$key],
                    'license_year' => $request->license_year[$key],
                    'cell_no' => $request->cell_no[$key],
                    'education_level_id' => $request->education_level_id[$key],
                    'occupation' => $request->occupation[$key],
                    'industry' => $request->industry[$key],
                ]);
            }

            // Create Client Coverage
            ClientCoverage::create([
                'client_id' => $client->id,
                'body_injury' => $request->body_injury,
                'property_damage' => $request->property_damage,
                'medical_payments' => $request->medical_payments,
                'pip' => $request->pip,
                'uninsured_body_injury' => $request->uninsured_body_injury,
                'uninsured_property_damage' => $request->uninsured_property_damage,
                'under_insured_body_injury' => $request->under_insured_body_injury,
                'under_insured_property_damage' => $request->under_insured_property_damage,
            ]);

            // Create Client Vehicles
            foreach ($request->vin as $key => $vin) {
                ClientVehicle::create([
                    'client_id' => $client->id,
                    'vin' => $vin,
                    'year_id' => $request->year_id[$key],
                    'vehicle_make_id' => $request->vehicle_make_id[$key],
                    'vehicle_model_id' => $request->vehicle_model_id[$key],
                    'comprehensive' => $request->comprehensive[$key],
                    'collision' => $request->collision[$key],
                    'rental' => $request->rental[$key],
                    'towing' => $request->towing[$key],
                    'custom_equipment' => removeDollarSign($request->custom_equipment[$key]),
                ]);
            }

            // Create Client Payments
            ClientPayment::create([
                'client_id' => $client->id,
                'initial_premium' => removeDollarSign($request->initial_premium),
                'prorated_endorsement' => removeDollarSign($request->prorated_endorsement),
                'premium_addon' => removeDollarSign($request->premium_addon),
                'company_fee' => removeDollarSign($request->company_fee),
                'agency_fee' => removeDollarSign($request->agency_fee),
                'total_prorated' => removeDollarSign($request->total_prorated),
                'down_payment' => removeDollarSign($request->down_payment),
                'monthly_payment' => removeDollarSign($request->monthly_payment),
                'initial_agency_commission' => removeDollarSign($request->initial_agency_commission),
                'primary_agency_commission' => removeDollarSign($request->primary_agency_commission),
                'secondary_agency_commission' => removeDollarSign($request->secondary_agency_commission),
                'total_premium' => removeDollarSign($request->total_premium),
                'total_company_fee' => removeDollarSign($request->total_company_fee),
                'total_agency_fee' => removeDollarSign($request->total_agency_fee),
                'total' => removeDollarSign($request->total),
                'payment_option' =>  ($request->payment_option),
                'payment_due_days' =>  ($request->payment_due_days),
                'insurance_company_id' => $request->insurance_company_id,
            ]);

            // Create Client Notes
            ClientNotes::create([
                'client_id' => $client->id,
                'coverage' => $request->coverage,
                'referral_resource' => $request->referral_resource,
                'notes' => $request->notes,
            ]);

            DB::commit();

            return redirect()->route('show-client')->with('success', 'Client and related records created successfully.');
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
                'commission_fee' => str_replace(['$', ' '], '', $data['commission_fee']) ?? null,
            ]);


            $role = Role::find($clientRole->id);

            // Update permissions
            if ($request->has('permissions')) {
                $validPermissionIds = Permission::whereIn('id', $data['permissions'])->pluck('id')->toArray();
                $role->syncPermissions($validPermissionIds);
            } else {
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
