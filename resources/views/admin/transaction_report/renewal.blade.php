@extends('admin.layouts.app')

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">Renewal Report</span></h4>
            </div>
        </div>
    </div>

    <!-- Content area -->
    <div class="content">
        <!-- Summary Cards -->
        <div class="row">
            <div class="col-md-4">
                <div class="card bg-primary">
                    <div class="card-body">
                        <h6 class="card-title text-white">Total Renewal Policies</h6>
                        <h4 class="mb-0">{{ number_format($summary['count']) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success">
                    <div class="card-body">
                        <h6 class="card-title text-white">Total Initial Premium</h6>
                        <h4 class="mb-0">${{ number_format($summary['total_initial_premium'], 2) }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info">
                    <div class="card-body">
                        <h6 class="card-title text-white">Total Initial Agency Commission</h6>
                        <h4 class="mb-0">${{ number_format($summary['total_initial_agency_commission'], 2) }}</h4>
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
                <form method="GET" action="{{ route('transaction-report.renewal') }}" id="filterForm">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="policy_type">Policy Type</label>
                                <select name="policy_type" id="policy_type" class="form-control">
                                    <option value="">All Types</option>
                                    @foreach($policyTypes as $type)
                                        <option
                                            value="{{ $type->id }}" {{ $request->get('policy_type') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="agency_location_id">Agency Location</label>
                                <select name="agency_location_id" id="agency_location_id" class="form-control">
                                    <option value="">All Locations</option>
                                    @foreach($agencies as $agency)
                                        <option
                                            value="{{ $agency->id }}" {{ $request->get('agency_location_id') == $agency->id ? 'selected' : '' }}>
                                            {{ $agency->agency_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex align-items-end mt-3">
                        <div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-search"></i> Apply Filters
                            </button>
                            <a href="{{ route('transaction-report.new-policy') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Clear Filters
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Renewal Report Table -->
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Renewal Report</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>Effective Date</th>
                        <th>Client Name</th>
                        <th>Policy Type</th>
                        <th>Primary Agent</th>
                        <th>Company</th>
                        <th>Initial Premium</th>
                        <th>Initial Agency Commission</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        {{--                        {{dd($client)}}--}}
                        <tr>
                            <td> {{ $client->policy->effective_date ?? 'N/A' }} </td>
                            <td>{{   $client->applicant_name ?? 'N/A' }}</td>
                            <td>{{  $client->policyType->name  }}</td>
                            <td>{{ optional($client->policy->agent)->name ?? 'N/A' }}</td>
                            <td>{{ optional($client->policy->insuranceCompany)->name ?? 'N/A' }}</td>
                            <td>${{  ($client->payment->initial_premium ??  0 ) }}</td>
                            <td>${{  ($client->payment->initial_agency_commission ?? 0) }}</td>
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
