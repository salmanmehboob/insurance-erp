@extends('admin.layouts.app')
@push('styles')
    <style>
        /* Form styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }


        .acord-logo {
            max-width: 120px;
            margin-bottom: 10px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
        }


        .acord-table th,
        .acord-table td {
            border: 1px solid #000;
            padding: 5px;
            text-align: left;
            font-size: 9pt;
        }

        .acord-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

    </style>
@endpush
@section('content')

    <form action="{{ route('store-agentBrokerForm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/ACORD_logo.svg/2560px-ACORD_logo.svg.png" alt="ACORD Logo" class="acord-logo">
                </div>
                <div class="col-md-6">
                    <h2 class="text-center">AGENT/BROKER OF RECORD CHANGE</h2>
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="creation_date" class="form-label">DATE (MM/DD/YYYY)</label>
                        <input type="date" class="form-control" id="creation_date" name="creation_date" value="{{ old('creation_date') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="agency_phone" class="form-label">PHONE (A/C, No, Ext)</label>
                            <input type="text" class="form-control" id="agency_phone" name="agency_phone" value="{{ old('agency_phone', '(713)947-3434') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="agency_fax" class="form-label">FAX (A/C, No)</label>
                            <input type="text" class="form-control" id="agency_fax" name="agency_fax" value="{{ old('agency_fax', '(713)946-3969') }}">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="agency_name" class="form-label">Agency Name</label>
                        <input type="text" class="form-control" id="agency_name" name="agency_name" value="{{ old('agency_name', 'Aim Insurance of Texas') }}">
                    </div>
                    <div class="mb-3">
                        <label for="agency_address" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="agency_address" name="agency_address" value="{{ old('agency_address', '3322 Shaver St') }}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label for="agency_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="agency_city" name="agency_city" value="{{ old('agency_city', 'Pasadena') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="agency_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="agency_state" name="agency_state" value="{{ old('agency_state', 'TX') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="agency_zipcode" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" id="agency_zipcode" name="agency_zipcode" value="{{ old('agency_zipcode', '77504') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-MAIL ADDRESS</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="code" class="form-label">CODE</label>
                            <input type="text" class="form-control" id="code" name="code" value="{{ old('code') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="sub_code" class="form-label">SUB CODE</label>
                            <input type="text" class="form-control" id="sub_code" name="sub_code" value="{{ old('sub_code') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="agency_customer_id" class="form-label">AGENCY CUSTOMER ID</label>
                        <input type="text" class="form-control" id="agency_customer_id" name="agency_customer_id" value="{{ old('agency_customer_id') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="insurance_company_name" class="form-label fw-bold">INSURANCE COMPANY NAME</label>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="insurance_company_name" name="insurance_company_name" value="{{ old('insurance_company_name') }}">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="insurance_company_address" class="form-label">Street Address</label>
                        <input type="text" class="form-control" id="insurance_company_address" name="insurance_company_address" value="{{ old('insurance_company_address') }}">
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-5">
                            <label for="insurance_company_city" class="form-label">City</label>
                            <input type="text" class="form-control" id="insurance_company_city" name="insurance_company_city" value="{{ old('insurance_company_city') }}">
                        </div>
                        <div class="col-md-3">
                            <label for="insurance_company_state" class="form-label">State</label>
                            <input type="text" class="form-control" id="insurance_company_state" name="insurance_company_state" value="{{ old('insurance_company_state') }}">
                        </div>
                        <div class="col-md-4">
                            <label for="insurance_company_zipcode" class="form-label">ZIP Code</label>
                            <input type="text" class="form-control" id="insurance_company_zipcode" name="insurance_company_zipcode" value="{{ old('insurance_company_zipcode') }}">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="current_agency" class="form-label">CURRENT AGENCY</label>
                            <input type="text" class="form-control" id="current_agency" name="current_agency" value="{{ old('current_agency') }}">
                        </div>
                        <div class="col-md-6">
                            <label for="current_producer" class="form-label">CURRENT PRODUCER</label>
                            <input type="text" class="form-control" id="current_producer" name="current_producer" value="{{ old('current_producer') }}">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="fw-bold mb-2">NAMED INSURED (AS IT APPEARS ON POLICY)</div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>NAMED INSURED</th>
                                <th>POLICY NUMBER(S)</th>
                                <th>EFFECTIVE DATE</th>
                                <th>EXPIRATION DATE</th>
                                <th>LINE OF BUSINESS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for ($i = 0; $i < 10; $i++)
                                <tr>
                                    <td><input type="text" class="form-control" name="name[{{ $i }}]" value="{{ old('name.' . $i) }}"></td>
                                    <td><input type="text" class="form-control" name="policy_number[{{ $i }}]" value="{{ old('policy_number.' . $i) }}"></td>
                                    <td><input type="date" class="form-control" name="effective_date[{{ $i }}]" value="{{ old('effective_date.' . $i) }}"></td>
                                    <td><input type="date" class="form-control" name="expiration_date[{{ $i }}]" value="{{ old('expiration_date.' . $i) }}"></td>
                                    <td><input type="text" class="form-control" name="line_of_business[{{ $i }}]" value="{{ old('line_of_business.' . $i) }}"></td>
                                </tr>
                            @endfor
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="advice_producer_name" class="form-label">Please be advised that we wish to name</label>
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" class="form-control" id="advice_producer_name" name="advice_producer_name" value="{{ old('advice_producer_name') }}" placeholder="Producer">
                            </div>
                            <div class="col-md-4 d-flex align-items-center">
                                <span>as our exclusive representative effective</span>
                            </div>
                            <div class="col-md-4">
                                <input type="date" class="form-control" id="advice_producer_effective_date" name="advice_producer_effective_date" value="{{ old('advice_producer_effective_date') }}">
                            </div>
                        </div>
                    </div>
                    <p>for the lines of business shown above, currently in force or submitted by application.</p>
                    <p>This authorization replaces any other authorization that may have been previously completed for any other insurance representative for the stated lines of business.</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="insured_signature" class="form-label">INSURED SIGNATURE</label>
                        <input type="text" class="form-control" id="insured_signature" name="insured_signature" value="{{ old('insured_signature') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="issued_date" class="form-label">DATE</label>
                        <input type="date" class="form-control" id="issued_date" name="issued_date" value="{{ old('issued_date') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="insured_title" class="form-label">TITLE (IF APPLICABLE)</label>
                        <input type="text" class="form-control" id="insured_title" name="insured_title" value="{{ old('insured_title') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="insured_company_name" class="form-label">COMPANY NAME (IF APPLICABLE)</label>
                        <input type="text" class="form-control" id="insured_company_name" name="insured_company_name" value="{{ old('insured_company_name') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-12">
                    <div class="mb-3">
                        <label for="insured_company_address" class="form-label">STREET ADDRESS OF INSURED</label>
                        <input type="text" class="form-control" id="insured_company_address" name="insured_company_address" value="{{ old('insured_company_address') }}">
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="insured_company_city" class="form-label">CITY OF INSURED</label>
                        <input type="text" class="form-control" id="insured_company_city" name="insured_company_city" value="{{ old('insured_company_city') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="insured_company_state" class="form-label">STATE OF INSURED</label>
                        <input type="text" class="form-control" id="insured_company_state" name="insured_company_state" value="{{ old('insured_company_state') }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="insured_company_zipcode" class="form-label">ZIP CODE OF INSURED</label>
                        <input type="text" class="form-control" id="insured_company_zipcode" name="insured_company_zipcode" value="{{ old('insured_company_zipcode') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>
    </form>


@endsection
