<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\Client;
use App\Models\ClientCommercialDetail;
use App\Models\ClientCommercialLiability;
use App\Models\ClientCoverage;
use App\Models\ClientDriver;
use App\Models\ClientHouseDetail;
use App\Models\ClientMobileHomeDetail;
use App\Models\ClientNotes;
use App\Models\ClientPayment;
use App\Models\ClientPolicy;
use App\Models\ClientVehicle;
use App\Models\EducationLevel;
use App\Models\EmailStatus;
use App\Models\Gender;
use App\Models\InsuranceCompany;
use App\Models\MaritalStatus;
use App\Models\PolicyStatus;
use App\Models\PolicyType;
use App\Models\PrimaryLanguage;
use App\Models\Relationship;
use App\Models\Term;
use App\Models\UsState;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        $clients = Client::with('policyType')->orderBy('created_at', 'DESC')->get();

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
//        dd($request->all());
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
//        dd($validator->errors());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
//            dd($request->all());
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
            if (!empty($request->first_name) && is_array($request->first_name)) {
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
            }

            // Create Client Coverage
            if (isset($request->body_injury)) {

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
            }

            // Create Client Commercial Detail
            if (isset($request->type_of_business)) {

                ClientCommercialDetail::create([
                    'client_id' => $client->id,
                    'type_of_business' => $request->type_of_business,
                    'year_of_experience' => $request->year_of_experience,
                    'special_license' => $request->special_license,
                    'employment_number' => $request->employment_number,
                    'employment_payroll' => removeDollarSign($request->employment_payroll),
                    'current_inst' => $request->current_inst,
                    'quote_expiry' => $request->quote_expiry,
                    'general_aggregate' => $request->general_aggregate,
                    'product_aggregate' => $request->product_aggregate,
                    'personal_injury' => $request->personal_injury,
                    'each_occurrence' => $request->each_occurrence,
                    'fire_damage' => $request->fire_damage,
                    'medical_expense' => $request->medical_expense,
                    'annual_receipt' => removeDollarSign($request->annual_receipt),
                    'building' => removeDollarSign($request->building),
                    'contents' => removeDollarSign($request->contents),
                    'loss_of_earning' => removeDollarSign($request->loss_of_earning),
                    'pump' => removeDollarSign($request->pump),
                    'sign' => removeDollarSign($request->sign),
                    'glass' => removeDollarSign($request->glass),
                    'property_owner' => $request->property_owner,
                    'built_year' => $request->built_year,
                    'property_area' => $request->property_area,
                    'age_of_roof' => $request->age_of_roof,
                    'construction' => $request->construction,
                    'is_alarm_system' => $request->is_alarm_system ?? 0,
                ]);
            }

            // Create Client House Detail
            if (isset($request->dwelling_building) && $request->dwelling_building != null) {

                ClientHouseDetail::create([
                    'client_id' => $client->id,
                    'dwelling_building' => removeDollarSign($request->dwelling_building),
                    'liability_limit' => $request->liability_limit,
                    'contents' => removeDollarSign($request->contents),
                    'medical_payment' => ($request->medical_payment),
                    'additional_structure' => removeDollarSign($request->medical_payment),
                    'deductible' => ($request->deductible),
                    'loss_of_use' => removeDollarSign($request->loss_of_use),
                    'usage' => ($request->usage),
                    'construction' => ($request->construction),
                    'built_year' => ($request->built_year),
                    'square_footage' => ($request->square_footage),
                    'rooms' => ($request->rooms),
                    'age_of_roof' => ($request->age_of_roof),
                    'is_intrusion_alarm' => $request->is_intrusion_alarm ?? 0,
                    'is_fire_station' => $request->is_fire_station ?? 0,
                    'is_swimming_pool' => $request->is_swimming_pool ?? 0,
                    'is_replacement_cost' => $request->is_replacement_cost ?? 0,
                ]);
            }

            // Create Client Mobile House Detail
            if (isset($request->value) && $request->value != null) {

                ClientMobileHomeDetail::create([
                    'client_id' => $client->id,
                    'value' => removeDollarSign($request->value),
                    'liability_limit' => $request->liability_limit,
                    'contents' => removeDollarSign($request->contents),
                    'flood' => ($request->flood),
                    'theft' => removeDollarSign($request->theft),
                    'deductible' => ($request->deductible),
                    'adjacent_structure' => removeDollarSign($request->adjacent_structure),
                    'replacement_cost' => removeDollarSign($request->replacement_cost),
                    'make' => ($request->make),
                    'model' => ($request->model),
                    'built_year' => ($request->built_year),
                    'dimensions' => ($request->dimensions),
                    'tied_down' => ($request->tied_down),
                    'type_of_siding' => ($request->type_of_siding),
                    'park_name' => ($request->park_name),
                    'skirted' => ($request->skirted),
                    'fire_place' => ($request->fire_place),
                    'is_inside_city_limit' => $request->is_inside_city_limit ?? 0,

                ]);
            }


            if (isset($request->is_general_liability) && $request->is_general_liability != null) {

                ClientCommercialLiability::create([
                    'client_id' => $client->id,
                    'general_liability' => $request->is_general_liability,
                    'general_aggregate' => $request->general_aggregate,
                    'product_aggregate' => $request->product_aggregate,
                    'personal_injury' => $request->personal_injury,
                    'each_occurrence' => $request->each_occurrence,
                    'fire_damage' => $request->fire_damage,
                    'medical_expense' => $request->medical_expense,
                    'annual_receipt' => removeDollarSign($request->annual_receipt),

                ]);
            }


            // Create Client Vehicles
            if ($request->vin[0] != null) {
                foreach ($request->vin as $key => $vin) {
                    ClientVehicle::create([
                        'client_id' => $client->id,
                        'vin' => $vin,
                        'year_id' => $request->year_id[$key] ?? null,
                        'vehicle_make_id' => $request->vehicle_make_id[$key] ?? null,
                        'vehicle_model_id' => $request->vehicle_model_id[$key] ?? null,
                        'comprehensive' => $request->comprehensive[$key] ?? null,
                        'collision' => $request->collision[$key] ?? null,
                        'rental' => $request->rental[$key] ?? null,
                        'towing' => $request->towing[$key] ?? null,
                        'custom_equipment' => isset($request->custom_equipment[$key])
                            ? removeDollarSign($request->custom_equipment[$key])
                            : null,
                    ]);
                }
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
                'payment_option' => ($request->payment_option),
                'payment_due_days' => ($request->payment_due_days),
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
        $client = Client::with('policy')->find($id);

        if (!$client) {
            return redirect()->route('show-client')->with('error', 'Client not found.');
        }

        $title = 'Edit Client';
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

        $policyType = PolicyType::find($client->policy_type_id);

//        dd($client->policy);
        return view('admin.client.edit', compact(
            'title',
            'client',
            'policyType', 'states', 'emailStatues', 'languages',
            'policyStatuses', 'terms', 'insuranceCompanies', 'agents', 'locations',
            'genders', 'maritalStatus', 'relationships', 'educationLevels', 'years',
            'vehicleMakes', 'vehicleModels'
        ));
    }


    /**
     * Update an existing client in the database.
     */
    public function update(Request $request, $id)
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

            $client = Client::findOrFail($id);

            if (!$client) {
                return redirect()->route('show-client')->with('error', 'Client not found.');
            }

            // Update Client
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
            $client->update($clientData);

            // Update or Create Client Policy
            $clientPolicyData = [
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
            $client->policy()->updateOrCreate(['client_id' => $client->id], $clientPolicyData);

            // Update or Create Client Drivers
            if (!empty($request->first_name) && is_array($request->first_name)) {
                foreach ($request->first_name as $key => $firstName) {
                    ClientDriver::updateOrCreate(
                        ['client_id' => $client->id],
                        [
                            'first_name' => $request->first_name[$key],
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
                        ]
                    );
                }
            }

            // Update or Create Client Coverage
            if (isset($request->body_injury)) {
                $client->coverage()->updateOrCreate(
                    ['client_id' => $client->id],
                    [
                        'body_injury' => $request->body_injury,
                        'property_damage' => $request->property_damage,
                        'medical_payments' => $request->medical_payments,
                        'pip' => $request->pip,
                        'uninsured_body_injury' => $request->uninsured_body_injury,
                        'uninsured_property_damage' => $request->uninsured_property_damage,
                        'under_insured_body_injury' => $request->under_insured_body_injury,
                        'under_insured_property_damage' => $request->under_insured_property_damage,
                    ]
                );
            }

            // Update Client Commercial Detail
            if (isset($request->type_of_business)) {
                $client->commercial()->updateOrCreate(
                    ['client_id' => $client->id],
                    [
                        'type_of_business' => $request->type_of_business,
                        'year_of_experience' => $request->year_of_experience,
                        'special_license' => $request->special_license,
                        'employment_number' => $request->employment_number,
                        'employment_payroll' => removeDollarSign($request->employment_payroll),
                        'current_inst' => $request->current_inst,
                        'quote_expiry' => $request->quote_expiry,
                        'general_aggregate' => $request->general_aggregate,
                        'product_aggregate' => $request->product_aggregate,
                        'personal_injury' => $request->personal_injury,
                        'each_occurrence' => $request->each_occurrence,
                        'fire_damage' => $request->fire_damage,
                        'medical_expense' => $request->medical_expense,
                        'annual_receipt' => removeDollarSign($request->annual_receipt),
                        'building' => removeDollarSign($request->building),
                        'contents' => removeDollarSign($request->contents),
                        'loss_of_earning' => removeDollarSign($request->loss_of_earning),
                        'pump' => removeDollarSign($request->pump),
                        'sign' => removeDollarSign($request->sign),
                        'glass' => removeDollarSign($request->glass),
                        'property_owner' => $request->property_owner,
                        'built_year' => $request->built_year,
                        'property_area' => $request->property_area,
                        'age_of_roof' => $request->age_of_roof,
                        'construction' => $request->construction,
                        'is_alarm_system' => $request->is_alarm_system ?? 0,
                    ]

                );

            }

            // Update Client House Detail
            if (isset($request->dwelling_building) && $request->dwelling_building != null) {
                $client->house()->updateOrCreate(
                    ['client_id' => $client->id],
                    [
                        'dwelling_building' => removeDollarSign($request->dwelling_building),
                        'liability_limit' => $request->liability_limit,
                        'contents' => removeDollarSign($request->contents),
                        'medical_payment' => ($request->medical_payment),
                        'additional_structure' => removeDollarSign($request->medical_payment),
                        'deductible' => ($request->deductible),
                        'loss_of_use' => removeDollarSign($request->loss_of_use),
                        'usage' => ($request->usage),
                        'construction' => ($request->construction),
                        'built_year' => ($request->built_year),
                        'square_footage' => ($request->square_footage),
                        'rooms' => ($request->rooms),
                        'age_of_roof' => ($request->age_of_roof),
                        'is_intrusion_alarm' => $request->is_intrusion_alarm ?? 0,
                        'is_fire_station' => $request->is_fire_station ?? 0,
                        'is_swimming_pool' => $request->is_swimming_pool ?? 0,
                        'is_replacement_cost' => $request->is_replacement_cost ?? 0,
                    ]
                );
            }

            // Update Client Mobile House Detail
            if (isset($request->value) && $request->value != null) {
                $client->mobileHome()->updateOrCreate(
                    ['client_id' => $client->id],
                    [
                        'value' => removeDollarSign($request->value),
                        'liability_limit' => $request->liability_limit,
                        'contents' => removeDollarSign($request->contents),
                        'flood' => ($request->flood),
                        'theft' => removeDollarSign($request->theft),
                        'deductible' => ($request->deductible),
                        'adjacent_structure' => removeDollarSign($request->adjacent_structure),
                        'replacement_cost' => removeDollarSign($request->replacement_cost),
                        'make' => ($request->make),
                        'model' => ($request->model),
                        'built_year' => ($request->built_year),
                        'dimensions' => ($request->dimensions),
                        'tied_down' => ($request->tied_down),
                        'type_of_siding' => ($request->type_of_siding),
                        'park_name' => ($request->park_name),
                        'skirted' => ($request->skirted),
                        'fire_place' => ($request->fire_place),
                        'is_inside_city_limit' => $request->is_inside_city_limit ?? 0,

                    ]
                );
            }

            if (isset($request->is_general_liability) && $request->is_general_liability != null) {
                $client->commercialLiability()->updateOrCreate(
                    ['client_id' => $client->id],
                    [
                        'client_id' => $client->id,
                        'general_liability' => $request->is_general_liability,
                        'general_aggregate' => $request->general_aggregate,
                        'product_aggregate' => $request->product_aggregate,
                        'personal_injury' => $request->personal_injury,
                        'each_occurrence' => $request->each_occurrence,
                        'fire_damage' => $request->fire_damage,
                        'medical_expense' => $request->medical_expense,
                        'annual_receipt' => removeDollarSign($request->annual_receipt),

                    ]
                );

            }

             // Create Client Vehicles
//            dd($request->all());
            if (isset($request->vin) && $request->vin[0] != null) {
                // Delete old records
                ClientVehicle::where('client_id', $client->id)->delete();

                // Create new records
                foreach ($request->vin as $key => $vin) {
                    ClientVehicle::create([
                        'client_id' => $client->id,
                        'vin' => $vin,
                        'year_id' => $request->year_id[$key] ?? null,
                        'vehicle_make_id' => $request->vehicle_make_id[$key] ?? null,
                        'vehicle_model_id' => $request->vehicle_model_id[$key] ?? null,
                        'comprehensive' => $request->comprehensive[$key] ?? null,
                        'collision' => $request->collision[$key] ?? null,
                        'rental' => $request->rental[$key] ?? null,
                        'towing' => $request->towing[$key] ?? null,
                        'custom_equipment' => isset($request->custom_equipment[$key])
                            ? removeDollarSign($request->custom_equipment[$key])
                            : null,
                    ]);
                }
            }



            // Update Client Payments
            $client->payment()->updateOrCreate(
                ['client_id' => $client->id],
                [
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
                    'payment_option' => ($request->payment_option),
                    'payment_due_days' => ($request->payment_due_days),
                    'insurance_company_id' => $request->insurance_company_id,
                ]
            );

            // Update Client Notes
            $client->note()->updateOrCreate(
                ['client_id' => $client->id],
                [
                    'coverage' => $request->coverage,
                    'referral_resource' => $request->referral_resource,
                    'notes' => $request->notes,
                ]
            );


            DB::commit();

            return redirect()->route('show-client')->with('success', 'Client updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage());
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
