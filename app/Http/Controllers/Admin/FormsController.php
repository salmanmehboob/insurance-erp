<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\ClientPolicy;
use App\Models\ClientUploadedForm;
use App\Models\CommercialInsuranceApplication;
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
use App\Models\InstallationBuilderRiskSection;
use App\Models\InsuranceCompany;
use App\Models\PolicyType;
use App\Models\PropertySection;
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

        if ($type === 'CommercialApplicationForm') {
            $forms = CommercialInsuranceApplication::all();
        }
        
        if ($type === 'InstallationBuilderRisk') {
            $forms = InstallationBuilderRiskSection::all();
        }
        
        if ($type === 'PropertySection') {
            $forms = PropertySection::all();
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

        if ($type === 'CommercialApplicationForm') {
            $form = CommercialInsuranceApplication::with(['client', 'createdBy', 'applicationInfo', 'business', 'otherInfo', 'history'])->findOrFail($id);
            return view('admin.clientForms.commercial_insurance_application.show', compact('title', 'form', 'type'));
        }

        if ($type === 'InstallationBuilderRisk') {
            $form = InstallationBuilderRiskSection::find($id);
            return view('admin.clientForms.Installation_builder_risk.show', compact('title', 'form', 'type'));
        }

        if ($type === 'PropertySection') {
            $form = PropertySection::with(['PropertyPremises', 'PropertyPremisesSec'])->findOrFail($id);
            return view('admin.clientForms.property_section.show', compact('title', 'form', 'type'));
        }

    }

    public function createAgentBrokerForm($id)
    {
        $clientPolicy = ClientPolicy::with('client', 'insuranceCompany', 'agent.agencies')->where('client_id', $id)->first();
        $agencies = Agency::all();

         return view('admin.clientForms.agent_broker.create', compact('clientPolicy', 'agencies'));

//        return view('admin.clientForms.agent_broker.upload', compact('clientPolicy'));
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
                return redirect()->route('dashboard')->with('success', 'Form submitted successfully!');
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
                return redirect()->route('dashboard')->with('success', 'Evidence of Property Form created successfully for ' . $evidence->client->applicant_name);
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
            return redirect()->route('dashboard')->with('success', 'Invoice Payment created successfully.');
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
            return redirect()->route('dashboard')->with('success', 'Property Loss created successfully.');
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
            return redirect()->route('dashboard')->with('success', 'Property Insurance created successfully.');
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
                return redirect()->route('dashboard')->with('success', 'Form submitted successfully!');
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
            return redirect()->route('dashboard')->with('success', 'Form submitted successfully!');
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

    public function CreateCommercialInsuranceApplicationForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();

        return view('admin.clientForms.commercial_Insurance_application.create', compact('clientPolicy'));
    }


    public function storeCommercialInsuranceApplicationForm(Request $request)
    {
        // Start database transaction
        DB::beginTransaction();

        try {

            // 1. Create main application
            $commercialInsuranceAppForm = CommercialInsuranceApplication::create([
                'client_id' => $request->client_id,
                'application_date' => $request->application_date,
                'agency_name' => $request->agency_name,
                'agency_address' => $request->agency_address,
                'agency_city' => $request->agency_city,
                'agency_state' => $request->agency_state,
                'agency_zipcode' => $request->agency_zipcode,
                'agency_contact_name' => $request->agency_contact_name,
                'agency_contact_phone_no' => $request->agency_contact_phone_no,
                'agency_contact_fax_no' => $request->agency_contact_fax_no,
                'agency_contact_email' => $request->agency_contact_email,
                'agency_code' => $request->agency_code,
                'agency_sub_code' => $request->agency_sub_code,
                'agency_customer_id' => $request->agency_customer_id,
                'carrier' => $request->carrier,
                'naic_code' => $request->naic_code,
                'program_name' => $request->program_name,
                'program_code' => $request->program_code,
                'policy_number' => $request->policy_number,
                'under_writer' => $request->under_writer,
                'under_writer_office' => $request->under_writer_office,
                'status_quote' => $request->status_quote,
                'status_issue_policy' => $request->status_issue_policy,
                'status_renew' => $request->status_renew,
                'status_bound' => $request->status_bound,
                'status_change' => $request->status_change,
                'status_cancel' => $request->status_cancel,
                'status_date' => $request->status_date,
                'status_time' => $request->status_time,
                'status_time_type' => $request->status_time_type,
                'boiler_machinery' => $request->boiler_machinery,
                'boiler_machinery_premium_one' => $request->boiler_machinery_premium_one,
                'boiler_machinery_cyber_privacy' => $request->boiler_machinery_cyber_privacy,
                'boiler_machinery_premium_two' => $request->boiler_machinery_premium_two,
                'boiler_machinery_yacht' => $request->boiler_machinery_yacht,
                'boiler_machinery_premium_three' => $request->boiler_machinery_premium_three,
                'business_auto' => $request->business_auto,
                'business_auto_premium_one' => $request->business_auto_premium_one,
                'business_auto_fiduciary' => $request->business_auto_fiduciary,
                'business_auto_premium_two' => $request->business_auto_premium_two,
                'business_auto_yacht_one' => $request->business_auto_yacht_one,
                'business_auto_yacht_one_field' => $request->business_auto_yacht_one_field,
                'business_auto_premium_three' => $request->business_auto_premium_three,
                'business_owner' => $request->business_owner,
                'business_owner_premium_one' => $request->business_owner_premium_one,
                'business_owner_garage' => $request->business_owner_garage,
                'business_owner_premium_two' => $request->business_owner_premium_two,
                'business_owner_yacht_two' => $request->business_owner_yacht_two,
                'business_owner_yacht_two_field' => $request->business_owner_yacht_two_field,
                'business_owner_premium_three' => $request->business_owner_premium_three,
                'business_commercial_gl' => $request->business_commercial_gl,
                'business_commercial_gl_premium_one' => $request->business_commercial_gl_premium_one,
                'business_commercial_gl_liquor' => $request->business_commercial_gl_liquor,
                'business_commercial_gl_premium_two' => $request->business_commercial_gl_premium_two,
                'business_commercial_gl_yacht_three' => $request->business_commercial_gl_yacht_three,
                'business_commercial_gl_yacht_three_field' => $request->business_commercial_gl_yacht_three_field,
                'business_commercial_gl_premium_three' => $request->business_commercial_gl_premium_three,
                'business_inland' => $request->business_inland,
                'business_inland_premium_one' => $request->business_inland_premium_one,
                'business_inland_motor' => $request->business_inland_motor,
                'business_inland_premium_two' => $request->business_inland_premium_two,
                'business_inland_yacht_four' => $request->business_inland_yacht_four,
                'business_inland_yacht_four_field' => $request->business_inland_yacht_four_field,
                'business_inland_premium_three' => $request->business_inland_premium_three,
                'commercial_property' => $request->commercial_property,
                'commercial_property_premium_one' => $request->commercial_property_premium_one,
                'commercial_property_trucker' => $request->commercial_property_trucker,
                'commercial_property_premium_two' => $request->commercial_property_premium_two,
                'commercial_property_yacht_five' => $request->commercial_property_yacht_five,
                'commercial_property_yacht_five_field' => $request->commercial_property_yacht_five_field,
                'commercial_property_premium_three' => $request->commercial_property_premium_three,
                'crime' => $request->crime,
                'crime_premium_one' => $request->crime_premium_one,
                'crime_umbrella' => $request->crime_umbrella,
                'crime_yacht_six' => $request->crime_yacht_six,
                'crime_yacht_six_field' => $request->crime_yacht_six_field,
                'crime_premium_three' => $request->crime_premium_three,
                'attachment_accounts_receivable' => $request->attachment_accounts_receivable,
                'attachment_glass_sign' => $request->attachment_glass_sign,
                'attachment_statement' => $request->attachment_statement,
                'attachment_additional_interest' => $request->attachment_additional_interest,
                'attachment_hotel' => $request->attachment_hotel,
                'attachment_state_supplement' => $request->attachment_state_supplement,
                'attachment_addition_premises' => $request->attachment_addition_premises,
                'attachment_installation_risk' => $request->attachment_installation_risk,
                'attachment_vacant_building' => $request->attachment_vacant_building,
                'attachment_appartment_building' => $request->attachment_appartment_building,
                'attachment_international_liability' => $request->attachment_international_liability,
                'attachment_vehicle_schedule' => $request->attachment_vehicle_schedule,
                'attachment_condo_assn' => $request->attachment_condo_assn,
                'attachment_internation_property_exposer' => $request->attachment_internation_property_exposer,
                'attachment_default_check_one' => $request->attachment_default_check_one,
                'attachment_default_check_one_field' => $request->attachment_default_check_one_field,
                'attachment_contractors_supplement' => $request->attachment_contractors_supplement,
                'attachment_loss_summary' => $request->attachment_loss_summary,
                'attachment_default_check_two' => $request->attachment_default_check_two,
                'attachment_default_check_two_field' => $request->attachment_default_check_two_field,
                'attachment_coverages_schedule' => $request->attachment_coverages_schedule,
                'attachment_open_cargo_section' => $request->attachment_open_cargo_section,
                'attachment_default_check_three' => $request->attachment_default_check_three,
                'attachment_default_check_three_field' => $request->attachment_default_check_three_field,
                'attachment_dealers_section' => $request->attachment_dealers_section,
                'attachment_premium_payment' => $request->attachment_premium_payment,
                'attachment_default_check_four' => $request->attachment_default_check_four,
                'attachment_default_check_four_field' => $request->attachment_default_check_four_field,
                'attachment_driver_infomation' => $request->attachment_driver_infomation,
                'attachment_professional_liability' => $request->attachment_professional_liability,
                'attachment_default_check_five' => $request->attachment_default_check_five,
                'attachment_default_check_five_field' => $request->attachment_default_check_five_field,
                'attachment_electronic_data' => $request->attachment_electronic_data,
                'attachment_restauratt' => $request->attachment_restauratt,
                'attachment_default_check_six' => $request->attachment_default_check_six,
                'attachment_default_check_six_field' => $request->attachment_default_check_six_field,
                'policy_proposed_eff_date' => $request->policy_proposed_eff_date,
                'policy_proposed_exp_date' => $request->policy_proposed_exp_date,
                'policy_billing_plan' => $request->policy_billing_plan,
                'policy_payment_plan' => $request->policy_payment_plan,
                'policy_method_of_payment' => $request->policy_method_of_payment,
                'policy_audit' => $request->policy_audit,
                'policy_deposit' => $request->policy_deposit,
                'policy_minimum_premium' => $request->policy_minimum_premium,
                'policy_premium' => $request->policy_premium,
                'created_by' => $request->created_by,
            ]);

            // 2. Create Application Info
            $commercialInsuranceAppForm->applicationInfo()->create([
                'commerical_appId' => $request->commerical_appId,
                'appication_info_one_name' => $request->appication_info_one_name,
                'appication_info_one_address' => $request->appication_info_one_address,
                'appication_info_one_city' => $request->appication_info_one_city,
                'appication_info_one_state' => $request->appication_info_one_state,
                'appication_info_one_zip' => $request->appication_info_one_zip,
                'appication_info_one_gl_code' => $request->appication_info_one_gl_code,
                'appication_info_one_SIC' => $request->appication_info_one_SIC,
                'appication_info_one_NAICS' => $request->appication_info_one_NAICS,
                'appication_info_one_FEIN' => $request->appication_info_one_FEIN,
                'appication_info_one_business_phone' => $request->appication_info_one_business_phone,
                'appication_info_one_website' => $request->appication_info_one_website,
                'appication_info_one_corporation' => $request->appication_info_one_corporation,
                'appication_info_one_joint_venture' => $request->appication_info_one_joint_venture,
                'appication_info_one_not_for_profilt' => $request->appication_info_one_not_for_profilt,
                'appication_info_one_subchapter' => $request->appication_info_one_subchapter,
                'appication_info_one_individual' => $request->appication_info_one_individual,
                'appication_info_one_llc_check' => $request->appication_info_one_llc_check,
                'appication_info_one_llc_check_field' => $request->appication_info_one_llc_check_field,
                'appication_info_one_partnership' => $request->appication_info_one_partnership,
                'appication_info_one_trust' => $request->appication_info_one_trust,
                'appication_info_two_name' => $request->appication_info_two_name,
                'appication_info_two_address' => $request->appication_info_two_address,
                'appication_info_two_city' => $request->appication_info_two_city,
                'appication_info_two_state' => $request->appication_info_two_state,
                'appication_info_two_zip' => $request->appication_info_two_zip,
                'appication_info_two_gl_code' => $request->appication_info_two_gl_code,
                'appication_info_two_SIC' => $request->appication_info_two_SIC,
                'appication_info_two_NAICS' => $request->appication_info_two_NAICS,
                'appication_info_two_FEIN' => $request->appication_info_two_FEIN,
                'appication_info_two_business_phone' => $request->appication_info_two_business_phone,
                'appication_info_two_website' => $request->appication_info_two_website,
                'appication_info_two_corporation' => $request->appication_info_two_corporation,
                'appication_info_two_joint_venture' => $request->appication_info_two_joint_venture,
                'appication_info_two_not_for_profilt' => $request->appication_info_two_not_for_profilt,
                'appication_info_two_subchapter' => $request->appication_info_two_subchapter,
                'appication_info_two_individual' => $request->appication_info_two_individual,
                'appication_info_two_llc_check' => $request->appication_info_two_llc_check,
                'appication_info_two_llc_check_field' => $request->appication_info_two_llc_check_field,
                'appication_info_two_partnership' => $request->appication_info_two_partnership,
                'appication_info_two_trust' => $request->appication_info_two_trust,
                'appication_info_three_name' => $request->appication_info_three_name,
                'appication_info_three_address' => $request->appication_info_three_address,
                'appication_info_three_city' => $request->appication_info_three_city,
                'appication_info_three_state' => $request->appication_info_three_state,
                'appication_info_three_zip' => $request->appication_info_three_zip,
                'appication_info_three_gl_code' => $request->appication_info_three_gl_code,
                'appication_info_three_SIC' => $request->appication_info_three_SIC,
                'appication_info_three_NAICS' => $request->appication_info_three_NAICS,
                'appication_info_three_FEIN' => $request->appication_info_three_FEIN,
                'appication_info_three_business_phone' => $request->appication_info_three_business_phone,
                'appication_info_three_website' => $request->appication_info_three_website,
                'appication_info_three_corporation' => $request->appication_info_three_corporation,
                'appication_info_three_joint_venture' => $request->appication_info_three_joint_venture,
                'appication_info_three_not_for_profilt' => $request->appication_info_three_not_for_profilt,
                'appication_info_three_subchapter' => $request->appication_info_three_subchapter,
                'appication_info_three_individual' => $request->appication_info_three_individual,
                'appication_info_three_llc_check' => $request->appication_info_three_llc_check,
                'appication_info_three_llc_check_field' => $request->appication_info_three_llc_check_field,
                'appication_info_three_partnership' => $request->appication_info_three_partnership,
                'appication_info_three_trust' => $request->appication_info_three_trust,
                'contact_info_c_type_one' => $request->contact_info_c_type_one,
                'contact_info_c_type_two' => $request->contact_info_c_type_two,
                'contact_info_name_one' => $request->contact_info_name_one,
                'contact_info_name_two' => $request->contact_info_name_two,
                'contact_info_primary_one' => $request->contact_info_primary_one,
                'contact_info_secondary_one' => $request->contact_info_secondary_one,
                'contact_info_primary_two' => $request->contact_info_primary_two,
                'contact_info_secondary_two' => $request->contact_info_secondary_two,
                'contact_info_primary_email_one' => $request->contact_info_primary_email_one,
                'contact_info_secondary_email_one' => $request->contact_info_secondary_email_one,
                'contact_info_primary_email_two' => $request->contact_info_primary_email_two,
                'prem_info_s1_r1_loc' => $request->prem_info_s1_r1_loc,
                'prem_info_s1_r1_street' => $request->prem_info_s1_r1_street,
                'prem_info_s1_r1_ftEmployee' => $request->prem_info_s1_r1_ftEmployee,
                'prem_info_s1_r1_annual_rev' => $request->prem_info_s1_r1_annual_rev,
                'prem_info_s1_r1_inside' => $request->prem_info_s1_r1_inside,
                'prem_info_s1_r1_owner' => $request->prem_info_s1_r1_owner,
                'prem_info_s1_r1_occupied_area' => $request->prem_info_s1_r1_occupied_area,
                'prem_info_s1_r2_bld' => $request->prem_info_s1_r2_bld,
                'prem_info_s1_r2_city' => $request->prem_info_s1_r2_city,
                'prem_info_s1_r2_state' => $request->prem_info_s1_r2_state,
                'prem_info_s1_r2_outside' => $request->prem_info_s1_r2_outside,
                'prem_info_s1_r2_tenant' => $request->prem_info_s1_r2_tenant,
                'prem_info_s1_r2_partTEmp' => $request->prem_info_s1_r2_partTEmp,
                'prem_info_s1_r2_pubArea' => $request->prem_info_s1_r2_pubArea,
                'prem_info_s1_r2_country' => $request->prem_info_s1_r2_country,
                'prem_info_s1_r2_zip' => $request->prem_info_s1_r2_zip,
                'prem_info_s1_r2_otherCheck_one' => $request->prem_info_s1_r2_otherCheck_one,
                'prem_info_s1_r2_otherCheckField_one' => $request->prem_info_s1_r2_otherCheckField_one,
                'prem_info_s1_r2_otherCheck_two' => $request->prem_info_s1_r2_otherCheck_two,
                'prem_info_s1_r2_otherCheckField_two' => $request->prem_info_s1_r2_otherCheckField_two,
                'prem_info_s1_r2_totalBArea' => $request->prem_info_s1_r2_totalBArea,
                'prem_info_s1_description' => $request->prem_info_s1_description,
                'prem_info_s1_leased' => $request->prem_info_s1_leased,
                'prem_info_s2_r1_loc' => $request->prem_info_s2_r1_loc,
                'prem_info_s2_r1_street' => $request->prem_info_s2_r1_street,
                'prem_info_s2_r1_ftEmployee' => $request->prem_info_s2_r1_ftEmployee,
                'prem_info_s2_r1_annual_rev' => $request->prem_info_s2_r1_annual_rev,
                'prem_info_s2_r1_inside' => $request->prem_info_s2_r1_inside,
                'prem_info_s2_r1_owner' => $request->prem_info_s2_r1_owner,
                'prem_info_s2_r1_occupied_area' => $request->prem_info_s2_r1_occupied_area,
                'prem_info_s2_r2_bld' => $request->prem_info_s2_r2_bld,
                'prem_info_s2_r2_city' => $request->prem_info_s2_r2_city,
                'prem_info_s2_r2_state' => $request->prem_info_s2_r2_state,
                'prem_info_s2_r2_outside' => $request->prem_info_s2_r2_outside,
                'prem_info_s2_r2_tenant' => $request->prem_info_s2_r2_tenant,
                'prem_info_s2_r2_partTEmp' => $request->prem_info_s2_r2_partTEmp,
                'prem_info_s2_r2_pubArea' => $request->prem_info_s2_r2_pubArea,
                'prem_info_s2_r2_country' => $request->prem_info_s2_r2_country,
                'prem_info_s2_r2_zip' => $request->prem_info_s2_r2_zip,
                'prem_info_s2_r2_otherCheck_one' => $request->prem_info_s2_r2_otherCheck_one,
                'prem_info_s2_r2_otherCheckField_one' => $request->prem_info_s2_r2_otherCheckField_one,
                'prem_info_s2_r2_otherCheck_two' => $request->prem_info_s2_r2_otherCheck_two,
                'prem_info_s2_r2_otherCheckField_two' => $request->prem_info_s2_r2_otherCheckField_two,
                'prem_info_s2_r2_totalBArea' => $request->prem_info_s2_r2_totalBArea,
                'prem_info_s2_description' => $request->prem_info_s2_description,
                'prem_info_s2_leased' => $request->prem_info_s2_leased,
                'prem_info_s3_r1_loc' => $request->prem_info_s3_r1_loc,
                'prem_info_s3_r1_street' => $request->prem_info_s3_r1_street,
                'prem_info_s3_r1_ftEmployee' => $request->prem_info_s3_r1_ftEmployee,
                'prem_info_s3_r1_annual_rev' => $request->prem_info_s3_r1_annual_rev,
                'prem_info_s3_r1_inside' => $request->prem_info_s3_r1_inside,
                'prem_info_s3_r1_owner' => $request->prem_info_s3_r1_owner,
                'prem_info_s3_r1_occupied_area' => $request->prem_info_s3_r1_occupied_area,
                'prem_info_s3_r2_bld' => $request->prem_info_s3_r2_bld,
                'prem_info_s3_r2_city' => $request->prem_info_s3_r2_city,
                'prem_info_s3_r2_state' => $request->prem_info_s3_r2_state,
                'prem_info_s3_r2_outside' => $request->prem_info_s3_r2_outside,
                'prem_info_s3_r2_tenant' => $request->prem_info_s3_r2_tenant,
                'prem_info_s3_r2_partTEmp' => $request->prem_info_s3_r2_partTEmp,
                'prem_info_s3_r2_pubArea' => $request->prem_info_s3_r2_pubArea,
                'prem_info_s3_r2_country' => $request->prem_info_s3_r2_country,
                'prem_info_s3_r2_zip' => $request->prem_info_s3_r2_zip,
                'prem_info_s3_r2_otherCheck_one' => $request->prem_info_s3_r2_otherCheck_one,
                'prem_info_s3_r2_otherCheckField_one' => $request->prem_info_s3_r2_otherCheckField_one,
                'prem_info_s3_r2_otherCheck_two' => $request->prem_info_s3_r2_otherCheck_two,
                'prem_info_s3_r2_otherCheckField_two' => $request->prem_info_s3_r2_otherCheckField_two,
                'prem_info_s3_r2_totalBArea' => $request->prem_info_s3_r2_totalBArea,
                'prem_info_s3_description' => $request->prem_info_s3_description,
                'prem_info_s3_leased' => $request->prem_info_s3_leased,
            ]);

            // 3. Create Business Info
            $commercialInsuranceAppForm->business()->create([
                'commerical_appId' => $request->commerical_appId,
                'natureB_apartments' => $request->natureB_apartments,
                'natureB_contractor' => $request->natureB_contractor,
                'natureB_manufacturing' => $request->natureB_manufacturing,
                'natureB_restaurant' => $request->natureB_restaurant,
                'natureB_service' => $request->natureB_service,
                'natureB_otherCheck' => $request->natureB_otherCheck,
                'natureB_otherCheck_field' => $request->natureB_otherCheck_field,
                'natureB_dateBusiness' => $request->natureB_dateBusiness,
                'natureB_condomin' => $request->natureB_condomin,
                'natureB_institutional' => $request->natureB_institutional,
                'natureB_office' => $request->natureB_office,
                'natureB_retail' => $request->natureB_retail,
                'natureB_wholesale' => $request->natureB_wholesale,
                'natureB_primary_description' => $request->natureB_primary_description,
                'natureB_retailStore' => $request->natureB_retailStore,
                'natureB_installationService' => $request->natureB_installationService,
                'natureB_premisesInstallation' => $request->natureB_premisesInstallation,
                'natureB_operationDescription' => $request->natureB_operationDescription,
                'addit_nameAddress' => $request->addit_nameAddress,
                'addit_Rank' => $request->addit_Rank,
                'addit_additionalInsured' => $request->addit_additionalInsured,
                'addit_beachWarranty' => $request->addit_beachWarranty,
                'addit_coOwner' => $request->addit_coOwner,
                'addit_employeeLessor' => $request->addit_employeeLessor,
                'addit_leasebackOwner' => $request->addit_leasebackOwner,
                'addit_lenderLoss' => $request->addit_lenderLoss,
                'addit_otherCheck' => $request->addit_otherCheck,
                'addit_otherCheckField' => $request->addit_otherCheckField,
                'addit_lienholder' => $request->addit_lienholder,
                'addit_lossPayee' => $request->addit_lossPayee,
                'addit_mortgagee' => $request->addit_mortgagee,
                'addit_owner' => $request->addit_owner,
                'addit_registrant' => $request->addit_registrant,
                'addit_trustee' => $request->addit_trustee,
                'addit_eviCertificate' => $request->addit_eviCertificate,
                'addit_eviPolicy' => $request->addit_eviPolicy,
                'addit_eviSendBill' => $request->addit_eviSendBill,
                'addit_reference' => $request->addit_reference,
                'addit_location' => $request->addit_location,
                'addit_building' => $request->addit_building,
                'addit_vehicle' => $request->addit_vehicle,
                'addit_boat' => $request->addit_boat,
                'addit_airport' => $request->addit_airport,
                'addit_aircraft' => $request->addit_aircraft,
                'addit_itemclass' => $request->addit_itemclass,
                'addit_item' => $request->addit_item,
                'addit_itemDescription' => $request->addit_itemDescription,
                'addit_refLoan' => $request->addit_refLoan,
                'addit_interestEDate' => $request->addit_interestEDate,
                'addit_lienAmount' => $request->addit_lienAmount,
                'addit_phone' => $request->addit_phone,
                'addit_fax' => $request->addit_fax,
                'addit_reasonFInterest' => $request->addit_reasonFInterest,
                'addit_emailAdd' => $request->addit_emailAdd,
                'generalInfo_q1A_parentCompany' => $request->generalInfo_q1A_parentCompany,
                'generalInfo_q1A_Relationship' => $request->generalInfo_q1A_Relationship,
                'generalInfo_q1A_owned' => $request->generalInfo_q1A_owned,
                'generalInfo_q1B_parentCompany' => $request->generalInfo_q1B_parentCompany,
                'generalInfo_q1B_Relationship' => $request->generalInfo_q1B_Relationship,
                'generalInfo_q1B_owned' => $request->generalInfo_q1B_owned,
                'generalInfo_q2' => $request->generalInfo_q2,
                'generalInfo_q3_explosive' => $request->generalInfo_q3_explosive,
                'generalInfo_q4_t1r1_lBusiness' => $request->generalInfo_q4_t1r1_lBusiness,
                'generalInfo_q4_t1r1_policy' => $request->generalInfo_q4_t1r1_policy,
                'generalInfo_q4_t1r2_lBusiness' => $request->generalInfo_q4_t1r2_lBusiness,
                'generalInfo_q4_t1r2_policy' => $request->generalInfo_q4_t1r2_policy,
                'generalInfo_q4_t2r1_lBusiness' => $request->generalInfo_q4_t2r1_lBusiness,
                'generalInfo_q4_t2r1_policy' => $request->generalInfo_q4_t2r1_policy,
                'generalInfo_q4_t2r2_lBusiness' => $request->generalInfo_q4_t2r2_lBusiness,
                'generalInfo_q4_t2r2_policy' => $request->generalInfo_q4_t2r2_policy,
                'generalInfo_q5' => $request->generalInfo_q5,
                'generalInfo_q6' => $request->generalInfo_q6,
                'generalInfo_q7' => $request->generalInfo_q7,
                'generalInfo_q8_r1_occurDate' => $request->generalInfo_q8_r1_occurDate,
                'generalInfo_q8_r1_explanation' => $request->generalInfo_q8_r1_explanation,
                'generalInfo_q8_r1_resolution' => $request->generalInfo_q8_r1_resolution,
                'generalInfo_q8_r1_resolveDate' => $request->generalInfo_q8_r1_resolveDate,
                'generalInfo_q8_r2_occurDate' => $request->generalInfo_q8_r2_occurDate,
                'generalInfo_q8_r2_explanation' => $request->generalInfo_q8_r2_explanation,
                'generalInfo_q8_r2_resolution' => $request->generalInfo_q8_r2_resolution,
                'generalInfo_q8_r2_resolveDate' => $request->generalInfo_q8_r2_resolveDate,
                'generalInfo_q9_r1_occurDate' => $request->generalInfo_q9_r1_occurDate,
                'generalInfo_q9_r1_explanation' => $request->generalInfo_q9_r1_explanation,
                'generalInfo_q9_r1_resolution' => $request->generalInfo_q9_r1_resolution,
                'generalInfo_q9_r1_resolveDate' => $request->generalInfo_q9_r1_resolveDate,
                'generalInfo_q9_r2_occurDate' => $request->generalInfo_q9_r2_occurDate,
                'generalInfo_q9_r2_explanation' => $request->generalInfo_q9_r2_explanation,
                'generalInfo_q9_r2_resolution' => $request->generalInfo_q9_r2_resolution,
                'generalInfo_q9_r2_resolveDate' => $request->generalInfo_q9_r2_resolveDate,
                'generalInfo_q10_r1_occurDate' => $request->generalInfo_q10_r1_occurDate,
                'generalInfo_q10_r1_explanation' => $request->generalInfo_q10_r1_explanation,
                'generalInfo_q10_r1_resolution' => $request->generalInfo_q10_r1_resolution,
                'generalInfo_q10_r1_resolveDate' => $request->generalInfo_q10_r1_resolveDate,
                'generalInfo_q10_r2_occurDate' => $request->generalInfo_q10_r2_occurDate,
                'generalInfo_q10_r2_explanation' => $request->generalInfo_q10_r2_explanation,
                'generalInfo_q10_r2_resolution' => $request->generalInfo_q10_r2_resolution,
                'generalInfo_q10_r2_resolveDate' => $request->generalInfo_q10_r2_resolveDate,
                'generalInfo_q11' => $request->generalInfo_q11,
                'generalInfo_q12' => $request->generalInfo_q12,
                'generalInfo_q13' => $request->generalInfo_q13,
                'generalInfo_q14' => $request->generalInfo_q14,
                'generalInfo_q15' => $request->generalInfo_q15,
                'agencyID' => $request->agencyID,
            ]);

            // 4. Create Other Info
            $commercialInsuranceAppForm->otherInfo()->create([
                'commerical_appId' => $request->commerical_appId,
                'remarksInstruction' => $request->remarksInstruction,
                'priorCI_r1_year' => $request->priorCI_r1_year,
                'priorCI_r1_gl' => $request->priorCI_r1_gl,
                'priorCI_r1_autmob' => $request->priorCI_r1_autmob,
                'priorCI_r1_property' => $request->priorCI_r1_property,
                'priorCI_r1_other' => $request->priorCI_r1_other,
                'priorCI_r1_pgl' => $request->priorCI_r1_pgl,
                'priorCI_r1_pautomob' => $request->priorCI_r1_pautomob,
                'priorCI_r1_pproperty' => $request->priorCI_r1_pproperty,
                'priorCI_r1_pother' => $request->priorCI_r1_pother,
                'priorCI_r1_pRgl' => $request->priorCI_r1_pRgl,
                'priorCI_r1_pRautomob' => $request->priorCI_r1_pRautomob,
                'priorCI_r1_pRproperty' => $request->priorCI_r1_pRproperty,
                'priorCI_r1_pRother' => $request->priorCI_r1_pRother,
                'priorCI_r1_egl' => $request->priorCI_r1_egl,
                'priorCI_r1_eautomob' => $request->priorCI_r1_eautomob,
                'priorCI_r1_eproperty' => $request->priorCI_r1_eproperty,
                'priorCI_r1_eother' => $request->priorCI_r1_eother,
                'priorCI_r1_exgl' => $request->priorCI_r1_exgl,
                'priorCI_r1_exautomob' => $request->priorCI_r1_exautomob,
                'priorCI_r1_exproperty' => $request->priorCI_r1_exproperty,
                'priorCI_r1_exother' => $request->priorCI_r1_exother,
                'priorCI_r2_year' => $request->priorCI_r2_year,
                'priorCI_r2_gl' => $request->priorCI_r2_gl,
                'priorCI_r2_autmob' => $request->priorCI_r2_autmob,
                'priorCI_r2_property' => $request->priorCI_r2_property,
                'priorCI_r2_other' => $request->priorCI_r2_other,
                'priorCI_r2_pgl' => $request->priorCI_r2_pgl,
                'priorCI_r2_pautomob' => $request->priorCI_r2_pautomob,
                'priorCI_r2_pproperty' => $request->priorCI_r2_pproperty,
                'priorCI_r2_pother' => $request->priorCI_r2_pother,
                'priorCI_r2_pRgl' => $request->priorCI_r2_pRgl,
                'priorCI_r2_pRautomob' => $request->priorCI_r2_pRautomob,
                'priorCI_r2_pRproperty' => $request->priorCI_r2_pRproperty,
                'priorCI_r2_pRother' => $request->priorCI_r2_pRother,
                'priorCI_r2_egl' => $request->priorCI_r2_egl,
                'priorCI_r2_eautomob' => $request->priorCI_r2_eautomob,
                'priorCI_r2_eproperty' => $request->priorCI_r2_eproperty,
                'priorCI_r2_eother' => $request->priorCI_r2_eother,
                'priorCI_r2_exgl' => $request->priorCI_r2_exgl,
                'priorCI_r2_exautomob' => $request->priorCI_r2_exautomob,
                'priorCI_r2_exproperty' => $request->priorCI_r2_exproperty,
                'priorCI_r2_exother' => $request->priorCI_r2_exother,
                'priorCI_r3_year' => $request->priorCI_r3_year,
                'priorCI_r3_gl' => $request->priorCI_r3_gl,
                'priorCI_r3_autmob' => $request->priorCI_r3_autmob,
                'priorCI_r3_property' => $request->priorCI_r3_property,
                'priorCI_r3_other' => $request->priorCI_r3_other,
                'priorCI_r3_pgl' => $request->priorCI_r3_pgl,
                'priorCI_r3_pautomob' => $request->priorCI_r3_pautomob,
                'priorCI_r3_pproperty' => $request->priorCI_r3_pproperty,
                'priorCI_r3_pother' => $request->priorCI_r3_pother,
                'priorCI_r3_pRgl' => $request->priorCI_r3_pRgl,
                'priorCI_r3_pRautomob' => $request->priorCI_r3_pRautomob,
                'priorCI_r3_pRproperty' => $request->priorCI_r3_pRproperty,
                'priorCI_r3_pRother' => $request->priorCI_r3_pRother,
                'priorCI_r3_egl' => $request->priorCI_r3_egl,
                'priorCI_r3_eautomob' => $request->priorCI_r3_eautomob,
                'priorCI_r3_eproperty' => $request->priorCI_r3_eproperty,
                'priorCI_r3_eother' => $request->priorCI_r3_eother,
                'priorCI_r3_exgl' => $request->priorCI_r3_exgl,
                'priorCI_r3_exautomob' => $request->priorCI_r3_exautomob,
                'priorCI_r3_exproperty' => $request->priorCI_r3_exproperty,
                'priorCI_r3_exother' => $request->priorCI_r3_exother,
            ]);

            // 5. Create History
            $commercialInsuranceAppForm->history()->create([
                'commerical_appId' => $request->commerical_appId,
                'lossHistory' => $request->lossHistory,
                'totalLose' => $request->totalLose,
                'lossH_r1_dateOccup' => $request->lossH_r1_dateOccup,
                'lossH_r1_line' => $request->lossH_r1_line,
                'lossH_r1_type' => $request->lossH_r1_type,
                'lossH_r1_dateClaim' => $request->lossH_r1_dateClaim,
                'lossH_r1_amountPaid' => $request->lossH_r1_amountPaid,
                'lossH_r1_ammountReserved' => $request->lossH_r1_ammountReserved,
                'lossH_r1_subro' => $request->lossH_r1_subro,
                'lossH_r1_clainOpen' => $request->lossH_r1_clainOpen,
                'lossH_r2_dateOccup' => $request->lossH_r2_dateOccup,
                'lossH_r2_line' => $request->lossH_r2_line,
                'lossH_r2_type' => $request->lossH_r2_type,
                'lossH_r2_dateClaim' => $request->lossH_r2_dateClaim,
                'lossH_r2_amountPaid' => $request->lossH_r2_amountPaid,
                'lossH_r2_ammountReserved' => $request->lossH_r2_ammountReserved,
                'lossH_r2_subro' => $request->lossH_r2_subro,
                'lossH_r2_clainOpen' => $request->lossH_r2_clainOpen,
                'lossH_r3_dateOccup' => $request->lossH_r3_dateOccup,
                'lossH_r3_line' => $request->lossH_r3_line,
                'lossH_r3_type' => $request->lossH_r3_type,
                'lossH_r3_dateClaim' => $request->lossH_r3_dateClaim,
                'lossH_r3_amountPaid' => $request->lossH_r3_amountPaid,
                'lossH_r3_ammountReserved' => $request->lossH_r3_ammountReserved,
                'lossH_r3_subro' => $request->lossH_r3_subro,
                'lossH_r3_clainOpen' => $request->lossH_r3_clainOpen,
                'signatureCheck' => $request->signatureCheck,
                'applicantInitials' => $request->applicantInitials,
                'producerSign' => $request->producerSign,
                'producerName' => $request->producerName,
                'stateProducerLicense' => $request->stateProducerLicense,
                'applicantSign' => $request->applicantSign,
                'applicationDate' => $request->applicationDate,
                'nationalProducer' => $request->nationalProducer,
            ]);


            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Form submitted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    public function CreateInstallationBuilderRiskForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();

        return view('admin.clientForms.Installation_builder_risk.create', compact('clientPolicy'));
    }


    public function storeInstallationBuilderRisk(Request $request)
    {
        // Start database transaction
        DB::beginTransaction();

        try {

            $installationBuilderForm = InstallationBuilderRiskSection::create([
               'client_id' => $request->client_id,
                'invoice_date' => $request->invoice_date,
                'agency_name' => $request->agency_name,
                'career' => $request->career,
                'naic_code' => $request->naic_code,
                'policy_number' => $request->policy_number,
                'effective_date' => $request->effective_date,
                'name_insured' => $request->name_insured,
                'insallationCheck' => $request->insallationCheck,
                'buildingRiskCheck' => $request->buildingRiskCheck,
                'limit_sing_loc' => $request->limit_sing_loc,
                'limit_per_disaster' => $request->limit_per_disaster,
                'limit_temp_loc' => $request->limit_temp_loc,
                'transit_limit' => $request->transit_limit,
                'earthQuakeCheck' => $request->earthQuakeCheck,
                'earthQuakeSubLimit' => $request->earthQuakeSubLimit,
                'earthQuakeDeductible' => $request->earthQuakeDeductible,
                'flood' => $request->flood,
                'floodSubLimit' => $request->floodSubLimit,
                'floodDeductible' => $request->floodDeductible,
                'otherCauseCheck' => $request->otherCauseCheck,
                'otherCauseField' => $request->otherCauseField,
                'otherCauseSubLim' => $request->otherCauseSubLim,
                'otherCauseDeductible' => $request->otherCauseDeductible,
                'specialCause' => $request->specialCause,
                'specialCauseSubLim' => $request->specialCauseSubLim,
                'specialCauseDeductible' => $request->specialCauseDeductible,
                'broadCause' => $request->broadCause,
                'basicSubLim' => $request->basicSubLim,
                'broadDeductible' => $request->broadDeductible,
                'operationTerritory' => $request->operationTerritory,
                'pastMonth' => $request->pastMonth,
                'nextMonth' => $request->nextMonth,
                'resi_annualNum' => $request->resi_annualNum,
                'resi_duration' => $request->resi_duration,
                'resi_max' => $request->resi_max,
                'resi_avg' => $request->resi_avg,
                'resi_maxCost' => $request->resi_maxCost,
                'resi_minCost' => $request->resi_minCost,
                'resi_avgCost' => $request->resi_avgCost,
                'resi_materialPerc' => $request->resi_materialPerc,
                'commercial_annualNum' => $request->commercial_annualNum,
                'commercial_duration' => $request->commercial_duration,
                'commercial_max' => $request->commercial_max,
                'commercial_avg' => $request->commercial_avg,
                'commercial_maxCost' => $request->commercial_maxCost,
                'commercial_minCost' => $request->commercial_minCost,
                'commercial_avgCost' => $request->commercial_avgCost,
                'commercial_materialPerc' => $request->commercial_materialPerc,
                'accordCheck' => $request->accordCheck,
                'sec1_Lender' => $request->sec1_Lender,
                'sec1_LienHolder' => $request->sec1_LienHolder,
                'sec1_LossPayee' => $request->sec1_LossPayee,
                'sec1_otherCheck' => $request->sec1_otherCheck,
                'sec1_otherCheckField' => $request->sec1_otherCheckField,
                'sec1_nameAddress' => $request->sec1_nameAddress,
                'sec1_rank' => $request->sec1_rank,
                'sec1_referenceNo' => $request->sec1_referenceNo,
                'sec1_certificateReq' => $request->sec1_certificateReq,
                'sec1_loc' => $request->sec1_loc,
                'sec1_building' => $request->sec1_building,
                'sec1_scheduledItem' => $request->sec1_scheduledItem,
                'sec1_intrestOther' => $request->sec1_intrestOther,
                'sec1_description' => $request->sec1_description,
                'sec2_Lender' => $request->sec2_Lender,
                'sec2_LienHolder' => $request->sec2_LienHolder,
                'sec2_LossPayee' => $request->sec2_LossPayee,
                'sec2_otherCheck' => $request->sec2_otherCheck,
                'sec2_otherCheckField' => $request->sec2_otherCheckField,
                'sec2_nameAddress' => $request->sec2_nameAddress,
                'sec2_rank' => $request->sec2_rank,
                'sec2_referenceNo' => $request->sec2_referenceNo,
                'sec2_certificateReq' => $request->sec2_certificateReq,
                'sec2_loc' => $request->sec2_loc,
                'sec2_building' => $request->sec2_building,
                'sec2_scheduledItem' => $request->sec2_scheduledItem,
                'sec2_intrestOther' => $request->sec2_intrestOther,
                'sec2_description' => $request->sec2_description,
                'sec3_Lender' => $request->sec3_Lender,
                'sec3_LienHolder' => $request->sec3_LienHolder,
                'sec3_LossPayee' => $request->sec3_LossPayee,
                'sec3_otherCheck' => $request->sec3_otherCheck,
                'sec3_otherCheckField' => $request->sec3_otherCheckField,
                'sec3_nameAddress' => $request->sec3_nameAddress,
                'sec3_rank' => $request->sec3_rank,
                'sec3_referenceNo' => $request->sec3_referenceNo,
                'sec3_certificateReq' => $request->sec3_certificateReq,
                'sec3_loc' => $request->sec3_loc,
                'sec3_building' => $request->sec3_building,
                'sec3_scheduledItem' => $request->sec3_scheduledItem,
                'sec3_intrestOther' => $request->sec3_intrestOther,
                'sec3_description' => $request->sec3_description,
                'riggingHosting' => $request->riggingHosting,
                'estimatePercentagRigging' => $request->estimatePercentagRigging,
                'jobsiteSecurity' => $request->jobsiteSecurity,
                'remarks' => $request->remarks,
                'p2_limit_loc' => $request->p2_limit_loc,
                'p2_limit_temp_loc' => $request->p2_limit_temp_loc,
                'p2_transit_limit' => $request->p2_transit_limit,
                'p2_earthQuake' => $request->p2_earthQuake,
                'p2_earthQuakeSubLim' => $request->p2_earthQuakeSubLim,
                'p2_earthQuakeDeductible' => $request->p2_earthQuakeDeductible,
                'p2_FLOOD' => $request->p2_FLOOD,
                'p2_FLOODSubLim' => $request->p2_FLOODSubLim,
                'p2_FLOODDeductible' => $request->p2_FLOODDeductible,
                'p2_otherCauseCheck' => $request->p2_otherCauseCheck,
                'p2_otherCauseCheckField' => $request->p2_otherCauseCheckField,
                'p2_otherCauseSubLim' => $request->p2_otherCauseSubLim,
                'p2_otherCauseDeductible' => $request->p2_otherCauseDeductible,
                'p2_Special' => $request->p2_Special,
                'p2_SpecialSubLim' => $request->p2_SpecialSubLim,
                'p2_SpecialDeductible' => $request->p2_SpecialDeductible,
                'p2_BROAD' => $request->p2_BROAD,
                'p2_BASIC' => $request->p2_BASIC,
                'p2_BASICDeductible' => $request->p2_BASICDeductible,
                'p2_commencement' => $request->p2_commencement,
                'p2_completion' => $request->p2_completion,
                'p2_contractAmount' => $request->p2_contractAmount,
                'p2_ownerSupplied' => $request->p2_ownerSupplied,
                'p2_jobSecurity' => $request->p2_jobSecurity,
                'p2_workedPerformed' => $request->p2_workedPerformed,
                'p2_insuredJobNumber' => $request->p2_insuredJobNumber,
                'p2_sec1_Lender' => $request->p2_sec1_Lender,
                'p2_sec1_LienHolder' => $request->p2_sec1_LienHolder,
                'p2_sec1_LossPayee' => $request->p2_sec1_LossPayee,
                'p2_sec1_otherCheck' => $request->p2_sec1_otherCheck,
                'p2_sec1_otherCheckField' => $request->p2_sec1_otherCheckField,
                'p2_sec1_nameAddress' => $request->p2_sec1_nameAddress,
                'p2_sec1_rank' => $request->p2_sec1_rank,
                'p2_sec1_referenceNo' => $request->p2_sec1_referenceNo,
                'p2_sec1_certificateReq' => $request->p2_sec1_certificateReq,
                'p2_sec1_loc' => $request->p2_sec1_loc,
                'p2_sec1_building' => $request->p2_sec1_building,
                'p2_sec1_scheduledItem' => $request->p2_sec1_scheduledItem,
                'p2_sec1_intrestOther' => $request->p2_sec1_intrestOther,
                'p2_sec1_description' => $request->p2_sec1_description,
                'p2_sec2_Lender' => $request->p2_sec2_Lender,
                'p2_sec2_LienHolder' => $request->p2_sec2_LienHolder,
                'p2_sec2_LossPayee' => $request->p2_sec2_LossPayee,
                'p2_sec2_otherCheck' => $request->p2_sec2_otherCheck,
                'p2_sec2_otherCheckField' => $request->p2_sec2_otherCheckField,
                'p2_sec2_nameAddress' => $request->p2_sec2_nameAddress,
                'p2_sec2_rank' => $request->p2_sec2_rank,
                'p2_sec2_referenceNo' => $request->p2_sec2_referenceNo,
                'p2_sec2_certificateReq' => $request->p2_sec2_certificateReq,
                'p2_sec2_loc' => $request->p2_sec2_loc,
                'p2_sec2_building' => $request->p2_sec2_building,
                'p2_sec2_scheduledItem' => $request->p2_sec2_scheduledItem,
                'p2_sec2_intrestOther' => $request->p2_sec2_intrestOther,
                'p2_sec2_description' => $request->p2_sec2_description,
                'p2_sec3_Lender' => $request->p2_sec3_Lender,
                'p2_sec3_LienHolder' => $request->p2_sec3_LienHolder,
                'p2_sec3_LossPayee' => $request->p2_sec3_LossPayee,
                'p2_sec3_otherCheck' => $request->p2_sec3_otherCheck,
                'p2_sec3_otherCheckField' => $request->p2_sec3_otherCheckField,
                'p2_sec3_nameAddress' => $request->p2_sec3_nameAddress,
                'p2_sec3_rank' => $request->p2_sec3_rank,
                'p2_sec3_referenceNo' => $request->p2_sec3_referenceNo,
                'p2_sec3_certificateReq' => $request->p2_sec3_certificateReq,
                'p2_sec3_loc' => $request->p2_sec3_loc,
                'p2_sec3_building' => $request->p2_sec3_building,
                'p2_sec3_scheduledItem' => $request->p2_sec3_scheduledItem,
                'p2_sec3_intrestOther' => $request->p2_sec3_intrestOther,
                'p2_sec3_description' => $request->p2_sec3_description,
                'P2_amountShipped' => $request->P2_amountShipped,
                'P2_applicatsVehcles' => $request->P2_applicatsVehcles,
                'P2_contractorCarrier' => $request->P2_contractorCarrier,
                'P2_distanceInvolved' => $request->P2_distanceInvolved,
                'p2_riggingHosting' => $request->p2_riggingHosting,
                'p2_remarks' => $request->p2_remarks,
                'agency_id' => $request->agency_id,
                'P2_producerSignature' => $request->p2_producerSignature,
                'P2_producerName' => $request->p2_producerName,
                'P2_producerLicense' => $request->p2_producerLicense,
                'P2_applicantSignature' => $request->p2_applicantSignature,
                'P2_applicationdate' => $request->p2_applicationdate,
                'P2_nationalProducerNo' => $request->p2_nationalProducerNo,
                'created_by' => $request->created_by,
            ]);

            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Form submitted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function CreatePropertySectionForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency', 'agent')->where('client_id', $id)->first();

        return view('admin.clientForms.property_section.create', compact('clientPolicy'));
    }

    public function storePropertySection(Request $request){
        // Start database transaction
        DB::beginTransaction();

        try {

            $propertySectionForm = PropertySection::create([
                'client_id' => $request->client_id,
                'invoice_date' => $request->invoice_date,
                'agency_name' => $request->agency_name,
                'career' => $request->career,
                'naic_code' => $request->naic_code,
                'policy_no' => $request->policy_no,
                'effective_date' => $request->effective_date,
                'named_insured' => $request->named_insured,
                'blkt_s1_r1' => $request->blkt_s1_r1,
                'amount_s1_r1' => $request->amount_s1_r1,
                'type_s1_r1' => $request->type_s1_r1,
                'blkt_s2_r1' => $request->blkt_s2_r1,
                'amount_s2_r1' => $request->amount_s2_r1,
                'type_s2_r1'   => $request->type_s2_r1,  
                'blkt_s1_r2' => $request->blkt_s1_r2,
                'amount_s1_r2' => $request->amount_s1_r2,
                'type_s1_r2' => $request->type_s1_r2,
                'blkt_s2_r2' => $request->blkt_s2_r2,
                'amount_s2_r2' => $request->amount_s2_r2,
                'type_s2_r2' => $request->type_s2_r2,
                'sec2_agencyId' => $request->sec2_agencyId,
                'remarks' => $request->remarks,
                'producerSignature' => $request->producerSignature,
                'producerName' => $request->producerName,
                'producerLicense' => $request->producerLicense,
                'applicantSignature' => $request->applicantSignature,
                'applicationDate' => $request->applicationDate,
                'nationalProducerNo' => $request->nationalProducerNo,
                'created_by' => $request->created_by
            
            ]);
            
            $propertySectionForm->PropertyPremises()->create([
                'property_id' => $request->property_id,
                'sec1_premises_no' => $request->sec1_premises_no,
                'sec1_street_address' => $request->sec1_street_address,
                'sec1_building_no' => $request->sec1_building_no,
                'sec1_building_desc' => $request->sec1_building_desc,
                'sec1_r1_sub_insure' => $request->sec1_r1_sub_insure,
                'sec1_r1_amount' => $request->sec1_r1_amount,
                'sec1_r1_coins' => $request->sec1_r1_coins,
                'sec1_r1_valuation' => $request->sec1_r1_valuation,
                'sec1_r1_cause_loss' => $request->sec1_r1_cause_loss,
                'sec1_r1_inflation' => $request->sec1_r1_inflation,
                'sec1_r1_ded' => $request->sec1_r1_ded,
                'sec1_r1_ded_type' => $request->sec1_r1_ded_type,
                'sec1_r1_blanket' => $request->sec1_r1_blanket,
                'sec1_r1_forms' => $request->sec1_r1_forms,
                'sec1_r2_sub_insure' => $request->sec1_r2_sub_insure,
                'sec1_r2_amount' => $request->sec1_r2_amount,
                'sec1_r2_coins' => $request->sec1_r2_coins,
                'sec1_r2_valuation' => $request->sec1_r2_valuation,
                'sec1_r2_cause_loss' => $request->sec1_r2_cause_loss,
                'sec1_r2_inflation' => $request->sec1_r2_inflation,
                'sec1_r2_ded' => $request->sec1_r2_ded,
                'sec1_r2_ded_type' => $request->sec1_r2_ded_type,
                'sec1_r2_blanket' => $request->sec1_r2_blanket,
                'sec1_r2_forms' => $request->sec1_r2_forms,
                'sec1_r3_sub_insure' => $request->sec1_r3_sub_insure,
                'sec1_r3_amount' => $request->sec1_r3_amount,
                'sec1_r3_coins' => $request->sec1_r3_coins,
                'sec1_r3_valuation' => $request->sec1_r3_valuation,
                'sec1_r3_cause_loss' => $request->sec1_r3_cause_loss,
                'sec1_r3_inflation' => $request->sec1_r3_inflation,
                'sec1_r3_ded' => $request->sec1_r3_ded,
                'sec1_r3_ded_type' => $request->sec1_r3_ded_type,
                'sec1_r3_blanket' => $request->sec1_r3_blanket,
                'sec1_r3_forms' => $request->sec1_r3_forms,
                'sec1_r4_sub_insure' => $request->sec1_r4_sub_insure,
                'sec1_r4_amount' => $request->sec1_r4_amount,
                'sec1_r4_coins' => $request->sec1_r4_coins,
                'sec1_r4_valuation' => $request->sec1_r4_valuation,
                'sec1_r4_cause_loss' => $request->sec1_r4_cause_loss,
                'sec1_r4_inflation' => $request->sec1_r4_inflation,
                'sec1_r4_ded' => $request->sec1_r4_ded,
                'sec1_r4_ded_type' => $request->sec1_r4_ded_type,
                'sec1_r4_blanket' => $request->sec1_r4_blanket,
                'sec1_r4_forms' => $request->sec1_r4_forms,
                'sec1_r5_sub_insure' => $request->sec1_r5_sub_insure,
                'sec1_r5_amount' => $request->sec1_r5_amount,
                'sec1_r5_coins' => $request->sec1_r5_coins,
                'sec1_r5_valuation' => $request->sec1_r5_valuation,
                'sec1_r5_cause_loss' => $request->sec1_r5_cause_loss,
                'sec1_r5_inflation' => $request->sec1_r5_inflation,
                'sec1_r5_ded' => $request->sec1_r5_ded,
                'sec1_r5_ded_type' => $request->sec1_r5_ded_type,
                'sec1_r5_blanket' => $request->sec1_r5_blanket,
                'sec1_r5_forms' => $request->sec1_r5_forms,
                'sec1_business_income' => $request->sec1_business_income,
                'sec1_value_reporting' => $request->sec1_value_reporting,
                'sec1_spoilage' => $request->sec1_spoilage,
                'sec1_property_coverageDes' => $request->sec1_property_coverageDes,
                'sec1_limit' => $request->sec1_limit,
                'sec1_agreement' => $request->sec1_agreement,
                'sec1_breakdown' => $request->sec1_breakdown,
                'sec1_power_outage' => $request->sec1_power_outage,
                'sec1_selling_price' => $request->sec1_selling_price,
                'sec1_deductable' => $request->sec1_deductable,
                'sec1_coverage_accept' => $request->sec1_coverage_accept,
                'sec1_coverage_reject' => $request->sec1_coverage_reject,
                'sec1_coverage_limit' => $request->sec1_coverage_limit,
                'sec1_mine_accept' => $request->sec1_mine_accept,
                'sec1_mine_reject' => $request->sec1_mine_reject,
                'sec1_mine_limit' => $request->sec1_mine_limit,
                'sec1_propertyHistorical' => $request->sec1_propertyHistorical,
                'sec1_slidesStruct' => $request->sec1_slidesStruct,
                'sec1_construction_ty' => $request->sec1_construction_ty,
                'sec1_distanceto' => $request->sec1_distanceto,
                'sec1_fireState' => $request->sec1_fireState,
                'sec1_fire_district' => $request->sec1_fire_district,
                'sec1_code_no' => $request->sec1_code_no,
                'sec1_protCl' => $request->sec1_protCl,
                'sec1_stories' => $request->sec1_stories,
                'sec1_basm' => $request->sec1_basm,
                'sec1_yrbuilt' => $request->sec1_yrbuilt,
                'sec1_totalArea' => $request->sec1_totalArea,
                'sec1_wiringYr' => $request->sec1_wiringYr,
                'sec1_plumbering' => $request->sec1_plumbering,
                'sec1_roofingYr' => $request->sec1_roofingYr,
                'sec1_heating' => $request->sec1_heating,
                'sec1_otherYR' => $request->sec1_otherYR,
                'sec1_otherYRField' => $request->sec1_otherYRField,
                'sec1_resistive' => $request->sec1_resistive,
                'sec1_semi_resistive' => $request->sec1_semi_resistive,
                'sec1_roofT_otherCheck' => $request->sec1_roofT_otherCheck,
                'sec1_roofT_otherCheckField' => $request->sec1_roofT_otherCheckField,
                'sec1_headingSource' => $request->sec1_headingSource,
                'sec1_dateInstalled' => $request->sec1_dateInstalled,
                'sec1_primary_boiler' => $request->sec1_primary_boiler,
                'sec1_primary_solidFuel' => $request->sec1_primary_solidFuel,
                'sec1_primary_otherC' => $request->sec1_primary_otherC,
                'sec1_primary_otherCF' => $request->sec1_primary_otherCF,
                'sec1_PrimarybolierPlace' => $request->sec1_PrimarybolierPlace,
                'sec1_secondary_boiler' => $request->sec1_secondary_boiler,
                'sec1_secondary_solidFuel' => $request->sec1_secondary_solidFuel,
                'sec1_secondary_otherC' => $request->sec1_secondary_otherC,
                'sec1_secondary_otherCF' => $request->sec1_secondary_otherCF,
                'sec1_secondarybolierPlace' => $request->sec1_secondarybolierPlace,
                'sec1_rightExp' => $request->sec1_rightExp,
                'sec1_leftExp' => $request->sec1_leftExp,
                'sec1_frontExp' => $request->sec1_frontExp,
                'sec1_rearExp' => $request->sec1_rearExp,
                'sec1_buglerAlarm' => $request->sec1_buglerAlarm,
                'sec1_certificate' => $request->sec1_certificate,
                'sec1_expirationDate' => $request->sec1_expirationDate,
                'sec1_centralSatation' => $request->sec1_centralSatation,
                'sec1_localGong' => $request->sec1_localGong,
                'sec1_withKeys' => $request->sec1_withKeys,
                'sec1_burglerAlarmInstall' => $request->sec1_burglerAlarmInstall,
                'sec1_extent' => $request->sec1_extent,
                'sec1_grade' => $request->sec1_grade,
                'sec1_watchman' => $request->sec1_watchman,
                'sec1_clockHourly' => $request->sec1_clockHourly,
                'sec1_otherCheckCH' => $request->sec1_otherCheckCH,
                'sec1_otherCheckCHF' => $request->sec1_otherCheckCHF,
                'sec1_premisisFireProtect' => $request->sec1_premisisFireProtect,
                'sec1_sprik' => $request->sec1_sprik,
                'sec1_fireAlarmManufacture' => $request->sec1_fireAlarmManufacture,
                'sec1_CentralS' => $request->sec1_CentralS,
                'sec1_localG' => $request->sec1_localG,
                'accordCheck' => $request->accordCheck,
                'sec1_lenderPay' => $request->sec1_lenderPay,
                'sec1_lossPayee' => $request->sec1_lossPayee,
                'sec1_mortgagee' => $request->sec1_mortgagee,
                'sec1_intrestOther' => $request->sec1_intrestOther,
                'sec1_intrestOtherField' => $request->sec1_intrestOtherField,
                'sec1_nameAddress' => $request->sec1_nameAddress,
                'sec1_rank' => $request->sec1_rank,
                'sec1_evidence' => $request->sec1_evidence,
                'sec1_certificate_intrest' => $request->sec1_certificate_intrest,
                'sec1_referenceLoan' => $request->sec1_referenceLoan,
                'sec1_location_interest' => $request->sec1_location_interest,
                'sec1_building_interest' => $request->sec1_building_interest,
                'sec1_itemClass_interest' => $request->sec1_itemClass_interest,
                'sec1_item_interest' => $request->sec1_item_interest,
                'sec1_itemDescriptionInt' => $request->sec1_itemDescriptionInt
            ]);
            
            $propertySectionForm->PropertyPremisesSec()->create([
                'property_id' => $request->property_id,
                'sec2_premises_no' => $request->sec2_premises_no,
                'sec2_street_address' => $request->sec2_street_address,
                'sec2_building_no' => $request->sec2_building_no,
                'sec2_building_desc' => $request->sec2_building_desc,
                'sec2_r1_sub_insure' => $request->sec2_r1_sub_insure,
                'sec2_r1_amount' => $request->sec2_r1_amount,
                'sec2_r1_coins' => $request->sec2_r1_coins,
                'sec2_r1_valuation' => $request->sec2_r1_valuation,
                'sec2_r1_cause_loss' => $request->sec2_r1_cause_loss,
                'sec2_r1_inflation' => $request->sec2_r1_inflation,
                'sec2_r1_ded' => $request->sec2_r1_ded,
                'sec2_r1_ded_type' => $request->sec2_r1_ded_type,
                'sec2_r1_blanket' => $request->sec2_r1_blanket,
                'sec2_r1_forms' => $request->sec2_r1_forms,
                'sec2_r2_sub_insure' => $request->sec2_r2_sub_insure,
                'sec2_r2_amount' => $request->sec2_r2_amount,
                'sec2_r2_coins' => $request->sec2_r2_coins,
                'sec2_r2_valuation' => $request->sec2_r2_valuation,
                'sec2_r2_cause_loss' => $request->sec2_r2_cause_loss,
                'sec2_r2_inflation' => $request->sec2_r2_inflation,
                'sec2_r2_ded' => $request->sec2_r2_ded,
                'sec2_r2_ded_type' => $request->sec2_r2_ded_type,
                'sec2_r2_blanket' => $request->sec2_r2_blanket,
                'sec2_r2_forms' => $request->sec2_r2_forms, 
                'sec2_r3_sub_insure' => $request->sec2_r3_sub_insure,
                'sec2_r3_amount' => $request->sec2_r3_amount,
                'sec2_r3_coins' => $request->sec2_r3_coins,
                'sec2_r3_valuation' => $request->sec2_r3_valuation,
                'sec2_r3_cause_loss' => $request->sec2_r3_cause_loss,
                'sec2_r3_inflation' => $request->sec2_r3_inflation,
                'sec2_r3_ded' => $request->sec2_r3_ded,
                'sec2_r3_ded_type' => $request->sec2_r3_ded_type,
                'sec2_r3_blanket' => $request->sec2_r3_blanket,
                'sec2_r3_forms' => $request->sec2_r3_forms,
                'sec2_r4_sub_insure' => $request->sec2_r4_sub_insure,
                'sec2_r4_amount' => $request->sec2_r4_amount,
                'sec2_r4_coins' => $request->sec2_r4_coins,
                'sec2_r4_valuation' => $request->sec2_r4_valuation,
                'sec2_r4_cause_loss' => $request->sec2_r4_cause_loss,
                'sec2_r4_inflation' => $request->sec2_r4_inflation,
                'sec2_r4_ded' => $request->sec2_r4_ded,
                'sec2_r4_ded_type' => $request->sec2_r4_ded_type,
                'sec2_r4_blanket' => $request->sec2_r4_blanket,
                'sec2_r4_forms' => $request->sec2_r4_forms,
                'sec2_r5_sub_insure' => $request->sec2_r5_sub_insure,
                'sec2_r5_amount' => $request->sec2_r5_amount,
                'sec2_r5_coins' => $request->sec2_r5_coins,
                'sec2_r5_valuation' => $request->sec2_r5_valuation,
                'sec2_r5_cause_loss' => $request->sec2_r5_cause_loss,
                'sec2_r5_inflation' => $request->sec2_r5_inflation,
                'sec2_r5_ded' => $request->sec2_r5_ded,
                'sec2_r5_ded_type' => $request->sec2_r5_ded_type,
                'sec2_r5_blanket' => $request->sec2_r5_blanket,
                'sec2_r5_forms' => $request->sec2_r5_forms,
                'sec2_business_income' => $request->sec2_business_income,
                'sec2_value_reporting' => $request->sec2_value_reporting,
                'sec2_spoilage' => $request->sec2_spoilage,
                'sec2_property_coverageDes' => $request->sec2_property_coverageDes,
                'sec2_limit' => $request->sec2_limit,
                'sec2_agreement' => $request->sec2_agreement,
                'sec2_breakdown' => $request->sec2_breakdown,
                'sec2_power_outage' => $request->sec2_power_outage,
                'sec2_selling_price' => $request->sec2_selling_price,
                'sec2_deductable' => $request->sec2_deductable,
                'sec2_coverage_accept' => $request->sec2_coverage_accept,
                'sec2_coverage_reject' => $request->sec2_coverage_reject,
                'sec2_coverage_limit' => $request->sec2_coverage_limit,
                'sec2_mine_accept' => $request->sec2_mine_accept,
                'sec2_mine_reject' => $request->sec2_mine_reject,
                'sec2_mine_limit' => $request->sec2_mine_limit,
                'sec2_propertyHistorical' => $request->sec2_propertyHistorical,
                'sec2_slidesStruct' => $request->sec2_slidesStruct,
                'sec2_construction_ty' => $request->sec2_construction_ty,
                'sec2_distanceto' => $request->sec2_distanceto,
                'sec2_fireState' => $request->sec2_fireState,
                'sec2_fire_district' => $request->sec2_fire_district,
                'sec2_code_no' => $request->sec2_code_no,
                'sec2_protCl' => $request->sec2_protCl,
                'sec2_stories' => $request->sec2_stories,
                'sec2_basm' => $request->sec2_basm,
                'sec2_yrbuilt' => $request->sec2_yrbuilt,
                'sec2_totalArea' => $request->sec2_totalArea,
                'sec2_wiringYr' => $request->sec2_wiringYr,
                'sec2_plumbering' => $request->sec2_plumbering,
                'sec2_roofingYr' => $request->sec2_roofingYr,
                'sec2_heating' => $request->sec2_heating,
                'sec2_otherYR' => $request->sec2_otherYR,
                'sec2_otherYRField' => $request->sec2_otherYRField,
                'sec2_resistive' => $request->sec2_resistive,
                'sec2_semi_resistive' => $request->sec2_semi_resistive,
                'sec2_roofT_otherCheck' => $request->sec2_roofT_otherCheck,
                'sec2_roofT_otherCheckField' => $request->sec2_roofT_otherCheckField,
                'sec2_headingSource' => $request->sec2_headingSource,
                'sec2_dateInstalled' => $request->sec2_dateInstalled,
                'sec2_primary_boiler' => $request->sec2_primary_boiler,
                'sec2_primary_solidFuel' => $request->sec2_primary_solidFuel,
                'sec2_primary_otherC' => $request->sec2_primary_otherC,
                'sec2_primary_otherCF' => $request->sec2_primary_otherCF,
                'sec2_PrimarybolierPlace' => $request->sec2_PrimarybolierPlace,
                'sec2_secondary_boiler' => $request->sec2_secondary_boiler,
                'sec2_secondary_solidFuel' => $request->sec2_secondary_solidFuel,
                'sec2_secondary_otherC' => $request->sec2_secondary_otherC,
                'sec2_secondary_otherCF' => $request->sec2_secondary_otherCF,
                'sec2_secondarybolierPlace' => $request->sec2_secondarybolierPlace,
                'sec2_rightExp' => $request->sec2_rightExp,
                'sec2_leftExp' => $request->sec2_leftExp,
                'sec2_frontExp' => $request->sec2_frontExp,
                'sec2_rearExp' => $request->sec2_rearExp,
                'sec2_buglerAlarm' => $request->sec2_buglerAlarm,
                'sec2_certificate' => $request->sec2_certificate,
                'sec2_expirationDate' => $request->sec2_expirationDate,
                'sec2_centralSatation' => $request->sec2_centralSatation,
                'sec2_localGong' => $request->sec2_localGong,
                'sec2_withKeys' => $request->sec2_withKeys,
                'sec2_burglerAlarmInstall' => $request->sec2_burglerAlarmInstall,
                'sec2_extent' => $request->sec2_extent,
                'sec2_grade' => $request->sec2_grade,
                'sec2_watchman' => $request->sec2_watchman,
                'sec2_clockHourly' => $request->sec2_clockHourly,
                'sec2_otherCheckCH' => $request->sec2_otherCheckCH,
                'sec2_otherCheckCHF' => $request->sec2_otherCheckCHF,
                'sec2_premisisFireProtect' => $request->sec2_premisisFireProtect,
                'sec2_sprik' => $request->sec2_sprik,
                'sec2_fireAlarmManufacture' => $request->sec2_fireAlarmManufacture,
                'sec2_CentralS' => $request->sec2_CentralS,
                'sec2_localG' => $request->sec2_localG,
                'acc2rdCheck' => $request->acc2rdCheck,
                'sec2_lenderPay' => $request->sec2_lenderPay,
                'sec2_lossPayee' => $request->sec2_lossPayee,
                'sec2_mortgagee' => $request->sec2_mortgagee,
                'sec2_intrestOther' => $request->sec2_intrestOther,
                'sec2_intrestOtherField' => $request->sec2_intrestOtherField,
                'sec2_nameAddress' => $request->sec2_nameAddress,
                'sec2_rank' => $request->sec2_rank,
                'sec2_evidence' => $request->sec2_evidence,
                'sec2_certificate_intrest' => $request->sec2_certificate_intrest,
                'sec2_referenceLoan' => $request->sec2_referenceLoan,
                'sec2_location_interest' => $request->sec2_location_interest,
                'sec2_building_interest' => $request->sec2_building_interest,
                'sec2_itemClass_interest' => $request->sec2_itemClass_interest,
                'sec2_item_interest' => $request->sec2_item_interest,
                'sec2_itemDescriptionInt' => $request->sec2_itemDescriptionInt
            ]);
            
            DB::commit();
            return redirect()->route('dashboard')->with('success', 'Form submitted successfully!');
            
        } catch (\Exception $e) {
            dd($e->getMessage());
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function showUploadForm($type, $client_id)
    {
        $client = \App\Models\Client::findOrFail($client_id);
        return view('admin.clientForms.upload', [
            'client' => $client,
            'formType' => $type,
        ]);
    }


    public function uploadForm(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'form_type' => 'required|string',
            'pdf_file' => 'required|file|mimes:pdf|max:10240', // 10MB max
        ]);

        try {
            $clientId = $request->input('client_id');
            $formType = $request->input('form_type');
            $file = $request->file('pdf_file');
            $filename = time() . '_' . $file->getClientOriginalName();
            $storagePath = "uploaded_form/$formType/{$clientId}/{$filename}";

            // Store file in storage/app/public/{form_type}/{client_id}/filename
            $file->storeAs("uploaded_form/$formType/{$clientId}", $filename, 'public');

            // Save record in client_uploaded_forms
            ClientUploadedForm::create([
                'client_id' => $clientId,
                'form_type' => $formType,
                'path' => $storagePath,
            ]);

            return redirect()->back()->with('success', 'PDF uploaded successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to upload PDF: ' . $e->getMessage());
        }
    }

    public function viewUploadedForm($type, $client_id = null)
    {
         $title = formatText($type) . ' Forms';
        $uploadedForms = collect();
        if ($client_id) {
            $client = \App\Models\Client::findOrFail($client_id);
            $uploadedForms = \App\Models\ClientUploadedForm::where('form_type', $type)
                ->where('client_id', $client_id)
                ->get();
        }
        return view('admin.clientForms.uploaded_forms', compact('title',
            'uploadedForms', 'type', 'client_id' ,'client'));
    }

}
