<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agency;
use App\Models\Agent;
use App\Models\BankAccount;
use App\Models\Client;
use App\Models\Payment;
use App\Models\PaymentBank;
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

class PaymentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(['permission:view-payment'])->only(['index', 'show']);
        $this->middleware(['permission:create-payment'])->only(['create', 'store']);
        $this->middleware(['permission:edit-payment'])->only(['edit', 'update']);
        $this->middleware(['permission:delete-payment'])->only('destroy');
    }

    /**
     * Display a listing of the payments.
     */
    public function index()
    {
        $title = 'Payments';
        $payments = Payment::with('client')->orderBy('created_at', 'DESC')->get();

        return view('admin.payment.index', compact('title', 'payments'));
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
        $banks = BankAccount::all();
        return view('admin.payment.create', compact('title',
            'clients', 'insurance_companies', 'agents', 'banks',
            'locations'));
    }

    /**
     * Store a newly created payment in the database.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'payment_date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'policy_number' => 'required|string|max:50',
            'payment_for' => 'required|string',
            'payment_method' => 'required|string',
            'amount' => 'required',
            'agency_fee' => 'required',
            'total' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'bank_id' => 'required|exists:bank_accounts,id',
            'next_payment' => 'nullable|date',
            'notes' => 'nullable|string|max:500',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Format numeric fields by removing the dollar sign
            $amount = removeDollarSign($request->amount);
            $agencyFee = removeDollarSign($request->agency_fee);
            $total = removeDollarSign($request->total);
            $paid = removeDollarSign($request->paid);
            $balance = removeDollarSign($request->balance);


            // Create Payment record
            $payment = Payment::create([

                'payment_date' => $request->payment_date,
                'client_id' => $request->client_id,
                'insurance_company_id' => $request->insurance_company_id,
                'policy_number' => $request->policy_number,
                'payment_for' => $request->payment_for,
                'payment_method' => $request->payment_method,
                'amount' => $amount,
                'agency_fee' => $agencyFee,
                'total' => $total,
                'paid' => $paid,
                'balance' => $balance,
                'bank_id' => $request->bank_id,
                'next_payment' => $request->next_payment,
                'notes' => $request->notes,
                'received_at' => $request->received_at,
                'received_by' => $request->received_by,
                'check_to_finance' => $request->has('check_to_finance'),
                'payment_send_to_insurance_company' => $request->has('payment_send_to_insurance_company'),
            ]);

            DB::commit();

            return redirect()->route('show-payment')->with('success', 'Payment created successfully.');
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
        $payment = Payment::find($id);

        if (!$payment) {
            return redirect()->route('show-payment')->with('error', 'Payment not found.');
        }

        $title = 'Edit Payment';
        $clients = Client::all();
        $insurance_companies = InsuranceCompany::all();
        $agents = Agent::all();
        $locations = Agency::all();
        $banks = BankAccount::all();
        return view('admin.payment.edit', compact('title', 'payment',
            'clients', 'insurance_companies', 'agents', 'banks',
            'locations'));

    }


    /**
     * Update an existing payment in the database.
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'payment_date' => 'required|date',
            'client_id' => 'required|exists:clients,id',
            'insurance_company_id' => 'required|exists:insurance_companies,id',
            'policy_number' => 'required|string',
            'payment_for' => 'required|string',
            'payment_method' => 'required|string',
            'amount' => 'required',
            'agency_fee' => 'required',
            'total' => 'required',
            'paid' => 'required',
            'balance' => 'required',
            'bank_id' => 'required|exists:bank_accounts,id',
            'notes' => 'nullable|string',
            'next_payment' => 'nullable|date',
        ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::beginTransaction();

        try {
            // Find the payment by ID
            $payment = Payment::findOrFail($id);


            if (!$payment) {
                return redirect()->route('show-payment')->with('error', 'Payment not found.');
            }


            // Format numeric fields by removing the dollar sign
            $amount = removeDollarSign($request->amount);
            $agencyFee = removeDollarSign($request->agency_fee);
            $total = removeDollarSign($request->total);
            $paid = removeDollarSign($request->paid);
            $balance = removeDollarSign($request->balance);

            // Update payment details
            $payment->update([
                'payment_date' => $request->payment_date,
                'client_id' => $request->client_id,
                'insurance_company_id' => $request->insurance_company_id,
                'policy_number' => $request->policy_number,
                'payment_for' => $request->payment_for,
                'payment_method' => $request->payment_method,
                'amount' => $amount,
                'agency_fee' => $agencyFee,
                'total' => $total,
                'paid' => $paid,
                'balance' => $balance,
                'bank_id' => $request->bank_id,
                'next_payment' => $request->next_payment,
                'notes' => $request->notes,
                'received_at' => $request->received_at,
                'received_by' => $request->received_by,
                'check_to_finance' => $request->has('check_to_finance'),
                'payment_send_to_insurance_company' => $request->has('payment_send_to_insurance_company'),
            ]);

//            dd($payment);

            DB::commit();
            return redirect()->route('show-payment')->with('success', 'Payment updated successfully.');

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

        $payment = Payment::find($request->id);

        if (!$payment) {
            return response()->json(['error' => 'Payment not found.'], 404);
        }

        DB::beginTransaction();

        try {
            // Delete the payment
            $payment->delete();
            DB::commit();

            return response()->json(['success' => 'Payment deleted successfully.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Something went wrong: ' . $e->getMessage()], 500);
        }
    }


    public function trashed()
    {
        $title = 'Trashed Payments';
        $payments = Payment::onlyTrashed()
            ->orderBy('deleted_at', 'DESC')
            ->get();


        return view('admin.payment.trashed', compact('title', 'payments'));
    }

    public function restore($id)
    {
        $payment = Payment::onlyTrashed()->findOrFail($id);
        $payment->restore();

        return redirect()->route('trashed-payments')->with('success', 'Payment restored successfully.');
    }

    public function forceDelete($id)
    {
        $payment = Payment::onlyTrashed()->findOrFail($id);
        $payment->forceDelete();

        return redirect()->route('trashed-payments')->with('success', 'Payment permanently deleted.');
    }

}
