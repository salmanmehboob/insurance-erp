<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACORD Agent/Broker of Record Change Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Form styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .form-container {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 30px;
        }

        .acord-logo {
            max-width: 120px;
            margin-bottom: 10px;
        }

        .form-label {
            font-weight: 600;
            font-size: 0.9rem;
        }

        /* Print view styling */
        .print-view {
            width: 100%;
            height: 279.4mm; /* Letter height */
            margin: 0 auto;
            /* background-color: white; */
            /* padding: 15px; */
            font-family: Arial, sans-serif;
            /* box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); */
            position: relative;
            overflow: hidden;
        }

        /* Print styling for Letter paper */
        @media print {
            @page {
                size: letter landscape;
                margin: 0.5cm;
            }

            body {
                margin: 0;
                padding: 0;
                background-color: white;
                width: 100%;
            }

            .print-view {
                width: 100%;
                max-width: none;
                padding: 10px;
                margin: 0;
                transform: scale(0.95);
                transform-origin: top center;
            }

            .acord-form {
                width: 100%;
                max-width: none;
                transform: none;
            }

            .acord-form-content {
                width: 100%;
            }

            /* Adjust table widths */
            .acord-table {
                width: 100%;
                table-layout: fixed;
            }

            .acord-row {
                width: 100%;
            }

            /* Adjust cell widths */
            .acord-cell {
                padding: 3px;
            }

            .no-print, .buttons-container {
                display: none !important;
            }

            /* Force all text to black for print */
            * {
                color: black !important;
            }

            /* Adjust font sizes for better fit */
            .acord-value {
                font-size: 6pt;
            }

            .acord-label {
                font-size: 4pt;
            }

            /* Reduce some spacing */
            .acord-signature {
                margin: 12px 8px;
            }

            .acord-footer {
                margin-top: 15px;
            }

            /* Text section font size updates */
            div[style*="font-size: 8pt"] {
                font-size: 7pt !important;
            }

            div[style*="font-size: 6pt"] {
                font-size: 5pt !important;
            }

            td, th {
                padding: 3px !important;
            }
        }

        /* ACORD form specific styling */
        .acord-form {
            width: 100%;
            margin: 0 auto;
        }

        .acord-form-content {
            border: 1px solid #000;
            width: 100%;
        }

        /* Header section specific styling */
        .acord-header {
            display: flex;
            align-items: center;
            /* border-bottom: 1px solid #000; */
        }

        .acord-logo-print {
            width: 80px;
        }

        .acord-title {
            flex-grow: 1;
            text-align: center;
            font-size: 11pt;
            font-weight: bold;
            padding: 0 10px;
        }

        .acord-date {
            border: 1px solid #000;
            padding: 3px;
            width: 120px;
            text-align: center;
            border-bottom:none !important;
        }

        .acord-date-label {
            font-size: 7pt;
            font-weight: bold;
        }

        .acord-row {
            display: flex;
            border-bottom: 1px solid #000;
        }

        .acord-cell {
            border-right: 1px solid #000;
            /* padding: 5px; */
            
        }

        .acord-cell:last-child {
            border-right: none;
        }

        .acord-label {
            font-size: 5pt;
            font-weight: bold;
        }

        .acord-value {
            font-size: 7pt;
            min-height: 16px;
        }

        .acord-checkbox {
            margin-right: 5px;
        }

        .acord-table {
            width: 100%;
            border-collapse: collapse;
        }

        .acord-table th,
        .acord-table td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
            font-size: 7pt;
        }

        .acord-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .acord-text {
            font-size: 7pt;
            margin: 8px 0;
            padding: 0 8px;
        }

        .acord-signature {
            margin: 20px 10px;
            display: flex;
        }

        .acord-sign-field {
            flex: 1;
            border-top: 1px solid #000;
            margin: 0 5px;
            text-align: center;
            padding-top: 2px;
        }

        .acord-sign-label {
            font-size: 5pt;
            text-align: center;
        }

        .acord-footer {
            text-align: center;
            font-size: 5pt;
            margin: 12px 0;
        }

        /* Agency section styling */
        td[style*="font-weight: bold; font-size: 8pt;"],
        td[style*="font-size: 8pt; font-weight: bold;"],
        div[style*="font-weight: bold; font-size: 8pt;"] {
            font-size: 7pt !important;
        }

        #print-agencyPhone,
        #print-agencyFax,
        #print-newAgencyName,
        #print-agencyAddress,
        #print-agencyCity,
        #print-agencyState,
        #print-agencyZip,
        #print-insuredCompanyName,
        #print-agencyEmail,
        #print-agencyCode,
        #print-agencySubCode,
        #print-currentAgency,
        #print-currentProducer {
            font-size: 8pt;
        }

        /* Insurance company section */
        div[style*="font-weight: bold; font-size: 8pt;"] {
            font-size: 6pt !important;
        }

        /* Email and code sections */
        .acord-cell div[style*="font-weight: bold; font-size: 8pt;"] {
            font-size: 6pt !important;
            padding: 1px 2px !important;
        }

        /* Adjust cell padding in header section */
        .acord-row:nth-child(-n+4) .acord-cell {
            padding: 2px 3px;
        }

        @media print {
            .acord-title {
                font-size: 9pt;
            }

            #print-agencyPhone,
            #print-agencyFax,
            #print-newAgencyName,
            #print-agencyAddress,
            #print-agencyCity,
            #print-agencyState,
            #print-agencyZip,
            #print-insuredCompanyName,
            #print-agencyEmail,
            #print-agencyCode,
            #print-agencySubCode,
            #print-currentAgency,
            #print-currentProducer {
                font-size: 6pt;
            }

            td[style*="font-weight: bold"],
            div[style*="font-weight: bold"] {
                font-size: 5pt !important;
            }
        }

        /* Text section styling */
        div[style*="font-size: 10pt; line-height: 1.6;"] {
            font-size: 9pt !important;
            line-height: 1.4 !important;
            padding: 0px 30px !important;
        }

        /* Producer section styling */
        div[style*="text-align: center; margin-top: 1px; font-size: 8pt;"] {
            font-size: 6pt !important;
            margin-top: 0px !important;
        }

        /* Signature section styling */
        .acord-signature {
            margin: 8px 10px;
        }

        .acord-sign-field {
            margin: 0 3px;
            padding-top: 1px;
        }

        .acord-sign-label {
            font-size: 5pt;
            text-align: center;
            margin-top: 1px;
        }

        /* City/State/Zip row */
        .acord-signature:last-of-type {
            margin-bottom: 15px;
        }

        /* Footer styling */
        .acord-footer {
            text-align: center;
            font-size: 5pt;
            margin: 8px 0;
            line-height: 1.2;
        }

        @media print {
            /* Text section */
            div[style*="font-size: 10pt; line-height: 1.6;"] {
                font-size: 8pt !important;
                line-height: 1.3 !important;
            }

            /* Signature section */
            .acord-signature span {
                font-size: 8pt;
            }

            .acord-sign-label {
                font-size: 5pt;
                margin-top: 0;
            }

            /* Reduce spacing */
            .acord-signature {
                margin: 6px 8px;
            }

            /* Footer */
            .acord-footer {
                font-size: 5pt;
                margin: 6px 0;
                line-height: 1.1;
            }
        }

        /* Dynamic content styling */
        #print-formDate,
        #print-agencyPhone,
        #print-agencyFax,
        #print-newAgencyName,
        #print-agencyAddress,
        #print-agencyCity,
        #print-agencyState,
        #print-agencyZip,
        #print-insuredCompanyName,
        #print-agencyEmail,
        #print-agencyCode,
        #print-agencySubCode,
        #print-currentAgency,
        #print-currentProducer,
        #print-agencyCustomerId,
        #print-namedInsured,
        #print-policyNumber,
        #print-effectiveDate,
        #print-expirationDate,
        #print-lineOfBusiness,
        #print-insuredSignature,
        #print-signatureDate,
        #print-title,
        #print-companyName,
        #print-insuredStreetAddress,
        #print-insuredCityField,
        #print-insuredStateField,
        #print-insuredZipField {
            font-size: 6.5pt !important;
        }

        /* Table data styling */
        .acord-table td {
            font-size: 6.5pt;
        }

        /* Signature values */
        .acord-sign-field span {
            font-size: 6.5pt;
        }

        @media print {
            /* Dynamic content in print */
            #print-formDate,
            #print-agencyPhone,
            #print-agencyFax,
            #print-newAgencyName,
            #print-agencyAddress,
            #print-agencyCity,
            #print-agencyState,
            #print-agencyZip,
            #print-insuredCompanyName,
            #print-agencyEmail,
            #print-agencyCode,
            #print-agencySubCode,
            #print-currentAgency,
            #print-currentProducer,
            #print-agencyCustomerId,
            #print-namedInsured,
            #print-policyNumber,
            #print-effectiveDate,
            #print-expirationDate,
            #print-lineOfBusiness,
            #print-insuredSignature,
            #print-signatureDate,
            #print-title,
            #print-companyName,
            #print-insuredStreetAddress,
            #print-insuredCityField,
            #print-insuredStateField,
            #print-insuredZipField {
                font-size: 6pt !important;
            }

            /* Table data in print */
            .acord-table td {
                font-size: 6pt;
            }

            /* Signature values in print */
            .acord-sign-field span {
                font-size: 6pt;
            }
        }
    </style>
