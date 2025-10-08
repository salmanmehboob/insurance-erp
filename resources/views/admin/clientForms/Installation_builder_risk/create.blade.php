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
            vertical-align: top;
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
    </style>
@endpush
@section('content')
    <form action="{{ route('store-installation-builder-risk') }}" method="POST" class=" mt-4">
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
                    INSTALLATION / BUILDERS RISK SECTION

                </div>
                <div class="text-right flex-shrink-0 ml-4" style="border:1px solid #000; padding: 1px 5px;">
                    <div class="" style="text-align: center;">
                        <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                        <p><input type="text" name="invoice_date" class="date-input" style="font-size: 8pt;"></p>
                    </div>
                </div>
            </div>
            <table class="">

                <tr>
                    <td>Agency Name <br> <input type="text" name="agency_name" class="date-input"
                            style="font-size: 8pt;"></td>
                    <td>Career <br> <input type="text" name="career" class="date-input" style="font-size: 8pt;"></td>
                    <td>NAIC Code <br> <input type="text" name="naic_code" class="date-input" style="font-size: 8pt;">
                    </td>
                </tr>
                <tr>
                    <td>Policy Number <br> <input type="text" name="policy_number" class="date-input"
                            style="font-size: 8pt;"></td>
                    <td>Effective Date <br> <input type="text" name="effective_date" class="date-input"
                            style="font-size: 8pt;"></td>
                    <td>Named Insured <br> <input type="text" name="name_insured" class="date-input"
                            style="font-size: 8pt;"></td>
                </tr>
                <tr>
                    <td><input type="checkbox" name="insallationCheck" value="1"> Installation</td>
                    <td colspan="2"><input type="checkbox" name="buildingRiskCheck" value="1"> Building Risk</td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; text-align: center; ">OPEN REPORTING FORM </div>
            <div style="display: flex;">
                <table style="width: 64%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="4">COVERAGE</td>
                    </tr>
                    <tr>
                        <td>LIMIT AT ANY SINGLE LOCATION </td>
                        <td>LIMIT PER DISASTER </td>
                        <td>LIMIT AT A TEMPORARY LOCATION </td>
                        <td>TRANSIT LIMIT </td>
                    </tr>
                    <tr>
                        <td>$ <input type="text" name="limit_sing_loc" class="date-input" style="font-size: 8pt;"></td>
                        <td>$ <input type="text" name="limit_per_disaster" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td>$ <input type="text" name="limit_temp_loc" class="date-input" style="font-size: 8pt;"></td>
                        <td>$ <input type="text" name="transit_limit" class="date-input" style="font-size: 8pt;"></td>
                    </tr>
                </table>
                <table style="width: 34%; justify-self: end; margin-left: 2%;">
                    <tr>
                        <td style="border: 0; font-weight: 600;" colspan="3">CAUSES OF LOSS & DEDUCTIBLE
                        </td>
                    </tr>
                    <tr>
                        <td>CAUSES OF LOSS </td>
                        <td>SUB-LIMIT </td>
                        <td>DEDUCTIBLE </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="earthQuakeCheck" value="1"> EARTHQUAKE</td>
                        <td>$ <input type="text" name="earthQuakeSubLimit" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td><input type="text" name="earthQuakeDeductible" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="flood" value="1"> FLOOD</td>
                        <td>$ <input type="text" name="floodSubLimit" class="date-input" style="font-size: 8pt;"></td>
                        <td> <input type="text" name="floodDeductible" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="otherCauseCheck" value="1"> <input type="text"
                                name="otherCauseField" class="date-input" style="font-size: 8pt;"></td>
                        <td>$ <input type="text" name="otherCauseSubLim" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td><input type="text" name="otherCauseDeductible" class="date-input"
                                style="font-size: 8pt;"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="specialCause" value="1"> Special</td>
                        <td>$ <input type="text" name="specialCauseSubLim" class="date-input"
                                style="font-size: 8pt;"></td>
                        <td><input type="text" name="specialCauseDeductible" class="date-input"
                                style="font-size: 8pt;"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="broadCause" value="1"> BROAD</td>
                        <td><input type="checkbox" name="basicSubLim" value="1"> BASIC</td>
                        <td><input type="text" name="broadDeductible" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                </table>
            </div>
            <div style="display: flex; margin-top: 10px;">
                <table style="width: 64%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="4">TERRITORY</td>
                    </tr>
                    <tr>
                        <td>
                            <textarea rows="5" name="operationTerritory" class="date-input" style="font-size: 8pt;"
                                placeholder="SPECIFY THE APPLICANTS OPERATING TERRITORY."></textarea>
                        </td>
                    </tr>

                </table>
                <table style="width: 34%; justify-self: end; margin-left: 2%;">
                    <tr>
                        <td style="border: 0; font-weight: 600;" colspan="3">RECEIPTS
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px;" colspan="2">ENTER THE GROSS INSTALLATION RECEIPTS. </td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px;">PAST 12 MONTHS </td>
                        <td style="font-size: 9px;">NEXT 12 MONTHS (ESTIMATE) </td>
                    </tr>
                    <tr>
                        <td>$ <input type="text" name="pastMonth" class="date-input" style="font-size: 8pt;"></td>
                        <td>$ <input type="text" name="nextMonth" class="date-input" style="font-size: 8pt;"></td>
                    </tr>

                </table>
            </div>


            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">JOBS / VALUES </div>
            <table>
                <tr>
                    <td rowspan="2"> TYPE</td>
                    <td rowspan="2">ANNUAL NUMBER</td>
                    <td rowspan="2">DURATION</td>
                    <td colspan="2">JOBS IN PROGRESS </td>
                    <td colspan="3">COST OR VALUE OF EACH INSTALLATION</td>
                    <td rowspan="2">MATERIAL COST AS % OF TOTAL</td>
                </tr>
                <tr>
                    <td>MAXIMUM</td>
                    <td>AVERAGE</td>
                    <td>MAXIMUM</td>
                    <td>MINIMUM</td>
                    <td>AVERAGE</td>
                </tr>
                <tr>
                    <td>RESIDENTIAL</td>
                    <td><input type="text" name="resi_annualNum" class="date-input" style="font-size: 8pt;"></td>
                    <td><input type="text" name="resi_duration" class="date-input" style="font-size: 8pt;"></td>
                    <td><input type="text" name="resi_max" class="date-input" style="font-size: 8pt;"></td>
                    <td><input type="text" name="resi_avg" class="date-input" style="font-size: 8pt;"></td>
                    <td>$ <input type="text" name="resi_maxCost" class="date-input" style="font-size: 8pt;"></td>
                    <td>$ <input type="text" name="resi_minCost" class="date-input" style="font-size: 8pt;"></td>
                    <td>$ <input type="text" name="resi_avgCost" class="date-input" style="font-size: 8pt;"></td>
                    <td>% <input type="text" name="resi_materialPerc" class="date-input" style="font-size: 8pt;">
                    </td>

                </tr>
                <tr>
                    <td>Commercial</td>
                    <td><input type="text" name="commercial_annualNum" class="date-input" style="font-size: 8pt;">
                    </td>
                    <td><input type="text" name="commercial_duration" class="date-input" style="font-size: 8pt;">
                    </td>
                    <td><input type="text" name="commercial_max" class="date-input" style="font-size: 8pt;"></td>
                    <td><input type="text" name="commercial_avg" class="date-input" style="font-size: 8pt;"></td>
                    <td>$ <input type="text" name="commercial_maxCost" class="date-input" style="font-size: 8pt;">
                    </td>
                    <td>$ <input type="text" name="commercial_minCost" class="date-input" style="font-size: 8pt;">
                    </td>
                    <td>$ <input type="text" name="commercial_avgCost" class="date-input" style="font-size: 8pt;">
                    </td>
                    <td>% <input type="text" name="commercial_materialPerc" class="date-input"
                            style="font-size: 8pt;"></td>

                </tr>
            </table>
            <table class="form-table" style="margin-top: 10px;">
                <tr>
                    <td style="font-weight: 600; border: 0;">Additional Interest</td>
                    <td colspan="7" style=" border: 0;"><input type="checkbox" name="accordCheck" value="1">
                        Accord 45 attached for additional
                        names
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" class="interest-cell">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec1_Lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec1_LienHolder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec1_LossPayee" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec1_otherCheck" value="1">
                                <input type="text" name="sec1_otherCheckField" class="date-input"
                                    style="font-size: 8pt;">
                            </div>
                        </div>
                    </td>
                    <td style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS : </span>
                            <input type="text" name="sec1_nameAddress" class="date-input" style="font-size: 8pt;">
                        </div>
                        <table
                            style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">RANK: </span>
                                        <input type="text" name="sec1_rank" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">REFERENCE #:</span>
                                        <input type="text" name="sec1_referenceNo" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                                <td style="width: 50%; border: none;">
                                    <div>
                                        <input type="checkbox" style="margin-right: 3px;" name="sec1_certificateReq"
                                            value="1">
                                        <span class="label">CERTIFICATE REQUIRED</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 0;">
                        <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                        <table class="nested-table">
                            <tr>
                                <td>
                                    <span class="label">LOCATION: <input type="text" name="sec1_loc"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                                <td>
                                    <span class="label">BUILDING: <input type="text" name="sec1_building"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="label">SCHEDULED ITEM NUMBER: <input type="text"
                                            name="sec1_scheduledItem" class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>

                                <td style="border: 0;" colspan="2">
                                    <span class="label">other: <input type="text" name="sec1_intrestOther"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">item description: <input type="text" name="sec1_description"
                            class="date-input" style="font-size: 8pt;"></td>
                </tr>
                <tr>
                    <td rowspan="2" class="interest-cell">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec2_Lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec2_LienHolder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec2_LossPayee" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec2_otherCheck" value="1">
                                <input type="text" name="sec2_otherCheckField" class="date-input"
                                    style="font-size: 8pt;">
                            </div>
                        </div>
                    </td>
                    <td style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS : </span>
                            <input type="text" name="sec2_nameAddress" class="date-input" style="font-size: 8pt;">
                        </div>
                        <table
                            style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">RANK: </span>
                                        <input type="text" name="sec2_rank" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">REFERENCE #:</span>
                                        <input type="text" name="sec2_referenceNo" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                                <td style="width: 50%; border: none;">
                                    <div>
                                        <input type="checkbox" style="margin-right: 3px;" name="sec2_certificateReq"
                                            value="1">
                                        <span class="label">CERTIFICATE REQUIRED</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 0;">
                        <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                        <table class="nested-table">
                            <tr>
                                <td>
                                    <span class="label">LOCATION: <input type="text" name="sec2_loc"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                                <td>
                                    <span class="label">BUILDING: <input type="text" name="sec2_building"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="label">SCHEDULED ITEM NUMBER: <input type="text"
                                            name="sec2_scheduledItem" class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>

                                <td style="border: 0;" colspan="2">
                                    <span class="label">other: <input type="text" name="sec2_intrestOther"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">item description: <input type="text" name="sec2_description"
                            class="date-input" style="font-size: 8pt;"></td>
                </tr>
                <tr>
                    <td rowspan="2" class="interest-cell">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec3_Lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec3_LienHolder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec3_LossPayee" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="sec3_otherCheck" value="1">
                                <input type="text" name="sec3_otherCheckField" class="date-input"
                                    style="font-size: 8pt;">
                            </div>
                        </div>
                    </td>
                    <td style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS : </span>
                            <input type="text" name="sec3_nameAddress" class="date-input" style="font-size: 8pt;">
                        </div>
                        <table
                            style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">RANK: </span>
                                        <input type="text" name="sec3_rank" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">REFERENCE #:</span>
                                        <input type="text" name="sec3_referenceNo" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                                <td style="width: 50%; border: none;">
                                    <div>
                                        <input type="checkbox" style="margin-right: 3px;" name="sec3_certificateReq"
                                            value="1">
                                        <span class="label">CERTIFICATE REQUIRED</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 0;">
                        <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                        <table class="nested-table">
                            <tr>
                                <td>
                                    <span class="label">LOCATION: <input type="text" name="sec3_loc"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                                <td>
                                    <span class="label">BUILDING: <input type="text" name="sec3_building"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="label">SCHEDULED ITEM NUMBER: <input type="text"
                                            name="sec3_scheduledItem" class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>

                                <td style="border: 0;" colspan="2">
                                    <span class="label">other: <input type="text" name="sec3_intrestOther"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">item description: <input type="text" name="sec3_description"
                            class="date-input" style="font-size: 8pt;"></td>
                </tr>
            </table>

            <div style="display: flex; margin-top: 10px;">
                <table style="width: 64%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="4">RIGGING</td>
                    </tr>
                    <tr>
                        <td>
                            <textarea rows="5" name="riggingHosting" class="date-input" style="font-size: 8pt;"
                                placeholder="DESCRIBE ALL HOSTING OR OTHER OPERATIONS REQUIRING RIGGING."></textarea>
                        </td>
                    </tr>

                </table>
                <table style="width: 34%; justify-self: end; margin-left: 2%;">
                    <tr>
                        <td style="border: 0; font-weight: 600;" colspan="3">TRANSPORTATION / SECURITY

                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px;">ESTIMATE % OF VALUE OF MATERIAL SHIPPED TO JOB SITE AT APPLICANTS RISK.
                            <br>
                            % <input type="text" name="estimatePercentagRigging" class="date-input"
                                style="font-size: 8pt;">
                        </td>
                    </tr>
                    <tr>
                        <td style="font-size: 9px;">DESCRIBE JOB SITE SECURITY
                            <input type="text" name="jobsiteSecurity" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>


                </table>
            </div>

            <div class="page-break"></div>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">REMARKS (ACORD 101, Additional Remarks
                Schedule, may be attached if more space is required)</div>
            <table>
                <tr>
                    <td>
                        <textarea rows="5" name="remarks" class="date-input" style="font-size: 8pt;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>SPECIFIC JOB on Page 2
                    </td>
                </tr>
            </table>
            <div style="display: flex; margin-top: 10px;">
                <table style="width: 64%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="4">COVERAGE</td>
                    </tr>
                    <tr>
                        <td>LIMIT AT LOCATION </td>
                        <td>LIMIT AT A TEMPORARY LOCATION </td>
                        <td>TRANSIT LIMIT </td>
                    </tr>
                    <tr>
                        <td>$ <input type="text" name="p2_limit_loc" class="date-input" style="font-size: 8pt;"></td>
                        <td>$ <input type="text" name="p2_limit_temp_loc" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td>$ <input type="text" name="p2_transit_limit" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                </table>
                <table style="width: 34%; justify-self: end; margin-left: 2%;">
                    <tr>
                        <td style="border: 0; font-weight: 600;" colspan="3">CAUSES OF LOSS & DEDUCTIBLE
                        </td>
                    </tr>
                    <tr>
                        <td>CAUSES OF LOSS </td>
                        <td>SUB-LIMIT </td>
                        <td>DEDUCTIBLE </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="p2_earthQuake" value="1"> EARTHQUAKE</td>
                        <td>$ <input type="text" name="p2_earthQuakeSubLim" class="date-input"
                                style="font-size: 8pt;"></td>
                        <td><input type="text" name="p2_earthQuakeDeductible" class="date-input"
                                style="font-size: 8pt;"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="p2_FLOOD" value="1"> FLOOD</td>
                        <td>$ <input type="text" name="p2_FLOODSubLim" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td><input type="text" name="p2_FLOODDeductible" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="p2_otherCauseCheck" value="1"> <input type="text"
                                name="p2_otherCauseCheckField" class="date-input" style="font-size: 8pt;"></td>
                        <td>$ <input type="text" name="p2_otherCauseSubLim" class="date-input"
                                style="font-size: 8pt;"></td>
                        <td><input type="text" name="p2_otherCauseDeductible" class="date-input"
                                style="font-size: 8pt;"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="p2_Special" value="1"> Special</td>
                        <td>$ <input type="text" name="p2_SpecialSubLim" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td><input type="text" name="p2_SpecialDeductible" class="date-input"
                                style="font-size: 8pt;"></td>
                    </tr>
                    <tr>
                        <td><input type="checkbox" name="p2_BROAD" value="1"> BROAD</td>
                        <td><input type="checkbox" name="p2_BASIC" value="1"> BASIC</td>
                        <td><input type="text" name="p2_BASICDeductible" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                </table>
            </div>
            <div style="display: flex; margin-top: 10px;">
                <table style="width: 64%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="4">Job terms / values</td>
                    </tr>
                    <tr>
                        <td colspan="2">Job term </td>
                        <td rowspan="2">Contract amount</td>
                        <td rowspan="2">Value of owner supplied properties</td>
                    </tr>
                    <tr>
                        <td>commencement</td>
                        <td>Completion</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="p2_commencement" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td><input type="text" name="p2_completion" class="date-input" style="font-size: 8pt;"></td>
                        <td>$ <input type="text" name="p2_contractAmount" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td>$ <input type="text" name="p2_ownerSupplied" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                </table>
                <table style="width: 34%; justify-self: end; margin-left: 2%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="3">SECURITY
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea rows="5" name="p2_jobSecurity" class="date-input" style="font-size: 8pt;"
                                placeholder="Describe job site security"></textarea>
                        </td>
                    </tr>


                </table>
            </div>
            <div style="display: flex; margin-top: 10px;">
                <table style="width: 100%; justify-self: end;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="3">JOB DESCRIPTION</td>
                    </tr>
                    <tr>
                        <td style="width: 80%">
                            <textarea rows="5" name="p2_workedPerformed" class="date-input" style="font-size: 8pt;"
                                placeholder="Describe the work to br performed"></textarea>
                        </td>
                        <td>INSURED'S JOB NUMBER: <input type="text" name="p2_insuredJobNumber" class="date-input"
                                style="font-size: 8pt;"></td>
                    </tr>


                </table>
            </div>
            <table class="form-table" style="margin-top: 10px;">
                <tr>
                    <td style="font-weight: 600; border: 0;">Additional Interest</td>
                    <td colspan="7" style=" border: 0;"><input type="checkbox" name="accordCheck" value="1">
                        Accord 45 attached for additional
                        names
                    </td>
                </tr>
                <tr>
                    <td rowspan="2" class="interest-cell">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec1_Lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec1_LienHolder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec1_LossPayee" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec1_otherCheck" value="1">
                                <input type="text" name="p2_sec1_otherCheckField" class="date-input"
                                    style="font-size: 8pt;">
                            </div>
                        </div>
                    </td>
                    <td style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS : </span>
                            <input type="text" name="p2_sec1_nameAddress" class="date-input" style="font-size: 8pt;">
                        </div>
                        <table
                            style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">RANK: </span>
                                        <input type="text" name="p2_sec1_rank" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">REFERENCE #:</span>
                                        <input type="text" name="p2_sec1_referenceNo" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                                <td style="width: 50%; border: none;">
                                    <div>
                                        <input type="checkbox" style="margin-right: 3px;" name="p2_sec1_certificateReq"
                                            value="1">
                                        <span class="label">CERTIFICATE REQUIRED</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 0;">
                        <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                        <table class="nested-table">
                            <tr>
                                <td>
                                    <span class="label">LOCATION: <input type="text" name="p2_sec1_loc"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                                <td>
                                    <span class="label">BUILDING: <input type="text" name="p2_sec1_building"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="label">SCHEDULED ITEM NUMBER: <input type="text"
                                            name="p2_sec1_scheduledItem" class="date-input"
                                            style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>

                                <td style="border: 0;" colspan="2">
                                    <span class="label">other: <input type="text" name="p2_sec1_intrestOther"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">item description: <input type="text" name="p2_sec1_description"
                            class="date-input" style="font-size: 8pt;"></td>
                </tr>
                <tr>
                    <td rowspan="2" class="interest-cell">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec2_Lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec2_LienHolder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec2_LossPayee" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec2_otherCheck" value="1">
                                <input type="text" name="p2_sec2_otherCheckField" class="date-input"
                                    style="font-size: 8pt;">
                            </div>
                        </div>
                    </td>
                    <td style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS : </span>
                            <input type="text" name="p2_sec2_nameAddress" class="date-input" style="font-size: 8pt;">
                        </div>
                        <table
                            style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">RANK: </span>
                                        <input type="text" name="p2_sec2_rank" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">REFERENCE #:</span>
                                        <input type="text" name="p2_sec2_referenceNo" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                                <td style="width: 50%; border: none;">
                                    <div>
                                        <input type="checkbox" style="margin-right: 3px;" name="p2_sec2_certificateReq"
                                            value="1">
                                        <span class="label">CERTIFICATE REQUIRED</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 0;">
                        <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                        <table class="nested-table">
                            <tr>
                                <td>
                                    <span class="label">LOCATION: <input type="text" name="p2_sec2_loc"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                                <td>
                                    <span class="label">BUILDING: <input type="text" name="p2_sec2_building"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="label">SCHEDULED ITEM NUMBER: <input type="text"
                                            name="p2_sec2_scheduledItem" class="date-input"
                                            style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>

                                <td style="border: 0;" colspan="2">
                                    <span class="label">other: <input type="text" name="p2_sec2_intrestOther"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">item description: <input type="text" name="p2_sec2_description"
                            class="date-input" style="font-size: 8pt;"></td>
                </tr>
                <tr>
                    <td rowspan="2" class="interest-cell">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec3_Lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec3_LienHolder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec3_LossPayee" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="p2_sec3_otherCheck" value="1">
                                <input type="text" name="p2_sec3_otherCheckField" class="date-input"
                                    style="font-size: 8pt;">
                            </div>
                        </div>
                    </td>
                    <td style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS : </span>
                            <input type="text" name="p2_sec3_nameAddress" class="date-input" style="font-size: 8pt;">
                        </div>
                        <table
                            style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">RANK: </span>
                                        <input type="text" name="p2_sec3_rank" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div>
                                        <span class="label">REFERENCE #:</span>
                                        <input type="text" name="p2_sec3_referenceNo" class="date-input"
                                            style="font-size: 8pt;">
                                    </div>
                                </td>
                                <td style="width: 50%; border: none;">
                                    <div>
                                        <input type="checkbox" style="margin-right: 3px;" name="p2_sec3_certificateReq"
                                            value="1">
                                        <span class="label">CERTIFICATE REQUIRED</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <td style="padding: 0;">
                        <div class="header-cell" style="margin: 5px; ">INTEREST IN ITEM NUMBER</div>
                        <table class="nested-table">
                            <tr>
                                <td>
                                    <span class="label">LOCATION: <input type="text" name="p2_sec3_loc"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                                <td>
                                    <span class="label">BUILDING: <input type="text" name="p2_sec3_building"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <span class="label">SCHEDULED ITEM NUMBER: <input type="text"
                                            name="p2_sec3_scheduledItem" class="date-input"
                                            style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                            <tr>

                                <td style="border: 0;" colspan="2">
                                    <span class="label">other: <input type="text" name="p2_sec3_intrestOther"
                                            class="date-input" style="font-size: 8pt;"></span>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <td colspan="2">item description: <input type="text" name="p2_sec3_description"
                            class="date-input" style="font-size: 8pt;"></td>
                </tr>
            </table>
            <div style="display: flex; margin-top: 10px;">
                <table style="width: 64%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="4">TRANSPORTATION</td>
                    </tr>
                    <tr>
                        <td colspan="4"> Total value to be shipped to this job site at applicant risk</td>
                    </tr>
                    <tr>
                        <td>Amount shipped </td>
                        <td>% for applicants vehicles </td>
                        <td>% by common / Contract Carrier</td>
                        <td>Distance INVOLVED</td>
                    </tr>

                    <tr>
                        <td>$ <input type="text" name="p2_amountShipped" class="date-input" style="font-size: 8pt;">
                        </td>
                        <td>% <input type="text" name="p2_applicatsVehcles" class="date-input"
                                style="font-size: 8pt;"></td>
                        <td><input type="text" name="p2_contractorCarrier" class="date-input"
                                style="font-size: 8pt;"></td>
                        <td><input type="text" name="p2_distanceInvolved" class="date-input" style="font-size: 8pt;">
                        </td>
                    </tr>
                </table>
                <table style="width: 34%; justify-self: end; margin-left: 2%;">
                    <tr>
                        <td style="height: 1px; border: 0; font-weight: 600;" colspan="3">RIGGING
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <textarea rows="5" name="p2_riggingHosting" class="date-input" style="font-size: 8pt;"
                                placeholder="Describe all hosting or operation requiring rigging"></textarea>
                        </td>
                    </tr>
                </table>
            </div>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">REMARKS (ACORD 101, Additional Remarks
                Schedule, may be attached if more space is required)</div>
            <table>
                <tr>
                    <td colspan="6">
                        <textarea rows="5" name="p2_remarks" class="date-input" style="font-size: 8pt;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Attach to accord 125</td>
                </tr>
            </table>

            <div class="page-break"></div>
            <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency ID :
                <input type="text" name="agency_id" class="date-input" style="font-size: 8pt; width: 30%;">
            </p>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Signature</div>
            <table>

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
                    <td colspan="6">Applicable in Kansas Any person who, knowingly and with intent to defraud, presents,
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
                    <td colspan="2">Producere Signature <br> <input type="text" name="p2_producerSignature"
                            class="date-input" style="font-size: 8pt;"></td>
                    <td colspan="2">Producere Name <br> <input type="text" name="p2_producerName"
                            class="date-input" style="font-size: 8pt;"></td>
                    <td colspan="2"> State Producer license # <br> <input type="text" name="p2_producerLicense"
                            class="date-input" style="font-size: 8pt;"></td>

                </tr>
                <tr>
                    <td colspan="3">Applicant Signature <br> <input type="text" name="p2_applicantSignature"
                            class="date-input" style="font-size: 8pt;"></td>
                    <td colspan="1">Date <br> <input type="text" name="p2_applicationdate" class="date-input"
                            style="font-size: 8pt;"></td>
                    <td colspan="2">National Producer # <br> <input type="text" name="p2_nationalProducerNo"
                            class="date-input" style="font-size: 8pt;"></td>

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

            <div class="row mt-12 mt-3 ">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                    <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
                </div>
            </div>

        </div>
    </form>
@endsection
