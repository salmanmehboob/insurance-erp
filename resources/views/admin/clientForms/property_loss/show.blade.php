<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROPERTY LOSS NOTICE</title>
    <style>
        /* Reset and base styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
            font-size: 10pt;
        }

        body {
            margin-top: 2%;
        }

        /* Form container */
        .form-container {
            width: 8.5in;
            margin: 0 auto;
            border: 1px solid #000;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Header */
        .header {
            display: flex;
            border-bottom: 1px solid #000;
        }

        .logo-section {
            width: 15%;
            padding: 5px;
        }

        .logo {
            max-width: 100%;
            height: auto;
        }

        .title-section {
            width: 60%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            border-right: 1px solid #000;
        }

        .title {
            font-size: 16pt;
            font-weight: bold;
        }

        .date-section {
            width: 25%;
            border-bottom: 1px solid #000;
        }

        .date-label {
            padding: 5px;
            font-weight: bold;
            text-align: center;

        }

        .date-value {
            padding: 5px;
            text-align: center;
            font-weight: bold;
        }

        /* Form grid */
        .grid-container {
            display: flex;
            flex-direction: column;
        }

        .grid-row {
            display: flex;
            border-bottom: 1px solid #000;
        }

        .grid-col {
            border-right: 1px solid #000;
            padding: 5px;
        }

        .grid-col:last-child {
            border-right: none;
        }

        /* Grid column widths */
        .col-60 {
            width: 60%;
        }

        .col-40 {
            width: 100%;
        }

        .col-33 {
            width: 33.33%;
        }

        .col-30 {
            width: 30%;
        }

        .col-25 {
            width: 25%;
        }

        .col-20 {
            width: 20%;
        }

        .col-15 {
            width: 15%;
        }

        .col-10 {
            width: 10%;
        }

        /* Labels */
        .label {
            font-weight: bold;
            display: block;
            margin-bottom: 3px;
            font-size: 8pt;
        }

        .section-header {
            font-weight: bold;
            padding: 2px 5px;
            text-align: center;
            border-bottom: 1px solid #000;
        }

        /* Checkboxes */
        .checkbox-container {
            display: flex;
            align-items: center;
        }

        .checkbox {
            width: 10px;
            height: 10px;
            border: 1px solid #000;
            display: inline-block;
            margin-right: 5px;
        }

        /* Value fields */
        .value {
            min-height: 15px;
        }

        .text-center {
            text-align: center;
        }

        .indent {
            padding-left: 15px;
        }

        /* Specific section styles */
        .tall-section {
            min-height: 120px;
        }

        /* Print styles */
        @media print {
            body {
                padding: 0;
                background-color: white;
            }

            .form-container {
                width: 100%;
                box-shadow: none;
            }
        }

        .ins-form-body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .ins-form-table {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-bottom: 20px;
        }

        .ins-form-table td,
        .ins-form-table th {
            border: 1px solid black;
            padding: 3px 5px;
            vertical-align: top;
            font-size: 12px;
        }

        .ins-form-header {
            font-weight: bold;

        }

        .ins-form-section-header {
            font-weight: bold;

        }

        .ins-form-checkbox-container {
            display: inline-block;
            margin-right: 5px;
        }

        .ins-form-checkbox {
            display: inline-block;
            width: 12px;
            height: 12px;
            border: 1px solid black;
            margin-right: 3px;
            vertical-align: middle;
        }

        .ins-form-small-text {
            font-size: 10px;
        }

        .ins-form-label {
            font-size: 10px;
            text-transform: uppercase;
        }

        .ins-form-footer {
            font-size: 10px;
            text-align: center;
            margin-top: 5px;
        }

        .ins-form-description-box {
            height: 200px;
        }

        .ins-form-checkbox-block {
            display: flex;
            flex-wrap: wrap;
        }

        .ins-form-checkbox-item {
            width: 25%;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="print-button">
        <button class="btn btn-primary" onclick="printOriginal()">Print</button>
    </div>

    <div class="form-container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="https://i.ibb.co/bYYGFHD/Untitled-design-11.png" width="50px" height="auto" alt="ACORD"
                     class="logo">
            </div>
            <div class="title-section">
                <span class="title">PROPERTY LOSS NOTICE</span>
            </div>
            <div class="date-section">
                <div class="date-label">DATE (MM/DD/YYYY)</div>
                <div class="date-value">{{$form->invoice_date}}</div>
            </div>
        </div>

        <!-- Agency Info -->
        <div class="grid-row">
            <div class="grid-col col-60">
                <div class="label">AGENCY</div>
                <div class="value">
                    {{$form->agency_name}}<br>
                    {{$form->agency_address}}<br><br>
                    {{$form->agency_city}}, {{$form->agency_state}} {{$form->agency_zipcode}}
                </div>
                <div>

                    <h3 style="border: solid 1px black;margin-left: -5px;width: 103.5%; font-weight: 100;"><b> Contact
                            Name:</b> {{$form->agency_contact_name}}</h3>

                    <h3 style="border: solid 1px black;margin-left: -5px;width: 103.5%; font-weight: 100;"><b> Phone
                            (A/C,No,Ext) :</b> {{$form->agency_phone}}</h3>

                    <h3 style="border: solid 1px black;margin-left: -5px;width: 103.5%; font-weight: 100;"> FAX
                        (A/C,No,Ext) :</b> {{$form->agency_fax}}</h3>

                    <h3 style="border: solid 1px black;margin-left: -5px;width: 103.5%; font-weight: 100;"><b> Email
                            Address: </b> {{$form->agency_email}}</h3>

                    <h3 style="border: solid 1px black;margin-left: -5px;width: 103.5%; font-weight: 100;"><b>
                            Code:</b> {{$form->agency_code}}
                        <b> Sub Code:</b> {{$form->agency_subcode}} </h3>

                    <h3 style="border: solid 1px black;margin-left: -5px;width: 103.5%; font-weight: 100;"> Agency
                        Customer Id:{{$form->agency_customer_id}} </h3>
                </div>
            </div>

            <div class="grid-col col-40">
                <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                    <div class="grid-col col-60" style="border-right: 1px solid #000;">
                        <div class="label">INSURED LOCATION CODE</div>
                        <div class="value">{{$form->location_code}}</div>
                    </div>
                    <div class="grid-col col-40">
                        <div class="label">DATE OF LOSS AND TIME : {{$form->date_of_loss}}</div>
                        <div class="value">
                            <div style="display: flex; justify-content: flex-end; padding-top: 5px;">
                                <div class="checkbox-container" style="margin-right: 10px;">
                                    <input type="checkbox"  {{($form->time_of_loss == 'am') ? 'checked' : ''}}>
                                    <span>AM</span>
                                </div>
                                <div class="checkbox-container">
                                    <input type="checkbox"  {{($form->time_of_loss == 'pm') ? 'checked' : ''}}>
                                    <span>PM</span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section-header">PROPERTY / HOME POLICY</div>
                <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                    <div class="grid-col col-75" style="border-right: 1px solid #000;">
                        <div class="label">CARRIER</div>
                        <div class="value">{{$form->property_carrier}}</div>
                    </div>
                    <div class="grid-col col-25">
                        <div class="label">NAIC CODE</div>
                        <div class="value">{{$form->property_naic_code}}</div>
                    </div>
                </div>
                <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                    <div class="grid-col col-60" style="border-right: 1px solid #000;">
                        <div class="label">POLICY NUMBER</div>
                        <div class="value">{{$form->property_policy_number}}</div>
                    </div>
                    <div class="grid-col col-40">
                        <div class="label">LINE OF BUSINESS</div>
                        <div class="value">{{$form->property_business}}</div>
                    </div>
                </div>
                <div class="section-header">FLOOD POLICY</div>
                <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                    <div class="grid-col col-75" style="border-right: 1px solid #000;">
                        <div class="label">CARRIER</div>
                        <div class="value">{{$form->flood_carrier}}</div>
                    </div>
                    <div class="grid-col col-25">
                        <div class="label">NAIC CODE</div>
                        <div class="value">{{$form->flood_naic_code}}</div>
                    </div>
                </div>
                <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                    <div class="grid-col col-100">
                        <div class="label">POLICY NUMBER</div>
                        <div class="value">{{$form->flood_policy_number}}</div>
                    </div>
                </div>
                <div class="section-header">WIND POLICY</div>
                <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                    <div class="grid-col col-75" style="border-right: 1px solid #000;">
                        <div class="label">CARRIER</div>
                        <div class="value">{{$form->wind_carrier}}</div>
                    </div>
                    <div class="grid-col col-25">
                        <div class="label">NAIC CODE</div>
                        <div class="value">{{$form->wind_naic_code}}</div>
                    </div>
                </div>
                <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                    <div class="grid-col col-100">
                        <div class="label">POLICY NUMBER</div>
                        <div class="value">{{$form->wind_policy_number}}</div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIRST TABLE: INSURED INFO -->
        <table class="ins-form-table">
            <tr>
                <td colspan="3" class="ins-form-header">INSURED</td>
            </tr>

            <tr>
                <td colspan="2">
                    <div class="ins-form-label">NAME OF INSURED (First, Middle, Last)</div>
                    {{$form->insured_name}}
                </td>
                <td>
                    <div class="ins-form-label">INSURED'S MAILING ADDRESS</div>
                    {{$form->insured_address}}<br><br>
                    {{$form->insured_city}}   {{$form->insured_state}}   {{$form->insured_zipcode}}
                </td>
            </tr>

            <tr>
                <td>
                    <div class="ins-form-label">DATE OF BIRTH</div>
                    {{$form->insured_dob}}
                </td>
                <td>
                    <div class="ins-form-label">FEIN (if applicable)</div>
                    {{$form->insured_fein}}
                </td>
                <td>
                    <div class="ins-form-label">MARITAL STATUS / CIVIL UNION (if applicable)</div>
                    {{$form->insured_marital_status}}
                </td>
            </tr>

            <tr>
                <td>
                    <div class="ins-form-label">PRIMARY PHONE #</div>
                    {{$form->insured_phone_primary}}
                    <div>
                      <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->insured_phone_primary_type == 'home' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">HOME</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->insured_phone_primary_type == 'bus' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">BUS</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->insured_phone_primary_type == 'cell' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">CELL</span>
                      </span>
                    </div>
                </td>
                <td>
                    <div class="ins-form-label">SECONDARY PHONE #</div>
                    {{$form->insured_phone_secondary}}
                    <div>
                      <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->insured_phone_secondary_type == 'home' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">HOME</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->insured_phone_secondary_type == 'bus' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">BUS</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->insured_phone_secondary_type == 'cell' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">CELL</span>
                      </span>
                    </div>
                </td>
                <td>
                    <div class="ins-form-label">PRIMARY E-MAIL ADDRESS:</div>
                    {{$form->insured_email_primary}}
                    <hr>
                    <div class="ins-form-label">SECONDARY E-MAIL ADDRESS:</div>
                    {{$form->insured_email_secondary}}
                </td>
            </tr>

            <!-- SPOUSE SECTION -->
            <tr>
                <td colspan="2">
                    <div class="ins-form-label">NAME OF SPOUSE :</div> {{$form->spouse_name}}
                </td>
                <td>
                    <div class="ins-form-label">SPOUSE'S MAILING ADDRESS

                    </div>
                    {{$form->spouse_address}} <br>
                    {{$form->spouse_city}} {{$form->spouse_state}} {{$form->spouse_zipcode}}
                </td>
            </tr>

            <tr>
                <td>
                    <div class="ins-form-label">DATE OF BIRTH :</div>
                    {{$form->spouse_dob}}
                </td>
                <td>
                    <div class="ins-form-label">FEIN (if applicable) :</div> {{$form->spouse_fein}}
                </td>
                <td>
                    <div class="ins-form-label">MARITAL STATUS / CIVIL UNION :</div> {{$form->spouse_marital_status}}
                </td>
            </tr>

            <tr>
                <td>
                    <div class="ins-form-label">PRIMARY PHONE #</div>
                    {{$form->spouse_phone_primary}}
                    <div>
                      <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->spouse_phone_primary_type == 'home' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">HOME</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->spouse_phone_primary_type == 'bus' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">BUS</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->spouse_phone_primary_type == 'cell' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">CELL</span>
                      </span>
                    </div>
                </td>
                <td>
                    <div class="ins-form-label">SECONDARY PHONE #</div>
                    {{$form->spouse_phone_secondary}}
                    <div>
                      <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->spouse_phone_secondary_type == 'home' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">HOME</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->spouse_phone_secondary_type == 'bus' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">BUS</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->spouse_phone_secondary_type == 'cell' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">CELL</span>
                      </span>
                    </div>
                </td>
                <td>
                    <div class="ins-form-label">PRIMARY E-MAIL ADDRESS:</div>
                    {{$form->spouse_email_primary}}
                    <hr>
                    <div class="ins-form-label">SECONDARY E-MAIL ADDRESS:</div>
                    {{$form->spouse_email_secondary}}
                </td>
            </tr>

            <!-- CONTACT SECTION -->
            <tr>
                <td colspan="3" class="ins-form-header">CONTACT</td>

            </tr>
            <tr>
                <td colspan="2">
                    <div class="ins-form-label">NAME OF CONTACT</div>
                    {{$form->contact_name}}
                </td>
                <td>
                    <div class="ins-form-label">CONTACT'S MAILING ADDRESS</div>
                    {{$form->contact_address}} <br>
                    {{$form->contact_city}} {{$form->contact_state}} {{$form->contact_zipcode}}
                </td>
            </tr>
            <tr>
                <td>
                    <div class="ins-form-label">PRIMARY PHONE #</div>
                    {{$form->contact_phone_primary}}
                    <div>
                      <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->contact_phone_primary_type == 'home' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">HOME</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->contact_phone_primary_type == 'bus' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">BUS</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->contact_phone_primary_type == 'cell' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">CELL</span>
                      </span>
                    </div>
                </td>
                <td>
                    <div class="ins-form-label">SECONDARY PHONE #</div>
                    {{$form->contact_phone_secondary}}
                    <div>
                      <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->contact_phone_secondary_type == 'home' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">HOME</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->contact_phone_secondary_type == 'bus' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">BUS</span>
                      </span>
                        <span class="ins-form-checkbox-container">
                          <input type="checkbox"   {{$form->contact_phone_secondary_type == 'cell' ? 'checked' : ''}} >
                        <span class="ins-form-small-text">CELL</span>
                      </span>
                    </div>
                </td>
                <td rowspan="2">
                    <div class="ins-form-label">PRIMARY E-MAIL ADDRESS:</div>
                    {{$form->contact_email_primary}}
                    <hr>
                    <div class="ins-form-label">SECONDARY E-MAIL ADDRESS:</div>
                    {{$form->contact_email_secondary}}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="ins-form-label">WHEN TO CONTACT</div>
                    {{$form->contact_when}}
                </td>
            </tr>
        </table>

        <!-- SECOND TABLE: LOSS SECTION -->
        <table class="ins-form-table">
            <tr>
                <td colspan="2" class="ins-form-header">LOSS</td>
            </tr>
            <tr>
                <td>
                    <div class="ins-form-label">LOCATION OF LOSS</div>
                    {{$form->loss_location}}
                </td>
                <td>
                    <div class="ins-form-label">POLICE OR FIRE DEPARTMENT CONTACTED</div>
                    {{$form->loss_police_contact}}
                </td>
            </tr>
            <tr>
                <td>
                    <div class="ins-form-label">STREET:</div>
                    {{$form->loss_address    }} <br>

                </td>
                <td rowspan="2">
                    <div style="height: 60px;"></div>
                </td>
            </tr>
            <tr>
                <td>
                    <div class="ins-form-label">CITY, STATE, ZIP:</div>
                    {{$form->loss_city}} {{$form->loss_state}} {{$form->loss_zipcode}}
                </td>
            </tr>
            <tr>
                <td>
                    <div class="ins-form-label">COUNTRY:</div>
                    {{$form->loss_country}}
                </td>
                <td>
                    <div class="ins-form-label">REPORT NUMBER</div>
                    {{$form->loss_police_report}}
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="ins-form-label">DESCRIBE LOCATION OF LOSS IF NOT AT SPECIFIC STREET ADDRESS:</div>
                    {{$form->loss_description}}
                </td>
            </tr>
            <tr>
                <td>
                    <div class="ins-form-label">KIND OF LOSS</div>
                    <div class="ins-form-checkbox-block">
                        <div class="ins-form-checkbox-item">
                            <input type="checkbox" {{$form->loss_type == 'fire' ? 'checked' : ''}} >
                            <span
                                class="ins-form-small-text">FIRE</span></div>
                        <div class="ins-form-checkbox-item">
                            <input type="checkbox" {{$form->loss_type == 'lightning' ? 'checked' : ''}} >

                            <span
                                class="ins-form-small-text">LIGHTNING</span></div>
                        <div class="ins-form-checkbox-item">
                            <input type="checkbox" {{$form->loss_type == 'flood' ? 'checked' : ''}} >
                            <span
                                class="ins-form-small-text">FLOOD</span></div>
                        <div class="ins-form-checkbox-item">
                            <input type="checkbox" {{$form->loss_type == 'other' ? 'checked' : ''}} >
                            <span
                                class="ins-form-small-text">OTHER</span></div>
                    </div>
                    <div class="ins-form-checkbox-block" style="margin-top: 5px;">
                        <div class="ins-form-checkbox-item">
                            <input type="checkbox" {{$form->loss_type == 'theft' ? 'checked' : ''}} >

                            <span
                                class="ins-form-small-text">THEFT</span></div>
                        <div class="ins-form-checkbox-item">
                            <input type="checkbox" {{$form->loss_type == 'hail' ? 'checked' : ''}} >

                            <span
                                class="ins-form-small-text">HAIL</span></div>
                        <div class="ins-form-checkbox-item">
                            <input type="checkbox" {{$form->loss_type == 'wind' ? 'checked' : ''}} >

                            <span
                                class="ins-form-small-text">WIND</span></div>
                        <div class="ins-form-checkbox-item">
                            {{$form->loss_type_other}}
                            </div>
                    </div>
                </td>
                <td>
                    <div class="ins-form-label">PROBABLE AMOUNT ENTIRE LOSS</div>
                    {{$form->loss_amount}}
                </td>
            </tr>
            <tr>
                <td colspan="2" class="ins-form-description-box">
                    <div class="ins-form-label">DESCRIPTION OF LOSS & DAMAGE</div>
                    {{$form->loss_description}}
                </td>
            </tr>
            <tr>
                <td>
                    <div class="ins-form-label">REPORTED BY</div>
                    {{$form->report_by}}
                </td>
                <td>
                    <div class="ins-form-label">REPORTED TO</div>
                    {{$form->report_to}}
                </td>
            </tr>
        </table>

        <!-- FOOTER -->
        <div class="ins-form-footer">
            <div>ACORD 1 (2016/10)</div>
            <div style="display: flex; justify-content: center; margin-top: 3px;">
                <div style="width: 33%;">Page 1 of 3</div>
                <div style="width: 33%;">© 1988-2016 ACORD CORPORATION. All rights reserved.</div>
                <div style="width: 33%;"></div>
            </div>
        </div>

    </div>

</div>
<script>
    function printOriginal() {
        window.print();
    }
</script>

</body>
</html>
