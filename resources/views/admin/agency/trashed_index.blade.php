@extends('admin.layouts.app')

@section('content')

    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold">{{$title}}</span></h4>
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
                        <div class="col-md-12 mt-5">

                                <a href="{{route('show-agency')}}" class="btn btn-outline-secondary float-end me-4">
                                    <b><i class="fas fa-eye"></i></b> View Active Agencies
                                </a>
                        </div>
                </div>
            </div>

            <div class="card-body">
                <table id="agency-table" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>Logo</th>
                        <th>Agency Name</th>
                        <th>Address</th>
                        <th>City</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($trashedAgencies as $agency)
                        <tr>
                            <td><img src="{{ showImage($agency->logo, 'logos') }}" width="50" height="50"></td>
                            <td data-bs-toggle="modal" data-bs-target="#agencyModal" class="clickable-row"
                                data-id="{{ $agency->id }}"
                                data-agency_name="{{ $agency->agency_name }}" data-address="{{ $agency->address }}"
                                data-city="{{ $agency->city }}" data-state_name="{{ $agency->state->name ?? 'N/A' }}"
                                data-zip_code="{{ $agency->zip_code }}" data-phone="{{ $agency->phone }}"
                                data-secondary_phone="{{ $agency->secondary_phone }}" data-fax="{{ $agency->fax }}"
                                data-account_number="{{ $agency->account_number }}"
                                data-bank_name="{{ $agency->bank->bank_name ?? 'N/A' }}"
                                data-custom_message="{{ $agency->custom_message }}"
                                data-logo="{{ showImage($agency->logo, 'logos') }}">{{ $agency->agency_name }}</td>
                            <td>{{ $agency->address }}</td>
                            <td>{{ $agency->city }}</td>
                            <td class="text-center">
                                <form action="{{ route('restore-agency', $agency->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Restore
                                    </button>
                                </form>
                                <form action="{{ route('force-delete-agency', $agency->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Delete Permanently
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>

                </table>
            </div>
        </div>
        <!-- /basic datatable -->
        <!-- Modal -->
        <div class="modal fade" id="agencyModal" tabindex="-1" aria-labelledby="agencyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agencyModalLabel">Agency Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="agency_name" class="form-label">Agency Name</label>
                                    <input type="text" class="form-control" id="agency_name" disabled>
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
                                    <label for="state_id" class="form-label">State</label>
                                    <input type="text" class="form-control" id="state_id" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="zip_code" class="form-label">Zip Code</label>
                                    <input type="text" class="form-control" id="zip_code" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="secondary_phone" class="form-label">Secondary Phone</label>
                                    <input type="text" class="form-control" id="secondary_phone" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="fax" class="form-label">Fax</label>
                                    <input type="text" class="form-control" id="fax" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="account_number" class="form-label">Account Number</label>
                                    <input type="text" class="form-control" id="account_number" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="bank_id" class="form-label">Bank</label>
                                    <input type="text" class="form-control" id="bank_id" disabled>
                                </div>
                                <div class="col-md-12">
                                    <label for="custom_message" class="form-label">Custom Message</label>
                                    <textarea class="form-control" id="custom_message" rows="3" disabled></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="logo" class="form-label">Logo</label>
                                    <img id="logo" class="img-fluid m-5 " width="128" height="128" src=""
                                         alt="Agency Logo">
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


            // When a row is clicked, populate the modal
            $(".clickable-row").on("click", function() {
                var agency_name = $(this).data("agency_name");
                var address = $(this).data("address");
                var city = $(this).data("city");
                var state_name = $(this).data("state_name"); // Get state name
                var zip_code = $(this).data("zip_code");
                var phone = $(this).data("phone");
                var secondary_phone = $(this).data("secondary_phone");
                var fax = $(this).data("fax");
                var account_number = $(this).data("account_number");
                var bank_name = $(this).data("bank_name"); // Get bank name
                var custom_message = $(this).data("custom_message");
                var logo = $(this).data("logo");

                // Set the values in the modal fields
                $('#agency_name').val(agency_name);
                $('#address').val(address);
                $('#city').val(city);
                $('#state_id').val(state_name); // Display state name
                $('#zip_code').val(zip_code);
                $('#phone').val(phone);
                $('#secondary_phone').val(secondary_phone);
                $('#fax').val(fax);
                $('#account_number').val(account_number);
                $('#bank_id').val(bank_name); // Display bank name
                $('#custom_message').val(custom_message);
                $('#logo').attr('src', logo);
            });


        });
    </script>
@endpush
