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
    </style>

@endpush
@section('content')

    <form action="{{ route('store-insurance-card') }}" method="POST" class=" mt-4">
        @csrf

        <input type="hidden" name="client_id" value="{{  $clientPolicy->client_id }}">

        <p style="text-indent: 0pt;text-align: left;">

        <table border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td><img width="50px" height="auto" src="https://i.ibb.co/7t9pR9qP/Untitled-design-11.png"/></td>
            </tr>
        </table>
        </p>
        <p class="s1" style="padding-top: 7pt;padding-left: 311pt;text-indent: 0pt;text-align: left;"
        >AGENCY CUSTOMER ID:
            <input type="text" name="agency_customer_id">
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
                                                                           name="deductible_other"></span></div>
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
                            <label><input type="checkbox" name="um_coverage" value="" 1/> IS</label>
                            <label><input type="checkbox" name="um_coverage" value="0"/> IS NOT Available</label>

                            <span>2. Medical Payment Coverage</span>
                            <label><input type="checkbox" name="medical_coverage" value="1"/> IS</label>
                            <label><input type="checkbox" name="medical_coverage" value="0"/> IS NOT Available</label>
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
                        ENTRY DATE INTO UNINTERRUPTED CLAIMS MADE COVERAGE:  <input type="text" name="claim_made_entry_date"></p>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s6" style="padding-left: 3pt;text-indent: 0pt;text-align: left;">3.
                        HAS ANY PRODUCT, WORK, ACCIDENT, OR LOCATION BEEN EXCLUDED, UNINSURED OR SELF-INSURED FROM ANY
                        PREVIOUS COVERAGE? </p>
                    <textarea name="claim_made_previous_coverage" id="" style="width: 100%" cols="30" rows="2"></textarea>

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




        <p class="s15" style="padding-top: 6pt;padding-left: 10pt;text-indent: 0pt;text-align: left;" >CONTRACTORS</p>

        <p style="text-indent: 0pt;text-align: left;"><br /></p>
        <table style="border-collapse:collapse;margin-left:7.09675pt" cellspacing="0">
            <tr style="height:11pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="5">
                    <p class="s17" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >EXPLAIN ALL <span class="s18">"YES" </span>RESPONSES (For all past or present operations)</p>
                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s18" style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">Y / N</p>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >1. DOES APPLICANT DRAW PLANS, DESIGNS, OR SPECIFICATIONS FOR OTHERS?</p>
                    <textarea name="contractor_draw_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_draw" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >2. DO ANY OPERATIONS INCLUDE BLASTING OR UTILIZE OR STORE EXPLOSIVE MATERIAL?</p>
                    <textarea name="contractor_operation_material_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_operation_material" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >3. DO ANY OPERATIONS INCLUDE EXCAVATION, TUNNELING, UNDERGROUND WORK OR EARTH MOVING?</p>
                    <textarea name="contractor_operation_moving_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_operation_moving" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >4. DO YOUR SUBCONTRACTORS CARRY COVERAGES OR LIMITS LESS THAN YOURS?</p>
                    <textarea name="contractor_sub_contractor_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_sub_contractor" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >5. ARE SUBCONTRACTORS ALLOWED TO WORK WITHOUT PROVIDING YOU WITH A CERTIFICATE OF INSURANCE?</p>
                    <textarea name="contractor_sub_contractor_insurance_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_sub_contractor_insurance" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="5">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >6. DOES APPLICANT LEASE EQUIPMENT TO OTHERS WITH OR WITHOUT OPERATORS?</p>
                    <textarea name="contractor_lease_equipment_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="contractor_lease_equipment" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:192pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid Ascendancy;">
                    <p class="s17" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >DESCRIBE THE TYPE OF WORK SUBCONTRACTED</p>
                    <textarea name="sub_contractor_type" style="width: 180pt; height: 60pt;"></textarea>
                </td>
                <td style="width:122pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_paid" style="width: 110pt;" placeholder="$ PAID TO SUBCONTRACTER" />
                    </p>
                </td>
                <td style="width:95pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_percentage" style="width: 83pt;" placeholder="% PAID OF WORK" />
                    </p>
                </td>
                <td style="width:86pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_full_time" style="width: 74pt;" placeholder="FULL TIME STAFF" />
                    </p>
                </td>
                <td style="width:82pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="padding-left: 2pt;text-indent: 0pt;line-height: 10pt;text-align: left;">
                        <input type="text" name="sub_contractor_part_time" style="width: 70pt;" placeholder="PART TIME STAFF" />
                    </p>
                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                 </td>
            </tr>
        </table>
        <br>
        <h2 style="padding-bottom: 1pt;padding-left: 13pt;text-indent: 0pt;text-align: left;" >PRODUCTS / COMPLETED OPERATIONS</h2>
        <table style="border-collapse:collapse;margin-left:7.09675pt" cellspacing="0">
            <tr style="height:11pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s17" style="padding-top: 2pt;padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: center;" >PRODUCTS</p>
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s17" style="padding-top: 2pt;padding-left: 8pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >ANNUAL GROSS SALES</p>
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s18" style="padding-top: 2pt;padding-left: 24pt;text-indent: 0pt;line-height: 7pt;text-align: left;" ># OF UNITS</p>

                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">TIME IN MARKET</p>
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p style="text-indent: 0pt;text-align: left;">EXPECTED LIFE</p>
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s17" style="padding-top: 2pt;padding-left: 40pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >INTENDED USE</p>
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <p class="s17" style="padding-top: 2pt;padding-left: 24pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >PRINCIPAL COMPONENTS</p>
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"></td>
            </tr>
            <tr style="height:23pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_one" style="width: 93pt;" />
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_salary_one" style="width: 68pt;" />
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_unit_one" style="width: 67pt;" />
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_time_one" style="width: 24pt;" />
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_life_one" style="width: 24pt;" />
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured_one" style="width: 111pt;" />
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <input type="text" name="product_component_one" style="width: 106pt;" />
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">

                </td>
            </tr>

            <tr style="height:23pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_two" style="width: 93pt;" />
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_salary_two" style="width: 68pt;" />
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_unit_two" style="width: 67pt;" />
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_time_two" style="width: 24pt;" />
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_life_two" style="width: 24pt;" />
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured_two" style="width: 111pt;" />
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <input type="text" name="product_component_two" style="width: 106pt;" />
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">

                </td>
            </tr>
            <tr style="height:23pt">
                <td style="width:105pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_three" style="width: 93pt;" />
                </td>
                <td style="width:80pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_salary_three" style="width: 68pt;" />
                </td>
                <td style="width:79pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_unit_three" style="width: 67pt;" />
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_time_three" style="width: 24pt;" />
                </td>
                <td style="width:36pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_life_three" style="width: 24pt;" />
                </td>
                <td style="width:123pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured_three" style="width: 111pt;" />
                </td>
                <td style="width:118pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;">
                    <input type="text" name="product_component_three" style="width: 106pt;" />
                </td>
                <td style="width:23pt;border-top-style:solid;border-top-width:2pt;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">

                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s17" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >EXPLAIN ALL YES" RESPONSES (For all past or present products or operations) PLEASE ATTACH LITERATURE, BROCHURES, LABELS, WARNINGS, ETC.</p>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <p class="s18" style="padding-top: 1pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">Y/N</p>
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >1. DOES APPLICANT INSTALL, SERVICE OR DEMONSTRATE PRODUCTS?</p>
                    <textarea name="product_install_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_install" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:11pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >2. FOREIGN PRODUCTS SOLD, DISTRIBUTED, USED AS COMPONENTS? (If "YES", attach ACORD 815)</p>
                    <textarea name="product_sold_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_sold" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >3. RESEARCH AND DEVELOPMENT CONDUCTED OR NEW PRODUCTS PLANNED?</p>
                    <textarea name="product_research_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_research_detail" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >4. GUARANTEES, WARRANTIES, HOLD HARMLESS AGREEMENTS?</p>
                    <textarea name="product_warranty_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_warranty" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >5. PRODUCTS RELATED TO AIRCRAFT/SPACE INDUSTRY?</p>
                    <textarea name="product_aircraft_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_aircraft" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >6. PRODUCTS RECALLED, DISCONTINUED, CHANGED?</p>
                    <textarea name="product_recall_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_recall" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >7. PRODUCTS OF OTHERS SOLD OR RE-PACKAGED UNDER APPLICANT LABEL?</p>
                    <textarea name="product_other_sold_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_other_sold" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >8. PRODUCTS UNDER LABEL OF OTHERS?</p>
                    <textarea name="product_label_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_label" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:35pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >9. VENDORS COVERAGE REQUIRED?</p>
                    <textarea name="product_vendor_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_vendor" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
            <tr style="height:41pt">
                <td style="width:556pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt" colspan="7">
                    <p class="s18" style="padding-left: 3pt;text-indent: 0pt;line-height: 7pt;text-align: left;" >10. DOES ANY NAMED INSURED SELL TO OTHER NAMED INSUREDS?</p>
                    <textarea name="product_insured_detail" id="" style="width: 100%" cols="30" rows="2"></textarea>

                </td>
                <td style="width:21pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                    <input type="text" name="product_insured" style="width: 15pt;" maxlength="1" />
                </td>
            </tr>
        </table>
        <h6 >Acord 126 (2016/09) <span style="margin-left: 20%;">Page 2 Of 4</span></h6>



        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>

    </form>
@endsection
