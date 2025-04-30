@extends('admin.layouts.app')
@section('content')

<form action="{{ route('store-agentBrokerForm') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/ACORD_logo.svg/2560px-ACORD_logo.svg.png"
                         alt="ACORD Logo" class="acord-logo">
                </div>
                <div class="col-md-6">
                    <h2 class="text-center">AGENT/BROKER OF RECORD CHANGE</h2>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="formDate" class="form-label">DATE (MM/DD/YYYY)</label>
                        <input type="date" class="form-control" id="formDate" name="formDate">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <!--client -->
                <div class="col-md-4 ">
                    <label for="client_id" class="form-label">Client</label>
                    <input type="hidden" name="client_id" value="{{ $clientPolicy->client->id }}">
                    <select class="form-control" disabled>
                        <option value="{{ $clientPolicy->client->id }}">{{ $clientPolicy->client->applicant_name }}</option>
                    </select>
                </div>

                <!-- Agent -->
                <div class="col-md-4">
                    <label for="agent_name" class="form-label">Agent</label>
                    <input type="text" class="form-control" value="{{ $clientPolicy->agent->name }}" readonly>
                    <input type="hidden" name="agent_id" id="agent_id" value="{{ $clientPolicy->agent->id }}">
                </div>

                <!-- Insurance Company -->
                <div class="col-md-4">
                    <label for="insurance_company_id" class="form-label">Insurance Company</label>
                    <input name="insurance_company_id" id="insurance_company_id" class="form-control" value="{{$clientPolicy->insuranceCompany->name}}" readonly>
                    <input type="hidden" name="insurance_company_id" id="insurance_company_id" value="{{ $clientPolicy->insuranceCompany->id }}">
                </div>
                <!-- Current Agency -->
                <div class="col-md-4 mt-2">
                    <label for="agency_id" class="form-label">Current Agency</label>
                    <select name="agency_id" id="agency_id" class="form-control" required>
                        <option value="">Select Agency</option>
                        @if ($clientPolicy && $clientPolicy->agent)
                            @foreach ($clientPolicy->agent->agencies as $agency)
                                <option value="{{ $agency->id }}">{{ $agency->agency_name }}</option>
                            @endforeach
                        @else
                            <option value="">No agencies found</option>
                        @endif
                    </select>
                </div>
                <!-- Code -->
                <div class="col-md-4 mt-2">
                    <label for="code" class="form-label">Code</label>
                    <input type="text" name="code" id="code" class="form-control" required>
                </div>

                <!-- Sub Code -->
                <div class="col-md-4 mt-2">
                    <label for="sub_code" class="form-label">Sub Code</label>
                    <input type="text" name="sub_code" id="sub_code" class="form-control" required>
                </div>



                <!-- Current Producer -->
                <div class="col-md-4 mt-2">
                    <label for="current_producer" class="form-label">Current Producer</label>
                    <input type="text" name="current_producer" id="current_producer" class="form-control">
                </div>

                <!-- Agency Customer ID -->
                <div class="col-md-4 mt-2">
                    <label for="agency_customer_id" class="form-label">Agency Customer ID</label>
                    <input type="text" name="agency_customer_id" id="agency_customer_id" class="form-control">
                </div>
                <!-- Creation Date -->
                <div class="col-md-4 mt-2">
                    <label for="creation_date" class="form-label">Creation Date</label>
                    <input type="date" name="creation_date" id="creation_date" class="form-control">
                </div>

                <!-- Issued Date -->
                <div class="col-md-4 mt-2">
                    <label for="issued_date" class="form-label">Issued Date</label>
                    <input type="date" name="issued_date" id="issued_date" class="form-control">
                </div>

                <!-- Insured Signature -->
                <div class="col-md-4 mt-2">
                    <label for="insured_signature" class="form-label">Insured Signature</label>
                    <input type="file" name="insured_signature" id="insured_signature" class="form-control">
                </div>



                <!-- Insured Title -->
                <div class="col-md-4 mt-2">
                    <label for="insured_title" class="form-label">Insured Title</label>
                    <input type="text" name="insured_title" id="insured_title" class="form-control">
                </div>

                <!-- Insured Company Name -->
                <div class="col-md-4 mt-2">
                    <label for="insured_company_name" class="form-label">Insured Company Name</label>
                    <input type="text" name="insured_company_name" id="insured_company_name" class="form-control">
                </div>

                <!-- Insured Company Address -->
                <div class="col-md-4 mt-2">
                    <label for="insured_company_address" class="form-label">Insured Company Address</label>
                    <input type="text" name="insured_company_address" id="insured_company_address" class="form-control">
                </div>



                <!-- Insured Company City -->
                <div class="col-md-4 mt-2">
                    <label for="insured_company_city" class="form-label">Insured Company City</label>
                    <input type="text" name="insured_company_city" id="insured_company_city" class="form-control">
                </div>

                <!-- Insured Company State -->
                <div class="col-md-4 mt-2">
                    <label for="insured_company_state" class="form-label">Insured Company State</label>
                    <input type="text" name="insured_company_state" id="insured_company_state" class="form-control">
                </div>

                <!-- Insured Company Zipcode -->
                <div class="col-md-4 mt-2">
                    <label for="insured_company_zipcode" class="form-label">Insured Company Zipcode</label>
                    <input type="text" name="insured_company_zipcode" id="insured_company_zipcode" class="form-control">
                </div>


            <div class="row mt-12 mt-3 ">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                    <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
                </div>
            </div>
        </div>

</form>



@endsection
