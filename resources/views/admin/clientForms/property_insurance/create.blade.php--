@extends('admin.layouts.app')
@push('styles')
    <style type="text/css">
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

        .property-coverage-p {
            padding-bottom: 15pt;
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

        table, tbody {
            vertical-align: top;
            overflow: visible;
        }

        input, textarea {
            font-family: Arial, sans-serif;
            font-size: 8pt;
            width: 100%;
            box-sizing: border-box;
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
            <table style="border-collapse:collapse; margin-left:6.57675pt" cellspacing="0">
                <tr style="height:23pt">
                    <td style="width:490pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="6">
                        <p class="s1"
                           style="padding-top: 2pt; padding-left: 145pt; text-indent: 0pt; text-align: left;">
                            CERTIFICATE OF PROPERTY INSURANCE
                        </p>
                    </td>
                    <td style="width:87pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="2">
                        <p class="s2"
                           style="padding-top: 2pt; padding-left: 6pt; padding-right: 3pt; text-indent: 0pt; text-align: center;">
                            DATE (MM/DD/YYYY)
                        </p>
                        <p class="s3"
                           style="padding-top: 5pt; padding-left: 6pt; text-indent: 0pt; line-height: 8pt; text-align: center;">
                            <input type="text" name="invoice_date" placeholder="Date" value="02/23/2025"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:41pt">
                    <td style="width:577pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="8">
                        <p class="s3"
                           style="padding-left: 9pt; text-indent: 0pt; line-height: 9pt; text-align: justify;">
                            THIS CERTIFICATE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE
                            CERTIFICATE HOLDER. THIS
                        </p>
                        <p class="s3"
                           style="padding-left: 9pt; padding-right: 71pt; text-indent: 0pt; text-align: justify;">
                            CERTIFICATE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE
                            AFFORDED BY THE POLICIES BELOW. THIS CERTIFICATE OF INSURANCE DOES NOT CONSTITUTE A CONTRACT
                            BETWEEN THE ISSUING INSURER(S), AUTHORIZED REPRESENTATIVE OR PRODUCER, AND THE CERTIFICATE
                            HOLDER.
                        </p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt">
                        <p class="s2" style="padding-left: 2pt; text-indent: 0pt; text-align: left;">PRODUCER</p>
                    </td>
                    <td style="width:76pt; border-top-style:solid; border-top-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="5">
                        <p class="s4" style="padding-left: 45pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="contact_name" placeholder="Contact Name" value="Ibrahim Khan"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt">
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="producer_name" placeholder="Producer Name"
                                   value="Aim Insurance Of Texas"/>
                        </p>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
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
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt">
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="producer_address" placeholder="Producer Address"
                                   value="3322 Shaver St"/>
                        </p>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
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
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
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
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt">
                        <p class="s4" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="producer_city" placeholder="Producer City" value="Pasadena"/>
                        </p>
                    </td>
                    <td style="width:76pt; border-bottom-style:solid; border-bottom-width:2pt">
                        <p class="s4" style="padding-right: 3pt; text-indent: 0pt; text-align: right;">
                            <input type="text" name="producer_state" value="TX"/>
                        </p>
                    </td>
                    <td style="width:53pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s4" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="producer_zipcode" value="77504"/>
                        </p>
                    </td>
                    <td style="width:235pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="4">
                        <p class="s5"
                           style="padding-top: 3pt; padding-left: 67pt; text-indent: 0pt; line-height: 6pt; text-align: left;">
                            INSURER(S) AFFORDING COVERAGE
                        </p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s5"
                           style="padding-top: 3pt; padding-left: 18pt; text-indent: 0pt; line-height: 6pt; text-align: left;">
                            NAIC #
                        </p>
                    </td>
                </tr>
                <tr style="height:11pt">
                    <td style="width:160pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt">
                        <p class="s6" style="padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            INSURED</p>
                    </td>
                    <td style="width:76pt; border-top-style:solid; border-top-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-top-style:solid; border-top-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:235pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
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
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt">
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            <input type="text" name="insured_name" value="JJH CONSTRUCTION LLC"/>
                        </p>
                    </td>
                    <td style="width:76pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
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
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt" rowspan="2">
                        <p class="s3" style="padding-left: 5pt; text-indent: 0pt; line-height: 9pt; text-align: left;">
                            <input type="text" name="insured_address" value="22402 Sierra Lake Ct"/>
                        </p>
                    </td>
                    <td style="width:76pt" rowspan="2">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-right-style:solid; border-right-width:2pt" rowspan="2">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
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
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt">
                        <p class="s4" style="padding-left: 5pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="insured_city" value="Katy"/>
                        </p>
                    </td>
                    <td style="width:76pt">
                        <p class="s4" style="padding-right: 3pt; text-indent: 0pt; text-align: right;">
                            <input type="text" name="insured_state" value="TX"/>
                        </p>
                    </td>
                    <td style="width:53pt; border-right-style:solid; border-right-width:2pt">
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
                    <td style="width:160pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:76pt; border-bottom-style:solid; border-bottom-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
                    </td>
                    <td style="width:53pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><br/></p>
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
            <table style="border-collapse:collapse; margin-left:6.20175pt" cellspacing="0">
                <tr style="height:36pt">
                    <td style="width:577pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="10">
                        <p class="s8" style="padding-left: 2pt; text-indent: 0pt; text-align: left;">
                            LOCATION OF PREMISES / DESCRIPTION OF PROPERTY (Attach ACORD 101, Additional Remarks
                            Schedule, if more space is required)
                        </p>
                        <textarea rows="3" name="property_description"></textarea>
                    </td>
                </tr>
                <tr style="height:36pt">
                    <td style="width:577pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="10">
                        <p class="s9" style="padding-left: 9pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            THIS IS TO CERTIFY THAT THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE
                            INSURED NAMED ABOVE FOR THE POLICY PERIOD
                        </p>
                        <p class="s9"
                           style="padding-left: 9pt; padding-right: 50pt; text-indent: 0pt; line-height: 112%; text-align: left;">
                            INDICATED. NOTWITHSTANDING ANY REQUIREMENT, TERM OR CONDITION OF ANY CONTRACT OR OTHER
                            DOCUMENT WITH RESPECT TO WHICH THIS CERTIFICATE MAY BE ISSUED OR MAY PERTAIN, THE INSURANCE
                            AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND
                            CONDITIONS OF SUCH POLICIES. LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
                        </p>
                    </td>
                </tr>
                <tr style="height:18pt">
                    <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s9"
                           style="padding-left: 3pt; padding-right: 1pt; text-indent: -1pt; text-align: left;">INSR
                            LTR</p>
                    </td>
                    <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="3">
                        <p class="s8" style="padding-top: 5pt; padding-left: 31pt; text-indent: 0pt; text-align: left;">
                            TYPE OF INSURANCE</p>
                    </td>
                    <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s8" style="padding-top: 5pt; padding-left: 45pt; text-indent: 0pt; text-align: left;">
                            POLICY NUMBER</p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s9"
                           style="padding-left: 4pt; padding-right: 4pt; text-indent: 1pt; line-height: 93%; text-align: left;">
                            POLICY EFFECTIVE DATE (MM/DD/YYYY)
                        </p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s9"
                           style="padding-left: 4pt; padding-right: 4pt; text-indent: 0pt; line-height: 93%; text-align: left;">
                            POLICY EXPIRATION DATE (MM/DD/YYYY)
                        </p>
                    </td>
                    <td style="width:90pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="2">
                        <p class="s2" style="padding-top: 5pt; padding-left: 14pt; text-indent: 0pt; text-align: left;">
                            COVERED PROPERTY</p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s8"
                           style="padding-top: 5pt; padding-left: 1pt; text-indent: 0pt; text-align: center;">LIMITS</p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="11">
                        <p style="text-indent: 0pt; text-align: left;"></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="2" rowspan="2">
                        <p class="s8" style="padding-right: 17pt; text-indent: 0pt; text-align: right;">PROPERTY</p>
                        <p class="s10"
                           style="padding-top: 5pt; text-indent: 0pt; text-align: right;">
                            <input type="checkbox" value="1" name="property_causes_loss"/>CAUSES OF
                            LOSS</p>
                    </td>
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p class="s10" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">DEDUCTIBLES</p>
                            <input type="text" name="property_deductible"/>
                    </td>
                    <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="11">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_policy_number"
                                                                              value="" placeholder="Policy NUmber"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="11">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_effective_date"
                                                                              placeholder="Effective Date"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="11">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_expiration_date"
                                                                              placeholder="Expiration date"/></p>
                    </td>
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="11">
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_building"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_personal"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_income"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_expense"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_rental"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_b_building"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_b_prop"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_b_pp"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_other_one"
                                                                                                    value="1"/></p>
                        <p style="text-indent: 0pt; text-align: left; padding-bottom: 10pt;"><input type="checkbox"
                                                                                                    name="property_coverage_other_two"
                                                                                                    value="1"/></p>
                    </td>
                    <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="11">
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;">BUILDING</p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;">PERSONAL PROPERTY</p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;">EXTRA EXPENSE</p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;"> RENTAL VALUE</p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;">BLANKET BUILDING</p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;"> BLANKET PERS PROP</p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;"> BLANKET BLDG & PP</p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="property_coverage_other_one" placeholder="Other 1"/>
                        </p>
                        <p class="s2 property-coverage-p"
                           style="padding-left: 1pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="property_coverage_other_two" placeholder="Other 2"/>
                        </p>

                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_coverage_building_limit"
                                                                              placeholder="Building Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_coverage_personal_limit"
                                                                              placeholder="Personal Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:14pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_basic"
                                                                              value="1"/></p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s10" style="padding-left: 1pt; text-indent: 0pt; line-height: 6pt; text-align: left;">
                            BASIC</p>
                    </td>
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p class="s10" style="padding-left: 1pt; text-indent: 0pt; line-height: 6pt; text-align: left;">
                            BUILDING</p>
                        <input type="text" name="property_building"/>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_coverage_income_limit"
                                                                              placeholder="Income Limit"/></p>
                    </td>
                </tr>
                <tr style="height:6pt">
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_broad"
                                                                              value="1"/></p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p class="s10" style="padding-left: 1pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            BROAD</p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_coverage_expense_limit"
                                                                              placeholder="Expense Limit"/></p>
                    </td>
                </tr>
                <tr style="height:6pt">
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p class="s2" style="padding-left: 1pt; text-indent: 0pt; line-height: 4pt; text-align: left;">
                            CONTENTS</p>
                        <input type="text" name="property_contents"/>

                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                    >
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_special"
                                                                              value="1"/>
                        </p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">SPECIAL</p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_coverage_rental_limit"
                                                                              placeholder="Rental Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                    >
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"
                                                                              name="property_earthquake" value="1"/></p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">EARTHQUAKE</p>
                    </td>
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_other_one"/>
                        </p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s2" style="text-indent: 0pt; text-align: left;"><input type="text" name="property_coverage_b_building_limit"
                                                                                         placeholder="Blanket Building"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_wind"
                                                                              value="1"/></p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s10" style="padding-left: 2pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            WIND</p>
                    </td>
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="property_other_two"
                                                                              value="1"/>
                        </p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s2" style="text-indent: 0pt; text-align: left;"><input type="text" name="property_coverage_b_prop_limit"
                                                                                         placeholder="BLANKET PERS PROP"
                                                                                         value="1"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name="property_flood"
                                                                              value="1"/>
                        </p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">FLOOD</p>
                    </td>
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s2" style="text-indent: 0pt; text-align: left;"><input type="text" name="property_coverage_b_pp_limit"
                                                                                         placeholder="BLANKET BLDG & PP"
                                                                                         value="1"/>
                        </p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <input type="text" name="property_other_one" placeholder="Other 1"/>

                    </td>
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_coverage_other_one_limit"
                                                                              placeholder="Other 1"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                    </td>
                    <td style="width:51pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <input type="text" name="property_other_two" placeholder="Other 2"/>
                    </td>
                    <td style="width:57pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="property_coverage_other_two_limit"
                                                                              placeholder="Other 2"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="4">
                    </td>
                    <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="3" rowspan="4">
                        <p class="s5" style="padding-left: 15pt; text-indent: 0pt; line-height: 7pt; text-align: left;">
                            INLAND MARINE</p>
                        <p class="s2"
                           style="padding-top: 5pt; padding-left: 15pt; padding-right: 63pt; text-indent: -14pt; line-height: 190%; text-align: left;">

                            <input type="checkbox" name="inland_causes" value="1"/>
                            CAUSES OF LOSS NAMED PERILS
                        </p>

                    </td>
                    <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">TYPE OF POLICY:
                            <input type="text" name="inland_policy_type" placeholder="Policy Type"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="4">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="inland_policy_effective_date"
                                                                              placeholder="Effective Date"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="4">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="inland_policy_expiration_date"
                                                                              placeholder="Expiration Date"/></p>
                    </td>
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="4">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox" name=""/></p>
                    </td>
                    <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="4">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_one"
                                                                              placeholder="Other 1"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_two"
                                                                              placeholder="Other 2"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_three"
                                                                              placeholder="Other 3"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="inland_coverage_four"
                                                                              placeholder="Other 3"/></p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="inland_coverage_one_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="inland_coverage_two_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <p class="s2" style="padding-left: 1pt; text-indent: 0pt; text-align: left;">POLICY NUMBER:
                            <input type="text" name="inland_policy_number" placeholder="POLICY NUMBER"/></p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="inland_coverage_three_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="inland_coverage_four_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"></p>
                    </td>
                    <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="3" rowspan="3">
                        <p class="s5"
                           style="padding-right: 71pt; text-indent: 0pt; line-height: 7pt; text-align: center;">

                            CRIME</p>
                        <p class="s2" style="padding-right: 72pt; text-indent: 0pt; text-align: center;">TYPE OF POLICY:
                            <input type="text" name="crime_policy_type" placeholder="Policy Type"/></p>
                    </td>
                    <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_policy_number"
                                                                              placeholder="Policy Number"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_effective_date"
                                                                              placeholder="Effective Date"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_expiration_date"
                                                                              placeholder="Expiration Date"/></p>
                    </td>
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                    </td>
                    <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_coverage_one"
                                                                              placeholder="Coverage One"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_coverage_two"
                                                                              placeholder="Coverage Two"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="crime_coverage_three"
                                                                              placeholder="Coverage Three"/></p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="crime_coverage_one_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="crime_coverage_two_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s10" style="padding-top: 2pt; padding-left: 1pt; text-indent: 0pt; text-align: left;">
                            <input type="text" name="crime_coverage_three_limit" placeholder="Limit"/></p>
                    </td>
                </tr>


                <tr style="height:12pt">
                    <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"></p>
                    </td>
                    <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="3" rowspan="3">
                        <p class="s5"
                           style="padding-right: 71pt; text-indent: 0pt; line-height: 7pt; text-align: center;">

                            BOILER MACHINERY / EQUIPMENT BREAKDOWN</p>

                    </td>
                    <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="machinery_policy_number"
                                                                              placeholder="Policy Number"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="machinery_effective_date"
                                                                              placeholder="Effective Date"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="machinery_expiration_date"
                                                                              placeholder="Expiration Date"/></p>
                    </td>
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                    </td>
                    <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="machinery_coverage_one"
                                                                              placeholder="Coverage One"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="machinery_coverage_two"
                                                                              placeholder="Coverage Two"/></p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="machinery_coverage_one_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="machinery_coverage_two_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:122pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="3">
                        <p style="text-indent: 0pt; text-align: left;"></p>
                    </td>

                </tr>

                <tr style="height:12pt">
                    <td style="width:19pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"></p>
                    </td>
                    <td style="width:122pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="3" rowspan="3">
                        <p class="s5"
                           style="padding-right: 71pt; text-indent: 0pt; line-height: 7pt; text-align: center;">
                            <input type="text" name="other_type" placeholder="Policy Number"/>
                        </p>

                    </td>
                    <td style="width:138pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_policy_number"
                                                                              placeholder="Policy Number"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_effective_date"
                                                                              placeholder="Effective Date"/></p>
                    </td>
                    <td style="width:65pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_expiration_date"
                                                                              placeholder="Expiration Date"/></p>
                    </td>
                    <td style="width:14pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="checkbox"/></p>
                    </td>
                    <td style="width:76pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="3">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_coverage_one"
                                                                              placeholder="Coverage One"/></p>
                        <p style="text-indent: 0pt; text-align: left;"><input type="text" name="other_coverage_two"
                                                                              placeholder="Coverage Two"/></p>
                    </td>
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="other_coverage_one_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:78pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p style="text-indent: 0pt; text-align: left;"><input type="text"
                                                                              name="other_coverage_two_limit"
                                                                              placeholder="Limit"/></p>
                    </td>
                </tr>
                <tr style="height:12pt">
                    <td style="width:122pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="3">
                        <p style="text-indent: 0pt; text-align: left;"></p>
                    </td>

                </tr>

                <tr style="height:67pt">
                    <td style="width:577pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        colspan="10">
                        <p class="s8" style="padding-left: 2pt; text-indent: 0pt; text-align: left;">
                            SPECIAL CONDITIONS / OTHER COVERAGES (ACORD 101, Additional Remarks Schedule, may be
                            attached if more space is required)
                        </p>
                        <textarea rows="5" name="special_condition"></textarea>
                    </td>
                </tr>
            </table>
            <p style="padding-left: 9pt; text-indent: 0pt; text-align: left;">
                CERTIFICATE HOLDER <span style="margin-left: 14.5%;">CANCELLATION</span>
            </p>
            <table style="border-collapse:collapse; margin-left:6pt; width:99%" cellspacing="0">
                <tr style="height:47pt">
                    <td style="width:289pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt"
                        rowspan="2">
                        <textarea rows="5" name="certificate_holder"
                                  placeholder="Enter Certificate Holder Details"></textarea>
                    </td>
                    <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s12"
                           style="padding-left: 9pt; padding-right: 20pt; text-indent: 0pt; line-height: 112%; text-align: left;">
                            SHOULD ANY OF THE ABOVE DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION DATE THEREOF,
                            NOTICE WILL BE DELIVERED IN
                            <span class="s9">ACCORDANCE WITH THE POLICY PROVISIONS.</span>
                        </p>
                    </td>
                </tr>
                <tr style="height:35pt">
                    <td style="width:288pt; border-top-style:solid; border-top-width:2pt; border-left-style:solid; border-left-width:2pt; border-bottom-style:solid; border-bottom-width:2pt; border-right-style:solid; border-right-width:2pt">
                        <p class="s2" style="padding-left: 2pt; text-indent: 0pt; text-align: left;">
                            AUTHORIZED REPRESENTATIVE: <input type="text" name="authorize_representative"/>
                        </p>
                    </td>
                </tr>
            </table>
            <p style="padding-left: 9pt; text-indent: 0pt; text-align: left;">
                ACORD 24 (2016/03) <span
                    style="margin-left: 21.5%;">@1995-2015 ACORD CORPORATION. All rights reserved.</span>
            </p>
            <p style="margin-left: 10%; text-indent: 0pt; text-align: left;">
                The ACORD name and logo are registered marks of ACORD
            </p>


            <div class="row mt-12 mt-3 ">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                    <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
                </div>
            </div>

    </form>
@endsection
