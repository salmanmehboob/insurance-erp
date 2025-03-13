@extends('admin.layouts.app')
@section('content')

    <form action="{{ route('store-additionalRemarks') }}" method="POST">
        @csrf
        <div class="container">
            <div class="row">
                <!--client -->
                <div class="col-md-3 ">
                    <label for="client_id" class="form-label">Client</label>
                    <input type="hidden" name="client_id" value="{{ $clientPolicy->client->id }}">
                    <select class="form-control" disabled>
                        <option
                            value="{{ $clientPolicy->client->id }}">{{ $clientPolicy->client->applicant_name }}</option>
                    </select>
                </div>

                <!-- Agent -->
                <div class="col-md-3">
                    <label for="agency_id" class="form-label">Agency</label>
                    <input type="text" class="form-control" value="{{ $clientPolicy->agency->agency_name }}" readonly>
                    <input type="hidden" name="agency_id" id="agency_id" value="{{ $clientPolicy->agency->id }}">
                </div>

                <!-- Insurance Company -->
                <div class="col-md-4">
                    <label for="insurance_company" class="form-label">Insurance Company</label>
                    <input name="insurance_company" id="insurance_company" class="form-control"
                           value="{{$clientPolicy->insuranceCompany->name}}" readonly>

                </div>
                <div class="col-md-4">
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
                </div>

                <div class="col-md-2 mt-2">
                    <label for="policy_number" class="form-label">Policy Number</label>
                    <input type="number" name="policy_number" id="policy_number" class="form-control"
                           value="{{$clientPolicy->policy_number}}" readonly>
                </div>

                <div class="col-md-4 mt-2">
                    <label for="effective_date" class="form-label">Effective Date</label>
                    <input type="text" name="effective_date" id="effective_date" class="form-control"
                           value="{{$clientPolicy->effective_date}}" readonly>
                </div>


                <div class="col-md-3 mt-2">
                    <label for="naic_code" class="form-label">NAIC Code</label>
                    <input type="text" name="naic_code" id="naic_code" class="form-control"
                           placeholder="Enter NAIC Code">
                </div>

                <div class="col-md-4 mt-2">
                    <label  class="form-label">Form No</label>
                    <input type="text" name="form_no"  class="form-control" placeholder="Enter Form No">
                </div>

                <div class="col-md-4 mt-2">
                    <label for="form_title" class="form-label">Form Title</label>
                    <input type="text" name="form_title" id="form_title" class="form-control"
                           placeholder="Enter Form Title">
                </div>

                <div class="col-md-4 mt-2">
                    <label for="agency_customer_id" class="form-label">Agency Customer ID</label>
                    <input type="text" name="agency_customer_id" id="agency_customer_id" class="form-control"
                           placeholder="Enter Agency Customer ID">
                </div>

                <div class="col-md-4 mt-2">
                    <label for="loc" class="form-label">LOC</label>
                    <input type="text" name="loc" id="loc" class="form-control" placeholder="Enter LOC">
                </div>
                <div class=" mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="card-title"></h5>
                                <h6 class="card-subtitle text-muted">Write Your Description In The Below Editor
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="clearfix">
                                    <div id="quill-toolbar">
											<span class="ql-formats">
												<select class="ql-font"></select>
												<select class="ql-size"></select>
											</span>
                                        <span class="ql-formats">
												<button class="ql-bold"></button>
												<button class="ql-italic"></button>
												<button class="ql-underline"></button>
												<button class="ql-strike"></button>
											</span>
                                        <span class="ql-formats">
												<select class="ql-color"></select>
												<select class="ql-background"></select>
											</span>
                                        <span class="ql-formats">
												<button class="ql-script" value="sub"></button>
												<button class="ql-script" value="super"></button>
											</span>
                                        <span class="ql-formats">
												<button class="ql-header" value="1"></button>
												<button class="ql-header" value="2"></button>
												<button class="ql-blockquote"></button>
												<button class="ql-code-block"></button>
											</span>
                                        <span class="ql-formats">
												<button class="ql-list" value="ordered"></button>
												<button class="ql-list" value="bullet"></button>
												<button class="ql-indent" value="-1"></button>
												<button class="ql-indent" value="+1"></button>
											</span>
                                        <span class="ql-formats">
												<button class="ql-direction" value="rtl"></button>
												<select class="ql-align"></select>
											</span>
                                        <span class="ql-formats">
												<button class="ql-link"></button>
												<button class="ql-image"></button>
												<button class="ql-video"></button>
											</span>
                                        <span class="ql-formats">
												<button class="ql-clean"></button>
											</span>
                                    </div>
                                    <input type="hidden" name="description" id="description">
                                    <div id="quill-editor"></div>
                                </div>
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
            </div>
        </div>

    </form>



@endsection
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Initialize Quill editor and assign it to a variable
            var quill = new Quill("#quill-editor", {
                modules: {
                    toolbar: "#quill-toolbar"
                },
                placeholder: "Write your description here...",
                theme: "snow"
            });

            // Event listener to update the hidden input with the HTML content
            quill.on("text-change", function () {
                document.getElementById("description").value = quill.root.innerHTML;
            });
        });
    </script>

@endpush
