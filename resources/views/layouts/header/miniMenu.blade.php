<div class="offcanvas-menu_wrapper" id="offcanvasMenu">
    <div class="offcanvas-menu-inner">
        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
        <div class="offcanvas-inner_logo">
            <a href="/">
                <img src="{{ asset('theme/client/assets/images/menu/logo/1.png') }}" alt="Munoz's Offcanvas Logo">
            </a>
        </div>
        {{-- <div class="short-desc">
            <p>We are a team of designers and developers that create high quality HTML Template &
                Woocommerce,
                Shopify Themes.
            </p>
        </div> --}}
        <div class="offcanvas-component first-child">
            <span class="offcanvas-component_title">Currency</span>
            <ul class="offcanvas-component_menu">
                <li><a href="javascript:void(0)">EUR</a></li>
                <li><a href="javascript:void(0)">GBP</a></li>
                <li class="active"><a href="javascript:void(0)">USD</a></li>
            </ul>
        </div>
        <div class="offcanvas-component">
            <span class="offcanvas-component_title">Language</span>
            <ul class="offcanvas-component_menu">
                <li class="active"><a href="javascript:void(0)">English</a></li>
                <li><a href="javascript:void(0)">French</a></li>
            </ul>
        </div>
        <div class="offcanvas-component">
            <span class="offcanvas-component_title">Tài khoản</span>
            <ul class="offcanvas-component_menu">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng nhập') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng ký') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                {{ __('Đăng xuất') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('auth.acc') }}">
                                {{ __('Tài khoản của tôi') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
        <div class="offcanvas-inner-social_link">
            <div class="kenne-social_link">
                <ul>
                    <li class="facebook">
                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank" title="Facebook">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li class="twitter">
                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank" title="Twitter">
                            <i class="fab fa-twitter-square"></i>
                        </a>
                    </li>
                    <li class="youtube">
                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank" title="Youtube">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li class="google-plus">
                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip" target="_blank"
                            title="Google Plus">
                            <i class="fab fa-google-plus"></i>
                        </a>
                    </li>
                    <li class="instagram">
                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank" title="Instagram">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
