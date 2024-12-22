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
                                            <select name="marital_status_id" class="form-control select2"
                                                    style="width: 100%"
                                                    data-placeholder="Select Status">
                                                <option></option>
                                                @foreach($maritalStatus as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('marital_status_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('marital_status_id'))
                                                <span
                                                    class="text-danger">{{ $errors->first('marital_status_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="col-form-label">Relation to Insured</label>
                                        <div class="form-group">
                                            <select name="relationship_id" class="form-control select2"
                                                    style="width: 100%"
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
                                        <label class="col-form-label">Cell Phone <span
                                                class="text-danger">*</span></label>
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
                                            <select name="education_level_id" class="form-control select2"
                                                    style="width: 100%"
                                                    data-placeholder="Select Education Level">
                                                <option></option>
                                                @foreach($educationLevels as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('education_level_id') == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('education_level_id'))
                                                <span
                                                    class="text-danger">{{ $errors->first('education_level_id') }}</span>
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
                        <fieldset class="border p-3 mb-4">
                            <h3>Choose the coverage options for this policy below</h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="checkbox" class="form-check-inline" name="" id="">
                                        Check here if this is a Non-Owner Policy
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Bodily Injury</label>
                                    <div class="form-group">
                                        <select name="body_injury" class="form-control select2" style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="10/10">10/10</option>
                                            <option value="1020">10/20</option>
                                            <option value="15/30">15/30</option>
                                            <option value="20/40">20/40</option>
                                            <option value="25/50">25/50</option>
                                            <option value="25/65">25/65</option>
                                            <option value="30/60">30/60</option>
                                            <option value="50/100">50/100</option>
                                            <option value="100/300">100/300</option>
                                            <option value="250/500">250/500</option>
                                            <option value="50 CSL">50 CSL</option>
                                            <option value="100 CSL">100 CSL</option>
                                            <option value="300 CSL">300 CSL</option>
                                            <option value="500 CSL">500 CSL</option>
                                        </select>
                                        @if ($errors->has('body_injury'))
                                            <span class="text-danger">{{ $errors->first('body_injury') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Property Damage</label>
                                    <div class="form-group">
                                        <select name="property_damage" class="form-control select2" style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="250">250</option>

                                        </select>
                                        @if ($errors->has('property_damage'))
                                            <span class="text-danger">{{ $errors->first('property_damage') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label">Medical Payment</label>
                                    <div class="form-group">
                                        <select name="medical_payments" class="form-control select2" style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="None">None</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            <option value="2000">2000</option>
                                            <option value="5000">5000</option>

                                        </select>
                                        @if ($errors->has('medical_payments'))
                                            <span class="text-danger">{{ $errors->first('medical_payments') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">PIP</label>
                                    <div class="form-group">
                                        <select name="pip" class="form-control select2" style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="None">None</option>
                                            <option value="500">500</option>
                                            <option value="1000">1000</option>
                                            <option value="2000">2000</option>
                                            <option value="5000">5000</option>
                                            <option value="10000">10000</option>

                                        </select>
                                        @if ($errors->has('pip'))
                                            <span class="text-danger">{{ $errors->first('pip') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label">Uninsured Bodily Injury</label>
                                    <div class="form-group">
                                        <select name="uninsured_body_injury" class="form-control select2"
                                                style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="10/10">10/10</option>
                                            <option value="1020">10/20</option>
                                            <option value="15/30">15/30</option>
                                            <option value="20/40">20/40</option>
                                            <option value="25/50">25/50</option>
                                            <option value="25/65">25/65</option>
                                            <option value="30/60">30/60</option>
                                            <option value="50/100">50/100</option>
                                            <option value="100/300">100/300</option>
                                            <option value="250/500">250/500</option>
                                            <option value="50 CSL">50 CSL</option>
                                            <option value="100 CSL">100 CSL</option>
                                            <option value="300 CSL">300 CSL</option>
                                            <option value="500 CSL">500 CSL</option>
                                        </select>
                                        @if ($errors->has('uninsured_body_injury'))
                                            <span
                                                class="text-danger">{{ $errors->first('uninsured_body_injury') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Uninsured Property Damage</label>
                                    <div class="form-group">
                                        <select name="uninsured_property_damage" class="form-control select2"
                                                style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="250">250</option>

                                        </select>
                                        @if ($errors->has('uninsured_property_damage'))
                                            <span
                                                class="text-danger">{{ $errors->first('uninsured_property_damage') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label class="col-form-label">Under Insured Bodily Injury</label>
                                    <div class="form-group">
                                        <select name="under_insured_body_injury" class="form-control select2"
                                                style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="10/10">10/10</option>
                                            <option value="1020">10/20</option>
                                            <option value="15/30">15/30</option>
                                            <option value="20/40">20/40</option>
                                            <option value="25/50">25/50</option>
                                            <option value="25/65">25/65</option>
                                            <option value="30/60">30/60</option>
                                            <option value="50/100">50/100</option>
                                            <option value="100/300">100/300</option>
                                            <option value="250/500">250/500</option>
                                            <option value="50 CSL">50 CSL</option>
                                            <option value="100 CSL">100 CSL</option>
                                            <option value="300 CSL">300 CSL</option>
                                            <option value="500 CSL">500 CSL</option>
                                        </select>
                                        @if ($errors->has('under_insured_body_injury'))
                                            <span
                                                class="text-danger">{{ $errors->first('under_insured_body_injury') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="col-form-label">Under Insured Property Damage</label>
                                    <div class="form-group">
                                        <select name="under_insured_property_damage" class="form-control select2"
                                                style="width: 100%"
                                                data-placeholder="Select Option">
                                            <option></option>
                                            <option value="5">5</option>
                                            <option value="10">10</option>
                                            <option value="15">15</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                            <option value="250">250</option>

                                        </select>
                                        @if ($errors->has('under_insured_property_damage'))
                                            <span
                                                class="text-danger">{{ $errors->first('under_insured_property_damage') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane fade" id="vehicle-tab">
                        <fieldset class="border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-4">
                                    <fieldset class="border p-3 mb-4">
                                    </fieldset>
                                    <button type="button" class="btn btn-success">Add</button>
                                    <button type="button" class="btn btn-danger">Remove</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label class="col-form-label">VIN</label>
                                            <div class="form-group">
                                                <input type="text" name="vin" class="form-control"
                                                       placeholder="VIN"
                                                       value="{{ old('vin') }}">
                                                @if ($errors->has('vin'))
                                                    <span class="text-danger">{{ $errors->first('vin') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <label class="col-form-label">Year</label>
                                            <div class="form-group">
                                                <select name="year_id" class="form-control select2" style="width: 100%"
                                                        data-placeholder="Select Gender">
                                                    <option></option>
                                                    @foreach($years as $row)
                                                        <option
                                                            value="{{ $row->id }}" {{ old('year_id') == $row->id ? 'selected' : '' }}>
                                                            {{ $row->year }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('year_id'))
                                                    <span class="text-danger">{{ $errors->first('year_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="col-form-label">Make</label>
                                            <div class="form-group">
                                                <select name="vehicle_make_id" class="form-control select2 vehicle-make"
                                                        style="width: 100%"
                                                        data-placeholder="Select Option">
                                                    <option></option>
                                                    @foreach($vehicleMakes as $row)
                                                        <option
                                                            value="{{ $row->id }}" {{ old('vehicle_make_id') == $row->id ? 'selected' : '' }}>
                                                            {{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('vehicle_make_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('vehicle_make_id') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label class="col-form-label">Make</label>
                                            <div class="form-group">
                                                <select name="vehicle_model_id" id="vehicle_model_id"
                                                        class="form-control select2 vehicle-model" style="width: 100%"
                                                        data-placeholder="Select Option">
                                                    <option></option>

                                                </select>
                                                @if ($errors->has('vehicle_model_id'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('vehicle_model_id') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label">Comprehensive</label>
                                            <div class="form-group">
                                                <select name="comprehensive" class="form-control select2"
                                                        style="width: 100%"
                                                        data-placeholder="Select Option">
                                                    <option></option>
                                                    <option value="None">None</option>
                                                    <option value="250">250</option>
                                                    <option value="500">500</option>
                                                    <option value="750">750</option>
                                                    <option value="1000">1000</option>


                                                </select>
                                                @if ($errors->has('comprehensive'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('comprehensive') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-md-6">
                                            <label class="col-form-label">Collision</label>
                                            <div class="form-group">
                                                <select name="collision" class="form-control select2"
                                                        style="width: 100%"
                                                        data-placeholder="Select Option">
                                                    <option></option>
                                                    <option value="None">None</option>
                                                    <option value="250">250</option>
                                                    <option value="500">500</option>
                                                    <option value="750">750</option>
                                                    <option value="1000">1000</option>
                                                </select>
                                                @if ($errors->has('collision'))
                                                    <span class="text-danger">{{ $errors->first('collision') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <label class="col-form-label">Rental</label>
                                            <div class="form-group">
                                                <select name="rental" class="form-control select2" style="width: 100%"
                                                        data-placeholder="Select Option">
                                                    <option></option>
                                                    <option value="20">20</option>
                                                    <option value="30">30</option>
                                                    <option value="50">50</option>
                                                </select>
                                                @if ($errors->has('rental'))
                                                    <span class="text-danger">{{ $errors->first('rental') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label">Towing</label>
                                            <div class="form-group">
                                                <select name="towing" class="form-control select2" style="width: 100%"
                                                        data-placeholder="Select Option">
                                                    <option></option>
                                                    <option value="None">None</option>
                                                    <option value="50">50</option>
                                                    <option value="75">75</option>
                                                </select>
                                                @if ($errors->has('towing'))
                                                    <span class="text-danger">{{ $errors->first('towing') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="col-form-label">Custom Equipment</label>
                                            <div class="form-group">
                                                <input type="text" name="custom_equipment" class="form-control"
                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                       value="${{ old('custom_equipment') }}">
                                                @if ($errors->has('custom_equipment'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('custom_equipment') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="tab-pane fade" id="payment-tab">
                        <fieldset class="border p-3 mb-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Initial Premium</label>
                                        <div class="form-group">
                                            <input type="text" name="initial_premium" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('initial_premium') }}">
                                            @if ($errors->has('initial_premium'))
                                                <span
                                                    class="text-danger">{{ $errors->first('initial_premium') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Prorated Endorsement</label>
                                        <div class="form-group">
                                            <input type="text" name="prorated_endorsement" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('prorated_endorsement') }}">
                                            @if ($errors->has('prorated_endorsement'))
                                                <span
                                                    class="text-danger">{{ $errors->first('prorated_endorsement') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Premium Add Ons</label>
                                        <div class="form-group">
                                            <input type="text" name="premium_addon" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('premium_addon') }}">
                                            @if ($errors->has('premium_addon'))
                                                <span
                                                    class="text-danger">{{ $errors->first('premium_addon') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Company Fees + Taxes</label>
                                        <div class="form-group">
                                            <input type="text" name="company_fee" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('company_fee') }}">
                                            @if ($errors->has('company_fee'))
                                                <span
                                                    class="text-danger">{{ $errors->first('company_fee') }}</span>
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
                                    <hr>
                                    <div class="col-md-12">
                                        <label class="col-form-label fw-bold">PRORATED TOTAL</label>
                                        <div class="form-group">
                                            <input type="text" name="total_prorated" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('total_prorated') }}">
                                            @if ($errors->has('total_prorated'))
                                                <span
                                                    class="text-danger">{{ $errors->first('total_prorated') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Down Payment</label>
                                        <div class="form-group">
                                            <input type="text" name="down_payment" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('down_payment') }}">
                                            @if ($errors->has('down_payment'))
                                                <span
                                                    class="text-danger">{{ $errors->first('down_payment') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Monthly Payment</label>
                                        <div class="form-group">
                                            <input type="text" name="monthly_payment" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('monthly_payment') }}">
                                            @if ($errors->has('monthly_payment'))
                                                <span
                                                    class="text-danger">{{ $errors->first('monthly_payment') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Initial Agency Commission</label>
                                        <div class="form-group">
                                            <input type="text" name="initial_agency_commission" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('initial_agency_commission') }}">
                                            @if ($errors->has('initial_agency_commission'))
                                                <span
                                                    class="text-danger">{{ $errors->first('initial_agency_commission') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Primary Agency Commission</label>
                                        <div class="form-group">
                                            <input type="text" name="primary_agency_commission" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('primary_agency_commission') }}">
                                            @if ($errors->has('primary_agency_commission'))
                                                <span
                                                    class="text-danger">{{ $errors->first('primary_agency_commission') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Secondary Agency Commission</label>
                                        <div class="form-group">
                                            <input type="text" name="secondary_agency_commission" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('secondary_agency_commission') }}">
                                            @if ($errors->has('secondary_agency_commission'))
                                                <span
                                                    class="text-danger">{{ $errors->first('secondary_agency_commission') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Total Premium</label>
                                        <div class="form-group">
                                            <input type="text" name="total_premium" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('total_premium') }}">
                                            @if ($errors->has('total_premium'))
                                                <span
                                                    class="text-danger">{{ $errors->first('total_premium') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Company Fees + Taxes</label>
                                        <div class="form-group">
                                            <input type="text" name="total_company_fee" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('total_company_fee') }}">
                                            @if ($errors->has('total_company_fee'))
                                                <span
                                                    class="text-danger">{{ $errors->first('total_company_fee') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Total Agency Fee</label>
                                        <div class="form-group">
                                            <input type="text" name="total_agency_fee" class="form-control"
                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                   value="${{ old('total_agency_fee') }}">
                                            @if ($errors->has('total_agency_fee'))
                                                <span
                                                    class="text-danger">{{ $errors->first('total_agency_fee') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="col-md-12">
                                        <label class="col-form-label fw-bold">TOTAL</label>
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
                                </div>
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label class="col-form-label">Payment Option</label>
                                        <div class="form-group">
                                            <select name="comprehensive" class="form-control select2"
                                                    style="width: 100%"
                                                    data-placeholder="Select Option">
                                                <option></option>
                                                <option value="monthly">Paid Monthly</option>
                                                <option value="quarterly">Paid Quarterly</option>
                                                <option value="semi">Paid Semi Annually</option>
                                                <option value="full">Paid in Full</option>
                                            </select>
                                            @if ($errors->has('comprehensive'))
                                                <span
                                                    class="text-danger">{{ $errors->first('comprehensive') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Payment Due Day</label>
                                        <div class="form-group">
                                            <select name="payment_due_days" class="form-control select2"
                                                    style="width: 100%"
                                                    data-placeholder="Select Option">
                                                <option></option>
                                                @for($i=1; $i<=31; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                                @endfor

                                            </select>
                                            @if ($errors->has('payment_due_days'))
                                                <span
                                                    class="text-danger">{{ $errors->first('payment_due_days') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-form-label">Financial Company</label>
                                        <div class="form-group">
                                            <select name="insurance_company_id" class="form-control select2"
                                                    style="width: 100%"
                                                    data-placeholder="Select Option">
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
                                </div>
                            </div>
                    </div>
                    </fieldset>
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
