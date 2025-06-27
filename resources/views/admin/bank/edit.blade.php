@extends('admin.layouts.app')

@push('style')
    <style>
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
                <h4><span class="font-weight-semibold">{{ $title }}</span></h4>
                <a href="#" class="header-elements-toggle text-default d-md-none"><i class="icon-more"></i></a>
            </div>
        </div>
    </div>
    <!-- /page header -->

    <!-- Content area -->
    <div class="content">
        <!-- Form -->
        <div class="card">
            <form action="{{ route('update-bank', $bank->id) }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="col-form-label">Account Holder Name<span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="account_holder_name" class="form-control required-field"
                                       placeholder="Account Holder Name"
                                       value="{{ old('account_holder_name',$bank->account_holder_name) }}">
                                @if ($errors->has('account_holder_name'))
                                    <span class="text-danger">{{ $errors->first('account_holder_name') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Account # <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="account_number" class="form-control required-field"
                                       placeholder="Account Number"
                                       value="{{ old('account_number',$bank->account_number) }}">
                                @if ($errors->has('account_number'))
                                    <span class="text-danger">{{ $errors->first('account_number') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Bank Name <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="bank_name" class="form-control required-field" placeholder="Bank Name"
                                       value="{{ old('bank_name',$bank->bank_name) }}">
                                @if ($errors->has('bank_name'))
                                    <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Branch Name <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="branch_name" class="form-control required-field"
                                       placeholder="Branch Name" value="{{ old('branch_name',$bank->branch_name) }}">
                                @if ($errors->has('branch_name'))
                                    <span class="text-danger">{{ $errors->first('branch_name') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">IFSC Code <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="ifsc_code" class="form-control required-field"
                                       placeholder="IFSC Code" value="{{ old('ifsc_code',$bank->ifsc_code) }}">
                                @if ($errors->has('ifsc_code'))
                                    <span class="text-danger">{{ $errors->first('ifsc_code') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Account Type <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="account_type" class="form-control required-field"
                                       placeholder="Account Type" value="{{ old('account_type',$bank->account_type) }}">
                                @if ($errors->has('account_type'))
                                    <span class="text-danger">{{ $errors->first('account_type') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Current Balance <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="current_balance" class="form-control required-field"
                                       placeholder="Current Balance"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"

                                       value="${{ old('current_balance',$bank->current_balance) }}">
                                @if ($errors->has('current_balance'))
                                    <span class="text-danger">{{ $errors->first('current_balance') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Current Check # <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="current_check" class="form-control required-field"
                                       placeholder="Current Check #"
                                       value="{{ old('current_check',$bank->current_check) }}">
                                @if ($errors->has('current_check'))
                                    <span class="text-danger">{{ $errors->first('current_check') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Location <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="agency_id" class="form-control select2 required-field"
                                        data-placeholder="Select Location">
                                    <option></option>
                                    @foreach($agencies as $row)
                                        <option
                                            value="{{ $row->id }}" {{ $bank->agency_id == $row->id ? 'selected' : '' }}>{{ $row->agency_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('agency_id'))
                                    <span class="text-danger">{{ $errors->first('agency_id') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Submit button -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-end m-5">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });

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

