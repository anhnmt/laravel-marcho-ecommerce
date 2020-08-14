@php
\Assets::addStyles([
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);
@endphp

@extends('layouts.master')

@section('main')
<div class="custom-container">
    <section class="makp_breadcrumb bg_image">
        <div class="banner">
            <div class="bg_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_content text-center">
                            <h1 class="font-weight-normal">Trang cá nhân</h1>
                            <ul>
                                <li class="mx-1">
                                    <a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
                                <li class=" mx-1 active">Trang cá nhân</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="profile_section my-5 py-5">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        @include('layouts.profile_sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 mt-md-0 mt-5">
                    <div class="tab-content dashboard_content">
                        <div class="card">
                            <div class="card-header">
                                <h4>Đơn hàng</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Đơn hàng</th>
                                                <th>Ngày đặt</th>
                                                <th>Trạng thái</th>
                                                <th>Tổng tiền</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>

                                        @if(!$orders->isEmpty())
                                        @foreach ($orders as $order)
                                        <tbody>
                                            <tr>
                                                <td>#{{ $order->id }}</td>
                                                <td>{{ $order->created_at }}</td>
                                                <td>
                                                    @if ($order->status == 0)
                                                    {{'Đang xử lí'}}
                                                    @elseif($order->status == 1)
                                                    {{'Đã xử lí'}}
                                                    @elseif($order->status == 2)
                                                    {{'Đang giao hàng'}}
                                                    @elseif($order->status == 3)
                                                    {{'Đã giao hàng'}}
                                                    @endif
                                                </td>
                                                <td>{{ number_format($order->total, 0) }}đ</td>
                                                <td class="text-center">
                                                    <a href="{{route('user.order.edit', $order->id)}}" class="btn btn-fill-out btn-sm">Xem</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                        @else
                                        <tbody>
                                            <tr>
                                                <td colspan="6" class="px-0 mt-5">
                                                    <div class="alert text-center m-0" role="alert">
                                                        <p class="mb-3">
                                                            Bạn hiện không có đơn hàng nào...
                                                        </p>

                                                        <a href="{{ route('product.index') }}" class="btn btn-fill-out px-3 py-2">Mua ngay</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                        @endif
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection