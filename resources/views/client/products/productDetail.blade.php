@extends('layouts.master')

@section('css-libs')
    <style>
        .sp-area .sp-nav .sp-content .qty-btn_area>ul li>button {
            border: 1px solid #e5e5e5;
            display: block;
            padding: 10px 15px;
            color: #242424;
            text-transform: uppercase;
        }

        .sp-area .sp-nav .sp-content .qty-btn_area>ul li>button:hover {
            background-color: #a8741a;
            border-color: #a8741a;
            color: #ffffff !important;
        }

        .sp-area .sp-nav .sp-content .qty-btn_area>ul li>button.qty-cart_btn {
            background-color: #a8741a;
            color: #ffffff;
        }

        .sp-area .sp-nav .sp-content .qty-btn_area>ul li>button.qty-cart_btn:hover {
            background-color: #242424;
            border-color: #242424;
        }
    </style>
@endsection

@section('title')
    Chi tiết sản phẩm
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                {{-- <h2>Chi tiết sản phẩm</h2> --}}
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Chi tiết sản phẩm</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Single Product Area -->
    <div class="sp-area">
        <div class="container">
            <div class="sp-nav">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="sp-img_area">
                            <div class="sp-img_slider slick-img-slider kenne-element-carousel"
                                data-slick-options='{
                            "slidesToShow": 1,
                            "arrows": false,
                            "fade": true,
                            "draggable": false,
                            "swipe": false,
                            "asNavFor": ".sp-img_slider-nav"
                            }'>
                                @foreach ($prdDetail->galleries as $prdGlr)
                                    <div class="single-slide red zoom">
                                        @php
                                            $url = $prdGlr->image;
                                            if (!\Str::contains($url, 'http')) {
                                                $url = \Storage::url($url);
                                            }
                                        @endphp
                                        <img src="{{ $url }}" alt="Kenne's Product Image">
                                    </div>
                                @endforeach
                            </div>
                            <div class="sp-img_slider-nav slick-slider-nav kenne-element-carousel arrow-style-2 arrow-style-3"
                                data-slick-options='{
                            "slidesToShow": 3,
                            "asNavFor": ".sp-img_slider",
                            "focusOnSelect": true,
                            "arrows" : true,
                            "spaceBetween": 30
                            }'
                                data-slick-responsive='[
                                    {"breakpoint":1501, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":1200, "settings": {"slidesToShow": 2}},
                                    {"breakpoint":992, "settings": {"slidesToShow": 4}},
                                    {"breakpoint":768, "settings": {"slidesToShow": 3}},
                                    {"breakpoint":575, "settings": {"slidesToShow": 2}}
                                ]'>
                                @foreach ($prdDetail->galleries as $prdGlr)
                                    <div class="single-slide red zoom">
                                        @php
                                            $url = $prdGlr->image;
                                            if (!\Str::contains($url, 'http')) {
                                                $url = \Storage::url($url);
                                            }
                                        @endphp
                                        <img src="{{ $url }}" alt="Kenne's Product Image">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <form class="sp-content" action="{{ route('products.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $prdDetail->id }}">
                            <div class="sp-heading">
                                <h5><a href="{{ route('products.show', $prdDetail) }}">{{ $prdDetail->name }}</a></h5>
                            </div>
                            {{-- <span class="reference">Reference: demo_1</span> --}}
                            <div class="rating-box">
                                <ul>
                                    <li><i class="ion-android-star"></i></li>
                                    <li><i class="ion-android-star"></i></li>
                                    <li><i class="ion-android-star"></i></li>
                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                    <li class="silver-color"><i class="ion-android-star"></i></li>
                                </ul>
                            </div>
                            <div class="sp-essential_stuff">
                                <ul>
                                    <li>Product Code: <a href="javascript:void(0)">{{ $prdDetail->slug }}</a></li>
                                    <li>Lượt xem: <a href="javascript:void(0)">{{ $prdDetail->views }}</a></li>
                                    <li>Tình trạng: <a href="javascript:void(0)">
                                            {!! $prdDetail->is_active == 1 ? 'Còn hàng' : 'Hết hàng' !!}
                                        </a></li>
                                    <li>Giá sản phẩm: <a href="javascript:void(0)">
                                            <span>
                                                {{ number_format((int) $prdDetail->price_regular, 0, ',', '.') }}(VND)
                                            </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="row">
                                <div class="product-size_box col-md-2">
                                    <span>Size</span>
                                    <select class="myniceselect nice-select" name="size_id">
                                        @foreach ($prdSizes as $size)
                                            <option value="{{ $size->id }}">{{ $size->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="product-size_box col-md-2">
                                    <span>Color</span>
                                    <select class="myniceselect nice-select" name="color_id">
                                        @foreach ($prdColors as $color)
                                            <option value="{{ $color->id }}">{{ $color->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="quantity">
                                <label>Quantity</label>
                                <div class="cart-plus-minus">
                                    <input class="cart-plus-minus-box" value="1" type="number" name="quantityC">
                                    <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                    <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                </div>
                            </div>
                            <div class="qty-btn_area">
                                <ul>
                                    <li>
                                        <button class="qty-cart_btn" type="submit">Thêm vào giỏ hàng</button>
                                    </li>
                                    {{-- <li><a class="qty-wishlist_btn" href="wishlist.html" data-bs-toggle="tooltip"
                                            title="Add To Wishlist"><i class="ion-android-favorite-outline"></i></a>
                                    </li> --}}
                                </ul>
                            </div>
                            <div class="kenne-tag-line">
                                <h6>Tags:</h6>
                                @foreach ($prdDetail->tags as $tag)
                                    <span class="badge bg-warning">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                            <div class="kenne-social_link">
                                <ul>
                                    <li class="facebook">
                                        <a href="https://www.facebook.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Facebook">
                                            <i class="fab fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li class="twitter">
                                        <a href="https://twitter.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Twitter">
                                            <i class="fab fa-twitter-square"></i>
                                        </a>
                                    </li>
                                    <li class="youtube">
                                        <a href="https://www.youtube.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Youtube">
                                            <i class="fab fa-youtube"></i>
                                        </a>
                                    </li>
                                    <li class="google-plus">
                                        <a href="https://www.plus.google.com/discover" data-bs-toggle="tooltip"
                                            target="_blank" title="Google Plus">
                                            <i class="fab fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li class="instagram">
                                        <a href="https://rss.com/" data-bs-toggle="tooltip" target="_blank"
                                            title="Instagram">
                                            <i class="fab fa-instagram"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Single Product Area End Here -->

    <!-- Begin Product Tab Area Two -->
    <div class="product-tab_area-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="sp-product-tab_nav">
                        <div class="product-tab">
                            <ul class="nav product-menu">
                                <li><a class="active" data-bs-toggle="tab" href="#description"><span>Mô tả sản
                                            phẩm</span></a>
                                </li>
                                {{-- <li><a data-bs-toggle="tab" href="#specification"><span>Specification</span></a></li> --}}
                                <li><a data-bs-toggle="tab" href="#reviews"><span>Bình luận - Đánh giá</span></a></li>
                            </ul>
                        </div>
                        <div class="tab-content uren-tab_content">
                            <div id="description" class="tab-pane active show" role="tabpanel">
                                <div class="product-description">
                                    {!! $prdDetail->content ? $prdDetail->content : '<span class="title">Chưa cập nhật mô tả cho sản phẩm!</span>' !!}
                                    {{-- <ul>
                                        <li>
                                            <span class="title">Ullam aliquam</span>
                                            <span>Voluptatum, minus? Optio molestias voluptates aspernatur laborum
                                                ratione minima, natus eaque nemo rem quisquam, suscipit architecto
                                                saepe. Debitis omnis labore laborum consectetur, quas, esse voluptates
                                                minus aliquam modi nesciunt earum! Vero rerum molestiae corporis libero
                                                repellat doloremque quae sapiente ratione maiores qui aliquam, sunt
                                                obcaecati! Iure nisi doloremque numquam delectus.</span>
                                        </li>
                                        <li>
                                            <span class="title">Enim tempore</span>
                                            <span>Molestias amet quibusdam eligendi exercitationem alias labore tenetur
                                                quaerat veniam similique aspernatur eveniet, suscipit corrupti itaque
                                                dolore deleniti nobis, rerum reprehenderit recusandae. Eligendi beatae
                                                asperiores nisi distinctio doloribus voluptatibus voluptas repellendus
                                                tempore unde velit temporibus atque maiores aliquid deserunt aspernatur
                                                amet, soluta fugit magni saepe fugiat vel sunt voluptate vitae</span>
                                        </li>
                                        <li>
                                            <span class="title">Laudantium suscipit</span>
                                            <span>Odit repudiandae maxime, ducimus necessitatibus error fugiat nihil eum
                                                dolorem animi voluptates sunt, rem quod reprehenderit expedita, nostrum
                                                sit accusantium ut delectus. Voluptates at ipsam, eligendi labore
                                                dignissimos consectetur reprehenderit id error excepturi illo velit
                                                ratione nisi nam saepe quod! Reiciendis eos, velit fugiat voluptates
                                                accusamus nesciunt dicta ratione mollitia, asperiores error aliquam!
                                                Reprehenderit provident, omnis blanditiis fugit, accusamus deserunt
                                                illum unde, voluptatum consequuntur illo officiis labore doloremque
                                                quidem aperiam! Fuga, expedita? Laboriosam eum, tempore vitae libero
                                                voluptate omnis ducimus doloremque hic quibusdam reiciendis ab itaque
                                                aperiam maiores laudantium esse, consequuntur quos labore modi quasi
                                                recusandae distinctio iusto optio officia tempora.</span>
                                        </li>
                                        <li>
                                            <span class="title">Molestiae veritatis officia</span>
                                            <span>Illum fuga esse tenetur inventore, in voluptatibus saepe iste quia
                                                cupiditate, explicabo blanditiis accusantium ut. Eaque nostrum, quisquam
                                                doloribus asperiores tempore autem. Ea perspiciatis vitae reiciendis
                                                maxime similique vel, id ratione blanditiis ullam officiis odio sunt nam
                                                quos atque accusantium ad! Repellendus, magni aliquid. Iure asperiores
                                                veniam eum unde dignissimos reprehenderit ut atque velit, harum labore
                                                nam expedita, pariatur excepturi consectetur animi optio mollitia ad a
                                                natus eaque aut assumenda inventore dolor obcaecati! Enim ab tempore
                                                nulla iusto consequuntur quod sit voluptatibus adipisci earum fuga,
                                                explicabo amet, provident, molestiae optio. Ducimus ex necessitatibus
                                                assumenda, nisi excepturi ut aspernatur est eius dignissimos pariatur
                                                unde ipsum sunt quaerat.</span>
                                        </li>
                                    </ul> --}}
                                </div>
                            </div>
                            {{-- <div id="specification" class="tab-pane" role="tabpanel">
                                <table class="table table-bordered specification-inner_stuff">
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><strong>Memory</strong></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>test 1</td>
                                            <td>8gb</td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><strong>Processor</strong></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td>No. of Cores</td>
                                            <td>1</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div> --}}
                            <div id="reviews" class="tab-pane" role="tabpanel">
                                <div class="tab-pane active" id="tab-review">
                                    <form class="form-horizontal" id="form-review">
                                        <div id="review">
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    <tr>
                                                        <td style="width: 50%;"><strong>Tên khách hàng</strong></td>
                                                        <td class="text-right">26/10/19</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2">
                                                            <p>Good product! Thank you very much</p>
                                                            <div class="rating-box">
                                                                <ul>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                    <li><i class="ion-android-star"></i></li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <h2>Bình luận</h2>
                                        <div class="form-group required second-child">
                                            <div class="col-sm-12 p-0">
                                                <label class="control-label">Chia sẻ ý kiến của bạn về sản phẩm</label>
                                                <textarea class="review-textarea" name="con_message" id="con_message"></textarea>
                                                <div class="help-block">
                                                    <span class="text-danger">Lưu ý:</span>
                                                    Không hỗ trợ dịch thẻ HTML
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group last-child required">
                                            <div class="col-sm-12 p-0">
                                                <div class="your-opinion">
                                                    <label>Đánh giá của bạn</label>
                                                    <span>
                                                        <select class="star-rating">
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>
                                                        </select>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="kenne-btn-ps_right">
                                                <button class="kenne-btn">Gửi</button>
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
    </div>
    <!-- Product Tab Area Two End Here -->

    <!-- Begin Product Area -->
    <div class="product-area pb-90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h3>Hot Deal</h3>
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

                        @foreach ($prdHD as $hotDeal)
                            <div class="product-item">
                                <div class="single-product">
                                    <div class="product-img">
                                        <a href="{{ route('products.show', $hotDeal) }}">
                                            @php
                                                $url = $hotDeal->img_thumbnail;
                                                if (!\Str::contains($url, 'http')) {
                                                    $url = \Storage::url($url);
                                                }
                                            @endphp
                                            <img class="primary-img" src="{{ $url }}"
                                                alt="Kenne's Product Image">
                                        </a>
                                        {!! $hotDeal->is_hot_deal ? '<span class="sticker-2">Hot</span>' : '' !!}
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
                                                    <a href="wishlist.html" data-bs-toggle="tooltip"
                                                        data-placement="right" title="Add To Wishlist">
                                                        <i class="ion-ios-heart-outline"></i>
                                                    </a>
                                                </li>
                                                {{-- <li><a href="compare.html" data-bs-toggle="tooltip" data-placement="right"
                                            title="Add To Compare"><i class="ion-ios-reload"></i></a> --}}
                                                </li>
                                                <li>
                                                    <a href="cart.html" data-bs-toggle="tooltip" data-placement="right"
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
                                                <a href="single-product.html">{{ $hotDeal->name }}</a>
                                            </h3>
                                            <div class="price-box">
                                                <span class="new-price">
                                                    {{ number_format((int) $hotDeal->price_regular, 0, ',', '.') }}(VND)
                                                </span>
                                                {{-- <span class="old-price">$50.99</span> --}}
                                            </div>
                                            {{-- <div class="rating-box">
                                    <ul>
                                        <li><i class="ion-ios-star"></i></li>
                                        <li><i class="ion-ios-star"></i></li>
                                        <li><i class="ion-ios-star"></i></li>
                                        <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                        <li class="silver-color"><i class="ion-ios-star-outline"></i></li>
                                    </ul>
                                </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="product-item">
                            <div class="single-product">
                                <div class="product-img">
                                    <a href="single-product.html">
                                        <img class="primary-img" src="assets/images/product/1-1.jpg"
                                            alt="Kenne's Product Image">
                                        <img class="secondary-img" src="assets/images/product/1-2.jpg"
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
                                        <h3 class="product-name"><a href="single-product.html">Quibusdam ratione</a></h3>
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

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
@endsection
