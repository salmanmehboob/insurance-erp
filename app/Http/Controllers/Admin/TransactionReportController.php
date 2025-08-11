<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\Client;
use App\Models\InsuranceCompany;
use App\Models\Agent;
use App\Models\Agency;
use App\Models\BankAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionReportController extends Controller
{
    public function __construct()
    {
        $this->middleware(['permission:view-payment'])->only(['paymentReport']);
    }

    public function paymentReport(Request $request)
    {
        // Get filter parameters
        $clientId = $request->get('client_id');
        $insuranceCompanyId = $request->get('insurance_company_id');
        $paymentMethod = $request->get('payment_method');
        $receivedAt = $request->get('received_at');
        $bankId = $request->get('bank_id');
        $receivedBy = $request->get('received_by');
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');
        $paymentFor = $request->get('payment_for');

        // Build query
        $query = Payment::with(['client', 'insuranceCompany', 'receivedBy', 'location', 'bank']);

        // Apply filters
        if ($clientId) {
            $query->where('client_id', $clientId);
        }

        if ($insuranceCompanyId) {
            $query->where('insurance_company_id', $insuranceCompanyId);
        }

        if ($paymentMethod) {
            $query->where('payment_method', $paymentMethod);
        }

        if ($paymentFor) {
            $query->where('payment_for', $paymentFor);
        }

        if ($receivedAt) {
            $query->where('received_at', $receivedAt);
        }

        if ($bankId) {
            $query->where('bank_id', $bankId);
        }

        if ($receivedBy) {
            $query->where('received_by', $receivedBy);
        }

        if ($startDate) {
            $query->where('payment_date', '>=', $startDate);
        }

        if ($endDate) {
            $query->where('payment_date', '<=', $endDate);
        }

        // Get paginated results
        $payments = $query->orderBy('payment_date', 'desc')->paginate(15);

        // Get filter data for dropdowns
        $clients = Client::orderBy('applicant_name')->get();
        $insuranceCompanies = InsuranceCompany::orderBy('name')->get();
        $agents = Agent::orderBy('name')->get();
        $agencies = Agency::orderBy('agency_name')->get();
        $banks = BankAccount::orderBy('bank_name')->get();

        // Payment For options (distinct values from existing payments)
        $paymentForOptions = Payment::select('payment_for')
            ->whereNotNull('payment_for')
            ->where('payment_for', '!=', '')
            ->distinct()
            ->orderBy('payment_for')
            ->pluck('payment_for');

        // Get payment methods (assuming they are predefined)
        $paymentMethods = [
            'Cash' => 'Cash',
            'Check' => 'Check',
            'Credit Card' => 'Credit Card',
            'Debit Card' => 'Debit Card',
            'Bank Transfer' => 'Bank Transfer',
            'Online Payment' => 'Online Payment'
        ];

        // Calculate summary statistics
        $summary = [
            'total_amount' => $query->sum('amount'),
            'total_agency_fee' => $query->sum('agency_fee'),
            'total_paid' => $query->sum('paid'),
            'total_balance' => $query->sum('balance'),
            'count' => $query->count()
        ];

        return view('admin.transaction_report.payment', compact(
            'payments',
            'clients',
            'insuranceCompanies',
            'agents',
            'agencies',
            'banks',
            'paymentMethods',
            'paymentForOptions',
            'summary',
            'request'
        ));
    }
}
