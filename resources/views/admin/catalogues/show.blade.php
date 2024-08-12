@extends('admin.layouts.master')

@section('title')
    Chi tiết Danh mục sản phẩm: {{ $model->name }}
@endsection

@section('contents')
    <table>
        <tr>
            <th>Trường</th>
            <th>Giá trị</th>
        </tr>
        @foreach ($model->toArray() as $k => $v)
            <tr>
                <td>{{ $k }}</td>
                <td>
                    @php
                        if ($k == 'cover') {
                            $url = \Storage::url($v);

                            echo "<img src=\"$url\" alt=\"Error\" width=\"150px\">";
                        } elseif (Str::contains($k, 'is_')) {
                            echo $v
                                ? '<span class="badge bg-primary">Yes</span>'
                                : '<span class="badge bg-danger">No</span>';
                        } else {
                            echo $v;
                        }
                    @endphp
                </td>
            </tr>
        @endforeach
    </table>
@endsection
