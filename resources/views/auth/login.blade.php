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
							<h1 class="font-weight-normal">Đăng nhập</h1>
							<ul>
								<li class="mx-1"><a href="{{ route('login') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a></li>
								<li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
								<li class=" mx-1 active">Đăng nhập</li>
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
								<a href="{{ route('login') }}" class="active" id="login-form-link">ĐĂNG NHẬP</a>
							</div>
							<div class="col-md-6 col-sm-6 col-6">
								<a href="{{ route('register') }}" id="register-form-link">ĐĂNG KÝ</a>
							</div>
						</div>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-12">
								<form id="login-form" action="{{ route('login') }}" method="post" role="form">
									@csrf
									
									<div class="form-group">
										<label for="email">Địa chỉ email*</label>
										<input id="email" type="email" class="form-control @error('email') is-invalid @enderror mt-2" name="email" value="{{ old('email') }}" required autocomplete="email">

										{{-- @error('email')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror --}}
										@error('email')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
									</div>
									<div class="form-group">
										<label for="password">Mật khẩu*</label>
										<input id="password" type="password" class="form-control @error('password') is-invalid @enderror mt-2" name="password" required autocomplete="current-password">

										{{-- @error('password')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
										@enderror --}}
										@error('password')
                                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                        @enderror
									</div>

									<div class="form-group">
										<label class="label-remember">
											<input type="checkbox" tabindex="3" class="" name="remember" id="remember" value="1" checked>
											<span class="checkmark"></span>
											<label for="remember">Nhớ mật khẩu</label>
										</label>
									</div>

									<div class="form-group">
										<div class="row">
											<div class="col-sm-12 col-sm-offset-12">
												<input type="submit" id="submit" tabindex="4" class="form-control btn btn-login" value="Đăng nhập">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="row">
											<div class="col-lg-12">
												<a href="{{ route('password.request') }}" tabindex="5" class="forgot-password">Quên mật khẩu?</a>
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