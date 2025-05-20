@extends('admin.layouts.app')
@push('styles')
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        .s1 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 13.5pt;
        }

        .s2 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s3 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 8pt;
        }

        .s4 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s5 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s6 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6pt;
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

        .s7 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 7.5pt;
        }

        .s8 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 5.5pt;
        }

        .s9 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s10 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6pt;
        }

        .s11 {
            color: black;
            font-family: "Arial Black", sans-serif;
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .s12 {
            color: black;
            font-family: Arial, sans-serif;
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 6.5pt;
        }

        .ins-container {
            width: 98%;
            max-width: 800px;
            margin: 0 auto;
            border: 2px solid #000;
            padding: 15px;
            box-sizing: border-box;
        }

        .ins-header {
            text-align: center;
            font-weight: bold;
            margin-bottom: 15px;
            font-size: 0.6875rem; /* 11px */
            padding: 5px;
        }

        .ins-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .ins-th, .ins-td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
            vertical-align: top;
            font-size: 0.5625rem; /* 9px */
        }

        .ins-th {
            text-align: center;
            font-weight: bold;
            background-color: #f5f5f5;
        }

        .ins-section-title {
            font-weight: bold;
            margin-bottom: 5px;
            font-size: 0.625rem; /* 10px */
        }

        .ins-description-box {
            border: 1px solid #000;
            height: 100px;
            margin-top: 5px;
        }

        .ins-text-center {
            text-align: center;
        }

        .ins-col-narrow {
            width: 3%;
        }

        .ins-col-1 {
            width: 1%;
        }

        .ins-col-10 {
            width: 10%;
        }

        .ins-col-15 {
            width: 15%;
        }

        .ins-col-25 {
            width: 25%;
        }

        .ins-col-27 {
            width: 27%;
        }

        .ins-col-39 {
            width: 39%;
        }

        .ins-col-8 {
            width: 8%;
        }

        .ins-col-5 {
            width: 5%;
        }

        .ins-dollar {
            float: right;
        }

        .ins-checkbox-input {
            width: 12px;
            height: 12px;
            vertical-align: middle;
            margin: 0;
        }

        .ins-indent {
            padding-left: 10px;
        }

        @media (max-width: 600px) {
            .ins-container {
                padding: 10px;
            }

            .ins-th, .ins-td {
                font-size: 0.5rem; /* 8px */
            }

            .ins-header {
                font-size: 0.5625rem; /* 9px */
            }
        }

        @media print {
            @page {
                size: A4;
                margin: 1cm;
            }

            .ins-container {
                width: 800px !important;
                margin: 0 auto !important;
                padding: 10px !important;
            }

            .ins-table {
                width: 100% !important;
                table-layout: fixed !important;
            }

            .ins-th, .ins-td {
                font-size: 8pt !important;
                word-wrap: break-word !important;
            }

            .ins-section {
                page-break-inside: avoid !important;
            }

            .ins-header {
                font-size: 9pt !important;
            }

            .ins-section-title {
                font-size: 8pt !important;
            }

            .ins-description-box {
                height: 80px !important;
            }
        }

    </style>
