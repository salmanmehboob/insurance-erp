<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
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
        }
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #222;
            min-height: 100vh;
        }
        .container {
            width: 100%;
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
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
            margin-bottom: 10px;
        }
        .acord-logo {
            width: 87px;
            height: 37px;
        }
        .customer-info {
            text-align: right;
            font-size: 10pt;
        }
        .main-title {
            text-align: center;
            font-weight: bold;
            font-size: 16pt;
            margin: 10px 0 20px 0;
        }
        /* Main Form Table */
        .main-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #222;
            table-layout: fixed;
        }
        .main-table td {
            border: 1px solid #222;
            padding: 6px 4px;
            vertical-align: top;
            font-size: 10pt;
            word-break: break-word;
        }
        .label {
            font-weight: bold;
            font-size: 9pt;
        }
        .value {
            font-size: 10pt;
        }
        /* Remarks Section */
        .remarks-section {
            border: 1px solid #222;
            margin-top: 10px;
            padding: 6px 4px;
        }
        .remarks-content {
            min-height: 200px;
            font-size: 10pt;
            margin-top: 10px;
        }
        .footer {
            text-align: center;
            margin-top: 10px;
            font-size: 8pt;
        }
        .underline {
            text-decoration: underline;
            padding: 0 5px;
        }
        /* Button styles */
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s, background-color 0.15s, border-color 0.15s, box-shadow 0.15s;
        }
        .btn-secondary {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }
        .btn-secondary:focus {
            box-shadow: 0 0 0 0.2rem rgba(108,117,125,0.5);
        }
        /* Responsive for screen */
        @media (max-width: 950px) {
            .container {
                max-width: 100%;
                padding: 10px;
            }
            .main-title {
                font-size: 13pt;
            }
        }
        /* Print styles */
        @media print {
            @page { size: 210mm 297mm; margin: 10mm; }
            html, body { width: 210mm; height: 297mm; background: #fff !important; overflow: hidden !important; }
            body, .container, .print-view {
                margin: 0 !important; padding: 0 !important;
                max-width: 190mm !important; width: 100% !important;
                height: 277mm !important; overflow: hidden !important;
            }
            .container, .print-view {
                box-sizing: border-box !important; min-height: 0 !important;
                max-height: 277mm !important; height: 277mm !important;
            }
            .main-title, .label, .value, .footer, .remarks-content, td, th {
                font-size: 9pt !important; line-height: 1.1 !important;
            }
            .main-table, table {
                width: 100% !important; table-layout: fixed !important; border: 1px solid #222 !important;
            }
            .main-table td, table td, .main-table th, table th {
                border: 1px solid #222 !important; padding: 2px 2px !important; font-size: 9pt !important; word-break: break-word !important;
            }
            .remarks-section, .section {
                border: 1px solid #222 !important; padding: 2px 2px !important; margin: 2px 0 !important;
            }
            .acord-logo { width: 50px !important; height: auto !important; }
            .no-print, .buttons-container { display: none !important; }
            tr, td, th, .remarks-section, .main-table, .header-flex, .section { page-break-inside: avoid !important; }
            body { transform: scale(0.97); transform-origin: top left; }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="buttons-container no-print">
        <div style="margin-top: 10px; display: flex; justify-content: flex-end; margin-bottom: 10px;">
            <button id="printFormBtn" onclick="window.print()" class="btn btn-secondary">Print Form</button>
        </div>
    </div>

    <div class="print-view">
        <!-- Header Section -->
        <div class="header-flex">
            <img class="acord-logo" src="data:image/jpg;base64,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"/>
            <div class="customer-info">
                <p><b>AGENCY CUSTOMER ID:</b> <span class="underline">{{$form->agency_customer_id}}</span></p>
                <p><b>LOC #:</b> <span class="underline">{{$form->loc}}</span></p>
            </div>
        </div>

        <div class="main-title">ADDITIONAL REMARKS SCHEDULE</div>

        <!-- Main Form Table -->
        <table class="main-table">
            <tr>
                <td style="width: 50%;">
                    <div class="label">AGENCY</div>
                    <div class="value">{{$form->agency_name}}</div>
                </td>
                <td style="width: 50%;" rowspan="3">
                    <div style='display: flex; flex-direction: column; justify-content: space-between;'>
                        <div style="display: flex; flex-direction: column; gap: 5px;">
                            <div class="label">NAMED INSURED</div>
                            <div class="value">{{$form->name_insured}}</div>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 5px; border-top: 2px solid black; padding-top: 5px; margin-top: 35px;">
                            <div class="label">EFFECTIVE DATE</div>
                            <div class="value">{{showDatePicker($form->effective_date)}}</div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="label">POLICY NUMBER</div>
                    <div class="value">{{$form->policy_number}}</div>
                </td>
            </tr>
            <tr>
                <td>
                    <div style='display: flex; flex-direction: row; justify-content: space-between;'>
                        <div style="display: flex; flex-direction: column; gap: 5px;">
                            <div class="label">CARRIER</div>
                            <div class="value">{{$form->carrier}}</div>
                        </div>
                        <div style="display: flex; flex-direction: column; gap: 5px; border-left: 2px solid black; padding-left: 10px;">
                            <div class="label">NAIC CODE</div>
                            <div class="value">{{$form->naic_code}}</div>
                        </div>
                    </div>

                   
                </td>
               
              
            </tr>
           
        </table>

        <div class="label" style="margin-top: 10px; margin-bottom: 5px; font-size: 10pt; font-weight: bold;">ADDITIONAL REMARKS</div>

        <!-- Remarks Section -->
        <div class="remarks-section">
          
            <div class="value" style="margin-top: 5px; font-size: 10pt; font-weight: bold">
                THIS ADDITIONAL REMARKS FORM IS A SCHEDULE TO ACORD FORM,
            </div>
            <div class="value" style="margin-top: 5px; font-size: 10pt; font-weight: bold">
                FORM NUMBER: <span class="underline">{{$form->form_no}}</span>
                FORM TITLE: <span class="underline">{{$form->form_title}}</span>
            </div>
            <div class="remarks-content" style="border-top: 2px solid black; padding-top: 2px; font-size: 10pt; font-weight: normal">
                {{$form->description}}
            </div>
        </div>

        <!-- Footer -->
        <div style="margin-top: 10px;  padding-top: 2px;">
            <table style="width: 100%; font-size: 6pt; font-weight: bolder; font-size: 8pt;">
                <tr>
                    <td style="width: 15%; text-align: left; border: none; padding: 0;">ACORD 101 (2008/01)</td>
                    <td style="width: 70%; text-align: right; border: none; padding: 0;">© 2008 ACORD CORPORATION. All rights reserved.</td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align: center; border: none; padding: 0;">
                        The ACORD name and logo are registered marks of ACORD
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<script>
    function printCustom() {
        window.print();
    }
</script>
</body>
</html>
