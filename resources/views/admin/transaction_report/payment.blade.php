@extends('admin.layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">Payment Report</span></h4>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="content">
        <!-- Summary Cards -->
        <div class="row">
            <div class="col-md-3">
                <div class="card bg-primary ">
                    <div class="card-body">
                        <h6 class="card-title text-white">Total Payments</h6>
                        <h4 class="mb-0">{{ number_format($summary['count']) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-success ">
                    <div class="card-body">
                        <h6 class="card-title text-white ">Total Amount</h6>
                        <h4 class="mb-0">${{ number_format($summary['total_amount'], 2) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-info ">
                    <div class="card-body">
                        <h6 class="card-title text-white ">Agency Fees</h6>
                        <h4 class="mb-0">${{ number_format($summary['total_agency_fee'], 2) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card bg-warning ">
                    <div class="card-body">
                        <h6 class="card-title text-white ">Total Balance</h6>
                        <h4 class="mb-0">${{ number_format($summary['total_balance'], 2) }}</h4>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters Card -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Filters</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ route('transaction-report.payment') }}" id="filterForm">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="client_id">Client</label>
                                <select name="client_id" id="client_id" class="form-control">
                                    <option value="">All Clients</option>
                                    @foreach($clients as $client)
                                        <option
                                            value="{{ $client->id }}" {{ $request->get('client_id') == $client->id ? 'selected' : '' }}>
                                            {{ $client->applicant_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="insurance_company_id">Insurance Company</label>
                                <select name="insurance_company_id" id="insurance_company_id" class="form-control">
                                    <option value="">All Companies</option>
                                    @foreach($insuranceCompanies as $company)
                                        <option
                                            value="{{ $company->id }}" {{ $request->get('insurance_company_id') == $company->id ? 'selected' : '' }}>
                                            {{ $company->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="payment_method">Payment Method</label>
                                <select name="payment_method" id="payment_method" class="form-control">
                                    <option value="">All Methods</option>
                                    @foreach($paymentMethods as $key => $method)
                                        <option
                                            value="{{ $key }}" {{ $request->get('payment_method') == $key ? 'selected' : '' }}>
                                            {{ $method }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="payment_for">Payment For</label>
                                <select name="payment_for" id="payment_for" class="form-control">
                                    <option value="">All</option>
                                    {{--                                    @foreach($paymentForOptions as $option)--}}
                                    {{--                                        <option value="{{ $option }}" {{ $request->get('payment_for') == $option ? 'selected' : '' }}>--}}
                                    {{--                                            {{ $option }}--}}
                                    {{--                                        </option>--}}
                                    {{--                                    @endforeach--}}

                                    <option
                                        value="Downpayment" {{ $request->get('payment_for') == 'Downpayment' ? 'selected' : '' }}>
                                        Downpayment
                                    </option>
                                    <option
                                        value="Monthly Payment" {{ $request->get('payment_for') == 'Monthly Payment' ? 'selected' : '' }}>
                                        Monthly Payment
                                    </option>
                                    <option
                                        value="Endorsement" {{ $request->get('payment_for') == 'Endorsement' ? 'selected' : '' }}>
                                        Endorsement
                                    </option>
                                    <option
                                        value="Remaining Balance" {{ $request->get('payment_for') == 'Remaining Balance' ? 'selected' : '' }}>
                                        Remaining Balance
                                    </option>
                                    <option
                                        value="Other" {{ $request->get('payment_for') == 'Other' ? 'selected' : '' }}>
                                        Other
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="received_at">Received At Location</label>
                                <select name="received_at" id="received_at" class="form-control">
                                    <option value="">All Locations</option>
                                    @foreach($agencies as $agency)
                                        <option
                                            value="{{ $agency->id }}" {{ $request->get('received_at') == $agency->id ? 'selected' : '' }}>
                                            {{ $agency->agency_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bank_id">Bank</label>
                                <select name="bank_id" id="bank_id" class="form-control">
                                    <option value="">All Banks</option>
                                    @foreach($banks as $bank)
                                        <option
                                            value="{{ $bank->id }}" {{ $request->get('bank_id') == $bank->id ? 'selected' : '' }}>
                                            {{ $bank->bank_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="received_by">Received By</label>
                                <select name="received_by" id="received_by" class="form-control">
                                    <option value="">All Agents</option>
                                    @foreach($agents as $agent)
                                        <option
                                            value="{{ $agent->id }}" {{ $request->get('received_by') == $agent->id ? 'selected' : '' }}>
                                            {{ $agent->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="form-control"
                                       value="{{ $request->get('start_date') }}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="form-control"
                                       value="{{ $request->get('end_date') }}">
                            </div>
                        </div>
                        <div class="col-md-9 d-flex align-items-end">
                            <div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i> Apply Filters
                                </button>
                                <a href="{{ route('transaction-report.payment') }}" class="btn btn-secondary">
                                    <i class="fas fa-times"></i> Clear Filters
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Payment Report Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Payment Report</h5>
            </div>
            <div class="card-body">
                <table id="payment-table" class="table table-striped datatables-reponsive">

                    <thead>
                    <tr>
                        <th>Receipt #</th>
                        <th>Payment Date</th>
                        <th>Received From</th>
                        <th>Received By</th>
                        <th>Payment For</th>
                        <th>Amount</th>
                        <th>Fee</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Balance</th>
                        <th>Payment Method</th>
                        <th>Received At</th>
                        <th>Insurance Company</th>
                        <th>Bank</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($payments as $payment)
                        <tr>
                            <td>RECP-{{ $payment->id }}</td>
                            <td>{{ $payment->payment_date ? date('M d, Y', strtotime($payment->payment_date)) : 'N/A' }}</td>
                            <td>{{ $payment->client->applicant_name ?? 'N/A' }}</td>
                            <td>{{ $payment->receivedBy->name ?? 'N/A' }}</td>
                            <td>{{ $payment->payment_for ?? 'N/A' }}</td>
                            <td>${{ number_format($payment->amount, 2) }}</td>
                            <td>${{ number_format($payment->agency_fee, 2) }}</td>
                            <td>${{ number_format($payment->total, 2) }}</td>
                            <td>${{ number_format($payment->paid, 2) }}</td>
                            <td>${{ number_format($payment->balance, 2) }}</td>
                            <td>{{ str_replace('_', ' ', strtoupper($payment->payment_method)) }}</td>
                            <td>{{ $payment->location->agency_name ?? 'N/A' }}</td>
                            <td>{{ $payment->insuranceCompany->name }}</td>
                            <td>{{ $payment->bank->bank_name ?? 'N/A' }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script src="{{ asset('backend/js/datatables.js') }}"></script>
@endpush
