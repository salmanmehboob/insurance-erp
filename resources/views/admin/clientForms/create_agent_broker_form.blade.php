@extends('admin.layouts.app')
@section('content')

<form action="{{ route('store-agentBrokerForm') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="container">
            <div class="row">
                <!-- Agent -->
                <div class="col-md-4">
                    <label for="agent_id" class="form-label">Agent</label>
                    <select name="agent_id" id="agent_id" class="form-control">
                        @foreach ($agents as $agent)
                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Insurance Company -->
                <div class="col-md-4">
                    <label for="insurance_company_id" class="form-label">Insurance Company</label>
                    <select name="insurance_company_id" id="insurance_company_id" class="form-control">
                        @foreach ($insuranceCompanies as $company)
                            <option value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Code -->
                <div class="col-md-4">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>
            </div>

            <div class="row mt-3">
                <!-- Sub Code -->
                <div class="col-md-4">
                    <label for="sub_code" class="form-label">Sub Code</label>
                    <input type="text" name="sub_code" id="sub_code" class="form-control">
                </div>

                <!-- Current Agency -->
                <div class="col-md-4">
                    <label for="current_agency" class="form-label">Current Agency</label>
                    <input type="text" name="current_agency" id="current_agency" class="form-control">
                </div>

                <!-- Current Producer -->
                <div class="col-md-4">
                    <label for="current_producer" class="form-label">Current Producer</label>
                    <input type="text" name="current_producer" id="current_producer" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <!-- Agency Customer ID -->
                <div class="col-md-4">
                    <label for="agency_customer_id" class="form-label">Agency Customer ID</label>
                    <input type="text" name="agency_customer_id" id="agency_customer_id" class="form-control">
                </div>

                <!-- Clients Multi-Select -->
                <div class="col-md-4">
                    <label for="clients_ids" class="form-label">Clients</label>
                    <select name="clients_ids[]" id="clients_ids" class="form-control" multiple>
                        @foreach ($clients as $client)
                            <option value="{{ $client->id }}">{{ $client->applicant_name }}</option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold Ctrl/Command to select multiple clients.</small>
                </div>

                <!-- Created By -->
{{--                <div class="col-md-4">--}}
{{--                    <label for="created_by" class="form-label">Created By</label>--}}
{{--                    <select name="created_by" id="created_by" class="form-control">--}}
{{--                        @foreach ($users as $user)--}}
{{--                            <option value="{{ $user->id }}">{{ $user->name }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}
{{--            </div>--}}

            <div class="row mt-3">
                <!-- Creation Date -->
                <div class="col-md-4">
                    <label for="creation_date" class="form-label">Creation Date</label>
                    <input type="date" name="creation_date" id="creation_date" class="form-control">
                </div>

                <!-- Issued Date -->
                <div class="col-md-4">
                    <label for="issued_date" class="form-label">Issued Date</label>
                    <input type="date" name="issued_date" id="issued_date" class="form-control">
                </div>

                <!-- Insured Signature -->
                <div class="col-md-4">
                    <label for="insured_signature" class="form-label">Insured Signature</label>
                    <input type="file" name="insured_signature" id="insured_signature" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <!-- Insured Title -->
                <div class="col-md-4">
                    <label for="insured_title" class="form-label">Insured Title</label>
                    <input type="text" name="insured_title" id="insured_title" class="form-control">
                </div>

                <!-- Insured Company Name -->
                <div class="col-md-4">
                    <label for="insured_company_name" class="form-label">Insured Company Name</label>
                    <input type="text" name="insured_company_name" id="insured_company_name" class="form-control">
                </div>

                <!-- Insured Company Address -->
                <div class="col-md-4">
                    <label for="insured_company_address" class="form-label">Insured Company Address</label>
                    <input type="text" name="insured_company_address" id="insured_company_address" class="form-control">
                </div>
            </div>

            <div class="row mt-3">
                <!-- Insured Company City -->
                <div class="col-md-4">
                    <label for="insured_company_city" class="form-label">Insured Company City</label>
                    <input type="text" name="insured_company_city" id="insured_company_city" class="form-control">
                </div>

                <!-- Insured Company State -->
                <div class="col-md-4">
                    <label for="insured_company_state" class="form-label">Insured Company State</label>
                    <input type="text" name="insured_company_state" id="insured_company_state" class="form-control">
                </div>

                <!-- Insured Company Zipcode -->
                <div class="col-md-4">
                    <label for="insured_company_zipcode" class="form-label">Insured Company Zipcode</label>
                    <input type="text" name="insured_company_zipcode" id="insured_company_zipcode" class="form-control">
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </div>
        </div>
    </form>

</form>

@endsection
