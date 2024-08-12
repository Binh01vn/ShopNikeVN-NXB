@extends('admin.layouts.master')

@section('title')
    Quản lý banner
@endsection

@section('contents')
    <div class="card shadow-none">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Banner hiện tại</h5>
                </div>
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <a class="fs-9 mb-0 text-nowrap py-2 py-xl-0 btn btn-primary"
                        href="{{ route('admin.bannerMng.bn.formAdd') }}">Thêm banner mới</a>
                </div>
            </div>
        </div>
        <div class="card-body row">
            <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ảnh banner</th>
                            <th>Loại banner</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            @if ($item->bannerTh == 0)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($item->imgBanner) }}" alt="Lỗi đường dẫn ảnh!"
                                            width="100px">
                                    </td>
                                    <td>Banner cột 3</td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.bannerMng.bn.edit', $item->id) }}">Cập nhật</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger"
                                            href="{{ route('admin.bannerMng.bn.destroy', $item->id) }}">Xóa</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Ảnh banner</th>
                            <th>Loại banner</th>
                            <th colspan="2">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                            @if ($item->bannerTh == 1)
                                <tr>
                                    <td>
                                        <img src="{{ Storage::url($item->imgBanner) }}" alt="Lỗi đường dẫn ảnh!"
                                            width="100px">
                                    </td>
                                    <td>Banner cột 2</td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ route('admin.bannerMng.bn.edit', $item->id) }}">Cập nhật</a>
                                    </td>
                                    <td>
                                        <a class="btn btn-danger"
                                            href="{{ route('admin.bannerMng.bn.destroy', $item->id) }}"
                                            onclick="return confirm('Có chắc chắn muốn xóa không?')">Xóa</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
