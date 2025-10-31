@extends('admin.layouts.form')

@push('styles')
    <style>
        /* Base styles */
        body {
            font-family: 'Arial', sans-serif;
            font-size: 0.875rem;
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            background-color: #f0f0f0;
        }

        /* Container */
        .card-container,
        .warning-card {
            width: 100%;
            max-width: 900px;
            box-sizing: border-box;
            background-color: white;
            border: 1px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
            padding: 10px;
            margin-bottom: 20px;
        }

        .card-header {
            text-align: center;
            font-weight: bold;
            font-size: 1rem;
            margin: 20px;
        }

        /* Top grid layout */
        .top-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-bottom: 10px;
        }

        .grid-item {
            display: flex;
            flex-direction: column;
            padding: 10px;
        }

        .form-field-block {
            display: flex;
            flex-direction: column;
            margin-bottom: 8px;
        }

        .form-field-inline {
            display: flex;
            gap: 10px;
            margin-bottom: 8px;
        }

        label {
            font-size: 0.75rem;
            margin-bottom: 2px;
            font-weight: 600;
        }

        input[type="text"],
        input[type="date"] {
            border: 1px solid #ccc;
            padding: 4px 6px;
            font-size: 0.85rem;
            border-radius: 3px;
            width: 100%;
        }

        .radio-group {
            display: flex;
            gap: 15px;
            font-size: 0.75rem;
            align-items: center;
        }

        .agency-insured-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 10px;
            padding: 10px;
        }

        .section-header {
            font-weight: bold;
            font-size: 0.8rem;
            margin-bottom: 5px;
        }

        .notice {
            text-align: center;
            margin-top: 10px;
            font-size: 0.7rem;
        }

        /* Warning */
        .warning-title {
            text-align: center;
            font-weight: bold;
            font-size: 1.1rem;
            margin: 25px 0;
        }

        .warning-text {
            font-size: 0.9rem;
            margin-bottom: 10px;
        }

        .warning-list {
            padding-left: 18px;
            list-style: decimal;
        }

        .warning-list li {
            margin-bottom: 5px;
            font-size: 0.9rem;
        }

        .footer-note,
        .acord-footer {
            text-align: center;
            font-size: 0.7rem;
            margin-top: 10px;
        }

        .acord-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        /* Responsive */
        @media screen and (max-width: 1024px) {
            .top-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .agency-insured-grid {
                grid-template-columns: 1fr;
            }
        }

        @media screen and (max-width: 640px) {
            .top-grid {
                grid-template-columns: 1fr;
            }

            .form-field-inline {
                flex-direction: column;
            }
        }
    </style>
@endpush

@section('content')
    <div>
        <!-- Insurance Card -->
        <div class="card-container">
            <div class="card-header">INSURANCE IDENTIFICATION CARD</div>

            <!-- Top Grid -->
            <div class="top-grid">
                <!-- Column 1 -->
                <div class="grid-item">
                    <div class="form-field-block">
                        <label>COMPANY NUMBER</label>
                        {{$form->company_number}}
                    </div>
                    <div class="form-field-block">
                        <label>POLICY NUMBER</label>
                        {{$form->policy_number}}
                    </div>
                    <div class="form-field-inline">
                        <div class="form-field-block">
                            <label>YEAR</label>
                            {{$form->year}}
                        </div>
                        <div class="form-field-block">
                            <label>MAKE/MODEL</label>
                            {{$form->make_model}}
                        </div>
                    </div>
                </div>

                <!-- Column 2 -->
                <div class="grid-item">
                    <div class="form-field-block">
                        <label>COMPANY</label>
                        {{$form->company_name}}
                    </div>
                </div>

                <!-- Column 3 -->
                <div class="grid-item">
                    <div class="form-field-block">
                        <label>POLICY TYPE</label>
                        <div class="radio-group">
                            <label><input type="radio" name="type" value="commercial" {{$form->type == 'commercial' ? 'Checked disabled' : 'disabled'}} > Commercial</label>
                            <label><input type="radio" name="type" value="personal" {{$form->type == 'personal' ? 'Checked disabled' : 'disabled'}} > Personal</label>
                        </div>
                    </div>
                    <div class="form-field-inline" style="margin-top: 15px;">
                        <div class="form-field-block">
                            <label>EFFECTIVE DATE</label>
                            {{$form->effective_date}}
                        </div>
                        <div class="form-field-block">
                            <label>EXPIRATION DATE</label>
                            {{$form->expiration_date}}
                        </div>
                    </div>
                    <div class="form-field-block" style="margin-top: 10px;">
                        <label>VEHICLE IDENTIFICATION NUMBER</label>
                        {{$form->vehicle_number}}
                    </div>
                </div>
            </div>

            <!-- Agency & Insured -->
            <div class="agency-insured-grid">
                <!-- Agency Section -->
                <div class="section-left" style="grid-column: span 2;">
                    <div class="section-header">AGENCY/COMPANY ISSUING CARD</div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <!-- Left -->
                        <div>
                            <div class="form-field-block">
                                <label>Agency/Company Name</label>
                                {{$form->agency_name}}
                            </div>
                            <div class="form-field-block">
                                <label>Street Address</label>
                                {{$form->agency_address}}
                            </div>
                            <div class="form-field-block">
                                <label>City</label>
                                {{$form->agency_city}}
                            </div>
                        </div>
                        <!-- Right -->
                        <div>
                            <div style="display: flex; gap: 10px;">
                                <div class="form-field-block" style="flex:1;">
                                    <label>State</label>
                                    {{$form->agency_state}}
                                </div>
                                <div class="form-field-block" style="flex:1;">
                                    <label>Zip Code</label>
                                    {{$form->agency_zipcode}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Insured Section -->
                <div class="section-left" style="grid-column: span 2; margin-top: 15px;">
                    <div class="section-header">INSURED</div>
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 10px;">
                        <!-- Left -->
                        <div>
                            <div class="form-field-block">
                                <label>Insured Name</label>
                                {{$form->insured_name}}
                            </div>
                            <div class="form-field-block">
                                <label>Street Address</label>
                                {{$form->insured_address}}
                            </div>
                            <div class="form-field-block">
                                <label>City</label>
                                {{$form->insured_city}}
                            </div>
                        </div>
                        <!-- Right -->
                        <div>
                            <div style="display: flex; gap: 10px;">
                                <div class="form-field-block" style="flex:1;">
                                    <label>State</label>
                                    {{$form->insured_state}}
                                </div>
                                <div class="form-field-block" style="flex:1;">
                                    <label>Zip Code</label>
                                    {{$form->insured_zipcode}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="notice">SEE IMPORTANT NOTICE ON REVERSE SIDE</div>
        </div>

        <!-- Warning -->
        <div class="warning-card">
            <div class="warning-title">THIS CARD MUST BE KEPT IN THE INSURED VEHICLE AND PRESENTED UPON DEMAND</div>
            <div class="warning-text">
                **IN CASE OF ACCIDENT:** Report all accidents to your Agent/Company as soon as possible. Obtain the
                following information:
                <ul class="warning-list">
                    <li>Name and address of each driver, passenger and witness.</li>
                    <li>Name of Insurance Company and policy number for each vehicle involved.</li>
                </ul>
            </div>
            <div class="footer-note">
                THE FRONT OF THIS DOCUMENT CONTAINS AN ARTIFICIAL WATERMARK - HOLD AT AN ANGLE TO VIEW
            </div>
            <div class="acord-footer">
                <span>ACORD 50 WM (2007/03)</span>
                <span>© ACORD CORPORATION 1993-2007. All rights reserved.</span>
            </div>
        </div>
    </div>
@endsection