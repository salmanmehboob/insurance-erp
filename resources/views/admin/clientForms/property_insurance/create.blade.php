@extends('admin.layouts.form')
@push('styles')
    <style>
        .acord-logo {
            height: 50pt !important;
            vertical-align: middle;
            margin-right: 2pt;
        }
        /* Base styles for screen viewing and print intent */
        body {
            font-family: 'Arial', sans-serif;
            /* Common form font */
            font-size: 8pt;
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
            /* min-height: 11in; Min height to ensure page size, content will expand */
            /* padding: 0.25in 0.5in; Top/bottom padding, left/right padding */
            box-sizing: border-box;
            /* Padding included in width/height */
            background-color: white;
            border: 1px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* Subtle shadow for screen view */
            display: flex;
            /* Use flexbox for overall layout */
            flex-direction: column;
        }

        /* Reusable Form Field Line (Label + Underline Input) */
        .form-field-line {
            display: flex;
            align-items: flex-end;
            /* Aligns label baseline with input line */
            line-height: 1.0;
            margin-bottom: 2pt;
            /* Small vertical spacing */
        }

        .form-field-line label {
            white-space: nowrap;
            /* Prevent label from wrapping */
            font-size: 7pt;
            /* Label font size */
            color: #333;
            flex-shrink: 0;
            /* Prevent label from shrinking */
            margin-right: 2pt;
            /* Space between label and input */
            padding-bottom: 0.5pt;
            /* Fine-tune label baseline alignment */
        }

        .form-field-line input[type="text"] {
            flex-grow: 1;
            /* Input takes remaining width */
            border: none;
            border-bottom: 0.5pt solid black;
            /* The underline */
            padding: 0 1pt;
            font-size: 8pt;
            /* Input text size */
            height: 10pt;
            /* Explicit height to control line vertical position */
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1;
            /* Keep input text tight */
        }

        .form-field-line.no-label input {
            margin-right: 0;
            /* No margin if no label */
        }

        /* Header Section */
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            /* margin-bottom: 0.05in; */
        }

        .acord-logo-text {
            display: flex;
            align-items: flex-end;
            font-size: 8pt;
            font-weight: bold;
            flex-shrink: 0;
            margin: 10px;
        }

        .acord-logo {
            height: 15pt;
            vertical-align: middle;
            margin-right: 2pt;
        }

        .header-right-meta {
            display: flex;
            align-items: flex-end;
            font-size: 7pt;
            padding: 5px;
            border: 1px solid #000;
        }

        .header-right-meta .form-field-line {
            margin-left: 0.2in;
            margin-bottom: 0;
        }

        .header-right-meta .form-field-line label {
            font-size: 6pt;
        }

        .header-right-meta .form-field-line input {
            width: 60pt;
            height: 9pt;
            font-size: 7pt;
            text-align: right;
        }

        .main-title {
            font-size: 11pt;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            margin-bottom: 0.05in;
        }

        .header-statement {
            font-size: 7pt;
            line-height: 1.2;
            text-align: justify;
            padding: 5px;
            /* margin-bottom: 0.1in;
                padding-bottom: 0.05in;
                border-bottom: 0.5pt solid black; */
        }

        /* Producer / Insured Section */


        /* Table specific styling for the Producer/Insured Section */
        .producer-insured-table {
            border-collapse: collapse;
            /* Collapse borders for single lines */
            width: 100%;
            border: 0.5pt solid black;
            /* Outer border for the entire table */
            font-size: 8pt;
            line-height: 1.2;
        }

        .producer-insured-table td {
            border: 0.5pt solid black;
            /* Inner borders for cells */
            padding: 0;
            /* No default padding for precise control */
            vertical-align: top;
            /* Align content to the top of the cell */
            box-sizing: border-box;
        }

        /* Column specific styling */
        .producer-insured-table .left-col {
            width: 50%;
            /* Left column takes half width */
        }

        .producer-insured-table .right-col {
            width: 50%;
            /* Right column takes half width */
        }

        /* Cell content padding for better visual spacing */
        .cell-content {
            padding: 5pt;
            /* Internal padding for cell content */
            display: flex;
            flex-direction: column;
        }

        /* Headers within cells */
        .cell-header {
            font-weight: bold;
            font-size: 7pt;
            /* Smaller font for internal headers */
            margin-bottom: 2pt;
        }

        /* Generic Field line within cells */
        .field-line-cell {
            display: flex;
            align-items: flex-end;
            /* Align label baseline with input line */
            line-height: 1.0;
            margin-bottom: 2pt;
            /* Small vertical spacing */
        }

        .field-line-cell label {
            white-space: nowrap;
            font-size: 7pt;
            color: #333;
            flex-shrink: 0;
            margin-right: 2pt;
            padding-bottom: 0.5pt;
        }

        .field-line-cell input[type="text"] {
            flex-grow: 1;
            border: none;
            border-bottom: 0.5pt solid black;
            padding: 0 1pt;
            font-size: 8pt;
            height: 10pt;
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1;
        }

        .field-line-cell.no-label input {
            margin-right: 0;
            /* No margin if no label */
        }

        /* Specific styles for the "CONTACT" line in the right column */
        .contact-info-line {
            display: flex;
            align-items: flex-end;
            margin-top: 3pt;
            font-size: 7pt;
        }

        .contact-info-line span {
            margin-right: 2pt;
        }

        .contact-info-line input {
            flex-grow: 0;
            width: 70pt;
            /* Fixed width for phone/fax numbers */
            height: 9pt;
            border-bottom: 0.5pt solid black;
            padding: 0 1pt;
            font-size: 7pt;
            background-color: transparent;
        }

        .contact-info-line .fax-label {
            margin-left: 10pt;
        }

        /* City, State, Zip */
        .city-state-zip {
            display: flex;
            align-items: flex-end;
            margin-top: 3pt;
            gap: 5pt;
            /* Gap between city, state, zip inputs */
        }

        .city-state-zip .field-line-cell {
            margin-bottom: 0;
            flex: 1;
            /* Allow each part to take equal space */
        }

        .city-state-zip .field-line-cell input {
            width: auto;
            /* Auto width for inputs within this flex container */
            flex-grow: 1;
        }

        .city-state-zip .field-line-cell.state input {
            width: 25pt;
            /* Fixed width for State */
            flex-grow: 0;
        }

        .city-state-zip .field-line-cell.zip input {
            width: 40pt;
            /* Fixed width for Zip */
            flex-grow: 0;
        }

        /* Insurer(s) Affording Coverage section */
        .insurer-coverage-section {
            padding-top: 5pt;
            /* Space from above fields */
        }

        .insurer-coverage-title {
            font-size: 7pt;
            font-weight: bold;
            margin-bottom: 2pt;
            padding-bottom: 2pt;
            border-bottom: 0.5pt solid black;
        }

        .insurer-line {
            display: flex;
            align-items: flex-end;
            margin-bottom: 2pt;
        }

        .insurer-line label {
            white-space: nowrap;
            font-size: 7pt;
            flex-shrink: 0;
            margin-right: 2pt;
            padding-bottom: 0.5pt;
        }

        .insurer-line input {
            flex-grow: 1;
            border: none;
            border-bottom: 0.5pt solid black;
            padding: 0 1pt;
            font-size: 8pt;
            height: 10pt;
            background-color: transparent;
        }

        .insurer-line .naic-code-input {
            width: 45pt;
            /* Fixed width for NAIC # */
            flex-grow: 0;
            margin-left: 5pt;
            text-align: right;
        }

        /* Print Specific Styles */
        @media print {
            body {
                background-color: white;
                margin: 0;
                padding: 0;
                display: block;
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                orphans: 3;
                widows: 3;
            }

            .section-container {
                border: none;
                box-shadow: none;
                margin: 0;
                padding: 0;
                /* Remove container padding for full page control */
                width: 8.5in;
                /* Ensure full page width for positioning */
            }

            .producer-insured-table {
                width: 7.5in;
                /* Set fixed width for print to match form */
                margin: 0.5in auto 0.1in auto;
                /* Center table on print page, adjust top/bottom margin */
            }

            .producer-insured-table td {
                padding: 0;
                /* Keep padding at 0 for inputs to fill cell */
            }

            .cell-content {
                padding: 5pt;
                /* Maintain internal content padding */
            }

            input[type="text"] {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                vertical-align: baseline;
                padding-bottom: 0;
                height: auto;
                min-height: 9pt;
                /* Ensure inputs have a minimum height */
            }

            .field-line-cell label,
            .contact-info-line span,
            .insurer-line label {
                padding-bottom: 0;
            }

            .producer-insured-table .cell-header {
                font-size: 7pt;
                /* Ensure font size consistency */
            }

            .insurer-line input {
                min-height: 9pt;
                /* Ensure input box has height */
            }
        }

        /* Coverage Section */
        .coverage-section {
            /* margin-bottom: 0.1in; */
        }

        .coverage-title {
            font-size: 9pt;
            font-weight: bold;
            margin-bottom: 5pt;
            padding-bottom: 2pt;
            border-bottom: 0.5pt solid black;
        }

        .coverage-meta-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.1in;
            margin-bottom: 0.1in;
        }

        .coverage-meta-grid .form-field-line {
            margin-bottom: 0;
        }

        .coverage-meta-grid .form-field-line label {
            font-size: 7pt;
        }

        .coverage-meta-grid .form-field-line input {
            font-size: 8pt;
            height: 10pt;
        }

        /* Main Coverage Table */
        .coverage-table {
            border-collapse: collapse;
            width: 100%;
            border: 0.5pt solid black;
            /* Outer border */
            font-size: 7pt;
            line-height: 1.2;
        }

        .coverage-table th,
        .coverage-table td {
            border: 0.5pt solid black;
            /* Inner borders */
            padding: 2pt 3pt;
            vertical-align: top;
            box-sizing: border-box;
        }

        .coverage-table th {
            font-weight: bold;
            text-align: center;
            background-color: #f8f8f8;
            height: 20pt;
            /* Fixed height for header cells */
        }

        .coverage-table td {
            position: relative;
            height: 15pt;
            /* Fixed height for data rows */
        }

        .coverage-table .col-checkbox {
            width: 15pt;
            text-align: center;
            padding: 0;
        }

        .coverage-table .col-type {
            width: 15%;
        }

        .coverage-table .col-deductibles {
            width: 15%;
        }

        .coverage-table .col-policy-number {
            width: 15%;
        }

        .coverage-table .col-date {
            width: 15%;
        }

        .coverage-table .col-covered-property {
            width: 15%;
        }

        .coverage-table .col-limit {
            width: 10%;
            text-align: right;
        }

        .coverage-table .col-checkbox input[type="checkbox"] {
            margin: 0;
            vertical-align: middle;
            transform: scale(0.7);
            /* Smaller checkboxes */
        }

        .coverage-table .limit-input {
            width: calc(100% - 2pt);
            /* Full width minus padding */
            border: none;
            border-bottom: 0.5pt solid black;
            font-size: 7pt;
            height: 9pt;
            padding: 0 1pt;
            text-align: right;
            background-color: transparent;
            box-sizing: border-box;
            position: absolute;
            bottom: 1pt;
            /* Align to bottom of cell */
            right: 1pt;
        }

        .coverage-table .policy-number-input,
        .coverage-table .date-input {
            width: calc(100% - 2pt);
            border: none;
            border-bottom: 0.5pt solid black;
            font-size: 7pt;
            height: 9pt;
            padding: 0 1pt;
            background-color: transparent;
            box-sizing: border-box;
            position: absolute;
            bottom: 1pt;
            left: 1pt;
        }

        /* Special Conditions / Other Coverages */
        .special-conditions {
            font-size: 7pt;
            line-height: 1.2;
            margin-top: 0.1in;
            padding-top: 5pt;
            border-top: 0.5pt solid black;
            margin-bottom: 0.1in;
        }

        /* Certificate Holder / Cancellation Section */
        .certificate-cancel-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0.1in;
            flex-grow: 1;
            /* Allows this section to fill remaining space */
        }

        .certificate-holder-box {
            border: 1pt solid black;
            padding: 0.1in;
            display: flex;
            flex-direction: column;
        }

        .certificate-holder-title {
            font-size: 9pt;
            font-weight: bold;
            margin-bottom: 5pt;
            padding-bottom: 2pt;
            border-bottom: 0.5pt solid black;
        }

        .certificate-holder-address {
            flex-grow: 1;
            /* Allow address area to expand */
            border: none;
            resize: none;
            font-family: 'Arial', sans-serif;
            font-size: 8pt;
            line-height: 1.2;
            padding: 0;
            outline: none;
        }

        .cancellation-box {
            border: 1pt solid black;
            padding: 0.1in;
            display: flex;
            flex-direction: column;
        }

        .cancellation-title {
            font-size: 9pt;
            font-weight: bold;
            margin-bottom: 5pt;
            padding-bottom: 2pt;
            border-bottom: 0.5pt solid black;
        }

        .cancellation-text {
            font-size: 8pt;
            line-height: 1.2;
            flex-grow: 1;
            margin-bottom: 5pt;
        }

        .cancellation-representative {
            font-size: 8pt;
            font-weight: bold;
            text-align: right;
            margin-top: auto;
            /* Push to bottom */
        }

        .cancellation-representative input {
            width: 100%;
            border: none;
            border-bottom: 0.5pt solid black;
            padding: 0 2pt;
            font-size: 8pt;
            height: 10pt;
            background-color: transparent;
            box-sizing: border-box;
        }

        /* Footer Section */
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            padding: 5px;
            font-size: 6pt;
            font-weight: 600;
            /* color: #555; */
        }

        .footer-copyright {
            flex-grow: 1;
            text-align: right;
        }

        /* PRINT MEDIA QUERIES - CRITICAL for accurate printing */

        .w50 {
            width: 50%;
        }

        /* .table-producer table td.50per{width: 50%;} */
        .table-producer table td {
            padding: 3px;
        }

        .tableinnertd td {
            border-left: 0.5pt solid black;
            border-right: 0.5pt solid black;
            border-top: 0.5pt solid black;
            border-bottom: 0.5pt solid black;
            padding: 4px;
            vertical-align: middle;
            box-sizing: border-box;
        }

        .certificate td {
            width: 50%;
            border: 1px solid black;
            vertical-align: text-top;
            padding: 5px;
        }

        .s1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 13.5pt;
        }

        .s2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .property-coverage-p {
            padding-bottom: 15pt;
        }

        .s3 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s4 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s5 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s6 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6pt;
        }

        p {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
            margin: 0pt;
        }

        .s7 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s8 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s9 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s10 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        .s11 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s12 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6.5pt;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }

        input,
        textarea {
            font-family: Arial, sans-serif;
            font-size: 8pt;
            width: 100%;
            box-sizing: border-box;
        }

        *,
        ::after,
        ::before {

            border-color: #000000 !important;
        }

        input,
        optgroup,
        select,
        textarea {
            border: 1px solid;
        }
    </style>
