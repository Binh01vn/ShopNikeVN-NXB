<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/kenne/kenne/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:12:32 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description"
        content="Kenne is a stunning html template for an expansion eCommerce site that suitable for any kind of fashion store. It will make your online store look more impressive and attractive to viewers. ">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('theme/client/assets/images/favicon.png') }}">

    <!-- CSS ============================================ -->
    @yield('css-libs')
    @include('layouts.assets.inHead')
    @yield('css-custom')

</head>

<body class="template-color-1">

    <div class="main-wrapper">

        <!-- Begin Loading Area -->
        <div class="loading">
            <div class="text-center middle">
                <span class="loader">
                    <span class="loader-inner"></span>
                </span>
            </div>
        </div>
        <!-- Loading Area End Here -->

        <!-- Begin Main Header Area -->
        <header class="main-header_area">
            @include('layouts.header.header-transparent')
            @include('layouts.header.header-sticky')
            @include('layouts.header.miniCart')
            @include('layouts.header.mobile-menu')
            @include('layouts.header.miniMenu')
            @include('layouts.header.searchBar')

            <div class="global-overlay"></div>
        </header>
        <!-- Main Header Area End Here -->

        @yield('contents')

        @include('layouts.footer.footer')
        {{-- @include('layouts.footer.modal-wrapper') --}}
        <!-- Scroll To Top Start -->
        <a class="scroll-to-top" href="#"><i class="ion-chevron-up"></i></a>
        <!-- Scroll To Top End -->

    </div>

    <!-- JS ============================================ -->
    @yield('js-libs')
    @include('layouts.assets.endBody')
    @yield('js-custom')
</body>


<!-- Mirrored from htmldemo.net/kenne/kenne/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Nov 2023 10:13:14 GMT -->

</html>
