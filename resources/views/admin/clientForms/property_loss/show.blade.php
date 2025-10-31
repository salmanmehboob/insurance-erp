@extends('admin.layouts.form')
@push('styles')
    <style>
        .acord-logo {
            height: 55pt !important;
            vertical-align: middle;
            margin-right: 5pt;
        }

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
            min-height: 11in;
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
        .form-field-line {
            display: flex;
            /* align-items: flex-end; Aligns label baseline with input line */
            margin-bottom: 0.08in;
            /* Vertical spacing between form lines */
            line-height: 1.0;
            /* Tighter line height for labels */
        }

        .form-field-line label {
            /* white-space: nowrap; Prevent label from wrapping */
            font-size: 8pt;
            /* Label font size */
            color: #333;
            /* flex-shrink: 0; Prevent label from shrinking */
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

        /* Specific styles for multi-part address lines (e.g., Pasadena TX 77504) */
        .address-line-container {
            display: flex;
            align-items: flex-end;
            margin-bottom: 0.08in;
            /* Consistent spacing */
            gap: 0.2in;
            /* Horizontal space between City, State, Zip groups */
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

        .address-line-item.city input {
            width: 80pt;
            flex-grow: 0;
        }

        .address-line-item.state input {
            width: 30pt;
            flex-grow: 0;
        }

        .address-line-item.zip input {
            width: 45pt;
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
            /* Height based on typical logo size */
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
            width: 70pt;
            /* Fixed width for the date input field */
        }

        table.insuredtable td {
            padding: 5pt 3pt
        }

        /* Table styling */
        table {
            border-collapse: collapse;
            width: 100%;
            /* margin-top: 15pt; Space before table */
            /* margin-bottom: 15pt; Space after table */
        }

        table th,
        table td {
            border: 0.5pt solid black;
            /* Fine border for cells */
            padding: 2pt 3pt;
            /* Tight padding inside cells */
            text-align: left;
            vertical-align: middle;
            /* Center content vertically */
            font-size: 8pt;
            line-height: 1.2;
        }

        table th {
            font-weight: normal;
            /* ACORD headers are usually not bold */
            text-align: center;
            background-color: #f8f8f8;
            /* Very subtle header background */
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
            font-size: 9pt;
            /* Match surrounding text size */
            padding: 0 2pt;
            height: 12pt;
            /* Ensure enough height for the line */
            vertical-align: bottom;
            /* Align with text baseline */
            display: inline-block;
            /* Allows width to be set */
        }

        /* Signature lines and labels */
        .signature-line {
            display: flex;
            align-items: flex-end;
            /* Align the label/title to the bottom of the line */
            padding-bottom: 2pt;
            /* Space below the line for clarity */
            margin-top: 15pt;
            /* Space between signature areas */
            position: relative;
            /* For absolute positioning of labels */
        }

        .signature-line .line-input {
            flex-grow: 1;
            border: none;
            border-bottom: 0.5pt solid black;
            height: 10pt;
            /* Height for the actual line */
            padding: 0 2pt;
            font-size: 8pt;
            /* For actual signature/printed name if typed */
            background-color: transparent;
        }

        .signature-line .line-label {
            position: absolute;
            /* Position label below the line */
            top: 12pt;
            /* Adjust based on line-input height + label font size */
            left: 0;
            right: 0;
            text-align: center;
            font-size: 7pt;
            font-weight: bold;
            /* Labels often bold */
            white-space: nowrap;
        }

        .signature-group {
            display: flex;
            width: 100%;
            margin-top: 20pt;
            /* Space before first signature block */
        }

        .signature-group>div {
            flex: 1;
            /* Each column takes equal width */
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .signature-group .date-field {
            text-align: right;
            /* For date label */
            flex-grow: 1;
            /* Take remaining space */
            display: flex;
            /* Make date field itself a flex container */
            justify-content: flex-end;
            /* Push content to the right */
            align-items: flex-end;
        }

        .signature-group .date-field .line-input {
            width: 60pt;
            /* Specific width for date input */
            flex-grow: 0;
            /* Don't let it grow */
            text-align: right;
            /* Text inside date field aligns right */
        }

        .signature-group .date-field .line-label {
            right: 0;
            /* Align date label to the right */
            left: auto;
            /* Remove left constraint */
            text-align: right;
            bottom: -8pt;
            /* Ensure label is below line */
        }

        .signature-group .left-sig {
            margin-right: 20pt;
            /* Space between signature and date areas */
        }

        /* Styling for City/State/Zip in the signature section */
        .signature-address-line-container {
            display: flex;
            justify-content: space-between;
            margin-top: 0.2in;
            /* Space above this line */
            gap: 0.1in;
            /* Small gap between City, State, Zip fields */
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
            margin-left: 4pt;
            /* Space between input and label */
            padding-bottom: 0.5pt;
        }

        .signature-address-line-item.city input {
            flex-grow: 1;
        }

        /* City input fills available space */
        .signature-address-line-item.state input {
            width: 25pt;
            flex-grow: 0;
        }

        /* Fixed width for State */
        .signature-address-line-item.zip input {
            width: 45pt;
            flex-grow: 0;
        }

        /* Fixed width for Zip */


        /* Footer Section */
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            margin-top: 25pt;
            /* Space from content above */
            /* padding-top: 5pt; */
            border-top: 0.5pt solid #ccc;
            font-size: 6pt;
            /* color: #555; */
        }

        .footer-copyright {
            /* flex-grow: 1; */
            text-align: center;
        }

        .checkboxtd span {
            vertical-align: super;
        }

        .checkboxtd td {
            border: 0;
        }

        /* PRINT MEDIA QUERIES - CRITICAL for accurate printing */
        @media print {
            .page-break {
                page-break-after: always;

            }

            body {
                background-color: white;
                /* No background on print */
                margin: 0;
                padding: 0;
                display: block;
                /* Remove flex on print to avoid centering issues */
                -webkit-print-color-adjust: exact;
                /* Crucial for background colors/borders */
                print-color-adjust: exact;
                orphans: 3;
                /* Prevent single lines at page breaks */
                widows: 3;
                /* Prevent single lines at page breaks */
            }

            .form-container {
                border: none;
                /* Remove screen-only border on print */
                box-shadow: none;
                /* Remove screen-only shadow on print */
                margin: 0;
                /* Remove auto margins on print */
                padding: 0.5in;
                /* Keep internal padding as form margin */
                width: 8.5in;
                height: 11in;
            }

            /* Ensure all inputs and text align perfectly for print */
            input[type="text"] {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                vertical-align: baseline;
                /* Align text exactly on the baseline */
                padding-bottom: 0;
                /* Remove any padding that might push text off line */
                height: auto;
                /* Let content determine height, but maintain min-height */
                min-height: 11pt;
                /* Maintain minimum line height for input areas */
            }

            .form-field-line label,
            .address-line-item label,
            .signature-address-line-item label {
                padding-bottom: 0;
                /* Ensure labels are tightly aligned */
            }

            .signature-line .line-label {
                bottom: -7pt;
                /* Fine-tune label position below signature lines for print */
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

            .grid>div {
                padding: 0;
                /* Ensure no unwanted padding from Tailwind on grid cells */
            }

            /* Prevent elements from being split across page breaks where possible */
            .signature-group,
            .statement-text,
            table {
                page-break-inside: avoid;
            }

            table thead {
                display: table-header-group;
                /* Ensure table headers repeat on new page */
            }

            table tr {
                page-break-inside: avoid;
                page-break-after: auto;
            }
        }

        .kol-table td {
            border: 0;
        }
    </style>
@endpush
@section('content')

    <div class="form-container">
        <div class="flex justify-between items-end">
            <div class="text-xs font-bold mr-4 flex-shrink-0" style="font-size: 9pt;">
                <img src="{{asset('backend/img/acord-logo.png')}}" alt="ACORD Logo" class="acord-logo">

            </div>
            <div class="flex-grow header-title">
                PROPERTY LOSS NOTICE
            </div>
            <div class="text-right flex-shrink-0 ml-4" style="border:1px solid #000; padding: 1px 5px;">
                <div class="" style="text-align: center;">
                    <label class="date-field-label">DATE (MM/DD/YYYY):</label>
                    <p>{{$form->invoice_date}}</p>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-2  gap-y-[0.1in]" style="border: 1px solid black;">
            <div style="border-right: 1px solid black; margin-top: 5px ;">
                <div class="form-field-line">
                    <table style="width: 100%;">
                        <tr>
                            <td rowspan="2" style="border: none;">New Agency</td>

                        </tr>

                    </table>
                    <!-- <label>NEW AGENCY</label>
                                <input type="text" value="" class="flex-grow"> -->
                </div>
                <div class="form-field-line">
                    <p style="padding: 2px 5px;">
                        {{$form->agency_name}}
                    </p><br>
                    <p style="padding: 2px 5px;">
                        {{$form->agency_address}}
                    </p>
                </div>
                <div class="form-field-line" style="margin-bottom: 0; ">
                    <table style="width: 100%; border: none; ">
                        <tr>
                            <td colspan="2">
                                {{ $form->agency_city}}
                            </td>
                            <td>{{ $form->agency_state}}</td>
                            <td colspan="2">{{ $form->agency_zipcode}}</td>
                        </tr>

                    </table>

                </div>
                <div class="form-field-line" style="margin-bottom: 0;">

                    <table style="width: 100%; ">
                        <tr>

                            <td colspan="2">Contact : {{$form->agency_contact_name}}</td>
                        </tr>
                        <tr>

                            <td colspan="2">Phone : {{$form->agency_phone}}</td>
                        </tr>
                        <tr>

                            <td colspan="2">Fax : {{$form->agency_fax}}</td>
                        </tr>
                        <tr>


                            <td colspan="2">Email : {{$form->agency_email}}</td>
                        </tr>

                        <tr>
                            <td>CODE : {{$form->agency_code}}</td>
                            <td>SUBCODE : {{$form->agency_subcode}}</td>
                        </tr>
                        <tr>

                            <td colspan="2">AGENCY CUSTOMER ID : {{$form->agency_customer_id}}</td>
                        </tr>
                    </table>
                </div>

            </div>

            <div style="margin-top: 5px ">
                <table>
                    <tr>
                        <td>Insured Location Code <br> {{$form->location_code}}</td>
                        <td>Date of loss an time <br> {{$form->date_of_loss}}</td>
                        <td><input type="checkbox" {{($form->time_of_loss == 'am') ? 'checked disabled' : 'disabled'}}> AM <br> <input type="checkbox"
                                {{($form->time_of_loss == 'pm') ? 'checked disabled' : 'disabled'}}> PM </td>
                    </tr>
                </table>
                <h5 style="text-align: center; font-size: 10px ; font-weight: 600;">Priority Home Policy</h5>
                <table>
                    <tr>
                        <td>CARRIER <br> {{$form->property_carrier}}</td>

                        <td>Niac Code <br>{{$form->property_naic_code}}</td>
                    </tr>
                    <tr>
                        <td>Policy Number <br> {{$form->property_policy_number}}</td>

                        <td>Line of Business <br> {{$form->property_business}}</td>
                    </tr>
                </table>
                <h5 style="text-align: center; font-size: 10px ; font-weight: 600;">Flood Policy</h5>
                <table>
                    <tr>
                        <td>CARRIER <br>{{$form->flood_carrier}}</td>

                        <td>Niac Code <br>{{$form->flood_naic_code}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Policy Number <br> {{$form->flood_policy_number}}</td>

                    </tr>
                </table>
                <h5 style="text-align: center; font-size: 10px ; font-weight: 600;">Wind Policy</h5>
                <table>
                    <tr>
                        <td>CARRIER <br> {{$form->wind_carrier}}</td>

                        <td>Niac Code <br> {{$form->wind_naic_code}}</td>
                    </tr>
                    <tr>
                        <td colspan="2">Policy Number <br> {{$form->wind_policy_number}}</td>

                    </tr>
                </table>

            </div>
        </div>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; margin-bottom: -5px;">Insured</div>
        <div class="grid grid-cols-2  gap-y-[0.1in]" style="border: 1px solid black; margin-top: 10px;">
            <div style="">
                <table>
                    <tr>
                        <td colspan="3">
                            NAME OF INSURED (First, Middle, Last) <br> {{$form->insured_name}}
                        </td>
                    </tr>
                    <tr>
                        <td>Date of birth <br> {{$form->insured_dob}}</td>
                        <td>FEIN <br> {{$form->insured_fein}}</td>
                        <td>Marital status <br> {{$form->insured_marital_status}} </td>
                    </tr>
                    <tr>
                        <td colspan="2"><span>Primary Phone : </span> {{$form->insured_phone_primary}} <br>
                            <div>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="insured_phone_primary_type" {{$form->insured_phone_primary_type == 'home' ? 'checked disabled' : 'disabled'}}>
                                    <span class="ins-form-small-text">HOME</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="insured_phone_primary_type" {{$form->insured_phone_primary_type == 'bus' ? 'checked disabled' : 'disabled'}} 
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">BUS</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="insured_phone_primary_type" {{$form->insured_phone_primary_type == 'cell' ? 'checked disabled' : 'disabled'}} 
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">CELL</span>
                                </span>
                            </div>
                        </td>
                        <td>Secondary Phone : </span> {{$form->insured_phone_secondary}} <br>
                            <div>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="insured_phone_secondary_type" {{$form->insured_phone_secondary_type == 'home' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">HOME</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="insured_phone_secondary_type" {{$form->insured_phone_secondary_type == 'bus' ? 'checked disabled' : 'disabled'}} 
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">BUS</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="insured_phone_secondary_type" {{$form->insured_phone_secondary_type == 'cell' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">CELL</span>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">Name of Spouse <br> {{$form->spouse_name}}</td>
                    </tr>
                    <tr>
                        <td>Date of birth <br> {{$form->spouse_dob}} </td>
                        <td>FEIN <br> {{$form->spouse_fein}}</td>
                        <td>Marital status <br> {{$form->spouse_marital_status}} </td>
                    </tr>
                    <tr>
                        <td colspan="2">Primary Phone <br> {{$form->spouse_phone_primary}} <br>
                            <div>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="spouse_phone_primary_type" {{$form->spouse_phone_primary_type == 'home' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox" checked>
                                    <span class="ins-form-small-text">HOME</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="spouse_phone_primary_type" {{$form->spouse_phone_primary_type == 'bus' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">BUS</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="spouse_phone_primary_type" {{$form->spouse_phone_primary_type == 'cell' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">CELL</span>
                                </span>
                            </div>
                        </td>
                        <td>Secondary Phone <br> {{$form->spouse_phone_secondary}} <br>
                            <div>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="spouse_phone_secondary_type" {{$form->spouse_phone_secondary_type == 'home' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">HOME</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="spouse_phone_secondary_type" {{$form->spouse_phone_secondary_type == 'bus' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">BUS</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="spouse_phone_secondary_type" {{$form->spouse_phone_secondary_type == 'cell' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">CELL</span>
                                </span>
                            </div>
                        </td>
                    </tr>
                </table>


            </div>
            <div style=" ">
                <div class="form-field-line">
                    <table style="width: 100%;">
                        <tr>
                            <td rowspan="2" style="border: none;">Insured Mailing Addess</td>
                        </tr>
                    </table>
                    <!-- <label>NEW AGENCY</label>
                                <input type="text" value="" class="flex-grow"> -->
                </div>
                <div>
                    <p style="padding: 2px 5px;">{{$form->insured_address}}</p>
                </div>
                <div style="margin-bottom: 0; ">
                    <table style="width: 100%; border: none; ">
                        <tr>
                            <td colspan="2">{{$form->insured_city}}</td>
                            <td>{{$form->insured_state}}</td>
                            <td colspan="2">{{$form->insured_zipcode}}</td>
                        </tr>

                    </table>

                </div>
                <div class="form-field-line" style="margin-bottom: 0;">

                    <table style="width: 100%; ">
                        <tr>
                            <td colspan="2">Primary EMail : {{$form->insured_email_primary}} </td>
                        </tr>
                        <tr>
                            <td colspan="2">Secondary EMail : {{$form->insured_email_secondary}}</td>
                        </tr>
                    </table>
                </div>
                <div>
                    <p style="padding: 2px 5px;">Spouse Mailing Addess <br> {{$form->spouse_address}}</p>
                </div>
                <div style="margin-bottom: 0; ">
                    <table style="width: 100%; border: none; ">
                        <tr>
                            <td colspan="2">{{$form->spouse_city}}</td>
                            <td>{{$form->spouse_state}}</td>
                            <td colspan="2">{{$form->spouse_zipcode}}</td>
                        </tr>
                    </table>
                </div>
                <div class="form-field-line" style="margin-bottom: 0;">

                    <table style="width: 100%; ">
                        <tr>

                            <td colspan="2">Primary EMail : {{$form->spouse_email_primary}}</td>
                        </tr>
                        <tr>

                            <td colspan="2">Secondary EMail : {{$form->spouse_email_secondary}}</td>
                        </tr>



                    </table>
                </div>
            </div>


        </div>
        <div style="display: flex; margin-top: 5px;">
            <div style="font-size: 12px; font-weight: 600;  margin-bottom: -5px;">Contact</div>
        </div>

        <div class="grid grid-cols-2  gap-y-[0.1in]" style="border: 1px solid black; margin-top: 10px;">
            <div style="">
                <table>
                    <tr>
                        <td colspan="3">Name of Contact <br> {{$form->contact_name}}</td>
                    </tr>

                    <tr>
                        <td colspan="2">Primary Phone <br> {{$form->contact_phone_primary}} <br>
                            <div>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="contact_phone_primary_type" {{$form->contact_phone_primary_type == 'home' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox" checked>
                                    <span class="ins-form-small-text">HOME</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="contact_phone_primary_type" {{$form->contact_phone_primary_type == 'bus' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">BUS</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="contact_phone_primary_type" {{$form->contact_phone_primary_type == 'cell' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">CELL</span>
                                </span>
                            </div>
                        </td>
                        <td>Secondary Phone <br> {{$form->contact_phone_secondary}} <br>
                            <div>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="contact_phone_secondary_type" {{$form->contact_phone_secondary_type == 'home' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox" checked>
                                    <span class="ins-form-small-text">HOME</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="contact_phone_secondary_type" {{$form->contact_phone_secondary_type == 'bus' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">BUS</span>
                                </span>
                                <span class="ins-form-checkbox-container">
                                    <input type="radio" name="contact_phone_secondary_type" {{$form->contact_phone_secondary_type == 'cell' ? 'checked disabled' : 'disabled'}}
                                        class="ins-form-checkbox">
                                    <span class="ins-form-small-text">CELL</span>
                                </span>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">When to contact <br> {{$form->contact_when}}</td>
                    </tr>

                </table>


            </div>
            <div style=" ">
                <div class="form-field-line">
                    <table style="width: 100%;">
                        <tr>
                            <td rowspan="2" style="border: none;">Contact Mailing Addess<br> {{$form->contact_address}}</td>
                        </tr>
                    </table>
                    <!-- <label>NEW AGENCY</label>
                                <input type="text" value="" class="flex-grow"> -->
                </div>
                <div style="margin-bottom: 0; ">
                    <table style="width: 100%; border: none; ">
                        <tr>
                            <td colspan="2">{{$form->contact_city}}</td>
                            <td>{{$form->contact_state}}</td>
                            <td colspan="2">{{$form->contact_zipcode}}</td>
                        </tr>
                    </table>
                </div>


                <div class="form-field-line" style="margin-bottom: 0;">

                    <table style="width: 100%; ">
                        <tr>
                            <td colspan="2">Primary EMail : {{$form->contact_email_primary}}</td>
                        </tr>
                        <tr>
                            <td colspan="2">Secondary EMail : {{$form->contact_email_secondary}} </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div style="font-size: 12px; font-weight: 600; margin-top: 5px; margin-bottom: -5px;">Loss</div>
        <table style="width: 100%; margin-top: 20px;">
            <tr>
                <td>Location of loss:<br> {{$form->loss_location}}</td>
                <td>Police or fire department contacted : {{$form->loss_police_contact}}</td>
            </tr>
            <tr>
                <td>Street:
                    <br> {{$form->loss_address }}
                    <br> {{$form->loss_city}} <br> {{$form->loss_state}}  <br> #333{{$form->loss_zipcode}}
                </td>
                <td rowspan="2" style="vertical-align: top;">Report Number : {{$form->loss_police_report}}</td>
            </tr>
            <tr>
                <td>Country : {{$form->loss_country}}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <table class="kol-table">
                        <tr>
                            <td class="kind-of-loss-cell" rowspan="2">KIND OF LOSS</td>
                            <td>
                                <div class="checkbox-group">
                                    <div class="checkbox-item">
                                        <input type="radio" name="loss_type" {{$form->loss_type == 'fire' ? 'checked disabled' : 'disabled'}}>
                                        <label>FIRE</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="radio" name="loss_type" {{$form->loss_type == 'theft' ? 'checked disabled' : 'disabled'}} >
                                        <label>THEFT</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-group">
                                    <div class="checkbox-item">
                                        <input type="radio" name="loss_type" {{$form->loss_type == 'lightning' ? 'checked disabled' : 'disabled'}} >
                                        <label>LIGHTNING</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="radio" name="loss_type" {{$form->loss_type == 'hail' ? 'checked disabled' : 'disabled'}} >
                                        <label>HAIL</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-group">
                                    <div class="checkbox-item">
                                        <input type="radio" name="loss_type" {{$form->loss_type == 'flood' ? 'checked disabled' : 'disabled'}} >
                                        <label>FLOOD</label>
                                    </div>
                                    <div class="checkbox-item">
                                        <input type="radio" name="loss_type" {{$form->loss_type == 'wind' ? 'checked disabled' : 'disabled'}} >
                                        <label>WIND</label>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="checkbox-group">
                                    <div class="checkbox-item">
                                        <input type="radio" name="loss_type" {{$form->loss_type == 'other' ? 'checked disabled' : 'disabled'}} >
                                        <label>Other</label>
                                    </div>
                                    <div class="checkbox-item">
                                        {{$form->loss_type_other}}
                                    </div>
                                </div>
                            </td>
                            <!-- <td class="text-field-cell" colspan="2">
                                            <input type="text">
                                        </td> -->
                            <td style="border-left: 1px solid black;" class="amount-cell" rowspan="2">PROBABLE AMOUNT:
                                {{$form->loss_amount}}
                            </td>
                        </tr>
                    </table>

                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="ins-form-label">DESCRIPTION OF LOSS & DAMAGE</div>
                    {{$form->loss_description}}
                </td>
            </tr>
            <tr>
                <td>Reported By: <br> {{$form->report_by}}</td>
                <td>Reported To: <br> {{$form->report_to}}</td>
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
        <div class="page-break"></div>
        <table>
            <tr>
                <td>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Alabama
                        Any person who knowingly presents a false or fraudulent claim for payment of a loss or benefit
                        or
                        who
                        knowingly presents false information in an application for insurance is guilty of a
                        crime and may be subject to restitution, fines, or confinement in prison, or any combination
                        thereof.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Alaska
                        Any person who knowingly and with intent to injure, defraud, or deceive an insurance company
                        files
                        a claim containing false, incomplete, or misleading information may be prosecuted under state
                        law.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Arizona
                        For your protection Arizona law requires the following statement to appear on this form. Any
                        person
                        who knowingly presents a false or fraudulent claim for payment of a loss is subject to criminal
                        and
                        civil penalties.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Arkansas
                        Any person who knowingly presents a false or fraudulent claim for payment of a loss or benefit
                        or
                        knowingly presents false information in an application for insurance is guilty of a crime and
                        may be
                        subject to fines and confinement in prison.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in California
                        For your protection California law requires the following to appear on this form. Any person who
                        knowingly presents false or fraudulent claim for the payment of a loss is guilty of a crime and
                        may
                        be subject to fines and confinement in state prison.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Colorado
                        It is unlawful to knowingly provide false, incomplete, or misleading facts or information to an
                        insurance company for the purpose of defrauding or attempting to defraud the company. Penalties
                        may
                        include imprisonment, fines, denial of insurance and civil damages. Any insurance company or
                        agent
                        of an insurance company who knowingly provides false, incomplete, or misleading facts or
                        information
                        to a policyholder or claimant for the purpose of defrauding or attempting to defraud the
                        policyholder or claimant with regard to a settlement or award payable for insurance proceeds
                        shall
                        be reported to the Colorado Division of Insurance within the Department of Regulatory Agencies.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Delaware
                        Any person who knowingly, and with intent to injure, defraud or deceive any insurer, files a
                        statement of claim containing any false, incomplete, or misleading information is guilty of a
                        felony.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in the District of Columbia
                        WARNING: It is a crime to provide false or misleading information to an insurer for the purpose
                        of
                        defrauding the insurer or any other person. Penalties include imprisonment and/or fines. In
                        addition, an insurer may deny insurance benefits if false information materially related to a
                        claim
                        was provided by the applicant.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Florida
                        Any person who knowingly and with intent to injure, defraud, or deceive any insurer files a
                        statement of claim containing any false, incomplete, or misleading information is guilty of a
                        felony
                        of the third degree.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Hawaii
                        Any person who intentionally or knowingly misrepresents or conceals material facts, opinions,
                        intention, or law to obtain or attempt to obtain coverage, benefits, recovery, or compensation
                        commits the offense of insurance fraud which is a crime punishable by fines or imprisonment or
                        both.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Idaho
                        Any person who knowingly, and with intent to defraud or deceive any insurance company, files a
                        statement containing any false, incomplete or misleading information is guilty of a felony.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Indiana
                        Any person who knowingly and with intent to defraud an insurer files a statement of claim
                        containing
                        any false, incomplete, or misleading information commits a felony.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Kansas
                        Any person who, knowingly and with intent to defraud, presents, causes to be presented or
                        prepares
                        with knowledge or belief that it will be presented to or by an insurer, purported insurer,
                        broker or
                        any agent thereof, any written, electronic, electronic impulse, facsimile, magnetic, oral, or
                        telephonic communication or statement as part of, or in support of, an application for the
                        issuance
                        of, or the rating of an insurance policy for personal or commercial insurance, or a claim for
                        payment or other benefit pursuant to an insurance policy for commercial or personal insurance
                        which
                        such person knows to contain materially false information concerning any fact material thereto;
                        or
                        conceals, for the purpose of misleading, information concerning any fact material thereto
                        commits a
                        fraudulent insurance act.</p>
                    <p style="font-size: 12px; margin-top: 5px;">Applicable in Kentucky
                        Any person who knowingly and with intent to defraud any insurance company or other person files
                        a
                        statement of claim containing any materially false information or conceals, for the purpose of
                        misleading, information concerning any fact material thereto commits a fraudulent insurance act,
                        which is a crime.</p>
                </td>
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

        <div class="page-break"></div>
        <table>
            <tr>
                <td>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Louisiana: Any person who knowingly presents a false or fraudulent claim for
                        payment
                        of a loss or benefit or knowingly presents false information in an application for insurance is
                        guilty of a crime and may be subject to fines and confinement in prison.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Maine: A crime to knowingly provide false, incomplete or misleading information to
                        an
                        insurance company for the purpose of defrauding the company. Penalties may include imprisonment,
                        fines or denial of insurance benefits.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Maryland: Any person who knowingly and willfully presents a false or fraudulent
                        claim
                        for payment of a loss or benefit or who knowingly presents willfully false information in an
                        application for insurance is guilty of a crime and may be subject to fines and confinement in
                        prison.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Michigan: Any person who knowingly presents a false or fraudulent claim for
                        payment of
                        a loss or benefit or knowingly presents false information in an application for insurance is
                        guilty
                        of a crime and may be subject to fines and confinement in prison.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Minnesota: A person who files a claim with intent to defraud or helps commit a
                        fraud
                        against an insurer is guilty of a crime.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Nevada: Pursuant to NRS 686A.291, any person who knowingly and willfully files a
                        statement of claim that contains any false, incomplete or misleading information concerning a
                        material fact is guilty of a category D felony.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in New Hampshire: Any person who, with a purpose to injure, defraud or deceive any
                        insurance company, files a statement of claim containing any false, incomplete or misleading
                        information is subject to prosecution and punishment for insurance fraud as provided in RSA
                        638:20.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in New Jersey: Any person who knowingly files a statement of claim containing any
                        false
                        or misleading information is subject to criminal and civil penalties.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in New Mexico: Any person who knowingly presents a false or fraudulent claim for
                        payment
                        of a loss or benefit or knowingly presents false information in an application for insurance is
                        guilty of a crime and may be subject to civil fines and criminal penalties.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in New York: Any person who knowingly and with intent to defraud any insurance
                        company or
                        other person files an application for insurance or statement of claim containing any materially
                        false information, or conceals for the purpose of misleading, information concerning any fact
                        material thereto, commits a fraudulent insurance act, which is a crime, and shall also be
                        subject to
                        a civil penalty not to exceed five thousand dollars and the stated value of the claim for each
                        such
                        violation.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Ohio: Any person who, with intent to defraud or knowing that he is facilitating a
                        fraud against an insurer, submits an application or files a claim containing a false or
                        deceptive
                        statement is guilty of insurance fraud.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Oklahoma: WARNING: Any person who knowingly, and with intent to injure, defraud or
                        deceive any insurer, makes any claim for the proceeds of an insurance policy containing any
                        false,
                        incomplete or misleading information is guilty of a felony.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Oregon: Any person who knowingly and with intent to defraud or solicit another to
                        defraud the insurer by submitting an application containing a false statement as to any material
                        fact may be violating state law.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Pennsylvania: Any person who knowingly and with intent to defraud any insurance
                        company or other person files an application for insurance or statement of claim containing any
                        materially false information or conceals for the purpose of misleading, information concerning
                        any
                        fact material thereto commits a fraudulent insurance act, which is a crime and subjects such
                        person
                        to criminal and civil penalties.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Puerto Rico: Any person who knowingly and with the intention of defrauding
                        presents
                        false information in an insurance application, or presents, helps, or causes the presentation of
                        a
                        fraudulent claim for the payment of a loss or any other benefit, or presents more than one claim
                        for
                        the same damage or loss, shall incur a felony and, upon conviction, shall be sanctioned for each
                        violation by a fine of not less than five thousand dollars ($5,000) and not more than ten
                        thousand
                        dollars ($10,000), or fixed term of imprisonment for three (3) years, or both penalties. Should
                        aggravating circumstances be present, the penalty thus established may be increased to a maximum
                        of
                        five (5) years, if extenuating circumstances are present, it may be reduced to a minimum of two
                        (2)
                        years.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Rhode Island: Any person who knowingly presents a false or fraudulent claim for
                        payment of a loss or benefit or knowingly presents false information in an application for
                        insurance
                        is guilty of a crime and may be subject to fines and confinement in prison.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Tennessee: It is a crime to knowingly provide false, incomplete or misleading
                        information to an insurance company for the purpose of defrauding the company. Penalties include
                        imprisonment, fines and denial of insurance benefits.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Texas: Any person who knowingly presents a false or fraudulent claim for the
                        payment
                        of a loss is guilty of a crime and may be subject to fines and confinement in state prison.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Virginia: It is a crime to knowingly provide false, incomplete or misleading
                        information to an insurance company for the purpose of defrauding the company. Penalties include
                        imprisonment, fines and denial of insurance benefits.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in Washington: It is a crime to knowingly provide false, incomplete or misleading
                        information to an insurance company for the purpose of defrauding the company. Penalties include
                        imprisonment, fines and denial of insurance benefits.
                    </p>
                    <p style="font-size: 12px; margin-top: 5px;">
                        Applicable in West Virginia: Any person who knowingly presents a false or fraudulent claim for
                        payment of a loss or benefit or knowingly presents false information in an application for
                        insurance
                        is guilty of a crime and may be subject to fines and confinement in prison.
                    </p>
                </td>
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

    </div>


@endsection