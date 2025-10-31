@extends('admin.layouts.app')
@push('styles')
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container {
            width: 700px;
            margin: 0 auto;
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

        .value input, .value textarea {
            font-size: 12px;
            margin-top: 5px;
            width: 100%;
            border: 1px solid #ccc;
            padding: 2px;
            box-sizing: border-box;
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
            margin-right: 5px;
        }

        .section {
            margin-bottom: 15px;
        }

        .address-block {
            margin-left: 15px;
            line-height: 1.4;
        }

        .address-block input {
            font-size: 12px;
            width: 100%;
            border: 1px solid #ccc;
            padding: 2px;
            margin-bottom: 5px;
            box-sizing: border-box;
        }

        .state-zip {
            display: flex;
            justify-content: flex-end;
            margin-right: 20px;
        }

        .state-zip input {
            font-size: 12px;
            width: 60px;
            border: 1px solid #ccc;
            padding: 2px;
            margin-left: 10px;
            box-sizing: border-box;
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

        .instruction-header textarea {
            font-size: 12px;
            width: 100%;
            border: 1px solid #ccc;
            padding: 2px;
            text-align: center;
            resize: none;
            box-sizing: border-box;
        }

        .accident-info {
            font-size: 11px;
            margin: 0 20px;
        }

        .accident-info textarea {
            font-size: 11px;
            width: 100%;
            border: 1px solid #ccc;
            padding: 2px;
            resize: vertical;
            box-sizing: border-box;
        }

        ol {
            margin-top: 10px;
            padding-left: 30px;
        }

        li textarea {
            font-size: 11px;
            width: 100%;
            border: 1px solid #ccc;
            padding: 2px;
            margin: 3px 0;
            resize: none;
            box-sizing: border-box;
        }

        .card-footer {
            display: flex;
            justify-content: space-between;
            font-size: 7px;
            margin-top: auto;
            padding: 5px;
        }

        .card-footer input {
            font-size: 7px;
            border: 1px solid #ccc;
            padding: 2px;
            width: 45%;
            box-sizing: border-box;
        }
    </style>
@endpush
@section('content')

    <form action="{{ route('store-insurance-card') }}" method="POST" class=" mt-4">
        @csrf

        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">

        <!-- First Card -->
        <div class="card">
            <div class="title">
                INSURANCE IDENTIFICATION CARD
            </div>

            <div class="grid-container">
                <div>
                    <div class="label">COMPANY NUMBER</div>
                    <div class="value"><input type="text" name="company_number" value=""></div>
                </div>
                <div>
                    <div class="label">COMPANY</div>
                    <div class="value"><input type="text" name="company_name" value="No Company Selected"></div>
                </div>
                <div class="checkbox-container">
                    <div class="checkbox-option">
                        <input type="radio" class="checkbox" name="type" id="commercial" value="commercial" >
                        <label for="commercial">COMMERCIAL</label>
                    </div>
                    <div class="checkbox-option">
                        <input type="radio" class="checkbox" name="type" id="personal" value="personal" >
                        <label for="personal">PERSONAL</label>
                    </div>
                </div>
            </div>

            <div class="grid-container">
                <div>
                    <div class="label">POLICY NUMBER</div>
                    <div class="value"><input type="text" name="policy_number" value=""></div>
                </div>
                <div>
                    <div class="label">EFFECTIVE DATE</div>
                    <div class="value"><input type="text" name="effective_date" value="8/10/2021"></div>
                </div>
                <div>
                    <div class="label">EXPIRATION DATE</div>
                    <div class="value"><input type="text" name="expiration_date" value="8/10/2022"></div>
                </div>
            </div>

            <div class="grid-container">
                <div>
                    <div class="label">YEAR</div>
                    <div class="value"><input type="text" name="year" value=""></div>
                </div>
                <div>
                    <div class="label">MAKE/MODEL</div>
                    <div class="value"><input type="text" name="make" value=""></div>
                </div>
                <div>
                    <div class="label">VEHICLE IDENTIFICATION NUMBER</div>
                    <div class="value"><input type="text" name="vehicle_number" value=""></div>
                </div>
            </div>

            <div class="section">
                <div class="label">AGENCY/COMPANY ISSUING CARD</div>
                <div class="address-block">
                    <input type="text" name="agency_name" value="Aim Insurance Of Texas">
                    <input type="text" name="agency_address" value="3322 Shaver St">
                    <input type="text" name="agency_city" value="Pasadena">
                </div>
                <div class="state-zip">
                    <input type="text" name="agency_state" value="TX">
                    <input type="text" name="agency_zipcode" value="77504">
                </div>
            </div>

            <div class="section">
                <div class="label">INSURED</div>
                <div class="address-block">
                    <input type="text" name="insured_name" value="JJH CONSTRUCTION LLC">
                    <input type="text" name="insured_address" value="22402 Sierra Lake Ct">
                    <input type="text" name="insured_city" value="Katy">
                </div>
                <div class="state-zip">
                    <input type="text" name="insured_state" value="TX">
                    <input type="text" name="insured_zipcode" value="77494">
                </div>
            </div>


        </div>

        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>

    </form>
@endsection
