@extends('admin.layouts.master')
@section('style-libs')
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
@endsection

@section('title')
    Cập nhật hóa đơn
@endsection

@section('contents')
    <div class="card mb-3">
        <div class="bg-holder d-none d-lg-block bg-card"
            style="background-image:url({{ asset('theme/admin/assets/img/icons/spot-illustrations/corner-4.png') }});opacity: 0.7;">
        </div>
        <!--/.bg-holder-->
        <form action="{{ route('admin.orderMng.hd.updateHD', $model->id) }}" class="card-body position-relative"
            method="POST">
            @csrf
            @method('PUT')
            <h5>Đơn hàng chi tiết: #{{ $model->id }}</h5>
            <p class="fs-10">{{ $model->created_at }}</p>
            <div><strong class="me-2">Trạng thái thanh toán: </strong>
                {!! $model->payment == 'unpaid'
                    ? '<div class="badge rounded-pill badge-subtle-danger fs-11">Chưa thanh toán</div>'
                    : '<div class="badge rounded-pill badge-subtle-success fs-11">Đã thanh toán</div>' !!}
                <select class="form-control" style="margin: 17px 0px 17px 0px;" name="payment" id="payment">
                    <option value="unpaid">Chưa thanh toán</option>
                    <option value="paid">Đã thanh toán</option>
                </select>
            </div>
            <div><strong class="me-2">Vận chuyển: </strong>
                <div class="badge rounded-pill badge-subtle-info fs-11">
                    @if ($model->status_order == 'pending')
                        Chờ xác nhận
                    @endif
                    @if ($model->status_order == 'confirmed')
                        Đã xác nhận
                    @endif
                    @if ($model->status_order == 'preparing_goods')
                        Đang chuẩn bị hàng
                    @endif
                    @if ($model->status_order == 'shipping')
                        Đang vận chuyển
                    @endif
                    @if ($model->status_order == 'delivered')
                        Đã giao hàng
                    @endif
                    @if ($model->status_order == 'canceled')
                        Đơn hàng bị hủy
                    @endif
                </div>
                <select class="form-control" style="margin-top: 17px;" name="status_order" id="status_order">
                    <option value="pending">Chờ xác nhận</option>
                    <option value="confirmed">Đã xác nhận</option>
                    <option value="preparing_goods">Đang chuẩn bị hàng</option>
                    <option value="shipping"> Đang vận chuyển</option>
                    <option value="delivered">Đã giao hàng</option>
                    <option value="canceled">Đơn hàng bị hủy</option>
                </select>
            </div>
            <div class="text-center" style="margin-top: 17px;">
                <button class="btn btn-primary" type="submit">Cập nhật</button>
            </div>
        </form>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3 fs-9">Địa chỉ thanh toán</h5>
                    <h6 class="mb-2">{{ $model->user_name }}</h6>
                    <p class="mb-1 fs-10">{{ $model->user_address }}</p>
                    <p class="mb-0 fs-10"> <strong>Email: </strong>{{ $model->user_email }}</a>
                    </p>
                    <p class="mb-0 fs-10"> <strong>Phone: </strong>{{ $model->user_phone }}</p>
                </div>
                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <h5 class="mb-3 fs-9">Địa chỉ nhận hàng</h5>
                    <h6 class="mb-2">{{ $model->user_name }}</h6>
                    <p class="mb-0 fs-10">{{ $model->user_address }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <div class="table-responsive fs-10">
                <table class="table table-striped border-bottom">
                    <thead class="bg-200">
                        <tr>
                            <th class="text-900 border-0">Sản phẩm</th>
                            <th class="text-900 border-0 text-center">Số lượng</th>
                            <th class="text-900 border-0 text-end">Đơn giá</th>
                            <th class="text-900 border-0 text-end">Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($model->orderItems as $item)
                            <tr class="border-200">
                                <td class="align-middle">
                                    <h6 class="mb-0 text-nowrap">{{ $item->product_name }}</h6>
                                </td>
                                <td class="align-middle text-center">{{ $item->quantity }}</td>
                                <td class="align-middle text-end">
                                    {{ number_format((int) $item->product_price_regular, 0, ',', '.') }}(VND)
                                </td>
                                <td class="align-middle text-end">
                                    {{ number_format((int) ($item->product_price_regular * $item->quantity), 0, ',', '.') }}(VND)
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row g-0 justify-content-end">
                <div class="col-auto">
                    <table class="table table-sm table-borderless fs-10 text-end">
                        <tr>
                            <th class="text-900">Tổng hóa đơn:</th>
                            <td class="fw-semi-bold">
                                {{ number_format((int) $model->total_price, 0, ',', '.') }}(VND)
                            </td>
                        </tr>
                    </table>
                </div>
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
