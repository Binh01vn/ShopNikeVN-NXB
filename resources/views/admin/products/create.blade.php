@extends('admin.layouts.master')

@section('title')
    Thêm mới sản phẩm
@endsection
@section('style-libs')
    <link href="{{ asset('theme/admin/vendors/choices/choices.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/admin/vendors/flatpickr/flatpickr.min.css') }}" rel="stylesheet">
    <link href="{{ asset('theme/admin/vendors/dropzone/dropzone.css') }}" rel="stylesheet">
    <script type="text/javascript" src='https://cdn.tiny.cloud/1/no-api-key/tinymce/7/tinymce.min.js'
        referrerpolicy="origin"></script>
@endsection

@section('contents')
    <div class="card mb-3">
        <div class="card-body">
            <div class="row flex-between-center">
                <div class="col-md">
                    <h5 class="mb-2 mb-md-0">Thêm mới sản phẩm</h5>
                </div>
            </div>
        </div>
    </div>
    <form class="row g-0" action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="col-lg-8 pe-lg-2">
            <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                    <h6 class="mb-0">Thông tin sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="row gx-2">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="product-name">Tên sản phẩm:</label>
                            <input class="form-control" id="product-name" type="text" name="name" />
                        </div>
                    </div>
                    <div class="row gx-2">
                        <div class="col-12 mb-3">
                            <label class="form-label" for="product-name">SKU:</label>
                            <input class="form-control" id="sku" type="text" name="sku"
                                value="{{ strtoupper(\Str::random(8)) }}" />
                        </div>
                    </div>
                </div>
            </div>
            {{-- các thông tin chi tiết --}}
            <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                    <h6 class="mb-0">Chi tiết</h6>
                </div>
                <div class="card-body">
                    <div class="row gx-2">
                        <div class="col-6 mb-3">
                            <label class="form-label" for="description">Description:</label>
                            <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label" for="material">Material:</label>
                            <textarea class="form-control" name="material" id="material" rows="3"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="user_manual">User manual:</label>
                            <textarea class="form-control" name="user_manual" id="user_manual" rows="2"></textarea>
                        </div>
                        <div class="col-12 mb-3">
                            <label class="form-label" for="content">Content:</label>
                            <textarea class="form-control" name="content" id="content"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            {{-- các biến thể --}}
            <div class="card mb-3">
                <div class="card-header bg-body-tertiary">
                    <h6 class="mb-0">Biến thể</h6>
                </div>
                <div class="card-body" style="height: 300px; overflow: scroll;">
                    <div class="row gx-2">
                        <div class="col-12 mb-3">
                            <table class="table table-bordered">
                                <thead class="table-dark">
                                    <tr class="text-center">
                                        <th scope="col">Size</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col">Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sizes as $sizeID => $sizeName)
                                        @php($flagRowspan = true)

                                        @foreach ($colors as $colorID => $colorName)
                                            <tr>
                                                @if ($flagRowspan)
                                                    <td style="vertical-align: middle;" rowspan="{{ count($colors) }}">
                                                        {{ $sizeName }}</td>
                                                @endif
                                                @php($flagRowspan = false)
                                                <td style="padding-left: 1.25rem;">
                                                    <div
                                                        style="height: 30px; width: 30px; background-color: {{ strtolower($colorName) }};">
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" value="0"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][quantity]">
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control"
                                                        name="product_variants[{{ $sizeID . '-' . $colorID }}][image]">
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- các thông tin khác --}}
        <div class="col-lg-4 ps-lg-2">
            <div class="sticky-sidebar">
                {{-- status and catalogues --}}
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Status</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            @foreach ($status as $k => $v)
                                <div class="col-md-6">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            name="{{ $k }}" value="1" id="{{ $k }}"
                                            checked />
                                        <label class="form-check-label"
                                            for="flexSwitchCheckChecked">{{ $v }}</label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="product-category">Danh mục sản phẩm:</label>
                                <select class="form-select" id="product-category" name="catalogue_id">
                                    @foreach ($catalogues as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- giá sản phẩm --}}
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Giá sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-8 mb-3">
                                <label class="form-label" for="base-price">Giá cơ bản: <span data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Product regular price"><span
                                            class="fas fa-question-circle text-primary fs-10 ms-1"></span>
                                    </span>
                                </label>
                                <input class="form-control" id="base-price" type="number" name="price_regular"
                                    value="0" />
                            </div>
                            <div class="col-12 mb-4">
                                <label class="form-label" for="discount-percentage">Giảm giá theo phần trăm (%):</label>
                                <input class="form-control" id="discount-percentage" type="number" name="discount"
                                    value="0" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- img thumbnail --}}
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Ảnh thu nhỏ của sản phẩm</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="img_thumbnail"></label>
                                <input class="form-control" type="file" id="img_thumbnail" name="img_thumbnail" />
                            </div>
                        </div>
                    </div>
                </div>
                {{-- galleries --}}
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary align-items-center d-flex">
                        <h6 class="card-title mb-0 flex-grow-1">Galleries</h6>
                        <button type="button" class="btn btn-success" onclick="addImageGallery()">Thêm ảnh</button>
                    </div>
                    <div class="card-body">
                        {{-- <div class="row gx-2">
                            <div class="col-12 mb-4">
                                <label class="form-label" for="gallery_1">Gallery:</label>
                                <input class="form-control" type="file" id="gallery_1" name="product_galleries[]" />
                            </div>
                        </div> --}}
                        <div class="row gx-2" id="gallery_list">
                            <div class="col-12 mb-4" id="gallery_default_item">
                                <label for="gallery_default" class="form-label">Image gallery:</label>
                                <div class="d-flex">
                                    <input type="file" class="form-control" name="product_galleries[]"
                                        id="gallery_default">
                                </div>
                            </div>
                            {{-- <div class="row gy-4" id="gallery_list">
                                <div class="col-md-4" id="gallery_default_item">
                                    <label for="gallery_default" class="form-label">Image</label>
                                    <div class="d-flex">
                                        <input type="file" class="form-control" name="product_galleries[]"
                                               id="gallery_default">
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                {{-- tags --}}
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Tags</h6>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="tags">Add tags:</label>
                                <select class="form-select" id="tags" name="tags[]" multiple>
                                    @foreach ($tags as $id => $name)
                                        <option value="{{ $id }}">{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{-- <label class="form-label" for="product-tags">Add a keyword:</label>
                        <input class="form-control js-choice" id="product-tags" type="text" name="tags"
                            required="required" size="1"
                            data-options='{"removeItemButton":true,"placeholder":false}' /> --}}
                    </div>
                </div>
                {{-- button submit --}}
                <div class="card mb-3">
                    <div class="card-header bg-body-tertiary">
                        <h6 class="mb-0">Bạn đã hoàn thành việc nhập dữ liệu!</h6>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-between align-items-center">
                            <div class="col-12 mb-4">
                                <button class="btn btn-link text-secondary p-0 me-3 fw-medium"
                                    type="reset">Discard</button>
                                <button class="btn btn-primary" type="submit">Add product</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script-libs')
    <script src="{{ asset('theme/admin/vendors/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/choices/choices.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('theme/admin/vendors/dropzone/dropzone-min.js') }}"></script>

    <script src="{{ asset('theme/admin/vendors/jquery-min.js') }}"></script>
    {{-- <script src="https:////cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script> --}}
@endsection

@section('scripts-edit')
    <script type="text/javascript">
        tinymce.init({
            selector: '#content',
            plugins: [
                'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
                'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
                'insertdatetime',
                'media', 'table', 'emoticons', 'help'
            ],
            toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
                'forecolor backcolor emoticons | help',
            menu: {
                favs: {
                    title: 'My Favorites',
                    items: 'code visualaid | searchreplace | emoticons'
                }
            },
            menubar: 'favs file edit view insert format tools table help',
        });
    </script>
    <script>
        // CKEDITOR.replace('content');

        // thêm ô input upload ảnh gallerries
        function addImageGallery() {
            let id = 'gen' + '_' + Math.random().toString(36).substring(2, 15).toLowerCase();
            let html = `
                <div class="col-12 mb-4" id="${id}_item">
                    <label for="${id}" class="form-label">Image gallery:</label>
                    <div class="d-flex">
                        <input type="file" class="form-control" name="product_galleries[]" id="${id}">
                        <button type="button" class="btn btn-danger" onclick="removeImageGallery('${id}_item')">
                            <span class="far fa-trash-alt"></span>
                        </button>
                    </div>
                </div>
            `;

            $('#gallery_list').append(html);
        }

        // xóa o input upload ảnh galleries đã thêm
        function removeImageGallery(id) {
            if (confirm('Chắc chắn xóa không?')) {
                $('#' + id).remove();
            }
        }
    </script>
@endsection
