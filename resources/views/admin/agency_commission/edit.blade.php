@extends('admin.layouts.app')

@push('style')
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
            <form action="{{ route('update-commission', $commission->id) }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <label class="col-form-label">Client</label>
                            <div class="form-group">
                                <select name="client_id" id="client_id" class="form-control select2"
                                        data-placeholder="Select Client">
                                    <option></option>
                                    @foreach($clients as $row)
                                        <option
                                            value="{{ $row->id }}" {{ $commission->client_id == $row->id ? 'selected' : '' }}>{{ $row->applicant_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('client_id'))
                                    <span class="text-danger">{{ $errors->first('client_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Policy # <span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="policy_number" id="policy_number" class="form-control"
                                       placeholder="Policy #"
                                       value="{{ old('policy_number',$commission->policy_number) }}">
                                @if ($errors->has('policy_number'))
                                    <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Date</label>
                            <div class="form-group">
                                <input type="text" name="date" class="form-control flatpickr-minimum"
                                       placeholder="Select Date"
                                       value="{{ old('date',$commission->date) }}">
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Transaction<span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="transaction" class="form-control"
                                       placeholder="Transaction"
                                       value="{{ old('transaction',$commission->transaction) }}">
                                @if ($errors->has('transaction'))
                                    <span class="text-danger">{{ $errors->first('transaction') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="col-form-label">Pro Premium</label>
                            <div class="form-group">
                                <input type="text" name="pro_premium" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Pro Premium"
                                       value="${{ old('pro_premium',$commission->pro_premium) }}">
                                @if ($errors->has('pro_premium'))
                                    <span class="text-danger">{{ $errors->first('pro_premium') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Commission</label>
                            <div class="form-group">
                                <input type="text" name="commission" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Commission"
                                       value="${{ old('commission',$commission->commission) }}">
                                @if ($errors->has('commission'))
                                    <span class="text-danger">{{ $errors->first('commission') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Paid</label>
                            <div class="form-group">
                                <input type="text" name="paid" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Paid" value="${{ old('paid',$commission->paid) }}">
                                @if ($errors->has('paid'))
                                    <span class="text-danger">{{ $errors->first('paid') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="col-form-label">Due</label>
                            <div class="form-group">
                                <input type="text" name="due" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Paid" value="${{ old('due',$commission->due) }}">
                                @if ($errors->has('due'))
                                    <span class="text-danger">{{ $errors->first('due') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-12">
                            <label class="col-form-label">Memo / Notes</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="10" name="notes">{{$commission->notes}}</textarea>
                                @if ($errors->has('notes'))
                                    <span
                                        class="text-danger">{{ $errors->first('notes') }}</span>
                                @endif
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
            flatpickr(".flatpickr-minimum");

        });

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


