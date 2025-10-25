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
                    <p>{{ $form->invoideDate }}</p>
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
                                    <p style="margin-bottom: 5px;">{{ $form->agency_name }}</p>
                                    <p style="margin-bottom: 5px;">{{ $form->agency_address }}</p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border-top: 0; border-bottom: 0; border-right: 0;" colspan="2">
                                    {{ $form->agency_city }}
                                </td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;">{{ $form->agency_state }}
                                    {{ $form->agency_zipCode }}
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td colspan="2">Contact Name: {{ $form->contact_name }}</td>
                            </tr>
                            <tr>

                                <td colspan="2">Phone : {{ $form->contact_phone }}</td>
                            </tr>
                            <tr>

                                <td colspan="2">Fax : {{ $form->contact_fax }}</td>
                            </tr>
                            <tr>


                                <td colspan="2">Email : {{ $form->contact_email }}</td>
                            </tr>

                            <tr>
                                <td>CODE : {{ $form->code }}</td>
                                <td>SUBCODE : {{ $form->subcode }}</td>
                            </tr>
                            <tr>

                                <td colspan="2">AGENCY CUSTOMER ID : {{ $form->agency_cust_id }}</td>
                            </tr>
                        </table>
                    </div>
                </td>
                <td style="border: 0; width: 50%;  padding: 0;">
                    <table>
                        <tr>
                            <td style="height: 45px;" colspan="3">Carier : <br> {{ $form->carier }}</td>
                            <td>Niac : <br> {{ $form->naicCode }}</td>
                        </tr>
                        <tr>
                            <td style="height: 45px;" colspan="4">Named Insured : <br> {{ $form->nameIsured }}</td>
                        </tr>
                        <tr>
                            <td style="height: 45px;" colspan="4">Policy Number : <br> {{ $form->policyNumber }}</td>
                        </tr>

                        <tr>
                            <td style="height: 45px;">Plan : {{ $form->plan }}</td>
                            <td>Facility Code : {{ $form->facilityCode }}</td>
                            <td>Expiration Date : {{ $form->expirationDate }}</td>
                            <td>Effective Date : {{ $form->effectiveDate }}</td>
                        </tr>
                        <tr>
                            <td style="height: 34px;" colspan="2">DATE AGENT LAST INSPECTED PROPERTY {{ $form->dateAgentLastInspect }}</td>
                            <td colspan="2">HOW LONG HAVE YOU KNOWN THE APPLICANT {{ $form->knownApplicant }}

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
                                    <p style="margin-bottom: 5px;">{{ $form->dwelling_applicants->applicant_agency_name }}</p>
                                    <p style="margin-bottom: 5px;">{{ $form->dwelling_applicants->applicant_agency_address }}</textarea></p>
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
                                    {{ $form->dwelling_applicants->applicant_agency_city }}
                                </td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;">{{ $form->dwelling_applicants->applicant_agency_state }} {{ $form->dwelling_applicants->applicant_agency_zipCode }}</td>
                            </tr>

                        </table>

                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td>DATE OF BIRTH {{ $form->dwelling_applicants->applicant_birthday }}</td>
                                <td>SOCIAL SECURITY # {{ $form->dwelling_applicants->applicant_socialSecurity }}</td>
                                <td>MARITAL STATUS * / CIVIL UNION (if applicable) {{ $form->dwelling_applicants->applicant_maritalStatus }}</td>
                            </tr>
                            <tr>

                                <td colspan="4" style="font-size: 6px;">* This field may not be utilized for
                                    policyholders applying for residential property insurance in CA. </td>
                            </tr>
                            <tr>
                                <td colspan="2"><span>Primary Phone : </span> {{ $form->dwelling_applicants->applicant_primaryPhone }}<br> 
                                    <input type="checkbox" name="applicant_primaryhome" {{ $form->dwelling_applicants->applicant_primaryhome == 1 ? 'checked disabled' : 'disabled' }}  value="1"> Home
                                    <input type="checkbox" name="applicant_primarybuss" {{ $form->dwelling_applicants->applicant_primarybuss == 1 ? 'checked disabled' : 'disabled'}}  value="1"> Buss <input
                                        type="checkbox" name="applicant_primarycell" {{ $form->dwelling_applicants->applicant_primarycell == 1 ? 'checked disabled' : 'disabled'}} value="1"> Cell
                                </td>
                                <td colspan="2">Secondary Phone : {{ $form->dwelling_applicants->applicant_secondaryPhone }} <br> 
                                    <input type="checkbox" name="applicant_secondaryhome"  {{ $form->dwelling_applicants->applicant_secondaryhome == 1 ? 'checked disabled' : 'disabled'}} value="1"> Home
                                    <input type="checkbox" name="applicant_secondarybuss" {{ $form->dwelling_applicants->applicant_secondarybuss == 1 ? 'checked disabled' : 'disabled'}}  value="1"> Buss <input
                                        type="checkbox" name="applicant_secondarycell"  {{ $form->dwelling_applicants->applicant_secondarycell == 1 ? 'checked disabled' : 'disabled'}} value="1"> Cell
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="height: 50px;">
                                    <span>PREVIOUS ADDRESS {{ $form->dwelling_applicants->applicant_previousAddress }}</span>

                                    <br><span style="font-size: 7px;">YEARS AT PREVIOUS ADDRESS (if less than
                                        three years): {{ $form->dwelling_applicants->applicant_yearPreviousAdd }}
                                    </span>
                                    <br>

                                </td>
                            </tr>
                            <tr>
                                <td colspan="4" style="height: 30px;">
                                    <span>APPLICANT'S OCCUPATION (State Nature of Business if Self-Employed)</span>
                                    <br>
                                    {{ $form->dwelling_applicants->applicant_occupation }}
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
                                    <p style="margin-bottom: 5px;">{{ $form->dwelling_applicants->applicant_mailingName }}</p>
                                    <p style="margin-bottom: 5px;">{{ $form->dwelling_applicants->applicant_mailingaddress }}</textarea></p>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td style="width: 70%; border-top: 0; border-bottom: 0; border-right: 0;" colspan="2">
                                    {{ $form->dwelling_applicants->applicant_mailing_city }}
                                </td>
                                <td style="border-top: 0; border-bottom: 0; border-left: 0;">
                                        {{ $form->dwelling_applicants->applicant_mailing_state }} {{ $form->dwelling_applicants->applicant_mailing_zipCode }}</td>
                            </tr>

                        </table>

                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td colspan="2">DATE AT MAILING ADDRESS: {{ $form->dwelling_applicants->applicant_mailingdate }}</td>
                            </tr>
                            <tr>

                                <td colspan="2">PRIMARY E-MAIL ADDRESS: {{ $form->dwelling_applicants->applicant_mailingPrimaryEmail }}</td>
                            </tr>

                            <tr>


                                <td colspan="2">SECONDARY E-MAIL ADDRESS: {{ $form->dwelling_applicants->applicant_mailingSecondaryEmail }} </td>
                            </tr>

                            <tr>
                                <td colspan="2">DWELLING LOCATION {{ $form->dwelling_applicants->dwellingLocationCheck }} Check if same as mailing
                                    address</td>
                            </tr>
                            <tr>

                                <td colspan="2"> YEARS IN CURRENT OCCUPATION: <br> {{ $form->dwelling_applicants->applicant_yearCurrentOc }}</td>
                            </tr>
                            <tr>

                                <td> YEARS WITH CURRENT EMPLOYER: {{ $form->dwelling_applicants->applicant_yearWCEmployeer }}</td>
                                <td> YEARS WITH PREVIOUS EMPLOYER: {{ $form->dwelling_applicants->applicant_yearWPEmployeer }}</td>
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
                    <td><input type="checkbox" name="coverage_fire" {{ $form->dwelling_coverages->coverage_fire == 1 ? 'checked disabled' : 'disabled'}} value="1"> FIRE</td>
                    <td><input type="checkbox" name="coverage_fireEC" {{ $form->dwelling_coverages->coverage_fireEC == 1 ? 'checked disabled' : 'disabled'}} value="1"> FIRE & EC</td>
                    <td><input type="checkbox" name="coverage_fireECVM" {{ $form->dwelling_coverages->coverage_fireECVM == 1 ? 'checked disabled' : 'disabled'}} value="1"> FIRE, EC & VMM</td>
                    <td><input type="checkbox" name="coverage_broad" {{ $form->dwelling_coverages->coverage_broad == 1 ? 'checked disabled' : 'disabled'}} value="1"> BROAD</td>
                    <td><input type="checkbox" name="coverage_special" {{ $form->dwelling_coverages->coverage_special == 1 ? 'checked disabled' : 'disabled'}} value="1"> SPECIAL</td>
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
                <td>$ {{ $form->dwelling_coverages->coverage_s1_limit }}</td>
                <td>$ {{ $form->dwelling_coverages->coverage_s1_premium }}</td>
                <td>REPL COST - FULL VALUE</td>
                <td><input type="checkbox" name="coverage_s1_option_check" {{ $form->dwelling_coverages->coverage_s1_option_check == 1 ? 'checked disabled' : 'disabled' }} value="1"> INCLUDED</td>
                <td>{{ $form->dwelling_coverages->coverage_s1s_limits }} % MAX</td>
                <td>$ {{ $form->dwelling_coverages->coverage_s1s_premium }}</td>
            </tr>
            <tr>
                <td rowspan="2">OTHER STRUCTURES</td>
                <td rowspan="2"><input type="checkbox" name="coverage_s2_option_check" {{ $form->dwelling_coverages->coverage_s2_option_check == 1 ? 'checked disabled' : 'disabled' }} value="1"> INCLUDED <br>
                    $ {{ $form->dwelling_coverages->coverage_s2_option_checkField }}</td>
                <td rowspan="2">$ {{ $form->dwelling_coverages->coverage_s2_prem }}</td>
                <td>REPL COST - DWELLING </td>
                <td><input type="checkbox" name="coverage_s2s_option_check" {{ $form->dwelling_coverages->coverage_s2s_option_check == 1 ? 'checked disabled' : 'disabled' }} value="1"> INCLUDED</td>
                <td></td>
                <td>$ {{ $form->dwelling_coverages->coverage_s2s_prem }}</td>
            </tr>
            <tr>
                <td>REPL COST - CONTENTS </td>
                <td><input type="checkbox" name="coverage_s3_option_check" {{ $form->dwelling_coverages->coverage_s3_option_check == 1 ? 'checked disabled' : 'disabled' }}  value="1"> INCLUDED </td>
                <td></td>
                <td>$ {{ $form->dwelling_coverages->coverage_s3_prem }}</td>

            </tr>
            <tr>
                <td>PERSONAL PROPERTY</td>
                <td>$ {{ $form->dwelling_coverages->coverage_s4_prem }}</td>
                <td>$ {{ $form->dwelling_coverages->coverage_s5_prem }}</td>
                <td colspan="3" style="text-align: right;">TOTAL LOCATION PREMIUM</td>

                <td>$ {{ $form->dwelling_coverages->totalPremLocation }}</td>
            </tr>
            <tr>
                <td rowspan="2">LOSS OF USE </td>
                <td rowspan="2"><input type="checkbox" name="lossUse_sustained" {{ $form->dwelling_coverages->lossUse_sustained == 1 ? 'checked disabled' : 'disabled' }} value="1"> ACTUAL LOSS SUSTAINED <br> $
                    {{ $form->dwelling_coverages->lossUse_sustainedamount }}
                </td>
                <td rowspan="2">$ {{ $form->dwelling_coverages->lossUse_prem }}</td>
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
                            <td>$ {{ $form->dwelling_coverages->base_s1_amount }}</td>
                            <td>% {{ $form->dwelling_coverages->base_s1_percent }}</td>
                            <td> {{ $form->dwelling_coverages->base_s1_type }}</td>
                            <td>Name Hurricane</td>
                            <td>$ {{ $form->dwelling_coverages->base_s2_amount }}</td>
                            <td>% {{ $form->dwelling_coverages->base_s2_percent }}</td>
                            <td> {{ $form->dwelling_coverages->base_s2_type }}</td>
                        </tr>
                        <tr>
                            <td style="border-left: 0 ;">Wind / Hail</td>
                            <td>$ {{ $form->dwelling_coverages->wind_s1_amount }}</td>
                            <td>% {{ $form->dwelling_coverages->wind_s1_percent }}</td>
                            <td> {{ $form->dwelling_coverages->wind_s1_type }}</td>
                            <td>Annual Hurricane</td>
                            <td>$ {{ $form->dwelling_coverages->wind_s2_amount }}</td>
                            <td>% {{ $form->dwelling_coverages->wind_s2_percent }}</td>
                            <td> {{ $form->dwelling_coverages->wind_s2_type }}</td>
                        </tr>
                        <tr>
                            <td style="border-left: 0 ;">Theif</td>
                            <td>$ {{ $form->dwelling_coverages->theift_s1_amount }}</td>
                            <td>% {{ $form->dwelling_coverages->theift_s1_percent }}</td>
                            <td> {{ $form->dwelling_coverages->theift_s1_type }}</td>
                            <td>{{ $form->dwelling_coverages->theift_s1_other }}</td>
                </td>
                <td>$ {{ $form->dwelling_coverages->theift_s2_amount }}</td>
                <td>% {{ $form->dwelling_coverages->theift_s2_percent }}</td>
                <td> {{ $form->dwelling_coverages->theift_s2_type }}</td>
            </tr>
            <tr>
                <td style="border-left: 0 ;">{{ $form->dwelling_coverages->otherR1_s1_title }}</td>
                <td>$ {{ $form->dwelling_coverages->otherR1_s1_amount }}</td>
                <td>% {{ $form->dwelling_coverages->otherR1_s1_percent }}</td>
                <td> {{ $form->dwelling_coverages->otherR1_s1_type }}</td>
                <td>{{ $form->dwelling_coverages->otherR1_s1_other }}</td>
                </td>
                <td>$ {{ $form->dwelling_coverages->otherR1_s2_amount }}</td>
                <td>% {{ $form->dwelling_coverages->otherR1_s2_percent }}</td>
                <td> {{ $form->dwelling_coverages->otherR1_s2_type }}</td>
            </tr>
            <tr>
                <td style="border-left: 0 ;">{{ $form->dwelling_coverages->otherR2_s1_title }}</td>
                <td>$ {{ $form->dwelling_coverages->otherR2_s1_amount }}</td>
                <td>% {{ $form->dwelling_coverages->otherR2_s1_percent }}</td>
                <td> {{ $form->dwelling_coverages->otherR2_s1_type }}</td>
                <td>{{ $form->dwelling_coverages->otherR2_s1_other }}</td>
                </td>
                <td>$ {{ $form->dwelling_coverages->otherR2_s2_amount }}</td>
                <td>% {{ $form->dwelling_coverages->otherR2_s2_percent }}</td>
                <td> {{ $form->dwelling_coverages->otherR2_s2_type }}</td>
            </tr>
            <tr>
                <td style="border-left: 0 ;">{{ $form->dwelling_coverages->otherR3_s1_title }}</td>
                <td>$ {{ $form->dwelling_coverages->otherR3_s1_amount }}</td>
                <td>% {{ $form->dwelling_coverages->otherR3_s1_percent }}</td>
                <td> {{ $form->dwelling_coverages->otherR3_s1_type }}</td>
                <td style="border-bottom: 0; border-left: 0 ;" colspan="4" rowspan="2">
                    * Named Storm Percentage Deductible in North Carolina
                    <br><br> Notapplicable in North corolina
                </td>
            </tr>
            <tr>
                <td colspan="4" style="height: 58px;">{{ $form->dwelling_coverages->includedDwellingStructure }}</td>
            </tr>
        </table>
        </td>
        </tr>
        <tr>
            <td>BLANKET* </td>
            <td>$ {{ $form->dwelling_coverages->blanket_limit }}</td>
            <td>$ {{ $form->dwelling_coverages->blanket_prem }}</td>
        </tr>
        <tr>
            <td>Rental Value</td>
            <td><input type="checkbox" name="rental_limit_check" {{ $form->dwelling_coverages->rental_limit_check == 1 ? 'checked disabled' : 'disabled' }}> ACTUAL LOSS SUSTAINED <br> $ {{ $form->dwelling_coverages->rental_limit_checkField }}</td>
            <td>$ {{ $form->dwelling_coverages->rental_prem }}</td>
        </tr>
        <tr>
            <td>ADDITIONAL EXPENSE </td>
            <td>$ {{ $form->dwelling_coverages->addition_limit }}</td>
            <td>$ {{ $form->dwelling_coverages->addition_prem }}</td>
        </tr>
        <tr>
            <td>PERSONAL LIABILITY EA OCC </td>
            <td>$ {{ $form->dwelling_coverages->personalLib_limit }}</td>
            <td>$ {{ $form->dwelling_coverages->personalLib_prem }}</td>
        </tr>
        <tr>
            <td>MEDICAL PAYMENTS EA PER </td>
            <td>$ {{ $form->dwelling_coverages->medicalPay_limit }}</td>
            <td>$ {{ $form->dwelling_coverages->medicalPay_prem }}</td>
        </tr>
        <tr>
            <td colspan="3">Includes Dwelling, Other Structures, Personal Property, Loss of Use</td>
        </tr>
        </table>
        <div class="page-break"></div>

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
                <td>{{ $form->dwelling_forms->formAndor_r1_loc }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r1_formNum }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r1_formName }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r1_editionDate }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r1_copyright }}</td>
            </tr>
            <tr>
                <td>{{ $form->dwelling_forms->formAndor_r2_loc }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r2_formNum }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r2_formName }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r2_editionDate }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r2_copyright }}</td>
            </tr>
            <tr>
                <td>{{ $form->dwelling_forms->formAndor_r3_loc }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r3_formNum }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r3_formName }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r3_editionDate }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r3_copyright }}</td>
            </tr>
            <tr>
                <td>{{ $form->dwelling_forms->formAndor_r4_loc }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r4_formNum }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r4_formName }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r4_editionDate }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r4_copyright }}</td>
            </tr>
            <tr>
                <td>{{ $form->dwelling_forms->formAndor_r5_loc }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r5_formNum }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r5_formName }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r5_editionDate }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r5_copyright }}</td>
            </tr>
            <tr>
                <td>{{ $form->dwelling_forms->formAndor_r6_loc }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r6_formNum }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r6_formName }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r6_editionDate }}</td>
                <td>{{ $form->dwelling_forms->formAndor_r6_copyright }}</td>
            </tr>
        </table>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">
            PAYMENT PLAN (Attach ACORD 610, Premium Payment Supplement, if additional information is required)
        </div>

        <table>
            <tr>
                <td colspan="3">BILLING ACCOUNT #: {{ $form->dwelling_forms_and_payments->paymentPlan_billing }}
                </td>
                <td colspan="2">DEPOSIT AMOUNT:$ {{ $form->dwelling_forms_and_payments->paymentPlan_deposit }}</td>
                <td>EST TOTAL PREMIUM:$ {{ $form->dwelling_forms_and_payments->paymentPlan_estTotal }}</td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;">BILLING </td>
                <td style="border-top: 0;  border-bottom: 0;" colspan="2">Payment Plan</td>
                <td style="border-top: 0;  border-bottom: 0;" colspan="2">Payment Method</td>
                <td style="border-top: 0;  border-bottom: 0;">Mail Policy to</td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox"  {{ $form->dwelling_forms_and_payments->paymentPlan_directBillP == 1 ? 'checked disabled' : 'disabled' }} name="paymentPlan_directBillP"
                        value="1"> DIRECT BILL - POLICY</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_fullPay == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_fullPay" value="1"> FULL PAY</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_BIMonthly == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_BIMonthly" value="1"> BI-Monthly</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_cash == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_cash" value="1"> Cash</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_EFT == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_EFT" value="1"> EFT</td>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_Agent == 1 ? 'checked disabled' : 'disabled' }}  name="paymentPlan_Agent"
                        value="1"> Agent</td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_directBillAcct == 1 ? 'checked disabled' : 'disabled' }}  name="paymentPlan_directBillAcct"
                        value="1"> DIRECT BILL - ACCT</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_annual == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_annual" value="1"> Annual</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_monthly == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_monthly" value="1"> Monthly</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_check == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_check" value="1"> Check</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_payroll == 1 ? 'checked disabled' : 'disabled' }} 
                        name="paymentPlan_payroll" value="1"> Payroll Deduction
                </td>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_Insured == 1 ? 'checked disabled' : 'disabled' }}  name="paymentPlan_Insured"
                        value="1"> Insured</td>
            </tr>
            <tr>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_agentBill == 1 ? 'checked disabled' : 'disabled' }} name="paymentPlan_agentBill"
                        value="1"> Agent BILL</td>
                <td style="border-top: 0;  border-bottom: 0; border-right: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_semiAnnual == 1 ? 'checked disabled' : 'disabled' }}
                        name="paymentPlan_semiAnnual" value="1"> Semi-Annual</td>
                <td style="border-top: 0;  border-bottom: 0; border-left: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_other1Check == 1 ? 'checked disabled' : 'disabled' }}
                        name="paymentPlan_other1Check" value="1"> {{ $form->dwelling_forms_and_payments->paymentPlan_other1CheckField }}</td>
                <td style="border-top: 0;  border-bottom: 0;  border-right: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_creditCard == 1 ? 'checked disabled' : 'disabled' }}
                        name="paymentPlan_creditCard" value="1"> Credit Card
                </td>
                <td style="border-top: 0;  border-bottom: 0;  border-left: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_preAuth == 1 ? 'checked disabled' : 'disabled' }}
                        name="paymentPlan_preAuth" value="1"> PRE-AUTHORIZED
                    DRAFT/CHECK (PAC)</td>
                <td style="border-top: 0;  border-bottom: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_other2Check == 1 ? 'checked disabled' : 'disabled' }} name="paymentPlan_other2Check"
                        value="1"> {{ $form->dwelling_forms_and_payments->paymentPlan_other2CheckField }}</td>
            </tr>
            <tr>
                <td style="border-top: 0;"> </td>
                <td style="border-top: 0;  border-right: 0;"> <input type="checkbox" {{ $form->dwelling_forms_and_payments->paymentPlan_quaterly == 1 ? 'checked disabled' : 'disabled' }} name="paymentPlan_quaterly"
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
                <td style="border-top: 0;" colspan="2"> <input type="checkbox" name="prem_insured" {{ $form->dwelling_forms_and_payments->prem_insured == 1 ? 'checked disabled' : 'disabled' }} value="1"> INSURED 
                    <input type="checkbox" name="prem_morg" {{ $form->dwelling_forms_and_payments->prem_morg == 1 ? 'checked disabled' : 'disabled' }} value="1">
                    MORTGAGEE <input type="checkbox" name="prem_othCheck" {{ $form->dwelling_forms_and_payments->prem_othCheck == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_forms_and_payments->prem_othCheckFiled }}</td>
                <td style="border-top: 0;">
                    <input type="checkbox" name="premium_financed" {{ $form->dwelling_forms_and_payments->premium_financed == 1 ? 'checked disabled' : 'disabled' }} value="1"> YES
                    <input type="checkbox" name="premium_financed" {{ $form->dwelling_forms_and_payments->premium_financed == 0 ? 'checked disabled' : 'disabled' }} value="0"> NO
                </td>
                <td style="border-top: 0;" colspan="3">{{ $form->dwelling_forms_and_payments->paymentPlan_financeCompany }}</td>
            </tr>
        </table>
