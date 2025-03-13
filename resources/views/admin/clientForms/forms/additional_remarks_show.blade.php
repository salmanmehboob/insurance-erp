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
                    <td class="px-2 py-1 border"><strong>DATE</strong><br>{{currentDate()}}</td>
                </tr>
            </table>
        </div>

        <div class="row col-md-12">
            <table class="col-md-6">
                <tr>
                    <td rowspan="5" class="text-start vertical-align: top; "><strong>New Agency</strong></td>
                    <td class="text-start"><strong>PHONE (A/C, No, Ext): {{$form->agency->phone}}</strong> </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr><td class="text-start"><strong>FAX (A/C, No):{{$form->agency->fax}}</strong></td></tr>
                <tr></tr>

                <tr>
                    <td colspan="2" class="text-start">{{$form->agency->agency_name}}
                        <br>
                        {{$form->agency->address}}
                        <br><br>
                        {{$form->agency->city}} <span class="mx-5">{{$form->agency->state->name}} {{$form->agency->zip_code}}</span>
                    </td>

                </tr>
                <tr>
                    <td colspan="2" class="text-start" ><strong>Email Address :  {{$form->client->email ?? ''}} </strong></td>
                </tr>
                <tr>
                    <td class="text-start" ><strong>Code:  {{$form->code ?? ''}}</strong></td>
                    <td class="text-start"><strong>Sub Code:  {{$form->sub_code ?? ''}}</strong></td>
                </tr>
                <tr>
                    <td colspan="2" class="text-start" ><strong>Agency Customer ID:  {{$form->agency_customer_id ?? ''}}</strong>
                    </td>
                </tr>
            </table>
            <table class="col-md-6">
                <tr>
                    <td colspan="2" class="text-start"><strong>Insured Company Name</strong>
                        <br>
                        {{$form->insuranceCompany->name}}
                        <br>
                        {{$form->insuranceCompany->address}}
                        <br><br>
                        {{$form->insuranceCompany->city}} <span class="mx-5">{{$form->insuranceCompany->state->name}} {{$form->insuranceCompany->zip_code}}</span>
                     </td>
                </tr>
                <tr>
                    <td class="text-start"><strong>Current Agency: {{$form->agency->agency_name}}</strong></td>
                    <td class="text-start"><strong>Current Producer :  {{$form->current_producer ?? ''}}</strong></td>
                </tr>
            </table>

        </div>
{{--        <div>--}}
            <table>
                <tr>
                    <th colspan="2">NAMED INSURED<br>(AS IT APPEARS ON POLICY)</th>
                    <th>POLICY NUMBER(S)</th>
                    <th>EFFECTIVE DATE</th>
                    <th>EXPIRATION DATE</th>
                    <th>LINE OF BUSINESS</th>
                </tr>
                <tr>
                    <td colspan="2">{{$form->client->applicant_name}}</td>
                    <td></td>
                    <td> {{ showDate($form->client->policy->effective_date)}}</td>
                    <td> {{ showDate($form->client->policy->expiration_date)}}</td>
                     <td>{{$form->client->policyType->name}}</td>
                </tr>

            </table>
{{--        </div>--}}
        <div class="mt-3">
            <strong> <p>Please be advised that we wish to name <span class="underline">___{{$form->current_producer ?? ''}}___</span> as our exclusive representative effective <span class="underline">___{{$form->current_producer ?? ''}}___</span> for the lines of business shown above, currently in force or submitted by application.</p>
                <p>This authorization replaces any other authorization that may have been previously completed for any other insurance representative for the stated lines of business.</p></strong>
            <table class="w-100 mt-2 bottom-border">
                <tr>
                    <td class="p-5"> <strong>INSURED'S SIGNATURE</strong>  <br> <span>{{$form->insured_signature ?? ''}}</span> </td>
                    <td class="p-5"><strong>DATE</strong> <br>   <span>{{ showDate($form->issued_date)}}</span></td>
                </tr>
                <tr>
                    <td class="p-5"><strong>TITLE (IF APPLICABLE)</strong> <br>  <span>{{$form->insured_title ?? ''}}</span></td>
                    <td class="p-5"><strong>COMPANY NAME (IF APPLICABLE)</strong>  <br> <span>{{$form->insured_company_name ?? ''}}</span></td>
                </tr>
                <tr>
                    <td colspan="2" class="p-5"><strong>STREET ADDRESS OF INSURED</strong>  <br> <span>{{$form->insured_company_address ?? ''}}</span></td>
                </tr>
                <tr>
                    <td class="p-5"><strong>CITY OF INSURED</strong>  <br> <span>{{$form->insured_company_city ?? ''}}</span></td>
                    <td class="p-5"><strong>STATE & ZIPCODE OF INSURED</strong>   <br> <span>{{$form->insured_company_state ?? ''}} {{$form->insured_company_zipcode ?? ''}} </span> </td>
                </tr>
            </table>



            <div class="mt-3 text-start">
                <div class="row">
                    <div class="col-md-6  text-start">
                        <b>ACORD 36 (2007/01)</b>
                    </div>
                    <div class="col-md-6  text-end">
                        <b>&copy; ACORD CORPORATION 1996-2007. All rights reserved.</b>

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
