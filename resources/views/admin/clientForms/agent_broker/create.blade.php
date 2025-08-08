@extends('admin.layouts.form')
@push('styles')

    <style>
        /* Base styles for screen viewing and print intent */
        body {
            font-family: 'Arial', sans-serif; /* Common form font */
            font-size: 9pt; /* Base font size, uses points for print accuracy */
            color: #000;
            margin: 0;
            padding: 0;
            display: flex; /* For centering the form on screen */
            justify-content: center;
            background-color: #f0f0f0; /* Light background for screen view */
        }
        .form-container {
            width: 8.5in; /* Standard US Letter width */
            /*height: 11in;*/ /* Standard US Letter height */
            height: 13in; /* Standard US Letter height */
            padding: 0.5in; /* Consistent margin inside the form content */
            box-sizing: border-box; /* Padding included in width/height */
            background-color: white;
            border: 1px solid #ccc; /* Optional: visual boundary on screen */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Subtle shadow for screen view */
        }

        /* Reusable Form Field Line (Label + Underline Input) */
        .form-field-line {
            display: flex;
            /* align-items: flex-end; Aligns label baseline with input line */
            margin-bottom: 0.08in; /* Vertical spacing between form lines */
            line-height: 1.0; /* Tighter line height for labels */
        }
        .form-field-line label {
            /* white-space: nowrap; Prevent label from wrapping */
            font-size: 8pt; /* Label font size */
            color: #333;
            /* flex-shrink: 0; Prevent label from shrinking */
            margin-right: 4pt; /* Space between label and input */
            padding-bottom: 0.5pt; /* Fine-tune label baseline alignment */
        }
        .form-field-line input[type="text"] {
            flex-grow: 1; /* Input takes remaining width */
            border: none;
            border-bottom: 0.5pt solid black; /* The underline */
            padding: 0 2pt;
            font-size: 8pt; /* Input text size */
            height: 11pt; /* Explicit height to control line vertical position */
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1; /* Keep input text tight */
        }

        /* Specific styles for multi-part address lines (e.g., Pasadena TX 77504) */
        .address-line-container {
            display: flex;
            align-items: flex-end;
            margin-bottom: 0.08in; /* Consistent spacing */
            gap: 0.2in; /* Horizontal space between City, State, Zip groups */
        }
        .address-line-item {
            display: flex;
            align-items: flex-end;
            line-height: 1.0;
        }
        .address-line-item label {
            white-space: nowrap;
            font-size: 8pt;
            color: #333;
            flex-shrink: 0;
            margin-right: 4pt;
            padding-bottom: 0.5pt;
        }
        .address-line-item input[type="text"] {
            border: none;
            border-bottom: 0.5pt solid black;
            padding: 0 2pt;
            font-size: 8pt;
            height: 11pt;
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1;
        }
        .address-line-item.city input { width: 80pt; flex-grow: 0; }
        .address-line-item.state input { width: 30pt; flex-grow: 0; }
        .address-line-item.zip input { width: 45pt; flex-grow: 0; }


        /* Header Section Styling */
        .header-title {
            font-size: 14pt;
            font-weight: bold;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }
        .acord-logo {
            height: 70pt; /* Height based on typical logo size */
            vertical-align: middle;
            /*margin-right: 5pt;*/
        }
        /* Smallest font for the date label */
        .date-field-label {
            font-size: 6.5pt;
        }
        /* Date input needs to be right-aligned within its fixed width */
        .date-input {
            text-align: right;
            width: 70pt; /* Fixed width for the date input field */
        }
        table.insuredtable td{padding: 5pt 3pt}
        /* Table styling */
        table {
            border-collapse: collapse;
            width: 100%;
            /* margin-top: 15pt; Space before table */
            /* margin-bottom: 15pt; Space after table */
        }
        table th, table td {
            border: 0.5pt solid black; /* Fine border for cells */
            padding: 2pt 3pt; /* Tight padding inside cells */
            text-align: left;
            vertical-align: middle; /* Center content vertically */
            font-size: 8pt;
            line-height: 1.2;
        }
        table th {
            font-weight: normal; /* ACORD headers are usually not bold */
            text-align: center;
            background-color: #f8f8f8; /* Very subtle header background */
        }

        /* Authorization Statement Text Styling */
        .statement-text {
            line-height: 1.3;
            margin-bottom: 10pt;
            font-size: 9pt;
        }
        .statement-text input {
            border: none;
            border-bottom: 0.5pt solid black;
            font-size: 9pt; /* Match surrounding text size */
            padding: 0 2pt;
            height: 12pt; /* Ensure enough height for the line */
            vertical-align: bottom; /* Align with text baseline */
            display: inline-block; /* Allows width to be set */
        }

        /* Signature lines and labels */
        .signature-line {
            display: flex;
            align-items: flex-end; /* Align the label/title to the bottom of the line */
            padding-bottom: 2pt; /* Space below the line for clarity */
            margin-top: 15pt; /* Space between signature areas */
            position: relative; /* For absolute positioning of labels */
        }
        .signature-line .line-input {
            flex-grow: 1;
            border: none;
            border-bottom: 0.5pt solid black;
            height: 10pt; /* Height for the actual line */
            padding: 0 2pt;
            font-size: 8pt; /* For actual signature/printed name if typed */
            background-color: transparent;
        }
        .signature-line .line-label {
            position: absolute; /* Position label below the line */
            top: 12pt; /* Adjust based on line-input height + label font size */
            left: 0;
            right: 0;
            text-align: center;
            font-size: 7pt;
            font-weight: bold; /* Labels often bold */
            white-space: nowrap;
        }
        .signature-group {
            display: flex;
            width: 100%;
            margin-top: 20pt; /* Space before first signature block */
        }
        .signature-group > div {
            flex: 1; /* Each column takes equal width */
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }
        .signature-group .date-field {
            text-align: right; /* For date label */
            flex-grow: 1; /* Take remaining space */
            display: flex; /* Make date field itself a flex container */
            justify-content: flex-end; /* Push content to the right */
            align-items: flex-end;
        }
        .signature-group .date-field .line-input {
            width: 60pt; /* Specific width for date input */
            flex-grow: 0; /* Don't let it grow */
            text-align: right; /* Text inside date field aligns right */
        }
        .signature-group .date-field .line-label {
            right: 0; /* Align date label to the right */
            left: auto; /* Remove left constraint */
            text-align: right;
            bottom: -8pt; /* Ensure label is below line */
        }
        .signature-group .left-sig {
            margin-right: 20pt; /* Space between signature and date areas */
        }

        /* Styling for City/State/Zip in the signature section */
        .signature-address-line-container {
            display: flex;
            justify-content: space-between;
            margin-top: 0.2in; /* Space above this line */
            gap: 0.1in; /* Small gap between City, State, Zip fields */
        }
        .signature-address-line-item {
            display: flex;
            align-items: flex-end;
            line-height: 1.0;
        }
        .signature-address-line-item input[type="text"] {
            border: none;
            border-bottom: 0.5pt solid black;
            padding: 0 2pt;
            font-size: 8pt;
            height: 11pt;
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1;
        }
        .signature-address-line-item label {
            white-space: nowrap;
            font-size: 8pt;
            color: #333;
            flex-shrink: 0;
            margin-left: 4pt; /* Space between input and label */
            padding-bottom: 0.5pt;
        }
        .signature-address-line-item.city input { flex-grow: 1; } /* City input fills available space */
        .signature-address-line-item.state input { width: 25pt; flex-grow: 0; } /* Fixed width for State */
        .signature-address-line-item.zip input { width: 45pt; flex-grow: 0; } /* Fixed width for Zip */


        /* Footer Section */
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 25pt; /* Space from content above */
            /* padding-top: 5pt; */
            border-top: 0.5pt solid #ccc;
            font-size: 6pt;
            /* color: #555; */
        }
        .footer-copyright {
            /* flex-grow: 1; */
            text-align: center;
        }

        /* PRINT MEDIA QUERIES - CRITICAL for accurate printing */
        @media print {
            body {
                background-color: white; /* No background on print */
                margin: 0;
                padding: 0;
                display: block; /* Remove flex on print to avoid centering issues */
                -webkit-print-color-adjust: exact; /* Crucial for background colors/borders */
                print-color-adjust: exact;
                orphans: 3; /* Prevent single lines at page breaks */
                widows: 3; /* Prevent single lines at page breaks */
            }
            .form-container {
                border: none; /* Remove screen-only border on print */
                box-shadow: none; /* Remove screen-only shadow on print */
                margin: 0; /* Remove auto margins on print */
                padding: 0.5in; /* Keep internal padding as form margin */
                width: 8.5in;
                height: 11in;
            }

            /* Ensure all inputs and text align perfectly for print */
            input[type="text"] {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                vertical-align: baseline; /* Align text exactly on the baseline */
                padding-bottom: 0; /* Remove any padding that might push text off line */
                height: auto; /* Let content determine height, but maintain min-height */
                min-height: 11pt; /* Maintain minimum line height for input areas */
            }
            .form-field-line label,
            .address-line-item label,
            .signature-address-line-item label {
                padding-bottom: 0; /* Ensure labels are tightly aligned */
            }
            .signature-line .line-label {
                bottom: -7pt; /* Fine-tune label position below signature lines for print */
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
            .grid > div {
                padding: 0; /* Ensure no unwanted padding from Tailwind on grid cells */
            }

            /* Prevent elements from being split across page breaks where possible */
            .signature-group, .statement-text, table {
                page-break-inside: avoid;
            }
            table thead {
                display: table-header-group; /* Ensure table headers repeat on new page */
            }
            table tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }
    </style>
@endpush
@section('content')

    <form action="{{ route('store-agentBrokerForm') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">
        <div class="form-container">
            <div class="flex justify-between items-end">
                <div class="text-xs font-bold mr-4 flex-shrink-0" style="font-size: 9pt;">
                    <img src="{{asset('backend/img/acord-logo.png')}}" alt="ACORD Logo" class="acord-logo">

                </div>
                <div class="flex-grow header-title">
                    AGENT/BROKER OF RECORD CHANGE
                </div>
                <div class="text-right flex-shrink-0 ml-4" style="border:1px solid #000; padding: 1px 5px;">
                    <div class="" style="text-align: center;">
                        <label class="date-field-label">DATE (MM/DD/YYYY):</label>

                        <input type="text" value="" class="date-input" name="creation_date" placeholder="Invoice Date" style="font-size: 8pt;">
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-2  gap-y-[0.1in]" style="border: 1px solid black;">
                <div style="border-right: 1px solid black; margin-top: 5px ;">
                    <div class="form-field-line">
                        <table style="width: 100%;">
                            <tr>
                                <td rowspan="2" style="border: none;">New Agency</td>
                                <td  style="border-right: 0;">PHONE (A/C, No, Ext)</td>
                                <td  style="border-left: 0;">
                                    <input type="text" value="" class="date-input"   name="agency_phone" placeholder="Phone" style="font-size: 8pt;">
                                </td>
                            </tr>
                            <tr>
                                <!-- <td></td> -->
                                <td  style="border-right: 0;">FAX (A/C, No)</td>
                                <td  style="border-left: 0;">
                                    <input type="text" value="" class="date-input"   name="agency_fax" placeholder="Phone" style="font-size: 8pt;">

                                </td>
                            </tr>
                        </table>
                        <!-- <label>NEW AGENCY</label>
                        <input type="text" value="" class="flex-grow"> -->
                    </div>
                    <div class="form-field-line">
                        <p style="padding: 2px 5px;">
                            <input type="text" value="" class="date-input"   name="agency_name" placeholder="Name"  style="font-size: 8pt;">
                            <input type="text" value="" class="date-input"   name="agency_address" placeholder="Address" style="font-size: 8pt;">

                        </p>
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td colspan="2" >
                                    <input type="text" value="" class="date-input"   name="agency_city" placeholder="City" style="font-size: 8pt;">
                                </td>
                                <td ><input type="text" value="" class="date-input" name="agency_state" placeholder="State" style="font-size: 8pt;"></td>
                                <td colspan="2" ><input type="text" value="" class="date-input" name="agency_zipcode" placeholder="Zip Code" style="font-size: 8pt;"></td>
                            </tr>

                        </table>

                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">

                        <table style="width: 100%; ">
                            <tr>

                                <td colspan="2" >Email: <input type="email" value="" class="date-input" name="email" placeholder="Email" style="font-size: 8pt;"></td>
                            </tr>
                            <tr>
                                <td >CODE : <input type="text" value="" class="date-input" name="code" placeholder="Code" style="font-size: 8pt;"></td>
                                <td >SUBCODE : <input type="text" value="" class="date-input" name="sub_code" placeholder="SUB Code" style="font-size: 8pt;"></td>
                            </tr>
                            <tr>

                                <td colspan="2" >AGENCY CUSTOMER ID : <input type="text" value="" class="date-input" name="agency_customer_id" placeholder="AGENCY CUSTOMER ID" style="font-size: 8pt;"></td>
                            </tr>
                        </table>
                    </div>

                </div>

                <div style="margin-top: 5px ">
                    <div class="form-field-line" style="margin-left: 10px;">
                        <label>INSURANCE COMPANY NAME: <input type="text" value="" class="date-input" name="insurance_company_name" placeholder="INSURANCE COMPANY NAME"
                            style="font-size: 8pt;"></label>

                    </div>
                    <div class="form-field-line" style="height: 20px; margin-left: 10px;">
                        <label>STREET ADDRESS: <input type="text" value="" class="date-input" name="insurance_company_address" placeholder="Address"
                            style="font-size: 8pt;"></label>
                    </div>
                    <div class="form-field-line" style="height: 20px; margin-left: 10px;">
                        <label>CITY: <input type="text" value="" class="date-input" name="insurance_company_city" placeholder="City"
                            style="font-size: 8pt;"></label>
                    </div>
                    <div class="form-field-line" style="height: 20px; margin-left: 10px;">
                        <label>STATE: <input type="text" value="" class="date-input" name="insurance_company_state" placeholder="State"
                            style="font-size: 8pt;"> </label>
                    </div>
                    <div class="form-field-line" style="height: 20px; margin-left: 10px;">
                        <label>ZIP CODE: <input type="text" value="" class="date-input" name="insurance_company_zipcode" placeholder="Zip Code"
                            style="font-size: 8pt;"></label>
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td colspan="2" >Current Agency: <input type="text" value="" class="date-input" name="current_agency" placeholder="Current Agency"
                            style="font-size: 8pt;"></td>
                                <td colspan="2" >Current Producer: <input type="text" value="" class="date-input" name="current_producer" placeholder="Current Producer"
                            style="font-size: 8pt;"></td>
                            </tr>

                        </table>

                    </div>


                </div>
            </div>
            <table>
                <tr>
                    <td rowspan="10">This authorization replaces any other authorization that may have been
                        previously completed for any other insurance representative for the
                        stated lines of business.This authorization replaces any other authorization that may have been
                        previously completed for any other insurance representative
                    </td>
                </tr>
            </table>
            <table class="insuredtable">
                <thead>
                <tr>
                    <th class="w-1/4">NAMED INSURED<br>(AS IT APPEARS ON POLICY)</th>
                    <th class="w-1/6">POLICY NUMBER(S)</th>
                    <th class="w-[15%]">EFFECTIVE DATE</th>
                    <th class="w-[15%]">EXPIRATION DATE</th>
                    <th class="w-auto">LINE OF BUSINESS</th>
                </tr>
                </thead>
                <tbody>

                @for ($i = 0; $i < 10; $i++)    
                    <tr>
                        <td><input type="text" value="" class="form-control" name="name[{{ $i }}]" placeholder="Name"
                        style="font-size: 8pt;"></td>
                        <td><input type="text" value="" class="form-control" name="policy_number[{{ $i }}]" placeholder="Policy #"
                            style="font-size: 8pt;"></td>
                        <td><input type="text" value="" class="form-control" name="effective_date[{{ $i }}]" placeholder="Effective Date"
                            style="font-size: 8pt;"></td>
                        <td><input type="text" value="" class="form-control" name="expiration_date[{{ $i }}]" placeholder="Expiration Date"
                            style="font-size: 8pt;"></td>
                        <td><input type="text" value="" class="form-control" name="line_of_business[{{ $i }}]" placeholder="Business"
                            style="font-size: 8pt;"></td>
                    </tr>
                @endfor

                </tbody>
            </table>

            <div class="statement-text mt-[0.2in]" style="padding: 0 30px;">
                <p style="font-weight: bold; font-size: 14px;">Please be advised that we wish to name
                    <input type="text" class="w-[80pt] inline-block" name="advice_producer_name" placeholder="Producer" value="" style="height: 10pt; margin: 0 4pt;">
                    as our exclusive representative effective
                    <input type="text" class="w-[80pt] inline-block" value="" name="advice_producer_effective_date" placeholder="Effective Date" style="height: 10pt; margin: 0 4pt;">
                    for the lines of business shown above, currently in force or submitted
                    by application.
                </p>

                <p class="" style="font-weight: bold; font-size: 14px; margin-top: 10px;">
                    This authorization replaces any other authorization that may have been
                    previously completed for any other insurance representative for the
                    stated lines of business.
                </p>
            </div>

            <div class="mt-[0.4in]" style="justify-self: center ; width: 80%;">
                <div >
                    {{-- <div style="width: 70%; float: left; margin-right: 15px;">
                        <div class="signature-line mt-[0.4in]">
                            <input type="text" class="line-input" name="insured_title" placeholder="Title">
                            <span class="line-label">TITLE (IF APPLICABLE)</span>
                        </div>
                    </div>
                    <div style="width: 15%; align-content:end">
                        <div class="signature-line mt-[0.4in]">
                            <input type="text" class="line-input">
                            <span class="line-label">TITLE (IF APPLICABLE)</span>
                        </div>
                    </div> --}}

                    <table style="width: 100%; " style="margin-top: 30px;">
                        <tr>
                            <td colspan="2" style="border: none;">
                                <div class="signature-line mt-[0.4in]">
                                    <input type="text" class="line-input" value="" name="insured_signature" placeholder="Signature">
                                    <span class="line-label">INSURED'S SIGNATURE</span>
                                </div>
                            </td>
                            <td style="border: none;">
                                <div class="signature-line mt-[0.4in]">
                                    <input type="text" value="" class="line-input" name="issued_date" placeholder="Issue Date">
                                    <span class="line-label">DATE</span>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="signature-line mt-[0.4in]">
                    <input type="text" class="line-input" name="insured_title" placeholder="Title">
                    <span class="line-label">TITLE (IF APPLICABLE)</span>
                </div>

                <div class="signature-line mt-[0.4in]">
                    <input type="text" class="line-input" name="insured_company_name" placeholder="Company Name">
                    <span class="line-label">COMPANY NAME (IF APPLICABLE)</span>
                </div>

                <div class="signature-line mt-[0.4in]">
                    <input type="text" value="" class="line-input" name="insured_company_address" placeholder="Address"> <span class="line-label text-left !left-0 " style="transform: translateX(0);">STREET ADDRESS OF INSURED</span>
                </div>
                <table style="width: 100%; " style="margin-top: 30px;">
                    <tr>
                        <td colspan="2" style="border: none;">
                            <div class="signature-line mt-[0.4in]">
                                <input type="text" class="line-input" name="insured_company_city" placeholder="City">
                                <span class="line-label">City of Insured</span>
                            </div>
                        </td>
                        <td  style="border: none;">
                            <div class="signature-line mt-[0.4in]">
                                <input type="text" class="line-input" name="insured_company_state" placeholder="State">
                                <span class="line-label">State of Insured</span>
                            </div>
                        </td>
                        <td    style="border: none;">
                            <div class="signature-line mt-[0.4in]">
                                <input type="text" class="line-input" name="insured_company_zipcode" placeholder="Zip Code">
                                <span class="line-label">Zipcode of Insured</span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <!-- <td></td> -->

                    </tr>
                </table>
                <div class="signature-address-line-container" style="margin-top: 30px;">



                </div>
            </div>
            <div class="footer-content">
                <div class="flex-shrink-0"  style="font-weight: bold; font-size: 9px;">
                    ACORD 38 (2007/01)
                </div>
                <div class="footer-copyright"  style=" font-weight: bold; font-size: 9px;">
                    &copy; ACORD CORPORATION 1996-2007. All rights reserved.
                </div>
            </div>
            <p style="text-align: center; font-weight: bold; font-size: 9px; margin-top: 10px;">The ACORD name and logo are registered marks of ACORD</p>
        </div>
        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>
    </form>


@endsection
