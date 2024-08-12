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
