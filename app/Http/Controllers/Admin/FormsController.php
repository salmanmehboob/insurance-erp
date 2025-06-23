<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\ClientPolicy;
use App\Models\Forms\AdditionalRemarkForm;
use App\Models\Forms\AgentBrokerForm;
use App\Models\Forms\EvidenceOfPropertyForm;
use App\Models\Forms\GeneralLiability;
use App\Models\Forms\InsuranceApplication;
use App\Models\Forms\InsuranceApplicationApplicant;
use App\Models\Forms\InsuranceApplicationAttachment;
use App\Models\Forms\InsuranceApplicationBusiness;
use App\Models\Forms\InsuranceApplicationInfo;
use App\Models\Forms\InsuranceApplicationPremise;
use App\Models\Forms\InsuranceApplicationPrior;
use App\Models\Forms\InsuranceCard;
use App\Models\Forms\InvoicePayment;
use App\Models\Forms\InvoicePaymentItem;
use App\Models\Forms\LiabilityInsurance;
use App\Models\Forms\PropertyInsurance;
use App\Models\Forms\PropertyLoss;
use App\Models\InsuranceCompany;
use App\Models\PolicyType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Log;
use function Laravel\Prompts\error;

class FormsController extends Controller
{
    public function viewForm($type)
    {
        $title = formatText($type) . ' Forms';
        $forms = [];
        if ($type === 'agent_broker') {
            $forms = AgentBrokerForm::all();

        }
        if ($type === 'additional_remarks') {
            $forms = AdditionalRemarkForm::all();
        }
        if ($type === 'evidenceOfProperty') {
            $forms = EvidenceOfPropertyForm::all();
        }

        if ($type === 'invoiceForPayment') {
            $forms = InvoicePayment::all();
        }

        if ($type === 'propertyLoss') {
            $forms = PropertyLoss::all();
        }

        if ($type === 'propertyInsurance') {
            $forms = PropertyInsurance::all();
        }
        if ($type === 'liabilityInsurance') {
            $forms = LiabilityInsurance::all();
        }

        if ($type === 'InsuranceCard') {
            $forms = InsuranceCard::all();
        }

        if ($type === 'GeneralLiability') {
            $forms = GeneralLiability::all();
        }

        if ($type === 'InsuranceApplication') {
            $forms = InsuranceApplication::all();
        }

        return view('admin.clientForms.index', compact('title', 'forms', 'type'));

    }

    public function showForm($id, $type)
    {
        $title = 'Forms';
        $form = [];
        if ($type === 'agent_broker') {
            $form = AgentBrokerForm::find($id);
            return view('admin.clientForms.agent_broker.show', compact('title', 'form', 'type'));

        }
        if ($type === 'additional_remarks') {
            $form = AdditionalRemarkForm::find($id);
            return view('admin.clientForms.additional_remarks.show', compact('title', 'form', 'type'));

        }
        if ($type === 'evidenceOfProperty') {
            $form = EvidenceOfPropertyForm::find($id);
            return view('admin.clientForms.evidence_property.show', compact('title', 'form', 'type'));

        }

        if ($type === 'invoiceForPayment') {
            $form = InvoicePayment::find($id);
            return view('admin.clientForms.invoice_payment.show', compact('title', 'form', 'type'));

        }

        if ($type === 'propertyLoss') {
            $form = PropertyLoss::find($id);
            return view('admin.clientForms.property_loss.show', compact('title', 'form', 'type'));

        }

        if ($type === 'propertyInsurance') {
            $form = PropertyInsurance::find($id);
            return view('admin.clientForms.property_insurance.show', compact('title', 'form', 'type'));

        }
        if ($type === 'liabilityInsurance') {
            $form = LiabilityInsurance::find($id);
            return view('admin.clientForms.liability_insurance.show', compact('title', 'form', 'type'));

        }

        if ($type === 'InsuranceCard') {
            $form = InsuranceCard::find($id);
            return view('admin.clientForms.insurance_card.show', compact('title', 'form', 'type'));

        }
        if ($type === 'GeneralLiability') {
            $form = GeneralLiability::find($id);
            return view('admin.clientForms.general_liability.show', compact('title', 'form', 'type'));

        }

        if ($type === 'InsuranceApplication') {
            $form = InsuranceApplication::find($id);
             return view('admin.clientForms.insurance_application.show', compact('title', 'form', 'type'));

        }

    }

    public function createAgentBrokerForm($id)
    {
        $clientPolicy = ClientPolicy::with('client', 'insuranceCompany', 'agent.agencies')->where('client_id', $id)->first();
        $agencies = Agency::all();

        return view('admin.clientForms.agent_broker.create', compact('clientPolicy', 'agencies'));
    }

    public function storeAgentBrokerForm(Request $request)
    {
        DB::beginTransaction();


        try {
            $validator = Validator::make($request->all(), [
                'creation_date' => 'nullable',
                'agency_phone' => 'nullable|string|max:255',
                'agency_fax' => 'nullable|string|max:255',
                'agency_name' => 'nullable|string|max:255',
                'agency_address' => 'nullable|string|max:255',
                'agency_city' => 'nullable|string|max:255',
                'agency_state' => 'nullable|string|max:255',
                'agency_zipcode' => 'nullable|string|max:20',
                'email' => 'nullable|email|max:255',
                'code' => 'required|string|max:255',
                'sub_code' => 'nullable|string|max:255',
                'agency_customer_id' => 'nullable|string|max:255',
                'insurance_company_name' => 'nullable|string|max:255',
                'insurance_company_address' => 'nullable|string|max:255',
                'insurance_company_city' => 'nullable|string|max:255',
                'insurance_company_state' => 'nullable|string|max:255',
                'insurance_company_zipcode' => 'nullable|string|max:255',
                'current_agency' => 'nullable|string|max:255',
                'current_producer' => 'nullable|string|max:255',
                'advice_producer_name' => 'nullable|string|max:255',
                'advice_producer_effective_date' => 'nullable',
                'insured_signature' => 'nullable|string|max:255',
                'issued_date' => 'nullable',
                'insured_title' => 'nullable|string|max:255',
                'insured_company_name' => 'nullable|string|max:255',
                'insured_company_address' => 'nullable|string|max:255',
                'insured_company_city' => 'nullable|string|max:255',
                'insured_company_state' => 'nullable|string|max:255',
                'insured_company_zipcode' => 'nullable|string|max:255',

                // Array validations for AgentBrokerCompany
                'name' => 'nullable|array',
                'name.*' => 'nullable|string|max:255',
                'policy_number' => 'nullable|array',
                'policy_number.*' => 'nullable|string|max:255',
                'effective_date' => 'nullable|array',
                'effective_date.*' => 'nullable',
                'expiration_date' => 'nullable|array',
                'expiration_date.*' => 'nullable',
                'line_of_business' => 'nullable|array',
                'line_of_business.*' => 'nullable|string|max:255',
            ]);


            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $user_id = auth()->id();

//             dd($request->all());
            $agentBrokerForm = AgentBrokerForm::create([
                'client_id' => $request->client_id,
                'code' => $request->code,
                'sub_code' => $request->sub_code,
                'current_producer' => $request->current_producer,
                'agency_customer_id' => $request->agency_customer_id,
                'created_by' => $user_id,
                'creation_date' => $request->creation_date,
                'insured_signature' => $request->insured_signature,
                'issued_date' => $request->issued_date,
                'insured_title' => $request->insured_title,
                'insured_company_name' => $request->insured_company_name,
                'insured_company_address' => $request->insured_company_address,
                'insured_company_city' => $request->insured_company_city,
                'insured_company_state' => $request->insured_company_state,
                'insured_company_zipcode' => $request->insured_company_zipcode,

                'agency_name' => $request->agency_name,
                'agency_phone' => $request->agency_phone,
                'agency_fax' => $request->agency_fax,
                'agency_address' => $request->agency_address,
                'agency_city' => $request->agency_city,
                'agency_state' => $request->agency_state,
                'agency_zipcode' => $request->agency_zipcode,

                'insurance_company_name' => $request->insurance_company_name,
                'insurance_company_address' => $request->insurance_company_address,
                'insurance_company_city' => $request->insurance_company_city,
                'insurance_company_state' => $request->insurance_company_state,
                'insurance_company_zipcode' => $request->insurance_company_zipcode,

                'current_agency' => $request->current_agency,
                'email' => $request->email,

                'advice_producer_name' => $request->advice_producer_name,
                'advice_producer_effective_date' => $request->advice_producer_effective_date,
            ]);


//            dd($request->all());
            // Store company rows
            foreach ($request->name as $index => $value) {
                if (isset($request->name[$index])) {
                    $agentBrokerForm->companies()->create([
                        'name' => $request->name[$index],
                        'policy_number' => $request->policy_number[$index],
                        'effective_date' => $request->effective_date[$index],
                        'expiration_date' => $request->expiration_date[$index],
                        'line_of_business' => $request->line_of_business[$index],
                    ]);
                }

            }

            DB::commit();

            return redirect()->route('dashboard')->with('success', 'Agent Broker added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error saving agent broker form: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while saving the Form. ' . $e->getMessage());
        }
    }


    public function CreateAdditionalRemarksForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.additional_remarks.create', compact('clientPolicy', 'insuranceCompanies'));
    }

    public function storeAdditionalRemarksForm(Request $request)
    {

        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'agency_customer_id' => 'required',
            'loc' => 'required',
            'agency_name' => 'required',
            'name_insured' => 'required',
            'policy_number' => 'required',
            'carrier' => 'required',
            'naic_code' => 'required',
            'effective_date' => 'required',
            'form_no' => 'required',
            'form_title' => 'required',
            'description' => 'required',

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Start database transaction
        DB::beginTransaction();

        try {

            $additionalRemarksForm = AdditionalRemarkForm::create([
                'client_id' => $request->client_id,
                'agency_customer_id' => $request->agency_customer_id,
                'loc' => $request->loc,  // Handle null value
                'agency_name' => $request->agency_name,
                'name_insured' => $request->name_insured,
                'policy_number' => $request->policy_number,
                'carrier' => $request->carrier,
                'naic_code' => $request->naic_code,
                'effective_date' => $request->effective_date,
                'form_no' => $request->form_no,
                'form_title' => $request->form_title,
                'created_by' => auth()->user()->id,
                'description' => $request->description,
            ]);

            // Check if the data was successfully created
            if ($additionalRemarksForm) {
                DB::commit();
                return redirect()->back()->with('success', 'Form submitted successfully!');
            } else {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => 'Failed to create the record.']);
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function CreateEvidenceOfPropertyForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.evidence_property.create', compact('clientPolicy', 'insuranceCompanies'));
    }

    public function storeEvidenceOfProperty(Request $request)
    {
//        dd($request->all());
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|integer|exists:clients,id',
            'invoice_date' => 'nullable',

            'agency_name' => 'nullable',
            'agency_address' => 'nullable',
            'agency_city' => 'nullable',
            'agency_state' => 'nullable',
            'agency_zipcode' => 'nullable',
            'agency_phone' => 'nullable',
            'company_name' => 'nullable',
            'agency_fax' => 'nullable',
            'agency_email' => 'nullable',
            'agency_code' => 'nullable',
            'agency_subcode' => 'nullable',
            'agency_customer_id' => 'nullable',


            'loan_number' => 'nullable',
            'policy_number' => 'nullable',

            'insured_name' => 'nullable',
            'insured_address' => 'nullable',
            'insured_city' => 'nullable',
            'insured_state' => 'nullable',
            'insured_zipcode' => 'nullable',

            'effective_date' => 'nullable',
            'expiration_date' => 'nullable',
            'is_terminated' => 'nullable',
            'evidence_date' => 'nullable',
            'property_information' => 'nullable',

            'is_perlis' => 'nullable|in:0,1',
            'is_basic' => 'nullable|in:0,1',
            'is_broad' => 'nullable|in:0,1',
            'is_special' => 'nullable|in:0,1',
            'location_description' => 'nullable|string|max:255',
            'coverage' => 'nullable',
            'amount' => 'nullable|string',
            'deductible' => 'nullable|string',
            'remarks' => 'nullable|string|max:255',

            'additional_interest_name' => 'nullable|string|max:100',
            'additional_interest_address' => 'nullable|string|max:255',
            'additional_interest_city' => 'nullable|string|max:255',
            'additional_interest_state' => 'nullable|string|max:255',
            'additional_interest_zipcode' => 'nullable|string|max:255',
            'additional_insured' => 'nullable',
            'lenders_loss_payable' => 'nullable',
            'loss_payee' => 'nullable',
            'mortgagee' => 'nullable',
            'additional_interest_loan' => 'nullable',
            'authorized_representative' => 'nullable',

        ]);
