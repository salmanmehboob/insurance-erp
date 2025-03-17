<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agent/Broker of Record Change</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            padding: 10px;
            color: black;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border: 1px solid #000;
            margin-bottom: 20px;
        }
        .title {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        table, th, td {
            border: 2px solid #000;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
            font-size: 14px;
        }
        th {
            font-weight: bold;
        }
        .logo {
            text-align: left;
            font-weight: bold;
            margin-bottom: 100px;
            width: 50px;
            height: 30px;
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            transform: scale(1.5); /* Makes the checkbox bigger */
            margin: 8px; /* Adds some space between the checkbox and the text */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="print-button">
        <button class="btn btn-primary" onclick="printPage()">Print</button>
    </div>
    <div class="row align-items-center ">
        <div class="col-auto logo">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlEWoadzCCwI9_Z2amcJ2wMJPHhJbbybrVbw&s" alt="">
        </div>
        <div class="col text-center title">
            AGENT/BROKER OF RECORD CHANGE
        </div>
        <div class="col-auto">
            <table class="border">
                <tr>
                    <td class="px-2 py-1 border">DATE <br>{{currentDate()}}</td>
                </tr>
            </table>
        </div>

        <div class="row">
            <table class="col-md-6 ">
                <tr>
                    <th rowspan="5"  class="text-start vertical-align: top; ">New Agency </th>

                </tr>
                <tr></tr>
                <tr></tr>
                <tr><th class="text-start" colspan="2">FAX (A/C, No):{{$form->agency->fax}} </th></tr>
                <tr></tr>

                <tr>
                    <th colspan="3" class="text-start">{{$form->agency->agency_name}}
                        <br>
                        {{$form->agency->address}}
                        <br><br>
                        {{$form->agency->city}} <span class="mx-5">{{$form->agency->state->name}} {{$form->agency->zip_code}}</span>
                    </th>

                </tr>
                <tr>
                    <th colspan="2" class="text-start" >Email Address :</th>
                    <th class="text-start" style="width: 50%;">FAX (A/C, No):{{$form->agency->fax}} </th>
                </tr>
                <tr>
                    <th class="text-start" style="width: 50%;">Code:  {{$form->code ?? ''}} </th>
                    <th class="text-start" colspan="2">Sub Code:  {{$form->sub_code ?? ''}} </th>
                </tr>
                <tr>
                    <th colspan="3" class="text-start" >Agency Customer ID:  {{$form->agency_customer_id ?? ''}}
                    </th>

                </tr>
                <tr>
                    <th colspan="3"  class="text-start" >INSURED
                        <br>
                        {{$form->client->policy->insuranceCompany->name}}
                        <br>
                        {{$form->client->policy->insuranceCompany->address}}
                        <br><br>
                        {{$form->client->policy->insuranceCompany->city}} <span class="mx-5">{{$form->client->policy->insuranceCompany->state->name}} {{$form->client->policy->insuranceCompany->zip_code}}</span>
                    </th>

                </tr>
            </table>
            <table class="col-md-6">
                <tr>
                    <th colspan="3" class="text-start">Insured Company Name
                        <br>
                        {{$form->insuranceCompany->name}}
                        <br>
                        {{$form->insuranceCompany->address}}
                        <br><br>
                        {{$form->insuranceCompany->city}} <span class="mx-5">{{$form->insuranceCompany->state->name}} {{$form->insuranceCompany->zip_code}} <br><br><br></span>
                    </th>
                </tr>
                <tr>
                    <th class="text-start">LOAN NUMBER: {{$form->loan_no}} </th>
                    <th colspan="2"  class="text-start">POLICY NUMBER: {{$form->client->policy->policy_nu}}  </th>
                </tr>
                <tr>
                    <th class="text-start">EFFECTIVE DATE: {{$form->client->policy->effective_date}}  </th>
                    <th class="text-start">EXPIRATION DATE: {{$form->client->policy->expiration_date}} </th>
                 @if($form->is_terminated === '1')
                    <th class="text-start"><input type="checkbox" class="custom-checkbox" checked disabled> CONTINUED UNTIL <br> TERMINATED IF CHECKED</th>

                    @else()
                    <th class="text-start"><input type="checkbox" class="custom-checkbox" disabled > CONTINUED UNTIL <br> TERMINATED IF CHECKED</th>
@endif
                </tr>
                <tr>
                    <th colspan="3" class="text-start" style="border: 2px solid black;"> THIS REPLACES PRIOR EVIDENCE DATE: {{$form->evidence_date}} </th>
                </tr>
            </table>
        </div>

        <div><h4>PROPERTY INFORMATION</h4></div>
        <div>
            <table class="table w-100 ">
                <tr>
                    <th colspan="2" class="text-start">LOCATION/DESCRIPTION :  {{$form->property_description}}</th>


                </tr>
                <tr>
                    <tH colspan="2" class="text-start" style="border: 2px solid black;">THE POLICIES OF INSURANCE LISTED BELOW HAVE BEEN ISSUED TO THE INSURED NAMED ABOVE FOR THE POLICY PERIOD INDICATED. <br>
                        NOTWITHSTANDING ANY REQUIREMENT, TERM OR CONDITION OF ANY CONTRACT OR OTHER DOCUMENT WITH RESPECT TO WHICH THIS EVIDENCE OF PROPERTY INSURANCE MAY BE ISSUED OR MAY PERTAIN,THE INSURANCE AFFORDED BY THE POLICIES DESCRIBED HEREIN IS SUBJECT TO ALL THE TERMS,EXCLUSIONS AND CONDITIONS OF SUCH POLICIES.LIMITS SHOWN MAY HAVE BEEN REDUCED BY PAID CLAIMS.</tH>
                </tr>

            </table>
        </div>
        <div class="col-md-3 mt-3">
            <h4>COVERAGE INFORMATION</h4>
        </div>
        <div class="col-md-6">
            <strong>
                @if($form->is_perils_insured === '1')
                PERILS INSURED <input type="checkbox" class="custom-checkbox" checked disabled>
                @else()
                    PERILS INSURED <input type="checkbox" class="custom-checkbox" checked disabled>
                    @endif
                @if($form->is_basic === '1')
                BASIC  <input type="checkbox" class="custom-checkbox" checked disabled>
                    @else()
                        BASIC  <input type="checkbox" class="custom-checkbox" disabled>
                    @endif
                    @if($form->is_broad === '1')
                BROAD <input type="checkbox" class="custom-checkbox " checked disabled>
                    @else()
                        BROAD <input type="checkbox" class="custom-checkbox" disabled>
                    @endif
@if($form->is_special === '1')
                SPECIAL<input type="checkbox" class="custom-checkbox" checked disabled>
                    @else()
                        SPECIAL<input type="checkbox" class="custom-checkbox" disabled>
    @endif
            </strong>



        </div>
        <div>
            <table class="col-md-12 ">
                <tr>
                    <th  style="width: 65%;">COVERAGE/PERLIS/FORMS</th>
                    <th>AMOUNT OF INSURANCE</th>
                    <th>DEDUCTIBLE</th>
                </tr>
                <tr>
                    <th>{{$form->coverage_description}}</th>
                    <th>{{$form->insurance_amount}}</th>
                    <th>{{$form->deductible}}</th>
                </tr>
            </table>
        </div>

        <div>
            <h4>REMARKS (INCLUDING SPECIAL CONDITIONS)</h4>
            <table class="col-md-12 ">
                <tr>
                    <th  style="width: 100%;" class="text-start">{{$form->remarks}}<br><br><br><br>  </th>

                </tr>

            </table>
        </div>
        <div>
            <h4>CANCELLATION</h4>
            <table class="col-md-12 ">
                <tr>
                    <th  style="width: 100%; height: 20%;"><br> SHOULD ANY OF THE ABOVE DESCRIBED POLICIES BE CANCELLED BEFORE THE EXPIRATION FATE THEROF,NOTICE WILL BE DELIVERED IN ACCORDANCE WITH THE POLICY PROVISIONS <br><br></th>

                </tr>

            </table>
        </div>
        <div>
            <h4>ADDITIONAL INTEREST</h4>
            <table class="col-md-12 ">
                <tr>
                    <th   class="text-start" rowspan="3" style="width: 58%;">{{$form->name}} <br> <br> {{$form->address}}</th>
                    <th class="text-start">
                        @if($form->is_additional_insured === '1')
                            <input type="checkbox" class="custom-checkbox" checked disabled> ADDITIONAL INSURED
                        @else()
                            <input type="checkbox" class="custom-checkbox" disabled> ADDITIONAL INSURED
                        @endif

                        @if($form->is_lenders_loss_payable === '1')
                            <input type="checkbox" class="custom-checkbox" checked disabled> LENDER'S LOSS PAYABLE
                            @else()
                                <input type="checkbox" class="custom-checkbox" disabled> LENDER'S LOSS PAYABLE
                            @endif

                        @if($form->is_loss_payee === '1')
                            <input type="checkbox" class="custom-checkbox" checked disabled> LOSS PAYEE
                            @else()
                                <input type="checkbox" class="custom-checkbox" disabled> LOSS PAYEE

                            @endif

                        @if($form->is_murtagagee === '1')
                            <input type="checkbox" class="custom-checkbox" checked disabled> MURTAGAGEE
                            @else()
                            <input type="checkbox" class="custom-checkbox" disabled> MURTAGAGEE
                        @endif


                    </th>



                    </th>

                </tr>
                <tr>
                    <th class="text-start">LOAN #</th>
                </tr>
                <tr>
                    <th class="text-start">AUTHORIZED REPRESENTATIVE : {{$form->representative_name}}</th>
                </tr>

            </table>
        </div>
        <div class="mt-3 text-start">
            <div class="row">
                <div class="col-md-6  text-start">
                    <b>ACORD 27 (2016/03)</b>
                </div>
                <div class="col-md-6  text-end">
                    <b>&copy; 1993-2015 ACORD CORPORATION . All rights reserved.</b>

                </div>
                <div class="col-md-12  text-center">
                    <b>The ACORD name and logo are registered marks of ACORD.</b>
                </div>
            </div>


        </div>
    </div>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function printPage() {
        window.print();
    }
</script>
</body>
</html>
