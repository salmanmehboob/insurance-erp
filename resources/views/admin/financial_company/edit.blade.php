@extends('admin.layouts.app')

@push('style')
    <style>
        .repeater-item {
            margin-bottom: 20px;
        }

        .repeater-item .btn-danger {
            margin-top: 10px;
        }
    </style>
@endpush

@section('content')
    <!-- Page header -->
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4><span class="font-weight-semibold"></span>{{ $title }}</h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <!-- Form validation -->
        <div class="card">
            <!-- Company form -->
            <form action="{{ route('update-financial-company', $company->id) }}" method="POST"
                  enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                @method('PUT')
                <div class="card-body">


                    <fieldset class="border p-3 mb-4">
                        <legend class="mb-3 azm-color-444">Contact Information</legend>
                        <div class="row mt-3">
                            <!-- Company Name -->
                            <div class="col-md-6">
                                <label class="col-form-label">Company Name <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Company Name"
                                           value="{{ old('name', $company->name) }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <label class="col-form-label">Address</label>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control" placeholder="Address"
                                           value="{{ old('address', $company->address) }}">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-4">
                                <label class="col-form-label">City</label>
                                <div class="form-group">
                                    <input type="text" name="city" class="form-control" placeholder="City"
                                           value="{{ old('city', $company->city) }}">
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- State -->
                            <div class="col-md-4">
                                <label class="col-form-label">State</label>
                                <div class="form-group">
                                    <select name="state_id" class="form-control select2"
                                            data-placeholder="Select State">
                                        <option></option>
                                        @foreach($states as $state)
                                            <option value="{{ $state->id }}"
                                                {{ old('state_id', $company->state_id) == $state->id ? 'selected' : '' }}>
                                                {{ $state->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('state_id'))
                                        <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Zip Code -->
                            <div class="col-md-4">
                                <label class="col-form-label">Zip Code</label>
                                <div class="form-group">
                                    <input type="text" name="zip_code" class="form-control" placeholder="Zip Code"
                                           value="{{ old('zip_code', $company->zip_code) }}">
                                    @if ($errors->has('zip_code'))
                                        <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="phone_no" class="form-control"
                                           placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'"
                                           value="{{ old('phone_no', $company->phone_no) }}">
                                    @if ($errors->has('phone_no'))
                                        <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                    @endif
                                </div>
                            </div>

                            <!-- Fax -->
                            <div class="col-md-6">
                                <label class="col-form-label">Fax <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="fax_no" class="form-control"
                                           placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'"
                                           value="{{ old('fax_no', $company->fax_no) }}">
                                    @if ($errors->has('fax_no'))
                                        <span class="text-danger">{{ $errors->first('fax_no') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Website <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="website" class="form-control" placeholder="Website"
                                           value="{{ old('website', $company->website) }}">
                                    @if ($errors->has('website'))
                                        <span class="text-danger">{{ $errors->first('website') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Agency Code <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="agency_code" class="form-control"
                                           placeholder="Agency Code"
                                           value="{{ old('agency_code', $company->agency_code) }}">
                                    @if ($errors->has('agency_code'))
                                        <span class="text-danger">{{ $errors->first('agency_code') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <button type="submit" class="btn btn-primary float-end m-5">Save Changes</button>

                </div>


            </form>
        </div>
        <!-- /form validation -->
    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script>
        $(document).ready(function () {

            // Initialize Select2 dropdowns
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });


            // Add new attachment row
            $('#add-attachment').click(function () {
                let template = document.getElementById('attachment-template').content.cloneNode(true);
                console.log(template);
                let newAttachment = $(template); // Convert the cloned template into a jQuery object
                $('#attachments-container').append(newAttachment); // Append to container
                newAttachment.hide().slideDown(); // Hide it initially and then slide it down
            });

            $(document).on('click', '.remove-row', function () {
                $(this).closest('.attachment-row').remove();
            });
        });
    </script>
@endpush
