@extends('admin.layouts.app')
@push('styles')
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
            width: 40%;
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

        /* Textarea styles */
        textarea {
            width: 100%;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
            font-size: 10pt;
            padding: 2px;
            resize: vertical;
            box-sizing: border-box;
        }

        textarea:focus {
            outline: none;
            border-color: #000;
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

            textarea {
                border: none;
                background: transparent;
                resize: none;
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
@endpush
@section('content')

    <form action="{{ route('store-property-loss') }}" method="POST" class=" mt-4">
        @csrf

        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">


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
                    <div class="date-value">
                        <textarea rows="1" placeholder="Date" name="invoice_date"
                                  style="text-align: center; font-weight: bold;">02/23/2025</textarea>
                    </div>
                </div>
            </div>

            <!-- Agency Info -->
            <div class="grid-row">
                <div class="grid-col col-60">
                    <div class="label">AGENCY</div>
                    <div class="value">
                        <textarea rows="1" name="agency_name" placeholder="Name">Aim Insurance Of Texas</textarea>
                        <textarea rows="1" name="agency_address" placeholder="Address">3322 Shaver St</textarea>
                        <textarea rows="1" style="width: 50%" name="agency_city" placeholder="City">Pasadena</textarea>
                        <textarea rows="1" style="width: 20%" name="agency_state" placeholder="State">TX</textarea>
                        <textarea rows="1" style="width: 20%" name="agency_zipcode"
                                  placeholder="Zipcode">77504</textarea>

                    </div>
                    <div>
                        <h3 style="border: solid 1px black;   width: 100%; font-weight: 100;">
                            <b>Contact Name:</b> <textarea rows="1" name="agency_contact_name" placeholder="Name"
                                                           style="width: auto;">Ibrahim</textarea>
                        </h3>
                        <h3 style="border: solid 1px black;   width: 100%; font-weight: 100;">
                            <b>Phone (A/C,No,Ext):</b> <textarea rows="1" name="agency_phone" placeholder="Phone"
                                                                 style="width: auto;">(713)9473434</textarea>
                        </h3>
                        <h3 style="border: solid 1px black;   width: 100%; font-weight: 100;">
                            <b>FAX (A/C,No,Ext):</b> <textarea rows="1" name="agency_fax" placeholder="Fax"
                                                               style="width: auto;">(713)9463969</textarea>
                        </h3>
                        <h3 style="border: solid 1px black;   width: 100%; font-weight: 100;">
                            <b>Email Address:</b> <textarea rows="1" name="agency_email" placeholder="Email"
                                                            style="width: auto;"></textarea>
                        </h3>
                        <h3 style="border: solid 1px black;   width: 100%; font-weight: 100;">
                            <b>Code:</b> <textarea rows="1" name="agency_code" placeholder="Agency Code"
                                                   style="width: auto;"></textarea>
                            <b>SubCode</b> <textarea rows="1" name="agency_subcode" placeholder="Agency SUb Code"
                                                     style="width: auto;"></textarea>
                        </h3>
                        <h3 style="border: solid 1px black;   width: 100%; font-weight: 100;">
                            <b>Agency Customer Id:</b> <textarea rows="1" name="agency_customer_id"
                                                                 placeholder="Agency Customer Id"
                                                                 style="width: auto;"></textarea>
                        </h3>
                    </div>
                </div>

                <div class="grid-col col-40">
                    <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                        <div class="grid-col col-60" style="border-right: 1px solid #000;">
                            <div class="label">INSURED LOCATION CODE</div>
                            <div class="value">
                                <textarea rows="1" name="location_code" placeholder="Location Code"></textarea>
                            </div>
                        </div>
                        <div class="grid-col col-40">
                            <div class="label">DATE OF LOSS AND TIME</div>
                            <div class="value">
                                <textarea rows="1" name="date_of_loss" placeholder="Enter Date"></textarea>
                                <div style="display: flex; justify-content: flex-end; padding-top: 5px;">
                                    <div class="checkbox-container" style="margin-right: 10px;">
                                        <input type="checkbox" name="time_of_loss" value="am"
                                               style="width: 10px; height: 10px;">
                                        <span>AM</span>
                                    </div>
                                    <div class="checkbox-container">
                                        <input type="checkbox" name="time_of_loss" value="pm"
                                               style="width: 10px; height: 10px;">
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
                            <div class="value">
                                <textarea rows="1" name="property_carrier"
                                          placeholder="Carrier">No Company Selected</textarea>
                            </div>
                        </div>
                        <div class="grid-col col-25">
                            <div class="label">NAIC CODE</div>
                            <div class="value">
                                <textarea rows="1" name="property_naic_code" placeholder="NAIC Code"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                        <div class="grid-col col-60" style="border-right: 1px solid #000;">
                            <div class="label">POLICY NUMBER</div>
                            <div class="value">
                                <textarea rows="1" name="property_policy_number" placeholder="Policy #"></textarea>
                            </div>
                        </div>
                        <div class="grid-col col-40">
                            <div class="label">LINE OF BUSINESS</div>
                            <div class="value">
                                <textarea rows="1" name="property_business" placeholder="Business"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="section-header">FLOOD POLICY</div>
                    <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                        <div class="grid-col col-75" style="border-right: 1px solid #000;">
                            <div class="label">CARRIER</div>
                            <div class="value">
                                <textarea rows="1" name="flood_carrier"
                                          placeholder="Carrier">No Company Selected</textarea>
                            </div>
                        </div>
                        <div class="grid-col col-25">
                            <div class="label">NAIC CODE</div>
                            <div class="value">
                                <textarea rows="1" name="flood_naic_code" placeholder="NAIC Code"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                        <div class="grid-col col-100">
                            <div class="label">POLICY NUMBER</div>
                            <div class="value">
                                <textarea rows="1" name="flood_policy_number" placeholder="Policy #"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="section-header">WIND POLICY</div>
                    <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                        <div class="grid-col col-75" style="border-right: 1px solid #000;">
                            <div class="label">CARRIER</div>
                            <div class="value">
                                <textarea rows="1" name="wind_carrier" placeholder="Carrier"></textarea>
                            </div>
                        </div>
                        <div class="grid-col col-25">
                            <div class="label">NAIC CODE</div>
                            <div class="value">
                                <textarea rows="1" name="wind_naic_code" placeholder="NAIC Code"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="grid-row" style="border-top: none; border-left: none; border-right: none;">
                        <div class="grid-col col-100">
                            <div class="label">POLICY NUMBER</div>
                            <div class="value">
                                <textarea rows="1" name="wind_policy_number" placeholder="Policy #"></textarea>
                            </div>
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
                        <textarea rows="1" name="insured_name">JJH CONSTRUCTION LLC</textarea>
                    </td>
                    <td>
                        <div class="ins-form-label">INSURED'S MAILING ADDRESS</div>
                        <textarea rows="3" name="insured_address">22402 Sierra Lake Ct</textarea>
                        <textarea rows="3" name="insured_city">Katy</textarea>
                        <textarea rows="3" name="insured_state">TX</textarea>
                        <textarea rows="3" name="insured_zipcode">77494</textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">DATE OF BIRTH</div>
                        <textarea rows="1" name="insured_dob">11/14/1984</textarea></td>
                    <td>
                        <div class="ins-form-label">FEIN (if applicable)</div>
                        <textarea rows="1" name="insured_fein"></textarea></td>
                    <td>
                        <div class="ins-form-label">MARITAL STATUS / CIVIL UNION (if applicable)</div>
                        <textarea rows="1" name="insured_marital_status">Single</textarea></td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">PRIMARY PHONE #</div>
                        <textarea rows="1" name="insured_phone_primary">(713)516-4040</textarea>
                        <div>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="insured_phone_primary_type" value="home"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">HOME</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="insured_phone_primary_type" value="bus"
                                     class="ins-form-checkbox" checked>
                              <span class="ins-form-small-text">BUS</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="insured_phone_primary_type" value="cell"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">CELL</span>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="ins-form-label">SECONDARY PHONE #</div>
                        <textarea rows="1" name="insured_phone_secondary"></textarea>
                        <div>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="insured_phone_secondary_type" value="home"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">HOME</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="insured_phone_secondary_type" value="bus"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">BUS</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="insured_phone_secondary_type" value="cell"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">CELL</span>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="ins-form-label">PRIMARY E-MAIL ADDRESS:</div>
                        <textarea rows="1" name="insured_email_primary"></textarea>
                        <hr>
                        <div class="ins-form-label">SECONDARY E-MAIL ADDRESS:</div>
                        <textarea rows="1" name="insured_email_secondary"></textarea>
                    </td>
                </tr>
                <!-- SPOUSE SECTION -->
                <tr>
                    <td colspan="2">
                        <div class="ins-form-label">NAME OF SPOUSE</div>
                        <textarea rows="1" name="spouse_name"></textarea>
                    </td>
                    <td>
                        <div class="ins-form-label">SPOUSE'S MAILING ADDRESS</div>
                        <textarea rows="3" name="spouse_address"></textarea>
                        <textarea rows="3" name="spouse_city"></textarea>
                        <textarea rows="3" name="spouse_state"></textarea>
                        <textarea rows="3" name="spouse_zipcode"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">DATE OF BIRTH</div>
                        <textarea rows="1" name="spouse_dob"></textarea></td>
                    <td>
                        <div class="ins-form-label">FEIN (if applicable)</div>
                        <textarea rows="1" name="spouse_fein"></textarea></td>
                    <td>
                        <div class="ins-form-label">MARITAL STATUS / CIVIL UNION</div>
                        <textarea rows="1" name="spouse_marital_status"></textarea></td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">PRIMARY PHONE #</div>
                        <textarea rows="1" name="spouse_phone_primary"></textarea>
                        <div>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="spouse_phone_primary_type" value="home"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">HOME</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="spouse_phone_primary_type" value="bus"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">BUS</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="spouse_phone_primary_type" value="cell"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">CELL</span>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="ins-form-label">SECONDARY PHONE #</div>
                        <textarea rows="1" name="spouse_phone_secondary"></textarea>
                        <div>
                        <span class="ins-form-checkbox-container">
                              <input type="radio" name="spouse_phone_secondary_type" value="home"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">HOME</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="spouse_phone_secondary_type" value="bus"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">BUS</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="spouse_phone_secondary_type" value="cell"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">CELL</span>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="ins-form-label">PRIMARY E-MAIL ADDRESS:</div>
                        <textarea rows="1" name="spouse_email_primary"></textarea>
                        <hr>
                        <div class="ins-form-label">SECONDARY E-MAIL ADDRESS:</div>
                        <textarea rows="1" name="spouse_email_secondary"></textarea>
                    </td>
                </tr>
                <!-- CONTACT SECTION -->
                <tr>
                    <td colspan="3" class="ins-form-header">CONTACT</td>

                </tr>
                <tr>
                    <td colspan="2">
                        <div class="ins-form-label">NAME OF CONTACT</div>
                        <textarea rows="1" name="contact_name"></textarea>
                    </td>
                    <td>
                        <div class="ins-form-label">CONTACT'S MAILING ADDRESS</div>
                        <textarea rows="1" name="contact_address"></textarea>
                        <textarea rows="1" name="contact_city"></textarea>
                        <textarea rows="1" name="contact_state"></textarea>
                        <textarea rows="1" name="contact_zipcode"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">PRIMARY PHONE #</div>
                        <textarea rows="1" name="contact_phone_primary"></textarea>
                        <div>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="contact_phone_primary_type" value="home"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">HOME</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="contact_phone_primary_type" value="bus"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">BUS</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="contact_phone_primary_type" value="cell"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">CELL</span>
                            </span>
                        </div>
                    </td>
                    <td>
                        <div class="ins-form-label">SECONDARY PHONE #</div>
                        <textarea rows="1" name="contact_phone_secondary"></textarea>
                        <div>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="contact_phone_secondary_type" value="home"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">HOME</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="contact_phone_secondary_type" value="bus"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">BUS</span>
                            </span>
                            <span class="ins-form-checkbox-container">
                              <input type="radio" name="contact_phone_secondary_type" value="cell"
                                     class="ins-form-checkbox">
                              <span class="ins-form-small-text">CELL</span>
                            </span>
                        </div>
                    </td>
                    <td rowspan="2">
                        <div class="ins-form-label">PRIMARY E-MAIL ADDRESS:</div>
                        <textarea rows="1" name="contact_email_primary"></textarea>
                        <hr>
                        <div class="ins-form-label">SECONDARY E-MAIL ADDRESS:</div>
                        <textarea rows="1" name="contact_email_secondary"></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <div class="ins-form-label">WHEN TO CONTACT</div>
                        <textarea rows="1" name="contact_when"></textarea>
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
                        <textarea rows="1" name="loss_location"></textarea></td>
                    <td>
                        <div class="ins-form-label">POLICE OR FIRE DEPARTMENT CONTACTED</div>
                        <textarea rows="1" name="loss_police_contact"></textarea></td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">STREET:</div>
                        <textarea rows="1" name="loss_address"></textarea>
                        <textarea rows="1" name="loss_city"></textarea>
                        <textarea rows="1" name="loss_state"></textarea>
                        <textarea rows="1" name="loss_zipcode"></textarea>
                    </td>
                    <td>
                        <div class="ins-form-label">REPORT NUMBER</div>
                        <textarea rows="1" name="loss_police_report"></textarea>
                    </td>

                </tr>

                <tr>
                    <td>
                        <div class="ins-form-label">COUNTRY:</div>
                        <textarea rows="1" name="loss_country"></textarea></td>

                </tr>
                <tr>
                    <td colspan="2">
                        <div class="ins-form-label">DESCRIBE LOCATION OF LOSS IF NOT AT SPECIFIC STREET ADDRESS:</div>
                        <textarea rows="3" name="loss_location"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">KIND OF LOSS</div>
                        <div class="ins-form-checkbox-block">
                            <div class="ins-form-checkbox-item">
                                <input type="radio" name="loss_type" value="fire">
                                <span class="ins-form-small-text">FIRE</span>
                            </div>
                            <div class="ins-form-checkbox-item">
                                <input type="radio" name="loss_type" value="lightning">
                                <span class="ins-form-small-text">LIGHTNING</span>
                            </div>
                            <div class="ins-form-checkbox-item">
                                <input type="radio" name="loss_type" value="flood">
                                <span class="ins-form-small-text">FLOOD</span>
                            </div>
                            <div class="ins-form-checkbox-item">
                                <input type="radio" name="loss_type" value="other">
                                <span class="ins-form-small-text">OTHER</span>
                            </div>
                        </div>
                        <div class="ins-form-checkbox-block" style="margin-top: 5px;">
                            <div class="ins-form-checkbox-item">
                                <input type="radio" name="loss_type" value="theft">
                                <span class="ins-form-small-text">THEFT</span>
                            </div>
                            <div class="ins-form-checkbox-item">
                                <input type="radio" name="loss_type" value="hail">
                                <span class="ins-form-small-text">HAIL</span>
                            </div>
                            <div class="ins-form-checkbox-item">
                                <input type="radio" name="loss_type" value="wind">
                                <span class="ins-form-small-text">WIND</span>
                            </div>
                            <div class="ins-form-checkbox-item">
                                <textarea rows="1" name="loss_type_other" placeholder="other kind"></textarea>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="ins-form-label">PROBABLE AMOUNT ENTIRE LOSS</div>
                        <textarea rows="1" name="loss_amount"></textarea></td>
                </tr>
                <tr>
                    <td colspan="2" class="ins-form-description-box">
                        <div class="ins-form-label">DESCRIPTION OF LOSS & DAMAGE</div>
                        <textarea rows="10" name="loss_description"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <div class="ins-form-label">REPORTED BY</div>
                        <textarea rows="1" name="report_by"></textarea></td>
                    <td>
                        <div class="ins-form-label">REPORTED TO</div>
                        <textarea rows="1" name="report_to"></textarea></td>
                </tr>
            </table>

        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>

    </form>
@endsection
