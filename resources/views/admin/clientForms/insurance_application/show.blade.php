<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COMMERCIAL INSURANCE APPLICATION</title>
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


</head>
<body>


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
            <img width="87" height="37"
                 src="data:image/jpg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAAlAFcDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9UqKK5OT4r+EIvHUXgtvEFkPFMsRnTS/M/fFB3xQB1lFZPiTxXo/g/TJNQ1vUrbTLKPlprlwqivOL79qH4aNYSTR+LreK1wQb5Y3Mae+cUAeh+J/Gei+DrBrzWdSg0+3Xq8rYrxXxF+054g1hGi+Gvw31nxc+Sq312Pslln1EoDkj/gNdjdSfDbRNNtvGetanY3EMqCWDVtRk3EqehTPOKr3H7U3wt0yBZp/FFra2ROFunRliP44oA8V1Cy/bH8aO7xXfgvwVZSfdhj3Xc6D/AHyE/lXH67+zr+2Bdo0tr8bbfzs5EKR+Un0zk19nXvxO8Kad4NfxZc6/ZReG0j8xtSMn7kL6k1x8f7VXwmkt7S4HjnS1trs4t52chJT/ALJxzQB+f3jL41ftk/sh3EeseOorXxp4UikH2i5RTKmz08zA2E/Q1+kPwV+KWn/Gn4X+HvGemKY7TVrYTrG3VDkgj8waw/jr4++H+mfD6403xhr2mWGn+IraW1thfP8AJc7lwQODnhh+dcN8GviZ8JPgV8LvDngyPxpp1vBYxGGF5iyByzlhyRj+LFAH0ZRXwhofxf8AjFq/xeuxpt1c3+nSNKYLVY98DKF42jOMAYIbuSRgYooA93/aC+Oms+H7pfAnw304a98S7+EyRQSAiCxi6efM2DgAkYABzg9MV+d3xv8ACnin9l/9oP4XfFLUtL1AXk13/wATjUZ5mne+dWQyM3Hyg56ZNfr1b6Fp9pqdxqMNnBFf3Cqs1wqAPIBnAJ6nGT+deB/tf/F/QPhIngOfxPptpd6Bf6zHa3tzeQiRbeIkbm5H+cUAfHnxZ1u5+K/7fOi6P8XZJrb4UQJ9o0i3uFZrC7bgoWGMfNyDn0r9FYPEngOOxtPDlvd6a1tcp5EGnxqGR1xjaFAxiri6J4M+JXhqzQ2Wl69ohQNBGY0liCkcYHIFS6D8L/CHha8W70jw3pmm3KjAltbZI2A+oFAH5teDbcePv+Cgmuaf8ZgbPQNB3f8ACOaNeoRZYByhQEbeCPxr6m/bI+NvgvRvgnr/AIR0+3i8Ua/rNlJYafodjF5pd3UqpPGAoJFfQ3ivwR4Y8WRo3iHRtP1SOLlTfQq4X/vocVx41P4U/Cq4M1omiaRduMbdPhUyN7YjBNAH5a/ETwN46+C37F3hX4R6wk6eJvHOvtdJpqFnNlB+6Co3pkluK6y00Q+L/iZ4O/Zt+M1v/wAIz4S0OKJtHbSoT5eou/I3yDBXJAA4PINfpTam1+I2qWep/wDCKRiGDDQ3+qQqJRg8GMc/riuq1XwRoGvX9vf6lo1lfXsAHlzzwq7pg5GCRxg0Afmn8el0r4oft6fDf4cBhaeC/AsUU0wmyIg8Z3OucYOUCfWvZv29/iX4X8e/B+4+G3gzS18beMdVZLezsrO33i2HTzC5ACkdsdx2r661H4X+EdXvJbu98N6Zd3UpzJNNbKzMenJIrR0HwhonhdHXSNKtNNVzlhbRBM/lQB5F+xX8Ite+Cf7PXhjwz4lujc6xBEXljLFlg3HPlqfQfzJor3SigA715x8fPgR4Y/aJ+Hd74R8U25kspyHjmj4kgkH3XU+ozRRQB+VnxO+Hfjj9izxLPoXgf4teIRpkTEJaOCsKgdPkDkV0/wAKf2gPjj8SNSg06f4pXNikh2mWPTo2YfiWFFFAH2N4c/Y71zxNDBeeNPjR4z8R2s4EjWNtdPYRfQ+XJyK9r+HnwB8CfC7bJoPh+1hvR1v5kEly/wDvSkbj+dFFAHoQ60d6KKAEBpc9KKKADvRRRQB//9kA"/>

        </div>
        <div class="title">
            <div>COMMERCIAL INSURANCE APPLICATION</div>
            <div style="font-size: 14px; margin-top: 5px;">APPLICANT INFORMATION SECTION</div>
        </div>
        <div class="date-box">
            <div class="date-label">DATE (MM/DD/YYYY)</div>
            <div class="date-value">
                {{$form->invoice_date}}
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="left-column">
            <div class="section">
                <div class="label">AGENCY</div>
                <div class="value">

                    {{$form->agency_name}}
                </div>
                <div class="value">

                    {{$form->agency_address}}
                </div>
                <div class="city-state">
                    <div class="city">

                        {{$form->agency_city}}
                    </div>
                    <div class="state-zip">
                        <div>

                            {{$form->agency_state}}
                        </div>
                        <div>

                            {{$form->agency_zipcode}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="field">
                    <div class="label">CONTACT NAME:</div>
                    <div class="value">
                        {{$form->contact_name}}
                    </div>
                </div>
                <div class="field">
                    <div class="label">PHONE (A/C, No, Ext):</div>
                    <div class="value">
                        {{$form->contact_phone_no}}
                    </div>
                </div>
                <div class="field">
                    <div class="label">FAX (A/C, No):</div>
                    <div class="value">
                        {{$form->contact_fax_no}}
                    </div>
                </div>
                <div class="field">
                    <div class="label">E-MAIL ADDRESS:</div>
                    <div class="value">
                        {{$form->contact_email}}
                    </div>

                </div>
            </div>

            <div class="section">
                <div class="field">
                    <div class="label">CODE:
                        {{$form->code}}
                    </div>
                    <div class="label" style="margin-left: 100px;"> SUBCODE:
                        {{$form->sub_code}}
                    </div>
                </div>
            </div>

            <div class="section">
                <div class="field">
                    <div class="label">AGENCY CUSTOMER ID:</div>
                    <div class="value">
                        {{$form->producer_customer_id}}
                    </div>
                </div>
            </div>
        </div>

        <div class="right-column">
            <div class="split-box">
                <div class="split-left">
                    <div class="carrier-section">
                        <div class="carrier-label">CARRIER</div>
                        <div class="carrier-value">
                            {{$form->carrier}}
                        </div>
                    </div>
                </div>
                <div class="split-right">
                    <div class="carrier-section">
                        <div class="carrier-label">NAIC CODE</div>
                        <div class="carrier-value">
                            {{$form->naic_code}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="split-box">
                <div class="split-left">
                    <div class="policy-section">
                        <div class="policy-label">COMPANY POLICY OR PROGRAM NAME</div>
                        <div class="carrier-value">
                            {{$form->program_name}}
                        </div>
                    </div>
                </div>
                <div class="split-right">
                    <div class="policy-section">
                        <div class="policy-label">PROGRAM CODE</div>
                        <div class="carrier-value">
                            {{$form->program_code}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="policy-section">
                <div class="policy-label">POLICY NUMBER</div>
                <div class="carrier-value">
                    {{$form->policy_number}}
                </div>
            </div>

            <div class="split-box" style="border-bottom: 1px solid #000;">
                <div class="split-left">
                    <div class="policy-section" style="border-bottom: 0;">
                        <div class="policy-label">UNDERWRITER</div>
                        <div class="carrier-value">
                            {{$form->under_writer}}
                        </div>
                    </div>
                </div>
                <div class="split-right">
                    <div class="policy-section" style="border-bottom: 0;">
                        <div class="policy-label">UNDERWRITER OFFICE</div>
                        <div class="carrier-value">
                            {{$form->under_writer_office}}
                        </div>
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
                               type="checkbox" {{($form->status_quote == 1) ?  'checked' : ''}}>
                        <span style="font-size: 11px;">QUOTE</span>
                    </div>

                    <div style="  align-items: center; margin-bottom: 4px;">
                        <input style="width: 15px; height: 15px;   margin-right: 5px;"
                               type="checkbox" {{($form->status_bound == 1) ?  'checked' : ''}}>
                        <span style="font-size: 11px;">BOUND (Give Date and/or Attach Copy):</span>
                    </div>

                    <div style=" align-items: center; margin-bottom: 4px;">
                        <input style="width: 15px; height: 15px;   margin-right: 5px;"
                               type="checkbox" name="status_change" {{($form->status_change == 1) ?  'checked' : ''}}>
                        <span style="font-size: 11px;">CHANGE</span>
                    </div>

                    <div style=" align-items: center; margin-bottom: 4px;">
                        <input style="width: 15px; height: 15px;   margin-right: 5px;"
                               type="checkbox" name="status_cancel" {{($form->status_cancel == 1) ?  'checked' : ''}}>
                        <span style="font-size: 11px;">CANCEL</span>
                    </div>

                </div>
                <div
                    style="width: 397px; height: 98px; float: left; padding: 5px 0 0 5px; box-sizing: border-box;">
                    <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                <span style="font-size: 11px; margin-left: 130px;">
                                    <div style="display: flex; align-items: center;">
                                       <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                              type="checkbox" name="status_renew"  {{($form->status_renew == 1) ?  'checked' : ''}}>
                                        <span style="font-size: 11px;">RENEW</span>
                                    </div>
                                     <div style="display: flex; align-items: center;">
                                      <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                             type="checkbox" name="" {{($form->status_issue_policy == 1) ?  'checked' : ''}}>
                                            <span style="font-size: 11px;">ISSUE POLICY</span>
                                     </div>
                                </span>


                    </div>

                    <div style="display: flex; align-items: center; font-size: 11px; gap: 20px;">

                        <!-- DATE -->
                        <div style="display: flex; align-items: center; gap: 5px;">
                            <span>DATE</span>
                            {{$form->status_date}}
                        </div>

                        <!-- Vertical Line -->
                        <div style="height: 20px; width: 1px; background-color: black;"></div>

                        <!-- TIME -->
                        <div style="display: flex; align-items: center; gap: 10px;">
                            <span>TIME</span>
                            <div style="display: flex; flex-direction: column; align-items: flex-start;">
                                <label style="display: flex; align-items: center; gap: 5px;">
                                    <input type="radio" name="status_time"
                                           {{($form->status_time == 'AM') ?  'checked' : ''}}
                                           style="width: 15px; height: 15px;">
                                    AM
                                </label>
                                <label style="display: flex; align-items: center; gap: 5px;">
                                    <input type="radio" name="status_time"
                                           {{($form->status_time == 'PM') ?  'checked' : ''}}
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
                           name="business_boiler" {{($form->business->business_boiler == 1) ?  'checked' : ''}}>

                    <div>BOILER & MACHINERY</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_boiler_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_cyber" {{($form->business->business_cyber == 1) ?  'checked' : ''}} value="1">

                    <div>CYBER AND PRIVACY</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_cyber_limit }}  </td>

            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_yacht" {{($form->business->business_yacht == 1) ?  'checked' : ''}} value="1">

                    <div>YACHT</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_yacht_limit }} </td>
        </tr>

        <tr>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_auto" {{($form->business->business_auto == 1) ?  'checked' : ''}}  value="1">

                    <div>BUSINESS AUTO</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_auto_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_fiduciary"
                           {{($form->business->business_fiduciary == 1) ?  'checked' : ''}}  value="1">

                    <div>FIDUCIARY LIABILITY</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_fiduciary_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
        </tr>

        <tr>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_owner"
                           {{($form->business->business_owner == 1) ?  'checked' : ''}}  value="1">

                    <div>BUSINESS OWNERS</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_owner_limit }}  </td>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_garage"
                           {{($form->business->business_garage == 1) ?  'checked' : ''}}  value="1">

                    <div>GARAGE AND DEALERS</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_garage_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
        </tr>

        <tr>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_commercial_gl"
                           {{($form->business->business_commercial_gl == 1) ?  'checked' : ''}}  value="1">

                    <div>COMMERCIAL GENERAL LIABILITY</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">
                $ {{($form->business->business_commercial_gl_limit  ) }}  </td>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_liquor"
                           {{($form->business->business_liquor == 1) ?  'checked' : ''}}  value="1">

                    <div>LIQUOR LIABILITY</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_liquor_limit }}</td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
        </tr>

        <tr>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_inland"
                           {{($form->business->business_inland == 1) ?  'checked' : ''}} value="1">

                    <div>COMMERCIAL INLAND MARINE</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_inland_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_motor" {{($form->business->business_motor == 1) ?  'checked' : ''}} value="1">

                    <div>MOTOR CARRIER</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_motor_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
        </tr>

        <tr>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_owner" {{($form->business->business_owner == 1) ?  'checked' : ''}} value="1">

                    <div>COMMERCIAL PROPERTY</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_motor_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_trucker"
                           {{($form->business->business_trucker == 1) ?  'checked' : ''}} value="1">

                    <div>TRUCKERS</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_trucker_limit }}</td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
            <td style="border: 1px solid #000; padding: 5px;"></td>
        </tr>

        <tr>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_crime" {{($form->business->business_crime == 1) ?  'checked' : ''}} value="1">

                    <div>CRIME</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_crime_limit }} </td>
            <td style="border: 1px solid #000; padding: 5px;">
                <div style="display: flex; align-items: center;">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="business_umbrella"
                           {{($form->business->business_umbrella == 1) ?  'checked' : ''}} value="1">

                    <div>UMBRELLA</div>
                </div>
            </td>
            <td style="border: 1px solid #000; padding: 5px;">$ {{$form->business->business_umbrella_limit }}</td>
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
                           name="attachment_account_receivable"
                           {{($form->attachment->attachment_account_receivable == 1) ?  'checked' : ''}}  value="1">
                </td>
                <td class="label-text">ACCOUNTS RECEIVABLE / VALUABLE PAPERS</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_glass"
                           {{($form->attachment->attachment_glass == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">GLASS AND SIGN SECTION</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_statement"
                           {{($form->attachment->attachment_statement == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">STATEMENT / SCHEDULE OF VALUES</td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_additional_interest"
                           {{($form->attachment->attachment_additional_interest == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">ADDITIONAL INTEREST SCHEDULE</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_hotel"
                           {{($form->attachment->attachment_hotel == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">HOTEL / MOTEL SUPPLEMENT</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_state"
                           {{($form->attachment->attachment_state == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">STATE SUPPLEMENT (if applicable)</td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_additional_premises"
                           {{($form->attachment->attachment_additional_premises == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">ADDITIONAL PREMISES INFORMATION SCHEDULE</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_installation"
                           {{($form->attachment->attachment_installation == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">INSTALLATION / BUILDERS RISK SECTION</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_vacant"
                           {{($form->attachment->attachment_vacant == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">VACANT BUILDING SUPPLEMENT</td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_apartment"
                           {{($form->attachment->attachment_apartment == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">APARTMENT BUILDING SUPPLEMENT</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_liability_exposure"
                           {{($form->attachment->attachment_liability_exposure == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">INTERNATIONAL LIABILITY EXPOSURE SUPPLEMENT</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_vehicle"
                           {{($form->attachment->attachment_vehicle == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">VEHICLE SCHEDULE</td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_condo"
                           {{($form->attachment->attachment_condo == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">CONDO ASSN BYLAWS (for D&O Coverage only)</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_property_exposure"
                           {{($form->attachment->attachment_property_exposure == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">INTERNATIONAL PROPERTY EXPOSURE SUPPLEMENT</td>
                <td class="checkbox-column">

                </td>
                <td class="label-text">
                    {{$form->attachment->attachment_other_one }}
                </td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_contractor"
                           {{($form->attachment->attachment_contractor == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">CONTRACTORS SUPPLEMENT</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_loss"
                           {{($form->attachment->attachment_loss == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">LOSS SUMMARY</td>
                <td class="checkbox-column">

                </td>
                <td class="label-text">
                    {{$form->attachment->attachment_other_two }}

                </td>

            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_coverage"
                           {{($form->attachment->attachment_coverage == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">COVERAGES SCHEDULE</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_cargo"
                           {{($form->attachment->attachment_cargo == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">OPEN CARGO SECTION</td>
                <td class="checkbox-column">

                </td>
                <td class="label-text">
                    {{$form->attachment->attachment_other_three }}

                </td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_dealer"
                           {{($form->attachment->attachment_dealer == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">DEALERS SECTION</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_premium"
                           {{($form->attachment->attachment_premium == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">PREMIUM PAYMENT SUPPLEMENT</td>
                <td class="checkbox-column">

                </td>
                <td class="label-text">
                    {{$form->attachment->attachment_other_four }}

                </td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_driver"
                           {{($form->attachment->attachment_driver == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">DRIVER INFORMATION SCHEDULE</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_professional"
                           {{($form->attachment->attachment_professional == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">PROFESSIONAL LIABILITY SUPPLEMENT</td>
                <td class="checkbox-column">

                </td>
                <td class="label-text">
                    {{$form->attachment->attachment_other_five }}

                </td>
            </tr>
            <tr>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_electronic"
                           {{($form->attachment->attachment_property_exposure == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">ELECTRONIC DATA PROCESSING SECTION</td>
                <td class="checkbox-column">
                    <input style="width: 15px; height: 15px;   margin-right: 5px;" type="checkbox"
                           name="attachment_restaurant"
                           {{($form->attachment->attachment_property_exposure == 1) ?  'checked' : ''}} value="1">
                </td>
                <td class="label-text">RESTAURANT / TAVERN SUPPLEMENT</td>
                <td class="checkbox-column">

                </td>
                <td class="label-text">
                    {{$form->attachment->attachment_other_six }}

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
                    {{$form->applicantt->policy_effective_date }}

                </td>
                <td class="policy-date">
                    {{$form->applicantt->policy_expiration_date }}

                </td>
                <td style="padding: 0;">
                    <table style="border: none; height: 100%;">
                        <tr style="height: 14px; border: none;">
                            <td style="border: none; border-bottom: 1px solid transparent; padding: 0;">
                                <div class="policy-checkbox-row">
                                    <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                           type="radio"
                                           name="policy_billing_plan"
                                           {{$form->applicantt->policy_billing_plan == 'direct' ? 'checked'  : '' }} value="direct">
                                    <label for="direct" class="policy-checkbox-label">DIRECT</label>
                                </div>
                            </td>
                        </tr>
                        <tr style="height: 14px; border: none;">
                            <td style="border: none; padding: 0;">
                                <div class="policy-checkbox-row">
                                    <input style="width: 15px; height: 15px;   margin-right: 5px;"
                                           type="radio"
                                           name="policy_billing_plan"
                                           {{$form->applicantt->policy_billing_plan == 'agency' ? 'checked'  : '' }}  value="agency">
                                    <label for="agency" class="policy-checkbox-label">AGENCY</label>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>

                <td><span class="policy-dollar">$    {{$form->applicantt->policy_payment_plan }}</span></td>
                <td><span class="policy-dollar">$    {$form->applicantt->policy_payment_method }}  </span></td>
                <td><span class="policy-dollar">$    {{$form->applicantt->policy_audit }} </span></td>
                <td><span class="policy-dollar">$    {{$form->applicantt->policy_deposit }}  </span></td>
                <td><span class="policy-dollar">$    {{$form->applicantt->policy_minimum_premium }}  </span></td>
                <td><span class="policy-dollar">$    {{$form->applicantt->policy_policy_premium }} </span>
                </td>

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
                        {{$form->applicantt->applicant_one_name }}

                        <br>
                        {{$form->applicantt->applicant_one_address }}

                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 68px;">
                        {{$form->applicantt->applicant_one_city }}

                        <br>
                        {{$form->applicantt->applicant_one_state }}

                        {{$form->applicantt->applicant_one_zipcode }}

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
                    <td>   {{$form->applicantt->applicant_one_gl_code }} </td>
                    <td>   {{$form->applicantt->applicant_one_sic_code }} </td>
                    <td>  {{$form->applicantt->applicant_one_naic_code }} </td>
                    <td>  {{$form->applicantt->applicant_one_soc_code }} </td>
                </tr>
                <tr>
                    <td colspan="2" class="field-label">BUSINESS PHONE #:</td>
                    <td colspan="2">
                        {{$form->applicantt->applicant_one_phone }}

                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="field-label">WEBSITE ADDRESS :
                        {{$form->applicantt->applicant_one_website }}

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
                    {{$form->applicantt->applicant_one_corporation == 1 ? 'checked' : '' }}></td>
            <td style="width:20%; padding: 2px;">CORPORATION</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_joint_adventure"
                                                            {{$form->applicantt->applicant_one_joint_adventure == 1 ? 'checked' : '' }}   value="1">
            </td>
            <td style="width:20%; padding: 2px;">JOINT VENTURE</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_non_profit"
                                                            {{$form->applicantt->applicant_one_non_profit == 1 ? 'checked' : '' }}    value="1">
            </td>
            <td style="width:20%; padding: 2px;">NOT FOR PROFIT ORG</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_sub_chapter"
                                                            {{$form->applicantt->applicant_one_sub_chapter == 1 ? 'checked' : '' }}     value="1">
            </td>
            <td style="width:20%; padding: 2px;">SUBCHAPTER "S" CORPORATION</td>
        </tr>

        <tr>
            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_individual"
                                                            {{$form->applicantt->applicant_one_individual == 1 ? 'checked' : '' }}  value="1">
            </td>
            <td style="padding: 2px;">INDIVIDUAL</td>

            <td style="width:5%; text-align:center;"></td>
            <td colspan="1" style="padding: 2px;">
                LLC AND MANAGERS<br>
                NO. OF MEMBERS :
                {{$form->applicantt->applicant_one_members }}
            </td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_partnership"
                                                            {{$form->applicantt->applicant_one_partnership == 1 ? 'checked' : '' }}       value="1">
            </td>
            <td style="padding: 2px;">PARTNERSHIP</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_one_trust"
                                                            {{$form->applicantt->applicant_one_trust == 1 ? 'checked' : '' }}        value="1">
            </td>
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
                        {{$form->applicantt->applicant_two_name }}

                        <br>
                        {{$form->applicantt->applicant_two_address }}

                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 68px;">
                        {{$form->applicantt->applicant_two_city }}

                        <br>
                        {{$form->applicantt->applicant_two_state }}

                        {{$form->applicantt->applicant_two_zipcode }}

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
                    <td>   {{$form->applicantt->applicant_two_gl_code }} </td>
                    <td>   {{$form->applicantt->applicant_two_sic_code }} </td>
                    <td>  {{$form->applicantt->applicant_two_naic_code }} </td>
                    <td>  {{$form->applicantt->applicant_two_soc_code }} </td>
                </tr>
                <tr>
                    <td colspan="2" class="field-label">BUSINESS PHONE #:</td>
                    <td colspan="2">
                        {{$form->applicantt->applicant_two_phone }}

                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="field-label">WEBSITE ADDRESS :
                        {{$form->applicantt->applicant_two_website }}

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
                    {{$form->applicantt->applicant_two_corporation == 1 ? 'checked' : '' }}></td>
            <td style="width:20%; padding: 2px;">CORPORATION</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_joint_adventure"
                                                            {{$form->applicantt->applicant_two_joint_adventure == 1 ? 'checked' : '' }}   value="1">
            </td>
            <td style="width:20%; padding: 2px;">JOINT VENTURE</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_non_profit"
                                                            {{$form->applicantt->applicant_two_non_profit == 1 ? 'checked' : '' }}    value="1">
            </td>
            <td style="width:20%; padding: 2px;">NOT FOR PROFIT ORG</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_sub_chapter"
                                                            {{$form->applicantt->applicant_two_sub_chapter == 1 ? 'checked' : '' }}     value="1">
            </td>
            <td style="width:20%; padding: 2px;">SUBCHAPTER "S" CORPORATION</td>
        </tr>

        <tr>
            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_individual"
                                                            {{$form->applicantt->applicant_two_individual == 1 ? 'checked' : '' }}  value="1">
            </td>
            <td style="padding: 2px;">INDIVIDUAL</td>

            <td style="width:5%; text-align:center;"></td>
            <td colspan="1" style="padding: 2px;">
                LLC AND MANAGERS<br>
                NO. OF MEMBERS :
                {{$form->applicantt->applicant_two_members }}
            </td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_partnership"
                                                            {{$form->applicantt->applicant_two_partnership == 1 ? 'checked' : '' }}       value="1">
            </td>
            <td style="padding: 2px;">PARTNERSHIP</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_two_trust"
                                                            {{$form->applicantt->applicant_two_trust == 1 ? 'checked' : '' }}        value="1">
            </td>
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
                        {{$form->applicantt->applicant_three_name }}

                        <br>
                        {{$form->applicantt->applicant_three_address }}

                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="height: 68px;">
                        {{$form->applicantt->applicant_three_city }}

                        <br>
                        {{$form->applicantt->applicant_three_state }}

                        {{$form->applicantt->applicant_three_zipcode }}

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
                    <td>   {{$form->applicantt->applicant_three_gl_code }} </td>
                    <td>   {{$form->applicantt->applicant_three_sic_code }} </td>
                    <td>  {{$form->applicantt->applicant_three_naic_code }} </td>
                    <td>  {{$form->applicantt->applicant_three_soc_code }} </td>
                </tr>
                <tr>
                    <td colspan="2" class="field-label">BUSINESS PHONE #:</td>
                    <td colspan="2">
                        {{$form->applicantt->applicant_three_phone }}

                    </td>
                </tr>
                <tr>
                    <td colspan="4" class="field-label">WEBSITE ADDRESS :
                        {{$form->applicantt->applicant_three_website }}

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
                    {{$form->applicantt->applicant_three_corporation == 1 ? 'checked' : '' }}></td>
            <td style="width:20%; padding: 2px;">CORPORATION</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_joint_adventure"
                                                            {{$form->applicantt->applicant_three_joint_adventure == 1 ? 'checked' : '' }}   value="1">
            </td>
            <td style="width:20%; padding: 2px;">JOINT VENTURE</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_non_profit"
                                                            {{$form->applicantt->applicant_three_non_profit == 1 ? 'checked' : '' }}    value="1">
            </td>
            <td style="width:20%; padding: 2px;">NOT FOR PROFIT ORG</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_sub_chapter"
                                                            {{$form->applicantt->applicant_three_sub_chapter == 1 ? 'checked' : '' }}     value="1">
            </td>
            <td style="width:20%; padding: 2px;">SUBCHAPTER "S" CORPORATION</td>
        </tr>

        <tr>
            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_individual"
                                                            {{$form->applicantt->applicant_three_individual == 1 ? 'checked' : '' }}  value="1">
            </td>
            <td style="padding: 2px;">INDIVIDUAL</td>

            <td style="width:5%; text-align:center;"></td>
            <td colspan="1" style="padding: 2px;">
                LLC AND MANAGERS<br>
                NO. OF MEMBERS :
                {{$form->applicantt->applicant_three_members }}
            </td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_partnership"
                                                            {{$form->applicantt->applicant_three_partnership == 1 ? 'checked' : '' }}       value="1">
            </td>
            <td style="padding: 2px;">PARTNERSHIP</td>

            <td style="width:5%; text-align:center;"><input type="checkbox" name="applicant_three_trust"
                                                            {{$form->applicantt->applicant_three_trust == 1 ? 'checked' : '' }}        value="1">
            </td>
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
        <u> {{$form->producer_customer_id }}</u>
    </div>
    <h2>CONTACT INFORMATION</h2>
    <table style="width: 93.2%">
        <tr>
            <td colspan="6" class="section-label">CONTACT TYPE:
                {{$form->applicantt->contact_info_type_one }}
            </td>
            <td colspan="6" class="section-label">CONTACT TYPE:
                {{$form->applicantt->contact_info_type_two }}
            </td>
        </tr>
        <tr>
            <td colspan="6">CONTACT NAME: {{$form->applicantt->contact_info_name_one }} </td>
            <td colspan="6">CONTACT NAME: {{$form->applicantt->contact_info_name_two }} </td>
        </tr>
        <tr>
            <td colspan="3">
                PRIMARY PHONE #: {{$form->applicantt->contact_info_pp_number_one}}
                <div class="checkbox-group">
                    <label><input type="radio" name="contact_info_pp_type_one"
                                  {{$form->applicantt->applicant_one_corporation == 1 ? 'checked' : '' }} value="home">
                        HOME</label>
                    <label><input type="radio" name="contact_info_pp_type_one"
                                  {{$form->applicantt->applicant_one_corporation == 1 ? 'checked' : '' }}value="bus">
                        BUS</label>
                    <label><input type="radio" name="contact_info_pp_type_one"
                                  {{$form->applicantt->applicant_one_corporation == 1 ? 'checked' : '' }}value="cell">
                        CELL</label>
                </div>
            </td>
            <td colspan="3">
                SECONDARY PHONE #: {{$form->applicantt->contact_info_sp_number_one}}
                <div class="checkbox-group">
                    <label><input type="radio" name="contact_info_sp_type_one"
                                  {{$form->applicantt->contact_info_sp_type_one == 'home' ? 'checked' : '' }} value="home">
                        HOME</label>
                    <label><input type="radio" name="contact_info_sp_type_one"
                                  {{$form->applicantt->contact_info_sp_type_one == 'bus' ? 'checked' : '' }} value="bus">
                        BUS</label>
                    <label><input type="radio" name="contact_info_sp_type_one"
                                  {{$form->applicantt->contact_info_sp_type_one == 'cell' ? 'checked' : '' }} value="cell">
                        CELL</label>
                </div>
            </td>
            <td colspan="3">
                PRIMARY PHONE #: {{$form->applicantt->contact_info_pp_number_two}}
                <div class="checkbox-group">
                    <label><input type="radio" name="contact_info_pp_type_two"
                                  {{$form->applicantt->contact_info_pp_type_two == 'home' ? 'checked' : '' }} value="home">
                        HOME</label>
                    <label><input type="radio" name="contact_info_pp_type_two"
                                  {{$form->applicantt->contact_info_pp_type_two == 'bus' ? 'checked' : '' }} value="bus">
                        BUS</label>
                    <label><input type="radio" name="contact_info_pp_type_two"
                                  {{$form->applicantt->contact_info_pp_type_two == 'cell' ? 'checked' : '' }} value="cell">
                        CELL</label>
                </div>
            </td>
            <td colspan="3">
                SECONDARY PHONE #: {{$form->applicantt->contact_info_sp_number_two}}
                <div class="checkbox-group">
                    <label><input type="radio" name="contact_info_sp_type_two"
                                  {{$form->applicantt->contact_info_sp_type_two == 'home' ? 'checked' : '' }} value="home">
                        HOME</label>
                    <label><input type="radio" name="contact_info_sp_type_two"
                                  {{$form->applicantt->contact_info_sp_type_two == 'bus' ? 'checked' : '' }} value="bus">
                        BUS</label>
                    <label><input type="radio" name="contact_info_sp_type_two"
                                  {{$form->applicantt->contact_info_sp_type_two == 'cell' ? 'checked' : '' }} value="cell">
                        CELL</label>
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="6">PRIMARY E-MAIL ADDRESS: {{$form->applicantt->contact_info_p_email_one }}
            </td>
            <td colspan="6">PRIMARY E-MAIL ADDRESS: {{$form->applicantt->contact_info_p_email_two }}
            </td>

        </tr>
        <tr>
            <td colspan="6">SECONDARY E-MAIL ADDRESS: {{$form->applicantt->contact_info_s_email_one }} </td>
            <td colspan="6">SECONDARY E-MAIL ADDRESS: {{$form->applicantt->contact_info_s_email_two }}   </td>
            </td>
        </tr>
    </table>

    <!--premisses information start 1st-->
    <table class="table-container" style="width: 93.2%">
        <tr>
            <td class="table-cell width-8"><span class="text-bold">LOC # </span> {{$form->premises->premises_loc_one}}
            </td>
            <td class="table-cell width-40"><span class="text-bold">STREET
                           </span> {{$form->premises->premises_street_one}}</td>
            <td class="table-cell width-10">
                <span class="text-bold">CITY LIMITS</span><br>
                <input type="checkbox" name="premises_city_limit_one"
                       {{$form->premises->premises_city_limit_one == 'inside' ? 'checked' : ''}} value="inside">
                INSIDE<br>
                <input type="checkbox" name="premises_city_limit_one"
                       {{$form->premises->premises_city_limit_one == 'outside' ? 'checked' : ''}} value="outside">
                OUTSIDE
            </td>
            <td class="table-cell width-10">
                <span class="text-bold">INTEREST</span><br>
                <input type="checkbox" name="premises_interest_one"
                       {{$form->premises->premises_interest_one == 'owner' ? 'checked' : ''}} value="owner"> OWNER<br>
                <input type="checkbox" name="premises_interest_one"
                       {{$form->premises->premises_interest_one == 'tenant' ? 'checked' : ''}} value="tenant"> TENANT
            </td>
            <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL

                        </span>
                <br>
                {{$form->premises->premises_full_employee_one}}
            </td>
            <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            {{$form->premises->premises_annual_revenue_one}}

</span>
                <hr class="divider-line">
                <span class="text-bold">OCCUPIED AREA:</span>
                <span class="align-right">
   {{$form->premises->premises_occupied_area_one}}
                            SQ FT</span>
                <br>


            </td>
        </tr>
        <tr>
            <td class="table-cell"><span class="text-bold">BLD #   {{$form->premises->premises_bld_one}}  </span></td>
            <td class="table-cell">
                <span class="text-bold">CITY:  {{$form->premises->premises_city_one}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">STATE:  {{$form->premises->premises_state_one}} </span>
            </td>
            <td class="table-cell" rowspan="2"></td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold"># PART TIME EMPL  {{$form->premises->premises_part_employee_one}} </span>
            </td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                <span class="align-right"> {{$form->premises->premises_public_area_one}} SQ FT  </span><br>
                <hr class="divider-line">
                <span class="text-bold">TOTAL BUILDING AREA:</span>
                <span class="align-right"> {{$form->premises->premises_building_area_one}} SQ FT  </span><br>
            </td>

        </tr>
        <tr>
            <td class="table-cell"></td>
            <td class="table-cell"><span class="text-bold">COUNTRY:  {{$form->premises->premises_country_one}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">ZIP:  {{$form->premises->premises_zipcode_one}} </span>
            </td>
        </tr>
    </table>
    <table class="table-container" style="width: 93.2%">
        <tr>
            <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                OPERATIONS:
                {{$form->premises->premises_description_one}}
            </td>
            <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                <input type="radio" name="premises_leased_one"
                       {{$form->premises->premises_leased_one == 1 ? 'checked' : ''}}
                       value="1"> YES<br>
                <input type="radio" name="premises_leased_one"
                       {{$form->premises->premises_leased_one == 0 ? 'checked' : ''}} value="0"> NO
            </td>
        </tr>
    </table>

    <table class="table-container" style="width: 93.2%">
        <tr>
            <td class="table-cell width-8"><span class="text-bold">LOC # </span> {{$form->premises->premises_loc_two}}
            </td>
            <td class="table-cell width-40"><span class="text-bold">STREET
                           </span> {{$form->premises->premises_street_two}}</td>
            <td class="table-cell width-10">
                <span class="text-bold">CITY LIMITS</span><br>
                <input type="checkbox" name="premises_city_limit_two"
                       {{$form->premises->premises_city_limit_two == 'inside' ? 'checked' : ''}} value="inside">
                INSIDE<br>
                <input type="checkbox" name="premises_city_limit_two"
                       {{$form->premises->premises_city_limit_two == 'outside' ? 'checked' : ''}} value="outside">
                OUTSIDE
            </td>
            <td class="table-cell width-10">
                <span class="text-bold">INTEREST</span><br>
                <input type="checkbox" name="premises_interest_two"
                       {{$form->premises->premises_interest_two == 'owner' ? 'checked' : ''}} value="owner"> OWNER<br>
                <input type="checkbox" name="premises_interest_two"
                       {{$form->premises->premises_interest_two == 'tenant' ? 'checked' : ''}} value="tenant"> TENANT
            </td>
            <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL

                        </span>
                <br>
                {{$form->premises->premises_full_employee_two}}
            </td>
            <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            {{$form->premises->premises_annual_revenue_two}}

</span>
                <hr class="divider-line">
                <span class="text-bold">OCCUPIED AREA:</span>
                <span class="align-right">
   {{$form->premises->premises_occupied_area_two}}
                            SQ FT</span>
                <br>


            </td>
        </tr>
        <tr>
            <td class="table-cell"><span class="text-bold">BLD #   {{$form->premises->premises_bld_two}}  </span></td>
            <td class="table-cell">
                <span class="text-bold">CITY:  {{$form->premises->premises_city_two}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">STATE:  {{$form->premises->premises_state_two}} </span>
            </td>
            <td class="table-cell" rowspan="2"></td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold"># PART TIME EMPL  {{$form->premises->premises_part_employee_two}} </span>
            </td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                <span class="align-right"> {{$form->premises->premises_public_area_two}} SQ FT  </span><br>
                <hr class="divider-line">
                <span class="text-bold">TOTAL BUILDING AREA:</span>
                <span class="align-right"> {{$form->premises->premises_building_area_two}} SQ FT  </span><br>
            </td>

        </tr>
        <tr>
            <td class="table-cell"></td>
            <td class="table-cell"><span class="text-bold">COUNTRY:  {{$form->premises->premises_country_two}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">ZIP:  {{$form->premises->premises_zipcode_two}} </span>
            </td>
        </tr>
    </table>
    <table class="table-container" style="width: 93.2%">
        <tr>
            <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                OPERATIONS:
                {{$form->premises->premises_description_two}}
            </td>
            <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                <input type="radio" name="premises_leased_two"
                       {{$form->premises->premises_leased_two == 1 ? 'checked' : ''}}
                       value="1"> YES<br>
                <input type="radio" name="premises_leased_two"
                       {{$form->premises->premises_leased_two == 0 ? 'checked' : ''}} value="0"> NO
            </td>
        </tr>
    </table>

    <table class="table-container" style="width: 93.2%">
        <tr>
            <td class="table-cell width-8"><span class="text-bold">LOC # </span> {{$form->premises->premises_loc_three}}
            </td>
            <td class="table-cell width-40"><span class="text-bold">STREET
                           </span> {{$form->premises->premises_street_three}}</td>
            <td class="table-cell width-10">
                <span class="text-bold">CITY LIMITS</span><br>
                <input type="checkbox" name="premises_city_limit_three"
                       {{$form->premises->premises_city_limit_three == 'inside' ? 'checked' : ''}} value="inside">
                INSIDE<br>
                <input type="checkbox" name="premises_city_limit_three"
                       {{$form->premises->premises_city_limit_three == 'outside' ? 'checked' : ''}} value="outside">
                OUTSIDE
            </td>
            <td class="table-cell width-10">
                <span class="text-bold">INTEREST</span><br>
                <input type="checkbox" name="premises_interest_three"
                       {{$form->premises->premises_interest_three == 'owner' ? 'checked' : ''}} value="owner"> OWNER<br>
                <input type="checkbox" name="premises_interest_three"
                       {{$form->premises->premises_interest_three == 'tenant' ? 'checked' : ''}} value="tenant"> TENANT
            </td>
            <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL

                        </span>
                <br>
                {{$form->premises->premises_full_employee_three}}
            </td>
            <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            {{$form->premises->premises_annual_revenue_three}}

</span>
                <hr class="divider-line">
                <span class="text-bold">OCCUPIED AREA:</span>
                <span class="align-right">
   {{$form->premises->premises_occupied_area_three}}
                            SQ FT</span>
                <br>


            </td>
        </tr>
        <tr>
            <td class="table-cell"><span class="text-bold">BLD #   {{$form->premises->premises_bld_three}}  </span></td>
            <td class="table-cell">
                <span class="text-bold">CITY:  {{$form->premises->premises_city_three}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">STATE:  {{$form->premises->premises_state_three}} </span>
            </td>
            <td class="table-cell" rowspan="2"></td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold"># PART TIME EMPL  {{$form->premises->premises_part_employee_three}} </span>
            </td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                <span class="align-right"> {{$form->premises->premises_public_area_three}} SQ FT  </span><br>
                <hr class="divider-line">
                <span class="text-bold">TOTAL BUILDING AREA:</span>
                <span class="align-right"> {{$form->premises->premises_building_area_three}} SQ FT  </span><br>
            </td>

        </tr>
        <tr>
            <td class="table-cell"></td>
            <td class="table-cell"><span class="text-bold">COUNTRY:  {{$form->premises->premises_country_three}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">ZIP:  {{$form->premises->premises_zipcode_three}} </span>
            </td>
        </tr>
    </table>
    <table class="table-container" style="width: 93.2%">
        <tr>
            <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                OPERATIONS:
                {{$form->premises->premises_description_three}}
            </td>
            <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                <input type="radio" name="premises_leased_three"
                       {{$form->premises->premises_leased_three == 1 ? 'checked' : ''}}
                       value="1"> YES<br>
                <input type="radio" name="premises_leased_three"
                       {{$form->premises->premises_leased_three == 0 ? 'checked' : ''}} value="0"> NO
            </td>
        </tr>
    </table>

    <table class="table-container" style="width: 93.2%">
        <tr>
            <td class="table-cell width-8"><span class="text-bold">LOC # </span> {{$form->premises->premises_loc_four}}
            </td>
            <td class="table-cell width-40"><span class="text-bold">STREET
                           </span> {{$form->premises->premises_street_four}}</td>
            <td class="table-cell width-10">
                <span class="text-bold">CITY LIMITS</span><br>
                <input type="checkbox" name="premises_city_limit_four"
                       {{$form->premises->premises_city_limit_four == 'inside' ? 'checked' : ''}} value="inside">
                INSIDE<br>
                <input type="checkbox" name="premises_city_limit_four"
                       {{$form->premises->premises_city_limit_four == 'outside' ? 'checked' : ''}} value="outside">
                OUTSIDE
            </td>
            <td class="table-cell width-10">
                <span class="text-bold">INTEREST</span><br>
                <input type="checkbox" name="premises_interest_four"
                       {{$form->premises->premises_interest_four == 'owner' ? 'checked' : ''}} value="owner"> OWNER<br>
                <input type="checkbox" name="premises_interest_four"
                       {{$form->premises->premises_interest_four == 'tenant' ? 'checked' : ''}} value="tenant"> TENANT
            </td>
            <td class="table-cell width-10">
                        <span class="text-bold"># FULL TIME EMPL

                        </span>
                <br>
                {{$form->premises->premises_full_employee_four}}
            </td>
            <td class="table-cell width-22">
                        <span class="text-bold">ANNUAL REVENUES: $
                            {{$form->premises->premises_annual_revenue_four}}

</span>
                <hr class="divider-line">
                <span class="text-bold">OCCUPIED AREA:</span>
                <span class="align-right">
   {{$form->premises->premises_occupied_area_four}}
                            SQ FT</span>
                <br>


            </td>
        </tr>
        <tr>
            <td class="table-cell"><span class="text-bold">BLD #   {{$form->premises->premises_bld_four}}  </span></td>
            <td class="table-cell">
                <span class="text-bold">CITY:  {{$form->premises->premises_city_four}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">STATE:  {{$form->premises->premises_state_four}} </span>
            </td>
            <td class="table-cell" rowspan="2"></td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold"># PART TIME EMPL  {{$form->premises->premises_part_employee_four}} </span>
            </td>
            <td class="table-cell" rowspan="2">
                <span class="text-bold">OPEN TO PUBLIC AREA:</span>
                <span class="align-right"> {{$form->premises->premises_public_area_four}} SQ FT  </span><br>
                <hr class="divider-line">
                <span class="text-bold">TOTAL BUILDING AREA:</span>
                <span class="align-right"> {{$form->premises->premises_building_area_four}} SQ FT  </span><br>
            </td>

        </tr>
        <tr>
            <td class="table-cell"></td>
            <td class="table-cell"><span class="text-bold">COUNTRY:  {{$form->premises->premises_country_four}} </span>
            </td>
            <td class="table-cell"><span class="text-bold">ZIP:  {{$form->premises->premises_zipcode_four}} </span>
            </td>
        </tr>
    </table>
    <table class="table-container" style="width: 93.2%">
        <tr>
            <td style="border: 1px solid black; padding: 8px; width: 80%;">DESCRIPTION OF
                OPERATIONS:
                {{$form->premises->premises_description_four}}
            </td>
            <td style="border: 1px solid black; padding: 8px; width: 20%; text-align: center;">
                <span class="text-bold"> ANY AREA LEASED TO OTHERS?</span><br>
                <input type="radio" name="premises_leased_four"
                       {{$form->premises->premises_leased_four == 1 ? 'checked' : ''}}
                       value="1"> YES<br>
                <input type="radio" name="premises_leased_four"
                       {{$form->premises->premises_leased_four == 0 ? 'checked' : ''}} value="0"> NO
            </td>
        </tr>
    </table>


    <!--end of premisis section-->

    <!--start of Nature -->
    <table class="nb-table" style="width: 93.2%">
        <td colspan="6" class=""><span class="nb-bold">NATURE OF BUSINESS</span></td>


        <tr class="nb-checkbox-row">
            <td class="nb-td" style="width: 16%;">
                <input type="checkbox" name="nature_apartment"
                       {{$form->premises->nature_apartment == 1 ? 'checked' : ''}} value="1">
                APARTMENTS
            </td>
            <td class="nb-td" style="width: 16%;">
                <input type="checkbox" name="nature_contractor"
                       {{$form->premises->nature_contractor == 1 ? 'checked' : ''}} value="1">
                CONTRACTOR
            </td>
            <td class="nb-td" style="width: 16%;">
                <input type="checkbox" name="nature_manufacture"
                       {{$form->premises->nature_manufacture == 1 ? 'checked' : ''}} value="1">
                MANUFACTURING
            </td>
            <td class="nb-td" style="width: 16%;">
                <input type="checkbox" name="nature_restaurant"
                       {{$form->premises->nature_restaurant == 1 ? 'checked' : ''}} value="1">
                RESTAURANT
            </td>
            <td class="nb-td" style="width: 16%;">
                <input type="checkbox" name="nature_service"
                       {{$form->premises->nature_service == 1 ? 'checked' : ''}} value="1">
                SERVICE
            </td>
            <td class="nb-td" style="width: 16%;"></td>
            <td class="nb-td" rowspan="2"><span class="nb-bold">DATE BUSINESS<br>STARTED

                                    {{$form->premises->nature_start_date }}

                        </span></td>
        </tr>
        <tr class="nb-checkbox-row">
            <td class="nb-td">
                <input type="checkbox" name="nature_condom"
                       {{$form->premises->nature_condom == 1 ? 'checked' : ''}} value="1">
                CONDOMINIUMS
            </td>
            <td class="nb-td">
                <input type="checkbox" name="nature_institutional"
                       {{$form->premises->nature_institutional == 1 ? 'checked' : ''}} value="1">
                INSTITUTIONAL
            </td>
            <td class="nb-td">
                <input type="checkbox" name="nature_office"
                       {{$form->premises->nature_office == 1 ? 'checked' : ''}} value="1">
                OFFICE
            </td>
            <td class="nb-td">
                <input type="checkbox" name="nature_retail"
                       {{$form->premises->nature_retail == 1 ? 'checked' : ''}} value="1">
                RETAIL
            </td>
            <td class="nb-td">
                <input type="checkbox" name="nature_wholesale"
                       {{$form->premises->nature_wholesale == 1 ? 'checked' : ''}} value="1">
                WHOLESALE
            </td>
            <td class="nb-td"></td>
        </tr>
        <tr>
            <td colspan="7" class="nb-th nb-bg-light">
                <p><b> DESCRIPTION OF PRIMARY
                        OPERATIONS</b></p>
                {{$form->premises->nature_description }}
            </td>
        </tr>

        <tr>
            <td class="nb-td" style="width: 33%;">
                        <span class="nb-bold">RETAIL STORES OR SERVICE OPERATIONS % OF TOTAL SALES:                  {{$form->premises->nature_total_sale }}
</span>
            </td>
            <td class="nb-td" style="width: 33%;" colspan="3">
                <span class="nb-bold">INSTALLATION, SERVICE OR REPAIR WORK</span><br>
                <div class="nb-percent-cell">% {{$form->premises->nature_installation }}
                </div>
            </td>
            <td class="nb-td" style="width: 34%;" colspan="3">
                <span class="nb-bold">OFF PREMISES INSTALLATION, SERVICE OR REPAIR WORK</span><br>
                <div class="nb-percent-cell">% {{$form->premises->nature_off_premises }}
                </div>
            </td>
        </tr>
    </table>
    <!--End of Nature-->
    <!--secription section start-->
    <table style="width: 93.2%">
        <td>
            <p><b> Description Of Operations Of Other Insureds </b></p>
            {{$form->premises->nature_description_operation }}

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
                <div class="acord-checkbox"><input type="checkbox" name="interest_additional"
                                                   {{$form->premises->interest_additional == 1 ? 'checked' : ''}} value="1"><label>ADDITIONAL
                        INSURED</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_breach"
                                                   {{$form->premises->interest_breach == 1 ? 'checked' : ''}} value="1"><label>BREACH
                        OF WARRANTY</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_co_owner"
                                                   {{$form->premises->interest_co_owner == 1 ? 'checked' : ''}}
                                                   value="1"><label>CO-OWNER</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_lessor"
                                                   {{$form->premises->interest_lessor == 1 ? 'checked' : ''}} value="1"><label>EMPLOYEE
                        AS LESSOR</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_leaseback"
                                                   {{$form->premises->interest_leaseback == 1 ? 'checked' : ''}} value="1"><label>LEASEBACK
                        OWNER</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_loss"
                                                   {{$form->premises->interest_loss == 1 ? 'checked' : ''}} value="1"><label>LENDER'S
                        LOSS
                        PAYABLE</label></div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_holder"
                                                   {{$form->premises->interest_holder == 1 ? 'checked' : ''}} value="1"><label>LIENHOLDER</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_loss_payee"
                                                   {{$form->premises->interest_loss_payee == 1 ? 'checked' : ''}} value="1"><label>LOSS
                        PAYEE</label></div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_mortgagee"
                                                   {{$form->premises->interest_mortgagee == 1 ? 'checked' : ''}}
                                                   value="1"><label>MORTGAGEE</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_owner"
                                                   {{$form->premises->interest_owner == 1 ? 'checked' : ''}}
                                                   value="1"><label>OWNER</label></div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_registrant"
                                                   {{$form->premises->interest_registrant == 1 ? 'checked' : ''}} value="1"><label>REGISTRANT</label>
                </div>
                <div class="acord-checkbox"><input type="checkbox" name="interest_trustee"
                                                   {{$form->premises->interest_trustee == 1 ? 'checked' : ''}}
                                                   value="1"><label>TRUSTEE</label>
                </div>
                <div class="acord-checkbox"> {{$form->premises->interest_other }} </div>
            </td>

            <!-- NAME AND ADDRESS -->
            <td class="name-col">
                <div><span class="bold">NAME AND ADDRESS :

                         {{$form->premises->interest_name }}
                        {{$form->premises->interest_address }}
                    </span>
                </div>

                <div><span class="bold"> RANK: {{$form->premises->interest_rank }}
                </div>
                <br>
                <table class="subtable">
                    <tr>
                        <td><label>REFERENCE / LOAN #: {{$form->premises->interest_reference }} </label></td>
                        <td><label>INTEREST END DATE: {{$form->premises->interest_end_date }} </label></td>
                    </tr>
                    <tr>
                        <td><label>LIEN AMOUNT: {{$form->premises->interest_line_amount }} </label></td>
                        <td><label>PHONE (A/C, No, Ext): {{$form->premises->interest_phone }} </label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>FAX (A/C, No):{{$form->premises->interest_fax }}  </label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>E-MAIL ADDRESS: {{$form->premises->interest_email }} </label></td>
                    </tr>
                </table>
            </td>

            <!-- EVIDENCE / POLICY / SEND BILL -->
            <td class="evidence-col">
                <div class="acord-checkbox"><input type="radio" name="interest_type"
                                                   {{$form->premises->interest_type == 'evidence' ? 'checked' : '' }}
                                                   value="evidence"><label>EVIDENCE</label>
                </div>
                <div class="acord-checkbox"><input type="radio" name="interest_type"
                                                   {{$form->premises->interest_type == 'certificate' ? 'checked' : '' }} value="certificate"><label>CERTIFICATE</label>
                </div>
                <div class="acord-checkbox"><input type="radio" name="interest_type"
                                                   {{$form->premises->interest_type == 'policy'? 'checked' : '' }}
                                                   value="policy"><label>POLICY</label>
                </div>
                <div class="acord-checkbox"><input type="radio" name="interest_type"
                                                   {{$form->premises->interest_type == 'bill' ? 'checked' : '' }} value="bill"><label>SEND
                        BILL</label></div>
            </td>

            <!-- INTEREST IN ITEM NUMBER -->
            <td class="item-interest-col">
                <table class="subtable">
                    <tr>
                        <td><label>LOCATION: {{$form->premises->interest_location }} </label></td>
                        <td><label>BUILDING: {{$form->premises->interest_building }} </label></td>
                    </tr>
                    <tr>
                        <td><label>VEHICLE: {{$form->premises->interest_vehicle }} </label></td>
                        <td><label>BOAT: {{$form->premises->interest_boat }}<input
                                    style="width: 50%;  margin-left: 5px;" type="text"
                                    name="interest_boat"/></label></td>
                    </tr>
                    <tr>
                        <td><label>AIRPORT: {{$form->premises->interest_airport }} </label></td>
                        <td><label>AIRCRAFT: {{$form->premises->interest_aircraft }} </label></td>
                    </tr>
                    <tr>
                        <td><label>ITEM CLASS: {{$form->premises->interest_item_class }} </label></td>
                        <td><label>ITEM: {{$form->premises->interest_item }} </label></td>
                    </tr>
                    <tr>
                        <td colspan="2"><label>ITEM DESCRIPTION</label>
                            {{$form->premises->interest_item_description }}
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <div class="full-width" style="border: solid 1px black; padding: 10px;"><strong>REASON FOR
            INTEREST:</strong>
        {{$form->premises->interest_reason }}


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
        <div class="header-right">AGENCY CUSTOMER ID: <u>  {{$form->producer_customer_id }}</u></div>
    </div>
    <div class="instruction">EXPLAIN ALL \"YES\" RESPONSES</div>
    <div class="form-row">
        <div class="form-row-label">1a. IS THE APPLICANT A SUBSIDIARY OF ANOTHER ENTITY ?</div>
        <div class="form-row-value">Y / N</div>
    </div>
    <div class="sub-section">
        <div class="sub-row">
            <div class="sub-row-label">PARENT COMPANY NAME <br>
                {{$form->information->information_q_one_a_name }}
            </div>
            <div class="sub-row-value">RELATIONSHIP DESCRIPTION <br>
                {{$form->information->information_q_one_a_relation }}

            </div>
            <div class="sub-row-label-2">% OWNED <br>
                {{$form->information->information_q_one_a_percentage }}
            </div>
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
                {{$form->information->information_q_one_b_name }}


            </div>
            <div class="sub-row-value">RELATIONSHIP DESCRIPTION <br>
                {{$form->information->information_q_one_b_relation }}

            </div>
            <div class="sub-row-label-2">% OWNED <br>
                {{$form->information->information_q_one_b_percentage }}
            </div>
            <div class="sub-row-value-2"></div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-row-label">2. IS A FORMAL SAFETY PROGRAM IN OPERATION?</div>
        <div class="form-row-value"></div>
    </div>
    <div class="safety-options">
        <div class="safety-option">
            <input type="checkbox" name="information_q_two_manual"
                   {{$form->information->information_q_two_manual == 1 ? 'checked' : '' }} style="margin-right: 5px"
                   value="1">
            <div>SAFETY MANUAL</div>
        </div>
        <div class="safety-option">
            <input type="checkbox" name="information_q_two_position"
                   {{$form->information->information_q_two_position == 1 ? 'checked' : '' }}  style="margin-right: 5px"
                   value="1">
            <div>SAFETY POSITION</div>
        </div>
        <div class="safety-option">
            <input type="checkbox" name="information_q_two_meeting"
                   {{$form->information->information_q_two_meeting == 1 ? 'checked' : '' }}  style="margin-right: 5px"
                   value="1">
            <div>MONTHLY MEETINGS</div>
        </div>
        <div class="safety-option">
            <input type="checkbox" name="information_q_two_osha"
                   {{$form->information->information_q_two_osha == 1 ? 'checked' : '' }}  style="margin-right: 5px"
                   value="1">
            <div>OSHA</div>
        </div>
        <div class="safety-option">
            <input type="checkbox" name="information_q_two_other"
                   {{$form->information->information_q_two_other == 1 ? 'checked' : '' }}  style="margin-right: 5px"
                   value="1">
            <div>OTHER</div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-row-label">3. ANY EXPOSURE TO FLAMMABLES, EXPLOSIVES, CHEMICALS?
            {{$form->information->information_q_three }}
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
            <div class="policy-cell">LINE OF BUSINESS {{$form->information->information_q_business_one }}  </div>
            <div class="policy-cell">POLICY NUMBER {{$form->information->information_q_policy_one }} </div>

            <div class="policy-cell">LINE OF BUSINESS {{$form->information->information_q_business_two }} </div>
            <div class="policy-cell">POLICY NUMBER {{$form->information->information_q_policy_two }} </div>
        </div>

        <div class="policy-row">
            <div class="policy-cell">LINE OF BUSINESS {{$form->information->information_q_business_three }} </div>
            <div class="policy-cell">POLICY NUMBER {{$form->information->information_q_policy_three }} </div>

            <div class="policy-cell">LINE OF BUSINESS {{$form->information->information_q_business_four }} </div>
            <div class="policy-cell">POLICY NUMBER {{$form->information->information_q_policy_four }} </div>
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
            <input type="checkbox" name="information_q_non_payment"
                   {{$form->information->information_q_two_other == 1 ? 'checked' : '' }} value="1">
            <div>NON-PAYMENT</div>
        </div>
        <div class="declined-option">
            <input type="checkbox" name="information_q_agent_carrier"
                   {{$form->information->information_q_agent_carrier == 1 ? 'checked' : '' }} value="1">
            <div>AGENT NO LONGER REPRESENTS CARRIER</div>
        </div>
        <div class="declined-option">
            <input type="checkbox" name="information_q_other"
                   {{$form->information->information_q_other == 1 ? 'checked' : '' }} value="1">
            <div>OTHER</div>
        </div>
        <div class="declined-option">
            <input type="checkbox" name="information_q_non_payment"
                   {{$form->information->information_q_non_payment == 1 ? 'checked' : '' }} value="1">
            <div>NON-RENEWAL</div>
        </div>
        <div class="declined-option">
            <input type="checkbox" name="information_q_under_writing"
                   {{$form->information->information_q_under_writing == 1 ? 'checked' : '' }} value="1">
            <div>UNDERWRITING</div>
        </div>
        <div class="declined-option">
            <input type="checkbox" name="information_q_condition"
                   {{$form->information->information_q_condition == 1 ? 'checked' : '' }} value="1">
            <div>CONDITION CORRECTED (Describe):</div>
        </div>
    </div>
    <div class="form-row">
        <div class="form-row-label">6. ANY PAST LOSSES OR CLAIMS RELATING TO SEXUAL ABUSE OR MOLESTATION
            ALLEGATIONS, DISCRIMINATION OR NEGLIGENT HIRING?
            {{$form->information->information_q_six }}

        </div>
        <div class="form-row-value"></div>
    </div>
    <div class="form-row">
        <div class="form-row-label">7. DURING THE LAST FIVE YEARS (TEN IN RI), HAS ANY APPLICANT BEEN INDICTED
            FOR OR CONVICTED OF ANY DEGREE OF THE CRIME OF FRAUD, BRIBERY, ARSON OR ANY OTHER ARSON-RELATED
            CRIME IN CONNECTION WITH THIS OR ANY OTHER PROPERTY?
            {{$form->information->information_q_seven }}


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
            <div class="violation-cell violation-date">OCCUR DATE {{$form->information->information_q_eight_date_one }}
            </div>
            <div class="violation-cell violation-explanation">
                EXPLANATION {{$form->information->information_q_eight_explanation_one }}
            </div>
            <div class="violation-cell violation-resolution">
                RESOLUTION {{$form->information->information_q_eight_resolution_one }}
            </div>
            <div class="violation-cell violation-resolve-date">RESOLVE
                DATE {{$form->information->information_q_eight_resolution_date_one }}
            </div>
        </div>
        <div class="violation-row">
            <div class="violation-cell violation-date">OCCUR DATE {{$form->information->information_q_eight_date_two }}
            </div>
            <div class="violation-cell violation-explanation">
                EXPLANATION {{$form->information->information_q_eight_explanation_two }}
            </div>
            <div class="violation-cell violation-resolution">
                RESOLUTION {{$form->information->information_q_eight_resolution_two }}
            </div>
            <div class="violation-cell violation-resolve-date">RESOLVE
                DATE {{$form->information->information_q_eight_resolution_date_two }}
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
            <div class="violation-cell violation-date">OCCUR DATE {{$form->information->information_q_nine_date_one }}
            </div>
            <div class="violation-cell violation-explanation">
                EXPLANATION {{$form->information->information_q_nine_explanation_one }}
            </div>
            <div class="violation-cell violation-resolution">
                RESOLUTION {{$form->information->information_q_nine_resolution_one }}
            </div>
            <div class="violation-cell violation-resolve-date">RESOLVE
                DATE {{$form->information->information_q_nine_resolution_date_one }}
            </div>
        </div>

        <div class="violation-row">
            <div class="violation-cell violation-date">OCCUR {{$form->information->information_q_nine_date_two }}
            </div>
            <div class="violation-cell violation-explanation">
                EXPLANATION {{$form->information->information_q_nine_explanation_two }}
            </div>
            <div class="violation-cell violation-resolution">
                RESOLUTION {{$form->information->information_q_nine_resolution_two }}
            </div>
            <div class="violation-cell violation-resolve-date">RESOLVE
                DATE {{$form->information->information_q_nine_resolution_date_two }}
            </div>


        </div>
        <div class="form-row">
            <div class="form-row-label">10. HAS APPLICANT HAD A JUDGEMENT OR LIEN DURING THE LAST FIVE (5) YEARS?
            </div>
            <div class="form-row-value"></div>
        </div>
        <div class="violation-table">
            <div class="violation-row">
                <div class="violation-cell violation-date">OCCUR
                    DATE {{$form->information->information_q_ten_date_one }}
                </div>
                <div class="violation-cell violation-explanation">
                    EXPLANATION {{$form->information->information_q_ten_explanation_one }}
                </div>
                <div class="violation-cell violation-resolution">
                    RESOLUTION {{$form->information->information_q_ten_resolution_one }}
                </div>
                <div class="violation-cell violation-resolve-date">RESOLVE
                    DATE {{$form->information->information_q_ten_resolution_date_one }}
                </div>
            </div>


            <div class="violation-row">
                <div class="violation-cell violation-date">OCCUR
                    DATE {{$form->information->information_q_ten_date_two }}
                </div>
                <div class="violation-cell violation-explanation">
                    EXPLANATION {{$form->information->information_q_ten_explanation_two }}
                </div>
                <div class="violation-cell violation-resolution">
                    RESOLUTION {{$form->information->information_q_ten_resolution_two }}
                </div>
                <div class="violation-cell violation-resolve-date">RESOLVE
                    DATE {{$form->information->information_q_ten_resolution_date_two }}
                </div>
            </div>
        </div>
        <div class="form-row">
            <div class="form-row-label">11. HAS BUSINESS BEEN PLACED IN A TRUST?</div>
            <div class="form-row-value">
                <input type="radio" name="information_q_eleven"
                       {{$form->information->information_q_eleven == 1 ? 'checked' : '' }} value="1"> YES<br>
                <input type="radio" name="information_q_eleven"
                       {{$form->information->information_q_eleven == 0 ? 'checked' : '' }}  value="0"> NO
            </div>
        </div>
        <div class="trust-row">
            <div class="trust-label">NAME OF TRUST:</div>
            <div class="trust-value"> {{$form->information->information_q_eleven_name }}

            </div>
        </div>
        <div class="form-row">
            <div class="form-row-label">12. ANY FOREIGN OPERATIONS, FOREIGN PRODUCTS DISTRIBUTED IN USA, OR US
                PRODUCTS SOLD/DISTRIBUTED IN FOREIGN COUNTRIES?<br>(If \"YES\", attach ACORD 815 for Liability
                Exposure and/or ACORD 816 for Property Exposure)
            </div>
            <div class="form-row-value">
                <input type="radio" name="information_q_twelve"
                       {{$form->information->information_q_twelve == 1 ? 'checked' : '' }} value="1"> YES<br>
                <input type="radio" name="information_q_twelve"
                       {{$form->information->information_q_twelve == 0 ? 'checked' : '' }} value="0"> NO
            </div>
        </div>
        <div class="form-row">
            <div class="form-row-label">13. DOES APPLICANT HAVE OTHER BUSINESS VENTURES FOR WHICH COVERAGE IS NOT
                REQUESTED?
                {{$form->information->information_q_thirteen_detail }}

            </div>
            <div class="form-row-value">
                <input type="radio" name="information_q_thirteen"
                       {{$form->information->information_q_thirteen == 1  ? 'checked' : '' }} value="1"> YES<br>
                <input type="radio" name="information_q_thirteen"
                       {{$form->information->information_q_thirteen == 0 ? 'checked' : '' }} value="0"> NO
            </div>
        </div>
        <div class="form-row">
            <div class="form-row-label">14. DOES APPLICANT OWN / LEASE / OPERATE ANY DRONES? (If \"YES\", describe
                use)
                {{$form->information->information_q_fourteen_detail }}

            </div>
            <div class="form-row-value">
                <input type="radio" name="information_q_fourteen"
                       {{$form->information->information_q_fourteen == 1 ? 'checked' : '' }} value="1"> YES<br>
                <input type="radio" name="information_q_fourteen"
                       {{$form->information->information_q_fourteen == 0 ? 'checked' : '' }} value="0"> NO
            </div>
        </div>
        <div class="form-row">
            <div class="form-row-label">15. DOES APPLICANT HIRE OTHERS TO OPERATE DRONES? (If \"YES\", describe
                use)
                {{$form->information->information_q_fifteen_detail }}

            </div>
            <div class="form-row-value">
                <input type="radio" name="information_q_fifteen"
                       {{$form->information->information_q_fifteen == 1 ? 'checked' : '' }} value="1"> YES<br>
                <input type="radio" name="information_q_fifteen"
                       {{$form->information->information_q_fifteen == 0 ? 'checked' : '' }} value="0"> NO
            </div>
        </div>
        <div class="remarks-section">REMARKS / PROCESSING INSTRUCTIONS (ACORD 101, Additional Remarks Schedule, may
            be attached if more space is required)


        </div>
        <div class="remarks-content">
            {{$form->information->remarks }}
        </div>

        <div class="footer">
            <div>ACORD 125 (2016/03)</div>
            <div>Page 3 of 4</div>

        </div>
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
        AGENCY CUSTOMER ID: <u>  {{$form->producer_customer_id }} </u>
    </p>
    <br/>
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
            <div class="carrier-cell-small">                 {{$form->prior->carrier_one_year }}
            </div>
            <div class="carrier-cell-small">CARRIER</div>
            <div class="carrier-cell">                 {{$form->prior->carrier_one_gl }}
            </div>
            <div class="carrier-cell">                 {{$form->prior->carrier_one_auto }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_one_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_one_other }} </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">POLICY NUMBER</div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_one_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_one_auto }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_one_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_one_other }}  </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">PREMIUM</div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_one_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_one_auto }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_one_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_one_other }} </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">EFFECTIVE DATE</div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_one_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_one_auto }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_one_property }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_one_other }}  </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">EXPIRATION DATE</div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_one_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_one_auto }}  </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_one_property }}  </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_one_other }} </div>
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
            <div class="carrier-cell-small">                 {{$form->prior->carrier_two_year }}
            </div>
            <div class="carrier-cell-small">CARRIER</div>
            <div class="carrier-cell">                 {{$form->prior->carrier_two_gl }}
            </div>
            <div class="carrier-cell">                 {{$form->prior->carrier_two_auto }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_two_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_two_other }} </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">POLICY NUMBER</div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_two_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_two_auto }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_two_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_two_other }}  </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">PREMIUM</div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_two_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_two_auto }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_two_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_two_other }} </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">EFFECTIVE DATE</div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_two_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_two_auto }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_two_property }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_two_other }}  </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">EXPIRATION DATE</div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_two_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_two_auto }}  </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_two_property }}  </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_two_other }} </div>
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
            <div class="carrier-cell-small">                 {{$form->prior->carrier_three_year }}
            </div>
            <div class="carrier-cell-small">CARRIER</div>
            <div class="carrier-cell">                 {{$form->prior->carrier_three_gl }}
            </div>
            <div class="carrier-cell">                 {{$form->prior->carrier_three_auto }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_three_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_three_other }} </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">POLICY NUMBER</div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_three_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_three_auto }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_three_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_policy_three_other }}  </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">PREMIUM</div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_three_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_three_auto }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_three_property }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_premium_three_other }} </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">EFFECTIVE DATE</div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_three_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_three_auto }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_three_property }}
            </div>
            <div class="carrier-cell">                {{$form->prior->carrier_effective_three_other }}  </div>
        </div>
        <div class="carrier-row">
            <div class="carrier-cell-small"></div>
            <div class="carrier-cell-small">EXPIRATION DATE</div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_three_gl }} </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_three_auto }}  </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_three_property }}  </div>
            <div class="carrier-cell">                {{$form->prior->carrier_expiration_three_other }} </div>
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
                    {{$form->prior->loss_year }}

                </p>
            </td>
            <td style="width: 135pt; border: 2pt solid black;" colspan="3">
                <br/>
                <p class="common-text arial s2" style="padding-left: 2pt; text-align: left;">TOTAL LOSSES: $
                {{$form->prior->loss_amount }}
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
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_date }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_line }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_description }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_claim_date }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_amount_paid }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_amount_reserved }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_subrogation }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_one_claim_open }}
            </td>
        </tr>

        <tr style="height: 11pt;">
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_date }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_line }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_description }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_claim_date }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_amount_paid }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_amount_reserved }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_subrogation }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_two_claim_open }}
            </td>
        </tr>
        <tr style="height: 11pt;">
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_date }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_line }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_description }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_claim_date }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_amount_paid }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_amount_reserved }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_subrogation }}
            </td>
            <td style="width: 59pt; border: 2pt solid black;">{{$form->prior->loss_three_claim_open }}
            </td>
        </tr>


    </table>

    <p class="common-text arial-black s10" style="padding-left: 10pt; text-align: left;">SIGNATURE</p>

    <table style="border-collapse: collapse; margin-left: 7.22425pt; " cellspacing="0">
        <tr style="height: 11pt;">
            <td style="width: 15pt; border: 2pt solid black;">

                <input type="checkbox" name="signature_notice"
                       {{$form->signature_notice == 1 ? 'checked' : ''}} value="1">

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
                    Applicant Initial:
                    {{$form->applicant }}

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
            <td class="acord-td acord-col-1"><span
                    class="acord-label">PRODUCER'S SIGNATURE :    {{$form->procedure_signature }}   </span>
            </td>
            <td class="acord-td acord-col-2"><span
                    class="acord-label">PRODUCER'S NAME (Please Print)   {{$form->procedure_name }}  </span>
            </td>
            <td class="acord-td acord-col-3"><span class="acord-label">STATE PRODUCER LICENSE NO<br>(Required in Florida)   {{$form->procedure_license }}  </span>
            </td>
        </tr>
        <tr>
            <td colspan="2" class="acord-td acord-col-applicant"><span
                    class="acord-label">APPLICANT'S SIGNATURE   {{$form->applicant_signature }}  </span></td>
            <td class="acord-td">
                <table class="acord-inner-table">
                    <tr>
                        <td class="acord-inner-td acord-col-date acord-inner-border-right">
                            <span class="acord-label">DATE </span><br>
                            {{$form->applicant_date }}
                        </td>
                        <td class="acord-inner-td acord-col-npn">
                                    <span class="acord-label">NATIONAL PRODUCER NUMBER
                                          {{$form->procedure_no }}
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


</body>
</html>
