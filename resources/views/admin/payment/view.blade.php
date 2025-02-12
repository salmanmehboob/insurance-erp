@extends('admin.layouts.app')

@push('style')
@endpush

@section('content')
    <!-- Print Button -->
    <button class="btn btn-primary mb-3" onclick="printDiv('printableArea')">Print</button>

    <div class="card" id="printableArea">
        <div class="card-body">
            <h4>Payment Details</h4>
            <table class="table table-bordered">
                <tr><th>Receipt #</th><td>RECP-{{ $payment->id}}</td></tr>
                <tr><th>Payment Date</th><td>{{ $payment->payment_date }}</td></tr>
                <tr><th>Client</th><td>{{ $payment->client->applicant_name ?? 'N/A' }}</td></tr>
                <tr><th>Received By Agent</th><td>{{ $payment->receivedBy->name ?? 'N/A' }}</td></tr>
                <tr><th>Received At Location</th><td>{{ $payment->location->agency_name ?? 'N/A' }}</td></tr>
                <tr><th>Insurance Company</th><td>{{ $payment->insuranceCompany->name ?? 'N/A' }}</td></tr>
                <tr><th>Policy #</th><td>{{ $payment->policy_number }}</td></tr>
                <tr><th>Policy Type</th><td>{{  $payment->client->policyType->name }}</td></tr>
                <tr><th>Payment For</th><td>{{ $payment->payment_for }}</td></tr>
                <tr><th>Payment Method</th><td>{{ str_replace('_', ' ',strtoupper($payment->payment_method)) }}</td></tr>
{{--                <tr><th>Amount</th><td>${{ number_format($payment->amount, 2) }}</td></tr>--}}
{{--                <tr><th>Agency Fee</th><td>${{ number_format($payment->agency_fee, 2) }}</td></tr>--}}
                <tr><th>Total</th><td>${{ number_format($payment->total, 2) }}</td></tr>
{{--                <tr><th>Paid</th><td>${{ number_format($payment->paid, 2) }}</td></tr>--}}
{{--                <tr><th>Balance</th><td>${{ number_format($payment->balance, 2) }}</td></tr>--}}
                <tr><th>Bank Account</th><td>{{ $payment->bank->bank_name ?? 'N/A' }}</td></tr>
                <tr><th>Next Payment Due</th><td>{{ $payment->next_payment }}</td></tr>
                <tr><th>Memo / Notes</th><td>{{ $payment->notes }}</td></tr>
            </table>
        </div>
    </div>


@endsection

@push('script')
    <script>
        function printDiv(divId) {
            var printContents = document.getElementById(divId).innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        }
    </script>

@endpush
