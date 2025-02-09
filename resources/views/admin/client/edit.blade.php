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
        <div class="card">
            <!-- Agent form -->
            <form action="{{ route('update-client',$client->id) }}" method="POST" enctype="multipart/form-data"
                  class="flex-fill form-validate-jquery">
                @method('PUT')
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
                                               value="{{ old('applicant_name',$client->applicant_name) }}">
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
                                               value="{{ old('address',$client->address) }}">
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
                                               value="{{ old('city',$client->city) }}">
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
                                                    value="{{ $state->id }}" {{ old('state_id',$client->state_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                               placeholder="Zip Code" value="{{ old('zip_code',$client->zip_code) }}">
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
                                               value="{{ old('email',$client->email) }}">
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
                                                    value="{{ $state->id }}" {{ old('email_status_id',$client->email_status_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                               value="{{ old('anniversary',$client->anniversary) }}">
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
                                                    value="{{ $state->id }}" {{ old('primary_language_id',$client->primary_language_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                           value="{{ old('home_phone_no',$client->home_phone_no) }}">
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
                                           value="{{ old('cell_phone_no',$client->cell_phone_no) }}">
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
                                           value="{{ old('work_phone_no',$client->work_phone_no) }}">
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
                                           value="{{ old('fax_phone_no',$client->fax_phone_no) }}">
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
                        @if($policyType->id == 3 || $policyType->id == 4 || $policyType->id == 5 || $policyType->id == 13 || $policyType->id == 7
                        || $policyType->id == 9)
                            <li class="nav-item">
                                <a href="#details-tab" class="nav-link" data-bs-toggle="tab">Details</a>
                            </li>
                        @endif
                        @if($policyType->id == 1 || $policyType->id == 2 || $policyType->id == 3
    || $policyType->id == 4 || $policyType->id == 5 || $policyType->id == 13 || $policyType->id == 6 || $policyType->id == 7
    || $policyType->id == 8 || $policyType->id == 9 || $policyType->id == 10 || $policyType->id == 11 || $policyType->id == 12)
                            <li class="nav-item">
                                <a href="#driver-tab" class="nav-link" data-bs-toggle="tab">
                                    @if($policyType->id == 1)
                                        Driver
                                    @elseif($policyType->id == 6 || $policyType->id == 8 )
                                        Household
                                    @elseif($policyType->id == 7 || $policyType->id == 9)
                                        Owners
                                    @elseif($policyType->id == 2 || $policyType->id == 3 || $policyType->id == 4
     || $policyType->id == 5 || $policyType->id == 13 || $policyType->id == 10 || $policyType->id == 11 || $policyType->id == 12)
                                        Contact Info
                                    @endif
                                </a>
                            </li>
                        @endif

                        @if($policyType->id == 1)
                            <li class="nav-item">
                                <a href="#coverage-tab" class="nav-link" data-bs-toggle="tab">Coverage</a>
                            </li>
                            <li class="nav-item">
                                <a href="#vehicle-tab" class="nav-link" data-bs-toggle="tab">Vehicles</a>
                            </li>
                        @endif
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
                                                        value="{{ $state->id }}" {{ old('policy_status_id',$client->policy->policy_status_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('policy_status_id'))
                                                <span
                                                    class="text-danger">{{ $errors->first('policy_status_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Effective Date</label>
                                        <div class="form-group">
                                            <input type="text" id="effective_date" name="effective_date"
                                                   class="form-control flatpickr-minimum"
                                                   placeholder="Select Date"
                                                   value="{{ old('effective_date',$client->policy->effective_date) }}">
                                            @if ($errors->has('effective_date'))
                                                <span class="text-danger">{{ $errors->first('effective_date') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label">Terms</label>
                                        <div class="form-group">
                                            <select id="term_id" name="term_id" class="form-control select2"
                                                    data-placeholder="Select Term">
                                                <option></option>
                                                @foreach($terms as $state)
                                                    <option
                                                        value="{{ $state->id }}" {{ old('term_id',$client->policy->term_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                            <input type="text" id="expiration_date" name="expiration_date"
                                                   class="form-control flatpickr-minimum"
                                                   placeholder="Select Date"
                                                   value="{{ old('expiration_date',$client->policy->expiration_date) }}">
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
                                                   value="{{ old('file_number',$client->policy->file_number) }}">
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
                                                   value="{{ old('sold_date',$client->policy->sold_date) }}">
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
                                                   value="{{ old('policy_number',$client->policy->policy_number) }}">
                                            @if ($errors->has('policy_number'))
                                                <span class="text-danger">{{ $errors->first('policy_number') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label">Company</label>
                                        <div class="form-group">
                                            <select name="insurance_company_id" id="insurance_company_id"
                                                    class="form-control select2"
                                                    data-placeholder="Select Company">
                                                <option></option>
                                                @foreach($insuranceCompanies as $state)
                                                    <option data-commission="{{$state->commission_in_percentage}}"
                                                            value="{{ $state->id }}" {{ old('insurance_company_id',$client->policy->insurance_company_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                                        value="{{ $state->id }}" {{ old('agent_id',$client->policy->agent_id) == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                                        value="{{ $state->id }}" {{ old('agency_id',$client->policy->agency_id) == $state->id ? 'selected' : '' }}>{{ $state->agency_name }}</option>
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
                            <div class="driver-form-container">
                                <div class="driver-form">
                                    @foreach($client->drivers as $key => $driver)
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-12 mt-3" id="count[{{$key}}]">
                                                        <button type="button"
                                                                class="btn btn-danger btn-sm float-end remove-form">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">First Name</label>
                                                        <div class="form-group">
                                                            <input type="text" name="first_name[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="First Name"
                                                                   value="{{  $driver->first_name }}">
                                                            @if ($errors->has('first_name'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('first_name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Last Name</label>
                                                        <div class="form-group">
                                                            <input type="text" name="last_name[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="Last Name"
                                                                   value="{{  $driver->last_name }}">
                                                            @if ($errors->has('last_name'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('last_name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Date Of Birth</label>
                                                        <div class="form-group">
                                                            <input type="date" name="dob[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="Select Date"
                                                                   value="{{ $driver->dob }}">
                                                            @if ($errors->has('dob'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('dob') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <label class="col-form-label">Age</label>
                                                        <div class="form-group">
                                                            <input type="number" name="age[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="Age"
                                                                   value="{{ $driver->age }}">
                                                            @if ($errors->has('age'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('age') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">SSN #<span
                                                                class="text-danger">*</span></label>
                                                        <div class="form-group">
                                                            <input type="text" name="ssn_no[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="999-99-9999"
                                                                   data-inputmask="'mask': '999-99-9999'"
                                                                   value="{{ $driver->ssn_no }}">
                                                            @if ($errors->has('ssn_no'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('ssn_no') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Gender</label>
                                                        <div class="form-group">
                                                            <select name="gender_id[{{$key}}]" class="form-control"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Gender">
                                                                <option>Select Gender</option>
                                                                @foreach($genders as $state)
                                                                    <option
                                                                        value="{{ $state->id }}" {{ $driver->gender_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('gender_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('gender_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Marital Status</label>
                                                        <div class="form-group">
                                                            <select name="marital_status_id[{{$key}}]"
                                                                    class="form-control"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Status">
                                                                <option>Select Status</option>
                                                                @foreach($maritalStatus as $state)
                                                                    <option
                                                                        value="{{ $state->id }}" {{ $driver->marital_status_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                                            <select name="relationship_id[{{$key}}]"
                                                                    class="form-control"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Status">
                                                                <option>Select Relation</option>
                                                                @foreach($relationships as $state)
                                                                    <option
                                                                        value="{{ $state->id }}" {{ $driver->relationship_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('relationship_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('relationship_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Driver License</label>
                                                        <div class="form-group">
                                                            <input type="text" name="license_no[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="License No"
                                                                   value="{{ $driver->license_no }}">
                                                            @if ($errors->has('license_no'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('license_no') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">License State</label>
                                                        <div class="form-group">
                                                            <select name="us_state_id[{{$key}}]" class="form-control"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select State">
                                                                <option>Select State</option>
                                                                @foreach($states as $state)
                                                                    <option
                                                                        value="{{ $state->id }}" {{ $driver->us_state_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                                                                @endforeach
                                                            </select>
                                                            @if ($errors->has('us_state_id'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('us_state_id') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">License Year</label>
                                                        <div class="form-group">
                                                            <input type="number" name="license_year[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="License Year"
                                                                   value="{{ $driver->license_year }}">
                                                            @if ($errors->has('license_year'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('license_year') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label class="col-form-label">Cell Phone <span
                                                                class="text-danger">*</span></label>
                                                        <div class="form-group">
                                                            <input type="text" name="cell_no[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="(999) 999-9999"
                                                                   data-inputmask="'mask': '(999) 999-9999'"
                                                                   value="{{ $driver->cell_no }}">
                                                            @if ($errors->has('cell_no'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('cell_no') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Education Level</label>
                                                        <div class="form-group">
                                                            <select name="education_level_id[{{$key}}]"
                                                                    class="form-control"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Education Level">
                                                                <option>Select Education Level</option>
                                                                @foreach($educationLevels as $state)
                                                                    <option
                                                                        value="{{ $state->id }}" {{ $driver->education_level_id == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
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
                                                            <input type="text" name="occupation[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="Occupation"
                                                                   value="{{ $driver->occupation }}">
                                                            @if ($errors->has('occupation'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('occupation') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <label class="col-form-label">Industry</label>
                                                        <div class="form-group">
                                                            <input type="text" name="industry[{{$key}}]"
                                                                   class="form-control"
                                                                   placeholder="Industry"
                                                                   value="{{ $driver->industry }}">
                                                            @if ($errors->has('industry'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('industry') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <hr>
                                </div>
                            </div>
                            <button type="button" id="add-more-driver" class="btn btn-primary mt-3">Add More</button>

                        </div>
                        <div class="tab-pane fade" id="details-tab">
                            <fieldset class="border p-3 mb-4">
                                <div class="row">
                                    @if($policyType->id == 3 || $policyType->id == 4 )
                                        <div class="col-md-4">
                                            <div class="col-md-12">
                                                <label class="col-form-label">Type of Business</label>
                                                <div class="form-group">
                                                    <input type="text" name="type_of_business" class="form-control"
                                                           value="{{ old('type_of_business',$client->commercial->type_of_business) }}">
                                                    @if ($errors->has('type_of_business'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('type_of_business') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label">Year Of Experience</label>
                                                <div class="form-group">
                                                    <input type="text" name="year_of_experience" class="form-control"
                                                           value="{{ old('year_of_experience',$client->commercial->year_of_experience) }}">
                                                    @if ($errors->has('year_of_experience'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('year_of_experience') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label">Special License?</label>
                                                <div class="form-group">
                                                    <input type="text" name="special_license" class="form-control"
                                                           value="{{ old('special_license',$client->commercial->special_license) }}">
                                                    @if ($errors->has('special_license'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('special_license') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label">Employment #</label>
                                                <div class="form-group">
                                                    <input type="number" name="employment_number" class="form-control"
                                                           value="{{ old('employment_number',$client->commercial->employment_number) }}">
                                                    @if ($errors->has('employment_number'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('employment_number') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <label class="col-form-label">Payroll</label>
                                                <div class="form-group">
                                                    <input type="text" name="employment_payroll" class="form-control"
                                                           data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                           value="${{ old('employment_payroll',$client->commercial->employment_payroll) }}">
                                                    @if ($errors->has('employment_payroll'))
                                                        <span
                                                            class="text-danger">{{ $errors->first('employment_payroll') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="border p-3 mb-4">
                                                <h5><span class="font-weight-semibold"></span>Quotes Only</h5>

                                                <div class="col-md-12">
                                                    <label class="col-form-label">Current Inst</label>
                                                    <div class="form-group">
                                                        <input type="text" name="current_inst" class="form-control"
                                                               value="{{ old('current_inst',$client->commercial->current_inst) }}">
                                                        @if ($errors->has('current_inst'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('current_inst') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Expiring</label>
                                                    <div class="form-group">
                                                        <input type="text" name="quote_expiry"
                                                               class="form-control flatpickr-minimum"
                                                               value="{{ old('quote_expiry',$client->commercial->quote_expiry) }}">
                                                        @if ($errors->has('quote_expiry'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('quote_expiry') }}</span>
                                                        @endif
                                                    </div>
                                                </div>

                                            </fieldset>

                                        </div>
                                    @endif
                                    @if($policyType->id == 3 || $policyType->id == 4)
                                        <div class="col-md-4">
                                            <fieldset class="border p-3">


                                                <div class="col-md-12">
                                                    <label class="col-form-label">General Aggregate</label>
                                                    <div class="form-group">
                                                        <select name="general_aggregate" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercial->general_aggregate) && $client->commercial->general_aggregate == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->general_aggregate) && $client->commercial->general_aggregate == '1000000' ? 'selected' : ''}}  value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->general_aggregate) && $client->commercial->general_aggregate == '500000' ? 'selected' : ''}}  value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->general_aggregate) && $client->commercial->general_aggregate == '300000' ? 'selected' : ''}}  value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->general_aggregate) && $client->commercial->general_aggregate == '100000' ? 'selected' : ''}}  value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('general_aggregate'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('general_aggregate') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Products Aggregate</label>
                                                    <div class="form-group">
                                                        <select name="product_aggregate" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercial->product_aggregate) && $client->commercial->product_aggregate == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->product_aggregate) && $client->commercial->product_aggregate == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->product_aggregate) && $client->commercial->product_aggregate == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->product_aggregate) && $client->commercial->product_aggregate == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->product_aggregate) && $client->commercial->product_aggregate == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('product_aggregate'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('product_aggregate') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Personal & Advertising Injury</label>
                                                    <div class="form-group">
                                                        <select name="personal_injury" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercial->personal_injury) && $client->commercial->personal_injury == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->personal_injury) && $client->commercial->personal_injury == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->personal_injury) && $client->commercial->personal_injury == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->personal_injury) && $client->commercial->personal_injury == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->personal_injury) && $client->commercial->personal_injury == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('personal_injury'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('personal_injury') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Each Occurrence</label>
                                                    <div class="form-group">
                                                        <select name="each_occurrence" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercial->each_occurrence) && $client->commercial->each_occurrence == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->each_occurrence) && $client->commercial->each_occurrence == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->each_occurrence) && $client->commercial->each_occurrence == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->each_occurrence) && $client->commercial->each_occurrence == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->each_occurrence) && $client->commercial->each_occurrence == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('each_occurrence'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('each_occurrence') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Fire Damage</label>
                                                    <div class="form-group">
                                                        <select name="fire_damage" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercial->fire_damage) && $client->commercial->fire_damage == '500000' ? 'selected' : ''}} value="2000000">
                                                                $50,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->fire_damage) && $client->commercial->fire_damage == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->fire_damage) && $client->commercial->fire_damage == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->fire_damage) && $client->commercial->fire_damage == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->fire_damage) && $client->commercial->fire_damage == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->fire_damage) && $client->commercial->fire_damage == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('fire_damage'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('fire_damage') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Medical Expenses</label>
                                                    <div class="form-group">
                                                        <select name="medical_expense" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '500' ? 'selected' : ''}} value="2000000">
                                                                $500.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '1000' ? 'selected' : ''}} value="2000000">
                                                                $1,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '5000' ? 'selected' : ''}} value="2000000">
                                                                $5,000.00
                                                            </option>

                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '10000' ? 'selected' : ''}} value="2000000">
                                                                $10,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '25000' ? 'selected' : ''}} value="2000000">
                                                                $25,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '50000' ? 'selected' : ''}} value="2000000">
                                                                $50,000.00
                                                            </option>




                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercial->medical_expense) && $client->commercial->medical_expense == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('medical_expense'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('medical_expense') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Annual Receipt</label>
                                                    <div class="form-group">
                                                        <input type="text" name="annual_receipt" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('annual_receipt',$client->commercial->annual_receipt ?? '') }}">
                                                        @if ($errors->has('annual_receipt'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('annual_receipt') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif
                                    @if($policyType->id == 5 || $policyType->id == 13)
                                        <div class="col-md-4">
                                            <fieldset class="border p-3">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="form-check-inline"
                                                               name="is_general_liability" value="1" id="">
                                                        Commercial General Liability
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">General Aggregate</label>
                                                    <div class="form-group">
                                                        <select name="general_aggregate" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercialLiability->general_aggregate) && $client->commercialLiability->general_aggregate == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->general_aggregate) && $client->commercialLiability->general_aggregate == '1000000' ? 'selected' : ''}}  value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->general_aggregate) && $client->commercialLiability->general_aggregate == '500000' ? 'selected' : ''}}  value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->general_aggregate) && $client->commercialLiability->general_aggregate == '300000' ? 'selected' : ''}}  value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->general_aggregate) && $client->commercialLiability->general_aggregate == '100000' ? 'selected' : ''}}  value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('general_aggregate'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('general_aggregate') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Products Aggregate</label>
                                                    <div class="form-group">
                                                        <select name="product_aggregate" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercialLiability->product_aggregate) && $client->commercialLiability->product_aggregate == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->product_aggregate) && $client->commercialLiability->product_aggregate == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->product_aggregate) && $client->commercialLiability->product_aggregate == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->product_aggregate) && $client->commercialLiability->product_aggregate == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->product_aggregate) && $client->commercialLiability->product_aggregate == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('product_aggregate'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('product_aggregate') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Personal & Advertising Injury</label>
                                                    <div class="form-group">
                                                        <select name="personal_injury" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercialLiability->personal_injury) && $client->commercialLiability->personal_injury == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->personal_injury) && $client->commercialLiability->personal_injury == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->personal_injury) && $client->commercialLiability->personal_injury == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->personal_injury) && $client->commercialLiability->personal_injury == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->personal_injury) && $client->commercialLiability->personal_injury == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('personal_injury'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('personal_injury') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Each Occurrence</label>
                                                    <div class="form-group">
                                                        <select name="each_occurrence" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercialLiability->each_occurrence) && $client->commercialLiability->each_occurrence == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->each_occurrence) && $client->commercialLiability->each_occurrence == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->each_occurrence) && $client->commercialLiability->each_occurrence == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->each_occurrence) && $client->commercialLiability->each_occurrence == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->each_occurrence) && $client->commercialLiability->each_occurrence == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('each_occurrence'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('each_occurrence') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Fire Damage</label>
                                                    <div class="form-group">
                                                        <select name="fire_damage" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercialLiability->fire_damage) && $client->commercialLiability->fire_damage == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->fire_damage) && $client->commercialLiability->fire_damage == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->fire_damage) && $client->commercialLiability->fire_damage == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->fire_damage) && $client->commercialLiability->fire_damage == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->fire_damage) && $client->commercialLiability->fire_damage == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('fire_damage'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('fire_damage') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Medical Expenses</label>
                                                    <div class="form-group">
                                                        <select name="medical_expense" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{isset($client->commercialLiability->medical_expense) && $client->commercialLiability->medical_expense == '2000000' ? 'selected' : ''}} value="2000000">
                                                                $2,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->medical_expense) && $client->commercialLiability->medical_expense == '1000000' ? 'selected' : ''}} value="1000000">
                                                                $1,000,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->medical_expense) && $client->commercialLiability->medical_expense == '500000' ? 'selected' : ''}} value="500000">
                                                                $500,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->medical_expense) && $client->commercialLiability->medical_expense == '300000' ? 'selected' : ''}} value="300000">
                                                                $300,000.00
                                                            </option>
                                                            <option
                                                                {{isset($client->commercialLiability->medical_expense) && $client->commercialLiability->medical_expense == '100000' ? 'selected' : ''}} value="100000">
                                                                $100,000.00
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('medical_expense'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('medical_expense') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Annual Receipt</label>
                                                    <div class="form-group">
                                                        <input type="text" name="annual_receipt" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('annual_receipt',$client->commercialLiability->annual_receipt ?? '') }}">
                                                        @if ($errors->has('annual_receipt'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('annual_receipt') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif
                                    @if($policyType->id == 3 || $policyType->id == 4 )
                                        <div class="col-md-4">
                                            <fieldset class="border p-3">

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox" class="form-check-inline" name="" id="">
                                                        Commercial Property
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <label class="col-form-label">Building</label>
                                                    <div class="form-group">
                                                        <input type="text" name="building" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('building',$client->commercial->building) }}">
                                                        @if ($errors->has('building'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('building') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Contents</label>
                                                    <div class="form-group">
                                                        <input type="text" name="contents" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('contents',$client->commercial->contents) }}">
                                                        @if ($errors->has('contents'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('contents') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Loss Of Earning</label>
                                                    <div class="form-group">
                                                        <input type="text" name="loss_of_earning" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('loss_of_earning',$client->commercial->loss_of_earning) }}">
                                                        @if ($errors->has('loss_of_earning'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('loss_of_earning') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Pump / Canopy</label>
                                                    <div class="form-group">
                                                        <input type="text" name="pump" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('pump',$client->commercial->pump) }}">
                                                        @if ($errors->has('pump'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('pump') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Sign</label>
                                                    <div class="form-group">
                                                        <input type="text" name="sign" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('sign',$client->commercial->sign) }}">
                                                        @if ($errors->has('sign'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('sign') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Glass</label>
                                                    <div class="form-group">
                                                        <input type="text" name="glass" class="form-control"
                                                               data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                               value="${{ old('glass',$client->commercial->glass) }}">
                                                        @if ($errors->has('glass'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('glass') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="border p-3">

                                                <h4><span class="font-weight-semibold"></span> Property Detail</h4>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Owned / Leased</label>
                                                    <div class="form-group">
                                                        <select name="property_owner" class="form-control select2"
                                                                style="width: 100%"
                                                                data-placeholder="Select Option">
                                                            <option></option>
                                                            <option
                                                                {{$client->commercial->property_owner == 'owned' ? 'selected' : ''}} value="owned">
                                                                Owned
                                                            </option>
                                                            <option
                                                                {{$client->commercial->property_owner == 'leased' ? 'selected' : ''}} value="leased">
                                                                Lease
                                                            </option>

                                                        </select>
                                                        @if ($errors->has('property_owner'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('property_owner') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Year Built</label>
                                                    <div class="form-group">
                                                        <input type="text" name="built_year" class="form-control"
                                                               value="{{ old('built_year',$client->commercial->built_year) }}">
                                                        @if ($errors->has('built_year'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('built_year') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Area</label>
                                                    <div class="form-group">
                                                        <input type="text" name="property_area" class="form-control"
                                                               value="{{ old('property_area',$client->commercial->property_area) }}">
                                                        @if ($errors->has('property_area'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('property_area') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Age Of Roof</label>
                                                    <div class="form-group">
                                                        <input type="text" name="age_of_roof" class="form-control"
                                                               value="{{ old('age_of_roof',$client->commercial->age_of_roof) }}">
                                                        @if ($errors->has('age_of_roof'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('age_of_roof') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <label class="col-form-label">Construction</label>
                                                    <div class="form-group">
                                                        <input type="text" name="construction" class="form-control"
                                                               value="{{ old('construction',$client->commercial->construction) }}">
                                                        @if ($errors->has('construction'))
                                                            <span
                                                                class="text-danger">{{ $errors->first('construction') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <input type="checkbox"
                                                               {{$client->commercial->is_alarm_system == '1' ? 'checked' : ''}} class="form-check-inline"
                                                               value="1"
                                                               name="is_alarm_system"
                                                               id="">
                                                        Is Alarm System?
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif

                                    @if($policyType->id == 7)
                                        <div class="col-md-6">
                                            <fieldset class="border p-3">

                                                <h3>Coverage</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Dwelling/Building</label>
                                                        <div class="form-group">
                                                            <input type="text" name="dwelling_building"
                                                                   class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('dwelling_building',$client->house->dwelling_building) }}">
                                                            @if ($errors->has('dwelling_building'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('dwelling_building') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Liability Limits</label>
                                                        <div class="form-group">
                                                            <select name="liability_limit" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->house->liability_limit == '25000' ? 'selected' : ''}} value="25000">
                                                                    $25,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->liability_limit == '50000' ? 'selected' : ''}} value="50000">
                                                                    $50,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->liability_limit == '100000' ? 'selected' : ''}} value="100000">
                                                                    $100,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->liability_limit == '300000' ? 'selected' : ''}} value="300000">
                                                                    $300,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->liability_limit == '1000000' ? 'selected' : ''}} value="1000000">
                                                                    $1,000,000.00
                                                                </option>
                                                            </select>
                                                            @if ($errors->has('liability_limit'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('liability_limit') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Contents</label>
                                                        <div class="form-group">
                                                            <input type="text" name="contents" class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('contents',$client->house->contents) }}">
                                                            @if ($errors->has('contents'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('contents') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Medical Payment</label>
                                                        <div class="form-group">
                                                            <select name="medical_payment" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->house->medical_payment == '0' ? 'selected' : ''}} value="0">
                                                                    $0.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->medical_payment == '500' ? 'selected' : ''}} value="500">
                                                                    $500.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->medical_payment == '1000' ? 'selected' : ''}} value="1000">
                                                                    $1000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->medical_payment == '2000' ? 'selected' : ''}} value="2000">
                                                                    $2000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->medical_payment == '5000' ? 'selected' : ''}} value="5000">
                                                                    $5000.00
                                                                </option>

                                                            </select>
                                                            @if ($errors->has('medical_payment'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('medical_payment') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Additional Structure</label>
                                                        <div class="form-group">
                                                            <input type="text" name="additional_structure"
                                                                   class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('additional_structure',$client->house->additional_structure) }}">
                                                            @if ($errors->has('additional_structure'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('additional_structure') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Deductible</label>
                                                        <div class="form-group">
                                                            <select name="deductible" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->house->deductible == '0' ? 'selected' : ''}} value="0">
                                                                    $0.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->deductible == '1000' ? 'selected' : ''}} value="1000">
                                                                    $1000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->deductible == '2000' ? 'selected' : ''}} value="2000">
                                                                    $2000.00
                                                                </option>
                                                                <option
                                                                    {{$client->house->deductible == '2500' ? 'selected' : ''}} value="2500">
                                                                    $2500.00
                                                                </option>

                                                            </select>
                                                            @if ($errors->has('deductible'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('deductible') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Loss of Use</label>
                                                        <div class="form-group">
                                                            <input type="text" name="loss_of_use" class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('loss_of_use',$client->house->loss_of_use) }}">
                                                            @if ($errors->has('loss_of_use'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('loss_of_use') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="border p-3">

                                                <h3>Rating Information</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Usage</label>
                                                        <div class="form-group">
                                                            <select name="usage" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->house->usage == 'primary' ? 'selected' : ''}} value="primary">
                                                                    Primary
                                                                </option>
                                                                <option
                                                                    {{$client->house->usage == 'secondary' ? 'selected' : ''}}  value="secondary">
                                                                    Secondary
                                                                </option>
                                                                <option
                                                                    {{$client->house->usage == 'vacant' ? 'selected' : ''}}  value="vacant">
                                                                    Vacant
                                                                </option>
                                                                <option
                                                                    {{$client->house->usage == 'rented' ? 'selected' : ''}}  value="rented">
                                                                    Rented
                                                                </option>

                                                            </select>
                                                            @if ($errors->has('usage'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('usage') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Construction</label>
                                                        <div class="form-group">
                                                            <select name="construction" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->house->construction == 'brick_veneer' ? 'selected' : ''}}  value="brick_veneer">
                                                                    Brick Veneer
                                                                </option>
                                                                <option
                                                                    {{$client->house->construction == 'hollow_brick' ? 'selected' : ''}}  value="hollow_brick">
                                                                    Hollow Brick
                                                                </option>
                                                                <option
                                                                    {{$client->house->construction == 'masonry' ? 'selected' : ''}}  value="masonry">
                                                                    Masonry
                                                                </option>
                                                                <option
                                                                    {{$client->house->construction == 'solid_brick' ? 'selected' : ''}}  value="solid_brick">
                                                                    Solid Brick
                                                                </option>
                                                                <option
                                                                    {{$client->house->construction == 'stucco' ? 'selected' : ''}}  value="stucco">
                                                                    Stucco
                                                                </option>
                                                                <option
                                                                    {{$client->house->construction == 'wood_frame' ? 'selected' : ''}}  value="wood_frame">
                                                                    Wood Frame
                                                                </option>
                                                                <option
                                                                    {{$client->house->construction == 'other' ? 'selected' : ''}}  value="other">
                                                                    Other
                                                                </option>
                                                            </select>
                                                            @if ($errors->has('construction'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('construction') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Year Built</label>
                                                        <div class="form-group">
                                                            <input type="number" name="built_year" class="form-control"
                                                                   value="{{ old('built_year',$client->house->built_year) }}">
                                                            @if ($errors->has('built_year'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('built_year') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Square Footage</label>
                                                        <div class="form-group">
                                                            <input type="number" name="square_footage"
                                                                   class="form-control"
                                                                   value="{{ old('square_footage',$client->house->square_footage) }}">
                                                            @if ($errors->has('square_footage'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('square_footage') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Rooms</label>
                                                        <div class="form-group">
                                                            <input type="number" name="rooms" class="form-control"
                                                                   value="{{ old('rooms',$client->house->rooms) }}">
                                                            @if ($errors->has('rooms'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('rooms') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Age Of Roof</label>
                                                        <div class="form-group">
                                                            <input type="number" name="age_of_roof" class="form-control"
                                                                   value="{{ old('age_of_roof',$client->house->age_of_roof) }}">
                                                            @if ($errors->has('age_of_roof'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('age_of_roof') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="form-check-inline" value="1"
                                                                   {{$client->house->is_intrusion_alarm == '1' ? 'checked' : ''}}
                                                                   name="is_intrusion_alarm" id="">
                                                            Intrusion Alarm
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="form-check-inline" value="1"
                                                                   {{$client->house->is_fire_station == '1' ? 'checked' : ''}}
                                                                   name="is_fire_station" id="">
                                                            Fire Station
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="form-check-inline" value="1"
                                                                   {{$client->house->is_swimming_pool == '1' ? 'checked' : ''}}
                                                                   name="is_swimming_pool" id="">
                                                            Swimming Pool
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="form-check-inline" value="1"
                                                                   {{$client->house->is_replacement_cost == '1' ? 'checked' : ''}}
                                                                   name="is_replacement_cost" id="">
                                                            Replacement Cost
                                                        </div>
                                                    </div>


                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif


                                    @if($policyType->id == 9)
                                        <div class="col-md-6">
                                            <fieldset class="border p-3">

                                                <h3>Coverage</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Value</label>
                                                        <div class="form-group">
                                                            <input type="text" name="dwelling_building"
                                                                   class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('value',$client->mobileHome->value) }}">
                                                            @if ($errors->has('value'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('value') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Liability Limits</label>
                                                        <div class="form-group">
                                                            <select name="liability_limit" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->mobileHome->liability_limit == '25000' ? 'selected' : ''}} value="25000">
                                                                    $25,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->liability_limit == '50000' ? 'selected' : ''}} value="50000">
                                                                    $50,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->liability_limit == '100000' ? 'selected' : ''}} value="100000">
                                                                    $100,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->liability_limit == '300000' ? 'selected' : ''}} value="300000">
                                                                    $300,000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->liability_limit == '1000000' ? 'selected' : ''}} value="1000000">
                                                                    $1,000,000.00
                                                                </option>
                                                            </select>
                                                            @if ($errors->has('liability_limit'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('liability_limit') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Contents</label>
                                                        <div class="form-group">
                                                            <input type="text" name="contents" class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('contents',$client->mobileHome->contents) }}">
                                                            @if ($errors->has('contents'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('contents') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Flood</label>
                                                        <div class="form-group">
                                                            <select name="flood" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->mobileHome->flood == '0' ? 'selected' : ''}} value="0">
                                                                    $0.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->flood == '500' ? 'selected' : ''}} value="500">
                                                                    $500.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->flood == '1000' ? 'selected' : ''}} value="1000">
                                                                    $1000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->flood == '2000' ? 'selected' : ''}} value="2000">
                                                                    $2000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->flood == '5000' ? 'selected' : ''}} value="5000">
                                                                    $5000.00
                                                                </option>

                                                            </select>
                                                            @if ($errors->has('flood'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('flood') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Theft</label>
                                                        <div class="form-group">
                                                            <input type="text" name="theft"
                                                                   class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('theft',$client->mobileHome->theft) }}">
                                                            @if ($errors->has('theft'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('theft') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Deductible</label>
                                                        <div class="form-group">
                                                            <select name="deductible" class="form-control select2"
                                                                    style="width: 100%"
                                                                    data-placeholder="Select Option">
                                                                <option></option>
                                                                <option
                                                                    {{$client->mobileHome->deductible == '0' ? 'selected' : ''}} value="0">
                                                                    $0.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->deductible == '1000' ? 'selected' : ''}} value="1000">
                                                                    $1000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->deductible == '2000' ? 'selected' : ''}} value="2000">
                                                                    $2000.00
                                                                </option>
                                                                <option
                                                                    {{$client->mobileHome->deductible == '2500' ? 'selected' : ''}} value="2500">
                                                                    $2500.00
                                                                </option>

                                                            </select>
                                                            @if ($errors->has('deductible'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('deductible') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Adjacent Structure</label>
                                                        <div class="form-group">
                                                            <input type="text" name="adjacent_structure"
                                                                   class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('adjacent_structure',$client->mobileHome->adjacent_structure) }}">
                                                            @if ($errors->has('adjacent_structure'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('adjacent_structure') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Replacement Cost</label>
                                                        <div class="form-group">
                                                            <input type="text" name="replacement_cost"
                                                                   class="form-control"
                                                                   data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                   value="{{ old('replacement_cost',$client->mobileHome->replacement_cost) }}">
                                                            @if ($errors->has('replacement_cost'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('replacement_cost') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-md-6">
                                            <fieldset class="border p-3">

                                                <h3>Rating Information</h3>
                                                <div class="row">

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Make</label>
                                                        <div class="form-group">
                                                            <input type="number" name="make" class="form-control"
                                                                   value="{{ old('make',$client->mobileHome->make) }}">
                                                            @if ($errors->has('make'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('make') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Model</label>
                                                        <div class="form-group">
                                                            <input type="number" name="model" class="form-control"
                                                                   value="{{ old('model',$client->mobileHome->model) }}">
                                                            @if ($errors->has('model'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('model') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Year Built</label>
                                                        <div class="form-group">
                                                            <input type="number" name="built_year" class="form-control"
                                                                   value="{{ old('built_year',$client->mobileHome->built_year) }}">
                                                            @if ($errors->has('built_year'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('built_year') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Length X Width</label>
                                                        <div class="form-group">
                                                            <input type="number" name="dimensions" class="form-control"
                                                                   value="{{ old('dimensions',$client->mobileHome->dimensions) }}">
                                                            @if ($errors->has('dimensions'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('dimensions') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>


                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Tie Down</label>
                                                        <div class="form-group">
                                                            <input type="text" name="tied_down" class="form-control"
                                                                   value="{{ old('tied_down',$client->mobileHome->tied_down) }}">
                                                            @if ($errors->has('tied_down'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('tied_down') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Type Of Siding</label>
                                                        <div class="form-group">
                                                            <input type="text" name="type_of_siding"
                                                                   class="form-control"
                                                                   value="{{ old('type_of_siding',$client->mobileHome->type_of_siding) }}">
                                                            @if ($errors->has('type_of_siding'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('type_of_siding') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <label class="col-form-label">Park Name</label>
                                                        <div class="form-group">
                                                            <input type="text" name="park_name" class="form-control"
                                                                   value="{{ old('park_name',$client->mobileHome->park_name) }}">
                                                            @if ($errors->has('park_name'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('park_name') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Skirted</label>
                                                        <div class="form-group">
                                                            <input type="text" name="skirted" class="form-control"
                                                                   value="{{ old('skirted',$client->mobileHome->skirted) }}">
                                                            @if ($errors->has('skirted'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('skirted') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <label class="col-form-label">Fire Place</label>
                                                        <div class="form-group">
                                                            <input type="text" name="fire_place" class="form-control"
                                                                   value="{{ old('fire_place',$client->mobileHome->fire_place) }}">
                                                            @if ($errors->has('fire_place'))
                                                                <span
                                                                    class="text-danger">{{ $errors->first('fire_place') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6 mt-3">
                                                        <div class="form-group">
                                                            <input type="checkbox" class="form-check-inline" value="1"
                                                                   {{$client->mobileHome->is_inside_city_limit == '1' ? 'checked' : ''}}
                                                                   name="is_inside_city_limit" id="">
                                                            Inside City Limit
                                                        </div>
                                                    </div>


                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif
                                </div>
                            </fieldset>
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
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '10/10' ? 'selected' : ''}} value="10/10">
                                                    10/10
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '10/20' ? 'selected' : ''}}  value="1020">
                                                    10/20
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '15/30' ? 'selected' : ''}}  value="15/30">
                                                    15/30
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '20/40' ? 'selected' : ''}}  value="20/40">
                                                    20/40
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '25/50' ? 'selected' : ''}}  value="25/50">
                                                    25/50
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '25/65' ? 'selected' : ''}}  value="25/65">
                                                    25/65
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '30/60' ? 'selected' : ''}}  value="30/60">
                                                    30/60
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '50/100' ? 'selected' : ''}}  value="50/100">
                                                    50/100
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '100/300' ? 'selected' : ''}}  value="100/300">
                                                    100/300
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '250/500' ? 'selected' : ''}}  value="250/500">
                                                    250/500
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '50 CSL' ? 'selected' : ''}}  value="50 CSL">
                                                    50 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '100 CSl' ? 'selected' : ''}}  value="100 CSL">
                                                    100 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '300 CSL' ? 'selected' : ''}}  value="300 CSL">
                                                    300 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->body_injury) && $client->coverage->body_injury == '500 CSL' ? 'selected' : ''}}  value="500 CSL">
                                                    500 CSL
                                                </option>
                                            </select>
                                            @if ($errors->has('body_injury'))
                                                <span class="text-danger">{{ $errors->first('body_injury') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">Property Damage</label>
                                        <div class="form-group">
                                            <select name="property_damage" class="form-control select2"
                                                    style="width: 100%"
                                                    data-placeholder="Select Option">
                                                <option></option>
                                                <option
                                                    {{isset($client->coverage->property_damage) && $client->coverage->property_damage == '5' ? 'selected' : ''}} value="5">
                                                    5
                                                </option>
                                                <option
                                                    {{isset($client->coverage->property_damage) && $client->coverage->property_damage == '10' ? 'selected' : ''}}  value="10">
                                                    10
                                                </option>
                                                <option
                                                    {{isset($client->coverage->property_damage) && $client->coverage->property_damage == '15' ? 'selected' : ''}}  value="15">
                                                    15
                                                </option>
                                                <option
                                                    {{isset($client->coverage->property_damage) && $client->coverage->property_damage == '25' ? 'selected' : ''}}  value="25">
                                                    25
                                                </option>
                                                <option
                                                    {{isset($client->coverage->property_damage) && $client->coverage->property_damage == '50' ? 'selected' : ''}}  value="50">
                                                    50
                                                </option>
                                                <option
                                                    {{isset($client->coverage->property_damage) && $client->coverage->property_damage == '100' ? 'selected' : ''}}  value="100">
                                                    100
                                                </option>
                                                <option
                                                    {{isset($client->coverage->property_damage) && $client->coverage->property_damage == '250' ? 'selected' : ''}}  value="250">
                                                    250
                                                </option>

                                            </select>
                                            @if ($errors->has('property_damage'))
                                                <span class="text-danger">{{ $errors->first('property_damage') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label class="col-form-label">Medical Payment</label>
                                        <div class="form-group">
                                            <select name="medical_payments" class="form-control select2"
                                                    style="width: 100%"
                                                    data-placeholder="Select Option">
                                                <option></option>
                                                <option
                                                    {{isset($client->coverage->medical_payments) && $client->coverage->medical_payments == 'None' ? 'selected' : ''}}  value="None">
                                                    None
                                                </option>
                                                <option
                                                    {{isset($client->coverage->medical_payments) && $client->coverage->medical_payments == '500' ? 'selected' : ''}}  value="500">
                                                    500
                                                </option>
                                                <option
                                                    {{isset($client->coverage->medical_payments) && $client->coverage->medical_payments == '1000' ? 'selected' : ''}}  value="1000">
                                                    1000
                                                </option>
                                                <option
                                                    {{isset($client->coverage->medical_payments) && $client->coverage->medical_payments == '2000' ? 'selected' : ''}}  value="2000">
                                                    2000
                                                </option>
                                                <option
                                                    {{isset($client->coverage->medical_payments) && $client->coverage->medical_payments == '5000' ? 'selected' : ''}}  value="5000">
                                                    5000
                                                </option>

                                            </select>
                                            @if ($errors->has('medical_payments'))
                                                <span
                                                    class="text-danger">{{ $errors->first('medical_payments') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="col-form-label">PIP</label>
                                        <div class="form-group">
                                            <select name="pip" class="form-control select2" style="width: 100%"
                                                    data-placeholder="Select Option">
                                                <option></option>
                                                <option
                                                    {{isset($client->coverage->pip) && $client->coverage->pip == 'None' ? 'selected' : ''}}  value="None">
                                                    None
                                                </option>
                                                <option
                                                    {{isset($client->coverage->pip) && $client->coverage->pip == '500' ? 'selected' : ''}} value="500">
                                                    500
                                                </option>
                                                <option
                                                    {{isset($client->coverage->pip) && $client->coverage->pip == '1000' ? 'selected' : ''}} value="1000">
                                                    1000
                                                </option>
                                                <option
                                                    {{isset($client->coverage->pip) && $client->coverage->pip == '2000' ? 'selected' : ''}} value="2000">
                                                    2000
                                                </option>
                                                <option
                                                    {{isset($client->coverage->pip) && $client->coverage->pip == '5000' ? 'selected' : ''}} value="5000">
                                                    5000
                                                </option>
                                                <option
                                                    {{isset($client->coverage->pip) && $client->coverage->pip == '10000' ? 'selected' : ''}} value="10000">
                                                    10000
                                                </option>

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
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '10/10' ? 'selected' : ''}} value="10/10">
                                                    10/10
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '10/20' ? 'selected' : ''}} value="10/20">
                                                    10/20
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '15/30' ? 'selected' : ''}} value="15/30">
                                                    15/30
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '20/40' ? 'selected' : ''}} value="20/40">
                                                    20/40
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '25/50' ? 'selected' : ''}} value="25/50">
                                                    25/50
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '25/65' ? 'selected' : ''}} value="25/65">
                                                    25/65
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '30/60' ? 'selected' : ''}} value="30/60">
                                                    30/60
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '50/100' ? 'selected' : ''}} value="50/100">
                                                    50/100
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '100/300' ? 'selected' : ''}} value="100/300">
                                                    100/300
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '250/500' ? 'selected' : ''}} value="250/500">
                                                    250/500
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '50 CSL' ? 'selected' : ''}} value="50 CSL">
                                                    50 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '100 CSL' ? 'selected' : ''}} value="100 CSL">
                                                    100 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '300 CSL' ? 'selected' : ''}} value="300 CSL">
                                                    300 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_body_injury) && $client->coverage->uninsured_body_injury == '500 CSL' ? 'selected' : ''}} value="500 CSL">
                                                    500 CSL
                                                </option>
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
                                                <option
                                                    {{isset($client->coverage->uninsured_property_damage) && $client->coverage->uninsured_property_damage == '5' ? 'selected' : ''}} value="5">
                                                    5
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_property_damage) && $client->coverage->uninsured_property_damage == '10' ? 'selected' : ''}} value="10">
                                                    10
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_property_damage) && $client->coverage->uninsured_property_damage == '15' ? 'selected' : ''}} value="15">
                                                    15
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_property_damage) && $client->coverage->uninsured_property_damage == '25' ? 'selected' : ''}} value="25">
                                                    25
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_property_damage) && $client->coverage->uninsured_property_damage == '50' ? 'selected' : ''}} value="50">
                                                    50
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_property_damage) && $client->coverage->uninsured_property_damage == '100' ? 'selected' : ''}} value="100">
                                                    100
                                                </option>
                                                <option
                                                    {{isset($client->coverage->uninsured_property_damage) && $client->coverage->uninsured_property_damage == '250' ? 'selected' : ''}} value="250">
                                                    250
                                                </option>

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
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '10/10' ? 'selected' : ''}} value="10/10">
                                                    10/10
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '10/20' ? 'selected' : ''}} value="10/20">
                                                    10/20
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '15/30' ? 'selected' : ''}} value="15/30">
                                                    15/30
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '20/40' ? 'selected' : ''}} value="20/40">
                                                    20/40
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '25/50' ? 'selected' : ''}} value="25/50">
                                                    25/50
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '25/65' ? 'selected' : ''}} value="25/65">
                                                    25/65
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '30/60' ? 'selected' : ''}} value="30/60">
                                                    30/60
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '50/100' ? 'selected' : ''}} value="50/100">
                                                    50/100
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '100/300' ? 'selected' : ''}} value="100/300">
                                                    100/300
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '250/500' ? 'selected' : ''}} value="250/500">
                                                    250/500
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '50 CSL' ? 'selected' : ''}} value="50 CSL">
                                                    50 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '100 CSL' ? 'selected' : ''}} value="100 CSL">
                                                    100 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '300 CSL' ? 'selected' : ''}} value="300 CSL">
                                                    300 CSL
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_body_injury) && $client->coverage->under_insured_body_injury == '500 CSL' ? 'selected' : ''}} value="500 CSL">
                                                    500 CSL
                                                </option>
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
                                                <option
                                                    {{isset($client->coverage->under_insured_property_damage) && $client->coverage->under_insured_property_damage == '5' ? 'selected' : ''}} value="5">
                                                    5
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_property_damage) && $client->coverage->under_insured_property_damage == '10' ? 'selected' : ''}} value="10">
                                                    10
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_property_damage) && $client->coverage->under_insured_property_damage == '15' ? 'selected' : ''}} value="15">
                                                    15
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_property_damage) && $client->coverage->under_insured_property_damage == '25' ? 'selected' : ''}} value="25">
                                                    25
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_property_damage) && $client->coverage->under_insured_property_damage == '50' ? 'selected' : ''}} value="50">
                                                    50
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_property_damage) && $client->coverage->under_insured_property_damage == '100' ? 'selected' : ''}} value="100">
                                                    100
                                                </option>
                                                <option
                                                    {{isset($client->coverage->under_insured_property_damage) && $client->coverage->under_insured_property_damage == '250' ? 'selected' : ''}} value="250">
                                                    250
                                                </option>

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
                            <div class="vehicle-form-container">
                                <div class="vehicle-form">
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if(isset($client->vehicles))
                                                @foreach($client->vehicles as $key => $vehicle)
                                                    <div class="row">
                                                        <div class="col-md-12 mt-3" id="vehicleCount[{{$key}}]">
                                                            <button type="button"
                                                                    class="btn btn-danger btn-sm float-end remove-form-vehicle">
                                                                <i class="fas fa-times"></i>
                                                            </button>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="col-form-label">VIN</label>
                                                            <div class="form-group">
                                                                <input type="text" name="vin[{{$key}}]"
                                                                       class="form-control" maxlength="17"
                                                                       minlength="17"
                                                                       pattern="[A-HJ-NPR-Z0-9]{17}"
                                                                       placeholder="VIN"
                                                                       value="{{ old('vin',$vehicle->vin) }}">
                                                                @if ($errors->has('vin'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('vin') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <label class="col-form-label">Year</label>
                                                            <div class="form-group">
                                                                <select name="year_id[{{$key}}]" class="form-control"
                                                                        style="width: 100%"
                                                                        data-placeholder="Select Year">
                                                                    <option selected>Select Year</option>
                                                                    @foreach($years as $row)
                                                                        <option
                                                                            value="{{ $row->id }}" {{ $vehicle->year_id == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->year }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @if ($errors->has('year_id'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('year_id') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-md-3">
                                                            <label class="col-form-label">Make</label>
                                                            <div class="form-group">
                                                                <select name="vehicle_make_id[{{$key}}]"
                                                                        id="vehicle_make_id[{{$key}}]"
                                                                        class="form-control  vehicle-make"
                                                                        style="width: 100%"
                                                                        data-placeholder="Select Option">
                                                                    <option selected>Select Make</option>
                                                                    @foreach($vehicleMakes as $row)
                                                                        <option
                                                                            value="{{ $row->id }}" {{ $vehicle->vehicle_make_id == $row->id ? 'selected' : '' }}>
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
                                                            <label class="col-form-label">Model</label>
                                                            <div class="form-group">
                                                                <select name="vehicle_model_id[{{$key}}]"
                                                                        id="vehicle_model_id[{{$key}}]"
                                                                        class="form-control"
                                                                        style="width: 100%"
                                                                        data-placeholder="Select Option">
                                                                    <option selected>Select Model</option>
                                                                    @foreach($vehicleModels as $row)
                                                                        <option
                                                                            value="{{ $row->id }}" {{ $vehicle->vehicle_model_id == $row->id ? 'selected' : '' }}>
                                                                            {{ $row->name }}</option>
                                                                    @endforeach
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
                                                                <select name="comprehensive[{{$key}}]"
                                                                        class="form-control "
                                                                        style="width: 100%"
                                                                        data-placeholder="Select Option">
                                                                    <option selected>Select Comprehensive</option>
                                                                    <option
                                                                        {{$vehicle->comprehensive == 'None' ? 'selected' : ''}} value="None">
                                                                        None
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->comprehensive == '250' ? 'selected' : ''}} value="250">
                                                                        250
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->comprehensive == '500' ? 'selected' : ''}} value="500">
                                                                        500
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->comprehensive == '700' ? 'selected' : ''}} value="750">
                                                                        750
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->comprehensive == '1000' ? 'selected' : ''}} value="1000">
                                                                        1000
                                                                    </option>


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
                                                                <select name="collision[{{$key}}]" class="form-control "
                                                                        style="width: 100%"
                                                                        data-placeholder="Select Option">
                                                                    <option selected>Select Collision</option>
                                                                    <option
                                                                        {{$vehicle->collision == 'None' ? 'selected' : ''}} value="None">
                                                                        None
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->collision == '250' ? 'selected' : ''}} value="250">
                                                                        250
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->collision == '500' ? 'selected' : ''}} value="500">
                                                                        500
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->collision == '700' ? 'selected' : ''}} value="750">
                                                                        750
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->collision == '1000' ? 'selected' : ''}} value="1000">
                                                                        1000
                                                                    </option>
                                                                </select>
                                                                @if ($errors->has('collision'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('collision') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <label class="col-form-label">Rental</label>
                                                            <div class="form-group">
                                                                <select name="rental[{{$key}}]" class="form-control"
                                                                        style="width: 100%"
                                                                        data-placeholder="Select Option">
                                                                    <option selected>Select Rental</option>
                                                                    <option
                                                                        {{$vehicle->rental == '20' ? 'selected' : ''}} value="20">
                                                                        20
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->rental == '30' ? 'selected' : ''}} value="30">
                                                                        30
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->rental == '50' ? 'selected' : ''}} value="50">
                                                                        50
                                                                    </option>
                                                                </select>
                                                                @if ($errors->has('rental'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('rental') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-form-label">Towing</label>
                                                            <div class="form-group">
                                                                <select name="towing[{{$key}}]" class="form-control"
                                                                        style="width: 100%"
                                                                        data-placeholder="Select Option">
                                                                    <option selected>Select Towing</option>
                                                                    <option
                                                                        {{$vehicle->towing == 'None' ? 'selected' : ''}} value="None">
                                                                        None
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->towing == '50' ? 'selected' : ''}} value="50">
                                                                        50
                                                                    </option>
                                                                    <option
                                                                        {{$vehicle->towing == '75' ? 'selected' : ''}} value="75">
                                                                        75
                                                                    </option>
                                                                </select>
                                                                @if ($errors->has('towing'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('towing') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label class="col-form-label">Custom Equipment</label>
                                                            <div class="form-group">
                                                                <input type="text" name="custom_equipment[{{$key}}]"
                                                                       class="form-control"
                                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                                       value="${{ old('custom_equipment',$vehicle->custom_equipment) }}">
                                                                @if ($errors->has('custom_equipment'))
                                                                    <span
                                                                        class="text-danger">{{ $errors->first('custom_equipment') }}</span>
                                                                @endif
                                                            </div>
                                                        </div>


                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" id="add-more-vehicle" class="btn btn-primary mt-3">Add More Vehicle
                            </button>
                        </div>
                        <div class="tab-pane fade" id="payment-tab">
                            <fieldset class="border p-3 mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Initial Premium</label>
                                            <div class="form-group">
                                                <input type="text" id="initial_premium" name="initial_premium"
                                                       class="form-control"
                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                       value="${{ old('initial_premium',$client->payment->initial_premium) }}">
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
                                                       value="${{ old('prorated_endorsement',$client->payment->prorated_endorsement) }}">
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
                                                       value="${{ old('premium_addon',$client->payment->premium_addon) }}">
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
                                                       value="${{ old('company_fee',$client->payment->company_fee) }}">
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
                                                       value="${{ old('agency_fee',$client->payment->agency_fee) }}">
                                                @if ($errors->has('agency_fee'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('agency_fee') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <hr>
                                        <div class="col-md-12">
                                            <label class="col-form-label fw-bold">TOTAL</label>
                                            <div class="form-group">
                                                <input type="text" name="total" class="form-control"
                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                       value="${{ old('total',$client->payment->total) }}">
                                                @if ($errors->has('total'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('total') }}</span>
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
                                                       value="${{ old('down_payment',$client->payment->down_payment) }}">
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
                                                       value="${{ old('monthly_payment',$client->payment->monthly_payment) }}">
                                                @if ($errors->has('monthly_payment'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('monthly_payment') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label">Initial Agency Commission</label>
                                            <div class="form-group">
                                                <input type="text" id="initial_agency_commission"
                                                       name="initial_agency_commission" class="form-control"
                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                       value="${{ old('initial_agency_commission',$client->payment->initial_agency_commission) }}">
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
                                                       value="${{ old('primary_agency_commission',$client->payment->primary_agency_commission) }}">
                                                @if ($errors->has('primary_agency_commission'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('primary_agency_commission') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="col-form-label">Secondary Agency Commission</label>
                                            <div class="form-group">
                                                <input type="text" name="secondary_agency_commission"
                                                       class="form-control"
                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                       value="${{ old('secondary_agency_commission',$client->payment->secondary_agency_commission) }}">
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
                                                       value="${{ old('total_premium',$client->payment->total_premium) }}">
                                                @if ($errors->has('total_premium'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('total_premium') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        {{--                                        <div class="col-md-12">--}}
                                        {{--                                            <label class="col-form-label">Company Fees + Taxes</label>--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <input type="text" name="total_company_fee" class="form-control"--}}
                                        {{--                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"--}}
                                        {{--                                                       value="${{ old('total_company_fee',$client->payment->total_company_fee) }}">--}}
                                        {{--                                                @if ($errors->has('total_company_fee'))--}}
                                        {{--                                                    <span--}}
                                        {{--                                                        class="text-danger">{{ $errors->first('total_company_fee') }}</span>--}}
                                        {{--                                                @endif--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}
                                        {{--                                        <div class="col-md-12">--}}
                                        {{--                                            <label class="col-form-label">Total Agency Fee</label>--}}
                                        {{--                                            <div class="form-group">--}}
                                        {{--                                                <input type="text" name="total_agency_fee" class="form-control"--}}
                                        {{--                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"--}}
                                        {{--                                                       value="${{ old('total_agency_fee',$client->payment->total_agency_fee) }}">--}}
                                        {{--                                                @if ($errors->has('total_agency_fee'))--}}
                                        {{--                                                    <span--}}
                                        {{--                                                        class="text-danger">{{ $errors->first('total_agency_fee') }}</span>--}}
                                        {{--                                                @endif--}}
                                        {{--                                            </div>--}}
                                        {{--                                        </div>--}}

                                        <hr>
                                        <div class="col-md-12">
                                            <label class="col-form-label fw-bold">PRORATED TOTAL</label>
                                            <div class="form-group">
                                                <input type="text" name="total_prorated" class="form-control"
                                                       data-inputmask="'alias': 'numeric', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'"
                                                       value="${{ old('total_prorated',$client->payment->total_prorated) }}">
                                                @if ($errors->has('total_prorated'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('total_prorated') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Payment Option</label>
                                            <div class="form-group">
                                                <select name="payment_option" class="form-control select2"
                                                        style="width: 100%"
                                                        data-placeholder="Select Option">
                                                    <option></option>
                                                    <option
                                                        {{$client->payment->payment_option == 'monthly' ? 'selected' : ''}} value="monthly">
                                                        Paid Monthly
                                                    </option>
                                                    <option
                                                        {{$client->payment->payment_option == 'quarterly' ? 'selected' : ''}} value="quarterly">
                                                        Paid Quarterly
                                                    </option>
                                                    <option
                                                        {{$client->payment->payment_option == 'semi' ? 'selected' : ''}} value="semi">
                                                        Paid Semi Annually
                                                    </option>
                                                    <option
                                                        {{$client->payment->payment_option == 'full' ? 'selected' : ''}} value="full">
                                                        Paid in Full
                                                    </option>
                                                </select>
                                                @if ($errors->has('payment_option'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('payment_option') }}</span>
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
                                                        <option
                                                            {{$client->payment->payment_due_days ==  $i ? 'selected' : ''}} value="{{$i}}">{{$i}}</option>
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
                                                <input type="text" name="financial_company" class="form-control"
                                                       value="{{ old('financial_company',$client->payment->financial_company) }}"
                                                       placeholder="Financial Company">
                                                @if ($errors->has('financial_company'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('financial_company') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="tab-pane fade" id="notes-tab">
                            <fieldset class="border p-3 mb-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Coverage</label>
                                            <div class="form-group">
                                                <input type="text" name="coverage" class="form-control"
                                                       value="{{ old('coverage',$client->note->coverage) }}">
                                                @if ($errors->has('coverage'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('coverage') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="col-form-label">Referral Resource</label>
                                            <div class="form-group">
                                                <input type="text" name="referral_resource" class="form-control"
                                                       value="{{ old('referral_resource',$client->note->referral_resource) }}">
                                                @if ($errors->has('referral_resource'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('referral_resource') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label class="col-form-label">Memo / Notes</label>
                                            <div class="form-group">
                                                <textarea class="form-control" rows="10"
                                                          name="notes">{{$client->note->notes}}</textarea>
                                                @if ($errors->has('notes'))
                                                    <span
                                                        class="text-danger">{{ $errors->first('notes') }}</span>
                                                @endif
                                            </div>
                                        </div>


                                    </div>
                                </div>

                        </div>
                        </fieldset>
                    </div>

                </div>

                <!-- Submit button -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-end m-5">Update</button>
                </div>
            </form>
            <!-- /agent form -->
        </div>
    </div>
    <!-- /content area -->
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#insurance_company_id').change(function () {
                // Get the selected option's data-commission value
                let commission = parseFloat($(this).find(':selected').data('commission')) || 0;

                // Set the value in #company_commission
                $('#company_commission').val(commission);
                console.log(commission);
                // Trigger calculation if premium is already entered
                $('#initial_premium').trigger('input');
            });

            // Calculate initial agency commission when #initial_premium changes
            $('#initial_premium').on('input', function () {
                // Remove "$" sign before parsing value
                let initialPremium = parseFloat($(this).val().replace(/[^0-9.]/g, '')) || 0;
                let companyCommission = parseFloat($('#company_commission').val()) || 0;

                console.log(initialPremium)
                // Convert percentage to decimal before calculation
                let initialAgencyCommission = (companyCommission / 100) * initialPremium;

                // Format value with "$" prefix
                $('#initial_agency_commission').val(`$ ${initialAgencyCommission.toFixed(2)}`);
            });

            // Ensure initial_premium input always has "$" prefix
            $('#initial_premium').on('focus', function () {
                if ($(this).val() === '') {
                    $(this).val('$ ');
                }
            }).on('blur', function () {
                if ($(this).val() === '$ ') {
                    $(this).val('');
                }
            });

            // Set default values on page load
            $('#initial_premium').val('$ ');
            $('#initial_agency_commission').val('$ ');
        });

        $(document).ready(function () {
            $('#effective_date, #term_id').change(function () {
                // Get the selected effective date
                let effectiveDate = $('#effective_date').val();

                // Get the selected term value (e.g., "1 month", "2 months", "24 months")
                let termText = $('#term_id option:selected').text();

                // Extract the numeric value from the term (e.g., "1" from "1 month")
                let monthsToAdd = parseInt(termText) || 0;

                // If both values are present, calculate the expiration date
                if (effectiveDate && monthsToAdd > 0) {
                    let newExpirationDate = new Date(effectiveDate);
                    newExpirationDate.setMonth(newExpirationDate.getMonth() + monthsToAdd);

                    // Format the expiration date as YYYY-MM-DD
                    let formattedDate = newExpirationDate.toISOString().split('T')[0];

                    // Set the calculated expiration date
                    $('#expiration_date').val(formattedDate);
                } else {
                    $('#expiration_date').val('');
                }
            });
        });


        $(document).ready(function () {
            // Use event delegation to handle dynamically added elements
            $(document).on('change', '.vehicle-make', function () {
                var selectedData = $(this).find('option:selected');
                var makeID = selectedData.val();

                // Get the index from the id of the selected make
                var index = $(this).attr('id').match(/\d+/)[0]; // Extract the index from the id, e.g., 0, 1, etc.

                var method = 'GET';

                $.ajax({
                    type: method,
                    url: getModelByMake,
                    data: {makeID: makeID},
                    dataType: 'json',
                    success: function (data, status, xhr) {
                        const responsedata = data;
                        var modelSelect = $('#vehicle_model_id\\[' + index + '\\]'); // Target the corresponding model select box

                        modelSelect.empty();
                        modelSelect.append('<option>Select Model</option>');
                        if (responsedata) {
                            $.each(responsedata, function (key, value) {
                                modelSelect.append($("<option/>", {
                                    value: value.id,
                                    text: value.name
                                }));
                            });
                            modelSelect.focus();
                        }
                    },
                    error: function (jqXhr, textStatus, errorMessage) {
                        console.error(errorMessage); // Handle the error here
                    }
                });
            });
        });

    </script>
    <script>
        $(document).ready(function () {
            $('.select2').select2({
                width: '100%',
                placeholder: "Select an option",
                allowClear: true
            });
            flatpickr(".flatpickr-minimum");

            // By default, hide the Remove button in the first form
            $('.driver-form:first').find('#count\\[0\\] .remove-form').hide();

            let driverFormIndex = 0; // To track the index for array names

            // Add new driver form
            $('#add-more-driver').click(function () {
                driverFormIndex++;

                // Clone the driver form
                let newDriverForm = $('.driver-form:first').clone();

                // Reset all input values and adjust names for array indexing
                newDriverForm.find('input, select, div').each(function () {
                    let oldName = $(this).attr('name') || $(this).attr('id'); // Handle both `name` and `id`
                    if (oldName) {
                        // Change the name or id to include the array index
                        let newName = oldName.replace(/\[(\d+)\]/, '') + '[' + driverFormIndex + ']';
                        $(this).attr('name', newName).attr('id', newName);
                        if ($(this).is('input, select')) {
                            $(this).val(''); // Clear the value for inputs and selects
                        }
                    }
                });

                newDriverForm.find('input[name^="ssn_no"]').attr('data-inputmask', "'mask': '999-99-9999'");

                // Append the cloned driver form
                $('.driver-form-container').append(newDriverForm);

                // Show the remove button for the newly appended driver form
                newDriverForm.find('.remove-form').show();
            });

            // Handle remove button click for driver form
            $(document).on('click', '.remove-form', function () {
                $(this).closest('.driver-form').remove();
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('.vehicle-form:first').find('#vehicleCount\\[0\\] .remove-form-vehicle').hide();

            let vehicleFormIndex = 0; // To track the index for array names

            // Add new vehicle form
            $('#add-more-vehicle').click(function () {
                vehicleFormIndex++;

                // Clone the vehicle form
                let newVehicleForm = $('.vehicle-form:first').clone();

                // Reset input values and adjust names and IDs for array indexing
                newVehicleForm.find('input, select').each(function () {
                    let oldName = $(this).attr('name') || $(this).attr('id');
                    if (oldName) {
                        let newName = oldName.replace(/\[(\d+)\]/, '') + '[' + vehicleFormIndex + ']';
                        $(this).attr('name', newName).attr('id', newName);
                        if ($(this).is('input, select')) {
                            $(this).val(''); // Clear the values for inputs and selects
                        }
                    }
                });

                // Append the cloned vehicle form to the container
                $('.vehicle-form-container').append(newVehicleForm);

                newVehicleForm.find('.remove-form-vehicle').show();

            });

            // Handle remove button click for vehicle form
            $(document).on('click', '.remove-form-vehicle', function () {
                $(this).closest('.vehicle-form').remove();
            });

        });
    </script>
@endpush

