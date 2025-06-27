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

    <!-- Form validation -->
    <div class="card">
        <!-- Agent form -->
        <form action="{{ route('store-payment') }}" method="POST" enctype="multipart/form-data"
              class="flex-fill form-validate-jquery">
            @csrf

            <div class="card-body">
                <h4><span class="font-weight-semibold"></span>Receive Payment</h4>

                <div class="row mt-3 mb-3">
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <label class="col-form-label">Payment Date <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="payment_date" class="form-control flatpickr-minimum required-field"
                                           placeholder="Select Date"
                                           value="{{ old('payment_date') }}">
                                    @if ($errors->has('payment_date'))
                                        <span class="text-danger">{{ $errors->first('payment_date') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-form-label">Amount Received From <span class="text-danger">*</span></label>

                                <div class="form-group">
                                    <input type="checkbox" class="form-check-inline" value="1" name="is_payment_policy"
                                           id="">
                                    Payment is for a policy
                                </div>

                                <div class="form-group">
                                    <select name="client_id" id="client_id" class="form-control select2 required-field"
                                            data-placeholder="Select Client">
                                        <option value="">Select Client</option>
                                        @foreach($clients as $row)
                                            <option
                                                value="{{ $row->id }}" {{ (isset($clientID) && $clientID == $row->id) ? 'selected' : '' }}>
                                                {{ $row->applicant_name }}
                                            </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('client_id'))
                                        <span class="text-danger">{{ $errors->first('client_id') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label class="col-form-label">Received By Agent <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select name="received_by" class="form-control select2 required-field"
                                            data-placeholder="Select Company">
                                        <option></option>
                                        @foreach($agents as $row)
                                            <option
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('received_by'))
                                        <span class="text-danger">{{ $errors->first('received_by') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="col-form-label">Received At Location <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select name="received_at" class="form-control select2 required-field"
                                            data-placeholder="Select Location">
                                        <option></option>
                                        @foreach($locations as $row)
                                            <option
                                                value="{{ $row->id }}">{{ $row->agency_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('received_at'))
                                        <span class="text-danger">{{ $errors->first('received_at') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>


                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-inline" value="1" name="check_to_finance"
                                           id="">
                                    Write Agency Check to Finance Co.
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">
                                <div class="form-group">
                                    <input type="checkbox" class="form-check-inline" value="1"
                                           name="payment_send_to_insurance_company"
                                           id="">
                                    Client payment sent to ins Co /Finance Co.
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">

                                <label class="col-form-label">Memo / Notes <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <textarea class="form-control required-field" rows="15" name="notes"></textarea>
                                    @if ($errors->has('notes'))
                                        <span
                                            class="text-danger">{{ $errors->first('notes') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                    </div>


                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label class="col-form-label">Company <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="insurance_company_id" id="insurance_company_id"
                                        class="form-control select2 required-field"
                                        data-placeholder="Select Company">
                                    <option></option>
                                    @foreach($insurance_companies as $row)
                                        <option
                                            {{ isset($insurance_company_id) && $insurance_company_id == $row->id ? 'selected' : '' }}
                                            value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('insurance_company_id'))
                                    <span class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Policy # <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="policy_number" id="policy_number" class="form-control required-field"
                                       placeholder="Policy"
                                       value="{{ $policy_number ?? '' }}">
                                @if ($errors->has('policy_number'))
                                    <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <h4 class="mt-3"><span class="font-weight-semibold"></span>Receive Information</h4>
                        <div class="col-md-12">
                            <label class="col-form-label">Payment For <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="payment_for" class="form-control select2 required-field"
                                        data-placeholder="Select Option">
                                    <option></option>
                                    <option value="Downpayment">Downpayment</option>
                                    <option value="Monthly Payment">Monthly Payment</option>
                                    <option value="Endorsement">Endorsement</option>
                                    <option value="Remaining Balance">Remaining Balance</option>
                                    <option value="Other">Other</option>

                                </select>
                                @if ($errors->has('payment_for'))
                                    <span class="text-danger">{{ $errors->first('payment_for') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Payment Method <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="payment_method" class="form-control select2 required-field"
                                        data-placeholder="Select Option">
                                    <option></option>
                                    <option value="cash">Cash</option>
                                    <option value="check">Check</option>
                                    <option value="check_cash">Check+Cash</option>
                                    <option value="check_card">Check+Card</option>
                                    <option value="two_check">2 Check</option>
                                    <option value="card_cash">Card+Cash</option>
                                    <option value="credit_card">Credit Card</option>
                                    <option value="card_to_company">Card To Company</option>
                                    <option value="customer_eft">Customer EFT</option>
                                    <option value="customer_eft_cash">Customer EFT+Cash</option>
                                    <option value="customer_eft_credit_card">Customer EFT+Credit Card</option>
                                    <option value="e_check">E-Check</option>
                                    <option value="money_order">Money Order</option>
                                    <option value="money_order_cash">Money Order+Cash</option>
                                    <option value="money_order_card">Money Order+Card</option>
                                    <option value="order">Other</option>
                                    <option value="paypal">Paypal</option>
                                </select>
                                @if ($errors->has('payment_method'))
                                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Amount <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="amount" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('amount') }}">
                                @if ($errors->has('amount'))
                                    <span
                                        class="text-danger">{{ $errors->first('amount') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Agency Fee <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="agency_fee" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('agency_fee') }}">
                                @if ($errors->has('agency_fee'))
                                    <span
                                        class="text-danger">{{ $errors->first('agency_fee') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Total <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="total" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('total') }}">
                                @if ($errors->has('total'))
                                    <span
                                        class="text-danger">{{ $errors->first('total') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Paid <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="paid" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('paid') }}">
                                @if ($errors->has('paid'))
                                    <span
                                        class="text-danger">{{ $errors->first('paid') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Balance <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="balance" class="form-control required-field"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('balance') }}">
                                @if ($errors->has('balance'))
                                    <span
                                        class="text-danger">{{ $errors->first('balance') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                                </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Bank Account <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <select name="bank_id" class="form-control select2 required-field"
                                        data-placeholder="Select Bank Account">
                                    <option></option>
                                    @foreach($banks as $row)
                                        <option
                                            value="{{ $row->id }}">{{ $row->bank_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bank_id'))
                                    <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                                    </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Next Payment Due <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="next_payment" class="form-control flatpickr-minimum required-field             "
                                       placeholder="Select Date"
                                       value="{{ old('next_payment') }}">
                                @if ($errors->has('next_payment'))
                                    <span class="text-danger">{{ $errors->first('next_payment') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Submit button -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-end m-5">Save</button>
            </div>
        </form>
        <!-- /agent form -->
    </div>
    <!-- /form validation -->

@endsection

@push('script')
    <script>
        $(document).ready(function () {
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
                            // Update the `insurance_company_id` select field
                            $('#insurance_company_id').val(data.insurance_company_id).trigger('change');

                            // Update the `policy_number` input field
                            $('#policy_number').val(data.policy_number);
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.error(errorMessage); // Handle the error here
                    }
                });
            });
       
     
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });
            flatpickr(".flatpickr-minimum");

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
