@extends('admin.layouts.form')
@push('styles')
    <style>
        /* Base styles for screen viewing and print intent */
        body {
            font-family: 'Arial', sans-serif; /* Common form font */
            font-size: 9pt; /* Base font size */
            color: #000;
            margin: 0;
            padding: 0;
            display: flex; /* For centering the form on screen */
            justify-content: center;
            background-color: #f0f0f0; /* Light background for screen view */
        }
        .invoice-container {
            width: 8.5in; /* Standard US Letter width */
            min-height: 9in; /* Min height to ensure page size, content will expand */
            padding: 0.5in; /* Consistent margin inside the form content */
            box-sizing: border-box; /* Padding included in width/height */
            background-color: white;
            border: 1px solid #ccc; /* Optional: visual boundary on screen */
            box-shadow: 0 0 10px rgba(0,0,0,0.1); /* Subtle shadow for screen view */
            display: flex; /* Use flexbox for overall layout */
            flex-direction: column;
        }

        /* Generic Field Line - for labels followed by an underline */
        .field-line {
            display: flex;
            align-items: flex-end; /* Align label baseline with input line */
            line-height: 1.0;
            margin-bottom: 3pt; /* Small vertical spacing */
        }
        .field-line label {
            white-space: nowrap;
            font-size: 9pt;
            color: #333;
            flex-shrink: 0;
            margin-right: 4pt;
            padding-bottom: 0.5pt;
        }
        .field-line input[type="text"] {
            flex-grow: 1;
            border: none;
            border-bottom: 0.5pt solid black;
            padding: 0 2pt;
            font-size: 9pt;
            height: 12pt; /* Line height for inputs */
            background-color: transparent;
            box-sizing: border-box;
            line-height: 1;
        }

        /* Invoice Header - Top Section Layout (Three Columns) */
        .invoice-header-grid {
            display: grid;
            grid-template-columns: 1fr auto auto; /* Left column expands, two right columns auto-width */
            gap: 0.5in; /* Gap between columns */
            margin-bottom: 0.2in;
            align-items: flex-end; /* Align all column content to the bottom */
        }
        .invoice-header-grid .agency-info {
            font-size: 9pt;
            line-height: 1.3;
        }
        .invoice-header-grid .agency-info .agency-name {
            font-size: 15pt; 
            font-weight: bold;
            margin-bottom: 15pt;
        }
        .invoice-header-grid .agency-info .contact-info {
            display: flex;
            align-items: center;
            margin-top: 5pt; /* Space from address */
        }
        .invoice-header-grid .agency-info .contact-info span {
            margin-right: 5pt;
            white-space: nowrap;
        }
        .invoice-header-grid .agency-info .contact-info input {
            flex-grow: 0;
            width: 90pt; /* Fixed width for phone/fax numbers */
            height: 12pt;
            border-bottom: 0.5pt solid black;
            padding: 0 2pt;
            font-size: 9pt;
            background-color: transparent;
        }
        .invoice-header-grid .agency-info .contact-info .phone-label {
            margin-right: 2pt;
        }
        .invoice-header-grid .agency-info .contact-info .fax-label {
            margin-left: 15pt; /* Space between phone and fax */
            margin-right: 2pt;
        }

        .invoice-header-grid .invoice-date-col,
        .invoice-header-grid .policy-number-col {
            padding-bottom: 10pt; /* Push content up slightly to align underlines */
        }
        .invoice-header-grid .invoice-date-col .field-line input,
        .invoice-header-grid .policy-number-col .field-line input {
            width: 80pt; /* Fixed width for date and policy number */
            height: 12pt;
            font-size: 9pt;
        }

        /* Invoice Title */
        .invoice-title {
            font-weight: bold;
            font-size: 12pt; /* Larger font for main Invoice title */
            margin-bottom: 0.2in;
            margin-top: 7px;
        }

        /* Insured/Company Information */
        .insured-company-section {
            margin-bottom: 0.3in;
            line-height: 1.4;
        }
        .insured-company-section .field-group {
            display: flex;
            align-items: flex-start; /* Align groups at top */
            margin-bottom: 5pt; /* Space between groups */
        }
        .insured-company-section .label-column {
            width: 70pt; /* Fixed width for labels (Insured, Company, Company Fax) */
            flex-shrink: 0;
            font-size: 9pt;
            padding-top: 0.5pt; /* Align with first line of content */
        }
        .insured-company-section .info-column {
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        .insured-company-section .info-column .info-line {
            border-bottom: 0.5pt solid black;
            height: 12pt;
            font-size: 9pt;
            line-height: 1.2;
            padding: 0 2pt;
            margin-bottom: 4pt; /* Space between lines within a field */
        }
        .insured-company-section .info-column .info-line:last-child {
            margin-bottom: 0;
        }

        /* Item Table - CRUCIAL CHANGES HERE */
        .item-table-container {
            flex-grow: 1; /* Allows table to expand and push footer down */
            margin-bottom: 0.3in;
        }
        .item-table {
            border-collapse: collapse; /* Ensure no gaps between cells */
            width: 100%;
        }
        .item-table th, .item-table td {
            border: none; /* NO BORDERS on cells themselves */
            padding: 3pt 5pt; /* Padding inside text areas */
            text-align: left;
            vertical-align: bottom; /* Align text to bottom to meet underlines */
            font-size: 9pt;
            line-height: 1.2;
            height: 20pt; /* Minimum height for table rows, adjust as needed */
        }
        .item-table th {
            font-weight: bold; /* Table headers are bold in this image */
            background-color: white; /* Ensure no background */
            border-bottom: 0.5pt solid black; /* Underline for header */
            padding-bottom: 2pt; /* Space between header text and underline */
        }
        /* Specific column widths for the table headers */
        .item-table th:nth-child(1) { width: 15%; text-align: left;} /* Item column */
        .item-table th:nth-child(2) { width: 65%; text-align: left;} /* Description column */
        .item-table th:nth-child(3) { width: 20%; text-align: right; } /* Amount column - right aligned */

        /* Styles for table data cells to mimic underlines */
        .item-table td {
            position: relative; /* For absolute positioning of input/underline */
            padding: 0; /* Remove default padding for precise control */
            height: 20pt; /* Fixed height for data rows */
        }
        .item-table td .table-data-input {
            width: 100%;
            height: 100%; /* Fill the cell height */
            border: none;
            border-bottom: 0.5pt solid black; /* The underline for data */
            font-size: 9pt;
            padding: 0 5pt; /* Match padding of headers */
            background: transparent;
            box-sizing: border-box;
            text-align: left; /* Default text align */
            line-height: 1; /* Control text height within input */
        }
        .item-table td:nth-child(3) .table-data-input {
            text-align: right; /* Amount data right aligned */
        }

        /* No border for the row with total amount */
        .total-amount-row {
            border: none;
        }
        .total-amount-row td {
            border: none;
            padding-top: 5pt; /* More space above total */
            font-weight: bold;
            font-size: 10pt;
            height: auto; /* Allow content to dictate height */
        }
        .total-amount-row .total-label {
            text-align: right;
        }
        .total-amount-row .total-value-container {
            display: flex;
            justify-content: flex-end; /* Align the input to the right */
        }
        .total-amount-row .total-value-input {
            border-bottom: 0.5pt solid black; /* Underline for total amount */
            width: 80pt; /* Fixed width for total amount box */
            text-align: right;
            padding: 0 5pt;
            height: 15pt;
            font-size: 10pt;
            background: transparent;
            box-sizing: border-box;
            border-top: none; /* Ensure no top border */
            border-left: none; /* Ensure no left border */
            border-right: none; /* Ensure no right border */
        }


        /* Notes Section */
        .notes-section {
            margin-top: auto; /* Pushes notes and total to the bottom */
            padding-top: 0.1in;
            border-top: 0.5pt solid #ccc; /* Separator line */
            font-size: 8pt;
        }

        /* Print Specific Styles */
        @media print {
            body {
                background-color: white;
                margin: 0;
                padding: 0;
                display: block; /* Remove flex on print */
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                orphans: 3;
                widows: 3;
            }
            .invoice-container {
                border: none;
                box-shadow: none;
                margin: 0;
                padding: 0.5in;
                min-height: 11in; /* Ensure full page print */
            }
            input[type="text"], .info-column .info-line, .total-amount-row .total-value-input, .item-table td .table-data-input {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
                vertical-align: baseline;
                padding-bottom: 0;
                height: auto; /* Let content determine height */
                min-height: 12pt; /* Maintain minimum line height */
            }
            .field-line label, .agency-info div, .notes-section {
                padding-bottom: 0;
            }
            .item-table th, .item-table td {
                height: 20pt; /* Maintain row height for print */
                padding: 3pt 5pt; /* Keep padding consistent */
            }
            .item-table td .table-data-input {
                height: 100%; /* Fill cell */
                min-height: 12pt; /* Ensure input box has height */
            }
            .total-amount-row .total-value-input {
                height: 15pt; /* Maintain height for total amount */
            }
            /* Adjust negative margin for print if needed */
            .invoice-header-grid .invoice-date-col,
            .invoice-header-grid .policy-number-col {
                padding-bottom: 10pt; /* Keep alignment */
            }
        }
    </style>
@endpush

@section('content')

<div class="form-container">
    <form action="{{ route('store-invoice-for-payment') }}" method="POST" class="container mt-4">
        @csrf
        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">

        <div class="invoice-container">
            <div class="invoice-header-grid">
                <div class="agency-info">
                    <div class="agency-name">Aim Insurance Of Texas</div>
                    <div><p class="mb-4">Agency Name: <span class="underline"><input type="text" name="agency_name" placeholder="Name" value="" style="width: 300px;border-bottom: 1px solid black;"></span></p></div>
                    <div><p class="mb-4">Address: <span class="underline"><input type="text" name="agency_address" placeholder="Address" value="" style="width: 300px;border-bottom: 1px solid black;"></span></p></div>
                    <div><p class="mb-4">City: <span class="underline"><input type="text" name="agency_city" placeholder="City" value="" style="width: 100px;border-bottom: 1px solid black;"></span></p></div>
                    <div><p class="mb-4">State: <span class="underline"><input type="text" name="agency_state" placeholder="State" value="" style="width: 100px;border-bottom: 1px solid black;"></span></p></div>
                    <div><p class="mb-4">Zip Code: <span class="underline"><input type="text" name="agency_zipcode" placeholder="Zip Code" value="" style="width: 100px;border-bottom: 1px solid black;"></span></p></div>
                    <div class="contact-info">
                        <span class="phone-label">Phone: <span class="underline"><input type="text" name="agency_phone" placeholder="Phone" value="" style="width: 120px;border-bottom: 1px solid black;"></span></span>
                        <span class="fax-label">Fax: <span class="underline"><input type="text" name="agency_fax" placeholder="Fax" value="" style="width: 120px;border-bottom: 1px solid black;"></span></span>
                    </div>
                </div>
            </div>
            <hr>
            <div class="invoice-title">Invoice: <input type="text" name="invoice_no" placeholder="Invoice #" value="" style="width: 150px;border-bottom: 1px solid black;"></div>
                <div style="display: flex;">
                    <div class="insured-company-section" style="width: 55%;">
                        <div class="field-group">
                            <div class="label-column">Insured:</div>
                            <div class="info-column">
                                <div class="info-line">
                                    <input type="text" name="insured_company_name" value="" style="width: 300px;" placeholder="Company Name">
                                </div>
                                <div class="info-line">    
                                    <input type="text" name="insured_company_address" value="" style="width: 300px;" placeholder="Address">
                                </div>
                                <div class="info-line">    
                                    <input type="text" name="insured_company_city" value="" style="width: 300px;" placeholder="City">
                                </div>
                                <div class="info-line">    
                                    <input type="text" name="insured_company_state" value="" style="width: 300px;" placeholder="State">
                                </div>
                                <div class="info-line">    
                                    <input type="text" name="insured_company_zipcode" value="" style="width: 300px;" placeholder="Zip Code">
                                </div>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="label-column">Company:</div>
                            <div class="info-column">
                                <div class="info-line">
                                    <input type="text" name="company_name" value="" placeholder="Enter Company" style="width: 300px;">
                                </div>
                            </div>
                        </div>
                        <div class="field-group">
                            <div class="label-column">Company Fax:</div>
                            <div class="info-column">
                                <div class="info-line">
                                    <input type="text" name="company_fax" value="" placeholder="Company Fax" style="width: 300px;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div style="width: 40%; float: right; justify-items: self-end;">
                        <div class="invoice-date-col flex items-end">
                            <div class="field-line">
                                <label>Invoice Date:</label>
                                <input type="text" name="invoice_date" placeholder="Invoice Date" value="" style="width: 150px; border-bottom: 1px solid black;">
                            </div>
                        </div>
                    
                        <div class="policy-number-col flex items-end" style="font-weight: 600;">
                            <div class="field-line">
                                <label>Policy Number:</label>
                                <input type="text" name="policy_number" placeholder="Policy #" style="width: 100px; border-bottom: 1px solid black;">
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="item-table-container">
                    <table class="item-table">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                        @for($i = 0; $i < 5; $i++)
                            <tr>
                                <td><input type="text" name="item_name[]" class="table-data-input" value="" placeholder="Item"></td>
                                <td><input type="text" name="description[]" class="table-data-input" value="" placeholder="Description"></td>
                                <td><input type="text" name="amount[]" class="table-data-input" value="" style="text-align:right;" placeholder="Amount"></td>
                            </tr>
                        @endfor
                        </tbody>
                        {{-- <tfoot>
                            <tr class="total-amount-row">
                                <td colspan="2" class="total-label">TOTAL AMOUNT:</td>
                                <td><div class="total-value-container"><input type="text" class="total-value-input" value="$0.00" readonly></div></td>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>

                <div class="notes-section">
                    <label>NOTES:</label> 
                    <textarea name="note" placeholder="Add any relevant notes here..." style="width: 623px;"></textarea>
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