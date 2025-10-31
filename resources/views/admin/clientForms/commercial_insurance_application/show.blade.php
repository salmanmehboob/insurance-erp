@extends('admin.layouts.form')
@push('styles')
    <style>
        .acord-logo {
            height: 50pt !important;
            vertical-align: middle;
            margin-right: 5pt;
        }

        /* Base styles for screen viewing and print intent */
        body {
            font-family: 'Arial', sans-serif;
            /* Common form font */
            font-size: 9pt;
            /* Base font size, uses points for print accuracy */
            color: #000;
            margin: 0;
            padding: 0;
            display: flex;
            /* For centering the form on screen */
            justify-content: center;
            background-color: #f0f0f0;
            text-transform: uppercase;
            /* Light background for screen view */
        }

        input[type="checkbox"] {
            vertical-align: middle;
        }

        .form-container {
            width: 8.5in;
            /* Standard US Letter width */
            min-height: 11in;
            /* Standard US Letter height */
            padding: 0.5in;
            /* Consistent margin inside the form content */
            box-sizing: border-box;
            /* Padding included in width/height */
            background-color: white;
            border: 1px solid #ccc;
            /* Optional: visual boundary on screen */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for screen view */
        }

        /* Reusable Form Field Line (Label + Underline Input) */
        .form-field-line {
            display: flex;
            /* align-items: flex-end; Aligns label baseline with input line */
            margin-bottom: 0.08in;
            /* Vertical spacing between form lines */
            line-height: 1.0;
            /* Tighter line height for labels */
        }

        .form-field-line label {
            /* white-space: nowrap; Prevent label from wrapping */
            font-size: 8pt;
            /* Label font size */
            color: #333;
            /* flex-shrink: 0; Prevent label from shrinking */
            margin-right: 4pt;
            /* Space between label and input */
            padding-bottom: 0.5pt;
            /* Fine-tune label baseline alignment */
        }


        .address-line-item.city input {
            width: 80pt;
            flex-grow: 0;
        }

        .address-line-item.state input {
            width: 30pt;
            flex-grow: 0;
        }

        .address-line-item.zip input {
            width: 45pt;
            flex-grow: 0;
        }


        /* Header Section Styling */
        .header-title {
            font-size: 14pt;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        .acord-logo {
            height: 18pt;
            /* Height based on typical logo size */
            vertical-align: middle;
            margin-right: 5pt;
        }

        /* Smallest font for the date label */
        .date-field-label {
            font-size: 6.5pt;
        }

        /* Date input needs to be right-aligned within its fixed width */
        .date-input {
            width: 70pt;
            border: 1px solid black;
            /* Fixed width for the date input field */
        }

        table {
            border-collapse: collapse;
            width: 100%;
            /* margin-top: 15pt; Space before table */
            /* margin-bottom: 15pt; Space after table */
        }

        table th,
        table td {
            border: 0.5pt solid black;
            /* Fine border for cells */
            padding: 2pt 3pt;
            /* Tight padding inside cells */
            text-align: left;
            vertical-align: top;
            /* Center content vertically */
            font-size: 7pt;
            line-height: 1.2;
        }

        table th {
            font-weight: normal;
            /* ACORD headers are usually not bold */
            text-align: center;
            background-color: #f8f8f8;
            /* Very subtle header background */
        }



        /* Footer Section */
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 25pt;
            /* Space from content above */
            /* padding-top: 5pt; */
            border-top: 0.5pt solid #ccc;
            font-size: 6pt;
            /* color: #555; */
        }

        .footer-copyright {
            /* flex-grow: 1; */
            text-align: center;
        }

        .checkboxtd span {
            vertical-align: super;
        }

        .checkboxtd td {
            border: 0;
        }

        .statusofTrans td {
            border: 0;
            font-size: 9px;
        }

        /* PRINT MEDIA QUERIES - CRITICAL for accurate printing */
        @media print {
            .page-break {
                page-break-after: always;

            }

            body {
                background-color: white;
                /* No background on print */
                margin: 0;
                padding: 0;
                display: block;
                /* Remove flex on print to avoid centering issues */
                -webkit-print-color-adjust: exact;
                /* Crucial for background colors/borders */
                print-color-adjust: exact;
                orphans: 3;
                /* Prevent single lines at page breaks */
                widows: 3;
                /* Prevent single lines at page breaks */
            }

            .form-container {
                border: none;
                /* Remove screen-only border on print */
                box-shadow: none;
                /* Remove screen-only shadow on print */
                margin: 0;
                /* Remove auto margins on print */
                padding: 0.5in;
                /* Keep internal padding as form margin */
                width: 8.5in;
                min-height: 11in;
            }

            /* Ensure all inputs and text align perfectly for print */
            input[type="text"] {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                vertical-align: baseline;
                /* Align text exactly on the baseline */
                padding-bottom: 0;
                /* Remove any padding that might push text off line */
                height: auto;
                /* Let content determine height, but maintain min-height */
                min-height: 11pt;
                /* Maintain minimum line height for input areas */
            }

            .form-field-line label,
            .address-line-item label,
            .signature-address-line-item label {
                padding-bottom: 0;
                /* Ensure labels are tightly aligned */
            }

            .signature-line .line-label {
                bottom: -7pt;
                /* Fine-tune label position below signature lines for print */
            }

            .statement-text input {
                height: auto;
                min-height: 12pt;
            }

            /* Adjust grid gaps if they cause issues on print, sometimes unitless works best */
            .grid {
                /* You might need to override Tailwind's responsive gaps if they break print layout */
                /* gap: 0; will remove all gaps, then re-add specific ones if needed */
                /* For example: */
                /* column-gap: 0.5in !important; */
                /* row-gap: 0.1in !important; */
            }

            .grid>div {
                padding: 0;
                /* Ensure no unwanted padding from Tailwind on grid cells */
            }

            /* Prevent elements from being split across page breaks where possible */
            .signature-group,
            .statement-text,
            table {
                page-break-inside: avoid;
            }

            table thead {
                display: table-header-group;
                /* Ensure table headers repeat on new page */
            }

            table tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }

        .form-table td,
        .form-table th {
            border: 1px solid black;
            padding: 2px 5px;
            vertical-align: top;
            font-size: 7pt;
            box-sizing: border-box;
        }

        /* Specific cell and field styles */
        .interest-cell {
            width: 25%;
        }

        .interest-cell .title {
            font-weight: bold;
            text-transform: uppercase;
        }

        .interest-options {
            display: flex;
            flex-direction: column;
            gap: 5px;
            margin-top: 5px;
            font-size: 7pt;
        }

        .interest-options .checkbox-item {
            display: flex;
            align-items: center;
        }

        .interest-options .checkbox-item input {
            margin-right: 3px;
        }

        .field-row {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }

        .field-row .label {
            white-space: nowrap;
            margin-right: 5px;
        }

        .field-row input[type="text"] {
            flex-grow: 1;
            border: none;
            border-bottom: 1px solid black;
            font-size: 8pt;
            height: 12px;
            background: transparent;
        }

        .reference-field {
            display: flex;
            align-items: center;
            padding: 5px;
            border-top: 1px solid black;
        }

        .reference-field .label {
            font-weight: bold;
            white-space: nowrap;
            margin-right: 5px;
        }

        .reference-field input {
            flex-grow: 1;
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
            font-size: 8pt;
        }

        .nested-table {
            width: 100%;
            border-collapse: collapse;
        }

        .nested-table td {
            border: 1px solid black;
            padding: 2px;
            font-size: 7pt;
        }

        .inner-deductible {
            margin-top: 10px;
        }

        .inner-deductible td {
            border: 0;
            font-size: 10px;
        }

        .sixcoltab td {
            border: 0;
        }

        .applinfotable td {
            border: 0;
        }
    </style>
