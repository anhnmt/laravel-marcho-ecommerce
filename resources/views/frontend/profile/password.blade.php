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
                @include('layouts.profile_sidebar')
            </div>
            <div class="col-lg-9 col-md-8 mt-md-0 mt-5">
                <div class="tab-content dashboard_content">
                    <div class="card">
                        <div class="card-header">
                            <h3>Quản lí mật khẩu của bạn</h3>
                            <span>Thay đổi mật khẩu</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', auth()->user()->id) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="form-group">
                                    <label for="">Mật khẩu cũ</label>
                                    <input type="password" name="oldpass" id=""
                                        class="form-control @error('oldpass') is-invalid @enderror"
                                        placeholder="Nhập mật khẩu cũ của bạn..." aria-describedby="helpId">

                                    @error('oldpass')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Mật khẩu mới</label>
                                    <input type="password" name="password" id=""
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Nhập mật khẩu mới của bạn..." aria-describedby="helpId">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="">Xác nhận mật khẩu</label>
                                    <input type="password" name="passconfirm" id=""
                                        class="form-control @error('passconfirm') is-invalid @enderror"
                                        placeholder="Xác nhận mật khẩu mới của bạn..." aria-describedby="helpId">

                                    @error('passconfirm')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <button class="btn btn-fill-out" type="submit">Đổi mật khẩu</button>
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