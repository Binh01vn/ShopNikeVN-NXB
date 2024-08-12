@extends('admin.layouts.master')

@section('title')
    Cập nhật Danh mục sản phẩm: {{ $model->name }}
@endsection

@section('contents')
    <form action="{{ route('admin.catalogues.update', $model->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                        value="{{ $model->name }}">
                </div>
                <div class="mb-3 mt-3">
                    <label for="cover" class="form-label">File:</label>
                    <input type="file" class="form-control" name="cover" id="cover">
                    <img src="{{ \Storage::url($model->cover) }}" alt="Error!" width="150px">

                </div>
            </div>

            <div class="col-md-6">
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" name="is_active" value="1"
                        @if ($model->is_active) checked @endif> Is active
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
