@extends('admin.layouts.app')

@push('style')
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
            <form action="{{ route('store-reminder') }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
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
                                            value="{{ $row->id }}" {{ old('client_id') == $row->id ? 'selected' : '' }}>{{ $row->applicant_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('client_id'))
                                    <span class="text-danger">{{ $errors->first('client_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Reminder From<span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" class="form-control"
                                       disabled
                                       value="{{ auth()->user()->name }}">
                                <input type="hidden" name="from_id"
                                       value="{{ auth()->user()->id }}">

                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Agent</label>
                            <div class="form-group">
                                <select name="to_id" id="to_id" class="form-control select2"
                                        data-placeholder="Select Agent">
                                    <option></option>
                                    @foreach($agents as $row)
                                        <option
                                            value="{{ $row->id }}" {{ old('to_id') ==  $row->id  ? 'selected' : '' }}>
                                            {{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('to_id'))
                                    <span class="text-danger">{{ $errors->first('to_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Date</label>
                            <div class="form-group">
                                <input type="text" name="date" class="form-control flatpickr-minimum"
                                       placeholder="Select Date"
                                       value="{{ old('date') }}">
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{ $errors->first('date') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="col-form-label">Set Reminder</label>
                            <div class="form-group">
                                <select name="set_reminder" id="set_reminder" class="form-control select2"
                                        data-placeholder="Select Status">
                                    <option></option>
                                    <option {{ old('set_reminder') == 1 ? 'selected' : ''}} value="1">YES</option>
                                    <option {{ old('set_reminder') == 1 ? 'selected' : ''}} value="0">No</option>

                                </select>
                                @if ($errors->has('set_reminder'))
                                    <span class="text-danger">{{ $errors->first('set_reminder') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label mt-3"></label>
                            <div class="form-group">
                                <input type="checkbox" {{ old('is_critical') == 1 ? 'checked' : ''}} name="is_critical"
                                       class="form-check-inline"

                                       value="1"> Critical
                                @if ($errors->has('is_critical'))
                                    <span class="text-danger">{{ $errors->first('is_critical') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Insurance Company</label>
                            <div class="form-group">
                                <select name="insurance_company_id" id="insurance_company_id"
                                        class="form-control select2"
                                        data-placeholder="Select Insurance Company">
                                    <option></option>
                                    @foreach($insuranceCompanies as $row)
                                        <option
                                            value="{{ $row->id }}" {{ old('insurance_company_id') ==  $row->id  ? 'selected' : '' }}>
                                            {{ $row->name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('insurance_company_id'))
                                    <span class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Memo / Notes</label>
                            <div class="form-group">
                                <textarea class="form-control" rows="10" name="notes">{{old('notes')}}</textarea>
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
