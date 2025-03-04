<!-- Bootstrap Modal for Each Policy -->
<div class="modal fade" id="policyModal-{{ $policy->id }}" tabindex="-1" aria-labelledby="policyModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="policyModalLabel">Policy Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a  class="nav-link active fa-solid fa fa-user" id="v-pills-summary-tab" data-toggle="pill" href="#v-pills-summary" role="tab" aria-controls="v-pills-summary" aria-selected="true">Summary</a>
                            <a class="nav-link" id="v-pills-Edit-Details-tab" data-toggle="pill" href="{{route('edit-client',$policy->client->id)}}" target="_blank"  role="tab" aria-controls="v-pills-Edit-Details" aria-selected="false">Edit-Details</a>
                            <div class="nav-item dropdown">
                                <button class="nav-link dropdown-toggle" id="v-pills-Policy-Accounting-tab" data-bs-toggle="dropdown" aria-expanded="false">
                                    Policy-Accounting
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="v-pills-Policy-Accounting-tab">
                                    <li><button class="dropdown-item" onclick="window.open('{{ route('add-payment') }}', '_blank')">Receive Payment</button></li>
                                    <li><button class="dropdown-item" data-bs-toggle="pill" data-bs-target="#v-pills-payment-history" type="button">Payment History</button></li>
                                    <li><button onclick="window.location.href='{{ route('add-payment-check') }}'" class="dropdown-item" data-bs-toggle="pill" data-bs-target="#v-pills-write-a-check" type="button">Write a Check</button></li>
                                </ul>
                            </div>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        </div>

                    </div>
                    <div class="col-md-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active text-black" id="v-pills-summary" role="tabpanel" aria-labelledby="v-pills-summary-tab ">

                                    <h3 style="margin-bottom: 10px;"><strong>Name:</strong> {{ optional($policy->client)->applicant_name ?? 'N/A' }}</h3>

                                    <p><strong>Physical Address:</strong> {{ optional($policy->client)->address ?? 'N/A' }}</p>
                                <div style="display: flex; justify-content: space-between;">
                                    <p><strong>Home Phone:</strong> {{ optional($policy->client)->home_phone_no ?? 'N/A' }}</p>
                                    <p><strong>Work Phone:</strong> {{ optional($policy->client)->work_phone_no ?? 'N/A' }}</p>
                                    <p><strong>Cell Phone:</strong> {{ optional($policy->client)->cell_phone_no ?? 'N/A' }}</p>

                                </div>

                                <p><strong>Email:</strong> <a href="mailto:{{ optional($policy->client)->email }}">{{ optional($policy->client)->email ?? 'N/A' }}</a></p>

                                <div style="display: flex; justify-content: space-between">
                                    <p><strong>Effective Date:</strong> {{ $policy->effective_date }}</p>
                                    <p><strong>Expiration Date:</strong> {{ $policy->expiration_date }}</p>
                                </div>

                                    <p><strong>Policy Status:</strong> {{ optional($policy->policyStatus)->name ?? 'N/A' }}</p>
                                    <p><strong>Company:</strong> {{ optional($policy->insuranceCompany)->name ?? 'No Company Selected' }}</p>

                                    <p><strong>Agent:</strong> {{ optional($policy->agent)->name ?? 'N/A' }}</p>

                                    <p><strong>Policy Number:</strong> {{ $policy->policy_number }}</p>
                                    <p><strong>Policy Type:</strong> {{ optional($policy->client->policyType)->name ?? 'N/A' }}</p>
                                    <p><strong>Coverage:</strong> {{ optional($policy->coverage)->name ?? 'Property' }}</p>

                                    <p><strong>File Number:</strong> {{ $policy->file_number }}</p>
                                    <p><strong>Location:</strong> {{ $policy->agency->agency_name ?? 'N/A' }}</p>

                                    <p><strong>Primary Language:</strong> {{ $policy->client->language->name ?? 'N/A' }}</p>


                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">...</div>
                            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div>
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
    $(document).ready(function() {
    // When the Policy-Accounting tab is clicked
    $('#v-pills-Policy-Accounting-tab').on('click', function() {
    // Insert level 2 heading in the corresponding tab content
    $('#v-pills-Policy-Accounting').html('<h2>Policy-Accounting</h2><p>Here is some content for Policy-Accounting...</p>');
    });
    });
    </script>
    @endpush
