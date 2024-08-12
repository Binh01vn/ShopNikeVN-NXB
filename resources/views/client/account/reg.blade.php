@extends('layouts.master')

@section('title')
    Đăng ký
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                {{-- <h2>Shop Related</h2> --}}
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Đăng ký</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->
    <!-- Begin Kenne's Login Register Area -->
    <div class="kenne-login-register_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xs-12">
                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Đăng ký tài khoản</h4>
                            <div class="row">
                                <div class="col-md-12 col-12 mb--20">
                                    <label>Họ và tên:</label>
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <label>Email:</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Mật khẩu:</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label>Xác nhận mật khẩu</label>
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <button class="kenne-register_btn" type="submit">Đăng ký</button>
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <a href="{{ route('login') }}"><u>Đăng nhập tại đây!</u></a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Login Register Area  End Here -->
@endsection
