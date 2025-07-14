<!-- Bootstrap Modal for Each Policy -->
<div class="modal fade" id="policyModal-{{ $policy->id }}" tabindex="-1"
     aria-labelledby="policyModalLabel-{{ $policy->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="policyModalLabel-{{ $policy->id }}">Policy Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="row">
                    <!-- Sidebar Navigation -->
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-summary-tab-{{ $policy->id }}" data-bs-toggle="pill"
                               href="#v-pills-summary-{{ $policy->id }}" role="tab"
                               aria-controls="v-pills-summary-{{ $policy->id }}" aria-selected="true">Summary</a>

                            <a class="nav-link" href="{{ route('edit-client', $policy->client->id) }}" target="_blank">Edit
                                Details</a>

                            <!-- Dropdown for Policy Accounting -->
                            <div class="nav-item dropdown">
                                <button class="nav-link dropdown-toggle"
                                        id="v-pills-Policy-Accounting-tab-{{ $policy->id }}" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                    Policy Accounting
                                </button>
                                <ul class="dropdown-menu"
                                    aria-labelledby="v-pills-Policy-Accounting-tab-{{ $policy->id }}">
                                    <li>
                                        <button class="dropdown-item"
                                                onclick="window.open('{{ route('add-payment', ['clientID' => $policy->client->id]) }}', '_blank')"
                                                type="button">Receive Payment
                                        </button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item" type="button">Payment History</button>
                                    </li>
                                    <li>
                                        <button class="dropdown-item"
                                                onclick="window.open('{{ route('add-payment-check') }}', '_blank')"
                                                type="button">Write a Check
                                        </button>
                                    </li>
                                </ul>
                            </div>

                            <a class="nav-link" id="v-pills-settings-tab-{{ $policy->id }}" data-bs-toggle="pill"
                               href="#v-pills-settings-{{ $policy->id }}" role="tab"
                               aria-controls="v-pills-settings-{{ $policy->id }}" aria-selected="false">Settings</a>
                            <a class="nav-link" id="v-pills-notes-tab-{{ $policy->id }}" data-bs-toggle="pill"
                               href="#v-pills-notes-{{ $policy->id }}" role="tab"
                               aria-controls="v-pills-notes-{{ $policy->id }}" aria-selected="false">Notes</a>

                            <a class="nav-link" id="v-pills-forms-tab-{{ $policy->id }}" data-bs-toggle="pill"
                               href="#v-pills-forms-{{ $policy->id }}" role="tab"
                               aria-controls="v-pills-forms-{{ $policy->id }}" aria-selected="false"> Forms &
                                Letters</a>

                            <a class="nav-link" id="v-pills-attachment-tab-{{ $policy->id }}" data-bs-toggle="pill"
                               href="#v-pills-attachment-{{ $policy->id }}" role="tab"
                               aria-controls="v-pills-attachment-{{ $policy->id }}" aria-selected="false"> Scan Documents</a>

                        </div>
                    </div>

                    <!-- Content Section -->
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent-{{ $policy->id }}">
                            <!-- Summary Tab -->
                            <div class="tab-pane fade show active text-black" id="v-pills-summary-{{ $policy->id }}"
                                 role="tabpanel" aria-labelledby="v-pills-summary-tab-{{ $policy->id }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="mb-3">
                                                <strong>Name:</strong> {{ optional($policy->client)->applicant_name ?? 'N/A' }}
                                            </h3>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><strong>Physical
                                                    Address:</strong> {{ optional($policy->client)->address ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <p><strong>Home
                                                    Phone:</strong> {{ optional($policy->client)->home_phone_no ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Work
                                                    Phone:</strong> {{ optional($policy->client)->work_phone_no ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="col-md-4">
                                            <p><strong>Cell
                                                    Phone:</strong> {{ optional($policy->client)->cell_phone_no ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><strong>Email:</strong> <a
                                                    href="mailto:{{ optional($policy->client)->email }}">{{ optional($policy->client)->email ?? 'N/A' }}</a>
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Effective Date:</strong> {{ $policy->effective_date }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Expiration Date:</strong> {{ $policy->expiration_date }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Policy
                                                    Status:</strong> {{ optional($policy->policyStatus)->name ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>Company:</strong> {{ optional($policy->insuranceCompany)->name ?? 'No Company Selected' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Agent:</strong> {{ optional($policy->agent)->name ?? 'N/A' }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Policy Number:</strong> {{ $policy->policy_number }}</p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>Policy
                                                    Type:</strong> {{ optional($policy->client->policyType)->name ?? 'N/A' }}
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <p>
                                                <strong>Coverage:</strong> {{ optional($policy->coverage)->name ?? 'Property' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <p><strong>File Number:</strong> {{ $policy->file_number }}</p>
                                        </div>
                                        <div class="col-md-6">
                                            <p><strong>Location:</strong> {{ $policy->agency->agency_name ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <p><strong>Primary
                                                    Language:</strong> {{ $policy->client->language->name ?? 'N/A' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Notes Tab -->
                            <div class="tab-pane fade text-black" id="v-pills-notes-{{ $policy->id }}" role="tabpanel"
                                 aria-labelledby="v-pills-notes-tab-{{ $policy->id }}">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-10">
                                            <p>{{$policy->client->note->notes}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Forms & Letter Tab -->
                            <div class="tab-pane fade text-black" id="v-pills-forms-{{ $policy->id }}" role="tabpanel"
                                 aria-labelledby="v-pills-forms-tab-{{ $policy->id }}">
                                <div class="container py-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <h1 class="mb-3">Forms</h1>
                                        </div>
                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-agent/broker-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">Create Agent/Broker Form</a>  --}}

                                               <a href="{{ route('show-upload-form', ['type' => 'agent_broker', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">AGENT/BROKER FORM</a>
                                        </div>
                                        <div class="col-md-4">
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'agent_broker', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>
                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-additional/remarks-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">Create Additional/Remarks Form</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'additional_remarks', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">ADDITIONAL/REMARKS FORM</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'additional_remarks'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'additional_remarks', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-evidence/of/property-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">Evidence Of Property</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'evidence_of_property', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">EVIDENCE OF PROPERTY</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'evidenceOfProperty'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'evidence_of_property', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-invoice-for-payment-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">Invoice For Payment</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'invoice_for_payment', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">INVOICE FOR PAYMENT</a>
                                        </div>
                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'invoiceForPayment'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'invoice_for_payment', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-property-loss-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">Property Loss Notice</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'property_loss', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">PROPERTY LOSS NOTICE</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'propertyLoss'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'property_loss', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-property-insurance-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">Certificate Of Property Insurance</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'property_insurance', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">CERTIFICATE OF PROPERTY INSURANCE</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'propertyInsurance'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'property_insurance', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-liability-insurance-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">Certificate Of Liability Insurance</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'liability_insurance', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">CERTIFICATE OF LIABILITY INSURANCE</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'liabilityInsurance'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'liability_insurance', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-insurance-card-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">INSURANCE IDENTIFICATION CARD</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'insurance_card', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">INSURANCE IDENTIFICATION CARD</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceCard'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'insurance_card', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-general-liability-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">COMMERCIAL GENERAL LIABILITY SECTION</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'general_liability', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">COMMERCIAL GENERAL LIABILITY SECTION</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'GeneralLiability'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'general_liability', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>
                                        <div class="col-md-8">
{{--                                              <a href="{{ route('create-insurance-application-form', $policy->client->id) }}"--}}
{{--                                               class="text-primary w-100">COMMERCIAL INSURANCE APPLICATION</a> --}}
                                               <a href="{{ route('show-upload-form', ['type' => 'insurance_application', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">COMMERCIAL INSURANCE APPLICATION</a>
                                        </div>

                                        <div class="col-md-4">
{{--                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceApplication'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'insurance_application', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
                                            {{--                                              <a href="{{ route('create-insurance-application-form', $policy->client->id) }}"--}}
                                            {{--                                               class="text-primary w-100">COMMERCIAL INSURANCE APPLICATION</a> --}}
                                            <a href="{{ route('show-upload-form', ['type' => 'dwelling_fire', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">DWELLING FIRE APPLICATION</a>
                                        </div>

                                        <div class="col-md-4">
                                            {{--                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceApplication'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'dwelling_fire', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
                                            {{--                                              <a href="{{ route('create-insurance-application-form', $policy->client->id) }}"--}}
                                            {{--                                               class="text-primary w-100">COMMERCIAL INSURANCE APPLICATION</a> --}}
                                            <a href="{{ route('show-upload-form', ['type' => 'installation_builders', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">INSTALLATION BUILDERS RISK SECTION</a>
                                        </div>

                                        <div class="col-md-4">
                                            {{--                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceApplication'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'installation_builders', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
                                            {{--                                              <a href="{{ route('create-insurance-application-form', $policy->client->id) }}"--}}
                                            {{--                                               class="text-primary w-100">COMMERCIAL INSURANCE APPLICATION</a> --}}
                                            <a href="{{ route('show-upload-form', ['type' => 'property_section', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">PROPERTY SECTION</a>
                                        </div>

                                        <div class="col-md-4">
                                            {{--                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceApplication'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'property_section', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
                                            {{--                                              <a href="{{ route('create-insurance-application-form', $policy->client->id) }}"--}}
                                            {{--                                               class="text-primary w-100">COMMERCIAL INSURANCE APPLICATION</a> --}}
                                            <a href="{{ route('show-upload-form', ['type' => 'umbrella_section', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">UMBRELLA EXCESS SECTION</a>
                                        </div>

                                        <div class="col-md-4">
                                            {{--                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceApplication'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'umbrella_section', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>

                                        <div class="col-md-8">
                                            {{--                                              <a href="{{ route('create-insurance-application-form', $policy->client->id) }}"--}}
                                            {{--                                               class="text-primary w-100">COMMERCIAL INSURANCE APPLICATION</a> --}}
                                            <a href="{{ route('show-upload-form', ['type' => 'worker_compensation', 'client_id' => $policy->client->id]) }}"
                                               class="text-primary w-100 text-uppercase">WORKERS COMPENSATION APPLICATION</a>
                                        </div>

                                        <div class="col-md-4">
                                            {{--                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceApplication'])}}" class="btn btn-info w-100 mb-2">View Forms</a> --}}
                                            <a target="_blank" href="{{ route('view-uploaded-form', ['type' => 'worker_compensation', 'client_id' => $policy->client->id]) }}" class="btn btn-info btn-sm w-100 mb-2 text-uppercase">
                                                <i class="fa fa-eye"></i> View
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Attachments Tab -->
                            <div class="tab-pane fade text-black" id="v-pills-attachment-{{ $policy->id }}" role="tabpanel"
                                 aria-labelledby="v-pills-attachment-tab-{{ $policy->id }}">
                                <div class="container py-3">
                                    <div class="row">
                                        <div class="col-12">
                                            <h2 >Attachment</h2>
                                        </div>

                                        @if($policy->client && $policy->client->attachments->count())
                                            <div class="mt-3">

                                                <ul class="list-group">
                                                    @foreach($policy->client->attachments as $attachment)
                                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                                            {{ $attachment->attachment_name }}
                                                            <a href="{{ asset('storage/' . $attachment->path) }}" target="_blank" class="btn btn-sm btn-primary">
                                                                View
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @else
                                            <p class="text-muted">No attachments uploaded.</p>
                                        @endif

                                        <div id="attachments-container"></div>

                                        <!-- Hidden Template -->
                                        <template id="attachment-template">
                                            <div class="attachment-row mt-5">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="attachment_name">Attachment Name</label>
                                                            <input type="text" name="attachment_name[]" class="form-control" placeholder="Enter attachment name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="form-group">
                                                            <label for="attachment_file">Attachment File</label>
                                                            <input type="file" name="attachment_file[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-danger mt-3 remove-row"><i class="fa fa-trash-alt"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </template>

                                        <div class="col-md-6 mt-5">
                                            <button type="button" class="btn btn-primary" id="add-attachment">Add Attachment
                                            </button>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <button type="button" class="btn btn-success" id="upload-attachments">
                                                Upload Attachments
                                            </button>
                                        </div>

                                        <div class="col-md-12 mt-3" id="upload-status"></div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function () {
            // When the Policy-Accounting tab is clicked
            $('#v-pills-Policy-Accounting-tab').on('click', function () {
                // Insert level 2 heading in the corresponding tab content
                $('#v-pills-Policy-Accounting').html('<h2>Policy-Accounting</h2><p>Here is some content for Policy-Accounting...</p>');
            });
        });
    </script>

    <script>
        $(document).ready(function () {

            // Add new attachment row
            $('#add-attachment').click(function () {
                let template = document.getElementById('attachment-template').content.cloneNode(true);
                let newAttachment = $(template); // Convert the cloned template into a jQuery object
                $('#attachments-container').append(newAttachment); // Append to container
                newAttachment.hide().slideDown(); // Hide it initially and then slide it down
            });


            // Remove attachment row
            $(document).on('click', '.remove-row', function () {
                let deleteElement = $(this).closest('.attachment-row'); // Store the row element to delete

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        deleteElement.slideUp(function () {
                            $(this).remove(); // Remove the element after animation completes
                        });

                        // // Show a success message
                        // Swal.fire(
                        //     'Deleted!',
                        //     'Your attachment has been deleted.',
                        //     'success'
                        // );
                    }
                });
            });

            // Upload all attachments via AJAX
            $('#upload-attachments').click(function () {
                let formData = new FormData();
                let hasFile = false;

                // Collect each attachment row
                $('.attachment-row').each(function (index) {
                    let name = $(this).find('input[name="attachment_name[]"]').val();
                    let fileInput = $(this).find('input[name="attachment_file[]"]')[0];
                    let file = fileInput.files[0];

                    if (!name || !file) return; // Skip empty rows

                    formData.append(`attachments[${index}][attachment_name]`, name);
                    formData.append(`attachments[${index}][attachment_file]`, file);
                    hasFile = true;
                });

                if (!hasFile) {
                    $('#upload-status').html('<span class="text-danger">Please add at least one valid attachment.</span>');
                    return;
                }

                // Add client_id (if needed)
                formData.append('client_id', '{{ $policy->id }}');

                $.ajax({
                    url: "{{ route('client-attachments.store') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    beforeSend: function () {
                        $('#upload-status').html('<span class="text-info">Uploading attachments...</span>');
                    },
                    success: function (response) {
                        if (response.success) {
                            $('#upload-status').html('<span class="text-success">' + response.message + '</span>');
                            $('#attachments-container').empty(); // Clear form
                            location.reload();
                        } else {
                            $('#upload-status').html('<span class="text-danger">Upload failed.</span>');
                        }
                    },
                    error: function (xhr) {
                        let message = xhr.responseJSON?.message || 'Upload failed';
                        $('#upload-status').html('<span class="text-danger">' + message + '</span>');
                    }
                });
            });

        });


    </script>
@endpush
