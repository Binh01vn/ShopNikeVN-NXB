<!-- Begin Kenne's Footer Area -->
<div class="kenne-footer_area bg-smoke_color">
    <div class="footer-top_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="newsletter-area">
                        <div class="newsletter-logo">
                            <a href="/">
                                <img src="{{ asset('theme/client/assets/images/footer/logo/1.png') }}" alt="Logo">
                            </a>
                        </div>
                        <p class="short-desc">Subscribe to our newsleter, Enter your emil address</p>
                        <div class="newsletter-form_wrap">
                            <form action="" method="post" id="mc-embedded-subscribe-form"
                                name="mc-embedded-subscribe-form" class="newsletters-form validate" target="_blank"
                                novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <div id="mc-form" class="mc-form subscribe-form">
                                        <input id="mc-email" class="newsletter-input" type="email" autocomplete="off"
                                            placeholder="Enter email address" />
                                        <button class="newsletter-btn" id="mc-submit"><i
                                                class="ion-android-mail"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="row footer-widgets_wrap">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widgets_title">
                                <h4>Shopping</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="{{ route('products.index') }}">Product</a></li>
                                    <li><a href="javascript:void(0)">My Cart</a></li>
                                    <li><a href="javascript:void(0)">Wishlist</a></li>
                                    <li><a href="javascript:void(0)">Cart</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="footer-widgets_title">
                                <h4>Account</h4>
                            </div>
                            <div class="footer-widgets">
                                <ul>
                                    <li><a href="javascript:void(0)">Login</a></li>
                                    <li><a href="javascript:void(0)">Register</a></li>
                                    <li><a href="javascript:void(0)">Help</a></li>
                                    <li><a href="javascript:void(0)">Support</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="copyright">
                        <span>Copyright &copy; 2023 <a href="/">Kenne.</a> All rights
                            reserved.</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="payment">
                        <img src="{{ asset('theme/client/assets/images/footer/payment/1.png') }}"
                            alt="Kenne's Payment Method">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Kenne's Footer Area End Here -->
