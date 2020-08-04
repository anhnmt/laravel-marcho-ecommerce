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
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="account-detail-tab" href="{{ route('profile.index') }}"
                                role="tab" aria-controls="account-detail" aria-selected="true"><i
                                    class="fal fa-address-card"></i>Hồ sơ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="account-detail-tab" href="{{ route('profile.password') }}"
                                role="tab" aria-controls="account-detail" aria-selected="true"><i
                                    class="fal fa-key"></i>Mật khẩu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="orders-tab" href="{{ route('order.index') }}" role="tab"
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
                            <h3>Hồ sơ của bạn</h3>
                            <span>Quản lý thông tin hồ sơ để bảo mật tài khoản</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('profile.update', auth()->user()->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="text-center">
                                            <p>
                                                <div id="holder" class="lfm profile-user-img" data-input="avatar" data-preview="holder" data-class="profile-user-img img-fluid rounded-circle" style="margin-top:15px">
                                                    <img class="profile-user-img img-fluid rounded-circle" src="{{ asset(auth()->user()->avatar ? auth()->user()->avatar : 'assets/img/user2-160x160.jpg') }}" alt="User profile picture">
                                                </div>

                                                <input class="form-control @error('avatar') is-invalid @enderror" type="hidden" name="avatar" id="avatar" value="{{ auth()->user()->avatar }}">
                                            </p>

                                            <p>
                                                <button type="submit" class="lfm btn btn-sm btn-outline-dark" data-input="avatar" data-preview="holder" data-class="profile-user-img img-fluid rounded-circle">Chọn ảnh</button>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-lg-9">
                                        <div class="form-group">
                                            <label for="">Tên</label>
                                            <input type="text" id="" class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên của bạn ..." aria-describedby="helpId" value="{{auth()->user()->name}}" name="name">

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" id="" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email của bạn ..." aria-describedby="helpId" value="{{auth()->user()->email}}" name="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Số điện thoại</label>
                                            <input type="text" id="" class="form-control" placeholder="Nhập số điện thoại của bạn ..." aria-describedby="helpId" name="phone" value="{{auth()->user()->phone}}">
                                        </div>


                                        <div class="row">
                                            <div class="col-lg-4">
                                                <button type="submit" class="btn btn-fill-out">Cập nhật</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
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