</head>

<body>
<div class="container my-4">
    <div class="row">
        <div class="col-12 mb-4 buttons-container">
            <h1 class="text-center mb-4">ACORD Agent/Broker of Record Change Form</h1>
            <div class="d-flex justify-content-end no-print">
                <button id="printFormBtn" class="btn btn-secondary">Print Form</button>
            </div>
        </div>

        <!-- Printable View Section - Styled exactly like ACORD Form -->
        <div class="print-view" id="printView">
            <div class="acord-form">
                <!-- Header -->
                <div class="acord-header">
                    <img
                        src="data:image/jpg;base64,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"
                        alt="ACORD Logo" class="acord-logo-print">
                    <div class="acord-title">AGENT/BROKER OF RECORD CHANGE</div>
                    <div class="acord-date">
                        <div class="acord-date-label">DATE (MM/DD/YYYY)</div>
                        <div id="print-formDate">{{ $form->creation_date ?? now()->format('m/d/Y') }}</div>
                        <!-- Assuming there's a date attribute -->
                    </div>
                </div>
                <div class="acord-form-content">
                <!-- First row - Agency and Phone -->
                    <div class="acord-row" >
                        <div class="acord-cell" style="width: 50%; border-top:none;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <tr>
                                    <td style="font-weight: bold; font-size: 8pt; border-right: 1px solid #000; padding: 2px; width: 70px;">
                                        NEW AGENCY
                                    </td>
                                    <td style="width: 100px; border-bottom: 1px solid #000;font-size: 8pt; font-weight: bold; padding: 2px; vertical-align: top;">
                                        PHONE<br>(A/C, No, Ext):
                                    </td>
                                    <td style="border-bottom: 1px solid #000; padding: 2px; vertical-align: top;">
                                        <div id="print-agencyPhone">{{ $form->agency_phone ?? '' }}</div>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="border-right: 1px solid #000; padding: 2px;"></td>
                                    <td style="font-size: 8pt; font-weight: bold; border-bottom: 1px solid #000; padding: 2px; vertical-align: top;">
                                        FAX<br>(A/C, No):
                                    </td>
                                    <td style="padding: 2px; vertical-align: top; border-bottom: 1px solid #000;">
                                        <div id="print-agencyFax">{{ $form->agency_fax ?? '' }}</div>
                                    </td>
                                </tr>
                            </table>
                            <div id="print-newAgencyName" ">{{ $form->agency_name ?? '' }}</div>
                            <div id="print-agencyAddress" ">{{ $form->agency_address ?? '' }}</div>
                            <div ">
                                <span id="print-agencyCity">{{ $form->agency_city ?? '' }}</span>
                                <span id="print-agencyState">{{ $form->agency_state ?? '' }}</span>
                                <span id="print-agencyZip">{{ $form->agency_zip ?? '' }}</span>
                            </div>
                        </div>
                        <div class="acord-cell" style="width: 50%; border-top:none;">
                            <div style="font-weight: bold; font-size: 8pt; padding: 2px;">
                                INSURANCE COMPANY NAME
                            </div>
                            <div id="print-insuredCompanyName">{{ $form->insurance_company_name ?? '' }}</div>
                            <div id="print-agencyAddress"
                                ">{{ $form->insurance_company_address ?? '' }}</div>
                            <div ">
                                <span id="print-agencyCity">{{ $form->insurance_company_city ?? '' }}</span>
                                <span id="print-agencyState">{{ $form->insurance_company_state ?? '' }}</span>
                                <span id="print-agencyZip">{{ $form->insurance_company_zipcode ?? '' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Second row - Email -->
                    <div class="acord-row">
                        <div class="acord-cell" style="width: 50%; display: flex; justify-content: space-between;">
                            <div style="font-weight: bold; font-size: 8pt; padding: 2px;">
                                E-MAIL ADDRESS:
                            </div>
                            <div id="print-agencyEmail">{{ $form->email ?? '' }}</div>
                        </div>
                        <div class="acord-cell" style="width: 50%;"></div>
                    </div>

                    <!-- Third row - Codes and Current Agency -->
                    <div class="acord-row">
                        <div class="acord-cell" style="width: 25%; display: flex; justify-content: space-between;">
                            <div style="font-weight: bold; font-size: 8pt; padding: 2px;">
                                CODE:
                            </div>
                            <div id="print-agencyCode">{{ $form->code ?? '' }}</div>
                        </div>
                        <div class="acord-cell" style="width: 25%; display: flex; justify-content: space-between;">
                            <div style="font-weight: bold; font-size: 8pt; padding: 2px;">
                                SUB CODE:
                            </div>
                            <div id="print-agencySubCode">{{ $form->sub_code ?? '' }}</div>
                        </div>
                        <div class="acord-cell" style="width: 25%; display: flex; justify-content: space-between;">
                            <div style="font-weight: bold; font-size: 8pt; padding: 2px;">
                                CURRENT AGENCY:
                            </div>
                            <div id="print-currentAgency">{{ $form->current_agency ?? '' }}</div>
                        </div>
                        <div class="acord-cell" style="width: 25%; display: flex; justify-content: space-between;">
                            <div style="font-weight: bold; font-size: 8pt; padding: 2px;">
                                CURRENT PRODUCER:
                            </div>
                            <div id="print-currentProducer">{{ $form->current_producer ?? '' }}</div>
                        </div>
                    </div>

                    <!-- Fourth row - Agency Customer ID -->
                    <div class="acord-row" style="border-bottom:none;">
                        <div class="acord-cell" style="width: 100%; display: flex; justify-content: start;">
                            <div style="font-weight: bold; font-size: 8pt; padding: 2px;">
                                AGENCY CUSTOMER ID:
                            </div>
                            <div id="print-agencyCustomerId" style="margin-left: 10px; font-size: 8pt;">{{ $form->agency_customer_id ?? '' }}</div>
                        </div>
                    </div>

                    <!-- Policy Information Table -->
                    <table class="acord-table">
                        <thead>
                        <tr>
                            <th style="width: 25%; border-left:none;">NAMED INSURED<br>(AS IT APPEARS ON POLICY)</th>
                            <th style="width: 20%;">POLICY NUMBER(S)</th>
                            <th style="width: 15%;">EFFECTIVE DATE</th>
                            <th style="width: 15%;">EXPIRATION DATE</th>
                            <th style="width: 25%; border-right:none;">LINE OF BUSINESS</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($form->companies->take(6) as $company)
                            <tr>
                                <td  style="border-left:none;" id="print-namedInsured">{{ $company->name ?? '' }}</td>
                                <td id="print-policyNumber">{{ $company->policy_number ?? '' }}</td>
                                <td id="print-effectiveDate">{{ $company->effective_date ?? '' }}</td>
                                <td id="print-expirationDate">{{ $company->expiration_date ?? '' }}</td>
                                <td style="border-right:none;" id="print-lineOfBusiness">{{ $company->line_of_business ?? '' }}</td>
                            </tr>
                        @endforeach
                        @for($i = count($form->companies->take(6)); $i < 6; $i++)
                            <tr>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        @endfor
                        </tbody>
                    </table>
           

                    <!-- Text section -->
                    <div style="font-size: 10pt; line-height: 1.6; padding: 0px 50px; font-weight: 600;">
                        <div>
                            Please be advised that we wish to name
                            <span
                                style="display: inline-block; width: 300px; border-bottom: 1px solid black;">{{$form->advice_producer_name}}</span>
                            <div style="text-align: center; margin-top: 1px; font-size: 8pt; margin-right: 20px;">PRODUCER</div>
                        </div>

                        <div>
                            <span
                                style="display: inline-block; width: 150px; border-bottom: 1px solid black;">{{$form->code}}</span>
                            as our exclusive representative effective
                            <span
                                style="display: inline-block; width: 150px; border-bottom: 1px solid black; margin-left: 10px;">{{$form->advice_producer_effective_date}}</span>
                            <div style="display: flex; justify-content: space-between; margin-top: 2px; font-size: 8pt;">
                                <span style="width: 150px;">CODE #</span>
                                <span style="width: 333px; text-align: center; margin-left: 180px;">DATE</span>
                            </div>
                        </div>

                        <div>
                            for the lines of business shown above, currently in force or submitted by application.
                        </div>

                        <div>
                            This authorization replaces any other authorization that may have been previously completed for any
                            other insurance representative for the stated lines of business.
                        </div>
                    </div>

                    <!-- Signature section -->
                    <div class="acord-signature">
                        <div class="acord-sign-field" style="width: 60%;">
                            <span id="print-insuredSignature">{{ $form->insured_signature ?? '' }}</span>
                            <div class="acord-sign-label">INSURED SIGNATURE</div>
                        </div>
                        <div class="acord-sign-field" style="width: 40%;">
                            <span id="print-signatureDate">{{ $form->issued_date ?? '' }}</span>
                            <div class="acord-sign-label">DATE</div>
                        </div>
                    </div>

                    <div class="acord-signature">
                        <div class="acord-sign-field">
                            <span id="print-title">{{ $form->insured_title ?? '' }}</span>
                            <div class="acord-sign-label">TITLE (IF APPLICABLE)</div>
                        </div>
                    </div>

                    <div class="acord-signature">
                        <div class="acord-sign-field">
                            <span id="print-companyName">{{ $form->insured_company_name ?? '' }}</span>
                            <div class="acord-sign-label">COMPANY NAME (IF APPLICABLE)</div>
                        </div>
                    </div>

                    <div class="acord-signature">
                        <div class="acord-sign-field">
                            <span id="print-insuredStreetAddress">{{ $form->insured_company_address ?? '' }}</span>
                            <div class="acord-sign-label">STREET ADDRESS OF INSURED</div>
                        </div>
                    </div>

                    <div class="acord-signature">
                        <div class="acord-sign-field" style="width: 40%;">
                            <span id="print-insuredCityField">{{ $form->insured_company_city ?? '' }}</span>
                            <div class="acord-sign-label">CITY OF INSURED</div>
                        </div>
                        <div class="acord-sign-field" style="width: 30%;">
                            <span id="print-insuredStateField">{{ $form->insured_company_state ?? '' }}</span>
                            <div class="acord-sign-label">STATE OF INSURED</div>
                        </div>
                        <div class="acord-sign-field" style="width: 30%;">
                            <span id="print-insuredZipField">{{ $form->insured_company_zipcode ?? '' }}</span>
                            <div class="acord-sign-label">ZIP CODE OF INSURED</div>
                        </div>
                    </div>

                    <div class="acord-footer">
                        ACORD 36 (2007/01) © ACORD CORPORATION 1996-2007. All rights reserved.<br>
                        The ACORD name and logo are registered marks of ACORD.
                    </div>
                </div>
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
