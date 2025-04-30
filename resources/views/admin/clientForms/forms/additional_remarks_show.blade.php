<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Additional Remarks</title>
    <style>

        #printView {
            display: block;
            position: fixed;
            inset: 0;
            background: white;
            overflow: auto;
            z-index: 9999;
            padding: 20px;
        }
        @media print {
            @page {
                size: A4;
                margin: 10mm;
            }

            body {
                margin: 0;
                padding: 0;
                background-color: white;
            }

            .no-print {
                display: none !important;
            }

            .print-view {
                display: block !important;
                width: 100%;
                box-shadow: none;
                padding: 0;
            }

            .form-container,
            .buttons-container {
                display: none !important;
            }
        }

    </style>
    <style type="text/css"> * {
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
        }
    </style>
</head>
<body
    style="font-family: Arial, sans-serif; margin: 0; padding: 0; height: 100vh; display: flex; justify-content: center; align-items: center;">


<!-- Print View (Hidden Initially) -->
<div class="container">
    <div class="buttons-container no-print">
        <button onclick="window.print()">🖨️ Print Form</button>
    </div>
    <div id="printContent">

        <!-- Your print HTML content goes here -->
        <!-- I've included a simplified version as an example -->
        <div style="font-family: Arial, sans-serif; padding: 20px;">
            <div class="row">
                <div class="col-12 mb-4 buttons-container">
                    <h1 class="text-center mb-4">ADDITIONAL REMARKS SCHEDULE</h1>

                </div>
            </div>
            <center>
                <p style="text-indent: 0pt;text-align: left;">
                <p style="text-indent: 0pt;text-align: left;">
              <span>
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td>
                            <img width="87" height="37"
                                 src="data:image/jpg;base64,/9j/4AAQSkZJRgABAQEAYABgAAD/2wBDAAMCAgMCAgMDAwMEAwMEBQgFBQQEBQoHBwYIDAoMDAsKCwsNDhIQDQ4RDgsLEBYQERMUFRUVDA8XGBYUGBIUFRT/2wBDAQMEBAUEBQkFBQkUDQsNFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBT/wAARCAAlAFcDASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD9UqKK5OT4r+EIvHUXgtvEFkPFMsRnTS/M/fFB3xQB1lFZPiTxXo/g/TJNQ1vUrbTLKPlprlwqivOL79qH4aNYSTR+LreK1wQb5Y3Mae+cUAeh+J/Gei+DrBrzWdSg0+3Xq8rYrxXxF+054g1hGi+Gvw31nxc+Sq312Pslln1EoDkj/gNdjdSfDbRNNtvGetanY3EMqCWDVtRk3EqehTPOKr3H7U3wt0yBZp/FFra2ROFunRliP44oA8V1Cy/bH8aO7xXfgvwVZSfdhj3Xc6D/AHyE/lXH67+zr+2Bdo0tr8bbfzs5EKR+Un0zk19nXvxO8Kad4NfxZc6/ZReG0j8xtSMn7kL6k1x8f7VXwmkt7S4HjnS1trs4t52chJT/ALJxzQB+f3jL41ftk/sh3EeseOorXxp4UikH2i5RTKmz08zA2E/Q1+kPwV+KWn/Gn4X+HvGemKY7TVrYTrG3VDkgj8waw/jr4++H+mfD6403xhr2mWGn+IraW1thfP8AJc7lwQODnhh+dcN8GviZ8JPgV8LvDngyPxpp1vBYxGGF5iyByzlhyRj+LFAH0ZRXwhofxf8AjFq/xeuxpt1c3+nSNKYLVY98DKF42jOMAYIbuSRgYooA93/aC+Oms+H7pfAnw304a98S7+EyRQSAiCxi6efM2DgAkYABzg9MV+d3xv8ACnin9l/9oP4XfFLUtL1AXk13/wATjUZ5mne+dWQyM3Hyg56ZNfr1b6Fp9pqdxqMNnBFf3Cqs1wqAPIBnAJ6nGT+deB/tf/F/QPhIngOfxPptpd6Bf6zHa3tzeQiRbeIkbm5H+cUAfHnxZ1u5+K/7fOi6P8XZJrb4UQJ9o0i3uFZrC7bgoWGMfNyDn0r9FYPEngOOxtPDlvd6a1tcp5EGnxqGR1xjaFAxiri6J4M+JXhqzQ2Wl69ohQNBGY0liCkcYHIFS6D8L/CHha8W70jw3pmm3KjAltbZI2A+oFAH5teDbcePv+Cgmuaf8ZgbPQNB3f8ACOaNeoRZYByhQEbeCPxr6m/bI+NvgvRvgnr/AIR0+3i8Ua/rNlJYafodjF5pd3UqpPGAoJFfQ3ivwR4Y8WRo3iHRtP1SOLlTfQq4X/vocVx41P4U/Cq4M1omiaRduMbdPhUyN7YjBNAH5a/ETwN46+C37F3hX4R6wk6eJvHOvtdJpqFnNlB+6Co3pkluK6y00Q+L/iZ4O/Zt+M1v/wAIz4S0OKJtHbSoT5eou/I3yDBXJAA4PINfpTam1+I2qWep/wDCKRiGDDQ3+qQqJRg8GMc/riuq1XwRoGvX9vf6lo1lfXsAHlzzwq7pg5GCRxg0Afmn8el0r4oft6fDf4cBhaeC/AsUU0wmyIg8Z3OucYOUCfWvZv29/iX4X8e/B+4+G3gzS18beMdVZLezsrO33i2HTzC5ACkdsdx2r661H4X+EdXvJbu98N6Zd3UpzJNNbKzMenJIrR0HwhonhdHXSNKtNNVzlhbRBM/lQB5F+xX8Ite+Cf7PXhjwz4lujc6xBEXljLFlg3HPlqfQfzJor3SigA715x8fPgR4Y/aJ+Hd74R8U25kspyHjmj4kgkH3XU+ozRRQB+VnxO+Hfjj9izxLPoXgf4teIRpkTEJaOCsKgdPkDkV0/wAKf2gPjj8SNSg06f4pXNikh2mWPTo2YfiWFFFAH2N4c/Y71zxNDBeeNPjR4z8R2s4EjWNtdPYRfQ+XJyK9r+HnwB8CfC7bJoPh+1hvR1v5kEly/wDvSkbj+dFFAHoQ60d6KKAEBpc9KKKADvRRRQB//9kA"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <p style="padding-top: 5pt; padding-left: 268pt; text-indent: 0pt; text-align: left;">
                                <b> AGENCY CUSTOMER ID:</b> <u> <b>{{$form->agency_customer_id}}</b> </u>
                            </p>
                            <p style="padding-top: 4pt; padding-left: 339pt; text-indent: 0pt; text-align: left;">
                                <b> LOC #:</b> <u> <b>{{$form->loc}}</b></u>
                            </p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <p style="padding-top: 1pt; text-indent: 0pt; text-align: left;"><br/></p>
                        </td>
                    </tr>
                </table>

                <table>
                    <th>
                        <p class="s2" style="padding-left: 167pt;text-indent: 0pt;text-align: left;"><b>ADDITIONAL
                                REMARKS SCHEDULE </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </p>
                        <p class="s3"
                           style="padding-left: 69pt;text-indent: 0pt;line-height: 1pt;text-align: left;"></p>
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                        <table style="border-collapse:collapse;margin-left:6.20175pt" cellspacing="0">
                            <tr style="height:24pt">
                                <td style="width:289pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                                    colspan="2">
                                    <p style="text-indent: 0pt;text-align: left;"><br/></p>
                                    <p style="padding-left: 3pt;text-indent: 0pt;line-height: 4pt;text-align: left;"><span>
                                    <table border="0" cellspacing="0" cellpadding="0">
                                        <tr>
                                            <td>
                                                <p class="s5"
                                                   style="padding-left: 1pt;text-indent: 0pt;text-align: left;">AgGENCY
                                                     </p>
                                               </td>
                                        </tr>
                                    </table>
                                    </span></p>
                                    <p class="s4"
                                                  style="padding-top: 6pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">
                                        <b>{{$form->agency_name}}</b></p></td>
                                <td style="width:288pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                                    rowspan="3">
                                    <p class="s5"
                                                   style="padding-left: 1pt;text-indent: 0pt;text-align: left; margin-top: 4pt;">NAMED
                                        INSURED</p>
                                    <p class="s6"
                                       style="padding-top: 5pt;padding-left: 4pt;text-indent: 0pt;text-align: left;"> <b>{{$form->name_insured}}</b></p>
                                    </td>
                            </tr>
                            <tr style="height:24pt">
                                <td style="width:289pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                                    colspan="2"><p class="s7"
                                                   style="padding-left: 3pt;text-indent: 0pt;text-align: left; margin-top: 4pt;">POLICY
                                        NUMBER  </p> <b>{{$form->policy_number}}</b></td>
                            </tr>
                            <tr style="height:12pt">
                                <td style="width:239pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                                    rowspan="2"><p class="s8"
                                                   style="padding-left: 3pt; margin-top: 4pt; text-indent: 0pt;line-height: 7pt;text-align: left;">
                                        CARRIER</p>
                                    <p class="s4"
                                       style="padding-top: 5pt;padding-left: 5pt;text-indent: 0pt;text-align: left;"> <b>{{$form->carrier}}</b></p></td>
                                <td style="width:50pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                                    rowspan="2"><p class="s5"
                                                   style="padding-left: 1pt;text-indent: 0pt;text-align: left;">NAIC
                                        CODE</p>  <b>{{$form->naic_code}}</b></td>
                            </tr>
                            <tr style="height:12pt; ">
                                <td style="width:288pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt ; padding: 4pt;">
                                    <p class="s5"
                                       style="padding-top: 1pt;padding-left: 1pt;text-indent: 0pt;margin-top: 4pt; line-height: 68%;text-align: left;">
                                        EFFECTIVE DATE: <span class="s9">
                                            <b>{{ showDatePicker($form->effective_date)}}</b></span></p></td>
                            </tr>
                        </table>
                        <p style="text-indent: 0pt;text-align: left;"/>
                        <p style="padding-left: 10pt;text-indent: 0pt;text-align: left;">ADDITIONAL REMARKS</p>
                        <tr>
                            <table
                                style="border: 2px solid black; border-collapse: collapse; width: 98%; margin-left: 0.5%; height: 50%;">
                                <td colspan="100%">
                                    <p style="padding-top: 5pt;padding-left: 10pt;text-indent: 0pt;text-align: left;">
                                        THIS ADDITIONAL REMARKS FORM IS A SCHEDULE TO ACORD FORM,
                                    </p>
                                    <p style="padding-top: 4pt;padding-left: 9pt;margin-bottom: 4pt;  text-indent: 0pt;text-align: left;">
                                        FORM NUMBER:
                                        <u>&nbsp;&nbsp;    <b>{{$form->form_no}}</b>&nbsp;&nbsp;    </u>
                                        FORM TITLE:
                                        <u>&nbsp;&nbsp; <b>{{$form->form_title}}</b>&nbsp;v</u>
                                    </p>
                                    <hr>

                                    <p style="padding: 10pt">
                                        <br><br>
                                        <b>{{$form->description}}</b>
                                        <br><br>
                                        <br><br>
                                        <br><br>
                                    </p>

                            </table>
                            <center>
                                <p style="padding-top: 4pt;padding-left: 10pt;text-indent: 0pt;text-align: left;"><b>
                                        ACORD 101 (2008/01)</b> <span> <b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @2008 ACORD Corporation.All RRights Reserved.</b> </span>
                                </p>
                                <p><b> The ACORD name and logo are registered marks of ACORD&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b>
                                </p>
                            </center>
                            <p style="text-indent: 0pt;text-align: left;"><br/></p>

                            </td>
                        </tr>

                    </th>

                </table>

                <table>
                    <tr>
                        <td>
                            <!-- Your table content here -->
                        </td>
                        <td>
                            <!-- Your table content here -->
                        </td>
                        <td>
                            <!-- Your table content here -->
                        </td>
                    </tr>
                    <br><br><br><br><br>
                    <tr>
                        <td>
                            <!-- Your table content here -->
                        </td>
                        <td>
                            <!-- Your table content here -->
                        </td>
                        <td>
                            <!-- Your table content here -->
                        </td>
                    </tr>
                </table>

                <!-- Add empty space here -->

            </center>


        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    window.addEventListener('load', function () {
        window.print();
    });
</script>

</body>
</html>
