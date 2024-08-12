<!-- Begin Product Area -->
<div class="product-area ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Sản phẩm mới</h3>
                    <div class="product-arrow"></div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="kenne-element-carousel product-slider slider-nav"
                    data-slick-options='{
                "slidesToShow": 4,
                "slidesToScroll": 1,
                "infinite": false,
                "arrows": true,
                "dots": false,
                "spaceBetween": 30,
                "appendArrows": ".product-arrow"
                }'
                    data-slick-responsive='[
                {"breakpoint":992, "settings": {
                "slidesToShow": 3
                }},
                {"breakpoint":768, "settings": {
                "slidesToShow": 2
                }},
                {"breakpoint":575, "settings": {
                "slidesToShow": 1
                }}
            ]'>

                    @foreach ($data as $prdNew)
                        <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="{{ route('products.show', $prdNew) }}">
                                        @php
                                            $url = $prdNew->img_thumbnail;
                                            if (!\Str::contains($url, 'http')) {
                                                $url = \Storage::url($url);
                                            }
                                        @endphp
                                        <img class="primary-img" src="{{ $url }}" alt="Kenne's Product Image">
                                    </a>
                                    {{-- <span class="sticker-2">New</span> --}}
                                    <div class="add-actions">
                                        <ul>
                                            <li class="quick-view-btn" data-bs-toggle="modal"
                                                data-bs-target="#exampleModalCenter">
                                                <a href="javascript:void(0)" data-bs-toggle="tooltip"
                                                    data-placement="right" title="Quick View">
                                                    <i class="ion-ios-search"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Wishlist">
                                                    <i class="ion-ios-heart-outline"></i>
                                                </a>
                                            </li>
                                            {{-- <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To Compare"><i class="ion-ios-reload"></i></a> --}}
                                            </li>
                                            <li>
                                                <a href="" data-bs-toggle="tooltip" data-placement="right"
                                                    title="Add To cart">
                                                    <i class="ion-bag"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="product-desc_info">
                                        <h3 class="product-name">
                                            <a href="{{ route('products.show', $prdNew) }}">{{ $prdNew->name }}</a>
                                        </h3>
                                        <div class="price-box">
                                            <span class="new-price">
                                                {{ number_format((int) $prdNew->price_regular, 0, ',', '.') }}(VND)
                                            </span>
                                            {{-- <span class="old-price">$50.99</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{-- <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img"
                                        src="{{ asset('theme/client/assets/images/product/1-1.jpg') }}"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img"
                                        src="{{ asset('theme/client/assets/images/product/1-2.jpg') }}"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker-2">Hot</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Quibusdam
                                            ratione</a></h3>
                                    <div class="price-box">
                                        <span class="new-price">$46.91</span>
                                        <span class="old-price">$50.99</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="assets/images/product/2-1.jpg"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img" src="assets/images/product/2-2.jpg"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker">Bestseller</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Nulla
                                            laboriosam</a></h3>
                                    <div class="price-box">
                                        <span class="new-price">$80.00</span>
                                        <span class="old-price">$85,00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="assets/images/product/3-1.jpg"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img" src="assets/images/product/3-2.jpg"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker-2">Hot</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Adipisci
                                            voluptas</a></h3>
                                    <div class="price-box">
                                        <span class="new-price">$75.91</span>
                                        <span class="old-price">$80.99</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="assets/images/product/4-1.jpg"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img" src="assets/images/product/4-2.jpg"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker">Bestseller</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Possimus beatae</a>
                                    </h3>
                                    <div class="price-box">
                                        <span class="new-price">$65.00</span>
                                        <span class="old-price">$70.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="assets/images/product/5-1.jpg"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img" src="assets/images/product/5-2.jpg"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker-2">Hot</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Voluptates
                                            laudantium</a></h3>
                                    <div class="price-box">
                                        <span class="new-price">$95.00</span>
                                        <span class="old-price">$100.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="assets/images/product/6-1.jpg"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img" src="assets/images/product/6-2.jpg"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker">Bestseller</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Eligendi
                                            voluptate</a></h3>
                                    <div class="price-box">
                                        <span class="new-price">$60.00</span>
                                        <span class="old-price">$65.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="assets/images/product/7-1.jpg"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img" src="assets/images/product/7-2.jpg"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker-2">Hot</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Excepturi
                                            perspiciatis</a></h3>
                                    <div class="price-box">
                                        <span class="new-price">$50.00</span>
                                        <span class="old-price">$60.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-item">
                        <div class="single-product">
                            <div class="product-img">
                                <a href="single-product.html">
                                    <img class="primary-img" src="assets/images/product/8-1.jpg"
                                        alt="Kenne's Product Image">
                                    <img class="secondary-img" src="assets/images/product/8-2.jpg"
                                        alt="Kenne's Product Image">
                                </a>
                                <span class="sticker">Bestseller</span>
                                <div class="add-actions">
                                    <ul>
                                        <li class="quick-view-btn" data-bs-toggle="modal"
                                            data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                data-bs-toggle="tooltip" data-placement="right" title="Quick View"><i
                                                    class="ion-ios-search"></i></a>
                                        </li>
                                        <li><a href="wishlist.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Wishlist"><i class="ion-ios-heart-outline"></i></a>
                                        </li>
                                        <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To Compare"><i class="ion-ios-reload"></i></a>
                                        </li>
                                        <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
                                                title="Add To cart"><i class="ion-bag"></i></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="product-desc_info">
                                    <h3 class="product-name"><a href="single-product.html">Esse eveniet</a>
                                    </h3>
                                    <div class="price-box">
                                        <span class="new-price">$70.00</span>
                                        <span class="old-price">$75.00</span>
                                    </div>
                                    <div class="rating-box">
                                        <ul>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li><i class="ion-ios-star"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                            <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Area End Here -->
