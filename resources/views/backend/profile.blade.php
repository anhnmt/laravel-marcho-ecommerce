@php
\Assets::addStyles([
'adminlte'
]);

\Assets::addScripts([
'stand-alone-button',
'adminlte'
]);
@endphp

@extends('layouts.admin')

@section('main')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
                    <li class="breadcrumb-item active">Trang cá nhân</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body box-profile">
                <form class="form-horizontal" action="{{ route('admin.profile.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="text-center">
                                <p>
                                    <div id="holder" class="lfm profile-user-img" data-input="avatar" data-preview="holder" data-class="profile-user-img img-fluid rounded-circle" style="margin-top:15px">
                                        <img loading="lazy" class="profile-user-img img-fluid rounded-circle" src="{{ asset($user->avatar) }}" alt="User profile picture">
                                    </div>
                                </p>
                                <p>
                                    <button type="submit" class="lfm btn btn-sm btn-default" data-input="avatar" data-preview="holder" data-class="profile-user-img img-fluid rounded-circle">Chọn ảnh</button>
                                </p>
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>

                            <p class="text-muted text-center">{{ $user->email }}</p>
                            <p class="text-muted text-center">
                                @foreach($roles as $role)
                                {{$role->name}}
                                @endforeach
                            </p>
                        </div>

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label for="inputName" class="col-form-label">Họ và tên</label>
                                <input type="text" class="form-control" name="name" id="inputName" placeholder="Nhập tên người dùng..." value="{{ $user->name }}">
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-form-label">Địa chỉ email</label>
                                <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email..." value="{{ $user->email }}">
                            </div>
                            <div class="form-group">
                                <label for="inputPassword" class="col-form-label">Mật khẩu</label>
                                <input type="password" class="form-control" name="password" id="inputEmail" placeholder="Để trống nếu không thay đổi mật khẩu">
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="submit" class="btn btn-success">Cập nhật</button>
                                    </span>

                                    <input class="form-control @error('avatar') is-invalid @enderror" type="hidden" name="avatar" id="avatar" value="{{ $user->avatar }}">

                                    @error('avatar')
                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
</section>
@stop

@section('script')
<script>
    $(function() {
        $('.lfm').filemanager('avatar');
    });
</script>
@stop