@extends('admin.layouts.master')

@section('title')
    Chi tiết sản phẩm: {{ $model->name }}
@endsection

@section('contents')
    @foreach ($model->toArray() as $k => $v)
        <tr>
            <td>{{ $k }} <br></td>
            <td>
                {!! $v !!}
            </td>
        </tr>
    @endforeach
@endsection
