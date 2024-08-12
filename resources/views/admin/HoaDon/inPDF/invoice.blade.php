<!DOCTYPE html>
<html>

<head>
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 20px;
            background: #fff;
        }

        h1 {
            text-align: center;
            color: #007bff;
        }

        .invoice-details {
            margin-bottom: 20px;
        }

        .invoice-details p {
            margin: 5px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        .total {
            text-align: right;
            font-weight: bold;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Invoice: {{ $invoice_number }}</h1>

        <div class="invoice-details">
            <p><strong>Customer:</strong> {{ Str::ascii($customer_name) }}</p>
            <p><strong>Status Order:</strong> {{ Str::upper($status_order) }}</p>
            <p><strong>Status Payment:</strong> {{ Str::upper($status_payment) }}</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Nam Product</th>
                    <th>Size</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                    <tr>
                        <td>{{ Str::ascii($item['name']) }}</td>
                        <td>{{ $item['size'] }}</td>
                        <td>
                            <div style="width: 30px; height: 30px; background-color: {{ $item['color'] }};"></div>
                        </td>
                        <td>
                            {{ number_format((int) $item['price'], 0, ',', '.') }}
                        </td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>
                            {{ number_format((int) ($item['price'] * $item['quantity']), 0, ',', '.') }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="total">
            Total Invoice:
            {{ number_format((int) $status_total, 0, ',', '.') }}(VND)
        </div>
    </div>
</body>

</html>
