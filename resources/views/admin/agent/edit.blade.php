@extends('admin.layouts.app')

@push('style')
    <!-- Add any custom stylesheets here -->
    <style>
        .tab-error {
            color: #dc3545 !important;
            font-weight: bold;
            border-bottom: 2px solid #dc3545 !important;
        }
    </style>
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
            <form action="{{ route('update-agent', $agent->id) }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @csrf
                @method('PUT')

                <div class="card-body">
                    <!-- Tab navigation -->
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a href="#general-tab" class="nav-link active" data-bs-toggle="tab">General</a>
                        </li>
                        <li class="nav-item">
                            <a href="#location-tab" class="nav-link" data-bs-toggle="tab">Location</a>
                        </li>
                        <li class="nav-item">
                            <a href="#notes-tab" class="nav-link" data-bs-toggle="tab">Notes</a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="#permission-tab" class="nav-link" data-bs-toggle="tab">Permissions</a>--}}
{{--                        </li>--}}
                    </ul>

                    <!-- Tab content -->
                    <div class="tab-content">
                        <!-- General tab -->
                        <div class="tab-pane fade show active" id="general-tab">
                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3">Contact Information</legend>
                                <div class="row mt-3">
                                    <!-- Name -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Agent Name <span
                                                class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control required-field"
                                                   value="{{ old('name', $agent->name) }}" placeholder="Agent Name">
                                            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                            
                                        </div>
                                    </div>

                                    <!-- Address -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Address <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="address" class="form-control required-field"
                                                   value="{{ old('address', $agent->address) }}" placeholder="Address">
                                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- City -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">City <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="city" class="form-control required-field"
                                                   value="{{ old('city', $agent->city) }}" placeholder="City">
                                            @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- State -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">State <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="state_id" class="form-control select2 required-field"
                                                    data-placeholder="Select State">
                                                <option></option>
                                                @foreach($states as $state)
                                                    <option value="{{ $state->id }}"
                                                        {{ old('state_id', $agent->state_id) == $state->id ? 'selected' : '' }}>
                                                        {{ $state->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('state_id') <span class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>



                                    <!-- Zip Code -->
                                    <div class="col-md-4">
                                        <label class="col-form-label">Zip Code <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="zip_code" class="form-control required-field"
                                                   value="{{ old('zip_code', $agent->zip_code) }}"
                                                   placeholder="Zip Code">
                                            @error('zip_code') <span class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Phone <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="phone_no" class="form-control required-field"
                                                   value="{{ old('phone_no', $agent->phone_no) }}"
                                                   placeholder="(999) 999-9999" data-inputmask="'mask': '(999) 999-9999'">
                                            @error('phone_no') <span class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Email -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Email <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="email" name="email" class="form-control required-field"
                                                   value="{{ old('email', $agent->email) }}" placeholder="Email">
                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>

                            <!-- Login Details -->
                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3">Login</legend>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label">User ID <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control required-field"
                                                   value="{{ old('username', $agent->user->name) }}"
                                                   placeholder="User ID">
                                            @error('username') <span class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Password</label>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control "
                                                   placeholder="***********">
                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                         </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label">Role <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="role_id" class="form-control select2 required-field" data-placeholder="Select Role">
                                                <option></option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}"
                                                        {{ old('role_id', optional($agent->user->roles->first())->id) == $role->id ? 'selected' : '' }}>
                                                        {{ $role->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role_id'))
                                                <span class="text-danger">{{ $errors->first('role_id') }}</span>
                                            @endif
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>

                                    <!-- Bank -->
                                    <div class="col-md-6">
                                        <label class="col-form-label">Bank <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <select name="bank_id" class="form-control select2 required-field"
                                                    data-placeholder="Select Bank">
                                                <option></option>
                                                @foreach($banks as $bank)
                                                    <option
                                                        value="{{ $bank->id }}" {{ old('bank_id',$agent->bank_id) == $bank->id ? 'selected' : '' }}>{{ $bank->bank_name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('bank_id'))
                                                <span class="text-danger">{{ $errors->first('bank_id') }}</span>
                                            @endif
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                </div>

                            </fieldset>

                            <!-- Commission -->
                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3">Commission</legend>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                        <label class="col-form-label">Commission (%) <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="number" name="commission_in_percentage" 
                                            class="form-control required-field"
                                                   value="{{ old('commission_in_percentage', $agent->commission_in_percentage) }}"
                                                   placeholder="Commission %">
                                            @error('commission_in_percentage') <span
                                                class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Flat Fee <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="commission_fee" class="form-control required-field"
                                                   value="{{ old('commission_fee', $agent->commission_fee) }}"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                            >
                                            @error('commission_fee') <span
                                                class="text-danger">{{ $message }}</span> @enderror
                                            <span class="error-message text-danger"></span>
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <!-- Location tab -->
                        <div class="tab-pane fade" id="location-tab">
                            <div class="row mt-3">
                                <div class="col-md-5">
                                    <h4>All Locations</h4>
                                    <ul id="available-list" class="list-group">


                                      @foreach($allAgencies as $agency)

                                        @if(!in_array($agency->id, $assignedLocationIds))  <!-- Filter out assigned locations -->
                                            <li class="list-group-item" data-id="{{$agency->id}}" data-name="location_{{$agency->id}}">
                                                {{$agency->agency_name . ' - ' . $agency->address}}
                                            </li>
                                            @endif
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
                                        @php
                                            $selectedLocationIds = [];
                                            $selectedLocationNames = [];
                                        @endphp
                                        @foreach($agent->agentAgencies as $agency)
                                            @php
                                                $selectedLocationIds[] = $agency->locations->id;
                                                $selectedLocationNames[] = $agency->locations->agency_name . ' - ' . $agency->locations->address;
                                            @endphp
                                            <li class="list-group-item" data-id="{{ $agency->locations->id }}" data-name="location_{{$agency->locations->id}}">
                                                {{ $agency->locations->agency_name . ' - ' . $agency->locations->address }}
                                            </li>
                                        @endforeach
                                    </ul>

                                    <!-- Hidden input fields to store selected locations -->
                                    <input type="hidden" id="selected-location-ids" name="selected_location_ids[]"
                                           value="{{ implode(',', $selectedLocationIds) }}">
                                    <input type="hidden" id="selected-location-names" name="selected_location_names[]"
                                           value="{{ implode(',', $selectedLocationNames) }}">
                                           <span class="error-message text-danger" id="selected-location-error"></span>
                                </div>
                            </div>
                        </div>


                        <!-- Notes tab -->
                        <div class="tab-pane fade" id="notes-tab">
                            <fieldset class="border p-3 mb-4">
                                <legend class="mb-3">Agent Notes</legend>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Notes <span class="text-danger">*</span>      </label>
                                        <div class="form-group">
                        <textarea name="notes" class="form-control required-field" rows="5"
                              placeholder="Add any relevant notes about the agent">{{ old('notes', $agent->note) }}</textarea>
                                        <span class="error-message text-danger"></span>
                                            @error('notes') <span class="text-danger">{{ $message }}</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>


{{--                        <div class="tab-pane fade" id="permission-tab">--}}
{{--                            <div class="row mt-3">--}}
{{--                                <!-- Permissions -->--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <label class="col-form-label">Permissions</label>--}}
{{--                                    <div class="form-group">--}}
{{--                                        <!-- "Select All" Checkbox -->--}}
{{--                                        <div class="form-check">--}}
{{--                                            <input type="checkbox" class="form-check-input" id="select-all" onclick="toggleAllPermissions()">--}}
{{--                                            <label class="form-check-label fw-bold" for="select-all">Administrator: Allow All Access</label>--}}
{{--                                        </div>--}}

{{--                                        <div class="row mt-3">--}}
{{--                                            <!-- Individual Permission Checkboxes -->--}}
{{--                                            @foreach($permissions as $row)--}}
{{--                                                <div class="col-md-4 mb-2">--}}
{{--                                                    <div class="form-check">--}}
{{--                                                        <input type="checkbox"--}}
{{--                                                               class="form-check-input permission-checkbox"--}}
{{--                                                               name="permissions[]"--}}
{{--                                                               id="permission{{$row->id}}"--}}
{{--                                                               value="{{$row->id}}"--}}
{{--                                                            {{ in_array($row->id, old('permissions', $agent->user->getAllPermissions()->pluck('id')->toArray())) ? 'checked' : '' }}>--}}
{{--                                                        <label class="form-check-label" for="permission{{$row->id}}">--}}
{{--                                                            {{$row->short_name}}--}}
{{--                                                        </label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                            @endforeach--}}
{{--                                        </div>--}}
{{--                                        @error('permissions')--}}
{{--                                        <span class="text-danger">{{ $message }}</span>--}}
{{--                                        @enderror--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}


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

               // Helper: Should this field be validated?
            function shouldValidateField($input) {
                let $tabPane = $input.closest('.tab-pane');
                if ($tabPane.length === 0) return true; // Not in a tab, always validate
                let tabId = $tabPane.attr('id');
                let $tabLink = $('.nav-link[href="#' + tabId + '"]');
                if ($tabLink.length === 0) return false; // Tab not shown for this policy type
                if ($tabLink.is(':hidden') || $tabLink.parent().is(':hidden')) return false;
                return true;
            }

            // Real-time validation
            $(document).on('input change blur', '.required-field', function() {
                let $input = $(this);
                if (!shouldValidateField($input)) return;
                let isCheckbox = $input.is(':checkbox');
                let value = isCheckbox ? $input.is(':checked') : $input.val().trim();
                let inputName = $input.attr('name');
                let $errorSpan = $input.closest('.form-group').find('.error-message');
                let $tabPane = $input.closest('.tab-pane');
                let tabId = $tabPane.attr('id');
                let $tabLink = $('.nav-link[href="#' + tabId + '"]');
                if (!value) {
                    let errorMsg = isCheckbox ? 'Please check this box if you want to proceed.' : 'This field is required.';
                    $errorSpan.text(errorMsg);
                    $tabLink.addClass('tab-error');
                    console.log('❌ Validation Error:', { fieldName: inputName, tabId, message: errorMsg });
                } else {
                    $errorSpan.text('');
                    let hasOtherErrors = $tabPane.find('.error-message').not($errorSpan).filter(function(){return $(this).text().length > 0;}).length > 0;
                    if (!hasOtherErrors) $tabLink.removeClass('tab-error');
                }

                
            });

            // On form submit
            $('form').on('submit', function (e) {
                let isValid = true;
                let firstErrorTab = null;
                $('.error-message').text('');
                $('.nav-link').removeClass('tab-error');
                $('.required-field').each(function () {
                    let $input = $(this);
                    if (!shouldValidateField($input)) return;
                    let isCheckbox = $input.is(':checkbox');
                    let value = isCheckbox ? $input.is(':checked') : $input.val().trim();
                    let $tabPane = $input.closest('.tab-pane');
                    let tabId = $tabPane.attr('id');
                    let $tabLink = $('.nav-link[href="#' + tabId + '"]');
                    if (!value) {
                        isValid = false;
                        let inputName = $input.attr('name');
                        let errorMsg = isCheckbox ? 'Please check this box if you want to proceed.' : 'This field is required.';
                        $input.closest('.form-group').find('.error-message').text(errorMsg);
                        $tabLink.addClass('tab-error');
                        if (!firstErrorTab) firstErrorTab = $tabLink;
                        console.log('❌ Form Submit Validation Error:', { fieldName: inputName, tabId, message: errorMsg });
                    }

                    
                });

                // Custom validation for hidden selected location ids
                let $selectedLocationInput = $('#selected-location-ids');
                let $selectedLocationError = $('#selected-location-error');
                if (!$selectedLocationInput.val()) {
                    isValid = false;
                    $selectedLocationError.text('At least one location must be selected.');
                    // Optionally, scroll to the error
                    $selectedLocationInput[0].scrollIntoView({behavior: 'smooth', block: 'center'});
                    console.log('❌ Location Validation Error:', { fieldName: 'selected_location_ids', message: 'At least one location must be selected.' });
                } else {
                    $selectedLocationError.text('');
                }

                if (!isValid) {
                    e.preventDefault();
                    if (firstErrorTab) firstErrorTab.tab('show');
                }
            });




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