@endpush
@section('content')
    <div>
        <form action="{{ route('store-property-insurance') }}" method="POST" class=" mt-4">
            @csrf

            <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">
            <div>
                <div class="header-top">
                    <div class="acord-logo-text">
                        <img src="{{asset('backend/img/acord-logo.png')}}" alt="ACORD Logo" class="acord-logo inline-block align-middle">
                    </div>
                    <div class="main-title">
                        CERTIFICATE OF PROPERTY INSURANCE
                    </div>
                    <div class="header-right-meta">
                        <div class="" style="text-align: center;">
                            <label>DATE (MM/DD/YYYY):</label>
                            <p><input type="text" name="invoice_date" placeholder="Date" value="" /></p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="form-container">
                <!-- Top Header Section -->
                <div class="header-statement">
                    THIS CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE CERTIFICATE HOLDER. THIS 
                    CERTIFICATE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE AFFORDED BY THE POLICIES 
                    BELOW. THIS CERTIFICATE OF INSURANCE DOES NOT CONSTITUTE A CONTRACT BETWEEN THE ISSUING INSURER(S), AUTHORIZED 
                    REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE HOLDER.
                </div>

                <!-- Producer / Insured Section -->

                <div class="section-container">
                    <table class="producer-insured-table">
                        <tr>
                            <td class="left-col">
                                <div class="cell-content">
                                    <div class="cell-header">PRODUCER</div>
                                    <div class="field-line-cell no-label">
                                        <input type="text" name="producer_name" placeholder="Producer Name" value="" />
                                    </div>
                                    <div class="field-line-cell no-label">
                                        <input type="text" name="producer_address" placeholder="Producer Address" value="" />
                                    </div>
                                    <div class="city-state-zip">
                                        <div class="field-line-cell">
                                            <input type="text" name="producer_phone" placeholder="phone" value="" />
                                        </div>
                                        <div class="field-line-cell zip">
                                            <input type="text" name="producer_fax" value="" placeholder="Fax" />
                                        </div>
                                    </div>
                                    <div class="city-state-zip">
                                        <div class="field-line-cell">
                                            <input type="text" name="producer_city" placeholder="Producer City" value="" />
                                        </div>
                                        <div class="field-line-cell state">
                                            <input type="text" name="producer_state" value="" placeholder="State" />
                                        </div>
                                        <div class="field-line-cell zip">
                                            <input type="text" name="producer_zipcode" value="" placeholder="Zip Code" />
                                        </div>
                                    </div>
                                </div>
                                <hr style="margin-top: 10px; margin-bottom: 10px; border-color: #000;">
                                <div class="cell-content">
                                    <div class="cell-header">INSURED</div>
                                    <div class="field-line-cell no-label">
                                        <input type="text" name="insured_name" value="" placeholder="Insured Name"/>
                                    </div>
                                    <div class="field-line-cell no-label">
                                        <input type="text" name="insured_address" value="" placeholder="Address"/>
                                    </div>
                                    <div class="city-state-zip">
                                        <div class="field-line-cell">
                                            <input type="text" name="insured_phone" value="" placeholder="Phone" />
                                        </div>

                                        <div class="field-line-cell zip">
                                            <input type="text" name="insured_fax" value="" placeholder="Fax" />
                                        </div>
                                    </div>
                                    <div class="city-state-zip">
                                        <div class="field-line-cell">
                                            <input type="text" name="insured_city" value="" placeholder="City"/>
                                        </div>
                                        <div class="field-line-cell state">
                                            <input type="text" name="insured_state" value="" placeholder="State"/>
                                        </div>
                                        <div class="field-line-cell zip">
                                            <input type="text" name="insured_zipcode" value="" placeholder="Zip Code"/>
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td class="right-col">
                                <div class="cell-content">
                                    <div class="field-line-cell">
                                        <label>CONTACT NAME:</label>
                                        <input type="text" name="contact_name" placeholder="Contact Name" value="" />
                                    </div>
                                    <div class="contact-info-line">
                                        <span>PHONE</span>
                                        <input type="text" name="contact_phone_no" value="" />
                                        <span class="fax-label">FAX</span>
                                        <input type="text" name="contact_fax_no" value="" />
                                    </div>
                                    <div class="field-line-cell">
                                        <label>E-MAIL ADDRESS:</label>
                                        <input type="text" name="contact_email" value="" />
                                    </div>
                                    <div class="field-line-cell">
                                        <label>PRODUCER CUSTOMER ID:</label>
                                        <input type="text" name="producer_customer_id" value="" />
                                    </div>

                                    <div class="insurer-coverage-section">
                                        <div class="insurer-coverage-title">INSURER(S) AFFORDING COVERAGE</div>
                                        <div class="insurer-line">
                                            <label>INSURER A:</label>
                                            <input type="text" name="insurer_a" />
                                            <label class="ml-auto">NAIC #</label>
                                            <input type="text" name="insurer_a_naic" value="" />
                                        </div>
                                        <div class="insurer-line">
                                            <label>INSURER B:</label>
                                            <input type="text" name="insurer_b" />
                                            <label class="ml-auto">NAIC #</label>
                                            <input type="text" name="insurer_b_naic" />
                                        </div>
                                        <div class="insurer-line">
                                            <label>INSURER C:</label>
                                            <input type="text" name="insurer_c" />
                                            <label class="ml-auto">NAIC #</label>
                                            <input type="text" name="insurer_c_naic" />
                                        </div>
                                        <div class="insurer-line">
                                            <label>INSURER D:</label>
                                            <input type="text" name="insurer_d" />
                                            <label class="ml-auto">NAIC #</label>
                                            <input type="text" name="insurer_d_naic" />
                                        </div>
                                        <div class="insurer-line">
                                            <label>INSURER E:</label>
                                            <input type="text" name="insurer_e" />
                                            <label class="ml-auto">NAIC #</label>
                                            <input type="text" name="insurer_e_naic" />
                                        </div>
                                        <div class="insurer-line">
                                            <label>INSURER F:</label>
                                            <input type="text" name="insurer_f" />
                                            <label class="ml-auto">NAIC #</label>
                                            <input type="text" name="insurer_f_naic" />
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </table>
                </div>


            </div>
            <div style="display: flex;
            justify-content: space-between;
            width: 100%; margin-top: 10px; font-size: 11px;">
                <h2><b>COVERAGES Certificate NUMBER: <input type="text" name="certificate_no" style="width: 100pt;"/></b></h2>
                <h2><b>REVISION NUMBER : <input type="text" name="revision_no" style="width: 100pt;"/></b></h2>
            </div>
            <div class="form-container" style="margin-top: 10px;">


                <!-- Coverages Section -->
                <div class="coverage-section">  
                    <!-- Main Coverage Table -->
                    <table style="border-collapse:collapse; " cellspacing="0">
                    <tr style="height:36pt">
                        <td style="width:577pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="10">
                            <p class="s8" style="padding-left: 2pt; text-indent: 0pt; text-align: left;">
                                LOCATION OF PREMISES / DESCRIPTION OF PROPERTY (Attach ACORD 101, Additional Remarks
                                Schedule, if more space is required)
                            </p>
                            <textarea rows="3" name="property_description"></textarea>
                        </td>
                    </tr>
                    <tr style="height:36pt">
                        <td style="width:577pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="10">
                            <p class="s9" style="padding-left: 9pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                                THIS IS TO CERTIFY THAT THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE
                                INSURED NAMED ABOVE FOR THE POLICY PERIOD
                            </p>
                            <p class="s9"
                            style="padding-left: 9pt; padding-right: 50pt; text-indent: 0pt; line-height: 112%; text-align: left;">
                                INDICATED. NOTWITHSTANDING ANY REQUIREMENT, TERM OR CONDITION OF ANY CONTRACT OR OTHER
                                DOCUMENT WITH RESPECT TO WHICH THIS CERTIFICATE MAY BE ISSUED OR MAY PERTAIN, THE INSURANCE
                                AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND
                                CONDITIONS OF SUCH POLICIES. LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
                            </p>
                        </td>
                    </tr>
                    <tr style="height:18pt">
                        <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s9"
                            style="padding-left: 3pt; padding-right: 1pt; text-indent: -1pt; text-align: left;">INSR
                                LTR</p>
                        </td>
                        <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="3">
                            <p class="s8" style="padding-top: 5pt; padding-left: 31pt; text-indent: 0pt; text-align: left;">
                                TYPE OF INSURANCE</p>
                        </td>
                        <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s8" style="padding-top: 5pt; padding-left: 45pt; text-indent: 0pt; text-align: left;">
                                POLICY NUMBER</p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s9"
                            style="padding-left: 4pt; padding-right: 4pt; text-indent: 1pt; line-height: 93%; text-align: left;">
                                POLICY EFFECTIVE DATE (MM/DD/YYYY)
                            </p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s9"
                            style="padding-left: 4pt; padding-right: 4pt; text-indent: 0pt; line-height: 93%; text-align: left;">
                                POLICY EXPIRATION DATE (MM/DD/YYYY)
                            </p>
                        </td>
                        <td style="width:90pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="2">
                            <p class="s2" style="padding-top: 5pt; padding-left: 14pt; text-indent: 0pt; text-align: left;">
                                COVERED PROPERTY</p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s8"
                            style="padding-top: 5pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">LIMITS</p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="11">
                            <p style="text-indent: 0pt; text-align: left;"></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="2" rowspan="2">
                            <p class="s8" style="padding-right: 17pt; text-indent: 0pt; text-align: right;">PROPERTY</p>
                            <p class="s10"
                            style="padding-top: 5pt; text-indent: 0pt; text-align: right;">
                                <input type="checkbox" value="1" name="property_causes_loss"/>CAUSES OF
                                LOSS</p>
                        </td>
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p class="s10" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">DEDUCTIBLES</p>
                                <input type="text" name="property_deductible"/>
                        </td>
                        <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="11">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_policy_number"
                                                                                value="" placeholder="Policy NUmber"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="11">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_effective_date"
                                                                                placeholder="Effective Date"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="11">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_expiration_date"
                                                                                placeholder="Expiration date"/></p>
                        </td>
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="11">
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_building"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_personal"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_income"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_expense"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_rental"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_b_building"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_b_prop"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_b_pp"
                                                                                                        value="1"/></p>
                            <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                        name="property_coverage_other_one"
                                                                                                        value="1"/></p>

                        </td>
                        <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="11">
                            <p class="s2 property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;">BUILDING</p>
                            <p class="s2 property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;">PERSONAL PROPERTY</p>
                            <p class="s2 property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;">EXTRA EXPENSE</p>
                            <p class="s2 property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;"> RENTAL VALUE</p>
                            <p class="s2 property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;">BLANKET BUILDING</p>
                            <p class="s2 property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;"> BLANKET PERS PROP</p>
                            <p class="s2 property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;"> BLANKET BLDG & PP</p>
                            <p class="property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;">
                                <input type="text" name="property_coverage_other_one" placeholder="Other 1"/>
                            </p>
                            <p class="property-coverage-p"
                            style="padding-left: 1pt; text-indent: 0pt; text-align: left;">
                                <input type="text" name="property_coverage_other_two" placeholder="Other 2"/>
                            </p>

                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_coverage_building_limit"
                                                                                placeholder="Building Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_coverage_personal_limit"
                                                                                placeholder="Personal Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:14pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_basic"
                                                                                value="1"/></p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s10" style="padding-left: 1pt; text-indent: 0pt; line-height: 6pt; text-align: left;">
                                BASIC</p>
                        </td>
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p class="s10" style="margin-bottom: 3px; margin-top: 3px; padding-left: 1pt; text-indent: 0pt; line-height: 6pt; text-align: left;">
                                BUILDING</p>
                            <input type="text" name="property_building"/>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_coverage_income_limit"
                                                                                placeholder="Income Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:6pt">
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_broad"
                                                                                value="1"/></p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p class="s10" style="padding-left: 1pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                                BROAD</p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_coverage_expense_limit"
                                                                                placeholder="Expense Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:6pt">
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p class="s2" style="margin-bottom: 3px; margin-top: 3px; padding-left: 1pt; text-indent: 0pt; line-height: 4pt; text-align: left;">
                                CONTENTS</p>
                            <input type="text" name="property_contents"/>

                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        >
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_special"
                                                                                value="1"/>
                            </p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">SPECIAL</p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_coverage_rental_limit"
                                                                                placeholder="Rental Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        >
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"
                                                                                name="property_earthquake" value="1"/></p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">EARTHQUAKE</p>
                        </td>
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_other_one"/>
                            </p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_coverage_b_building_limit"
                                                                                            placeholder="Blanket Building"/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_wind"
                                                                                value=""/></p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s10" style="padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                                WIND</p>
                        </td>
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_other_two"
                                                                                value=""/>
                            </p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p  style="text-indent: 0pt; text-align: left;"><input type="text" name="property_coverage_b_prop_limit"
                                                                                            placeholder="BLANKET PERS PROP"
                                                                                            value=""/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_flood"
                                                                                value=""/>
                            </p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">FLOOD</p>
                        </td>
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p  style="text-indent: 0pt; text-align: left;"><input type="text" name="property_coverage_b_pp_limit"
                                                                                            placeholder="BLANKET BLDG & PP"
                                                                                            value=""/>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <input type="text" name="property_other_one" placeholder="Other 1"/>

                        </td>
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_coverage_other_one_limit"
                                                                                placeholder="Other 1"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        </td>
                        <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <input type="text" name="property_other_two" placeholder="Other 2"/>
                        </td>
                        <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="property_coverage_other_two_limit"
                                                                                placeholder="Other 2"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="4">
                        </td>
                        <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="3" rowspan="4">
                            <p class="s5" style="padding-left: 15pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                                INLAND MARINE</p>
                            <p class="s2"
                            style="padding-top: 5pt; padding-left: 15pt; padding-right: 63pt; text-indent: -14pt; line-height: 190%; text-align: left;">

                                <input type="checkbox" name="inland_causes" value=""/>
                                CAUSES OF LOSS NAMED PERILS
                            </p>

                        </td>
                        <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p style="padding-left: 1pt; text-indent: 0pt; text-align: left;">TYPE OF POLICY:
                                <input type="text" name="inland_policy_type" placeholder="Policy Type"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="4">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="inland_policy_effective_date"
                                                                                placeholder="Effective Date"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="4">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="inland_policy_expiration_date"
                                                                                placeholder="Expiration Date"/></p>
                        </td>
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="4">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                        </td>
                        <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="4">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_one"
                                                                                placeholder="Other 1"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_two"
                                                                                placeholder="Other 2"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_three"
                                                                                placeholder="Other 3"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_four"
                                                                                placeholder="Other 3"/></p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="inland_coverage_one_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="inland_coverage_two_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">POLICY NUMBER:
                                <input type="text" name="inland_policy_number" placeholder="POLICY NUMBER"/></p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="inland_coverage_three_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="inland_coverage_four_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"></p>
                        </td>
                        <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="3" rowspan="3">
                            <p class="s5"
                            style="padding-right: 71pt; text-indent: 0pt; line-height: 7pt; text-align: center;">

                                CRIME</p>
                            <p style="padding-right: 72pt; text-indent: 0pt; text-align: center;">TYPE OF POLICY:
                                <input type="text" name="crime_policy_type" placeholder="Policy Type"/></p>
                        </td>
                        <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_policy_number"
                                                                                placeholder="Policy Number"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_effective_date"
                                                                                placeholder="Effective Date"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_expiration_date"
                                                                                placeholder="Expiration Date"/></p>
                        </td>
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        </td>
                        <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_coverage_one"
                                                                                placeholder="Coverage One"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_coverage_two"
                                                                                placeholder="Coverage Two"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_coverage_three"
                                                                                placeholder="Coverage Three"/></p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="crime_coverage_one_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="crime_coverage_two_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s10" style="padding-top: 2pt; padding-left: 1pt; text-indent: 0pt; text-align: left;">
                                <input type="text" name="crime_coverage_three_limit" placeholder="Limit"/></p>
                        </td>
                    </tr>


                    <tr style="height:12pt">
                        <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"></p>
                        </td>
                        <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="3" rowspan="3">
                            <p class="s5"
                            style="padding-right: 71pt; text-indent: 0pt; line-height: 7pt; text-align: center;">

                                BOILER MACHINERY / EQUIPMENT BREAKDOWN</p>

                        </td>
                        <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="machinery_policy_number"
                                                                                placeholder="Policy Number"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="machinery_effective_date"
                                                                                placeholder="Effective Date"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="machinery_expiration_date"
                                                                                placeholder="Expiration Date"/></p>
                        </td>
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        </td>
                        <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="machinery_coverage_one"
                                                                                placeholder="Coverage One"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="machinery_coverage_two"
                                                                                placeholder="Coverage Two"/></p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="machinery_coverage_one_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="machinery_coverage_two_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:122pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="3">
                            <p style="text-indent: 0pt; text-align: left;"></p>
                        </td>

                    </tr>

                    <tr style="height:12pt">
                        <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"></p>
                        </td>
                        <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="3" rowspan="3">
                            <p 
                            style=" text-indent: 0pt; line-height: 7pt; text-align: center;">
                                <input type="text" name="other_type" placeholder="Policy Number"/>
                            </p>

                        </td>
                        <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_policy_number"
                                                                                placeholder="Policy Number"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_effective_date"
                                                                                placeholder="Effective Date"/></p>
                        </td>
                        <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_expiration_date"
                                                                                placeholder="Expiration Date"/></p>
                        </td>
                        <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        </td>
                        <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="3">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_coverage_one"
                                                                                placeholder="Coverage One"/></p>
                            <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_coverage_two"
                                                                                placeholder="Coverage Two"/></p>
                        </td>
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="other_coverage_one_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                                name="other_coverage_two_limit"
                                                                                placeholder="Limit"/></p>
                        </td>
                    </tr>
                    <tr style="height:12pt">
                        <td style="width:122pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="3">
                            <p style="text-indent: 0pt; text-align: left;"></p>
                        </td>

                    </tr>

                    <tr style="height:67pt">
                        <td style="width:577pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            colspan="10">
                            <p class="s8" style="padding-left: 2pt; text-indent: 0pt; text-align: left;">
                                SPECIAL CONDITIONS / OTHER COVERAGES (ACORD 101, Additional Remarks Schedule, may be
                                attached if more space is required)
                            </p>
                            <textarea rows="5" name="special_condition"></textarea>
                        </td>
                    </tr>
                </table>
                </div>
            </div>

            <p style="padding-top: 3px; text-indent: 0pt; text-align: left;">
                CERTIFICATE HOLDER <span style="margin-left: 14.5%;">CANCELLATION</span>
            </p>

            <div class="form-container" style="margin-top: 10px;">
                <!-- Certificate Holder / Cancellation Section -->
                <table style="border-collapse:collapse; margin-left:6pt; width:99%" cellspacing="0">
                    <tr style="height:47pt">
                        <td style="width:289pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                            rowspan="2">
                            <textarea rows="7" name="certificate_holder" placeholder="Enter Certificate Holder Details"></textarea>
                        </td>
                        <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p class="s12"
                            style="padding-left: 9pt; padding-right: 20pt; text-indent: 0pt; line-height: 112%; text-align: left;">
                                SHOULD ANY OF THE ABOVE DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION DATE THEREOF,
                                NOTICE WILL BE DELIVERED IN
                                <span class="s9">ACCORDANCE WITH THE POLICY PROVISIONS.</span>
                            </p>
                        </td>
                    </tr>
                    <tr style="height:35pt">
                        <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                            <p  style="padding-left: 2pt; text-indent: 0pt; text-align: left;">
                                AUTHORIZED REPRESENTATIVE: <input type="text" name="authorize_representative"/>
                            </p>
                        </td>
                    </tr>
                </table>


                <!-- Footer Section -->
                <div class="footer-content">
                    <div class="flex-shrink-0">
                        ACORD 101 (2008/01)
                    </div>
                    <div class="footer-copyright">
                        &copy; 2008 ACORD CORPORATION. All rights reserved.<br>

                    </div>
                </div>
                <div>

                    <p style="text-align: center;
                    font-size: 10px;
                    font-weight: 600;">The ACORD name and logo are registered marks of ACORD</p>
                </div>
            </div>

            <div class="row mt-10 pb-3">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary m-1">Submit</button>
                    <button type="reset" class="btn btn-secondary m-1">Reset</button>
                </div>
            </div>
        </form>
    </div>

@endsection