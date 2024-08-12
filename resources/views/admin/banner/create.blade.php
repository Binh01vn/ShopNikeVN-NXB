@extends('admin.layouts.master')

@section('title')
    Quản lý banner
@endsection

@section('contents')
    <div class="card shadow-none">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">Thêm banner mới</h5>
                </div>
            </div>
        </div>
        <form class="card-body p-0" action="{{ route('admin.bannerMng.bn.addBn') }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="mb-4 mt-4">
                        <label for="imgBanner" class="form-label">File ảnh:</label>
                        <input type="file" class="form-control" name="imgBanner" id="imgBanner">
                    </div>
                    <div class="mb-4 mt-4">
                        <label for="bannerTh" class="form-label">Loại banner:</label>
                        <select class="form-control" name="bannerTh" id="bannerTh">
                            <option value="0">Banner cột 3</option>
                            <option value="1">Banner cột 2</option>
                        </select>
                    </div>
                    <div class="mb-4 mt-4">
                        <button type="submit" class="btn btn-success">Thêm mới</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
