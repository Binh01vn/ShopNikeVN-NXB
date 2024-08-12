<div class="offcanvas-minicart_wrapper" id="miniCart">
    <div class="offcanvas-menu-inner">
        <a href="#" class="btn-close"><i class="ion-android-close"></i></a>
        @if (session()->has('cart'))
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Giỏ hàng của bạn</h4>
                </div>
                <ul class="minicart-list">
                    @foreach (session('cart') as $itemC)
                        <li class="minicart-product">
                            <div class="product-item_img">
                                @php
                                    $url = $itemC['img_thumbnail'];
                                    if (!\Str::contains($url, 'http')) {
                                        $url = \Storage::url($url);
                                    }
                                @endphp
                                <img src="{{ Storage::url($url) }}" alt="Kenne's Product Image">
                            </div>
                            <div class="product-item_content">
                                <a class="product-item_title" href="shop-left-sidebar.html">{{ $itemC['name'] }}</a>
                                <span class="product-item_quantity">{{ $itemC['quantityC'] }} x
                                    {{ number_format((int) $itemC['price_regular'], 0, ',', '.') }}(VND)
                                </span>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="minicart-item_total">
                <span>Tổng đơn hàng</span>
                <?php
                $totalAmount = 0;
                foreach (session('cart') as $variantID => $item) {
                    $totalAmount += $item['quantityC'] * $item['price_regular'];
                }
                ?>
                <span class="ammount">
                    {{ number_format((int) $totalAmount, 0, ',', '.') }}(VND)
                </span>
            </div>
            <div class="minicart-btn_area">
                <a href="{{ route('cart.list') }}" class="kenne-btn kenne-btn_fullwidth">Giỏ hàng</a>
            </div>
            <div class="minicart-btn_area">
                <a href="checkout.html" class="kenne-btn kenne-btn_fullwidth">Thanh toán</a>
            </div>
        @else
            <div class="minicart-content">
                <div class="minicart-heading">
                    <h4>Bạn chưa có sản phẩm nào trong giỏ hàng cả</h4>
                </div>
            </div>
            <div class="minicart-btn_area">
                <a href="{{ route('products.index') }}" class="kenne-btn kenne-btn_fullwidth">Mua săn ngay</a>
            </div>
        @endif
    </div>
</div>
