@extends('admin.layouts.app')
@push('styles')

    @endpush
@section('content')

    <div class="container-fluid p-0">

        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Analytics</strong> Dashboard</h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <a href="#" class="btn btn-light bg-white me-2">Invite a Friend</a>
                <a href="#" class="btn btn-primary">New Project</a>
            </div>
        </div>
        <div class="container mt-4">

            <div class="card p-3">
                <h5>Policy Information</h5>
                <form action="{{route('dashboard')}}" method="get">
                    <div class="row">

                        <div class="col-md-4">
                            <label class="form-label">Client Name</label>
                            <input
                                type="text"
                                class="form-control"
                                name="client_name"
                                placeholder="Client Name"
                                value="{{ request()->client_name }}"
                            >
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Policy Number</label>
                            <input
                                type="text"
                                class="form-control"
                                name="policy_number"
                                placeholder="Policy Number"
                                value="{{ request()->policy_number }}"
                            >
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input
                                type="text"
                                class="form-control"
                                name="phone_number"
                                placeholder="Last 4 digits"
                                value="{{ request()->phone_number }}"
                            >
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">File Number</label>
                            <input
                                type="text"
                                class="form-control"
                                name="file_number"
                                placeholder="File Number"
                                value="{{ request()->file_number }}"
                            >
                        </div>

                        <div class="col-md-5">
                            <label class="form-label">Company</label>
                            <input
                                type="text"
                                class="form-control"
                                name="insurance_company"
                                placeholder="Insurance Company"
                                value="{{ request()->insurance_company }}"
                            >
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Policy Type</label>
                            <select name="policy_type_id" class="form-control">
                                <option value="">Select Policy Type</option>
                                @if(isset($policyTypes) && count($policyTypes) > 0)
                                    @foreach($policyTypes as $type)
                                        <option
                                            value="{{ $type->id }}" {{ request('policy_type_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled>No policy types available</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Location</label>
                            <select name="location" class="form-control">
                                <option value="">Select Location</option>
                                @if(isset($agencies) && count($agencies) > 0)
                                    @foreach($agencies as $agency)
                                        <option
                                            value="{{ $agency->id }}" {{ request('location') == $agency->id ? 'selected' : '' }}>
                                            {{ $agency->agency_name }}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled>No agencies available</option>
                                @endif
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Policy Status</label>
                            <select name="policy_status" class="form-control">
                                <option value="">Select Policy Status</option>
                                @if(isset($policyStatuses))
                                    @foreach($policyStatuses as $status)
                                        <option
                                            value="{{ $status->id }}" {{ request('policy_status') == $status->id ? 'selected' : '' }}>
                                            {{ $status->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>

                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-3 d-flex align-items-end">
                            <button class="btn btn-info w-100">Search</button>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <a href="{{route('dashboard')}}" class="btn btn-dark w-100">Reset</a>
                        </div>
                    </div>
                    <div class="row mt-3">

                    </div>
                </form>
            </div>

            <div class="card-body">
                <table id="datatable" class="table table-hover  datatables-responsive">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Eff Date</th>
                        <th>Expiry Date</th>
                        <th>Client Name</th>
                        <th>Policy Type</th>
                        <th>Company Name</th>
                        <th>Agent</th>
                        <th>Policy</th>
                        <th>Status</th>
                        <th>File No</th>
                        <th>Phone</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($policies))
                        @foreach ($policies as $policy)
                            <tr class="nav-link-active" data-bs-toggle="modal"
                                data-bs-target="#policyModal-{{ $policy->id }}" style="cursor: pointer;">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $policy->effective_date }}</td>
                                <td>{{ $policy->expiration_date }}</td>
                                <td>{{ $policy->client ? $policy->client->applicant_name : 'N/A' }}</td>
                                <td>{{ $policy->client->policyType->name ?? 'N/A' }}</td>
                                <td>{{ $policy->insuranceCompany->name ?? 'N/A' }}</td>
                                <td>{{ $policy->agent->name ?? 'N/A' }}</td>
                                <td>{{ $policy->policy_number }}</td>
                                <td>{{ $policy->policyStatus->name ?? 'N/A' }}</td>
                                <td>{{ $policy->file_number }}</td>
                                <td>{{ $policy->client->cell_phone_no ?? 'N/A' }}</td>
                            </tr>
                            @include('admin.client.client_policy_modal')
                        @endforeach
                    </tbody>
                    @endif
                </table>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script src="{{asset('backend/js/datatables.js')}}"></script>
@endpush
