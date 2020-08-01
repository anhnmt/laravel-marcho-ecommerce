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
            <div class="col-lg-3 mb-5">
                <ul class="list-group">
                    <a href="{{ route('profile.index') }}">
                        <li class="list-group-item d-flex align-items-center"><i class="fal fa-user-alt pr-3"></i> Hồ sơ</li>
                    </a>
                    <a href="">
                        <li class="list-group-item d-flex align-items-center"><i class="fal fa-map-marker-alt pr-3"></i> Địa chỉ</li>
                    </a>
                    <a href="{{ route('profile.password') }}">
                        <li class="list-group-item active d-flex align-items-center"><i class="fal fa-key pr-3"></i> Quản lí mật khẩu</li>
                    </a>
                </ul>
            </div>
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-header">
                        <h3>Quản lí mật khẩu của bạn</h3>
                        <span>Thay đổi mật khẩu</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('profile.update', auth()->user()->id) }}" method="post">
                            @csrf 
                            @method('put')
                            <div class="form-group">
                                <label for="">Mật khẩu cũ</label>
                                <input type="password" name="oldpass" id="" class="form-control @error('oldpass') is-invalid @enderror" placeholder=""
                                    aria-describedby="helpId">

                                @error('oldpass')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror        
                            </div>
                            <div class="form-group">
                                <label for="">Mật khẩu mới</label>
                                <input type="password" name="password" id="" class="form-control @error('password') is-invalid @enderror" placeholder=""
                                    aria-describedby="helpId">

                                @error('password')
                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Xác nhận mật khẩu</label>
                                <input type="password" name="passconfirm" id="" class="form-control @error('passconfirm') is-invalid @enderror" placeholder=""
                                    aria-describedby="helpId">

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
</section>

@endsection

@section('script')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

@if(session('success'))
<script>
    $(function() {
        Swal.fire({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            icon: "success",
            title: "{{ session('success') }}",
        });
    });
</script>
@endif

<script>
    $(function() {
        $('.lfm').filemanager('avatar');
    });
</script>
@stop