<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$vnp_TmnCode = "R3JB8XUW"; //Mã định danh merchant kết nối (Terminal Id)
$vnp_HashSecret = "IR17AULVFDCEWLVFASDO1IEYQYQEPJ50"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
// $vnp_Returnurl = "{{route('vnpay.payment')}}";
$vnp_Returnurl = "http://asm-web4013-ph36173.test:8888/vnpay/payment";
// $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
// $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

$vnp_SecureHash = $_GET['vnp_SecureHash'];
$inputData = array();
foreach ($_GET as $key => $value) {
    if (substr($key, 0, 4) == "vnp_") {
        $inputData[$key] = $value;
    }
}

unset($inputData['vnp_SecureHash']);
ksort($inputData);
$i = 0;
$hashData = "";
foreach ($inputData as $key => $value) {
    if ($i == 1) {
        $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
    } else {
        $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
        $i = 1;
    }
}

$secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

echo $_GET['vnp_TxnRef'] . '<br>';
// ------------------------------
echo $_GET['vnp_Amount'] . '<br>';
echo $_GET['vnp_OrderInfo'] . '<br>';
// ------------------------------------
echo $_GET['vnp_ResponseCode'] . '<br>';
echo $_GET['vnp_TransactionNo'] . '<br>';
echo $_GET['vnp_BankCode'] . '<br>';
echo $_GET['vnp_PayDate'] . '<br>';
echo 'Ket qua: <br>';
if ($secureHash == $vnp_SecureHash) {
    if ($_GET['vnp_ResponseCode'] == '00') {
        echo "<span>GD Thanh cong</span>";
    } else {
        echo "<span>GD Khong thanh cong</span>";
    }
} else {
    echo "<span>Chu ky khong hop le</span>";
}