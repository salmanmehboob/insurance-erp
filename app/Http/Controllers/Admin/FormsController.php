<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ClientPolicy;
use App\Models\Forms\AdditionalRemarkForm;
use App\Models\Forms\AgentBrokerForm;
use App\Models\Forms\EvidenceOfPropertyForm;
use App\Models\InsuranceCompany;
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
        return view('admin.clientForms.index', compact('title', 'forms', 'type'));

    }

    public function showForm($id, $type)
    {
        $title = 'Forms';
        $form = [];
        if ($type === 'agent_broker') {
            $form = AgentBrokerForm::find($id);
            return view('admin.clientForms.forms.agent_broker_show', compact('title', 'form', 'type'));

        }
        if ($type === 'additional_remarks') {
            $form = AdditionalRemarkForm::find($id);
            return view('admin.clientForms.forms.additional_remarks_show', compact('title', 'form', 'type'));

        }
        if ($type === 'evidenceOfProperty') {
            $form = EvidenceOfPropertyForm::find($id);
            return view('admin.clientForms.forms.evidence_of_property_show', compact('title', 'form', 'type'));

        }

    }

    public function createAgentBrokerForm($id)
    {
        $clientPolicy = ClientPolicy::with('client', 'insuranceCompany', 'agent.agencies')->where('client_id', $id)->first();

        return view('admin.clientForms.create_agent_broker_form', compact('clientPolicy'));
    }

    public function storeAgentBrokerForm(Request $request)
    {


        DB::beginTransaction();

        try {
            // Validate the request
            $validatedData = $request->validate([
                'client_id' => 'required|exists:clients,id',
                'agent_id' => 'required|exists:agents,id',
                'insurance_company_id' => 'required|exists:insurance_companies,id',
                'agency_id' => 'required|exists:agencies,id',
                'code' => 'required|string|max:255',
                'sub_code' => 'nullable|string|max:255',
                'current_producer' => 'nullable|string|max:255',
                'agency_customer_id' => 'nullable|string|max:255',
                'creation_date' => 'nullable|date',
                'issued_date' => 'nullable|date',
                'insured_signature' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
                'insured_title' => 'nullable|string|max:255',
                'insured_company_name' => 'nullable|string|max:255',
                'insured_company_address' => 'nullable|string|max:255',
                'insured_company_city' => 'nullable|string|max:255',
                'insured_company_state' => 'nullable|string|max:255',
                'insured_company_zipcode' => 'nullable|string|max:20',
            ]);

            $filePath = null;
            if ($request->hasFile('insured_signature')) {
                $filePath = $request->file('insured_signature')->store('signatures', 'public');
            }
            $user_id = auth()->user()->id;

            $agentBrokerForm = AgentBrokerForm::create([
                'agent_id' => $request->agent_id,
                'insurance_company_id' => $request->insurance_company_id,
                'client_id' => $request->client_id,
                'code' => $request->code,
                'sub_code' => $request->sub_code,
                'agency_id' => $request->agency_id,
                'current_producer' => $request->current_producer,
                'agency_customer_id' => $request->agency_customer_id,
                'created_by' => $user_id,
                'creation_date' => $request->creation_date,
                'insured_signature' => $filePath,
                'issued_date' => $request->issued_date,
                'insured_title' => $request->insured_title,
                'insured_company_name' => $request->insured_company_name,
                'insured_company_address' => $request->insured_company_address,
                'insured_company_city' => $request->insured_company_city,
                'insured_company_state' => $request->insured_company_state,
                'insured_company_zipcode' => $request->insured_company_zipcode,

            ]);


            DB::commit();


            return redirect()->route('dashboard')->with('success', 'Client policy added successfully.');

        } catch (Exception $e) {
            DB::rollBack();

            //
            Log::error('Error saving client policy: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving the Form Data. Please try again.' . $e->getMessage());
        }
    }

    public function CreateAdditionalRemarksForm($id)
    {
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency','agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.create_additional_remarks_form', compact('clientPolicy','insuranceCompanies'));
    }

    public function storeAdditionalRemarksForm(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|integer|exists:clients,id',
            'agency_id' => 'nullable|integer|exists:agencies,id',  // Updated: agency_id should be nullable
            'insurance_company_id' => 'required|integer|exists:insurance_companies,id',
            'form_no' => 'required|string|max:50',
            'form_title' => 'required|string|max:100',
            'description' => 'nullable|string',
            'naic_code' => 'nullable|string|max:20',
            'agency_customer_id' => 'nullable|string|max:50',
            'loc' => 'nullable|string|max:50',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Start database transaction
        DB::beginTransaction();

        try {
            $user_id = auth()->user()->id;

            $additionalRemarksForm = AdditionalRemarkForm::create([
                'client_id' => $request->client_id,
                'agency_id' => $request->agency_id ?: null,  // Handle null value
                'insurance_company_id' => $request->insurance_company_id,
                'created_by' => $user_id,
                'form_no' => $request->form_no,
                'form_title' => $request->form_title,
                'agency_customer_id' => $request->agency_customer_id,
                'loc' => $request->loc,
                'naic_code' => $request->naic_code,
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
        $clientPolicy = ClientPolicy::with('client.policy.agency', 'insuranceCompany', 'agency','agent')->where('client_id', $id)->first();
        $insuranceCompanies = InsuranceCompany::all();

        return view('admin.clientForms.create_evidence_of_property_form', compact('clientPolicy','insuranceCompanies'));
    }

    public function storeEvidenceOfProperty(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'client_id' => 'required|integer|exists:clients,id',
            'agency_id' => 'nullable|integer|exists:agencies,id',
            'insurance_company_id' => 'nullable|integer|exists:insurance_companies,id',
            'loan_no' => 'nullable|string|max:50',
            'code' => 'nullable|string|max:50',
            'sub_code' => 'nullable|string|max:50',
            'agency_customer_id' => 'nullable|string|max:50',
            'is_terminated' => 'nullable|in:0,1',
            'evidence_date' => 'nullable|date',
            'property_description' => 'nullable|string|max:255',
            'is_perils_insured' => 'nullable|in:0,1',
            'is_basic' => 'nullable|in:0,1',
            'is_broad' => 'nullable|in:0,1',
            'is_special' => 'nullable|in:0,1',
            'coverage_description' => 'nullable|string|max:255',
            'insurance_amount' => 'nullable|numeric',
            'deductible' => 'nullable|numeric',
            'remarks' => 'nullable|string|max:255',
            'name' => 'nullable|string|max:100',
            'address' => 'nullable|string|max:255',
            'is_additional_insured' => 'nullable|in:0,1',
            'is_murtagagee' => 'nullable|in:0,1',
            'is_lenders_loss_payable' => 'nullable|in:0,1',
            'is_loss_payee' => 'nullable|in:0,1',
            'representative_name' => 'nullable|string|max:100',
        ]);
//dd($validator);
        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Start database transaction
        DB::beginTransaction();

        try {
//            $user_id = auth()->user()->id;

            $evidence = EvidenceOfPropertyForm::create([
                'client_id' => $request->client_id,
                'agency_id' => $request->agency_id ?: null,
                'insurance_company_id' => $request->insurance_company_id ?: null,
//                'created_by' => $user_id,
                'loan_no' => $request->loan_no,
                'code' => $request->code,
                'sub_code' => $request->sub_code,
                'agency_customer_id' => $request->agency_customer_id,
                'is_terminated' => $request->is_terminated,
                'evidence_date' => $request->evidence_date,
                'property_description' => $request->property_description,
                'is_perils_insured' => $request->is_perils_insured,
                'is_basic' => $request->is_basic,
                'is_broad' => $request->is_broad,
                'is_special' => $request->is_special,
                'coverage_description' => $request->coverage_description,
                'insurance_amount' => $request->insurance_amount,
                'deductible' => $request->deductible,
                'remarks' => $request->remarks,
                'name' => $request->name,
                'address' => $request->address,
                'is_additional_insured' => $request->is_additional_insured,
                'is_murtagagee' => $request->is_murtagagee,
                'is_lenders_loss_payable' => $request->is_lenders_loss_payable,
                'is_loss_payee' => $request->is_loss_payee,
                'representative_name' => $request->representative_name,
            ]);

            // Check if the data was successfully created
            if ($evidence) {
                DB::commit();
                return redirect()->back()->with('success', 'Evidence of Property Form created successfully for '. $evidence->client->applicant_name);
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


}
