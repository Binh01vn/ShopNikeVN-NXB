<script src="{{ asset('theme/admin/vendors/popper/popper.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendors/bootstrap/bootstrap.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendors/anchorjs/anchor.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendors/is/is.min.js') }}"></script>

{{-- <script src="{{ asset('theme/admin/vendors/echarts/echarts.min.js') }}"></script> --}}

<script src="{{ asset('theme/admin/vendors/fontawesome/all.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendors/lodash/lodash.min.js') }}"></script>
<script src="{{ asset('theme/admin/vendors/polyfill.io/v3/polyfill.min58be.js?features=window.scroll') }}"></script>
<script src="{{ asset('theme/admin/vendors/list.js/list.min.js') }}"></script>

@yield('script-libs')

<script src="{{ asset('theme/admin/assets/js/theme.js') }}"></script>

@yield('scripts-edit')
