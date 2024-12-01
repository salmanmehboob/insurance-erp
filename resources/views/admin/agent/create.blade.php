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
            <!-- Agent form -->
            <form action="{{ route('store-agent') }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                <div class="card-body">

                    <!-- Tab navigation -->
                    <ul class="nav nav-tabs ">
                        <li class="nav-item">
                            <a href="#general-tab" class="nav-link active" data-bs-toggle="tab">General</a>
                        </li>
                        <li class="nav-item">
                            <a href="#location-tab" class="nav-link" data-bs-toggle="tab">Location</a>
                        </li>
                        <li class="nav-item">
                            <a href="#notes-tab" class="nav-link" data-bs-toggle="tab">Notes</a>
                        </li>
                        <li class="nav-item">
                            <a href="#permission-tab" class="nav-link" data-bs-toggle="tab">Permissions</a>
                        </li>
                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content">
                        <!-- General tab -->
                        <div class="tab-pane fade show active" id="general-tab">


                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3 azm-color-444">Contact Information</legend>
                                <div class="row mt-3">
                                    <!-- Agent Name -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Agent Name <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Agent Name"
                                                   value="{{ old('name') }}">
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Address</label>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control" placeholder="Address"
                                                   value="{{ old('address') }}">
                                            @if ($errors->has('address'))
                                                <span class="text-danger">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">City</label>
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control" placeholder="City"
                                                   value="{{ old('city') }}">
                                            @if ($errors->has('city'))
                                                <span class="text-danger">{{ $errors->first('city') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- State -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">State</label>
                                        <div class="form-group">
                                            <select name="state_id" class="form-control select2"
                                                    data-placeholder="Select State">
                                                <option></option>
                                                @foreach($states as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('state_id'))
                                                <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Zip Code -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">Zip Code</label>
                                        <div class="form-group">
                                            <input type="text" name="zip_code" class="form-control"
                                                   placeholder="Zip Code" value="{{ old('zip_code') }}">
                                            @if ($errors->has('zip_code'))
                                                <span class="text-danger">{{ $errors->first('zip_code') }}</span>
                                            @endif
                                        </div>
                                    </div>


                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="phone_no" class="form-control"
                                                   placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'"value="{{ old('phone_no') }}">
                                            @if ($errors->has('phone_no'))
                                                <span class="text-danger">{{ $errors->first('phone_no') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Email</label>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="Email"
                                                   value="{{ old('email') }}">
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3 azm-color-444">Login</legend>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label">User ID</label>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control"
                                                   placeholder="User Name"
                                                   value="{{ old('username') }}">
                                            @if ($errors->has('username'))
                                                <span class="text-danger">{{ $errors->first('username') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label">Password</label>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control"
                                                   placeholder="***********" value="">
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Bank -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Bank</label>
                                        <div class="form-group">
                                            <select name="bank_id" class="form-control select2"
                                                    data-placeholder="Select Bank">
                                                <option></option>
                                                @foreach($banks as $bank)
                                                    <option
                                                        value="{{ $bank->id }}" {{ old('bank_id') == $bank->id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('bank_id'))
                                                <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3 azm-color-444">Commission</legend>
                                <div class="row mt-3">
                                    <!-- Commission -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Commission (%)</label>
                                        <div class="form-group">
                                            <input type="number" name="commission_in_percentage" class="form-control"
                                                   placeholder="Commission Percentage"
                                                   value="{{ old('commission_in_percentage') }}">
                                            @if ($errors->has('commission_in_percentage'))
                                                <span
                                                    class="text-danger">{{ $errors->first('commission_in_percentage') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Commission -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Flat Fee</label>
                                        <div class="form-group">
                                            <input type="number" name="commission_fee" class="form-control"
                                                   placeholder="Flat Fee"
                                                   value="{{ old('commission_fee') }}">
                                            @if ($errors->has('commission_fee'))
                                                <span
                                                    class="text-danger">{{ $errors->first('commission_fee') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                        </div>


                        <!-- Location tab -->
                        <div class="tab-pane fade" id="location-tab">
                            <div class="row mt-3">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4>All Locations</h4>
                                        <ul id="available-list" class="list-group">
                                            @foreach($agencies as $row)
                                                <li class="list-group-item" data-id="{{$row->id}}" data-name="{{'location_'.$row->id}}">
                                                    {{$row->name . ' ' . $row->address}}
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="col-md-2 text-center">
                                        <a id="move-to-selected" class="btn btn-primary my-4"> &gt;&gt; </a>
                                        <a id="move-to-available" class="btn btn-primary my-4"> &lt;&lt; </a>
                                    </div>
                                    <div class="col-md-5">
                                        <h4>Assigned Locations</h4>
                                        <ul id="selected-list" class="list-group">

                                        </ul>
                                        <!-- Hidden input fields to store selected locations -->
                                        <input type="hidden" id="selected-location-ids" name="selected_location_ids[]">
                                        <input type="hidden" id="selected-location-names" name="selected_location_names[]">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Notes tab -->
                        <div class="tab-pane fade" id="notes-tab">
                            <div class="row mt-3">
                                <!-- Notes -->
                                <div class="col-md-12">
                                    <label class="col-form-label">Notes</label>
                                    <div class="form-group">
                                        <textarea name="notes" class="form-control" rows="5"
                                                  placeholder="Add notes here...">{{ old('notes') }}</textarea>
                                        @if ($errors->has('notes'))
                                            <span class="text-danger">{{ $errors->first('notes') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="permission-tab">
                            <div class="row mt-3">
                                <!-- Permissions -->
                                <div class="col-md-12">
                                    <label class="col-form-label">Permissions</label>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <!-- Administrator Checkbox -->
                                            <input type="checkbox" class="form-check-input" id="select-all" onclick="toggleAllPermissions()">
                                            <label class="form-check-label fw-bold" for="select-all">Administrator: Allow All Access</label>
                                        </div>
                                        <div class="row mt-3">
                                            @foreach($permissions as $row)
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input permission-checkbox" name="permissions[]" value="{{$row->id}}">
                                                        <label class="form-check-label" for="permission{{$row->id}}">{{$row->short_name}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
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
            $(document).on('click', '.list-group-item', function() {
                $(this).toggleClass('selected');
            });

            // Move items from available list to selected list
            $('#move-to-selected').click(function() {
                $('#available-list .selected').each(function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    $(this).removeClass('selected').appendTo('#selected-list');

                    // Update hidden input fields with selected location data
                    addLocationToInputs(id, name);
                });
            });

            // Move items from selected list to available list
            $('#move-to-available').click(function() {
                $('#selected-list .selected').each(function() {
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

            checkboxes.forEach(function(checkbox) {
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
