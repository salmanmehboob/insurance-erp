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
            /* Light background for screen view */
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
            border: 1px solid #000;
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
            vertical-align: middle;
            /* Center content vertically */
            font-size: 8pt;
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
                Property Section
            </div>
            <div class="text-right flex-shrink-0 ml-4" style="border:1px solid #000; padding: 1px 5px;">
                <div class="" style="text-align: center;">
                    <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                    <p>{{ $form->invoice_date }}</p>
                </div>
            </div>
        </div>
        <table class="">
            <tr>
                <td>Agency Name <br> {{ $form->agency_name }}
                </td>
                <td>Career <br> {{ $form->career }}</td>
                <td>NAIC CODE <br> {{ $form->naic_code }}
                </td>
            </tr>
            <tr>
                <td>Policy Number <br> {{ $form->policy_no }}
                </td>
                <td>Effective Date <br> {{ $form->effective_date }}</td>
                <td>Named Insured <br> {{ $form->named_insured }}</td>
            </tr>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Blanket Summary</div>
        <table class="" style="width: 100%; margin-top: 5px;">
            <tr>
                <th>BLKT # </th>
                <th>Amount </th>
                <th>Type </th>
                <th>BLKT # </th>
                <th>Amount </th>
                <th>Type </th>
            </tr>
            <tr>
                <td>{{ $form->blkt_s1_r1 }}</td>
                <td>{{ $form->amount_s1_r1 }}</td>
                <td>{{ $form->type_s1_r1 }}</td>
                <td>{{ $form->blkt_s2_r1 }}</td>
                <td>{{ $form->amount_s2_r1 }}</td>
                <td>{{ $form->type_s2_r1 }}</td>
            </tr>
            <tr>
                <td>{{ $form->blkt_s1_r2 }}</td>
                <td>{{ $form->amount_s1_r2 }}</td>
                <td>{{ $form->type_s1_r2 }}</td>
                <td>{{ $form->blkt_s2_r2 }}</td>
                <td>{{ $form->amount_s2_r2 }}</td>
                <td>{{ $form->type_s2_r2 }}</td>
            </tr>

        </table>
        <table class="">
            <tr>
                <td rowspan="2" style="width: 120px;"><b>Premises Information </b></td>
                <td style="width: 80px;">Premises #: {{ $form->PropertyPremises->sec1_premises_no }}</td>
                <td colspan="8">Street Address: {{ $form->PropertyPremises->sec1_street_address }}</td>
            </tr>
            <tr>
                <td>Building #: {{ $form->PropertyPremises->sec1_building_no }}</td>
                <td colspan="8">BLDG Description: {{ $form->PropertyPremises->sec1_building_desc }}</td>

            </tr>
            <tr>
                <th>Subject of Insurance </th>
                <th>Amount </th>
                <th>Coins % </th>
                <th>Valuation </th>
                <th>Cause of Loss</th>
                <th>Inflation Gaurd %</th>
                <th>Ded</th>
                <th>Ded Type </th>
                <th>Blanket #</th>
                <th>Forms and condition to apply </th>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremises->sec1_r1_sub_insure }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_amount }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_coins }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_valuation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_cause_loss }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_inflation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_ded }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_ded_type }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_blanket }}</td>
                <td>{{ $form->PropertyPremises->sec1_r1_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremises->sec1_r2_sub_insure }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_amount }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_coins }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_valuation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_cause_loss }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_inflation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_ded }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_ded_type }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_blanket }}</td>
                <td>{{ $form->PropertyPremises->sec1_r2_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremises->sec1_r3_sub_insure }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_amount }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_coins }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_valuation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_cause_loss }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_inflation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_ded }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_ded_type }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_blanket }}</td>
                <td>{{ $form->PropertyPremises->sec1_r3_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremises->sec1_r4_sub_insure }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_amount }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_coins }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_valuation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_cause_loss }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_inflation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_ded }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_ded_type }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_blanket }}</td>
                <td>{{ $form->PropertyPremises->sec1_r4_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremises->sec1_r5_sub_insure }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_amount }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_coins }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_valuation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_cause_loss }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_inflation }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_ded }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_ded_type }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_blanket }}</td>
                <td>{{ $form->PropertyPremises->sec1_r5_forms }}</td>
            </tr>
            <tr>
                <td>Additional Info</td>
                <td colspan="4" style="font-size: 9px;"><input type="checkbox"
                        {{ $form->PropertyPremises->sec1_business_income == 1 ? 'checked disabled' : 'disabled' }}>
                    Business income | Extra Expense -
                    attach accord 810</td>
                <td colspan="5" style="font-size: 9px;"><input type="checkbox"
                        {{ $form->PropertyPremises->sec1_value_reporting == 1 ? 'checked disabled' : 'disabled' }}> Value
                    reporting information -
                    attach
                    accord 811</td>

            </tr>
            <tr>
                <td colspan="10" style="font-weight: 600;">Additional Coverage, Option, restrection, Esndorcements
                    and
                    Rating information
                </td>

            </tr>
            <tr>
                <td colspan="10" style="padding: 0;">
                    <table class="form-table">
                        <tr>
                            <td rowspan="2">SPOILAGE<br>COVERAGE<br>(Y / N)<br><input type="checkbox"
                                    {{ $form->PropertyPremises->sec1_spoilage == 1 ? 'checked disabled' : 'disabled' }}>
                            </td>
                            <td rowspan="2">
                                {{ $form->PropertyPremises->sec1_property_coverageDes }}
                            </td>
                            <td>LIMIT <br> $ {{ $form->PropertyPremises->sec1_limit }}</td>
                            <td rowspan="2">REFRIG MAINT<br>AGREEMENT<br>(Y / N)<br><input type="checkbox"
                                    name="sec1_agreement" value="1"
                                    {{ $form->PropertyPremises->sec1_spoilage == 1 ? 'checked disabled' : 'disabled' }}>
                            </td>
                            <td rowspan="2"><span style="line-height: 200%;">OPTIONS</span> <br>
                                <div class="checkbox-label"><input type="checkbox"
                                        {{ $form->PropertyPremises->sec1_breakdown == 1 ? 'checked disabled' : 'disabled' }}><label>BREAKDOWN
                                        OR
                                        CONTAMINATION</label></div>
                                <div class="checkbox-label" style="margin-top: 5px;"><input type="checkbox"
                                        {{ $form->PropertyPremises->sec1_power_outage == 1 ? 'checked disabled' : 'disabled' }}><label>POWER
                                        OUTAGE</label></div>
                                <div class="checkbox-label" style="margin-top: 5px;"><input type="checkbox"
                                        {{ $form->PropertyPremises->sec1_selling_price == 1 ? 'checked disabled' : 'disabled' }}><label>SELLING
                                        PRICE</label></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Deductable <br> $ {{ $form->PropertyPremises->sec1_deductable }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">Sinkhole coverage (required in florida)</td>
                <td colspan="2"><input type="checkbox" name="sec1_coverage_accept" value="1"
                        {{ $form->PropertyPremises->sec1_coverage_accept == 1 ? 'checked disabled' : 'disabled' }}> Accept
                    Coverage</td>
                <td colspan="3"><input type="checkbox" name="sec1_coverage_reject" value="1"
                        {{ $form->PropertyPremises->sec1_coverage_reject == 1 ? 'checked disabled' : 'disabled' }}> Reject
                    Coverage</td>
                <td>Limit $ {{ $form->PropertyPremises->sec1_coverage_limit }}
                </td>
            </tr>
            <tr>
                <td colspan="4">Mine Subsidence coverage (required in IL, IN, KY and WV)</td>
                <td colspan="2"><input type="checkbox" name="sec1_mine_accept" value="1"
                        {{ $form->PropertyPremises->sec1_mine_accept == 1 ? 'checked disabled' : 'disabled' }}> Accept
                    Coverage
                </td>
                <td colspan="3"><input type="checkbox" name="sec1_mine_reject" value="1"
                        {{ $form->PropertyPremises->sec1_mine_reject == 1 ? 'checked disabled' : 'disabled' }}> Reject
                    Coverage
                </td>
                <td>Limit $ {{ $form->PropertyPremises->sec1_mine_limit }}
                </td>
            </tr>
            <tr>
                <td style="height: 80px; vertical-align: top; border-right: 0;" colspan="6">
                    <span style=""><input type="checkbox" name="sec1_propertyHistorical"
                            {{ $form->PropertyPremises->sec1_propertyHistorical == 1 ? 'checked disabled' : 'disabled' }}>
                        Property has been
                        designed an historical landmark
                        <br></span>
                </td>
                <td style="height: 80px; vertical-align: top; text-align: right; border-left: 0;" colspan="4">
                    <span style=""> # of open slides on structure
                        {{ $form->PropertyPremises->sec1_slidesStruct }}</span>
                </td>
            </tr>
            <tr>
                <th rowspan="2">Construction Type</th>
                <th colspan="2">Distance To</th>
                <th rowspan="2">Fire District</th>
                <th rowspan="2">Code Number</th>
                <th rowspan="2">Prot CL</th>
                <th rowspan="2"># of Stories</th>
                <th rowspan="2"># of BASM TS</th>
                <th rowspan="2">YR Built</th>
                <th rowspan="2">Total Areas</th>

            </tr>
            <tr>
                <th>Hydrinct</th>
                <th>Fire State</th>


            </tr>
            <tr>
                <td>{{ $form->PropertyPremises->sec1_construction_ty }}
                </td>
                <td>FT {{ $form->PropertyPremises->sec1_distanceto }}</td>
                <td>MI {{ $form->PropertyPremises->sec1_fireState }}
                </td>
                <td>{{ $form->PropertyPremises->sec1_fire_district }}</td>
                <td>{{ $form->PropertyPremises->sec1_code_no }}</td>
                <td>{{ $form->PropertyPremises->sec1_protCl }}</td>
                <td>{{ $form->PropertyPremises->sec1_stories }}</td>
                <td>{{ $form->PropertyPremises->sec1_basm }}</td>
                <td>{{ $form->PropertyPremises->sec1_yrbuilt }}</td>
                <td>{{ $form->PropertyPremises->sec1_totalArea }}</td>
            </tr>
            <tr>
                <td rowspan="2" colspan="3">
                    <span style="line-height: 200%;">Building Improvments </span><br>
                    <input type="checkbox" name="sec1_wiringYr" value="1"
                        {{ $form->PropertyPremises->sec1_wiringYr == 1 ? 'checked disabled' : 'disabled' }}> wiring YR
                    <input type="checkbox" style="margin-left: 10px;" name="sec1_plumbering" value="1"
                        {{ $form->PropertyPremises->sec1_plumbering == 1 ? 'checked disabled' : 'disabled' }}> Plumbering
                    YR
                    <br><input type="checkbox" name="sec1_roofingYr" value="1"
                        {{ $form->PropertyPremises->sec1_roofingYr == 1 ? 'checked disabled' : 'disabled' }}> Roofing YR
                    <input type="checkbox" style="margin-left: 10px;" name="sec1_heating" value="1"
                        {{ $form->PropertyPremises->sec1_heating == 1 ? 'checked disabled' : 'disabled' }}> Heating
                    YR
                    <br><input type="checkbox" name="sec1_otherYR" value="1"
                        {{ $form->PropertyPremises->sec1_otherYR == 1 ? 'checked disabled' : 'disabled' }}> Other <span
                        style="margin-left: 20px;">YR: {{ $form->PropertyPremises->sec1_otherYRField }}</span>
                </td>
                <td>BLDG Code</td>
                <td>Tax Code</td>
                <td colspan="2">Roof Type</td>
                <td colspan="3">Other Occupancies</td>

            </tr>
            <tr>
                <td colspan="2"> wind class <br> <input type="checkbox" name="sec1_resistive"
                        {{ $form->PropertyPremises->sec1_resistive == 1 ? 'checked disabled' : 'disabled' }}> Resistive
                </td>
                <td colspan="2"> <input type="checkbox" name="sec1_semi_resistive"
                        {{ $form->PropertyPremises->sec1_semi_resistive == 1 ? 'checked disabled' : 'disabled' }}>Semi
                    Resistive <br> <input type="checkbox" name="sec1_roofT_otherCheck"
                        {{ $form->PropertyPremises->sec1_roofT_otherCheck == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->PropertyPremises->sec1_roofT_otherCheckField }}
                </td>
                <td colspan="2" style="vertical-align: top; border-right: 0;" colspan="6">
                    <span style=""><input type="checkbox" name="sec1_headingSource" value="1"
                            {{ $form->PropertyPremises->sec1_headingSource == 1 ? 'checked disabled' : 'disabled' }}>
                        Heating
                        Source INCL Woodburning Stove Or Fireplace
                        Insert Manufacturer: <br></span>
                </td>
                <td style="vertical-align: top; text-align: right; border-left: 0;" colspan="4">
                    <span style=""> Date Installed {{ $form->PropertyPremises->sec1_dateInstalled }}</span>
                </td>

            </tr>
            <tr>
                <td colspan="5">
                    <span style="line-height: 200%;">Primary Heat </span><br>
                    <input type="checkbox" name="sec1_primary_boiler" value="1"
                        {{ $form->PropertyPremises->sec1_primary_boiler == 1 ? 'checked disabled' : 'disabled' }}> Boiler
                    <input type="checkbox" name="sec1_primary_solidFuel" value="1"
                        {{ $form->PropertyPremises->sec1_primary_solidFuel == 1 ? 'checked disabled' : 'disabled' }}
                        style="margin-left: 10px;"> Solid Fuel
                    <input type="checkbox" name="sec1_primary_otherC"
                        {{ $form->PropertyPremises->sec1_primary_otherC == 1 ? 'checked disabled' : 'disabled' }}
                        value="1" style="margin-left: 10px;">
                    {{ $form->PropertyPremises->sec1_primary_otherCF }}
                    <br>If boliler is insurance placed elsewhere? <input type="checkbox" name="sec1_PrimarybolierPlace"
                        value="1" style="margin-left: 10px;"
                        {{ $form->PropertyPremises->sec1_PrimarybolierPlace == 1 ? 'checked disabled' : 'disabled' }}>
                    Y/N
                </td>
                <td colspan="5">
                    <span style="line-height: 200%;">Secondary Heat </span><br>
                    <span style="line-height: 200%;">Primary Heat </span><br>
                    <input type="checkbox" name="sec1_secondary_boiler" value="1"
                        {{ $form->PropertyPremises->sec1_secondary_boiler == 1 ? 'checked disabled' : 'disabled' }}>
                    Boiler <input type="checkbox" name="sec1_secondary_solidFuel" value="1"
                        style="margin-left: 10px;"
                        {{ $form->PropertyPremises->sec1_secondary_solidFuel == 1 ? 'checked disabled' : 'disabled' }}>
                    Solid Fuel
                    <input type="checkbox" name="sec1_secondary_otherC" value="1" style="margin-left: 10px;"
                        {{ $form->PropertyPremises->sec1_secondary_otherC == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->PropertyPremises->sec1_secondary_otherCF }}
                    <br>If boliler is insurance placed elsewhere? <input type="checkbox" name="sec1_secondarybolierPlace"
                        {{ $form->PropertyPremises->sec1_secondarybolierPlace == 1 ? 'checked disabled' : 'disabled' }}
                        value="1" style="margin-left: 10px;">
                    Y/N
                </td>

            </tr>
            <tr>
                <td colspan="2">Right Exposure & Distance <br> {{ $form->PropertyPremises->sec1_rightExp }}</td>
                <td colspan="3">Left Exposure & Distance <br> {{ $form->PropertyPremises->sec1_leftExp }}</td>
                <td colspan="3">Front Exposure & Distance <br> {{ $form->PropertyPremises->sec1_frontExp }}</td>
                <td colspan="2">Rear Exposure & Distance <br> {{ $form->PropertyPremises->sec1_rearExp }}</td>
            </tr>
            <tr>
                <td colspan="3">Burgler alarm type <br> {{ $form->PropertyPremises->sec1_buglerAlarm }}</td>
                <td colspan="2">Certificate # <br> {{ $form->PropertyPremises->sec1_certificate }}</td>
                <td colspan="2">Expiration Date {{ $form->PropertyPremises->sec1_expirationDate }}</td>
                <td colspan="3"><input type="checkbox" name="sec1_centralSatation" value="1"
                        {{ $form->PropertyPremises->sec1_centralSatation == 1 ? 'checked disabled' : 'disabled' }}>
                    Central
                    Station <input type="checkbox" name="sec1_localGong" value="1" style="margin-left: 10px;"
                        {{ $form->PropertyPremises->sec1_localGong == 1 ? 'checked disabled' : 'disabled' }}>
                    Local Gong<br>
                    <input type="checkbox" name="sec1_withKeys" value="1"
                        {{ $form->PropertyPremises->sec1_withKeys == 1 ? 'checked disabled' : 'disabled' }}> With keys
                </td>
            </tr>
            <tr>
                <td colspan="3">Burgler alarm installed and serviced by <br>
                    {{ $form->PropertyPremises->sec1_burglerAlarmInstall }}</td>
                <td>Extent <br> {{ $form->PropertyPremises->sec1_extent }}
                </td>
                <td>Grade <br> {{ $form->PropertyPremises->sec1_grade }}
                </td>
                <td colspan="3"># Guards / Watchman <br> {{ $form->PropertyPremises->sec1_watchman }}</td>
                <td colspan="2"><input type="checkbox" name="sec1_clockHourly" value="1"
                        {{ $form->PropertyPremises->sec1_clockHourly == 1 ? 'checked disabled' : 'disabled' }}> Clock
                    Hourly <br>
                    <input type="checkbox" name="sec1_otherCheckCH" value="1"
                        {{ $form->PropertyPremises->sec1_otherCheckCH == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->PropertyPremises->sec1_otherCheckCHF }}
                </td>
            </tr>
            <tr>
                <td colspan="4">Premisis Fire Protection <br> {{ $form->PropertyPremises->sec1_premisisFireProtect }}
                </td>
                <td>% Sprink <br> {{ $form->PropertyPremises->sec1_sprik }}
                </td>
                <td colspan="3">Fire Alarm Manufacture <br> {{ $form->PropertyPremises->sec1_fireAlarmManufacture }}
                </td>
                <td colspan="2"><input type="checkbox" name="sec1_CentralS" value="1"
                        {{ $form->PropertyPremises->sec1_CentralS == 1 ? 'checked disabled' : 'disabled' }}> Central
                    station <br>
                    <input type="checkbox" name="sec1_localG" value="1"
                        {{ $form->PropertyPremises->sec1_localG == 1 ? 'checked disabled' : 'disabled' }}> Local Gong
                </td>
            </tr>

        </table>
        <table class="form-table" style="margin-top: 10px;">
            <tr>
                <td style="font-weight: 600;">Additional Interest</td>
                <td colspan="7"><input type="checkbox" name="accordCheck" value="1"
                        {{ $form->PropertyPremises->accordCheck == 1 ? 'checked disabled' : 'disabled' }}> Accord 45
                    attached for
                    additional names </td>
            </tr>
            <tr>
                <td class="interest-cell" rowspan="3">
                    <div class="title">INTEREST</div>
                    <div class="interest-options">
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec1_lenderPay" value="1"
                                {{ $form->PropertyPremises->sec1_lenderPay == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LENDER'S LOSS PAYABLE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec1_lossPayee" value="1"
                                {{ $form->PropertyPremises->sec1_lossPayee == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LOSS PAYEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec1_mortgagee" value="1"
                                {{ $form->PropertyPremises->sec1_mortgagee == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>MORTGAGEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec1_intrestOther" value="1"
                                {{ $form->PropertyPremises->sec1_intrestOther == 1 ? 'checked disabled' : 'disabled' }}>
                            {{ $form->PropertyPremises->sec1_intrestOtherField }}
                        </div>
                    </div>
                </td>
                <td colspan="4" style="height: 80px; position: relative;">
                    <div style="display: flex; align-items: flex-end;">
                        <span class="label" style="font-weight: bold;">NAME AND ADDRESS</span>
                        <div style="flex-grow: 1; border-bottom: 1px solid black;">
                            {{ $form->PropertyPremises->sec1_nameAddress }}
                        </div>
                    </div>
                    <table
                        style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                        <tr>
                            <td style="width: 25%; border: none;">
                                <div style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">RANK:
                                        {{ $form->PropertyPremises->sec1_rank }}</span>
                                </div>
                            </td>
                            <td style="width: 25%; border: none;">
                                <div style="display: flex; align-items: center; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">EVIDENCE:</span>
                                    <input type="checkbox" style="margin-right: 3px;" name="sec1_evidence"
                                        value="1"
                                        {{ $form->PropertyPremises->sec1_evidence == 1 ? 'checked disabled' : 'disabled' }}>
                                </div>
                            </td>
                            <td style="width: 50%; border: none;">
                                <div style="display: flex; align-items: center; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">CERTIFICATE</span>
                                    {{ $form->PropertyPremises->sec1_certificate_intrest }}
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div style="position: absolute; bottom: 5px; width: 95%;">
                        <div class="field-row" style="margin-top: 0;">
                            <span class="label" style="font-weight: bold;">REFERENCE / LOAN #:</span>
                            {{ $form->PropertyPremises->sec1_referenceLoan }}
                        </div>
                    </div>
                </td>
                <td colspan="2" rowspan="2" style="padding: 0;">
                    <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                    <table class="nested-table">
                        <tr>
                            <td>
                                <span class="label">LOCATION:
                                    {{ $form->PropertyPremises->sec1_location_interest }}</span>
                            </td>
                            <td>
                                <span class="label">BUILDING:
                                    {{ $form->PropertyPremises->sec1_building_interest }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="label">ITEM CLASS:
                                    {{ $form->PropertyPremises->sec1_itemClass_interest }}</span>
                            </td>
                            <td>
                                <span class="label">ITEM: {{ $form->PropertyPremises->sec1_item_interest }}</span>
                            </td>
                        </tr>
                    </table>
                    <div class="field-row" style="margin-top: 5px;">
                        <span class="label" style="margin: 5px; ">ITEM DESCRIPTION</span>
                        {{ $form->PropertyPremises->sec1_itemDescriptionInt }}
                    </div>
                </td>
            </tr>

        </table>
        <table class="" style="margin-top: 10px;">
            <tr>
                <td rowspan="2" style="width: 120px;"><b>Additional Premises Information </b></td>
                <td style="width: 80px;">Premises #: {{ $form->PropertyPremisesSec->sec2_premises_no }}</td>
                <td colspan="8">Street Address: {{ $form->PropertyPremisesSec->sec2_street_address }}</td>
            </tr>
            <tr>
                <td>Building #: {{ $form->PropertyPremisesSec->sec2_building_no }}</td>
                <td colspan="8">BLDG Description: {{ $form->PropertyPremisesSec->sec2_building_desc }}</td>

            </tr>
            <tr>
                <th>Subject of Insurance </th>
                <th>Amount </th>
                <th>Coins % </th>
                <th>Valuation </th>
                <th>Cause of Loss</th>
                <th>Inflation Gaurd %</th>
                <th>Ded</th>
                <th>Ded Type </th>
                <th>Blanket #</th>
                <th>Forms and condition to apply </th>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_sub_insure }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_amount }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_coins }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_valuation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_cause_loss }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_inflation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_ded }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_ded_type }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_blanket }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r1_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_sub_insure }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_amount }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_coins }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_valuation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_cause_loss }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_inflation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_ded }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_ded_type }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_blanket }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r2_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_sub_insure }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_amount }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_coins }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_valuation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_cause_loss }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_inflation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_ded }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_ded_type }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_blanket }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r3_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_sub_insure }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_amount }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_coins }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_valuation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_cause_loss }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_inflation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_ded }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_ded_type }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_blanket }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r4_forms }}</td>
            </tr>
            <tr>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_sub_insure }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_amount }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_coins }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_valuation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_cause_loss }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_inflation }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_ded }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_ded_type }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_blanket }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_r5_forms }}</td>
            </tr>
            <tr>
                <td>Additional Info</td>
                <td colspan="4" style="font-size: 9px;"><input type="checkbox" name="sec2_business_income"
                        value="1"
                        {{ $form->PropertyPremisesSec->sec2_business_income == 1 ? 'checked disabled' : 'disabled' }}>
                    Business income | Extra Expense -
                    attach accord 810</td>
                <td colspan="5" style="font-size: 9px;"><input type="checkbox" name="sec2_value_reporting"
                        value="1"
                        {{ $form->PropertyPremisesSec->sec2_value_reporting == 1 ? 'checked disabled' : 'disabled' }}>
                    Value reporting information -
                    attach
                    accord 811</td>

            </tr>
            <tr>
                <td colspan="10" style="font-weight: 600;">Additional Coverage, Option, restrection, Esndorcements
                    and
                    Rating information
                </td>

            </tr>
            <tr>
                <td colspan="10" style="padding: 0;">
                    <table class="form-table">
                        <tr>
                            <td rowspan="2">SPOILAGE<br>COVERAGE<br>(Y / N)<br><input type="checkbox"
                                    name="sec2_spoilage" value="1"
                                    {{ $form->PropertyPremisesSec->sec2_spoilage == 1 ? 'checked disabled' : 'disabled' }}>
                            </td>
                            <td rowspan="2">
                                {{ $form->PropertyPremisesSec->sec2_property_coverageDes }}
                            </td>
                            <td>LIMIT <br> $ {{ $form->PropertyPremisesSec->sec2_limit }}</td>
                            <td rowspan="2">REFRIG MAINT<br>AGREEMENT<br>(Y / N)<br><input type="checkbox"
                                    name="sec2_agreement" value="1"
                                    {{ $form->PropertyPremisesSec->sec2_agreement == 1 ? 'checked disabled' : 'disabled' }}>
                            </td>
                            <td rowspan="2"><span style="line-height: 200%;">OPTIONS</span> <br>
                                <div class="checkbox-label"><input type="checkbox" name="sec2_breakdown"
                                        {{ $form->PropertyPremisesSec->sec2_breakdown == 1 ? 'checked disabled' : 'disabled' }}><label>BREAKDOWN
                                        OR
                                        CONTAMINATION</label></div>
                                <div class="checkbox-label" style="margin-top: 5px;"><input type="checkbox"
                                        name="sec2_power_outage"
                                        {{ $form->PropertyPremisesSec->sec2_power_outage == 1 ? 'checked disabled' : 'disabled' }}><label>POWER
                                        OUTAGE</label></div>
                                <div class="checkbox-label" style="margin-top: 5px;"><input type="checkbox"
                                        name="sec2_selling_price"
                                        {{ $form->PropertyPremisesSec->sec2_selling_price == 1 ? 'checked disabled' : 'disabled' }}><label>SELLING
                                        PRICE</label></div>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Deductable <br> $ {{ $form->PropertyPremisesSec->sec2_deductable }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="4">Sinkhole coverage (required in florida)</td>
                <td colspan="2"><input type="checkbox" name="sec2_coverage_accept" value="1"
                        {{ $form->PropertyPremisesSec->sec2_coverage_accept == 1 ? 'checked disabled' : 'disabled' }}>
                    Accept
                    Coverage</td>
                <td colspan="3"><input type="checkbox" name="sec2_coverage_reject" value="1"
                        {{ $form->PropertyPremisesSec->sec2_coverage_reject == 1 ? 'checked disabled' : 'disabled' }}>
                    Reject
                    Coverage</td>
                <td>Limit $ {{ $form->PropertyPremisesSec->sec2_coverage_limit }}</td>
            </tr>
            <tr>
                <td colspan="4">Mine Subsidence coverage (required in IL, IN, KY and WV)</td>
                <td colspan="2"><input type="checkbox" name="sec2_mine_accept" value="1"
                        {{ $form->PropertyPremisesSec->sec2_mine_accept == 1 ? 'checked disabled' : 'disabled' }}> Accept
                    Coverage
                </td>
                <td colspan="3"><input type="checkbox" name="sec2_mine_reject" value="1"
                        {{ $form->PropertyPremisesSec->sec2_mine_reject == 1 ? 'checked disabled' : 'disabled' }}> Reject
                    Coverage
                </td>
                <td>Limit $ {{ $form->PropertyPremisesSec->sec2_mine_limit }}
                </td>
            </tr>
            <tr>
                <td style="height: 80px; vertical-align: top; border-right: 0;" colspan="6">
                    <span style=""><input type="checkbox" name="sec2_propertyHistorical"
                            {{ $form->PropertyPremisesSec->sec2_propertyHistorical == 1 ? 'checked disabled' : 'disabled' }}>
                        Property has been
                        designed an historical landmark
                        <br></span>
                </td>
                <td style="height: 80px; vertical-align: top; text-align: right; border-left: 0;" colspan="4">
                    <span style=""> # of open slides on structure
                        {{ $form->PropertyPremisesSec->sec2_slidesStruct }}</span>
                </td>
            </tr>
            <tr>
                <th rowspan="2">Construction Type</th>
                <th colspan="2">Distance To</th>
                <th rowspan="2">Fire District</th>
                <th rowspan="2">Code Number</th>
                <th rowspan="2">Prot CL</th>
                <th rowspan="2"># of Stories</th>
                <th rowspan="2"># of BASM TS</th>
                <th rowspan="2">YR Built</th>
                <th rowspan="2">Total Areas</th>

            </tr>
            <tr>
                <th>Hydrinct</th>
                <th>Fire State</th>


            </tr>
            <tr>
                <td>{{ $form->PropertyPremisesSec->sec2_construction_ty }}
                </td>
                <td>FT {{ $form->PropertyPremisesSec->sec2_distanceto }}
                </td>
                <td>MI {{ $form->PropertyPremisesSec->sec2_fireState }}
                </td>
                <td>{{ $form->PropertyPremisesSec->sec2_fire_district }}
                </td>
                <td>{{ $form->PropertyPremisesSec->sec2_code_no }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_protCl }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_stories }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_basm }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_yrbuilt }}</td>
                <td>{{ $form->PropertyPremisesSec->sec2_totalArea }}</td>
            </tr>
            <tr>
                <td rowspan="2" colspan="3">
                    <span style="line-height: 200%;">Building Improvments </span><br>
                    <input type="checkbox" name="sec2_wiringYr" value="1"
                        {{ $form->PropertyPremisesSec->sec2_wiringYr == 1 ? 'checked disabled' : 'disabled' }}> wiring YR
                    <input type="checkbox" style="margin-left: 10px;" name="sec2_plumbering" value="1"
                        {{ $form->PropertyPremisesSec->sec2_plumbering == 1 ? 'checked disabled' : 'disabled' }}>
                    Plumbering
                    YR
                    <br><input type="checkbox" name="sec2_roofingYr" value="1"
                        {{ $form->PropertyPremisesSec->sec2_roofingYr == 1 ? 'checked disabled' : 'disabled' }}> Roofing
                    YR <input type="checkbox" style="margin-left: 10px;" name="sec2_heating" value="1"
                        {{ $form->PropertyPremisesSec->sec2_heating == 1 ? 'checked disabled' : 'disabled' }}> Heating
                    YR
                    <br><input type="checkbox" name="sec2_otherYR" value="1"
                        {{ $form->PropertyPremisesSec->sec2_otherYR == 1 ? 'checked disabled' : 'disabled' }}> Other <span
                        style="margin-left: 20px;">YR: {{ $form->PropertyPremisesSec->sec2_otherYRField }}</span>
                </td>
                <td>BLDG Code</td>
                <td>Tax Code</td>
                <td colspan="2">Roof Type</td>
                <td colspan="3">Other Occupancies</td>

            </tr>
            <tr>
                <td colspan="2"> wind class <br> <input type="checkbox" name="sec2_resistive"
                        {{ $form->PropertyPremisesSec->sec2_resistive == 1 ? 'checked disabled' : 'disabled' }}> Resistive
                </td>
                <td colspan="2"> <input type="checkbox" name="sec2_semi_resistive"
                        {{ $form->PropertyPremisesSec->sec2_semi_resistive == 1 ? 'checked disabled' : 'disabled' }}>Semi
                    Resistive <br> <input type="checkbox" name="sec2_roofT_otherCheck" value="1"
                        {{ $form->PropertyPremisesSec->sec2_roofT_otherCheck == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->PropertyPremisesSec->sec2_roofT_otherCheckField }}
                </td>
                <td colspan="2" style="vertical-align: top; border-right: 0;" colspan="6">
                    <span style=""><input type="checkbox" name="sec2_headingSource" value="1"
                            {{ $form->PropertyPremisesSec->sec2_headingSource == 1 ? 'checked disabled' : 'disabled' }}>
                        Heating
                        Source INCL Woodburning Stove Or Fireplace
                        Insert Manufacturer: <br></span>
                </td>
                <td style="vertical-align: top; text-align: right; border-left: 0;" colspan="4">
                    <span style=""> Date Installed {{ $form->PropertyPremisesSec->sec2_dateInstalled }}</span>
                </td>

            </tr>
            <tr>
                <td colspan="5">
                    <span style="line-height: 200%;">Primary Heat </span><br>
                    <input type="checkbox" name="sec2_primary_boiler" value="1"
                        {{ $form->PropertyPremisesSec->sec2_primary_boiler == 1 ? 'checked disabled' : 'disabled' }}>
                    Boiler <input type="checkbox" name="sec2_primary_solidFuel" value="1"
                        {{ $form->PropertyPremisesSec->sec2_primary_solidFuel == 1 ? 'checked disabled' : 'disabled' }}
                        style="margin-left: 10px;">
                    Solid Fuel
                    <input type="checkbox" name="sec2_primary_otherC"
                        {{ $form->PropertyPremisesSec->sec2_primary_otherC == 1 ? 'checked disabled' : 'disabled' }}
                        value="1" style="margin-left: 10px;">
                    {{ $form->PropertyPremisesSec->sec2_primary_otherCF }}
                    <br>If boliler is insurance placed elsewhere? <input type="checkbox" name="sec2_PrimarybolierPlace"
                        {{ $form->PropertyPremisesSec->sec2_PrimarybolierPlace == 1 ? 'checked disabled' : 'disabled' }}
                        value="1" style="margin-left: 10px;">
                    Y/N
                </td>
                <td colspan="5">
                    <span style="line-height: 200%;">Secondary Heat </span><br>
                    <span style="line-height: 200%;">Primary Heat </span><br>
                    <input type="checkbox" name="sec2_secondary_boiler" value="1"
                        {{ $form->PropertyPremisesSec->sec2_secondary_boiler == 1 ? 'checked disabled' : 'disabled' }}>
                    Boiler <input type="checkbox" name="sec2_secondary_solidFuel"
                        {{ $form->PropertyPremisesSec->sec2_secondary_solidFuel == 1 ? 'checked disabled' : 'disabled' }}
                        value="1" style="margin-left: 10px;">
                    Solid Fuel
                    <input type="checkbox" name="sec2_secondary_otherC"
                        {{ $form->PropertyPremisesSec->sec2_secondary_otherC == 1 ? 'checked disabled' : 'disabled' }}
                        value="1" style="margin-left: 10px;">
                    {{ $form->PropertyPremisesSec->sec2_secondary_otherCF }}
                    <br>If boliler is insurance placed elsewhere? <input type="checkbox" name="sec2_secondarybolierPlace"
                        value="1"
                        {{ $form->PropertyPremisesSec->sec2_secondarybolierPlace == 1 ? 'checked disabled' : 'disabled' }}
                        style="margin-left: 10px;">
                    Y/N
                </td>

            </tr>
            <tr>
                <td colspan="2">Right Exposure & Distance <br> {{ $form->PropertyPremisesSec->sec2_rightExp }}</td>
                <td colspan="3">Left Exposure & Distance <br> {{ $form->PropertyPremisesSec->sec2_leftExp }}</td>
                <td colspan="3">Front Exposure & Distance <br> {{ $form->PropertyPremisesSec->sec2_frontExp }}</td>
                <td colspan="2">Rear Exposure & Distance <br> {{ $form->PropertyPremisesSec->sec2_rearExp }}</td>
            </tr>
            <tr>
                <td colspan="3">Burgler alarm type <br> {{ $form->PropertyPremisesSec->sec2_buglerAlarm }}</td>
                <td colspan="2">Certificate # <br> {{ $form->PropertyPremisesSec->sec2_certificate }}</td>
                <td colspan="2">Expiration Date {{ $form->PropertyPremisesSec->sec2_expirationDate }}</td>
                <td colspan="3"><input type="checkbox" name="sec2_centralSatation" value="1"
                        {{ $form->PropertyPremisesSec->sec2_centralSatation == 1 ? 'checked disabled' : 'disabled' }}>
                    Central
                    Station <input type="checkbox" name="sec2_localGong" value="1"
                        {{ $form->PropertyPremisesSec->sec2_localGong == 1 ? 'checked disabled' : 'disabled' }}
                        style="margin-left: 10px;">
                    Local Gong<br>
                    <input type="checkbox" name="sec2_withKeys" value="1"
                        {{ $form->PropertyPremisesSec->sec2_withKeys == 1 ? 'checked disabled' : 'disabled' }}> With keys
                </td>
            </tr>
            <tr>
                <td colspan="3">Burgler alarm installed and serviced by <br>
                    {{ $form->PropertyPremisesSec->sec2_burglerAlarmInstall }}</td>
                <td>Extent <br> {{ $form->PropertyPremisesSec->sec2_extent }}
                </td>
                <td>Grade <br> {{ $form->PropertyPremisesSec->sec2_grade }}
                </td>
                <td colspan="3"># Guards / Watchman <br> {{ $form->PropertyPremisesSec->sec2_watchman }}</td>
                <td colspan="2"><input type="checkbox" name="sec2_clockHourly" value="1"
                        {{ $form->PropertyPremisesSec->sec2_clockHourly == 1 ? 'checked disabled' : 'disabled' }}> Clock
                    Hourly
                    <br>
                    <input type="checkbox" name="sec2_otherCheckCH" value="1"
                        {{ $form->PropertyPremisesSec->sec2_otherCheckCH == 1 ? 'checked disabled' : 'disabled' }}>
                    {{ $form->PropertyPremisesSec->sec2_otherCheckCHF }}
                </td>
            </tr>
            <tr>
                <td colspan="4">Premisis Fire Protection <br>
                    {{ $form->PropertyPremisesSec->sec2_premisisFireProtect }}</td>
                <td>% Sprink <br> {{ $form->PropertyPremisesSec->sec2_sprik }}</td>
                <td colspan="3">Fire Alarm Manufacture <br>
                    {{ $form->PropertyPremisesSec->sec2_fireAlarmManufacture }}</td>
                <td colspan="2"><input type="checkbox" name="sec2_CentralS" value="1"
                        {{ $form->PropertyPremisesSec->sec2_CentralS == 1 ? 'checked disabled' : 'disabled' }}> Central
                    station
                    <br>
                    <input type="checkbox" name="sec2_localG" value="1"
                        {{ $form->PropertyPremisesSec->sec2_localG == 1 ? 'checked disabled' : 'disabled' }}> Local Gong
                </td>
            </tr>

        </table>
        <table class="form-table" style="margin-top: 10px;">
            <tr>
                <td style="font-weight: 600;">Additional Interest</td>
                <td colspan="7"><input type="checkbox" name="accordCheck" value="1"
                        {{ $form->PropertyPremisesSec->accordCheck == 1 ? 'checked disabled' : 'disabled' }}> Accord 45
                    attached
                    for
                    additional names </td>
            </tr>
            <tr>
                <td class="interest-cell" rowspan="3">
                    <div class="title">INTEREST</div>
                    <div class="interest-options">
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec2_lenderPay" value="1"
                                {{ $form->PropertyPremisesSec->sec2_lenderPay == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LENDER'S LOSS PAYABLE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec2_lossPayee" value="1"
                                {{ $form->PropertyPremisesSec->sec2_lossPayee == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>LOSS PAYEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec2_mortgagee" value="1"
                                {{ $form->PropertyPremisesSec->sec2_mortgagee == 1 ? 'checked disabled' : 'disabled' }}>
                            <label>MORTGAGEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="sec2_intrestOther" value="1"
                                {{ $form->PropertyPremisesSec->sec2_intrestOther == 1 ? 'checked disabled' : 'disabled' }}>
                            {{ $form->PropertyPremisesSec->sec2_intrestOtherField }}
                        </div>
                    </div>
                </td>
                <td colspan="4" style="height: 80px; position: relative;">
                    <div style="display: flex; align-items: flex-end;">
                        <span class="label" style="font-weight: bold;">NAME AND ADDRESS</span>
                        <div style="flex-grow: 1; border-bottom: 1px solid black;">
                            {{ $form->PropertyPremisesSec->sec2_nameAddress }}
                        </div>
                    </div>
                    <table
                        style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                        <tr>
                            <td style="width: 25%; border: none;">
                                <div style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">RANK:
                                        {{ $form->PropertyPremisesSec->sec2_rank }}</span>
                                </div>
                            </td>
                            <td style="width: 25%; border: none;">
                                <div style="display: flex; align-items: center; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">EVIDENCE:</span>
                                    <input type="checkbox" style="margin-right: 3px;" name="sec2_evidence"
                                        {{ $form->PropertyPremisesSec->sec2_evidence == 1 ? 'checked disabled' : 'disabled' }}>
                                </div>
                            </td>
                            <td style="width: 50%; border: none;">
                                <div style="display: flex; align-items: center; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">CERTIFICATE</span>
                                    {{ $form->PropertyPremisesSec->sec2_certificate_intrest }}
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div style="position: absolute; bottom: 5px; width: 95%;">
                        <div class="field-row" style="margin-top: 0;">
                            <span class="label" style="font-weight: bold;">REFERENCE / LOAN #:</span>
                            {{ $form->PropertyPremisesSec->sec2_referenceLoan }}
                        </div>
                    </div>
                </td>
                <td colspan="2" rowspan="2" style="padding: 0;">
                    <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                    <table class="nested-table">
                        <tr>
                            <td>
                                <span class="label">LOCATION:
                                    {{ $form->PropertyPremisesSec->sec2_location_interest }}</span>
                            </td>
                            <td>
                                <span class="label">BUILDING:
                                    {{ $form->PropertyPremisesSec->sec2_building_interest }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span class="label">ITEM CLASS:
                                    {{ $form->PropertyPremisesSec->sec2_itemClass_interest }}</span>
                            </td>
                            <td>
                                <span class="label">ITEM: {{ $form->PropertyPremisesSec->sec2_item_interest }}</span>
                            </td>
                        </tr>
                    </table>
                    <div class="field-row" style="margin-top: 5px;">
                        <span class="label" style="margin: 5px; ">ITEM DESCRIPTION</span>
                        {{ $form->PropertyPremisesSec->sec2_itemDescriptionInt }}
                    </div>
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
        <p style="text-align: center; font-weight: bold; font-size: 9px; margin-top: 10px;">The ACORD name and logo
            are
            registered marks of ACORD</p>
        <div class="page-break"></div>
        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID :
            {{ $form->sec2_agencyId }}</p>
        <p style="font-size: 9px;">Remarks</p>
        <table>
            <tr>
                <td colspan="6" style="height: 150px;">
                    {{ $form->remarks }}
                </td>
            </tr>
            <tr>
                <td colspan="6">
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Alabama
                        Any person who knowingly presents a false or fraudulent claim for payment of a loss or benefit
                        or who
                        knowingly presents false information in an application for insurance is guilty of a
                        crime and may be subject to restitution, fines, or confinement in prison, or any combination
                        thereof.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Alaska
                        Any person who knowingly and with intent to injure, defraud, or deceive an insurance company
                        files
                        a claim containing false, incomplete, or misleading information may be prosecuted under state
                        law.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Arizona
                        For your protection Arizona law requires the following statement to appear on this form. Any
                        person
                        who knowingly presents a false or fraudulent claim for payment of a loss is subject to criminal
                        and
                        civil penalties.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Arkansas
                        Any person who knowingly presents a false or fraudulent claim for payment of a loss or benefit
                        or knowingly presents false information in an application for insurance is guilty of a crime and
                        may be subject to fines and confinement in prison.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in California
                        For your protection California law requires the following to appear on this form. Any person who
                        knowingly presents false or fraudulent claim for the payment of a loss is guilty of a crime and
                        may be subject to fines and confinement in state prison.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Colorado
                        It is unlawful to knowingly provide false, incomplete, or misleading facts or information to an
                        insurance company for the purpose of defrauding or attempting to defraud the company. Penalties
                        may include imprisonment, fines, denial of insurance and civil damages. Any insurance company or
                        agent of an insurance company who knowingly provides false, incomplete, or misleading facts or
                        information to a policyholder or claimant for the purpose of defrauding or attempting to defraud
                        the policyholder or claimant with regard to a settlement or award payable for insurance proceeds
                        shall be reported to the Colorado Division of Insurance within the Department of Regulatory
                        Agencies.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Delaware
                        Any person who knowingly, and with intent to injure, defraud or deceive any insurer, files a
                        statement of claim containing any false, incomplete, or misleading information is guilty of a
                        felony.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in the District of Columbia
                        WARNING: It is a crime to provide false or misleading information to an insurer for the purpose
                        of defrauding the insurer or any other person. Penalties include imprisonment and/or fines. In
                        addition, an insurer may deny insurance benefits if false information materially related to a
                        claim was provided by the applicant.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Florida
                        Any person who knowingly and with intent to injure, defraud, or deceive any insurer files a
                        statement of claim containing any false, incomplete, or misleading information is guilty of a
                        felony of the third degree.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Hawaii
                        Any person who intentionally or knowingly misrepresents or conceals material facts, opinions,
                        intention, or law to obtain or attempt to obtain coverage, benefits, recovery, or compensation
                        commits the offense of insurance fraud which is a crime punishable by fines or imprisonment or
                        both.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Idaho
                        Any person who knowingly, and with intent to defraud or deceive any insurance company, files a
                        statement containing any false, incomplete or misleading information is guilty of a felony.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Kentucky
                        Any person who knowingly and with intent to defraud any insurance company or other person files
                        a statement of claim containing any materially false information or conceals, for the purpose of
                        misleading, information concerning any fact material thereto commits a fraudulent insurance act,
                        which is a crime.</p>
                </td>
            </tr>
            <tr>
                <td colspan="6">Applicable in Kansas Any person who, knowingly and with intent to defraud,
                    presents,
                    causes to be presented or prepares with knowledge or belief that it will be presented to or by an
                    insurer, purported insurer, broker or any agent thereof, any written, electronic, electronic
                    impulse, facsimile, magnetic, oral, or telephonic communication or statement as part of, or in
                    support of, an application for the issuance of, or the rating of an insurance policy for personal or
                    commercial insurance, or a claim for payment or other benefit pursuant to an insurance policy for
                    commercial or personal insurance which such person knows to contain materially false information
                    concerning any fact material thereto; or conceals, for the purpose of
                    misleading, information concerning any fact material thereto commits a fraudulent insurance act.
                </td>
            </tr>
            <tr>
                <td colspan="2">Producere Signature <br> {{ $form->producerSignature }}</td>
                <td colspan="2">Producere Name <br> {{ $form->producerName }}</td>
                <td colspan="2"> State Producer license # <br> {{ $form->producerLicense }}</td>

            </tr>
            <tr>
                <td colspan="3">Applicant Signature <br> {{ $form->applicantSignature }}</td>
                <td colspan="1">Date <br> {{ $form->applicationDate }}</td>
                <td colspan="2">National Producer # <br> {{ $form->nationalProducerNo }}</td>

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
