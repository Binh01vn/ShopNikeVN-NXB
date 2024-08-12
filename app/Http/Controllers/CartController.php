<?php

namespace App\Http\Controllers;

use App\Models\KhuyenMai;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Session;

class CartController extends Controller
{
    public function list(Request $request)
    {
        // dd(session()->all());
        // dd($request->all());
        // session()->forget('cart');
        // session()->forget('giaKM');
        // session()->forget('userEmail');
        if (isset($request->deleteCode) && $request->deleteCode != null) {
            session()->forget('giaKM');
            session()->forget('maKM');
        }
        if (session()->has('cart')) {
            $cart = session('cart');
            if (isset($request->apply_coupon) && $request->apply_coupon != null) {
                if ($request->coupon_code) {
                    $maKM = $request->coupon_code;
                    $modelMa = KhuyenMai::query()->where('maKM', $maKM)->first();
                    $status = $modelMa->is_active;
                    $soLuong = $modelMa->soluong;
                    $giaPT = $modelMa->giaPT;
                    $giaSale = $modelMa->price_sale;
                    if ($status == 'active' && $soLuong > 0) {
                        $totalAmount = 0;
                        foreach ($cart as $item) {
                            $totalAmount += $item['quantityC'] * $item['price_regular'];
                        }
                        if ($giaPT > 0 && $giaSale > 0) {
                            $giaGiam = $totalAmount * $giaPT / 100;
                            if ($giaGiam > $giaSale) {
                                echo '<script>alert("Mã khuyến mại chỉ giảm tối đa ' . number_format((int) $giaSale, 0, ',', '.') . ' VND!")</script>';
                                // session()->put('giaKM.gia', $giaSale);
                                session(['giaKM' => $giaSale, 'maKM' => $modelMa->maKM]);
                                // dd(session('maKM'));
                                $totalAmount = $totalAmount - $giaSale;
                            } else {
                                session(['giaKM' => $giaGiam, 'maKM' => $modelMa->maKM]);
                                // session()->put('giaKM.gia', $giaGiam);
                                $totalAmount = $totalAmount - $giaGiam;
                            }
                        } else {
                            session(['giaKM' => $giaSale, 'maKM' => $modelMa->maKM]);
                            $totalAmount = $totalAmount - $giaSale;
                        }
                    } else {
                        echo '<script>alert("Mã khuyến mại không hợp lệ!")</script>';
                    }
                }
            }
            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['quantityC'] * $item['price_regular'];
            }
        } else {
            $totalAmount = 0;
        }
        return view('client.carts.cart-list', compact('totalAmount'));
    }

    public function checkout(Request $request)
    {
        if (session()->has('cart')) {
            $cart = session('cart');
            $totalAmount = 0;
            foreach ($cart as $item) {
                $totalAmount += $item['quantityC'] * $item['price_regular'];
            }
        }

        return view('client.carts.checkout', compact('totalAmount'));
    }

    public function save(Request $request)
    {
        if (isset($_POST['default']) && $_POST['default'] != '') {
            try {
                DB::transaction(function () use ($request) {
                    $user = Auth::user();
                    $totalAmount = 0;
                    $dataItem = [];
                    foreach (session('cart') as $variantID => $item) {
                        $totalAmount += $item['quantityC'] * $item['price_regular'];
                        $dataItem[] = [
                            'product_variant_id' => $variantID,
                            'quantity' => $item['quantityC'],
                            'product_name' => $item['name'],
                            'product_sku' => $item['sku'],
                            'product_img_thumbnail' => $item['img_thumbnail'],
                            'product_price_regular' => $item['price_regular'],
                            'product_price_sale' => $item['price_sale'],
                            'variant_size_name' => $item['size']['name'],
                            'variant_color_name' => $item['color']['name'],
                        ];
                    }
                    if (session()->has('giaKM') && session('giaKM') > 0) {
                        $totalAmount = $totalAmount - session('giaKM');
                    }
                    $order = Order::query()->create([
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'user_email' => $user->email,
                        'user_phone' => $request->phone,
                        'user_address' => $request->address,
                        'user_note' => $request->user_note,
                        'total_price' => $totalAmount,
                    ]);
                    foreach ($dataItem as $item) {
                        $item['order_id'] = $order->id;

                        OrderItem::query()->create($item);
                    }
                    $emailUser = $user->email;
                    Mail::send('client.carts.mailHD.mail', compact('emailUser'), function ($email) use ($emailUser) {
                        $email->to($emailUser);
                        $email->subject('Hóa đơn điện tử');
                    });
                });

                session()->forget('cart');
                if (session()->has('giaKM') && session('maKM')) {
                    $modelMa = KhuyenMai::query()->where('maKM', session('maKM'))->first();
                    $soluong = $modelMa->soluong;
                    $modelMa->update(['soluong' => $soluong - 1]);
                    session()->forget('giaKM');
                    session()->forget('maKM');
                }
                return redirect()->route('auth.acc');
            } catch (\Exception $e) {
                dd($e->getMessage());
                return back()->with('error', 'Lỗi đặt hàng!');
            }
        }
        if ($request->redirect && $request->redirect != null) {
            // dd(session()->all());
            $totalAmount = 0;
            foreach (session('cart') as $item) {
                $totalAmount += $item['quantityC'] * $item['price_regular'];
            }
            if (session()->has('giaKM') && session('giaKM') > 0) {
                $totalAmount = $totalAmount - session('giaKM');
            }
            // require_once 'vnpay/vnpay_create_payment.php';
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $vnp_TmnCode = "R3JB8XUW"; //Mã định danh merchant kết nối (Terminal Id)
            $vnp_HashSecret = "IR17AULVFDCEWLVFASDO1IEYQYQEPJ50"; //Secret key
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            // $vnp_Returnurl = "{{route('vnpay.payment')}}";
            $vnp_Returnurl = "http://asm-web4013-ph36173.test:8888/vnpay/payment";

            $startTime = date("YmdHis");
            $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));

            $vnp_TxnRef = session('_token') . rand(0, 100); //Mã giao dịch thanh toán tham chiếu của merchant
            $vnp_Amount = $totalAmount; // Số tiền thanh toán
            $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
            $vnp_BankCode = 'NCB'; //Mã phương thức thanh toán
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount * 100,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $request->user_note,
                "vnp_OrderType" => "other",
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                "vnp_ExpireDate" => $expire
            );
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }

            ksort($inputData);
            // dd($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            Session::put('userPhone', $request->phone);
            Session::put('diaChi', $request->address);
            // header('location: ' . $vnp_Url);
            // die();
            return redirect()->away($vnp_Url);
        }
    }

    public function payment()
    {
        // dd(session()->all());
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $vnp_HashSecret = "IR17AULVFDCEWLVFASDO1IEYQYQEPJ50"; //Secret key

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
                try {
                    DB::transaction(function () {
                        $user = Auth::user();
                        $totalAmount = 0;
                        $dataItem = [];
                        foreach (session('cart') as $variantID => $item) {
                            $totalAmount += $item['quantityC'] * $item['price_regular'];
                            $dataItem[] = [
                                'product_variant_id' => $variantID,
                                'quantity' => $item['quantityC'],
                                'product_name' => $item['name'],
                                'product_sku' => $item['sku'],
                                'product_img_thumbnail' => $item['img_thumbnail'],
                                'product_price_regular' => $item['price_regular'],
                                'product_price_sale' => $item['price_sale'],
                                'variant_size_name' => $item['size']['name'],
                                'variant_color_name' => $item['color']['name'],
                            ];
                        }
                        if (session()->has('giaKM') && session('giaKM') > 0) {
                            $totalAmount = $totalAmount - session('giaKM');
                        }
                        if (session()->has('userPhone') && session()->has('diaChi')) {
                            $user_phone = session('userPhone');
                            $user_address = session('diaChi');
                        }
                        $order = Order::query()->create([
                            'user_id' => $user->id,
                            'user_name' => $user->name,
                            'user_email' => $user->email,
                            'user_phone' => $user_phone,
                            'user_address' => $user_address,
                            'user_note' => $_GET['vnp_OrderInfo'],
                            'status_order' => 'confirmed',
                            'payment' => 'paid',
                            'total_price' => $totalAmount,
                        ]);
                        foreach ($dataItem as $item) {
                            $item['order_id'] = $order->id;

                            OrderItem::query()->create($item);
                        }
                        $emailUser = $user->email;
                        Mail::send('client.carts.mailHD.mail', compact('emailUser'), function ($email) use ($emailUser) {
                            $email->to($emailUser);
                            $email->subject('Hóa đơn điện tử');
                        });
                    });
                    // dd(session()->all());
                    session()->forget('cart');
                    if (session()->has('giaKM') && session('maKM')) {
                        $modelMa = KhuyenMai::query()->where('maKM', session('maKM'))->first();
                        $soluong = $modelMa->soluong;
                        $modelMa->update(['soluong' => $soluong - 1]);
                        session()->forget('giaKM');
                        session()->forget('maKM');
                        session()->forget('userPhone');
                        session()->forget('diaChi');
                    }
                    return redirect()->route('auth.acc');
                } catch (\Exception $e) {
                    dd($e->getMessage());
                    return back()->with('error', 'Lỗi đặt hàng!');
                }
                // echo "<span>GD Thanh cong</span>";
            } else {
                echo "<script>alert('Thanh toán không thành công!')</script>";
                return redirect() - route('order.checkout');
            }
        } else {
            echo "<script>alert('Dữ liệu không hợp lệ!')</script>";
            return redirect() - route('order.checkout');
        }
        // require_once 'vnpay/vnpay_return.php';
    }
}
