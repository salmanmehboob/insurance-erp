@extends('admin.layouts.app')

@push('style')
@endpush

@section('content')

    <!-- Form validation -->
    <div class="card">
        <!-- Agent form -->
        <form action="{{ route('store-agent') }}" method="POST" enctype="multipart/form-data"
              class="flex-fill form-validate-jquery">
            @csrf
            <input type="hidden" name="policy_type_id" value="{{$policyType->id}}">
            <div class="card-body">
                <h4><span class="font-weight-semibold"></span>{{ $policyType->name }} Policy</h4>

                <div class="row mt-3 mb-3">
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6">
                                <label class="col-form-label">Applicant Name <span
                                        class="text-danger">*</span></label>
                                <div class="form-group">
                                    <input type="text" name="applicant_name" class="form-control"
                                           placeholder="Agent Name"
                                           value="{{ old('applicant_name') }}">
                                    @if ($errors->has('applicant_name'))
                                        <span class="text-danger">{{ $errors->first('applicant_name') }}</span>
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
                            <!-- Email -->
                            <div class="col-md-8">
                                <label class="col-form-label">Email</label>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email"
                                           value="{{ old('email') }}">
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Email Status</label>
                                <div class="form-group">
                                    <select name="email_status_id" class="form-control select2"
                                            data-placeholder="Select Status">
                                        <option></option>
                                        @foreach($emailStatues as $state)
                                            <option
                                                value="{{ $state->id }}" {{ old('email_status_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('email_status_id'))
                                        <span class="text-danger">{{ $errors->first('email_status_id') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-8">
                                <label class="col-form-label">Anniversary</label>
                                <div class="form-group">
                                    <input type="text" name="anniversary" class="form-control flatpickr-minimum"
                                           placeholder="Select Date"
                                           value="{{ old('anniversary') }}">
                                    @if ($errors->has('anniversary'))
                                        <span class="text-danger">{{ $errors->first('anniversary') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label class="col-form-label">Primary Language</label>
                                <div class="form-group">
                                    <select name="primary_language_id" class="form-control select2"
                                            data-placeholder="Select Language">
                                        <option></option>
                                        @foreach($languages as $state)
                                            <option
                                                value="{{ $state->id }}" {{ old('primary_language_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('primary_language_id'))
                                        <span class="text-danger">{{ $errors->first('primary_language_id') }}</span>
                                    @endif
                                </div>
                            </div>


                        </div>
                        {{--                        row end--}}

                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <label class="col-form-label">Home Phone <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="home_phone_no" class="form-control"
                                       placeholder="(999) 999-9999"
                                       data-inputmask="'mask': '(999) 999-9999'"
                                       value="{{ old('home_phone_no') }}">
                                @if ($errors->has('home_phone_no'))
                                    <span class="text-danger">{{ $errors->first('home_phone_no') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Cell Phone <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="cell_phone_no" class="form-control"
                                       placeholder="(999) 999-9999"
                                       data-inputmask="'mask': '(999) 999-9999'"
                                       value="{{ old('cell_phone_no') }}">
                                @if ($errors->has('cell_phone_no'))
                                    <span class="text-danger">{{ $errors->first('cell_phone_no') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Work Phone <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="work_phone_no" class="form-control"
                                       placeholder="(999) 999-9999"
                                       data-inputmask="'mask': '(999) 999-9999'"
                                       value="{{ old('work_phone_no') }}">
                                @if ($errors->has('work_phone_no'))
                                    <span class="text-danger">{{ $errors->first('work_phone_no') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="col-form-label">Fax Phone <span class="text-danger">*</span></label>
                            <div class="form-group">
                                <input type="text" name="fax_phone_no" class="form-control"
                                       placeholder="(999) 999-9999"
                                       data-inputmask="'mask': '(999) 999-9999'"
                                       value="{{ old('fax_phone_no') }}">
                                @if ($errors->has('fax_phone_no'))
                                    <span class="text-danger">{{ $errors->first('fax_phone_no') }}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tab navigation -->
                <ul class="nav nav-tabs ">
                    <li class="nav-item">
                        <a href="#policy-tab" class="nav-link active" data-bs-toggle="tab">Policy</a>
                    </li>
                    <li class="nav-item">
                        <a href="#driver-tab" class="nav-link" data-bs-toggle="tab">Driver</a>
                    </li>
                    <li class="nav-item">
                        <a href="#coverage-tab" class="nav-link" data-bs-toggle="tab">Coverage</a>
                    </li>
                    <li class="nav-item">
                        <a href="#vehicle-tab" class="nav-link" data-bs-toggle="tab">Vehicles</a>
                    </li>
                    <li class="nav-item">
                        <a href="#payment-tab" class="nav-link" data-bs-toggle="tab">Premium / Payment Info</a>
                    </li>
                    <li class="nav-item">
                        <a href="#notes-tab" class="nav-link" data-bs-toggle="tab">Notes</a>
                    </li>
                </ul>

                <!-- Tab content -->
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="policy-tab">
                        <fieldset class="border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label">Status</label>
                                    <div class="form-group">
                                        <select name="policy_status_id" class="form-control select2"
                                                data-placeholder="Select Status">
                                            <option></option>
                                            @foreach($policyStatuses as $state)
                                                <option
                                                    value="{{ $state->id }}" {{ old('policy_status_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('policy_status_id'))
                                            <span class="text-danger">{{ $errors->first('policy_status_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Effective Date</label>
                                    <div class="form-group">
                                        <input type="text" name="effective_date" class="form-control flatpickr-minimum"
                                               placeholder="Select Date"
                                               value="{{ old('effective_date') }}">
                                        @if ($errors->has('effective_date'))
                                            <span class="text-danger">{{ $errors->first('effective_date') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label">Terms</label>
                                    <div class="form-group">
                                        <select name="term_id" class="form-control select2"
                                                data-placeholder="Select Term">
                                            <option></option>
                                            @foreach($terms as $state)
                                                <option
                                                    value="{{ $state->id }}" {{ old('term_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('term_id'))
                                            <span class="text-danger">{{ $errors->first('term_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Expiration Date</label>
                                    <div class="form-group">
                                        <input type="text" name="expiration_date" class="form-control flatpickr-minimum"
                                               placeholder="Select Date"
                                               value="{{ old('expiration_date') }}">
                                        @if ($errors->has('expiration_date'))
                                            <span class="text-danger">{{ $errors->first('expiration_date') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label">File Number</label>
                                    <div class="form-group">
                                        <input type="text" name="file_number" class="form-control"
                                               placeholder="File Number"
                                               value="{{ old('file_number') }}">
                                        @if ($errors->has('file_number'))
                                            <span class="text-danger">{{ $errors->first('file_number') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Sold Date</label>
                                    <div class="form-group">
                                        <input type="text" name="sold_date" class="form-control flatpickr-minimum"
                                               placeholder="Select Date"
                                               value="{{ old('sold_date') }}">
                                        @if ($errors->has('sold_date'))
                                            <span class="text-danger">{{ $errors->first('sold_date') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </fieldset>
                        <fieldset class="border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="col-form-label">Policy Number</label>
                                    <div class="form-group">
                                        <input type="text" name="policy_number" class="form-control"
                                               placeholder="Policy Number"
                                               value="{{ old('policy_number') }}">
                                        @if ($errors->has('policy_number'))
                                            <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label">Company</label>
                                    <div class="form-group">
                                        <select name="insurance_company_id" class="form-control select2"
                                                data-placeholder="Select Company">
                                            <option></option>
                                            @foreach($insuranceCompanies as $state)
                                                <option
                                                    value="{{ $state->id }}" {{ old('insurance_company_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('insurance_company_id'))
                                            <span
                                                class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                                        @endif
                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <label class="col-form-label">Primary Agent</label>
                                    <div class="form-group">
                                        <select name="agent_id" class="form-control select2"
                                                data-placeholder="Select Agent">
                                            <option></option>
                                            @foreach($agents as $state)
                                                <option
                                                    value="{{ $state->id }}" {{ old('agent_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('agent_id'))
                                            <span class="text-danger">{{ $errors->first('agent_id') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Agency Location</label>
                                    <div class="form-group">
                                        <select name="agency_id" class="form-control select2"
                                                data-placeholder="Select Agency">
                                            <option></option>
                                            @foreach($locations as $state)
                                                <option
                                                    value="{{ $state->id }}" {{ old('agency_id') == $state->id ? 'selected' : '' }}>{{ $state->agency_name }}</option>
                                            @endforeach
                                        </select>
                                        @if ($errors->has('agency_id'))
                                            <span class="text-danger">{{ $errors->first('agency_id') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane fade" id="driver-tab">

                        <div class="row">
                            <div class="col-md-4">
                                <fieldset class="border p-3 mb-4">
                                </fieldset>
                                <button type="button" class="btn btn-success">Add</button>
                                <button type="button" class="btn btn-danger">Remove</button>
                            </div>
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="col-form-label">First Name</label>
                                        <div class="form-group">
                                            <input type="text" name="first_name" class="form-control"
                                                   placeholder="First Name"
                                                   value="{{ old('first_name') }}">
                                            @if ($errors->has('first_name'))
                                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Last Name</label>
                                        <div class="form-group">
                                            <input type="text" name="last_name" class="form-control"
                                                   placeholder="Last Name"
                                                   value="{{ old('last_name') }}">
                                            @if ($errors->has('last_name'))
                                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Date Of Birth</label>
                                        <div class="form-group">
                                            <input type="text" name="dob" class="form-control flatpickr-minimum"
                                                   placeholder="Select Date"
                                                   value="{{ old('dob') }}">
                                            @if ($errors->has('dob'))
                                                <span class="text-danger">{{ $errors->first('dob') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <label class="col-form-label">Age</label>
                                        <div class="form-group">
                                            <input type="number" name="age" class="form-control"
                                                   placeholder="Age"
                                                   value="{{ old('age') }}">
                                            @if ($errors->has('age'))
                                                <span class="text-danger">{{ $errors->first('age') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">SSN #<span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="ssn_no" class="form-control"
                                                   placeholder="999-99-9999"
                                                   data-inputmask="'mask': '999-99-9999'"
                                                   value="{{ old('ssn_no') }}">
                                            @if ($errors->has('ssn_no'))
                                                <span class="text-danger">{{ $errors->first('ssn_no') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label class="col-form-label">Gender</label>
                                        <div class="form-group">
                                            <select name="gender_id" class="form-control select2" style="width: 100%"
                                                    data-placeholder="Select Gender">
                                                <option></option>
                                                @foreach($genders as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('gender_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('gender_id'))
                                                <span class="text-danger">{{ $errors->first('gender_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Marital Status</label>
                                        <div class="form-group">
                                            <select name="marital_status_id" class="form-control select2" style="width: 100%"
                                                    data-placeholder="Select Status">
                                                <option></option>
                                                @foreach($maritalStatus as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('marital_status_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('marital_status_id'))
                                                <span class="text-danger">{{ $errors->first('marital_status_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Relation to Insured</label>
                                        <div class="form-group">
                                            <select name="relationship_id" class="form-control select2" style="width: 100%"
                                                    data-placeholder="Select Status">
                                                <option></option>
                                                @foreach($relationships as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('relationship_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('relationship_id'))
                                                <span class="text-danger">{{ $errors->first('relationship_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Driver License</label>
                                        <div class="form-group">
                                            <input type="text" name="license_no" class="form-control"
                                                   placeholder="License No"
                                                   value="{{ old('license_no') }}">
                                            @if ($errors->has('license_no'))
                                                <span class="text-danger">{{ $errors->first('license_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">License State</label>
                                        <div class="form-group">
                                            <select name="us_state_id" class="form-control select2" style="width: 100%"
                                                    data-placeholder="Select State">
                                                <option></option>
                                                @foreach($states as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('us_state_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('us_state_id'))
                                                <span class="text-danger">{{ $errors->first('us_state_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">License Year</label>
                                        <div class="form-group">
                                            <input type="number" name="license_year" class="form-control"
                                                   placeholder="License Year"
                                                   value="{{ old('license_year') }}">
                                            @if ($errors->has('license_year'))
                                                <span class="text-danger">{{ $errors->first('license_year') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Cell Phone <span class="text-danger">*</span></label>
                                        <div class="form-group">
                                            <input type="text" name="cell_no" class="form-control"
                                                   placeholder="(999) 999-9999"
                                                   data-inputmask="'mask': '(999) 999-9999'"
                                                   value="{{ old('cell_no') }}">
                                            @if ($errors->has('cell_no'))
                                                <span class="text-danger">{{ $errors->first('cell_no') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Education Level</label>
                                        <div class="form-group">
                                            <select name="education_level_id" class="form-control select2" style="width: 100%"
                                                    data-placeholder="Select Education Level">
                                                <option></option>
                                                @foreach($educationLevels as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('education_level_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('education_level_id'))
                                                <span class="text-danger">{{ $errors->first('education_level_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Occupation</label>
                                        <div class="form-group">
                                            <input type="text" name="occupation" class="form-control"
                                                   placeholder="Occupation"
                                                   value="{{ old('occupation') }}">
                                            @if ($errors->has('occupation'))
                                                <span class="text-danger">{{ $errors->first('occupation') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Industry</label>
                                        <div class="form-group">
                                            <input type="text" name="industry" class="form-control"
                                                   placeholder="Industry"
                                                   value="{{ old('industry') }}">
                                            @if ($errors->has('industry'))
                                                <span class="text-danger">{{ $errors->first('industry') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="coverage-tab">

                    </div>
                    <div class="tab-pane fade" id="vehicle-tab">

                    </div>
                    <div class="tab-pane fade" id="payment-tab">

                    </div>
                    <div class="tab-pane fade" id="notes-tab">

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
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });
            flatpickr(".flatpickr-minimum");


        });

    </script>


@endpush
