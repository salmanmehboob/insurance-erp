@extends('admin.layouts.app')

@push('style')
@endpush

@section('content')

    <!-- Form validation -->
    <div class="card">
        <!-- Agent form -->
        <form action="{{ route('get-payment-check') }}" method="POST" class="flex-fill form-validate-jquery">

            @csrf

            <div class="card-body">
                <h4><span class="font-weight-semibold"></span>Find Payment</h4>
                <div class="row mt-3 mb-3">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label">Date From</label>
                                <div class="form-group">
                                    <input type="text" name="date_from" class="form-control flatpickr-minimum"
                                           placeholder="Select Date"
                                           value="{{ old('date_from') }}">
                                    @if ($errors->has('date_from'))
                                        <span class="text-danger">{{ $errors->first('date_from') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">To Date</label>
                                <div class="form-group">
                                    <input type="text" name="date_to" class="form-control flatpickr-minimum"
                                           placeholder="Select Date"
                                           value="{{ old('date_to') }}">
                                    @if ($errors->has('date_to'))
                                        <span class="text-danger">{{ $errors->first('date_to') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Receipt #</label>
                                <div class="form-group">
                                    <input type="number" name="receipt_no" class="form-control"
                                           placeholder="Enter Receipt Number"
                                           value="{{ old('receipt_no') }}">
                                    @if ($errors->has('receipt_no'))
                                        <span class="text-danger">{{ $errors->first('receipt_no') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Check #</label>
                                <div class="form-group">
                                    <input type="number" name="check_no" class="form-control"
                                           placeholder="Enter Check Number"
                                           value="{{ old('check_no') }}">
                                    @if ($errors->has('check_no'))
                                        <span class="text-danger">{{ $errors->first('check_no') }}</span>
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
                                <button type="submit" class="btn btn-primary float-end m-5">Find</button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="border p-3 mb-4">
                            <legend class="mb-3 azm-color-444">Receipt # <span id="receipt_no"></span></legend>
                            <div class="row mt-3">
                                <!-- Client/Payer -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Client/Payer</b>
                                    <span id="client"></span>
                                </div>

                                <!-- Agent -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Agent</b>
                                    <span id="agent"></span>
                                </div>

                                <hr>

                                <!-- Payment For -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Payment For</b>
                                    <span id="payment_for"></span>
                                </div>

                                <!-- Payment Method -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Payment Method</b>
                                    <span id="payment_method"></span>
                                </div>

                                <hr>

                                <!-- Total -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Total</b>
                                    <span id="total"></span>
                                </div>

                                <hr>

                                <!-- Paid -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Paid</b>
                                    <span id="paid"></span>
                                </div>

                                <!-- Balance -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Balance</b>
                                    <span id="balance"></span>
                                </div>

                                <hr>

                                <!-- Check # -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Check #</b>
                                    <span id="check_no"></span>
                                </div>

                                <!-- Notes -->
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <b class="form-label mb-0">Notes</b>
                                    <span id="notes"></span>
                                </div>
                            </div>
                        </fieldset>
                    </div>

                </div>
            </div>
        </form>
        <!-- /agent form -->
    </div>
    <!-- /form validation -->

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

            // Handle form submission
            $('form').on('submit', function (e) {
                e.preventDefault(); // Prevent the default form submission

                let formData = $(this).serialize(); // Serialize form data
                let url = $(this).attr('action'); // Get the form action URL

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: formData,
                    success: function (response) {
                        if (response.success) {
                            // Populate data into the spans
                            $('#receipt_no').text(response.data.receipt_no);
                            $('#client').text(response.data.client);
                            $('#agent').text(response.data.agent);
                            $('#payment_for').text(response.data.payment_for);
                            $('#payment_method').text(response.data.payment_method);
                            $('#total').text('$' + response.data.total);
                            $('#paid').text('$' + response.data.paid);
                            $('#balance').text('$' + response.data.balance);
                            $('#check_no').text(response.data.check_no);
                            $('#notes').text(response.data.notes);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr) {
                        if (xhr.status === 422) {
                            // Handle validation errors
                            let errors = xhr.responseJSON.errors;
                            $.each(errors, function (key, message) {
                                let field = $('[name="' + key + '"]');
                                field.addClass('is-invalid'); // Highlight the invalid field

                                // Handle standard inputs
                                if (!field.hasClass('select2-hidden-accessible')) {
                                    field.after('<div class="form-error text-danger">' + message[0] + '</div>');
                                } else {
                                    // Handle Select2 dropdowns
                                    let select2Container = field.next('.select2-container');
                                    select2Container.addClass('is-invalid'); // Add invalid class to the container
                                    select2Container.after('<div class="form-error text-danger">' + message[0] + '</div>');
                                }
                            });
                        } else {
                            // Handle other errors
                            alert(xhr.responseJSON?.message || 'An unknown error occurred.');
                        }
                    }

                });
            });
        });


    </script>
@endpush
