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
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">List Order</h5>
                </div>
                <div class="col-6 col-sm-auto ms-auto text-end ps-0">
                    <div class="d-none" id="table-number-pagination-actions">
                        <div class="d-flex"><select class="form-select form-select-sm" aria-label="Bulk actions">
                                <option selected="">Bulk actions</option>
                                <option value="Refund">Refund</option>
                                <option value="Delete">Delete</option>
                                <option value="Archive">Archive</option>
                            </select><button class="btn btn-falcon-default btn-sm ms-2" type="button">Apply</button></div>
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
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">ID</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">NGƯỜI ĐẶT HÀNG</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">ĐỊA CHỈ</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">SỐ ĐIỆN THOẠI</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">TRẠNG THÁI ĐƠN HÀNG</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">TRẠNG THÁI THANH TOÁN</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">SẢN PHẨM</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">TỔNG ĐƠN HÀNG</th>
                            <th class="text-900 no-sort pe-1 align-middle data-table-row-action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-number-pagination-body">
                        @foreach ($data as $item)
                            <tr class="btn-reveal-trigger">
                                <td class="align-middle" style="width: 28px;">
                                    {{ $item->id }}
                                </td>
                                <td class="align-middle white-space-nowrap fw-semi-bold name">{{ $item->user_name }}</td>
                                <td class="align-middle white-space-nowrap fw-semi-bold">{{ $item->user_address }}</td>
                                <td class="align-middle text-start amount">{{ $item->user_phone }}</td>
                                <td class="align-middle text-start amount">
                                    <strong>
                                        @if ($item->status_order == 'pending')
                                            Chờ xác nhận
                                        @endif
                                        @if ($item->status_order == 'confirmed')
                                            Đã xác nhận
                                        @endif
                                        @if ($item->status_order == 'preparing_goods')
                                            Đang chuẩn bị hàng
                                        @endif
                                        @if ($item->status_order == 'shipping')
                                            Đang vận chuyển
                                        @endif
                                        @if ($item->status_order == 'delivered')
                                            Đã giao hàng
                                        @endif
                                        @if ($item->status_order == 'canceled')
                                            Đơn hàng bị hủy
                                        @endif
                                    </strong>
                                </td>
                                <td class="align-middle text-start amount">
                                    {!! $item->payment == 'unpaid'
                                        ? '<strong class="text-danger">Chưa thanh toán</strong>'
                                        : '<strong class="text-success">Đã thanh toán</strong>' !!}
                                </td>
                                <td class="align-middle text-start amount">
                                    @foreach ($item->orderItems as $orderItem)
                                        {{ $orderItem->product_name }} <br>
                                    @endforeach
                                </td>
                                <td class="align-middle text-start amount">
                                    {{ number_format((int) $item->total_price, 0, ',', '.') }}(VND)
                                </td>
                                {{-- <td class="align-middle white-space-nowrap text-end">
                                    <div class="dropstart font-sans-serif position-static d-inline-block">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                            type="button" id="dropdown-number-pagination-table-item-1"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-exclamation-circle fs-10"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-2"
                                            aria-labelledby="dropdown-number-pagination-table-item-1">
                                            <p class="dropdown-item">
                                                {!! $item->is_active
                                                    ? '<span class="badge rounded-pill badge-subtle-success"><span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span td>'
                                                    : '<span class="badge rounded-pill badge-subtle-danger"><span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>' !!}
                                                Is Active
                                            </p>
                                        </div>
                                    </div>
                                </td> --}}
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
                                                href="{{ route('admin.orderMng.hd.showHD', $item) }}">
                                                <span class="btn btn-info">View</span>
                                            </a>
                                            <a class="dropdown-item text-center"
                                                href="{{ route('admin.orderMng.hd.editHD', $item) }}">
                                                <span class="btn btn-warning">Update</span>
                                            </a>
                                            @if ($item->payment == 'paid')
                                                <a class="dropdown-item text-center"
                                                    href="{{ route('admin.pdf.inHD', $item->id) }}">
                                                    <span class="btn btn-success">In hóa đơn</span>
                                                </a>
                                            @endif
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
