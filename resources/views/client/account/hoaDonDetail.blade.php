@extends('layouts.master')

@section('title')
    Chi tiết hóa đơn
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active">Chi tiết hóa đơn</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->
    <!-- Begin Kenne's Page Content Area -->
    <main class="page-content">
        <div class="account-page-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <ul class="nav myaccount-tab-trigger" id="account-page-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('auth.acc') }}">{{ $order->user_name }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">{{ $order->user_phone }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link">{{ $order->user_address }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">Chi tiết đơn hàng</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Sản phẩm</th>
                                                    <th>Size</th>
                                                    <th>Màu</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                </tr>
                                                @foreach ($model as $item)
                                                    <tr>
                                                        <td>{{ $item->product_name }}</td>
                                                        <td>{{ $item->variant_size_name }}</td>
                                                        <td>{{ $item->variant_color_name }}</td>
                                                        <td>{{ $item->quantity }}</td>
                                                        <td>
                                                            {{ number_format((int) $item->product_price_regular, 0, ',', '.') }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="3"><strong>Tổng đơn hàng:
                                                        </strong>
                                                        {{ number_format((int) $order->total_price, 0, ',', '.') }}(VND)</td>
                                                    <td colspan="2"><strong>Ngày đặt hàng:
                                                        </strong>{{ $order->created_at }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <strong>
                                                            <?php
                                                            if ($order->status_order == 'pending') {
                                                                echo 'Chờ xác nhận';
                                                            } elseif ($order->status_order == 'confirmed') {
                                                                echo 'Đã xác nhận';
                                                            } elseif ($order->status_order == 'preparing_goods') {
                                                                echo 'Đang chuẩn bị hàng';
                                                            } elseif ($order->status_order == 'shipping') {
                                                                echo 'Đang vận chuyển';
                                                            } elseif ($order->status_order == 'delivered') {
                                                                echo 'Đã giao hàng';
                                                            } elseif ($order->status_order == 'canceled') {
                                                                echo 'Đơn hàng bị hủy';
                                                            }
                                                            ?>
                                                        </strong>
                                                    </td>
                                                    <td colspan="2">
                                                        {!! $order->payment == 'unpaid'
                                                            ? '<strong class="text-danger">Chưa thanh toán</strong>'
                                                            : '<strong class="text-success">Đã thanh toán</strong>' !!}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Kenne's Account Page Area End Here -->
    </main>
@endsection
