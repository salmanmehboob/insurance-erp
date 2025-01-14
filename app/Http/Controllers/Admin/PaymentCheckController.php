<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\Client;
use App\Models\Payment;
use App\Models\PaymentBank;
use App\Models\PaymentCheck;
use App\Models\PaymentCommercialDetail;
use App\Models\PaymentCommercialLiability;
use App\Models\PaymentCoverage;
use App\Models\PaymentDriver;
use App\Models\PaymentHouseDetail;
use App\Models\PaymentMobileHomeDetail;
use App\Models\PaymentNotes;
use App\Models\PaymentPayment;
use App\Models\PaymentPolicy;
use App\Models\PaymentVehicle;
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
use App\Models\User;
use App\Models\UsState;
use App\Models\VehicleMake;
use App\Models\VehicleModel;
use App\Models\Year;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PaymentCheckController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-payment-check'])->only(['index', 'show']);
        $this->middleware(['permission:create-payment-check'])->only(['create', 'store']);
        $this->middleware(['permission:edit-payment-check'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-payment-check'])->only('destroy');
    }

    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $title = 'Payment Checks';
        $paymentChecks = PaymentCheck::with('client')->orderBy('created_at', 'DESC')->get();

        return view('admin.payment_check.index', compact('title', 'paymentChecks'));
    }


    /**
     * Show the form for creating a new payment.
     */
    public function create(Request $request)
    {
        $title = 'Add Payment';
        $clients = Client::all();
        $insurance_companies = InsuranceCompany::all();
        $agents = Agent::all();
        $locations = Agency::all();
        $banks = PaymentBank::all();
        return view('admin.payment_check.create', compact('title',
            'clients', 'insurance_companies', 'agents', 'banks',
            'locations'));
    }

    /**
     * Store a newly created payment in the database.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'payment_bank_id' => 'required|exists:payment_banks,id',
            'check_no' => 'required|string',
            'payment_date' => 'required|date',
            'pay_to' => 'required|exists:insurance_companies,id',
            'amount' => 'required',
            'notes' => 'nullable|string|max:500',
            'account' => 'required',
            'client_id' => 'required|exists:clients,id',
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'policy_number' => 'required|string|max:50',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Format numeric fields by removing the dollar sign
            $amount = removeDollarSign($request->amount);
            // Create Payment record
            $payment = PaymentCheck::create([

                'payment_bank_id' => $request->payment_bank_id,
                'check_no' => $request->check_no,
                'payment_date' => $request->payment_date,
                'pay_to' => $request->pay_to,
                'amount' => $amount,
                'notes' => $request->notes,
                'account' => $request->account,
                'client_id' => $request->client_id,
                'insurance_company_id' => $request->insurance_company_id,
                'policy_number' => $request->policy_number,
            ]);

            DB::commit();

            return redirect()->route('show-payment-check')->with('success', 'Check created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while creating the payment.')->withInput();
        }
    }

    /**
     * Show the form for editing an payment.
     */
    public function edit($id)
    {
        $payment = PaymentCheck::find($id);

        if (!$payment) {
            return redirect()->route('show-payment-check')->with('error', 'Payment not found.');
        }

        $title = 'Edit Payment';
        $clients = Client::all();
        $insurance_companies = InsuranceCompany::all();
        $agents = Agent::all();
        $locations = Agency::all();
        $banks = PaymentBank::all();
        return view('admin.payment_check.edit', compact('title', 'payment',
            'clients', 'insurance_companies', 'agents', 'banks',
            'locations'));

    }


    /**
     * Update an existing payment in the database.
     */
    public function update(Request $request)
    {

         $validator = Validator::make($request->all(), [
            'payment_bank_id' => 'required|exists:payment_banks,id',
            'check_no' => 'required|string',
            'payment_date' => 'required|date',
            'pay_to' => 'required|exists:insurance_companies,id',
            'amount' => 'required',
            'notes' => 'nullable|string|max:500',
            'account' => 'required',
            'client_id' => 'required|exists:clients,id',
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'policy_number' => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            $id = $request->id;
            // Find the payment by ID
            $payment = PaymentCheck::findOrFail($id);


            if (!$payment) {
                return redirect()->route('show-payment-check')->with('error', 'Check not found.');
            }


            // Format numeric fields by removing the dollar sign
            $amount = removeDollarSign($request->amount);

            // Update payment details
            $payment->update([

                'payment_bank_id' => $request->payment_bank_id,
                'check_no' => $request->check_no,
                'payment_date' => $request->payment_date,
                'pay_to' => $request->pay_to,
                'amount' => $amount,
                'notes' => $request->notes,
                'account' => $request->account,
                'client_id' => $request->client_id,
                'insurance_company_id' => $request->insurance_company_id,
                'policy_number' => $request->policy_number,
            ]);


            DB::commit();
            return redirect()->route('show-payment-check')->with('success', 'Check updated successfully.');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Delete an payment.
     */
    public function destroy(Request $request)
    {

        $payment = PaymentCheck::find($request->id);

        if (!$payment) {
            return response()->json(['error' => 'Check not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the payment
            $payment->delete();
            DB::commit();

            return response()->json(['success' => 'Check deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function trashed()
    {
        $title = 'Trashed Payments';
        $paymentChecks = PaymentCheck::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->get();


        return view('admin.payment_check.trashed', compact('title', 'paymentChecks'));
    }

    public function restore($id)
    {
        $payment = PaymentCheck::onlyTrashed()->findOrFail($id);
        $payment->restore();

        return redirect()->route('trashed-payment-check')->with('success', 'Check restored successfully.');
    }

    public function forceDelete($id)
    {
        $payment = PaymentCheck::onlyTrashed()->findOrFail($id);
        $payment->forceDelete();

        return redirect()->route('trashed-payment-check')->with('success', 'Check permanently deleted.');
    }

}
