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
							<h1 class="font-weight-normal">Đăng ký</h1>
							<ul>
								<li class="mx-1"><a href="{{ route('register') }}"><i class="fal fa-home-alt mr-1"></i>Home</a></li>
								<li class="mx-1">
									<i class="fal fa-chevron-double-right"></i>
								</li>
								<li class=" mx-1 active">Register</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<section class="login-wrapper">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="panel panel-login">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-6 col-sm-6 col-6">
								<a href="{{ route('login') }}" id="login-form-link">ĐĂNG NHẬP</a>
							</div>
							<div class="col-md-6 col-sm-6 col-6">
								<a href="{{ route('register') }}" class="active" id="register-form-link">ĐĂNG KÝ</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form method="post" action="{{route('register')}}" role="form">
									@csrf

									<div class="form-group">
										<label for="">Họ và tên*</label>
										<input id="name" type="text" class="form-control @error('name') is-invalid @enderror mt-2" name="name" value="{{ old('name') }}" required autocomplete="name">

										@error('name')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>

									<div class="form-group">
										<label>Địa chỉ email*</label>
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror mt-2" name="email" value="{{ old('email') }}" required autocomplete="email">

										@error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>

									<div class="form-group">
										<label>Mật khẩu*</label>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror mt-2" name="password" required autocomplete="new-password">

										@error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror
									</div>

									<div class="form-group">
										<label>Xác nhận mật khẩu*</label>
										<input id="confirm" type="password" class="form-control mt-2" name="password_confirmation" required autocomplete="new-password">
									</div>

									<div class="form-group">
										<label class="label-remember">
											<input type="checkbox" tabindex="3" class="" name="agree" value="1" id="agree" checked="checked">
											<span class="checkmark"></span>
											<label for="agree">Đồng ý điều khoản & điều kiện</label>
										</label>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12 col-sm-offset-12">
												<input type="submit" id="submit" tabindex="4" class="form-control btn btn-login" value="ĐĂNG KÝ">
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
	</div>
</section>
@endsection