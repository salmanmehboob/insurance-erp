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
                    @can('create-company')
                        <div class="col-md-12 mt-5">
                            <a href="{{ route('add-company') }}" class="btn btn-outline-primary float-end">
                                <b><i class="fas fa-plus"></i></b> {{ $title }}
                            </a>
                        </div>
                    @endcan
                </div>
            </div>

            <div class="card-body">
                <table id="insurance-company-table" class="table table-striped datatables-reponsive">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>City</th>
                        <th>Agency Code</th>
                        <th>Commission (%)</th>
                        <th class="text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($insuranceCompanies as $company)
                        <tr>
                            <td data-bs-toggle="modal" data-bs-target="#companyModal" class="clickable-row"
                                data-id="{{ $company->id }}"
                                data-name="{{ $company->name }}"
                                data-phone_no="{{ $company->phone_no }}"
                                data-city="{{ $company->city }}"
                                data-state="{{ $company->state->name ?? 'N/A' }}"
                                data-zip_code="{{ $company->zip_code }}"
                                data-address="{{ $company->address }}"
                                data-fax_no="{{ $company->fax_no }}"
                                data-website="{{ $company->website }}"
                                data-agency_code="{{ $company->agency_code }}"
                                data-commission_percentage="{{ $company->commission_in_percentage }}"
                                data-notes="{{ $company->note }}"
                            >{{ $company->name }}</td>
                            <td>{{ $company->phone_no }}</td>
                            <td>{{ $company->city }}</td>
                            <td>{{ $company->agency_code }}</td>
                            <td>{{ $company->commission_in_percentage }}</td>
                            <td>
                                <div class="d-flex action-buttons">
                                    @can('edit-insurance-company')
                                        <a title="Edit" href="{{ route('edit-insurance-company', $company->id) }}"
                                           class="text-primary me-2 action-buttons">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    @endcan

                                    @can('delete-insurance-company')
                                        <a href="javascript:void(0)"
                                           data-url="{{ route('destroy-insurance-company') }}"
                                           data-status="0"
                                           data-label="delete"
                                           data-id="{{ $company->id }}"
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
        <div class="modal fade" id="companyModal" tabindex="-1" aria-labelledby="companyModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="companyModalLabel">Insurance Company Details</h5>
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
                                    <label for="agency_code" class="form-label">Agency Code</label>
                                    <input type="text" class="form-control" id="agency_code" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="commission_percentage" class="form-label">Commission (%)</label>
                                    <input type="text" class="form-control" id="commission_percentage" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="fax_no" class="form-label">Fax</label>
                                    <input type="text" class="form-control" id="fax_no" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="website" class="form-label">Website</label>
                                    <input type="text" class="form-control" id="website" disabled>
                                </div>
                                <div class="col-md-12">
                                    <label for="notes" class="form-label">Notes</label>
                                    <textarea class="form-control" id="notes" disabled></textarea>
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
            $('.select2').select2();

            // Populate modal with company details on row click
            $(".clickable-row").on("click", function () {
                const fields = [
                    "name", "phone_no", "address", "city", "state",
                    "zip_code", "agency_code", "commission_percentage",
                    "fax_no", "website", "notes"
                ];

                fields.forEach(field => {
                    $(`#${field}`).val($(this).data(field));
                });
            });
        });
    </script>
@endpush
