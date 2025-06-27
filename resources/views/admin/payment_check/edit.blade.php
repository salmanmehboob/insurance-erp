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
        <form action="{{ route('update-payment-check') }}" method="POST" enctype="multipart/form-data"
              class="flex-fill form-validate-jquery">
            @csrf
             <div class="card-body">
                <h4><span class="font-weight-semibold"></span>Write Check</h4>

                <div class="row mt-3 mb-3">

                    <input type="hidden" name="id" value="{{$payment->id}}">
                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <label class="col-form-label">Bank Account</label>
                            <div class="form-group">
                                <select name="bank_id" class="form-control select2 required-field"
                                        data-placeholder="Select Bank Account">
                                    <option></option>
                                    @foreach($banks as $row)
                                        <option {{$payment->bank_id == $row->id ? 'selected' : ''}}
                                                value="{{ $row->id }}">{{ $row->bank_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('bank_id'))
                                    <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                                @endif
                                <span class="error-message text-danger"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Check Number <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="number" name="check_no" class="form-control required-field"
                                           placeholder="Enter Check Number"
                                           value="{{ old('check_no',$payment->check_no) }}">
                                    @if ($errors->has('check_no'))
                                        <span class="text-danger">{{ $errors->first('check_no') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Payment Date <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="payment_date" class="form-control flatpickr-minimum required-field"
                                           placeholder="Select Date"
                                           value="{{ old('payment_date',$payment->payment_date) }}">
                                    @if ($errors->has('payment_date'))
                                        <span class="text-danger">{{ $errors->first('payment_date') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Pay To <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <select name="pay_to" id="pay_to" class="form-control select2 required-field"
                                            data-placeholder="Select Company">
                                        <option></option>
                                        @foreach($insurance_companies as $row)
                                            <option {{$payment->pay_to == $row->id ? 'selected' : ''}}
                                                    value="{{ $row->id }}" {{ old('pay_to') == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pay_to'))
                                        <span class="text-danger">{{ $errors->first('pay_to') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Amount <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="amount" id="amount" class="form-control required-field"
                                           data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                           value="${{$payment->amount}}">
                                    <span class="text-danger" id="amount_error"></span>
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-form-label">Amount in Words <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="amount_in_word" id="amount_in_word" class="form-control required-field"
                                           readonly>
                                    <span class="text-danger" id="amount_in_word_error"></span>
                                    <span class="error-message text-danger"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">

                                <label class="col-form-label">Memo / Notes <span class="text-danger">*</span></label>
                                <div class="form-group">
                                    <textarea class="form-control required-field" rows="10" name="notes">{{$payment->notes}}</textarea>
                                    @if ($errors->has('notes'))
                                        <span
                                            class="text-danger">{{ $errors->first('notes') }}</span>
                                    @endif
                                    <span class="error-message text-danger"></span>
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="col-form-label">Account</label>
                                    <div class="form-group">
                                        <select name="account" id="account" class="form-control select2 required-field"
                                                data-placeholder="Select Account">
                                            <option></option>
                                            <option {{  $payment->account == 'cash' ? 'selected' : '' }} value="cash">Cash</option>
                                            <option {{  $payment->account == 'check' ? 'selected' : '' }} value="check">Check</option>
                                            <option {{  $payment->account == 'check_cash' ? 'selected' : '' }} value="check_cash">Check+Cash</option>
                                            <option {{  $payment->account == 'check_card' ? 'selected' : '' }} value="check_card">Check+Card</option>
                                            <option {{  $payment->account == 'two_check' ? 'selected' : '' }} value="two_check">2 Check</option>
                                            <option {{  $payment->account == 'card_cash' ? 'selected' : '' }} value="card_cash">Card+Cash</option>
                                            <option {{  $payment->account == 'credit_card' ? 'selected' : '' }} value="credit_card">Credit Card</option>
                                            <option {{  $payment->account == 'card_to_company' ? 'selected' : '' }} value="card_to_company">Card To Company</option>
                                            <option {{  $payment->account == 'customer_eft' ? 'selected' : '' }} value="customer_eft">Customer EFT</option>
                                            <option {{  $payment->account == 'customer_eft_cash' ? 'selected' : '' }} value="customer_eft_cash">Customer EFT+Cash</option>
                                            <option {{  $payment->account == 'customer_eft_credit_card' ? 'selected' : '' }} value="customer_eft_credit_card">Customer EFT+Credit Card</option>
                                            <option {{  $payment->account == 'e_check' ? 'selected' : '' }} value="e_check">E-Check</option>
                                            <option {{  $payment->account == 'money_order' ? 'selected' : '' }} value="money_order">Money Order</option>
                                            <option {{  $payment->account == 'money_order_cash' ? 'selected' : '' }} value="money_order_cash">Money Order+Cash</option>
                                            <option {{  $payment->account == 'money_order_card' ? 'selected' : '' }} value="money_order_card">Money Order+Card</option>
                                            <option {{  $payment->account == 'order' ? 'selected' : '' }} value="order">Other</option>
                                            <option {{  $payment->account == 'paypal' ? 'selected' : '' }} value="paypal">Paypal</option>


                                        </select>
                                        @if ($errors->has('account'))
                                            <span class="text-danger">{{ $errors->first('account') }}</span>
                                        @endif
                                        <span class="error-message text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label">Client <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <select name="client_id" id="client_id" class="form-control select2 required-field"
                                                data-placeholder="Select Client">
                                            <option></option>
                                            @foreach($clients as $row)
                                                <option {{$payment->client_id == $row->id ? 'selected' : ''}}
                                                        value="{{ $row->id }}">{{ $row->applicant_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('client_id'))
                                            <span class="text-danger">{{ $errors->first('client_id') }}</span>
                                        @endif
                                        <span class="error-message text-danger"></span>
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
                                                <option {{$payment->insurance_company_id == $row->id ? 'selected' : ''}}
                                                        value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('insurance_company_id'))
                                            <span
                                                class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                                        @endif
                                        <span class="error-message text-danger"></span>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label">Policy # <span class="text-danger">*</span></label>
                                    <div class="form-group">
                                        <input type="text" name="policy_number" id="policy_number" class="form-control required-field"
                                               placeholder="Policy"
                                               value="{{ old('policy_number',$payment->policy_number) }}">
                                        @if ($errors->has('policy_number'))
                                            <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                        @endif
                                        <span class="error-message text-danger"></span>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit button -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary float-end m-5">Update</button>
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
        
            // Utility function to convert numbers to words
            function numberToWords(num) {
                const a = [
                    "", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten",
                    "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"
                ];
                const b = ["", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];

                if (num === 0) return "zero dollars";

                function convertIntegerPart(n) {
                    const a = [
                        "", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten",
                        "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"
                    ];
                    const b = ["", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];
                    const scales = ["", "thousand", "lakh", "crore", "billion"];

                    if (n === 0) return "zero dollars";

                    function getScaleIndex(number) {
                        if (number >= 1e9) return 4; // Billion
                        if (number >= 1e7) return 3; // Crore
                        if (number >= 1e5) return 2; // Lakh
                        if (number >= 1e3) return 1; // Thousand
                        return 0; // Hundreds or less
                    }

                    function chunkAndConvert(number, scaleIndex) {
                        const scaleDivisor = [1, 1e3, 1e5, 1e7, 1e9][scaleIndex];
                        const majorPart = Math.floor(number / scaleDivisor);
                        const minorPart = number % scaleDivisor;

                        let result = convertChunk(majorPart) + " " + scales[scaleIndex];
                        if (minorPart > 0) {
                            result += " " + convertIntegerPart(minorPart);
                        }
                        return result.trim();
                    }

                    function convertChunk(number) {
                        if (number < 20) return a[number];
                        if (number < 100) return b[Math.floor(number / 10)] + (number % 10 !== 0 ? " " + a[number % 10] : "");
                        if (number < 1000) return a[Math.floor(number / 100)] + " hundred" + (number % 100 !== 0 ? " " + convertChunk(number % 100) : "");
                        return "";
                    }

                    const scaleIndex = getScaleIndex(n);
                    const numberInWords = chunkAndConvert(n, scaleIndex);

                    // Append "dollar" or "dollars"
                    const currency = n === 1 ? "dollar" : "dollars";
                    return numberInWords + " " + currency;
                }

                // Convert the fractional part (if any)
                function convertFractionalPart(decimal) {
                    return decimal.split("").map(digit => a[parseInt(digit)]).join(" ");
                }

                const parts = num.toString().split(".");
                const integerPart = parseInt(parts[0], 10);
                const fractionalPart = parts[1] || null;

                let words = convertIntegerPart(integerPart);

                if (fractionalPart) {
                    words += " point " + convertFractionalPart(fractionalPart);
                }

                return words.trim();
            }

            // Event listener for the amount field
            $("#amount").on("input", function () {
                const amount = $(this).val().replace(/[^0-9.]/g, ""); // Allow numbers and a single decimal point
                if (!isNaN(amount) && amount !== "") {
                    const amountInWords = numberToWords(parseFloat(amount));
                    $("#amount_in_word").val(amountInWords);
                } else {
                    $("#amount_in_word").val("");
                }
            });

            // Convert amount to words on page load (for edit functionality)
            const initialAmount = $("#amount").val().replace(/[^0-9.]/g, ""); // Fetch the initial value
            if (!isNaN(initialAmount) && initialAmount !== "") {
                const initialAmountInWords = numberToWords(parseFloat(initialAmount));
                $("#amount_in_word").val(initialAmountInWords);
            }
        
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

        });
    </script>


@endpush
