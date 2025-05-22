<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CERTIFICATE OF LIABILITY INSURANCE</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container {
            width: 700px;
            margin: 50px auto;
        }

        .card {
            border: 2px solid black;
            position: relative;
            padding: 20px;
            margin-bottom: 20px;
        }

        /* Styles for first card */
        .title {
            text-align: center;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 20px;
        }

        .grid-container {
            display: grid;
            grid-template-columns: 33% 33% 33%;
            margin-bottom: 10px;
        }

        .label {
            font-size: 10px;
            font-weight: bold;
        }

        .value {
            font-size: 12px;
            margin-top: 5px;
        }

        .checkbox-container {
            display: flex;
            justify-content: flex-end;
            align-items: flex-start;
        }

        .checkbox-option {
            display: flex;
            align-items: center;
            margin-left: 15px;
        }

        .checkbox {
            width: 15px;
            height: 15px;
            border: 1px solid black;
            display: inline-block;
            margin-right: 5px;
        }

        .section {
            margin-bottom: 15px;
        }

        .address-block {
            margin-left: 15px;
            line-height: 1.4;
        }

        .state-zip {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
        }

        .footer-notice {
            text-align: center;
            font-size: 11px;
            margin-top: 30px;
        }

        /* Styles for second card */
        .second-card {
            min-height: 250px;
            display: flex;
            flex-direction: column;
        }

        .instruction-header {
            text-align: center;
            font-weight: bold;
            font-size: 12px;
            margin: 20px 0;
        }

        .accident-info {
            font-size: 11px;
            margin: 0 20px;
        }

        ol {
            margin-top: 10px;
            padding-left: 30px;
        }

        li {
            padding: 3px 0;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            font-size: 7px;
            margin-top: auto;
            padding: 5px;
        }
    </style>

</head>
<body>

<div class="container">
    <!-- First Card -->
    <div class="card">
        <div class="title">INSURANCE IDENTIFICATION CARD</div>

        <div class="grid-container">
            <div>
                <div class="label">COMPANY NUMBER</div>
                <div class="value">{{$form->company_number}}</div>
            </div>
            <div>
                <div class="label">COMPANY</div>
                <div class="value">{{$form->company_name}}</div>
            </div>
            <div class="checkbox-container">
                <div class="checkbox-option">
                    <input type="checkbox" class="checkbox" {{$form->type == 'commercial' ? 'Checked' : ''}} >
                    <div>COMMERCIAL</div>
                </div>
                <div class="checkbox-option">
                    <input type="checkbox" class="checkbox" {{$form->type == 'personal' ? 'Checked' : ''}} >
                    <div>PERSONAL</div>
                </div>
            </div>
        </div>

        <div class="grid-container">
            <div>
                <div class="label">POLICY NUMBER</div>
                <div class="value">{{$form->policy_number}}</div>
            </div>
            <div>
                <div class="label">EFFECTIVE DATE</div>
                <div class="value">{{$form->effective_date}}</div>
            </div>
            <div>
                <div class="label">EXPIRATION DATE</div>
                <div class="value">{{$form->expiration_date}}</div>
            </div>
        </div>

        <div class="grid-container">
            <div>
                <div class="label">YEAR</div>
                <div class="value">{{$form->year}}</div>
            </div>
            <div>
                <div class="label">MAKE/MODEL</div>
                <div class="value">{{$form->make}}</div>
            </div>
            <div>
                <div class="label">VEHICLE IDENTIFICATION NUMBER</div>
                <div class="value">{{$form->vehicle_number}}</div>
            </div>
        </div>

        <div class="section">
            <div class="label">AGENCY/COMPANY ISSUING CARD</div>
            <div class="address-block">
                <div>{{$form->agency_name}}</div>
                <div>{{$form->agency_address}}</div>
                <div>{{$form->agency_city}}</div>

            </div>
            <div class="state-zip">
                <span style="margin-right: 10px;">{{$form->agency_state}}</span>
                <span>{{$form->agency_zipcode}}</span>
            </div>
        </div>

        <div class="section">
            <div class="label">INSURED</div>
            <div class="address-block">
                <div>{{$form->insured_name}}</div>
                <div>{{$form->insured_address}}</div>
                <div>{{$form->insured_city}}</div>

            </div>
            <div class="state-zip">
                <span style="margin-right: 10px;">{{$form->insured_state}}</span>
                <span>{{$form->insured_zipcode}}</span>
            </div>
        </div>

        <div class="footer-notice">SEE IMPORTANT NOTICE ON REVERSE SIDE</div>
    </div>

    <!-- Second Card -->
    <div class="card second-card">
        <div class="instruction-header">
            THIS CARD MUST BE KEPT IN THE INSURED<br>
            VEHICLE AND PRESENTED UPON DEMAND
        </div>

        <div class="accident-info">
            <div>IN CASE OF ACCIDENT: Report all accidents to your Agent/Company as soon as possible. Obtain the
                following information:
            </div>
            <ol>
                <li>Name and address of each driver, passenger and witness.</li>
                <li>Name of Insurance Company and policy number for each vehicle involved.</li>
            </ol>
        </div>

        <div class="card-footer">
            <div>THE FRONT OF THIS DOCUMENT CONTAINS AN ARTIFICIAL WATERMARK - HOLD AT AN ANGLE TO VIEW</div>
            <div>© ACORD CORPORATION 1993-2007 - All rights reserved</div>
        </div>
    </div>
</div>

</body>
</html>
