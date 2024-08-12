<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SHOP NIKE VN - NXB</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f0f0f0;
            padding: 20px;
        }

        .invoice {
            background-color: #fff;
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .invoice h1 {
            text-align: center;
            font-size: 24px;
            color: #333;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .invoice .invoice-details {
            margin-top: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .invoice .invoice-details p {
            margin: 5px 0;
        }

        .invoice .invoice-items {
            margin-top: 20px;
        }

        .invoice .invoice-items table {
            width: 100%;
            border-collapse: collapse;
        }

        .invoice .invoice-items table th,
        .invoice .invoice-items table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .invoice .invoice-items table th {
            background-color: #f0f0f0;
        }

        .invoice .invoice-total {
            margin-top: 20px;
            text-align: right;
        }

        .invoice .invoice-total p {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="invoice">
        <h1>Hóa đơn thanh toán</h1>

        <div class="invoice-details">
            <p><strong>Người mua:</strong> {{ Auth::user()->name }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
        </div>

        <div class="invoice-items">
            <table>
                <thead>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng cộng</th>
                    </tr>
                </thead>
                <tbody>
                    @if (session('cart'))
                        @foreach (session('cart') as $itemCart)
                            <tr>
                                <td>{{ $itemCart['name'] }}</td>
                                <td>
                                    {{ number_format((int) $itemCart['price_regular'], 0, ',', '.') }}(VND)
                                </td>
                                <td>
                                    {{ $itemCart['quantityC'] }}
                                </td>
                                <td>
                                    {{ number_format((int) $itemCart['quantityC'] * $itemCart['price_regular'], 0, ',', '.') }}(VND)
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
                @if (session()->has('giaKM'))
                    <tfoot>
                        <tr>
                            <td colspan="3"><strong>Bạn đã áp dụng mã khuyến mại và sẽ được giảm:
                                </strong>
                            </td>
                            <td>
                                {{ number_format((int) session('giaKM'), 0, ',', '.') }}(VND)
                            </td>
                        </tr>
                    </tfoot>
                @endif
            </table>
        </div>

        <div class="invoice-total">
            <p>
                <strong>Tổng tiền:</strong>
                @if (session()->has('cart'))
                    @php($totalAmount = 0)
                    @foreach (session('cart') as $item)
                        <?php $totalAmount += $item['quantityC'] * $item['price_regular']; ?>
                    @endforeach
                @endif
                @if (session()->has('giaKM'))
                    {{ number_format((int) ($totalAmount - session('giaKM')), 0, ',', '.') }}(VND)
                @else
                    {{ number_format((int) $totalAmount, 0, ',', '.') }}(VND)
                @endif
            </p>
        </div>
    </div>
</body>

</html>
