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
            height: 10in;
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
        /* Used for most fields where label is to the left of an underline */
        .form-field-line {
            display: flex;
            align-items: flex-end;
            /* Aligns label baseline with input line */
            line-height: 1.0;
            /* Tighter line height for labels */
        }

        .form-field-line label {
            white-space: nowrap;
            /* Prevent label from wrapping */
            font-size: 8pt;
            /* Label font size */
            color: #333;
            flex-shrink: 0;
            /* Prevent label from shrinking */
            margin-right: 4pt;
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
            padding: 0 2pt;
            font-size: 8pt;
            /* Input text size */
            height: 11pt;
            /* Explicit height to control line vertical position */
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1;
            /* Keep input text tight */
        }

        /* Header Specific Styles */
        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-bottom: 0.1in;
            /* Space below top header elements */
        }

        .acord-logo-text {
            display: flex;
            align-items: flex-end;
            font-size: 9pt;
            font-weight: bold;
            flex-shrink: 0;
        }

        .acord-logo {
            height: 70pt;
            /* Adjust size based on actual logo */
            vertical-align: middle;
            margin-right: 3pt;
            /* Tighter space to text */
        }

        .header-right-meta {
            /* display: flex; */
            align-items: flex-end;
            font-size: 7pt;
            /* Smaller font for these meta labels */
        }

        .header-right-meta .form-field-line {
            margin-left: 0.2in;
            /* Space between fields */
            margin-bottom: 17px;
            /* No extra margin */
        }

        .header-right-meta .form-field-line label {
            font-size: 7pt;
            padding-bottom: 0.5pt;
        }

        .header-right-meta .form-field-line input {
            width: 70pt;
            /* Default width for these top inputs */
            height: 10pt;
            font-size: 7pt;
            text-align: right;
            /* Values align right */
        }

        .header-right-meta .loc-field input {
            width: 40pt;
            /* LOC # is shorter */
        }

        .page-of-field {
            position: absolute;
            top: -20px;
            right: 0;
        }

        .page-of-field label {
            font-size: 7pt;
            margin-right: 2pt;
            padding-bottom: 0.5pt;
        }

        .page-of-field input {
            width: 25pt;
            /* Small width for page numbers */
            text-align: center;
            height: 10pt;
            font-size: 7pt;
            border-bottom: 1px solid;
        }

        .main-title {
            font-size: 14pt;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 0.15in;
            /* Space below title */
        }

        /* Main Info Box Section */
        .info-box {
            border: 1pt solid black;
            /* Stronger border for the main box */
            padding: 0.15in;
            /* Padding inside the box */
            margin-bottom: 0.15in;
            /* Space below the box */
            display: table-cell;
            width: 45%;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            /* Two main columns */
            gap: 0.1in;
            /* Gap between columns and rows within the grid */
        }

        .info-grid-column {
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            /* Align items to the top */
        }

        .info-grid-column.left-col {
            /* border-right: 0.5pt solid #ccc; Lighter vertical divider */
            padding-right: 0.1in;
            margin-right: 0.05in;
            /* Adjust for gap */
        }

        .info-grid-column.right-col {
            padding-left: 0.1in;
            margin-left: 0.05in;
            /* Adjust for gap */
        }

        .info-grid-column .form-field-line {
            margin-bottom: 0.08in;
            /* Consistent vertical spacing for lines */
        }

        .info-grid-column .form-field-line label {
            font-size: 7pt;
            /* Smaller labels in main info grid */
            padding-bottom: 0.5pt;
        }

        .info-grid-column .form-field-line input {
            height: 10pt;
            font-size: 8pt;
        }

        .info-box-full-row {
            grid-column: span 2;
            /* Span both columns */
            display: flex;
            flex-direction: column;
            margin-top: 0.15in;
            /* Space from rows above */
        }

        .info-box-full-row.border-top {
            border-top: 0.5pt solid black;
            /* Horizontal divider line */
            padding-top: 0.15in;
        }

        .info-box-full-row.carrier-line {
            flex-direction: row;
            /* Horizontal layout for carrier/naic/date */
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 0.1in;
        }

        .info-box-full-row.carrier-line .form-field-line {
            flex: 1;
            /* Distribute space */
            margin-right: 0.15in;
        }

        .info-box-full-row.carrier-line .form-field-line:last-child {
            margin-right: 0;
        }

        .info-box-full-row.carrier-line input {
            font-size: 8pt;
            height: 10pt;
        }

        /* Remarks Section */
        .remarks-container {
            /* border: 1pt solid black; */
            /* Stronger border for remarks box */
            height: 4in;
            /* Adjusted height to fit the image */
            box-sizing: border-box;
            padding: 0.05in 0.1in;
            /* Padding inside the box */
            display: flex;
            flex-direction: column;
        }

        .remarks-header-line {
            display: flex;
            justify-content: flex-start;
            /* Align to the left */
            align-items: flex-end;
            margin-bottom: 0.05in;
        }

        .remarks-header-line .form-field-line {
            margin-right: 0.4in;
            /* Space between FORM NUMBER and FORM TITLE */
            margin-bottom: 0;
        }

        .remarks-header-line .form-field-line label {
            font-size: 7pt;
        }

        .remarks-header-line .form-field-line input {
            width: 120pt;
            /* Fixed width for form number/title inputs */
            height: 10pt;
            font-size: 8pt;
        }

        .remarks-textarea-field {
            flex-grow: 1;
            /* Takes all remaining vertical space */
            width: 100%;
            border: none;
            resize: none;
            font-family: 'Arial', sans-serif;
            font-size: 9pt;
            line-height: 1.2;
            padding: 0;
            /* No internal padding to maximize space */
            outline: none;
            /* Remove focus outline */
            box-sizing: border-box;
        }

        /* Footer Section */
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            
            font-size: 6pt;
            font-weight: 600;
            /* color: #555; */
        }

        .footer-copyright {
            flex-grow: 1;
            text-align: right;
        }
        .table-ars{
            width: 100%;
        }
        .table-ars td{
            border: 1px solid black;
            padding: 5px;
            font-size: 8px;
            width: 50%;
        }
        .table-addrem td{
            border: 1px solid black;
                    padding: 5px;
                    font-size: 8px;
        }
    </style>