<div class="page-break"></div>
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
                <td><input type="checkbox" name="ratingUnder_mosonryVenner" {{ $form->dwelling_rating->ratingUnder_mosonryVenner == 1 ? 'checked disabled' : 'disabled' }} value="1"> Masonry Veneer</td>
                <td>{{ $form->dwelling_rating->ratingUnder_percentage }}</td>
                <td><input type="checkbox" name="ratingUnder_buildersRisk" {{ $form->dwelling_rating->ratingUnder_buildersRisk == 1 ? 'checked disabled' : 'disabled' }} value="1"> Builders Risk</td>
                <td><input type="checkbox" name="ratingUnder_exellent" {{ $form->dwelling_rating->ratingUnder_exellent == 1 ? 'checked disabled' : 'disabled' }} value="1"> Exellent </td>
                <td><input type="checkbox" name="ratingUnder_average" {{ $form->dwelling_rating->ratingUnder_average == 1 ? 'checked disabled' : 'disabled' }} value="1"> Average</td>
                <td>Sysytem </td>
                <td>Smoke</td>
                <td>Temp</td>
                <td>Burg</td>
                <td>Fire Hydrant</td>
                <td>Fire station</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="frame_frame" {{ $form->dwelling_rating->frame_frame == 1 ? 'checked disabled' : 'disabled' }} value="1"> Frame</td>
                <td>{{ $form->dwelling_rating->frame_percentage }}</td>
                <td><input type="checkbox" name="frame_renovation" {{ $form->dwelling_rating->frame_renovation == 1 ? 'checked disabled' : 'disabled' }} value="1"> Renovation</td>
                <td><input type="checkbox" name="frame_good" {{ $form->dwelling_rating->frame_good == 1 ? 'checked disabled' : 'disabled' }} value="1"> Good </td>
                <td><input type="checkbox" name="frame_belowAvg" {{ $form->dwelling_rating->frame_belowAvg == 1 ? 'checked disabled' : 'disabled' }} value="1"> Below Avg</td>
                <td>Central </td>
                <td><input type="checkbox" name="frame_check1smoke" {{ $form->dwelling_rating->frame_check1smoke == 1 ? 'checked disabled' : 'disabled' }} value="1"> </td>
                <td><input type="checkbox" name="frame_check1temp" {{ $form->dwelling_rating->frame_check1temp == 1 ? 'checked disabled' : 'disabled' }} value="1"> </td>
                <td><input type="checkbox" name="frame_check1burg" {{ $form->dwelling_rating->frame_check1burg == 1 ? 'checked disabled' : 'disabled' }} value="1"> </td>
                <td>FT {{ $form->dwelling_rating->frame_FT }}</td>
                <td>MI {{ $form->dwelling_rating->frame_MI }}</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="masonry_masonry" {{ $form->dwelling_rating->masonry_masonry == 1 ? 'checked disabled' : 'disabled' }} value="1"> Masonry</td>
                <td></td>
                <td><input type="checkbox" name="masonry_reconstruction" {{ $form->dwelling_rating->masonry_reconstruction == 1 ? 'checked disabled' : 'disabled' }} value="1"> Reconstruction</td>
                <td colspan="2">Plumbing Condition </td>
                <td>Direct </td>
                <td><input type="checkbox" name="masonry_check2smoke" {{ $form->dwelling_rating->masonry_check2smoke == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="masonry_check2temp" {{ $form->dwelling_rating->masonry_check2temp == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="masonry_check2burg" {{ $form->dwelling_rating->masonry_check2burg == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td># Fire Devision</td>
                <td># Unit Fire Div</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="other1_O1check" {{ $form->dwelling_rating->other1_O1check == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_rating->other1_O1checkField }}</td>
                <td>{{ $form->dwelling_rating->other1_O1checkField }}</td>
                <td>OCCUPANCY</td>
                <td><input type="checkbox" name="other1_exellent" {{ $form->dwelling_rating->other1_exellent == 1 ? 'checked disabled' : 'disabled' }} value="1"> Exellent </td>
                <td><input type="checkbox" name="other1_average" {{ $form->dwelling_rating->other1_average == 1 ? 'checked disabled' : 'disabled' }} value="1"> AVERAGE</td>
                <td>Local </td>
                <td><input type="checkbox" name="other1_check3smoke" {{ $form->dwelling_rating->other1_check3smoke == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="other1_check3temp" {{ $form->dwelling_rating->other1_check3temp == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="other1_check3burg" {{ $form->dwelling_rating->other1_check3burg == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td>{{ $form->dwelling_rating->other1_fireDevision }}</td>
                <td>{{ $form->dwelling_rating->other1_unitFireDivision }}</td>
            </tr>
            <tr>
                <td>Sidings</td>
                <td>{{ $form->dwelling_rating->siding_percentage }} %</td>
                <td><input type="checkbox" name="siding_owner" {{ $form->dwelling_rating->siding_owner == 1 ? 'checked disabled' : 'disabled' }} value="1"> Owner</td>
                <td><input type="checkbox" name="siding_good" {{ $form->dwelling_rating->siding_good == 1 ? 'checked disabled' : 'disabled' }} value="1"> Good </td>
                <td><input type="checkbox" name="siding_belowAVG" {{ $form->dwelling_rating->siding_belowAVG == 1 ? 'checked disabled' : 'disabled' }} value="1"> Below Avg</td>
                <td colspan="2">Door Lock </td>
                <td colspan="2">Sprinkler </td>
                <td>TERRITORY</td>
                <td>Pers Lab Terr</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="alumSiding_aluminiumSidings" {{ $form->dwelling_rating->alumSiding_aluminiumSidings == 1 ? 'checked disabled' : 'disabled' }} value="1"> Aluminium Sidings</td>
                <td>{{ $form->dwelling_rating->alumSiding_percentage }} %</td>
                <td><input type="checkbox" name="alumSiding_tenant" {{ $form->dwelling_rating->alumSiding_tenant == 1 ? 'checked disabled' : 'disabled' }} value="1"> Tenant</td>
                <td colspan="2">Any known leaks <br> <input type="checkbox" {{ $form->dwelling_rating->alumSiding_anyKnownLeaks == 1 ? 'checked disabled' : 'disabled' }} name="alumSiding_anyKnownLeaks" value="1">
                    Y/N</td>
                <td colspan="2"><input type="checkbox" {{ $form->dwelling_rating->alumSiding_deadbolt == 1 ? 'checked disabled' : 'disabled' }} name="alumSiding_deadbolt" value="1"> Deadbolt </td>
                <td colspan="2"><input type="checkbox" {{ $form->dwelling_rating->alumSiding_partial == 1 ? 'checked disabled' : 'disabled' }} name="alumSiding_partial" value="1"> Partial </td>
                <td>{{ $form->dwelling_rating->alumSiding_Territory }}</td>
                <td>{{ $form->dwelling_rating->alumSiding_persLab }}</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="stuc_stucco" {{ $form->dwelling_rating->stuc_stucco == 1 ? 'checked disabled' : 'disabled' }} value="1"> Stucco</td>
                <td>{{ $form->dwelling_rating->stuc_percentage }}</td>
                <td><input type="checkbox" name="stuc_unoccupied" {{ $form->dwelling_rating->stuc_unoccupied == 1 ? 'checked disabled' : 'disabled' }} value="1"> Unoccupied</td>
                <td colspan="2">Roof Condition </td>
                <td colspan="2"><input type="checkbox" {{ $form->dwelling_rating->stuc_spring == 1 ? 'checked disabled' : 'disabled' }} name="stuc_spring" value="1"> Spring </td>
                <td colspan="2"><input type="checkbox" {{ $form->dwelling_rating->stuc_full == 1 ? 'checked disabled' : 'disabled' }} name="stuc_full" value="1"> Full </td>
                <td>Prot Class</td>
                <td>Fire extengisher</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="vinyl_siding" {{ $form->dwelling_rating->vinyl_siding == 1 ? 'checked disabled' : 'disabled' }} value="1"> Vinyl Siding / Plastic</td>
                <td>{{ $form->dwelling_rating->vinyl_percentage }}</td>
                <td><input type="checkbox" name="vinyl_vacant" {{ $form->dwelling_rating->vinyl_vacant == 1 ? 'checked disabled' : 'disabled' }} value="1"> Vacant</td>
                <td><input type="checkbox" name="vinyl_exellent" {{ $form->dwelling_rating->vinyl_exellent == 1 ? 'checked disabled' : 'disabled' }} value="1"> Exellent </td>
                <td><input type="checkbox" name="vinyl_averge" {{ $form->dwelling_rating->vinyl_averge == 1 ? 'checked disabled' : 'disabled' }} value="1"> Averge </td>
                <td colspan="2"><input type="checkbox" name="vinyl_otherCheck" {{ $form->dwelling_rating->vinyl_otherCheck == 1 ? 'checked disabled' : 'disabled' }} value="1">  {{ $form->dwelling_rating->vinyl_otherCheckField }}</td>
                <td colspan="2"> </td>
                <td> {{ $form->dwelling_rating->vinyl_proteClass }}</td>
                <td>Y/N <input type="checkbox" name="vinyl_fireExt" {{ $form->dwelling_rating->vinyl_averge == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="chedar_wood" {{ $form->dwelling_rating->chedar_wood == 1 ? 'checked disabled' : 'disabled' }} value="1"> Chedar, wood shingle</td>
                <td>{{ $form->dwelling_rating->chedar_percentage }}</td>
                <td><input type="checkbox" name="chedar_othercheck" {{ $form->dwelling_rating->chedar_othercheck == 1 ? 'checked disabled' : 'disabled' }} value="1"> 
                {{ $form->dwelling_rating->chedar_othercheckField }}</td>
                <td><input type="checkbox" name="chedar_good" {{ $form->dwelling_rating->chedar_good == 1 ? 'checked disabled' : 'disabled' }} value="1"> Good </td>
                <td><input type="checkbox" name="chedar_below" {{ $form->dwelling_rating->chedar_below == 1 ? 'checked disabled' : 'disabled' }} value="1"> Below avg </td>
                <td colspan="5">Fire distric name {{ $form->dwelling_rating->chedar_fireDistricName }}
                </td>

                <td>First dist code {{ $form->dwelling_rating->chedar_firstDiscode }}</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="eifscb_eifscb" {{ $form->dwelling_rating->eifscb_eifscb == 1 ? 'checked disabled' : 'disabled' }} value="1"> EIFSCB</td>
                <td>{{ $form->dwelling_rating->eifscb_percentage }}</td>
                <td>Residence Type</td>
                <td colspan="2">Roof Metarial</td>
                <td colspan="5"></td>
                <td></td>
            </tr>
            <tr>
                <td><input type="checkbox" name="eifss_eifss" {{ $form->dwelling_rating->eifss_eifss == 1 ? 'checked disabled' : 'disabled' }} value="1"> EIFSS</td>
                <td>{{ $form->dwelling_rating->eifss_percentage }}</td>
                <td><input type="checkbox" name="eifss_dwelling" {{ $form->dwelling_rating->eifss_dwelling == 1 ? 'checked disabled' : 'disabled' }} value="1"> Dwelling</td>
                <td colspan="2">{{ $form->dwelling_rating->roofMetarial }}</td>
                <td colspan="4">Primary Heat</td>
                <td colspan="2">Secondary Heat</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="other2_check" {{ $form->dwelling_rating->other2_check == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_rating->other2_checkField }}</td>
                <td>{{ $form->dwelling_rating->other2_percentage }}</td>
                <td><input type="checkbox" name="other2_apartment" {{ $form->dwelling_rating->other2_apartment == 1 ? 'checked disabled' : 'disabled' }} value="1"> Apartment</td>
                <td colspan="2">Distance to Tidal Water</td>
                <td colspan="4"><input type="checkbox" name="primary_heat_none" {{ $form->dwelling_rating->primary_heat_none == 1 ? 'checked disabled' : 'disabled' }}> None</td>
                <td colspan="2"><input type="checkbox" name="secondary_heat_none" {{ $form->dwelling_rating->secondary_heat_none == 1 ? 'checked disabled' : 'disabled' }}> None</td>
            </tr>

            <tr>
                <td colspan="2">Year EFID Installed </td>
                <td><input type="checkbox" name="yearEFID_condominium" {{ $form->dwelling_rating->yearEFID_condominium == 1 ? 'checked disabled' : 'disabled' }} value="1"> Condominium</td>
                <td colspan="2"><span><input type="checkbox" name="yearEFID_mile" {{ $form->dwelling_rating->yearEFID_mile == 1 ? 'checked disabled' : 'disabled' }} value="1"> Mile 
                <input type="checkbox" name="yearEFID_feet" {{ $form->dwelling_rating->yearEFID_feet == 1 ? 'checked disabled' : 'disabled' }}  value="1"> Feet</span></td>
                <td colspan="6">Date heating system last serviced</td>
            </tr>
            <tr>
                <td colspan="2">Usage Type </td>
                <td><input type="checkbox" name="townhouse" {{ $form->dwelling_rating->townhouse == 1 ? 'checked disabled' : 'disabled' }} value="1"> Townhouse</td>
                <td> Purchase Price </td>
                <td> Purchase Date </td>
                <td colspan="4">Wiring</td>
                <td colspan="2">Electrical System</td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" name="usage_primary" {{ $form->dwelling_rating->usage_primary == 1 ? 'checked disabled' : 'disabled' }} value="1"> Primary 
                    <input type="checkbox" name="usage_seasonal" {{ $form->dwelling_rating->usage_seasonal == 1 ? 'checked disabled' : 'disabled' }} value="1"> Seasonal </td>
                <td><input type="checkbox" name="usage_Rpwhouse" {{ $form->dwelling_rating->usage_Rpwhouse == 1 ? 'checked disabled' : 'disabled' }} value="1"> Rpwhouse</td>
                <td> $ {{ $form->dwelling_rating->usage_purchasePrice }}</td>
                <td> {{ $form->dwelling_rating->usage_purchasedate }}</td>
                <td colspan="4"><input type="checkbox" name="usage_cooperLastInsp" {{ $form->dwelling_rating->usage_cooperLastInsp == 1 ? 'checked disabled' : 'disabled' }} value="1"> Cooper <span>Last
                        Inspected Date</span></td>
                <td colspan="2"><input type="checkbox" name="usage_circutBreaker" {{ $form->dwelling_rating->usage_circutBreaker == 1 ? 'checked disabled' : 'disabled' }} value="1"> Circut Breaker</td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" name="usage_secondary" {{ $form->dwelling_rating->usage_secondary == 1 ? 'checked disabled' : 'disabled' }} value="1"> secondary <input
                        type="checkbox" name="usage_farm" {{ $form->dwelling_rating->usage_farm == 1 ? 'checked disabled' : 'disabled' }} value="1"> Farm </td>
                <td><input type="checkbox" name="usage_coop" {{ $form->dwelling_rating->usage_coop == 1 ? 'checked disabled' : 'disabled' }} value="1"> Co-op</td>
                <td colspan="2"> security </td>
                <td colspan="4"><input type="checkbox" name="usage_aluminium" {{ $form->dwelling_rating->usage_aluminium == 1 ? 'checked disabled' : 'disabled' }} value="1"> Aluminium </td>
                <td colspan="2"><input type="checkbox" name="usage_fuses" {{ $form->dwelling_rating->usage_fuses == 1 ? 'checked disabled' : 'disabled' }} value="1"> Fuses</td>
            </tr>

            <tr>
                <td colspan="2"><input type="checkbox" name="other3_check1" {{ $form->dwelling_rating->other3_check1 == 1 ? 'checked disabled' : 'disabled' }} value="1">  {{ $form->dwelling_rating->other3_check1Field }}</td>
                <td><input type="checkbox" name="other3_check2" {{ $form->dwelling_rating->other3_check2 == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_rating->other3_check2Field }}</td>
                <td><input type="checkbox" name="other3_visibleroad" {{ $form->dwelling_rating->other3_visibleroad == 1 ? 'checked disabled' : 'disabled' }} value="1"> Visible from road </td>
                <td><input type="checkbox" name="other3_visibleNighbors" {{ $form->dwelling_rating->other3_visibleNighbors == 1 ? 'checked disabled' : 'disabled' }} value="1"> Visible To Nighbors </td>
                <td colspan="4"><input type="checkbox" name="other3_knob" {{ $form->dwelling_rating->other3_knob == 1 ? 'checked disabled' : 'disabled' }} value="1"> Knob & Tube </td>
                <td colspan="2"><input type="checkbox" name="other3_amps" {{ $form->dwelling_rating->other3_amps == 1 ? 'checked disabled' : 'disabled' }} value="1"> Number of AMPS</td>
            </tr>
            <td colspan="2"></td>
            <td></td>
            <td colspan="2"><input type="checkbox" name="other3_occupied" {{ $form->dwelling_rating->other3_occupied == 1 ? 'checked disabled' : 'disabled' }} value="1"> OCCUPIED DAILY </td>
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
                <td>{{ $form->dwelling_rating->yrBLT_build }}</td>
                <td>{{ $form->dwelling_rating->yrBLT_room }}</td>
                <td>{{ $form->dwelling_rating->yrBLT_families }}</td>
                <td><input type="checkbox" name="yrBLT_smooker" {{ $form->dwelling_rating->yrBLT_smooker == 1 ? 'checked disabled' : 'disabled' }} value="1"> Non-Smoker</td>
                <td><input type="checkbox" name="yrBLT_cityLimit" {{ $form->dwelling_rating->yrBLT_cityLimit == 1 ? 'checked disabled' : 'disabled' }} value="1"> In city limit</td>
                <td><input type="checkbox" name="yrBLT_class" {{ $form->dwelling_rating->yrBLT_class == 1 ? 'checked disabled' : 'disabled' }} value="1"> Class <input type="checkbox"
                        name="yrBLT_specific" {{ $form->dwelling_rating->yrBLT_specific == 1 ? 'checked disabled' : 'disabled' }} value="1"> Specific</td>
                <td>Wiring</td>
                <td><input type="checkbox" name="yrBLT_part1Check" {{ $form->dwelling_rating->yrBLT_part1Check == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="yrBLT_comp1Check" {{ $form->dwelling_rating->yrBLT_comp1Check == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td>{{ $form->dwelling_rating->yrBLT_year }}</td>
            </tr>
            <tr>
                <td>Market value</td>
                <td># Apartment</td>
                <td>Household Residence</td>
                <td><input type="checkbox" name="market_mannedS" {{ $form->dwelling_rating->market_mannedS == 1 ? 'checked disabled' : 'disabled' }} value="1"> Manned Security</td>
                <td><input type="checkbox" name="market_inFireDis" {{ $form->dwelling_rating->market_inFireDis == 1 ? 'checked disabled' : 'disabled' }} value="1"> In fire district </td>
                <td><input type="checkbox" name="market_foundation" {{ $form->dwelling_rating->market_foundation == 1 ? 'checked disabled' : 'disabled' }} value="1"> Foundation <input type="checkbox"
                        name="market_none" {{ $form->dwelling_rating->market_none == 1 ? 'checked disabled' : 'disabled' }} value="1"> none</td>
                <td>Plumbing</td>
                <td><input type="checkbox" name="market_part1Check" {{ $form->dwelling_rating->market_part1Check == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="market_comp1Check" {{ $form->dwelling_rating->market_comp1Check == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td>{{ $form->dwelling_rating->market_year }}</td>
            </tr>
            <tr>
                <td>$ {{ $form->dwelling_rating->maket_value }}</td>
                <td> {{ $form->dwelling_rating->market_apt }}</td>
                <td> {{ $form->dwelling_rating->market_household }}</td>
                <td><input type="checkbox" name="maket_lightning" {{ $form->dwelling_rating->maket_lightning == 1 ? 'checked disabled' : 'disabled' }} value="1"> Lightning Protection</td>
                <td><input type="checkbox" name="maket_prot" {{ $form->dwelling_rating->maket_prot == 1 ? 'checked disabled' : 'disabled' }} value="1"> In prot suburb </td>
                <td><input type="checkbox" name="maket_open" {{ $form->dwelling_rating->maket_open == 1 ? 'checked disabled' : 'disabled' }} value="1"> open </td>
                <td>Heating</td>
                <td><input type="checkbox" name="maket_part2check" {{ $form->dwelling_rating->maket_part2check == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="maket_comp2Check" {{ $form->dwelling_rating->maket_comp2Check == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td>{{ $form->dwelling_rating->market_year2 }}</td>
            </tr>

            <tr>
                <td>Replaccement Cost</td>
                <td># weeks Rented</td>
                <td>Tax Code</td>
                <td><input type="checkbox" name="replacement_premise" {{ $form->dwelling_rating->replacement_premise == 1 ? 'checked disabled' : 'disabled' }} value="1"> Of premise theft excl</td>
                <td><input type="checkbox" name="replacement_locCheck" {{ $form->dwelling_rating->replacement_locCheck == 1 ? 'checked disabled' : 'disabled' }} value="1">  {{  $form->dwelling_rating->replacement_locCheckField }}</td>
                <td><input type="checkbox" name="replacement_close" {{ $form->dwelling_rating->replacement_close == 1 ? 'checked disabled' : 'disabled' }} value="1"> Closed </td>
                <td>Roofing</td>
                <td><input type="checkbox" name="replacement_roofPart" {{ $form->dwelling_rating->replacement_roofPart == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="replacement_roofComp" {{ $form->dwelling_rating->replacement_roofComp == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td>{{ $form->dwelling_rating->replacement_roofYear }}</td>
            </tr>
            <tr>
                <td>$ {{ $form->dwelling_rating->replacement_cost }}</td>
                <td> {{ $form->dwelling_rating->replacement_weekRented }}</td>
                <td> {{ $form->dwelling_rating->replacement_tax }}</td>
                <td><input type="checkbox" name="replacement_other2check" {{ $form->dwelling_rating->replacement_other2check == 1 ? 'checked disabled' : 'disabled' }} value="1"> 
                    {{ $form->dwelling_rating->replacement_other2checkField }}</td>
                <td colspan="2">Fuel storage tank loction <input type="checkbox" name="replacement_none" {{ $form->dwelling_rating->replacement_none == 1 ? 'checked disabled' : 'disabled' }} value="1"> None
                </td>
                <td colspan="3">Exterier Pant</td>
                <td>{{ $form->dwelling_rating->replacement_exterierPant }}</td>
            </tr>
            <tr>
                <td>Total Living area</td>
                <td colspan="2">Blog code grade</td>
                <td><input type="checkbox" name="tLA_otherCheck" {{ $form->dwelling_rating->tLA_otherCheck == 1 ? 'checked disabled' : 'disabled' }} value="1"> 
                    {{ $form->dwelling_rating->tLA_otherCheckField }}</td>
                <td colspan="2"><input type="checkbox" name="tLA_indoor" {{ $form->dwelling_rating->tLA_indoor == 1 ? 'checked disabled' : 'disabled' }} value="1"> Indoors above ground masonory floor
                </td>
                <td colspan="4">Wind Class</td>
            </tr>
            <tr>
                <td>SQ FT {{ $form->dwelling_rating->tLA_totalLArea }}</td>
                <td colspan="2"> {{ $form->dwelling_rating->tLA_blogCode }}</td>
                <td>Swiming Pool <input type="checkbox" name="tLA_none" {{ $form->dwelling_rating->tLA_none == 1 ? 'checked disabled' : 'disabled' }} value="1"> None</td>
                <td colspan="2"><input type="checkbox" name="tLA_indoorAbove" {{ $form->dwelling_rating->tLA_indoorAbove == 1 ? 'checked disabled' : 'disabled' }} value="1"> Indoors above ground masonory
                    floor </td>
                <td colspan="2"><input type="checkbox" name="tLA_resotive" {{ $form->dwelling_rating->tLA_resotive == 1 ? 'checked disabled' : 'disabled' }} value="1"> Resistive</td>
                <td colspan="2"><input type="checkbox" name="tLA_semiResistive" {{ $form->dwelling_rating->tLA_semiResistive == 1 ? 'checked disabled' : 'disabled' }} value="1"> semi-Resistive</td>
            </tr>
            <tr>
                <td>Basement Area</td>
                <td colspan="2">Inspected Y/N <input type="checkbox" name="basement_inspected" {{ $form->dwelling_rating->basement_inspected == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="basement_aboveGround" {{ $form->dwelling_rating->basement_aboveGround == 1 ? 'checked disabled' : 'disabled' }} value="1"> Above Ground</td>
                <td colspan="2"><input type="checkbox" name="basement_outdoor" {{ $form->dwelling_rating->basement_outdoor == 1 ? 'checked disabled' : 'disabled' }} value="1"> Outdoor Above ground </td>
                <td colspan="4"><input type="checkbox" name="basement_otherCheck" {{ $form->dwelling_rating->basement_otherCheck == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_rating->basement_otherCheckField }}</td>
            </tr>
            <tr>
                <td>SQ FT {{ $form->dwelling_rating->basement_area }}</td>
                <td colspan="2">Replace (enter # or 0 for None) <input type="checkbox" {{ $form->dwelling_rating->basement_replace == 1 ? 'checked disabled' : 'disabled' }} name="basement_replace"
                        value="1"></td>
                <td><input type="checkbox" name="basement_ground" {{ $form->dwelling_rating->basement_ground == 1 ? 'checked disabled' : 'disabled' }} value="1"> In ground</td>
                <td colspan="2"> Outdoor below ground </td>
                <td colspan="4">Windstorm</td>
            </tr>
            <tr>
                <td>Garage Area</td>
                <td colspan="2">Chimney <input type="checkbox" name="garage_chimney" {{ $form->dwelling_rating->garage_chimney == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="garage_approved" {{ $form->dwelling_rating->garage_approved == 1 ? 'checked disabled' : 'disabled' }} value="1"> Approved Fense</td>
                <td colspan="2"> {{ $form->dwelling_rating->basement_outdoor }}</td>
                <td colspan="4">Storm Shutters</td>
            </tr>
            <tr>
                <td>SQ FT {{ $form->dwelling_rating->basement_area2 }}</td>
                <td colspan="2">Hearths <input type="checkbox" {{ $form->dwelling_rating->basement_hearths == 1 ? 'checked disabled' : 'disabled' }}  name="basement_hearths" value="1"></td>
                <td><input type="checkbox" name="basement_diving" {{ $form->dwelling_rating->basement_diving == 1 ? 'checked disabled' : 'disabled' }}  value="1"> Diving Board</td>
                <td colspan="2">Fuel line location </td>
                <td colspan="4"><input type="checkbox" name="basement_choiceA" {{ $form->dwelling_rating->basement_choiceA == 1 ? 'checked disabled' : 'disabled' }}  value="1"> A <input type="checkbox"
                        name="basement_choiceB"  {{ $form->dwelling_rating->basement_choiceB == 1 ? 'checked disabled' : 'disabled' }} value="1"> B</td>
            </tr>
            <tr>
                <td>Breezeway Area</td>
                <td colspan="2">Pre-Fab <input type="checkbox" name="area_fab" {{ $form->dwelling_rating->area_fab == 1 ? 'checked disabled' : 'disabled' }} value="1"></td>
                <td><input type="checkbox" name="area_slides" {{ $form->dwelling_rating->area_slides == 1 ? 'checked disabled' : 'disabled' }} value="1"> Slides</td>
                <td colspan="2"><input type="checkbox" name="area_ground" {{ $form->dwelling_rating->area_ground == 1 ? 'checked disabled' : 'disabled' }} value="1"> Under Ground </td>
                <td colspan="4"><input type="checkbox" name="area_other" {{ $form->dwelling_rating->area_other == 1 ? 'checked disabled' : 'disabled' }} value="1"> 
                    {{ $form->dwelling_rating->area_otherField }}</td>
            </tr>
            <tr>
                <td>SQ FT {{ $form->dwelling_rating->basement_area3 }}</td>
                <td colspan="2">Wood stove insert</td>
                <td><input type="checkbox" name="otherF_check" {{ $form->dwelling_rating->otherF_check == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_rating->otherF_checkfield }}</td>
                <td colspan="2"><input type="checkbox" name="otherF_tfoundation" {{ $form->dwelling_rating->otherF_tfoundation == 1 ? 'checked disabled' : 'disabled' }} value="1"> Through foundation </td>
                <td colspan="4"><input type="checkbox" name="otherF_resistive" {{ $form->dwelling_rating->otherF_resistive == 1 ? 'checked disabled' : 'disabled' }} value="1"> Hurricane Resistive glass</td>
            </tr>
        </table>
        <div class="page-break"></div>
        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID : {{ $form->dwelling_option_coverage->agencyID }}</p>
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
                <td><input type="checkbox" name="includedRisk" {{ $form->dwelling_option_coverage->includedRisk == 1 ? 'checked disabled' : 'disabled' }} value="1"> Includedd</td>
                <td>$ {{ $form->dwelling_option_coverage->risk_amount }}<span
                        style="float: right;">Limit</span></td>
                <td>$ {{ $form->dwelling_option_coverage->risk_prem }}</td>
                <td>Fire department service charge</td>
                <td colspan="2"><input type="checkbox" name="coverageInc" {{ $form->dwelling_option_coverage->coverageInc == 1 ? 'checked disabled' : 'disabled' }}> Included</td>
                <td>$ {{ $form->dwelling_option_coverage->risk_premium }}</td>
            </tr>
            <tr>
                <td rowspan="2">Colapse due to dydrostatic pressure</td>
                <td rowspan="2"><input type="checkbox" name="colaps_included" {{ $form->dwelling_option_coverage->colaps_included == 1 ? 'checked disabled' : 'disabled' }} value="1"> Includedd</td>
                <td rowspan="2">$ {{ $form->dwelling_option_coverage->colaps_covpremium }}
                    <span style="float: right;">Limit</span>
                </td>
                <td rowspan="2">$ {{ $form->dwelling_option_coverage->colaps_premium }}</td>
                <td>Inflation guard</td>
                <td colspan="2">{{ $form->dwelling_option_coverage->colaps_percentageIncrease }} % Increse </td>
                <td>$ {{ $form->dwelling_option_coverage->colaps_perm }}</td>
            </tr>
            <tr>
                <td>Loss Assesment</td>
                <td colspan="2"><input type="checkbox" name="loss_ass" {{ $form->dwelling_option_coverage->loss_ass == 1 ? 'checked disabled' : 'disabled' }} value="1"> Included</td>
                <td>$ {{ $form->dwelling_option_coverage->loss_assPrem }}</td>
            </tr>
            <tr>
                <td rowspan="2">Building ord or Law coverage</td>
                <td>$ {{ $form->dwelling_option_coverage->lawCov_agg }} <span
                        style="float: right;">AGG</span></td>
                <td>$ {{ $form->dwelling_option_coverage->lawCov_incr }} <span
                        style="float: right;">INCR</span></td>
                <td rowspan="2">$ {{ $form->dwelling_option_coverage->lawCov_prem }} </td>
                <td rowspan="2">Min Subsidence</td>
                <td>$ {{ $form->dwelling_option_coverage->lawCov_limt }} <span
                        style="float: right;">Limit</span></td>
                <td>Const Meterial</td>
                <td rowspan="2">$ {{ $form->dwelling_option_coverage->lawCov_const }}</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="ordIncluded" {{ $form->dwelling_option_coverage->ordIncluded == 1 ? 'checked disabled' : 'disabled' }} value="1"> Included</td>
                <td>{{ $form->dwelling_option_coverage->lawCov_rebild }} % Rebuild</td>
                <td colspan="2">Prop Desk</td>
            </tr>
            <tr>
                <td>Derbs Removal</td>
                <td><input type="checkbox" name="derbs_included" {{ $form->dwelling_option_coverage->derbs_included == 1 ? 'checked disabled' : 'disabled' }} value="1"> Included</td>
                <td>$ {{ $form->dwelling_option_coverage->derbs_limit }} <span
                        style="float: right;">Limit</span></td>
                <td>$ {{ $form->dwelling_option_coverage->derbs_prem }} <span
                        style="float: right;"></td>
                <td rowspan="2">Unit owners addition & Alteration special coverage</td>
                <td rowspan="2"><input type="checkbox" name="derbs_inc" {{ $form->dwelling_option_coverage->derbs_inc == 1 ? 'checked disabled' : 'disabled' }} value="1"> Included</td>
                <td rowspan="2">$ {{ $form->dwelling_option_coverage->derbs_unit }} <span
                        style="float: right;"><span style="float: right;">Limit</span></td>
                <td rowspan="2">$ {{ $form->dwelling_option_coverage->derbs_unitPrem }} <span
                        style="float: right;"></td>
            </tr>
            <tr>
                <td rowspan="3">EARTHQUAKE</td>
                <td> {{ $form->dwelling_option_coverage->earth_ded }} <span
                        style="float: right;"> % DED</td>
                <td>Terr: {{ $form->dwelling_option_coverage->earth_terr }} <span
                        style="float: right;"> </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->earth_prem }} <span
                        style="float: right;"> </td>
            </tr>
            <tr>
                <td rowspan="2">$ {{ $form->dwelling_option_coverage->earth_dedAmount }}
                    <span style="float: right;"><span style="float: right;">DED</span>
                </td>
                <td>Retrofit Type {{ $form->dwelling_option_coverage->earth_type }} <span
                        style="float: right;"></td>
                <td>Water backup of sewers and drein</td>
                <td><input type="checkbox" name="dreinIncluded" {{ $form->dwelling_option_coverage->dreinIncluded == 1 ? 'checked disabled' : 'disabled' }} value="1"> Included</td>
                <td>$ {{ $form->dwelling_option_coverage->dreinLimit }} <span
                        style="float: right;"><span style="float: right;">Limit</span></td>
                <td>$ {{ $form->dwelling_option_coverage->dreinPrem }} <span
                        style="float: right;"></td>
            </tr>
            <tr>
                <td>Mass vaneer $ {{ $form->dwelling_option_coverage->massVaneerAmount }}
                    <span style="float: right;">
                </td>
                <td>Windstrom Excls</td>
                <td colspan="3"><input type="checkbox" name="windYes" {{ $form->dwelling_option_coverage->windYes == 1 ? 'checked disabled' : 'disabled' }} value="1"> Yes (not applicable in Arkansas)</td>

            </tr>
        </table>
        <table style="table-layout: fixed;">
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
                <td>{{ $form->dwelling_option_coverage->code_sec1_opts }} </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec1_limit }} </td>
                <td>{{ $form->dwelling_option_coverage->code_sec1_appl }} </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec1_deduct }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec1_prem }} </td>
                <td>Code</td>
                <td> {{ $form->dwelling_option_coverage->code_sec1_opts2 }} </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec1_limit2 }} </td>
                <td> {{ $form->dwelling_option_coverage->code_sec1_appl2 }} </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec1_deduct2 }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec1_prem2 }}</td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec1_opt }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec1_limit }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec1_appl }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec1_type }}</td>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec1_opt2 }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec1_limit2 }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec1_appl2 }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec1_type2 }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec1_tree }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec1_y }}</td>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec1_tree2 }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec1_y2 }}</td>
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
                <td>{{ $form->dwelling_option_coverage->code_sec2_opts }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec2_limit }} 
                </td>
                <td>{{ $form->dwelling_option_coverage->code_sec2_appl }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec2_deduct }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec2_prem }}</td>
                <td>Code</td>
                <td> {{ $form->dwelling_option_coverage->code_sec2_opts2 }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec2_limit2 }} </td>
                <td> {{ $form->dwelling_option_coverage->code_sec2_appl2 }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec2_deduct2 }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec2_prem2 }}
                   
                </td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec2_opt }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec2_limit }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec2_appl }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec2_type }}</td>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec2_opt2 }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec2_limit2 }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec2_appl2 }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec2_type2 }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec2_tree }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec2_y }}</td>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec2_tree2 }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec2_y2 }}</td>
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
                <td>{{ $form->dwelling_option_coverage->code_sec3_opts }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec3_limit }} 
                </td>
                <td>{{ $form->dwelling_option_coverage->code_sec3_appl }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec3_deduct }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec3_prem }} </td>
                <td>Code</td>
                <td> {{ $form->dwelling_option_coverage->code_sec3_opts2 }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec3_limit2 }} </td>
                <td> {{ $form->dwelling_option_coverage->code_sec3_appl2 }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec3_deduct2 }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec3_prem2 }}
                    
                </td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec3_opt }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec3_limit }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec3_appl }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec3_type }}</td>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec3_opt2 }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec3_limit2 }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec3_appl2 }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec3_type2 }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec3_tree }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec3_y }}</td>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec3_tree2 }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec3_y2 }}</td>
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
                <td>{{ $form->dwelling_option_coverage->code_sec4_opts }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec4_limit }} 
                </td>
                <td>{{ $form->dwelling_option_coverage->code_sec4_appl }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec4_deduct }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec4_prem }} </td>
                <td>Code</td>
                <td> {{ $form->dwelling_option_coverage->code_sec4_opts2 }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec4_limit2 }} </td>
                <td> {{ $form->dwelling_option_coverage->code_sec4_appl2 }} 
                </td>
                <td>$ {{ $form->dwelling_option_coverage->code_sec4_deduct2 }} </td>
                <td rowspan="3">$ {{ $form->dwelling_option_coverage->code_sec4_prem2 }}
                  
                </td>
            </tr>
            <tr>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec4_opt }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec4_limit }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec4_appl }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec4_type }}</td>
                <td rowspan="2">Description</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec4_opt2 }}</td>
                <td>$ {{ $form->dwelling_option_coverage->desc_sec4_limit2 }}</td>
                <td> {{ $form->dwelling_option_coverage->desc_sec4_appl2 }}</td>
                <td>Type: {{ $form->dwelling_option_coverage->desc_sec4_type2 }}</td>
            </tr>
            <tr>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec4_tree }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec4_y }}</td>
                <td></td>
                <td colspan="2">Terr: {{ $form->dwelling_option_coverage->desc_sec4_tree2 }}
                </td>
                <td>Y/N: {{ $form->dwelling_option_coverage->desc_sec4_y2 }}</td>
            </tr>
        </table>

        <div class="page-break"></div>
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
                                    <td>{{ $form->dwelling_general_info->q1_s1_bus }}</td>
                                    <td>{{ $form->dwelling_general_info->q1_s1_policy }}
                                    </td>
                                </tr>
                            </table>
                            <table style="width: 48%;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>Line of business</b></td>
                                    <td style="font-size: 9px;"> <b>Policy Number</b></td>
                                </tr>
                                <tr>
                                    <td>{{ $form->dwelling_general_info->q1_s2_bus }}</td>
                                    <td>{{ $form->dwelling_general_info->q1_s2_policy }}
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

                        {{ $form->dwelling_general_info->q2 }}
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        3. HAS APPLICANT HAD A FORECLOSURE, REPOSSESSION, BANKRUPTCY OR FILED FOR BANKRUPTCY DURING THE
                        PAST FIVE (5) YEARS?
                        {{ $form->dwelling_general_info->q3 }}
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        4. HAS APPLICANT HAD A JUDGMENT OR LIEN DURING THE PAST FIVE (5) YEARS?
                        {{ $form->dwelling_general_info->q4 }}
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        5. ANY OTHER RESIDENCE, NOT LISTED ON ANY APPLICATION, OWNED, OCCUPIED OR RENTED?

                        {{ $form->dwelling_general_info->q5 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        6. HAS INSURANCE BEEN TRANSFERRED WITHIN AGENCY?
                        {{ $form->dwelling_general_info->q6 }}
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


                        {{ $form->dwelling_general_info->q7 }}
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <div class="page-break"></div>


        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID : {{ $form->dwelling_general_info->agencyID }}</p>
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
                        <input type="checkbox" name="gn_q1_farming" {{ $form->dwelling_general_info_residential->gn_q1_farming == 1 ? 'checked disabled' : 'disabled' }} value="1"> FARMING
                        <input type="checkbox" name="gn_q1_telecom" {{ $form->dwelling_general_info_residential->gn_q1_telecom == 1 ? 'checked disabled' : 'disabled' }} value="1"> TELECOMMUTER
                        <input type="checkbox" name="gn_q1_dayCare" {{ $form->dwelling_general_info_residential->gn_q1_dayCare == 1 ? 'checked disabled' : 'disabled' }} value="1"> DAY
                        CARE # OF CHILDREN {{ $form->dwelling_general_info_residential->gn_q1_dayCareField }}
                        <input type="checkbox" name="gn_q1_home" {{ $form->dwelling_general_info_residential->gn_q1_home == 1 ? 'checked disabled' : 'disabled' }} value="1"> HOME OFFICE / BUSINESS
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        2. ANY FLOODING, BRUSH, FOREST FIRE OR LANDSLIDE HAZARD?

                        {{ $form->dwelling_general_info_residential->gn_q2 }}
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
                                    <td>{{ $form->dwelling_general_info_residential->gn_q3_s1_animal }}</td>
                                    <td>{{ $form->dwelling_general_info_residential->gn_q3_s1_breed }}</td>
                                    <td>{{ $form->dwelling_general_info_residential->gn_q3_s1_bite }}</td>
                                </tr>
                            </table>
                            <table style="width: 48%;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>ANIMAL TYPE </b></td>
                                    <td style="font-size: 9px;"> <b>BREED</b></td>
                                    <td style="font-size: 9px;"> <b>BITE HISTORY (Y/N) </b></td>
                                </tr>
                                <tr>
                                    <td>{{ $form->dwelling_general_info_residential->gn_q3_s2_animal }}</td>
                                    <td>{{ $form->dwelling_general_info_residential->gn_q3_s2_breed }}</td>
                                    <td>{{ $form->dwelling_general_info_residential->gn_q3_s2_bite }}</td>
                                </tr>
                            </table>
                        </div>
                    </td>

                    <td></td>
                </tr>

                <tr>
                    <td>
                        4. IS PROPERTY SITUATED ON MORE THAN ONE ACRE?
                        {{ $form->dwelling_general_info_residential->gn_q4 }}
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        5. ANY UNCORRECTED FIRE OR BUILDING CODE VIOLATIONS?
                        {{ $form->dwelling_general_info_residential->gn_q5 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        6. IS THE DWELLING FOR SALE? (no explanation needed)
                        {{ $form->dwelling_general_info_residential->gn_q6 }}
                    </td>
                    <td></td>
                </tr>

                <tr>
                    <td>
                        7. IS PROPERTY WITHIN 300 FEET OF A COMMERCIAL OR NON-RESIDENTIAL PROPERTY? (if "YES", describe
                        in detail)
                        {{ $form->dwelling_general_info_residential->gn_q7 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td style="border-bottom: 0;">
                        8. IS THERE A TRAMPOLINE ON THE PREMISES?

                        {{ $form->dwelling_general_info_residential->gn_q8 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        a. IF "YES", IS THERE A SAFETY NET? (no explanation needed)
                        {{ $form->dwelling_general_info_residential->gn_q8a }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        9. WAS THE STRUCTURE ORIGINALLY BUILT FOR OTHER THAN A PRIVATE RESIDENCE AND THEN CONVERTED?
                        <br>
                        ORIGINAL OCCUPANCY: {{ $form->dwelling_general_info_residential->gn_q9 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        10. ANY LEAD PAINT?
                        {{ $form->dwelling_general_info_residential->gn_q10 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        11. A FUEL TANK IS ON PREMISES. (TANK/OTHER/INSURANCE HELD/LOCATED AT/OR THE LIKE)
                        (If "YES", provide the name of the insurance company, the applicable limit and the cleanup
                        sublimit) <br>
                        <span>INSURANCE COMPANY: {{ $form->dwelling_general_info_residential->gn_q11a }}</span>
                        <span>LIMIT: {{ $form->dwelling_general_info_residential->gn_q11b }}</span>
                        <span>CLEANUP/SUBLIMIT: {{ $form->dwelling_general_info_residential->gn_q11c }}
                        </span>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        12. IS THE RESIDENCE IN A GATED COMMUNITY?
                        {{ $form->dwelling_general_info_residential->gn_q12 }}
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
                                <td>{{ $form->dwelling_general_info_residential->gn_q13_start }}</td>
                                <td>{{ $form->dwelling_general_info_residential->gn_q13_comp }}</td>
                                <td><span style="float: right;">% {{ $form->dwelling_general_info_residential->gn_q13_int }}</span></td>
                                <td><span style="float: right;">% {{ $form->dwelling_general_info_residential->gn_q13_ext }} </span></td>
                                <td><span style="float: right;">sq.ft {{ $form->dwelling_general_info_residential->gn_q13_addition }}</span></td>
                                <td><span style="float: right;">sq.ft {{ $form->dwelling_general_info_residential->gn_q13_level }}</span></td>
                                <td><span style="float: right;"><input type="checkbox" name="qn_q13_y" {{ $form->dwelling_general_info_residential->qn_q13_y == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                        Y/N</span></td>
                                <td><input type="checkbox" name="qn_q13_inc" {{ $form->dwelling_general_info_residential->qn_q13_inc == 1 ? 'checked disabled' : 'disabled' }}> Incl <input type="checkbox" name="qn_q13_excl" {{ $form->dwelling_general_info_residential->qn_q13_excl == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                    Excl</td>
                                <td><span style="float: right;"><input type="checkbox" name="qn_q13_N" {{ $form->dwelling_general_info_residential->qn_q13_N == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                        Y/N</span></td>
                                <td>$ {{ $form->dwelling_general_info_residential->qn_q13_cost }}</td>
                            </tr>
                        </table>
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        14. IS THERE AN APPROVED CARBON MONOXIDE ALARM IN OPERATING CONDITION WITHIN THE MANDATED NUMBER
                        OF FEET OF EVERY ROOM USED FOR SLEEPING PURPOSES? (IL - 15 FT) (no explanation needed)

                        {{ $form->dwelling_general_info_residential->gn_q14 }}
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        15. IS THE NAMED INSURED THE OWNER OF THE PROPERTY? If "NO", provide the name of the owner. <br>
                        Owner Name : {{ $form->dwelling_general_info_residential->gn_q15 }}</td>
                    <td></td>
                </tr>
            </tbody>
        </table>


        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Prior Coverage <input type="checkbox"
                name="priorCoverage" {{ $form->dwelling_prior_coverages->priorCoverage == 1 ? 'checked disabled' : 'disabled' }} value="1"> No
            Prior Coverage</div>
        <table>
            <tr>
                <td style="width: 50%; border-bottom: 0;">Prior Carrier</td>
                <td style="width: 30%; border-bottom: 0;">Prior Policy Number</td>
                <td style="border-bottom: 0;">Expiration Date</td>
            </tr>
            <tr>
                <td style="border-top: 0 ;">{{ $form->dwelling_prior_coverages->prior_carrier }}</td>
                <td style="border-top: 0 ;">{{ $form->dwelling_prior_coverages->prior_policy }}</td>
                <td style="border-top: 0 ;">{{ $form->dwelling_prior_coverages->prior_expire }}</td>
            </tr>
        </table>
        <div style="font-size: 9px; font-weight: 600; margin-top: 5px; ">
            Local History <span style="float: right;"> Y/N <input type="checkbox" name="localHistory" {{ $form->dwelling_prior_coverages->localHistory == 1 ? 'checked disabled' : 'disabled' }} value="1"> If yes
                indicateBelow | Applicant
                Initial : {{ $form->dwelling_prior_coverages->applicantInitials }}</span>
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
                <td>{{ $form->dwelling_prior_coverages->localHistory_s1_lossdate }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s1_losstype }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s1_desc }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s1_cat }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s1_amountP }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s1_enteredby }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s1_indespute }}</td>
            </tr>
            <tr>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s2_lossdate }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s2_losstype }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s2_desc }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s2_cat }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s2_amountP }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s2_enteredby }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s2_indespute }}</td>
            </tr>
            <tr>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s3_lossdate }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s3_losstype }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s3_desc }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s3_cat }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s3_amountP }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s3_enteredby }}</td>
                <td>{{ $form->dwelling_prior_coverages->localHistory_s3_indespute }}</td>
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
                                <input type="checkbox" name="additionalINT_insured" {{ $form->dwelling_prior_coverages->additionalINT_insured == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                <label>ADDITIONAL INSURED</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_lender" {{ $form->dwelling_prior_coverages->additionalINT_lender == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_lienholder" {{ $form->dwelling_prior_coverages->additionalINT_lienholder == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                <label>LIENHOLDER</label>
                            </div>

                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_loss" {{ $form->dwelling_prior_coverages->additionalINT_loss == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                <label>LOSS PAYEE</label>
                            </div>

                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_mortgagee" {{ $form->dwelling_prior_coverages->additionalINT_mortgagee == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                <label>MORTGAGEE</label>
                            </div>

                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_trustee" {{ $form->dwelling_prior_coverages->additionalINT_trustee == 1 ? 'checked disabled' : 'disabled' }} value="1">
                                <label>TRUSTEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="additionalINT_other" {{ $form->dwelling_prior_coverages->additionalINT_other == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_prior_coverages->additionalINT_otherField }}
                            </div>
                        </div>
                    </td>
                    <td colspan="4" style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold; margin-right: 10px;">NAME AND ADDRESS
                                {{ $form->dwelling_prior_coverages->additionalINT_nameAddress }}
                            </span><br>
                            <div style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                <span class="label" style="font-weight: bold;  margin-right: 10px;"> RANK: {{ $form->dwelling_prior_coverages->additionalINT_rank }}</span>
                            </div>
                            <div
                                style="display: flex; margin-right: 10px; align-items: center; justify-content: flex-end;">
                                <span class="label" style="font-weight: bold;">EVIDENCE:</span>

                            </div>
                            <div
                                style="display: flex; margin-right: 10px; align-items: center; justify-content: flex-end;">
                                <input type="checkbox" style="margin-right: 3px; margin-right: 10px;"
                                    name="additionalINT_certificate" {{ $form->dwelling_prior_coverages->additionalINT_certificate == 1 ? 'checked disabled' : 'disabled' }}>
                                <span class="label" style="font-weight: bold;">CERTIFICATE</span>
                            </div>
                            <div
                                style="display: flex; margin-right: 10px; align-items: center; justify-content: flex-end;">
                                <input type="checkbox" style="margin-right: 3px; margin-right: 10px;"
                                    name="additionalINT_sendEmail" {{ $form->dwelling_prior_coverages->additionalINT_sendEmail == 1 ? 'checked disabled' : 'disabled' }}>
                                <span class="label" style="font-weight: bold;">Send Email</span>
                            </div>
                        </div>

                        <div style="position: absolute; bottom: 5px; width: 95%;">
                            <div class="field-row" style="margin-top: 0;">
                                <span class="label" style="font-weight: bold;">REFERENCE / LOAN #: </span>{{ $form->dwelling_prior_coverages->additionalINT_loan }}
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
                <td><input type="checkbox" name="remarks_check_earth" {{ $form->dwelling_remarks->remarks_check_earth == 1 ? 'checked disabled' : 'disabled' }} value="1"> EARTHQUAKE APPLICATION</td>
                <td><input type="checkbox" name="remarks_check_pers" {{ $form->dwelling_remarks->remarks_check_pers == 1 ? 'checked disabled' : 'disabled' }} value="1"> PERS UMBRELLA APPLICATION SECTION</td>
                <td><input type="checkbox" name="remarks_check_residence" {{ $form->dwelling_remarks->remarks_check_residence == 1 ? 'checked disabled' : 'disabled' }} value="1"> RESIDENCE BASED BUSINESS SUPP</td>
                <td><input type="checkbox" name="remarks_check_windstrom" {{ $form->dwelling_remarks->remarks_check_windstrom == 1 ? 'checked disabled' : 'disabled' }} value="1"> WINDSTORM LOSS MITIGATION</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remarks_check_flood" {{ $form->dwelling_remarks->remarks_check_flood == 1 ? 'checked disabled' : 'disabled' }} value="1"> FLOOD EXCLUSION NOTICE</td>
                <td><input type="checkbox" name="remarks_check_photograph" {{ $form->dwelling_remarks->remarks_check_photograph == 1 ? 'checked disabled' : 'disabled' }} value="1"> PHOTOGRAPH</td>
                <td><input type="checkbox" name="remarks_check_solid" {{ $form->dwelling_remarks->remarks_check_solid == 1 ? 'checked disabled' : 'disabled' }} value="1"> SOLID FUEL SUPPLEMENT</td>
                <td><input type="checkbox" name="remarks_check_other1" {{ $form->dwelling_remarks->remarks_check_other1 == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_remarks->remarks_check_other }}</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remarks_check_lead" {{ $form->dwelling_remarks->remarks_check_lead == 1 ? 'checked disabled' : 'disabled' }} value="1"> LEAD FREE PAINT CERTIFICATION</td>
                <td><input type="checkbox" name="remarks_check_protection" {{ $form->dwelling_remarks->remarks_check_protection == 1 ? 'checked disabled' : 'disabled' }} value="1"> PROTECTION DEVICE CERTIFICATE</td>
                <td><input type="checkbox" name="remarks_check_state" {{ $form->dwelling_remarks->remarks_check_state == 1 ? 'checked disabled' : 'disabled' }} value="1"> STATE SUPPLEMENT(S) (if applicable)
                </td>
                <td><input type="checkbox" name="remarks_checkother" {{ $form->dwelling_remarks->remarks_checkother == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_remarks->remarks_check_other2 }}</td>
            </tr>
            <tr>
                <td><input type="checkbox" name="remarks_check_personal" {{ $form->dwelling_remarks->remarks_check_personal == 1 ? 'checked disabled' : 'disabled' }} value="1"> PERSONAL INLAND MARINE SECTION</td>
                <td><input type="checkbox" name="remarks_check_replacement" {{ $form->dwelling_remarks->remarks_check_replacement == 1 ? 'checked disabled' : 'disabled' }} value="1"> REPLACEMENT COST ESTIMATE</td>
                <td><input type="checkbox" name="remarks_check_water" {{ $form->dwelling_remarks->remarks_check_water == 1 ? 'checked disabled' : 'disabled' }} value="1"> WATERCRAFT SECTION</td>
                <td><input type="checkbox" name="remarks_check3_other" {{ $form->dwelling_remarks->remarks_check3_other == 1 ? 'checked disabled' : 'disabled' }} value="1"> {{ $form->dwelling_remarks->remarks_check_other3 }}</td>
            </tr>
            <tr>
                <td colspan="4" style="height: 70px;">{{ $form->dwelling_remarks->remarks }}
            </tr>
        </table>
        <div class="page-break"></div>
        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID: {{ $form->dwelling_remarks->agencyID }}</p>
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
                <td>{{ $form->dwelling_biners->binders_effective }}</td>
                <td>{{ $form->dwelling_biners->binders_expire }}</td>
            </tr>
            <tr>
                <td>Time</td>
                <td><input type="checkbox" name="binders_time" value="1" {{ $form->dwelling_biners->binders_time == 1 ? 'checked disabled' : 'disabled' }}> 12:01 AM</td>
            </tr>
            <tr>
                <td>12:01 AM</td>
                <td><input type="checkbox" name="binders_noon" value="1" {{ $form->dwelling_biners->binders_noon == 1 ? 'checked disabled' : 'disabled' }}> Noon</td>
            </tr>
            <tr>
                <td colspan="2"><input type="checkbox" name="binders_coverage" value="1" {{ $form->dwelling_biners->binders_coverage == 1 ? 'checked disabled' : 'disabled' }}> Coverage Is not bound</td>

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
                        Applicant Initials : {{ $form->dwelling_biners->applicantInitials }}
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p>
                        <input type="checkbox" name="tems" {{ $form->dwelling_biners->tems == 1 ? 'checked disabled' : 'disabled' }} value="1"> Copy of the Notice of Information Practices
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
                <td colspan="2">Producere Signature <br> {{ $form->dwelling_biners->producerSignature }}
                </td>
                <td colspan="2">Producere Name <br> {{ $form->dwelling_biners->producerName }} </td>
                <td colspan="2"> State Producer license # <br> {{ $form->dwelling_biners->stateLicense }}</td>

            </tr>
            <tr>
                <td colspan="3">Applicant Signature <br> {{ $form->dwelling_biners->applicantSignature }}</td>
                <td colspan="1">Date <br> {{ $form->dwelling_biners->dateApplication }}</td>
                <td colspan="2">National Producer # <br> {{ $form->dwelling_biners->nationalProducer }}
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
@endsection
