@extends('admin.layouts.app')
@push('styles')
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        /*body {*/
        /*    font-family: Arial, sans-serif;*/
        /*    margin: 0 auto;*/
        /*    max-width: 1200px;*/
        /*    padding: 40px;*/
        /*}*/

        .s1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 14pt;
        }

        .s3 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        .s4 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s5 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s6 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        .s7 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6pt;
        }

        .s8 {
            color: black;
            font-family: "OCR A Extended", monospace;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s9 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s10 {
            color: black;
            font-family: "Courier New", monospace;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9.5pt;
        }

        .s11 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 10pt;
        }

        .s12 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s13 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        .s14 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s15 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 9pt;
        }

        h3 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s17 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s18 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        h2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8pt;
        }

        h1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 8.5pt;
        }

        .s20 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8.5pt;
        }

        .s21 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 5.5pt;
        }

        p {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
            margin: 0pt;
        }

        .s23 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        .s24 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s25 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        h4 {
            color: black;
            font-family: "Courier New", monospace;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s26 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7pt;
        }

        .s27 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6pt;
        }

        .s28 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s29 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s30 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7pt;
        }

        li {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
            counter-reset: c1 1;
        }

        #l1 > li > *:first-child:before {
            counter-increment: c1;
            content: counter(c1, decimal) ". ";
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        #l1 > li:first-child > *:first-child:before {
            counter-increment: c1 0;
        }

        table, tbody {
            vertical-align: top;
            overflow: visible;
        }

        .insurance-form {
            width: 80%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .insurance-form td, .insurance-form th {
            border: 1px solid black;
            padding: 4px;
            vertical-align: top;
        }

        .header-row {
            font-weight: bold;
            background-color: #fff;
        }

        .header-coverages {
            width: 40%;
            text-align: center;
        }

        .header-limits {
            width: 60%;
            text-align: center;
        }

        .checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid black;
            margin-right: 5px;
            vertical-align: middle;
        }

        .bold-text {
            font-weight: bold;
        }

        .dollar-sign {
            margin-right: 3px;
        }

        .indent {
            margin-left: 20px;
        }

        .premiums-column {
            width: 200px;
            vertical-align: top;
            border-left: 1px solid black;
            padding: 0;
        }

        .premium-header {
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid black;
            padding: 4px;
        }

        .premium-item {
            border-bottom: 1px solid black;
            padding: 4px;
        }

        .table-layout {
            table-layout: fixed;
            width: 100%;
        }

        .two-col-grid {
            display: grid;
            grid-template-columns: auto 100px;
            align-items: center;
        }

        .endorsements-section {
            height: 60px;
        }

        .ebl-form {
            width: 80%;
            border-collapse: collapse;
            font-size: 12px;
        }

        .ebl-form td, .ebl-form th {
            border: 1px solid black;
            padding: 4px 6px;
            vertical-align: top;
        }

        .header-row {
            font-weight: bold;
            background-color: #fff;
        }

        .form-header {
            font-weight: bold;
            border-bottom: 1px solid black;
            padding: 4px 6px;
        }

        .form-row {
            border-bottom: 1px solid black;
        }

        .form-label {
            font-weight: bold;
        }

        .number-label {
            font-weight: bold;
            display: inline-block;
            margin-right: 5px;
        }

        .footer-row {
            text-align: center;
            font-size: 11px;
        }

        .footer-row td {
            padding: 2px 6px;
        }

        .left-align {
            text-align: left;
        }

        .right-align {
            text-align: right;
        }

        .form-code {
            text-align: left;
            font-weight: bold;
        }

        .dollar-sign {
            margin-right: 3px;
        }

        /* Editable style */
        []:focus {
            outline: 1px solid blue;
            background-color: #f0f8ff;
        }

        .title {
            font-weight: bold;
            font-size: 16px;
            margin-bottom: 10px;
        }

        .agency-id {
            text-align: right;
            margin-bottom: 10px;
            width: var(--content-width);
        }

        .form-section {
            border: 2px solid black;
            padding: 10px;
            display: flex;
            flex-wrap: wrap;
            width: var(--content-width);
            box-sizing: border-box;
        }

        .checkbox-group {
            width: 250px;
            padding-right: 10px;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            margin-bottom: 4px;
        }

        .checkbox-row input {
            width: 16px;
            height: 16px;
            margin-right: 5px;
        }

        .main-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .top-row {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 10px;
        }

        .flex-row {
            display: flex;
            width: 100%;
        }

        .address-block, .interest-block {
            padding: 10px;
            box-sizing: border-box;
        }

        .address-block {
            flex: 2;
            border-left: 2px solid black;
        }

        .interest-block {
            flex: 1;
            border-left: 2px solid black;
        }

        .interest-block .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 6px;
        }

        .interest-block .description {
            border-top: 2px solid black;
            border-bottom: 2px solid black;
            height: 60px;
            padding: 4px;
            margin-top: 10px;
        }

        .bottom-field {
            border: 2px solid black;
            padding: 4px;
            margin-top: 10px;
        }

        textarea, input[type="text"] {
            font-family: inherit;
            font-size: inherit;
            width: 100%;
            border: none;
            border-bottom: 1px solid black;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .acord126-container {
            width: var(--content-width);
            margin-top: 30px;
        }

        .acord126-title {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .acord126-table {
            border-collapse: collapse;
            width: 100%;
        }

        .acord126-table td,
        .acord126-table th {
            border: 1px solid #000;
            padding: 5px;
            vertical-align: top;
        }

        .acord126-num {
            width: 30px;
            text-align: center;
            font-weight: bold;
        }

        .acord126-yn {
            width: 40px;
            text-align: center;
        }

        .acord126-check-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .acord126-check-group label {
            display: flex;
            align-items: center;
            gap: 3px;
        }

        .acord126-input {
            width: 100%;
            border: none;
            box-sizing: border-box;
        }

        .acord126-nested {
            width: 100%;
            border-collapse: collapse;
        }

        .acord126-nested td,
        .acord126-nested th {
            border: 1px solid black;
            padding: 3px;
        }

        .acord126-checkbox {
            width: 14px;
            height: 14px;
        }

        /* Fixed styling for inputs */
        input[type="text"] {
            font-family: Arial, sans-serif;
            font-size: 6.5pt;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            padding: 2px;
            height: 20px;
        }

        /* Specific input for Y/N answers */
        input.yn {
            width: 20px;
            text-align: center;
            height: 15px;
            margin: 0 auto;
            display: block;
        }

        /* Textarea styling */
        textarea {
            font-family: Arial, sans-serif;
            font-size: 6.5pt;
            width: 100%;
            box-sizing: border-box;
            border: 1px solid #ccc;
            padding: 2px;
            resize: vertical;
        }

        /* Signature fields */
        .signature-field {
            border-bottom: 1px solid #000;
            height: 25px;
            width: 100%;
            margin-top: 5px;
        }

        /* Container width */
        .form-container {
            width: 100%;
            max-width: 800px;
            margin: 0 auto;
        }

        /* Proper table styling */
        .form-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 10px;
        }

        /* Table borders */
        .form-table td {
            border: 2px solid black;
            padding: 3px;
        }

        /* Labels for input fields */
        .field-label {
            font-weight: bold;
            font-size: 10px;
            margin-bottom: 3px;
        }
    </style>

@endpush
@section('content')

    <form action="{{ route('store-general-liability') }}" method="POST" class=" mt-4">
        @csrf

        <input type="hidden" name="client_id" value="{{  $clientPolicy->client_id }}">
        <input type="hidden" name="created_by" value="{{  auth()->user()->id }}">

        <p style="text-indent: 0pt;text-align: left;">

        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><img width="50px" height="auto" src="https://i.ibb.co/7t9pR9qP/Untitled-design-11.png"/></td>
            </tr>
        </table>
        </p>
        <p class="s1" style="padding-top: 7pt;padding-left: 311pt;text-indent: 0pt;text-align: left;"
        >AGENCY CUSTOMER ID:
            <input type="text" name="agency_customer_id" style="width: 50%">
        </p>
        <p style="text-indent: 0pt;text-align: left;"><br/></p>
        <table style="border-collapse:collapse;margin-left:7.22425pt" cellspacing="0" width="80%">
            <tr style="height:23pt">
                <td style="width:491pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s2" style="padding-top: 3pt;padding-left: 135pt;text-indent: 0pt;text-align: left;"
                    >COMMERCIAL GENERAL LIABILITY SECTION</p>
                </td>
                <td style="width:86pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s3" style="padding-left: 6pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">DATE
                        (MM/DD/YYYY)</p>
                    <p class="s4"
                       style="padding-top: 4pt;padding-left: 6pt;text-indent: 0pt;line-height: 8pt;text-align: center;"
                    >
                        <input type="text" name="invoice_date">
                    </p>
                </td>
            </tr>
            <tr style="height:23pt">
                <td style="width:289pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s3" style="padding-left: 3pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
                        AGENCY</p>
                    <p class="s5" style="padding-top: 5pt;padding-left: 6pt;text-indent: 0pt;text-align: left;"
                    ><input type="text" name="agency_name">
                    </p>
                </td>
                <td style="width:235pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s4" style="padding-left: 1pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
                        CARRIER</p>
                    <p class="s4" style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;"
                    ><input type="text" name="carrier">
                    </p>
                </td>
                <td style="width:53pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s3" style="padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">NAIC
                        CODE</p>
                    <p class="s4" style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;"
                    >
                        <input type="text" name="naic_code">
                    </p>
                </td>
            </tr>
            <tr style="height:23pt">
                <td style="width:231pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">POLICY NUMBER</p>
                    <p class="s5" style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;"
                    ><input type="text" name="policy_number"></p>
                </td>
                <td style="width:58pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s3" style="padding-left: 1pt;text-indent: 0pt;line-height: 8pt;text-align: center;">
                        EFFECTIVE DATE</p>
                    <p class="s5" style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: center;"
                    ><input type="text" name="effective_date"></p>
                </td>
                <td style="width:288pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s3" style="padding-left: 2pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
                        APPLICANT / FIRST NAMED INSURED</p>
                    <p class="s5" style="padding-top: 4pt;padding-left: 5pt;text-indent: 0pt;text-align: left;"
                    ><input type="text" name="insured_name"></p>
                </td>
            </tr>
            <tr style="height:29pt">
                <td style="width:577pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="3">
                    <p class="s4"
                       style="padding-top: 2pt;padding-left: 6pt;padding-right: 97pt;text-indent: 0pt;text-align: left;"
                    >IMPORTANT - If CLAIMS MADE is checked in the COVERAGE / LIMITS section
                        below, this is an application for a claims-made policy. Read all provisions of the policy
                        carefully.</p>
                </td>
            </tr>
        </table>
        <table class="insurance-form" style="border-collapse:collapse;margin-left:7.22425pt" cellspacing="0">
            <tr class="header-row">
                <th class="header-coverages">COVERAGES</th>
                <th class="header-limits">LIMITS</th>
            </tr>
            <tr>
                <td style="padding: 0;">
                    <table class="table-layout" style="border-collapse: collapse;">
                        <tr>
                            <td style="border-bottom: 1px solid black; border-right: 0;">
                                <div>
                                    <input type="checkbox" name="coverage_general" value="1">
                                    <span class="bold-text">COMMERCIAL GENERAL LIABILITY</span>
                                </div>
                                <div class="indent">
                                    <input type="checkbox" name="coverage_claim" value="1">
                                    <span>CLAIMS MADE</span>
                                    <span style="margin-left: 30px;">
                                    <input type="checkbox" name="coverage_occurrence" value="1">
                                    <span>OCCURRENCE</span>
                                </span>
                                </div>
                                <div>
                                    <input type="checkbox" name="coverage_occurrence_protective" value="1">
                                    <span class="bold-text"
                                    >OWNER'S & CONTRACTOR'S PROTECTIVE</span>
                                </div>
                                <div>
                                    <input type="checkbox">
                                    <input type="text" name="coverage_occurrence_other">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-bottom: 1px solid black; border-right: 0; border-top: 0;">
                                <div class="bold-text">DEDUCTIBLES</div>
                                <div>
                                    <input type="checkbox" name="deductible_property_damage" value="1">
                                    <span>PROPERTY DAMAGE</span>
                                    <span style="float: right; margin-right: 40px;">
                                        <input type="text" style="width: 50%" name="deductible_property_damage_cost">
                                    </span>
                                </div>
                                <div>
                                    <input type="checkbox" name="deductible_body_injury" value="1">
                                    <span>BODILY INJURY</span>
                                    <span style="float: right; margin-right: 40px;">
                                        <input type="text" style="width: 50%" name="deductible_body_injury_cost">
                                    </span>
                                </div>
                                <div>
                                    <input type="checkbox">
                                    <input type="text" name="deductible_other" placeholder="aa">
                                    <span style="float: right; margin-right: 40px;">
                                        <input type="text" style="width: 50%" name="deductible_other_cost">
                                    </span>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td style="border-right: 0; vertical-align: middle; padding-left: 150px; border-top: 0; padding-top: 15px; padding-bottom: 15px;">
                                <div>
                                    <input type="checkbox" name="deductible_per_claim" value="1">
                                    <span>PER CLAIM</span>
                                </div>
                                <div>
                                    <input type="checkbox" name="deductible_per_occurrence" value="1">
                                    <span>PER OCCURRENCE</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
                <td style="padding: 0;">
                    <table class="table-layout" style="border-collapse: collapse;">
                        <tr>
                            <td style="padding: 4px; border-bottom: 1px solid black; border-right: 1px solid black;">
                                <div class="two-col-grid">
                                    <div class="bold-text">GENERAL AGGREGATE</div>
                                    <div><input style="width: 50%" type="text" name="coverage_general_limit"></span>
                                    </div>
                                </div>
                                <div>
                                    <div class="bold-text">LIMIT APPLIES PER:</div>
                                    <div style="margin-top: 5px;">
                                        <input type="checkbox" name="coverage_general_policy" value="1">
                                        <span>POLICY</span>
                                        <span style="margin-left: 30px;">
                                        <input type="checkbox" name="coverage_general_location" value="1">
                                        <span>LOCATION</span>
                                    </span>
                                    </div>
                                    <div style="margin-top: 5px;">
                                        <input type="checkbox" name="coverage_general_project" value="1">
                                        <span>PROJECT</span>
                                        <span style="margin-left: 30px;">
                                        <input type="checkbox" name="coverage_general_other" value="1">
                                        <span>OTHER:</span>
                                    </span>
                                    </div>
                                </div>
                                <div class="two-col-grid" style="margin-top: 10px;">
                                    <div class="bold-text">PRODUCTS & COMPLETED OPERATIONS AGGREGATE</div>
                                    <div><span class="dollar-sign"> <input style="width: 50%" type="text"
                                                                           name="coverage_product_aggregate_limit"></span>
                                    </div>
                                </div>
                                <div class="two-col-grid" style="margin-top: 8px;">
                                    <div class="bold-text">PERSONAL & ADVERTISING INJURY</div>
                                    <div><span class="dollar-sign"> <input style="width: 50%" type="text"
                                                                           name="deductible_personal_injury"></span>
                                    </div>
                                </div>
                                <div class="two-col-grid" style="margin-top: 8px;">
                                    <div class="bold-text">EACH OCCURRENCE</div>
                                    <div><span class="dollar-sign"> <input style="width: 50%" type="text"
                                                                           name="deductible_each_occurrence"></span>
                                    </div>
                                </div>
                                <div class="two-col-grid" style="margin-top: 8px;">
                                    <div class="bold-text">DAMAGE TO RENTED PREMISES (each occurrence)</div>
                                    <div><span class="dollar-sign"> <input style="width: 50%" type="text"
                                                                           name="deductible_damage_rented"></span></div>
                                </div>
                                <div class="two-col-grid" style="margin-top: 8px;">
                                    <div class="bold-text">MEDICAL EXPENSE (Any one person)</div>
                                    <div><span class="dollar-sign"> <input style="width: 50%" type="text"
                                                                           name="deductible_expense"></span></div>
                                </div>
                                <div class="two-col-grid" style="margin-top: 8px;">
                                    <div class="bold-text">EMPLOYEE BENEFITS</div>
                                    <div><span class="dollar-sign"> <input style="width: 50%" type="text"
                                                                           name="deductible_benefits"></span></div>
                                </div>
                                <div class="two-col-grid" style="margin-top: 8px;">
                                    <div></div>
                                    <div><span class="dollar-sign"> <input style="width: 50%" type="text"
                                                                           name="deductible_other_benefits"></span></div>
                                </div>
                            </td>
                            <td class="premiums-column" style="width: 200px; padding: 0; border-left: 1px solid black;">
                                <div class="premium-header">PREMIUMS</div>
                                <div class="premium-item">PREMISES/OPERATIONS <br> <input style="width: 50%" type="text"
                                                                                          name="coverage_premium"></div>
                                <div class="premium-item">PRODUCTS <br> <input style="width: 50%" type="text"
                                                                               name="coverage_premium_product"></div>
                                <div class="premium-item">OTHER <br> <input style="width: 50%" type="text"
                                                                            name="coverage_premium_other"></div>
                                <div class="premium-item">TOTAL <br> <input style="width: 50%" type="text"
                                                                            name="coverage_premium_total"></div>
                                <div class="premium-item" style="height: 40px;"></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="endorsements-section">
                    <div class="bold-text">OTHER COVERAGES, RESTRICTIONS AND/OR ENDORSEMENTS (For
                        hired/non-owned auto coverages attach the applicable state Business Auto Section, ACORD 137)
                    </div>
                    <textarea name="other_coverage" id="" style="width: 100%" cols="30" rows="10"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="endorsements-section">
                    <div class="bold-text">
                        <div class="bold-text">
                            APPLICABLE ONLY IN WISCONSIN: IF NON-OWNED ONLY AUTO COVERAGE IS TO BE PROVIDED UNDER THE
                            POLICY:
                        </div>

                        <div style="display: flex; flex-wrap: wrap; align-items: center; gap: 10px; margin-top: 10px;">
                            <span>1. UI UM Coverage</span>
                            <label><input type="radio" name="um_coverage" value="1"/> IS</label>
                            <label><input type="radio" name="um_coverage" value="0"/> IS NOT Available</label>

                            <span>2. Medical Payment Coverage</span>
                            <label><input type="radio" name="medical_coverage" value="1"/> IS</label>
                            <label><input type="radio" name="medical_coverage" value="0"/> IS NOT Available</label>
                        </div>
                    </div>
                </td>
            </tr>

        </table>
        <p style="text-indent: 0pt;text-align: left;"><br/></p>
        <p class="s1" style="padding-bottom: 1pt;padding-left: 10pt;text-indent: 0pt;text-align: left;"
        >SCHEDULE OF HAZARDS (ACORD 211, Schedule of Hazards, may be attached if more space is
            required)</p>
        <table style="border-collapse:collapse;margin-left:7.22425pt" cellspacing="0" width="80%">
            <tr style="height:11pt">
                <td style="width:37pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;text-align: left;">LOC #</p>
                </td>
                <td style="width:32pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 8pt;text-indent: 0pt;text-align: left;">HAZ #</p>
                </td>
                <td style="width:54pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s3"
                       style="padding-top: 3pt;padding-left: 8pt;padding-right: 11pt;text-indent: 0pt;line-height: 88%;text-align: center;">
                        CLASS CODE</p>
                </td>
                <td style="width:51pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s12"
                       style="padding-top: 2pt;padding-left: 12pt;text-indent: 0pt;line-height: 9pt;text-align: left;">
                        PREMIUM</p>
                    <p class="s6" style="padding-left: 17pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                        BASIS</p>
                </td>
                <td style="width:102pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 32pt;text-indent: 0pt;text-align: left;">EXPOSURE</p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s3" style="padding-top: 6pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">TERR</p>
                </td>
                <td style="width:133pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s3" style="text-indent: 0pt;text-align: center;">RATE</p>
                </td>
                <td style="width:132pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s9" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        PREMIUM</p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:64pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PREM / OPS</p>
                </td>
                <td style="width:69pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PRODUCTS</p>
                </td>
                <td style="width:65pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PREM / OPS</p>
                </td>
                <td style="width:67pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s7" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PRODUCTS</p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:37pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="loc_one"></p>
                </td>
                <td style="width:32pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="haze_one"></p>
                </td>
                <td style="width:54pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="class_code_one"></p>
                </td>
                <td style="width:51pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="premium_basis_one"></p>
                </td>
                <td style="width:67pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="exposure_one"></p>
                </td>
                <td style="width:102pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="terr_one"></p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="ops_rate_one"></p>
                </td>
                <td style="width:64pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="product_rate_one"></p>
                </td>
                <td style="width:69pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="ops_premium_one"></p>
                </td>
                <td style="width:65pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="product_premium_one"></p>
                </td>

            </tr>
            <tr style="height:35pt">
                <td style="width:577pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="10">
                    <p class="s7" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">
                        CLASSIFICATION <span class="s6">DESCRIPTION</span></p>
                    <textarea name="classification_one" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
            </tr>

            <tr style="height:11pt">
                <td style="width:37pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;text-align: left;">LOC #</p>
                </td>
                <td style="width:32pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 8pt;text-indent: 0pt;text-align: left;">HAZ #</p>
                </td>
                <td style="width:54pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s3"
                       style="padding-top: 3pt;padding-left: 8pt;padding-right: 11pt;text-indent: 0pt;line-height: 88%;text-align: center;">
                        CLASS CODE</p>
                </td>
                <td style="width:51pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s12"
                       style="padding-top: 2pt;padding-left: 12pt;text-indent: 0pt;line-height: 9pt;text-align: left;">
                        PREMIUM</p>
                    <p class="s6" style="padding-left: 17pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                        BASIS</p>
                </td>
                <td style="width:102pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 32pt;text-indent: 0pt;text-align: left;">EXPOSURE</p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s3" style="padding-top: 6pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">TERR</p>
                </td>
                <td style="width:133pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s3" style="text-indent: 0pt;text-align: center;">RATE</p>
                </td>
                <td style="width:132pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s9" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        PREMIUM</p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:64pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PREM / OPS</p>
                </td>
                <td style="width:69pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PRODUCTS</p>
                </td>
                <td style="width:65pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PREM / OPS</p>
                </td>
                <td style="width:67pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s7" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PRODUCTS</p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:37pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="loc_two"></p>
                </td>
                <td style="width:32pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="haze_two"></p>
                </td>
                <td style="width:54pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="class_code_two"></p>
                </td>
                <td style="width:51pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="premium_basis_two"></p>
                </td>
                <td style="width:67pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="exposure_two"></p>
                </td>
                <td style="width:102pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="terr_two"></p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="ops_rate_two"></p>
                </td>
                <td style="width:64pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="product_rate_two"></p>
                </td>
                <td style="width:69pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="ops_premium_two"></p>
                </td>
                <td style="width:65pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="product_premium_two"></p>
                </td>

            </tr>
            <tr style="height:35pt">
                <td style="width:577pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="10">
                    <p class="s7" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">
                        CLASSIFICATION <span class="s6">DESCRIPTION</span></p>
                    <textarea name="classification_two" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
            </tr>

            <tr style="height:11pt">
                <td style="width:37pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 10pt;text-indent: 0pt;text-align: left;">LOC #</p>
                </td>
                <td style="width:32pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 8pt;text-indent: 0pt;text-align: left;">HAZ #</p>
                </td>
                <td style="width:54pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s3"
                       style="padding-top: 3pt;padding-left: 8pt;padding-right: 11pt;text-indent: 0pt;line-height: 88%;text-align: center;">
                        CLASS CODE</p>
                </td>
                <td style="width:51pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s12"
                       style="padding-top: 2pt;padding-left: 12pt;text-indent: 0pt;line-height: 9pt;text-align: left;">
                        PREMIUM</p>
                    <p class="s6" style="padding-left: 17pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                        BASIS</p>
                </td>
                <td style="width:102pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s6" style="padding-left: 32pt;text-indent: 0pt;text-align: left;">EXPOSURE</p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    rowspan="2">
                    <p class="s3" style="padding-top: 6pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">TERR</p>
                </td>
                <td style="width:133pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s3" style="text-indent: 0pt;text-align: center;">RATE</p>
                </td>
                <td style="width:132pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s9" style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;text-align: center;">
                        PREMIUM</p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:64pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PREM / OPS</p>
                </td>
                <td style="width:69pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PRODUCTS</p>
                </td>
                <td style="width:65pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PREM / OPS</p>
                </td>
                <td style="width:67pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s7" style="padding-top: 1pt;text-indent: 0pt;text-align: center;">PRODUCTS</p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:37pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="loc_three"></p>
                </td>
                <td style="width:32pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="haze_three"></p>
                </td>
                <td style="width:54pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="class_code_three"></p>
                </td>
                <td style="width:51pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="premium_basis_three"></p>
                </td>
                <td style="width:67pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="exposure_three"></p>
                </td>
                <td style="width:102pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="terr_three"></p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="ops_rate_three"></p>
                </td>
                <td style="width:64pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="product_rate_three"></p>
                </td>
                <td style="width:69pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="ops_premium_three"></p>
                </td>
                <td style="width:65pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p><input style="width: 100%" type="text" name="product_premium_three"></p>
                </td>

            </tr>
            <tr style="height:35pt">
                <td style="width:577pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="10">
                    <p class="s7" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">
                        CLASSIFICATION <span class="s6">DESCRIPTION</span></p>
                    <textarea name="classification_three" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
            </tr>

            <tr style="height:35pt">
                <td style="width:100pt; border: 2pt solid; padding: 5pt;" colspan="10">
                    <div
                        style="display: flex; flex-wrap: wrap; gap: 20px; font-family: Arial, sans-serif; font-size: 10pt;">
                        <div>(S) GROSS SALE - PER $1000/SALES</div>
                        <div>(P) PAYROLL - PER $1000/PAY</div>
                        <div>(A) AREA - PER 1000/SQ FT</div>
                        <div>(C) TOTAL COST - PER $1000/COST</div>
                        <div>(M) ADMISSIONS - PER 1000/ADM</div>
                        <div>(U) UNIT - PER UNIT</div>
                        <div>(T) OTHER</div>
                    </div>
                </td>
            </tr>


            <!-- Repeat similar structure for additional rows, adding  to <p> tags -->
        </table>
        <p class="s1" style="padding-bottom: 1pt;padding-left: 10pt;text-indent: 0pt;text-align: left;"
        >CLAIMS MADE (Explain all "Yes” responses)</p>
        <table style="border-collapse:collapse;margin-left:7.11925pt" cellspacing="0" width="80%">
            <tr style="height:11pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s9" style="padding-top: 1pt;padding-left: 3pt;text-indent: 0pt;text-align: left;"
                    >EXPLAIN ALL 'YES" RESPONSES</p>
                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p>
                        <input type="checkbox" name="claim_made" value="1"> YES
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:577pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s6" style="text-indent: 0pt;text-align: left;"> 1. PROPOSED
                        RETROACTIVE DATE: <input type="text" name="claim_made_proposed_date">
                    </p>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:577pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="2">
                    <p class="s6" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">2.
                        ENTRY DATE INTO UNINTERRUPTED CLAIMS MADE COVERAGE: <input type="text"
                                                                                   name="claim_made_entry_date"></p>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">3.
                        HAS ANY PRODUCT, WORK, ACCIDENT, OR LOCATION BEEN EXCLUDED, UNINSURED OR SELF-INSURED FROM ANY
                        PREVIOUS COVERAGE? </p>
                    <textarea name="claim_made_previous_coverage" id="" style="width: 100%" cols="30"
                              rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p></p>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">4.
                        WAS TAIL COVERAGE PURCHASED UNDER ANY PREVIOUS POLICY?</p>
                    <textarea name="claim_made_previous_policy" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p></p>
                </td>
            </tr>
        </table>
        <table class="ebl-form" style="border-collapse:collapse;margin-left:7.22425pt" cellspacing="0" width="80%">
            <tr class="header-row">
                <th colspan="4"><span style="margin-left: -68%;"
                    >EMPLOYEE BENEFITS LIABILITY</span></th>
            </tr>
            <tr>
                <td>
                    <span class="number-label">1.</span>
                    <span class="form-label">DEDUCTIBLE PER CLAIM:</span> <br>
                    <input type="text" name="employee_deductible">
                </td>
                <td>
                    <span class="number-label">3.</span>
                    <span class="form-label">NUMBER OF EMPLOYEES COVERED BY EMPLOYEE BENEFITS PLANS: </span><br>
                    <input type="text" name="employee_covered">

                </td>
            </tr>
            <tr>
                <td>
                    <span class="number-label">2.</span>
                    <span class="form-label">NUMBER OF EMPLOYEES: </span> <br>
                    <input type="text" name="employee_number">
                </td>
                <td>
                    <span class="number-label">4.</span>
                    <span class="form-label">RETROACTIVE DATE:</span><br>
                    <input type="text" name="employee_retroactive_date">
                </td>
            </tr>

        </table>


        <p class="s15" style="padding-top: 6pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">CONTRACTORS</p>

        <p style="text-indent: 0pt;text-align: left;"><br/></p>
        <table style="border-collapse:collapse;margin-left:7.09675pt" cellspacing="0">
            <tr style="height:11pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="5">
                    <p class="s17" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">EXPLAIN
                        ALL <span class="s18">"YES" </span>RESPONSES (For all past or present operations)</p>
                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s18" style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">Y /
                        N</p>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">1. DOES
                        APPLICANT DRAW PLANS, DESIGNS, OR SPECIFICATIONS FOR OTHERS?</p>
                    <textarea name="contractor_draw_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_draw" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">2. DO
                        ANY OPERATIONS INCLUDE BLASTING OR UTILIZE OR STORE EXPLOSIVE MATERIAL?</p>
                    <textarea name="contractor_operation_material_detail" id="" style="width: 100%" cols="30"
                              rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_operation_material" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">3. DO
                        ANY OPERATIONS INCLUDE EXCAVATION, TUNNELING, UNDERGROUND WORK OR EARTH MOVING?</p>
                    <textarea name="contractor_operation_moving_detail" id="" style="width: 100%" cols="30"
                              rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_operation_moving" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">4. DO
                        YOUR SUBCONTRACTORS CARRY COVERAGES OR LIMITS LESS THAN YOURS?</p>
                    <textarea name="contractor_sub_contractor_detail" id="" style="width: 100%" cols="30"
                              rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_sub_contractor" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">5. ARE
                        SUBCONTRACTORS ALLOWED TO WORK WITHOUT PROVIDING YOU WITH A CERTIFICATE OF INSURANCE?</p>
                    <textarea name="contractor_sub_contractor_insurance_detail" id="" style="width: 100%" cols="30"
                              rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_sub_contractor_insurance" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">6. DOES
                        APPLICANT LEASE EQUIPMENT TO OTHERS WITH OR WITHOUT OPERATORS?</p>
                    <textarea name="contractor_lease_equipment_detail" id="" style="width: 100%" cols="30"
                              rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_lease_equipment" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:192pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid Ascendancy;">
                    <p class="s17" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                        DESCRIBE THE TYPE OF WORK SUBCONTRACTED</p>
                    <textarea name="sub_contractor_type" style="width: 180pt; height: 60pt;"></textarea>
                </td>
                <td style="width:122pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_paid" style="width: 110pt;"
                               placeholder="$ PAID TO SUBCONTRACTER"/>
                    </p>
                </td>
                <td style="width:95pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_percentage" style="width: 83pt;"
                               placeholder="% PAID OF WORK"/>
                    </p>
                </td>
                <td style="width:86pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_full_time" style="width: 74pt;"
                               placeholder="FULL TIME STAFF"/>
                    </p>
                </td>
                <td style="width:82pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_part_time" style="width: 70pt;"
                               placeholder="PART TIME STAFF"/>
                    </p>
                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                </td>
            </tr>
        </table>
        <br>
        <h2 style="padding-bottom: 1pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">PRODUCTS / COMPLETED
            OPERATIONS</h2>
        <table style="border-collapse:collapse;margin-left:7.09675pt" cellspacing="0">
            <tr style="height:11pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s17"
                       style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: center;">
                        PRODUCTS</p>
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s17"
                       style="padding-top: 2pt;padding-left: 8pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                        ANNUAL GROSS SALES</p>
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s18"
                       style="padding-top: 2pt;padding-left: 24pt;text-indent: 0pt;line-height: 7pt;text-align: left;">#
                        OF UNITS</p>

                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">TIME IN MARKET</p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">EXPECTED LIFE</p>
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s17"
                       style="padding-top: 2pt;padding-left: 40pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                        INTENDED USE</p>
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <p class="s17"
                       style="padding-top: 2pt;padding-left: 24pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                        PRINCIPAL COMPONENTS</p>
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"></td>
            </tr>
            <tr style="height:23pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_one" style="width: 93pt;"/>
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_salary_one" style="width: 68pt;"/>
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_unit_one" style="width: 67pt;"/>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_time_one" style="width: 24pt;"/>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_life_one" style="width: 24pt;"/>
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured_one" style="width: 111pt;"/>
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <input type="text" name="product_component_one" style="width: 106pt;"/>
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">

                </td>
            </tr>

            <tr style="height:23pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_two" style="width: 93pt;"/>
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_salary_two" style="width: 68pt;"/>
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_unit_two" style="width: 67pt;"/>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_time_two" style="width: 24pt;"/>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_life_two" style="width: 24pt;"/>
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured_two" style="width: 111pt;"/>
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <input type="text" name="product_component_two" style="width: 106pt;"/>
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">

                </td>
            </tr>
            <tr style="height:23pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_three" style="width: 93pt;"/>
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_salary_three" style="width: 68pt;"/>
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_unit_three" style="width: 67pt;"/>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_time_three" style="width: 24pt;"/>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_life_three" style="width: 24pt;"/>
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured_three" style="width: 111pt;"/>
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <input type="text" name="product_component_three" style="width: 106pt;"/>
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">

                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s17" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">EXPLAIN
                        ALL YES" RESPONSES (For all past or present products or operations) PLEASE ATTACH LITERATURE,
                        BROCHURES, LABELS, WARNINGS, ETC.</p>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s18" style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">Y/N</p>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">1. DOES
                        APPLICANT INSTALL, SERVICE OR DEMONSTRATE PRODUCTS?</p>
                    <textarea name="product_install_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_install" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">2.
                        FOREIGN PRODUCTS SOLD, DISTRIBUTED, USED AS COMPONENTS? (If "YES", attach ACORD 815)</p>
                    <textarea name="product_sold_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_sold" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">3.
                        RESEARCH AND DEVELOPMENT CONDUCTED OR NEW PRODUCTS PLANNED?</p>
                    <textarea name="product_research_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_research_detail" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">4.
                        GUARANTEES, WARRANTIES, HOLD HARMLESS AGREEMENTS?</p>
                    <textarea name="product_warranty_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_warranty" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">5.
                        PRODUCTS RELATED TO AIRCRAFT/SPACE INDUSTRY?</p>
                    <textarea name="product_aircraft_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_aircraft" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">6.
                        PRODUCTS RECALLED, DISCONTINUED, CHANGED?</p>
                    <textarea name="product_recall_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_recall" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">7.
                        PRODUCTS OF OTHERS SOLD OR RE-PACKAGED UNDER APPLICANT LABEL?</p>
                    <textarea name="product_other_sold_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_other_sold" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">8.
                        PRODUCTS UNDER LABEL OF OTHERS?</p>
                    <textarea name="product_label_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_label" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">9.
                        VENDORS COVERAGE REQUIRED?</p>
                    <textarea name="product_vendor_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_vendor" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
            <tr style="height:41pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                    colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">10.
                        DOES ANY NAMED INSURED SELL TO OTHER NAMED INSUREDS?</p>
                    <textarea name="product_insured_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured" style="width: 15pt;" maxlength="1"/>
                </td>
            </tr>
        </table>

        <br>
        <h2 style="padding-bottom: 1pt;padding-left: 13pt;text-indent: 0pt;text-align: left;">ADDITIONAL INTEREST /
            CERTIFICATE RECIPIENT </h2>
        <div class="form-section">
            <div class="checkbox-group">
                <div class="checkbox-row"><input type="checkbox" name="interest_additional" value="1"> ADDITIONAL
                    INSURED
                </div>
                <div class="checkbox-row"><input type="checkbox" name="interest_employee" value="1"> EMPLOYEE AS LESSOR
                </div>
                <div class="checkbox-row"><input type="checkbox" name="interest_lender" value="1"> LENDER'S LOSS PAYABLE
                </div>
                <div class="checkbox-row"><input type="checkbox" name="interest_holder" value="1"> LIENHOLDER</div>
                <div class="checkbox-row"><input type="checkbox" name="interest_loss" value="1"> LOSS PAYEE</div>
                <div class="checkbox-row"><input type="checkbox" name="interest_mortgage" value="1"> MORTGAGEE</div>
                <div class="checkbox-row"><input type="checkbox"></div>
                <input type="text" name="interest_other">
            </div>

            <div class="main-content">
                <div class="top-row">
                    <div><strong>ACORD 45 attached for additional names</strong></div>
                    <label><input type="checkbox" name="interest_type" value="edivence"> EVIDENCE:</label>
                    <label><input type="checkbox" name="interest_type" value="certificate"> CERTIFICATE</label>
                </div>

                <div class="flex-row">
                    <div class="address-block">
                        <div>
                            NAME<br>
                            <input type="text" name="interest_name">
                        </div>
                        <div>
                            ADDRESS<br>
                            <textarea name="interest_address" rows="5"></textarea>
                        </div>
                        <div style="margin-top: 10px;">
                            RANK: <input type="text" name="interest_rank">
                        </div>
                        <div class="bottom-field">
                            REFERENCE / LOAN #: <input type="text" name="interest_reference">
                        </div>
                    </div>

                    <div class="interest-block">
                        <div class="row">
                            <div>LOCATION: <input type="text" name="interest_location"></div>
                            <div>BUILDING: <input type="text" name="interest_building"></div>
                        </div>
                        <div class="row">
                            <div>ITEM CLASS: <input type="text" name="interest_item_class"></div>
                            <div>ITEM: <input type="text" name="interest_item"></div>
                        </div>
                        <div class="description">
                            ITEM DESCRIPTION<br>
                            <textarea name="interest_item_description" rows="3"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="acord126-container">
            <div class="acord126-title">GENERAL INFORMATION</div>

            <table class="acord126-table">
                <tr>
                    <td colspan="2">EXPLAIN ALL "YES" RESPONSES (For all past or present operations)</td>
                    <td class="acord126-yn">Y / N</td>
                </tr>

                <tr>
                    <td class="acord126-num">1.</td>
                    <td>ANY MEDICAL FACILITIES PROVIDED OR MEDICAL PROFESSIONALS EMPLOYED OR CONTRACTED?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1" name="information_q_one" type="text"></td>
                </tr>
                <tr>
                    <td class="acord126-num">2.</td>
                    <td>ANY EXPOSURE TO RADIOACTIVE/NUCLEAR MATERIALS?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_two" type="text"></td>
                </tr>
                <tr>
                    <td class="acord126-num">3.</td>
                    <td>DO/HAVE PAST, PRESENT OR DISCONTINUED OPERATIONS INVOLVE STORING, TREATING, DISCHARGING,
                        APPLYING, DISPOSING, OR TRANSPORTING OF HAZARDOUS MATERIAL? (e.g., landfills, wastes, fuel
                        tanks, etc)
                    </td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_three" type="text"></td>
                </tr>
                <tr>
                    <td class="acord126-num">4.</td>
                    <td>ANY OPERATIONS SOLD, ACQUIRED, OR DISCONTINUED IN LAST FIVE (5) YEARS?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_four" type="text"></td>
                </tr>

                <tr>
                    <td class="acord126-num">5.</td>
                    <td>
                        DO YOU RENT OR LOAN EQUIPMENT TO OTHERS?<br><br>
                        <table class="acord126-nested">
                            <tr>
                                <th>EQUIPMENT</th>
                                <th colspan="2">TYPE OF EQUIPMENT</th>
                                <th>INSTRUCTION GIVEN (Y/N)</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="information_equipment_one"></td>
                                <td><label><input type="radio" name="information_equipment_type_one" value="small"
                                                  class="acord126-checkbox"> SMALL TOOLS</label></td>
                                <td><label><input type="radio" name="information_equipment_type_one" value="large"
                                                  class="acord126-checkbox"> LARGE EQUIPMENT</label></td>
                                <td><input class="acord126-input" type="text"
                                           name="information_equipment_instruction_one"></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="information_equipment_two"></td>
                                <td><label><input type="radio" name="information_equipment_type_two" value="small"
                                                  class="acord126-checkbox"> SMALL TOOLS</label></td>
                                <td><label><input type="radio" name="information_equipment_type_two" value="large"
                                                  class="acord126-checkbox"> LARGE EQUIPMENT</label></td>
                                <td><input class="acord126-input" type="text"
                                           name="information_equipment_instruction_two"></td>
                            </tr>

                        </table>
                    </td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_five" type="text"></td>
                </tr>

                <tr>
                    <td class="acord126-num">6.</td>
                    <td>ANY WATERCRAFT, DOCKS, FLOATS OWNED, HIRED OR LEASED?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_six" type="text"></td>
                </tr>
                <tr>
                    <td class="acord126-num">7.</td>
                    <td>ANY PARKING FACILITIES OWNED/RENTED?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_seven" type="text"></td>
                </tr>
                <tr>
                    <td class="acord126-num">8.</td>
                    <td>IS A FEE CHARGED FOR PARKING?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_eight" type="text"></td>
                </tr>
                <tr>
                    <td class="acord126-num">9.</td>
                    <td>RECREATION FACILITIES PROVIDED?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_nine" type="text"></td>
                </tr>

                <tr>
                    <td class="acord126-num">10.</td>
                    <td>
                        ARE THERE ANY LODGING OPERATIONS INCLUDING APARTMENTS? (If “YES”, answer the following):<br><br>
                        <table class="acord126-nested">
                            <tr>
                                <th># APTS</th>
                                <th>TOTAL APT AREA</th>
                                <th colspan="2">DESCRIBE OTHER LODGING OPERATIONS</th>
                            </tr>
                            <tr>
                                <td><input class="acord126-input" name="information_q_apt" type="text"></td>
                                <td><input class="acord126-input" name="information_q_apt_area" type="text"></td>
                                <td colspan="2"><input class="acord126-input" name="information_q_apt_description"
                                                       type="text"></td>
                            </tr>
                        </table>
                    </td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_ten" type="text"></td>
                </tr>

                <tr>
                    <td class="acord126-num">11.</td>
                    <td>
                        IS THERE A SWIMMING POOL ON PREMISES? (Check all that apply)<br>
                        <div class="acord126-check-group">
                            <label><input type="checkbox" name="information_approved_fence" value="1"
                                          class="acord126-checkbox"> APPROVED FENCE</label>
                            <label><input type="checkbox" name="information_limited_access" value="1"
                                          class="acord126-checkbox"> LIMITED ACCESS</label>
                            <label><input type="checkbox" name="information_diving_board" value="1"
                                          class="acord126-checkbox"> DIVING BOARD</label>
                            <label><input type="checkbox" name="information_slide" value="1" class="acord126-checkbox">
                                SLIDE</label>
                            <label><input type="checkbox" name="information_above_ground" value="1"
                                          class="acord126-checkbox"> ABOVE GROUND</label>
                            <label><input type="checkbox" name="information_in_ground" value="1"
                                          class="acord126-checkbox"> IN GROUND</label>
                            <label><input type="checkbox" name="information_lift_guard" value="1"
                                          class="acord126-checkbox"> LIFE GUARD</label>
                        </div>
                    </td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_eleven" type="text"></td>
                </tr>

                <tr>
                    <td class="acord126-num">12.</td>
                    <td>ARE SOCIAL EVENTS SPONSORED?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_twelve" type="text"></td>
                </tr>

                <tr>
                    <td class="acord126-num">13.</td>
                    <td>
                        ARE ATHLETIC TEAMS SPONSORED?<br><br>
                        <table class="acord126-nested">
                            <tr>
                                <th>TYPE OF SPORT</th>
                                <th>CONTACT SPORT (Y/N)</th>
                                <th>AGE GROUP</th>

                            </tr>
                            <tr>
                                <td><input class="acord126-input" name="information_sport_type" type="text"></td>
                                <td><input class="acord126-input" name="information_sport_contact" type="text"></td>
                                <td colspan="3">
                                    <input type="radio" name="information_sport_age" value="1"
                                           class="acord126-checkbox"> 13–18
                                    <input type="radio" name="information_sport_age" value="2"
                                           class="acord126-checkbox">12 & UNDER
                                    <input type="radio" name="information_sport_age" value="3"
                                           class="acord126-checkbox">OVER 18
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">EXTENT OF SPONSORSHIP: <input class="acord126-input" maxlength="1"
                                                                              name="information_sport_sponsorship"
                                                                              type="text"></td>
                            </tr>
                        </table>
                    </td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_q_thirteen" type="text">
                    </td>
                </tr>

                <tr>
                    <td class="acord126-num">14.</td>
                    <td>ARE STRUCTURAL ALTERATIONS CONTEMPLATED?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_fourteen" type="text"></td>
                </tr>
                <tr>
                    <td class="acord126-num">15.</td>
                    <td>ANY DEMOLITION EXPOSURE CONTEMPLATED?</td>
                    <td class="acord126-yn"><input class="acord126-input" maxlength="1"  name="information_fifteen" type="text"></td>
                </tr>
            </table>

            <table class="form-table">
                <tr>
                    <td colspan="7">
                        <p class="s28" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">EXPLAIN ALL "YES"
                            RESPONSES (For all past or present operations)</p>
                    </td>
                    <td style="width: 21pt; text-align: center;">
                        <p class="s9" style="padding-top: 2pt;text-indent: 0pt;text-align: center;">Y / N</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">16.
                            HAS APPLICANT BEEN ACTIVE IN OR IS CURRENTLY ACTIVE IN JOINT VENTURES?</p>
                    </td>
                    <td style="width: 21pt; text-align: center;">
                        <input type="text" class="yn" name="information_sixteen" maxlength="1"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">17.
                            DO YOU LEASE EMPLOYEES TO OR FROM OTHER EMPLOYERS?</p>
                    </td>
                    <td style="width: 21pt; text-align: center;" rowspan="4">
                        <input type="text" class="yn" name="information_seventeen" maxlength="1"/>
                    </td>
                </tr>
                <tr>
                    <td style="width: 19pt; border-right: 2px solid black;" rowspan="3"></td>
                    <td style="width: 169pt;">
                        <p class="s29" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">LEASE TO</p>
                        <input type="text" name="information_lease_to_one"/>
                    </td>
                    <td style="width: 88pt; text-align: center;">
                        <p class="s7" style="text-indent: 0pt;text-align: center;">WORKERS COMPENSATION</p>
                        <p class="s29" style="text-indent: 0pt;line-height: 7pt;text-align: center;">COVERAGE CARRIED
                            (Y/N)</p>
                        <input type="text"   name="information_lease_to_one_coverage"/>
                    </td>
                    <td style="width: 7pt; border-right: 2px solid black;" rowspan="3"></td>
                    <td style="width: 169pt;">
                        <p class="s29" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">LEASE FROM</p>
                        <input type="text" name="information_lease_from_one"/>
                    </td>
                    <td style="width: 86pt; text-align: center;">
                        <p class="s7" style="text-indent: 0pt;text-align: center;">WORKERS COMPENSATION</p>
                        <p class="s29" style="text-indent: 0pt;line-height: 7pt;text-align: center;">COVERAGE CARRIED
                            (Y/N)</p>
                        <input type="text"   name="information_lease_from_one_coverage"/>
                    </td>
                    <td style="width: 18pt; border-right: 2px solid black;" rowspan="3"></td>
                </tr>
                <tr>
                    <td style="width: 169pt;">
                        <input type="text" name="information_lease_to_two"/>
                    </td>
                    <td style="width: 88pt; text-align: center;">
                        <input type="text"   name="information_lease_to_two_coverage"/>
                    </td>
                    <td style="width: 169pt;">
                        <input type="text" name="information_lease_from_two"/>
                    </td>
                    <td style="width: 86pt; text-align: center;">
                        <input type="text"   name="information_lease_from_two_coverage"/>
                    </td>
                </tr>
                <tr>
                    <td style="width: 169pt;">
                        <input type="text" name="information_lease_to_three"/>
                    </td>
                    <td style="width: 88pt; text-align: center;">
                        <input type="text"   name="information_lease_to_three_coverage"/>
                    </td>
                    <td style="width: 169pt;">
                        <input type="text" name="information_lease_from_three"/>
                    </td>
                    <td style="width: 86pt; text-align: center;">
                        <input type="text" name="information_lease_from_three_coverage"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">18.
                            IS THERE A LABOR INTERCHANGE WITH ANY OTHER BUSINESS OR SUBSIDIARIES?</p>
                    </td>
                    <td style="width: 21pt; text-align: center;">
                        <input type="text" class="yn" name="information_eighteen" maxlength="1"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">19.
                            ARE DAY CARE FACILITIES OPERATED OR CONTROLLED?</p>
                    </td>
                    <td style="width: 21pt; text-align: center;">
                        <input type="text" class="yn" name="information_nineteen" maxlength="1"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">20.
                            HAVE ANY CRIMES OCCURRED OR BEEN ATTEMPTED ON YOUR PREMISES WITHIN THE LAST THREE (3)
                            YEARS?</p>
                    </td>
                    <td style="width: 21pt; text-align: center;">
                        <input type="text" class="yn" name="information_twenty" maxlength="1"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">21.
                            IS THERE A FORMAL, WRITTEN SAFETY AND SECURITY POLICY IN EFFECT?</p>
                    </td>
                    <td style="width: 21pt; text-align: center;">
                        <input type="text" class="yn" name="information_twenty_one" maxlength="1"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="7">
                        <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;">22.
                            DOES THE BUSINESSES' PROMOTIONAL LITERATURE MAKE ANY REPRESENTATIONS ABOUT THE SAFETY OR
                            SECURITY OF THE PREMISES?</p>
                    </td>
                    <td style="width: 21pt; text-align: center;">
                        <input type="text" class="yn" name="information_twenty_two" maxlength="1"/>
                    </td>
                </tr>
            </table>

            <h3 style="padding-bottom: 1pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">REMARKS (ACORD 101,
                Additional Remarks Schedule, may be attached if more space is required)</h3>
            <textarea name="remarks" style="width: 100%; height: 100px;"></textarea>

            <h3 style="padding-top: 10pt; padding-left: 10pt;text-indent: 0pt;text-align: left;">SIGNATURE</h3>

            <table class="form-table" style="margin-top: 5px;">
                <tr>
                    <td colspan="2">
                        <p class="s5" style="padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
                            Applicable in AL, AR, DC, LA, MD, NM, RI and Any person who knowingly (or willfully)*
                            presents a false or fraudulent claim for payment of a loss or</p>
                        <p class="s5"
                           style="padding-left: 6pt;padding-right: 46pt;text-indent: 0pt;line-height: 106%;text-align: left;">
                            benefit or knowingly (or willfully)* presents false information in an application for
                            insurance is guilty of a crime and may be subject to fines and confinement in prison.
                            *Applies in MD Only.</p>
                        <p class="s5"
                           style="padding-left: 6pt;padding-right: 46pt;text-indent: -1pt;line-height: 108%;text-align: left;">
                            Applicable in CO: It is unlawful to knowingly provide false, incomplete, or misleading facts
                            or information to an insurance company for the purpose of defrauding or attempting to
                            defraud the company. Penalties may include imprisonment, fines, denial of insurance and
                            civil damages. Any insurance company or agent of an insurance company who knowingly provides
                            false, incomplete, or misleading facts or information to a policyholder or claimant for the
                            purpose of defrauding or attempting to defraud the policyholder or claimant with regard to a
                            settlement or award payable from insurance proceeds shall be reported to the Colorado
                            Division of Insurance within the Department of Regulatory Agencies.</p>
                        <p class="s5"
                           style="padding-left: 6pt;padding-right: 46pt;text-indent: -1pt;line-height: 111%;text-align: left;">
                            Applicable in FL and OK: Any person who knowingly and with intent to injure, defraud, or
                            deceive any insurer files a statement of claim or an application containing any false,
                            incomplete, or misleading information is guilty of a felony (of the third degree)*. *Applies
                            in FL Only.</p>
                        <p class="s5"
                           style="padding-top: 1pt;padding-left: 6pt;padding-right: 46pt;text-indent: -1pt;line-height: 107%;text-align: left;">
                            Applicable in KS: Any person who, knowingly and with intent to defraud, presents, causes to
                            be presented or prepares with knowledge or belief that it will be presented to or by an
                            insurer, purported insurer, broker or any agent thereof, any written, electronic, electronic
                            impulse, facsimile, magnetic, oral, or telephonic communication or statement as part of, or
                            in support of, an application for the issuance of, or the rating of an insurance policy for
                            personal or commercial insurance, or a claim for payment or other benefit pursuant to an
                            insurance policy for commercial or personal insurance which such person knows to contain
                            materially false information concerning any fact material thereto; or conceals, for the
                            purpose of misleading, information concerning any fact material thereto commits a fraudulent
                            insurance act.</p>
                        <p class="s5"
                           style="padding-left: 6pt;padding-right: 46pt;text-indent: -1pt;line-height: 109%;text-align: left;">
                            Applicable in KY, NY, OH and PA: Any person who knowingly and with intent to defraud any
                            insurance company or other person files an application for insurance or statement of claim
                            containing any materially false information or conceals for the purpose of misleading,
                            information concerning any fact material thereto commits a fraudulent insurance act, which
                            is a crime and subjects such person to criminal and civil penalties (not to exceed five
                            thousand dollars and the stated value of the claim for each such violation)*. *Applies in NY
                            Only.</p>
                        <p class="s5"
                           style="padding-top: 2pt;padding-left: 6pt;padding-right: 66pt;text-indent: -1pt;line-height: 111%;text-align: left;">
                            Applicable in ME, TN, VA and WA: It is a crime to knowingly provide false, incomplete or
                            misleading information to an insurance company for the purpose of defrauding the company.
                            Penalties (may)* include imprisonment, fines and denial of insurance benefits. *Applies in
                            ME Only.</p>
                        <p class="s5"
                           style="padding-left: 6pt;padding-right: 66pt;text-indent: -1pt;line-height: 111%;text-align: left;">
                            Applicable in NJ: Any person who includes any false or misleading information on an
                            application for an insurance policy is subject to criminal and civil penalties.</p>
                        <p class="s5" style="padding-left: 4pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
                            Applicable in OR: Any person who knowingly and with intent to defraud or solicit another to
                            defraud the insurer by submitting an application containing a</p>
                        <p class="s5" style="padding-left: 6pt;text-indent: 0pt;text-align: left;">false statement as to
                            any material fact may be violating state law.</p>
                        <p class="s5" style="padding-top: 1pt;padding-left: 4pt;text-indent: 0pt;text-align: left;">
                            Applicable in PR: Any person who knowingly and with the intention of defrauding presents
                            false information in an insurance application, or presents, helps,</p>
                        <p class="s5"
                           style="padding-top: 1pt;padding-left: 6pt;padding-right: 46pt;text-indent: 0pt;line-height: 107%;text-align: justify;">
                            or causes the presentation of a fraudulent claim for the payment of a loss or any other
                            benefit, or presents more than one claim for the same damage or loss, shall incur a felony
                            and, upon conviction, shall be sanctioned for each violation by a fine of not less than five
                            thousand dollars ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term
                            of imprisonment for three (3) years, or both penalties. Should aggravating circumstances
                            [be] present, the penalty thus established may be increased to a maximum of five (5) years,
                            if extenuating circumstances are present, it may be reduced to a minimum of two (2)</p>
                        <p class="s5" style="padding-left: 6pt;text-indent: 0pt;line-height: 8pt;text-align: left;">
                            years.</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <p class="s18" style="padding-left: 6pt;padding-right: 46pt;text-indent: 0pt;text-align: left;">
                            THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT
                            REASONABLE INQUIRY HAS BEEN MADE TO OBTAIN THE <span class="s30">ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.</span>
                        </p>
                    </td>
                </tr>
            </table>

            <table class="form-table" style="margin-top: 5px;">
                <tr>
                    <td style="width: 40%;">
                        <div class="field-label">PRODUCER'S SIGNATURE</div>
                        <div class="signature-field">
                            <input type="text" name="procedure_signature" />

                        </div>
                    </td>
                    <td style="width: 40%;">
                        <div class="field-label">PRODUCER'S NAME (Please Print)</div>
                        <div class="signature-field">
                            <input type="text" name="procedure_name" />

                        </div>
                    </td>
                    <td style="width: 20%;">
                        <div class="field-label">STATE PRODUCER LICENSE NO (Required in Florida)</div>
                        <div class="signature-field">
                            <input type="text" name="procedure_license" />

                        </div>
                    </td>
                </tr>
            </table>

            <table class="form-table" style="margin-top: 5px;">
                <tr>
                    <td style="width: 60%;">
                        <div class="field-label">APPLICANT'S SIGNATURE</div>
                        <div class="signature-field">
                            <input type="text" name="applicant_signature" />
                        </div>
                    </td>
                    <td style="width: 20%;">
                        <div class="field-label">DATE</div>
                        <input type="text" style="text-align: center;" name="applicant_date" value="3/4/2025"/>
                    </td>
                    <td style="width: 20%;">
                        <div class="field-label">NATIONAL PRODUCER NUMBER</div>
                        <div class="signature-field">
                            <input type="text" name="procedure_no" />
                        </div>
                    </td>
                </tr>
            </table>


        </div>


        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>

    </form>
@endsection
