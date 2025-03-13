<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Client;
use App\Models\ClientPolicy;
use App\Models\Forms\AgentBrokerForm;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        return view('admin.clientForms.index', compact('title', 'forms', 'type'));

    }

    public function showForm($id, $type)
    {
        $title = 'Forms';
        $form = [];
        if ($type === 'agent_broker') {
            $form = AgentBrokerForm::find($id);
        }

        return view('admin.clientForms.forms.agent_broker_show', compact('title', 'form', 'type'));

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

        } catch (\Exception $e) {
            DB::rollBack();

            //
            \Log::error('Error saving client policy: ' . $e->getMessage());

            return redirect()->back()->with('error', 'An error occurred while saving the Form Data. Please try again.' . $e->getMessage());
        }
    }
}
