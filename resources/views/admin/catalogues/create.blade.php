@extends('admin.layouts.master')

@section('title')
    Thêm mới Danh mục sản phẩm
@endsection

@section('contents')
    <form action="{{ route('admin.catalogues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">File ảnh:</label>
                    <input type="file" class="form-control" name="cover" id="cover">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="is_active" value="1" checked> Is active
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
@endsection
