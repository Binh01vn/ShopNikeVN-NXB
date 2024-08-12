@extends('admin.layouts.master')
@section('style-libs')
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
@endsection

@section('title')
    Danh sách hóa đơn
@endsection

@section('contents')
    <div class="card shadow-none">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Danh sách mã khuyến mại</h5>
                </div>
                <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                    <div id="table-number-pagination-replace-element">
                        <a class="btn btn-falcon-default btn-sm" href="{{ route('admin.khuyenMai.create') }}">
                            <span class="fas fa-plus" data-fa-transform="shrink-3 down-2"></span>
                            <span class="d-none d-sm-inline-block ms-1">New</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="falcon-data-table">
                <table class="table table-sm mb-0 data-table fs-10"
                    data-datatables='{"searching":false,"responsive":false,"pageLength":8,"info":true,"lengthChange":false,"dom":"<&#39;row mx-1&#39;<&#39;col-sm-12 col-md-6&#39;l><&#39;col-sm-12 col-md-6&#39;f>><&#39;table-responsive scrollbar&#39;tr><&#39;row no-gutters px-1 pb-3 align-items-center justify-content-center&#39;<&#39;col-auto&#39; p>>","language":{"paginate":{"next":"<span class=\"fas fa-chevron-right\"></span>","previous":"<span class=\"fas fa-chevron-left\"></span>"}}}'>
                    <thead class="bg-200">
                        <tr>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Id</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Mã</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Mô tả ngắn</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Giá khuyến mại</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Số lượng</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Trạng thái</th>
                            <th class="text-900 no-sort pe-1 align-middle data-table-row-action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-number-pagination-body">
                        @foreach ($data as $item)
                            <tr class="btn-reveal-trigger">
                                <td class="align-middle" style="width: 28px;">
                                    {{ $item->id }}
                                </td>
                                <td class="align-middle white-space-nowrap fw-semi-bold name">{{ $item->maKM }}</td>
                                <td class="align-middle white-space-nowrap fw-semi-bold">{!! $item->enscription ? $item->enscription : 'Mô tả trống!' !!}</td>
                                <td class="align-middle text-start amount">
                                    {!! $item->giaPT
                                        ? 'Giảm: ' .
                                            $item->giaPT .
                                            '(%) giá trị đơn hàng<br><strong class="text-danger">(Tối đa: ' .
                                            number_format((int) $item->price_sale, 0, ',', '.') .
                                            ' VND)</strong>'
                                        : '' . number_format((int) $item->price_sale, 0, ',', '.') . '(VND)' !!}
                                </td>
                                <td class="align-middle text-start amount">{{ $item->soluong }}</td>
                                <td class="align-middle text-start amount">
                                    {!! $item->is_active == 'noActive'
                                        ? '<strong class="text-danger">Chưa kích hoạt</strong>'
                                        : '<strong class="text-success">Đã kích hoạt</strong>' !!}
                                </td>
                                <td class="align-middle white-space-nowrap text-end">
                                    <div class="dropstart font-sans-serif position-static d-inline-block">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                            type="button" id="dropdown-number-pagination-table-item-0"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-ellipsis-h fs-10"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-2"
                                            aria-labelledby="dropdown-number-pagination-table-item-0">
                                            <a class="dropdown-item text-center"
                                                href="{{ route('admin.khuyenMai.edit', $item->id) }}">
                                                <span class="btn btn-warning">Edit</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item text-center"
                                                href="{{ route('admin.khuyenMai.destroy', $item->id) }}"
                                                onclick="return confirm('Có chắc chắn muốn xóa không?')">
                                                <span class="btn btn-danger">Delete</span>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script-libs')
    <script src="{{ asset('theme/admin/vendors/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/datatables.net-fixedcolumns/dataTables.fixedColumns.min.js') }}"></script>
@endsection
