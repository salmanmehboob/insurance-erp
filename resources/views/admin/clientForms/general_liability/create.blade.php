@extends('admin.layouts.form')
@push('styles')
    <style>
        .acord-logo {
            height: 54pt !important;
            vertical-align: middle;
            margin-right: 5pt;
        }

        /* Base styles for screen viewing and print intent */
        body {
            font-family: 'Arial', sans-serif;
            font-size: 9pt;
            color: #000;
            margin: 0;
            padding: 10px;
            background-color: #f0f0f0;
        }

        .form-container {
            width: 100%;
            max-width: 8.5in;
            min-height: 11in;
            padding: 0.5in;
            box-sizing: border-box;
            background-color: white;
            border: 1px solid #ccc;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 0 auto;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                padding: 5px;
                font-size: 8pt;
            }

            .form-container {
                padding: 0.3in;
                min-height: auto;
            }

            .header-title {
                font-size: 10pt !important;
                margin: 10px 0;
            }

            .acord-logo {
                height: 36pt !important;
            }

            .flex {
                flex-direction: column !important;
            }

            .flex-shrink-0 {
                margin-bottom: 10px;
            }
        }

        @media (max-width: 480px) {
            body {
                font-size: 7pt;
            }

            .form-container {
                padding: 0.2in;
            }

            .header-title {
                font-size: 9pt !important;
            }

            table {
                font-size: 6pt;
            }

            input[type="text"],
            textarea {
                font-size: 7pt !important;
            }
        }

        /* Reusable Form Field Line (Label + Underline Input) */
        .form-field-line {
            display: flex;
            margin-bottom: 0.08in;
            line-height: 1.0;
        }

        .form-field-line label {
            font-size: 8pt;
            color: #333;
            margin-right: 4pt;
            padding-bottom: 0.5pt;
        }

        /* Responsive inputs */
        input[type="text"],
        textarea {
            border: none;
            border-bottom: 1px solid black;
            background: transparent;
            font-size: 8pt;
            padding: 2px;
            box-sizing: border-box;
            width: 100%;
        }

        .address-line-item.city input {
            width: 100%;
            max-width: 80pt;
            flex-grow: 0;
        }

        .address-line-item.state input {
            width: 100%;
            max-width: 30pt;
            flex-grow: 0;
        }

        .address-line-item.zip input {
            width: 100%;
            max-width: 45pt;
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
            vertical-align: middle;
            margin-right: 5pt;
        }

        /* Smallest font for the date label */
        .date-field-label {
            font-size: 6.5pt;
        }

        /* Date input needs to be right-aligned within its fixed width */
        .date-input {
            text-align: right;
            width: 100%;
            max-width: 70pt;
        }

        /* Responsive table styles */
        table {
            border-collapse: collapse;
            width: 100%;
            overflow-x: auto;
            display: table;
        }

        @media (max-width: 768px) {
            .responsive-table {
                display: block;
                overflow-x: auto;
                white-space: nowrap;
            }
        }

        table th,
        table td {
            border: 0.5pt solid black;
            padding: 2pt 3pt;
            text-align: left;
            vertical-align: top;
            font-size: 8pt;
            line-height: 1.2;
            word-wrap: break-word;
        }

        @media (max-width: 480px) {

            table th,
            table td {
                padding: 1pt 2pt;
                font-size: 6pt;
            }
        }

        table th {
            font-weight: normal;
            text-align: center;
            background-color: #f8f8f8;
        }

        /* Footer Section */
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 25pt;
            border-top: 0.5pt solid #ccc;
            font-size: 6pt;
        }

        @media (max-width: 480px) {
            .footer-content {
                flex-direction: column;
                text-align: center;
            }
        }

        .footer-copyright {
            text-align: center;
        }

        .checkboxtd span {
            vertical-align: super;
        }

        .checkboxtd td {
            border: 0;
        }

        /* Flex utilities */
        .flex {
            display: flex;
        }

        .justify-between {
            justify-content: space-between;
        }

        .items-end {
            align-items: flex-end;
        }

        .flex-grow {
            flex-grow: 1;
        }

        .flex-shrink-0 {
            flex-shrink: 0;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .mt-4 {
            margin-top: 1rem;
        }

        /* PRINT MEDIA QUERIES - CRITICAL for accurate printing */
        @media print {
            body {
                background-color: white;
                margin: 0;
                padding: 0;
                display: block;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                font-size: 9pt !important;
            }

            .form-container {
                border: none;
                box-shadow: none;
                margin: 0;
                padding: 0.5in;
                width: 8.5in;
                min-height: 11in;
                max-width: none;
            }

            input[type="text"],
            textarea {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                vertical-align: baseline;
                padding-bottom: 0;
                height: auto;
                min-height: 11pt;
            }

            .page-break {
                page-break-after: always;
            }

            table {
                page-break-inside: avoid;
            }

            table thead {
                display: table-header-group;
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

        /* Button styles */
        .btn {
            display: inline-block;
            padding: 8px 16px;
            margin: 4px;
            border: 1px solid #007bff;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn:hover {
            opacity: 0.8;
        }

        /* Mobile button adjustments */
        @media (max-width: 480px) {
            .btn {
                width: 100%;
                margin: 5px 0;
            }
        }

        /* Textarea specific styles */
        textarea {
            min-height: 40px;
            resize: vertical;
            font-family: Arial, sans-serif;
        }

        /* Large textarea for remarks */
        .large-textarea {
            min-height: 150px;
        }
    </style>
@endpush
@section('content')
    <div class="form-container">

        <form action="{{ route('store-general-liability') }}" method="POST" class=" mt-4">
            @csrf

            <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">
            <input type="hidden" name="created_by" value="{{ auth()->user()->id }}">

            <div class="flex justify-between items-end">
                <div style="font-size: 9pt;" class="flex-shrink-0">
                    <img src="{{ asset('backend/img/acord-logo.png') }}" alt="ACORD Logo" class="acord-logo">
                </div>
                <div class="flex-grow header-title">
                    COMMERCIAL GENERAL LIABILITY SECTION
                </div>
                <div class="text-right flex-shrink-0" style="border:1px solid #000; padding: 1px 5px;">
                    <div class="text-center">
                        <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                        <p><input type="text" name="invoice_date" class="date-input" placeholder="MM/DD/YYYY"
                                style="font-size: 8pt;"></p>
                    </div>
                </div>
            </div>

            <table class="responsive-table">
                <tr>
                    <td colspan="2">Agency Name <br> <input type="text" name="agency_name" placeholder="Agency Name">
                    </td>
                    <td>Carrier <br> <input type="text" name="carrier" placeholder="Carrier"></td>
                    <td>NAIC Code <br> <input type="text" name="naic_code" placeholder="NAIC Code"></td>
                </tr>
                <tr>
                    <td>Policy Number <br> <input type="text" name="policy_number" placeholder="Policy Number"></td>
                    <td>Effective Date <br> <input type="text" name="effective_date" placeholder="MM/DD/YYYY"></td>
                    <td>Expiration Date <br> <input type="text" name="expiration_date" placeholder="MM/DD/YYYY"></td>
                    <td>Named Insured <br> <input type="text" name="insured_name" placeholder="Named Insured"></td>
                </tr>
                <tr>
                    <td colspan="4"><b>IMPORTANT - If CLAIMS MADE</b> is checked in the COVERAGE / LIMITS section below,
                        this is an application for a claims made policy.<br> Read all provisions of the policy carefully.
                    </td>
                </tr>
            </table>

            <table class="responsive-table" style="width: 100%; margin-top: 5px;">
                <tr>
                    <td style="border: 0; padding-left: 0;">
                        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">COVERAGES</div>
                    </td>
                    <td style="border: 0; padding-left: 0;" colspan="3">
                        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">LIMITS</div>
                    </td>
                </tr>
                <tr>
                    <td rowspan="3">
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="coverage_general" value="1">
                                <label>COMMERCIAL GENERAL LIABILITY</label>
                            </div>
                            <div class="checkbox-item" style="margin-left: 20px;">
                                <input type="checkbox" name="coverage_claim" value="1">
                                <label>CLAIMS MADE </label>
                                <input type="checkbox" style="margin-left: 10px;" name="coverage_occurrence" value="1">
                                <label>OCCURRENCE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="coverage_occurrence_protective" value="1">
                                <label>OWNER'S & CONTRACTOR'S PROTECTIVE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox">
                                <input type="text" name="coverage_occurrence_other" placeholder="Other description"
                                    style="margin-left: 5px;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="title">GENERAL AGGREGATE</div>
                    </td>
                    <td>$<input type="text" name="coverage_general_limit" style="width: 60%;"></td>
                    <td style="text-align: center;">PREMIUMS </td>
                </tr>
                <tr>
                    <td>
                        <div class="title">LIMIT APPLIES PER:
                            <div class="checkbox-item">
                                <input type="checkbox" name="coverage_general_policy" value="1">
                                <label>POLICY </label>
                                <input type="checkbox" name="coverage_general_location" value="1"
                                    style="margin-left: 10px;">
                                <label>LOCATION</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="coverage_general_project" value="1">
                                <label>PROJECT </label>
                                <input type="checkbox" name="coverage_general_other" value="1"
                                    style="margin-left: 10px;">
                                <label>OTHER</label>
                            </div>
                        </div>
                    </td>
                    <td></td>
                    <td>PREMISES/OPERATIONS <input style="width: 50%" type="text" name="coverage_premium"></td>
                </tr>
                <tr>
                    <td>PRODUCTS & COMPLETED OPERATIONS AGGREGATE</td>
                    <td>$<input style="width: 50%" type="text" name="coverage_product_aggregate_limit"></td>
                    <td rowspan="2">PRODUCTS <input style="width: 50%" type="text"
                            name="coverage_premium_product"></td>
                </tr>
                <tr>
                    <td rowspan="6">
                        <div class="title">DEDUCTIBLE</div>
                        <table class="inner-deductible">
                            <tr>
                                <td><input type="checkbox" name="deductible_property_damage" value="1"> PROPERTY
                                    DAMAGE</td>
                                <td>$<input type="text" style="width: 50%" name="deductible_property_damage_cost">
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="deductible_body_injury" value="1"> BODILY INJURY
                                </td>
                                <td>$<input type="text" style="width: 50%" name="deductible_body_injury_cost"></td>
                                <td><input type="checkbox" name="deductible_per_claim" value="1"> PER CLAIM</td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="deductible_other" value="1"></td>
                                <td>$<input type="text" style="width: 50%" name="deductible_other_cost"></td>
                                <td><input type="checkbox" name="deductible_per_occurrence" value="1"> PER
                                    OCCURRENCE</td>
                            </tr>
                        </table>
                    </td>
                    <td>PERSONAL & ADVERTISING INJURY</td>
                    <td>$<input type="text" name="deductible_personal_injury" style="width: 60%;"></td>
                </tr>
                <tr>
                    <td>EACH OCCURRENCE</td>
                    <td>$<input type="text" name="deductible_each_occurrence" style="width: 60%;"></td>
                    <td rowspan="2">OTHER <input type="text" name="coverage_premium_other" style="width: 50%;">
                    </td>
                </tr>
                <tr>
                    <td>DAMAGE TO RENTED PREMISES (each occurrence)</td>
                    <td>$<input type="text" name="deductible_damage_rented" style="width: 60%;"></td>
                </tr>
                <tr>
                    <td>MEDICAL EXPENSE (Any one person)</td>
                    <td>$<input type="text" name="deductible_expense" style="width: 60%;"></td>
                    <td rowspan="2">TOTAL <input type="text" name="coverage_premium_total" style="width: 50%;">
                    </td>
                </tr>
                <tr>
                    <td>EMPLOYEE BENEFITS</td>
                    <td>$<input type="text" name="deductible_benefits" style="width: 60%;"></td>
                </tr>
                <tr>
                    <td><input type="text" name="deductible_other_benefits" placeholder="Additional coverage"></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td colspan="4">OTHER COVERAGES, RESTRICTIONS AND/OR ENDORSEMENTS (For hired/non-owned auto
                        coverages attach the applicable state Business Auto Section, ACORD 137)
                        <br>
                        <textarea name="other_coverage" rows="3" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table class="sixcoltab">
                            <tr>
                                <td>1. UM/UIM COVERAGE</td>
                                <td><input type="radio" name="um_coverage" value="1"> IS</td>
                                <td><input type="radio" name="um_coverage" value="0"> IS NOT AVAILABLE</td>
                                <td>2. MEDICAL PAYMENT COVERAGE</td>
                                <td><input type="radio" name="medical_coverage" value="1"> IS</td>
                                <td><input type="radio" name="medical_coverage" value="0"> IS NOT AVAILABLE</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">SCHEDULE OF HAZARDS (ACORD 211, Schedule of
                Hazards, may be attached if more space is required)</div>

            <table class="responsive-table" cellspacing="0">
                <tbody>
                    <tr>
                        <th rowspan="2">LOC #</th>
                        <th rowspan="2">HAZ #</th>
                        <th rowspan="2">CLASS CODE</th>
                        <th rowspan="2">PREMIUM BASIS</th>
                        <th rowspan="2">EXPOSURE</th>
                        <th rowspan="2">TERR</th>
                        <th colspan="2">RATE</th>
                        <th colspan="2">PREMIUM</th>
                    </tr>
                    <tr>
                        <th>PREM / OPS</th>
                        <th>PRODUCTS</th>
                        <th>PREM / OPS</th>
                        <th>PRODUCTS</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="loc_one" style="width: 100%;"></td>
                        <td><input type="text" name="haze_one" style="width: 100%;"></td>
                        <td><input type="text" name="class_code_one" style="width: 100%;"></td>
                        <td><input type="text" name="premium_basis_one" style="width: 100%;"></td>
                        <td><input type="text" name="exposure_one" style="width: 100%;"></td>
                        <td><input type="text" name="terr_one" style="width: 100%;"></td>
                        <td><input type="text" name="ops_rate_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_rate_one" style="width: 100%;"></td>
                        <td><input type="text" name="ops_premium_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_premium_one" style="width: 100%;"></td>
                    </tr>
                    <tr style="height:35pt">
                        <td colspan="10">
                            CLASSIFICATION DESCRIPTION
                            <br>
                            <textarea name="classification_one" rows="2" style="width: 100%; margin-top: 3px;"></textarea>
                        </td>
                    </tr>
                    <!-- Repeat for additional rows -->
                    <tr>
                        <th rowspan="2">LOC #</th>
                        <th rowspan="2">HAZ #</th>
                        <th rowspan="2">CLASS CODE</th>
                        <th rowspan="2">PREMIUM BASIS</th>
                        <th rowspan="2">EXPOSURE</th>
                        <th rowspan="2">TERR</th>
                        <th colspan="2">RATE</th>
                        <th colspan="2">PREMIUM</th>
                    </tr>
                    <tr>
                        <th>PREM / OPS</th>
                        <th>PRODUCTS</th>
                        <th>PREM / OPS</th>
                        <th>PRODUCTS</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="loc_two" style="width: 100%;"></td>
                        <td><input type="text" name="haze_two" style="width: 100%;"></td>
                        <td><input type="text" name="class_code_two" style="width: 100%;"></td>
                        <td><input type="text" name="premium_basis_two" style="width: 100%;"></td>
                        <td><input type="text" name="exposure_two" style="width: 100%;"></td>
                        <td><input type="text" name="terr_two" style="width: 100%;"></td>
                        <td><input type="text" name="ops_rate_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_rate_two" style="width: 100%;"></td>
                        <td><input type="text" name="ops_premium_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_premium_two" style="width: 100%;"></td>
                    </tr>
                    <tr style="height:35pt">
                        <td colspan="10">
                            CLASSIFICATION DESCRIPTION
                            <br>
                            <textarea name="classification_two" rows="2" style="width: 100%; margin-top: 3px;"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th rowspan="2">LOC #</th>
                        <th rowspan="2">HAZ #</th>
                        <th rowspan="2">CLASS CODE</th>
                        <th rowspan="2">PREMIUM BASIS</th>
                        <th rowspan="2">EXPOSURE</th>
                        <th rowspan="2">TERR</th>
                        <th colspan="2">RATE</th>
                        <th colspan="2">PREMIUM</th>
                    </tr>
                    <tr>
                        <th>PREM / OPS</th>
                        <th>PRODUCTS</th>
                        <th>PREM / OPS</th>
                        <th>PRODUCTS</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="loc_three" style="width: 100%;"></td>
                        <td><input type="text" name="haze_three" style="width: 100%;"></td>
                        <td><input type="text" name="class_code_three" style="width: 100%;"></td>
                        <td><input type="text" name="premium_basis_three" style="width: 100%;"></td>
                        <td><input type="text" name="exposure_three" style="width: 100%;"></td>
                        <td><input type="text" name="terr_three" style="width: 100%;"></td>
                        <td><input type="text" name="ops_rate_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_rate_three" style="width: 100%;"></td>
                        <td><input type="text" name="ops_premium_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_premium_three" style="width: 100%;"></td>
                    </tr>
                    <tr style="height:35pt">
                        <td colspan="10">
                            CLASSIFICATION DESCRIPTION
                            <br>
                            <textarea name="classification_three" rows="2" style="width: 100%; margin-top: 3px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">RATING AND PREMIUM BASIS (S) GROSS SALES - PER $1,000/SALES</td>
                        <td colspan="2">(P) PAYROLL - PER $1,000/PAY (A) AREA - PER 1,000/SQ FT</td>
                        <td colspan="3">(C) TOTAL COST - PER $1,000/COST (M) ADMISSIONS - PER 1,000/ADM</td>
                        <td colspan="2">(U) UNIT - PER UNIT (T) OTHER</td>
                    </tr>
                </tbody>
            </table>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">CLAIMS MADE (Explain all "Yes" responses)
            </div>
            <table class="responsive-table" cellspacing="0">
                <tbody>
                    <tr>
                        <td>EXPLAIN ALL 'YES" RESPONSES</td>
                        <td><input type="radio" name="claim_made" value="1"> Yes <input type="radio"
                                name="claim_made" value="0"> No</td>
                    </tr>
                    <tr>
                        <td colspan="2">1. PROPOSED RETROACTIVE DATE: <input type="text"
                                name="claim_made_proposed_date" style="margin-left: 10px; width: 60%;"></td>
                    </tr>
                    <tr>
                        <td colspan="2">2. ENTRY DATE INTO UNINTERRUPTED CLAIMS MADE COVERAGE: <input type="text"
                                name="claim_made_entry_date" style="margin-left: 10px; width: 60%;"></td>
                    </tr>
                    <tr>
                        <td>3. HAS ANY PRODUCT, WORK, ACCIDENT, OR LOCATION BEEN EXCLUDED, UNINSURED OR SELF-INSURED FROM
                            ANY PREVIOUS COVERAGE?
                            <textarea name="claim_made_previous_coverage" rows="3" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4. WAS TAIL COVERAGE PURCHASED UNDER ANY PREVIOUS POLICY?
                            <textarea name="claim_made_previous_policy" rows="3" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                </tbody>
            </table>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">EMPLOYEE BENEFITS LIABILITY</div>
            <table class="responsive-table" cellspacing="0">
                <tbody>
                    <tr>
                        <td>
                            <span>1.</span>
                            <span>DEDUCTIBLE PER CLAIM:</span>
                            <span style="margin-left: 20px;">$</span>
                            <input type="text" name="employee_deductible" style="width: 50%;">
                        </td>
                        <td>
                            <span>3.</span>
                            <span>NUMBER OF EMPLOYEES COVERED BY EMPLOYEE BENEFITS PLANS:</span>
                            <input type="text" name="employee_number" style="width: 30%;">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span>2.</span>
                            <span>NUMBER OF EMPLOYEES:</span>
                            <input type="text" name="employee_covered" style="width: 50%;">
                        </td>
                        <td>
                            <span>4.</span>
                            <span>RETROACTIVE DATE:</span>
                            <input type="text" name="employee_retroactive_date" style="width: 50%;">
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="page-break"></div>
            <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency Customer ID: <input
                    type="text" name="agency_customer_id" placeholder="Agency customer ID" style="width: 50%"></p>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">CONTRACTORS</div>
            <table class="responsive-table" cellspacing="0">
                <tbody>
                    <tr>
                        <td>EXPLAIN ALL "YES" RESPONSES (For all past or present operations)</td>
                        <td style="width: 11%;">Y / N</td>
                    </tr>
                    <tr>
                        <td>1. DOES APPLICANT DRAW PLANS, DESIGNS, OR SPECIFICATIONS FOR OTHERS?
                            <textarea name="contractor_draw_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="contractor_draw" value="1"> Y
                            <input type="radio" name="contractor_draw" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>2. DO ANY OPERATIONS INCLUDE BLASTING OR UTILIZE OR STORE EXPLOSIVE MATERIAL?
                            <textarea name="contractor_operation_material_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="contractor_operation_material" value="1"> Y
                            <input type="radio" name="contractor_operation_material" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>3. DO ANY OPERATIONS INCLUDE EXCAVATION, TUNNELING, UNDERGROUND WORK OR EARTH MOVING?
                            <textarea name="contractor_operation_moving_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="contractor_operation_moving" value="1"> Y
                            <input type="radio" name="contractor_operation_moving" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>4. DO YOUR SUBCONTRACTORS CARRY COVERAGES OR LIMITS LESS THAN YOURS?
                            <textarea name="subcontractor_coverage_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="subcontractor_coverage" value="1"> Y
                            <input type="radio" name="subcontractor_coverage" value="0"> N
                            <br>
                        </td>
                    </tr>
                    <tr>
                        <td>5. ARE SUBCONTRACTORS ALLOWED TO WORK WITHOUT PROVIDING YOU WITH A CERTIFICATE OF INSURANCE?
                            <textarea name="contractor_sub_contractor_insurance_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="contractor_sub_contractor_insurance" value="1"> Y
                            <input type="radio" name="contractor_sub_contractor_insurance" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>6. DOES APPLICANT LEASE EQUIPMENT TO OTHERS WITH OR WITHOUT OPERATORS?
                            <textarea name="contractor_lease_equipment_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="contractor_lease_equipment" value="1"> Y
                            <input type="radio" name="contractor_lease_equipment" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding: 0;">
                            <table class="responsive-table">
                                <tr>
                                    <td style="border-bottom: 0;">DESCRIBE THE TYPE OF WORK SUBCONTRACTED</td>
                                    <td>$ paid to sub Contractors</td>
                                    <td>% of work subcontracted</td>
                                    <td>#Full Time staff</td>
                                    <td>#Part Time staff</td>
                                </tr>
                                <tr>
                                    <td style="height: 50px; border-top: 0;">
                                        <textarea name="sub_contractor_type" rows="3" style="width: 100%;"></textarea>
                                    </td>
                                    <td style="border-top: 0;">
                                        <input type="text" name="sub_contractor_paid" style="width: 100%;">
                                    </td>
                                    <td style="border-top: 0;">
                                        <input type="text" name="sub_contractor_percentage" style="width: 100%;">
                                    </td>
                                    <td style="border-top: 0;">
                                        <input type="text" name="sub_contractor_full_time" style="width: 100%;">
                                    </td>
                                    <td style="border-top: 0;">
                                        <input type="text" name="sub_contractor_part_time" style="width: 100%;">
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>

            <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">PRODUCTS / COMPLETED OPERATIONS</div>
            <table class="responsive-table" cellspacing="0">
                <tbody>
                    <tr>
                        <td>PRODUCTS</td>
                        <td>ANNUAL GROSS SALES</td>
                        <td># of Units</td>
                        <td>Time in Market</td>
                        <td>Expected Life</td>
                        <td>Intended Use</td>
                        <td>Principal Components</td>
                    </tr>
                    <tr>
                        <td><input type="text" name="product_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_salary_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_unit_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_time_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_life_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_insured_one" style="width: 100%;"></td>
                        <td><input type="text" name="product_component_one" style="width: 100%;"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="product_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_salary_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_unit_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_time_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_life_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_insured_two" style="width: 100%;"></td>
                        <td><input type="text" name="product_component_two" style="width: 100%;"></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="product_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_salary_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_unit_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_time_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_life_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_insured_three" style="width: 100%;"></td>
                        <td><input type="text" name="product_component_three" style="width: 100%;"></td>
                    </tr>
                </tbody>
            </table>

            <table class="responsive-table">
                <tbody>
                    <tr>
                        <th>EXPLAIN ALL "YES" RESPONSES (For all past or present products or operations) PLEASE ATTACH
                            LITERATURE, BROCHURES, LABELS, WARNINGS, ETC.</th>
                        <th style="width: 11%; ">Y / N</th>
                    </tr>
                    <tr>
                        <td>1. DOES APPLICANT INSTALL, SERVICE OR DEMONSTRATE PRODUCTS?
                            <textarea name="product_install_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_install" value="1"> Y
                            <input type="radio" name="product_install" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>2. FOREIGN PRODUCTS SOLD, DISTRIBUTED, USED AS COMPONENTS? (If "YES", attach ACORD 815)
                            <textarea name="product_sold_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_sold" value="1"> Y
                            <input type="radio" name="product_sold" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>3. RESEARCH AND DEVELOPMENT CONDUCTED OR NEW PRODUCTS PLANNED?
                            <textarea name="product_research_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_research" value="1"> Y
                            <input type="radio" name="product_research" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>4. GUARANTEES, WARRANTIES, HOLD HARMLESS AGREEMENTS?
                            <textarea name="product_warranty_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_warranty" value="1"> Y
                            <input type="radio" name="product_warranty" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>5. PRODUCTS RELATED TO AIRCRAFT/SPACE INDUSTRY?
                            <textarea name="product_aircraft_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_aircraft" value="1"> Y
                            <input type="radio" name="product_aircraft" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>6. PRODUCTS RECALLED, DISCONTINUED, CHANGED?
                            <textarea name="product_recall_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_recall" value="1"> Y
                            <input type="radio" name="product_recall" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>7. PRODUCTS OF OTHERS SOLD OR RE-PACKAGED UNDER APPLICANT LABEL?
                            <textarea name="product_other_sold_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_other_sold" value="1"> Y
                            <input type="radio" name="product_other_sold" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>8. PRODUCTS UNDER LABEL OF OTHERS?
                            <textarea name="product_label_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_label" value="1"> Y
                            <input type="radio" name="product_label" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>9. VENDORS COVERAGE REQUIRED?
                            <textarea name="product_vendor_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_vendor" value="1"> Y
                            <input type="radio" name="product_vendor" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>10. DOES ANY NAMED INSURED SELL TO OTHER NAMED INSUREDS?
                            <textarea name="product_insured_detail" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                            <input type="radio" name="product_insured" value="1"> Y
                            <input type="radio" name="product_insured" value="0"> N
                        </td>
                    </tr>
                </tbody>
            </table>

            <table class="form-table responsive-table" style="margin-top: 10px;">
                <tr>
                    <td style="font-weight: 600; border: 0;">
                        <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">Additional Interest</div>
                    </td>
                    <td style="font-weight: 600; border: 0;" colspan="7">
                        <input type="checkbox" name="accord_45_attached"> Accord 45 attached for additional names
                    </td>
                </tr>
                <tr>
                    <td class="interest-cell" rowspan="3">
                        <div class="title">INTEREST</div>
                        <div class="interest-options">
                            <div class="checkbox-item">
                                <input type="checkbox" name="interest_additional" value="1">
                                <label>ADDITIONAL INSURED</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="interest_employee" value="1">
                                <label>EMPLOYEE AS LESSOR</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="interest_lender" value="1">
                                <label>LENDER'S LOSS PAYABLE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="interest_holder" value="1">
                                <label>LIENHOLDER</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="interest_loss" value="1">
                                <label>LOSS PAYEE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="checkbox" name="interest_mortgage" value="1">
                                <label>MORTGAGE</label>
                            </div>
                            <div class="checkbox-item">
                                <input type="text" name="interest_other" placeholder="Other"
                                    style="width: 60%; margin-left: 5px;">
                            </div>
                        </div>
                    </td>
                    <td colspan="4" style="height: 80px; position: relative;">
                        <div style="display: flex; align-items: flex-end;">
                            <span class="label" style="font-weight: bold;">NAME AND ADDRESS</span>
                            <div style="flex-grow: 1; border-bottom: 1px solid black;"> <input placeholder="Name"
                                    name="interest_name" style="width: 100%; margin-top: 5px;"></div>
                        </div>
                        <textarea placeholder="Address" name="interest_address" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        <table
                            style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                            <tr>
                                <td style="width: 25%; border: none;">
                                    <div style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                        <span class="label" style="font-weight: bold;">RANK:</span>
                                        <input type="text" name="interest_rank" style="width: 30px;">
                                    </div>
                                </td>
                                <td style="width: 25%; border: none;">
                                    <div style="display: flex; align-items: center; justify-content: flex-end;">
                                        <input type="radio" name="interest_type" value="evidence">
                                        <span class="label" style="font-weight: bold; margin-right: 10px">EVIDENCE</span>


                                        <input type="radio" name="interest_type" value="certificate">
                                        <span class="label" style="font-weight: bold;">CERTIFICATE</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <div style="position: absolute; bottom: 5px; width: 95%;">
                            <div class="field-row" style="margin-top: 0;">
                                <span class="label" style="font-weight: bold;">REFERENCE / LOAN #:</span>
                                <input type="text" name="interest_reference" style="width: 100%; margin-top: 5px;">
                            </div>
                        </div>
                    </td>
                    <td colspan="2" rowspan="2" style="padding: 0;">
                        <div class="header-cell" style="margin: 5px;">INTEREST IN ITEM NUMBER</div>
                        <table class="nested-table">
                            <tr>
                                <td>
                                    <span class="label">LOCATION:</span>
                                    <input type="text" name="interest_location" style="width: 60%;">
                                </td>
                                <td>
                                    <span class="label">BUILDING:</span>
                                    <input type="text" name="interest_building" style="width: 60%;">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span class="label">ITEM CLASS:</span>
                                    <input type="text" name="interest_item_class" style="width: 60%;">
                                </td>
                                <td>
                                    <span class="label">ITEM:</span>
                                    <input type="text" name="interest_item" style="width: 60%;">
                                </td>
                            </tr>
                        </table>
                        <div class="field-row" style="margin-top: 5px;">
                            <span class="label" style="margin: 5px;">ITEM DESCRIPTION</span>
                            <input type="text" name="interest_item_description" style="margin: 5px; width: 80%;">
                        </div>
                    </td>
                </tr>
            </table>

            <div class="page-break"></div>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">General Information</div>

            <table class="responsive-table">
                <tbody>
                    <tr>
                        <th>EXPLAIN ALL "YES" RESPONSES (For all past or present operations)</th>
                        <th>Y/N</th>
                    </tr>
                    <tr>
                        <td>1. ANY MEDICAL FACILITIES PROVIDED OR MEDICAL PROFESSIONALS EMPLOYED OR CONTRACTED?
                            <textarea name="information_q_one" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>2. ANY EXPOSURE TO RADIOACTIVE/NUCLEAR MATERIALS?
                            <textarea name="information_q_two" rows="2" maxlength="1" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3. DO/HAVE PAST, PRESENT OR DISCONTINUED OPERATIONS INVOLVE STORING, TREATING, DISCHARGING,
                            APPLYING, DISPOSING, OR TRANSPORTING OF HAZARDOUS MATERIAL? (e.g., landfills, wastes, fuel
                            tanks, etc)
                            <textarea name="information_q_three" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>4. ANY OPERATIONS SOLD, ACQUIRED, OR DISCONTINUED IN LAST FIVE (5) YEARS?
                            <textarea name="information_q_four" rows="2" maxlength="1" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>5. DO YOU RENT OR LOAN EQUIPMENT TO OTHERS?
                            <textarea name="information_q_five" rows="2" maxlength="1" style="width: 100%; margin-top: 5px;"></textarea>
                            <table style="width: 90%; place-self: center; margin-top: 10px;">
                                <tr>
                                    <td style="font-size: 9px;"><b>EQUIPMENT</b></td>
                                    <td style="font-size: 9px;" colspan="2"><b>TYPE OF EQUIPMENT</b></td>
                                    <td style="font-size: 9px;"><b>INSTRUCTION GIVEN (Y/N)</b></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="information_equipment_one" style="width: 100%;"></td>
                                    <td><input type="checkbox" name="information_equipment_type_one" value="SMALL TOOLS">
                                        SMALL TOOLS</td>
                                    <td><input type="checkbox" name="information_equipment_type_one"
                                            value="LARGE EQUIPMENT"> LARGE EQUIPMENT</td>
                                    <td><input type="text" name="information_equipment_instruction_one"
                                            style="width: 100%;"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="information_equipment_two" style="width: 100%;"></td>
                                    <td><input type="checkbox" name="information_equipment_type_two" value="OTHER TYPE">
                                        OTHER TYPE</td>
                                    <td colspan="2"><input type="text" name="information_equipment_instruction_two"
                                            style="width: 100%;"></td>
                                </tr>
                            </table>
                        </td>
                        <td> </td>
                    </tr>
                    <tr>
                        <td>6. ANY WATERCRAFT, DOCKS, FLOATS OWNED, HIRED OR LEASED?
                            <textarea name="information_q_six" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>7. ANY PARKING FACILITIES OWNED/RENTED?
                            <textarea name="information_q_seven" rows="2" maxlength="1" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>8. IS A FEE CHARGED FOR PARKING?
                            <textarea name="information_q_eight" rows="2" maxlength="1" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>9. RECREATION FACILITIES PROVIDED?
                            <textarea name="information_q_nine" rows="2" maxlength="1" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>10. ARE THERE ANY LODGING OPERATIONS INCLUDING APARTMENTS? (If "YES", answer the following):
                            <table style="width: 90%; place-self: center; margin-top: 10px;">
                                <tr>
                                    <td style="font-size: 9px;"><b># APTS</b></td>
                                    <td style="font-size: 9px;"><b>TOTAL APT AREA</b></td>
                                    <td style="font-size: 9px;"><b>DESCRIBE OTHER LODGING OPERATIONS</b></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="information_q_apt" maxlength="5"
                                            style="width: 100%;"></td>
                                    <td><input type="text" name="information_q_apt_area" maxlength="5"
                                            style="width: 80%;"> Sq.ft</td>
                                    <td>
                                        <textarea name="information_q_apt_description" rows="2" style="width: 100%;"></textarea>
                                    </td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <input type="radio" name="information_q_ten" value="1"> Y
                            <input type="radio" name="information_q_ten" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>11. IS THERE A SWIMMING POOL ON PREMISES? (Check all that apply)
                            <table style="margin-top: 10px;">
                                <tr>
                                    <td style="border: 0;"><input type="checkbox" name="information_approved_fence">
                                        APPROVED FENCE</td>
                                    <td style="border: 0;"><input type="checkbox" name="information_limited_access">
                                        LIMITED ACCESS</td>
                                    <td style="border: 0;"><input type="checkbox" name="information_diving_board"> DIVING
                                        BOARD</td>
                                    <td style="border: 0;"><input type="checkbox" name="information_slide"> SLIDE</td>
                                </tr>
                                <tr>
                                    <td style="border: 0;"><input type="checkbox" name="information_above_ground"> ABOVE
                                        GROUND</td>
                                    <td style="border: 0;"><input type="checkbox" name="information_in_ground"> IN GROUND
                                    </td>
                                    <td style="border: 0;"><input type="checkbox" name="information_life_guard"> LIFE
                                        GUARD</td>
                                    <td style="border: 0;"></td>
                                </tr>
                            </table>
                        </td>
                        <td>
                            <input type="radio" name="information_q_eleven" value="1"> Y
                            <input type="radio" name="information_q_eleven" value="0"> N
                        </td>
                    </tr>
                    <tr>
                        <td>12. ARE SOCIAL EVENTS SPONSORED?
                            <textarea name="information_q_twelve" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>13. ARE ATHLETIC TEAMS SPONSORED?
                            <textarea name="information_q_thirteen" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                            <div style="display: flex; margin-top: 10px;">
                                <table style="width: 100%; margin-right: 20px;">
                                    <tr>
                                        <td style="font-size: 9px;"><b>TYPE OF SPORT</b></td>
                                        <td style="font-size: 9px;"><b>CONTACT SPORT (Y/N)</b></td>
                                        <td style="font-size: 9px;"><b>AGE GROUP</b><br>
                                            13-18<br>
                                            12 & under <br>
                                            over 18
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="information_sport_type" maxlength="5"
                                                style="width: 100%;"></td>
                                        <td><input type="text" name="information_sport_contact" maxlength="5"
                                                style="width: 100%;"></td>
                                        <td><input type="text" name="information_sport_age" maxlength="5"
                                                style="width: 100%;"></td>
                                    </tr>
                                </table>
                            </div>
                            <textarea name="information_sport_sponsorship" maxlength="5" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td>
                        </td>
                    </tr>
                    <tr>
                        <td>14. ARE STRUCTURAL ALTERATIONS CONTEMPLATED?
                            <textarea name="information_fourteen" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td>15. ANY DEMOLITION EXPOSURE CONTEMPLATED?
                            <textarea name="information_fifteen" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td>16. HAS APPLICANT BEEN ACTIVE IN OR IS CURRENTLY ACTIVE IN JOINT VENTURES?
                            <textarea name="information_sixteen" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td>17. DO YOU LEASE EMPLOYEES TO OR FROM OTHER EMPLOYERS?
                            <textarea name="information_seventeen" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                            <div style="display: flex;">
                                <table style="width: 48%; margin-right: 20px;">
                                    <tr>
                                        <td style="font-size: 9px;"> <b>LEASE TO</b></td>
                                        <td style="width: 80px; font-size: 9px;"><b>WORKERS COMPENSATION COVERAGE CARRIED
                                                (Y/N)</b></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="information_lease_to_one" style="width: 100%;"
                                                placeholder="Lease to "></td>
                                        <td><input type="text" name="information_lease_to_one_coverage"
                                                style="width: 100%;" placeholder="Coverage"></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="information_lease_to_two" style="width: 100%;"
                                                placeholder="Lease to "></td>
                                        <td><input type="text" name="information_lease_to_two_coverage"
                                                style="width: 100%;" placeholder="Coverage"></td>
                                    </tr>
                                </table>
                                <table style="width: 48%;">
                                    <tr>
                                        <td style="font-size: 9px;"><b>LEASE FROM</b></td>
                                        <td style="width: 80px; font-size: 9px;"><b>WORKERS COMPENSATION COVERAGE CARRIED
                                                (Y/N)</b></td>
                                    </tr>
                                    <tr>
                                        <td><input type="text" name="information_lease_from_one" style="width: 100%;"
                                                placeholder="Lease from "></td>
                                        <td><input type="text" name="information_lease_from_one_coverage"
                                                style="width: 100%;" placeholder="Coverage"></td>
                                    </tr>

                                    <tr>
                                        <td><input type="text" name="information_lease_from_two" style="width: 100%;"
                                                placeholder="Lease from "></td>
                                        <td><input type="text" name="information_lease_from_two_coverage"
                                                style="width: 100%;" placeholder="Coverage"></td>
                                    </tr>
                                </table>
                            </div>

                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>18. IS THERE A LABOR INTERCHANGE WITH ANY OTHER BUSINESS OR SUBSIDIARIES?
                            <textarea name="information_eighteen" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td>19. ARE DAY CARE FACILITIES OPERATED OR CONTROLLED?
                            <textarea name="information_nineteen" rows="2" maxlength="1" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td>20. HAVE ANY CRIMES OCCURRED OR BEEN ATTEMPTED ON YOUR PREMISES WITHIN THE LAST THREE (3) YEARS?
                            <textarea maxlength="1" name="information_twenty" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td>21. IS THERE A FORMAL, WRITTEN SAFETY AND SECURITY POLICY IN EFFECT?
                            <textarea name="information_twenty_one" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                    <tr>
                        <td>22. DOES THE BUSINESSES' PROMOTIONAL LITERATURE MAKE ANY REPRESENTATIONS ABOUT THE SAFETY OR
                            SECURITY OF THE PREMISES?
                            <textarea name="information_twenty_two" maxlength="1" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                        </td>
                        <td><br><br><br></td>
                    </tr>
                </tbody>
            </table>

            <!-- <div class="footer-content">
                            <div class="flex-shrink-0" style="font-weight: bold; font-size: 9px;">
                                ACORD 38 (2007/01)
                            </div>
                            <div class="footer-copyright" style=" font-weight: bold; font-size: 9px;">
                                &copy; ACORD CORPORATION 1996-2007. All rights reserved.
                            </div>
                        </div>
                        <p style="text-align: center; font-weight: bold; font-size: 9px; margin-top: 10px;">The ACORD name and logo are
                            registered marks of ACORD</p> -->
            <div class="page-break"></div>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Remarks </div>
            <table>
                <tr>
                    <td colspan="6">
                        <textarea name="remarks" rows="4" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Signature</div>
            <table>

                <tr>
                    <td colspan="6">
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in AL, AR, DC, LA, MD, NM, RI andA¥gperson
                            who knowingly (or willfully)* presents a false or fraudulent claim for payment of a loss or

                            benefit or knowingly (or willfully)“ presents false information in an application for insurance
                            is guilty of a crime and may be subject to fines and confinement in prison. *Applies in MD Only.
                        </p>
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in COJt is unlawful to knowingly provide
                            false, incomplete, or misleading facts or information to an insurance company for the purpose of
                            defrauding or attempting to defraud the company. Penalties may include imprisonment, fines,
                            denial of insurance and civil damages. Any insurance company or agent of an insurance company
                            who knowingly provides false, incomplete, or misleading facts or information to a policyholder
                            or claimant for the purpose of defrauding or attempting to defraud the policyholder or claimant
                            with regard to a settlement or award payable from insurance proceeds shall be reported to the
                            Colorado Division of Insurance within the Department of Regulatory Agencies.

                            Applicable in FL and Ol€tny person who knowingly and with intent to injure, defraud, or deceive
                            any insurer files a statement of claim or an application containing any false, incomplete, or
                            misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.</p>
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in KS Any person who, knowingly and with
                            intent to defraud, presents, causes to be presented or prepares with knowledge or belief that it
                            will be presented to or by an insurer, purported insurer, broker or any agent thereof, any
                            written, electronic, electronic impulse, facsimile, magnetic, oral, or telephonic communication
                            or statement as part of, or in support of, an application for the issuance of, or the rating of
                            an insurance policy for personal or commercial insurance, or a claim for payment or other
                            benefit pursuant to an insurance policy for commercial or personal insurance which such person
                            knows to contain materially false information concerning any fact material thereto; or conceals,
                            for the purpose of misleading, information concerning any fact material thereto commits a
                            fraudulent insurance act.</p>
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in KY, NY, OH and P iy person who knowingly
                            and with intent to defraud any insurance company or other person files an application for
                            insurance or statement of claim containing any materially false information or conceals for the
                            purpose of misleading, information concerning any fact material thereto commits a fraudulent
                            insurance act, which is a crime and subjects such person to criminal and civil penalties (not to
                            exceed five thousand dollars and the stated value of the claim for each such violation)*.
                            *Applies in NY Only.</p>
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in ME, TN, VA and WIAis a crime to
                            knowingly provide false, incomplete or misleading information to an insurance company for the
                            purpose of defrauding the company. Penalties (may)* include imprisonment, fines and denial of
                            insurance benefits. *Applies in ME Only.</p>
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in NJAny person who includes any false or
                            misleading information on an application for an insurance policy is subject to criminal and
                            civil penalties.</p>
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in ORAny person who knowingly and with
                            intent to defraud or solicit another to defraud the insurer by submitting an application
                            containing a

                            false statement as to any material fact may be violating state law.</p>
                        <p style="font-size: 12px; margin-top: 5px;">Applicable in PRAny person who knowingly and with the
                            intention of defrauding presents false information in an insurance application, or presents,
                            helps,

                            or causes the presentation of a fraudulent claim for the payment of a loss or any other benefit,
                            or presents more than one claim for the same damage or loss, shall incur a felony and, upon
                            conviction, shall be sanctioned for each violation by a fine of not less than five thousand
                            dollars ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term of
                            imprisonment for three (3) years, or both penalties. Should aggravating circumstances [be]
                            present, the penalty thus established may be increased to a maximum of five (5) years, if
                            extenuating circumstances are present, it may be reduced to a minimum of two (2)

                            years.</p>


                    </td>
                </tr>
                <tr>
                    <td colspan="6">THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT
                        REASONABLE INQUIRY HAS BEEN MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE
                        REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Producere Signature <br> <input type="text" name="procedure_signature"
                            style="width: 100%; margin-top: 5px;"></td>
                    <td colspan="2">Producere Name <br> <input type="text" name="procedure_name"
                            style="width: 100%; margin-top: 5px;"></td>
                    <td colspan="2"> State Producer license # <br> <input type="text" name="procedure_license"
                            style="width: 100%; margin-top: 5px;"></td>

                </tr>
                <tr>
                    <td colspan="3">Applicant Signature <br> <input type="text" name="applicant_signature"
                            style="width: 100%; margin-top: 5px;"></td>
                    <td colspan="1">Date <br> <input type="text" name="applicant_date"
                            style="width: 100%; margin-top: 5px;"></td>
                    <td colspan="2">National Producer # <br> <input type="text" name="procedure_no"
                            style="width: 100%; margin-top: 5px;"></td>

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


            <div class="row mt-10 pb-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="m-1">Submit</button>
                    <button type="reset" class="m-1">Reset</button>
                </div>
            </div>
        </form>
    </div>
@endsection
