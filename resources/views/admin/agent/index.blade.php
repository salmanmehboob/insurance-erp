@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">{{ $title }}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">

        <!-- Basic datatable -->
        <div class="card">
            <div class="card-header header-elements-inline">
                <h5 class="card-title"></h5>
                <div class="header-elements">
                    @can('create-agent')
                        <div class="col-md-12 mt-5">
                            <a href="{{ route('add-agent') }}" class="btn btn-outline-primary float-end">
                                <b><i class="fas fa-plus"></i></b> {{ $title }}
                            </a>
                        </div>
                    @endcan
                </div>
            </div>

            <div class="card-body">
                <table id="agent-table" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                         <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($agents as $agent)
                        <tr>
                             <td data-bs-toggle="modal" data-bs-target="#agentModal" class="clickable-row"
                                data-id="{{ $agent->id }}"
                                data-name="{{ $agent->name }}" data-email="{{ $agent->email }}"
                                data-phone_no="{{ $agent->phone_no }}" data-city="{{ $agent->city }}"
                                data-state="{{ $agent->state }}" data-zip_code="{{ $agent->zip_code }}"
                                data-address="{{ $agent->address }}" data-bank_name="{{ $agent->bank->name ?? 'N/A' }}"
                                data-commission_percentage="{{ $agent->commission_in_percentage }}"
                                data-commission_fee="{{ $agent->commission_fee }}"
                                >{{ $agent->name }}</td>
                            <td>{{ $agent->email }}</td>
                            <td>{{ $agent->phone_no }}</td>
                            <td>{{ $agent->city }}</td>
                            <td>
                                <div class="d-flex action-buttons">
                                    @can('edit-agents')
                                        <a title="Edit" href="{{ route('edit-agent', $agent->id) }}"
                                           class="text-primary me-2 action-buttons">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('delete-agents')
                                        <a href="javascript:void(0)"
                                           data-url="{{ route('destroy-agent') }}"
                                           data-status="0"
                                           data-label="delete"
                                           data-id="{{ $agent->id }}"
                                           class="text-danger me-1 change-status-record action-buttons"
                                           title="Suspend Record">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /basic datatable -->

        <!-- Modal -->
        <div class="modal fade" id="agentModal" tabindex="-1" aria-labelledby="agentModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agentModalLabel">Agent Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="text" class="form-control" id="email" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone_no" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone_no" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="zip_code" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zip_code" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="commission_percentage" class="form-label">Commission Percentage</label>
                                    <input type="text" class="form-control" id="commission_percentage" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="commission_fee" class="form-label">Commission Fee</label>
                                    <input type="text" class="form-control" id="commission_fee" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="bank_name" class="form-label">Bank</label>
                                    <input type="text" class="form-control" id="bank_name" disabled>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script src="{{ asset('backend/js/datatables.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.select2').select2(); // Initialize Select2 dropdown

            // Populate modal with agent details on row click
            $(".clickable-row").on("click", function () {
                var name = $(this).data("name");
                var email = $(this).data("email");
                var phone_no = $(this).data("phone_no");
                var city = $(this).data("city");
                var state = $(this).data("state");
                var zip_code = $(this).data("zip_code");
                var address = $(this).data("address");
                var bank_name = $(this).data("bank_name");
                var commission_percentage = $(this).data("commission_percentage");
                var commission_fee = $(this).data("commission_fee");

                $('#name').val(name);
                $('#email').val(email);
                $('#phone_no').val(phone_no);
                $('#city').val(city);
                $('#state').val(state);
                $('#zip_code').val(zip_code);
                $('#address').val(address);
                $('#bank_name').val(bank_name);
                $('#commission_percentage').val(commission_percentage);
                $('#commission_fee').val(commission_fee);
             });
        });
    </script>
@endpush
