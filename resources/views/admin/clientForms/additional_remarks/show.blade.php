<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Additional Remarks</title>

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
            font-size: 8pt;
            margin: 0pt;
        }

        .s2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 13.5pt;
        }

        .s3 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 1pt;
        }

        .s4 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s5 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s6 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s7 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s8 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        .s9 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
            vertical-align: -3pt;
        }

        table, tbody {
            vertical-align: top;
            overflow: visible;
            border-collapse: collapse;
        }

        .header-table {
            width: 100%;
            margin-bottom: 10px;
        }

        .main-title {
            text-align: center;
            font-weight: bold;
            font-size: 13.5pt;
            margin-bottom: 10px;
        }

        .remarks-table {
            width: 100%;
            border: 2px solid black;
            margin-top: 10px;
        }

        .remarks-table td {
            padding: 5px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 8pt;
        }

        .underline {
            text-decoration: underline;
        }

        .align-right {
            text-align: right;
        }

        .align-left {
            text-align: left;
        }

        .page-info {
            font-size: 10px;
            float: right;
        }
    </style>
</head>
<body style="font-family: Arial, sans-serif; margin: 0; padding: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">


<!-- Print View (Hidden Initially) -->
<div class="container">
    <div class="buttons-container no-print">
        <button onclick="printCustom()">🖨️ Print Form</button>
    </div>

    <div id="printView" style="padding: 20px; width: 800px;">

        <!-- Your print HTML content goes here -->

            <table class="header-table">
                <tr>
                    <td style="width: 30%;">
                        <img width="87" height="37"
                             src="data:image/jpg;base64,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"/>
                    </td>
                    <td style="text-align: right; vertical-align: top;">
                        <p><b>AGENCY CUSTOMER ID:</b> <span class="underline">{{$form->agency_customer_id}}</span></p>
                        <p><b>LOC #:</b> <span class="underline">{{$form->loc}}</span></p>
                    </td>
                </tr>
            </table>
            <div class="main-title">
                ADDITIONAL REMARKS SCHEDULE
            </div>

            <table style="width: 100%; border: 2px solid black; margin-bottom: 10px;">
                <tr>
                    <td style="width: 50%; border: 2px solid black; padding: 5px;">
                        <p class="s7">POLICY NUMBER : {{$form->policy_number}}</p>
                    </td>
                    <td style="width: 50%; border: 2px solid black; padding: 5px;" rowspan="3">
                        <p class="s5">NAMED INSURED</p>
                        <p class="s6">{{$form->name_insured}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 2px solid black; padding: 5px;">
                        <p class="s8">AGENCY</p>
                        <p class="s4">{{$form->agency_name}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 2px solid black; padding: 5px;">
                        <p class="s8">CARRIER</p>
                        <p class="s4">{{$form->carrier}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="border: 2px solid black; padding: 5px;">
                        <p class="s5">NAIC COde : {{$form->naic_code}}</p>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 2px solid black; padding: 5px;">
                        <p class="s5">EFFECTIVE DATE: <span class="s9">{{showDatePicker($form->effective_date)}}</span></p>
                    </td>
                </tr>
            </table>
            <p style="font-weight: bold; margin-top: 10px;">ADDITIONAL REMARKS</p>



            <table class="remarks-table">
                <tr>
                    <td>
                        <p>THIS ADDITIONAL REMARKS FORM IS A SCHEDULE TO ACORD FORM,</p>
                        <p style="padding-top: 4pt;padding-left: 9pt;text-indent: 0pt;text-align: left;">
                            FORM  NUMBER:
                            <u>{{$form->form_no}}</u>
                            FORM  TITLE:
                            <u>{{$form->form_title}}</u>
                        </p>
                        <br>
                        <hr style="border-bottom: solid 1px black;">
                        {{$form->description}}
                    </td>
                </tr>
            </table>

            <div class="footer">
                <p><b>ACORD 101 (2008/01)</b></p>
                <p>@2008 ACORD Corporation. All Rights Reserved.</p>
                <p>The ACORD name and logo are registered marks of ACORD</p>
            </div>


        </div>
    </div>
</div>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>--}}
<script>
    function printCustom() {
        var printContents = document.getElementById('printView').innerHTML;
        var printWindow = window.open('', '', 'height=800,width=1000');

        printWindow.document.write('<html><head><title>Print</title>');
        printWindow.document.write('<style>* { margin: 0; padding: 0; text-indent: 0; box-sizing: border-box; } p { font-family: Arial, sans-serif; font-size: 8pt; } table, tbody { vertical-align: top; overflow: visible; } </style>');
        printWindow.document.write('</head><body>');
        printWindow.document.write(printContents);
        printWindow.document.write('</body></html>');

        printWindow.document.close();
        printWindow.focus();
        printWindow.print();
        printWindow.close();
    }
</script>

</body>
</html>
