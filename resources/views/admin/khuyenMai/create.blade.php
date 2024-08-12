@extends('admin.layouts.master')

@section('title')
    Thêm mới mã khuyến mại
@endsection

@section('contents')
    <div class="card shadow-none">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Mã khuyến mại</h5>
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
            <form class="falcon-data-table" action="{{ route('admin.khuyenMai.store') }}" method="POST">
                @csrf
                <table class="table table-sm mb-0 fs-10">
                    <tbody class="list">
                        <tr>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Mã</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Giá khuyến mại</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Giá phần trăm (%)</th>
                        </tr>
                        <tr>
                            <td class="text-900 sort pe-1 align-middle white-space-nowrap">
                                <input class="form-control" type="text" name="maKM"
                                    value="{{ strtoupper(\Str::random(8)) . '-' . strtoupper(\Str::slug('Khuyễn Mại')) }}">
                            </td>
                            <td class="text-900 sort pe-1 align-middle white-space-nowrap">
                                <input type="number" class="form-control" name="price_sale" id="price_sale" min="0">
                            </td>
                            <td class="text-900 sort pe-1 align-middle white-space-nowrap">
                                <input type="number" class="form-control" name="giaPT" id="giaPT" min="0"
                                    max="100">
                            </td>
                        </tr>
                        <tr>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Mô tả ngắn</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Số lượng</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Trạng thái</th>
                        </tr>
                        <tr>
                            <td class="text-900 sort pe-1 align-middle white-space-nowrap">
                                <textarea class="form-control" name="enscription" id="enscription"></textarea>
                            </td>
                            <td class="text-900 sort pe-1 align-middle white-space-nowrap">
                                <input type="number" class="form-control" name="soluong" id="soluong" min="0">
                            </td>
                            <td class="text-900 sort pe-1 align-middle white-space-nowrap">
                                <select class="form-control" name="is_active" id="is_active">
                                    <option value="noActive">Không kích hoạt</option>
                                    <option value="active">Kích hoạt</option>
                                </select>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <button class="btn btn-primary" type="submit">Thêm mã</button>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </form>
        </div>
    </div>
@endsection
