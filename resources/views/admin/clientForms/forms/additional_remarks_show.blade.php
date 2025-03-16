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
        .border-thick {
            border: 2px solid black;
        }
        .underline {
            border-bottom: 2px solid black;
            margin-bottom: 5px;
        }
        .shrink-box {
            display: inline-block;
            padding: 10px;
            margin: 5px;
            max-width: 100%; /* Prevent overflow */
            white-space: pre-wrap;

    </style>
</head>
<body>

<div class="container">
    <div class="print-button">
        <button class="btn btn-primary" onclick="printPage()">Print</button>
    </div>
    <div style="display: flex; align-items: center; justify-content: space-between;">
        <div>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSlEWoadzCCwI9_Z2amcJ2wMJPHhJbbybrVbw&s" alt="" style="height: 80px;">
        </div>
        <div style="text-align: right;">
            <label><strong>Agency Customer ID:</strong><undeline>{{$form->agency_customer_id}}</undeline></label><br>
            <label><strong>LOC #:</strong><underlin>{{$form->loc}}</underlin></label>
        </div>
    </div>





    <div class="col text-center title">
        ADDITIONAL REMARKS SCHEDULE
    </div>


    <div>
        <table class="table w-100" style="border-bottom: 2px solid black;">
            <tr>

                <td class="text-start"  style="width: 50%;"><strong>AGENCY</strong>  {{$form->agency->agency_name}}</td>
                <!-- Right Section -->
                <td class="text-start" style="width: 50%;" colspan="2" rowspan="2"><strong>NAMED INSURED</strong><br>{{$form->insuranceCompany->name}}<br><br><br></td>
            </tr>
            <tr>
                <td class="text-start"><strong>POLICY NUMBER</strong>    {{$form->client->policy->policy_number}}</td>

            </tr>
            <tr>

                <td class="text-start" style=" justify-content: space-between; ">
                    <strong>CARRIER</strong>{{$form->client->policy->insuranceCompany->name}}
                    <strong class="p-2" style="border-left: 2px solid black; margin-left:auto">NAIC CODE</strong> {{$form->naic_code}}
                </td>

                <td class="text-start" style="width: 50%;"><strong>EFFECTIVE DATE:</strong>{{$form->client->policy->effective_date}}</td>
            </tr>


        </table>
    </div>

    <div class="border-thick p-2">
        <strong>ADDITIONAL REMARKS</strong>
        <div >
            <strong>THIS ADDITIONAL REMARKS FORM IS A SCHEDULE TO ACORD FORM,</strong>
        </div>
        <div class="d-flex justify-content-start underline mt-1 p-1">
            <span class="me-3"><strong>FORM NUMBER:</strong><u>{{$form->form_no}}</u></span>
            <span><strong>FORM TITLE:</strong><u>{{$form->form_title}}</u></span>
        </div>
        <!-- Empty Box for Remarks -->
        <div class="shrink-box">
            {!!$form->description !!}
    </div>


</div>
    <div class="d-flex justify-content-between align-items-center w-100">
        <span><strong>ACORD 101 (2008/01)</strong></span>
        <span><strong>&copy; 2008 ACORD CORPORATION. All rights reserved.</strong></span>
    </div>
    <div class="text-center mt-1">
        <strong>The ACORD name and logo are registered marks of ACORD</strong>
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
