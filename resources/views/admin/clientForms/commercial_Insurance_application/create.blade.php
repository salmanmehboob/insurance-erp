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
        <form action="{{ route('store-commercial-insurance-application') }}" method="POST" class=" mt-4">
            @csrf

            <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">
            <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">

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
                        <p><input type="text" class="date-input" name="application_date"></p>
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
                                        <p style="margin-bottom: 5px;"><input type="text" class="date-input"
                                                name="agency_name" placeholder="Name" style="width: 100%;" /></p>
                                        <p style="margin-bottom: 5px;"><input type="text" class="date-input"
                                                name="agency_address" placeholder="Address" style="width: 100%;" />
                                        </p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-field-line" style="margin-bottom: 0; ">
                            <table style="width: 100%; border: none; ">
                                <tr>
                                    <td style="border-top: 0; border-bottom: 0; border-right: 0;">
                                        <input type="text" name="agency_city" class="date-input"
                                            placeholder="Producer City" />
                                    </td>
                                    <td style="border-top: 0; border-bottom: 0; border-left: 0;"><input
                                            style="margin-left: 5px;" class="date-input" type="text" name="agency_state"
                                            placeholder="State" /></td>
                                    <td style="border-top: 0; border-bottom: 0; border-left: 0;"><input
                                            style=" margin-left: 5px;" class="date-input" type="text"
                                            name="agency_zipcode" placeholder="ZipCode" /></td>
                                </tr>

                            </table>

                        </div>
                        <div class="form-field-line" style="margin-bottom: 0;">

                            <table style="width: 100%; ">
                                <tr>

                                    <td colspan="2">Contact : <input type="text" name="agency_contact_name"
                                            class="date-input"></td>
                                </tr>
                                <tr>

                                    <td colspan="2">Phone : <input type="text" name="agency_contact_phone_no"
                                            class="date-input"></td>
                                </tr>
                                <tr>

                                    <td colspan="2">Fax : <input type="text" name="agency_contact_fax_no"
                                            class="date-input">
                                    </td>
                                </tr>
                                <tr>


                                    <td colspan="2">Email : <input type="text" name="agency_contact_email"
                                            class="date-input">
                                    </td>
                                </tr>

                                <tr>
                                    <td>CODE : <input type="text" name="agency_code" class="date-input"></td>
                                    <td>SUBCODE : <input type="text" name="agency_sub_code" class="date-input"></td>
                                </tr>
                                <tr>

                                    <td colspan="2">AGENCY CUSTOMER ID : <input type="text" name="agency_customer_id"
                                            class="date-input"></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td style="border: 0; width: 50%;  padding: 0;">
                        <table>
                            <tr>
                                <td>CARRIER <br> <input type="text" name="carrier" class="date-input"></td>
                                <td>NAIC CODE <br> <input type="text" name="naic_code" class="date-input"></td>
                            </tr>
                            <tr>
                                <td>COMPANY POLICY OR PROGRAM NAME <br> <input type="text" name="program_name"
                                        class="date-input"></td>
                                <td>PROGRAM CODE <br> <input type="text" name="program_code" class="date-input"></td>
                            </tr>
                            <tr>
                                <td colspan="2">POLICY NUMBER <br> <input type="text" name="policy_number"
                                        class="date-input" style="width: 100%;"></td>
                            </tr>
                            <tr>
                                <td>UNDERWRITER <br> <input type="text" name="under_writer" class="date-input"></td>
                                <td>UNDERWRITER OFFICE <br> <input type="text" name="under_writer_office"
                                        class="date-input"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="padding: 0;">
                                    <table class="statusofTrans">
                                        <tr>
                                            <td>STATUS OF TRANSACTION</td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="status_quote" value="1"> QUOTE</td>
                                            <td><input type="checkbox" name="status_issue_policy" value="1"> ISSUE
                                                POLICY</td>
                                            <td><input type="checkbox" name="status_renew" value="1"> RENEW</td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"><input type="checkbox" name="status_bound"
                                                    value="1"> BOUND (Give Date and/or Attach Copy):
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="status_change" value="1"> CHANGE</td>
                                            <td> Date </td>
                                            <td> Time</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><input type="checkbox" name="status_cancel" value="1"> Cancel</td>
                                            <td> <input type="text" name="status_date" class="date-input"></td>
                                            <td>
                                                <input type="text" name="status_time" class="date-input"><br><br>
                                                <input type="radio" name="status_time_type" value="AM"> AM
                                                <input type="radio" name="status_time_type" value="PM"> PM
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
                    <td><input type="checkbox" name="boiler_machinery" value="1"> BOILER &
                        MACHINERY</td>
                    <td style="width: 7%;">$ <input type="text" name="boiler_machinery_premium_one"
                            style="width: 92%; border: 1px solid black;"></td>
                    <td><input type="checkbox" type="checkbox" name="boiler_machinery_cyber_privacy" value="1">
                        CYBER AND PRIVACY
                    </td>
                    <td>$ <input type="text" name="boiler_machinery_premium_two"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="boiler_machinery_yacht" value="1"> YACHT
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="boiler_machinery_premium_three"
                            style="width: 92%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="width: 20%;"><input type="checkbox" name="business_auto" value="1"> BUSINESS AUTO
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="business_auto_premium_one"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="business_auto_fiduciary" value="1">
                        FIDUCIARY
                        LIABILITY</td>
                    <td style="width: 15%;">$ <input type="text" name="business_auto_premium_two"
                            style="width: 92%; border: 1px solid black;"></td>
                    <td style="width: 15%;"><input type="checkbox" name="business_auto_yacht_one" value="1"> <input
                            type="text" name="business_auto_yacht_one_field"
                            style="width: 70%; border: 1px solid black;"></td>
                    <td style="width: 15%;">$ <input type="text" name="business_auto_premium_three"
                            style="width: 92%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td style="width: 20%;"><input type="checkbox" name="business_owner" value="1"> BUSINESS OWNERS
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="business_owner_premium_one"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="business_owner_garage" value="1"> GARAGE
                        AND
                        DEALERS</td>
                    <td style="width: 15%;">$ <input type="text" name="business_owner_premium_two"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="business_owner_yacht_two" value="1">
                        <input type="text" name="business_owner_yacht_two_field"
                            style="width: 70%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="business_owner_premium_three"
                            style="width: 92%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td style="width: 20%;"><input type="checkbox" name="business_commercial_gl" value="1">
                        COMMERCIAL GENERAL LIABILITY </td>
                    <td style="width: 15%;">$ <input type="text" name="business_commercial_gl_premium_one"
                            style="width: 92%; border: 1px solid black;"></td>
                    <td style="width: 15%;"><input type="checkbox" name="business_commercial_gl_liquor" value="1">
                        LIQUOR
                        LIABILITY</td>
                    <td style="width: 15%;">$ <input type="text" name="business_commercial_gl_premium_two"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="business_commercial_gl_yacht_three"
                            value="1"> <input type="text" name="business_commercial_gl_yacht_three_field"
                            style="width: 70%; border: 1px solid black;"></td>
                    <td style="width: 15%;">$ <input type="text" name="business_commercial_gl_premium_three"
                            style="width: 92%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td style="width: 20%;"><input type="checkbox" name="business_inland" value="1"> COMMERCIAL
                        INLAND MARINEY</td>
                    <td style="width: 15%;">$ <input type="text" name="business_inland_premium_one"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="business_inland_motor" value="1"> MOTOR
                        CARRIER
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="business_inland_premium_two"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="business_inland_yacht_four" value="1">
                        <input type="text" name="business_inland_yacht_four_field"
                            style="width: 70%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="business_inland_premium_three"
                            style="width: 92%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td style="width: 20%;"><input type="checkbox" name="commercial_property" value="1"> COMMERCIAL
                        PROPERTY</td>
                    <td style="width: 15%;">$ <input type="text" name="commercial_property_premium_one"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="commercial_property_trucker" value="1">
                        TRUCKERS</td>
                    <td style="width: 15%;">$ <input type="text" name="commercial_property_premium_two"
                            style="width: 92%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;"><input type="checkbox" name="commercial_property_yacht_five" value="1">
                        <input type="text" name="commercial_property_yacht_five_field"
                            style="width: 70%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="commercial_property_premium_three"
                            style="width: 92%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td style="width: 20%;"><input type="checkbox" name="crime" value="1"> CRIME</td>
                    <td style="width: 15%;">$ <input type="text" name="crime_premium_one"
                            style="width: 92%; border: 1px solid black;"></td>
                    <td style="width: 15%;"><input type="checkbox" name="crime_umbrella" value="1"> UMBRELLA</td>
                    <td style="width: 15%;">$ <input type="text" name="crime_premium_two"
                            style="width: 92%; border: 1px solid black;"></td>
                    <td style="width: 15%;"><input type="checkbox" name="crime_yacht_six" value="1"> <input
                            type="text" name="crime_yacht_six_field" style="width: 70%; border: 1px solid black;">
                    </td>
                    <td style="width: 15%;">$ <input type="text" name="crime_premium_three"
                            style="width: 92%; border: 1px solid black;"></td>

                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">ATTACHMENTS</div>
            <table>
                <tr>
                    <td><input type="checkbox" name="attachment_accounts_receivable" value="1"> ACCOUNTS RECEIVABLE
                        / VALUABLE PAPERS </td>
                    <td><input type="checkbox" name="attachment_glass_sign" value="1"> GLASS AND SIGN SECTION</td>
                    <td><input type="checkbox" name="attachment_statement" value="1"> STATEMENT / SCHEDULE OF VALUES
                    </td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_additional_interest" value="1"> ADDITIONAL INTEREST
                        SCHEDULE</td>
                    <td><input type="checkbox" name="attachment_hotel" value="1"> HOTEL / MOTEL SUPPLEMENT</td>
                    <td><input type="checkbox" name="attachment_state_supplement" value="1"> STATE SUPPLEMENT (if
                        applicable) </td>


                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_addition_premises" value="1"> ADDITIONAL PREMISES
                        INFORMATION SCHEDULE</td>
                    <td><input type="checkbox" name="attachment_installation_risk" value="1"> INSTALLATION /
                        BUILDERS RISK SECTION</td>
                    <td><input type="checkbox" name="attachment_vacant_building" value="1"> VACANT BUILDING
                        SUPPLEMENT</td>


                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_appartment_building" value="1"> APARTMENT BUILDING
                        SUPPLEMENT </td>
                    <td><input type="checkbox" name="attachment_international_liability" value="1"> INTERNATIONAL
                        LIABILITY EXPOSURE SUPPLEMENT</td>
                    <td><input type="checkbox" name="attachment_vehicle_schedule" value="1"> VEHICLE SCHEDULE</td>

                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_condo_assn" value="1"> CONDO ASSN BYLAWS (for D&O
                        Coverage only)</td>
                    <td><input type="checkbox" name="attachment_internation_property_exposer" value="1">
                        INTERNATIONAL PROPERTY EXPOSURE SUPPLEMENT</td>
                    <td><input type="checkbox" name="attachment_default_check_one" value="1"> <input type="text"
                            name="attachment_default_check_one_field" style="width: 80%; border: 1px solid black;"></td>


                </tr>

                <tr>
                    <td><input type="checkbox" name="attachment_contractors_supplement" value="1"> CONTRACTORS
                        SUPPLEMENT</td>
                    <td><input type="checkbox" name="attachment_loss_summary" value="1"> LOSS SUMMARY</td>
                    <td><input type="checkbox" name="attachment_default_check_two" value="1"> <input type="text"
                            name="attachment_default_check_two_field" style="width: 80%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_coverages_schedule" value="1"> COVERAGES SCHEDULE
                    </td>
                    <td><input type="checkbox" name="attachment_open_cargo_section" value="1"> OPEN CARGO SECTION
                    </td>
                    <td><input type="checkbox" name="attachment_default_check_three" value="1"> <input
                            type="text" name="attachment_default_check_three_field"
                            style="width: 80%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_dealers_section" value="1"> DEALERS SECTION</td>
                    <td><input type="checkbox" name="attachment_premium_payment" value="1"> PREMIUM PAYMENT
                        SUPPLEMENT</td>
                    <td><input type="checkbox" name="attachment_default_check_four" value="1"> <input
                            type="text" name="attachment_default_check_four_field"
                            style="width: 80%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_driver_infomation" value="1"> DRIVER INFORMATION
                        SCHEDULE</td>
                    <td><input type="checkbox" name="attachment_professional_liability" value="1"> PROFESSIONAL
                        LIABILITY SUPPLEMENT</td>
                    <td><input type="checkbox" name="attachment_default_check_five" value="1"> <input
                            type="text" name="attachment_default_check_five_field"
                            style="width: 80%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td><input type="checkbox" name="attachment_electronic_data" value="1"> ELECTRONIC DATA
                        PROCESSING SECTION</td>
                    <td><input type="checkbox" name="attachment_restauratt" value="1"> RESTAURANT / TAVERN
                        SUPPLEMENT</td>
                    <td><input type="checkbox" name="attachment_default_check_six" value="1"> <input type="text"
                            name="attachment_default_check_six_field" style="width: 80%; border: 1px solid black;"></td>

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
                    <td><input type="text" name="policy_proposed_eff_date"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="policy_proposed_exp_date"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                    <td style="width: 140px;"><input type="radio" name="policy_billing_plan" value="1"> Direct
                        <input type="radio" name="policy_billing_plan" value="2"> Aagency
                    </td>
                    <td><input type="text" name="policy_payment_plan" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="policy_method_of_payment"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="policy_audit" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>$ <input type="text" name="policy_deposit" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>$ <input type="text" name="policy_minimum_premium"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>$ <input type="text" name="policy_premium" style="width: 80%; border: 1px solid black;">
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
                                        <p style="margin-bottom: 5px;"><input type="text"
                                                name="appication_info_one_name"
                                                style="width: 80%; border: 1px solid black;" placeholder="Name"></p>
                                        <p style="margin-bottom: 5px;"><input type="text"
                                                name="appication_info_one_address"
                                                style="width: 80%; border: 1px solid black;" placeholder="Address"></p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-field-line" style="margin-bottom: 0; ">
                            <table style="width: 100%; border: none; ">
                                <tr>
                                    <td style="width: 70%; border:0;" colspan="2"><input type="text"
                                            name="appication_info_one_city" style="width: 80%; border: 1px solid black;"
                                            placeholder="City"></td>
                                    <td style=" border: 0;"><input type="text" name="appication_info_one_state"
                                            style="width: 45%; border: 1px solid black;" placeholder="State"> <input
                                            type="text" name="appication_info_one_zip"
                                            style="width: 45%; border: 1px solid black;" placeholder="Zip Code"></td>
                                </tr>

                            </table>

                        </div>
                    </td>
                    <td>GL CODE <input type="text" name="appication_info_one_gl_code"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>SIC <input type="text" name="appication_info_one_SIC"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>NAICS <input type="text" name="appication_info_one_NAICS"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>FEIN OR SOC SEC # <input type="text" name="appication_info_one_FEIN"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="4">BUSINESS PHONE #: <input type="text" name="appication_info_one_business_phone"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="4">WEBSITE ADDRESS <input type="text" name="appication_info_one_website"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <table class="applinfotable">
                            <tr>
                                <td><input type="checkbox" name="appication_info_one_corporation" value="1">
                                    CORPORATION</td>
                                <td><input type="checkbox" name="appication_info_one_joint_venture" value="1"> JOINT
                                    VENTURE</td>
                                <td><input type="checkbox" name="appication_info_one_not_for_profilt" value="1"> NOT
                                    FOR PROFIT ORG </td>
                                <td><input type="checkbox" name="appication_info_one_subchapter" value="1">
                                    SUBCHAPTER "S" CORPORATION </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="appication_info_one_individual" value="1">
                                    INDIVIDUAL</td>
                                <td style="display: flex;"><input type="checkbox" name="appication_info_one_llc_check"
                                        style="margin-right: 5px;"> LLC
                                    <div style="margin-left: 5px;">NO. OF MEMBERS <br> AND MANAGERS</div>
                                    <div style="margin-left: 5px;"> <br><input type="text"
                                            name="appication_info_one_llc_check_field"
                                            style="width: 80%; border: 1px solid black;"></div>
                                </td>
                                <td><input type="checkbox" name="appication_info_one_partnership" value="1">
                                    PARTNERSHIP </td>
                                <td><input type="checkbox" name="appication_info_one_trust" value="1"> TRUST </td>
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
                                        <p style="margin-bottom: 5px;"><input type="text"
                                                name="appication_info_two_name"
                                                style="width: 80%; border: 1px solid black;" placeholder="Name"></p>
                                        <p style="margin-bottom: 5px;"><input type="text"
                                                name="appication_info_two_address"
                                                style="width: 80%; border: 1px solid black;" placeholder="Address"></p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-field-line" style="margin-bottom: 0; ">
                            <table style="width: 100%; border: none; ">
                                <tr>
                                    <td style="width: 70%; border:0;" colspan="2"><input type="text"
                                            name="appication_info_two_city" style="width: 80%; border: 1px solid black;"
                                            placeholder="City"></td>
                                    <td style=" border: 0;"><input type="text" name="appication_info_two_state"
                                            style="width: 45%; border: 1px solid black;" placeholder="State"> <input
                                            type="text" name="appication_info_two_zip"
                                            style="width: 45%; border: 1px solid black;" placeholder="Zip Code"></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>GL CODE <input type="text" name="appication_info_two_gl_code"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>SIC <input type="text" name="appication_info_two_SIC"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>NAICS <input type="text" name="appication_info_two_NAICS"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>FEIN OR SOC SEC # <input type="text" name="appication_info_two_FEIN"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="4">BUSINESS PHONE #: <input type="text" name="appication_info_two_business_phone"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="4">WEBSITE ADDRESS <input type="text" name="appication_info_two_website"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <table class="applinfotable">
                            <tr>
                                <td><input type="checkbox" name="appication_info_two_corporation" value="1">
                                    CORPORATION</td>
                                <td><input type="checkbox" name="appication_info_two_joint_venture" value="1"> JOINT
                                    VENTURE</td>
                                <td><input type="checkbox" name="appication_info_two_not_for_profilt" value="1"> NOT
                                    FOR PROFIT ORG </td>
                                <td><input type="checkbox" name="appication_info_two_subchapter" value="1">
                                    SUBCHAPTER "S" CORPORATION </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="appication_info_two_individual" value="1">
                                    INDIVIDUAL</td>
                                <td style="display: flex;"><input type="checkbox" name="appication_info_two_llc_check"
                                        value="1" style="margin-right: 5px;"> LLC
                                    <div style="margin-left: 5px;">NO. OF MEMBERS <br> AND MANAGERS</div>
                                    <div style="margin-left: 5px;"> <br><input type="text"
                                            name="appication_info_two_llc_check_field"
                                            style="width: 80%; border: 1px solid black;"></div>
                                </td>
                                <td><input type="checkbox" name="appication_info_two_partnership" value="1">
                                    PARTNERSHIP </td>
                                <td><input type="checkbox" name="appication_info_two_trust" value="1"> TRUST </td>
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
                                        <p style="margin-bottom: 5px;"><input type="text"
                                                name="appication_info_three_name"
                                                style="width: 80%; border: 1px solid black;" placeholder="Name"></p>
                                        <p style="margin-bottom: 5px;"><input type="text"
                                                name="appication_info_three_address"
                                                style="width: 80%; border: 1px solid black;" placeholder="Address"></p>
                                    </td>
                                </tr>
                            </table>
                        </div>

                        <div class="form-field-line" style="margin-bottom: 0; ">
                            <table style="width: 100%; border: none; ">
                                <tr>
                                    <td style="width: 70%; border:0;" colspan="2"><input type="text"
                                            name="appication_info_three_city" style="width: 80%; border: 1px solid black;"
                                            placeholder="City"></td>
                                    <td style=" border: 0;"><input type="text" name="appication_info_three_state"
                                            style="width: 45%; border: 1px solid black;" placeholder="State"> <input
                                            type="text" name="appication_info_three_zip"
                                            style="width: 45%; border: 1px solid black;" placeholder="Zip Code"></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>GL CODE <input type="text" name="appication_info_three_gl_code"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>SIC <input type="text" name="appication_info_three_SIC"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>NAICS <input type="text" name="appication_info_three_NAICS"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>FEIN OR SOC SEC # <input type="text" name="appication_info_three_FEIN"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="4">BUSINESS PHONE #: <input type="text"
                            name="appication_info_three_business_phone" style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="4">WEBSITE ADDRESS <input type="text" name="appication_info_three_website"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <table class="applinfotable">
                            <tr>
                                <td><input type="checkbox" name="appication_info_three_corporation" value="1">
                                    CORPORATION</td>
                                <td><input type="checkbox" name="appication_info_three_joint_venture" value="1">
                                    JOINT VENTURE</td>
                                <td><input type="checkbox" name="appication_info_three_not_for_profilt" value="1">
                                    NOT FOR PROFIT ORG </td>
                                <td><input type="checkbox" name="appication_info_three_subchapter" value="1">
                                    SUBCHAPTER "S" CORPORATION </td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="appication_info_three_individual" value="1">
                                    INDIVIDUAL</td>
                                <td style="display: flex;"><input type="checkbox" name="appication_info_three_llc_check"
                                        value="1" style="margin-right: 5px;"> LLC
                                    <div style="margin-left: 5px;">NO. OF MEMBERS <br> AND MANAGERS</div>
                                    <div style="margin-left: 5px;"> <br><input type="text"
                                            name="appication_info_three_llc_check_field"
                                            style="width: 80%; border: 1px solid black;"></div>
                                </td>
                                <td><input type="checkbox" name="appication_info_three_partnership" value="1">
                                    PARTNERSHIP </td>
                                <td><input type="checkbox" name="appication_info_three_trust" value="1"> TRUST </td>
                                <td></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Contact Information </div>
            <table>
                <tr>
                    <td colspan="2">CONTACT TYPE: <input type="text" name="contact_info_c_type_one"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2">CONTACT TYPE: <input type="text" name="contact_info_c_type_two"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">CONTACT NAME: <input type="text" name="contact_info_name_one"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2">CONTACT NAME: <input type="text" name="contact_info_name_two"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>

                <tr>
                    <td>
                        <div>Primary Phone : </div><input type="radio" name="contact_info_primary_one" value="1">
                        Home <input type="radio" name="contact_info_primary_one" value="2"> Buss <input
                            type="radio" name="contact_info_primary_one" value="3"> <span>Cell</span>
                        <br> <input type="text" name="contact_info_primary_phone_one"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>
                        <div>Secondary Phone : </div><input type="radio" name="contact_info_secondary_one"
                            value="1"> Home <input type="radio" name="contact_info_secondary_one" value="2">
                        Buss <input type="radio" name="contact_info_secondary_one" value="3"> Cell
                        <br><input type="text" name="contact_info_secondary_phone_one"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>
                        <div>Primary Phone : </div><input type="radio" name="contact_info_primary_two" value="1">
                        Home <input type="radio" name="contact_info_primary_two" value="2"> Buss <input
                            type="radio" name="contact_info_primary_two" value="3"> <span>Cell</span>
                        <br> <input type="text" name="contact_info_primary_phone_two"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>
                        <div>Secondary Phone : </div><input type="radio" name="contact_info_secondary_two"
                            value="1"> Home <input type="radio" name="contact_info_secondary_two" value="2">
                        Buss <input type="radio" name="contact_info_secondary_two" value="3"> Cell
                        <br><input type="text" name="contact_info_secondary_phone_two"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Primary Email Address: <input type="text" name="contact_info_primary_email_one"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2">Primary Email Address: <input type="text"
                            name="contact_info_secondary_email_one" style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td colspan="2">Secondary Email Address: <input type="text"
                            name="contact_info_primary_email_two" style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2">Secondary Email Address: <input type="text"
                            name="contact_info_secondary_email_two" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">PREMISES information (Attach accord 823 for
                Additional premises) </div>
            <table>
                <tr>
                    <td rowspan="2">LOC # <input type="text" name="prem_info_s1_r1_loc"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td style="width: 30%;" colspan="2" rowspan="2">STREET <br><input type="text"
                            name="prem_info_s1_r1_street" style="width: 100%; border: 1px solid black;"></td>
                    <td>CITY LIMITS </td>
                    <td>INTEREST</td>
                    <td rowspan="2"># FULL TIME EMPL <input type="text" name="prem_info_s1_r1_ftEmployee"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>ANNUAL REVENUES: $ <input type="text" name="prem_info_s1_r1_annual_rev"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="prem_info_s1_r1_inside" value="1"> INSIDE</td>
                    <td><input type="checkbox" name="prem_info_s1_r1_owner" value="1"> OWNER</td>
                    <td>OCCUPIED AREA <span style="float: right;"><input type="text"
                                name="prem_info_s1_r1_occupied_area" style="width: 80%; border: 1px solid black;">
                            Sqft</span></td>
                </tr>
                <tr>
                    <td rowspan="2">BLD # <input type="text" name="prem_info_s1_r2_bld"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>CITY: <input type="text" name="prem_info_s1_r2_city"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>State: <input type="text" name="prem_info_s1_r2_state"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s1_r2_outside" value="1"> OUTSIDE</td>
                    <td><input type="checkbox" name="prem_info_s1_r2_tenant" value="1"> TENANT</td>
                    <td rowspan="2"># PART TIME EMPL <input type="text" name="prem_info_s1_r2_partTEmp"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>OPEN TO PUBLIC AREA <span style="float: right;"> <input type="text"
                                name="prem_info_s1_r2_pubArea" style="width: 80%; border: 1px solid black;"> Sqft</span>
                    </td>
                </tr>
                <tr>
                    <td>COUNTY: <input type="text" name="prem_info_s1_r2_country"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>ZIP: <input type="text" name="prem_info_s1_r2_zip"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s1_r2_otherCheck_one" value="1"> <input
                            type="text" name="prem_info_s1_r2_otherCheckField_one"
                            style="width: 79%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s1_r2_otherCheck_two" value="1"> <input
                            type="text" name="prem_info_s1_r2_otherCheckField_two"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>TOTAL BUILDING AREA <span style="float: right;"> <input type="text"
                                name="prem_info_s1_r2_totalBArea" style="width: 80%; border: 1px solid black;">Sqft</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">DESCRIPTION OF OPERATIONS: <input type="text" name="prem_info_s1_description"
                            style="width: 100%; border: 1px solid black;"></td>
                    <td>ANY AREA LEASED TO OTHERS? Y/N <input type="text" name="prem_info_s1_leased"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>

                <tr>
                    <td rowspan="2">LOC # <input type="text" name="prem_info_s2_r1_loc"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td style="width: 30%;" colspan="2" rowspan="2">STREET <br><input type="text"
                            name="prem_info_s2_r1_street" style="width: 100%; border: 1px solid black;"></td>
                    <td>CITY LIMITS </td>
                    <td>INTEREST</td>
                    <td rowspan="2"># FULL TIME EMPL <input type="text" name="prem_info_s2_r1_ftEmployee"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>ANNUAL REVENUES: $ <input type="text" name="prem_info_s2_r1_annual_rev"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="prem_info_s2_r1_inside" value="1"> INSIDE</td>
                    <td><input type="checkbox" name="prem_info_s2_r1_owner" value="1"> OWNER</td>
                    <td>OCCUPIED AREA <span style="float: right;"><input type="text"
                                name="prem_info_s2_r1_occupied_area" style="width: 80%; border: 1px solid black;">
                            Sqft</span></td>
                </tr>
                <tr>
                    <td rowspan="2">BLD # <input type="text" name="prem_info_s2_r2_bld"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>CITY: <input type="text" name="prem_info_s2_r2_city"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>State: <input type="text" name="prem_info_s2_r2_state"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s2_r2_outside" value="1"> OUTSIDE</td>
                    <td><input type="checkbox" name="prem_info_s2_r2_tenant" value="1"> TENANT</td>
                    <td rowspan="2"># PART TIME EMPL <input type="text" name="prem_info_s2_r2_partTEmp"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>OPEN TO PUBLIC AREA <span style="float: right;"> <input type="text"
                                name="prem_info_s2_r2_pubArea" style="width: 80%; border: 1px solid black;"> Sqft</span>
                    </td>
                </tr>
                <tr>
                    <td>COUNTY: <input type="text" name="prem_info_s2_r2_country"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>ZIP: <input type="text" name="prem_info_s2_r2_zip"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s2_r2_otherCheck_one" value="1"> <input
                            type="text" name="prem_info_s2_r2_otherCheckField_one"
                            style="width: 79%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s2_r2_otherCheck_two" value="1"> <input
                            type="text" name="prem_info_s2_r2_otherCheckField_two"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>TOTAL BUILDING AREA <span style="float: right;"> <input type="text"
                                name="prem_info_s2_r2_totalBArea" style="width: 80%; border: 1px solid black;">Sqft</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">DESCRIPTION OF OPERATIONS: <input type="text" name="prem_info_s2_description"
                            style="width: 100%; border: 1px solid black;"></td>
                    <td>ANY AREA LEASED TO OTHERS? Y/N <input type="text" name="prem_info_s2_leased"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>

                <tr>
                    <td rowspan="2">LOC # <input type="text" name="prem_info_s3_r1_loc"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td style="width: 30%;" colspan="2" rowspan="2">STREET <br><input type="text"
                            name="prem_info_s3_r1_street" style="width: 100%; border: 1px solid black;"></td>
                    <td>CITY LIMITS </td>
                    <td>INTEREST</td>
                    <td rowspan="2"># FULL TIME EMPL <input type="text" name="prem_info_s3_r1_ftEmployee"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>ANNUAL REVENUES: $ <input type="text" name="prem_info_s3_r1_annual_rev"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="prem_info_s3_r1_inside" value="1"> INSIDE</td>
                    <td><input type="checkbox" name="prem_info_s3_r1_owner" value="1"> OWNER</td>
                    <td>OCCUPIED AREA <span style="float: right;"><input type="text"
                                name="prem_info_s3_r1_occupied_area" style="width: 80%; border: 1px solid black;">
                            Sqft</span></td>
                </tr>
                <tr>
                    <td rowspan="2">BLD # <input type="text" name="prem_info_s3_r2_bld"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>CITY: <input type="text" name="prem_info_s3_r2_city"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>State: <input type="text" name="prem_info_s3_r2_state"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s3_r2_outside" value="1"> OUTSIDE</td>
                    <td><input type="checkbox" name="prem_info_s3_r2_tenant" value="1"> TENANT</td>
                    <td rowspan="2"># PART TIME EMPL <input type="text" name="prem_info_s3_r2_partTEmp"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>OPEN TO PUBLIC AREA <span style="float: right;"> <input type="text"
                                name="prem_info_s3_r2_pubArea" style="width: 80%; border: 1px solid black;"> Sqft</span>
                    </td>
                </tr>
                <tr>
                    <td>COUNTY: <input type="text" name="prem_info_s3_r2_country"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>ZIP: <input type="text" name="prem_info_s3_r2_zip"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s3_r2_otherCheck_one" value="1"> <input
                            type="text" name="prem_info_s3_r2_otherCheckField_one"
                            style="width: 79%; border: 1px solid black;"></td>
                    <td><input type="checkbox" name="prem_info_s3_r2_otherCheck_two" value="1"> <input
                            type="text" name="prem_info_s3_r2_otherCheckField_two"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>TOTAL BUILDING AREA <span style="float: right;"> <input type="text"
                                name="prem_info_s3_r2_totalBArea"
                                style="width: 80%; border: 1px solid black;">Sqft</span></td>
                </tr>
                <tr>
                    <td colspan="6">DESCRIPTION OF OPERATIONS: <input type="text"
                            name="prem_info_s3_description" style="width: 100%; border: 1px solid black;"></td>
                    <td>ANY AREA LEASED TO OTHERS? Y/N <input type="text" name="prem_info_s3_leased"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">NATURE OF BUSINESS </div>
            <table>
                <tr>
                    <td style="border-bottom: 0; border-right: 0;"><input type="checkbox" name="natureB_apartments"
                            value="1"> APARTMENTS</td>
                    <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                            name="natureB_contractor" value="1"> CONTRACTOR
                    </td>
                    <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                            name="natureB_manufacturing" value="1"> MANUFACTURING
                    </td>
                    <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                            name="natureB_restaurant" value="1"> RESTAURANT
                    </td>
                    <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                            name="natureB_service" value="1"> SERVICE</td>
                    <td style="border-bottom: 0; border-left: 0; border-right: 0;"><input type="checkbox"
                            name="natureB_otherCheck" value="1"> <input type="text"
                            name="natureB_otherCheck_field" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td rowspan="2">DATE BUSINESS <br>
                        STARTED <input type="text" name="natureB_dateBusiness"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td style="border-top: 0; border-right: 0; "><input type="checkbox" name="natureB_condomin"
                            value="1"> CONDOMINIUMS</td>
                    <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                            name="natureB_institutional" value="1"> INSTITUTIONAL
                    </td>
                    <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                            name="natureB_office" value="1"> OFFICE</td>
                    <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                            name="natureB_retail" value="1"> RETAIL</td>
                    <td style="border-top: 0; border-right: 0; border-left: 0;"><input type="checkbox"
                            name="natureB_wholesale" value="1"> WHOLESALE</td>
                    <td style="border-top: 0; border-left: 0;"></td>
                </tr>
                <tr>
                    <td style="border-bottom: 0;" colspan="7">DESCRIPTION OF PRIMARY OPERATIONS </td>
                </tr>
                <tr>
                    <td style="border-top: 0; height: 100px;" colspan="7">
                        <textarea rows="8" style="width: 100%; border: 1px solid black;" name="natureB_primary_description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td style="border: 0; padding: 0;" colspan="7">
                        <table>
                            <tr>
                                <td style="border-top: 0;"><br>RETAIL STORES OR SERVICE OPERATIONS % OF TOTAL SALES:
                                    <input type="text" name="natureB_retailStore"
                                        style="width: 80%; border: 1px solid black;">
                                </td>
                                <td style="border-top: 0;">INSTALLATION, SERVICE OR REPAIR WORK <br>
                                    <input type="text" name="natureB_installationService"
                                        style="width: 80%; border: 1px solid black;"> %
                                </td>
                                <td style="border-top: 0;">OFF PREMISES INSTALLATION, SERVICE OR REPAIR WORK <br>
                                    <input type="text" name="natureB_premisesInstallation"
                                        style="width: 80%; border: 1px solid black;"> %
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
                        <textarea rows="8" style="width: 100%; border: 1px solid black;" name="natureB_operationDescription"></textarea>
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
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS <input type="text"
                                    name="addit_nameAddress" style="width: 80%; border: 1px solid black;"></span>
                            <span class="label" style="font-weight: bold; margin-left: 10px;">RANK: </span>
                            <input type="text" name="addit_Rank" style="width: 80%; border: 1px solid black;">
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
                                <input type="checkbox" name="addit_additionalInsured" value="1">
                                <label>ADDITIONAL INSURED </label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_beachWarranty" value="1">
                                <label>BREACH OF WARRANTY</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_coOwner" value="1">
                                <label>CO-OWNER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_employeeLessor" value="1">
                                <label>EMPLOYEE AS LESSOR</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_leasebackOwner" value="1">
                                <label>LEASEBACK OWNER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_lenderLoss" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_otherCheck" value="1"> <input type="text"
                                    name="addit_otherCheckField" style="width: 80%; border: 1px solid black;">
                            </div>
                        </div>

                    </td>
                    <td style="width: 15%;  border-top: 0;  border-left: 0;" class="interest-cell" rowspan="3">
                        <!-- <div class="title"></div> -->

                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_lienholder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_lossPayee" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_mortgagee" value="1">
                                <label>MORTGAGEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_owner" value="1">
                                <label>OWNER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_registrant" value="1">
                                <label>REGISTRANT</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="addit_trustee" value="1">
                                <label>TRUSTEE</label>
                            </div>

                    </td>
                    <td colspan="4" style="height: 119px; position: relative;  border-top: 0;">

                        <div>
                            EVIDENCE: <input type="checkbox" name="addit_eviCertificate" value="1"> CERTIFICATE
                            <input type="checkbox" name="addit_eviPolicy" value="1"> POLICY <input
                                type="checkbox" name="addit_eviSendBill" value= "1"> Send Bill
                        </div>

                        <div style="position: absolute; bottom: 5px; width: 95%;">
                            <div class="field-row" style="margin-top: 0;">
                                <span class="label" style="font-weight: bold;">REFERENCE / LOAN #:</span>
                                <input type="text" name="addit_reference"
                                    style="width: 80%; border: 1px solid black;">
                            </div>
                        </div>
                    </td>
                    <td colspan="2" rowspan="2" style="padding: 0;  border-top: 0;">

                        <table class="nested-table">
                            <tr>
                                <td style="border-left: 0;">
                                    <span class="label">LOCATION: <input type="text" name="addit_location"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                                <td style="border-right: 0;">
                                    <span class="label">BUILDING: <input type="text" name="addit_building"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-left: 0;">
                                    <span class="label">VEHICLE: <input type="text" name="addit_vehicle"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                                <td style="border-right: 0;">
                                    <span class="label">BOAT: <input type="text" name="addit_boat"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-left: 0;">
                                    <span class="label">AIRPORT: <input type="text" name="addit_airport"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                                <td style="border-right: 0;">
                                    <span class="label">AIRCRAFT: <input type="text" name="addit_aircraft"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td style="border-left: 0;">
                                    <span class="label">ITEM CLASS: <input type="text" name="addit_itemclass"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                                <td style="border-right: 0;">
                                    <span class="label">ITEM: <input type="text" name="addit_item"
                                            style="width: 80%; border: 1px solid black;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="border-left: 0; border-right: 0; border-bottom: 0;">
                                    <span class="label">ITEM Description:</span> <br>
                                    <textarea rows="6" name="addit_itemDescription" style="width: 100%; border: 1px solid black;"></textarea>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">REFERENCE / LOAN #: <br> <input type="text" name="addit_refLoan"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2">INTEREST END DATE: <br> <input type="text" name="addit_interestEDate"
                            style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">LIEN AMOUNT: <br> <input type="text" name="addit_lienAmount"
                            style="width: 80%; border: 1px solid black;"> </td>
                    <td colspan="2">PHONE (A/C, No, Ext): <br> <input type="text" name="addit_phone"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2"><span class="label">Fax (A/C No.): <br> <input type="text"
                                name="addit_fax" style="width: 80%; border: 1px solid black;"></span>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">Reason for Insterest <input type="text" name="addit_reasonFInterest"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="3">E-MAIL ADDRESS: <input type="text" name="addit_emailAdd"
                            style="width: 80%; border: 1px solid black;"></td>
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
                                    <td>PARENT COMPANY NAME <br> <input type="text"
                                            name="generalInfo_q1A_parentCompany"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td>RELATIONSHIP DESCRIPTION <br> <input type="text"
                                            name="generalInfo_q1A_Relationship"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td>% OWNED <br> <input type="text" name="generalInfo_q1A_owned"
                                            style="width: 80%; border: 1px solid black;"></td>
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
                                    <td>PARENT COMPANY NAME <br> <input type="text"
                                            name="generalInfo_q1B_parentCompany"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td>RELATIONSHIP DESCRIPTION <br> <input type="text"
                                            name="generalInfo_q1B_Relationship"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td>% OWNED <br> <input type="text" name="generalInfo_q1B_owned"
                                            style="width: 80%; border: 1px solid black;"></td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            2. IS A FORMAL SAFETY PROGRAM IN OPERATION? <br>
                            <input type="radio" name="generalInfo_q2" value="1"> SAFETY MANUAL <input
                                type="radio" name="generalInfo_q2" value="2"> SAFETY POSITION <input
                                type="radio" name="generalInfo_q2" value="3"> MONTHLY MEETINGS <input
                                type="radio" name="generalInfo_q2" value="4"> OSHA <input type="radio"
                                name="generalInfo_q2" value="5">
                            OTHER
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>
                            3. ANY EXPOSURE TO FLAMMABLES, EXPLOSIVES, CHEMICALS? <br> <input type="text"
                                name="generalInfo_q3_explosive" style="width: 100%; border: 1px solid black;">
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
                                        <td><input type="text" name="generalInfo_q4_t1r1_lBusiness"
                                                style="width: 80%; border: 1px solid black;"></td>
                                        <td><input type="text" name="generalInfo_q4_t1r1_policy"
                                                style="width: 80%; border: 1px solid black;"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="generalInfo_q4_t1r2_lBusiness"
                                                style="width: 80%; border: 1px solid black;"></td>
                                        <td><input type="text" name="generalInfo_q4_t1r2_policy"
                                                style="width: 80%; border: 1px solid black;"></td>
                                    </tr>
                                </table>
                                <table style="width: 48%;">
                                    <tr>
                                        <td style="font-size: 9px;"> <b>LINE OF BUSINESS</b></td>
                                        <td style="font-size: 9px;"> <b>POLICY NUMBER</b></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="generalInfo_q4_t2r1_lBusiness"
                                                style="width: 80%; border: 1px solid black;"></td>
                                        <td><input type="text" name="generalInfo_q4_t2r1_policy"
                                                style="width: 80%; border: 1px solid black;"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="generalInfo_q4_t2r2_lBusiness"
                                                style="width: 80%; border: 1px solid black;"></td>
                                        <td><input type="text" name="generalInfo_q4_t2r2_policy"
                                                style="width: 80%; border: 1px solid black;"></td>
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
                            <br><br> <input type="radio" name="generalInfo_q5" value="1"> NON-PAYMENT <input
                                type="radio" name="generalInfo_q5" value="2"> AGENT NO LONGER
                            REPRESENTS
                            CARRIER <input type="radio" name="generalInfo_q5" value="3"> OTHER <br><br>
                            <input type="radio" name="generalInfo_q5" value="4"> NON-RENEWAL <input
                                type="radio" name="generalInfo_q5" value="5"> UNDERWRITING <input
                                type="radio" name="generalInfo_q5" value="6">
                            CONDITION CORRECTED (Describe):
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="height: 50px;">
                            6. ANY PAST LOSSES OR CLAIMS RELATING TO SEXUAL ABUSE OR MOLESTATION ALLEGATIONS, DISCRIMINATION
                            OR NEGLIGENT HIRING? <br>
                            <textarea rows="4" name="generalInfo_q6" style="width: 100%; border: 1px solid black;"></textarea>
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
                            <input type="text" name="generalInfo_q7" style="width: 80%; border: 1px solid black;">
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
                                    <td><input type="text" name="generalInfo_q8_r1_occurDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q8_r1_explanation"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q8_r1_resolution"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q8_r1_resolveDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="generalInfo_q8_r2_occurDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q8_r2_explanation"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q8_r2_resolution"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q8_r2_resolveDate"
                                            style="width: 80%; border: 1px solid black;"></td>
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
                                    <td><input type="text" name="generalInfo_q9_r1_occurDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q9_r1_explanation"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q9_r1_resolution"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q9_r1_resolveDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="generalInfo_q9_r2_occurDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q9_r2_explanation"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q9_r2_resolution"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q9_r2_resolveDate"
                                            style="width: 80%; border: 1px solid black;"></td>
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
                                    <td><input type="text" name="generalInfo_q10_r1_occurDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q10_r1_explanation"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q10_r1_resolution"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q10_r1_resolveDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="generalInfo_q10_r2_occurDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q10_r2_explanation"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q10_r2_resolution"
                                            style="width: 80%; border: 1px solid black;"></td>
                                    <td><input type="text" name="generalInfo_q10_r2_resolveDate"
                                            style="width: 80%; border: 1px solid black;"></td>
                                </tr>
                            </table>
                        </td>
                        <td></td>
                    </tr>

                    <tr>
                        <td>
                            11. HAS BUSINESS BEEN PLACED IN A TRUST? <span
                                style="margin-left: 10px; font-weight: 600;">Name
                                of the trust:</span> <br> <input type="text" name="generalInfo_q11"
                                style="width: 80%; border: 1px solid black;">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            12. ANY FOREIGN OPERATIONS, FOREIGN PRODUCTS DISTRIBUTED IN USA, OR US PRODUCTS SOLD/DISTRIBUTED
                            IN FOREIGN COUNTRIES?
                            <br> <span style="font-size: 8px;">(If \"YES\", attach ACORD 815 for Liability Exposure and/or
                                ACORD 816 for Property Exposure)</span><br> <input type="text" name="generalInfo_q12"
                                style="width: 80%; border: 1px solid black;">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            13. DOES APPLICANT HAVE OTHER BUSINESS VENTURES FOR WHICH COVERAGE IS NOT REQUESTED?<br> <input
                                type="text" name="generalInfo_q13" style="width: 80%; border: 1px solid black;">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            14. DOES APPLICANT OWN / LEASE / OPERATE ANY DRONES? (If \"YES\", describe use)<br> <input
                                type="text" name="generalInfo_q14" style="width: 80%; border: 1px solid black;">
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            15. DOES APPLICANT HIRE OTHERS TO OPERATE DRONES? (If \"YES\", describe use)<br> <input
                                type="text" name="generalInfo_q15" style="width: 80%; border: 1px solid black;">
                        </td>
                        <td></td>
                    </tr>

                </tbody>
            </table>
            <div class="page-break"></div>
            <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID : <input
                    type="text" name="agencyID" style="width: 40%; border: 1px solid black;"></p>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">REMARKS / PROCESSING INSTRUCTIONS (ACORD
                101,
                Additional Remarks Schedule, may be attached if more space is required)</div>
            <table>
                <tr>
                    <td colspan="6" style="height: 100px;">
                        <textarea rows="8" style="width: 100%; border: 1px solid black;" name="remarksInstruction"></textarea>
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
                    <td rowspan="5"><input type="text" name="priorCI_r1_year"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>CARRIER</td>
                    <td><input type="text" name="priorCI_r1_gl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r1_autmob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r1_property" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r1_other" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td>POLICY NUMBER</td>
                    <td><input type="text" name="priorCI_r1_pgl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r1_pautomob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r1_pproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r1_pother" style="width: 80%; border: 1px solid black;">
                    </td>

                </tr>
                <tr>
                    <td>PREMIUM</td>
                    <td>$ <input type="text" name="priorCI_r1_pRgl" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>$ <input type="text" name="priorCI_r1_pRautomob"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>$ <input type="text" name="priorCI_r1_pRproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>$ <input type="text" name="priorCI_r1_pRother"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td>EFFECTIVE DATE</td>
                    <td><input type="text" name="priorCI_r1_egl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r1_eautomob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r1_eproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r1_eother" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td>EXPIRATION DATE</td>
                    <td><input type="text" name="priorCI_r1_exgl" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r1_exautomob"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r1_exproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r1_exother" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>


                <tr>
                    <td rowspan="5"><input type="text" name="priorCI_r2_year"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>CARRIER</td>
                    <td><input type="text" name="priorCI_r2_gl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r2_autmob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r2_property" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r2_other" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td>POLICY NUMBER</td>
                    <td><input type="text" name="priorCI_r2_pgl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r2_pautomob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r2_pproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r2_pother" style="width: 80%; border: 1px solid black;">
                    </td>

                </tr>
                <tr>
                    <td>PREMIUM</td>
                    <td>$ <input type="text" name="priorCI_r2_pRgl" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>$ <input type="text" name="priorCI_r2_pRautomob"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>$ <input type="text" name="priorCI_r2_pRproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>$ <input type="text" name="priorCI_r2_pRother"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td>EFFECTIVE DATE</td>
                    <td><input type="text" name="priorCI_r2_egl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r2_eautomob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r2_eproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r2_eother" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td>EXPIRATION DATE</td>
                    <td><input type="text" name="priorCI_r2_exgl" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r2_exautomob"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r2_exproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r2_exother" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>


                <tr>
                    <td rowspan="5"><input type="text" name="priorCI_r3_year"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>CARRIER</td>
                    <td><input type="text" name="priorCI_r3_gl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r3_autmob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r3_property" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r3_other" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td>POLICY NUMBER</td>
                    <td><input type="text" name="priorCI_r3_pgl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r3_pautomob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r3_pproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r3_pother" style="width: 80%; border: 1px solid black;">
                    </td>

                </tr>
                <tr>
                    <td>PREMIUM</td>
                    <td>$ <input type="text" name="priorCI_r3_pRgl" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td>$ <input type="text" name="priorCI_r3_pRautomob"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>$ <input type="text" name="priorCI_r3_pRproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td>$ <input type="text" name="priorCI_r3_pRother"
                            style="width: 80%; border: 1px solid black;"></td>
                </tr>
                <tr>
                    <td>EFFECTIVE DATE</td>
                    <td><input type="text" name="priorCI_r3_egl" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r3_eautomob" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r3_eproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r3_eother" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td>EXPIRATION DATE</td>
                    <td><input type="text" name="priorCI_r3_exgl" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="priorCI_r3_exautomob"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r3_exproperty"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="priorCI_r3_exother" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">LOSS HISTORY <span><input type="checkbox"
                        name="lossHistory" value="1" style="margin-left: 20px;"> Check if none (Attach Loss
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
                    <td colspan="3">TOTAL LOSSES: $ <input type="text" name="totalLose"
                            style="width: 80%; border: 1px solid black;"></td>
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
                    <td><input type="text" name="lossH_r1_dateOccup" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r1_line" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r1_type" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r1_dateClaim" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r1_amountPaid" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r1_ammountReserved"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r1_subro" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r1_clainOpen" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="lossH_r2_dateOccup" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r2_line" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r2_type" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r2_dateClaim" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r2_amountPaid" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r2_ammountReserved"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r2_subro" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r2_clainOpen" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
                <tr>
                    <td><input type="text" name="lossH_r3_dateOccup" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r3_line" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r3_type" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r3_dateClaim" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r3_amountPaid" style="width: 80%; border: 1px solid black;">
                    </td>
                    <td><input type="text" name="lossH_r3_ammountReserved"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r3_subro" style="width: 80%; border: 1px solid black;"></td>
                    <td><input type="text" name="lossH_r3_clainOpen" style="width: 80%; border: 1px solid black;">
                    </td>
                </tr>
            </table>
            <div class="page-break"></div>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Signature</div>
            <table>
                <tr>
                    <td colspan="6"><input type="checkbox" name="signatureCheck" value="1"> Copy of the
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
                            Applicant Initials : <input type="text" name="applicantInitials"
                                style="width: 80%; border: 1px solid black;">
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
                    <td colspan="2">Producere Signature <br><input type="text" name="producerSign"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2">Producere Name <br> <input type="text" name="producerName"
                            style="width: 80%; border: 1px solid black;"> </td>
                    <td colspan="2"> State Producer license # <br> <input type="text"
                            name="stateProducerLicense" style="width: 80%; border: 1px solid black;"></td>

                </tr>
                <tr>
                    <td colspan="3">Applicant Signature <br> <input type="text" name="applicantSign"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="1">Date <br> <input type="text" name="applicationDate"
                            style="width: 80%; border: 1px solid black;"></td>
                    <td colspan="2">National Producer # <br> <input type="text" name="nationalProducer"
                            style="width: 80%; border: 1px solid black;"></td>

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

            <div class="row mt-12 mt-3 ">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                    <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
                </div>
            </div>

        </form>
    </div>
@endsection
