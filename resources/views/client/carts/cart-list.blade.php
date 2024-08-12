@extends('layouts.master')

@section('title')
    Giỏ hàng của tôi
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active">Giỏ hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->
    <!-- Begin Uren's Cart Area -->
    <div class="kenne-cart-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('cart.list') }}" method="POST">
                        @csrf
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="kenne-product-remove">Xóa</th>
                                        <th class="kenne-product-thumbnail">Ảnh</th>
                                        <th class="cart-product-name">Sản phẩm</th>
                                        <th class="kenne-product-price">Đơn giá</th>
                                        <th class="kenne-product-quantity">Số lượng</th>
                                        <th class="kenne-product-subtotal">Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (session()->has('cart'))
                                        @foreach (session('cart') as $itemCart)
                                            <tr>
                                                <td class="kenne-product-remove">
                                                    <a href="javascript:void(0)">
                                                        <i class="fa fa-trash" title="Xóa"></i>
                                                    </a>
                                                </td>
                                                <td class="kenne-product-thumbnail">
                                                    <a href="{{ route('products.show', $itemCart['id']) }}">
                                                        @php
                                                            $url = $itemCart['img_thumbnail'];
                                                            if (!\Str::contains($url, 'http')) {
                                                                $url = \Storage::url($url);
                                                            }
                                                        @endphp
                                                        <img src="{{ $url }}" alt="Uren's Cart Thumbnail"
                                                            width="150px">
                                                    </a>
                                                </td>
                                                <td class="kenne-product-name">
                                                    <a
                                                        href="{{ route('products.show', $itemCart['id']) }}">{{ $itemCart['name'] }}</a>
                                                </td>
                                                <td class="kenne-product-price">
                                                    {{ number_format((int) $itemCart['price_regular'], 0, ',', '.') }}(VND)
                                                </td>
                                                <td class="quantity">
                                                    {{ $itemCart['quantityC'] }}
                                                </td>
                                                <td class="product-subtotal">
                                                    {{ number_format((int) ($itemCart['quantityC'] * $itemCart['price_regular']), 0, ',', '.') }}(VND)
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @if (session()->has('cart'))
                            @if (session('maKM'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="delCode" class="input-text" name="delCode" type="text"
                                                    value="{{ session('maKM') }}">
                                                <input class="button" name="deleteCode" value="Bỏ dùng mã" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code"
                                                    placeholder="Mã giảm giá" type="text">
                                                <input class="button" name="apply_coupon" value="Dùng mã" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-md-5 ml-auto">
                                    <div class="cart-page-total">
                                        <h2>Giá đơn hàng</h2>
                                        <ul>
                                            @if (session()->has('giaKM') && session()->has('maKM'))
                                                <li>Tổng giỏ hàng: <span>
                                                        {{ number_format((int) $totalAmount, 0, ',', '.') }}(VND)</span>
                                                </li>
                                                <li>Được giảm: <span>
                                                        {{ number_format((int) session('giaKM'), 0, ',', '.') }}(VND)
                                                    </span>
                                                </li>
                                                <li>Tổng đơn hàng: <span>
                                                        {{ number_format((int) ($totalAmount - session('giaKM')), 0, ',', '.') }}(VND)</span>
                                                </li>
                                            @else
                                                <li>Tổng đơn hàng: <span>
                                                        {{ number_format((int) $totalAmount, 0, ',', '.') }}(VND)</span>
                                                </li>
                                            @endif
                                        </ul>
                                        @if (session()->has('cart'))
                                            <a href="{{ route('order.checkout') }}">Tiến hành đặt hàng</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Uren's Cart Area End Here -->
@endsection
