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
                                <input type="text" name="account_holder_name" class="form-control"
                                       placeholder="Account Holder Name"
                                       value="{{ old('account_holder_name',$bank->account_holder_name) }}">
                                @if ($errors->has('account_holder_name'))
                                    <span class="text-danger">{{ $errors->first('account_holder_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Account #</label>
                            <div class="form-group">
                                <input type="text" name="account_number" class="form-control"
                                       placeholder="Account Number"
                                       value="{{ old('account_number',$bank->account_number) }}">
                                @if ($errors->has('account_number'))
                                    <span class="text-danger">{{ $errors->first('account_number') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Bank Name</label>
                            <div class="form-group">
                                <input type="text" name="bank_name" class="form-control" placeholder="Bank Name"
                                       value="{{ old('bank_name',$bank->bank_name) }}">
                                @if ($errors->has('bank_name'))
                                    <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Branch Name</label>
                            <div class="form-group">
                                <input type="text" name="branch_name" class="form-control"
                                       placeholder="Branch Name" value="{{ old('branch_name',$bank->branch_name) }}">
                                @if ($errors->has('branch_name'))
                                    <span class="text-danger">{{ $errors->first('branch_name') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">IFSC Code</label>
                            <div class="form-group">
                                <input type="text" name="ifsc_code" class="form-control"
                                       placeholder="IFSC Code" value="{{ old('ifsc_code',$bank->ifsc_code) }}">
                                @if ($errors->has('ifsc_code'))
                                    <span class="text-danger">{{ $errors->first('ifsc_code') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Account Type</label>
                            <div class="form-group">
                                <input type="text" name="account_type" class="form-control"
                                       placeholder="Account Type" value="{{ old('account_type',$bank->account_type) }}">
                                @if ($errors->has('account_type'))
                                    <span class="text-danger">{{ $errors->first('account_type') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Current Balance</label>
                            <div class="form-group">
                                <input type="text" name="current_balance" class="form-control"
                                       placeholder="Current Balance"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"

                                       value="${{ old('current_balance',$bank->current_balance) }}">
                                @if ($errors->has('current_balance'))
                                    <span class="text-danger">{{ $errors->first('current_balance') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Current Check #</label>
                            <div class="form-group">
                                <input type="text" name="current_check" class="form-control"
                                       placeholder="Current Check #"
                                       value="{{ old('current_check',$bank->current_check) }}">
                                @if ($errors->has('current_check'))
                                    <span class="text-danger">{{ $errors->first('current_check') }}</span>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label class="col-form-label">Location</label>
                            <div class="form-group">
                                <select name="agency_id" class="form-control select2"
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

        });
    </script>
@endpush

