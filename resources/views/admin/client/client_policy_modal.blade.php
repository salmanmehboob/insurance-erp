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
                                                    Language:</strong> {{ optional($policy->client->language)->name ?? 'N/A' }}
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
                                        <div class="col-md-6">
                                            <a href="{{ route('create-agent/broker-form', $policy->client->id) }}"
                                               class="text-primary w-100">Agent/Broker Form</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'agent_broker'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('create-additional/remarks-form', $policy->client->id) }}"
                                               class="text-primary w-100">Additional/Remarks Form</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'additional_remarks'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('create-evidence/of/property-form', $policy->client->id) }}"
                                               class="text-primary w-100">Evidence Of Property</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'evidenceOfProperty'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('create-invoice-for-payment-form', $policy->client->id) }}"
                                               class="text-primary w-100">Invoice For Payment</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'invoiceForPayment'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('create-property-loss-form', $policy->client->id) }}"
                                               class="text-primary w-100">Property Loss Notice</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'propertyLoss'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('create-property-insurance-form', $policy->client->id) }}"
                                               class="text-primary w-100">Certificate Of Property Insurance</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'propertyInsurance'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('create-liability-insurance-form', $policy->client->id) }}"
                                               class="text-primary w-100">Certificate Of Liability Insurance</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'liabilityInsurance'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('create-insurance-card-form', $policy->client->id) }}"
                                               class="text-primary w-100">INSURANCE IDENTIFICATION CARD</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceCard'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a href="{{ route('create-general-liability-form', $policy->client->id) }}"
                                               class="text-primary w-100">COMMERCIAL GENERAL LIABILITY SECTION</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'GeneralLiability'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="{{ route('create-insurance-application-form', $policy->client->id) }}"
                                               class="text-primary w-100">COMMERCIAL INSURANCE APPLICATION</a>
                                        </div>

                                        <div class="col-md-6">
                                            <a target="_blank" href="{{route('view.form',['type' => 'InsuranceApplication'])}}" class="btn btn-info w-100 mb-2">View Forms</a>
                                        </div>
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
@endpush
