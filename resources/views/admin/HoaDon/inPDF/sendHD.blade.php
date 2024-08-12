<!-- resources/views/emails/thankyou.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <style>
        /* CSS styles */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        p {
            margin-bottom: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Cảm ơn quý khách hàng!</h2>
        <p>Kính gửi: {{ $invoiceData['customer_name'] }},</p>
        <p>Chúng tôi muốn cảm ơn bạn vì đơn hàng gần đây của bạn. Đơn hàng của bạn đã được nhận thành công.</p>
        <p>Cảm ơn bạn một lần nữa vì đã chọn dịch vụ của chúng tôi.</p>
    </div>
</body>

</html>
