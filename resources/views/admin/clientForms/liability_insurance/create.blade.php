@extends('admin.layouts.form')
@push('styles')
       <style>
        /* Base styles for screen viewing and print intent */
        body {
            font-family: 'Arial', sans-serif; /* Common form font */
            font-size: 8pt; /* Base font size, uses points for print accuracy */
            color: #000;
            margin: 0;
            padding: 0;
            display: flex; /* For centering the form on screen */
            justify-content: center;
            background-color: #f0f0f0; /* Light background for screen view */
        }
        .form-container {
            width: 8.5in; /* Standard US Letter width */
            /* min-height: 11in; Min height to ensure page size, content will expand */
            /* padding: 0.25in 0.5in; Top/bottom padding, left/right padding */
            box-sizing: border-box; /* Padding included in width/height */
            background-color: white;
            border: 1px solid #000; 
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Subtle shadow for screen view */
            display: flex; /* Use flexbox for overall layout */
            flex-direction: column;
        }

        /* Reusable Form Field Line (Label + Underline Input) */
        .form-field-line {
            display: flex;
            align-items: flex-end; /* Aligns label baseline with input line */
            line-height: 1.0;
            margin-bottom: 2pt; /* Small vertical spacing */
        }
        .form-field-line label {
            white-space: nowrap; /* Prevent label from wrapping */
            font-size: 7pt; /* Label font size */
            color: #333;
            flex-shrink: 0; /* Prevent label from shrinking */
            margin-right: 2pt; /* Space between label and input */
            padding-bottom: 0.5pt; /* Fine-tune label baseline alignment */
        }
        .form-field-line input[type="text"] {
            flex-grow: 1; /* Input takes remaining width */
            border: none;
            border-bottom: 0.5pt solid black; /* The underline */
            padding: 0 1pt;
            font-size: 8pt; /* Input text size */
            height: 10pt; /* Explicit height to control line vertical position */
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1; /* Keep input text tight */
        }
        .form-field-line.no-label input {
            margin-right: 0; /* No margin if no label */
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
            border-collapse: collapse; /* Collapse borders for single lines */
            width: 100%;
            border: 0.5pt solid black; /* Outer border for the entire table */
            font-size: 8pt;
            line-height: 1.2;
        }

        .producer-insured-table td {
            border: 0.5pt solid black; /* Inner borders for cells */
            padding: 0; /* No default padding for precise control */
            vertical-align: top; /* Align content to the top of the cell */
            box-sizing: border-box;
        }

        /* Column specific styling */
        .producer-insured-table .left-col {
            width: 50%; /* Left column takes half width */
        }
        .producer-insured-table .right-col {
            width: 50%; /* Right column takes half width */
        }

        /* Cell content padding for better visual spacing */
        .cell-content {
            padding: 5pt; /* Internal padding for cell content */
            display: flex;
            flex-direction: column;
        }

        /* Headers within cells */
        .cell-header {
            font-weight: bold;
            font-size: 7pt; /* Smaller font for internal headers */
            margin-bottom: 2pt;
        }

        /* Generic Field line within cells */
        .field-line-cell {
            display: flex;
            align-items: flex-end; /* Align label baseline with input line */
            line-height: 1.0;
            margin-bottom: 2pt; /* Small vertical spacing */
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
            margin-right: 0; /* No margin if no label */
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
            width: 70pt; /* Fixed width for phone/fax numbers */
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
            gap: 5pt; /* Gap between city, state, zip inputs */
        }
        .city-state-zip .field-line-cell {
            margin-bottom: 0;
            flex: 1; /* Allow each part to take equal space */
        }
        .city-state-zip .field-line-cell input {
            width: auto; /* Auto width for inputs within this flex container */
            flex-grow: 1;
        }
        .city-state-zip .field-line-cell.state input {
            width: 25pt; /* Fixed width for State */
            flex-grow: 0;
        }
        .city-state-zip .field-line-cell.zip input {
            width: 40pt; /* Fixed width for Zip */
            flex-grow: 0;
        }

        /* Insurer(s) Affording Coverage section */
        .insurer-coverage-section {
            padding-top: 5pt; /* Space from above fields */
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
            width: 45pt; /* Fixed width for NAIC # */
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
                padding: 0; /* Remove container padding for full page control */
                width: 8.5in; /* Ensure full page width for positioning */
            }
            /* .producer-insured-table {
                width: 7.5in; 
                margin: 0.5in auto 0.1in auto; 
            } */
            .producer-insured-table td {
                padding: 0; /* Keep padding at 0 for inputs to fill cell */
            }
            .cell-content {
                padding: 5pt; /* Maintain internal content padding */
            }
            input[type="text"] {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                vertical-align: baseline;
                padding-bottom: 0;
                height: auto;
                min-height: 9pt; /* Ensure inputs have a minimum height */
            }
            .field-line-cell label, .contact-info-line span, .insurer-line label {
                padding-bottom: 0;
            }
            .producer-insured-table .cell-header {
                font-size: 7pt; /* Ensure font size consistency */
            }
            .insurer-line input {
                 min-height: 9pt; /* Ensure input box has height */
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
            border: 0.5pt solid black; /* Outer border */
            font-size: 7pt;
            line-height: 1.2;
        }
        .coverage-table th, .coverage-table td {
            border: 0.5pt solid black; /* Inner borders */
            padding: 2pt 3pt;
            vertical-align: top;
            box-sizing: border-box;
        }
        .coverage-table th {
            font-weight: bold;
            text-align: center;
            background-color: #f8f8f8;
            height: 20pt; /* Fixed height for header cells */
        }
        .coverage-table td {
            position: relative;
            height: 22pt; /* Fixed height for data rows */
			align-items: anchor-center;
        }
        .coverage-table .col-checkbox { width: 15pt; text-align: center; padding: 0;}
        .coverage-table .col-type { width: 15%; }
        .coverage-table .col-deductibles { width: 15%; }
        .coverage-table .col-policy-number { width: 15%; }
        .coverage-table .col-date { width: 15%; }
        .coverage-table .col-covered-property { width: 15%; }
        .coverage-table .col-limit { width: 10%; text-align: right;}
        .coverage-table .col-checkbox input[type="checkbox"] {
            margin: 0;
            vertical-align: middle;
            transform: scale(0.7); /* Smaller checkboxes */
        }
        .coverage-table .limit-input {
            width: calc(100% - 2pt); /* Full width minus padding */
            border: none;
            border-bottom: 0.5pt solid black;
            font-size: 7pt;
            height: 9pt;
            padding: 0 1pt;
            text-align: right;
            background-color: transparent;
            box-sizing: border-box;
            position: absolute;
            bottom: 1pt; /* Align to bottom of cell */
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
            flex-grow: 1; /* Allows this section to fill remaining space */
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
            flex-grow: 1; /* Allow address area to expand */
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
            margin-top: auto; /* Push to bottom */
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
       
        .w50{width: 50%;}
        /* .table-producer table td.50per{width: 50%;} */
        .table-producer table td{padding: 3px;}
        .tableinnertd td{
            border-left: 0.5pt solid black;
            border-right: 0.5pt solid black;
            border-top: 0.5pt solid black;
            border-bottom: 0.5pt solid black;
            padding: 4px;
            vertical-align: middle;
            display: flex;
            box-sizing: border-box;
        }
        .certificate td{width: 50%; border: 1px solid black;vertical-align: text-top; padding: 5px;}
        
        input[type="text"] {
            width: 100%;
            border: 1px solid black;
            margin-right: 8px;
        }

        textarea{
            border: 1px solid black;
        }
    </style> 
@endpush
@section('content')

    <form action="{{ route('store-liability-insurance') }}" method="POST" class=" mt-4">
        @csrf
        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">
        
    <div>
        <div>
            <div class="header-top">
                <div class="acord-logo-text">
                    <img src="{{ asset('backend/img/acord-logo.png') }}" alt="ACORD Logo"
                        class="acord-logo inline-block align-middle" style="width: 100%;height: 52px;">
                </div>
                <div class="main-title">
                    CERTIFICATE OF LIABALITY INSURANCE
                </div>
                <div class="header-right-meta">
                    <div class="" style="text-align: center;">
                        <label>DATE (MM/DD/YYYY):</label>
                        <p><input type="text" name="invoice_date" /></p>
                    </div>
                </div>
            </div>
        
        </div>
        
        <div class="form-container">
            <div class="header-statement">
                THIS CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE CERTIFICATE HOLDER. THIS 
                CERTIFICATE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE AFFORDED BY THE POLICIES 
                BELOW. THIS CERTIFICATE OF INSURANCE DOES NOT CONSTITUTE A CONTRACT BETWEEN THE ISSUING INSURER(S), AUTHORIZED 
                REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE HOLDER.
            </div>
            <div class="header-statement" style="border-top: 1px solid #000;">
                IMPORTANT: If the certificate holder is an ADDITIONAL INSURED, the policy(ies) must have ADDITIONAL INSURED provisions or be endored. If SUBROGATION IS WAIVED, subject to the terms and conditions of the policy, certain policies may require an endorsement. A statement on this certificate does not confer rights to the Certificate holder in lieu of such endorsement(s).
            </div>
    
            <!-- Producer / Insured Section -->
           
            <div class="section-container">
                <table class="producer-insured-table">
                    <tr>
                        <td class="left-col">
                            <div class="cell-content">
                                <div class="cell-header">PRODUCER</div>
                                <div class="field-line-cell no-label">
                                    <input type="text" name="producer_name" placeholder="Producer Name"/>
                                </div>
                                <div class="field-line-cell no-label">
                                     <input type="text" name="producer_address" placeholder="Producer Address"/>
                                </div>
                                <div class="city-state-zip">
                                    <div class="field-line-cell">
                                        <input type="text" name="producer_city" placeholder="City" >
                                    </div>
                                    <div class="field-line-cell state">
                                        <input type="text" name="producer_state" placeholder="State" >
                                    </div>
                                    <div class="field-line-cell zip">
                                        <input type="text" name="producer_zipcode" placeholder="zip code">
                                    </div>
                                </div>
                            </div>
                            <hr style="margin-top: 10px; margin-bottom: 10px; border-color: #000;">
                            <div class="cell-content">
                                <div class="cell-header">INSURED</div>
                                <div class="field-line-cell no-label">
                                    <input type="text" name="insured_name" placeholder="Name">
                                </div>
                                <div class="field-line-cell no-label">
                                    <input type="text" name="insured_address" placeholder="Address">
                                </div>
                                <div class="city-state-zip">
                                    <div class="field-line-cell">
                                        <input type="text" name="insured_city" placeholder="City">
                                    </div>
                                    <div class="field-line-cell state">
                                        <input type="text" name="insured_state" placeholder="State">
                                    </div>
                                    <div class="field-line-cell zip">
                                        <input type="text" name="insured_zipcode" placeholder="Zip Code">
                                    </div>
                                </div>
                            </div>
                        </td>
        
                        <td class="right-col">
                            <div class="cell-content">
                                <div class="field-line-cell">
                                    <label>CONTACT NAME:</label>
                                    <input type="text" name="contact_name" placeholder="Contact Name">
                                </div>
                                <div class="contact-info-line">
                                    <span>PHONE</span>
                                    <input type="text" name="contact_phone_no" placeholder="Phone No">
                                    <span class="fax-label">FAX</span>
                                    <input type="text" name="contact_fax_no" placeholder="Fax">
                                </div>
                                <div class="field-line-cell">
                                    <label>E-MAIL ADDRESS:</label>
                                    <input type="text" name="contact_email" placeholder="Email">
                                </div>
                                <div class="field-line-cell">
                                    <label>PRODUCER CUSTOMER ID:</label>
                                    <input type="text" name="producer_customer_id" placeholder="Customer ID">
                                </div>
        
                                <div class="insurer-coverage-section">
                                    <div class="insurer-coverage-title">INSURER(S) AFFORDING COVERAGE</div>
                                    <div class="insurer-line">
                                        <label>INSURER A:</label>
                                        <input type="text" name="insurer_a">
                                        <label class="ml-auto">NAIC #</label>
                                        <input type="text" name="insurer_a_naic" value="0">
                                    </div>
                                    <div class="insurer-line">
                                        <label>INSURER B:</label>
                                        <input type="text" name="insurer_b">
                                        <label class="ml-auto">NAIC #</label>
                                        <input type="text" name="insurer_b_naic" value="0">
                                    </div>
                                    <div class="insurer-line">
                                        <label>INSURER C:</label>
                                        <input type="text" name="insurer_c">
                                        <label class="ml-auto">NAIC #</label>
                                        <input type="text" name="insurer_c_naic" value="0">
                                    </div>
                                    <div class="insurer-line">
                                        <label>INSURER D:</label>
                                        <input type="text" name="insurer_d">
                                        <label class="ml-auto">NAIC #</label>
                                        <input type="text" name="insurer_d_naic" value="0">
                                    </div>
                                    <div class="insurer-line">
                                        <label>INSURER E:</label>
                                        <input type="text" name="insurer_e">
                                        <label class="ml-auto">NAIC #</label>
                                        <input type="text" name="insurer_e_naic" value="0">
                                    </div>
                                    <div class="insurer-line">
                                        <label>INSURER F:</label>
                                        <input type="text" name="insurer_f">
                                        <label class="ml-auto">NAIC #</label>
                                        <input type="text" name="insurer_f_naic" value="0">
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
            <h2><b>COVERAGES Certificate NUMBER:</b> <input type="text" name="certificate_no" style="width: 100pt;"></h2>
            <h2><b>REVISION NUMBER:</b> <input type="text" name="revision_no" style="width: 100pt;"></h2>
        </div>
        <div class="form-container" style="margin-top: 10px;">
            <!-- Coverages Section -->
            <div class="coverage-section">
   
                <!-- Main Coverage Table -->
                <table class="coverage-table">
                    <thead>
                        
                        <tr>
							<td colspan="9">
								THIS IS TO CERTIFY THAT THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR THE POLICY PERIOD INDICATED. NOT WITH STANDING ANY REQUIREMENT, TERM OR CONDITIONS OF ANY CONTRACT OR OTHER DOCUMENT WITH RESPECT TO WHICH THIS CERTIFICATE MAY BE ISSUED OR MAY PERTAIN. THE INSURANCE AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND CONDITIONS OF SUCH POLICIES. LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
							</td>
						</tr>
                            <tr>
                                <th rowspan="2">INSR<br>LTR</th>
                                <th >TYPE OF INSURANCE</th>
                                <th rowspan="2">ADDL INSD</th>
                                <th rowspan="2">SUBR WVD</th>
                                <th rowspan="2">POLICY NUMBER</th>
                                <th >POLICY EFFECTIVE</th>
                                <th >DATE (MM/DD/YYYY)</th>
                                <th colspan="2" rowspan="2">LIMITS</th>
                            </tr>
                            
                    </thead>
                    <tbody>
                        <tr>
                          <td rowspan="10"></td>
                    
                          <!-- Nested table in Col 2 -->
                          <td rowspan="10" style="padding: 0;">
                            <table class="tableinnertd"  cellpadding="3" cellspacing="0" style="width: 100%;">
                              <tr><td><input type="checkbox"> COMMERCIAL GENERAL LIABILITY</td> </tr>
                              <tr><td><input type="checkbox" name="commercial_claim" value="1" class="ins-checkbox-input"> CLAIMS-MADE <input type="checkbox" name="commercial_occur" value="1" class="ins-checkbox-input"> OCCUR</td> </tr>
                              <tr><td><input type="checkbox" class="ins-checkbox-input"> <input type="text" name="commercial_other_one"></td> </tr>
                              <tr><td><input type="checkbox" class="ins-checkbox-input"> <input type="text" name="commercial_other_two"></td> </tr>
                              <tr><td>GEN'L AGGREGATE LIMIT APPLIES PER:</td> </tr>
                              <tr><td><input type="checkbox" name="commercial_aggregate_policy" value="1" class="ins-checkbox-input"> POLICY <input type="checkbox" name="commercial_aggregate_project" value="1" class="ins-checkbox-input"> PROJECT <input type="checkbox" name="commercial_aggregate_loc" value="1" class="ins-checkbox-input"> LOC</td> </tr>
                              <tr><td><input type="checkbox" name="commercial_aggregate_other" value="1" class="ins-checkbox-input"> OTHER</td> </tr>
                             
                            </table>
                          </td>
                    
                          <td rowspan="7"><input type="text"  name="commercial_addl"></td>
                          <td rowspan="7"><input type="text"  name="commercial_subr"></td>
                          <td rowspan="7"><input type="text"  name="commercial_policy_number"></td>
                          <td rowspan="7"><input type="text"  name="commercial_effective_date"></td>
                          <td rowspan="7"><input type="text"  name="commercial_expiration_date"></td>
                    
                          <!-- Start of Col 6 & Col 7 rows -->
                          <td><input type="checkbox" name="commercial_each_occurrence" value="1" class="ins-checkbox-input"> EACH OCCURANCE</td>
                          <td>$ <input type="text" name="commercial_each_occurrence_limit"></td>
                        </tr>
                        <tr><td><input type="checkbox" name="commercial_damage" value="1" class="ins-checkbox-input"> DEMAGE TO RENTED PREMISES (Ea occurrence)</td><td>$ <input type="text" name="commercial_damage_limit"></td></tr>
                        <tr><td><input type="checkbox" name="commercial_expense" value="1" class="ins-checkbox-input"> MED EXP (Any one person)</td><td>$ <input type="text" name="commercial_expense_limit"></td></tr>
                        <tr><td><input type="checkbox" name="commercial_injury" value="1" class="ins-checkbox-input"> PERSONAL & ADV INJURY</td><td>$ <input type="text" name="commercial_injury_limit"></td></tr>
                        <tr><td><input type="checkbox" name="commercial_general_aggregate" value="1" class="ins-checkbox-input"> GENERAL AGGREGATE</td><td>$ <input type="text" name="commercial_general_aggregate_limit"></td></tr>
                        <tr><td><input type="checkbox" name="commercial_general_product" value="1" class="ins-checkbox-input"> PROUCTS - COMP/OP AGG</td><td>$ <input type="text" name="commercial_general_product_limit"></td></tr>
                        <tr><td><input type="checkbox" class="ins-checkbox-input"> <input type="text" name="commercial_general_other"></td><td>$ <input type="text" name="commercial_general_other_limit"></td></tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <td rowspan="10"></td>
                    
                          <!-- Nested table in Col 2 -->
                          <td rowspan="10" style="padding: 0;">
                            <table class="tableinnertd"  cellpadding="3" cellspacing="0" style="width: 100%;">
                              <tr><td> AUTOMOBILE LIABILITY</td> </tr>
                              <tr><td><input type="checkbox" name="automobile_any" value="1" class="ins-checkbox-input"> ANY AUTO</td> </tr>
                              <tr><td><input type="checkbox" name="automobile_own" value="1" class="ins-checkbox-input"> OWNED AUTOS ONLY  <input type="checkbox" name="automobile_schedule" style="margin-left: 10px;"> SCHEDULED AUTOS</td></td> </tr>
                              <tr><td><input type="checkbox" name="automobile_hired" value="1" class="ins-checkbox-input"> HIRED AUTOS ONLY  <input type="checkbox" name="automobile_non_own" style="margin-left: 10px;"> NON-OWNED AUTOS ONLY</td></td> </tr>
                              <tr><td><input type="checkbox" class="ins-checkbox-input"> <input type="text" name="automobile_other_one"> <input type="checkbox" class="ins-checkbox-input"> <input type="text" name="automobile_other_two"></td></td> </tr>
                              
                             
                            </table>
                          </td>
                    
                          <td rowspan="7"><input type="text"  name="automobile_addl"></td>
                          <td rowspan="7"><input type="text"  name="automobile_subr"></td>
                          <td rowspan="7"><input type="text"  name="automobile_policy_number"></td>
                          <td rowspan="7"><input type="text"  name="automobile_effective_date"></td>
                          <td rowspan="7"><input type="text"  name="automobile_expiration_date"></td>
                    
                          <!-- Start of Col 6 & Col 7 rows -->
                          <td><input type="checkbox" name="automobile_combine" value="1" class="ins-checkbox-input"> COMBINED SINGLE LIMIT (Ea occurrence)</td>
                          <td>$ <input type="text" name="automobile_combine_limit"></td>
                        </tr>
                        <tr><td><input type="checkbox" name="automobile_injury_person" value="1" class="ins-checkbox-input"> BODILY INJURY (Per person)</td><td>$ <input type="text" name="automobile_injury_person_limit"></td></tr>
                        <tr><td><input type="checkbox" name="automobile_injury_accident" value="1" class="ins-checkbox-input"> BODILY INJURY (Per accident)</td><td>$ <input type="text" name="automobile_injury_accident_limit"></td></tr>
                        <tr><td><input type="checkbox" name="automobile_property_damage" value="1" class="ins-checkbox-input"> PROPERTY DAMAGE (Per accident)</td><td>$ <input type="text" name="automobile_property_damage_limit"></td></tr>
                        <tr><td><input type="checkbox" class="ins-checkbox-input"> <input type="text" name="automobile_other"></td><td>$ <input type="text" name="automobile_other_limit"></td></tr>
                        
                      </tbody>
                      <tbody>
                        <tr>
                          <td rowspan="10"></td>
                    
                          <!-- Nested table in Col 2 -->
                          <td rowspan="10" style="padding: 0;">
                            <table class="tableinnertd"  cellpadding="3" cellspacing="0" style="width: 100%;">
                              <tr><td><input type="checkbox" name="umbrella" value="1" class="ins-checkbox-input"> UMBRELLA LIAB  <input type="checkbox" name="umbrella_occur" style="margin-left: 10px;"> OCCUR</td></td> </tr>
                              <tr><td><input type="checkbox" name="umbrella_excess" value="1" class="ins-checkbox-input"> EXCESS LIAB  <input type="checkbox" name="umbrella_claim" style="margin-left: 10px;"> CLAIMS-MADE</td></td> </tr>
                              <tr><td><input type="checkbox" name="umbrella_ded" value="1" class="ins-checkbox-input"> DED  <input type="checkbox" name="umbrella_retention" style="margin-left: 10px;"> RETENTION</td></td> </tr>
                              
                             
                            </table>
                          </td>
                    
                          <td rowspan="7"><input type="text"  name="umbrella_addl"></td>
                          <td rowspan="7"><input type="text"  name="umbrella_subr"></td>
                          <td rowspan="7"><input type="text"  name="umbrella_policy_number"></td>
                          <td rowspan="7"><input type="text"  name="umbrella_effective_date"></td>
                          <td rowspan="7"><input type="text"  name="umbrella_expiration_date"></td>
                    
                          <!-- Start of Col 6 & Col 7 rows -->
                          <td><input type="checkbox" name="umbrella_each_occurrence" value="1" class="ins-checkbox-input"> EACH OCCURENCE</td>
                          <td>$ <input type="text" name="umbrella_each_occurrence_limit"></td>
                        </tr>
                        <tr><td><input type="checkbox" name="umbrella_aggregate" value="1" class="ins-checkbox-input"> AGGREGATE</td><td>$ <input type="text" name="umbrella_aggregate_limit"></td></tr>
                        <tr><td><input type="checkbox" class="ins-checkbox-input"> <input type="text" name="umbrella_aggregate_other"></td><td>$ <input type="text" name="umbrella_aggregate_other_limit"></td></tr>
                        
                        
                        
                      </tbody>
                      <tbody>
                        <tr>
                          <td rowspan="10"></td>
                    
                          <!-- Nested table in Col 2 -->
                          <td rowspan="10" style="padding: 0;">
                            <table class="tableinnertd"  cellpadding="3" cellspacing="0" style="width: 100%;">
                              <tr><td style="height: 30px;">Workers compensation and employer liabalities</td> </tr>
                              <tr><td> ANY PROPRIETORY/PARTNER/EXECUTIVE OFFICER/MEMBER EXCLUDED? </br> <input type="radio" name="compensation" value="y" class="ins-checkbox-input"> Yes <input type="radio" name="compensation" value="n" class="ins-checkbox-input"> No</td> </tr>
                              <tr><td> (Mandatory in NH)</td> </tr>
                              <tr><td> If yes, describe under DESCRIPTION OF OPERATIONS below</td> </tr>
                            </table>
                          </td>
                    
                          <td rowspan="7"><input type="text"  name="compensation_addl"></td>
                          <td rowspan="7"><input type="text"  name="compensation_subr"></td>
                          <td rowspan="7"><input type="text"  name="compensation_policy_number"></td>
                          <td rowspan="7"><input type="text"  name="compensation_effective_date"></td>
                          <td rowspan="7"><input type="text"  name="compensation_expiration_date"></td>
                    
                          <!-- Start of Col 6 & Col 7 rows -->
                          <td><input type="checkbox" name="compensation_per_stat" value="1" class="ins-checkbox-input">PER STATUTE <br><input type="checkbox" name="compensation_other" value="1" class="ins-checkbox-input"> OTHER </td>
                          <td> <input type="text" name="compensation_per_stat_limit"></td>
                        </tr>
                        <tr><td><input type="checkbox" name="compensation_each_accident" value="1" class="ins-checkbox-input"> E.L. EACH ACCIDENT</td><td>$ <input type="text" name="compensation_each_accident_limit"></td></tr>
                        <tr><td><input type="checkbox" name="compensation_disease_employee" value="1" class="ins-checkbox-input"> E.L. DISEASE - EA EMPLOYEE</td><td>$ <input type="text" name="compensation_disease_employee_limit"></td></tr>
                        <tr><td><input type="checkbox" name="compensation_disease_policy" value="1" class="ins-checkbox-input"> E.L. DISEASE - POLICY LIMIT</td><td>$ <input type="text" name="compensation_disease_policy_limit"></td></tr>
                      </tbody>
                      <tbody>
                        <tr>
                          <td rowspan="10"></td>
                    
                          <!-- Nested table in Col 2 -->
                          <td rowspan="10" style="padding: 0;">
                            
                          </td>
                    
                          <td rowspan="7"></td>
                          <td rowspan="7"></td>
                          <td rowspan="7"></td>
                          <td rowspan="7"></td>
                          <td rowspan="7"></td>
                    
                          <!-- Start of Col 6 & Col 7 rows -->
                          <td></td>
                          <td></td>
                        </tr>
                      </tbody>
                      <tbody>
                        
                        <tr>
							<td colspan="9">
								DESCRIPTION OF OPERATIONS/LOCATIONS/VEHICLES  (ACORD 101, Additional Remarks Schedule, may be attached if more space is required)
								<br>
								<textarea name="special_condition" style="width: 100%" rows="4"></textarea>
							</td>
						</tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div style="display: flex;
        justify-content: space-between;
        width: 100%; margin-top: 10px; font-size: 11px;">
            <h2 style="width: 50%;"><b>CERTIFICATE HOLDER</b></h2>
            <h2 style="width: 50%;"><b>CANCELLATION</b></h2>
        </div>
        <div class="form-container" style="margin-top: 10px;">
            <!-- Certificate Holder / Cancellation Section -->
           
            <table class="certificate" style="width: 100%;">
                <tr>
                    <td rowspan="2"><input type="text" name="certificate_holder"></td>
                    <td>
						SHOULD ANY OF THE ABOVE DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION DATE THEREOF, NOTICE WILL BE DELIVERED IN ACCORDANCE WITH THE POLICY PROVISIONS.
					</td>
                </tr>
                <tr>
                    <td>AUTHORIZED REPRESENTATIVE <br> <input type="text" name="authorize_representative"></td>
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

    </div>
    <div class="row mt-12 mt-3 ">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
            <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
        </div>
    </div>

</form>
@endsection
