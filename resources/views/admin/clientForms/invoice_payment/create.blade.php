@extends('admin.layouts.app')
@push('styles')
    <style>


        .header, .invoice-title, .invoice-meta-container, .client-info, .total-amount, .notes, table {
            margin-bottom: 10px;
        }

        .company-name {
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 4px;
        }

        .company-details {
            margin-bottom: 2px;
        }

        .contact-info {
            display: flex;
            gap: 20px;
            margin-bottom: 10px;
        }

        .invoice-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 20px;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-meta div {
            margin-bottom: 2px;
        }

        .info-row {
            display: flex;
            margin-bottom: 4px;
        }

        .label {
            width: 100px;
            text-align: right;
            padding-right: 10px;
        }

        .input-line {
            flex: 1;
            min-height: 18px;
            border-bottom: 1px solid black;
            max-width: 250px;
        }

        .input-address {
            margin-left: 110px;
            border-bottom: 1px solid black;
            max-width: 250px;
            margin-bottom: 4px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0 20px 0;
        }

        th {
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            padding: 6px 4px;
        }

        td {
            /*border-top: 1px solid black;*/
            padding: 6px 4px;
        }

        th:first-child, td:first-child {
            width: 30%;
        }

        th:last-child, td:last-child {
            width: 20%;
            text-align: right;
        }

        .total-amount {
            text-align: right;
            font-weight: bold;
            margin-top: 10px;
        }

        .notes {
            margin-top: 30px;
        }

        .notes textarea {
            width: 100%;
            height: 60px;
            border: 1px solid black;
            resize: vertical;
        }

        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }

        .labels {
            width: 100px;
            text-align: right;
            padding-right: 90px;
        }

        .labelss {
            text-align: right;
            padding-right: 170px;
        }

        .button {
            padding: 8px 16px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        @media print {
            body * {
                visibility: hidden;
            }

            #original, #original * {
                visibility: visible;
            }

            #original {
                position: absolute;
                top: 0;
                left: 0;
            }
        }

        input {
            border: none;
            border-bottom: 1px solid black;
            font-family: inherit;
            font-size: inherit;
            width: 100%;
        }
    </style>
@endpush
@section('content')

    <form action="{{ route('store-invoice-for-payment') }}" method="POST" class="container mt-4">
    @csrf
        <input type="hidden" name="client_id" value="{{ $clientPolicy->client_id }}">

        <div class="header">
            <div class="company-name"><input type="text" name="agency_name" value="Aim Insurance Of Texas" style="width: 300px;"></div>
            <div class="company-details"><input type="text" name="agency_address" value="3322 Shaver St" style="width: 300px;"></div>
            <div class="company-details">
                <input type="text" name="agency_city" value="Pasadena" style="width: 100px;">
                <input type="text" name="agency_state" value="TX" style="width: 100px;">
                <input type="text" name="agency_zipcode" value="77504" style="width: 100px;">
            </div>
            <div class="contact-info">
                <div>Phone:<input type="text" name="agency_phone" value="(713)947-3434" style="width: 120px;"></div>
                <div>Fax:<input type="text" name="agency_fax" value=" (713)946-3969" style="width: 120px;"></div>
            </div>
        </div>

        <hr>

        <div class="invoice-title">Invoice : <input type="text" name="invoice_no" value="" style="width: 150px;"></div>

        <div class="invoice-meta-container">
            <div class="invoice-meta">
                <span class="labels">Invoice Date:</span> <input type="text" name="invoice_date" value="" style="width: 150px;">
<br>
                    <span class="labels"><b>Policy Number:</b> <input type="text" name="policy_number" style="width: 100px;"></span>

            </div>
        </div>

        <div class="client-info">
            <div class="info-row">
                <div class="label">Insured:</div>
                <div class="input-line"><input type="text" name="insured_company_name" value="" placeholder="Company Name"></div>
            </div>
            <div class="input-address"><input type="text" name="insured_company_address" value="" placeholder="Address"></div>
            <div class="input-address">
                <input type="text" name="insured_company_city" value="" style="width: 80px;" placeholder="City">
                <input type="text" name="insured_company_state" value="" style="width: 80px;" placeholder="State">
                <input type="text" name="insured_company_zipcode" value="" style="width: 80px;" placeholder="Zip Code">
            </div>
            <br>
             <div class="info-row">
                <div class="label">Company:</div>
                <div class="input-line"><input type="text" name="company_name" value="" placeholder="Enter Company"></div>
            </div>
            <div class="info-row">
                <div class="label">Fax:</div>
                <div class="input-line"><input type="text" name="company_fax" value="" placeholder="Company Fax"></div>
            </div>
        </div>

        <table>
            <thead>
            <tr>
                <th>Item</th>
                <th>Description</th>
                <th>Amount</th>
            </tr>
            </thead>
            <tbody>
            <?php for ($i = 0; $i < 5; $i++): ?>
            <tr>
                <td><input type="text" name="item_name[]" value="" placeholder="Item"></td>
                <td><input type="text" name="description[]" value="" placeholder="Description"></td>
                <td><input type="text" name="amount[]" value="" style="text-align:right;" placeholder="Amount"></td>
            </tr>
            <?php endfor; ?>
            </tbody>
        </table>


        <hr style="border-top: 1px solid black; margin-top:40px;">

{{--        <div class="total-amount">--}}
{{--            <span>TOTAL AMOUNT:</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="text" value="$0.00" style="width:100px;text-align:right;">--}}
{{--        </div>--}}

        <div class="notes">NOTES:</div>
        <textarea name="note" placeholder="Add any relevant notes here..." style="width: 623px;
        height: 194px;"></textarea>


        <div class="row mt-12 mt-3 ">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary float-end m-1">Submit</button>
                <button type="reset" class="btn btn-secondary float-end m-1">Reset</button>
            </div>
        </div>

    </form>
@endsection