@endpush
@section('content')
    <div class="form-container">
        <div class="flex justify-between items-end">
            <div class="text-xs font-bold mr-4 flex-shrink-0" style="font-size: 9pt;">
                <img src="{{ asset('backend/img/acord-logo.png') }}" alt="ACORD Logo"
                    class="acord-logo inline-block align-middle">
            </div>
            <div class="flex-grow header-title">
                <span style="font-size: 16px;">COMMERCIAL INSURANCE APPLICATION</span><br>
                <span style="font-size: 12px;">APPLICANT INFORMATION SECTION</span>

            </div>
            <div class="text-right flex-shrink-0 ml-4" style="border:1px solid #000; padding: 1px 5px;">
                <div class="" style="text-align: center;">
                    <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                    <p>{{ $form->application_date }}</p>
                </div>
            </div>
        </div>
        <table class="">
            <tr>
                <td style="border: 0; width: 50%; padding: 0;">
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td rowspan="2" style="border-bottom: 0;">
                                    <p style="margin-bottom: 10px;">Agency</p>
                                    <p style="margin-bottom: 5px;">{{ $form->agency_name }}</p>
                                    <p style="margin-bottom: 5px;">{{ $form->agency_address }}
                                    </p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="border-top: 0; border-bottom: 0; border-right: 0;">
                                    {{ $form->agency_city }}
                                </td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;">{{ $form->agency_state }}</td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;">{{ $form->agency_zipcode }}
                                </td>
                            </tr>

                        </table>

                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td colspan="2">Contact : {{ $form->agency_contact_name }}</td>
                            </tr>
                            <tr>

                                <td colspan="2">Phone : {{ $form->agency_contact_phone_no }}</td>
                            </tr>
                            <tr>

                                <td colspan="2">Fax : {{ $form->agency_contact_fax_no }}
                                </td>
                            </tr>
                            <tr>


                                <td colspan="2">Email : {{ $form->agency_contact_email }}
                                </td>
                            </tr>

                            <tr>
                                <td>CODE : {{ $form->agency_code }}</td>
                                <td>SUBCODE : {{ $form->agency_sub_code }}</td>
                            </tr>
                            <tr>

                                <td colspan="2">AGENCY CUSTOMER ID : {{ $form->agency_customer_id }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="border: 0; width: 50%;  padding: 0;">
                    <table>
                        <tr>
                            <td>CARRIER <br> {{ $form->carrier }}</td>
                            <td>NAIC CODE <br> {{ $form->naic_code }}</td>
                        </tr>
                        <tr>
                            <td>COMPANY POLICY OR PROGRAM NAME <br> {{ $form->program_name }}</td>
                            <td>PROGRAM CODE <br> {{ $form->program_code }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">POLICY NUMBER <br> {{ $form->policy_number }}</td>
                        </tr>
                        <tr>
                            <td>UNDERWRITER <br> {{ $form->under_writer }}</td>
                            <td>UNDERWRITER OFFICE <br> {{ $form->under_writer_office }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="padding: 0;">
                                <table class="statusofTrans">
                                    <tr>
                                        <td>STATUS OF TRANSACTION</td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"
                                                {{ $form->status_quote == 1 ? 'checked disabled' : 'disabled' }}>
                                            QUOTE</td>
                                        <td><input type="checkbox"
                                                {{ $form->status_issue_policy == 1 ? 'checked disabled' : 'disabled' }}>
                                            ISSUE
                                            POLICY</td>
                                        <td><input type="checkbox"
                                                {{ $form->status_renew == 1 ? 'checked disabled' : 'disabled' }}>
                                            RENEW</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><input type="checkbox"
                                                {{ $form->status_bound == 1 ? 'checked disabled' : 'disabled' }}>
                                            BOUND (Give Date and/or Attach Copy):
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"
                                                {{ $form->status_change == 1 ? 'checked disabled' : 'disabled' }}> CHANGE
                                        </td>
                                        <td> Date </td>
                                        <td> Time</td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox"
                                                {{ $form->status_cancel == 1 ? 'checked disabled' : 'disabled' }}> Cancel
                                        </td>
                                        <td>{{ $form->status_date }}</td>
                                        <td>
                                            {{ $form->status_time }} <br><br>
                                            <input type="radio"
                                                {{ $form->status_time_type == 'AM' ? 'checked disabled' : 'disabled' }}> AM
                                            <input type="radio"
                                                {{ $form->status_time_type == 'PM' ? 'checked disabled' : 'disabled' }}> PM
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Line of Business </div>
        <table>
            <tr>
                <td>INDICATE LINES OF BUSINESS </td>
                <td colspan="2">PREMIUM</td>
                <td colspan="2">PREMIUM</td>
                <td>PREMIUM</td>
            </tr>
            <tr>
                <td><input type="checkbox" {{ $form->boiler_machinery == 1 ? 'checked disabled' : 'disabled' }}> BOILER &
                    MACHINERY</td>
                <td style="width: 7%;">$ {{ $form->boiler_machinery_premium_one }} </td>
                <td><input type="checkbox"
                        {{ $form->boiler_machinery_cyber_privacy == 1 ? 'checked disabled' : 'disabled' }}>
                    CYBER AND PRIVACY
                </td>
                <td>$ {{ $form->boiler_machinery_premium_two }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->boiler_machinery_yacht == 1 ? 'checked disabled' : 'disabled' }}> YACHT
                </td>
                <td style="width: 15%;">$ {{ $form->boiler_machinery_premium_three }}</td>
            </tr>
            <tr>
                <td style="width: 20%;"><input type="checkbox"
                        {{ $form->business_auto == 1 ? 'checked disabled' : 'disabled' }}>
                    BUSINESS AUTO
                </td>
                <td style="width: 15%;">$ {{ $form->business_auto_premium_one }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_auto_fiduciary == 1 ? 'checked disabled' : 'disabled' }}>
                    FIDUCIARY
                    LIABILITY</td>
                <td style="width: 15%;">$ {{ $form->business_auto_premium_two }}</td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_auto_yacht_one == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->business_auto_yacht_one_field }}
                </td>
                <td style="width: 15%;">$ {{ $form->business_auto_premium_three }}</td>

            </tr>
            <tr>
                <td style="width: 20%;"><input type="checkbox"
                        {{ $form->business_owner == 1 ? 'checked disabled' : 'disabled' }}>
                    BUSINESS OWNERS
                </td>
                <td style="width: 15%;">$ {{ $form->business_owner_premium_one }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_owner_garage == 1 ? 'checked disabled' : 'disabled' }}> GARAGE
                    AND
                    DEALERS</td>
                <td style="width: 15%;">$ {{ $form->business_owner_premium_two }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_owner_yacht_two == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->business_owner_yacht_two_field }}
                </td>
                <td style="width: 15%;">$ {{ $form->business_owner_premium_three }}</td>

            </tr>
            <tr>
                <td style="width: 20%;"><input type="checkbox"
                        {{ $form->business_commercial_gl == 1 ? 'checked disabled' : 'disabled' }}>
                    COMMERCIAL GENERAL LIABILITY </td>
                <td style="width: 15%;">$ {{ $form->business_commercial_gl_premium_one }}</td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_commercial_gl_liquor == 1 ? 'checked disabled' : 'disabled' }}>
                    LIQUOR
                    LIABILITY</td>
                <td style="width: 15%;">$ {{ $form->business_commercial_gl_premium_two }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_commercial_gl_yacht_three == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->business_commercial_gl_yacht_three_field }}
                </td>
                <td style="width: 15%;">$ {{ $form->business_commercial_gl_premium_three }}</td>

            </tr>
            <tr>
                <td style="width: 20%;"><input type="checkbox"
                        {{ $form->business_inland == 1 ? 'checked disabled' : 'disabled' }}> COMMERCIAL
                    INLAND MARINEY</td>
                <td style="width: 15%;">$ {{ $form->business_inland_premium_one }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_inland_motor == 1 ? 'checked disabled' : 'disabled' }}> MOTOR
                    CARRIER
                </td>
                <td style="width: 15%;">$ {{ $form->business_inland_premium_two }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->business_inland_yacht_four == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->business_inland_yacht_four_field }}
                </td>
                <td style="width: 15%;">$ {{ $form->business_inland_premium_three }}</td>

            </tr>
            <tr>
                <td style="width: 20%;"><input type="checkbox"
                        {{ $form->commercial_property == 1 ? 'checked disabled' : 'disabled' }}> COMMERCIAL
                    PROPERTY</td>
                <td style="width: 15%;">$ {{ $form->commercial_property_premium_one }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->commercial_property_trucker == 1 ? 'checked disabled' : 'disabled' }}>
                    TRUCKERS</td>
                <td style="width: 15%;">$ {{ $form->commercial_property_premium_two }}
                </td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->commercial_property_yacht_five == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->commercial_property_yacht_five_field }}
                </td>
                <td style="width: 15%;">$ {{ $form->commercial_property_premium_three }}</td>

            </tr>
            <tr>
                <td style="width: 20%;"><input type="checkbox" {{ $form->crime == 1 ? 'checked disabled' : 'disabled' }}>
                    CRIME</td>
                <td style="width: 15%;">$ {{ $form->crime_premium_one }}</td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->crime_umbrella == 1 ? 'checked disabled' : 'disabled' }}> UMBRELLA</td>
                <td style="width: 15%;">$ {{ $form->crime_premium_two }}</td>
                <td style="width: 15%;"><input type="checkbox"
                        {{ $form->crime_yacht_six == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->crime_yacht_six_field }}</td>
                <td style="width: 15%;">$ {{ $form->crime_premium_three }}</td>

            </tr>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">ATTACHMENTS</div>
        <table>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_accounts_receivable == 1 ? 'checked disabled' : 'disabled' }}> ACCOUNTS
                    RECEIVABLE
                    / VALUABLE PAPERS </td>
                <td><input type="checkbox" {{ $form->attachment_glass_sign == 1 ? 'checked disabled' : 'disabled' }}>
                    GLASS AND SIGN SECTION</td>
                <td><input type="checkbox" {{ $form->attachment_statement == 1 ? 'checked disabled' : 'disabled' }}>
                    STATEMENT / SCHEDULE OF VALUES
                </td>
            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_additional_interest == 1 ? 'checked disabled' : 'disabled' }}> ADDITIONAL
                    INTEREST
                    SCHEDULE</td>
                <td><input type="checkbox" {{ $form->attachment_hotel == 1 ? 'checked disabled' : 'disabled' }}> HOTEL /
                    MOTEL SUPPLEMENT</td>
                <td><input type="checkbox"
                        {{ $form->attachment_state_supplement == 1 ? 'checked disabled' : 'disabled' }}> STATE SUPPLEMENT
                    (if
                    applicable) </td>


            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_addition_premises == 1 ? 'checked disabled' : 'disabled' }}> ADDITIONAL
                    PREMISES
                    INFORMATION SCHEDULE</td>
                <td><input type="checkbox"
                        {{ $form->attachment_installation_risk == 1 ? 'checked disabled' : 'disabled' }}> INSTALLATION /
                    BUILDERS RISK SECTION</td>
                <td><input type="checkbox" {{ $form->attachment_vacant_building == 1 ? 'checked disabled' : 'disabled' }}>
                    VACANT BUILDING
                    SUPPLEMENT</td>


            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_appartment_building == 1 ? 'checked disabled' : 'disabled' }}> APARTMENT
                    BUILDING
                    SUPPLEMENT </td>
                <td><input type="checkbox"
                        {{ $form->attachment_international_liability == 1 ? 'checked disabled' : 'disabled' }}>
                    INTERNATIONAL
                    LIABILITY EXPOSURE SUPPLEMENT</td>
                <td><input type="checkbox"
                        {{ $form->attachment_vehicle_schedule == 1 ? 'checked disabled' : 'disabled' }}> VEHICLE SCHEDULE
                </td>

            </tr>
            <tr>
                <td><input type="checkbox" {{ $form->attachment_condo_assn == 1 ? 'checked disabled' : 'disabled' }}>
                    CONDO ASSN BYLAWS (for D&O
                    Coverage only)</td>
                <td><input type="checkbox"
                        {{ $form->attachment_internation_property_exposer == 1 ? 'checked disabled' : 'disabled' }}>
                    INTERNATIONAL PROPERTY EXPOSURE SUPPLEMENT</td>
                <td><input type="checkbox"
                        {{ $form->attachment_default_check_one == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->attachment_default_check_one_field }}</td>


            </tr>

            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_contractors_supplement == 1 ? 'checked disabled' : 'disabled' }}> CONTRACTORS
                    SUPPLEMENT</td>
                <td><input type="checkbox" {{ $form->attachment_loss_summary == 1 ? 'checked disabled' : 'disabled' }}>
                    LOSS SUMMARY</td>
                <td><input type="checkbox"
                        {{ $form->attachment_default_check_two == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->attachment_default_check_two_field }}</td>

            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_coverages_schedule == 1 ? 'checked disabled' : 'disabled' }}> COVERAGES
                    SCHEDULE
                </td>
                <td><input type="checkbox"
                        {{ $form->attachment_open_cargo_section == 1 ? 'checked disabled' : 'disabled' }}> OPEN CARGO
                    SECTION
                </td>
                <td><input type="checkbox"
                        {{ $form->attachment_internation_prattachment_default_check_threeoperty_exposer == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->attachment_default_check_three_field }}</td>

            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_dealers_section == 1 ? 'checked disabled' : 'disabled' }}> DEALERS SECTION
                </td>
                <td><input type="checkbox"
                        {{ $form->attachment_premium_payment == 1 ? 'checked disabled' : 'disabled' }}> PREMIUM PAYMENT
                    SUPPLEMENT</td>
                <td><input type="checkbox"
                        {{ $form->attachment_default_check_four == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->attachment_default_check_four_field }}</td>

            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_driver_infomation == 1 ? 'checked disabled' : 'disabled' }}> DRIVER
                    INFORMATION
                    SCHEDULE</td>
                <td><input type="checkbox"
                        {{ $form->attachment_professional_liability == 1 ? 'checked disabled' : 'disabled' }}>
                    PROFESSIONAL
                    LIABILITY SUPPLEMENT</td>
                <td><input type="checkbox"
                        {{ $form->attachment_default_check_five == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->attachment_default_check_five_field }}</td>

            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->attachment_electronic_data == 1 ? 'checked disabled' : 'disabled' }}> ELECTRONIC DATA
                    PROCESSING SECTION</td>
                <td><input type="checkbox" {{ $form->attachment_restauratt == 1 ? 'checked disabled' : 'disabled' }}>
                    RESTAURANT / TAVERN
                    SUPPLEMENT</td>
                <td><input type="checkbox"
                        {{ $form->attachment_default_check_six == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->attachment_default_check_six_field }}</td>

            </tr>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">POLICY INFORMATION</div>

        <table>
            <tr>
                <td>PROPOSED EFF DATE </td>
                <td>PROPOSED EXP DATE </td>
                <td>BILLING PLAN </td>
                <td>PAYMENT PLAN </td>
                <td>METHOD OF PAYMENT </td>
                <td>AUDIT </td>
                <td>DEPOSIT </td>
                <td>MINIMUM PREMIUM </td>
                <td>POLICY PREMIUM </td>
            </tr>
            <tr>
                <td>{{ $form->policy_proposed_eff_date }}
                </td>
                <td>{{ $form->policy_proposed_exp_date }}
                </td>
                <td style="width: 140px;"><input type="radio"
                        {{ $form->policy_billing_plan == 1 ? 'checked disabled' : 'disabled' }}> Direct
                    <input type="radio" {{ $form->policy_billing_plan == 2 ? 'checked disabled' : 'disabled' }}>
                    Aagency
                </td>
                <td>{{ $form->policy_payment_plan }}
                </td>
                <td>{{ $form->policy_method_of_payment }}
                </td>
                <td>{{ $form->policy_audit }}
                </td>
                <td>$ {{ $form->policy_deposit }}
                </td>
                <td>$ {{ $form->policy_minimum_premium }}
                </td>
                <td>$ {{ $form->policy_premium }}
                </td>
            </tr>
        </table>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Application INFORMATION</div>
        <table>
            <tr>
                <td rowspan="3" style="width: 50%;">
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td rowspan="2" style="border: 0;">
                                    <p style="margin-bottom: 10px;">NAME (First Named Insured) AND MAILING ADDRESS
                                        (including ZIP+4) </p>
                                    <p style="margin-bottom: 5px;">{{ $form->applicationInfo->appication_info_one_name }}
                                    </p>
                                    <p style="margin-bottom: 5px;">
                                        {{ $form->applicationInfo->appication_info_one_address }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border:0;" colspan="2">
                                    {{ $form->applicationInfo->appication_info_one_city }}
                                </td>
                                <td style=" border: 0;">{{ $form->applicationInfo->appication_info_one_state }}
                                    {{ $form->applicationInfo->appication_info_one_zip }}</td>
                            </tr>

                        </table>

                    </div>
                </td>
                <td>GL CODE {{ $form->applicationInfo->appication_info_one_gl_code }}</td>
                <td>SIC {{ $form->applicationInfo->appication_info_one_SIC }}</td>
                <td>NAICS {{ $form->applicationInfo->appication_info_one_NAICS }}</td>
                <td>FEIN OR SOC SEC # {{ $form->applicationInfo->appication_info_one_FEIN }}</td>
            </tr>
            <tr>
                <td colspan="4">BUSINESS PHONE #: {{ $form->applicationInfo->appication_info_one_business_phone }}
                </td>
            </tr>
            <tr>
                <td colspan="4">WEBSITE ADDRESS {{ $form->applicationInfo->appication_info_one_website }}
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="applinfotable">
                        <tr>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_corporation == 1 ? 'checked disabled' : 'disabled' }}>
                                CORPORATION</td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_joint_venture == 1 ? 'checked disabled' : 'disabled' }}>
                                JOINT
                                VENTURE</td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_not_for_profilt == 1 ? 'checked disabled' : 'disabled' }}>
                                NOT
                                FOR PROFIT ORG </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_subchapter == 1 ? 'checked disabled' : 'disabled' }}>
                                SUBCHAPTER "S" CORPORATION </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_individual == 1 ? 'checked disabled' : 'disabled' }}>
                                INDIVIDUAL</td>
                            <td style="display: flex;"><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_llc_check == 1 ? 'checked disabled' : 'disabled' }}
                                    style="margin-right: 5px;"> LLC
                                <div style="margin-left: 5px;">NO. OF MEMBERS <br> AND MANAGERS</div>
                                <div style="margin-left: 5px;">
                                    <br>{{ $form->applicationInfo->appication_info_one_llc_check_field }}
                                </div>
                            </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_partnership == 1 ? 'checked disabled' : 'disabled' }}>
                                PARTNERSHIP </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_one_trust == 1 ? 'checked disabled' : 'disabled' }}>
                                TRUST
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="3" style="width: 50%;">
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td rowspan="2" style="border: 0;">
                                    <p style="margin-bottom: 10px;">NAME (First Named Insured) AND MAILING ADDRESS
                                        (including ZIP+4) </p>
                                    <p style="margin-bottom: 5px;">{{ $form->applicationInfo->appication_info_two_name }}
                                    </p>
                                    <p style="margin-bottom: 5px;">
                                        {{ $form->applicationInfo->appication_info_two_address }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border:0;" colspan="2">
                                    {{ $form->applicationInfo->appication_info_two_city }}
                                </td>
                                <td style=" border: 0;">{{ $form->applicationInfo->appication_info_two_state }}
                                    {{ $form->applicationInfo->appication_info_two_zip }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>GL CODE {{ $form->applicationInfo->appication_info_two_gl_code }}</td>
                <td>SIC {{ $form->applicationInfo->appication_info_two_SIC }}</td>
                <td>NAICS {{ $form->applicationInfo->appication_info_two_NAICS }}</td>
                <td>FEIN OR SOC SEC # {{ $form->applicationInfo->appication_info_two_FEIN }}</td>
            </tr>
            <tr>
                <td colspan="4">BUSINESS PHONE #: {{ $form->applicationInfo->appication_info_two_business_phone }}
                </td>
            </tr>
            <tr>
                <td colspan="4">WEBSITE ADDRESS {{ $form->applicationInfo->appication_info_two_website }}
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="applinfotable">
                        <tr>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_corporation == 1 ? 'checked disabled' : 'disabled' }}>
                                CORPORATION</td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_joint_venture == 1 ? 'checked disabled' : 'disabled' }}>
                                JOINT
                                VENTURE</td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_not_for_profilt == 1 ? 'checked disabled' : 'disabled' }}>
                                NOT
                                FOR PROFIT ORG </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_subchapter == 1 ? 'checked disabled' : 'disabled' }}>
                                SUBCHAPTER "S" CORPORATION </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_individual == 1 ? 'checked disabled' : 'disabled' }}>
                                INDIVIDUAL</td>
                            <td style="display: flex;"><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_llc_check == 1 ? 'checked disabled' : 'disabled' }}
                                    style="margin-right: 5px;"> LLC
                                <div style="margin-left: 5px;">NO. OF MEMBERS <br> AND MANAGERS</div>
                                <div style="margin-left: 5px;">
                                    <br>{{ $form->applicationInfo->appication_info_two_llc_check_field }}
                                </div>
                            </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_partnership == 1 ? 'checked disabled' : 'disabled' }}>
                                PARTNERSHIP </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_two_trust == 1 ? 'checked disabled' : 'disabled' }}>
                                TRUST
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td rowspan="3" style="width: 50%;">
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td rowspan="2" style="border: 0;">
                                    <p style="margin-bottom: 10px;">NAME (First Named Insured) AND MAILING ADDRESS
                                        (including ZIP+4) </p>
                                    <p style="margin-bottom: 5px;">
                                        {{ $form->applicationInfo->appication_info_three_name }}</p>
                                    <p style="margin-bottom: 5px;">
                                        {{ $form->applicationInfo->appication_info_three_address }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border:0;" colspan="2">
                                    {{ $form->applicationInfo->appication_info_three_city }}
                                </td>
                                <td style=" border: 0;">{{ $form->applicationInfo->appication_info_three_state }}
                                    {{ $form->applicationInfo->appication_info_three_zip }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td>GL CODE {{ $form->applicationInfo->appication_info_three_gl_code }}</td>
                <td>SIC {{ $form->applicationInfo->appication_info_three_SIC }}</td>
                <td>NAICS {{ $form->applicationInfo->appication_info_three_NAICS }}</td>
                <td>FEIN OR SOC SEC # {{ $form->applicationInfo->appication_info_three_FEIN }}</td>
            </tr>
            <tr>
                <td colspan="4">BUSINESS PHONE #: {{ $form->applicationInfo->appication_info_three_business_phone }}
                </td>
            </tr>
            <tr>
                <td colspan="4">WEBSITE ADDRESS {{ $form->applicationInfo->appication_info_three_website }}
                </td>
            </tr>
            <tr>
                <td colspan="5">
                    <table class="applinfotable">
                        <tr>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_corporation == 1 ? 'checked disabled' : 'disabled' }}>
                                CORPORATION</td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_joint_venture == 1 ? 'checked disabled' : 'disabled' }}>
                                JOINT VENTURE</td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_not_for_profilt == 1 ? 'checked disabled' : 'disabled' }}>
                                NOT FOR PROFIT ORG </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_subchapter == 1 ? 'checked disabled' : 'disabled' }}>
                                SUBCHAPTER "S" CORPORATION </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_individual == 1 ? 'checked disabled' : 'disabled' }}>
                                INDIVIDUAL</td>
                            <td style="display: flex;"><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_llc_check == 1 ? 'checked disabled' : 'disabled' }}
                                    style="margin-right: 5px;"> LLC
                                <div style="margin-left: 5px;">NO. OF MEMBERS <br> AND MANAGERS</div>
                                <div style="margin-left: 5px;">
                                    <br>{{ $form->applicationInfo->appication_info_three_llc_check_field }}
                                </div>
                            </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_partnership == 1 ? 'checked disabled' : 'disabled' }}>
                                PARTNERSHIP </td>
                            <td><input type="checkbox"
                                    {{ $form->applicationInfo->appication_info_three_trust == 1 ? 'checked disabled' : 'disabled' }}>
                                TRUST
                            </td>
                            <td></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Contact Information </div>
        <table>
            <tr>
                <td colspan="2">CONTACT TYPE: {{ $form->applicationInfo->contact_info_c_type_one }}</td>
                <td colspan="2">CONTACT TYPE: {{ $form->applicationInfo->contact_info_c_type_two }}
                </td>
            </tr>
            <tr>
                <td colspan="2">CONTACT NAME: {{ $form->applicationInfo->contact_info_name_one }}</td>
                <td colspan="2">CONTACT NAME: {{ $form->applicationInfo->contact_info_name_two }}</td>
            </tr>

            <tr>
                <td>
                    <div>Primary Phone : </div><input type="radio"
                        {{ $form->applicationInfo->contact_info_primary_one == 1 ? 'checked disabled' : 'disabled' }}>
                    Home <input type="radio"
                        {{ $form->applicationInfo->contact_info_primary_one == 2 ? 'checked disabled' : 'disabled' }}>
                    Buss <input type="radio"
                        {{ $form->applicationInfo->contact_info_primary_one == 3 ? 'checked disabled' : 'disabled' }}>
                    <span>Cell</span>
                    <br> {{ $form->applicationInfo->contact_info_primary_phone_one }}
                </td>
                <td>
                    <div>Secondary Phone : </div><input type="radio"
                        {{ $form->applicationInfo->contact_info_secondary_one == 1 ? 'checked disabled' : 'disabled' }}>
                    Home <input type="radio"
                        {{ $form->applicationInfo->contact_info_secondary_one == 2 ? 'checked disabled' : 'disabled' }}>
                    Buss <input type="radio"
                        {{ $form->applicationInfo->contact_info_secondary_one == 3 ? 'checked disabled' : 'disabled' }}>
                    Cell
                    <br>{{ $form->applicationInfo->contact_info_secondary_phone_one }}
                </td>
                <td>
                    <div>Primary Phone : </div><input type="radio"
                        {{ $form->applicationInfo->contact_info_primary_two == 1 ? 'checked disabled' : 'disabled' }}>
                    Home <input type="radio"
                        {{ $form->applicationInfo->contact_info_primary_two == 2 ? 'checked disabled' : 'disabled' }}>
                    Buss <input type="radio"
                        {{ $form->applicationInfo->contact_info_primary_two == 3 ? 'checked disabled' : 'disabled' }}>
                    <span>Cell</span>
                    <br> {{ $form->applicationInfo->contact_info_primary_phone_two }}
                </td>
                <td>
                    <div>Secondary Phone : </div><input type="radio"
                        {{ $form->applicationInfo->contact_info_secondary_two == 1 ? 'checked disabled' : 'disabled' }}>
                    Home <input type="radio"
                        {{ $form->applicationInfo->contact_info_secondary_two == 2 ? 'checked disabled' : 'disabled' }}>
                    Buss <input type="radio"
                        {{ $form->applicationInfo->contact_info_secondary_two == 3 ? 'checked disabled' : 'disabled' }}>
                    Cell
                    <br>{{ $form->applicationInfo->contact_info_secondary_phone_two }}
                </td>
            </tr>
            <tr>
                <td colspan="2">Primary Email Address: {{ $form->applicationInfo->contact_info_primary_email_one }}
                </td>
                <td colspan="2">Primary Email Address: {{ $form->applicationInfo->contact_info_secondary_email_one }}
                </td>
            </tr>
            <tr>
                <td colspan="2">Secondary Email Address: {{ $form->applicationInfo->contact_info_primary_email_two }}
                </td>
                <td colspan="2">Secondary Email Address:
                    {{ $form->applicationInfo->contact_info_secondary_email_two }}
                </td>
            </tr>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">PREMISES information (Attach accord 823 for
            Additional premises) </div>
        <table>
            <tr>
                <td rowspan="2">LOC # {{ $form->applicationInfo->prem_info_s1_r1_loc }}</td>
                <td style="width: 30%;" colspan="2" rowspan="2">STREET
                    <br>{{ $form->applicationInfo->prem_info_s1_r1_street }}
                </td>
                <td>CITY LIMITS </td>
                <td>INTEREST</td>
                <td rowspan="2"># FULL TIME EMPL {{ $form->applicationInfo->prem_info_s1_r1_ftEmployee }}</td>
                <td>ANNUAL REVENUES: $ {{ $form->applicationInfo->prem_info_s1_r1_annual_rev }}</td>
            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s1_r1_inside == 1 ? 'checked disabled' : 'disabled' }}>
                    INSIDE</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s1_r1_owner == 1 ? 'checked disabled' : 'disabled' }}>
                    OWNER</td>
                <td>OCCUPIED AREA <span style="float: right;">{{ $form->applicationInfo->prem_info_s1_r1_occupied_area }}
                        Sqft</span></td>
            </tr>
            <tr>
                <td rowspan="2">BLD # {{ $form->applicationInfo->prem_info_s1_r2_bld }}</td>
                <td>CITY: {{ $form->applicationInfo->prem_info_s1_r2_city }}
                </td>
                <td>State: {{ $form->applicationInfo->prem_info_s1_r2_state }}</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s1_r2_outside == 1 ? 'checked disabled' : 'disabled' }}>
                    OUTSIDE</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s1_r2_tenant == 1 ? 'checked disabled' : 'disabled' }}>
                    TENANT</td>
                <td rowspan="2"># PART TIME EMPL {{ $form->applicationInfo->prem_info_s1_r2_partTEmp }}</td>
                <td>OPEN TO PUBLIC AREA <span style="float: right;">
                        {{ $form->applicationInfo->prem_info_s1_r2_pubArea }} Sqft</span>
                </td>
            </tr>
            <tr>
                <td>COUNTY: {{ $form->applicationInfo->prem_info_s1_r2_country }}</td>
                <td>ZIP: {{ $form->applicationInfo->prem_info_s1_r2_zip }}
                </td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s1_r2_otherCheck_one == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->applicationInfo->prem_info_s1_r2_otherCheckField_one }}</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s1_r2_otherCheck_two == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->applicationInfo->prem_info_s1_r2_otherCheckField_two }}</td>
                <td>TOTAL BUILDING AREA <span style="float: right;">
                        {{ $form->applicationInfo->prem_info_s1_r2_totalBArea }} Sqft</span>
                </td>
            </tr>
            <tr>
                <td colspan="6">DESCRIPTION OF OPERATIONS: {{ $form->applicationInfo->prem_info_s1_description }}</td>
                <td>ANY AREA LEASED TO OTHERS? Y/N {{ $form->applicationInfo->prem_info_s1_leased }}</td>
            </tr>

            <tr>
                <td rowspan="2">LOC # {{ $form->applicationInfo->prem_info_s2_r1_loc }}</td>
                <td style="width: 30%;" colspan="2" rowspan="2">STREET
                    <br>{{ $form->applicationInfo->prem_info_s2_r1_street }}
                </td>
                <td>CITY LIMITS </td>
                <td>INTEREST</td>
                <td rowspan="2"># FULL TIME EMPL {{ $form->applicationInfo->prem_info_s2_r1_ftEmployee }}</td>
                <td>ANNUAL REVENUES: $ {{ $form->applicationInfo->prem_info_s2_r1_annual_rev }}</td>
            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s2_r1_inside == 1 ? 'checked disabled' : 'disabled' }}>
                    INSIDE</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s2_r1_owner == 1 ? 'checked disabled' : 'disabled' }}>
                    OWNER</td>
                <td>OCCUPIED AREA <span style="float: right;">{{ $form->applicationInfo->prem_info_s2_r1_occupied_area }}
                        Sqft</span></td>
            </tr>
            <tr>
                <td rowspan="2">BLD # {{ $form->applicationInfo->prem_info_s2_r2_bld }}</td>
                <td>CITY: {{ $form->applicationInfo->prem_info_s2_r2_city }}
                </td>
                <td>State: {{ $form->applicationInfo->prem_info_s2_r2_state }}</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s2_r2_outside == 1 ? 'checked disabled' : 'disabled' }}>
                    OUTSIDE</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s2_r2_tenant == 1 ? 'checked disabled' : 'disabled' }}>
                    TENANT</td>
                <td rowspan="2"># PART TIME EMPL {{ $form->applicationInfo->prem_info_s2_r2_partTEmp }}</td>
                <td>OPEN TO PUBLIC AREA <span style="float: right;">
                        {{ $form->applicationInfo->prem_info_s2_r2_pubArea }} Sqft</span>
                </td>
            </tr>
            <tr>
                <td>COUNTY: {{ $form->applicationInfo->prem_info_s2_r2_country }}</td>
                <td>ZIP: {{ $form->applicationInfo->prem_info_s2_r2_zip }}
                </td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s2_r2_otherCheck_one == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->applicationInfo->prem_info_s2_r2_otherCheckField_one }}</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s2_r2_otherCheck_two == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->applicationInfo->prem_info_s2_r2_otherCheckField_two }}</td>
                <td>TOTAL BUILDING AREA <span style="float: right;">
                        {{ $form->applicationInfo->prem_info_s2_r2_totalBArea }}Sqft</span>
                </td>
            </tr>
            <tr>
                <td colspan="6">DESCRIPTION OF OPERATIONS: {{ $form->applicationInfo->prem_info_s2_description }}</td>
                <td>ANY AREA LEASED TO OTHERS? Y/N {{ $form->applicationInfo->prem_info_s2_leased }}</td>
            </tr>

            <tr>
                <td rowspan="2">LOC # {{ $form->applicationInfo->prem_info_s3_r1_loc }}</td>
                <td style="width: 30%;" colspan="2" rowspan="2">STREET
                    <br>{{ $form->applicationInfo->prem_info_s3_r1_street }}
                </td>
                <td>CITY LIMITS </td>
                <td>INTEREST</td>
                <td rowspan="2"># FULL TIME EMPL {{ $form->applicationInfo->prem_info_s3_r1_ftEmployee }}</td>
                <td>ANNUAL REVENUES: $ {{ $form->applicationInfo->prem_info_s3_r1_annual_rev }}></td>
            </tr>
            <tr>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s3_r1_inside == 1 ? 'checked disabled' : 'disabled' }}>
                    INSIDE</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s3_r1_owner == 1 ? 'checked disabled' : 'disabled' }}>
                    OWNER</td>
                <td>OCCUPIED AREA <span style="float: right;">{{ $form->applicationInfo->prem_info_s3_r1_occupied_area }}
                        Sqft</span></td>
            </tr>
            <tr>
                <td rowspan="2">BLD # {{ $form->applicationInfo->prem_info_s3_r2_bld }}</td>
                <td>CITY: {{ $form->applicationInfo->prem_info_s3_r2_city }}
                </td>
                <td>State: {{ $form->applicationInfo->prem_info_s3_r2_state }}</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s3_r2_outside == 1 ? 'checked disabled' : 'disabled' }}>
                    OUTSIDE</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s3_r2_tenant == 1 ? 'checked disabled' : 'disabled' }}>
                    TENANT</td>
                <td rowspan="2"># PART TIME EMPL {{ $form->applicationInfo->prem_info_s3_r2_partTEmp }}</td>
                <td>OPEN TO PUBLIC AREA <span style="float: right;">
                        {{ $form->applicationInfo->prem_info_s3_r2_pubArea }} Sqft</span>
                </td>
            </tr>
            <tr>
                <td>COUNTY: {{ $form->applicationInfo->prem_info_s3_r2_country }}</td>
                <td>ZIP: {{ $form->applicationInfo->prem_info_s3_r2_zip }}
                </td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s3_r2_otherCheck_one == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->applicationInfo->prem_info_s3_r2_otherCheckField_one }}</td>
                <td><input type="checkbox"
                        {{ $form->applicationInfo->prem_info_s3_r2_otherCheck_two == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->applicationInfo->prem_info_s3_r2_otherCheckField_two }}</td>
                <td>TOTAL BUILDING AREA <span style="float: right;">
                        {{ $form->applicationInfo->prem_info_s3_r2_totalBArea }} Sqft</span>
                </td>
            </tr>
            <tr>
                <td colspan="6">DESCRIPTION OF OPERATIONS: {{ $form->applicationInfo->prem_info_s3_description }}</td>
                <td>ANY AREA LEASED TO OTHERS? Y/N {{ $form->applicationInfo->prem_info_s3_leased }}</td>
            </tr>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">NATURE OF BUSINESS </div>
        <table>
            <tr>
                <td style="border-bottom: 0; border-right: 0;"><input type="checkbox"
                        {{ $form->business->natureB_apartments == 1 ? 'checked disabled' : 'disabled' }}> APARTMENTS</td>
                <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                        {{ $form->business->natureB_contractor == 1 ? 'checked disabled' : 'disabled' }}> CONTRACTOR
                </td>
                <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                        {{ $form->business->natureB_manufacturing == 1 ? 'checked disabled' : 'disabled' }}> MANUFACTURING
                </td>
                <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                        {{ $form->business->natureB_restaurant == 1 ? 'checked disabled' : 'disabled' }}> RESTAURANT
                </td>
                <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                        {{ $form->business->natureB_service == 1 ? 'checked disabled' : 'disabled' }}> SERVICE</td>
                <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                        {{ $form->business->natureB_otherCheck == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->business->natureB_otherCheck_field }}
                </td>
                <td rowspan="2">DATE BUSINESS <br>
                    STARTED {{ $form->business->natureB_dateBusiness }}</td>
            </tr>
            <tr>
                <td style="border-top: 0; border-right: 0; "><input type="checkbox"
                        {{ $form->business->natureB_condomin == 1 ? 'checked disabled' : 'disabled' }}> CONDOMINIUMS</td>
                <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                        {{ $form->business->natureB_institutional == 1 ? 'checked disabled' : 'disabled' }}> INSTITUTIONAL
                </td>
                <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                        {{ $form->business->natureB_office == 1 ? 'checked disabled' : 'disabled' }}> OFFICE</td>
                <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                        {{ $form->business->natureB_retail == 1 ? 'checked disabled' : 'disabled' }}> RETAIL</td>
                <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                        {{ $form->business->natureB_wholesale == 1 ? 'checked disabled' : 'disabled' }}> WHOLESALE</td>
                <td style="border-top: 0; border-left: 0;"></td>
            </tr>
            <tr>
                <td style="border-bottom: 0;" colspan="7">DESCRIPTION OF PRIMARY OPERATIONS </td>
            </tr>
            <tr>
                <td style="border-top: 0; height: 100px;" colspan="7">
                    {{ $form->business->natureB_primary_description }}
                </td>
            </tr>
            <tr>
                <td style="border: 0; padding: 0;" colspan="7">
                    <table>
                        <tr>
                            <td style="border-top: 0;"><br>RETAIL STORES OR SERVICE OPERATIONS % OF TOTAL SALES:
                                {{ $form->business->natureB_retailStore }}
                            </td>
                            <td style="border-top: 0;">INSTALLATION, SERVICE OR REPAIR WORK <br>
                                {{ $form->business->natureB_installationService }} %
                            </td>
                            <td style="border-top: 0;">OFF PREMISES INSTALLATION, SERVICE OR REPAIR WORK <br>
                                {{ $form->business->natureB_premisesInstallation }} %
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td style="border-bottom: 0;" colspan="7">Description Of Operations Of Other Insureds</td>
            </tr>
            <tr>
                <td style="border-top: 0; height: 100px;" colspan="7">
                    {{ $form->business->natureB_operationDescription }}
                </td>
            </tr>
        </table>
        <table class="form-table" style="margin-top: 10px;">
            <tr>
                <td style="font-weight: 600;">Additional Interest</td>
                <td colspan="7">Accord 45 attached for additional names </td>
            </tr>
            <tr>
                <td colspan="2" style="border-bottom: 0;">
                    <div class="title">INTEREST</div>
                </td>
                <td colspan="4" style="border-bottom: 0;">
                    <div style="display: flex; align-items: flex-end;">
                        <span class="label" style="font-weight: bold;">NAME AND ADDRESS
                            {{ $form->business->addit_nameAddress }}</span>
                        <span class="label" style="font-weight: bold; margin-left: 10px;">RANK: </span>
                        {{ $form->business->addit_Rank }}
                    </div>
                </td>
                <td style="border-bottom: 0;">
                    <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                </td>
            </tr>
            <tr>
                <td style="width: 15%; border-top: 0; border-right: 0;" class="interest-cell" rowspan="3">

                    <div class="interest-options">
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_additionalInsured == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>ADDITIONAL INSURED </label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_beachWarranty == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>BREACH OF WARRANTY</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_coOwner == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>CO-OWNER</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_employeeLessor == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>EMPLOYEE AS LESSOR</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_leasebackOwner == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LEASEBACK OWNER</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_lenderLoss == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LENDER'S LOSS PAYABLE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_otherCheck == 1 ? 'checked disabled' : 'disabled' }}>
                            {{ $form->business->addit_otherCheckField }}
                        </div>
                    </div>

                </td>
                <td style="width: 15%;  border-top: 0;  border-left: 0;" class="interest-cell" rowspan="3">
                    <!-- <div class="title"></div> -->

                    <div class="interest-options">
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_lienholder == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LIENHOLDER</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_lossPayee == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LOSS PAYEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_mortgagee == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>MORTGAGEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_owner == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>OWNER</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_registrant == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>REGISTRANT</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox"
                                {{ $form->business->addit_trustee == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>TRUSTEE</label>
                        </div>

                </td>
                <td colspan="4" style="height: 119px; position: relative;  border-top: 0;">

                    <div>
                        EVIDENCE: <input type="checkbox"
                            {{ $form->business->addit_eviCertificate == 1 ? 'checked disabled' : 'disabled' }}>
                        CERTIFICATE
                        <input type="checkbox"
                            {{ $form->business->addit_eviPolicy == 1 ? 'checked disabled' : 'disabled' }}>
                        POLICY <input type="checkbox"
                            {{ $form->business->addit_eviSendBill == 1 ? 'checked disabled' : 'disabled' }}> Send Bill
                    </div>

                    <div style="position: absolute; bottom: 5px; width: 95%;">
                        <div class="field-row" style="margin-top: 0;">
                            <span class="label" style="font-weight: bold;">REFERENCE / LOAN #:</span>
                            {{ $form->business->addit_reference }}
                        </div>
                    </div>
                </td>
                <td colspan="2" rowspan="2" style="padding: 0;  border-top: 0;">

                    <table class="nested-table">
                        <tr>
                            <td style="border-left: 0;">
                                <span class="label">LOCATION: {{ $form->business->addit_location }}</span>
                            </td>
                            <td style="border-right: 0;">
                                <span class="label">BUILDING: {{ $form->business->addit_building }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 0;">
                                <span class="label">VEHICLE: {{ $form->business->addit_vehicle }}</span>
                            </td>
                            <td style="border-right: 0;">
                                <span class="label">BOAT: {{ $form->business->addit_boat }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 0;">
                                <span class="label">AIRPORT: {{ $form->business->addit_airport }}</span>
                            </td>
                            <td style="border-right: 0;">
                                <span class="label">AIRCRAFT: {{ $form->business->addit_aircraft }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-left: 0;">
                                <span class="label">ITEM CLASS: {{ $form->business->addit_itemclass }}</span>
                            </td>
                            <td style="border-right: 0;">
                                <span class="label">ITEM: {{ $form->business->addit_item }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="border-left: 0; border-right: 0; border-bottom: 0;">
                                <span class="label">ITEM Description:</span> <br>
                                {{ $form->business->addit_itemDescription }}
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
            <tr>
                <td colspan="2">REFERENCE / LOAN #: <br> {{ $form->business->addit_refLoan }}</td>
                <td colspan="2">INTEREST END DATE: <br> {{ $form->business->addit_interestEDate }}
                </td>
            </tr>
            <tr>
                <td colspan="2">LIEN AMOUNT: <br> {{ $form->business->addit_lienAmount }}</td>
                <td colspan="2">PHONE (A/C, No, Ext): <br> {{ $form->business->addit_phone }}</td>
                <td colspan="2"><span class="label">Fax (A/C No.): <br> {{ $form->business->addit_fax }}</span>
                </td>
            </tr>

            <tr>
                <td colspan="4">Reason for Insterest {{ $form->business->addit_reasonFInterest }} </td>
                <td colspan="3">E-MAIL ADDRESS: {{ $form->business->addit_emailAdd }}</td>
            </tr>
        </table>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">General Information</div>

        <table>
            <tbody>
                <tr>
                    <td>
                        EXPLAIN ALL \"YES\" RESPONSES
                    </td>
                    <td>Y/N</td>
                </tr>

                <tr>
                    <td>
                        1a. IS THE APPLICANT A SUBSIDIARY OF ANOTHER ENTITY ?
                        <table style="width: 90%; justify-self: center;">
                            <tr>
                                <td>PARENT COMPANY NAME <br> {{ $form->business->generalInfo_q1A_parentCompany }}</td>
                                <td>RELATIONSHIP DESCRIPTION <br> {{ $form->business->generalInfo_q1A_Relationship }}</td>
                                <td>% OWNED <br> {{ $form->business->generalInfo_q1A_owned }}</td>
                            </tr>
                        </table>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        1b. DOES THE APPLICANT HAVE ANY SUBSIDIARIES?
                        <table style="width: 90%; justify-self: center;">
                            <tr>
                                <td>PARENT COMPANY NAME <br> {{ $form->business->generalInfo_q1B_parentCompany }}</td>
                                <td>RELATIONSHIP DESCRIPTION <br> {{ $form->business->generalInfo_q1B_Relationship }}</td>
                                <td>% OWNED <br> {{ $form->business->generalInfo_q1B_owned }}</td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        2. IS A FORMAL SAFETY PROGRAM IN OPERATION? <br>
                        <input type="radio"
                            {{ $form->business->generalInfo_q2 == 1 ? 'checked disabled' : 'disabled' }}> SAFETY
                        MANUAL <input type="radio"
                            {{ $form->business->generalInfo_q2 == 2 ? 'checked disabled' : 'disabled' }}>
                        SAFETY POSITION <input type="radio"
                            {{ $form->business->generalInfo_q2 == 3 ? 'checked disabled' : 'disabled' }}> MONTHLY MEETINGS
                        <input type="radio"
                            {{ $form->business->generalInfo_q2 == 4 ? 'checked disabled' : 'disabled' }}> OSHA
                        <input type="radio"
                            {{ $form->business->generalInfo_q2 == 5 ? 'checked disabled' : 'disabled' }}>
                        OTHER
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        3. ANY EXPOSURE TO FLAMMABLES, EXPLOSIVES, CHEMICALS? <br>
                        {{ $form->business->generalInfo_q3_explosive }}
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        4. ANY OTHER INSURANCE WITH THIS COMPANY? (List policy numbers) <br>
                        <div style="display: flex ; justify-content: center;">
                            <table style="width: 48%; margin-right: 20px;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>LINE OF BUSINESS</b></td>
                                    <td style="font-size: 9px;"> <b>POLICY NUMBER</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $form->business->generalInfo_q4_t1r1_lBusiness }}</td>
                                    <td>{{ $form->business->generalInfo_q4_t1r1_policy }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $form->business->generalInfo_q4_t1r2_lBusiness }}</td>
                                    <td>{{ $form->business->generalInfo_q4_t1r2_policy }}</td>
                                </tr>
                            </table>
                            <table style="width: 48%;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>LINE OF BUSINESS</b></td>
                                    <td style="font-size: 9px;"> <b>POLICY NUMBER</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $form->business->generalInfo_q4_t2r1_lBusiness }}</td>
                                    <td>{{ $form->business->generalInfo_q4_t2r1_policy }}</td>
                                </tr>
                                <tr>
                                    <td>{{ $form->business->generalInfo_q4_t2r2_lBusiness }}</td>
                                    <td>{{ $form->business->generalInfo_q4_t2r2_policy }}</td>
                                </tr>

                            </table>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        5. ANY POLICY OR COVERAGE DECLINED, CANCELLED OR NON-RENEWED DURING THE PRIOR THREE (3) YEARS
                        FOR ANY PREMISES OR OPERATIONS?(Missouri Applicants do not answer this question)
                        <br><br> <input type="radio"
                            {{ $form->business->generalInfo_q5 == 1 ? 'checked disabled' : 'disabled' }}> NON-PAYMENT
                        <input type="radio"
                            {{ $form->business->generalInfo_q5 == 2 ? 'checked disabled' : 'disabled' }}> AGENT NO
                        LONGER
                        REPRESENTS
                        CARRIER <input type="radio"
                            {{ $form->business->generalInfo_q5 == 3 ? 'checked disabled' : 'disabled' }}>
                        OTHER <br><br>
                        <input type="radio"
                            {{ $form->business->generalInfo_q5 == 4 ? 'checked disabled' : 'disabled' }}>
                        NON-RENEWAL <input type="radio"
                            {{ $form->business->generalInfo_q5 == 5 ? 'checked disabled' : 'disabled' }}> UNDERWRITING
                        <input type="radio"
                            {{ $form->business->generalInfo_q5 == 6 ? 'checked disabled' : 'disabled' }}>
                        CONDITION CORRECTED (Describe):
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="height: 50px;">
                        6. ANY PAST LOSSES OR CLAIMS RELATING TO SEXUAL ABUSE OR MOLESTATION ALLEGATIONS, DISCRIMINATION
                        OR NEGLIGENT HIRING? <br>
                        {{ $form->business->generalInfo_q6 }}</textarea>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="height: 70px;">
                        7. DURING THE LAST FIVE YEARS (TEN IN RI), HAS ANY APPLICANT BEEN INDICTED FOR OR CONVICTED OF
                        ANY DEGREE OF THE CRIME OF FRAUD, BRIBERY, ARSON OR ANY OTHER ARSON-RELATED CRIME IN CONNECTION
                        WITH THIS OR ANY OTHER PROPERTY?
                        <span style="font-size: 8px;">(In RI, this question must be answered by any applicant for
                            property insurance. Failure to disclose the existence of an arson conviction is a
                            misdemeanor punishable by a sentence of up to one year of imprisonment).</span> <br>
                        {{ $form->business->generalInfo_q7 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        8. ANY UNCORRECTED FIRE AND/OR SAFETY CODE VIOLATIONS?
                        <table style="width: 90%; justify-self: center;">
                            <tr>
                                <td>OCCUR DATE </td>
                                <td>EXPLANATION</td>
                                <td>RESOLUTION</td>
                                <td>RESOLVE DATE</td>
                            </tr>
                            <tr>
                                <td>{{ $form->business->generalInfo_q8_r1_occurDate }}</td>
                                <td>{{ $form->business->generalInfo_q8_r1_explanation }}</td>
                                <td>{{ $form->business->generalInfo_q8_r1_resolution }}</td>
                                <td>{{ $form->business->generalInfo_q8_r1_resolveDate }}</td>
                            </tr>
                            <tr>
                                <td>{{ $form->business->generalInfo_q8_r2_occurDate }}</td>
                                <td>{{ $form->business->generalInfo_q8_r2_explanation }}</td>
                                <td>{{ $form->business->generalInfo_q8_r2_resolution }}</td>
                                <td>{{ $form->business->generalInfo_q8_r2_resolveDate }}</td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        9. HAS APPLICANT HAD A FORECLOSURE, REPOSSESSION, BANKRUPTCY OR FILED FOR BANKRUPTCY DURING THE
                        LAST FIVE (5) YEARS?
                        <table style="width: 90%; justify-self: center;">
                            <tr>
                                <td>OCCUR DATE </td>
                                <td>EXPLANATION</td>
                                <td>RESOLUTION</td>
                                <td>RESOLVE DATE</td>
                            </tr>
                            <tr>
                                <td>{{ $form->business->generalInfo_q9_r1_occurDate }}</td>
                                <td>{{ $form->business->generalInfo_q9_r1_explanation }}</td>
                                <td>{{ $form->business->generalInfo_q9_r1_resolution }}</td>
                                <td>{{ $form->business->generalInfo_q9_r1_resolveDate }}</td>
                            </tr>
                            <tr>
                                <td>{{ $form->business->generalInfo_q9_r2_occurDate }}</td>
                                <td>{{ $form->business->generalInfo_q9_r2_explanation }}</td>
                                <td>{{ $form->business->generalInfo_q9_r2_resolution }}</td>
                                <td>{{ $form->business->generalInfo_q9_r2_resolveDate }}</td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        10. HAS APPLICANT HAD A JUDGEMENT OR LIEN DURING THE LAST FIVE (5) YEARS?
                        <table style="width: 90%; justify-self: center;">
                            <tr>
                                <td>OCCUR DATE </td>
                                <td>EXPLANATION</td>
                                <td>RESOLUTION</td>
                                <td>RESOLVE DATE</td>
                            </tr>
                            <tr>
                                <td>{{ $form->business->generalInfo_q10_r1_occurDate }}</td>
                                <td>{{ $form->business->generalInfo_q10_r1_explanation }}</td>
                                <td>{{ $form->business->generalInfo_q10_r1_resolution }}</td>
                                <td>{{ $form->business->generalInfo_q10_r1_resolveDate }}</td>
                            </tr>
                            <tr>
                                <td>{{ $form->business->generalInfo_q10_r2_occurDate }}</td>
                                <td>{{ $form->business->generalInfo_q10_r2_explanation }}</td>
                                <td>{{ $form->business->generalInfo_q10_r2_resolution }}</td>
                                <td>{{ $form->business->generalInfo_q10_r2_resolveDate }}</td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        11. HAS BUSINESS BEEN PLACED IN A TRUST? <span style="margin-left: 10px; font-weight: 600;">Name
                            of the trust:</span> <br> {{ $form->business->generalInfo_q11 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        12. ANY FOREIGN OPERATIONS, FOREIGN PRODUCTS DISTRIBUTED IN USA, OR US PRODUCTS SOLD/DISTRIBUTED
                        IN FOREIGN COUNTRIES?
                        <br> <span style="font-size: 8px;">(If \"YES\", attach ACORD 815 for Liability Exposure and/or
                            ACORD 816 for Property Exposure)</span><br> {{ $form->business->generalInfo_q12 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        13. DOES APPLICANT HAVE OTHER BUSINESS VENTURES FOR WHICH COVERAGE IS NOT REQUESTED?<br>
                        {{ $form->business->generalInfo_q13 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        14. DOES APPLICANT OWN / LEASE / OPERATE ANY DRONES? (If \"YES\", describe use)<br>
                        {{ $form->business->generalInfo_q14 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        15. DOES APPLICANT HIRE OTHERS TO OPERATE DRONES? (If \"YES\", describe use)<br>
                        {{ $form->business->generalInfo_q15 }}
                    </td>
                    <td></td>
                </tr>

            </tbody>
        </table>
        <div class="page-break"></div>
        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID :
            {{ $form->business->agencyID }}</p>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">REMARKS / PROCESSING INSTRUCTIONS (ACORD
            101,
            Additional Remarks Schedule, may be attached if more space is required)</div>
        <table>
            <tr>
                <td colspan="6" style="height: 100px;">
                    {{ $form->otherInfo->remarksInstruction }}
                </td>
            </tr>
        </table>


        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">PRIOR CARRIER INFORMATION</div>
        <table>
            <tr>
                <td>YEAR</td>
                <td>CATEGORY</td>
                <td>GENERAL LIABILITY </td>
                <td>AUTOMOBILE</td>
                <td>PROPERTY</td>
                <td>OTHER</td>
            </tr>
            <tr>
                <td rowspan="5">{{ $form->otherInfo->priorCI_r1_year }}</td>
                <td>CARRIER</td>
                <td>{{ $form->otherInfo->priorCI_r1_gl }}</td>
                <td>{{ $form->otherInfo->priorCI_r1_autmob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_property }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_other }}
                </td>
            </tr>
            <tr>
                <td>POLICY NUMBER</td>
                <td>{{ $form->otherInfo->priorCI_r1_pgl }}</td>
                <td>{{ $form->otherInfo->priorCI_r1_pautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_pproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_pother }}
                </td>

            </tr>
            <tr>
                <td>PREMIUM</td>
                <td>$ {{ $form->otherInfo->priorCI_r1_pRgl }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r1_pRautomob }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r1_pRproperty }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r1_pRother }}
                </td>
            </tr>
            <tr>
                <td>EFFECTIVE DATE</td>
                <td>{{ $form->otherInfo->priorCI_r1_egl }}</td>
                <td>{{ $form->otherInfo->priorCI_r1_eautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_eproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_eother }}
                </td>
            </tr>
            <tr>
                <td>EXPIRATION DATE</td>
                <td>{{ $form->otherInfo->priorCI_r1_exgl }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_exautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_exproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r1_exother }}
                </td>
            </tr>


            <tr>
                <td rowspan="5">{{ $form->otherInfo->priorCI_r2_year }}</td>
                <td>CARRIER</td>
                <td>{{ $form->otherInfo->priorCI_r2_gl }}</td>
                <td>{{ $form->otherInfo->priorCI_r2_autmob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_property }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_other }}
                </td>
            </tr>
            <tr>
                <td>POLICY NUMBER</td>
                <td>{{ $form->otherInfo->priorCI_r2_pgl }}</td>
                <td>{{ $form->otherInfo->priorCI_r2_pautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_pproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_pother }}
                </td>

            </tr>
            <tr>
                <td>PREMIUM</td>
                <td>$ {{ $form->otherInfo->priorCI_r2_pRgl }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r2_pRautomob }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r2_pRproperty }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r2_pRother }}
                </td>
            </tr>
            <tr>
                <td>EFFECTIVE DATE</td>
                <td>{{ $form->otherInfo->priorCI_r2_egl }}</td>
                <td>{{ $form->otherInfo->priorCI_r2_eautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_eproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_eother }}
                </td>
            </tr>
            <tr>
                <td>EXPIRATION DATE</td>
                <td>{{ $form->otherInfo->priorCI_r2_exgl }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_exautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_exproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r2_exother }}
                </td>
            </tr>


            <tr>
                <td rowspan="5">{{ $form->otherInfo->priorCI_r3_year }}</td>
                <td>CARRIER</td>
                <td>{{ $form->otherInfo->priorCI_r3_gl }}</td>
                <td>{{ $form->otherInfo->priorCI_r3_autmob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_property }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_other }}
                </td>
            </tr>
            <tr>
                <td>POLICY NUMBER</td>
                <td>{{ $form->otherInfo->priorCI_r3_pgl }}</td>
                <td>{{ $form->otherInfo->priorCI_r3_pautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_pproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_pother }}
                </td>

            </tr>
            <tr>
                <td>PREMIUM</td>
                <td>$ {{ $form->otherInfo->priorCI_r3_pRgl }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r3_pRautomob }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r3_pRproperty }}
                </td>
                <td>$ {{ $form->otherInfo->priorCI_r3_pRother }}
                </td>
            </tr>
            <tr>
                <td>EFFECTIVE DATE</td>
                <td>{{ $form->otherInfo->priorCI_r3_egl }}</td>
                <td>{{ $form->otherInfo->priorCI_r3_eautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_eproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_eother }}
                </td>
            </tr>
            <tr>
                <td>EXPIRATION DATE</td>
                <td>{{ $form->otherInfo->priorCI_r3_exgl }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_exautomob }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_exproperty }}
                </td>
                <td>{{ $form->otherInfo->priorCI_r3_exother }}
                </td>
            </tr>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">LOSS HISTORY <span><input type="checkbox"
                    name="lossHistory" {{ $form->history->lossHistory == 1 ? 'checked disabled' : 'disabled' }}
                    style="margin-left: 20px;"> Check if none (Attach Loss
                Summary for Additional Loss
                Information)</span>

        </div>
        <table>
            <tr>
                <td colspan="5">
                    ENTER ALL CLAIMS OR LOSSES (REGARDLESS OF FAULT AND WHETHER OR NOT INSURED) OR OCCURRENCES THAT MAY
                    GIVE RISE TO CLAIMS

                    FOR THE LAST YEARS
                </td>
                <td colspan="3">TOTAL LOSSES: $ {{ $form->history->totalLose }}</td>
            </tr>
            <tr>
                <td>DATE OF OCCURRENCE</td>
                <td>LINE</td>
                <td>TYPE / DESCRIPTION OF OCCURRENCE OR CLAIM </td>
                <td>DATE OF CLAIM</td>
                <td>AMOUNT PAID </td>
                <td>AMOUNT RESERVED </td>
                <td>SUBRO- GATION Y/N </td>
                <td>CLAIM OPEN Y/N</td>
            </tr>
            <tr>
                <td>{{ $form->history->lossH_r1_dateOccup }}
                </td>
                <td>{{ $form->history->lossH_r1_line }}</td>
                <td>{{ $form->history->lossH_r1_type }}</td>
                <td>{{ $form->history->lossH_r1_dateClaim }}
                </td>
                <td>{{ $form->history->lossH_r1_amountPaid }}
                </td>
                <td>{{ $form->history->lossH_r1_ammountReserved }}</td>
                <td>{{ $form->history->lossH_r1_subro }}</td>
                <td>{{ $form->history->lossH_r1_clainOpen }}
                </td>
            </tr>
            <tr>
                <td>{{ $form->history->lossH_r2_dateOccup }}
                </td>
                <td>{{ $form->history->lossH_r2_line }}</td>
                <td>{{ $form->history->lossH_r2_type }}</td>
                <td>{{ $form->history->lossH_r2_dateClaim }}
                </td>
                <td>{{ $form->history->lossH_r2_amountPaid }}
                </td>
                <td>{{ $form->history->lossH_r2_ammountReserved }}</td>
                <td>{{ $form->history->lossH_r2_subro }}</td>
                <td>{{ $form->history->lossH_r2_clainOpen }}
                </td>
            </tr>
            <tr>
                <td>{{ $form->history->lossH_r3_dateOccup }}
                </td>
                <td>{{ $form->history->lossH_r3_line }}</td>
                <td>{{ $form->history->lossH_r3_type }}</td>
                <td>{{ $form->history->lossH_r3_dateClaim }}
                </td>
                <td>{{ $form->history->lossH_r3_amountPaid }}
                </td>
                <td>{{ $form->history->lossH_r3_ammountReserved }}</td>
                <td>{{ $form->history->lossH_r3_subro }}</td>
                <td>{{ $form->history->lossH_r3_clainOpen }}
                </td>
            </tr>
        </table>
        <div class="page-break"></div>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Signature</div>
        <table>
            <tr>
                <td colspan="6"><input type="checkbox"
                        {{ $form->history->signatureCheck == 5 ? 'checked disabled' : 'disabled' }}> Copy of the
                    Notice of Information Practices (Privacy) has
                    been
                    given to the applicant. (Not required in all states, contact your agent or broker for your state's
                    requirements.)

                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <p>
                        PERSONAL INFORMATION ABOUT YOU, INCLUDING INFORMATION FROM A CREDIT OR OTHER INVESTIGATIVE
                        REPORT, MAY BE COLLECTED FROM PERSONS OTHER THAN YOU IN CONNECTION WITH THIS APPLICATION FOR
                        INSURANCE AND SUBSEQUENT AMENDMENTS AND RENEWALS. SUCH INFORMATION AS WELL AS OTHER PERSONAL AND
                        PRIVILEGED INFORMATION COLLECTED BY US OR OUR AGENTS MAY IN CERTAIN CIRCUMSTANCES BE DISCLOSED
                        TO THIRD PARTIES WITHOUT YOUR AUTHORIZATION. CREDIT SCORING INFORMATION MAY BE USED TO HELP
                        DETERMINE EITHER YOUR ELIGIBILITY FOR INSURANCE OR THE PREMIUM YOU WILL BE CHARGED. WE MAY USE A
                        THIRD PARTY IN CONNECTION WITH THE DEVELOPMENT OF YOUR SCORE. YOU MAY HAVE THE RIGHT TO REVIEW
                        YOUR PERSONAL INFORMATION IN OUR FILES AND REQUEST CORRECTION OF ANY INACCURACIES. YOU MAY ALSO
                        HAVE THE RIGHT TO REQUEST IN WRITING THAT WE CONSIDER EXTRAORDINARY LIFE CIRCUMSTANCES IN
                        CONNECTION WITH THE DEVELOPMENT OF YOUR CREDIT SCORE. THESE RIGHTS MAY BE LIMITED IN SOME
                        STATES. PLEASE CONTACT YOUR AGENT OR BROKER TO LEARN HOW THESE RIGHTS MAY APPLY IN YOUR STATE OR
                        FOR INSTRUCTIONS ON HOW TO SUBMIT A REQUEST TO US FOR A MORE DETAILED DESCRIPTION OF YOUR RIGHTS
                        AND OUR PRACTICES REGARDING PERSONAL INFORMATION.

                        (Not applicable in AZ, CA, DE, KS, MA, MN, ND, NY, OR, VA, or WV. Specific ACORD 38s are
                        available for applicants in these states.)
                    </p>
                    <p style="text-align: right;">
                        Applicant Initials : {{ $form->history->applicantInitials }}
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in AL, AR, DC, LA, MD, NM, RI andA¥gperson who knowingly (or willfully)* presents a
                        false or fraudulent claim for payment of a loss or

                        benefit or knowingly (or willfully)“ presents false information in an application for insurance
                        is guilty of a crime and may be subject to fines and confinement in prison. *Applies in MD Only.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in COJt is unlawful to knowingly provide false, incomplete, or misleading facts or
                        information to an insurance company for the purpose of defrauding or attempting to defraud the
                        company. Penalties may include imprisonment, fines, denial of insurance and civil damages. Any
                        insurance company or agent of an insurance company who knowingly provides false, incomplete, or
                        misleading facts or information to a policyholder or claimant for the purpose of defrauding or
                        attempting to defraud the policyholder or claimant with regard to a settlement or award payable
                        from insurance proceeds shall be reported to the Colorado Division of Insurance within the
                        Department of Regulatory Agencies.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in FL and OfAny person who knowingly and with intent to injure, defraud, or deceive
                        any insurer files a statement of claim or an application containing any false, incomplete, or
                        misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in KSAny person who, knowingly and with intent to defraud, presents, causes to be
                        presented or prepares with knowledge or belief that it will be presented to or by an insurer,
                        purported insurer, broker or any agent thereof, any written statement as part of, or in support
                        of, an application for the issuance of, or the rating of an insurance policy for personal or
                        commercial insurance, or a claim for payment or other benefit pursuant to an insurance policy
                        for commercial or personal insurance which such person knows to contain materially false
                        information concerning any fact material thereto; or conceals, for the purpose of misleading,
                        information concerning any fact material thereto commits a fraudulent insurance act.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in KY, NY, OH and Bay person who knowingly and with intent to defraud any insurance
                        company or other person files an application for insurance or statement of claim containing any
                        materially false information or conceals for the purpose of misleading, information concerning
                        any fact material thereto commits a fraudulent insurance act, which is a crime and subjects such
                        person to criminal and civil penalties (not to exceed five thousand dollars and the stated value
                        of the claim for each such violation)*. “Applies in NY Only.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in ME, TN, VA and WIAis a crime to knowingly provide false, incomplete or misleading
                        information to an insurance company for the purpose of defrauding the company. Penalties (may)*
                        include imprisonment, fines and denial of insurance benefits. ”Applies in ME Only.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in NJAny person who includes any false or misleading information on an application
                        for an insurance policy is subject to criminal and civil penalties.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in ORAny person who knowingly and with intent to defraud or solicit another to
                        defraud the insurer by submitting an application containing a false statement as to any material
                        fact may be violating state law.
                    </p>
                    <p style="font-size: 9px; margin-top: 5px;">
                        Applicable in PRAny person who knowingly and with the intention of defrauding presents false
                        information in an insurance application, or presents, helps,

                        or causes the presentation of a fraudulent claim for the payment of a loss or any other benefit,
                        or presents more than one claim for the same damage or loss, shall incur a felony and, upon
                        conviction, shall be sanctioned for each violation by a fine of not less than five thousand
                        dollars ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term of
                        imprisonment for three (3) years, or both penalties. Should aggravating circumstances [be]
                        present, the penalty thus established may be increased to a maximum of five (5) years, if
                        extenuating circumstances are present, it may be reduced to a minimum of two (2)

                        years.
                    </p>

                </td>
            </tr>
            <tr>
                <td colspan="2">Producere Signature <br>{{ $form->history->producerSign }}</td>
                <td colspan="2">Producere Name <br> {{ $form->history->producerName }}</td>
                <td colspan="2"> State Producer license # <br> {{ $form->history->stateProducerLicense }}</td>

            </tr>
            <tr>
                <td colspan="3">Applicant Signature <br> {{ $form->history->applicantSign }}</td>
                <td colspan="1">Date <br> {{ $form->history->applicationDate }}</td>
                <td colspan="2">National Producer # <br> {{ $form->history->nationalProducer }}</td>

            </tr>
        </table>

        <div class="footer-content">
            <div class="flex-shrink-0" style="font-weight: bold; font-size: 9px;">
                ACORD 38 (2007/01)
            </div>
            <div class="footer-copyright" style=" font-weight: bold; font-size: 9px;">
                &copy; ACORD CORPORATION 1996-2007. All rights reserved.
            </div>
        </div>
        <p style="text-align: center; font-weight: bold; font-size: 9px; margin-top: 10px;">The ACORD name and logo
            are
            registered marks of ACORD</p>
    </div>
@endsection
