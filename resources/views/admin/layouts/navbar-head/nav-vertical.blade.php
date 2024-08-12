<nav class="navbar navbar-light navbar-vertical navbar-expand-xl" style="display: none;">
    <script>
        var navbarStyle = localStorage.getItem("navbarStyle");
        if (navbarStyle && navbarStyle !== 'transparent') {
            document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
        }
    </script>
    <div class="d-flex align-items-center">
        <div class="toggle-icon-wrapper">
            <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
        </div><a class="navbar-brand" href="index.html">
            <div class="d-flex align-items-center py-3"><img class="me-2"
                    src="{{ asset('theme/admin/assets/img/icons/spot-illustrations/falcon.png') }}" alt=""
                    width="40" /><span class="font-sans-serif text-primary">falcon</span></div>
        </a>
    </div>
    <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
        <div class="navbar-vertical-content scrollbar">
            <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                <li class="nav-item"><!-- parent pages-->
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">
                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                    class="fas fa-chart-pie"></span></span><span
                                class="nav-link-text ps-1">Dashboard</span></div>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Danh mục sản phẩm</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('admin.catalogues.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="far fa-list-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Danh sách danh mục</span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ route('admin.catalogues.create') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="far fa-plus-square"></span>
                            </span>
                            <span class="nav-link-text ps-1">Thêm mới danh mục</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Sản phẩm</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('admin.products.index') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="far fa-list-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Danh sách sản phẩm</span>
                        </div>
                    </a>
                    <a class="nav-link" href="{{ route('admin.products.create') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="far fa-plus-square"></span>
                            </span>
                            <span class="nav-link-text ps-1">Thêm mới sản phẩm</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Quản lý hóa đơn</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('admin.orderMng.hd.list') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="far fa-list-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Danh sách hóa đơn</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Quản lý banner</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('admin.bannerMng.bn.banner') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="far fa-list-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Danh sách banner</span>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                        <div class="col-auto navbar-vertical-label">Quản lý khuyến mại</div>
                        <div class="col ps-0">
                            <hr class="mb-0 navbar-vertical-divider" />
                        </div>
                    </div>
                    <a class="nav-link" href="{{ route('admin.khuyenMai.list') }}">
                        <div class="d-flex align-items-center">
                            <span class="nav-link-icon">
                                <span class="far fa-list-alt"></span>
                            </span>
                            <span class="nav-link-text ps-1">Danh sách mã khuyến mại</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
