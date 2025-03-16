@extends('admin.layouts.app')
@section('content')

    <form action="{{ route('store-evidence/of/property') }}" method="POST" class="container mt-4">
    @csrf

    <!-- Client Details Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="text-primary">Client Details</h4>
            </div>
            <!-- Hidden Fields for IDs -->
            <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">
            <input type="hidden" name="agency_id" value="{{ $clientPolicy->agency->id }}">
            <input type="hidden" name="insurance_company_id" value="{{ $clientPolicy->insuranceCompany->id}}">

            <div class="col-md-4">
                <label>Client Name:</label>
                <input type="text" class="form-control" value="{{ $clientPolicy->client->applicant_name ?? 'N/A' }}" disabled>
            </div>
            <div class="col-md-4">
                <label>Agency Name:</label>
                <input type="text" class="form-control" value="{{ $clientPolicy->agency->agency_name ?? 'N/A' }}" disabled>
            </div>
            <div class="col-md-4">
                <label>Insurance Company Name:</label>
                <input type="text" class="form-control" value="{{ $clientPolicy->insuranceCompany->name ?? 'N/A' }}" disabled>
            </div>
        </div>

        <!-- Property Information Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="text-primary">Property Information</h4>
            </div>
            <div class="col-md-4 mb-2">
                <label for="insurance_company_id" class="form-label">Insurance Company</label>
                <select name="insurance_company_id" id="insurance_company_id" class="form-control">
                    <option value="">Select Insurance Company</option>
                    @foreach($insuranceCompanies as $company)
                        <option value="{{ $company->id }}"
                            {{ old('insurance_company_id', $clientPolicy->insurance_company_id ?? '') == $company->id ? 'selected' : '' }}>
                            {{ $company->name }}
                        </option>
                    @endforeach
                </select>
                @if ($errors->has('insurance_company_id'))
                    <span class="text-danger">{{ $errors->first('insurance_company_id') }}</span>
                @endif
            </div>
            <div class="col-md-4 mt-2">
                <label for="agency_customer_id">Agency Customer ID</label>
                <input type="text" name="agency_customer_id" id="agency_customer_id" class="form-control" placeholder="Agency Customer ID" required>
                @if ($errors->has('agency_customer_id'))
                    <span class="text-danger">{{ $errors->first('agency_customer_id') }}</span>
                @endif
            </div>
            <div class="col-md-4 mt-2">
                <label for="loan_no">Loan No</label>
                <input type="text" name="loan_no" id="loan_no" class="form-control" placeholder="Loan No">
                @if ($errors->has('loan_no'))
                    <span class="text-danger">{{ $errors->first('loan_no') }}</span>
                @endif
            </div>
            <div class="col-md-4 mt-2">
                <label for="code">Code</label>
                <input type="text" name="code" id="code" class="form-control" placeholder="Code">
                @if ($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                @endif
            </div>
            <div class="col-md-4 mt-3">
                <label for="sub_code">Sub Code</label>
                <input type="text" name="sub_code" id="sub_code" class="form-control" placeholder="Sub Code">
                @if ($errors->has('sub_code'))
                    <span class="text-danger">{{ $errors->first('sub_code') }}</span>
                @endif
            </div>
            <div class="col-md-6 mt-3">
                <label for="property_description">Property Description</label>
                <textarea name="property_description" id="property_description" class="form-control" placeholder="Property Description"></textarea>
                @if ($errors->has('property_description'))
                    <span class="text-danger">{{ $errors->first('property_description') }}</span>
                @endif
            </div>
            <div class="col-md-3 mt-3 d-flex align-items-center">
                <input type="hidden" name="is_terminated" value="0">
                <input type="checkbox" name="is_terminated" id="is_terminated" value="1" class="form-check-input me-2">
                @if ($errors->has('is_terminated'))
                    <span class="text-danger">{{ $errors->first('is_terminated') }}</span>
                @endif
                <label for="is_terminated" class="form-check-label">Is Terminated</label>
            </div>
            <div class="col-md-6 mt-3">
                <label for="evidence_date">Evidence Date</label>
                <input type="date" name="evidence_date" id="evidence_date" class="form-control">
                @if ($errors->has('evidence_date'))
                    <span class="text-danger">{{ $errors->first('evidence_date') }}</span>
                @endif
            </div>
        </div>

        <!-- Insurance Options Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="text-primary">Courage Information </h4>
            </div>
            @php
                $insuranceOptions = [
                    'is_perils_insured' => 'Is Perils Insured',
                    'is_basic' => 'Is Basic',
                    'is_broad' => 'Is Broad',
                    'is_special' => 'Is Special'
                ];
            @endphp
            @foreach($insuranceOptions as $name => $label)
                <div class="col-md-3 form-check">
                    <input type="hidden" name="{{ $name }}" value="0">
                    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" value="1" class="form-check-input">
                    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
                </div>
            @endforeach

        </div>

        <!-- Coverage Details Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="text-primary">Coverage Details</h4>
            </div>
            <div class="col-md-6">
                <label for="coverage_description">Coverage Description</label>
                <textarea name="coverage_description" id="coverage_description" class="form-control" placeholder="Coverage Description"></textarea>
                @if ($errors->has('coverage_description'))
                    <span class="text-danger">{{ $errors->first('coverage_description') }}</span>
                @endif
            </div>
            <div class="col-md-3">
                <label for="insurance_amount">Insurance Amount</label>
                <input type="number" name="insurance_amount" id="insurance_amount" class="form-control" placeholder="Amount">
                @if ($errors->has('insurance_amount'))
                    <span class="text-danger">{{ $errors->first('insurance_amount') }}</span>
                @endif
            </div>
            <div class="col-md-3">
                <label for="deductible">Deductible</label>
                <input type="number" name="deductible" id="deductible" class="form-control" placeholder="Deductible">
                @if ($errors->has('deductible'))
                    <span class="text-danger">{{ $errors->first('deductible') }}</span>
                @endif
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="text-primary">Remarks (including Special Conditions)  </h4>
            </div>
        <div class="col-md-6 mt-3">
            <label for="remarks">Remarks</label>
            <textarea name="remarks" id="remarks" class="form-control" placeholder="Remarks"></textarea>
            @if ($errors->has('remarks'))
                <span class="text-danger">{{ $errors->first('remarks') }}</span>
            @endif
        </div>
        </div>

        <!-- Additional Options Section -->


        <!-- Personal Details Section -->
        <div class="row mb-4">
            <div class="col-12">
                <h4 class="text-primary">Additional Interest</h4>
            </div>
            <div class="col-md-6 mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="col-md-6 mb-3">
                <label for="address">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Address">
                @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                @endif
            </div>
            @php
                $additionalOptions = [
                    'is_additional_insured' => 'Is Additional Insured',
                    'is_murtagagee' => 'Is Murtagagee',
                    'is_lenders_loss_payable' => 'Is Lender\'s Loss Payable',
                    'is_loss_payee' => 'Is Loss Payee'
                ];
            @endphp
            @foreach($additionalOptions as $name => $label)
                <div class="col-md-3 form-check">
                    <input type="hidden" name="{{ $name }}" value="0">
                    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" value="1" class="form-check-input">
                    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
                </div>
            @endforeach

            <div class="col-md-6 mt-3">
                <label for="representative_name">Representative Name</label>
                <input type="text" name="representative_name" id="representative_name" class="form-control" placeholder="Representative Name">
                @if ($errors->has('representative_name'))
                    <span class="text-danger">{{ $errors->first('representative_name') }}</span>
                @endif
            </div>


        <!-- Submit Button -->
        <div class="row mb-4">
            <div class="col-12 text-end">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </div>
    </form>



@endsection