//dd($validator->errors());
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Start database transaction
        DB::beginTransaction();

        try {
            $user_id = auth()->user()->id;

//            dd($request->all());
            $dbData = [
                'client_id' => $request->client_id,
                'invoice_date' => isset($request->invoice_date) ? $request->invoice_date : null,
                'agency_name' => isset($request->agency_name) ? $request->agency_name : null,
                'agency_address' => isset($request->agency_address) ? $request->agency_address : null,
                'agency_city' => isset($request->agency_city) ? $request->agency_city : null,
                'agency_state' => isset($request->agency_state) ? $request->agency_state : null,
                'agency_zipcode' => $request->agency_zipcode ?? null,
                'company_name' => $request->company_name ?? null,
                'agency_phone' => $request->agency_phone ?? null,
                'agency_fax' => $request->agency_fax ?? null,
                'agency_email' => $request->agency_email ?? null,
                'agency_code' => $request->agency_code ?? null,
                'agency_subcode' => $request->agency_subcode ?? null,
                'agency_customer_id' => $request->agency_customer_id ?? null,
                'loan_number' => $request->loan_number ?? null,
                'policy_number' => $request->policy_number ?? null,
                'insured_name' => $request->insured_name ?? null,
                'insured_address' => $request->insured_address ?? null,
                'insured_city' => $request->insured_city ?? null,
                'insured_state' => $request->insured_state ?? null,
                'insured_zipcode' => $request->insured_zipcode ?? null,
                'effective_date' => $request->effective_date ?? null,
                'expiration_date' => $request->expiration_date ?? null,
                'is_terminated' => $request->is_terminated ?? null,
                'evidence_date' => $request->evidence_date ?? null,
                'property_information' => $request->property_information ?? null,
                'is_perlis' => $request->is_perlis ?? null,
                'is_basic' => $request->is_basic ?? null,
                'is_broad' => $request->is_broad ?? null,
                'is_special' => $request->is_special ?? null,
                'location_description' => $request->location_description ?? null,
                'coverage' => $request->coverage ?? null,
                'amount' => $request->amount ?? null,
                'deductible' => $request->deductible ?? null,
                'remarks' => $request->remarks ?? null,
                'additional_interest_name' => $request->additional_interest_name ?? null,
                'additional_interest_address' => $request->additional_interest_address ?? null,
                'additional_interest_city' => $request->additional_interest_city ?? null,
                'additional_interest_state' => $request->additional_interest_state ?? null,
                'additional_interest_zipcode' => $request->additional_interest_zipcode ?? null,
                'additional_insured' => $request->additional_insured ?? null,
                'lenders_loss_payable' => $request->lenders_loss_payable ?? null,
                'loss_payee' => $request->loss_payee ?? null,
                'mortgagee' => $request->mortgagee ?? null,
                'additional_interest_loan' => $request->additional_interest_loan ?? null,
                'authorized_representative' => $request->authorized_representative ?? null,
                'created_by' => $user_id,
            ];
             $evidence = EvidenceOfPropertyForm::create($dbData);

            // Check if the data was successfully created
            if ($evidence) {
                DB::commit();
                return redirect()->back()->with('success', 'Evidence of Property Form created successfully for ' . $evidence->client->applicant_name);
            } else {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => 'Failed to create the record.']);
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function CreateInvoiceForPaymentForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.invoice_payment.create', compact('clientPolicy', 'insuranceCompanies'));
    }

    public function storeInvoiceForPayment(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required',
            'agency_name' => 'required',
            'agency_phone' => 'required',
            'agency_fax' => 'required',
            'agency_address' => 'required',
            'agency_city' => 'required',
            'agency_state' => 'required',
            'agency_zipcode' => 'required',
            'insured_company_name' => 'required',
            'insured_company_address' => 'required',
            'insured_company_city' => 'required',
            'insured_company_state' => 'required',
            'insured_company_zipcode' => 'required',
            'company_name' => 'required',
            'company_fax' => 'required',
            'policy_number' => 'required',
            'invoice_date' => 'required',
            'note' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }

        DB::beginTransaction();

        try {

            // Calculate total amount from the 'amount' array
            $totalAmount = 0;
            foreach ($request->amount as $index => $amt) {
                if (!empty($amt) && is_numeric($amt)) {
                    $totalAmount += floatval($amt);
                }
            }


            // Store main invoice payment
            $invoicePayment = InvoicePayment::create([
                'client_id' => $request->client_id,
                'invoice_no' => $request->invoice_no,
                'agency_name' => $request->agency_name,
                'agency_phone' => $request->agency_phone,
                'agency_fax' => $request->agency_fax,
                'agency_address' => $request->agency_address,
                'agency_city' => $request->agency_city,
                'agency_state' => $request->agency_state,
                'agency_zipcode' => $request->agency_zipcode,
                'insured_company_name' => $request->insured_company_name,
                'insured_company_address' => $request->insured_company_address,
                'insured_company_city' => $request->insured_company_city,
                'insured_company_state' => $request->insured_company_state,
                'insured_company_zipcode' => $request->insured_company_zipcode,
                'company_name' => $request->company_name,
                'company_fax' => $request->company_fax,
                'policy_number' => $request->policy_number,
                'invoice_date' => $request->invoice_date,
                'total_amount' => $totalAmount,
                'note' => $request->note,
            ]);

            // Save item details
            foreach ($request->item_name as $index => $itemName) {
                if (!empty($itemName) && !empty($request->description[$index]) && !empty($request->amount[$index])) {
                    InvoicePaymentItem::create([
                        'invoice_payment_id' => $invoicePayment->id,
                        'item_name' => $itemName,
                        'description' => $request->description[$index],
                        'amount' => $request->amount[$index],
                    ]);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Invoice Payment created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function CreatePropertyLossForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.property_loss.create', compact('clientPolicy', 'insuranceCompanies'));
    }

    public function storePropertyLoss(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|integer',
            'invoice_date' => 'required|string',

            'agency_name' => 'required|string',
            'agency_address' => 'required|string',
            'agency_city' => 'required|string',
            'agency_state' => 'required|string',
            'agency_zipcode' => 'required|string',
            'agency_contact_name' => 'required|string',
            'agency_phone' => 'required|string',
            'agency_fax' => 'required|string',
            'agency_email' => 'required|string',
            'agency_code' => 'required|string',
            'agency_subcode' => 'required|string',
            'agency_customer_id' => 'required|string',

            'location_code' => 'required|string',
            'date_of_loss' => 'required|string',
            'time_of_loss' => 'required|string',

            'property_carrier' => 'nullable|string',
            'property_naic_code' => 'nullable|string',
            'property_policy_number' => 'nullable|string',
            'property_business' => 'nullable|string',

            'flood_carrier' => 'nullable|string',
            'flood_naic_code' => 'nullable|string',
            'flood_policy_number' => 'nullable|string',

            'wind_carrier' => 'nullable|string',
            'wind_naic_code' => 'nullable|string',
            'wind_policy_number' => 'nullable|string',

            'insured_name' => 'required|string',
            'insured_address' => 'required|string',
            'insured_city' => 'required|string',
            'insured_state' => 'required|string',
            'insured_zipcode' => 'required|string',
            'insured_dob' => 'nullable|string',
            'insured_fein' => 'nullable|string',
            'insured_marital_status' => 'nullable|string',
            'insured_phone_primary' => 'nullable|string',
            'insured_phone_primary_type' => 'nullable|string|in:home,cell,bus',
            'insured_phone_secondary' => 'nullable|string',
            'insured_phone_secondary_type' => 'nullable|string|in:home,cell,bus',
            'insured_email_primary' => 'nullable|string',
            'insured_email_secondary' => 'nullable|string',

            'spouse_name' => 'nullable|string',
            'spouse_address' => 'nullable|string',
            'spouse_city' => 'nullable|string',
            'spouse_state' => 'nullable|string',
            'spouse_zipcode' => 'nullable|string',
            'spouse_dob' => 'nullable|string',
            'spouse_fein' => 'nullable|string',
            'spouse_marital_status' => 'nullable|string',
            'spouse_phone_primary' => 'nullable|string',
            'spouse_phone_primary_type' => 'nullable|string|in:home,cell,bus',
            'spouse_phone_secondary' => 'nullable|string',
            'spouse_phone_secondary_type' => 'nullable|string|in:home,cell,bus',
            'spouse_email_primary' => 'nullable|string',
            'spouse_email_secondary' => 'nullable|string',

            'contact_name' => 'nullable|string',
            'contact_address' => 'nullable|string',
            'contact_city' => 'nullable|string',
            'contact_state' => 'nullable|string',
            'contact_zipcode' => 'nullable|string',
            'contact_phone_primary' => 'nullable|string',
            'contact_phone_primary_type' => 'nullable|string|in:home,cell,bus',
            'contact_phone_secondary' => 'nullable|string',
            'contact_phone_secondary_type' => 'nullable|string|in:home,cell,bus',
            'contact_email_primary' => 'nullable|string',
            'contact_email_secondary' => 'nullable|string',
            'contact_when' => 'nullable|string',

            'loss_location' => 'nullable|string',
            'loss_police_contact' => 'nullable|string',
            'loss_address' => 'nullable|string',
            'loss_city' => 'nullable|string',
            'loss_state' => 'nullable|string',
            'loss_zipcode' => 'nullable|string',
            'loss_police_report' => 'nullable|string',
            'loss_country' => 'nullable|string',
            'loss_type' => 'required|string',
            'loss_type_other' => 'required_if:loss_type,other|string',
            'loss_amount' => 'required|string',
            'loss_description' => 'required|string',
            'report_by' => 'required|string',
            'report_to' => 'required|string',
        ]);


        if ($validator->fails()) {

            return redirect()->back()->withErrors(['error' => $validator->errors()]);
        }

        DB::beginTransaction();

        try {

            // Store main invoice payment
            $invoicePayment = PropertyLoss::create([
                'client_id' => $request->client_id,
                'invoice_no' => $request->invoice_no,
                'invoice_date' => $request->invoice_date,

                // Agency Info
                'agency_name' => $request->agency_name,
                'agency_phone' => $request->agency_phone,
                'agency_fax' => $request->agency_fax,
                'agency_email' => $request->agency_email,
                'agency_address' => $request->agency_address,
                'agency_city' => $request->agency_city,
                'agency_state' => $request->agency_state,
                'agency_zipcode' => $request->agency_zipcode,
                'agency_contact_name' => $request->agency_contact_name,
                'agency_code' => $request->agency_code,
                'agency_subcode' => $request->agency_subcode,
                'agency_customer_id' => $request->agency_customer_id,

                // Property Info
                'location_code' => $request->location_code,
                'date_of_loss' => $request->date_of_loss,
                'time_of_loss' => $request->time_of_loss,

                'property_carrier' => $request->property_carrier,
                'property_naic_code' => $request->property_naic_code,
                'property_policy_number' => $request->property_policy_number,
                'property_business' => $request->property_business,

                'flood_carrier' => $request->flood_carrier,
                'flood_naic_code' => $request->flood_naic_code,
                'flood_policy_number' => $request->flood_policy_number,

                'wind_carrier' => $request->wind_carrier,
                'wind_naic_code' => $request->wind_naic_code,
                'wind_policy_number' => $request->wind_policy_number,

                // Insured Info
                'insured_name' => $request->insured_name,
                'insured_address' => $request->insured_address,
                'insured_city' => $request->insured_city,
                'insured_state' => $request->insured_state,
                'insured_zipcode' => $request->insured_zipcode,
                'insured_dob' => $request->insured_dob,
                'insured_fein' => $request->insured_fein,
                'insured_marital_status' => $request->insured_marital_status,
                'insured_phone_primary' => $request->insured_phone_primary,
                'insured_phone_primary_type' => $request->insured_phone_primary_type,
                'insured_phone_secondary' => $request->insured_phone_secondary,
                'insured_phone_secondary_type' => $request->insured_phone_secondary_type,
                'insured_email_primary' => $request->insured_email_primary,
                'insured_email_secondary' => $request->insured_email_secondary,

                // Spouse Info
                'spouse_name' => $request->spouse_name,
                'spouse_address' => $request->spouse_address,
                'spouse_city' => $request->spouse_city,
                'spouse_state' => $request->spouse_state,
                'spouse_zipcode' => $request->spouse_zipcode,
                'spouse_dob' => $request->spouse_dob,
                'spouse_fein' => $request->spouse_fein,
                'spouse_marital_status' => $request->spouse_marital_status,
                'spouse_phone_primary' => $request->spouse_phone_primary,
                'spouse_phone_primary_type' => $request->spouse_phone_primary_type,
                'spouse_phone_secondary' => $request->spouse_phone_secondary,
                'spouse_phone_secondary_type' => $request->spouse_phone_secondary_type,
                'spouse_email_primary' => $request->spouse_email_primary,
                'spouse_email_secondary' => $request->spouse_email_secondary,

                // Contact Info
                'contact_name' => $request->contact_name,
                'contact_address' => $request->contact_address,
                'contact_city' => $request->contact_city,
                'contact_state' => $request->contact_state,
                'contact_zipcode' => $request->contact_zipcode,
                'contact_phone_primary' => $request->contact_phone_primary,
                'contact_phone_primary_type' => $request->contact_phone_primary_type,
                'contact_phone_secondary' => $request->contact_phone_secondary,
                'contact_phone_secondary_type' => $request->contact_phone_secondary_type,
                'contact_email_primary' => $request->contact_email_primary,
                'contact_email_secondary' => $request->contact_email_secondary,
                'contact_when' => $request->contact_when,

                // Loss Info
                'loss_location' => $request->loss_location,
                'loss_police_contact' => $request->loss_police_contact,
                'loss_address' => $request->loss_address,
                'loss_city' => $request->loss_city,
                'loss_state' => $request->loss_state,
                'loss_zipcode' => $request->loss_zipcode,
                'loss_police_report' => $request->loss_police_report,
                'loss_country' => $request->loss_country,
                'loss_type' => $request->loss_type,
                'loss_type_other' => $request->loss_type_other,
                'loss_amount' => $request->loss_amount,
                'loss_description' => $request->loss_description,

                // Report
                'report_by' => $request->report_by,
                'report_to' => $request->report_to,

                'created_by' => auth()->user()->id,
            ]);


            DB::commit();
            return redirect()->back()->with('success', 'Property Loss created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function CreatePropertyInsuranceForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.property_insurance.create', compact('clientPolicy', 'insuranceCompanies'));
    }

    public function storePropertyInsurance(Request $request)
    {

//        dd($request->all());
        // Validate the incoming request data

        $validator = Validator::make($request->all(), [
            'client_id' => 'required|integer',
            'invoice_date' => 'required|string',

            'producer_name' => 'nullable|string',
            'producer_phone' => 'nullable|string',
            'producer_fax' => 'nullable|string',
            'producer_address' => 'nullable|string',
            'producer_city' => 'nullable|string',
            'producer_state' => 'nullable|string',
            'producer_zipcode' => 'nullable|string',

            'contact_name' => 'nullable|string',
            'contact_phone_no' => 'nullable|string',
            'contact_fax_no' => 'nullable|string',
            'contact_email' => 'nullable|string',
            'producer_customer_id' => 'nullable|string',

            'insurer_a' => 'nullable|string',
            'insurer_a_naic' => 'nullable|string',
            'insurer_b' => 'nullable|string',
            'insurer_b_naic' => 'nullable|string',
            'insurer_c' => 'nullable|string',
            'insurer_c_naic' => 'nullable|string',
            'insurer_d' => 'nullable|string',
            'insurer_d_naic' => 'nullable|string',
            'insurer_e' => 'nullable|string',
            'insurer_e_naic' => 'nullable|string',
            'insurer_f' => 'nullable|string',
            'insurer_f_naic' => 'nullable|string',

            'insured_name' => 'nullable|string',
            'insured_address' => 'nullable|string',
            'insured_city' => 'nullable|string',
            'insured_state' => 'nullable|string',
            'insured_zipcode' => 'nullable|string',
            'insured_phone' => 'nullable|string',
            'insured_fax' => 'nullable|string',

            'certificate_no' => 'nullable|string',
            'revision_no' => 'nullable|string',

            'property_description' => 'nullable|string',
            'property_causes_loss' => 'nullable|string',
            'property_deductible' => 'nullable|string',
            'property_policy_number' => 'nullable|string',
            'property_effective_date' => 'nullable|string',
            'property_expiration_date' => 'nullable|string',

            'property_coverage_building' => 'nullable|string',
            'property_coverage_personal' => 'nullable|string',
            'property_coverage_income' => 'nullable|string',
            'property_coverage_expense' => 'nullable|string',
            'property_coverage_rental' => 'nullable|string',
            'property_coverage_b_building' => 'nullable|string',
            'property_coverage_b_prop' => 'nullable|string',
            'property_coverage_b_pp' => 'nullable|string',

            'property_coverage_other_one' => 'nullable|string',
            'property_coverage_other_two' => 'nullable|string',
            'property_coverage_building_limit' => 'nullable|string',
            'property_coverage_personal_limit' => 'nullable|string',
            'property_coverage_income_limit' => 'nullable|string',
            'property_coverage_expense_limit' => 'nullable|string',
            'property_coverage_rental_limit' => 'nullable|string',
            'property_coverage_other_one_limit' => 'nullable|string',
            'property_coverage_other_two_limit' => 'nullable|string',

            'property_basic' => 'nullable|string',
            'property_broad' => 'nullable|string',
            'property_special' => 'nullable|string',
            'property_contents' => 'nullable|string',
            'property_building' => 'nullable|string',
            'property_earthquake' => 'nullable|string',
            'property_wind' => 'nullable|string',
            'property_flood' => 'nullable|string',
            'property_other_one' => 'nullable|string',
            'property_other_two' => 'nullable|string',

            'inland_causes' => 'nullable|string',
            'inland_policy_type' => 'nullable|string',
            'inland_policy_effective_date' => 'nullable|string',
            'inland_policy_expiration_date' => 'nullable|string',
            'inland_policy_number' => 'nullable|string',
            'inland_coverage_one' => 'nullable|string',
            'inland_coverage_two' => 'nullable|string',
            'inland_coverage_three' => 'nullable|string',
            'inland_coverage_four' => 'nullable|string',
            'inland_coverage_one_limit' => 'nullable|string',
            'inland_coverage_two_limit' => 'nullable|string',
            'inland_coverage_three_limit' => 'nullable|string',
            'inland_coverage_four_limit' => 'nullable|string',

            'crime_policy_type' => 'nullable|string',
            'crime_policy_number' => 'nullable|string',
            'crime_effective_date' => 'nullable|string',
            'crime_expiration_date' => 'nullable|string',
            'crime_coverage_one' => 'nullable|string',
            'crime_coverage_two' => 'nullable|string',
            'crime_coverage_three' => 'nullable|string',
            'crime_coverage_one_limit' => 'nullable|string',
            'crime_coverage_two_limit' => 'nullable|string',
            'crime_coverage_three_limit' => 'nullable|string',

            'machinery_policy_number' => 'nullable|string',
            'machinery_effective_date' => 'nullable|string',
            'machinery_expiration_date' => 'nullable|string',
            'machinery_coverage_one' => 'nullable|string',
            'machinery_coverage_two' => 'nullable|string',
            'machinery_coverage_one_limit' => 'nullable|string',
            'machinery_coverage_two_limit' => 'nullable|string',

            'other_type' => 'nullable|string',
            'other_policy_number' => 'nullable|string',
            'other_effective_date' => 'nullable|string',
            'other_expiration_date' => 'nullable|string',
            'other_coverage_one' => 'nullable|string',
            'other_coverage_two' => 'nullable|string',
            'other_coverage_one_limit' => 'nullable|string',
            'other_coverage_two_limit' => 'nullable|string',

            'special_condition' => 'nullable|string',
            'certificate_holder' => 'nullable|string',
            'authorize_representative' => 'nullable|string',
        ]);


        if ($validator->fails()) {

            return redirect()->back()->withErrors(['error' => $validator->errors()]);
        }

        DB::beginTransaction();

        try {


            // Store main invoice payment
            $propertyInsurance = new PropertyInsurance();

// STEP 1: Basic Info
            $propertyInsurance->fill([
                'client_id' => $request->client_id,
                'invoice_no' => $request->invoice_no,
                'invoice_date' => $request->invoice_date,
                'created_by' => auth()->user()->id,
            ]);
            $propertyInsurance->save();

// STEP 2: Agency Info
            $propertyInsurance->fill([
                'producer_name' => $request->producer_name,
                'producer_phone' => $request->producer_phone,
                'producer_fax' => $request->producer_fax,
                'producer_address' => $request->producer_address,
                'producer_city' => $request->producer_city,
                'producer_state' => $request->producer_state,
                'producer_zipcode' => $request->producer_zipcode,

                'contact_name' => $request->contact_name,
                'contact_phone_no' => $request->contact_phone_no,
                'contact_fax_no' => $request->contact_fax_no,
                'contact_email' => $request->contact_email,
                'producer_customer_id' => $request->producer_customer_id,
            ]);
            $propertyInsurance->save();

// STEP 3: Insured Info
            $propertyInsurance->fill([
                'insured_name' => $request->insured_name,
                'insured_phone' => $request->insured_phone,
                'insured_fax' => $request->insured_fax,
                'insured_address' => $request->insured_address,
                'insured_city' => $request->insured_city,
                'insured_state' => $request->insured_state,
                'insured_zipcode' => $request->insured_zipcode,
            ]);
            $propertyInsurance->save();

// STEP 4: Insurer Info
            $propertyInsurance->fill([
                'insurer_a' => $request->insurer_a,
                'insurer_a_naic' => $request->insurer_a_naic,
                'insurer_b' => $request->insurer_b,
                'insurer_b_naic' => $request->insurer_b_naic,
                'insurer_c' => $request->insurer_c,
                'insurer_c_naic' => $request->insurer_c_naic,
                'insurer_d' => $request->insurer_d,
                'insurer_d_naic' => $request->insurer_d_naic,
                'insurer_e' => $request->insurer_e,
                'insurer_e_naic' => $request->insurer_e_naic,
                'insurer_f' => $request->insurer_f,
                'insurer_f_naic' => $request->insurer_f_naic,
            ]);
            $propertyInsurance->save();

// STEP 5: General Info
            $propertyInsurance->fill([
                'coverages' => $request->coverages,
                'certificate_no' => $request->certificate_no,
                'revision_no' => $request->revision_no,
                'property_description' => $request->property_description,
            ]);
            $propertyInsurance->save();

// STEP 6: Property Policy
            $propertyInsurance->fill([
                'property_causes_loss' => $request->property_causes_loss,
                'property_deductible' => $request->property_deductible,
                'property_building' => $request->property_building,
                'property_contents' => $request->property_contents,
                'property_basic' => $request->property_basic,
                'property_broad' => $request->property_broad,
                'property_special' => $request->property_special,
                'property_earthquake' => $request->property_earthquake,
                'property_wind' => $request->property_wind,
                'property_flood' => $request->property_flood,
                'property_other_one' => $request->property_other_one,
                'property_other_two' => $request->property_other_two,
                'property_policy_number' => $request->property_policy_number,
                'property_effective_date' => $request->property_effective_date,
                'property_expiration_date' => $request->property_expiration_date,
            ]);
            $propertyInsurance->save();

// STEP 7: Property Coverage Limits
            $propertyInsurance->fill([
                'property_coverage_building' => $request->property_coverage_building,
                'property_coverage_building_limit' => $request->property_coverage_building_limit,
                'property_coverage_personal' => $request->property_coverage_personal,
                'property_coverage_personal_limit' => $request->property_coverage_personal_limit,
                'property_coverage_income' => $request->property_coverage_income,
                'property_coverage_income_limit' => $request->property_coverage_income_limit,
                'property_coverage_expense' => $request->property_coverage_expense,
                'property_coverage_expense_limit' => $request->property_coverage_expense_limit,
                'property_coverage_rental' => $request->property_coverage_rental,
                'property_coverage_rental_limit' => $request->property_coverage_rental_limit,
                'property_coverage_b_building' => $request->property_coverage_b_building,
                'property_coverage_b_building_limit' => $request->property_coverage_b_building_limit,
                'property_coverage_b_prop' => $request->property_coverage_b_prop,
                'property_coverage_b_prop_limit' => $request->property_coverage_b_prop_limit,
                'property_coverage_b_pp' => $request->property_coverage_b_pp,
                'property_coverage_b_pp_limit' => $request->property_coverage_b_pp_limit,
                'property_coverage_other_one' => $request->property_coverage_other_one,
                'property_coverage_other_one_limit' => $request->property_coverage_other_one_limit,
                'property_coverage_other_two' => $request->property_coverage_other_two,
                'property_coverage_other_two_limit' => $request->property_coverage_other_two_limit,
            ]);
            $propertyInsurance->save();

// STEP 8: Inland Coverage
            $propertyInsurance->fill([
                'inland_causes' => $request->inland_causes,
                'inland_perils' => $request->inland_perils,
                'inland_other' => $request->inland_other,
                'inland_policy_type' => $request->inland_policy_type,
                'inland_policy_number' => $request->inland_policy_number,
                'inland_policy_effective_date' => $request->inland_policy_effective_date,
                'inland_policy_expiration_date' => $request->inland_policy_expiration_date,
                'inland_coverage_one' => $request->inland_coverage_one,
                'inland_coverage_one_limit' => $request->inland_coverage_one_limit,
                'inland_coverage_two' => $request->inland_coverage_two,
                'inland_coverage_two_limit' => $request->inland_coverage_two_limit,
                'inland_coverage_three' => $request->inland_coverage_three,
                'inland_coverage_three_limit' => $request->inland_coverage_three_limit,
                'inland_coverage_four' => $request->inland_coverage_four,
                'inland_coverage_four_limit' => $request->inland_coverage_four_limit,
            ]);
            $propertyInsurance->save();

// STEP 9: Crime Coverage
            $propertyInsurance->fill([
                'crime_policy_type' => $request->crime_policy_type,
                'crime_policy_number' => $request->crime_policy_number,
                'crime_effective_date' => $request->crime_effective_date,
                'crime_expiration_date' => $request->crime_expiration_date,
                'crime_coverage_one' => $request->crime_coverage_one,
                'crime_coverage_one_limit' => $request->crime_coverage_one_limit,
                'crime_coverage_two' => $request->crime_coverage_two,
                'crime_coverage_two_limit' => $request->crime_coverage_two_limit,
                'crime_coverage_three' => $request->crime_coverage_three,
                'crime_coverage_three_limit' => $request->crime_coverage_three_limit,
            ]);
            $propertyInsurance->save();

// STEP 10: Machinery Coverage
            $propertyInsurance->fill([
                'machinery_policy_number' => $request->machinery_policy_number,
                'machinery_effective_date' => $request->machinery_effective_date,
                'machinery_expiration_date' => $request->machinery_expiration_date,
                'machinery_coverage_one' => $request->machinery_coverage_one,
                'machinery_coverage_one_limit' => $request->machinery_coverage_one_limit,
                'machinery_coverage_two' => $request->machinery_coverage_two,
                'machinery_coverage_two_limit' => $request->machinery_coverage_two_limit,
            ]);
            $propertyInsurance->save();

// STEP 11: Other Coverage
            $propertyInsurance->fill([
                'other_type' => $request->other_type,
                'other_policy_number' => $request->other_policy_number,
                'other_effective_date' => $request->other_effective_date,
                'other_expiration_date' => $request->other_expiration_date,
                'other_coverage_one' => $request->other_coverage_one,
                'other_coverage_one_limit' => $request->other_coverage_one_limit,
                'other_coverage_two' => $request->other_coverage_two,
                'other_coverage_two_limit' => $request->other_coverage_two_limit,
            ]);
            $propertyInsurance->save();

// STEP 12: Final Report Info
            $propertyInsurance->fill([
                'special_condition' => $request->special_condition,
                'certificate_holder' => $request->certificate_holder,
                'authorize_representative' => $request->authorize_representative,
            ]);
            $propertyInsurance->save();


            DB::commit();
            return redirect()->back()->with('success', 'Property Insurance created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function CreateLiabilityInsuranceForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.liability_insurance.create', compact('clientPolicy', 'insuranceCompanies'));
    }

    public function storeLiabilityInsurance(Request $request)
    {

        // Validate the incoming request data

        $validator = Validator::make($request->all(), [
            'client_id' => 'required|integer',
            'invoice_date' => 'required|string',

            'producer_name' => 'nullable|string',
            'producer_phone' => 'nullable|string',
            'producer_fax' => 'nullable|string',
            'producer_address' => 'nullable|string',
            'producer_city' => 'nullable|string',
            'producer_state' => 'nullable|string',
            'producer_zipcode' => 'nullable|string',

            'contact_name' => 'nullable|string',
            'contact_phone_no' => 'nullable|string',
            'contact_fax_no' => 'nullable|string',
            'contact_email' => 'nullable|string',
            'producer_customer_id' => 'nullable|string',

            'insurer_a' => 'nullable|string',
            'insurer_a_naic' => 'nullable|string',
            'insurer_b' => 'nullable|string',
            'insurer_b_naic' => 'nullable|string',
            'insurer_c' => 'nullable|string',
            'insurer_c_naic' => 'nullable|string',
            'insurer_d' => 'nullable|string',
            'insurer_d_naic' => 'nullable|string',
            'insurer_e' => 'nullable|string',
            'insurer_e_naic' => 'nullable|string',
            'insurer_f' => 'nullable|string',
            'insurer_f_naic' => 'nullable|string',

            'insured_name' => 'nullable|string',
            'insured_address' => 'nullable|string',
            'insured_city' => 'nullable|string',
            'insured_state' => 'nullable|string',
            'insured_zipcode' => 'nullable|string',
            'insured_phone' => 'nullable|string',
            'insured_fax' => 'nullable|string',

            'certificate_no' => 'nullable|string',
            'revision_no' => 'nullable|string',

            'commercial_claim' => 'nullable|string',
            'commercial_occur' => 'nullable|string',
            'commercial_other_one' => 'nullable|string',
            'commercial_other_two' => 'nullable|string',
            'commercial_addl' => 'nullable|string',
            'commercial_subr' => 'nullable|string',
            'commercial_policy_number' => 'nullable|string',
            'commercial_effective_date' => 'nullable|string',
            'commercial_expiration_date' => 'nullable|string',
            'commercial_each_occurrence' => 'nullable|string',
            'commercial_damage' => 'nullable|string',
            'commercial_expense' => 'nullable|string',
            'commercial_each_occurrence_limit' => 'nullable|string',
            'commercial_damage_limit' => 'nullable|string',
            'commercial_expense_limit' => 'nullable|string',
            'commercial_injury_limit' => 'nullable|string',
            'commercial_general_aggregate_limit' => 'nullable|string',
            'commercial_general_product_limit' => 'nullable|string',
            'commercial_general_other_limit' => 'nullable|string',

            'automobile_any' => 'nullable|string',
            'automobile_own' => 'nullable|string',
            'automobile_schedule' => 'nullable|string',
            'automobile_hired' => 'nullable|string',
            'automobile_non_own' => 'nullable|string',
            'automobile_other_one' => 'nullable|string',
            'automobile_other_two' => 'nullable|string',
            'automobile_addl' => 'nullable|string',
            'automobile_subr' => 'nullable|string',
            'automobile_policy_number' => 'nullable|string',
            'automobile_effective_date' => 'nullable|string',
            'automobile_expiration_date' => 'nullable|string',
            'automobile_combine' => 'nullable|string',
            'automobile_injury_person' => 'nullable|string',
            'automobile_injury_accident' => 'nullable|string',
            'automobile_property_damage' => 'nullable|string',
            'automobile_other' => 'nullable|string',
            'automobile_combine_limit' => 'nullable|string',
            'automobile_injury_person_limit' => 'nullable|string',
            'automobile_injury_accident_limit' => 'nullable|string',
            'automobile_property_damage_limit' => 'nullable|string',
            'automobile_other_limit' => 'nullable|string',

            'umbrella' => 'nullable|string',
            'umbrella_occur' => 'nullable|string',
            'umbrella_excess' => 'nullable|string',
            'umbrella_claim' => 'nullable|string',
            'umbrella_ded' => 'nullable|string',
            'umbrella_retention' => 'nullable|string',
            'umbrella_addl' => 'nullable|string',
            'umbrella_subr' => 'nullable|string',
            'umbrella_policy_number' => 'nullable|string',
            'umbrella_effective_date' => 'nullable|string',
            'umbrella_expiration_date' => 'nullable|string',
            'umbrella_each_occurrence' => 'nullable|string',
            'umbrella_aggregate' => 'nullable|string',
            'umbrella_aggregate_other' => 'nullable|string',
            'umbrella_each_occurrence_limit' => 'nullable|string',
            'umbrella_aggregate_limit' => 'nullable|string',
            'umbrella_aggregate_other_limit' => 'nullable|string',


            'compensation' => 'nullable|string',
            'compensation_addl' => 'nullable|string',
            'compensation_subr' => 'nullable|string',
            'compensation_policy_number' => 'nullable|string',
            'compensation_effective_date' => 'nullable|string',
            'compensation_expiration_date' => 'nullable|string',
            'compensation_per_stat' => 'nullable|string',
            'compensation_other' => 'nullable|string',
            'compensation_each_accident' => 'nullable|string',
            'compensation_disease_employee' => 'nullable|string',
            'compensation_disease_policy' => 'nullable|string',
            'compensation_per_stat_limit' => 'nullable|string',
            'compensation_each_accident_limit' => 'nullable|string',
            'compensation_disease_employee_limit' => 'nullable|string',
            'compensation_disease_policy_limit' => 'nullable|string',

            'special_condition' => 'nullable|string',
            'certificate_holder' => 'nullable|string',
            'authorize_representative' => 'nullable|string',
        ]);


        if ($validator->fails()) {

            return redirect()->back()->withErrors(['error' => $validator->errors()]);
        }

        DB::beginTransaction();

        try {

//            dd($request->all());
            $dbData = [
                "client_id" => $request->client_id,
                "invoice_date" => $request->invoice_date,
                "contact_name" => $request->contact_name,
                "producer_name" => $request->producer_name,
                "contact_phone_no" => $request->contact_phone_no,
                "contact_fax_no" => $request->contact_fax_no,
                "producer_address" => $request->producer_address,
                "contact_email" => $request->contact_email,
                "producer_customer_id" => $request->producer_customer_id,
                "producer_city" => $request->producer_city,
                "producer_state" => $request->producer_state,
                "producer_zipcode" => $request->producer_zipcode,
                "insurer_a" => $request->insurer_a,
                "insurer_a_naic" => $request->insurer_a_naic,
                "insured_name" => $request->insured_name,
                "insurer_b" => $request->insurer_b,
                "insurer_b_naic" => $request->insurer_b_naic,
                "insured_address" => $request->insured_address,
                "insurer_c" => $request->insurer_c,
                "insurer_c_naic" => $request->insurer_c_naic,
                "insurer_d" => $request->insurer_d,
                "insurer_d_naic" => $request->insurer_d_naic,
                "insured_city" => $request->insured_city,
                "insured_state" => $request->insured_state,
                "insured_zipcode" => $request->insured_zipcode,
                "insurer_e" => $request->insurer_e,
                "insurer_e_naic" => $request->insurer_e_naic,
                "insurer_f" => $request->insurer_f,
                "insurer_f_naic" => $request->insurer_f_naic,
                "certificate_no" => $request->certificate_no,
                "revision_no" => $request->revision_no,
                "commercial_claim" => $request->commercial_claim,
                "commercial_occur" => $request->commercial_occur,
                "commercial_other_one" => $request->commercial_other_one,
                "commercial_other_two" => $request->commercial_other_two,
                "commercial_aggregate_policy" => $request->commercial_aggregate_policy,
                "commercial_aggregate_project" => $request->commercial_aggregate_project,
                "commercial_aggregate_loc" => $request->commercial_aggregate_loc,
                "commercial_aggregate_other" => $request->commercial_aggregate_other,

                "commercial_addl" => $request->commercial_addl,
                "commercial_subr" => $request->commercial_subr,
                "commercial_policy_number" => $request->commercial_policy_number,
                "commercial_effective_date" => $request->commercial_effective_date,
                "commercial_expiration_date" => $request->commercial_expiration_date,

                "commercial_each_occurrence" => $request->commercial_each_occurrence,
                "commercial_damage" => $request->commercial_damage,
                "commercial_expense" => $request->commercial_expense,
                "commercial_injury" => $request->commercial_injury,
                "commercial_general_aggregate" => $request->commercial_general_aggregate,
                "commercial_general_product" => $request->commercial_general_product,
                "commercial_general_other" => $request->commercial_general_other,

                "commercial_each_occurrence_limit" => $request->commercial_each_occurrence_limit,
                "commercial_damage_limit" => $request->commercial_damage_limit,
                "commercial_expense_limit" => $request->commercial_expense_limit,
                "commercial_injury_limit" => $request->commercial_injury_limit,
                "commercial_general_aggregate_limit" => $request->commercial_general_aggregate_limit,
                "commercial_general_product_limit" => $request->commercial_general_product_limit,
                "commercial_general_other_limit" => $request->commercial_general_other_limit,

                "automobile_any" => $request->automobile_any,
                "automobile_own" => $request->automobile_own,
                "automobile_schedule" => $request->automobile_schedule,
                "automobile_hired" => $request->automobile_hired,
                "automobile_non_own" => $request->automobile_non_own,
                "automobile_other_one" => $request->automobile_other_one,
                "automobile_other_two" => $request->automobile_other_two,

                "automobile_addl" => $request->automobile_addl,
                "automobile_subr" => $request->automobile_subr,
                "automobile_policy_number" => $request->automobile_policy_number,
                "automobile_effective_date" => $request->automobile_effective_date,
                "automobile_expiration_date" => $request->automobile_expiration_date,

                "automobile_combine" => $request->automobile_combine,
                "automobile_injury_person" => $request->automobile_injury_person,
                "automobile_injury_accident" => $request->automobile_injury_accident,
                "automobile_property_damage" => $request->automobile_property_damage,
                "automobile_other" => $request->automobile_other,

                "automobile_combine_limit" => $request->automobile_combine_limit,
                "automobile_injury_person_limit" => $request->automobile_injury_person_limit,
                "automobile_injury_accident_limit" => $request->automobile_injury_accident_limit,
                "automobile_property_damage_limit" => $request->automobile_property_damage_limit,
                "automobile_other_limit" => $request->automobile_other_limit,

                "umbrella" => $request->umbrella,
                "umbrella_occur" => $request->umbrella_occur,
                "umbrella_excess" => $request->umbrella_excess,
                "umbrella_claim" => $request->umbrella_claim,
                "umbrella_ded" => $request->umbrella_ded,
                "umbrella_retention" => $request->umbrella_retention,

                "umbrella_addl" => $request->umbrella_addl,
                "umbrella_subr" => $request->umbrella_subr,
                "umbrella_policy_number" => $request->umbrella_policy_number,
                "umbrella_effective_date" => $request->umbrella_effective_date,
                "umbrella_expiration_date" => $request->umbrella_expiration_date,

                "umbrella_each_occurrence" => $request->umbrella_each_occurrence,
                "umbrella_aggregate" => $request->umbrella_aggregate,
                "umbrella_aggregate_other" => $request->umbrella_aggregate_other,

                "umbrella_each_occurrence_limit" => $request->umbrella_each_occurrence_limit,
                "umbrella_aggregate_limit" => $request->umbrella_aggregate_limit,
                "umbrella_aggregate_other_limit" => $request->umbrella_aggregate_other_limit,

                "compensation" => $request->compensation,
                "compensation_addl" => $request->compensation_addl,
                "compensation_subr" => $request->compensation_subr,
                "compensation_policy_number" => $request->compensation_policy_number,
                "compensation_effective_date" => $request->compensation_effective_date,
                "compensation_expiration_date" => $request->compensation_expiration_date,

                "compensation_per_stat" => $request->compensation_per_stat,
                "compensation_other" => $request->compensation_other,
                "compensation_each_accident" => $request->compensation_each_accident,
                "compensation_disease_employee" => $request->compensation_disease_employee,
                "compensation_disease_policy" => $request->compensation_disease_policy,
                "compensation_per_stat_limit" => $request->compensation_per_stat_limit,

                "compensation_each_accident_limit" => $request->compensation_each_accident_limit,
                "compensation_disease_employee_limit" => $request->compensation_disease_employee_limit,
                "compensation_disease_policy_limit" => $request->compensation_disease_policy_limit,

                "special_condition" => $request->special_condition,
                "certificate_holder" => $request->certificate_holder,
                "authorize_representative" => $request->authorize_representative,
                'created_by' => auth()->user()->id,
            ];


            LiabilityInsurance::create($dbData);


            DB::commit();
            return redirect()->back()->with('success', 'Property Insurance created successfully.');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function CreateInsuranceCardForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();

        return view('admin.clientForms.insurance_card.create', compact('clientPolicy'));
    }

    public function storeInsuranceCardForm(Request $request)
    {

//        dd($request->all());
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
            'company_number' => 'required',
            'company_name' => 'required',
            'type' => 'required',
            'policy_number' => 'required',
            'effective_date' => 'required',
            'expiration_date' => 'required',
            'year' => 'required',
            'make' => 'required',
            'vehicle_number' => 'required',
            'agency_name' => 'required',
            'agency_address' => 'required',
            'agency_city' => 'required',
            'agency_state' => 'required',
            'agency_zipcode' => 'required',

            'insured_name' => 'required',
            'insured_address' => 'required',
            'insured_city' => 'required',
            'insured_state' => 'required',
            'insured_zipcode' => 'required',

        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Start database transaction
        DB::beginTransaction();

        try {

            $insuranceCardForm = InsuranceCard::create([
                'client_id' => $request->client_id,
                'company_number' => $request->company_number,
                'company_name' => $request->company_name,
                'type' => $request->type,
                'policy_number' => $request->policy_number,
                'effective_date' => $request->effective_date,
                'expiration_date' => $request->expiration_date,
                'year' => $request->year,
                'make' => $request->make,
                'vehicle_number' => $request->vehicle_number,
                'agency_name' => $request->agency_name,
                'agency_address' => $request->agency_address,
                'agency_city' => $request->agency_city,
                'agency_state' => $request->agency_state,
                'agency_zipcode' => $request->agency_zipcode,
                'insured_name' => $request->insured_name,
                'insured_address' => $request->insured_address,
                'insured_city' => $request->insured_city,
                'insured_state' => $request->insured_state,
                'insured_zipcode' => $request->insured_zipcode,

                'created_by' => auth()->user()->id,
            ]);

            // Check if the data was successfully created
            if ($insuranceCardForm) {
                DB::commit();
                return redirect()->back()->with('success', 'Form submitted successfully!');
            } else {
                DB::rollback();
                return redirect()->back()->withErrors(['error' => 'Failed to create the record.']);
            }

        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function CreateGeneralLiabilityForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();

        return view('admin.clientForms.general_liability.create', compact('clientPolicy'));
    }

    public function storeGeneralLiabilityForm(Request $request)
    {
        // Optional: Validate data here if needed

        DB::beginTransaction();

        try {
            // Directly insert all request data
            $form = GeneralLiability::create($request->all());

            DB::commit();
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function CreateInsuranceApplicationForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();

        return view('admin.clientForms.insurance_application.create', compact('clientPolicy'));
    }

    public function storeInsuranceApplicationForm(Request $request)
    {
        // Optional: Validate data here if needed

//        dd($request->all());
        DB::beginTransaction();

        try {
            // Directly insert all request data

            $insuranceApplication = InsuranceApplication::create([
                'client_id' => $request->client_id,

                'invoice_date' => $request->invoice_date,
                'agency_name' => $request->agency_name,
                'agency_address' => $request->agency_address,
                'agency_city' => $request->agency_city,
                'agency_state' => $request->agency_state,
                'agency_zipcode' => $request->agency_zipcode,

                'contact_name' => $request->contact_name,
                'contact_phone_no' => $request->contact_phone_no,
                'contact_fax_no' => $request->contact_fax_no,
                'contact_email' => $request->contact_email,
                'code' => $request->code,
                'sub_code' => $request->sub_code,
                'producer_customer_id' => $request->producer_customer_id,

                'carrier' => $request->carrier,
                'naic_code' => $request->naic_code,
                'program_name' => $request->program_name,
                'program_code' => $request->program_code,
                'policy_number' => $request->policy_number,
                'under_writer' => $request->under_writer,
                'under_writer_office' => $request->under_writer_office,

                'status_quote' => $request->status_quote,
                'status_bound' => $request->status_bound,
                'status_change' => $request->status_change,
                'status_cancel' => $request->status_cancel,
                'status_issue_policy' => $request->status_issue_policy,
                'status_renew' => $request->status_renew,
                'status_date' => $request->status_date,
                'status_time' => $request->status_time,

                'signature_notice' => $request->signature_notice,
                'applicant' => $request->applicant,
                'procedure_signature' => $request->procedure_signature,
                'procedure_name' => $request->procedure_name,
                'procedure_license' => $request->procedure_license,
                'applicant_signature' => $request->applicant_signature,
                'applicant_date' => $request->applicant_date,
                'procedure_no' => $request->procedure_no,
                'created_by' => $request->created_by,
            ]);

            $insuranceApplicationId = $insuranceApplication->id;
            InsuranceApplicationBusiness::create([
                'insurance_application_id' => $insuranceApplicationId,

                'business_boiler' => $request->business_boiler,
                'business_boiler_limit' => $request->business_boiler_limit,

                'business_auto' => $request->business_auto,
                'business_auto_limit' => $request->business_auto_limit,

                'business_owner' => $request->business_owner,
                'business_owner_limit' => $request->business_owner_limit,

                'business_commercial_gl' => $request->business_commercial_gl,
                'business_commercial_gl_limit' => $request->business_commercial_gl_limit,

                'business_inland' => $request->business_inland,
                'business_inland_limit' => $request->business_inland_limit,

                'business_property' => $request->business_property,
                'business_property_limit' => $request->business_property_limit,

                'business_crime' => $request->business_crime,
                'business_crime_limit' => $request->business_crime_limit,

                'business_cyber' => $request->business_cyber,
                'business_cyber_limit' => $request->business_cyber_limit,

                'business_fiduciary' => $request->business_fiduciary,
                'business_fiduciary_limit' => $request->business_fiduciary_limit,

                'business_garage' => $request->business_garage,
                'business_garage_limit' => $request->business_garage_limit,

                'business_liquor' => $request->business_liquor,
                'business_liquor_limit' => $request->business_liquor_limit,

                'business_motor' => $request->business_motor,
                'business_motor_limit' => $request->business_motor_limit,

                'business_trucker' => $request->business_trucker,
                'business_trucker_limit' => $request->business_trucker_limit,

                'business_umbrella' => $request->business_umbrella,
                'business_umbrella_limit' => $request->business_umbrella_limit,

                'business_yacht' => $request->business_yacht,
                'business_yacht_limit' => $request->business_yacht_limit,
            ]);

            InsuranceApplicationAttachment::create([
                'application_id' => $insuranceApplicationId,

                'attachment_account_receivable' => $request->attachment_account_receivable,
                'attachment_additional_interest' => $request->attachment_additional_interest,
                'attachment_additional_premises' => $request->attachment_additional_premises,
                'attachment_apartment' => $request->attachment_apartment,
                'attachment_condo' => $request->attachment_condo,
                'attachment_contractor' => $request->attachment_contractor,
                'attachment_coverage' => $request->attachment_coverage,
                'attachment_dealer' => $request->attachment_dealer,
                'attachment_driver' => $request->attachment_driver,
                'attachment_electronic' => $request->attachment_electronic,
                'attachment_glass' => $request->attachment_glass,
                'attachment_hotel' => $request->attachment_hotel,
                'attachment_installation' => $request->attachment_installation,
                'attachment_liability_exposure' => $request->attachment_liability_exposure,
                'attachment_property_exposure' => $request->attachment_property_exposure,
                'attachment_loss' => $request->attachment_loss,
                'attachment_cargo' => $request->attachment_cargo,
                'attachment_premium' => $request->attachment_premium,
                'attachment_professional' => $request->attachment_professional,
                'attachment_restaurant' => $request->attachment_restaurant,
                'attachment_statement' => $request->attachment_statement,
                'attachment_state' => $request->attachment_state,
                'attachment_vacant' => $request->attachment_vacant,
                'attachment_vehicle' => $request->attachment_vehicle,

                'attachment_other_one' => $request->attachment_other_one,
                'attachment_other_two' => $request->attachment_other_two,
                'attachment_other_three' => $request->attachment_other_three,
                'attachment_other_four' => $request->attachment_other_four,
                'attachment_other_five' => $request->attachment_other_five,
                'attachment_other_six' => $request->attachment_other_six,
            ]);

            InsuranceApplicationApplicant::create([
                'application_id' => $insuranceApplicationId,

                // Policy info
                'policy_effective_date' => $request->policy_effective_date,
                'policy_expiration_date' => $request->policy_expiration_date,
                'policy_billing_plan' => $request->policy_billing_plan,
                'policy_payment_plan' => $request->policy_payment_plan,
                'policy_payment_method' => $request->policy_payment_method,
                'policy_audit' => $request->policy_audit,
                'policy_deposit' => $request->policy_deposit,
                'policy_minimum_premium' => $request->policy_minimum_premium,
                'policy_policy_premium' => $request->policy_policy_premium,

                // Applicant One
                'applicant_one_name' => $request->applicant_one_name,
                'applicant_one_address' => $request->applicant_one_address,
                'applicant_one_city' => $request->applicant_one_city,
                'applicant_one_state' => $request->applicant_one_state,
                'applicant_one_zipcode' => $request->applicant_one_zipcode,
                'applicant_one_gl_code' => $request->applicant_one_gl_code,
                'applicant_one_sic_code' => $request->applicant_one_sic_code,
                'applicant_one_naic_code' => $request->applicant_one_naic_code,
                'applicant_one_soc_code' => $request->applicant_one_soc_code,
                'applicant_one_phone' => $request->applicant_one_phone,
                'applicant_one_website' => $request->applicant_one_website,
                'applicant_one_corporation' => $request->applicant_one_corporation,
                'applicant_one_individual' => $request->applicant_one_individual,
                'applicant_one_joint_adventure' => $request->applicant_one_joint_adventure,
                'applicant_one_llc' => $request->applicant_one_llc,
                'applicant_one_members' => $request->applicant_one_members,
                'applicant_one_non_profit' => $request->applicant_one_non_profit,
                'applicant_one_partnership' => $request->applicant_one_partnership,
                'applicant_one_sub_chapter' => $request->applicant_one_sub_chapter,
                'applicant_one_trust' => $request->applicant_one_trust,
                'applicant_one_other' => $request->applicant_one_other,

                // Applicant Two
                'applicant_two_name' => $request->applicant_two_name,
                'applicant_two_address' => $request->applicant_two_address,
                'applicant_two_city' => $request->applicant_two_city,
                'applicant_two_state' => $request->applicant_two_state,
                'applicant_two_zipcode' => $request->applicant_two_zipcode,
                'applicant_two_gl_code' => $request->applicant_two_gl_code,
                'applicant_two_sic_code' => $request->applicant_two_sic_code,
                'applicant_two_naic_code' => $request->applicant_two_naic_code,
                'applicant_two_soc_code' => $request->applicant_two_soc_code,
                'applicant_two_phone' => $request->applicant_two_phone,
                'applicant_two_website' => $request->applicant_two_website,
                'applicant_two_corporation' => $request->applicant_two_corporation,
                'applicant_two_individual' => $request->applicant_two_individual,
                'applicant_two_joint_adventure' => $request->applicant_two_joint_adventure,
                'applicant_two_llc' => $request->applicant_two_llc,
                'applicant_two_members' => $request->applicant_two_members,
                'applicant_two_non_profit' => $request->applicant_two_non_profit,
                'applicant_two_partnership' => $request->applicant_two_partnership,
                'applicant_two_sub_chapter' => $request->applicant_two_sub_chapter,
                'applicant_two_trust' => $request->applicant_two_trust,
                'applicant_two_other' => $request->applicant_two_other,

                // Applicant Three
                'applicant_three_name' => $request->applicant_three_name,
                'applicant_three_address' => $request->applicant_three_address,
                'applicant_three_city' => $request->applicant_three_city,
                'applicant_three_state' => $request->applicant_three_state,
                'applicant_three_zipcode' => $request->applicant_three_zipcode,
                'applicant_three_gl_code' => $request->applicant_three_gl_code,
                'applicant_three_sic_code' => $request->applicant_three_sic_code,
                'applicant_three_naic_code' => $request->applicant_three_naic_code,
                'applicant_three_soc_code' => $request->applicant_three_soc_code,
                'applicant_three_phone' => $request->applicant_three_phone,
                'applicant_three_website' => $request->applicant_three_website,
                'applicant_three_corporation' => $request->applicant_three_corporation,
                'applicant_three_individual' => $request->applicant_three_individual,
                'applicant_three_joint_adventure' => $request->applicant_three_joint_adventure,
                'applicant_three_llc' => $request->applicant_three_llc,
                'applicant_three_members' => $request->applicant_three_members,
                'applicant_three_non_profit' => $request->applicant_three_non_profit,
                'applicant_three_partnership' => $request->applicant_three_partnership,
                'applicant_three_sub_chapter' => $request->applicant_three_sub_chapter,
                'applicant_three_trust' => $request->applicant_three_trust,
                'applicant_three_other' => $request->applicant_three_other,

                // Contact Info One
                'contact_info_type_one' => $request->contact_info_type_one,
                'contact_info_name_one' => $request->contact_info_name_one,
                'contact_info_pp_type_one' => $request->contact_info_pp_type_one,
                'contact_info_pp_number_one' => $request->contact_info_pp_number_one,
                'contact_info_sp_type_one' => $request->contact_info_sp_type_one,
                'contact_info_sp_number_one' => $request->contact_info_sp_number_one,
                'contact_info_s_email_one' => $request->contact_info_s_email_one,
                'contact_info_p_email_one' => $request->contact_info_p_email_one,

                // Contact Info Two
                'contact_info_type_two' => $request->contact_info_type_two,
                'contact_info_name_two' => $request->contact_info_name_two,
                'contact_info_pp_type_two' => $request->contact_info_pp_type_two,
                'contact_info_pp_number_two' => $request->contact_info_pp_number_two,
                'contact_info_sp_type_two' => $request->contact_info_sp_type_two,
                'contact_info_sp_number_two' => $request->contact_info_sp_number_two,
                'contact_info_s_email_two' => $request->contact_info_s_email_two,
                'contact_info_p_email_two' => $request->contact_info_p_email_two,
            ]);

            InsuranceApplicationPremise::create([
                'application_id' => $insuranceApplicationId,

                // Premises 1
                'premises_loc_one' => $request->premises_loc_one,
                'premises_bld_one' => $request->premises_bld_one,
                'premises_street_one' => $request->premises_street_one,
                'premises_city_one' => $request->premises_city_one,
                'premises_state_one' => $request->premises_state_one,
                'premises_zipcode_one' => $request->premises_zipcode_one,
                'premises_country_one' => $request->premises_country_one,
                'premises_city_limit_one' => $request->premises_city_limit_one,
                'premises_interest_one' => $request->premises_interest_one,
                'premises_full_employee_one' => $request->premises_full_employee_one,
                'premises_annual_revenue_one' => $request->premises_annual_revenue_one,
                'premises_occupied_area_one' => $request->premises_occupied_area_one,
                'premises_part_employee_one' => $request->premises_part_employee_one,
                'premises_public_area_one' => $request->premises_public_area_one,
                'premises_building_area_one' => $request->premises_building_area_one,
                'premises_leased_one' => $request->premises_leased_one,
                'premises_description_one' => $request->premises_description_one,

                // Premises 2
                'premises_loc_two' => $request->premises_loc_two,
                'premises_bld_two' => $request->premises_bld_two,
                'premises_street_two' => $request->premises_street_two,
                'premises_city_two' => $request->premises_city_two,
                'premises_state_two' => $request->premises_state_two,
                'premises_zipcode_two' => $request->premises_zipcode_two,
                'premises_country_two' => $request->premises_country_two,
                'premises_city_limit_two' => $request->premises_city_limit_two,
                'premises_interest_two' => $request->premises_interest_two,
                'premises_full_employee_two' => $request->premises_full_employee_two,
                'premises_annual_revenue_two' => $request->premises_annual_revenue_two,
                'premises_occupied_area_two' => $request->premises_occupied_area_two,
                'premises_part_employee_two' => $request->premises_part_employee_two,
                'premises_public_area_two' => $request->premises_public_area_two,
                'premises_building_area_two' => $request->premises_building_area_two,
                'premises_leased_two' => $request->premises_leased_two,
                'premises_description_two' => $request->premises_description_two,

                // Premises 3
                'premises_loc_three' => $request->premises_loc_three,
                'premises_bld_three' => $request->premises_bld_three,
                'premises_street_three' => $request->premises_street_three,
                'premises_city_three' => $request->premises_city_three,
                'premises_state_three' => $request->premises_state_three,
                'premises_zipcode_three' => $request->premises_zipcode_three,
                'premises_country_three' => $request->premises_country_three,
                'premises_city_limit_three' => $request->premises_city_limit_three,
                'premises_interest_three' => $request->premises_interest_three,
                'premises_full_employee_three' => $request->premises_full_employee_three,
                'premises_annual_revenue_three' => $request->premises_annual_revenue_three,
                'premises_occupied_area_three' => $request->premises_occupied_area_three,
                'premises_part_employee_three' => $request->premises_part_employee_three,
                'premises_public_area_three' => $request->premises_public_area_three,
                'premises_building_area_three' => $request->premises_building_area_three,
                'premises_leased_three' => $request->premises_leased_three,
                'premises_description_three' => $request->premises_description_three,

                // Premises 4
                'premises_loc_four' => $request->premises_loc_four,
                'premises_bld_four' => $request->premises_bld_four,
                'premises_street_four' => $request->premises_street_four,
                'premises_city_four' => $request->premises_city_four,
                'premises_state_four' => $request->premises_state_four,
                'premises_zipcode_four' => $request->premises_zipcode_four,
                'premises_country_four' => $request->premises_country_four,
                'premises_city_limit_four' => $request->premises_city_limit_four,
                'premises_interest_four' => $request->premises_interest_four,
                'premises_full_employee_four' => $request->premises_full_employee_four,
                'premises_annual_revenue_four' => $request->premises_annual_revenue_four,
                'premises_occupied_area_four' => $request->premises_occupied_area_four,
                'premises_part_employee_four' => $request->premises_part_employee_four,
                'premises_public_area_four' => $request->premises_public_area_four,
                'premises_building_area_four' => $request->premises_building_area_four,
                'premises_leased_four' => $request->premises_leased_four,
                'premises_description_four' => $request->premises_description_four,

                // Nature of business
                'nature_apartment' => $request->nature_apartment,
                'nature_condom' => $request->nature_condom,
                'nature_contractor' => $request->nature_contractor,
                'nature_institutional' => $request->nature_institutional,
                'nature_manufacture' => $request->nature_manufacture,
                'nature_office' => $request->nature_office,
                'nature_restaurant' => $request->nature_restaurant,
                'nature_retail' => $request->nature_retail,
                'nature_service' => $request->nature_service,
                'nature_wholesale' => $request->nature_wholesale,
                'nature_start_date' => $request->nature_start_date,
                'nature_description' => $request->nature_description,
                'nature_total_sale' => $request->nature_total_sale,
                'nature_installation' => $request->nature_installation,
                'nature_off_premises' => $request->nature_off_premises,
                'nature_description_operation' => $request->nature_description_operation,

                // Interests
                'interest_additional' => $request->interest_additional,
                'interest_breach' => $request->interest_breach,
                'interest_co_owner' => $request->interest_co_owner,
                'interest_lessor' => $request->interest_lessor,
                'interest_leaseback' => $request->interest_leaseback,
                'interest_loss' => $request->interest_loss,
                'interest_holder' => $request->interest_holder,
                'interest_loss_payee' => $request->interest_loss_payee,
                'interest_mortgagee' => $request->interest_mortgagee,
                'interest_owner' => $request->interest_owner,
                'interest_registrant' => $request->interest_registrant,
                'interest_trustee' => $request->interest_trustee,
                'interest_other' => $request->interest_other,

                'interest_type' => $request->interest_type,
                'interest_name' => $request->interest_name,
                'interest_address' => $request->interest_address,
                'interest_rank' => $request->interest_rank,
                'interest_reference' => $request->interest_reference,
                'interest_end_date' => $request->interest_end_date,
                'interest_line_amount' => $request->interest_line_amount,
                'interest_phone' => $request->interest_phone,
                'interest_fax' => $request->interest_fax,
                'interest_email' => $request->interest_email,

                'interest_location' => $request->interest_location,
                'interest_building' => $request->interest_building,
                'interest_vehicle' => $request->interest_vehicle,
                'interest_boat' => $request->interest_boat,
                'interest_airport' => $request->interest_airport,
                'interest_aircraft' => $request->interest_aircraft,
                'interest_item_class' => $request->interest_item_class,
                'interest_item' => $request->interest_item,
                'interest_item_description' => $request->interest_item_description,
                'interest_reason' => $request->interest_reason,
            ]);

            InsuranceApplicationInfo::create([
                'application_id' => $insuranceApplicationId,

                // Q1
                'information_q_one_a_name' => $request->information_q_one_a_name,
                'information_q_one_a_relation' => $request->information_q_one_a_relation,
                'information_q_one_a_percentage' => $request->information_q_one_a_percentage,
                'information_q_one_b_name' => $request->information_q_one_b_name,
                'information_q_one_b_relation' => $request->information_q_one_b_relation,
                'information_q_one_b_percentage' => $request->information_q_one_b_percentage,

                // Q2
                'information_q_two_manual' => $request->information_q_two_manual,
                'information_q_two_position' => $request->information_q_two_position,
                'information_q_two_meeting' => $request->information_q_two_meeting,
                'information_q_two_osha' => $request->information_q_two_osha,
                'information_q_two_other' => $request->information_q_two_other,

                // Q3
                'information_q_three' => $request->information_q_three,

                // Q4
                'information_q_business_one' => $request->information_q_business_one,
                'information_q_policy_one' => $request->information_q_policy_one,
                'information_q_business_two' => $request->information_q_business_two,
                'information_q_policy_two' => $request->information_q_policy_two,
                'information_q_business_three' => $request->information_q_business_three,
                'information_q_policy_three' => $request->information_q_policy_three,
                'information_q_business_four' => $request->information_q_business_four,
                'information_q_policy_four' => $request->information_q_policy_four,

                // Q5
                'information_q_non_payment' => $request->information_q_non_payment,
                'information_q_non_renewal' => $request->information_q_non_renewal,
                'information_q_agent_carrier' => $request->information_q_agent_carrier,
                'information_q_under_writing' => $request->information_q_under_writing,
                'information_q_condition' => $request->information_q_condition,
                'information_q_condition_description' => $request->information_q_condition_description,
                'information_q_other' => $request->information_q_other,

                // Q6–Q7
                'information_q_six' => $request->information_q_six,
                'information_q_seven' => $request->information_q_seven,

                // Q8
                'information_q_eight_date_one' => $request->information_q_eight_date_one,
                'information_q_eight_explanation_one' => $request->information_q_eight_explanation_one,
                'information_q_eight_resolution_one' => $request->information_q_eight_resolution_one,
                'information_q_eight_resolution_date_one' => $request->information_q_eight_resolution_date_one,
                'information_q_eight_date_two' => $request->information_q_eight_date_two,
                'information_q_eight_explanation_two' => $request->information_q_eight_explanation_two,
                'information_q_eight_resolution_two' => $request->information_q_eight_resolution_two,
                'information_q_eight_resolution_date_two' => $request->information_q_eight_resolution_date_two,

                // Q9
                'information_q_nine_date_one' => $request->information_q_nine_date_one,
                'information_q_nine_explanation_one' => $request->information_q_nine_explanation_one,
                'information_q_nine_resolution_one' => $request->information_q_nine_resolution_one,
                'information_q_nine_resolution_date_one' => $request->information_q_nine_resolution_date_one,
                'information_q_nine_date_two' => $request->information_q_nine_date_two,
                'information_q_nine_explanation_two' => $request->information_q_nine_explanation_two,
                'information_q_nine_resolution_two' => $request->information_q_nine_resolution_two,
                'information_q_nine_resolution_date_two' => $request->information_q_nine_resolution_date_two,

                // Q10
                'information_q_ten_date_one' => $request->information_q_ten_date_one,
                'information_q_ten_explanation_one' => $request->information_q_ten_explanation_one,
                'information_q_ten_resolution_one' => $request->information_q_ten_resolution_one,
                'information_q_ten_resolution_date_one' => $request->information_q_ten_resolution_date_one,
                'information_q_ten_date_two' => $request->information_q_ten_date_two,
                'information_q_ten_explanation_two' => $request->information_q_ten_explanation_two,
                'information_q_ten_resolution_two' => $request->information_q_ten_resolution_two,
                'information_q_ten_resolution_date_two' => $request->information_q_ten_resolution_date_two,

                // Q11–15
                'information_q_eleven' => $request->information_q_eleven,
                'information_q_eleven_name' => $request->information_q_eleven_name,
                'information_q_twelve' => $request->information_q_twelve,
                'information_q_thirteen' => $request->information_q_thirteen,
                'information_q_thirteen_detail' => $request->information_q_thirteen_detail,
                'information_q_fourteen' => $request->information_q_fourteen,
                'information_q_fourteen_detail' => $request->information_q_fourteen_detail,
                'information_q_fifteen' => $request->information_q_fifteen,
                'information_q_fifteen_detail' => $request->information_q_fifteen_detail,

                'remarks' => $request->remarks,
            ]);

            InsuranceApplicationPrior::create([
                'application_id' => $insuranceApplicationId,

                'carrier_one_year' => $request->carrier_one_year,
                'carrier_one_gl' => $request->carrier_one_gl,
                'carrier_one_auto' => $request->carrier_one_auto,
                'carrier_one_property' => $request->carrier_one_property,
                'carrier_one_other' => $request->carrier_one_other,

                'carrier_policy_one_gl' => $request->carrier_policy_one_gl,
                'carrier_policy_one_auto' => $request->carrier_policy_one_auto,
                'carrier_policy_one_property' => $request->carrier_policy_one_property,
                'carrier_policy_one_other' => $request->carrier_policy_one_other,

                'carrier_premium_one_gl' => $request->carrier_premium_one_gl,
                'carrier_premium_one_auto' => $request->carrier_premium_one_auto,
                'carrier_premium_one_property' => $request->carrier_premium_one_property,
                'carrier_premium_one_other' => $request->carrier_premium_one_other,

                'carrier_effective_one_gl' => $request->carrier_effective_one_gl,
                'carrier_effective_one_auto' => $request->carrier_effective_one_auto,
                'carrier_effective_one_property' => $request->carrier_effective_one_property,
                'carrier_effective_one_other' => $request->carrier_effective_one_other,

                'carrier_expiration_one_gl' => $request->carrier_expiration_one_gl,
                'carrier_expiration_one_auto' => $request->carrier_expiration_one_auto,
                'carrier_expiration_one_property' => $request->carrier_expiration_one_property,
                'carrier_expiration_one_other' => $request->carrier_expiration_one_other,

                'carrier_two_year' => $request->carrier_two_year,

                'carrier_two_gl' => $request->carrier_two_gl,
                'carrier_two_auto' => $request->carrier_two_auto,
                'carrier_two_property' => $request->carrier_two_property,
                'carrier_two_other' => $request->carrier_two_other,

                'carrier_policy_two_gl' => $request->carrier_policy_two_gl,
                'carrier_policy_two_auto' => $request->carrier_policy_two_auto,
                'carrier_policy_two_property' => $request->carrier_policy_two_property,
                'carrier_policy_two_other' => $request->carrier_policy_two_other,

                'carrier_premium_two_gl' => $request->carrier_premium_two_gl,
                'carrier_premium_two_auto' => $request->carrier_premium_two_auto,
                'carrier_premium_two_property' => $request->carrier_premium_two_property,
                'carrier_premium_two_other' => $request->carrier_premium_two_other,

                'carrier_effective_two_gl' => $request->carrier_effective_two_gl,
                'carrier_effective_two_auto' => $request->carrier_effective_two_auto,
                'carrier_effective_two_property' => $request->carrier_effective_two_property,
                'carrier_effective_two_other' => $request->carrier_effective_two_other,

                'carrier_expiration_two_gl' => $request->carrier_expiration_two_gl,
                'carrier_expiration_two_auto' => $request->carrier_expiration_two_auto,
                'carrier_expiration_two_property' => $request->carrier_expiration_two_property,
                'carrier_expiration_two_other' => $request->carrier_expiration_two_other,

                'carrier_three_year' => $request->carrier_three_year,

                'carrier_three_gl' => $request->carrier_three_gl,
                'carrier_three_auto' => $request->carrier_three_auto,
                'carrier_three_property' => $request->carrier_three_property,
                'carrier_three_other' => $request->carrier_three_other,

                'carrier_policy_three_gl' => $request->carrier_policy_three_gl,
                'carrier_policy_three_auto' => $request->carrier_policy_three_auto,
                'carrier_policy_three_property' => $request->carrier_policy_three_property,
                'carrier_policy_three_other' => $request->carrier_policy_three_other,

                'carrier_premium_three_gl' => $request->carrier_premium_three_gl,
                'carrier_premium_three_auto' => $request->carrier_premium_three_auto,
                'carrier_premium_three_property' => $request->carrier_premium_three_property,
                'carrier_premium_three_other' => $request->carrier_premium_three_other,

                'carrier_effective_three_gl' => $request->carrier_effective_three_gl,
                'carrier_effective_three_auto' => $request->carrier_effective_three_auto,
                'carrier_effective_three_property' => $request->carrier_effective_three_property,
                'carrier_effective_three_other' => $request->carrier_effective_three_other,

                'carrier_expiration_three_gl' => $request->carrier_expiration_three_gl,
                'carrier_expiration_three_auto' => $request->carrier_expiration_three_auto,
                'carrier_expiration_three_property' => $request->carrier_expiration_three_property,
                'carrier_expiration_three_other' => $request->carrier_expiration_three_other,

                'loss_year' => $request->loss_year,
                'loss_amount' => $request->loss_amount,

                'loss_one_date' => $request->loss_one_date,
                'loss_one_line' => $request->loss_one_line,
                'loss_one_description' => $request->loss_one_description,
                'loss_one_claim_date' => $request->loss_one_claim_date,
                'loss_one_amount_paid' => $request->loss_one_amount_paid,
                'loss_one_amount_reserved' => $request->loss_one_amount_reserved,
                'loss_one_subrogation' => $request->loss_one_subrogation,
                'loss_one_claim_open' => $request->loss_one_claim_open,

                'loss_two_date' => $request->loss_two_date,
                'loss_two_line' => $request->loss_two_line,
                'loss_two_description' => $request->loss_two_description,
                'loss_two_claim_date' => $request->loss_two_claim_date,
                'loss_two_amount_paid' => $request->loss_two_amount_paid,
                'loss_two_amount_reserved' => $request->loss_two_amount_reserved,
                'loss_two_subrogation' => $request->loss_two_subrogation,
                'loss_two_claim_open' => $request->loss_two_claim_open,

                'loss_three_date' => $request->loss_three_date,
                'loss_three_line' => $request->loss_three_line,
                'loss_three_description' => $request->loss_three_description,
                'loss_three_claim_date' => $request->loss_three_claim_date,
                'loss_three_amount_paid' => $request->loss_three_amount_paid,
                'loss_three_amount_reserved' => $request->loss_three_amount_reserved,
                'loss_three_subrogation' => $request->loss_three_subrogation,
                'loss_three_claim_open' => $request->loss_three_claim_open,
            ]);

            DB::commit();
            return redirect()->back()->with('success', 'Form submitted successfully!');
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
