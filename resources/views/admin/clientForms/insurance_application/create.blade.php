@extends('admin.layouts.app')
@push('styles')

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 1428px;
            margin: 0 auto;
        }

        #printView {
            position: relative;
            background: white;
        }

        .main-content {
            width: 100%;
            margin: 0 auto;
        }

        /* Adjust the applicant container width */
        .applicant-container {
            width: 100% !important;
            max-width: 1428px !important;
            margin: 0 auto !important;
        }

        /* Adjust table widths */
        table {
            width: 100% !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        /* Adjust policy title margins */
        .policy-title {
            margin-left: 0 !important;
            padding-left: 20px;
        }

        /* Adjust attachments title */
        .attachments-title {
            margin-left: 20px !important;
        }

        /* Container for tables */
        .table-wrapper {
            width: 100%;
            max-width: 1428px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Additional specific table adjustments */
        .table-container {
            width: 100% !important;
            max-width: 1428px !important;
            margin: 0 auto !important;
        }

        .policy-wrapper table,
        .attachments-wrapper table,
        .entity-type-table {
            width: 100% !important;
            max-width: 1428px !important;
            margin: 0 auto !important;
        }

        /* Adjust the lines of business table */
        .lines-header {
            margin-left: 0 !important;
            padding-left: 20px;
        }

        /* Adjust contact information table */
        .contact-table {
            width: 100% !important;
            max-width: 1428px !important;
            margin: 0 auto !important;
        }

        /* Adjust entity type table */
        table[style*="width:74.5%"] {
            width: 100% !important;
            max-width: 1428px !important;
            margin: 0 auto !important;
        }

        /* Footer alignment */
        .page-footer {
            width: 100%;
            text-align: center;
            margin: 20px 0;
        }
    </style>




@endpush
@section('content')

    <form action="{{ route('store-insurance-application') }}" method="POST" class=" mt-4">
        @csrf

        <input type="hidden" name="client_id" value="{{  $clientPolicy->client_id }}">
        <input type="hidden" name="created_by" value="{{  auth()->user()->id }}">

        {{--        =========================================PAGE 1======================================================================================--}}
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            .container {
                width: 1000px;
                margin: 20px auto;
                border: 1px solid #000;
            }

            .header {
                display: flex;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid #000;
            }

            .logo {
                padding: 10px;
                width: 150px;
            }

            .logo img {
                width: 100%;
            }

            .title {
                flex-grow: 1;
                text-align: center;
                font-weight: bold;
                font-size: 18px;
            }

            .date-box {
                border-left: 1px solid #000;
                width: 250px;
                height: 60px;
                padding: 5px;
            }

            .date-label {
                text-align: center;
                font-weight: bold;
                font-size: 12px;
                margin-bottom: 10px;
            }

            .date-value {
                text-align: center;
                font-size: 14px;
            }

            .main-content {
                display: flex;
            }

            .left-column {
                width: 40%;
                border-right: 1px solid #000;
            }

            .right-column {
                width: 60%;
            }

            .section {
                border-bottom: 1px solid #000;
                padding: 5px;
            }

            .field {
                display: flex;
                margin-bottom: 5px;
            }

            .label {
                font-weight: bold;
                font-size: 12px;
                margin-right: 5px;
                width: 80px;
            }

            .value {
                font-size: 14px;
                flex-grow: 1;
                padding: 5px;
            }

            .carrier-section,
            .policy-section {
                border-bottom: 1px solid #000;
                padding: 5px;
            }

            .carrier-label,
            .policy-label {
                font-weight: bold;
                font-size: 12px;
                margin-bottom: 5px;
            }

            .carrier-value,
            .policy-value {
                font-size: 14px;
            }

            .split-box {
                display: flex;
            }

            .split-left {
                width: 70%;
                border-right: 1px solid #000;
            }

            .split-right {
                width: 30%;
            }

            .checkbox-row {
                display: flex;
                justify-content: space-between;
                margin-bottom: 5px;
            }

            .checkbox-item {
                display: flex;
                align-items: center;
            }

            .checkbox {
                width: 15px;
                height: 15px;
                border: 1px solid #000;
                margin-right: 5px;
            }

            .status-section {
                padding: 5px;
                border-bottom: 1px solid #000;
            }

            .status-header {
                font-weight: bold;
                font-size: 12px;
                margin-bottom: 10px;
            }

            .lines-header {
                font-weight: bold;
                font-size: 14px;
                padding: 5px;
            }

            .city-state {
                display: flex;
                align-items: center;
                padding: 5px;
            }

            .city {
                margin-right: 15px;
            }

            .state-zip {
                display: flex;
                align-items: center;
            }

            .attachments-wrapper {

                width: 100%;
                border-collapse: collapse;
            }

            .attachments-title {

                margin-left: 172px;
                padding: 3px 5px;
                font-weight: bold;
                font-size: 12px;
                text-align: left;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            td {
                border: 1px solid black;
                padding: 3px 5px;
                vertical-align: middle;
                height: 20px;
            }

            .checkbox-column {
                width: 20px;
                text-align: center;
                padding: 0;
            }

            .label-text {
                font-size: 10px;
                font-family: Arial, sans-serif;
                text-transform: uppercase;
            }

            input[type="checkbox"] {
                margin: 0;
                transform: scale(0.9);
            }

            .policy-wrapper {

                width: 100%;
            }

            .policy-title {
                margin-left: 172px;
                padding: 3px 5px;
                font-weight: bold;
                font-size: 12px;
                text-align: left;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            th,
            td {
                border: 1px solid black;
                padding: 2px;
                vertical-align: middle;
                height: 28px;
                font-size: 10px;
            }

            th {
                font-weight: bold;
                font-size: 8px;
                text-align: center;
                background-color: white;
                height: 14px;
                text-transform: uppercase;
            }

            .policy-date {
                text-align: center;
                font-weight: normal;
            }

            .policy-billing {
                display: flex;
                flex-direction: column;
                height: 100%;
                padding: 0;
            }

            .policy-checkbox-row {
                display: flex;
                align-items: center;
                padding-left: 10px;
                height: 14px;
            }

            .policy-checkbox-label {
                font-size: 10px;
                text-transform: uppercase;
                margin-left: 5px;
            }

            input[type="checkbox"] {
                margin: 0;
                transform: scale(0.9);
            }

            .policy-dollar {
                padding-left: 5px;
                font-weight: bold;
            }

            .policy-col-date {
                width: 10%;
            }

            .policy-col-billing {
                width: 12%;
            }

            .policy-col-payment {
                width: 12%;
            }

            .policy-col-method {
                width: 12%;
            }

            .policy-col-audit {
                width: 8%;
            }

            .policy-col-dollar {
                width: 12%;
            }

            .applicant-container {
                /* Unique name for this specific layout */
                display: flex;
                max-width: 1428px;
                margin-left: 50px;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            td {
                border: 1px solid black;
                padding: 5px;
                vertical-align: top;
            }

            .field-label {
                /* More descriptive than just "label" */
                font-weight: bold;
            }

            .address-block {
                /* Specific to address formatting */
                line-height: 1.4;
            }

            .applicant-left {
                /* Scoped to this section */
                width: 60%;
                margin-right: 10px;
            }

            .applicant-right {
                /* Scoped to this section */
                width: 40%;
            }

            h1 {
                font-size: 14px;
                margin: 0 0 10px 0;
            }

            /* Entity Type Section */
            .entity-type-table {
                border-collapse: collapse;
                width: 90%;
                /* Increased from 74.4% */
                max-width: 1388px;
                /* Increased from 800px */
                margin-left: 50px;
                margin-top: 20px;
                font-size: 12px;
            }

            .entity-type-table td {
                border: 1px solid black;
                padding: 5px;
                vertical-align: middle;
            }

            .entity-checkbox-cell {
                width: 20px;
                text-align: center;
            }

            .entity-label-cell {
                font-weight: bold;
                padding-left: 10px;
            }

            .entity-input-cell {
                font-weight: bold;
                padding-left: 10px;
                white-space: nowrap;
            }

            .entity-combined-cell {
                display: flex;
                align-items: center;
            }
        </style>
        <div class="container" style=" border-collapse: collapse; font-size: 12px;">
            <div class="header">
                <div class="logo">
                </div>
                <div class="title">
                    <div>COMMERCIAL INSURANCE APPLICATION</div>
                    <div style="font-size: 14px; margin-top: 5px;">APPLICANT INFORMATION SECTION</div>
                </div>
                <div class="date-box">
                    <div class="date-label">DATE (MM/DD/YYYY)</div>
                    <div class="date-value">
                        <input type="text" name="invoice_date">
                    </div>
                </div>
            </div>

            <div class="main-content">
                <div class="left-column">
                    <div class="section">
                        <div class="label">AGENCY</div>
                        <div class="value">
                            <input type="text" name="agency_name" placeholder="Producer Name"
                                   value="Aim Insurance Of Texas"/>
                        </div>
                        <div class="value">
                            <input type="text" name="agency_address" placeholder="Producer Address"
                                   value="3322 Shaver St"/>
                        </div>
                        <div class="city-state">
                            <div class="city">
                                <input type="text" name="agency_city" placeholder="Producer City"
                                       value="Pasadena"/>

                            </div>
                            <div class="state-zip">
                                <div>
                                    <input style="width: 50%;  margin-left: 5px;" type="text" name="agency_state"
                                           value="TX"/>
                                </div>
                                <div>
                                    <input style="width: 50%;  margin-left: 5px;" type="text" name="agency_zipcode"
                                           value="77504"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="field">
                            <div class="label">CONTACT NAME:</div>
                            <div class="value">
                                <input type="text" name="contact_name" value="Ibrahim Khan">
                            </div>
                        </div>
                        <div class="field">
                            <div class="label">PHONE (A/C, No, Ext):</div>
                            <div class="value">
                                <input type="text" name="contact_phone_no" value="(713)947-3434">
                            </div>
                        </div>
                        <div class="field">
                            <div class="label">FAX (A/C, No):</div>
                            <div class="value">
                                <input type="text" name="contact_fax_no" value="(713)946-3969">
                            </div>
                        </div>
                        <div class="field">
                            <div class="label">E-MAIL ADDRESS:</div>
                            <div class="value"><input type="text" name="contact_email" value=""></div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="field">
                            <div class="label">CODE:
                                <input type="text" name="code">
                            </div>
                            <div class="label" style="margin-left: 100px;"> SUBCODE:
                                <input type="text" name="sub_code">

                            </div>
                        </div>
                    </div>

                    <div class="section">
                        <div class="field">
                            <div class="label">AGENCY CUSTOMER ID:</div>
                            <div class="value">
                                <input type="text" name="producer_customer_id">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="right-column">
                    <div class="split-box">
                        <div class="split-left">
                            <div class="carrier-section">
                                <div class="carrier-label">CARRIER</div>
                                <div class="carrier-value"><input type="text" name="carrier"></div>
                            </div>
                        </div>
                        <div class="split-right">
                            <div class="carrier-section">
                                <div class="carrier-label">NAIC CODE</div>
                                <div class="carrier-value"><input type="text" name="naic_code"></div>
                            </div>
                        </div>
                    </div>

                    <div class="split-box">
                        <div class="split-left">
                            <div class="policy-section">
                                <div class="policy-label">COMPANY POLICY OR PROGRAM NAME</div>
                                <div class="carrier-value"><input type="text" name="program_name"></div>
                            </div>
                        </div>
                        <div class="split-right">
                            <div class="policy-section">
                                <div class="policy-label">PROGRAM CODE</div>
                                <div class="carrier-value"><input type="text" name="program_code"></div>
                            </div>
                        </div>
                    </div>

                    <div class="policy-section">
                        <div class="policy-label">POLICY NUMBER</div>
                        <div class="carrier-value"><input type="text" name="policy_number"></div>
                    </div>

                    <div class="split-box" style="border-bottom: 1px solid #000;">
                        <div class="split-left">
                            <div class="policy-section" style="border-bottom: 0;">
                                <div class="policy-label">UNDERWRITER</div>
                                <div class="carrier-value"><input type="text" name="under_writer"></div>
                            </div>
                        </div>
                        <div class="split-right">
                            <div class="policy-section" style="border-bottom: 0;">
                                <div class="policy-label">UNDERWRITER OFFICE</div>
                                <div class="carrier-value"><input type="text" name="under_writer_office"></div>
                            </div>
                        </div>
                    </div>


                    <!--transaction table-->
                    <div style="width: 350px; height: 200px; border: 1px solid #000; ">
                        <div
                            style="width: 199px; height: 98px; float: left; padding: 5px 0 0 5px; box-sizing: border-box;">
                            <div
                                style="font-size: 11px; font-weight: bold; text-align: center; margin-bottom: 5px;">
                                STATUS OF TRANSACTION
                            </div>

                            <div style=" align-items: center; margin-bottom: 4px;">
                                <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                       type="checkbox" name="status_quote" value="1">
                                <span style="font-size: 11px;">QUOTE</span>
                            </div>

                            <div style="  align-items: center; margin-bottom: 4px;">
                                <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                       type="checkbox" name="status_bound" value="1">
                                <span style="font-size: 11px;">BOUND (Give Date and/or Attach Copy):</span>
                            </div>

                            <div style=" align-items: center; margin-bottom: 4px;">
                                <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                       type="checkbox" name="status_change" value="1">
                                <span style="font-size: 11px;">CHANGE</span>
                            </div>

                            <div style=" align-items: center; margin-bottom: 4px;">
                                <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                       type="checkbox" name="status_cancel" value="1">
                                <span style="font-size: 11px;">CANCEL</span>
                            </div>

                        </div>
                        <div
                            style="width: 397px; height: 98px; float: left; padding: 5px 0 0 5px; box-sizing: border-box;">
                            <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <span style="font-size: 11px; margin-left: 130px;">
                                    <div style="display: flex; align-items: center;">
                                       <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                              type="checkbox" name="status_renew" value="1">
                                        <span style="font-size: 11px;">RENEW</span>
                                    </div>
                                     <div style="display: flex; align-items: center;">
                                      <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                             type="checkbox" name="status_issue_policy" value="1">
                                            <span style="font-size: 11px;">ISSUE POLICY</span>
                                     </div>
                                </span>


                            </div>

                            <div style="display: flex; align-items: center; font-size: 11px; gap: 20px;">

                                <!-- DATE -->
                                <div style="display: flex; align-items: center; gap: 5px;">
                                    <span>DATE</span>
                                    <input type="text" name="status_date" style="height: 20px;">
                                </div>

                                <!-- Vertical Line -->
                                <div style="height: 20px; width: 1px; background-color: black;"></div>

                                <!-- TIME -->
                                <div style="display: flex; align-items: center; gap: 10px;">
                                    <span>TIME</span>
                                    <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                        <label style="display: flex; align-items: center; gap: 5px;">
                                            <input type="radio" name="status_time" value="AM"
                                                   style="width: 15px; height: 15px;">
                                            AM
                                        </label>
                                        <label style="display: flex; align-items: center; gap: 5px;">
                                            <input type="radio" name="status_time" value="PM"
                                                   style="width: 15px; height: 15px;">
                                            PM
                                        </label>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                </div>
                <!--end of transaction-->
            </div>


            <div class="lines-header" style=" font-weight: bold; padding: 5px;margin-left: 50px;">LINES OF
                BUSINESS
            </div>

            <table style="width: 74.4%; border-collapse: collapse; font-size: 12px;margin-left: 50px;">
                <tr style=" font-weight: bold;">
                    <td style="border: 1px solid #000; padding: 5px;">INDICATE LINES OF BUSINESS</td>
                    <td style="border: 1px solid #000; padding: 5px; text-align: center;">PREMIUM</td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px; text-align: center;">PREMIUM</td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px; text-align: center;">PREMIUM</td>
                </tr>

                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_boiler" value="1">

                            <div>BOILER & MACHINERY</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_boiler_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_cyber" value="1">

                            <div>CYBER AND PRIVACY</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_cyber_limit"
                                                                               style="height: 20px;"></td>

                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_yacht" value="1">

                            <div>YACHT</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_yacht_limit"
                                                                               style="height: 20px;"></td>
                </tr>

                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_auto" value="1">

                            <div>BUSINESS AUTO</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_auto_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_fiduciary" value="1">

                            <div>FIDUCIARY LIABILITY</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text"
                                                                               name="business_fiduciary_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_owner" value="1">

                            <div>BUSINESS OWNERS</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_owner_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_garage" value="1">

                            <div>GARAGE AND DEALERS</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_garage_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_commercial_gl" value="1">

                            <div>COMMERCIAL GENERAL LIABILITY</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text"
                                                                               name="business_commercial_gl_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_liquor" value="1">

                            <div>LIQUOR LIABILITY</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_liquor_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_inland" value="1">

                            <div>COMMERCIAL INLAND MARINE</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_inland_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_motor" value="1">

                            <div>MOTOR CARRIER</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_motor_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_owner" value="1">

                            <div>COMMERCIAL PROPERTY</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_motor_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_trucker" value="1">

                            <div>TRUCKERS</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_trucker_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                </tr>

                <tr>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_crime" value="1">

                            <div>CRIME</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text" name="business_crime_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;">
                        <div style="display: flex; align-items: center;">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="business_umbrella" value="1">

                            <div>UMBRELLA</div>
                        </div>
                    </td>
                    <td style="border: 1px solid #000; padding: 5px;">$ <input type="text"
                                                                               name="business_umbrella_limit"
                                                                               style="height: 20px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                    <td style="border: 1px solid #000; padding: 5px;"></td>
                </tr>
            </table>

            <!--Strat of second table-->
            <div class="attachments-wrapper">
                <div class="attachments-title">ATTACHMENTS</div>
                <table style="width: 74.4%; border-collapse: collapse; font-size: 12px;margin-left: 50px;">
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_account_receivable" value="1">
                        </td>
                        <td class="label-text">ACCOUNTS RECEIVABLE / VALUABLE PAPERS</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_glass" value="1">
                        </td>
                        <td class="label-text">GLASS AND SIGN SECTION</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_statement" value="1">
                        </td>
                        <td class="label-text">STATEMENT / SCHEDULE OF VALUES</td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_additional_interest" value="1">
                        </td>
                        <td class="label-text">ADDITIONAL INTEREST SCHEDULE</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_hotel" value="1">
                        </td>
                        <td class="label-text">HOTEL / MOTEL SUPPLEMENT</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_state" value="1">
                        </td>
                        <td class="label-text">STATE SUPPLEMENT (if applicable)</td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_additional_premises" value="1">
                        </td>
                        <td class="label-text">ADDITIONAL PREMISES INFORMATION SCHEDULE</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_installation" value="1">
                        </td>
                        <td class="label-text">INSTALLATION / BUILDERS RISK SECTION</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_vacant" value="1">
                        </td>
                        <td class="label-text">VACANT BUILDING SUPPLEMENT</td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_apartment" value="1">
                        </td>
                        <td class="label-text">APARTMENT BUILDING SUPPLEMENT</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_liability_exposure" value="1">
                        </td>
                        <td class="label-text">INTERNATIONAL LIABILITY EXPOSURE SUPPLEMENT</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_vehicle" value="1">
                        </td>
                        <td class="label-text">VEHICLE SCHEDULE</td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_condo" value="1">
                        </td>
                        <td class="label-text">CONDO ASSN BYLAWS (for D&O Coverage only)</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_property_exposure" value="1">
                        </td>
                        <td class="label-text">INTERNATIONAL PROPERTY EXPOSURE SUPPLEMENT</td>
                        <td class="checkbox-column">

                        </td>
                        <td class="label-text">
                            <input type="text" name="attachment_other_one" style="height: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_contractor" value="1">
                        </td>
                        <td class="label-text">CONTRACTORS SUPPLEMENT</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_loss" value="1">
                        </td>
                        <td class="label-text">LOSS SUMMARY</td>
                        <td class="checkbox-column">

                        </td>
                        <td class="label-text">
                            <input type="text" name="attachment_other_two" style="height: 20px;">
                        </td>

                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_coverage" value="1">
                        </td>
                        <td class="label-text">COVERAGES SCHEDULE</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_cargo" value="1">
                        </td>
                        <td class="label-text">OPEN CARGO SECTION</td>
                        <td class="checkbox-column">

                        </td>
                        <td class="label-text">
                            <input type="text" name="attachment_other_three" style="height: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_dealer" value="1">
                        </td>
                        <td class="label-text">DEALERS SECTION</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_premium" value="1">
                        </td>
                        <td class="label-text">PREMIUM PAYMENT SUPPLEMENT</td>
                        <td class="checkbox-column">

                        </td>
                        <td class="label-text">
                            <input type="text" name="attachment_other_four" style="height: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_driver" value="1">
                        </td>
                        <td class="label-text">DRIVER INFORMATION SCHEDULE</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_professional" value="1">
                        </td>
                        <td class="label-text">PROFESSIONAL LIABILITY SUPPLEMENT</td>
                        <td class="checkbox-column">

                        </td>
                        <td class="label-text">
                            <input type="text" name="attachment_other_five" style="height: 20px;">
                        </td>
                    </tr>
                    <tr>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_electronic" value="1">
                        </td>
                        <td class="label-text">ELECTRONIC DATA PROCESSING SECTION</td>
                        <td class="checkbox-column">
                            <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                                   name="attachment_restaurant" value="1">
                        </td>
                        <td class="label-text">RESTAURANT / TAVERN SUPPLEMENT</td>
                        <td class="checkbox-column">

                        </td>
                        <td class="label-text">
                            <input type="text" name="attachment_other_six" style="height: 20px;">
                        </td>
                    </tr>
                </table>
            </div>
            <!--end of table-->

            <!--Policy infromation-->
            <div class="policy-wrapper">
                <div class="policy-title">POLICY INFORMATION</div>
                <table style="width: 74.4%; border-collapse: collapse; font-size: 12px;margin-left: 50px;">
                    <tr>
                        <th class="policy-col-date">PROPOSED EFF DATE</th>
                        <th class="policy-col-date">PROPOSED EXP DATE</th>
                        <th class="policy-col-billing">BILLING PLAN</th>
                        <th class="policy-col-payment">PAYMENT PLAN</th>
                        <th class="policy-col-method">METHOD OF PAYMENT</th>
                        <th class="policy-col-audit">AUDIT</th>
                        <th class="policy-col-dollar">DEPOSIT</th>
                        <th class="policy-col-dollar">MINIMUM<br>PREMIUM</th>
                        <th class="policy-col-dollar">POLICY PREMIUM</th>
                    </tr>
                    <tr style="height: 28px;">
                        <td class="policy-date">
                            <input type="text" name="policy_effective_date" style="width: 90%;  margin-left: 5px;">
                        </td>
                        <td class="policy-date">
                            <input type="text" name="policy_expiration_date" style="width: 90%;  margin-left: 5px;">
                        </td>
                        <td style="padding: 0;">
                            <table style="border: none; height: 100%;">
                                <tr style="height: 14px; border: none;">
                                    <td style="border: none; border-bottom: 1px solid transparent; padding: 0;">
                                        <div class="policy-checkbox-row">
                                            <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                                   type="checkbox"
                                                   name="policy_billing_plan" value="direct">
                                            <label for="direct" class="policy-checkbox-label">DIRECT</label>
                                        </div>
                                    </td>
                                </tr>
                                <tr style="height: 14px; border: none;">
                                    <td style="border: none; padding: 0;">
                                        <div class="policy-checkbox-row">
                                            <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                                   type="checkbox"
                                                   name="policy_billing_plan" value="agency">
                                            <label for="agency" class="policy-checkbox-label">AGENCY</label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>

                        <td><span class="policy-dollar">$<input type="text" style="width: 90%;  margin-left: 5px;"
                                                                name="policy_payment_plan"> </span></td>
                        <td><span class="policy-dollar">$<input type="text" style="width: 90%;  margin-left: 5px;"
                                                                name="policy_payment_method"> </span></td>
                        <td><span class="policy-dollar">$<input type="text" style="width: 90%;  margin-left: 5px;"
                                                                name="policy_audit"> </span></td>
                        <td><span class="policy-dollar">$<input type="text" style="width: 90%;  margin-left: 5px;"
                                                                name="policy_deposit"> </span></td>
                        <td><span class="policy-dollar">$<input type="text" style="width: 90%;  margin-left: 5px;"
                                                                name="policy_minimum_premium"> </span></td>
                        <td><span class="policy-dollar">$<input type="text" style="width: 90%;  margin-left: 5px;"
                                                                name="policy_policy_premium"> </span></td>

                    </tr>
                </table>
            </div>
            <!--End of policy information-->

            <!--start of application-->
            <div class="policy-title">APPLICANT INFORMATION</div>
            <div class="applicant-container" style="width: 610px;">
                <div class="applicant-left">
                    <table>
                        <tr>
                            <td colspan="3" class="field-label">NAME (First Named Insured) AND MAILING ADDRESS
                                (including ZIP+4)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="address-block">
                                <input type="text" name="applicant_one_name" placeholder="Name"
                                       value="JJH CONSTRUCTION LLC"/>
                                <br>
                                <input type="text" name="applicant_one_address" placeholder="Producer Name"
                                       value="22402 Sierra Lake Ct"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height: 68px;">
                                <input type="text" name="applicant_one_city" placeholder="Producer City"
                                       value="Katy"/>
                                <br>
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_state"
                                       value="TX"/>

                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_zipcode"
                                       value="77494"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="applicant-right">
                    <table style="width: 93%;">
                        <tr>
                            <td class="field-label">GL CODE</td>
                            <td class="field-label">SIC</td>
                            <td class="field-label">NAICS</td>
                            <td class="field-label">FEIN OR SOC SEC #</td>
                        </tr>
                        <tr>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_gl_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_sic_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_naic_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_soc_code"
                                       value=""/></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="field-label">BUSINESS PHONE #:</td>
                            <td colspan="2">
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_phone"
                                       value="(713)516-4040"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="field-label">WEBSITE ADDRESS
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_one_website"
                                       value=""/>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <table
                style="width:74.5%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 12px;margin-left: 175px; table-layout: fixed;"
                border="1">
                <tr>
                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_corporation"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">CORPORATION</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_joint_adventure"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">JOINT VENTURE</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_non_profit"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">NOT FOR PROFIT ORG</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_sub_chapter"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">SUBCHAPTER "S" CORPORATION</td>
                </tr>

                <tr>
                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_individual"
                                                                    value="1"></td>
                    <td style="padding: 2px;">INDIVIDUAL</td>

                    <td style="width:5%; text-align:center;"></td>
                    <td colspan="1" style="padding: 2px;">
                        LLC AND MANAGERS<br>
                        NO. OF MEMBERS <input style="width: 50%;  margin-left: 5px;" type="text"
                                              name="applicant_one_members"
                                              value=" "/>
                    </td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_partnership"
                                                                    value="1"></td>
                    <td style="padding: 2px;">PARTNERSHIP</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_trust"
                                                                    value="1"></td>
                    <td style="padding: 2px;">TRUST</td>
                </tr>
            </table>

            <div class="applicant-container" style="width: 610px;">
                <div class="applicant-left">
                    <table>
                        <tr>
                            <td colspan="3" class="field-label">NAME (First Named Insured) AND MAILING ADDRESS
                                (including ZIP+4)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="address-block">
                                <input type="text" name="applicant_two_name" placeholder="Name"
                                       value="JJH CONSTRUCTION LLC"/>
                                <br>
                                <input type="text" name="applicant_two_address" placeholder="Producer Name"
                                       value="22402 Sierra Lake Ct"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height: 68px;">
                                <input type="text" name="applicant_two_city" placeholder="Producer City"
                                       value="Katy"/>
                                <br>
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_state"
                                       value="TX"/>

                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_zipcode"
                                       value="77494"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="applicant-right">
                    <table style="width: 93%;">
                        <tr>
                            <td class="field-label">GL CODE</td>
                            <td class="field-label">SIC</td>
                            <td class="field-label">NAICS</td>
                            <td class="field-label">FEIN OR SOC SEC #</td>
                        </tr>
                        <tr>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_gl_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_sic_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_naic_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_soc_code"
                                       value=""/></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="field-label">BUSINESS PHONE #:</td>
                            <td colspan="2">
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_phone"
                                       value="(713)516-4040"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="field-label">WEBSITE ADDRESS
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_two_website"
                                       value=""/>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <table
                style="width:74.5%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 12px;margin-left: 175px; table-layout: fixed;"
                border="1">
                <tr>
                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_corporation"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">CORPORATION</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_joint_adventure"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">JOINT VENTURE</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_non_profit"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">NOT FOR PROFIT ORG</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_sub_chapter"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">SUBCHAPTER "S" CORPORATION</td>
                </tr>

                <tr>
                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_individual"
                                                                    value="1"></td>
                    <td style="padding: 2px;">INDIVIDUAL</td>

                    <td style="width:5%; text-align:center;"></td>
                    <td colspan="1" style="padding: 2px;">
                        LLC AND MANAGERS<br>
                        NO. OF MEMBERS <input style="width: 50%;  margin-left: 5px;" type="text"
                                              name="applicant_two_members"
                                              value=" "/>
                    </td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_partnership"
                                                                    value="1"></td>
                    <td style="padding: 2px;">PARTNERSHIP</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_trust"
                                                                    value="1"></td>
                    <td style="padding: 2px;">TRUST</td>
                </tr>
            </table>

            <div class="applicant-container" style="width: 610px;">
                <div class="applicant-left">
                    <table>
                        <tr>
                            <td colspan="3" class="field-label">NAME (First Named Insured) AND MAILING ADDRESS
                                (including ZIP+4)
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="address-block">
                                <input type="text" name="applicant_three_name" placeholder="Name"
                                       value="JJH CONSTRUCTION LLC"/>
                                <br>
                                <input type="text" name="applicant_three_address" placeholder="Producer Name"
                                       value="22402 Sierra Lake Ct"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" style="height: 68px;">
                                <input type="text" name="applicant_three_city" placeholder="Producer City"
                                       value="Katy"/>
                                <br>
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_three_state"
                                       value="TX"/>

                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_three_zipcode"
                                       value="77494"/>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="applicant-right">
                    <table style="width: 93%;">
                        <tr>
                            <td class="field-label">GL CODE</td>
                            <td class="field-label">SIC</td>
                            <td class="field-label">NAICS</td>
                            <td class="field-label">FEIN OR SOC SEC #</td>
                        </tr>
                        <tr>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_three_gl_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text"
                                       name="applicant_three_sic_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text"
                                       name="applicant_three_naic_code"
                                       value=""/></td>
                            <td><input style="width: 50%;  margin-left: 5px;" type="text"
                                       name="applicant_three_soc_code"
                                       value=""/></td>
                        </tr>
                        <tr>
                            <td colspan="2" class="field-label">BUSINESS PHONE #:</td>
                            <td colspan="2">
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_three_phone"
                                       value="(713)516-4040"/>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="4" class="field-label">WEBSITE ADDRESS
                                <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_three_website"
                                       value=""/>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
            <table
                style="width:74.5%; border-collapse: collapse; font-family: Arial, sans-serif; font-size: 12px;margin-left: 175px; table-layout: fixed;"
                border="1">
                <tr>
                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_corporation"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">CORPORATION</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox"
                                                                    name="applicant_three_joint_adventure" value="1">
                    </td>
                    <td style="width:20%; padding: 2px;">JOINT VENTURE</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_non_profit"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">NOT FOR PROFIT ORG</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_sub_chapter"
                                                                    value="1"></td>
                    <td style="width:20%; padding: 2px;">SUBCHAPTER "S" CORPORATION</td>
                </tr>

                <tr>
                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_individual"
                                                                    value="1"></td>
                    <td style="padding: 2px;">INDIVIDUAL</td>

                    <td style="width:5%; text-align:center;"></td>
                    <td colspan="1" style="padding: 2px;">
                        LLC AND MANAGERS<br>
                        NO. OF MEMBERS <input style="width: 50%;  margin-left: 5px;" type="text"
                                              name="applicant_three_members"
                                              value=" "/>
                    </td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_partnership"
                                                                    value="1"></td>
                    <td style="padding: 2px;">PARTNERSHIP</td>

                    <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_trust"
                                                                    value="1"></td>
                    <td style="padding: 2px;">TRUST</td>
                </tr>
            </table>
            <!--End of application is1-->

            <!--start of application-->


            <!--End of application 3rd-->
            <div class="policy-title"><B> ACORD 125(2016/03) <b style="margin-left: 300px;"> Page 1 Of 4</b>
                    <b style="margin-left: 102px;">@1993-2015 ACORD CORPORATION. ALL rights Reserved.</b>
                </B>
                <Center>
                    <div><b>The ACORD name and logo are registered marks of ACORD</b></div>
                </Center>
            </div>


        </div>

        {{--===================================================PAGE 2==============================================================--}}

        <style>
            .table-container {
                width: 100%;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
            }

            .table-cell {
                border: 1px solid black;
                padding: 4px;
                font-size: 12px;
                vertical-align: top;
            }

            .checkbox-box {
                width: 12px;
                height: 12px;
                border: 1px solid black;
                display: inline-block;
                margin-right: 4px;
            }

            .text-bold {
                font-weight: bold;
            }

            .align-right {
                text-align: right;
            }

            .divider-line {
                margin: 4px 0;
                border-top: 1px solid black;
            }

            /* Specific width classes */
            .width-8 {
                width: 8%;
            }

            .width-10 {
                width: 10%;
            }

            .width-22 {
                width: 22%;
            }

            .width-40 {
                width: 40%;
            }

            body {
                font-family: Arial, sans-serif;
                font-size: 10pt;
                padding: 20px;
            }

            h2 {
                text-align: left;
                font-size: 14pt;
                margin-left: 128px;
            }

            .customer-id {
                text-align: right;
                margin-bottom: 10px;
            }

            table {
                width: 80%;
                margin: 0 auto;
                border-collapse: collapse;
                border: 2px solid black;
            }

            td {
                padding: 6px;
                vertical-align: top;
            }

            .section-label {
                font-weight: bold;
            }

            .checkbox-group {
                display: flex;
                gap: 10px;
                flex-wrap: wrap;
                margin-top: 4px;
            }

            .nb-table {
                width: 100%;
                border-collapse: collapse;
                font-family: Arial, sans-serif;
            }

            .nb-th,
            .nb-td {
                border: 1px solid black;
                padding: 4px;
                font-size: 12px;
            }

            .nb-checkbox {
                width: 12px;
                height: 12px;
                border: 1px solid black;
                display: inline-block;
                margin-right: 4px;
            }

            .nb-bold {
                font-weight: bold;
            }

            .nb-checkbox-row td {
                padding: 2px 4px;
            }

            .nb-description-cell {
                height: 150px;
                vertical-align: top;
            }

            .nb-percent-cell {
                text-align: center;
            }


            .acord-container {
                width: 100%;
                border: 2px solid black;
                border-collapse: collapse;
            }

            .acord-table,
            .acord-table td,
            .acord-table th {
                border: 1px solid black;
                border-collapse: collapse;
                padding: 4px;
                vertical-align: top;
            }

            .acord-table {
                width: 100%;
            }

            .acord-checkbox {
                display: flex;
                align-items: flex-start;
                gap: 4px;
                margin-bottom: 4px;
            }

            .acord-checkbox input {
                margin-top: 2px;
            }

            .interest-col {
                width: 25%;
            }

            .name-col {
                width: 35%;
            }

            .evidence-col {
                width: 10%;
            }

            .item-interest-col {
                width: 30%;
            }

            .acord-row {
                display: flex;
            }

            .acord-section {
                display: flex;
                flex-wrap: wrap;
            }

            .acord-row label {
                display: inline-block;
            }

            .subtable td {
                border: none;
                padding: 2px 4px;
            }

            .bold {
                font-weight: bold;
            }

            .full-width {
                /* width: 100%; */
                border-top: 1px solid black;
                border-bottom: 1px solid black;
                /* padding: 4px; */
            }

            .page-footer {
                text-align: center;
                font-weight: bold;
                padding-top: 6px;
            }
        </style>
        <div class="container">
            <div class="customer-id">
                AGENCY CUSTOMER ID:
                _____________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </div>
            <h2>CONTACT INFORMATION</h2>
            <table style="width: 93.2%">
                <tr>
                    <td colspan="6" class="section-label">CONTACT TYPE:
                        <input style="width: 50%;  margin-left: 5px;" type="text" name="contact_info_type_one"/>
                    </td>
                    <td colspan="6" class="section-label">CONTACT TYPE:
                        <input style="width: 50%;  margin-left: 5px;" type="text" name="contact_info_type_two"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">CONTACT NAME: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                         name="contact_info_name_one"/></td>
                    <td colspan="6">CONTACT NAME: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                         name="contact_info_name_two"/></td>
                </tr>
                <tr>
                    <td colspan="3">
                        PRIMARY PHONE #:
                        <div class="checkbox-group">
                            <label><input type="radio" name="contact_info_pp_type_one" value="home"> HOME</label>
                            <label><input type="radio" name="contact_info_pp_type_one" value="bus"> BUS</label>
                            <label><input type="radio" name="contact_info_pp_type_one" value="cell"> CELL</label>
                        </div>
                    </td>
                    <td colspan="3">
                        SECONDARY PHONE #:
                        <div class="checkbox-group">
                            <label><input type="radio" name="contact_info_sp_type_one" value="home"> HOME</label>
                            <label><input type="radio" name="contact_info_sp_type_one" value="bus"> BUS</label>
                            <label><input type="radio" name="contact_info_sp_type_one" value="cell"> CELL</label>
                        </div>
                    </td>
                    <td colspan="3">
                        PRIMARY PHONE #:
                        <div class="checkbox-group">
                            <label><input type="radio" name="contact_info_pp_type_two" value="home"> HOME</label>
                            <label><input type="radio" name="contact_info_pp_type_two" value="bus"> BUS</label>
                            <label><input type="radio" name="contact_info_pp_type_two" value="cell"> CELL</label>
                        </div>
                    </td>
                    <td colspan="3">
                        SECONDARY PHONE #:
                        <div class="checkbox-group">
                            <label><input type="radio" name="contact_info_sp_type_two" value="home"> HOME</label>
                            <label><input type="radio" name="contact_info_sp_type_two" value="bus"> BUS</label>
                            <label><input type="radio" name="contact_info_sp_type_two" value="cell"> CELL</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td colspan="6">PRIMARY E-MAIL ADDRESS: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                   name="contact_info_name_onecontact_info_p_email_one"/>
                    </td>
                    <td colspan="6">PRIMARY E-MAIL ADDRESS: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                   name="contact_info_name_onecontact_info_p_email_two"/>
                    </td>

                </tr>
                <tr>
                    <td colspan="6">SECONDARY E-MAIL ADDRESS:<input style="width: 50%;  margin-left: 5px;" type="text"
                                                                    name="contact_info_s_email_one"/></td>
                    <td colspan="6">SECONDARY E-MAIL ADDRESS:<input style="width: 50%;  margin-left: 5px;" type="text"
                                                                    name="contact_info_s_email_two"/></td>
                </tr>
            </table>
            <!--premisses information start 1st-->
            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td class="table-cell width-8"><span class="text-bold">LOC #
                            <input style="width: 50%;  margin-left: 5px;" type="text" name="premises_loc_one"/>
                        </span></td>
                    <td class="table-cell width-40"><span class="text-bold">STREET
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_street_one"/> </span></td>
                    <td class="table-cell width-10">
                        <span class="text-bold">CITY LIMITS</span><br>
                        <input type="checkbox" name="premises_city_limit_one" value="inside"> INSIDE<br>
                        <input type="checkbox" name="premises_city_limit_one" value="outside"> OUTSIDE
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold">INTEREST</span><br>
                        <input type="checkbox" name="premises_interest_one" value="owner"> OWNER<br>
                        <input type="checkbox" name="premises_interest_one" value="tenant"> TENANT
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL
                           <input style="width: 50%;  margin-left: 5px;" type="text" name="premises_full_employee_one"/>
                        </span><br>
                    </td>
                    <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_annual_revenue_one"/>
</span>
                        <hr class="divider-line">
                        <span class="text-bold">OCCUPIED AREA:</span>
                        <span class="align-right">

                            SQ FT</span>
                        <br>


                    </td>
                </tr>
                <tr>
                    <td class="table-cell"><span class="text-bold">BLD # <input style="width: 50%;  margin-left: 5px;"
                                                                                type="text"
                                                                                name="premises_bld_one"/></span></td>
                    <td class="table-cell">
                        <span class="text-bold">CITY: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                             name="premises_city_one"/></span>
                    </td>
                    <td class="table-cell"><span class="text-bold">STATE: <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text" name="premises_state_one"/></span>
                    </td>
                    <td class="table-cell" rowspan="2"></td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold"># PART TIME EMPL <input style="width: 50%;  margin-left: 5px;"
                                                                        type="text" name="premises_part_employee_one"/></span>
                    </td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_public_area_one"/></span><br>
                        <hr class="divider-line">
                        <span class="text-bold">TOTAL BUILDING AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_building_area_one"/></span><br>
                    </td>

                </tr>
                <tr>
                    <td class="table-cell"></td>
                    <td class="table-cell"><span class="text-bold">COUNTRY: <input
                                style="width: 50%;  margin-left: 5px;" type="text" name="premises_country_one"/></span>
                    </td>
                    <td class="table-cell"><span class="text-bold">ZIP: <input style="width: 50%;  margin-left: 5px;"
                                                                               type="text" name="premises_zipcode_one"/></span>
                    </td>
                </tr>
            </table>
            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                        OPERATIONS:
                        <textarea name="premises_description_one" rows="5" style="width: 100%"></textarea>
                    </td>
                    <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                        <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                        <input type="radio" name="premises_leased_one" value="1"> YES<br>
                        <input type="radio" name="premises_leased_one" value="0"> NO
                    </td>
                </tr>
            </table>

            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td class="table-cell width-8"><span class="text-bold">LOC #
                            <input style="width: 50%;  margin-left: 5px;" type="text" name="premises_loc_two"/>
                        </span></td>
                    <td class="table-cell width-40"><span class="text-bold">STREET
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_street_two"/> </span></td>
                    <td class="table-cell width-10">
                        <span class="text-bold">CITY LIMITS</span><br>
                        <input type="checkbox" name="premises_city_limit_two" value="inside"> INSIDE<br>
                        <input type="checkbox" name="premises_city_limit_two" value="outside"> OUTSIDE
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold">INTEREST</span><br>
                        <input type="checkbox" name="premises_interest_two" value="owner"> OWNER<br>
                        <input type="checkbox" name="premises_interest_two" value="tenant"> TENANT
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL
                           <input style="width: 50%;  margin-left: 5px;" type="text" name="premises_full_employee_two"/>
                        </span><br>
                    </td>
                    <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_annual_revenue_two"/>
</span>
                        <hr class="divider-line">
                        <span class="text-bold">OCCUPIED AREA:</span>
                        <span class="align-right">

                            SQ FT</span>
                        <br>


                    </td>
                </tr>
                <tr>
                    <td class="table-cell"><span class="text-bold">BLD # <input style="width: 50%;  margin-left: 5px;"
                                                                                type="text"
                                                                                name="premises_bld_two"/></span></td>
                    <td class="table-cell">
                        <span class="text-bold">CITY: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                             name="premises_city_two"/></span>
                    </td>
                    <td class="table-cell"><span class="text-bold">STATE: <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text" name="premises_state_two"/></span>
                    </td>
                    <td class="table-cell" rowspan="2"></td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold"># PART TIME EMPL <input style="width: 50%;  margin-left: 5px;"
                                                                        type="text" name="premises_part_employee_two"/></span>
                    </td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_public_area_two"/></span><br>
                        <hr class="divider-line">
                        <span class="text-bold">TOTAL BUILDING AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_building_area_two"/></span><br>
                    </td>

                </tr>
                <tr>
                    <td class="table-cell"></td>
                    <td class="table-cell"><span class="text-bold">COUNTRY: <input
                                style="width: 50%;  margin-left: 5px;" type="text" name="premises_country_two"/></span>
                    </td>
                    <td class="table-cell"><span class="text-bold">ZIP: <input style="width: 50%;  margin-left: 5px;"
                                                                               type="text" name="premises_zipcode_two"/></span>
                    </td>
                </tr>
            </table>
            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                        OPERATIONS:
                        <textarea name="premises_description_two" rows="5" style="width: 100%"></textarea>
                    </td>
                    <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                        <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                        <input type="checkbox" name="premises_leased_two" value="1"> YES<br>
                        <input type="checkbox" name="premises_leased_two" value="0"> NO
                    </td>
                </tr>
            </table>

            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td class="table-cell width-8"><span class="text-bold">LOC #
                            <input style="width: 50%;  margin-left: 5px;" type="text" name="premises_loc_three"/>
                        </span></td>
                    <td class="table-cell width-40"><span class="text-bold">STREET
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_street_three"/> </span></td>
                    <td class="table-cell width-10">
                        <span class="text-bold">CITY LIMITS</span><br>
                        <input type="checkbox" name="premises_city_limit_three" value="inside"> INSIDE<br>
                        <input type="checkbox" name="premises_city_limit_three" value="outside"> OUTSIDE
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold">INTEREST</span><br>
                        <input type="checkbox" name="premises_interest_three" value="owner"> OWNER<br>
                        <input type="checkbox" name="premises_interest_three" value="tenant"> TENANT
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL
                           <input style="width: 50%;  margin-left: 5px;" type="text"
                                  name="premises_full_employee_three"/>
                        </span><br>
                    </td>
                    <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_annual_revenue_three"/>
</span>
                        <hr class="divider-line">
                        <span class="text-bold">OCCUPIED AREA:</span>
                        <span class="align-right">

                            SQ FT</span>
                        <br>


                    </td>
                </tr>
                <tr>
                    <td class="table-cell"><span class="text-bold">BLD # <input style="width: 50%;  margin-left: 5px;"
                                                                                type="text" name="premises_bld_three"/></span>
                    </td>
                    <td class="table-cell">
                        <span class="text-bold">CITY: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                             name="premises_city_three"/></span>
                    </td>
                    <td class="table-cell"><span class="text-bold">STATE: <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="premises_state_three"/></span>
                    </td>
                    <td class="table-cell" rowspan="2"></td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold"># PART TIME EMPL <input style="width: 50%;  margin-left: 5px;"
                                                                        type="text"
                                                                        name="premises_part_employee_three"/></span>
                    </td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_public_area_three"/></span><br>
                        <hr class="divider-line">
                        <span class="text-bold">TOTAL BUILDING AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_building_area_three"/></span><br>
                    </td>

                </tr>
                <tr>
                    <td class="table-cell"></td>
                    <td class="table-cell"><span class="text-bold">COUNTRY: <input
                                style="width: 50%;  margin-left: 5px;" type="text"
                                name="premises_country_three"/></span></td>
                    <td class="table-cell"><span class="text-bold">ZIP: <input style="width: 50%;  margin-left: 5px;"
                                                                               type="text"
                                                                               name="premises_zipcode_three"/></span>
                    </td>
                </tr>
            </table>
            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                        OPERATIONS:
                        <textarea name="premises_description_three" rows="5" style="width: 100%"></textarea>
                    </td>
                    <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                        <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                        <input type="checkbox" name="premises_leased_three" value="1"> YES<br>
                        <input type="checkbox" name="premises_leased_three" value="0"> NO
                    </td>
                </tr>
            </table>

            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td class="table-cell width-8"><span class="text-bold">LOC #
                            <input style="width: 50%;  margin-left: 5px;" type="text" name="premises_loc_four"/>
                        </span></td>
                    <td class="table-cell width-40"><span class="text-bold">STREET
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_street_four"/> </span></td>
                    <td class="table-cell width-10">
                        <span class="text-bold">CITY LIMITS</span><br>
                        <input type="checkbox" name="premises_city_limit_four" value="inside"> INSIDE<br>
                        <input type="checkbox" name="premises_city_limit_four" value="outside"> OUTSIDE
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold">INTEREST</span><br>
                        <input type="checkbox" name="premises_interest_four" value="owner"> OWNER<br>
                        <input type="checkbox" name="premises_interest_four" value="tenant"> TENANT
                    </td>
                    <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL
                           <input style="width: 50%;  margin-left: 5px;" type="text"
                                  name="premises_full_employee_four"/>
                        </span><br>
                    </td>
                    <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            <input style="width: 50%;  margin-left: 5px;" type="text"
                                   name="premises_annual_revenue_four"/>
</span>
                        <hr class="divider-line">
                        <span class="text-bold">OCCUPIED AREA:</span>
                        <span class="align-right">

                            SQ FT</span>
                        <br>


                    </td>
                </tr>
                <tr>
                    <td class="table-cell"><span class="text-bold">BLD # <input style="width: 50%;  margin-left: 5px;"
                                                                                type="text"
                                                                                name="premises_bld_four"/></span></td>
                    <td class="table-cell">
                        <span class="text-bold">CITY: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                             name="premises_city_four"/></span>
                    </td>
                    <td class="table-cell"><span class="text-bold">STATE: <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="premises_state_four"/></span>
                    </td>
                    <td class="table-cell" rowspan="2"></td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold"># PART TIME EMPL <input style="width: 50%;  margin-left: 5px;"
                                                                        type="text" name="premises_part_employee_four"/></span>
                    </td>
                    <td class="table-cell" rowspan="2">
                        <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_public_area_four"/></span><br>
                        <hr class="divider-line">
                        <span class="text-bold">TOTAL BUILDING AREA:</span>
                        <span class="align-right">SQ FT <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="premises_building_area_four"/></span><br>
                    </td>

                </tr>
                <tr>
                    <td class="table-cell"></td>
                    <td class="table-cell"><span class="text-bold">COUNTRY: <input
                                style="width: 50%;  margin-left: 5px;" type="text" name="premises_country_four"/></span>
                    </td>
                    <td class="table-cell"><span class="text-bold">ZIP: <input style="width: 50%;  margin-left: 5px;"
                                                                               type="text"
                                                                               name="premises_zipcode_four"/></span>
                    </td>
                </tr>
            </table>
            <table class="table-container" style="width: 93.2%">
                <tr>
                    <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                        OPERATIONS:
                        <textarea name="premises_description_four" rows="5" style="width: 100%"></textarea>
                    </td>
                    <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                        <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                        <input type="checkbox" name="premises_leased_four" value="1"> YES<br>
                        <input type="checkbox" name="premises_leased_four" value="0"> NO
                    </td>
                </tr>
            </table>


            <!--end of premisis section-->

            <!--start of Nature -->
            <table class="nb-table" style="width: 93.2%">
                <td colspan="6" class=""><span class="nb-bold">NATURE OF BUSINESS</span></td>


                <tr class="nb-checkbox-row">
                    <td class="nb-td" style="width: 16%;">
                        <input type="checkbox" name="nature_apartment" value="1">
                        APARTMENTS
                    </td>
                    <td class="nb-td" style="width: 16%;">
                        <input type="checkbox" name="nature_contractor" value="1">
                        CONTRACTOR
                    </td>
                    <td class="nb-td" style="width: 16%;">
                        <input type="checkbox" name="nature_manufacture" value="1">
                        MANUFACTURING
                    </td>
                    <td class="nb-td" style="width: 16%;">
                        <input type="checkbox" name="nature_restaurant" value="1">
                        RESTAURANT
                    </td>
                    <td class="nb-td" style="width: 16%;">
                        <input type="checkbox" name="nature_service" value="1">
                        SERVICE
                    </td>
                    <td class="nb-td" style="width: 16%;"></td>
                    <td class="nb-td" rowspan="2"><span class="nb-bold">DATE BUSINESS<br>STARTED
                                         <input style="width: 50%;  margin-left: 5px;" type="text"
                                                name="nature_start_date"/>
                        </span></td>
                </tr>
                <tr class="nb-checkbox-row">
                    <td class="nb-td">
                        <input type="checkbox" name="nature_condom" value="1">
                        CONDOMINIUMS
                    </td>
                    <td class="nb-td">
                        <input type="checkbox" name="nature_institutional" value="1">
                        INSTITUTIONAL
                    </td>
                    <td class="nb-td">
                        <input type="checkbox" name="nature_office" value="1">
                        OFFICE
                    </td>
                    <td class="nb-td">
                        <input type="checkbox" name="nature_retail" value="1">
                        RETAIL
                    </td>
                    <td class="nb-td">
                        <input type="checkbox" name="nature_wholesale" value="1">
                        WHOLESALE
                    </td>
                    <td class="nb-td"></td>
                </tr>
                <tr>
                    <td colspan="7" class="nb-th nb-bg-light">
                        <p><b> DESCRIPTION OF PRIMARY
                                OPERATIONS</b></p>
                        <textarea name="nature_description" rows="5" style="width: 100%"></textarea>
                    </td>
                </tr>

                <tr>
                    <td class="nb-td" style="width: 33%;">
                        <span class="nb-bold">RETAIL STORES OR SERVICE OPERATIONS % OF TOTAL SALES:  <input
                                style="width: 50%;  margin-left: 5px;" type="text" name="nature_total_sale"/></span>
                    </td>
                    <td class="nb-td" style="width: 33%;" colspan="3">
                        <span class="nb-bold">INSTALLATION, SERVICE OR REPAIR WORK</span><br>
                        <div class="nb-percent-cell">% <input style="width: 50%;  margin-left: 5px;" type="text"
                                                              name="nature_installation"/></div>
                    </td>
                    <td class="nb-td" style="width: 34%;" colspan="3">
                        <span class="nb-bold">OFF PREMISES INSTALLATION, SERVICE OR REPAIR WORK</span><br>
                        <div class="nb-percent-cell">% <input style="width: 50%;  margin-left: 5px;" type="text"
                                                              name="nature_off_premises"/></div>
                    </td>
                </tr>
            </table>
            <!--End of Nature-->
            <!--secription section start-->
            <table style="width: 93.2%">
                <td>
                    <p><b> Description Of Operations Of Other Insureds </b></p>
                    <textarea name="nature_description" rows="15" style="width: 100%"></textarea>

                </td>
                <tr><br></tr>
            </table>
            <!--end of description section-->
            <!--Additional Interests Start -->
            <p><b style="margin-left: 20px;font-size: smaller;font-weight: bolder;">ADDITIONAL INTREST (NOT
                    ALL FIELD APPLY TO ALL SCENERIOS-PROVIDE ONLY THE NECESSARY DATA ) ATTACH ACORD 45 FOR
                    MORE ADDITIONAL INTRESETS</b></p>
            <!--End of Additional Interests Start -->

            <!--Last section start-->
            <table class="acord-table acord-container" style="width: 93.2%">
                <tr>
                    <!-- INTEREST -->
                    <td class="interest-col">
                        <div class="acord-checkbox"><input type="checkbox" name="interest_additional" value="1"><label>ADDITIONAL
                                INSURED</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_breach" value="1"><label>BREACH
                                OF WARRANTY</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_co_owner" value="1"><label>CO-OWNER</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_lessor" value="1"><label>EMPLOYEE
                                AS LESSOR</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_leaseback" value="1"><label>LEASEBACK
                                OWNER</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_loss" value="1"><label>LENDER'S
                                LOSS
                                PAYABLE</label></div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_holder" value="1"><label>LIENHOLDER</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_loss_payee" value="1"><label>LOSS
                                PAYEE</label></div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_mortgagee" value="1"><label>MORTGAGEE</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_owner"
                                                           value="1"><label>OWNER</label></div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_registrant" value="1"><label>REGISTRANT</label>
                        </div>
                        <div class="acord-checkbox"><input type="checkbox" name="interest_trustee" value="1"><label>TRUSTEE</label>
                        </div>
                        <div class="acord-checkbox"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                           name="interest_other"/></div>
                    </td>

                    <!-- NAME AND ADDRESS -->
                    <td class="name-col">
                        <div><span class="bold">NAME AND ADDRESS</span> &nbsp;&nbsp;&nbsp; RANK:<input
                                style="width: 50%;  margin-left: 5px;" type="text" name="interest_rank"/>
                        </div>
                        <br>
                        <table class="subtable">
                            <tr>
                                <td><label>REFERENCE / LOAN #: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                      name="interest_reference"/></label></td>
                                <td><label>INTEREST END DATE: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                     name="interest_end_date"/></label></td>
                            </tr>
                            <tr>
                                <td><label>LIEN AMOUNT: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                               name="interest_line_amount"/></label></td>
                                <td><label>PHONE (A/C, No, Ext): <input style="width: 50%;  margin-left: 5px;"
                                                                        type="text" name="interest_phone"/></label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label>FAX (A/C, No): <input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="interest_fax"/></label>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"><label>E-MAIL ADDRESS: <input style="width: 50%;  margin-left: 5px;"
                                                                              type="text"
                                                                              name="interest_email"/></label></td>
                            </tr>
                        </table>
                    </td>

                    <!-- EVIDENCE / POLICY / SEND BILL -->
                    <td class="evidence-col">
                        <div class="acord-checkbox"><input type="radio" name="interest_type" value="evidence"><label>EVIDENCE</label>
                        </div>
                        <div class="acord-checkbox"><input type="radio" name="interest_type" value="certificate"><label>CERTIFICATE</label>
                        </div>
                        <div class="acord-checkbox"><input type="radio" name="interest_type" value="policy"><label>POLICY</label>
                        </div>
                        <div class="acord-checkbox"><input type="radio" name="interest_type" value="bill"><label>SEND
                                BILL</label></div>
                    </td>

                    <!-- INTEREST IN ITEM NUMBER -->
                    <td class="item-interest-col">
                        <table class="subtable">
                            <tr>
                                <td><label>LOCATION: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                            name="interest_location"/></label></td>
                                <td><label>BUILDING: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                            name="interest_building"/></label></td>
                            </tr>
                            <tr>
                                <td><label>VEHICLE: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                           name="interest_vehicle"/></label></td>
                                <td><label>BOAT: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                        name="interest_boat"/></label></td>
                            </tr>
                            <tr>
                                <td><label>AIRPORT: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                           name="interest_airport"/></label></td>
                                <td><label>AIRCRAFT: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                            name="interest_aircraft"/></label></td>
                            </tr>
                            <tr>
                                <td><label>ITEM CLASS: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                              name="interest_item_class"/></label></td>
                                <td><label>ITEM: <input style="width: 50%;  margin-left: 5px;" type="text"
                                                        name="interest_item"/></label></td>
                            </tr>
                            <tr>
                                <td colspan="2"><label>ITEM DESCRIPTION</label>
                                    <textarea name="interest_item_description" rows="5" style="width: 100%"></textarea>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>

            <div class="full-width" style="border: solid 1px black; padding: 10px;"><strong>REASON FOR
                    INTEREST:</strong>
                <textarea name="interest_reason" rows="5" style="width: 100%"></textarea>


            </div>

            <div class="page-footer">ACORD 125 (2016/03) &nbsp;&nbsp;&nbsp;&nbsp; Page 2 of 4</div>

            <!--end of last section-->

        </div>
        {{--        ==============================================PAGE 3=================================================================--}}

        <style>
            .form-container {
                border: 1px solid black;
                max-width: 800px;
                margin: 20px auto;
            }

            .form-header {
                display: flex;
                justify-content: space-between;
                border-bottom: 1px solid black;
                padding: 5px;
            }

            .header-left {
                font-weight: bold;
            }

            .header-right {
                text-align: right;
            }

            .instruction {
                font-style: italic;
                padding: 5px;
                border-bottom: 1px solid black;
            }

            .form-row {
                display: flex;
                border-bottom: 1px solid black;
            }

            .form-row-label {
                font-weight: normal;
                padding: 5px;
                flex: 9;
                border-right: 1px solid black;
            }

            .form-row-value {
                flex: 1;
                text-align: center;
                padding: 5px;
            }

            .sub-section {
                border-bottom: 1px solid black;
            }

            .sub-row {
                display: flex;
                border-bottom: 1px solid #ccc;
            }

            .sub-row:last-child {
                border-bottom: none;
            }

            .sub-row-label {
                padding: 5px;
                flex: 1;
                font-weight: normal;
                border-right: 1px solid black;
            }

            .sub-row-value {
                flex: 2;
                padding: 5px;
                border-right: 1px solid black;
            }

            .sub-row-label-2 {
                padding: 5px;
                flex: 1;
                font-weight: normal;
                border-right: 1px solid black;
            }

            .sub-row-value-2 {
                flex: 0.5;
                padding: 5px;
                text-align: center;
            }

            .safety-options {
                display: flex;
                padding: 5px;
            }

            .safety-option {
                display: flex;
                align-items: center;
                margin-right: 20px;
            }

            .checkbox {
                width: 12px;
                height: 12px;
                border: 1px solid black;
                margin-right: 5px;
                display: inline-block;
            }

            .policy-table {
                width: 100%;
                border-collapse: collapse;
            }

            .policy-row {
                display: flex;
                border-bottom: 1px solid #ccc;
            }

            .policy-row:last-child {
                border-bottom: none;
            }

            .policy-cell {
                flex: 1;
                padding: 5px;
                border-right: 1px solid black;
            }

            .policy-cell:last-child {
                border-right: none;
            }

            .declined-options {
                display: flex;
                flex-wrap: wrap;
                padding: 5px;
            }

            .declined-option {
                display: flex;
                align-items: center;
                margin-right: 15px;
                margin-bottom: 5px;
                width: 30%;
            }

            .title-row {
                text-transform: uppercase;
                font-weight: bold;
                padding: 5px;
                border-bottom: 1px solid black;
            }

            .note {
                font-size: 9px;
                padding: 5px;
                font-style: italic;
            }

            .violation-table {
                width: 100%;
                border-collapse: collapse;
            }

            .violation-row {
                display: flex;
                border-bottom: 1px solid #ccc;
            }

            .violation-row:last-child {
                border-bottom: none;
            }

            .violation-cell {
                padding: 5px;
                border-right: 1px solid black;
            }

            .violation-date {
                flex: 1;
            }

            .violation-explanation {
                flex: 3;
            }

            .violation-resolution {
                flex: 3;
            }

            .violation-resolve-date {
                flex: 1;
            }

            .trust-row {
                display: flex;
            }

            .trust-label {
                padding: 5px;
                flex: 4;
                border-right: 1px solid black;
            }

            .trust-value {
                padding: 5px;
                flex: 6;
            }

            .remarks-section {
                border-top: 1px solid black;
                padding: 5px;
                font-weight: bold;
            }

            .remarks-content {
                border-top: 1px solid black;
                height: 40px;
            }

            .carrier-header {
                background-color: #f5f5f5;
                font-weight: bold;
                padding: 5px;
                border-top: 1px solid black;
                border-bottom: 1px solid black;
            }

            .carrier-table {
                width: 100%;
                border-collapse: collapse;
            }

            .carrier-row {
                display: flex;
                border-bottom: 1px solid black;
            }

            .carrier-cell {
                padding: 5px;
                border-right: 1px solid black;
                flex: 1;
            }

            .carrier-cell:last-child {
                border-right: none;
            }

            .carrier-cell-small {
                width: 80px;
                padding: 5px;
                border-right: 1px solid black;
            }

            .footer {
                display: flex;
                justify-content: space-between;
                padding: 5px;
                border-top: 1px solid black;
            }
        </style>
        <div class="container">
            <div class="form-header">
                <div class="header-left">GENERAL INFORMATION</div>
                <div class="header-right">AGENCY CUSTOMER ID: _______________________________</div>
            </div>
            <div class="instruction">EXPLAIN ALL \"YES\" RESPONSES</div>
            <div class="form-row">
                <div class="form-row-label">1a. IS THE APPLICANT A SUBSIDIARY OF ANOTHER ENTITY ?</div>
                <div class="form-row-value">Y / N</div>
            </div>
            <div class="sub-section">
                <div class="sub-row">
                    <div class="sub-row-label">PARENT COMPANY NAME <br>
                        <input style="width: 50%;  margin-left: 5px;" type="text" name="information_q_one_a_name"/>
                    </div>
                    <div class="sub-row-value">RELATIONSHIP DESCRIPTION <br> <input
                            style="width: 50%;  margin-left: 5px;" type="text" name="information_q_one_a_relation"/>
                    </div>
                    <div class="sub-row-label-2">% OWNED <br> <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                     name="information_q_one_a_percentage"/></div>
                    <div class="sub-row-value-2"></div>
                </div>

            </div>
            <div class="form-row">
                <div class="form-row-label">1b. DOES THE APPLICANT HAVE ANY SUBSIDIARIES?</div>
                <div class="form-row-value"></div>
            </div>
            <div class="sub-section">
                <div class="sub-row">
                    <div class="sub-row-label">PARENT COMPANY NAME <br>
                        <input style="width: 50%;  margin-left: 5px;" type="text" name="information_q_one_b_name"/>
                    </div>
                    <div class="sub-row-value">RELATIONSHIP DESCRIPTION <br> <input
                            style="width: 50%;  margin-left: 5px;" type="text" name="information_q_one_b_relation"/>
                    </div>
                    <div class="sub-row-label-2">% OWNED <br> <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                     name="information_q_one_b_percentage"/></div>
                    <div class="sub-row-value-2"></div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">2. IS A FORMAL SAFETY PROGRAM IN OPERATION?</div>
                <div class="form-row-value"></div>
            </div>
            <div class="safety-options">
                <div class="safety-option">
                    <input type="checkbox" name="information_q_two_manual" style="margin-right: 5px" value="1">
                    <div>SAFETY MANUAL</div>
                </div>
                <div class="safety-option">
                    <input type="checkbox" name="information_q_two_position" style="margin-right: 5px" value="1">
                    <div>SAFETY POSITION</div>
                </div>
                <div class="safety-option">
                    <input type="checkbox" name="information_q_two_meeting" style="margin-right: 5px" value="1">
                    <div>MONTHLY MEETINGS</div>
                </div>
                <div class="safety-option">
                    <input type="checkbox" name="information_q_two_osha" style="margin-right: 5px" value="1">
                    <div>OSHA</div>
                </div>
                <div class="safety-option">
                    <input type="checkbox" name="information_q_two_other" style="margin-right: 5px" value="1">
                    <div>OTHER</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">3. ANY EXPOSURE TO FLAMMABLES, EXPLOSIVES, CHEMICALS?
                    <textarea name="information_q_three" rows="5" style="width: 100%"></textarea>
                </div>
                <div class="form-row-value">
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">4. ANY OTHER INSURANCE WITH THIS COMPANY? (List policy numbers)</div>
                <div class="form-row-value"></div>
            </div>
            <div class="policy-table">
                <div class="policy-row">
                    <div class="policy-cell">LINE OF BUSINESS <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                     name="information_q_business_one"/></div>
                    <div class="policy-cell">POLICY NUMBER <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                  name="information_q_policy_one"/></div>

                    <div class="policy-cell">LINE OF BUSINESS <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                     name="information_q_business_two"/></div>
                    <div class="policy-cell">POLICY NUMBER <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                  name="information_q_policy_two"/></div>
                </div>

                <div class="policy-row">
                    <div class="policy-cell">LINE OF BUSINESS <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                     name="information_q_business_three"/></div>
                    <div class="policy-cell">POLICY NUMBER <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                  name="information_q_policy_three"/></div>

                    <div class="policy-cell">LINE OF BUSINESS <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                     name="information_q_business_four"/></div>
                    <div class="policy-cell">POLICY NUMBER <input style="width: 50%;  margin-left: 5px;" type="text"
                                                                  name="information_q_policy_four"/></div>
                </div>

            </div>
            <div class="form-row">
                <div class="form-row-label">5. ANY POLICY OR COVERAGE DECLINED, CANCELLED OR NON-RENEWED DURING THE
                    PRIOR THREE (3) YEARS FOR ANY PREMISES OR OPERATIONS?(Missouri Applicants do not answer this
                    question)
                </div>
                <div class="form-row-value"></div>
            </div>
            <div class="declined-options">
                <div class="declined-option">
                    <input type="checkbox" name="information_q_non_payment" value="1">
                    <div>NON-PAYMENT</div>
                </div>
                <div class="declined-option">
                    <input type="checkbox" name="information_q_agent_carrier" value="1">
                    <div>AGENT NO LONGER REPRESENTS CARRIER</div>
                </div>
                <div class="declined-option">
                    <input type="checkbox" name="information_q_other" value="1">
                    <div>OTHER</div>
                </div>
                <div class="declined-option">
                    <input type="checkbox" name="information_q_non_payment" value="1">
                    <div>NON-RENEWAL</div>
                </div>
                <div class="declined-option">
                    <input type="checkbox" name="information_q_under_writing" value="1">
                    <div>UNDERWRITING</div>
                </div>
                <div class="declined-option">
                    <input type="checkbox" name="information_q_condition" value="1">
                    <div>CONDITION CORRECTED (Describe):</div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">6. ANY PAST LOSSES OR CLAIMS RELATING TO SEXUAL ABUSE OR MOLESTATION
                    ALLEGATIONS, DISCRIMINATION OR NEGLIGENT HIRING?
                    <textarea name="information_q_six" rows="5" style="width: 100%"></textarea>

                </div>
                <div class="form-row-value"></div>
            </div>
            <div class="form-row">
                <div class="form-row-label">7. DURING THE LAST FIVE YEARS (TEN IN RI), HAS ANY APPLICANT BEEN INDICTED
                    FOR OR CONVICTED OF ANY DEGREE OF THE CRIME OF FRAUD, BRIBERY, ARSON OR ANY OTHER ARSON-RELATED
                    CRIME IN CONNECTION WITH THIS OR ANY OTHER PROPERTY?
                    <textarea name="information_q_seven" rows="5" style="width: 100%"></textarea>

                </div>
                <div class="form-row-value"></div>
            </div>
            <div class="note">(In RI, this question must be answered by any applicant for property insurance. Failure to
                disclose the existence of an arson conviction is a misdemeanor punishable by a sentence of up to one
                year of imprisonment).
            </div>
            <div class="form-row">
                <div class="form-row-label">8. ANY UNCORRECTED FIRE AND/OR SAFETY CODE VIOLATIONS?</div>
                <div class="form-row-value"></div>
            </div>
            <div class="violation-table">
                <div class="violation-row">
                    <div class="violation-cell violation-date">OCCUR DATE <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="information_q_eight_date_one"/>
                    </div>
                    <div class="violation-cell violation-explanation">EXPLANATION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_eight_explanation_one"/>
                    </div>
                    <div class="violation-cell violation-resolution">RESOLUTION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_eight_resolution_one"/>
                    </div>
                    <div class="violation-cell violation-resolve-date">RESOLVE DATE <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_eight_resolution_date_one"/>
                    </div>
                </div>
                <div class="violation-row">
                    <div class="violation-cell violation-date">OCCUR DATE <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="information_q_eight_date_two"/>
                    </div>
                    <div class="violation-cell violation-explanation">EXPLANATION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_eight_explanation_two"/>
                    </div>
                    <div class="violation-cell violation-resolution">RESOLUTION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_eight_resolution_two"/>
                    </div>
                    <div class="violation-cell violation-resolve-date">RESOLVE DATE <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_eight_resolution_date_two"/>
                    </div>
                </div>

            </div>
            <div class="form-row">
                <div class="form-row-label">9. HAS APPLICANT HAD A FORECLOSURE, REPOSSESSION, BANKRUPTCY OR FILED FOR
                    BANKRUPTCY DURING THE LAST FIVE (5) YEARS?
                </div>
                <div class="form-row-value"></div>
            </div>
            <div class="violation-table">
                <div class="violation-row">
                    <div class="violation-cell violation-date">OCCUR DATE <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="information_q_nine_date_one"/>
                    </div>
                    <div class="violation-cell violation-explanation">EXPLANATION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_nine_explanation_one"/>
                    </div>
                    <div class="violation-cell violation-resolution">RESOLUTION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_nine_resolution_one"/>
                    </div>
                    <div class="violation-cell violation-resolve-date">RESOLVE DATE <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_nine_resolution_date_one"/>
                    </div>
                </div>

                <div class="violation-row">
                    <div class="violation-cell violation-date">OCCUR DATE <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="information_q_nine_date_two"/>
                    </div>
                    <div class="violation-cell violation-explanation">EXPLANATION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_nine_explanation_two"/>
                    </div>
                    <div class="violation-cell violation-resolution">RESOLUTION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_nine_resolution_two"/>
                    </div>
                    <div class="violation-cell violation-resolve-date">RESOLVE DATE <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_nine_resolution_date_two"/>
                    </div>
                </div>


            </div>
            <div class="form-row">
                <div class="form-row-label">10. HAS APPLICANT HAD A JUDGEMENT OR LIEN DURING THE LAST FIVE (5) YEARS?
                </div>
                <div class="form-row-value"></div>
            </div>
            <div class="violation-table">
                <div class="violation-row">
                    <div class="violation-cell violation-date">OCCUR DATE <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="information_q_ten_date_one"/>
                    </div>
                    <div class="violation-cell violation-explanation">EXPLANATION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_ten_explanation_one"/>
                    </div>
                    <div class="violation-cell violation-resolution">RESOLUTION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_ten_resolution_one"/>
                    </div>
                    <div class="violation-cell violation-resolve-date">RESOLVE DATE <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_ten_resolution_date_one"/>
                    </div>
                </div>


                <div class="violation-row">
                    <div class="violation-cell violation-date">OCCUR DATE <input style="width: 50%;  margin-left: 5px;"
                                                                                 type="text"
                                                                                 name="information_q_ten_date_two"/>
                    </div>
                    <div class="violation-cell violation-explanation">EXPLANATION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_ten_explanation_two"/>
                    </div>
                    <div class="violation-cell violation-resolution">RESOLUTION <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_ten_resolution_two"/>
                    </div>
                    <div class="violation-cell violation-resolve-date">RESOLVE DATE <input
                            style="width: 50%;  margin-left: 5px;" type="text"
                            name="information_q_ten_resolution_date_two"/>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">11. HAS BUSINESS BEEN PLACED IN A TRUST?</div>
                <div class="form-row-value">
                    <input type="radio" name="information_q_eleven" value="1"> YES<br>
                    <input type="radio" name="information_q_eleven" value="0"> NO
                </div>
            </div>
            <div class="trust-row">
                <div class="trust-label">NAME OF TRUST:</div>
                <div class="trust-value">
                    <input
                        style="width: 50%;  margin-left: 5px;" type="text"
                        name="information_q_eleven_name"/>
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">12. ANY FOREIGN OPERATIONS, FOREIGN PRODUCTS DISTRIBUTED IN USA, OR US
                    PRODUCTS SOLD/DISTRIBUTED IN FOREIGN COUNTRIES?<br>(If \"YES\", attach ACORD 815 for Liability
                    Exposure and/or ACORD 816 for Property Exposure)
                </div>
                <div class="form-row-value">
                    <input type="radio" name="information_q_twelve" value="1"> YES<br>
                    <input type="radio" name="information_q_twelve" value="0"> NO
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">13. DOES APPLICANT HAVE OTHER BUSINESS VENTURES FOR WHICH COVERAGE IS NOT
                    REQUESTED?
                    <textarea name="information_q_thirteen_detail" rows="5" style="width: 100%"></textarea>

                </div>
                <div class="form-row-value">
                    <input type="radio" name="information_q_thirteen" value="1"> YES<br>
                    <input type="radio" name="information_q_thirteen" value="0"> NO
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">14. DOES APPLICANT OWN / LEASE / OPERATE ANY DRONES? (If \"YES\", describe
                    use)
                    <textarea name="information_q_fourteen_detail" rows="5" style="width: 100%"></textarea>

                </div>
                <div class="form-row-value">
                    <input type="radio" name="information_q_fourteen" value="1"> YES<br>
                    <input type="radio" name="information_q_fourteen" value="0"> NO
                </div>
            </div>
            <div class="form-row">
                <div class="form-row-label">15. DOES APPLICANT HIRE OTHERS TO OPERATE DRONES? (If \"YES\", describe
                    use)
                    <textarea name="information_q_fifteen_detail" rows="5" style="width: 100%"></textarea>

                </div>
                <div class="form-row-value">
                    <input type="radio" name="information_q_fifteen" value="1"> YES<br>
                    <input type="radio" name="information_q_fifteen" value="0"> NO
                </div>
            </div>
            <div class="remarks-section">REMARKS / PROCESSING INSTRUCTIONS (ACORD 101, Additional Remarks Schedule, may
                be attached if more space is required)
                <textarea name="remarks" rows="10" style="width: 100%"></textarea>

            </div>
            <div class="remarks-content"></div>
            <div class="carrier-header">PRIOR CARRIER INFORMATION</div>
            <div class="carrier-table">
                <div class="carrier-row">
                    <div class="carrier-cell-small">YEAR</div>
                    <div class="carrier-cell-small">CATEGORY</div>
                    <div class="carrier-cell">GENERAL LIABILITY</div>
                    <div class="carrier-cell">AUTOMOBILE</div>
                    <div class="carrier-cell">PROPERTY</div>
                    <div class="carrier-cell">OTHER:</div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                           name="carrier_one_year"/></div>
                    <div class="carrier-cell-small">CARRIER</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_one_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_one_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_one_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_one_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">POLICY NUMBER</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_one_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_one_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_one_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_one_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">PREMIUM</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_one_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_one_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_one_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_one_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">EFFECTIVE DATE</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_one_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_one_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_one_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_one_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">EXPIRATION DATE</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_one_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_one_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_one_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_one_other"/></div>
                </div>
            </div>
            <div class="footer">
                <div>ACORD 125 (2016/03)</div>
                <div>Page 3 of 4</div>

            </div>
        </div>


        {{--        ==============================================PAGE 4=================================================================--}}
        <style type="text/css">
            * {
                margin: 0;
                padding: 0;
                text-indent: 0;
            }

            p {
                color: black;
                font-family: Arial, sans-serif;
                font-style: normal;
                font-weight: normal;
                text-decoration: none;
                font-size: 7.5pt;
                margin: 0;
            }

            table, tbody {
                vertical-align: top;
                overflow: visible;
            }

            /* Consolidated common styles */
            .common-text {
                color: black;
                font-style: normal;
                font-weight: normal;
                text-decoration: none;
            }

            .arial {
                font-family: Arial, sans-serif;
            }

            .arial-black {
                font-family: "Arial Black", sans-serif;
            }

            .courier-new {
                font-family: "Courier New", monospace;
            }

            .acord-table {
                width: 100%;
                border-collapse: collapse;
            }

            .acord-td {
                border: 2px solid black;
                padding: 6px;
                font-size: 12px;
                vertical-align: top;
            }

            .acord-label {
                font-weight: bold;
                font-size: 11px;
                display: block;
            }

            .acord-footer {
                margin-top: 5px;
                font-size: 10px;
                display: flex;
                justify-content: space-between;
            }

            /* Precise column widths */
            .acord-col-1 {
                width: 33%;
            }

            .acord-col-2 {
                width: 33%;
            }

            .acord-col-3 {
                width: 34%;
            }

            .acord-col-applicant {
                width: 66%;
            }

            .acord-col-date {
                width: 40%;
            }

            .acord-col-npn {
                width: 60%;
            }

            .acord-inner-table {
                width: 100%;
                border-collapse: collapse;
            }

            .acord-inner-td {
                padding: 6px;
                font-size: 12px;
                vertical-align: top;
            }

            .acord-inner-border-right {
                border-right: 1px solid black;
            }

            /* Specific styles */
            .s2 {
                font-size: 5.5pt;
            }

            .s3 {
                font-size: 6.5pt;
            }

            .s4 {
                font-size: 7pt;
            }

            .s5 {
                font-size: 7pt;
            }

            .s6 {
                font-size: 9pt;
            }

            .s7 {
                font-size: 6pt;
            }

            .s9 {
                font-size: 6.5pt;
            }

            .s10 {
                font-size: 7.5pt;
            }

            .s11 {
                font-size: 7pt;
            }

            .s12 {
                font-size: 7pt;
            }

            .s13 {
                font-size: 7pt;
                vertical-align: -2pt;
            }

            .s14 {
                font-size: 4.5pt;
                vertical-align: -2pt;
            }

            .s15 {
                font-size: 4pt;
                vertical-align: -2pt;
            }

            .s17 {
                font-size: 7.5pt;
            }

            .s18 {
                font-size: 5.5pt;
            }
        </style>
        <div class="container">
            <p style="padding-top: 8pt; padding-left: 10pt; text-align: left;">PRIOR CARRIER INFORMATION (continued)</p>
            <p style="padding-top: 3pt; padding-right: 420pt; text-align: right">
                AGENCY CUSTOMER ID: <u>                                  </u>
            </p>
            <br/>

            <div class="carrier-table">
                <div class="carrier-row">
                    <div class="carrier-cell-small">YEAR</div>
                    <div class="carrier-cell-small">CATEGORY</div>
                    <div class="carrier-cell">GENERAL LIABILITY</div>
                    <div class="carrier-cell">AUTOMOBILE</div>
                    <div class="carrier-cell">PROPERTY</div>
                    <div class="carrier-cell">OTHER:</div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                           name="carrier_two_year"/></div>
                    <div class="carrier-cell-small">CARRIER</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_two_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_two_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_two_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_two_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">POLICY NUMBER</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_two_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_two_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_two_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_two_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">PREMIUM</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_two_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_two_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_two_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_two_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">EFFECTIVE DATE</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_two_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_two_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_two_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_two_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">EXPIRATION DATE</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_two_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_two_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_two_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_two_other"/></div>
                </div>
            </div>

            <div class="carrier-table">
                <div class="carrier-row">
                    <div class="carrier-cell-small">YEAR</div>
                    <div class="carrier-cell-small">CATEGORY</div>
                    <div class="carrier-cell">GENERAL LIABILITY</div>
                    <div class="carrier-cell">AUTOMOBILE</div>
                    <div class="carrier-cell">PROPERTY</div>
                    <div class="carrier-cell">OTHER:</div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                           name="carrier_three_year"/></div>
                    <div class="carrier-cell-small">CARRIER</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_three_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_three_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_three_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_three_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">POLICY NUMBER</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_three_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_three_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_three_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_policy_three_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">PREMIUM</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_three_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_three_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_three_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_premium_three_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">EFFECTIVE DATE</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_three_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_three_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_three_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_effective_three_other"/></div>
                </div>
                <div class="carrier-row">
                    <div class="carrier-cell-small"></div>
                    <div class="carrier-cell-small">EXPIRATION DATE</div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_three_gl"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_three_auto"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_three_property"/></div>
                    <div class="carrier-cell"><input style="width: 50%;  margin-left: 5px;" type="text"
                                                     name="carrier_expiration_three_other"/></div>
                </div>
            </div>

            <p style="padding-bottom: 2pt; padding-left: 10pt; text-align: left;">
                LOSS HISTORY Check if none (Attach Loss Summary for Additional Loss Information)
            </p>

            <table style="border-collapse: collapse; margin-left: 7.11925pt;" cellspacing="0">
                <tr style="height: 17pt;">
                    <td style="width: 441pt; border: 2pt solid black;" colspan="5">
                        <p class="common-text arial s7" style="padding-left: 3pt; line-height: 6pt; text-align: left;">
                            ENTER ALL CLAIMS OR LOSSES (REGARDLESS OF FAULT AND WHETHER OR NOT INSURED) OR OCCURRENCES
                            THAT
                            MAY GIVE RISE TO CLAIMS
                        </p>
                        <p class="common-text arial s7" style="padding-left: 3pt; text-align: left;">
                            FOR THE LAST <u> </u>YEARS
                            <input style="width: 50%;  margin-left: 5px;" type="text" name="loss_year"/>

                        </p>
                    </td>
                    <td style="width: 135pt; border: 2pt solid black;" colspan="3">
                        <br/>
                        <p class="common-text arial s2" style="padding-left: 2pt; text-align: left;">TOTAL LOSSES: $
                            <input style="width: 50%;  margin-left: 5px;" type="text" name="loss_amount"/></p>
                    </td>
                </tr>
                <tr style="height: 23pt;">
                    <td style="width: 59pt; border: 2pt solid black;">
                        <p class="common-text arial-black s3"
                           style="padding-top: 6pt; padding-left: 10pt; padding-right: 8pt; text-indent: 7pt; line-height: 79%; text-align: left;">
                            DATE OF OCCURRENCE
                        </p>
                    </td>
                    <td style="width: 46pt; border: 2pt solid black;">
                        <br/>
                        <p class="common-text arial s2" style="padding-left: 2pt; text-align: center;">LINE</p>
                    </td>
                    <td style="width: 195pt; border: 2pt solid black;">
                        <br/>
                        <p class="common-text arial s2" style="padding-left: 30pt; text-align: left;">TYPE / DESCRIPTION
                            OF
                            OCCURRENCE OR CLAIM</p>
                    </td>
                    <td style="width: 57pt; border: 2pt solid black;">
                        <br/>
                        <p class="common-text arial s2" style="padding-left: 7pt; text-align: left;">DATE OF CLAIM</p>
                    </td>
                    <td style="width: 84pt; border: 2pt solid black;">
                        <br/>
                        <p class="common-text arial s2" style="padding-left: 22pt; text-align: left;">AMOUNT PAID</p>
                    </td>
                    <td style="width: 79pt; border: 2pt solid black;">
                        <br/>
                        <p class="common-text arial s9" style="padding-left: 12pt; text-align: left;">AMOUNT
                            RESERVED</p>
                    </td>
                    <td style="width: 29pt; border: 2pt solid black;">
                        <p class="common-text arial s9"
                           style="padding-left: 4pt; padding-right: 1pt; line-height: 106%; text-align: left;">SUBRO-
                            GATION
                            <br>
                            Y/N
                        </p>
                    </td>
                    <td style="width: 27pt; border: 2pt solid black;">
                        <p class="common-text arial s9"
                           style="padding-left: 7pt; padding-right: 2pt; text-indent: -1pt; line-height: 106%; text-align: left;">
                            CLAIM OPEN
                            <br>
                            Y/N</p>
                    </td>
                </tr>
                <tr style="height: 11pt;">
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_one_date"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_one_line"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_one_description"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_one_claim_date"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_one_amount_paid"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text"
                                                                             name="loss_one_amount_reserved"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_one_subrogation"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_one_claim_open"/>
                    </td>
                </tr>

                <tr style="height: 11pt;">
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_two_date"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_two_line"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_two_description"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_two_claim_date"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_two_amount_paid"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text"
                                                                             name="loss_two_amount_reserved"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_two_subrogation"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_two_claim_open"/>
                    </td>
                </tr>

                <tr style="height: 11pt;">
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_three_date"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_three_line"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_three_description"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_three_claim_date"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_three_amount_paid"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text"
                                                                             name="loss_three_amount_reserved"/></td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_three_subrogation"/>
                    </td>
                    <td style="width: 59pt; border: 2pt solid black;"><input style="width: 50%;  margin-left: 5px;"
                                                                             type="text" name="loss_three_claim_open"/>
                    </td>
                </tr>

            </table>

            <p class="common-text arial-black s10" style="padding-left: 10pt; text-align: left;">SIGNATURE</p>

            <table style="border-collapse: collapse; margin-left: 7.22425pt; " cellspacing="0">
                <tr style="height: 11pt;">
                    <td style="width: 15pt; border: 2pt solid black;">

                        <input type="checkbox" name="signature_notice" value="1">

                    </td>
                    <td style="width: 562pt; border: 2pt solid black;">
                        <p class="common-text arial s11" style="padding-left: 2pt; line-height: 8pt; text-align: left;">
                            Copy of the Notice of Information Practices (Privacy) has been given to the applicant. (Not
                            required in all states, contact your agent or broker for your state's requirements.)
                        </p>
                    </td>
                </tr>
                <tr style="height: 89pt;">
                    <td style="width: 577pt; border: 2pt solid black;" colspan="2">
                        <p class="common-text arial s9"
                           style="padding-top: 2pt; padding-left: 6pt; padding-right: 44pt; text-align: left;">
                            PERSONAL INFORMATION ABOUT YOU, INCLUDING INFORMATION FROM A CREDIT OR OTHER INVESTIGATIVE
                            REPORT, MAY BE COLLECTED FROM PERSONS
                            <span class="common-text arial s12">
            OTHER THAN YOU IN CONNECTION WITH THIS APPLICATION FOR INSURANCE AND SUBSEQUENT AMENDMENTS AND RENEWALS. SUCH INFORMATION AS WELL AS OTHER PERSONAL AND PRIVILEGED INFORMATION COLLECTED BY US OR OUR AGENTS MAY IN CERTAIN CIRCUMSTANCES BE DISCLOSED TO THIRD PARTIES WITHOUT YOUR AUTHORIZATION. CREDIT SCORING INFORMATION MAY BE USED TO HELP DETERMINE EITHER YOUR ELIGIBILITY FOR INSURANCE OR THE PREMIUM YOU WILL BE CHARGED. WE MAY USE A THIRD PARTY IN CONNECTION WITH THE DEVELOPMENT OF YOUR SCORE. YOU MAY HAVE THE RIGHT TO REVIEW YOUR PERSONAL INFORMATION IN OUR FILES AND REQUEST CORRECTION OF ANY INACCURACIES. YOU MAY ALSO HAVE THE RIGHT TO REQUEST IN WRITING THAT WE CONSIDER EXTRAORDINARY LIFE CIRCUMSTANCES IN CONNECTION WITH THE DEVELOPMENT OF YOUR CREDIT SCORE. THESE RIGHTS MAY BE LIMITED IN SOME STATES. PLEASE CONTACT YOUR AGENT OR BROKER TO LEARN HOW THESE RIGHTS MAY APPLY IN YOUR STATE OR FOR INSTRUCTIONS ON HOW TO SUBMIT A REQUEST TO US FOR A MORE DETAILED DESCRIPTION OF YOUR RIGHTS AND OUR PRACTICES REGARDING PERSONAL INFORMATION.
          </span>
                        </p>
                        <p class="common-text arial s13" style="padding-left: 6pt; text-align: left;">
          <span class="common-text arial s11">
            (Not applicable in AZ, CA, DE, KS, MA, MN, ND, NY, OR, VA, or WV. Specific ACORD 38s are available for applicants in these states.)
          </span>
                            Applicant Initial: <input style="width: 10%;  margin-left: 5px;" type="text"
                                                      name="applicant"/>
                        </p>
                    </td>
                </tr>
                <tr style="height: 299pt;">
                    <td style="width: 577pt; border: 2pt solid black;" colspan="2">
                        <p class="common-text arial s17" style="padding-left: 4pt; line-height: 8pt; text-align: left;">
                            Applicable in AL, AR, DC, LA, MD, NM, RI andA¥gperson who knowingly (or willfully)* presents
                            a
                            false or fraudulent claim for payment of a loss or
                        </p>
                        <p class="common-text arial s17"
                           style="padding-left: 6pt; padding-right: 44pt; line-height: 106%; text-align: left;">
                            benefit or knowingly (or willfully)“ presents false information in an application for
                            insurance
                            is guilty of a crime and may be subject to fines and confinement in prison. *Applies in MD
                            Only.
                        </p>
                        <p class="common-text arial s17"
                           style="padding-left: 6pt; padding-right: 47pt; text-indent: -1pt; line-height: 108%; text-align: left;">
                            Applicable in COJt is unlawful to knowingly provide false, incomplete, or misleading facts
                            or
                            information to an insurance company for the purpose of defrauding or attempting to defraud
                            the
                            company. Penalties may include imprisonment, fines, denial of insurance and civil damages.
                            Any
                            insurance company or agent of an insurance company who knowingly provides false, incomplete,
                            or
                            misleading facts or information to a policyholder or claimant for the purpose of defrauding
                            or
                            attempting to defraud the policyholder or claimant with regard to a settlement or award
                            payable
                            from insurance proceeds shall be reported to the Colorado Division of Insurance within the
                            Department of Regulatory Agencies.
                        </p>
                        <p class="common-text arial s17"
                           style="padding-left: 6pt; padding-right: 44pt; text-indent: -1pt; line-height: 111%; text-align: left;">
                            Applicable in FL and OfAny person who knowingly and with intent to injure, defraud, or
                            deceive
                            any insurer files a statement of claim or an application containing any false, incomplete,
                            or
                            misleading information is guilty of a felony (of the third degree)*. *Applies in FL Only.
                        </p>
                        <p class="common-text arial s17"
                           style="padding-left: 6pt; padding-right: 44pt; text-indent: -1pt; line-height: 109%; text-align: left;">
                            Applicable in KSAny person who, knowingly and with intent to defraud, presents, causes to be
                            presented or prepares with knowledge or belief that it will be presented to or by an
                            insurer,
                            purported insurer, broker or any agent thereof, any written statement as part of, or in
                            support
                            of, an application for the issuance of, or the rating of an insurance policy for personal or
                            commercial insurance, or a claim for payment or other benefit pursuant to an insurance
                            policy
                            for commercial or personal insurance which such person knows to contain materially false
                            information concerning any fact material thereto; or conceals, for the purpose of
                            misleading,
                            information concerning any fact material thereto commits a fraudulent insurance act.
                        </p>
                        <p class="common-text arial s17"
                           style="padding-left: 6pt; padding-right: 47pt; text-indent: -1pt; line-height: 109%; text-align: left;">
                            Applicable in KY, NY, OH and Bay person who knowingly and with intent to defraud any
                            insurance
                            company or other person files an application for insurance or statement of claim containing
                            any
                            materially false information or conceals for the purpose of misleading, information
                            concerning
                            any fact material thereto commits a fraudulent insurance act, which is a crime and subjects
                            such
                            person to criminal and civil penalties (not to exceed five thousand dollars and the stated
                            value
                            of the claim for each such violation)*. “Applies in NY Only.
                        </p>
                        <p class="common-text arial s17"
                           style="padding-top: 2pt; padding-left: 6pt; padding-right: 66pt; text-indent: -1pt; line-height: 111%; text-align: left;">
                            Applicable in ME, TN, VA and WIAis a crime to knowingly provide false, incomplete or
                            misleading
                            information to an insurance company for the purpose of defrauding the company. Penalties
                            (may)*
                            include imprisonment, fines and denial of insurance benefits. ”Applies in ME Only.
                        </p>
                        <p class="common-text arial s17"
                           style="padding-top: 1pt; padding-left: 6pt; padding-right: 66pt; text-indent: -1pt; line-height: 111%; text-align: left;">
                            Applicable in NJAny person who includes any false or misleading information on an
                            application
                            for an insurance policy is subject to criminal and civil penalties.
                        </p>
                        <p class="common-text arial s17"
                           style="padding-left: 6pt; padding-right: 66pt; text-indent: -1pt; line-height: 111%; text-align: left;">
                            Applicable in ORAny person who knowingly and with intent to defraud or solicit another to
                            defraud the insurer by submitting an application containing a false statement as to any
                            material
                            fact may be violating state law.
                        </p>
                        <p class="common-text arial s17" style="padding-left: 4pt; text-align: left;">
                            Applicable in PRAny person who knowingly and with the intention of defrauding presents false
                            information in an insurance application, or presents, helps,
                        </p>
                        <p class="common-text arial s17"
                           style="padding-left: 6pt; padding-right: 46pt; line-height: 107%; text-align: justify;">
                            or causes the presentation of a fraudulent claim for the payment of a loss or any other
                            benefit,
                            or presents more than one claim for the same damage or loss, shall incur a felony and, upon
                            conviction, shall be sanctioned for each violation by a fine of not less than five thousand
                            dollars ($5,000) and not more than ten thousand dollars ($10,000), or a fixed term of
                            imprisonment for three (3) years, or both penalties. Should aggravating circumstances [be]
                            present, the penalty thus established may be increased to a maximum of five (5) years, if
                            extenuating circumstances are present, it may be reduced to a minimum of two (2)
                        </p>
                        <p class="common-text arial s17" style="padding-left: 6pt; line-height: 8pt; text-align: left;">
                            years.</p>
                    </td>
                </tr>
                <tr style="height: 29pt;">
                    <td style="width: 577pt; border: 2pt solid black;" colspan="2">
                        <p class="common-text arial s9"
                           style="padding-left: 6pt; padding-right: 44pt; text-align: left;">
                            THE UNDERSIGNED IS AN AUTHORIZED REPRESENTATIVE OF THE APPLICANT AND REPRESENTS THAT
                            REASONABLE
                            INQUIRY HAS BEEN MADE TO OBTAIN THE
                            <span class="common-text arial s12">
            ANSWERS TO QUESTIONS ON THIS APPLICATION. HE/SHE REPRESENTS THAT THE ANSWERS ARE TRUE, CORRECT AND COMPLETE TO THE BEST OF HIS/HER KNOWLEDGE.
          </span>
                        </p>
                    </td>
                </tr>
            </table>
            <table class="acord-table" style="border-collapse: collapse; margin-left: 7.11925pt;width: 98.8%;">
                <tr>
                    <td class="acord-td acord-col-1"><span class="acord-label">PRODUCER'S SIGNATURE :    <input
                                style="width: 50%;  margin-left: 5px;" type="text" name="procedure_signature"/></span>
                    </td>
                    <td class="acord-td acord-col-2"><span class="acord-label">PRODUCER'S NAME (Please Print)  <input
                                style="width: 50%;  margin-left: 5px;" type="text" name="procedure_name"/></span>
                    </td>
                    <td class="acord-td acord-col-3"><span class="acord-label">STATE PRODUCER LICENSE NO<br>(Required in Florida)  <input
                                style="width: 50%;  margin-left: 5px;" type="text" name="procedure_license"/></span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="acord-td acord-col-applicant"><span
                            class="acord-label">APPLICANT'S SIGNATURE  <input style="width: 50%;  margin-left: 5px;"
                                                                              type="text"
                                                                              name="applicant_signature"/></span></td>
                    <td class="acord-td">
                        <table class="acord-inner-table">
                            <tr>
                                <td class="acord-inner-td acord-col-date acord-inner-border-right">
                                    <span class="acord-label">DATE </span><br>
                                    <input style="width: 50%;  margin-left: 5px;" type="text" name="applicant_date"/>
                                </td>
                                <td class="acord-inner-td acord-col-npn">
                                    <span class="acord-label">NATIONAL PRODUCER NUMBER
                                        <input style="width: 50%;  margin-left: 5px;" type="text" name="procedure_no"/>
</span>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>


            <p style="padding-left: 10pt; line-height: 8pt; text-align: left;">ACORD 125 (2016/03) <span
                    style="margin-left: 200px;"> Page 4 of 4</span></p>

        </div>

        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>

    </form>
@endsection
