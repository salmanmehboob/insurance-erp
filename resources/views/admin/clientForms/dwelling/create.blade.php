@extends('admin.layouts.form')
@push('styles')
    <style>
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
            width: 100%;
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
            font-size: 6pt;
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

<form action="{{ route('store-dwelling-application') }}" method="POST" class=" mt-4">
    @csrf

    <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">
    <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">

    <div class="form-container">
        <div class="flex justify-between items-end">
            <div class="text-xs font-bold mr-4 flex-shrink-0" style="font-size: 9pt;">
                <img src="{{ asset('backend/img/acord-logo.png') }}" alt="ACORD Logo"
                        class="acord-logo inline-block align-middle" style="width: 100%;height: 52px;">

            </div>
            <div class="flex-grow header-title">
                <span style="font-size: 16px;">Dwelling Fire Appplication</span>
            </div>
            <div class="text-right flex-shrink-0 ml-4" style="border:1px solid #000; padding: 1px 5px;">
                <div class="" style="text-align: center;">
                    <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                    <p><input type="text" name="invoideDate" class="date-input" style="font-size: 8pt;"></p>
                </div>
            </div>
        </div>
        <table class="">
            <tr>
                <td style="border: 0; width: 50%; padding: 0;">
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td rowspan="2" style="border-bottom: 0; height: 90px;">
                                    <p style="margin-bottom: 10px;">New Agency</p>
                                    <p style="margin-bottom: 5px;"><input type="text" name="agency_name"
                                            placeholder="Agency Name" class="date-input"></p>
                                    <p style="margin-bottom: 5px;"><textarea rows="5" name="agency_address"
                                            placeholder="Agency Address" class="date-input"></textarea></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border-top: 0; border-bottom: 0; border-right: 0;" colspan="2">
                                    <input type="text" name="agency_city" placeholder="City" class="date-input">
                                </td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;"><input type="text"
                                        name="agency_state" placeholder="state" class="date-input" style="width: 45%;">
                                    <input type="text" name="agency_zipCode" placeholder="Zip" class="date-input"
                                        style="width: 50%;">
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td colspan="2">Contact Name: <input type="text" name="contact_name"
                                        placeholder="Contact Name" class="date-input"></td>
                            </tr>
                            <tr>

                                <td colspan="2">Phone : <input type="text" name="contact_phone" placeholder="Phone"
                                        class="date-input"></td>
                            </tr>
                            <tr>

                                <td colspan="2">Fax : <input type="text" name="contact_fax" placeholder="Fax"
                                        class="date-input"></td>
                            </tr>
                            <tr>


                                <td colspan="2">Email : <input type="text" name="contact_email" placeholder="Email"
                                        class="date-input"></td>
                            </tr>

                            <tr>
                                <td>CODE : <input type="text" name="code" placeholder="code" class="date-input"></td>
                                <td>SUBCODE : <input type="text" name="subcode" placeholder="Sub Code"
                                        class="date-input"></td>
                            </tr>
                            <tr>

                                <td colspan="2">AGENCY CUSTOMER ID : <input type="text" name="agency_cust_id"
                                        placeholder="Agency Customer ID" class="date-input"></td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="border: 0; width: 50%;  padding: 0;">
                    <table>
                        <tr>
                            <td style="height: 45px;" colspan="3">Carier : <br> <input type="text" name="carier"
                                    class="date-input"></td>
                            <td>Niac : <br> <input type="text" name="naicCode" class="date-input"></td>
                        </tr>
                        <tr>
                            <td style="height: 45px;" colspan="4">Named Insured : <br> <input type="text"
                                    name="nameIsured" class="date-input"></td>
                        </tr>
                        <tr>
                            <td style="height: 45px;" colspan="4">Policy Number : <br> <input type="text"
                                    name="policyNumber" class="date-input"> </td>
                        </tr>

                        <tr>
                            <td style="height: 45px;">Plan : <input type="text" name="plan" class="date-input"></td>
                            <td>Facility Code : <input type="text" name="facilityCode" class="date-input"></td>
                            <td>Expiration Date : <input type="text" name="expirationDate" class="date-input"></td>
                            <td>Effective Date : <input type="text" name="effectiveDate" class="date-input"></td>
                        </tr>
                        <tr>
                            <td style="height: 34px;" colspan="2">DATE AGENT LAST INSPECTED PROPERTY <input type="text"
                                    name="dateAgentLastInspect" class="date-input"></td>
                            <td colspan="2">HOW LONG HAVE YOU KNOWN THE APPLICANT <input type="text"
                                    name="knownApplicant" class="date-input">

                            </td>
                        </tr>


                    </table>
                </td>
            </tr>

        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">APPLICANT INFORMATION
        </div>
        <table class="">
            <tr>
                <td style="border: 0; width: 50%; padding: 0;">
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td rowspan="2" style="border-bottom: 0; height: 44px;">
                                    <p style="margin-bottom: 10px;">New Agency</p>
                                    <p style="margin-bottom: 5px;"><input type="text" name="applicant_agency_name"
                                            placeholder="Agency Name" class="date-input"></p>
                                    <p style="margin-bottom: 5px;"><textarea rows="5" name="applicant_agency_address"
                                            placeholder="Agency Address" class="date-input"></textarea></p>
                                </td>

                            </tr>

                        </table>
                        <!-- <label>NEW AGENCY</label>
                    <input type="text" value="" class="flex-grow"> -->
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border-top: 0; border-bottom: 0; border-right: 0;" colspan="2">
                                    <input type="text" name="applicant_agency_city" placeholder="City"
                                        class="date-input">
                                </td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;"><input type="text"
                                        name="applicant_agency_state" placeholder="state" class="date-input"
                                        style="width: 45%;"> <input type="text" name="applicant_agency_zipCode"
                                        placeholder="Zip" class="date-input" style="width: 50%;"></td>
                            </tr>

                        </table>

                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td>DATE OF BIRTH <input type="text" name="applicant_birthday" class="date-input"></td>
                                <td>SOCIAL SECURITY # <input type="text" name="applicant_socialSecurity"
                                        class="date-input"></td>
                                <td>MARITAL STATUS * / CIVIL UNION (if applicable) <input type="text"
                                        name="applicant_maritalStatus" class="date-input"></td>
                            </tr>
                            <tr>

                                <td colspan="4" style="font-size: 6px;">* This field may not be utilized for
                                    policyholders applying for residential property insurance in CA. </td>
                            </tr>
                            <tr>
                                <td colspan="2"><span>Primary Phone : </span> <input type="text"
                                        name="applicant_primaryPhone" class="date-input"><br> <input type="checkbox"
                                        name="applicant_primaryhome" value="1"> Home
                                    <input type="checkbox" name="applicant_primarybuss" value="1"> Buss <input
                                        type="checkbox" name="applicant_primarycell" value="1"> Cell
                                </td>
                                <td colspan="2">Secondary Phone : <input type="text" name="applicant_secondaryPhone"
                                        class="date-input"><br> <input type="checkbox" name="applicant_secondaryhome"
                                        value="1"> Home
                                    <input type="checkbox" name="applicant_secondarybuss" value="1"> Buss <input
                                        type="checkbox" name="applicant_secondarycell" value="1"> Cell
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="height: 50px;">
                                    <span>PREVIOUS ADDRESS <input type="text" name="applicant_previousAddress"
                                            class="date-input mb-3"></span>

                                    <br><span style="font-size: 7px;">YEARS AT PREVIOUS ADDRESS (if less than
                                        three years): <input type="text" name="applicant_yearPreviousAdd"
                                            class="date-input" style="width: 20%;">
                                    </span>
                                    <br>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="height: 30px;">
                                    <span>APPLICANT'S OCCUPATION (State Nature of Business if Self-Employed)</span>
                                    <br>
                                    <input type="text" name="applicant_occupation" class="date-input">
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="border: 0; width: 50%;  padding: 0;">
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td rowspan="2" style="border-bottom: 0; height: 84px;">
                                    <p style="margin-bottom: 10px;">Applicant Mailing Address</p>
                                    <p style="margin-bottom: 5px;"><input type="text" name="applicant_mailingName"
                                            placeholder="Name" class="date-input"></p>
                                    <p style="margin-bottom: 5px;"><textarea rows="5" name="applicant_mailingaddress"
                                            placeholder="Address" class="date-input"></textarea></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border-top: 0; border-bottom: 0; border-right: 0;" colspan="2">
                                    <input type="text" name="applicant_mailing_city" placeholder="City"
                                        class="date-input">
                                </td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;"><input type="text"
                                        name="applicant_mailing_state" placeholder="state" class="date-input"
                                        style="width: 45%;"> <input type="text" name="applicant_mailing_zipCode"
                                        placeholder="Zip" class="date-input" style="width: 50%;"></td>
                            </tr>

                        </table>

                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td colspan="2">DATE AT MAILING ADDRESS: <input type="text" name="applicant_mailingdate"
                                        class="date-input"> </td>
                            </tr>
                            <tr>

                                <td colspan="2">PRIMARY E-MAIL ADDRESS: <input type="text"
                                        name="applicant_mailingPrimaryEmail" class="date-input"></td>
                            </tr>

                            <tr>


                                <td colspan="2">SECONDARY E-MAIL ADDRESS:<input type="text"
                                        name="applicant_mailingSecondaryEmail" class="date-input"> </td>
                            </tr>

                            <tr>
                                <td colspan="2">DWELLING LOCATION <input type="checkbox" name="dwellingLocationCheck"
                                        value="1"> Check if same as mailing
                                    address</td>
                            </tr>
                            <tr>

                                <td colspan="2"> YEARS IN CURRENT OCCUPATION: <br><input type="text"
                                        name="applicant_yearCurrentOc" class="date-input"></td>
                            </tr>
                            <tr>

                                <td> YEARS WITH CURRENT EMPLOYER: <input type="text" name="applicant_yearWCEmployeer"
                                        class="date-input"></td>
                                <td> YEARS WITH PREVIOUS EMPLOYER: <input type="text" name="applicant_yearWPEmployeer"
                                        class="date-input"></td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>

        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">
            <table>
                <tr>
                    <td>COVERAGES / LIMITS OF LIABILITY</td>
                    <td><input type="checkbox" name="coverage_fire" value="1"> FIRE</td>
                    <td><input type="checkbox" name="coverage_fireEC" value="1"> FIRE & EC</td>
                    <td><input type="checkbox" name="coverage_fireECVM" value="1"> FIRE, EC & VMM</td>
                    <td><input type="checkbox" name="coverage_broad" value="1"> BROAD</td>
                    <td><input type="checkbox" name="coverage_special" value="1"> SPECIAL</td>
                </tr>
            </table>
        </div>
        <table>
            <tr>
                <td>COVERAGE</td>
                <td>LIMIT</td>
                <td>PREMIUM</td>
                <td>COVERAGE</td>
                <td>OPTION</td>
                <td>LIMIT</td>
                <td>PREMIUM</td>
            </tr>
            <tr>
                <td>DWELLING</td>
                <td>$ <input type="text" name="coverage_s1_limit" class="date-input"></td>
                <td>$ <input type="text" name="coverage_s1_premium" class="date-input"></td>
                <td>REPL COST - FULL VALUE</td>
                <td><input type="checkbox" name="coverage_s1_option_check" value="1"> INCLUDED</td>
                <td><input type="text" name="coverage_s1s_limits" class="date-input"> % MAX</td>
                <td>$ <input type="text" name="coverage_s1s_premium" class="date-input"></td>
            </tr>
            <tr>
                <td rowspan="2">OTHER STRUCTURES</td>
                <td rowspan="2"><input type="checkbox" name="coverage_s2_option_check" value="1"> INCLUDED <br>
                    $ <input type="text" name="coverage_s2_option_checkField" class="date-input"></td>
                <td rowspan="2">$ <input type="text" name="coverage_s2_prem" class="date-input"></td>
                <td>REPL COST - DWELLING </td>
                <td><input type="checkbox" name="coverage_s2s_option_check" value="1"> INCLUDED</td>
                <td></td>
                <td>$ <input type="text" name="coverage_s2s_prem" class="date-input"></td>
            </tr>
            <tr>
                <td>REPL COST - CONTENTS </td>
                <td><input type="checkbox" name="coverage_s3_option_check" value="1"> INCLUDED </td>
                <td></td>
                <td>$ <input type="text" name="coverage_s3_prem" class="date-input"></td>

            </tr>
            <tr>
                <td>PERSONAL PROPERTY</td>
                <td>$ <input type="text" name="coverage_s4_prem" class="date-input"></td>
                <td>$ <input type="text" name="coverage_s5_prem" class="date-input"></td>
                <td colspan="3" style="text-align: right;">TOTAL LOCATION PREMIUM</td>

                <td>$ <input type="text" name="totalPremLocation" class="date-input"></td>
            </tr>
            <tr>
                <td rowspan="2">LOSS OF USE </td>
                <td rowspan="2"><input type="checkbox" name="lossUse_sustained" value="1"> ACTUAL LOSS SUSTAINED <br> $
                    <input type="text" name="lossUse_sustainedamount" class="date-input">
                </td>
                <td rowspan="2">$ <input type="text" name="lossUse_prem" class="date-input"></td>
                <td colspan="4">DEDUCTIBLES</td>
            </tr>
            <tr>
                <td style="padding: 0; border-left: 0;" rowspan="7" colspan="4">
                    <table>
                        <tr>
                            <td style="border-left: 0 ;border-top: 0 ;">DEDUCTIBLE</td>
                            <td style="border-top: 0 ;">Amount</td>
                            <td style="border-top: 0 ;">Percent</td>
                            <td style="border-top: 0 ;">Type</td>
                            <td style="border-top: 0 ;">DEDUCTIBLE</td>
                            <td style="border-top: 0 ;">Amount</td>
                            <td style="border-top: 0 ;">Percent</td>
                            <td style="border-top: 0 ;">Type</td>
                        </tr>
                        <tr>
                            <td style="border-left: 0 ;">Base</td>
                            <td>$ <input type="text" name="base_s1_amount" class="date-input"></td>
                            <td>% <input type="text" name="base_s1_percent" class="date-input"></td>
                            <td> <input type="text" name="base_s1_type" class="date-input"></td>
                            <td>Name Hurricane</td>
                            <td>$ <input type="text" name="base_s2_amount" class="date-input"></td>
                            <td>% <input type="text" name="base_s2_percent" class="date-input"></td>
                            <td> <input type="text" name="base_s2_type" class="date-input"></td>
                        </tr>
                        <tr>
                            <td style="border-left: 0 ;">Wind / Hail</td>
                            <td>$ <input type="text" name="wind_s1_amount" class="date-input"></td>
                            <td>% <input type="text" name="wind_s1_percent" class="date-input"></td>
                            <td> <input type="text" name="wind_s1_type" class="date-input"></td>
                            <td>Annual Hurricane</td>
                            <td>$ <input type="text" name="wind_s2_amount" class="date-input"></td>
                            <td>% <input type="text" name="wind_s2_percent" class="date-input"></td>
                            <td> <input type="text" name="wind_s2_type" class="date-input"></td>
                        </tr>
                        <tr>
                            <td style="border-left: 0 ;">Theif</td>
                            <td>$ <input type="text" name="theift_s1_amount" class="date-input"></td>
                            <td>% <input type="text" name="theift_s1_percent" class="date-input"></td>
                            <td> <input type="text" name="theift_s1_type" class="date-input"></td>
                            <td><input type="text" name="theift_s1_other" class="date-input"></td>
                </td>
                <td>$ <input type="text" name="theift_s2_amount" class="date-input"></td>
                <td>% <input type="text" name="theift_s2_percent" class="date-input"></td>
                <td> <input type="text" name="theift_s2_type" class="date-input"></td>
            </tr>
            <tr>
                <td style="border-left: 0 ;"><input type="text" name="otherR1_s1_title" class="date-input"></td>
                <td>$ <input type="text" name="otherR1_s1_amount" class="date-input"></td>
                <td>% <input type="text" name="otherR1_s1_percent" class="date-input"></td>
                <td> <input type="text" name="otherR1_s1_type" class="date-input"></td>
                <td><input type="text" name="otherR1_s1_other" class="date-input"></td>
                </td>
                <td>$ <input type="text" name="otherR1_s2_amount" class="date-input"></td>
                <td>% <input type="text" name="otherR1_s2_percent" class="date-input"></td>
                <td> <input type="text" name="otherR1_s2_type" class="date-input"></td>
            </tr>
            <tr>
                <td style="border-left: 0 ;"><input type="text" name="otherR2_s1_title" class="date-input"></td>
                <td>$ <input type="text" name="otherR2_s1_amount" class="date-input"></td>
                <td>% <input type="text" name="otherR2_s1_percent" class="date-input"></td>
                <td> <input type="text" name="otherR2_s1_type" class="date-input"></td>
                <td><input type="text" name="otherR2_s1_other" class="date-input"></td>
                </td>
                <td>$ <input type="text" name="otherR2_s2_amount" class="date-input"></td>
                <td>% <input type="text" name="otherR2_s2_percent" class="date-input"></td>
                <td> <input type="text" name="otherR2_s2_type" class="date-input"></td>
            </tr>
            <tr>
                <td style="border-left: 0 ;"><input type="text" name="otherR3_s1_title" class="date-input"></td>
                <td>$ <input type="text" name="otherR3_s1_amount" class="date-input"></td>
                <td>% <input type="text" name="otherR3_s1_percent" class="date-input"></td>
                <td> <input type="text" name="otherR3_s1_type" class="date-input"></td>
                <td style="border-bottom: 0; border-left: 0 ;" colspan="4" rowspan="2">
                    * Named Storm Percentage Deductible in North Carolina
                    <br><br> Notapplicable in North corolina
                </td>
            </tr>
            <tr>
                <td colspan="4" style="height: 58px;"><input type="text" name="includedDwellingStructure"
                        class="date-input"></td>
            </tr>
        </table>
        </td>
        </tr>
        <tr>
            <td>BLANKET* </td>
            <td>$ <input type="text" name="blanket_limit" class="date-input"></td>
            <td>$ <input type="text" name="blanket_prem" class="date-input"></td>
        </tr>
        <tr>
            <td>Rental Value</td>
            <td><input type="checkbox" name="rental_limit_check" value="1"> ACTUAL LOSS SUSTAINED <br> $ <input type="text"
                    name="rental_limit_checkField" class="date-input"></td>
            <td>$ <input type="text" name="rental_prem" class="date-input"></td>
        </tr>
        <tr>
            <td>ADDITIONAL EXPENSE </td>
            <td>$ <input type="text" name="addition_limit" class="date-input"></td>
            <td>$ <input type="text" name="addition_prem" class="date-input"></td>
        </tr>
        <tr>
            <td>PERSONAL LIABILITY EA OCC </td>
            <td>$ <input type="text" name="personalLib_limit" class="date-input"></td>
            <td>$ <input type="text" name="personalLib_prem" class="date-input"></td>
        </tr>
        <tr>
            <td>MEDICAL PAYMENTS EA PER </td>
            <td>$ <input type="text" name="medicalPay_limit" class="date-input"></td>
            <td>$ <input type="text" name="medicalPay_prem" class="date-input"></td>
        </tr>
        <tr>
            <td colspan="3">Includes Dwelling, Other Structures, Personal Property, Loss of Use</td>
        </tr>
        </table>


        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">FORMS AND ENDORSEMENTS (ACORD 829, Forms and
            Endorsements Schedule, may be attached if more space is required)
        </div>
        <table>
            <tr>
                <td>LOC #</td>
                <td>FORM NUMBER</td>
                <td>FORM NAME </td>
                <td>EDITION DATE</td>
                <td>COPYRIGHT OWNER CODE</td>
            </tr>
            <tr>
                <td><input type="text" name="formAndor_r1_loc" class="date-input"></td>
                <td><input type="text" name="formAndor_r1_formNum" class="date-input"></td>
                <td><input type="text" name="formAndor_r1_formName" class="date-input"></td>
                <td><input type="text" name="formAndor_r1_editionDate" class="date-input"></td>
                <td><input type="text" name="formAndor_r1_copyright" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="text" name="formAndor_r2_loc" class="date-input"></td>
                <td><input type="text" name="formAndor_r2_formNum" class="date-input"></td>
                <td><input type="text" name="formAndor_r2_formName" class="date-input"></td>
                <td><input type="text" name="formAndor_r2_editionDate" class="date-input"></td>
                <td><input type="text" name="formAndor_r2_copyright" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="text" name="formAndor_r3_loc" class="date-input"></td>
                <td><input type="text" name="formAndor_r3_formNum" class="date-input"></td>
                <td><input type="text" name="formAndor_r3_formName" class="date-input"></td>
                <td><input type="text" name="formAndor_r3_editionDate" class="date-input"></td>
                <td><input type="text" name="formAndor_r3_copyright" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="text" name="formAndor_r4_loc" class="date-input"></td>
                <td><input type="text" name="formAndor_r4_formNum" class="date-input"></td>
                <td><input type="text" name="formAndor_r4_formName" class="date-input"></td>
                <td><input type="text" name="formAndor_r4_editionDate" class="date-input"></td>
                <td><input type="text" name="formAndor_r4_copyright" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="text" name="formAndor_r5_loc" class="date-input"></td>
                <td><input type="text" name="formAndor_r5_formNum" class="date-input"></td>
                <td><input type="text" name="formAndor_r5_formName" class="date-input"></td>
                <td><input type="text" name="formAndor_r5_editionDate" class="date-input"></td>
                <td><input type="text" name="formAndor_r5_copyright" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="text" name="formAndor_r6_loc" class="date-input"></td>
                <td><input type="text" name="formAndor_r6_formNum" class="date-input"></td>
                <td><input type="text" name="formAndor_r6_formName" class="date-input"></td>
                <td><input type="text" name="formAndor_r6_editionDate" class="date-input"></td>
                <td><input type="text" name="formAndor_r6_copyright" class="date-input"></td>
            </tr>
        </table>
        <div class="page-break"></div>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">
            PAYMENT PLAN (Attach ACORD 610, Premium Payment Supplement, if additional information is required)
        </div>

        <table>
            <tr>
                <td colspan="3">BILLING ACCOUNT #: <input type="text" name="paymentPlan_billing" class="date-input">
                </td>
                <td colspan="2">DEPOSIT AMOUNT:$ <input type="text" name="paymentPlan_deposit" class="date-input"></td>
                <td>EST TOTAL PREMIUM:$ <input type="text" name="paymentPlan_estTotal" class="date-input"></td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;">BILLING </td>
                <td style="border-top: 0;  border-bottom: 0;" colspan="2">Payment Plan</td>
                <td style="border-top: 0;  border-bottom: 0;" colspan="2">Payment Method</td>
                <td style="border-top: 0;  border-bottom: 0;">Mail Policy to</td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" name="paymentPlan_directBillP"
                        value="1"> DIRECT BILL - POLICY</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox"
                        name="paymentPlan_fullPay" value="1"> FULL PAY</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox"
                        name="paymentPlan_BIMonthly" value="1"> BI-Monthly</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox"
                        name="paymentPlan_cash" value="1"> Cash</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox"
                        name="paymentPlan_EFT" value="1"> EFT</td>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" name="paymentPlan_Agent"
                        value="1"> Agent</td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" name="paymentPlan_directBillAcct"
                        value="1"> DIRECT BILL - ACCT</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox"
                        name="paymentPlan_annual" value="1"> Annual</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox"
                        name="paymentPlan_monthly" value="1"> Monthly</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox"
                        name="paymentPlan_check" value="1"> Check</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox"
                        name="paymentPlan_payroll" value="1"> Payroll Deduction
                </td>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" name="paymentPlan_Insured"
                        value="1"> Insured</td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" name="paymentPlan_agentBill"
                        value="1"> Agent BILL</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox"
                        name="paymentPlan_semiAnnual" value="1"> Semi-Annual</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox"
                        name="paymentPlan_other1Check" value="1"> <input type="text" name="paymentPlan_other1CheckField"
                        class="date-input" style="width: 80%;"> </td>
                <td style="border-top: 0;  border-bottom: 0;  border-right: 0;"> <input type="checkbox"
                        name="paymentPlan_creditCard" value="1"> Credit Card
                </td>
                <td style="border-top: 0;  border-bottom: 0;  border-left: 0;"> <input type="checkbox"
                        name="paymentPlan_preAuth" value="1"> PRE-AUTHORIZED
                    DRAFT/CHECK (PAC)</td>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" name="paymentPlan_other2Check"
                        value="1"> <input type="text" name="paymentPlan_other2CheckField" class="date-input"
                        style="width: 80%;"> </td>
            </tr>
            <tr>
                <td style="border-top: 0;"> </td>
                <td style="border-top: 0;  border-right: 0;"> <input type="checkbox" name="paymentPlan_quaterly"
                        value="1">
                    QUARTERLY</td>
                <td style="border-top: 0;  border-left: 0;"> </td>
                <td style="border-top: 0;  border-right: 0;"></td>
                <td style="border-top: 0;  border-left: 0;"> </td>
                <td style="border-top: 0;"> </td>
            </tr>
            <tr>
                <td style="border-bottom: 0;" colspan="2">Payor</td>
                <td style="border-bottom: 0;">PREMIUM FINANCED? </td>
                <td style="border-bottom: 0;" colspan="3">FINANCE COMPANY </td>
            </tr>
            <tr>
                <td style="border-top: 0;" colspan="2"> <input type="checkbox" name="prem_insured" value="1"> INSURED 
                    <input type="checkbox" name="prem_morg" value="1">
                    MORTGAGEE <input type="checkbox" name="prem_othCheck" value="1"> <input type="text" name="prem_othCheckFiled" class="date-input" style="width: 20%"></td>
                <td style="border-top: 0;">
                    <input type="checkbox" name="premium_financed" value="1"> YES
                    <input type="checkbox" name="premium_financed" value="0"> NO
                </td>
                <td style="border-top: 0;" colspan="3"><input type="text" name="paymentPlan_financeCompany"
                        class="date-input"> </td>
            </tr>
        </table>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Rating / Underwriting </div>

        <table>
            <tr>
                <td>Construction Type</td>
                <td>%</td>
                <td>Course of Construction</td>
                <td colspan="2">House keeping condition</td>
                <td colspan="4">Protection device type</td>
                <td colspan="2">Distance to</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="ratingUnder_mosonryVenner" value="1"> Masonry Veneer</td>
                <td><input type="text" name="ratingUnder_percentage" class="date-input"></td>
                <td><input type="checkbox" name="ratingUnder_buildersRisk" value="1"> Builders Risk</td>
                <td><input type="checkbox" name="ratingUnder_exellent" value="1"> Exellent </td>
                <td><input type="checkbox" name="ratingUnder_average" value="1"> Average</td>
                <td>Sysytem </td>
                <td>Smoke</td>
                <td>Temp</td>
                <td>Burg</td>
                <td>Fire Hydrant</td>
                <td>Fire station</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="frame_frame" value="1"> Frame</td>
                <td><input type="text" name="frame_percentage" class="date-input"></td>
                <td><input type="checkbox" name="frame_renovation" value="1"> Renovation</td>
                <td><input type="checkbox" name="frame_good" value="1"> Good </td>
                <td><input type="checkbox" name="frame_belowAvg" value="1"> Below Avg</td>
                <td>Central </td>
                <td><input type="checkbox" name="frame_check1smoke" value="1"> </td>
                <td><input type="checkbox" name="frame_check1temp" value="1"> </td>
                <td><input type="checkbox" name="frame_check1burg" value="1"> </td>
                <td>FT <input type="text" name="frame_FT" class="date-input"></td>
                <td>MI <input type="text" name="frame_MI" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="masonry_masonry" value="1"> Masonry</td>
                <td></td>
                <td><input type="checkbox" name="masonry_reconstruction" value="1"> Reconstruction</td>
                <td colspan="2">Plumbing Condition </td>
                <td>Direct </td>
                <td><input type="checkbox" name="masonry_check2smoke" value="1"></td>
                <td><input type="checkbox" name="masonry_check2temp" value="1"></td>
                <td><input type="checkbox" name="masonry_check2burg" value="1"></td>
                <td># Fire Devision</td>
                <td># Unit Fire Div</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="other1_O1check" value="1"> <input type="text"
                        name="other1_O1checkField" class="date-input" style="width: 80%;"></td>
                <td><input type="text" name="other1_O1checkField" class="date-input"></td>
                <td>OCCUPANCY</td>
                <td><input type="checkbox" name="other1_exellent" value="1"> Exellent </td>
                <td><input type="checkbox" name="other1_average" value="1"> AVERAGE</td>
                <td>Local </td>
                <td><input type="checkbox" name="other1_check3smoke" value="1"></td>
                <td><input type="checkbox" name="other1_check3temp" value="1"></td>
                <td><input type="checkbox" name="other1_check3burg" value="1"></td>
                <td><input type="text" name="other1_fireDevision" class="date-input"></td>
                <td><input type="text" name="other1_unitFireDivision" class="date-input"></td>
            </tr>
            <tr>
                <td>Sidings</td>
                <td><input type="text" name="siding_percentage" class="date-input" style="width: 80%;"> %</td>
                <td><input type="checkbox" name="siding_owner" value="1"> Owner</td>
                <td><input type="checkbox" name="siding_good" value="1"> Good </td>
                <td><input type="checkbox" name="siding_belowAVG" value="1"> Below Avg</td>
                <td colspan="2">Door Lock </td>
                <td colspan="2">Sprinkler </td>
                <td>TERRITORY</td>
                <td>Pers Lab Terr</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="alumSiding_aluminiumSidings" value="1"> Aluminium Sidings</td>
                <td><input type="text" name="alumSiding_percentage" class="date-input" style="width: 80%;"> %</td>
                <td><input type="checkbox" name="alumSiding_tenant" value="1"> Tenant</td>
                <td colspan="2">Any known leaks <br> <input type="checkbox" name="alumSiding_anyKnownLeaks" value="1">
                    Y/N</td>
                <td colspan="2"><input type="checkbox" name="alumSiding_deadbolt" value="1"> Deadbolt </td>
                <td colspan="2"><input type="checkbox" name="alumSiding_partial" value="1"> Partial </td>
                <td><input type="text" name="alumSiding_Territory" class="date-input"></td>
                <td><input type="text" name="alumSiding_persLab" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="stuc_stucco" value="1"> Stucco</td>
                <td><input type="text" name="stuc_percentage" class="date-input"></td>
                <td><input type="checkbox" name="stuc_unoccupied" value="1"> Unoccupied</td>
                <td colspan="2">Roof Condition </td>
                <td colspan="2"><input type="checkbox" name="stuc_spring" value="1"> Spring </td>
                <td colspan="2"><input type="checkbox" name="stuc_full" value="1"> Full </td>
                <td>Prot Class</td>
                <td>Fire extengisher</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="vinyl_siding" value="1"> Vinyl Siding / Plastic</td>
                <td><input type="text" name="vinyl_percentage" class="date-input"></td>
                <td><input type="checkbox" name="vinyl_vacant" value="1"> Vacant</td>
                <td><input type="checkbox" name="vinyl_exellent" value="1"> Exellent </td>
                <td><input type="checkbox" name="vinyl_averge" value="1"> Averge </td>
                <td colspan="2"><input type="checkbox" name="vinyl_otherCheck" value="1"> <input type="text"
                        name="vinyl_otherCheckField" class="date-input" style="width: 80%;"></td>
                <td colspan="2"> </td>
                <td> <input type="text" name="vinyl_proteClass" class="date-input"></td>
                <td>Y/N <input type="checkbox" name="vinyl_fireExt" value="1"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="chedar_wood" value="1"> Chedar, wood shingle</td>
                <td><input type="text" name="chedar_percentage" class="date-input"></td>
                <td><input type="checkbox" name="chedar_othercheck" value="1"> <input type="text"
                        name="chedar_othercheckField" class="date-input" style="width: 80%;"></td>
                <td><input type="checkbox" name="chedar_good" value="1"> Good </td>
                <td><input type="checkbox" name="chedar_below" value="1"> Below avg </td>
                <td colspan="5">Fire distric name <input type="text" name="chedar_fireDistricName" class="date-input">
                </td>

                <td>First dist code <input type="text" name="chedar_firstDiscode" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="eifscb_eifscb" value="1"> EIFSCB</td>
                <td><input type="text" name="eifscb_percentage" class="date-input"></td>
                <td>Residence Type</td>
                <td colspan="2">Roof Metarial</td>
                <td colspan="5"></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="eifss_eifss" value="1"> EIFSS</td>
                <td><input type="text" name="eifss_percentage" class="date-input"></td>
                <td><input type="checkbox" name="eifss_dwelling" value="1"> Dwelling</td>
                <td colspan="2"><input type="text" name="roofMetarial" class="date-input"></td>
                <td colspan="4">Primary Heat</td>
                <td colspan="2">Secondary Heat</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="other2_check" value="1"> <input type="text" name="other2_checkField"
                        class="date-input" style="width: 80%;"></td>
                <td><input type="text" name="other2_percentage" class="date-input"></td>
                <td><input type="checkbox" name="other2_apartment" value="1"> Apartment</td>
                <td colspan="2">Distance to Tidal Water</td>
                <td colspan="4"><input type="checkbox" name="primary_heat_none" value="1"> None</td>
                <td colspan="2"><input type="checkbox" name="secondary_heat_none" value="1"> None</td>
            </tr>

            <tr>
                <td colspan="2">Year EFID Installed </td>
                <td><input type="checkbox" name="yearEFID_condominium" value="1"> Condominium</td>
                <td colspan="2"><span><input type="checkbox" name="yearEFID_mile" value="1"> Mile <input type="checkbox"
                            name="yearEFID_feet" value="1"> Feet</span></td>
                <td colspan="6">Date heating system last serviced</td>
            </tr>
            <tr>
                <td colspan="2">Usage Type </td>
                <td><input type="checkbox" name="townhouse" value="1"> Townhouse</td>
                <td> Purchase Price </td>
                <td> Purchase Date </td>
                <td colspan="4">Wiring</td>
                <td colspan="2">Electrical System</td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" name="usage_primary" value="1"> Primary <input type="checkbox"
                        name="usage_seasonal" value="1"> Seasonal </td>
                <td><input type="checkbox" name="usage_Rpwhouse" value="1"> Rpwhouse</td>
                <td> $ <input type="text" name="usage_purchasePrice" class="date-input" style="width: 80%;"></td>
                <td> <input type="text" name="usage_purchasedate" class="date-input"></td>
                <td colspan="4"><input type="checkbox" name="usage_cooperLastInsp" value="1"> Cooper <span>Last
                        Inspected Date</span></td>
                <td colspan="2"><input type="checkbox" name="usage_circutBreaker" value="1"> Circut Breaker</td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" name="usage_secondary" value="1"> secondary <input
                        type="checkbox" name="usage_farm" value="1"> Farm </td>
                <td><input type="checkbox" name="usage_coop" value="1"> Co-op</td>
                <td colspan="2"> security </td>
                <td colspan="4"><input type="checkbox" name="usage_aluminium" value="1"> Aluminium </td>
                <td colspan="2"><input type="checkbox" name="usage_fuses" value="1"> Fuses</td>
            </tr>

            <tr>
                <td colspan="2"><input type="checkbox" name="other3_check1" value="1"> <input type="text"
                        name="other3_check1Field" class="date-input" style="width: 80%;"></td>
                <td><input type="checkbox" name="other3_check2" value="1"> <input type="text" name="other3_check2Field"
                        class="date-input" style="width: 80%;"></td>
                <td><input type="checkbox" name="other3_visibleroad" value="1"> Visible from road </td>
                <td><input type="checkbox" name="other3_visibleNighbors" value="1"> Visible To Nighbors </td>
                <td colspan="4"><input type="checkbox" name="other3_knob" value="1"> Knob & Tube </td>
                <td colspan="2"><input type="checkbox" name="other3_amps" value="1"> Number of AMPS</td>
            </tr>
            <td colspan="2"></td>
            <td></td>
            <td colspan="2"><input type="checkbox" name="other3_occupied" value="1"> OCCUPIED DAILY </td>
            <td colspan="4"></td>
            <td colspan="2"></td>
            </tr>
        </table>
        <table>
            <tr>
                <td>Year Built</td>
                <td># Rooms</td>
                <td># Families</td>
                <td>Rating Credits</td>
                <td>Dwelling Location</td>
                <td>Rating</td>
                <td>Renovation</td>
                <td>Part</td>
                <td>Comp</td>
                <td>Year</td>
            </tr>
            <tr>
                <td><input type="text" name="yrBLT_build" class="date-input"></td>
                <td><input type="text" name="yrBLT_room" class="date-input"></td>
                <td><input type="text" name="yrBLT_families" class="date-input"></td>
                <td><input type="checkbox" name="yrBLT_smooker" value="1"> Non-Smoker</td>
                <td><input type="checkbox" name="yrBLT_cityLimit" value="1"> In city limit</td>
                <td><input type="checkbox" name="yrBLT_class" value="1"> Class <input type="checkbox"
                        name="yrBLT_specific" value="1"> Specific</td>
                <td>Wiring</td>
                <td><input type="checkbox" name="yrBLT_part1Check" value="1"></td>
                <td><input type="checkbox" name="yrBLT_comp1Check" value="1"></td>
                <td><input type="text" name="yrBLT_year" class="date-input"></td>
            </tr>
            <tr>
                <td>Market value</td>
                <td># Apartment</td>
                <td>Household Residence</td>
                <td><input type="checkbox" name="market_mannedS" value="1"> Manned Security</td>
                <td><input type="checkbox" name="market_inFireDis" value="1"> In fire district </td>
                <td><input type="checkbox" name="market_foundation" value="1"> Foundation <input type="checkbox"
                        name="market_none" value="1"> none</td>
                <td>Plumbing</td>
                <td><input type="checkbox" name="market_part1Check" value="1"></td>
                <td><input type="checkbox" name="market_comp1Check" value="1"></td>
                <td><input type="text" name="market_year" class="date-input"></td>
            </tr>
            <tr>
                <td>$ <input type="text" name="maket_value" class="date-input" style="width: 80%;"></td>
                <td> <input type="text" name="market_apt" class="date-input"></td>
                <td> <input type="text" name="market_household" class="date-input"></td>
                <td><input type="checkbox" name="maket_lightning" value="1"> Lightning Protection</td>
                <td><input type="checkbox" name="maket_prot" value="1"> In prot suburb </td>
                <td><input type="checkbox" name="maket_open" value="1"> open </td>
                <td>Heating</td>
                <td><input type="checkbox" name="maket_part2check" value="1"></td>
                <td><input type="checkbox" name="maket_comp2Check" value="1"></td>
                <td><input type="text" name="market_year2" class="date-input"></td>
            </tr>

            <tr>
                <td>Replaccement Cost</td>
                <td># weeks Rented</td>
                <td>Tax Code</td>
                <td><input type="checkbox" name="replacement_premise" value="1"> Of premise theft excl</td>
                <td><input type="checkbox" name="replacement_locCheck" value="1"> <input type="text"
                        name="replacement_locCheckField" class="date-input" style="width: 80%;"> </td>
                <td><input type="checkbox" name="replacement_close" value="1"> Closed </td>
                <td>Roofing</td>
                <td><input type="checkbox" name="replacement_roofPart" value="1"></td>
                <td><input type="checkbox" name="replacement_roofComp" value="1"></td>
                <td><input type="text" name="replacement_roofYear" class="date-input"></td>
            </tr>
            <tr>
                <td>$ <input type="text" name="replacement_cost" class="date-input" style="width: 80%;"></td>
                <td> <input type="text" name="replacement_weekRented" class="date-input"></td>
                <td> <input type="text" name="replacement_tax" class="date-input"></td>
                <td><input type="checkbox" name="replacement_other2check" value="1"> <input type="text"
                        name="replacement_other2checkField" class="date-input" style="width: 80%;"></td>
                <td colspan="2">Fuel storage tank loction <input type="checkbox" name="replacement_none" value="1"> None
                </td>
                <td colspan="3">Exterier Pant</td>
                <td><input type="text" name="replacement_exterierPant" class="date-input"></td>
            </tr>
            <tr>
                <td>Total Living area</td>
                <td colspan="2">Blog code grade</td>
                <td><input type="checkbox" name="tLA_otherCheck" value="1"> <input type="text"
                        name="tLA_otherCheckField" class="date-input" style="width: 80%;"></td>
                <td colspan="2"><input type="checkbox" name="tLA_indoor" value="1"> Indoors above ground masonory floor
                </td>
                <td colspan="4">Wind Class</td>
            </tr>
            <tr>
                <td>SQ FT <input type="text" name="tLA_totalLArea" class="date-input" style="width: 60%;"></td>
                <td colspan="2"> <input type="text" name="tLA_blogCode" class="date-input"></td>
                <td>Swiming Pool <input type="checkbox" name="tLA_none" value="1"> None</td>
                <td colspan="2"><input type="checkbox" name="tLA_indoorAbove" value="1"> Indoors above ground masonory
                    floor </td>
                <td colspan="2"><input type="checkbox" name="tLA_resotive" value="1"> Resistive</td>
                <td colspan="2"><input type="checkbox" name="tLA_semiResistive" value="1"> semi-Resistive</td>
            </tr>
            <tr>
                <td>Basement Area</td>
                <td colspan="2">Inspected Y/N <input type="checkbox" name="basement_inspected" value="1"></td>
                <td><input type="checkbox" name="basement_aboveGround" value="1"> Above Ground</td>
                <td colspan="2"><input type="checkbox" name="basement_outdoor" value="1"> Outdoor Above ground </td>
                <td colspan="4"><input type="checkbox" name="basement_otherCheck" value="1"> <input type="text"
                        name="basement_otherCheckField" class="date-input" style="width: 80%;"></td>
            </tr>
            <tr>
                <td>SQ FT <input type="text" name="basement_area" class="date-input" style="width: 60%;"></td>
                <td colspan="2">Replace (enter # or 0 for None) <input type="checkbox" name="basement_replace"
                        value="1"></td>
                <td><input type="checkbox" name="basement_ground" value="1"> In ground</td>
                <td colspan="2"> Outdoor below ground </td>
                <td colspan="4">Windstorm</td>
            </tr>
            <tr>
                <td>Garage Area</td>
                <td colspan="2">Chimney <input type="checkbox" name="garage_chimney" value="1"></td>
                <td><input type="checkbox" name="garage_approved" value="1"> Approved Fense</td>
                <td colspan="2"> <input type="text" name="basement_outdoor" class="date-input" style="width: 60%;"></td>
                <td colspan="4">Storm Shutters</td>
            </tr>
            <tr>
                <td>SQ FT <input type="text" name="basement_area2" class="date-input" style="width: 60%;"></td>
                <td colspan="2">Hearths <input type="checkbox" name="basement_hearths" value="1"></td>
                <td><input type="checkbox" name="basement_diving" value="1"> Diving Board</td>
                <td colspan="2">Fuel line location </td>
                <td colspan="4"><input type="checkbox" name="basement_choiceA" value="1"> A <input type="checkbox"
                        name="basement_choiceB" value="1"> B</td>
            </tr>
            <tr>
                <td>Breezeway Area</td>
                <td colspan="2">Pre-Fab <input type="checkbox" name="area_fab" value="1"></td>
                <td><input type="checkbox" name="area_slides" value="1"> Slides</td>
                <td colspan="2"><input type="checkbox" name="area_ground" value="1"> Under Ground </td>
                <td colspan="4"><input type="checkbox" name="area_other" value="1"> <input type="text"
                        name="area_otherField" class="date-input" style="width: 80%;"></td>
            </tr>
            <tr>
                <td>SQ FT <input type="text" name="basement_area3" class="date-input" style="width: 60%;"></td>
                <td colspan="2">Wood stove insert</td>
                <td><input type="checkbox" name="otherF_check" value="1"> <input type="text" name="otherF_checkfield"
                        class="date-input" style="width: 60%;"></td>
                <td colspan="2"><input type="checkbox" name="otherF_tfoundation" value="1"> Through foundation </td>
                <td colspan="4"><input type="checkbox" name="otherF_resistive" value="1"> Hurricane Resistive glass</td>
            </tr>
        </table>
        <div class="page-break"></div>
        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID : <input
                type="text" name="agencyID" class="date-input" style="width: 20%;"></p>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Optional Coverage - Endorsements</div>
        <table>
            <tr>
                <td style="width: 50px;">Coverage Type</td>
                <td colspan="2">Coverage Information</td>
                <td>Premium</td>
                <td style="width: 50px;">Coverage Type</td>
                <td colspan="2">Coverage Information</td>
                <td>Premium</td>
            </tr>
            <tr>
                <td>Builder Risk Theft bldg meterial</td>
                <td><input type="checkbox" name="includedRisk" value="1"> Includedd</td>
                <td>$ <input type="text" name="risk_amount" class="date-input" style="width: 60%;"><span
                        style="float: right;">Limit</span></td>
                <td>$ <input type="text" name="risk_prem" class="date-input" style="width: 80%;"></td>
                <td>Fire department service charge</td>
                <td colspan="2"><input type="checkbox" name="coverageInc" value="1"> Included</td>
                <td>$ <input type="text" name="risk_premium" class="date-input" style="width: 80%;"></td>
            </tr>
            <tr>
                <td rowspan="2">Colapse due to dydrostatic pressure</td>
                <td rowspan="2"><input type="checkbox" name="colaps_included" value="1"> Includedd</td>
                <td rowspan="2">$ <input type="text" name="colaps_covpremium" class="date-input" style="width: 70%;">
                    <span style="float: right;">Limit</span>
                </td>
                <td rowspan="2">$ <input type="text" name="colaps_premium" class="date-input" style="width: 80%;"></td>
                <td>Inflation guard</td>
                <td colspan="2"><input type="text" name="colaps_percentageIncrease" class="date-input"
                        style="width: 60%;"> % Increse </td>
                <td>$ <input type="text" name="colaps_perm" class="date-input" style="width: 80%;"></td>
            </tr>
            <tr>
                <td>Loss Assesment</td>
                <td colspan="2"><input type="checkbox" name="loss_ass" value="1"> Included</td>
                <td>$ <input type="text" name="loss_assPrem" class="date-input" style="width: 80%;"></td>
            </tr>
            <tr>
                <td rowspan="2">Building ord or Law coverage</td>
                <td>$ <input type="text" name="lawCov_agg" class="date-input" style="width: 60%;"> <span
                        style="float: right;">AGG</span></td>
                <td>$ <input type="text" name="lawCov_incr" class="date-input" style="width: 70%;"> <span
                        style="float: right;">INCR</span></td>
                <td rowspan="2">$ <input type="text" name="lawCov_prem" class="date-input" style="width: 80%;"> </td>
                <td rowspan="2">Min Subsidence</td>
                <td>$ <input type="text" name="lawCov_limt" class="date-input" style="width: 70%;"> <span
                        style="float: right;">Limit</span></td>
                <td>Const Meterial</td>
                <td rowspan="2">$ <input type="text" name="lawCov_const" class="date-input" style="width: 80%;"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="ordIncluded" value="1"> Included</td>
                <td><input type="text" name="lawCov_rebild" class="date-input" style="width: 50%;"> % Rebuild</td>
                <td colspan="2">Prop Desk</td>
            </tr>
            <tr>
                <td>Derbs Removal</td>
                <td><input type="checkbox" name="derbs_included" value="1"> Included</td>
                <td>$ <input type="text" name="derbs_limit" class="date-input" style="width: 70%;"> <span
                        style="float: right;">Limit</span></td>
                <td>$ <input type="text" name="derbs_prem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="2">Unit owners addition & Alteration special coverage</td>
                <td rowspan="2"><input type="checkbox" name="derbs_inc" value="1"> Included</td>
                <td rowspan="2">$ <input type="text" name="derbs_unit" class="date-input" style="width: 70%;"> <span
                        style="float: right;"><span style="float: right;">Limit</span></td>
                <td rowspan="2">$ <input type="text" name="derbs_unitPrem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
            </tr>
            <tr>
                <td rowspan="3">EARTHQUAKE</td>
                <td> <input type="text" name="earth_ded" class="date-input" style="width: 70%;"> <span
                        style="float: right;"> % DED</td>
                <td>Terr: <input type="text" name="earth_terr" class="date-input" style="width: 70%;"> <span
                        style="float: right;"> </td>
                <td rowspan="3">$ <input type="text" name="earth_prem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"> </td>
            </tr>
            <tr>
                <td rowspan="2">$ <input type="text" name="earth_dedAmount" class="date-input" style="width: 70%;">
                    <span style="float: right;"><span style="float: right;">DED</span>
                </td>
                <td>Retrofit Type <input type="text" name="earth_type" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td>Water backup of sewers and drein</td>
                <td><input type="checkbox" name="dreinIncluded" value="1"> Included</td>
                <td>$ <input type="text" name="dreinLimit" class="date-input" style="width: 60%;"> <span
                        style="float: right;"><span style="float: right;">Limit</span></td>
                <td>$ <input type="text" name="dreinPrem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
            </tr>
            <tr>
                <td>Mass vaneer $ <input type="text" name="massVaneerAmount" class="date-input" style="width: 70%;">
                    <span style="float: right;">
                </td>
                <td>Windstrom Excls</td>
                <td colspan="3"><input type="checkbox" name="windYes" value="1"> Yes (not applicable in Arkansas)</td>

            </tr>
        </table>
        <table>
            <tr>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
            </tr>
            <tr>
                <td>Code</td>
                <td><input type="text" name="code_sec1_opts" class="date-input" style="width: 70%;"> <span
                        style="float: right;"> </td>
                <td>$ <input type="text" name="code_sec1_limit" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td><input type="text" name="code_sec1_appl" class="date-input" style="width: 70%;"> <span
                        style="float: right;"> </td>
                <td>$ <input type="text" name="code_sec1_deduct" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec1_prem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td>Code</td>
                <td> <input type="text" name="code_sec1_opts2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td>$ <input type="text" name="code_sec1_limit2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td> <input type="text" name="code_sec1_appl2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td>$ <input type="text" name="code_sec1_deduct2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec1_prem2" class="date-input" style="width: 70%;">
                    <span style="float: right;">
                </td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec1_opt" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec1_limit" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec1_appl" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec1_type" class="date-input" style="width: 60%;"></td>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec1_opt2" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec1_limit2" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec1_appl2" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec1_type2" class="date-input" style="width: 60%;"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec1_tree" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec1_y" class="date-input" style="width: 60%;"></td>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec1_tree2" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec1_y2" class="date-input" style="width: 60%;"></td>
            </tr>
            <tr>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
            </tr>
            <tr>
                <td>Code</td>
                <td><input type="text" name="code_sec2_opts" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec2_limit" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td><input type="text" name="code_sec2_appl" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec2_deduct" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec2_prem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td>Code</td>
                <td> <input type="text" name="code_sec2_opts2" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec2_limit2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td> <input type="text" name="code_sec2_appl2" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec2_deduct2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec2_prem2" class="date-input" style="width: 70%;">
                    <span style="float: right;">
                </td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec2_opt" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec2_limit" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec2_appl" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec2_type" class="date-input" style="width: 60%;"></td>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec2_opt2" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec2_limit2" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec2_appl2" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec2_type2" class="date-input" style="width: 60%;"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec2_tree" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec2_y" class="date-input" style="width: 60%;"></td>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec2_tree2" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec2_y2" class="date-input" style="width: 60%;"></td>
            </tr>
            <tr>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
            </tr>
            <tr>
                <td>Code</td>
                <td><input type="text" name="code_sec3_opts" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec3_limit" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td><input type="text" name="code_sec3_appl" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec3_deduct" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec3_prem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td>Code</td>
                <td> <input type="text" name="code_sec3_opts2" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec3_limit2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td> <input type="text" name="code_sec3_appl2" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec3_deduct2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec3_prem2" class="date-input" style="width: 70%;">
                    <span style="float: right;">
                </td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec3_opt" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec3_limit" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec3_appl" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec3_type" class="date-input" style="width: 60%;"></td>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec3_opt2" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec3_limit2" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec3_appl2" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec3_type2" class="date-input" style="width: 60%;"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec3_tree" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec3_y" class="date-input" style="width: 60%;"></td>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec3_tree2" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec3_y2" class="date-input" style="width: 60%;"></td>
            </tr>
            <tr>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
                <td>COVERAGE</td>
                <td>OPTS</td>
                <td>Limit</td>
                <td>Appl To</td>
                <td>Deductable</td>
                <td>Premium</td>
            </tr>
            <tr>
                <td>Code</td>
                <td><input type="text" name="code_sec4_opts" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec4_limit" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td><input type="text" name="code_sec4_appl" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec4_deduct" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec4_prem" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td>Code</td>
                <td> <input type="text" name="code_sec4_opts2" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec4_limit2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td> <input type="text" name="code_sec4_appl2" class="date-input" style="width: 70%;"> <span
                        style="float: right;">
                </td>
                <td>$ <input type="text" name="code_sec4_deduct2" class="date-input" style="width: 70%;"> <span
                        style="float: right;"></td>
                <td rowspan="3">$ <input type="text" name="code_sec4_prem2" class="date-input" style="width: 70%;">
                    <span style="float: right;">
                </td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec4_opt" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec4_limit" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec4_appl" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec4_type" class="date-input" style="width: 60%;"></td>
                <td rowspan="2">Description</td>
                <td> <input type="text" name="desc_sec4_opt2" class="date-input" style="width: 70%;"></td>
                <td>$ <input type="text" name="desc_sec4_limit2" class="date-input" style="width: 70%;"></td>
                <td> <input type="text" name="desc_sec4_appl2" class="date-input" style="width: 70%;"></td>
                <td>Type: <input type="text" name="desc_sec4_type2" class="date-input" style="width: 60%;"></td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec4_tree" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec4_y" class="date-input" style="width: 60%;"></td>
                <td></td>
                <td colspan="2">Terr: <input type="text" name="desc_sec4_tree2" class="date-input" style="width: 60%;">
                </td>
                <td>Y/N: <input type="text" name="desc_sec4_y2" class="date-input" style="width: 60%;"></td>
            </tr>
        </table>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">General Information</div>

        <table>
            <tbody>

                <tr>
                    <td>
                        EXPLAIN ALL "YES" RESPONSES UNLESS STATED OTHERWISE:
                    </td>
                    <td>Y/N</td>
                </tr>

                <tr>
                    <td>
                        1. ANY OTHER INSURANCE WITH THIS COMPANY? (List policy numbers)
                        <div style="display: flex;">
                            <table style="width: 48%; margin-right: 20px;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>Line of business</b></td>
                                    <td style="font-size: 9px;"> <b>Policy Number</b></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="q1_s1_bus" class="date-input"></td>
                                    <td><input type="text" name="q1_s1_policy" class="date-input">
                                    </td>
                                </tr>
                            </table>
                            <table style="width: 48%;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>Line of business</b></td>
                                    <td style="font-size: 9px;"> <b>Policy Number</b></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="q1_s2_bus" class="date-input"></td>
                                    <td><input type="text" name="q1_s2_policy" class="date-input">
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        2. HAS ANY COVERAGE BEEN DECLINED, CANCELLED OR NON-RENEWED DURING THE LAST THREE (3) YEARS?
                        <br><small>(Missouri Applicants - Do not answer this question)</small>

                        <input type="text" name="q2" class="date-input">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        3. HAS APPLICANT HAD A FORECLOSURE, REPOSSESSION, BANKRUPTCY OR FILED FOR BANKRUPTCY DURING THE
                        PAST FIVE (5) YEARS?
                        <input type="text" name="q3" class="date-input">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        4. HAS APPLICANT HAD A JUDGMENT OR LIEN DURING THE PAST FIVE (5) YEARS?
                        <input type="text" name="q4" class="date-input">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        5. ANY OTHER RESIDENCE, NOT LISTED ON ANY APPLICATION, OWNED, OCCUPIED OR RENTED?

                        <input type="text" name="q5" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        6. HAS INSURANCE BEEN TRANSFERRED WITHIN AGENCY?
                        <input type="text" name="q6" class="date-input">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        7. DURING THE LAST FIVE (5) YEARS (TEN (10) YEARS IN RHODE ISLAND) HAS ANY APPLICANT BEEN
                        INDICTED FOR OR CONVICTED OF ANY DEGREE OF THE CRIME OF FRAUD, BRIBERY, ARSON OR ANY OTHER
                        ARSON-RELATED CRIME IN CONNECTION WITH THIS OR ANY OTHER PROPERTY?
                        <br> <small>(In RI, failure to disclose the existence of an arson conviction is a misdemeanor
                            punishable by a sentence of up to one (1) year of imprisonment.)</small>


                        <input type="text" name="q7" class="date-input">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="page-break"></div>


        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID : <input
                type="text" name="agencyID" class="date-input" style="width: 20%;"></p>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">General Information - residential</div>

        <table>
            <tbody>

                <tr>
                    <td>
                        EXPLAIN ALL "YES" RESPONSES UNLESS STATED OTHERWISE:
                    </td>
                    <td>Y/N</td>
                </tr>

                <tr>
                    <td>
                        1. ANY BUSINESS CONDUCTED ON PREMISES?
                        <input type="checkbox" name="gn_q1_farming" value="1"> FARMING
                        <input type="checkbox" name="gn_q1_telecom" value="1"> TELECOMMUTER
                        <input type="checkbox" name="gn_q1_dayCare" value="1"> DAY
                        CARE # OF CHILDREN <input type="text" name="gn_q1_dayCareField" class="date-input"
                            style="width: 10%;">
                        <input type="checkbox" name="gn_q1_home" value="1"> HOME OFFICE / BUSINESS
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        2. ANY FLOODING, BRUSH, FOREST FIRE OR LANDSLIDE HAZARD?

                        <input type="text" name="gn_q2" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        3. ARE THERE ANY ANIMALS OR EXOTIC PETS KEPT ON PREMISES?
                        <div style="display: flex;">
                            <table style="width: 48%; margin-right: 20px;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>ANIMAL TYPE </b></td>
                                    <td style="font-size: 9px;"> <b>BREED</b></td>
                                    <td style="font-size: 9px;"> <b>BITE HISTORY (Y/N) </b></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="gn_q3_s1_animal" class="date-input"></td>
                                    <td><input type="text" name="gn_q3_s1_breed" class="date-input"></td>
                                    <td><input type="text" name="gn_q3_s1_bite" class="date-input"></td>
                                </tr>
                            </table>
                            <table style="width: 48%;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>ANIMAL TYPE </b></td>
                                    <td style="font-size: 9px;"> <b>BREED</b></td>
                                    <td style="font-size: 9px;"> <b>BITE HISTORY (Y/N) </b></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="gn_q3_s2_animal" class="date-input"></td>
                                    <td><input type="text" name="gn_q3_s2_breed" class="date-input"></td>
                                    <td><input type="text" name="gn_q3_s2_bite" class="date-input"></td>
                                </tr>
                            </table>
                        </div>
                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td>
                        4. IS PROPERTY SITUATED ON MORE THAN ONE ACRE?
                        <input type="text" name="gn_q4" class="date-input">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        5. ANY UNCORRECTED FIRE OR BUILDING CODE VIOLATIONS?
                        <input type="text" name="gn_q5" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        6. IS THE DWELLING FOR SALE? (no explanation needed)
                        <input type="text" name="gn_q6" class="date-input">
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        7. IS PROPERTY WITHIN 300 FEET OF A COMMERCIAL OR NON-RESIDENTIAL PROPERTY? (if "YES", describe
                        in detail)
                        <input type="text" name="gn_q7" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="border-bottom: 0;">
                        8. IS THERE A TRAMPOLINE ON THE PREMISES?

                        <input type="text" name="gn_q8" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        a. IF "YES", IS THERE A SAFETY NET? (no explanation needed)
                        <input type="text" name="gn_q8a" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        9. WAS THE STRUCTURE ORIGINALLY BUILT FOR OTHER THAN A PRIVATE RESIDENCE AND THEN CONVERTED?
                        <br>
                        ORIGINAL OCCUPANCY: <input type="text" name="gn_q9" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        10. ANY LEAD PAINT?
                        <input type="text" name="gn_q10" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        11. A FUEL TANK IS ON PREMISES. (TANK/OTHER/INSURANCE HELD/LOCATED AT/OR THE LIKE)
                        (If "YES", provide the name of the insurance company, the applicable limit and the cleanup
                        sublimit) <br>
                        <span>INSURANCE COMPANY: <input type="text" name="gn_q11a" class="date-input"
                                style="width: 20%;"></span>
                        <span>LIMIT: <input type="text" name="gn_q11b" class="date-input" style="width: 20%;"></span>
                        <span>CLEANUP/SUBLIMIT: <input type="text" name="gn_q11c" class="date-input"
                                style="width: 20%;">
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        12. IS THE RESIDENCE IN A GATED COMMUNITY?
                        <input type="text" name="gn_q12" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        13. DURING CONSTRUCTION, IS THE APPLICANT THE GENERAL CONTRACTOR?
                        <table>
                            <tr>
                                <td>START DATE </td>
                                <td>COMP DATE </td>
                                <td>INT</td>
                                <td>EXT</td>
                                <td>ADDITION</td>
                                <td>ADD LEVEL </td>
                                <td>STRUC CHANGES </td>
                                <td>MATERIALS UNATTACHED </td>
                                <td>OCC DURING REN </td>
                                <td>COST OF PROJECT </td>

                            </tr>
                            <tr>
                                <td><input type="text" name="gn_q13_start" class="date-input"></td>
                                <td><input type="text" name="gn_q13_comp" class="date-input"></td>
                                <td><span style="float: right;">% <input type="text" name="gn_q13_int"
                                            class="date-input"></span></td>
                                <td><span style="float: right;">% <input type="text" name="gn_q13_ext"
                                            class="date-input"></span></td>
                                <td><span style="float: right;">sq.ft <input type="text" name="gn_q13_addition"
                                            class="date-input"></span></td>
                                <td><span style="float: right;">sq.ft <input type="text" name="gn_q13_level"
                                            class="date-input"></span></td>
                                <td><span style="float: right;"><input type="checkbox" name="qn_q13_y" value="1">
                                        Y/N</span></td>
                                <td><input type="checkbox" name="qn_q13_inc" value="1"> Incl <input type="checkbox" name="qn_q13_excl" value="1">
                                    Excl</td>
                                <td><span style="float: right;"><input type="checkbox" name="qn_q13_N" value="1">
                                        Y/N</span></td>
                                <td>$ <input type="text" name="qn_q13_cost" class="date-input" style="width: 80%"></td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        14. IS THERE AN APPROVED CARBON MONOXIDE ALARM IN OPERATING CONDITION WITHIN THE MANDATED NUMBER
                        OF FEET OF EVERY ROOM USED FOR SLEEPING PURPOSES? (IL - 15 FT) (no explanation needed)

                        <input type="text" name="gn_q14" class="date-input">
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        15. IS THE NAMED INSURED THE OWNER OF THE PROPERTY? If "NO", provide the name of the owner. <br>
                        Owner Name : <input type="text" name="gn_q15" class="date-input"></td>
                    <td></td>
                </tr>
            </tbody>
        </table>


        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Prior Coverage <input type="checkbox"
                name="priorCoverage" value="1"> No
            Prior Coverage</div>
        <table>
            <tr>
                <td style="width: 50%; border-bottom: 0;">Prior Carrier</td>
                <td style="width: 30%; border-bottom: 0;">Prior Policy Number</td>
                <td style="border-bottom: 0;">Expiration Date</td>
            </tr>
            <tr>
                <td style="border-top: 0 ;"><input type="text" name="prior_carrier" class="date-input"></td>
                <td style="border-top: 0 ;"><input type="text" name="prior_policy" class="date-input"></td>
                <td style="border-top: 0 ;"><input type="text" name="prior_expire" class="date-input"></td>
            </tr>
        </table>
        <div style="font-size: 9px; font-weight: 600; margin-top: 5px; ">
            Local History <span style="float: right;"> Y/N <input type="checkbox" name="localHistory" value="1"> If yes
                indicateBelow | Applicant
                Initial : <input type="text" name="applicantInitials" class="date-input" style="width: 30%;"></span>
        </div>
        <table>
            <tr>
                <td>Loss Date</td>
                <td>Loss Type</td>
                <td style="width: 40%;">Description Of Loss</td>
                <td>Cat #</td>
                <td>Amount paid</td>
                <td>Entered By <br> (A)Agent <br> (C)COmpany</td>
                <td>In Despute <br> Y/N </td>
            </tr>
            <tr>
                <td><input type="text" name="localHistory_s1_lossdate" class="date-input"></td>
                <td><input type="text" name="localHistory_s1_losstype" class="date-input"></td>
                <td><input type="text" name="localHistory_s1_desc" class="date-input"></td>
                <td><input type="text" name="localHistory_s1_cat" class="date-input"></td>
                <td><input type="text" name="localHistory_s1_amountP" class="date-input"></td>
                <td><input type="text" name="localHistory_s1_enteredby" class="date-input"></td>
                <td><input type="text" name="localHistory_s1_indespute" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="text" name="localHistory_s2_lossdate" class="date-input"></td>
                <td><input type="text" name="localHistory_s2_losstype" class="date-input"></td>
                <td><input type="text" name="localHistory_s2_desc" class="date-input"></td>
                <td><input type="text" name="localHistory_s2_cat" class="date-input"></td>
                <td><input type="text" name="localHistory_s2_amountP" class="date-input"></td>
                <td><input type="text" name="localHistory_s2_enteredby" class="date-input"></td>
                <td><input type="text" name="localHistory_s2_indespute" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="text" name="localHistory_s3_lossdate" class="date-input"></td>
                <td><input type="text" name="localHistory_s3_losstype" class="date-input"></td>
                <td><input type="text" name="localHistory_s3_desc" class="date-input"></td>
                <td><input type="text" name="localHistory_s3_cat" class="date-input"></td>
                <td><input type="text" name="localHistory_s3_amountP" class="date-input"></td>
                <td><input type="text" name="localHistory_s3_enteredby" class="date-input"></td>
                <td><input type="text" name="localHistory_s3_indespute" class="date-input"></td>
            </tr>
        </table>

        <table class="form-table" style="margin-top: 10px;">
            <tbody>
                <tr>
                    <td style="font-weight: 600;">Additional Interest</td>
                    <td colspan="7"><input type="checkbox"> Accord 45 attached for additional names </td>
                </tr>
                <tr>
                    <td class="interest-cell" rowspan="3">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_insured" value="1">
                                <label>ADDITIONAL INSURED</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_lienholder" value="1">
                                <label>LIENHOLDER</label>
                            </div>

                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_loss" value="1">
                                <label>LOSS PAYEE</label>
                            </div>

                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_mortgagee" value="1">
                                <label>MORTGAGEE</label>
                            </div>

                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_trustee" value="1">
                                <label>TRUSTEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_other" value="1"> <input type="text"
                                    name="additionalINT_otherField" class="date-input">
                            </div>
                        </div>
                    </td>
                    <td colspan="4" style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold; margin-right: 10px;">NAME AND ADDRESS
                                <input type="text" name="additionalINT_nameAddress" class="date-input">
                            </span><br>
                            <div style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                <span class="label" style="font-weight: bold;  margin-right: 10px;"> RANK: <input
                                        type="text" name="additionalINT_rank" class="date-input"></span>
                            </div>
                            <div
                                style="display: flex; margin-right: 10px; align-items: center; justify-content: flex-end;">
                                <span class="label" style="font-weight: bold;">EVIDENCE:</span>

                            </div>
                            <div
                                style="display: flex; margin-right: 10px; align-items: center; justify-content: flex-end;">
                                <input type="checkbox" style="margin-right: 3px; margin-right: 10px;"
                                    name="additionalINT_certificate" value="1">
                                <span class="label" style="font-weight: bold;">CERTIFICATE</span>
                            </div>
                            <div
                                style="display: flex; margin-right: 10px; align-items: center; justify-content: flex-end;">
                                <input type="checkbox" style="margin-right: 3px; margin-right: 10px;"
                                    name="additionalINT_sendEmail" value="1">
                                <span class="label" style="font-weight: bold;">Send Email</span>
                            </div>
                        </div>

                        <div style="position: absolute; bottom: 5px; width: 95%;">
                            <div class="field-row" style="margin-top: 0;">
                                <span class="label" style="font-weight: bold;">REFERENCE / LOAN #: </span><input
                                    type="text" name="additionalINT_loan" class="date-input">
                            </div>
                        </div>
                    </td>

                </tr>

            </tbody>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">REMARKS / ATTACHMENTS (ACORD 101, Additional
            Remarks Schedule, may be attached if more space is required)</div>
        <table>
            <tr>
                <td><input type="checkbox" name="remarks_check_earth" value="1"> EARTHQUAKE APPLICATION</td>
                <td><input type="checkbox" name="remarks_check_pers" value="1"> PERS UMBRELLA APPLICATION SECTION</td>
                <td><input type="checkbox" name="remarks_check_residence" value="1"> RESIDENCE BASED BUSINESS SUPP</td>
                <td><input type="checkbox" name="remarks_check_windstrom" value="1"> WINDSTORM LOSS MITIGATION</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remarks_check_flood" value="1"> FLOOD EXCLUSION NOTICE</td>
                <td><input type="checkbox" name="remarks_check_photograph" value="1"> PHOTOGRAPH</td>
                <td><input type="checkbox" name="remarks_check_solid" value="1"> SOLID FUEL SUPPLEMENT</td>
                <td><input type="checkbox" name="remarks_check_other1" value="1"> <input type="text"
                        name="remarks_check_other" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remarks_check_lead" value="1"> LEAD FREE PAINT CERTIFICATION</td>
                <td><input type="checkbox" name="remarks_check_protection" value="1"> PROTECTION DEVICE CERTIFICATE</td>
                <td><input type="checkbox" name="remarks_check_state" value="1"> STATE SUPPLEMENT(S) (if applicable)
                </td>
                <td><input type="checkbox" name="remarks_checkother" value="1"> <input type="text"
                        name="remarks_check_other2" class="date-input"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remarks_check_personal" value="1"> PERSONAL INLAND MARINE SECTION</td>
                <td><input type="checkbox" name="remarks_check_replacement" value="1"> REPLACEMENT COST ESTIMATE</td>
                <td><input type="checkbox" name="remarks_check_water" value="1"> WATERCRAFT SECTION</td>
                <td><input type="checkbox" name="remarks_check3_other" value="1"> <input type="text"
                        name="remarks_check_other3" class="date-input"></td>
            </tr>
            <tr>
                <td colspan="4" style="height: 70px;"><textarea name="remarks" class="date-input" rows="8"></textarea>
            </tr>
        </table>
        <div class="page-break"></div>
        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID :<input type="text"
                name="agencyID" class="date-input" style="width: 20%;"></p>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">BINDER / NOTICE OF INFORMATION PRACTICES</div>
        <table>
            <tr>
                <td colspan="2" style="width: 350px;">Insurance Binder</td>
                <td rowspan="6" style="font-size: 10px;">
                    <p>If the “BINDER” box to the left is completed, the following conditions apply:
                        This company binds the kind(s) of insurance stipulated on this application.
                        This insurance is subject to the terms, conditions and limitations of the policy(ies)
                        in current use by the company.</p>
                    <p>This binder may be cancelled by the insured by surrender of this binder or by written
                        notice to the company stating when cancellation will be effective.</p>
                </td>
            </tr>
            <tr>
                <td>Effective Date</td>
                <td>Expiration date</td>
            </tr>
            <tr>
                <td><input type="text" name="binders_effective" class="date-input"></td>
                <td><input type="text" name="binders_expire" class="date-input"></td>
            </tr>
            <tr>
                <td>Time</td>
                <td><input type="checkbox" name="binders_time" value="1"> 12:01 AM</td>
            </tr>
            <tr>
                <td>12:01 AM</td>
                <td><input type="checkbox" name="binders_noon" value="1"> Noon</td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" name="binders_coverage" value="1"> Coverage Is not bound</td>

            </tr>
            <tr>
                <td colspan="3" style="font-size: 10px;">
                    <p>
                        This binder may be cancelled by the company by notice to the insured in accordance with the
                        policy conditions. This binder is cancelled when replaced by a policy. If this binder is not
                        replaced by a policy, the company is entitled to charge a premium for the binder according to
                        the rules and rates in use by the company. The quoted premium is subject to verification and
                        adjustment, when necessary, by the company.

                    </p>
                    <p>
                        <u>APPLICABLE IN ARIZONA</u>: Binders are effective for no more than 90 days.

                        <u>APPLICABLE IN COLORADO</u>: The insurer has thirty (30) business days, commencing from the
                        effective date of coverage, to evaluate the issuance of the insurance policy.

                        <u>APPLICABLE IN MARYLAND</u>: The insurer has 45 business days, commencing from the effective
                        date of coverage, to confirm eligibility for coverage under the insurance policy.

                        <u>APPLICABLE IN MICHIGAN</u>: The binder may be cancelled at any time at the request of the
                        insured.

                        <u>APPLICABLE IN MONTANA</u>: No binder shall be valid beyond the issuance of the policy with
                        respect to which it was given or beyond 90 days from its effective date, whichever period is the
                        shorter. If the policy has not been issued, a binder may be extended or renewed beyond such 90
                        days with the written approval of the Commissioner.

                        <u>APPLICABLE IN OKLAHOMA</u>: Binders shall expire at 12:01 AM standard time on the expiration
                        date stated in the policy.

                        <u>APPLICABLE IN OREGON</u>: Binders are effective for no more than ninety (90) days. A binder
                        extension or renewal beyond such 90 days would require the written approval by the Director of
                        the Department of Consumer and Business Services.
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="font-size: 10px;">
                    <p>PERSONAL INFORMATION
                        Personal information about you, including information from a credit or other investigative
                        report, may be collected from persons other than you in connection with this application for
                        insurance and subsequent amendments and renewals. Such information as well as other personal and
                        privileged information collected by us or our agents may in certain circumstances be disclosed
                        to third parties without your authorization. Credit scoring information may be used in
                        connection with this application for insurance or the premium you will be charged. We may use a
                        third party in connection with the development of your credit score. You have the right to
                        review your personal information in our files and request correction of any inaccuracies. You
                        also have the right to request in writing that we consider extraordinary life circumstances in
                        connection with the use of your credit score. These rights may be limited in some states.
                        Contact your agent or broker to learn how these rights may apply in your state. You are entitled
                        to receive a more detailed description of your rights and our practices regarding personal
                        information.
                    </p>
                    <p style="text-align: right;">
                        Applicant Initials : <input type="text" name="applicantInitials" class="date-input"
                            style="width: 20%;">
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>
                        <input type="checkbox" name="tems" value="1"> Copy of the Notice of Information Practices
                        (Privacy) has been given to
                        the applicant (Not required in all states, please contact your agent or broker for your state’s
                        requirements).
                    </p>
                </td>
            </tr>

        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">FRAUD STATEMENTS / SIGNATURE</div>
        <table>
            <tr>
                <td colspan="6">
                    <p>Applicable in AL, AR, DC, LA, MD, NM, RI and WV
                        Any person who knowingly (or willfully)* presents a false or fraudulent claim for payment of a
                        loss or benefit or knowingly (or willfully)* presents false information in an application for
                        insurance is guilty of a crime and may be subject to fines and confinement in prison. *Applies
                        in MD Only.</p>
                    <p>Applicable in CO
                        It is unlawful to knowingly provide false, incomplete, or misleading facts or information to an
                        insurance company for the purpose of defrauding or attempting to defraud the company. Penalties
                        may include imprisonment, fines, denial of insurance and civil damages. Any insurance company or
                        agent of an insurance company who knowingly provides false, incomplete, or misleading facts or
                        information to a policyholder or claimant for the purpose of defrauding or attempting to defraud
                        the policyholder or claimant with regard to a settlement of a claim payable from insurance
                        proceeds shall be reported to the Colorado Division of Insurance within the Department of
                        Regulatory Agencies.
                    </p>
                    <p>Applicable in FL and OK
                        Any person who knowingly and with intent to injure, defraud, or deceive any insurer files a
                        statement of claim or an application containing any false, incomplete, or misleading information
                        is guilty of a felony (of the third degree).* *Applies in FL Only.
                    </p>
                    <p>Applicable in KY, NY, and PA
                        Any person who knowingly and with intent to defraud, presents, causes to be presented or
                        prepares with knowledge or belief of its falsity, any written statement as part of, or in
                        support of, an application for the issuance of, or the rating of an insurance policy, or a claim
                        for payment or benefit pursuant to an insurance policy, which he knows to contain materially
                        false information concerning any fact material thereto, or conceals for the purpose of
                        misleading, information concerning any fact material thereto, commits a fraudulent insurance
                        act, which is a crime and subjects such person to criminal and civil penalties.* *Applies in NY:
                        Any person who knowingly and with intent to defraud any insurance company or other person files
                        an application for insurance or statement of claim containing any materially false information,
                        or conceals for the purpose of misleading, information concerning any fact material thereto,
                        commits a fraudulent insurance act, which is a crime, and shall also be subject to a civil
                        penalty not to exceed five thousand dollars and the stated value of the claim for each such
                        violation.
                    </p>
                    <p>Applicable in ME, TN, VA and WA
                        It is a crime to knowingly provide false, incomplete, or misleading information to an insurance
                        company for the purpose of defrauding the company. Penalties may include imprisonment, fines, or
                        a denial of insurance benefits. *Applies in ME Only.
                    </p>
                    <p>Applicable in OH
                        Any person who, with intent to defraud or knowing that he is facilitating a fraud against an
                        insurer, submits an application or files a claim containing a false or deceptive statement is
                        guilty of insurance fraud.
                    </p>
                    <p>Applicable in OR
                        Any person who knowingly and with intent to defraud or mislead information on an application for
                        an insurance policy is subject to criminal and/or civil penalties.
                    </p>
                    <p>Applicable in PR
                        Any person who knowingly and with intent to defraud an insurer, presents false information in an
                        insurance application, or presents, helps, or causes the presentation of a fraudulent claim for
                        the payment of a loss or other benefit, or presents more than one claim for the same damage or
                        loss, shall incur a felony, and upon conviction shall be sanctioned for each violation with the
                        penalty of a fine of no less than five thousand dollars ($5,000) and no more than ten thousand
                        dollars ($10,000); or a fixed term of imprisonment for three (3) years, or both penalties. If
                        aggravated circumstances are present, the fixed penalty of imprisonment may be increased to a
                        maximum of five (5) years; if attenuating circumstances are present, it may be reduced to a
                        minimum of two (2) years.
                    </p>

                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <p>
                        APPLICANT’S STATEMENT

                        I HAVE READ THE ABOVE APPLICATION AND ANY ATTACHMENTS. I DECLARE THAT THE INFORMATION PROVIDED
                        IN THEM IS TRUE, COMPLETE AND CORRECT TO THE BEST OF MY KNOWLEDGE AND BELIEF. THIS INFORMATION
                        IS BEING OFFERED TO THE COMPANY AS AN INDUCEMENT TO ISSUE THE POLICY FOR WHICH I AM APPLYING.

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">Producere Signature <br> <input type="text" name="producerSignature" class="date-input">
                </td>
                <td colspan="2">Producere Name <br> <input type="text" name="producerName" class="date-input"> </td>
                <td colspan="2"> State Producer license # <br> <input type="text" name="stateLicense"
                        class="date-input"></td>

            </tr>
            <tr>
                <td colspan="3">Applicant Signature <br> <input type="text" name="applicantSignature"
                        class="date-input"></td>
                <td colspan="1">Date <br> <input type="text" name="dateApplication" class="date-input"></td>
                <td colspan="2">National Producer # <br> <input type="text" name="nationalProducer" class="date-input">
                </td>

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
        <p style="text-align: center; font-weight: bold; font-size: 9px; margin-top: 10px;">The ACORD name and logo are
            registered marks of ACORD</p>

    </div>

    <div class="flex justify-center mt-6 space-x-3">
        <button type="submit"
                class="bg-sky-500 hover:bg-sky-600 text-white font-medium px-5 py-2 rounded-lg shadow transition">
            Submit
        </button>
        <button type="reset"
                class="bg-gray-800 hover:bg-gray-900 text-white font-medium px-5 py-2 rounded-lg shadow transition">
            Reset
        </button>
    </div>

 </form>
@endsection
