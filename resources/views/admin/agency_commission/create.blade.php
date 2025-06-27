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
            <!-- Bank form -->
            <form action="{{ route('store-commission') }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="col-form-label">Client <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="client_id" id="client_id" class="form-control select2 required-field"
                                        data-placeholder="Select Client">
                                    <option></option>
                                    @foreach($clients as $row)
                                        <option
                                            value="{{ $row->id }}" {{ old('client_id') == $row->id ? 'selected' : '' }}>{{ $row->applicant_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('client_id'))
                                    <span class="text-danger">{{ $errors->first('client_id') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Policy # <span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="policy_number" id="policy_number" class="form-control required-field"
                                       placeholder="Policy #"
                                       value="{{ old('policy_number') }}">
                                @if ($errors->has('policy_number'))
                                    <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Date <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="date" class="form-control flatpickr-minimum required-field"
                                       placeholder="Select Date"
                                       value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-4">
                                <label class="col-form-label">Transaction<span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="transaction" class="form-control required-field"
                                       placeholder="Transaction"
                                       value="{{ old('transaction') }}">
                                @if ($errors->has('transaction'))
                                    <span class="text-danger">{{ $errors->first('transaction') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="col-form-label">Pro Premium <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="pro_premium" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Pro Premium" value="${{ old('pro_premium') }}">
                                @if ($errors->has('pro_premium'))
                                    <span class="text-danger">{{ $errors->first('pro_premium') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                                </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Commission <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="commission" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Commission" value="${{ old('commission') }}">
                                @if ($errors->has('commission'))
                                    <span class="text-danger">{{ $errors->first('commission') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Paid <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="paid" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Paid" value="${{ old('paid') }}">
                                @if ($errors->has('paid'))
                                    <span class="text-danger">{{ $errors->first('paid') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="col-form-label">Due <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="due" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Paid" value="${{ old('due') }}">
                                @if ($errors->has('due'))
                                    <span class="text-danger">{{ $errors->first('due') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label class="col-form-label">Memo / Notes <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <textarea class="form-control required-field" rows="10" name="notes"></textarea>
                                @if ($errors->has('notes'))
                                    <span
                                        class="text-danger">{{ $errors->first('notes') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- Submit button -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-end m-5">Save</button>
                </div>
            </form>
            <!-- /bank form -->
        </div>
        <!-- /form validation -->
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
            flatpickr(".flatpickr-minimum");

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
    
            // Use event delegation to handle dynamically added elements
            $(document).on('change', '#client_id', function () {
                var selectedData = $(this).find('option:selected');
                var clientID = selectedData.val();

                var method = 'GET';

                $.ajax({
                    type: method,
                    url: getClientData, // Make sure this variable contains the correct endpoint URL
                    data: {clientID: clientID},
                    dataType: 'json',
                    success: function (data, status, xhr) {
                        // Assuming `data` contains `insurance_company_id` and `policy_number`
                        if (data) {

                            // Update the `policy_number` input field
                            $('#policy_number').val(data.policy_number);
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.error(errorMessage); // Handle the error here
                    }
                });
            });
        });
    </script>



@endpush
