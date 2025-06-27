@extends('admin.layouts.app')

@push('style')
    <style>
        .repeater-item {
            margin-bottom: 20px;
        }

        .repeater-item .btn-danger {
            margin-top: 10px;
        }

        .tab-error {
            color: #dc3545 !important;
            font-weight: bold;
            border-bottom: 2px solid #dc3545 !important;
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
                                    <input type="text" name="name" class="form-control required-field" placeholder="Company Name"
                                           value="{{ old('name', $company->name) }}">
                                    @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <!-- Address -->
                            <div class="col-md-6">
                                <label class="col-form-label">Address</label>
                                <div class="form-group">
                                    <input type="text" name="address" class="form-control required-field" placeholder="Address"
                                           value="{{ old('address', $company->address) }}">
                                    @if ($errors->has('address'))
                                        <span class="text-danger">{{ $errors->first('address') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-4">
                                <label class="col-form-label">City <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="city" class="form-control required-field" placeholder="City"
                                           value="{{ old('city', $company->city) }}">
                                    @if ($errors->has('city'))
                                        <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <!-- State -->
                            <div class="col-md-4">
                                <label class="col-form-label">State <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select name="state_id" class="form-control select2 required-field"
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
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <!-- Zip Code -->
                            <div class="col-md-4">
                                <label class="col-form-label">Zip Code</label>
                                <div class="form-group">
                                    <input type="text" name="zip_code" class="form-control required-field" placeholder="Zip Code"
                                           value="{{ old('zip_code', $company->zip_code) }}">
                                    @if ($errors->has('zip_code'))
                                        <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <!-- Phone -->
                            <div class="col-md-6">
                                <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="phone_no" class="form-control required-field"
                                           placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'"
                                           value="{{ old('phone_no', $company->phone_no) }}">
                                    @if ($errors->has('phone_no'))
                                        <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <!-- Fax -->
                            <div class="col-md-6">
                                <label class="col-form-label">Fax <span class="text-danger">*</span></label>
                                <div class="form-group">
                                        <input type="text" name="fax_no" class="form-control required-field"
                                           placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'"
                                           value="{{ old('fax_no', $company->fax_no) }}">
                                    @if ($errors->has('fax_no'))
                                        <span class="text-danger">{{ $errors->first('fax_no') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Website <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="website" class="form-control required-field" placeholder="Website"
                                           value="{{ old('website', $company->website) }}">
                                    @if ($errors->has('website'))
                                        <span class="text-danger">{{ $errors->first('website') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Agency Code <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="agency_code" class="form-control required-field    "
                                           placeholder="Agency Code"
                                           value="{{ old('agency_code', $company->agency_code) }}">
                                    @if ($errors->has('agency_code'))
                                        <span class="text-danger">{{ $errors->first('agency_code') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
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

     // Function to check if a field should be validated based on policy type and tab visibility
     function shouldValidateField($input) {
                let $tabPane = $input.closest('.tab-pane');
                if ($tabPane.length === 0) {
                    // Not inside any tab-pane, always validate
                    return true;
                }
                let tabId = $tabPane.attr('id');
                let $tabLink = $('.nav-link[href="#' + tabId + '"]');
                if ($tabLink.length === 0) {
                    return false;
                }
                if ($tabLink.is(':hidden') || $tabLink.parent().is(':hidden')) {
                    return false;
                }
                return true;
            }

            // Real-time validation for required fields
            $(document).on('input change blur', '.required-field', function() {
                let $input = $(this);
                
                // Only validate if the field should be validated based on policy type
                if (!shouldValidateField($input)) {
                    return;
                }
                
                // let value = $input.val().trim();
                let inputName = $input.attr('name');
                let $errorSpan = $input.closest('.form-group').find('.error-message');
                let $tabPane = $input.closest('.tab-pane');
                let tabId = $tabPane.attr('id');
                let $tabLink = $('.nav-link[href="#' + tabId + '"]');

                let isCheckbox = $input.is(':checkbox');
                console.log('isCheckbox', isCheckbox);
                let value = isCheckbox ? $input.is(':checked') : $input.val().trim();


                if (!value) {
                    // Show error
                    console.log('❌ Validation Error:', {
                        fieldName: inputName,
                        fieldType: $input.attr('type') || 'select',
                        tabId: tabId,
                        message: 'This field is required.'
                    });
                    $errorSpan.text('This field is required.');
                    $tabLink.addClass('tab-error');
                } else {
                    // Remove error
                    $errorSpan.text('');
                    // Check if this tab has any other errors
                    let hasOtherErrors = $tabPane.find('.error-message').not($errorSpan).text().length > 0;
                    if (!hasOtherErrors) {
                        $tabLink.removeClass('tab-error');
                    }
                }
            });

            // On form submit
            $('form').on('submit', function (e) {
                let isValid = true;
                let firstErrorTab = null;

                // Remove previous errors
                $('.error-message').text('');
                $('.nav-link').removeClass('tab-error');

                // Validate each required field
                $('.required-field').each(function () {
                    let $input = $(this);
                    
                    // Only validate if the field should be validated based on policy type
                    if (!shouldValidateField($input)) {
                        return;
                    }
                    
                    let isCheckbox = $input.is(':checkbox');
                    let value = isCheckbox ? $input.is(':checked') : $input.val().trim();
                    let $tabPane = $input.closest('.tab-pane');
                    let tabId = $tabPane.attr('id');
                    let $tabLink = $('.nav-link[href="#' + tabId + '"]');

                    if (!value) {
                        isValid = false;
                        let inputName = $input.attr('name');
                        console.log('❌ Form Submit Validation Error:', {
                            fieldName: inputName,
                            fieldType: $input.attr('type') || 'select',
                            tabId: tabId,
                            message: 'This field is required.'
                        });
                        // Set a specific error message for checkboxes
                        let errorMsg = isCheckbox ? 'Please check this box if you want to proceed.' : 'This field is required.';
                        $input.closest('.form-group').find('.error-message').text(errorMsg);
                        $tabLink.addClass('tab-error');
                        if (!firstErrorTab) firstErrorTab = $tabLink;
                    }
                });

                // If not valid, prevent submit and switch to first error tab
                if (!isValid) {
                    e.preventDefault();
                    if (firstErrorTab) firstErrorTab.tab('show');
                }
            });

        });
    </script>
@endpush
