<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice For Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            width: 6.5in;
            margin: 0.5in auto;
            padding: 0;
            line-height: 1.2;
            font-size: 12px;
        }

        .header {
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

        hr {
            border: none;
            border-top: 1px solid black;
            margin: 10px 0;
        }

        .invoice-title {
            font-size: 14px;
            font-weight: bold;
            margin-top: 20px;
        }

        .invoice-meta-container {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 20px;
        }

        .invoice-meta {
            text-align: right;
        }

        .invoice-meta div {
            margin-bottom: 2px;
        }

        .client-info {
            margin-bottom: 20px;
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

        .value {
            flex: 1;
            min-height: 18px;
            border-bottom: 1px solid black;
            max-width: 250px;
        }

        .address-line {
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
            border-top: 1px solid black;
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

        .button-container {
            position: fixed;
            top: 20px;
            right: 20px;
            display: flex;
            gap: 10px;
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
            .print-button {
                display: none;
            }

            body {
                margin: 0;
                padding: 0.5in;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="print-button">
        <button class="btn btn-primary" onclick="printOriginal()">Print</button>
    </div>

    <div id="original">
        <div class="header">
            <div class="company-name">{{$form->agency_name}}</div>
            <div class="company-details">3322 Shaver St{{$form->agency_address}}</div>
            <div class="company-details">{{$form->agency_city}}, {{$form->agency_state}} {{$form->agency_zipcode}}</div>
            <div class="contact-info">
                <div>Phone: {{$form->agency_phone}}</div>
                <div>Fax: ({{$form->agency_fax}}</div>
            </div>
        </div>

        <hr>

        <div class="invoice-title">Invoice</div>

        <div class="invoice-meta-container">
            <div class="invoice-meta">
                <span class="labels">Invoice Date:</span> <span>{{$form->invoice_date}}</span>
                <div><span class="labelss">  <b>Policy Number:</b> {{$form->policy_number}}</span></div>
            </div>
        </div>

        <div class="client-info">
            <div class="info-row">
                <div class="label">Insured:</div>
                <div class="value">{{$form->insured_company_name}}</div>
            </div>
            <div class="address-line">{{$form->insured_company_address}}</div>
            <div class="address-line">{{$form->insured_company_city}}
                , {{$form->insured_company_state}} {{$form->insured_company_zipcode}}</div>
            <br>
            <div class="address-line"></div>
            <div class="info-row">
                <div class="label">Company:</div>
                <div class="value">{{$form->company_name}}</div>
            </div>
            <div class="info-row">
                <div class="label">Company Fax:</div>
                <div class="value">{{$form->company_fax}}</div>
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
            @foreach($form->items as $item)
                <tr>
                    <td>{{$item->item_name}}</td>
                    <td>{{$item->description}}</td>
                    <td>${{$item->amount}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br><br><br><br>
        <hr style="border-top: 1px solid black;">
        <div class="total-amount"><span>TOTAL AMOUNT:</span> ${{$form->total_amount}}
        </div>
        <div class="notes">NOTES:
            <p>
                {{$form->note}}
            </p>
        </div>
    </div>

</div>
<script>
    function printOriginal() {
         window.print();
    }
</script>

</body>
</html>
