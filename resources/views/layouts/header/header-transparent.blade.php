<div class="transparent-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="transparent-header_nav position-relative">
                    <div class="header-logo_area">
                        <a href="/">
                            <img src="{{ asset('theme/client/assets/images/menu/logo/1.png') }}" alt="Header Logo">
                        </a>
                    </div>
                    <div class="main-menu_area d-none d-lg-block">
                        <nav class="main-nav d-flex justify-content-center">
                            <ul>
                                <li class="dropdown-holder">
                                    <a href="/">Trang chủ</a>
                                </li>
                                <li class="megamenu-holder position-static">
                                    <a href="{{ route('products.index') }}">Shop <i class="ion-chevron-down"></i></a>
                                    <ul class="kenne-megamenu">
                                        <li>
                                            <span class="megamenu-title">Shop Page Layout</span>
                                            <ul>
                                                <li><a href="shop-fullwidth.html">Grid Fullwidth</a></li>
                                                <li><a href="shop-left-sidebar.html">Left Sidebar</a></li>
                                                <li><a href="shop-right-sidebar.html">Right Sidebar</a></li>
                                                <li><a href="shop-list-fullwidth.html">List Fullwidth</a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-left-sidebar.html">List Left Sidebar</a>
                                                </li>
                                                <li>
                                                    <a href="shop-list-right-sidebar.html">List Right Sidebar</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span class="megamenu-title">Single Product Style</span>
                                            <ul>
                                                <li><a href="single-product-gallery-left.html">Gallery
                                                        Left</a>
                                                </li>
                                                <li><a href="single-product-gallery-right.html">Gallery
                                                        Right</a>
                                                </li>
                                                <li><a href="single-product-tab-style-left.html">Tab Style
                                                        Left</a>
                                                </li>
                                                <li><a href="single-product-tab-style-right.html">Tab Style
                                                        Right</a>
                                                </li>
                                                <li><a href="single-product-sticky-left.html">Sticky
                                                        Left</a>
                                                </li>
                                                <li><a href="single-product-sticky-right.html">Sticky
                                                        Right</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span class="megamenu-title">Single Product Type</span>
                                            <ul>
                                                <li><a href="single-product.html">Single Product</a></li>
                                                <li><a href="single-product-sale.html">Single Product
                                                        Sale</a>
                                                </li>
                                                <li><a href="single-product-group.html">Single Product
                                                        Group</a>
                                                </li>
                                                <li><a href="single-product-variable.html">Single Product
                                                        Variable</a>
                                                </li>
                                                <li><a href="single-product-affiliate.html">Single Product
                                                        Affiliate</a>
                                                </li>
                                                <li><a href="single-product-slider.html">Single Product
                                                        Slider</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><span class="megamenu-title">Shop Related Pages</span>
                                            <ul>
                                                <li><a href="my-account.html">My Account</a></li>
                                                <li><a href="login-register.html">Login | Register</a></li>
                                                <li><a href="wishlist.html">Wishlist</a></li>
                                                <li><a href="cart.html">Cart</a></li>
                                                <li><a href="checkout.html">Checkout</a></li>
                                                <li><a href="compare.html">Compare</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Pages <i class="ion-chevron-down"></i></a>
                                    <ul class="kenne-dropdown">
                                        <li><a href="coming-soon_page.html">Coming Soon</a></li>
                                        <li><a href="404.html">Error 404</a></li>
                                        <li><a href="faq.html">FAQ</a></li>
                                    </ul>
                                </li>
                                <li><a href="javascript:void(0)">Blog <i class="ion-chevron-down"></i></a>
                                    <ul class="kenne-dropdown">
                                        <li><a href="blog-grid_view.html">Grid View</a></li>
                                        <li><a href="blog-list_view.html">List View</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact-us.html">Contact Us</a></li>
                                <li><a href="about-us.html">About Us</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header-right_area header-right_area-2">
                        <ul>
                            <li class="mobile-menu_wrap d-inline-block d-lg-none">
                                <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn color--white">
                                    <i class="ion-android-menu"></i>
                                </a>
                            </li>
                            <li class="minicart-wrap">
                                <a href="#miniCart" class="minicart-btn toolbar-btn">
                                    <div class="minicart-count_area">
                                        <span class="item-count">
                                            @if (session()->has('cart'))
                                                {{ count(session('cart')) }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                        <i class="ion-bag"></i>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#searchBar" class="search-btn toolbar-btn">
                                    <i class="ion-ios-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvasMenu" class="menu-btn toolbar-btn color--white d-none d-lg-block">
                                    <i class="ion-android-menu"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