@endpush
@section('content')

    <form action="{{ route('store-property-insurance') }}" method="POST" class=" mt-4">
        @csrf

        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">

        <div style="max-width: 800px; width: 100%; height: 80%; margin: 0 auto; font-family: Arial, sans-serif;">


            <table border="0" cellspacing="0" cellpadding="0">
                <tr>
                    <td><a href="https://imgbb.com/"><img src="https://i.ibb.co/GfrMJ73J/Untitled-design.png"
                                                          width="50px" height="auto" alt="Untitled-design"
                                                          border="0"></a></td>
                </tr>
            </table>
            <table style="border-collapse:collapse;margin-left:6.6pt" cellspacing="0">
                <tr style="height:23pt">
                    <td style="width:490pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                        colspan="6">
                        <p class="s1" style="padding-top: 2pt;padding-left: 145pt;text-indent: 0pt;text-align: left;">
                            CERTIFICATE OF LIABILITY INSURANCE</p>
                    </td>
                    <td style="width:87pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                        colspan="2">
                        <p class="s2"
                           style="padding-top: 2pt;padding-left: 6pt;padding-right: 3pt;text-indent: 0pt;text-align: center;">
                            DATE (MM/DD/YYYY)</p>
                        <p class="s3"
                           style="padding-top: 5pt;padding-left: 6pt;text-indent: 0pt;line-height: 8pt;text-align: center;">
                            <input type="text" name="invoice_date" placeholder="Date" value="02/23/2025"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:41pt">
                    <td style="width:577pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                        colspan="8">
                        <p class="s3" style="padding-left: 9pt;text-indent: 0pt;line-height: 9pt;text-align: justify;">
                            THIS
                            CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE
                            CERTIFICATE
                            HOLDER. THIS</p>
                        <p class="s3"
                           style="padding-left: 9pt;padding-right: 71pt;text-indent: 0pt;text-align: justify;">
                            CERTIFICATE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE
                            AFFORDED BY THE
                            POLICIES BELOW. THIS CERTIFICATE OF INSURANCE DOES NOT CONSTITUTE A CONTRACT BETWEEN THE
                            ISSUING
                            INSURER(S), AUTHORIZED REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE HOLDER.</p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td
                        style="width:160pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt">
                        <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">PRODUCER</p>
                    </td>
                    <td style="width:76pt;border-top-style:solid;border-top-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td
                        style="width:53pt;border-top-style:solid;border-top-width:2pt;border-right-style:solid;border-right-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="5">
                        <p class="s3" style="padding-left: 2pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            Contact Name:</p>
                        <p class="s4" style="padding-left: 45pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="contact_name" placeholder="Contact Name" value="Ibrahim Khan"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt;border-left-style:solid;border-left-width:2pt">
                        <p class="s3" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">
                            <input type="text" name="producer_name" placeholder="Producer Name"
                                   value="Aim Insurance Of Texas"/>
                        </p>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt;border-right-style:solid;border-right-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:176pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="2">

                        <p class="s3" style="padding-left: 2pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            Phone:</p>
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            <input type="text" name="contact_phone_no" value="(713)946-3969"/>
                        </p>
                    </td>
                    <td style="width:33pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt">
                        <p class="s3" style="padding-left: 2pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            Fax:</p>
                    </td>
                    <td style="width:79pt; border-top-style:solid; border-top-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="2">
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            <input type="text" name="contact_fax_no" value="(713)946-3969"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt;border-left-style:solid;border-left-width:2pt">
                        <p class="s3" style="padding-left: 5pt;text-indent: 0pt;text-align: left;">
                            <input type="text" name="producer_address" placeholder="Producer Address"
                                   value="3322 Shaver St"/>
                        </p>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt;border-right-style:solid;border-right-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="5">
                        <p class="s3" style="padding-left: 2pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            Email Address:</p>
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            <input type="text" name="contact_email" value=""/>
                        </p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt;border-left-style:solid;border-left-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt;border-right-style:solid;border-right-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="5">
                        <p class="s3" style="padding-left: 2pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            Producer Customer ID:</p>
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            <input type="text" name="producer_customer_id" value=""/>
                        </p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td
                        style="width:160pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt">
                        <p class="s4" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="producer_city" placeholder="Producer City" value="Pasadena"/>
                        </p></td>
                    <td style="width:76pt;border-bottom-style:solid;border-bottom-width:2pt">
                        <p class="s4" style="padding-right: 3pt; text-indent: 0pt; text-align: right;">
                            <input type="text" name="producer_state" value="TX"/>
                        </p>
                    </td>
                    <td
                        style="width:53pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                        <p class="s4" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="producer_zipcode" value="77504"/>
                        </p></td>
                    <td style="width:235pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 3pt;padding-left: 67pt;text-indent: 0pt;line-height: 6pt;text-align: left;">
                            INSURER(S) AFFORDING COVERAGE</p>
                    </td>
                    <td
                        style="width:53pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                        <p class="s5"
                           style="padding-top: 3pt;padding-left: 18pt;text-indent: 0pt;line-height: 6pt;text-align: left;">
                            NAIC
                            #</p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td
                        style="width:160pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt">
                        <p class="s6" style="padding-left: 2pt;text-indent: 0pt;line-height: 7pt;text-align: left;">
                            INSURED</p>
                    </td>
                    <td style="width:76pt;border-top-style:solid;border-top-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td
                        style="width:53pt;border-top-style:solid;border-top-width:2pt;border-right-style:solid;border-right-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:235pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 2pt; padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            INSURER A: <input type="text" name="insurer_a"/>
                        </p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="insurer_a_naic"
                                                                              value="0"/></p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt;border-left-style:solid;border-left-width:2pt">
                        <input type="text" name="insured_name" value="JJH CONSTRUCTION LLC"/>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt;border-right-style:solid;border-right-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:235pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 2pt; padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            INSURER B: <input type="text" name="insurer_b"/>
                        </p>
                    </td>
                    <td style="width:33pt; border-top-style:solid; border-top-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="insurer_b_naic"/></p>
                    </td>

                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt;border-left-style:solid;border-left-width:2pt" rowspan="2">
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            <input type="text" name="insured_address" value="22402 Sierra Lake Ct"/>
                        </p>
                    </td>
                    <td style="width:76pt" rowspan="2">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt;border-right-style:solid;border-right-width:2pt" rowspan="2">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:235pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 2pt; padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            INSURER C: <input type="text" name="insurer_c"/>
                        </p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="insurer_c_naic"/></p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:235pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 1pt; padding-left: 2pt; text-indent: 0pt; line-height: 8pt; text-align: left;">
                            INSURER D: <input type="text" name="insurer_d"/>
                        </p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="insurer_d_naic"/></p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt;border-left-style:solid;border-left-width:2pt">
                        <input type="text" name="insured_city" value="Katy"/>
                    </td>
                    <td style="width:76pt">
                        <p class="s4" style="padding-right: 3pt; text-indent: 0pt; text-align: right;">
                            <input type="text" name="insured_state" value="TX"/>
                        </p>
                    </td>
                    <td style="width:53pt;border-right-style:solid;border-right-width:2pt">
                        <p class="s4" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="insured_zipcode" value="77494"/>
                        </p>
                    </td>
                    <td style="width:235pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 2pt; padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            INSURER E: <input type="text" name="insurer_e"/>
                        </p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="insurer_e_naic"/></p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td
                        style="width:160pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:76pt;border-bottom-style:solid;border-bottom-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td
                        style="width:53pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                        <p style="text-indent: 0pt;text-align: left;"><br/></p>
                    </td>
                    <td style="width:235pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 2pt; padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            INSURER F: <input type="text" name="insurer_f"/>
                        </p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="insurer_f_naic"/></p>
                    </td>
                </tr>
            </table>
            <p style="padding-bottom: 1pt; padding-left: 9pt; text-indent: 0pt; text-align: left;">
                COVERAGES CERTIFICATE NUMBER: <input type="text" name="certificate_no" style="width: 100pt;"/>
                <span class="s7">REVISION NUMBER: <input type="text" name="revision_no" style="width: 100pt;"/></span>
            </p>
            <div class="ins-container"
                 style="  max-width: 800px; margin: 0 auto; border: 2px solid #000; padding: 15px; box-sizing: border-box;margin-left: 0.5%;">
                <div class="ins-header">
                    THIS IS TO CERTIFY THAT THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE INSURED NAMED
                    ABOVE FOR THE POLICY PERIOD INDICATED. NOTWITHSTANDING ANY REQUIREMENT, TERM OR CONDITION OF ANY
                    CONTRACT OR OTHER DOCUMENT WITH RESPECT TO WHICH THIS CERTIFICATE MAY BE ISSUED OR MAY PERTAIN, THE
                    INSURANCE AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND
                    CONDITIONS OF SUCH POLICIES. LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
                </div>

                <section class="ins-section">
                    <table class="ins-table">
                        <thead>
                        <tr>
                            <th scope="col" class="ins-th ins-col-narrow">INSR LTR</th>
                            <th scope="col" class="ins-th ins-col-25">TYPE OF INSURANCE</th>
                            <th scope="col" class="ins-th ins-col-1">ADDL INSD</th>
                            <th scope="col" class="ins-th ins-col-1">SUBR WVD</th>
                            <th scope="col" class="ins-th ins-col-15">POLICY NUMBER</th>
                            <th scope="col" class="ins-th ins-col-10">POLICY EFF (MM/DD/YYYY)</th>
                            <th scope="col" class="ins-th ins-col-10">POLICY EXP (MM/DD/YYYY)</th>
                            <th scope="col" colspan="2" class="ins-th ins-col-27">LIMITS</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="ins-td ins-text-center ins-col-narrow"></td>
                            <td class="ins-td  ins-col-27">COMMERCIAL GENERAL LIABILITY
                                <br>
                                <div class="ins-indent">
                                    <input type="checkbox" name="commercial_claim" value="1" class="ins-checkbox-input">
                                    CLAIMS-MADE
                                    <input type="checkbox" name="commercial_occur" value="1" class="ins-checkbox-input">
                                    OCCUR
                                    <br>
                                    <input type="checkbox" class="ins-checkbox-input">
                                    <input type="text" name="commercial_other_one"/>
                                    <br>
                                    <input type="checkbox" class="ins-checkbox-input">
                                    <input type="text" name="commercial_other_two"/>
                                </div>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="commercial_addl"/></td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="commercial_subr"/></td>
                            <td class="ins-td"><input type="text" style="width: 40pt" name="commercial_policy_number"/>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 40pt" name="commercial_effective_date"/>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 40pt"
                                                      name="commercial_expiration_date"/></td>
                            <td class="ins-td ins-col-25">
                                <input type="checkbox" name="commercial_each_occurrence" value="1"
                                       class="ins-checkbox-input">
                                EACH OCCURRENCE <br>
                                <input type="checkbox" name="commercial_damage" value="1" class="ins-checkbox-input">
                                DAMAGE TO RENTED PREMISES (Ea occurrence) <br>
                                <input type="checkbox" name="commercial_expense" value="1" class="ins-checkbox-input">
                                MED EXP (Any one person)<br>
                                <input type="checkbox" name="commercial_expense" value="1" class="ins-checkbox-input">
                                PERSONAL & ADV INJURY<br>
                                <input type="checkbox" name="commercial_expense" value="1" class="ins-checkbox-input">
                                GEN'L AGGREGATE LIMIT APPLIES PER:<br>
                                <input type="checkbox" name="commercial_expense" value="1" class="ins-checkbox-input">
                                GENERAL AGGREGATE<br>
                                <input type="checkbox" name="commercial_expense" value="1" class="ins-checkbox-input">
                                PRODUCTS - COMP/OP AGG<br>
                            </td>
                            <td class="ins-td">
                                <input type="text" name="commercial_each_occurrence_limit"/>
                                <input type="text" name="commercial_damage_limit"/>
                                <input type="text" name="commercial_expense_limit"/>
                                <input type="text" name="commercial_injury_limit"/>
                                <input type="text" name="commercial_general_aggregate_limit"/>
                                <input type="text" name="commercial_general_product_limit"/>
                                <input type="text" name="commercial_general_other_limit"/>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </section>

                <section class="ins-section">
                    <div class="ins-section-title">AUTOMOBILE LIABILITY</div>
                    <table class="ins-table">
                        <tr>
                            <td class="ins-td ins-text-center ins-col-narrow"></td>
                            <td class="ins-td ins-col-27">
                                <input type="checkbox" name="automobile_any" value="1" class="ins-checkbox-input">
                                ANY AUTO <br>
                                <input type="checkbox" name="automobile_own" value="1" class="ins-checkbox-input">
                                OWNED AUTOS ONLY <br>
                                <input type="checkbox" name="automobile_schedule" value="1" class="ins-checkbox-input">
                                SCHEDULED AUTOS <br>
                                <input type="checkbox" name="automobile_hired" value="1" class="ins-checkbox-input">
                                HIRED AUTOS ONLY <br>
                                <input type="checkbox" name="automobile_non_own" value="1" class="ins-checkbox-input">
                                NON-OWNED AUTOS ONLY <br>
                                <input type="checkbox" class="ins-checkbox-input">
                                <input type="text" name="automobile_other_one"/>
                                <br>
                                <input type="checkbox" class="ins-checkbox-input">
                                <input type="text" name="automobile_other_two"/>
                                <br>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="automobile_addl"/></td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="automobile_subr"/></td>
                            <td class="ins-td"><input type="text" style="width: 40pt" name="automobile_policy_number"/>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 40pt" name="automobile_effective_date"/>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 40pt"
                                                      name="automobile_expiration_date"/></td>
                            <td class="ins-td ins-col-25">

                                <input type="checkbox" name="automobile_combine" value="1" class="ins-checkbox-input">
                                COMBINED SINGLE LIMIT (Ea accident)<br>
                                <input type="checkbox" name="automobile_injury_person" value="1"
                                       class="ins-checkbox-input">
                                BODILY INJURY (Per accident)<br>
                                <input type="checkbox" name="automobile_injury_accident" value="1"
                                       class="ins-checkbox-input">
                                BODILY INJURY (Per person)<br>
                                <input type="checkbox" name="automobile_property_damage" value="1"
                                       class="ins-checkbox-input">
                                PROPERTY DAMAGE (Per accident)<br>
                                <input type="checkbox" class="ins-checkbox-input">
                                <input type="text" name="automobile_other"/><br>
                            </td>
                            <td class="ins-td">
                                <input type="text" name="automobile_combine_limit"/>
                                <input type="text" name="automobile_injury_person_limit"/>
                                <input type="text" name="automobile_injury_accident_limit"/>
                                <input type="text" name="automobile_property_damage_limit"/>
                                <input type="text" name="automobile_other_limit"/>
                            </td>
                        </tr>
                    </table>
                </section>

                <section class="ins-section">
                    <table class="ins-table">
                        <tr>
                            <td class="ins-td ins-text-center ins-col-narrow"></td>
                            <td class="ins-td ins-col-27">
                                <input type="checkbox" name="umbrella" value="1" class="ins-checkbox-input">
                                UMBRELLA LIAB
                                <br>
                                <input type="checkbox" name="umbrella_occur" value="1" class="ins-checkbox-input">
                                OCCUR
                                <br>
                                <input type="checkbox" name="umbrella_excess" value="1" class="ins-checkbox-input">
                                EXCESS LIAB
                                <br>
                                <input type="checkbox" name="umbrella_claim" value="1" class="ins-checkbox-input">
                                CLAIMS-MADE
                                <br>
                                <input type="checkbox" name="umbrella_ded" value="1" class="ins-checkbox-input">
                                DED
                                <br>
                                <input type="checkbox" name="umbrella_retention" value="1" class="ins-checkbox-input">
                                RETENTION
                                <br>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="umbrella_addl"/></td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="umbrella_subr"/></td>
                            <td class="ins-td"><input type="text" style="width: 40pt" name="umbrella_policy_number"/>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 40pt" name="umbrella_effective_date"/>
                            </td>
                            <td class="ins-td"><input type="text" style="width: 40pt" name="umbrella_expiration_date"/>
                            </td>
                            <td class="ins-td ins-col-25">
                                <input type="checkbox" name="umbrella_each_occurrence" value="1"
                                       class="ins-checkbox-input">
                                EACH OCCURRENCE <br>
                                <input type="checkbox" name="umbrella_aggregate" value="1" class="ins-checkbox-input">
                                Aggregate <br>
                                <input type="checkbox" class="ins-checkbox-input">
                                <input type="text" name="umbrella_aggregate_other"/>
                                <br>

                            </td>
                            <td class="ins-td">
                                <input type="text" name="umbrella_each_occurrence_limit"/>
                                <input type="text" name="umbrella_aggregate_limit"/>
                                <input type="text" name="umbrella_aggregate_other_limit"/>
                            </td>
                        </tr>

                    </table>
                </section>

                <section class="ins-section">
                    <div class="ins-section-title">WORKERS COMPENSATION AND EMPLOYERS' LIABILITY</div>
                    <table class="ins-table">
                        <tr>
                            <td class="ins-td ins-text-center ins-col-narrow"></td>
                            <td class="ins-td ins-col-27">ANY PROPRIETOR/PARTNER/EXECUTIVE OFFICER/MEMBER EXCLUDED?
                                <br>
                                <input type="radio" name="compensation" value="y" class="ins-checkbox-input"> YES
                                <input type="radio" name="compensation" value="n" class="ins-checkbox-input"> NO
                                <br>
                                (Mandatory in NH) If yes, describe under DESCRIPTION OF OPERATIONS below

                            </td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="compensation_addl"/></td>
                            <td class="ins-td"><input type="text" style="width: 20pt" name="compensation_subr"/></td>
                            <td class="ins-td"><input type="text" style="width: 40pt"
                                                      name="compensation_policy_number"/></td>
                            <td class="ins-td"><input type="text" style="width: 40pt"
                                                      name="compensation_effective_date"/></td>
                            <td class="ins-td"><input type="text" style="width: 40pt"
                                                      name="compensation_expiration_date"/></td>
                            <td class="ins-td ins-col-25">
                                <input type="checkbox" name="compensation_per_stat" value="1"
                                       class="ins-checkbox-input"> PER STATUTE
                                <br>
                                <input type="checkbox" name="compensation_other" value="1"
                                       class="ins-checkbox-input"> OTHER
                                <br>
                                <input type="checkbox" name="compensation_each_accident" value="1"
                                       class="ins-checkbox-input"> E.L. EACH ACCIDENT
                                <br>
                                <input type="checkbox" name="compensation_disease_employee" value="1"
                                       class="ins-checkbox-input"> E.L. DISEASE - EA EMPLOYEE
                                <br>
                                <input type="checkbox" name="compensation_disease_policy" value="1"
                                       class="ins-checkbox-input">E.L. DISEASE - POLICY LIMIT
                                <br>
                            </td>
                            <td class="ins-td">
                                <input type="text" name="compensation_per_stat_limit"/>
                                <input type="text" name="compensation_each_accident_limit"/>
                                <input type="text" name="compensation_disease_employee_limit"/>
                                <input type="text" name="compensation_disease_policy_limit"/>
                            </td>
                        </tr>


                    </table>
                </section>

                <section class="ins-section">
                    <div class="ins-section-title">DESCRIPTION OF OPERATIONS / LOCATIONS / VEHICLES (ACORD 101,
                        Additional Remarks Schedule, may be attached if more space is required)
                    </div>
                    <div class="ins-description-box">
                        <textarea name="special_condition" style="width: 100%" rows="4"></textarea>
                    </div>
                </section>
            </div>
            <!-- aaaa -->
            <p style="padding-left: 9pt;text-indent: 0pt;text-align: left;">CERTIFICATE HOLDER <span
                    style="margin-left: 14.5%;">CANCELLATION</span></p>
            <table style="border-collapse:collapse;margin-left:6.6pt;" cellspacing="0">
                <tr style="height:47pt">
                    <td style="width:289pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt"
                        rowspan="2">
                        <p style="text-indent: 0pt;text-align: left;">
                            <input type="text" name="certificate_holder"/>
                        </p>
                    </td>
                    <td
                        style="width:288pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                        <p style="padding-top: 1pt;text-indent: 0pt;text-align: left;"><br/></p>
                        <p class="s12"
                           style="padding-left: 9pt;padding-right: 20pt;text-indent: 0pt;line-height: 112%;text-align: left;">
                            SHOULD ANY OF THE ABOVE DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION DATE THEREOF,
                            NOTICE
                            WILL BE DELIVERED IN <span class="s9">ACCORDANCE WITH THE POLICY PROVISIONS.</span></p>
                    </td>
                </tr>
                <tr style="height:35pt">
                    <td
                        style="width:288pt;border-top-style:solid;border-top-width:2pt;border-left-style:solid;border-left-width:2pt;border-bottom-style:solid;border-bottom-width:2pt;border-right-style:solid;border-right-width:2pt">
                        <p class="s2" style="padding-left: 2pt;text-indent: 0pt;text-align: left;">AUTHORIZED
                            REPRESENTATIVE</p>
                        <input type="text" name="authorize_representative"/>
                    </td>
                </tr>
            </table>

        </div>
        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>

    </form>
@endsection
