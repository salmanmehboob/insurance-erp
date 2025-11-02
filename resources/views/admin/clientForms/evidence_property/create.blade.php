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
            height: 11.5in; /* Standard US Letter height */
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
            height: 60px; /* Height based on typical logo size */
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
        .checkboxtd span{vertical-align: super;}
        .checkboxtd td{border: 0;}

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

    <div class="form-container">

        <form action="{{ route('store-evidence/of/property') }}" method="POST">
            @csrf
            <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">

            <div class="flex justify-between items-end">
                <div class="text-xs font-bold mr-4 flex-shrink-0" style="font-size: 9pt;">
                    <img src="{{asset('backend/img/acord-logo.png')}}" alt="ACORD Logo" class="acord-logo inline-block align-middle">

                </div>
                <div class="flex-grow header-title">
                    EVIDENCE OF PROPERTY INSURANCE
                </div>
                <div class="text-right flex-shrink-0 ml-4" style="border:1px solid #000; padding: 1px 5px;">
                    <div class="" style="text-align: center;">
                        <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                        <p><input type="text" name="invoice_date" value="" placeholder="MM/DD/YYYY" style="text-align: center;" /></p>
                    </div>
                </div>
            </div>
            <div>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            THIS EVIDENCE OF PROPERTY INSURANCE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE ADDITIONAL INTEREST NAMED BELOW. THE EVIDENCE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE ISSUING INSURER(S), AUTHORIZED REPRESENTATIVE OR PRODUCER, AND THE ADDITIONAL INTEREST.
                        </td>
                    </tr>
                </table>
            </div>

            <div class="grid grid-cols-2  gap-y-[0.1in]" style="border: 1px solid black;">
                <div style="border-right: 1px solid black; margin-top: 5px ;">
                    <div class="form-field-line">
                        <table style="width: 100%;">
                            <tr>
                                <td rowspan="2" style="border: none;">New Agency</td>
                                <td  style="border-right: 0;">phone</td>
                                <td  style="border-left: 0;width: 50px;"><input type="text" name="agency_phone" placeholder="Phone No" value="" /></td>
                            </tr>                        
                        </table>
                    </div>
                    <div class="form-field-line">
                        <p style="padding: 2px 5px;">
                            <input type="text" name="agency_name" placeholder="Agency Name" value="" class="address-line" style="width: 257%;" />
                        </p>   
                    </div>
                    <div class="form-field-line">
                        <p style="padding: 2px 5px;">
                            <input type="text" name="agency_address" placeholder="Address" value="" class="address-line" style="width: 257%;" />
                        </p>
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td><input type="text" name="agency_city" placeholder="City" value="" /></td>
                                <td ><input type="text" name="agency_state" placeholder="State" value="" style="width: 50px;"/></td>
                                <td ><input type="text" name="agency_zipcode" placeholder="Zip Code" value="" /></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; ">
                            <tr>
                                <td ><input type="text" name="agency_fax" placeholder="Fax" value="" /></td>
                                <td ><input type="text" name="agency_email" placeholder="Email Address" value="" /></td>
                            </tr>
                            <tr>
                                <td ><input type="text" name="agency_code" placeholder="CODE" value="" /></td>
                                <td ><input type="text" name="agency_subcode" placeholder="SUB CODE" value="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" ><input type="text" name="agency_customer_id" placeholder="AGENCY CUSTOMER ID" value="" /></td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-field-line">
                        <table style="width: 100%;">
                            <tr>
                                <td rowspan="2" style="border: none;">INSURED</td>
                            </tr>

                        </table>
                    </div>
                    <div class="form-field-line">
                        <p style="padding: 2px 5px;">
                            <input type="text" name="insured_name" placeholder="Name" value="" class="address-line" />
                        </p>
                    </div>
                    <div class="form-field-line">
                        <p style="padding: 2px 5px;">
                            <input type="text" name="insured_address" placeholder="Address" value="" class="address-line" />
                        </p>
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0; ">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td><input type="text" name="insured_city" placeholder="City" value="" /></td>
                                <td><input type="text" name="insured_state" placeholder="State" value="" style="width: 50px;"/></td>
                                <td><input type="text" name="insured_zipcode" placeholder="Zip Code" value="" /></td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div style="margin-top: 8px ">
                    <div class="form-field-line" style="margin-left: 10px;">
                        <label>COMPANY</label>
                    </div>
                    <div class="form-field-line" style="height: 137px; margin-left: 10px;">
                        <input type="text" name="company_name" placeholder="Company Name" value="" />
                    </div>
                    <div class="form-field-line" style="margin-bottom: 0;">
                        <table style="width: 100%; border: none; ">
                            <tr>
                                <td><input type="text" name="loan_number" placeholder="Loan No" value="" /></td>
                                <td><input type="text" name="policy_number" placeholder="Policy Number" value="" /></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="effective_date" placeholder="Effective Date" value="" /></td>
                                <td><input type="text" name="expiration_date" placeholder="Expiration Date" value="" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="checkbox" name="is_terminated" value="1" /> <span  style="vertical-align: text-bottom;">  CONTINUED UNTIL TERMINATED IF CHECKED </span></td>
                            </tr>
                            <tr>
                                <td colspan="2">THIS REPLACES PRIOR EVIDENCE DATED: <input type="text" name="evidence_date" value="" style="width: 50%;" /></td>
                            </tr>	
                        </table>
                    </div>
                </div>
            </div>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; margin-bottom: -5px;">Property Information</div>
            <table style="margin-top: 10px; width: 100%;">
                <tr>
                    <td style="height: 60px; vertical-align: top;"><textarea name="property_information" placeholder="PROPERTY INFORMATION" style="width: 100%; height: 50px;"></textarea></td>
                </tr>
                <tr>    
                    <td style="height: 60px; vertical-align: top;"><textarea name="location_description" placeholder="Description" style="width: 100%; height: 50px;"></textarea></td>
                </tr>
                <tr>
                    <td>
                        THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR THE POLICY PERIOD INDICATED. NOT WITH STANDING ANY REQUIRMENT, TERM OR CONDITION OF ANY CONTRACT OR OTHER DOCUMENT WITH RESPECT TO WHICH THIS EVIDENCE OF PROPERTY INURANCE MAY BE ISSUED OR MAY PERTAIN, THE INSURANCE AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND CONDITIONS OF SUCH POLICIES. LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
                    </td>
                </tr>
            </table>
            <div style="display: flex; margin-top: 5px;">
                <div style="font-size: 12px; font-weight: 600;  margin-bottom: -5px;">Coverage Information</div>
                <div style="margin-left: 100px;">
                    <Span style="vertical-align: text-bottom;">Perl Insured</Span> <input type="checkbox" name="is_perlis" value="1" />
                    <span  style="vertical-align: text-bottom;">Basic</span> <input type="checkbox" name="is_basic" value="1" />
                    <span  style="vertical-align: text-bottom;">Broad</span> <input type="checkbox" name="is_broad" value="1" />
                    <span  style="vertical-align: text-bottom;">Special</span> <input type="checkbox" name="is_special" value="1" />
                </div>
            </div>

            <table style="margin-top: 10px; width: 100%;">
                <tr>
                    <td style="text-align: center;">Coverage / Perils / Forms</td>
                    <td style="text-align: center;">Amount of Insurance</td>
                    <td style="text-align: center;">Deductible</td>
                </tr>	
                <tr>
                    <td><input type="text" name="coverage" placeholder="Coverage" style="width: 100%; height: 100%;" /></td>
                    <td><input type="text" name="amount" placeholder="Amount" style="width: 100%; height: 100%;" /></td>
                    <td><input type="text" name="deductible" placeholder="Deductible" style="width: 100%; height: 100%;" /></td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; margin-bottom: -5px;">Remarks (Including Special Conditions)</div>
            <table style="margin-top: 10px; width: 100%;">
                <tr>
                    <td><textarea name="remarks" placeholder="REMARKS (Including Special Conditions)" style="width: 100%; height: 50px;"></textarea></td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; margin-bottom: -5px;">Cancellation</div>
            <table style="margin-top: 10px; width: 100%;">
                <tr>
                    <td>
                        SHOULD ANY OF THE ABOVE DESCRIBED POLICIES DE CANCELLED BEFORE THE EXPIRATION DATE THEREOF, NOTICE WILL BE DELIVERED IN ACCORDANCE WITH THE POLICY PROVISIONS.
                    </td>
                </tr>
            </table>
            <div style="font-size: 12px; font-weight: 600; margin-top: 5px; margin-bottom: -5px;">Additional Interest</div>
            <table style="margin-top: 10px; width: 100%;">
                <tr>
                    <td rowspan="3" style=" width: 50%; vertical-align: top;">Name and Address <br> 
                        <input type="text" name="additional_interest_name" placeholder="Name" class="address-line" /> 
                        <input type="text" name="additional_interest_address" placeholder="Address" class="address-line" /> 
                         <input type="text" name="additional_interest_city" placeholder="City" />
                        <input type="text" name="additional_interest_state" placeholder="State" />
                        <input type="text" name="additional_interest_zipcode" placeholder="Zip Code"/>
                    </td>
                    <td style="width: 50%;" class="checkboxtd">
                        <table>
                            <tr>
                                <td><input type="checkbox" name="additional_insured" value="1" /> <span>Additional Insured</span></td>
                                <td><input type="checkbox" name="lenders_loss_payable" value="1" /> <span>Lenders Loss Payable</span></td>
                                <td><input type="checkbox" name="loss_payee" value="1"  /> <span>Loss Payee</span></td>
                            </tr>
                            <tr>
                                <td><input type="checkbox" name="mortgagee" value="1" /> <span>Mortgage</span></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td style="width: 50%;">Loan <br> <input type="text" name="additional_interest_loan" placeholder="Loan #" /></td>
                </tr>
                <tr>
                    <td style="width: 50%;">Authorized representative <br> <input type="text" name="authorized_representative" placeholder="AUTHORIZED REPRESENTATIVE" /></td>
                </tr>
            </table>

            <div class="footer-content">
                <div class="flex-shrink-0"  style="font-weight: bold; font-size: 9px;">
                    ACORD 38 (2007/01)
                </div>
                <div class="footer-copyright"  style=" font-weight: bold; font-size: 9px;">
                    &copy; ACORD CORPORATION 1996-2007. All rights reserved.
                </div>
            </div>
            <p style="text-align: center; font-weight: bold; font-size: 9px; margin-top: 10px;">The ACORD name and logo are registered marks of ACORD</p>

            <div class="flex justify-center mt-6 space-x-3">
                <button type="submit"
                        class="bg-sky-500 hover:bg-sky-600 text-white font-medium px-5 py-2 rounded-lg shadow transition">
                    Submit
                </button>
                <button type="reset"
                        class="bg-gray-800 hover:bg-gray-900 text-white font-medium px-5 py-2 rounded-lg shadow transition">
                    Reset
                </button>
            </div>

        </form>    
    </div>


@endsection