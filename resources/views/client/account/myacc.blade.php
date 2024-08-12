@extends('layouts.master')

@section('title')
    {{ Auth::user()->name }}
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li class="active">Tài khoản của tôi</li>
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
                                <a class="nav-link active" id="account-dashboard-tab" data-bs-toggle="tab"
                                    href="#account-dashboard" role="tab" aria-controls="account-dashboard"
                                    aria-selected="true">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-orders-tab" data-bs-toggle="tab" href="#account-orders"
                                    role="tab" aria-controls="account-orders" aria-selected="false">Đơn hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-details-tab" data-bs-toggle="tab" href="#account-details"
                                    role="tab" aria-controls="account-details" aria-selected="false">Chi tiết tài
                                    khoản</a>
                            </li>
                            @if (Auth::user()->type == 'admin')
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Truy cập ADMIN</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" id="account-logout-tab" role="tab" aria-selected="false"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    {{ __('Đăng xuất') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-9">
                        <div class="tab-content myaccount-tab-content" id="account-page-tab-content">
                            <div class="tab-pane fade show active" id="account-dashboard" role="tabpanel"
                                aria-labelledby="account-dashboard-tab">
                                <div class="myaccount-dashboard">
                                    <p>Xin chào <b>{{ Auth::user()->name }}</b> (không phải {{ Auth::user()->name }}?
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Đăng xuất!') }}
                                        </a>)
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    </p>
                                    <p>Từ bảng điều khiển tài khoản, bạn có thể xem các đơn hàng gần đây, trạng thái thanh
                                        toán và thông tin tài khoản của bạn.</p>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-orders" role="tabpanel"
                                aria-labelledby="account-orders-tab">
                                <div class="myaccount-orders">
                                    <h4 class="small-title">Đơn hàng của tôi</h4>
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <tbody>
                                                <tr>
                                                    <th>Đơn hàng</th>
                                                    <th>Ngày đặt hàng</th>
                                                    <th>Trạng thái</th>
                                                    <th>Tổng</th>
                                                    <th></th>
                                                </tr>
                                                @foreach ($model as $item)
                                                    <tr>
                                                        <td>#{{ $item->id }}-{{ Auth::user()->id }}</td>
                                                        <td>{{ $item->created_at }}</td>
                                                        <td>
                                                            <?php
                                                            if ($item->status_order == 'pending') {
                                                                echo 'Chờ xác nhận';
                                                            } elseif ($item->status_order == 'confirmed') {
                                                                echo 'Đã xác nhận';
                                                            } elseif ($item->status_order == 'preparing_goods') {
                                                                echo 'Đang chuẩn bị hàng';
                                                            } elseif ($item->status_order == 'shipping') {
                                                                echo 'Đang vận chuyển';
                                                            } elseif ($item->status_order == 'delivered') {
                                                                echo 'Đã giao hàng';
                                                            } elseif ($item->status_order == 'canceled') {
                                                                echo 'Đơn hàng bị hủy';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td>{{ number_format((int) $item->total_price, 0, ',', '.') }}</td>
                                                        <td>
                                                            <a href="{{ route('hd.hdDetail', $item->id) }}"
                                                                class="kenne-btn kenne-btn_sm">
                                                                <span>Xem chi tiết</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="account-details" role="tabpanel"
                                aria-labelledby="account-details-tab">
                                <div class="myaccount-details">
                                    <form action="" class="kenne-form">
                                        <div class="kenne-form-inner">
                                            <div class="single-input single-input-half">
                                                <label for="account-details-firstname">Họ và tên:</label>
                                                <input type="text" id="account-details-firstname"
                                                    value="{{ Auth::user()->name }}" disabled>
                                            </div>
                                            <div class="single-input">
                                                <label for="account-details-email">Email:</label>
                                                <input type="email" id="account-details-email"
                                                    value="{{ Auth::user()->email }}" disabled>
                                            </div>
                                        </div>
                                    </form>
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
