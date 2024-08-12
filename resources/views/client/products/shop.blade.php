@extends('layouts.master')

@section('title')
    Cửa hàng Kenne
@endsection

@section('contents')
    <!-- Begin Kenne's Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="breadcrumb-content">
                <h2>Kenne Shop</h2>
                <ul>
                    <li><a href="/">Trang chủ</a></li>
                    <li class="active">Cửa hàng</li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Kenne's Breadcrumb Area End Here -->

    <!-- Begin Kenne's Content Wrapper Area -->
    <div class="kenne-content_wrapper">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-lg-1">
                    <div class="kenne-sidebar-catagories_area">
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title first-child">
                                <h5>Lọc theo giá</h5>
                            </div>
                            <div class="price-filter">
                                <div id="slider-range"></div>
                                <div class="price-slider-amount">
                                    <div class="label-input">
                                        <label>Giá : </label>
                                        <input type="text" id="amount" name="price" placeholder="Add Your Price" />
                                        <button class="filter-btn">Lọc</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kenne-sidebar_categories category-module">
                            <div class="kenne-categories_title">
                                <h5>Danh mục sản phẩm</h5>
                            </div>
                            <div class="sidebar-categories_menu">
                                <ul>
                                    {{-- <li class="has-sub"><a href="javascript:void(0)">Apparel<i
                                                class="ion-ios-plus-empty"></i></a>
                                        <ul>
                                            <li><a href="javascript:void(0)">Maxime</a></li>
                                            <li><a href="javascript:void(0)">Veniam Sed</a></li>
                                            <li><a href="javascript:void(0)">Praesentium</a></li>
                                            <li><a href="javascript:void(0)">Eligendi</a></li>
                                            <li><a href="javascript:void(0)">Maxime</a></li>
                                            <li><a href="javascript:void(0)">Ex deserunt</a></li>
                                            <li><a href="javascript:void(0)">Doloremque</a></li>
                                            <li><a href="javascript:void(0)">Facilis</a></li>
                                            <li><a href="javascript:void(0)">Cumque Magni</a></li>
                                        </ul>
                                    </li> --}}
                                    @foreach ($ctlData as $itemCtl)
                                        <li><a href="javascript:void(0)">{{ $itemCtl->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title">
                                <h5>Color</h5>
                            </div>
                            <ul class="sidebar-checkbox_list">
                                <li>
                                    <a href="javascript:void(0)">Black (1)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Blue (1)</a>
                                </li>
                                <li>
                                    <a href="javascript:void(0)">Gold (3)</a>
                                </li>
                            </ul>
                        </div>
                        <div class="kenne-sidebar_categories list-product_area">
                            <div class="kenne-categories_title">
                                <h5>Sản phẩm cũ</h5>
                            </div>
                            <div class="kenne-element-carousel list-product_slider list-product_slider-2 slider-nav"
                                data-slick-options='{
                            "slidesToShow": 1,
                            "slidesToScroll": 1,
                            "infinite": false,
                            "arrows": false,
                            "dots": false,
                            "spaceBetween": 30,
                            "rows" : 2
                            }'
                                data-slick-responsive='[
                            {"breakpoint":992, "settings": {
                            "slidesToShow": 2
                            }},
                            {"breakpoint":576, "settings": {
                            "slidesToShow": 1
                            }}
                        ]'>

                                @foreach ($prdDataOld as $prdOld)
                                    <div class="product-item">
                                        <div class="single-product">
                                            <div class="product-img">
                                                <a href="{{ route('products.show', $prdOld) }}">
                                                    @php
                                                        $url = $prdOld->img_thumbnail;
                                                        if (!\Str::contains($url, 'http')) {
                                                            $url = \Storage::url($url);
                                                        }
                                                    @endphp
                                                    <img class="primary-img" src="{{ $url }}"
                                                        alt="Kenne's Product Image">
                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <div class="product-desc_info">
                                                    <span class="manufacture-product">
                                                        @foreach ($prdOld->tags as $tag)
                                                            {{ $tag->name }} <br>
                                                        @endforeach
                                                    </span>
                                                    <h3 class="product-name">
                                                        <a
                                                            href="{{ route('products.show', $prdOld) }}">{{ $prdOld->name }}</a>
                                                    </h3>
                                                    <div class="price-box">
                                                        <span class="new-price">
                                                            {{ number_format((int) $prdOld->price_regular, 0, ',', '.') }}(VND)
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="kenne-sidebar_categories">
                            <div class="kenne-categories_title kenne-tags_title">
                                <h5>Sản phẩm Tags</h5>
                            </div>
                            <ul class="kenne-tags_list">
                                <li><a href="javascript:void(0)">Hoodie</a></li>
                                <li><a href="javascript:void(0)">Jacket</a></li>
                                <li><a href="javascript:void(0)">Frocks</a></li>
                                <li><a href="javascript:void(0)">Crochet</a></li>
                                <li><a href="javascript:void(0)">Scarf</a></li>
                                <li><a href="javascript:void(0)">Shirts</a></li>
                                <li><a href="javascript:void(0)">Men</a></li>
                                <li><a href="javascript:void(0)">Women</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                    <div class="shop-toolbar">
                        <div class="product-view-mode">
                            <a class="active grid-3" data-target="gridview-3" data-toggle="tooltip" data-placement="top"
                                title="Grid View"><i class="fa fa-th"></i></a>
                            <a class="list" data-target="listview" data-toggle="tooltip" data-placement="top"
                                title="List View"><i class="fa fa-th-list"></i></a>
                        </div>
                        <div class="product-item-selection_area">
                            <div class="product-short">
                                <label class="select-label">Short By:</label>
                                <select class="nice-select myniceselect">
                                    <option value="1">Default sorting</option>
                                    <option value="2">Name, A to Z</option>
                                    <option value="3">Name, Z to A</option>
                                    <option value="4">Price, low to high</option>
                                    <option value="5">Price, high to low</option>
                                    <option value="5">Rating (Highest)</option>
                                    <option value="5">Rating (Lowest)</option>
                                    <option value="5">Model (A - Z)</option>
                                    <option value="5">Model (Z - A)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="shop-product-wrap grid gridview-3 row">

                        @foreach ($prdData as $itemPrd)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="product-item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{ route('products.show', $itemPrd) }}">
                                                @php
                                                    $url = $itemPrd->img_thumbnail;
                                                    if (!\Str::contains($url, 'http')) {
                                                        $url = \Storage::url($url);
                                                    }
                                                @endphp
                                                <img class="primary-img" src="{{ $url }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                            {{-- <span class="sticker">-15%</span> --}}
                                            <div class="add-actions">
                                                <ul>
                                                    <li class="quick-view-btn" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                            data-bs-toggle="tooltip" data-placement="right"
                                                            title="Quick View"><i class="ion-ios-search"></i></a>
                                                    </li>
                                                    <li><a href="wishlist.html" data-bs-toggle="tooltip"
                                                            data-placement="right" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                    </li>
                                                    {{-- <li><a href="compare.html" data-bs-toggle="tooltip"
                                                            data-placement="right" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a>
                                                    </li> --}}
                                                    <li><a href="cart.html" data-bs-toggle="tooltip"
                                                            data-placement="right" title="Add To cart"><i
                                                                class="ion-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <h3 class="product-name">
                                                    <a
                                                        href="{{ route('products.show', $itemPrd) }}">{{ $itemPrd->name }}</a>
                                                </h3>
                                                <div class="price-box">
                                                    <span class="new-price">
                                                        {{ number_format((int) $itemPrd->price_regular, 0, ',', '.') }}(VND)
                                                    </span>
                                                    {{-- <span class="old-price">$50.99</span> --}}
                                                </div>
                                                {{-- <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-product_item">
                                    <div class="single-product">
                                        <div class="product-img">
                                            <a href="{{ route('products.show', $itemPrd) }}">
                                                @php
                                                    $url = $itemPrd->img_thumbnail;
                                                    if (!\Str::contains($url, 'http')) {
                                                        $url = \Storage::url($url);
                                                    }
                                                @endphp
                                                <img class="primary-img" src="{{ $url }}"
                                                    alt="Kenne's Product Image">
                                            </a>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-desc_info">
                                                <div class="price-box">
                                                    <span class="new-price">
                                                        {{ number_format((int) $itemPrd->price_regular, 0, ',', '.') }}(VND)
                                                    </span>
                                                    {{-- <span class="old-price">$50.99</span> --}}
                                                </div>
                                                <h6 class="product-name">
                                                    <a
                                                        href="{{ route('products.show', $itemPrd) }}">{{ $itemPrd->name }}</a>
                                                </h6>
                                                {{-- <div class="rating-box">
                                                    <ul>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li><i class="ion-ios-star"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-half"></i></li>
                                                        <li class="silver-color"><i class="ion-ios-star-outline"></i>
                                                        </li>
                                                    </ul>
                                                </div> --}}
                                                <div class="product-short_desc">
                                                    {!! $itemPrd->content
                                                        ? $itemPrd->content
                                                        : '<strong class="text-danger">Chưa cập nhật mô tả cho sản phẩm!</strong>' !!}
                                                </div>
                                            </div>
                                            <div class="add-actions">
                                                <ul>
                                                    <li class="quick-view-btn" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModalCenter"><a href="javascript:void(0)"
                                                            data-bs-toggle="tooltip" data-placement="top"
                                                            title="Quick View"><i class="ion-ios-search"></i></a>
                                                    </li>
                                                    <li><a href="wishlist.html" data-bs-toggle="tooltip"
                                                            data-placement="top" title="Add To Wishlist"><i
                                                                class="ion-ios-heart-outline"></i></a>
                                                    </li>
                                                    {{-- <li><a href="compare.html" data-bs-toggle="tooltip"
                                                            data-placement="top" title="Add To Compare"><i
                                                                class="ion-ios-reload"></i></a> --}}
                                                    </li>
                                                    <li><a href="cart.html" data-bs-toggle="tooltip" data-placement="top"
                                                            title="Add To cart"><i class="ion-bag"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            {{ $prdData->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Kenne's Content Wrapper Area End Here -->
@endsection
