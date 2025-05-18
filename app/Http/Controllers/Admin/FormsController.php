<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\ClientPolicy;
use App\Models\Forms\AdditionalRemarkForm;
use App\Models\Forms\AgentBrokerForm;
use App\Models\Forms\EvidenceOfPropertyForm;
use App\Models\Forms\InvoicePayment;
use App\Models\Forms\InvoicePaymentItem;
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
//            dd($dbData);
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

        return view('admin.clientForms.invoice_payment.create', compact('clientPolicy', 'insuranceCompanies'));
    }

    public function storePropertyLoss(Request $request)
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
}
