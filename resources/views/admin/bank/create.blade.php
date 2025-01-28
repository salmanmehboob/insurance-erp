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
            <form action="{{ route('store-bank') }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                <div class="card-body">
                    <div class="row mt-3">

                        <div class="col-md-4">
                            <label class="col-form-label">Account Holder Name<span
                                    class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="account_holder_name" class="form-control"
                                       placeholder="Account Holder Name"
                                       value="{{ old('account_holder_name') }}">
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
                                       value="{{ old('account_number') }}">
                                @if ($errors->has('account_number'))
                                    <span class="text-danger">{{ $errors->first('account_number') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="col-form-label">Bank Name</label>
                            <div class="form-group">
                                <input type="text" name="bank_name" class="form-control" placeholder="Bank Name"
                                       value="{{ old('bank_name') }}">
                                @if ($errors->has('bank_name'))
                                    <span class="text-danger">{{ $errors->first('bank_name') }}</span>
                                @endif
                            </div>
                        </div>


                        <div class="col-md-4">
                            <label class="col-form-label">Branch Name</label>
                            <div class="form-group">
                                <input type="text" name="branch_name" class="form-control"
                                       placeholder="Branch Name" value="{{ old('branch_name') }}">
                                @if ($errors->has('branch_name'))
                                    <span class="text-danger">{{ $errors->first('branch_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">IFSC Code</label>
                            <div class="form-group">
                                <input type="text" name="ifsc_code" class="form-control"
                                       placeholder="IFSC Code" value="{{ old('ifsc_code') }}">
                                @if ($errors->has('ifsc_code'))
                                    <span class="text-danger">{{ $errors->first('ifsc_code') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Account Type</label>
                            <div class="form-group">
                                <input type="text" name="account_type" class="form-control"
                                       placeholder="Account Type" value="{{ old('account_type') }}">
                                @if ($errors->has('account_type'))
                                    <span class="text-danger">{{ $errors->first('account_type') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Current Balance</label>
                            <div class="form-group">
                                <input type="text" name="current_balance" class="form-control"
                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                       placeholder="Current Balance" value="${{ old('current_balance') }}">
                                @if ($errors->has('current_balance'))
                                    <span class="text-danger">{{ $errors->first('current_balance') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-4">
                            <label class="col-form-label">Current Check #</label>
                            <div class="form-group">
                                <input type="text" name="current_check" class="form-control"
                                       placeholder="Current Check #" value="{{ old('current_check') }}">
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
                                            value="{{ $row->id }}" {{ old('agency_id') == $row->id ? 'selected' : '' }}>{{ $row->agency_name }}</option>
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


            // Handle click event to toggle selection
            $(document).on('click', '.list-group-item', function () {
                $(this).toggleClass('selected');
            });

            // Move items from available list to selected list
            $('#move-to-selected').click(function () {
                $('#available-list .selected').each(function () {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    $(this).removeClass('selected').appendTo('#selected-list');

                    // Update hidden input fields with selected location data
                    addLocationToInputs(id, name);
                });
            });

            // Move items from selected list to available list
            $('#move-to-available').click(function () {
                $('#selected-list .selected').each(function () {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    $(this).removeClass('selected').appendTo('#available-list');

                    // Update hidden input fields by removing location data
                    removeLocationFromInputs(id, name);
                });
            });

            // Function to add location data to hidden inputs
            function addLocationToInputs(id, name) {
                var currentIds = $('#selected-location-ids').val().split(',');
                var currentNames = $('#selected-location-names').val().split(',');
                if (!currentIds.includes(id.toString())) {
                    currentIds.push(id);
                    currentNames.push(name);
                }
                $('#selected-location-ids').val(currentIds.join(','));
                $('#selected-location-names').val(currentNames.join(','));
            }

            // Function to remove location data from hidden inputs
            function removeLocationFromInputs(id, name) {
                var currentIds = $('#selected-location-ids').val().split(',');
                var currentNames = $('#selected-location-names').val().split(',');
                var index = currentIds.indexOf(id.toString());
                if (index !== -1) {
                    currentIds.splice(index, 1);
                    currentNames.splice(index, 1);
                }
                $('#selected-location-ids').val(currentIds.join(','));
                $('#selected-location-names').val(currentNames.join(','));
            }


        });

        // Function to toggle all checkboxes
        function toggleAllPermissions() {
            let checkboxes = document.querySelectorAll('.permission-checkbox');
            let isChecked = document.getElementById('select-all').checked;

            checkboxes.forEach(function (checkbox) {
                checkbox.checked = isChecked;
            });
        }
    </script>

    <style>
        .list-group-item.selected {
            background-color: #007bff;
            color: white;
        }
    </style>

@endpush
