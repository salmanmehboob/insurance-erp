@extends('admin.layouts.app')

@push('style')
@endpush

@section('content')

    <!-- Form validation -->
    <div class="card">
        <!-- Agent form -->
        <form action="{{ route('store-payment-check') }}" method="POST" enctype="multipart/form-data"
              class="flex-fill form-validate-jquery">
            @csrf

            <div class="card-body">
                <h4><span class="font-weight-semibold"></span>Write Check</h4>

                <div class="row mt-3 mb-3">

                    <div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <label class="col-form-label">Bank Account</label>
                            <div class="form-group">
                                <select name="bank_id" class="form-control select2"
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
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Check Number</label>
                                <div class="form-group">
                                    <input type="number" name="check_no" class="form-control"
                                           placeholder="Enter Check Number"
                                           value="{{ old('check_no') }}">
                                    @if ($errors->has('check_no'))
                                        <span class="text-danger">{{ $errors->first('check_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Payment Date</label>
                                <div class="form-group">
                                    <input type="text" name="payment_date" class="form-control flatpickr-minimum"
                                           placeholder="Select Date"
                                           value="{{ old('payment_date') }}">
                                    @if ($errors->has('payment_date'))
                                        <span class="text-danger">{{ $errors->first('payment_date') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-form-label">Pay To</label>
                                <div class="form-group">
                                    <select name="pay_to" id="pay_to" class="form-control select2"
                                            data-placeholder="Select Company">
                                        <option></option>
                                        @foreach($insurance_companies as $row)
                                            <option
                                                value="{{ $row->id }}" {{ old('pay_to') == $row->id ? 'selected' : '' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pay_to'))
                                        <span class="text-danger">{{ $errors->first('pay_to') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Amount</label>
                                <div class="form-group">
                                    <input type="text" name="amount" id="amount" class="form-control"
                                           data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                           value="">
                                    <span class="text-danger" id="amount_error"></span>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="col-form-label">Amount in Words</label>
                                <div class="form-group">
                                    <input type="text" name="amount_in_word" id="amount_in_word" class="form-control"
                                           readonly>
                                    <span class="text-danger" id="amount_in_word_error"></span>
                                </div>
                            </div>

                            <div class="col-md-12 mt-3">

                                <label class="col-form-label">Memo / Notes</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="10" name="notes"></textarea>
                                    @if ($errors->has('notes'))
                                        <span
                                            class="text-danger">{{ $errors->first('notes') }}</span>
                                    @endif
                                </div>


                            </div>

                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="col-form-label">Account</label>
                                    <div class="form-group">
                                        <select name="account" id="account" class="form-control select2"
                                                data-placeholder="Select Account">
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
                                        @if ($errors->has('account'))
                                            <span class="text-danger">{{ $errors->first('account') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label">Client</label>
                                    <div class="form-group">
                                        <select name="client_id" id="client_id" class="form-control select2"
                                                data-placeholder="Select Client">
                                            <option></option>
                                            @foreach($clients as $row)
                                                <option
                                                    value="{{ $row->id }}">{{ $row->applicant_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('client_id'))
                                            <span class="text-danger">{{ $errors->first('client_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="col-md-12">
                                    <label class="col-form-label">Company</label>
                                    <div class="form-group">
                                        <select name="insurance_company_id" id="insurance_company_id"
                                                class="form-control select2"
                                                data-placeholder="Select Company">
                                            <option></option>
                                            @foreach($insurance_companies as $row)
                                                <option
                                                    value="{{ $row->id }}">{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('insurance_company_id'))
                                            <span
                                                class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label class="col-form-label">Policy #</label>
                                    <div class="form-group">
                                        <input type="text" name="policy_number" id="policy_number" class="form-control"
                                               placeholder="Policy"
                                               value="{{ old('policy_number') }}">
                                        @if ($errors->has('policy_number'))
                                            <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                        @endif
                                    </div>
                                </div>
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
        });

        $(document).ready(function () {
            // Utility function to convert numbers to words
            function numberToWords(num) {
                const a = [
                    "", "one", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten",
                    "eleven", "twelve", "thirteen", "fourteen", "fifteen", "sixteen", "seventeen", "eighteen", "nineteen"
                ];
                const b = ["", "", "twenty", "thirty", "forty", "fifty", "sixty", "seventy", "eighty", "ninety"];

                if (num === 0) return "zero";

                let words = "";

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

                words = convertIntegerPart(integerPart);

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
        });

    </script>

    <script>
        $(document).ready(function () {
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });
            flatpickr(".flatpickr-minimum");


        });
    </script>


@endpush
