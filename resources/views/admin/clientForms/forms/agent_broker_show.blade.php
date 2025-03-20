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

        /*table, th, td {*/
        /*    border: 1px solid #000;*/
        /*    border-collapse: collapse;*/
        /*    padding: 5px;*/
        /*    text-align: center;*/
        /*    font-size: 14px;*/
        /*}*/

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

        input {
            height: 25px;
            background-color: #e5e1e1 !important;;
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
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlEWoadzCCwI9_Z2amcJ2wMJPHhJbbybrVbw&s"
                 alt="">
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
            <table class="col-md-6 table-bordered">
                <tr>
                    <td rowspan="5" class="text-start vertical-align: top; "><strong>New Agency</strong></td>
                    <td class="text-start d-flex align-items-center">
                        <strong class="me-2 w-50">PHONE (A/C, No, Ext):</strong>
                        <input type="text" name="phone" class="form-control w-50" value="{{$form->agency->phone}}">
                    </td>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr>
                    <td class="text-start d-flex align-items-center">
                        <strong class="me-2 w-50">FAX (A/C, No): </strong><input type="text" name="phone"
                                                                                 class="form-control w-50"
                                                                                 value="{{$form->agency->fax}}">
                    </td>
                </tr>
                <tr></tr>

                <tr>
                    <td colspan="2" class="text-start  align-items-center ">
                        <input type="text" name="companyName" class="form-control w-100" value="Aim Insurance Of Texas"
                               placeholder="Insurance Company Name">
                        <br>
                        <input type="text" name="address" class="form-control w-100" value="3322 Shaver St"
                               placeholder="Address">
                        <br><br>
                        <div class="text-start d-flex align-items-center">
                            <input type="text" name="city" class="form-control w-50" value="Pasadena"
                                   placeholder="City">
                            <input type="text" name="state" class="form-control w-25" value="TX" placeholder="State">

                            <input type="text" name="zipcode" class="form-control w-25" value="77504"
                                   placeholder="zipcode">
                        </div>

                    </td>

                </tr>
                <tr>
                    <td colspan="2" class="text-start" style="width: 100%;">
                        <strong style="display: inline-block; margin-right: 5px; width: 30%;">E-MAIL ADDRESS:</strong>
                        <input type="email" name="email" class="form-control" style="display: inline-block; width: 65%;"
                               value="{{$form->client->email ?? 'N/A'}}">
                    </td>
                </tr>
                <tr>
                    <td class="text-start align-items-center">
                        <strong style="display: inline-block; margin-right: 5px; width: 30%;">CODE:</strong>
                        <input type="text" name="code" class="form-control" style="display: inline-block; width: 65%;"
                               value="{{$form->code}}">
                    </td>
                    <td class="text-start  align-items-center">
                        <strong style="display: inline-block; margin-right: 5px; width: 30%;">SUB CODE:</strong>
                        <input type="text" name="sub_code" class="form-control"
                               style="display: inline-block; width: 65%;" value="{{$form->sub_code}}">
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="text-start  align-items-center">
                        <strong style="display: inline-block; margin-right: 5px; width: 30%;">AGENCY CUSTOMER
                            ID:</strong>
                        <input type="text" name="agency_customer_id" class="form-control"
                               style=" display: inline-block; width: 65%;" value="{{$form->agency_customer_id}}">
                    </td>
                </tr>
            </table>
            <table class="col-md-6 table-bordered ">
                <tr>
                    <td colspan="2" class="text-start"><strong>Insured Company Name</strong>
                        <br>
                        <input type="text" name="insured_company_name" class="form-control w-100"
                               value="{{$form->insuranceCompany->name}}" placeholder="">

                        <br>
                        <input type="text" name="insured_company_address" class="form-control w-100"
                               value="{{$form->insuranceCompany->address}}">
                        <br><br>
                        <div class="text-start d-flex align-items-center">
                            <input type="text" name="insured_company_city" class="form-control w-50"
                                   value="{{$form->insuranceCompany->city}}
                                       " placeholder="City">
                            <input type="text" name="insured_company_state" class="form-control w-25"
                                   value="{{$form->insuranceCompany->state->name}}
                                       " placeholder="State">

                            <input type="text" name="insured_company_zipcode" class="form-control w-25"
                                   value="{{$form->insuranceCompany->zip_code}}" placeholder="zipcode">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="text-start ">
                        <strong>Current Agency:</strong>
                        <select name="agency_name" class="form-select">
                            @foreach($agencies as $agency)
                                <option
                                    value="{{ $agency->id }}" {{ $form->agency->id == $agency->id ? 'selected' : '' }}>
                                    {{ $agency->agency_name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                    <td class="text-start  align-items-center">
                        <strong>CURRENT PRODUCER:</strong>
                        <input type="text" name="current_producer" class="form-control"
                               style="display: inline-block; width: 65%;" value="{{$form->current_producer}}">
                    </td>
                </tr>
            </table>

        </div>
        {{--        <div>--}}
        <table class="mt-3 ">
            <tr>
                <th colspan="2">NAMED INSURED<br>(AS IT APPEARS ON POLICY)</th>
                <th>POLICY NUMBER(S)</th>
                <th>EFFECTIVE DATE</th>
                <th>EXPIRATION DATE</th>
                <th>LINE OF BUSINESS</th>
            </tr>
            <tr>
                <td colspan="2"><input type="text" name="insured_name" class="form-control w-100"
                                       value="{{$form->client->applicant_name}}"></td>
                <td><input type="text" name="policy_no" class="form-control w-100"
                           value="{{$form->client->policy->policy_number}}"></td>
                <td><input type="date" name="effective_date" class="form-control w-100"
                           value="{{ date('Y-m-d', strtotime($form->client->policy->effective_date)) }}"></td>
                <td><input type="date" name="expiration_date" class="form-control w-100"
                           value="{{ date('Y-m-d', strtotime($form->client->policy->expiration_date)) }}"></td>
                <td>
                    <select name="policy_type_id" class="form-control w-100">
                        @foreach($policyTypes as $policyType)
                            <option value="{{ $policyType->id }}"
                                {{ $form->client->policyType->id == $policyType->id ? 'selected' : '' }}>
                                {{ $policyType->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>

        </table>

        <div class="mt-3 ">
            <div class="d-flex align-items-center flex-wrap gap-2 w 75">
                <strong>Please be advised that we wish to name</strong>
                <input type="text" class="form-control w-auto" value="{{$form->current_producer ?? ''}}">
                <input type="text" class="form-control w-auto" value="{{$form->code ?? ''}}">
                <strong>as our exclusive representative effective</strong>
                <input type="date" class="form-control w-auto" value="{{ date('Y-m-d', strtotime($form->client->policy->effective_date)) }}">
                <strong>for the lines of business shown above, currently in force or submitted by application. This authorization replaces any other authorization that may have been previously completed for any other insurance representative for the stated lines of business.</strong>
            </div>

                </div>
        <div >
            <div class="d-flex justify-content-center align-items-center flex-row gap-5" style="margin-top: 100px;">
                <div class="text-center text-black">
                    <div><input type="text" class="form-control" name="insured_signature"></div>
                    <hr style="width: 500px; margin: auto; border-top: 3px solid black;">
                    <span>INSURED'S SIGNATURE</span>
                </div>
                <div class="text-center text-black">
                    <div><input type="date" class="form-control" name="insured_date"></div>
                    <hr style="width: 250px; margin: auto; border-top: 3px solid black;">
                    <span>DATE</span>
                </div>
            </div>
            <div class="text-center text-black mt-5">
                <div><input type="text" class="form-control " name="title" style="margin-left: 240px; width: 62% "  ></div>
                <hr style="width: 800px; margin: auto; border-top: 3px solid black;">
                <span>TITLE (IF APPLICABLE)</span>
            </div>
            <div class="text-center text-black mt-5">
                <div><input type="text" class="form-control " name="title" style="margin-left: 240px; width: 62% "  ></div>
                <hr style="width: 800px; margin: auto; border-top: 3px solid black;">
                <span>COMPANY NAME (IF APPLICABLE)</span>
            </div>
            <div class="text-center text-black mt-5">
                <div><input type="text" class="form-control " name="title" style="margin-left: 240px; width: 62% "  ></div>
                <hr style="width: 800px; margin: auto; border-top: 3px solid black;">
                <span>STREET ADDRESS OF INSURED</span>
            </div>
            <div class="d-flex justify-content-center align-items-center flex-row gap-5" style="margin-top: 100px;">
                <div class="text-center text-black">
                    <div><input type="text" class="form-control" name="insured_signature"></div>
                    <hr style="width: 400px; margin: auto; border-top: 3px solid black;">
                    <span>CITY OF INSURED,S</span>
                </div>
                <div class="text-center text-black">
                    <div><input type="text" class="form-control" name="insured_signature"></div>
                    <hr style="width: 100px; margin: auto; border-top: 3px solid black;">
                    <span>STATE OF INSURED'S</span>
                </div>
                <div class="text-center text-black">
                    <div><input type="text" class="form-control" name="insured_signature"></div>
                    <hr style="width: 200px; margin: auto; border-top: 3px solid black;">
                    <span>ZIP CODE OF INSURED'S</span>
                </div>
            </div>
    </div>

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
