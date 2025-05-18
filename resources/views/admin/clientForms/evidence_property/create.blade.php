@extends('admin.layouts.app')
@section('content')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 10px;
            font-size: 12px;
        }

        .container {
            border: 2px solid black;
            width: 100%;
            max-width: 750px;
            margin: 0 auto;
        }

        .header {
            display: flex;
            border-bottom: 2px solid black;
        }

        .logo {
            padding: 10px;
            width: 90px;
            font-weight: bold;
            font-style: italic;
            border-right: none;
        }

        .title {
            padding: 10px;
            flex-grow: 1;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 2px solid black;
        }

        .date-box {
            width: 120px;
            padding: 5px;
            border-left: 2px solid black;
        }

        .date-label {
            font-size: 9px;
            text-align: center;
        }

        .date-value {
            font-size: 11px;
            text-align: center;
            margin-top: 5px;
        }

        .disclaimer {
            padding: 10px;
            font-size: 10px;
            text-align: left;
            border-bottom: 2px solid black;
        }

        .bold {
            font-weight: bold;
        }

        .row {
            display: flex;
            border-bottom: 2px solid black;
        }

        .cell {
            padding: 5px;
            border-right: 2px solid black;
        }

        .cell:last-child {
            border-right: none;
        }

        .cell-label {
            font-size: 9px;
            font-weight: bold;
        }

        .cell-value {
            font-size: 11px;
            margin-top: 3px;
        }

        .section-title {
            font-weight: bold;
            font-size: 11px;
            padding: 5px 10px;
            border-bottom: 1px solid black;
        }

        .coverage-table {
            width: 100%;
            border-collapse: collapse;
        }

        .coverage-table th {
            font-size: 9px;
            font-weight: bold;
            text-align: center;
            padding: 5px;
            border: 2px solid black;
        }

        .coverage-table td {
            border: 2px solid black;
            padding: 5px;
            height: 100px;
        }

        .coverage-perils {
            display: flex;
            margin-top: 5px;
        }

        .checkbox-row {
            display: flex;
            align-items: center;
            margin-top: 5px;
        }

        .checkbox-label {
            font-size: 10px;
            margin-left: 5px;
        }

        .cancellation {
            border: 1px solid black;
            padding: 10px;
            margin: 5px 0;
            font-size: 10px;
        }

        .footer {
            font-size: 9px;
            padding: 5px 10px;
        }

        /* Form element styles to maintain design */
        input[type="text"], textarea {
            border: none;
            background: lightgray;
            font-size: inherit;
            font-family: inherit;
            padding: 0;
            margin: 0;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="checkbox"] {
            margin-right: 3px;
        }

        /* Adjust specific field widths */
        .address-line {
            display: block;
            margin-bottom: 10px;
        }

        .city-state-zip {
            display: flex;
            gap: 5px;
        }

        .city-state-zip input[name$="city"] {
            width: 60%;
        }

        .city-state-zip input[name$="state"] {
            width: 15%;
        }

        .city-state-zip input[name$="zip"] {
            width: 25%;
        }
    </style>
    <form action="{{ route('store-evidence/of/property') }}" method="POST">
        @csrf
        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">

        <div class="container">
        <div style="width: 100%; border: 1px solid black; box-sizing: border-box;">
            <!-- Header Row -->
            <div style="display: flex; width: 100%;">
                <div style="width: 20%; padding: 10px; box-sizing: border-box;">
                    <img src="https://i.ibb.co/GfrMJ73J/Untitled-design.png" alt="ACORD Logo" style="max-width: 100%;" />
                </div>
                <div style="width: 60%; text-align: center; font-size: 24px; font-weight: bold; padding: 10px; box-sizing: border-box;">
                    EVIDENCE OF PROPERTY INSURANCE
                </div>
                <div style="width: 20%; border-left: 2px solid black; padding: 10px; box-sizing: border-box;">
                    <div style="font-weight: bold;">DATE (MM/DD/YYYY)</div>
                    <div style="text-align: center; margin-top: 5px;">
                        <input type="text" name="invoice_date" value="02/23/2025" style="text-align: center;" />
                    </div>
                </div>
            </div>

            <!-- Disclaimer Row -->
            <div style="border-top: 2px solid black; padding: 10px; font-weight: bold; font-size: 12px; box-sizing: border-box;">
                THIS EVIDENCE OF PROPERTY INSURANCE IS ISSUED AS A MATTER OF INFORMATION ONLY AND CONFERS NO RIGHTS UPON THE ADDITIONAL INTEREST NAMED BELOW. THIS EVIDENCE DOES NOT AFFIRMATIVELY OR NEGATIVELY AMEND, EXTEND OR ALTER THE COVERAGE AFFORDED BY THE POLICIES BELOW. THIS EVIDENCE OF INSURANCE DOES NOT CONSTITUTE A CONTRACT BETWEEN THE ISSUING INSURER(S), AUTHORIZED REPRESENTATIVE OR PRODUCER, AND THE ADDITIONAL INTEREST.
            </div>

            <!-- Agency and Company Row -->
            <div style="display: flex; width: 100%; border-top: 2px solid black; box-sizing: border-box;">
                <!-- Left Column -->
                <div style="width: 50%; box-sizing: border-box;">
                    <div style="border-bottom: 2px solid black; padding: 5px; font-weight: bold; box-sizing: border-box;">AGENCY</div>
                    <div style="padding: 10px; box-sizing: border-box;">
                        <input type="text" name="agency_name" placeholder="Agency Name" value="Aim Insurance Of Texas" class="address-line" />
                        <input type="text" name="agency_address" placeholder="Address" value="3322 Shaver St" class="address-line" />
                         <div class="city-state-zip">
                            <input type="text" name="agency_city" placeholder="City" value="Pasadena" />
                            <input type="text" name="agency_state" placeholder="State" value="TX" />
                            <input type="text" name="agency_zip" placeholder="Zip Code" value="77504" />
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div style="width: 50%; border-left: 2px solid black; box-sizing: border-box;">
                    <div style="display: flex;">
                        <div style="width: 30%; padding: 5px; font-weight: bold; border-bottom: 2px solid black; box-sizing: border-box;">PHONE<br />(A/C, No, Ext):</div>
                        <div style="width: 70%; padding: 5px; border-bottom: 2px solid black; box-sizing: border-box;">
                            <input type="text" name="agency_phone" placeholder="Phone No" value="(713)947-3434" />
                        </div>
                    </div>
                    <div style="padding: 5px; font-weight: bold; box-sizing: border-box;">COMPANY</div>
                    <div style="padding: 40px 10px; box-sizing: border-box;">
                        <input type="text" name="company_name" placeholder="Company Name" value="No Company Selected" />
                    </div>
                </div>
            </div>

            <!-- FAX and Email Row -->
            <div style="display: flex; width: 100%; border-top: 2px solid black; box-sizing: border-box;">
                <div style="width: 30%; border-right: 2px solid black; padding: 5px; box-sizing: border-box;">
                    <div style="font-weight: bold;">FAX<br />(A/C, No):</div>
                    <input type="text" name="agency_fax" placeholder="Fax" value="(713)946-3969" />
                </div>
                <div style="width: 70%; padding: 5px; box-sizing: border-box;">
                    <div style="font-weight: bold;">E-MAIL<br />ADDRESS:</div>
                    <input type="text" name="agency_email" placeholder="Email Address" value="" />
                </div>
            </div>

            <!-- CODE Row -->
            <div style="display: flex; width: 100%; border-top: 2px solid black; box-sizing: border-box;">
                <div style="width: 50%; border-right: 2px solid black; padding: 5px; box-sizing: border-box;">
                    <div style="font-weight: bold;">CODE:</div>
                    <input type="text" name="agency_code" placeholder="CODE" value="" />
                </div>
                <div style="width: 50%; padding: 5px; box-sizing: border-box;">
                    <div style="font-weight: bold;">SUB CODE:</div>
                    <input type="text" name="agency_subcode" placeholder="SUB CODE" value="" />
                </div>
            </div>

            <!-- AGENCY CUSTOMER ID Row -->
            <div style="width: 100%; border-top: 2px solid black; padding: 5px; box-sizing: border-box;">
                <div style="font-weight: bold;">AGENCY<br />CUSTOMER ID #:</div>
                <input type="text" name="agency_customer_id" placeholder="AGENCY CUSTOMER ID" value="" />
            </div>

            <!-- INSURED and LOAN NUMBER Row -->
            <div style="display: flex; width: 100%; border-top: 2px solid black; box-sizing: border-box;">
                <!-- Left Column -->
                <div style="width: 50%; box-sizing: border-box;">
                    <div style="border-bottom: 2px solid black; padding: 5px; font-weight: bold; box-sizing: border-box;">INSURED</div>
                    <div style="padding: 10px; box-sizing: border-box;">
                        <input type="text" name="insured_name" placeholder="Name" value="JJH CONSTRUCTION LLC" class="address-line" />
                        <input type="text" name="insured_address" placeholder="Address" value="22402 Sierra Lake Ct" class="address-line" />
                         <div class="city-state-zip">
                            <input type="text" name="insured_city" placeholder="City" value="Katy" />
                            <input type="text" name="insured_state" placeholder="State" value="TX" />
                            <input type="text" name="insured_zip" placeholder="Zip Code" value="77494" />
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div style="width: 50%; border-left: 2px solid black; box-sizing: border-box;">
                    <div style="border-bottom: 2px solid black; padding: 5px; font-weight: bold; box-sizing: border-box;">LOAN NUMBER</div>
                    <div style="display: flex; height: 77px;">
                        <div style="width: 67%; border-right: 2px solid black; height: 100%; box-sizing: border-box;">
                            <input type="text" name="loan_number" placeholder="Loan No" value="" />
                        </div>
                        <div style="width: 33%; box-sizing: border-box;">
                            <div style="border-bottom: 2px solid black; padding: 5px; font-weight: bold; box-sizing: border-box;">POLICY NUMBER</div>
                            <input type="text" name="policy_number" placeholder="Policy Number" value=""  />
                        </div>
                    </div>

                    <div style="display: flex; border-top: 2px solid black; box-sizing: border-box;">
                        <div style="width: 33%; border-right: 2px solid black; box-sizing: border-box;">
                            <div style="padding: 5px; font-weight: bold; text-align: center; box-sizing: border-box;">EFFECTIVE DATE</div>
                            <input type="text" name="effective_date" placeholder="Effective Date" value="8/10/2021" style="text-align: center;" />
                        </div>
                        <div style="width: 34%; border-right: 2px solid black; box-sizing: border-box;">
                            <div style="padding: 5px; font-weight: bold; text-align: center; box-sizing: border-box;">EXPIRATION DATE</div>
                            <input type="text" name="expiration_date" placeholder="Expiration Date" value="8/10/2022" style="text-align: center;" />
                        </div>
                        <div style="width: 33%; box-sizing: border-box;">
                            <div style="padding: 5px; text-align: center; box-sizing: border-box;">
                                <div style="font-weight: bold; font-size: 10px;">CONTINUED UNTIL</div>
                                <div style="font-weight: bold; font-size: 10px;">TERMINATED IF CHECKED</div>
                                <input type="checkbox" name="is_terminated" value="1" />
                            </div>
                        </div>
                    </div>

                    <div style="border-top: 2px solid black; padding: 5px; font-weight: bold; box-sizing: border-box;">
                        THIS REPLACES PRIOR EVIDENCE DATED:
                        <input type="text" name="evidence_date" value="8/10/2022" style="width: 50%;" />
                    </div>
                </div>
            </div>
        </div>

        <!-- Property Info -->
        <div class="section-title">PROPERTY INFORMATION</div>
        <div style="padding: 10px;">
                <textarea name="property_information" placeholder="PROPERTY INFORMATION" style="width: 100%; height: 50px;"></textarea>
        </div>

        <!-- Coverage Info -->
        <div class="section-title">COVERAGE INFORMATION</div>
        <div style="padding: 10px;">
            <div style="font-weight: bold; font-size: 10px;">PERILS INSURED</div>
            <div class="coverage-perils">
                <div class="checkbox-row">
                    <input type="checkbox" name="perils_basic" value="1" />
                    <span class="checkbox-label">BASIC</span>
                </div>
                <div class="checkbox-row" style="margin-left: 10px;">
                    <input type="checkbox" name="perils_broad" value="1" />
                    <span class="checkbox-label">BROAD</span>
                </div>
                <div class="checkbox-row" style="margin-left: 10px;">
                    <input type="checkbox" name="perils_special" value="1" />
                    <span class="checkbox-label">SPECIAL</span>
                </div>
            </div>

            <div style="margin-top: 10px; font-size: 9px; font-weight: bold;">LOCATION/DESCRIPTION</div>
            <textarea name="location_description" placeholder="Description" style="width: 100%; height: 50px;"></textarea>

            <div class="cancellation" style="margin-top: 10px;">
                THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR THE POLICY PERIOD INDICATED. NOTWITHSTANDING ANY REQUIREMENT, TERM OR CONDITION OF ANY CONTRACT OR OTHER DOCUMENT WITH RESPECT TO WHICH THIS EVIDENCE OF PROPERTY INSURANCE MAY BE ISSUED OR MAY PERTAIN, THE INSURANCE AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS, EXCLUSIONS AND CONDITIONS OF SUCH POLICIES. LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.
            </div>

            <table class="coverage-table">
                <tr>
                    <th style="width: 70%;">COVERAGE / PERILS / FORMS</th>
                    <th style="width: 15%;">AMOUNT OF INSURANCE</th>
                    <th style="width: 15%;">DEDUCTIBLE</th>
                </tr>
                <tr>
                    <td><input type="text" name="coverage" placeholder="Coverage" style="width: 100%; height: 100%;" /></td>
                    <td><input type="text" name="amount" placeholder="Amount" style="width: 100%; height: 100%;" /></td>
                    <td><input type="text" name="deductible" placeholder="Deductible" style="width: 100%; height: 100%;" /></td>
                </tr>

            </table>
        </div>

        <!-- Remarks -->
        <div class="section-title">REMARKS (Including Special Conditions)</div>
        <textarea name="remarks" placeholder="REMARKS (Including Special Conditions)" style="width: 100%; height: 50px;"></textarea>

        <!-- Cancellation -->
        <div class="section-title">CANCELLATION</div>
        <div class="cancellation">
            SHOULD ANY OF THE ABOVE DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION DATE THEREOF, NOTICE WILL BE DELIVERED IN ACCORDANCE WITH THE POLICY PROVISIONS.
        </div>

        <!-- Additional Interest -->
        <div class="section-title">ADDITIONAL INTEREST</div>
        <div class="row">
            <div class="cell" style="width: 50%;">
                <div class="cell-label">NAME AND ADDRESS</div>
                <input type="text" name="additional_interest_name" placeholder="Name" class="address-line" />
                <input type="text" name="additional_interest_address" placeholder="Address" class="address-line" />
                <div class="city-state-zip">
                    <input type="text" name="additional_interest_city" placeholder="City" />
                    <input type="text" name="additional_interest_state" placeholder="State" />
                    <input type="text" name="additional_interest_zip" placeholder="Zip Code"/>
                </div>
            </div>
            <div class="cell" style="width: 50%;">
                <div class="checkbox-row">
                    <input type="checkbox" name="additional_insured" value="1"/>
                    <span class="checkbox-label">ADDITIONAL INSURED</span>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" name="lenders_loss_payable" value="1" />
                    <span class="checkbox-label">LENDER'S LOSS PAYABLE</span>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" name="loss_payee" />
                    <span class="checkbox-label">LOSS PAYEE</span>
                </div>
                <div class="checkbox-row">
                    <input type="checkbox" name="mortgagee" />
                    <span class="checkbox-label">MORTGAGEE</span>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="cell" style="width: 50%;">
                <div class="cell-label">LOAN #</div>
                <input type="text" name="additional_interest_loan" placeholder="Loan #" />
            </div>
        </div>

        <div class="row">
            <div class="cell" style="width: 50%;" colspan="2">
                <div class="cell-label">AUTHORIZED REPRESENTATIVE</div>
                <input type="text" name="authorized_representative" placeholder="AUTHORIZED REPRESENTATIVE" />
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            ACORD 27 (2016/03) © 1993-2015 ACORD CORPORATION. All rights reserved.<br>
            The ACORD name and logo are registered marks of ACORD
        </div>
    </div>
        <!-- Submit Button -->
        <div class="row mb-4 mt-4">
            <div class="col-10 text-end">
                <button type="submit" class="btn btn-primary ">Submit</button>
            </div>
        </div>

    </form>




@endsection
