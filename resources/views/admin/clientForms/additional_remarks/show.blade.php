<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Additional Remarks</title>

    <style type="text/css">
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
            background: #fff;
            color: #222;
            line-height: 1.4;
        }

        body {
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            background: #fff;
            position: relative;
        }

        .print-view {
            background: #fff;
            width: 100%;
            position: relative;
        }

        /* Header Section */
        .header-flex {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
            gap: 20px;
        }

        .acord-logo {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }

        .customer-info {
            text-align: right;
            font-size: 11pt;
            flex-shrink: 0;
        }

        .customer-info p {
            margin-bottom: 3px;
        }

        .main-title {
            text-align: center;
            font-weight: bold;
            font-size: 18pt;
            margin: 15px 0 25px 0;
            text-transform: uppercase;
        }

        /* Main Form Table */
        .main-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #222;
            table-layout: fixed;
            margin-bottom: 15px;
        }

        .main-table td {
            border: 1px solid #222;
            padding: 8px 6px;
            vertical-align: top;
            font-size: 11pt;
            word-break: break-word;
        }

        .label {
            font-weight: bold;
            font-size: 10pt;
            margin-bottom: 3px;
            text-transform: uppercase;
        }

        .value {
            font-size: 11pt;
            line-height: 1.3;
        }

        /* Remarks Section */
        .remarks-section {
            border: 2px solid #222;
            margin-top: 15px;
            padding: 10px;
        }

        .remarks-content {
            min-height: 250px;
            font-size: 11pt;
            margin-top: 10px;
            line-height: 1.4;
            white-space: pre-wrap;
        }

        .remarks-header {
            margin-bottom: 10px;
        }

        .remarks-header .value {
            font-weight: bold;
            margin-bottom: 5px;
        }

        /* Footer */
        .footer {
            margin-top: 15px;
            padding-top: 10px;
        }

        .footer-table {
            width: 100%;
            font-size: 8pt;
            font-weight: bold;
        }

        .footer-table td {
            border: none;
            padding: 2px 0;
        }

        .underline {
            text-decoration: underline;
            padding: 0 3px;
        }

        /* Button styles */
        .buttons-container {
            margin-bottom: 20px;
            text-align: right;
        }

        .btn {
            display: inline-block;
            font-weight: 500;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 8px 16px;
            font-size: 14px;
            line-height: 1.5;
            border-radius: 4px;
            transition: all 0.2s ease;
            text-decoration: none;
        }

        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
            transform: translateY(-1px);
        }

        .btn-secondary:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(108, 117, 125, 0.25);
        }

        /* Responsive design for screen */
        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            .container {
                max-width: 100%;
            }

            .header-flex {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 10px;
            }

            .customer-info {
                text-align: center;
            }

            .main-title {
                font-size: 16pt;
            }

            .main-table td {
                padding: 6px 4px;
                font-size: 10pt;
            }

            .label {
                font-size: 9pt;
            }

            .value {
                font-size: 10pt;
            }

            .acord-logo {
                width: 100px;
                height: 100px;
            }
        }

        @media (max-width: 480px) {
            .main-title {
                font-size: 14pt;
            }

            .main-table td {
                padding: 4px 2px;
                font-size: 9pt;
            }

            .label {
                font-size: 8pt;
            }

            .value {
                font-size: 9pt;
            }
        }

        /* Print styles */
        @media print {
            @page {
                size: A4;
                margin: 15mm;
            }

            * {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            html, body {
                width: 100% !important;
                height: auto !important;
                margin: 0 !important;
                padding: 0 !important;
                background: #fff !important;
                color: #000 !important;
                font-size: 10pt !important;
                line-height: 1.3 !important;
                overflow: visible !important;
            }

            body {
                transform: none !important;
                min-height: auto !important;
            }

            .container {
                max-width: none !important;
                width: 100% !important;
                margin: 0 !important;
                padding: 20px !important;
            }

            .print-view {
                width: 100% !important;
                height: auto !important;
                min-height: auto !important;
                overflow: visible !important;
            }

            .no-print,
            .buttons-container,
            .btn {
                display: none !important;
            }

            .header-flex {
                margin-bottom: 15px !important;
                gap: 20px !important;
                display: flex !important;
                justify-content: space-between !important;
                align-items: flex-start !important;
            }

            .acord-logo {
                width: 100px !important;
                height: 100px !important;
            }

            .main-title {
                font-size: 14pt !important;
                margin: 15px 0 20px 0 !important;
                text-align: center !important;
                font-weight: bold !important;
                text-transform: uppercase !important;
            }

            .main-table {
                width: 100% !important;
                border: 1px solid #000 !important;
                margin-bottom: 20px !important;
                border-collapse: collapse !important;
                table-layout: fixed !important;
            }

            .main-table td {
                border: 1px solid #000 !important;
                padding: 8px 6px !important;
                font-size: 9pt !important;
                line-height: 1.3 !important;
                vertical-align: top !important;
                word-break: break-word !important;
            }

            .label {
                font-size: 8pt !important;
                margin-bottom: 4px !important;
                font-weight: bold !important;
                text-transform: uppercase !important;
            }

            .value {
                font-size: 9pt !important;
                line-height: 1.3 !important;
            }

            .remarks-section {
                border: 1px solid #000 !important;
                margin-top: 15px !important;
                padding: 12px !important;
            }

            .remarks-content {
                min-height: 220px !important;
                font-size: 9pt !important;
                margin-top: 10px !important;
                line-height: 1.4 !important;
                white-space: pre-wrap !important;
            }

            .remarks-header {
                margin-bottom: 12px !important;
            }

            .remarks-header .value {
                font-size: 9pt !important;
                margin-bottom: 6px !important;
                font-weight: bold !important;
            }

            .footer {
                margin-top: 20px !important;
                padding-top: 10px !important;
            }

            .footer-table {
                font-size: 7pt !important;
                width: 100% !important;
            }

            .footer-table td {
                padding: 3px 0 !important;
                border: none !important;
            }

            .customer-info {
                font-size: 9pt !important;
                text-align: right !important;
            }

            .customer-info p {
                margin-bottom: 4px !important;
            }

            /* Additional spacing for better print layout */
            .label[style*="margin-top"] {
                margin-top: 15px !important;
                margin-bottom: 10px !important;
            }

            /* Ensure proper spacing in table cells */
            .main-table td > div {
                margin-bottom: 4px !important;
            }

            .main-table td > div:last-child {
                margin-bottom: 0 !important;
            }

            /* Better spacing for flex containers in print */
            .main-table td div[style*="display: flex"] {
                gap: 8px !important;
            }

            .main-table td div[style*="flex-direction: column"] {
                gap: 6px !important;
            }

            /* Ensure page breaks don't occur in the middle of important elements */
            .main-table,
            .remarks-section,
            .header-flex {
                page-break-inside: avoid !important;
            }

            /* Force page break if needed */
            .page-break {
                page-break-before: always !important;
            }

            /* Optimize for print layout */
            tr, td, th {
                page-break-inside: avoid !important;
            }

            /* Ensure text is readable in print */
            .underline {
                text-decoration: underline !important;
            }

            /* Better spacing for border separators */
            .main-table td div[style*="border-top"] {
                padding-top: 10px !important;
                margin-top: 40px !important;
            }

            .main-table td div[style*="border-left"] {
                padding-left: 15px !important;
            }
        }

        /* High DPI print support */
        /* @media print and (-webkit-min-device-pixel-ratio: 2) {
            .acord-logo {
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges;
            }
        } */

        /* Landscape print support */
        @media print and (orientation: landscape) {
            @page {
                size: A4 landscape;
                margin: 10mm;
            }

            .main-table td {
                padding: 3px 2px !important;
                font-size: 8pt !important;
            }

            .label {
                font-size: 7pt !important;
            }

            .value {
                font-size: 8pt !important;
            }

            .remarks-content {
                min-height: 150px !important;
                font-size: 8pt !important;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="buttons-container no-print">
            <button id="printFormBtn" onclick="window.print()" class="btn btn-secondary">
                <i class="fas fa-print"></i> Print Form
            </button>
        </div>

        <div class="print-view">
            <!-- Header Section -->
            <div class="header-flex">
                <img class="acord-logo" 
                     src="{{ asset('backend/img/acord-logo.png') }}" 
                     alt="ACORD Logo" />

                <div class="customer-info">
                    <p><strong>AGENCY CUSTOMER ID:</strong> <span class="underline">{{$form->agency_customer_id}}</span></p>
                    <p><strong>LOC #:</strong> <span class="underline">{{$form->loc}}</span></p>
                </div>
            </div>

            <div class="main-title">Additional Remarks Schedule</div>

            <!-- Main Form Table -->
            <table class="main-table">
                <tr>
                    <td style="width: 50%;">
                        <div class="label">Agency</div>
                        <div class="value">{{$form->agency_name}}</div>
                    </td>
                    <td style="width: 50%;" rowspan="3">
                        <div style="display: flex; flex-direction: column; justify-content: space-between; height: 100%;">
                            <div style="display: flex; flex-direction: column; gap: 8px;">
                                <div class="label">Named Insured</div>
                                <div class="value">{{$form->name_insured}}</div>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 8px; border-top: 2px solid black; padding-top: 8px; margin-top: 40px;">
                                <div class="label">Effective Date</div>
                                <div class="value">{{showDatePicker($form->effective_date)}}</div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="label">Policy Number</div>
                        <div class="value">{{$form->policy_number}}</div>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div style="display: flex; flex-direction: row; justify-content: space-between; gap: 15px;">
                            <div style="display: flex; flex-direction: column; gap: 8px; flex: 1;">
                                <div class="label">Carrier</div>
                                <div class="value">{{$form->carrier}}</div>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 8px; border-left: 2px solid black; padding-left: 12px; flex: 1;">
                                <div class="label">NAIC Code</div>
                                <div class="value">{{$form->naic_code}}</div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>

            <div class="label" style="margin-top: 15px; margin-bottom: 8px; font-size: 11pt; font-weight: bold;">
                Additional Remarks
            </div>

            <!-- Remarks Section -->
            <div class="remarks-section">
                <div class="remarks-header">
                    <div class="value">
                        This Additional Remarks Form is a Schedule to ACORD Form,
                    </div>
                    <div class="value">
                        Form Number: <span class="underline">{{$form->form_no}}</span>
                        Form Title: <span class="underline">{{$form->form_title}}</span>
                    </div>
                </div>
                <div class="remarks-content">
                    {{$form->description}}
                </div>
            </div>

            <!-- Footer -->
            <div class="footer">
                <table class="footer-table">
                    <tr>
                        <td style="width: 20%; text-align: left;">ACORD 101 (2008/01)</td>
                        <td style="width: 80%; text-align: right;">© 2008 ACORD CORPORATION. All rights reserved.</td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            The ACORD name and logo are registered marks of ACORD
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Print functionality
        function printCustom() {
            window.print();
        }

        // Add print button event listener
        document.addEventListener('DOMContentLoaded', function() {
            const printBtn = document.getElementById('printFormBtn');
            if (printBtn) {
                printBtn.addEventListener('click', printCustom);
            }
        });

        // Handle print media query changes
        window.addEventListener('beforeprint', function() {
            document.body.classList.add('printing');
        });

        window.addEventListener('afterprint', function() {
            document.body.classList.remove('printing');
        });
    </script>
</body>
</html>
