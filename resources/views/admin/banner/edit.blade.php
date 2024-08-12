@extends('admin.layouts.master')

@section('title')
    Quản lý banner
@endsection

@section('contents')
    <div class="card shadow-none">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Cập nhật banner</h5>
                </div>
            </div>
        </div>
        <form class="card-body p-0" action="{{ route('admin.bannerMng.bn.update', $banner->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-6">
                    <div class="row text-center">
                        <div class="col-12">
                            <img src="{{ Storage::url($banner->imgBanner) }}" alt="Lỗi đường dẫn ảnh!" width="200px">
                        </div>
                        <div class="col-12">
                            {!! $banner->bannerTh == 0
                                ? '<span class="badge bg-dark">Banner cột 3</span>'
                                : '<span class="badge bg-dark">Banner cột 2</span>' !!}
                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <label for="imgBanner" class="form-label">Cập nhật ảnh:</label>
                            <input type="file" class="form-control" name="imgBanner" id="imgBanner">
                        </div>
                        <div class="col-12">
                            <label for="bannerTh" class="form-label">Loại banner:</label>
                            <select class="form-control" name="bannerTh" id="bannerTh">
                                <option value="0">Banner cột 3</option>
                                <option value="1">Banner cột 2</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-success">Cập nhật</button>
                </div>
            </div>
        </form>
    </div>
@endsection
