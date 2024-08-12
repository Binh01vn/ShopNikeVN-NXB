@extends('layouts.master')

@section('title')
    Kenne Shop - Fashion
@endsection

@section('contents')
    @include('client.home.slider')
    @include('client.home.service')
    @include('client.home.banner.banner-one')
    @include('client.home.products.product')
    @include('client.home.banner.banner-two')
    @include('client.home.products.product-tab')
    @include('client.home.blog')
    @include('client.home.banner.banner-three')
    @include('client.home.instagram')
@endsection
