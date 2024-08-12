@extends('admin.layouts.master')

@section('title')
    Dashboard Admin
@endsection

@section('contents')
    @include('admin.dashboard-content.dashboard-ct1')
    @include('admin.dashboard-content.dashboard-ct2')
    @include('admin.dashboard-content.dashboard-ct3')
@endsection

@section('script-libs')
    <script src="{{ asset('theme/admin/vendors/echarts/echarts.min.js') }}"></script>
@endsection
