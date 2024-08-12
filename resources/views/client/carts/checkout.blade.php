@extends('layouts.master')

@section('title')
    Tiến hành đặt hàng
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active">Tiến hành đặt hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->
    <!-- Begin Kenne's Checkout Area -->
    <div class="checkout-area">
        <div class="container">
            @guest
                <div class="row">
                    <div class="col-lg-12">
                        <div class="coupon-accordion">
                            <h3>Bạn chưa đăng nhập? <span id="showlogin">Đăng nhập tại đây!</span></h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <p class="form-row-first">
                                            <label for="email">Email:</label>
                                            <input type="email" @error('email') is-invalid @enderror" name="email"
                                                placeholder="Email Address" value="{{ old('email') }}">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="form-row-last">
                                            <label>Mật khẩu:</label>
                                            <input id="password" type="password" @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </p>
                                        <p class="form-row">
                                            <input value="Login" type="submit">
                                            <label class="form-check-label" for="remember">
                                                <input type="checkbox" name="remember" id="remember"
                                                    {{ old('remember') ? 'checked' : '' }}>
                                                {{ __('Remember Me') }}
                                            </label>
                                        </p>
                                        <p class="lost-password">
                                            @if (Route::has('password.request'))
                                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <form action="{{ route('order.save') }}" class="row" method="POST">
                    @csrf
                    <div class="col-lg-6 col-12">
                        <div>
                            <div class="checkbox-form">
                                <h3>Chi tiết thanh toán</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Họ và tên:</label>
                                            <input placeholder="Full name" type="text" name="user_name" id="user_name"
                                                value="{{ auth()->user()?->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Địa chỉ email:</label>
                                            <input placeholder="Email Address" type="email" name="user_email" id="user_email"
                                                value="{{ auth()->user()?->email }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list">
                                            <label>Số điện thoại:</label>
                                            <input placeholder="Phone number" type="text" name="phone" id="phone">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Địa chỉ nhận hàng:</label>
                                            <input placeholder="Street address" type="text" name="address" id="address">
                                        </div>
                                    </div>
                                </div>
                                <div class="different-address">
                                    <div class="order-notes">
                                        <div class="checkout-form-list checkout-form-list-2">
                                            <label>Order Notes</label>
                                            <textarea id="checkout-mess" cols="30" rows="10" name="user_note"
                                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="your-order">
                            <h3>Đơn hàng của bạn</h3>
                            <div class="your-order-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="cart-product-name">Sản phẩm</th>
                                            <th class="cart-product-total">Tổng giá sản phẩm</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (session()->has('cart'))
                                            @foreach (session('cart') as $itemC)
                                                <tr class="cart_item">
                                                    <td class="cart-product-name"> {{ $itemC['name'] }}
                                                        <strong class="product-quantity">× {{ $itemC['quantityC'] }}</strong>
                                                    </td>
                                                    <td class="cart-product-total"><span
                                                            class="amount">{{ number_format((int) ($itemC['quantityC'] * $itemC['price_regular']), 0, ',', '.') }}(VND)</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                    <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Tổng giỏ hàng</th>
                                            <td>
                                                <span class="amount">
                                                    {{ number_format((int) $totalAmount, 0, ',', '.') }}(VND)
                                                </span>
                                            </td>
                                        </tr>
                                        @if (session()->has('giaKM') && session()->has('maKM'))
                                            <tr class="cart-subtotal">
                                                <th>Giảm giá</th>
                                                <td>
                                                    <span class="amount">
                                                        {{ number_format((int) session('giaKM'), 0, ',', '.') }}(VND)
                                                    </span>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Tổng đơn hàng</th>
                                                <td>
                                                    <strong>
                                                        <span class="amount">
                                                            {{ number_format((int) ($totalAmount - session('giaKM')), 0, ',', '.') }}(VND)
                                                        </span>
                                                    </strong>
                                                </td>
                                            </tr>
                                        @else
                                            <tr class="order-total">
                                                <th>Tổng đơn hàng</th>
                                                <td><strong><span
                                                            class="amount">{{ number_format((int) $totalAmount, 0, ',', '.') }}(VND)</span></strong>
                                                </td>
                                            </tr>
                                        @endif
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <div class="order-button-payment">
                                        <input name="redirect" value="Thanh toán VNPAY" type="submit">
                                    </div>
                                    <div class="order-button-payment">
                                        <input name="default" value="Đặt hàng" type="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endguest
        </div>
    </div>
    <!-- Kenne's Checkout Area End Here -->
@endsection
