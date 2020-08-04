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
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" href="{{ route('profile.index') }}"
                                    role="tab" aria-controls="account-detail" aria-selected="true"><i
                                        class="fal fa-address-card"></i>Hồ sơ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" href="{{ route('profile.password') }}"
                                    role="tab" aria-controls="account-detail" aria-selected="true"><i
                                        class="fal fa-key"></i>Mật khẩu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" id="orders-tab" href="{{ route('order.index') }}" role="tab"
                                    aria-controls="orders" aria-selected="false"><i class="fal fa-bags-shopping"></i>Đơn
                                    hàng</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="address-tab" href="#address" role="tab"
                                    aria-controls="address" aria-selected="true"><i
                                        class="fal fa-map-marker-alt"></i>Địa
                                    chỉ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="card">
                            <div class="card-header">
                                <h3>Đơn hàng</h3>
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
                                        <tbody>
                                            @foreach ($orders as $order)
                                            <tr>
                                                <td>#{{$order->id}}</td>
                                                <td>{{$order->created_at}}</td>
                                                <td>{{$order->status == 0 ? 'Đang xử lí' : 'Đã xử lí'}}</td>
                                                <td>{{$order->total}}</td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-success btn-sm">Xem</a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm">Xóa</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            
                                        </tbody>
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

@section('script')
<script>
    $(function() {
        $('.lfm').filemanager('avatar');
    });
</script>
@stop