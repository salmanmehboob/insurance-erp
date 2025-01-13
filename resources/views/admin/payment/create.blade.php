@extends('admin.layouts.app')

@push('style')
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
                            <div class="col-md-12">
                                <label class="col-form-label">Amount Received From</label>

                                <div class="form-group">
                                    <input type="checkbox" class="form-check-inline" value="1" name="is_payment_policy"
                                           id="">
                                    Payment is for a policy
                                </div>

                                <div class="form-group">
                                    <select name="client_id" id="client_id" class="form-control select2"
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
                                </div>
                            </div>


                            <div class="col-md-12">
                                <label class="col-form-label">Received By Agent</label>
                                <div class="form-group">
                                    <select name="received_by" class="form-control select2"
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
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="col-form-label">Received At Location</label>
                                <div class="form-group">
                                    <select name="received_at" class="form-control select2"
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

                                <label class="col-form-label">Memo / Notes</label>
                                <div class="form-group">
                                    <textarea class="form-control" rows="15" name="notes"></textarea>
                                    @if ($errors->has('notes'))
                                        <span
                                            class="text-danger">{{ $errors->first('notes') }}</span>
                                    @endif
                                </div>


                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <label class="col-form-label">Company</label>
                            <div class="form-group">
                                <select name="insurance_company_id" id="insurance_company_id" class="form-control select2"
                                        data-placeholder="Select Company">
                                    <option></option>
                                    @foreach($insurance_companies as $row)
                                        <option
                                            value="{{ $row->id }}">{{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('insurance_company_id'))
                                    <span class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Policy #</label>
                            <div class="form-group">
                                <input type="text" name="policy_number"  id="policy_number" class="form-control"
                                       placeholder="Policy"
                                       value="{{ old('policy_number') }}">
                                @if ($errors->has('policy_number'))
                                    <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <h4 class="mt-3"><span class="font-weight-semibold"></span>Receive Information</h4>
                        <div class="col-md-12">
                            <label class="col-form-label">Payment For</label>
                            <div class="form-group">
                                <select name="payment_for" class="form-control select2"
                                        data-placeholder="Select Option">
                                    <option></option>
                                    <option value="bill">Bill</option>
                                    <option value="policy">Policy</option>
                                </select>
                                @if ($errors->has('payment_for'))
                                    <span class="text-danger">{{ $errors->first('payment_for') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Payment Method</label>
                            <div class="form-group">
                                <select name="payment_method" class="form-control select2"
                                        data-placeholder="Select Option">
                                    <option></option>
                                    <option value="online">Online</option>
                                    <option value="cash">Cash</option>
                                </select>
                                @if ($errors->has('payment_method'))
                                    <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Amount</label>
                            <div class="form-group">
                                <input type="text" name="amount" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('amount') }}">
                                @if ($errors->has('amount'))
                                    <span
                                        class="text-danger">{{ $errors->first('amount') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Agency Fee</label>
                            <div class="form-group">
                                <input type="text" name="agency_fee" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('agency_fee') }}">
                                @if ($errors->has('agency_fee'))
                                    <span
                                        class="text-danger">{{ $errors->first('agency_fee') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Total</label>
                            <div class="form-group">
                                <input type="text" name="total" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('total') }}">
                                @if ($errors->has('total'))
                                    <span
                                        class="text-danger">{{ $errors->first('total') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Paid</label>
                            <div class="form-group">
                                <input type="text" name="paid" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('paid') }}">
                                @if ($errors->has('paid'))
                                    <span
                                        class="text-danger">{{ $errors->first('paid') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Balance</label>
                            <div class="form-group">
                                <input type="text" name="balance" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       value="${{ old('balance') }}">
                                @if ($errors->has('balance'))
                                    <span
                                        class="text-danger">{{ $errors->first('balance') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Bank Account</label>
                            <div class="form-group">
                                <select name="payment_bank_id" class="form-control select2"
                                        data-placeholder="Select Bank Account">
                                    <option></option>
                                    @foreach($banks as $row)
                                        <option
                                            value="{{ $row->id }}">{{ $row->bank_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('payment_bank_id'))
                                    <span class="text-danger">{{ $errors->first('payment_bank_id') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="col-form-label">Next Payment Due</label>
                            <div class="form-group">
                                <input type="text" name="next_payment" class="form-control flatpickr-minimum"
                                       placeholder="Select Date"
                                       value="{{ old('next_payment') }}">
                                @if ($errors->has('next_payment'))
                                    <span class="text-danger">{{ $errors->first('next_payment') }}</span>
                                @endif
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
                    data: { clientID: clientID },
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
