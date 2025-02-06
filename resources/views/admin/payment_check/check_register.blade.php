@extends('admin.layouts.app')

@push('style')
@endpush

@section('content')

    <!-- Form validation -->
    <div class="card">
        <!-- Agent form -->
        <form action="{{ route('get-check-register') }}" method="GET" class="flex-fill form-validate-jquery">

            @csrf

            <div class="card-body">
                <h4><span class="font-weight-semibold"></span>Check Register</h4>
                <div class="row mt-3 mb-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="col-form-label"> Bank</label>
                                <div class="form-group">
                                    <select name="bank_id" id="bank_id" class="form-control select2"
                                            data-placeholder="Select Bank">
                                        <option></option>
                                        @foreach($banks as $row)
                                            <option {{isset($request->bank_id) && $request->bank_id == $row->id ? 'selected' : '' }}
                                                value="{{ $row->id }}">{{ $row->bank_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('bank_id'))
                                        <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label"> Client</label>
                                <div class="form-group">
                                    <select name="client_id" id="client_id" class="form-control select2"
                                            data-placeholder="Select Client">
                                        <option></option>
                                        @foreach($clients as $row)
                                            <option  {{isset($request->client_id) && $request->client_id == $row->id ? 'selected' : '' }}
                                                value="{{ $row->id }}">{{ $row->applicant_name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('client_id'))
                                        <span class="text-danger">{{ $errors->first('client_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Pay To</label>
                                <div class="form-group">
                                    <select name="pay_to" id="pay_to" class="form-control select2"
                                            data-placeholder="Select Company">
                                        <option></option>
                                        @foreach($insurance_companies as $row)
                                            <option  {{isset($request->pay_to) && $request->pay_to == $row->id ? 'selected' : '' }}
                                                value="{{ $row->id }}" >{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('pay_to'))
                                        <span class="text-danger">{{ $errors->first('pay_to') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label"> Insurance Company</label>
                                <div class="form-group">
                                    <select name="insurance_company_id" id="insurance_company_id"
                                            class="form-control select2"
                                            data-placeholder="Select Insurance Company">
                                        <option></option>
                                        @foreach($insurance_companies as $row)
                                            <option  {{isset($request->insurance_company_id) && $request->insurance_company_id == $row->id ? 'selected' : '' }}
                                                value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('insurance_company_id'))
                                        <span class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Account</label>
                                <div class="form-group">
                                    <select name="account" id="account" class="form-control select2" data-placeholder="Select Account">
                                        <option></option>
                                        @php $selectedAccount = $request->account ?? ''; @endphp
                                        <option value="cash" {{ $selectedAccount === 'cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="check" {{ $selectedAccount === 'check' ? 'selected' : '' }}>Check</option>
                                        <option value="check_cash" {{ $selectedAccount === 'check_cash' ? 'selected' : '' }}>Check+Cash</option>
                                        <option value="check_card" {{ $selectedAccount === 'check_card' ? 'selected' : '' }}>Check+Card</option>
                                        <option value="two_check" {{ $selectedAccount === 'two_check' ? 'selected' : '' }}>2 Check</option>
                                        <option value="card_cash" {{ $selectedAccount === 'card_cash' ? 'selected' : '' }}>Card+Cash</option>
                                        <option value="credit_card" {{ $selectedAccount === 'credit_card' ? 'selected' : '' }}>Credit Card</option>
                                        <option value="card_to_company" {{ $selectedAccount === 'card_to_company' ? 'selected' : '' }}>Card To Company</option>
                                        <option value="customer_eft" {{ $selectedAccount === 'customer_eft' ? 'selected' : '' }}>Customer EFT</option>
                                        <option value="customer_eft_cash" {{ $selectedAccount === 'customer_eft_cash' ? 'selected' : '' }}>Customer EFT+Cash</option>
                                        <option value="customer_eft_credit_card" {{ $selectedAccount === 'customer_eft_credit_card' ? 'selected' : '' }}>Customer EFT+Credit Card</option>
                                        <option value="e_check" {{ $selectedAccount === 'e_check' ? 'selected' : '' }}>E-Check</option>
                                        <option value="money_order" {{ $selectedAccount === 'money_order' ? 'selected' : '' }}>Money Order</option>
                                        <option value="money_order_cash" {{ $selectedAccount === 'money_order_cash' ? 'selected' : '' }}>Money Order+Cash</option>
                                        <option value="money_order_card" {{ $selectedAccount === 'money_order_card' ? 'selected' : '' }}>Money Order+Card</option>
                                        <option value="order" {{ $selectedAccount === 'order' ? 'selected' : '' }}>Other</option>
                                        <option value="paypal" {{ $selectedAccount === 'paypal' ? 'selected' : '' }}>Paypal</option>
                                    </select>
                                    @if ($errors->has('account'))
                                        <span class="text-danger">{{ $errors->first('account') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Date From</label>
                                <div class="form-group">
                                    <input type="text" name="date_from" class="form-control flatpickr-minimum"
                                           placeholder="Select Date"
                                           value="{{ old('date_from',isset($request->date_from) ? $request->date_from : '') }}">
                                    @if ($errors->has('date_from'))
                                        <span class="text-danger">{{ $errors->first('date_from') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">To Date</label>
                                <div class="form-group">
                                    <input type="text" name="date_to" class="form-control flatpickr-minimum"
                                           placeholder="Select Date"
                                           value="{{ old('date_to',isset($request->date_to) ? $request->date_to : '') }}">
                                    @if ($errors->has('date_to'))
                                        <span class="text-danger">{{ $errors->first('date_to') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-4">
                                <label class="col-form-label">Check #</label>
                                <div class="form-group">
                                    <input type="number" name="check_no" class="form-control"
                                           placeholder="Enter Check Number"
                                           value="{{ old('check_no',isset($request->check_no) ? $request->check_no : '') }}">
                                    @if ($errors->has('check_no'))
                                        <span class="text-danger">{{ $errors->first('check_no') }}</span>
                                    @endif
                                </div>
                            </div>


                            <div class="col-md-11 text-end m-5">
                                <button type="submit" class="btn btn-success">Filter</button>
                                <a href="{{ route('get-check-register') }}" class="btn btn-dark">Reset</a>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

            @if(isset($paymentChecks))
                <div class="card-body">
                    <table id="payment-table" class="table table-striped datatables-reponsive">
                        <thead>
                        <tr>
                            <th>Client</th>
                            <th>Pay to</th>
                            <th>Bank</th>
                            <th>Check No</th>
                            <th>Payment Date</th>
                            <th>Insurance Company</th>
                            <th>Policy #</th>
                            <th>Amount</th>
                            <th>Account</th>
                            <th>Notes</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($paymentChecks as $payment)
                            <tr>
                                <td>{{ $payment->client->applicant_name }}</td>
                                <td>{{ $payment->payTo->name }}</td>
                                <td>{{ $payment->bank->bank_name }}</td>
                                <td>{{ $payment->check_no }}</td>
                                <td>{{ $payment->payment_date }}</td>
                                <td>{{ $payment->insuranceCompany->name }}</td>
                                <td>{{ $payment->policy_number}}</td>
                                 <td>{{ $payment->amount   }}</td>
                                 <td>{{ str_replace('_',' ',strtoupper($payment->account))   }}</td>
                                 <td>{{ $payment->notes   }}</td>

                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            @endif
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

        });
    </script>
@endpush
