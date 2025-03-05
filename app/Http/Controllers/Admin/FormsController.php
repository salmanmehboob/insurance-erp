<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Forms\AgentBrokerForm;
use App\Models\InsuranceCompany;
use App\Models\User;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function create()
    {
        $agents = Agent::all();
        $insuranceCompanies = InsuranceCompany::all();
        $clients = Client::all();
        $users = User::all();

        return view('admin.clientForms.create_agent_broker_form', compact('agents', 'insuranceCompanies', 'clients', 'users'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'agent_id' => 'required',
            'insurance_company_id' => 'required',
            'code' => 'required',
            'insured_signature' => 'nullable|image|max:2048',
        ]);

        // Upload signature file if exists
        $filePath = null;
        if ($request->hasFile('insured_signature')) {
            $filePath = $request->file('insured_signature')->store('signatures', 'public');
        }
        $user_id = auth()->user()->id;

        // Create the form entry
        AgentBrokerForm::create([
            'agent_id' => $request->agent_id,
            'insurance_company_id' => $request->insurance_company_id,
            'code' => $request->code,
            'sub_code' => $request->sub_code,
            'current_agency' => $request->current_agency,
            'current_producer' => $request->current_producer,
            'agency_customer_id' => $request->agency_customer_id,
            'clients_ids' => implode(',', $request->clients_ids),
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

        return redirect()->route('dashboard')->with('success', 'Agent Broker Form submitted successfully!');
    }

}
