@extends('admin.layouts.master')
@section('style-libs')
    <script src="{{ asset('theme/admin/vendors/datatables.net-bs5/dataTables.bootstrap5.min.css') }}"></script>
@endsection

@section('title')
    Danh sách sản phẩm
@endsection

@section('contents')
    <div class="card shadow-none">
        <div class="card-header">
            <div class="row flex-between-center">
                <div class="col-6 col-sm-auto d-flex align-items-center pe-0">
                    <h5 class="fs-9 mb-0 text-nowrap py-2 py-xl-0">List Products</h5>
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
                    <div id="table-number-pagination-replace-element">
                        <a class="btn btn-falcon-default btn-sm" href="{{ route('admin.products.create') }}">
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
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">ID</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Img Thumbnail</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Name</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">SKU</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Price Regular</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Price Sale</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Views</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Tags</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Created At</th>
                            <th class="text-900 sort pe-1 align-middle white-space-nowrap">Updated At</th>
                            <th class="text-900 no-sort pe-1 align-middle data-table-row-action">All Status</th>
                            <th class="text-900 no-sort pe-1 align-middle data-table-row-action">Action</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="table-number-pagination-body">
                        @foreach ($data as $item)
                            <tr class="btn-reveal-trigger">
                                <td class="align-middle" style="width: 28px;">
                                    {{ $item->id }}
                                </td>
                                <td class="align-middle white-space-nowrap email">
                                    @php
                                        $url = $item->img_thumbnail;
                                        if (!\Str::contains($url, 'http')) {
                                            $url = \Storage::url($url);
                                        }
                                    @endphp
                                    <img src="{{ $url }}" alt="Error!" width="50px">
                                </td>
                                <td class="align-middle white-space-nowrap fw-semi-bold name">
                                    <a href="{{ route('admin.products.show', $item->id) }}">{{ $item->name }}</a>
                                </td>
                                <td class="align-middle white-space-nowrap fw-semi-bold">{{ $item->sku }}</td>
                                <td class="align-middle text-start amount">{{ $item->price_regular }}</td>
                                <td class="align-middle text-start amount">{{ $item->price_sale }}</td>
                                <td class="align-middle text-start amount">{{ $item->views }}</td>
                                <td class="align-middle white-space-nowrap text-end">
                                    <div class="dropstart font-sans-serif position-static d-inline-block">
                                        <button class="btn btn-link text-600 btn-sm dropdown-toggle btn-reveal float-end"
                                            type="button" id="dropdown-number-pagination-table-item-1"
                                            data-bs-toggle="dropdown" data-boundary="window" aria-haspopup="true"
                                            aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-tag fs-10"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end border py-2"
                                            aria-labelledby="dropdown-number-pagination-table-item-1">
                                            @foreach ($item->tags as $tag)
                                                <p class="dropdown-item">
                                                    <span class="badge bg-info">
                                                        {{ $tag->name }}
                                                    </span>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </td>
                                <td class="align-middle text-start amount">{{ $item->created_at }}</td>
                                <td class="align-middle text-start amount">{{ $item->updated_at }}</td>
                                <td class="align-middle white-space-nowrap text-end">
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
                                            <p class="dropdown-item">
                                                {!! $item->is_hot_deal
                                                    ? '<span class="badge rounded-pill badge-subtle-success"><span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span td>'
                                                    : '<span class="badge rounded-pill badge-subtle-danger"><span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>' !!}
                                                Is Hot Deal
                                            </p>
                                            <p class="dropdown-item">
                                                {!! $item->is_good_deal
                                                    ? '<span class="badge rounded-pill badge-subtle-success"><span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span td>'
                                                    : '<span class="badge rounded-pill badge-subtle-danger"><span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>' !!}
                                                Is Good Deal
                                            </p>
                                            <p class="dropdown-item">
                                                {!! $item->is_new_deal
                                                    ? '<span class="badge rounded-pill badge-subtle-success"><span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span td>'
                                                    : '<span class="badge rounded-pill badge-subtle-danger"><span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>' !!}
                                                Is New
                                            </p>
                                            <p class="dropdown-item">
                                                {!! $item->is_show_home
                                                    ? '<span class="badge rounded-pill badge-subtle-success"><span class="ms-1 fas fa-check" data-fa-transform="shrink-2"></span></span td>'
                                                    : '<span class="badge rounded-pill badge-subtle-danger"><span class="ms-1 fas fa-ban" data-fa-transform="shrink-2"></span></span>' !!}
                                                Is Show Home
                                            </p>
                                        </div>
                                    </div>
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
                                                href="{{ route('admin.products.show', $item) }}">
                                                <span class="btn btn-info">View</span>
                                            </a>
                                            <a class="dropdown-item text-center"
                                                href="{{ route('admin.products.edit', $item) }}">
                                                <span class="btn btn-warning">Edit</span>
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('admin.products.destroy', $item) }}" method="post"
                                                style="text-align: center;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Có chắc chắn muốn xóa không?')"
                                                    type="submit">Delete</button>
                                            </form>
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