@endpush
@section('content')

    <div class="form-container">

            <div class="container">
                <div class="header-top">
                    <div class="acord-logo-text">
                        <img src="{{asset('backend/img/acord-logo.png')}}" alt="ACORD Logo" class="acord-logo">
                    </div>
                    <div class="header-right-meta">
                        <div class="form-field-line">
                            <label>AGENCY CUSTOMER ID:</label>
                            {{$form->agency_customer_id}}
                        </div>
                        <div class="form-field-line loc-field">
                            <label>LOC #:</label>
                            {{$form->loc}}
                        </div>
                        
                    </div>
                </div>

                <div class="main-title" style="">
                    <div>ADDITIONAL REMARKS SCHEDULE</div>
                </div>
                <div class="" style="position: relative;">
                    <table class="table-ars">
                        <tr>
                            <td>
                                <label>AGENCY</label>
                                <p>{{$form->agency_name}}</p>
                            </td>
                            <td rowspan="2" style="place-content: flex-start;">
                                <label>NAMED INSURED</label>
                                <p>{{$form->name_insured}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>POLICY NUMBER</label>
                                <p>{{$form->policy_number}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>CARRIER</label>
                                <p>{{$form->carrier}}</p>
                            </td>
                            <td>
                                 <label>NAIC CODE</label>
                                <p>{{$form->naic_code}}</p>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                 <label>EFFECTIVE DATE  (MM/DD/YYYY)</label>
                                <p>{{$form->effective_date}}</p>
                            </td>
                        </tr>
                    </table>
                    <div class="page-of-field">
                        <label>Page</label>
                        <input type="text" value="">
                        <label>of</label>
                        <input type="text" value="">
                    </div>
                </div>
                <h4 style="font-size: 16px;
                font-weight: 600;
                margin-top: 15px;
                margin-bottom: 10px;">Additional Remarks</h4>
                <table class="table-addrem" style="width: 100%; margin-bottom: 10px;">
                    <tr>
                        <td>
                            <div class="remarks-header-line">
                                <div class="form-field-line">
                                    <label>FORM NUMBER:</label>
                                    <p>{{$form->form_no}}</p>
                                </div>
                                <div class="form-field-line">
                                    <label>FORM TITLE:</label>
                                    <p>{{$form->form_title}}</p>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="remarks-container">

                                <textarea class="remarks-textarea-field" name="description" placeholder="Enter Additional Remarks Here...">{{$form->description}}</textarea>
                            </div>
                        </td>
                    </tr>
                </table>
                

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

@endsection