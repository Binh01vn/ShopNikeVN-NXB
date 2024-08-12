@extends('layouts.master')

@section('title')
    Đăng nhập
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                {{-- <h2>Shop Related</h2> --}}
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Đăng nhập</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->
    <!-- Begin Kenne's Login Register Area -->
    <div class="kenne-login-register_area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 col-lg-12">
                    <!-- Login Form s-->
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="login-form">
                            <h4 class="login-title">Đăng nhập tài khoản</h4>
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <label for="email">Email:</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" placeholder="Email Address" value="{{ old('email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12 mb--20">
                                    <label>Mật khẩu:</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <div class="check-box">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                                @if (Route::has('password.request'))
                                    <div class="col-md-6 col-12 mb--20">
                                        <div class="forgotton-password_info">
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        </div>
                                    </div>
                                @endif
                                {{-- <div class="col-md-12">
                                    <button class="kenne-login_btn" type="submit">Đăng nhập</button>
                                </div> --}}
                                <div class="col-md-6 col-12 mb--20">
                                    <button class="kenne-login_btn" type="submit">Đăng nhập</button>
                                </div>
                                <div class="col-md-6 col-12 mb--20">
                                    <a href="{{ route('register') }}"><u>Đăng ký tại đây!</u></a>
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
