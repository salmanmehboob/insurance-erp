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
            
            input[type="text"], textarea {
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
        input[type="text"], textarea {
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

            input[type="text"], textarea {
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

        <input type="hidden" name="client_id" value="{{  $clientPolicy->client_id }}">
        <input type="hidden" name="created_by" value="{{  auth()->user()->id }}">
        
        <div class="flex justify-between items-end">
            <div style="font-size: 9pt;" class="flex-shrink-0">
                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAYAAAAfFcSJAAAADUlEQVR42mP8/5+hHgAHggJ/PchI7wAAAABJRU5ErkJggg==" alt="ACORD Logo" class="acord-logo">
            </div>
            <div class="flex-grow header-title">
                COMMERCIAL GENERAL LIABILITY SECTION
            </div>
            <div class="text-right flex-shrink-0" style="border:1px solid #000; padding: 1px 5px;">
                <div class="text-center">
                    <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                    <p><input type="text" name="invoice_date" class="date-input" placeholder="MM/DD/YYYY" style="font-size: 8pt;"></p>
                </div>
            </div>
        </div>

        <table class="responsive-table">
            <tr>
                <td>Agency Name <br> <input type="text" name="agency_name" placeholder="Agency Name"></td>
                <td>Career <br> <input type="text" name="career" placeholder="Career"></td>
                <td>NAIC Code <br> <input type="text" name="naic_code" placeholder="NAIC Code"></td>
            </tr>
            <tr>
                <td>Policy Number <br> <input type="text" name="policy_number" placeholder="Policy Number"></td>
                <td>Effective Date <br> <input type="text" name="effective_date" placeholder="MM/DD/YYYY"></td>
                <td>Named Insured <br> <input type="text" name="named_insured" placeholder="Named Insured"></td>
            </tr>
            <tr>
                <td colspan="3"><b>IMPORTANT - If CLAIMS MADE</b> is checked in the COVERAGE / LIMITS section below, this is an application for a claims made policy.<br> Read all provisions of the policy carefully.</td>
            </tr>
        </table>
		
        <table class="responsive-table" style="width: 100%; margin-top: 5px;">
            <tr>
                <td style="border: 0; padding-left: 0;"> <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">COVERAGES</div></td>
                <td  style="border: 0; padding-left: 0;" colspan="3"><div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">LIMITS</div></td>
            </tr>
            <tr>
                <td rowspan="3">
                    <div class="interest-options">
                        <div class="checkbox-item">
                            <input type="checkbox">
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
                            <input type="checkbox" name="coverage_occurrence_other">
                            <input type="text" name="coverage_other_description" placeholder="Other description" style="margin-left: 5px;">
                        </div>
                    </div>
                </td>
                <td>
                    <div class="title">GENERAL AGGREGATE</div>
                </td>
                <td>$<input type="text" name="general_aggregate_limit" style="width: 60%;"></td>
                <td style="text-align: center;">PREMIUMS </td>
            </tr>
            <tr>
                <td>
                    <div class="title">LIMIT APPLIES PER:
                        <div class="checkbox-item">
                            <input type="checkbox" name="coverage_general_policy" value="1">
                            <label>POLICY </label>
                            <input type="checkbox" name="coverage_general_location" value="1" style="margin-left: 10px;">
                            <label>LOCATION</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="coverage_general_project" value="1">
                            <label>PROJECT </label>
                            <input type="checkbox" name="coverage_general_other" value="1" style="margin-left: 10px;">
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
                <td rowspan="2">PRODUCTS <input style="width: 50%" type="text" name="coverage_premium_product"></td>
            </tr>
            <tr>
                <td rowspan="6">
                    <div class="title">DEDUCTIBLE</div>
                    <table class="inner-deductible">
                        <tr>
                            <td><input type="checkbox" name="deductible_property_damage" value="1"> PROPERTY DAMAGE</td>
                            <td>$<input type="text" style="width: 50%" name="deductible_property_damage_cost"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="deductible_body_injury" value="1"> BODILY INJURY</td>
                            <td>$<input type="text" style="width: 50%" name="deductible_body_injury_cost"></td>
                            <td><input type="checkbox" name="deductible_per_claim" value="1"> PER CLAIM</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" name="deductible_per_occurrence_check" value="1"></td>
                            <td>$<input type="text" style="width: 50%" name="deductible_per_occurrence_cost"></td>
                            <td><input type="checkbox" name="deductible_per_occurrence" value="1"> PER OCCURRENCE</td>
                        </tr>
                    </table>
                </td>
                <td>PERSONAL & ADVERTISING INJURY</td>
                <td>$<input type="text" name="personal_advertising_limit" style="width: 60%;"></td>
            </tr>
            <tr>
                <td>EACH OCCURRENCE</td>
                <td>$<input type="text" name="each_occurrence_limit" style="width: 60%;"></td>
                <td rowspan="2">OTHER <input type="text" name="other_premium" style="width: 50%;"></td>
            </tr>
            <tr>
                <td>DAMAGE TO RENTED PREMISES (each occurrence)</td>
                <td>$<input type="text" name="rented_premises_limit" style="width: 60%;"></td>
            </tr>
            <tr>
                <td>MEDICAL EXPENSE (Any one person)</td>
                <td>$<input type="text" name="medical_expense_limit" style="width: 60%;"></td>
                <td rowspan="2">TOTAL <input type="text" name="total_premium" style="width: 50%;"></td>
            </tr>
            <tr>
                <td>EMPLOYEE BENEFITS</td>
                <td>$<input type="text" name="employee_benefits_limit" style="width: 60%;"></td>
            </tr>
            <tr>
                <td><input type="text" name="additional_coverage" placeholder="Additional coverage"></td>
                <td>$<input type="text" name="additional_limit" style="width: 60%;"></td>
                <td><input type="text" name="additional_premium" style="width: 70%;"></td>
            </tr>
            <tr>
                <td colspan="4">OTHER COVERAGES, RESTRICTIONS AND/OR ENDORSEMENTS (For hired/non-owned auto coverages attach the applicable state Business Auto Section, ACORD 137)
                <br><textarea name="other_coverages" rows="3" style="width: 100%; margin-top: 5px;"></textarea></td>
            </tr>
            <tr>
                <td colspan="4">
                    <table class="sixcoltab">
                        <tr>
                            <td>1. UM/UIM COVERAGE</td>
                            <td><input type="checkbox" name="um_uim_available"> IS</td>
                            <td><input type="checkbox" name="um_uim_not_available"> IS NOT AVAILABLE</td>
                            <td>2. MEDICAL PAYMENT COVERAGE</td>
                            <td><input type="checkbox" name="medical_payment_available"> IS</td>
                            <td><input type="checkbox" name="medical_payment_not_available"> IS NOT AVAILABLE</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">SCHEDULE OF HAZARDS (ACORD 211, Schedule of Hazards, may be attached if more space is required)</div>
        
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
                    <td><input type="text" name="loc_1" style="width: 100%;"></td>
                    <td><input type="text" name="haz_1" style="width: 100%;"></td>
                    <td><input type="text" name="class_code_1" style="width: 100%;"></td>
                    <td><input type="text" name="premium_basis_1" style="width: 100%;"></td>
                    <td><input type="text" name="exposure_1" style="width: 100%;"></td>
                    <td><input type="text" name="terr_1" style="width: 100%;"></td>
                    <td><input type="text" name="rate_prem_ops_1" style="width: 100%;"></td>
                    <td><input type="text" name="rate_products_1" style="width: 100%;"></td>
                    <td><input type="text" name="premium_prem_ops_1" style="width: 100%;"></td>
                    <td><input type="text" name="premium_products_1" style="width: 100%;"></td>
                </tr>
                <tr style="height:35pt">
                    <td colspan="10">
                        CLASSIFICATION DESCRIPTION
                        <br><textarea name="classification_description_1" rows="2" style="width: 100%; margin-top: 3px;"></textarea>
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
                    <td><input type="text" name="loc_2" style="width: 100%;"></td>
                    <td><input type="text" name="haz_2" style="width: 100%;"></td>
                    <td><input type="text" name="class_code_2" style="width: 100%;"></td>
                    <td><input type="text" name="premium_basis_2" style="width: 100%;"></td>
                    <td><input type="text" name="exposure_2" style="width: 100%;"></td>
                    <td><input type="text" name="terr_2" style="width: 100%;"></td>
                    <td><input type="text" name="rate_prem_ops_2" style="width: 100%;"></td>
                    <td><input type="text" name="rate_products_2" style="width: 100%;"></td>
                    <td><input type="text" name="premium_prem_ops_2" style="width: 100%;"></td>
                    <td><input type="text" name="premium_products_2" style="width: 100%;"></td>
                </tr>
                <tr style="height:35pt">
                    <td colspan="10">
                        CLASSIFICATION DESCRIPTION
                        <br><textarea name="classification_description_2" rows="2" style="width: 100%; margin-top: 3px;"></textarea>
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

        <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">CLAIMS MADE (Explain all "Yes" responses)</div>
        <table class="responsive-table" cellspacing="0">
            <tbody>
                <tr>
                    <td>EXPLAIN ALL 'YES" RESPONSES</td>
                    <td>Y/N</td>
                </tr>
                <tr>
                    <td colspan="2">1. PROPOSED RETROACTIVE DATE: <input type="text" name="retroactive_date" style="margin-left: 10px; width: 60%;"></td>
                </tr>
                <tr>
                    <td colspan="2">2. ENTRY DATE INTO UNINTERRUPTED CLAIMS MADE COVERAGE: <input type="text" name="entry_date" style="margin-left: 10px; width: 60%;"></td>
                </tr>
                <tr>
                    <td>3. HAS ANY PRODUCT, WORK, ACCIDENT, OR LOCATION BEEN EXCLUDED, UNINSURED OR SELF-INSURED FROM ANY PREVIOUS COVERAGE?</td>
                    <td>
                        <input type="radio" name="excluded_coverage" value="Y"> Y
                        <input type="radio" name="excluded_coverage" value="N"> N
                        <br><textarea name="excluded_coverage_explanation" rows="3" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>4. WAS TAIL COVERAGE PURCHASED UNDER ANY PREVIOUS POLICY?</td>
                    <td>
                        <input type="radio" name="tail_coverage" value="Y"> Y
                        <input type="radio" name="tail_coverage" value="N"> N
                        <br><textarea name="tail_coverage_explanation" rows="3" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
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
                        <input type="text" name="ebl_deductible" style="width: 50%;">
                    </td>
                    <td>
                        <span>3.</span>
                        <span>NUMBER OF EMPLOYEES COVERED BY EMPLOYEE BENEFITS PLANS:</span>
                        <input type="text" name="ebl_covered_employees" style="width: 30%;">
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>2.</span>
                        <span>NUMBER OF EMPLOYEES:</span>
                        <input type="text" name="ebl_total_employees" style="width: 50%;">
                    </td>
                    <td>
                        <span>4.</span>
                        <span>RETROACTIVE DATE:</span>
                        <input type="text" name="ebl_retroactive_date" style="width: 50%;">
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="page-break"></div>
        <p style="text-align: right; font-weight: bold; font-size: 9px; margin-top: 10px;">Agency Customer ID: <input type="text" name="agency_customer_id" placeholder="Agency customer ID" style="width: 50%"></p>
        
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px;">CONTRACTORS</div>
        <table class="responsive-table" cellspacing="0">
            <tbody>
                <tr>
                    <td>EXPLAIN ALL "YES" RESPONSES (For all past or present operations)</td>
                    <td>Y / N</td>
                </tr>
                <tr>
                    <td>1. DOES APPLICANT DRAW PLANS, DESIGNS, OR SPECIFICATIONS FOR OTHERS?</td>
                    <td>
                        <input type="radio" name="plans_designs" value="Y"> Y
                        <input type="radio" name="plans_designs" value="N"> N
                        <br><textarea name="plans_designs_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>2. DO ANY OPERATIONS INCLUDE BLASTING OR UTILIZE OR STORE EXPLOSIVE MATERIAL?</td>
                    <td>
                        <input type="radio" name="explosive_material" value="Y"> Y
                        <input type="radio" name="explosive_material" value="N"> N
                        <br><textarea name="explosive_material_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>3. DO ANY OPERATIONS INCLUDE EXCAVATION, TUNNELING, UNDERGROUND WORK OR EARTH MOVING?</td>
                    <td>
                        <input type="radio" name="excavation_work" value="Y"> Y
                        <input type="radio" name="excavation_work" value="N"> N
                        <br><textarea name="excavation_work_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>4. DO YOUR SUBCONTRACTORS CARRY COVERAGES OR LIMITS LESS THAN YOURS?</td>
                    <td>
                        <input type="radio" name="subcontractor_coverage" value="Y"> Y
                        <input type="radio" name="subcontractor_coverage" value="N"> N
                        <br><textarea name="subcontractor_coverage_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>5. ARE SUBCONTRACTORS ALLOWED TO WORK WITHOUT PROVIDING YOU WITH A CERTIFICATE OF INSURANCE?</td>
                    <td>
                        <input type="radio" name="subcontractor_certificate" value="Y"> Y
                        <input type="radio" name="subcontractor_certificate" value="N"> N
                        <br><textarea name="subcontractor_certificate_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>6. DOES APPLICANT LEASE EQUIPMENT TO OTHERS WITH OR WITHOUT OPERATORS?</td>
                    <td>
                        <input type="radio" name="lease_equipment" value="Y"> Y
                        <input type="radio" name="lease_equipment" value="N"> N
                        <br><textarea name="lease_equipment_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
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
                                    <textarea name="subcontracted_work_description" rows="3" style="width: 100%;"></textarea>
                                </td>
                                <td style="border-top: 0;">
                                    <input type="text" name="subcontractor_payment" style="width: 100%;">
                                </td>
                                <td style="border-top: 0;">
                                    <input type="text" name="subcontracted_percentage" style="width: 100%;">
                                </td>
                                <td style="border-top: 0;">
                                    <input type="text" name="full_time_staff" style="width: 100%;">
                                </td>
                                <td style="border-top: 0;">
                                    <input type="text" name="part_time_staff" style="width: 100%;">
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
                    <td><input type="text" name="product_1" style="width: 100%;"></td>
                    <td><input type="text" name="gross_sales_1" style="width: 100%;"></td>
                    <td><input type="text" name="units_1" style="width: 100%;"></td>
                    <td><input type="text" name="time_market_1" style="width: 100%;"></td>
                    <td><input type="text" name="expected_life_1" style="width: 100%;"></td>
                    <td><input type="text" name="intended_use_1" style="width: 100%;"></td>
                    <td><input type="text" name="components_1" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td><input type="text" name="product_2" style="width: 100%;"></td>
                    <td><input type="text" name="gross_sales_2" style="width: 100%;"></td>
                    <td><input type="text" name="units_2" style="width: 100%;"></td>
                    <td><input type="text" name="time_market_2" style="width: 100%;"></td>
                    <td><input type="text" name="expected_life_2" style="width: 100%;"></td>
                    <td><input type="text" name="intended_use_2" style="width: 100%;"></td>
                    <td><input type="text" name="components_2" style="width: 100%;"></td>
                </tr>
                <tr>
                    <td><input type="text" name="product_3" style="width: 100%;"></td>
                    <td><input type="text" name="gross_sales_3" style="width: 100%;"></td>
                    <td><input type="text" name="units_3" style="width: 100%;"></td>
                    <td><input type="text" name="time_market_3" style="width: 100%;"></td>
                    <td><input type="text" name="expected_life_3" style="width: 100%;"></td>
                    <td><input type="text" name="intended_use_3" style="width: 100%;"></td>
                    <td><input type="text" name="components_3" style="width: 100%;"></td>
                </tr>
            </tbody>
        </table>

        <table class="responsive-table">
            <tbody>
                <tr>
                    <th>EXPLAIN ALL "YES" RESPONSES (For all past or present products or operations) PLEASE ATTACH LITERATURE, BROCHURES, LABELS, WARNINGS, ETC.</th>
                    <th>Y / N</th>
                </tr>
                <tr>
                    <td>1. DOES APPLICANT INSTALL, SERVICE OR DEMONSTRATE PRODUCTS?</td>
                    <td>
                        <input type="radio" name="install_service" value="Y"> Y
                        <input type="radio" name="install_service" value="N"> N
                        <br><textarea name="install_service_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>2. FOREIGN PRODUCTS SOLD, DISTRIBUTED, USED AS COMPONENTS? (If "YES", attach ACORD 815)</td>
                    <td>
                        <input type="radio" name="foreign_products" value="Y"> Y
                        <input type="radio" name="foreign_products" value="N"> N
                        <br><textarea name="foreign_products_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>3. RESEARCH AND DEVELOPMENT CONDUCTED OR NEW PRODUCTS PLANNED?</td>
                    <td>
                        <input type="radio" name="research_development" value="Y"> Y
                        <input type="radio" name="research_development" value="N"> N
                        <br><textarea name="research_development_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>4. GUARANTEES, WARRANTIES, HOLD HARMLESS AGREEMENTS?</td>
                    <td>
                        <input type="radio" name="warranties" value="Y"> Y
                        <input type="radio" name="warranties" value="N"> N
                        <br><textarea name="warranties_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>5. PRODUCTS RELATED TO AIRCRAFT/SPACE INDUSTRY?</td>
                    <td>
                        <input type="radio" name="aircraft_products" value="Y"> Y
                        <input type="radio" name="aircraft_products" value="N"> N
                        <br><textarea name="aircraft_products_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>6. PRODUCTS RECALLED, DISCONTINUED, CHANGED?</td>
                    <td>
                        <input type="radio" name="recalled_products" value="Y"> Y
                        <input type="radio" name="recalled_products" value="N"> N
                        <br><textarea name="recalled_products_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>7. PRODUCTS OF OTHERS SOLD OR RE-PACKAGED UNDER APPLICANT LABEL?</td>
                    <td>
                        <input type="radio" name="repackaged_products" value="Y"> Y
                        <input type="radio" name="repackaged_products" value="N"> N
                        <br><textarea name="repackaged_products_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>8. PRODUCTS UNDER LABEL OF OTHERS?</td>
                    <td>
                        <input type="radio" name="other_labels" value="Y"> Y
                        <input type="radio" name="other_labels" value="N"> N
                        <br><textarea name="other_labels_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>9. VENDORS COVERAGE REQUIRED?</td>
                    <td>
                        <input type="radio" name="vendors_coverage" value="Y"> Y
                        <input type="radio" name="vendors_coverage" value="N"> N
                        <br><textarea name="vendors_coverage_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>10. DOES ANY NAMED INSURED SELL TO OTHER NAMED INSUREDS?</td>
                    <td>
                        <input type="radio" name="named_insured_sales" value="Y"> Y
                        <input type="radio" name="named_insured_sales" value="N"> N
                        <br><textarea name="named_insured_sales_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
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
                            <input type="checkbox" name="additional_insured">
                            <label>ADDITIONAL INSURED</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="employee_lessor">
                            <label>EMPLOYEE AS LESSOR</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="lenders_loss_payable">
                            <label>LENDER'S LOSS PAYABLE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="lienholder">
                            <label>LIENHOLDER</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="loss_payee">
                            <label>LOSS PAYEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="mortgagee">
                            <label>MORTGAGEE</label>
                        </div>
                        <div class="checkbox-item">
                            <input type="checkbox" name="other_interest">
                            <input type="text" name="other_interest_description" placeholder="Other" style="width: 60%; margin-left: 5px;">
                        </div>
                    </div>
                </td>
                <td colspan="4" style="height: 80px; position: relative;">
                    <div style="display: flex; align-items: flex-end;">
                        <span class="label" style="font-weight: bold;">NAME AND ADDRESS</span>
                        <div style="flex-grow: 1; border-bottom: 1px solid black;"></div>
                    </div>
                    <textarea name="name_address" rows="3" style="width: 100%; margin-top: 5px;"></textarea>
                    <table style="width: 100%; border-collapse: collapse; margin-top: 5px; border-left: none; border-right: none;">
                        <tr>
                            <td style="width: 25%; border: none;">
                                <div style="display: flex; align-items: flex-end; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">RANK:</span>
                                    <input type="text" name="rank" style="width: 30px;">
                                </div>
                            </td>
                            <td style="width: 25%; border: none;">
                                <div style="display: flex; align-items: center; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">EVIDENCE:</span>
                                    <input type="checkbox" name="evidence" style="margin-right: 3px;">
                                </div>
                            </td>
                            <td style="width: 50%; border: none;">
                                <div style="display: flex; align-items: center; justify-content: flex-end;">
                                    <span class="label" style="font-weight: bold;">CERTIFICATE</span>
                                    <input type="text" name="certificate" style="width: 50px; margin-left: 5px;">
                                </div>
                            </td>
                        </tr>
                    </table>
                    <div style="position: absolute; bottom: 5px; width: 95%;">
                        <div class="field-row" style="margin-top: 0;">
                            <span class="label" style="font-weight: bold;">REFERENCE / LOAN #:</span>
                            <input type="text" name="reference_loan_number">
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
                        <input type="text" name="item_description" style="margin: 5px; width: 80%;">
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
                    <td>1. ANY MEDICAL FACILITIES PROVIDED OR MEDICAL PROFESSIONALS EMPLOYED OR CONTRACTED?</td>
                    <td>
                        <input type="radio" name="medical_facilities" value="Y"> Y
                        <input type="radio" name="medical_facilities" value="N"> N
                        <br><textarea name="medical_facilities_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>2. ANY EXPOSURE TO RADIOACTIVE/NUCLEAR MATERIALS?</td>
                    <td>
                        <input type="radio" name="radioactive_materials" value="Y"> Y
                        <input type="radio" name="radioactive_materials" value="N"> N
                        <br><textarea name="radioactive_materials_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>3. DO/HAVE PAST, PRESENT OR DISCONTINUED OPERATIONS INVOLVE STORING, TREATING, DISCHARGING, APPLYING, DISPOSING, OR TRANSPORTING OF HAZARDOUS MATERIAL? (e.g., landfills, wastes, fuel tanks, etc)</td>
                    <td>
                        <input type="radio" name="hazardous_materials" value="Y"> Y
                        <input type="radio" name="hazardous_materials" value="N"> N
                        <br><textarea name="hazardous_materials_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>4. ANY OPERATIONS SOLD, ACQUIRED, OR DISCONTINUED IN LAST FIVE (5) YEARS?</td>
                    <td>
                        <input type="radio" name="operations_changes" value="Y"> Y
                        <input type="radio" name="operations_changes" value="N"> N
                        <br><textarea name="operations_changes_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>5. DO YOU RENT OR LOAN EQUIPMENT TO OTHERS?
                        <table style="width: 90%; place-self: center; margin-top: 10px;">
                            <tr>
                                <td style="font-size: 9px;"><b>EQUIPMENT</b></td>
                                <td style="font-size: 9px;" colspan="2"><b>TYPE OF EQUIPMENT</b></td>
                                <td style="font-size: 9px;"><b>INSTRUCTION GIVEN (Y/N)</b></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="equipment_type_1" style="width: 100%;"></td>
                                <td><input type="checkbox" name="small_tools"> SMALL TOOLS</td>
                                <td><input type="checkbox" name="large_equipment"> LARGE EQUIPMENT</td>
                                <td><input type="text" name="instruction_given_1" style="width: 100%;"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="equipment_type_2" style="width: 100%;"></td>
                                <td><input type="checkbox" name="other_equipment_type"> OTHER TYPE</td>
                                <td><input type="text" name="other_equipment_description" style="width: 100%;"></td>
                                <td><input type="text" name="instruction_given_2" style="width: 100%;"></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <input type="radio" name="rent_loan_equipment" value="Y"> Y
                        <input type="radio" name="rent_loan_equipment" value="N"> N
                    </td>
                </tr>
                <tr>
                    <td>6. ANY WATERCRAFT, DOCKS, FLOATS OWNED, HIRED OR LEASED?</td>
                    <td>
                        <input type="radio" name="watercraft" value="Y"> Y
                        <input type="radio" name="watercraft" value="N"> N
                        <br><textarea name="watercraft_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>7. ANY PARKING FACILITIES OWNED/RENTED?</td>
                    <td>
                        <input type="radio" name="parking_facilities" value="Y"> Y
                        <input type="radio" name="parking_facilities" value="N"> N
                        <br><textarea name="parking_facilities_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>8. IS A FEE CHARGED FOR PARKING?</td>
                    <td>
                        <input type="radio" name="parking_fee" value="Y"> Y
                        <input type="radio" name="parking_fee" value="N"> N
                        <br><textarea name="parking_fee_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>9. RECREATION FACILITIES PROVIDED?</td>
                    <td>
                        <input type="radio" name="recreation_facilities" value="Y"> Y
                        <input type="radio" name="recreation_facilities" value="N"> N
                        <br><textarea name="recreation_facilities_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
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
                                <td><input type="text" name="number_apartments" style="width: 100%;"></td>
                                <td><input type="text" name="total_apartment_area" style="width: 80%;"> Sq.ft</td>
                                <td><textarea name="other_lodging_description" rows="2" style="width: 100%;"></textarea></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <input type="radio" name="lodging_operations" value="Y"> Y
                        <input type="radio" name="lodging_operations" value="N"> N
                    </td>
                </tr>
                <tr>
                    <td>11. IS THERE A SWIMMING POOL ON PREMISES? (Check all that apply)
                        <table style="margin-top: 10px;">
                            <tr>
                                <td style="border: 0;"><input type="checkbox" name="approved_fence"> APPROVED FENCE</td>
                                <td style="border: 0;"><input type="checkbox" name="limited_access"> LIMITED ACCESS</td>
                                <td style="border: 0;"><input type="checkbox" name="diving_board"> DIVING BOARD</td>
                                <td style="border: 0;"><input type="checkbox" name="slide"> SLIDE</td>
                            </tr>
                            <tr>
                                <td style="border: 0;"><input type="checkbox" name="above_ground"> ABOVE GROUND</td>
                                <td style="border: 0;"><input type="checkbox" name="in_ground"> IN GROUND</td>
                                <td style="border: 0;"><input type="checkbox" name="life_guard"> LIFE GUARD</td>
                                <td style="border: 0;"></td>
                            </tr>
                        </table>
                    </td>
                    <td>
                        <input type="radio" name="swimming_pool" value="Y"> Y
                        <input type="radio" name="swimming_pool" value="N"> N
                    </td>
                </tr>
                <tr>
                    <td>12. ARE SOCIAL EVENTS SPONSORED?</td>
                    <td>
                        <input type="radio" name="social_events" value="Y"> Y
                        <input type="radio" name="social_events" value="N"> N
                        <br><textarea name="social_events_explanation" rows="2" style="width: 100%; margin-top: 5px;"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>13. ARE ATHLETIC TEAMS SPONSORED?
                        <div style="display: flex; margin-top: 10px;">
                            <table style="width: 48%; margin-right: 20px;">
                                <tr>
                                    <td style="font-size: 9px;"><b>TYPE OF SPORT</b></td>
                                    <td style="font-size: 9px;"><b>CONTACT SPORT (Y/N)</b></td>
                                    <td style="font-size: 9px;"><b>AGE GROUP</b><br>
                                        <input type="checkbox" name="age_13_18_1"> 13-18<br>
                                        <input type="checkbox" name="age_12_under_1"> 12 & under
                                        <input type="checkbox" name="age_over_18_1"> over 18
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="sport_type_1" style="width: 100%;"></td>
                                    <td><input type="text" name="contact_sport_1" style="width: 100%;"></td>
                                    <td><input type="text" name="age_group_1" style="width: 100%;"></td>
                                </tr>
                            </table>
                            <table style="width: 48%;">
                                <tr>
                                    <td style="font-size: 9px;"><b>TYPE OF SPORT</b></td>
                                    <td style="font-size: 9px;"><b>CONTACT SPORT (Y/N)</b></td>
                                    <td style="font-size: 9px;"><b>AGE GROUP</b><br>
                                        <input type="checkbox" name="age_13_18_2"> 13-18<br>
                                        <input type="checkbox" name="age_12_under_2"> 12 & under
                                        <input type="checkbox" name="age_over_18_2"> over 18
                                    </td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="sport_type_2" style="width: 100%;"></td>
                                    <td><input type="text" name="contact_sport_2" style="width: 100%;"></td>
                                    <td><input type="text" name="age_group_2" style="width: 100%;"></td>
                                </tr>
                            </table>
                        </div>
                    </td>
                    <td>
                        <input type="radio" name="athletic_teams" value="Y"> Y
                        <input type="radio" name="athletic_teams" value="N"> N
                    </td>
                </tr>
                <tr>
                    <td>14. ARE STRUCTURAL ALTERATIONS CONTEMPLATED?</td>
                    <td><br><br><br></td>
                </tr>
                <tr>
                    <td>15. ANY DEMOLITION EXPOSURE CONTEMPLATED?</td>
                    <td><br><br><br></td>
                </tr>
                <tr>
                    <td>16. HAS APPLICANT BEEN ACTIVE IN OR IS CURRENTLY ACTIVE IN JOINT VENTURES?</td>
                    <td><br><br><br></td>
                </tr>
                <tr>
                    <td>17. DO YOU LEASE EMPLOYEES TO OR FROM OTHER EMPLOYERS?
                        <div style="display: flex;">
                            <table style="width: 48%; margin-right: 20px;">
                                <tr>
                                    <td style="font-size: 9px;"> <b>LEASE TO</b></td>
                                    <td style="width: 80px; font-size: 9px;"><b>WORKERS COMPENSATION COVERAGE CARRIED (Y/N)</b></td>
                                </tr>
                                <tr>
                                    <td>---</td>
                                    <td>---</td>
                                </tr>
                            </table>
                            <table style="width: 48%;">
                                <tr>
                                    <td style="font-size: 9px;"><b>LEASE FROM</b></td>
                                    <td style="width: 80px; font-size: 9px;"><b>WORKERS COMPENSATION COVERAGE CARRIED (Y/N)</b></td>
                                </tr>
                                <tr>
                                    <td>---</td>
                                    <td>---</td>
                                </tr>
                            </table>
                        </div>
                        
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>18.  IS THERE A LABOR INTERCHANGE WITH ANY OTHER BUSINESS OR SUBSIDIARIES?</td>
                    <td><br><br><br></td>
                </tr>
                <tr>
                    <td>19. ARE DAY CARE FACILITIES OPERATED OR CONTROLLED?</td>
                    <td><br><br><br></td>
                </tr>
                <tr>
                    <td>20.  HAVE ANY CRIMES OCCURRED OR BEEN ATTEMPTED ON YOUR PREMISES WITHIN THE LAST THREE (3) YEARS?</td>
                    <td><br><br><br></td>
                </tr>
                <tr>
                    <td>21.  IS THERE A FORMAL, WRITTEN SAFETY AND SECURITY POLICY IN EFFECT?</td>
                    <td><br><br><br></td>
                </tr>
                <tr>
                    <td>22. DOES THE BUSINESSES' PROMOTIONAL LITERATURE MAKE ANY REPRESENTATIONS ABOUT THE SAFETY OR SECURITY OF THE PREMISES?</td>
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
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Remarks</div>
        <table>
            <tr>
                <td colspan="6" style="height: 150px;"></td>
            </tr>
        </table>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; ">Signature</div>
        <table>
                
            <tr>
                <td colspan="6">
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in AL, AR, DC, LA, MD, NM, RI andA¥gperson who knowingly (or willfully)* presents a false or fraudulent claim for payment of a loss or

                        benefit or knowingly (or willfully)“ presents false information in an application for insurance is guilty of a crime and may be subject to fines and confinement in prison. *Applies in MD Only.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in COJt is unlawful to knowingly provide false, incomplete, or misleading facts or information to an insurance company for the purpose of defrauding or attempting to defraud the company. Penalties may include imprisonment, fines, denial of insurance and civil damages. Any insurance company or agent of an insurance company who knowingly provides false, incomplete, or misleading facts or information to a policyholder or claimant for the purpose of defrauding or attempting to defraud the policyholder or claimant with regard to a settlement or award payable from insurance proceeds shall be reported to the Colorado Division of Insurance within the Department of Regulatory Agencies.

                        Applicable in FL and Ol€tny person who knowingly and with intent to injure, defraud, or deceive any insurer files a statement of claim or an application containing any false, incomplete, or misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in KS Any person who, knowingly and with intent to defraud, presents, causes to be presented or prepares with knowledge or belief that it will be presented to or by an insurer, purported insurer, broker or any agent thereof, any written, electronic, electronic impulse, facsimile, magnetic, oral, or telephonic communication or statement as part of, or in support of, an application for the issuance of, or the rating of an insurance policy for personal or commercial insurance, or a claim for payment or other benefit pursuant to an insurance policy for commercial or personal insurance which such person knows to contain materially false information concerning any fact material thereto; or conceals, for the purpose of misleading, information concerning any fact material thereto commits a fraudulent insurance act.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in KY, NY, OH and P iy person who knowingly and with intent to defraud any insurance company or other person files an application for insurance or statement of claim containing any materially false information or conceals for the purpose of misleading, information concerning any fact material thereto commits a fraudulent insurance act, which is a crime and subjects such person to criminal and civil penalties (not to exceed five thousand dollars and the stated value of the claim for each such violation)*. *Applies in NY Only.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in ME, TN, VA and WIAis a crime to knowingly provide false, incomplete or misleading information to an insurance company for the purpose of defrauding the company. Penalties (may)* include imprisonment, fines and denial of insurance benefits. *Applies in ME Only.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in NJAny person who includes any false or misleading information on an application for an insurance policy is subject to criminal and civil penalties.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in ORAny person who knowingly and with intent to defraud or solicit another to defraud the insurer by submitting an application containing a

                        false statement as to any material fact may be violating state law.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in PRAny person who knowingly and with the intention of defrauding presents false information in an insurance application, or presents, helps,

                        or causes the presentation of a fraudulent claim for the payment of a loss or any other benefit, or presents more than one claim for the same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each violation by a fine of not less than five thousand dollars ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term of imprisonment for three (3) years, or both penalties. Should aggravating circumstances [be] present, the penalty thus established may be increased to a maximum of five (5) years, if extenuating circumstances are present, it may be reduced to a minimum of two (2)
                        
                        years.</p>
                    
                    
                </td>
            </tr>
            <tr>
                <td colspan="6">THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT REASONABLE INQUIRY HAS BEEN MADE TO OBTAIN THE ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
                </td>
            </tr>
            <tr>
                <td colspan="2">Producere Signature <br> --- </td>
                <td colspan="2">Producere Name <br> --- </td>
                <td colspan="2"> State Producer license # <br> ---</td>

            </tr>
            <tr>
                <td colspan="3">Applicant Signature <br> ---</td>
                <td colspan="1">Date <br> ---</td>
                <td colspan="2">National Producer # <br> ---</td>

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
                    <button type="submit" class="btn btn-primary m-1">Submit</button>
                    <button type="reset" class="btn btn-secondary m-1">Reset</button>
                </div>
            </div>
        </form>     
    </div>

@endsection