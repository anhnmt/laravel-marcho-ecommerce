@php
\Assets::addStyles([
'animate',
'bootstrap',
'fontawesome',
'select2',
'select2-bootstrap4',
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'select2',
'jquery-scrollup',
'custom',
'custom-select2',
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
							<h1 class="font-weight-normal">Thanh toán</h1>
							<ul>
								<li class="mx-1">
									<a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
								</li>
								<li class="mx-1">
									<i class="fal fa-angle-right"></i>
								</li>
								<li class=" mx-1 active">Thanh toán</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<section class="checkout_section my-5 py-5">
	<form action="{{ route('user.order.store') }}" method="post">
		@csrf
		<div class="container">
			<div class="row">
				<div class="col-lg-8">
					<div class="border p-3 p-lg-4">
						<div class="mb-1">
							<h5 class="form_checkout_title">Mời bạn nhập biểu mẫu thanh toán</h5>
						</div>
						<div class="col-lg-12 mt-3">
							<div class="form-group">
								<label for="" class="required">Họ và tên <span class="text-danger">*</span></label>
								<input type="text"
									class="form-control coupon_code_input @error('name') is-invalid @enderror"
									placeholder="Nhập họ tên đầy đủ..." name="name"
									value="{{ old('name') ?? old('name', auth()->user()->name)  }}">

								@error('name')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-lg-12 mt-3">
							<div class="form-group">
								<label for="" class="required">Email <span class="text-danger">*</span></label>
								<input type="text"
									class="form-control coupon_code_input @error('email') is-invalid @enderror"
									placeholder="Nhập email..." name="email"
									value="{{ old('email') ?? old('email', auth()->user()->email) }}">

								@error('email')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-lg-12 mt-3">
							<div class="form-group">
								<label for="" class="required">Số điện thoại <span class="text-danger">*</span></label>
								<input type="text"
									class="form-control coupon_code_input @error('phone') is-invalid @enderror"
									placeholder="Nhập SĐT..." name="phone"
									value="{{ old('phone') ?? old('phone', auth()->user()->phone) }}">

								@error('phone')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>
						</div>
						<div class="col-lg-12 mt-3">
							<div class="row">
								<div class="col-lg-4 mt-2">
									<div class="form-group">
										<label for="">Tỉnh/Thành phố <span class="text-danger">*</span></label>

										<select
											class="form-control select2 checkout_select2 @error('city_id') is-invalid @enderror"
											name="city_id" id="cities">
											<option value="0">--Tỉnh/Thành phố--</option>
											@foreach ($cities as $city)
											<option value="{{$city->id}}">{{$city->name}}</option>
											@endforeach
										</select>

										@error('city_id')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-4 mt-2">
									<div class="form-group">
										<label for="">Quận/Huyện <span class="text-danger">*</span></label>
										<select class="form-control select2 @error('district_id') is-invalid @enderror"
											name="district_id" id="districts">
											<option value="0">--Quận/Huyện--</option>
										</select>

										@error('district_id')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-4 mt-2">
									<div class="form-group">
										<label for="">Xã/Phường <span class="text-danger">*</span></label>
										<select class="form-control select2 @error('ward_id') is-invalid @enderror"
											name="ward_id" id="wards">
											<option value="0">--Xã/Phường--</option>
										</select>

										@error('ward_id')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
								</div>
								<div class="col-lg-12 mt-2">
									<div class="form-group">
										<label for="" class="required">Địa chỉ cụ thể <span
												class="text-danger">*</span></label>
										<input type="text" class="form-control coupon_code_input @error('address') is-invalid @enderror"
											placeholder="Số nhà, tòa nhà ..." name="address">

										@error('address')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-12 mt-3">
							<div class="form-group">
								<label for="" class="required">Lời nhắn</label>
								<textarea class="form-control coupon_code_input" name="note" id="" rows="5"
									placeholder="Ghi chú của bạn..."></textarea>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="border p-3 p-lg-4 mb-5">
						<div class="text-center">
							<h4 class="order_product_title">Đơn hàng của bạn</h4>
						</div>
						<div class="table-responsive">
							<table class="table oder_table">
								<tbody>
									<tr>
										<td class="cart_total_label">Số sản phẩm</td>
										<td class="cart_total_amount text-right"><span
												class="badge badge-danger">{{ $quantity }}</span></td>
									</tr>
									<tr>
										<td class="cart_total_label">Tổng tiền sản phẩm</td>
										<td class="cart_total_amount text-right">{{ number_format($total, 0) }}đ</td>
									</tr>
									<tr>
										<td class="cart_total_label">Mã giảm giá</td>
										<td class="cart_total_amount text-right">{{ number_format($action, 0) }}đ</td>
									</tr>
									<tr>
										<td class="cart_total_label">Phí ship</td>
										<td class="cart_total_amount text-right">Miễn phí ship</td>
									</tr>
									<tr>
										<td class="cart_total_label">Tất cả</td>
										<td class="cart_total_amount text-right">
											<strong>{{ number_format($subtotal, 0) }}đ</strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
					<div class="border p-3 p-lg-4">
						<div class="text-center">
							<h4 class="order_product_title">Phương thức thanh toán</h4>
						</div>
						<table class="table oder_table checkout_table">
							<tbody>
								<tr>
									<td class="cart_total_label">
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input input_size" name="payment"
													id="" value="0" checked>
												<span class="checkmark"></span>
												Thanh toán trực tiếp
											</label>
											<p>Thanh toán đơn hàng sau khi nhận được sản phẩm</p>
										</div>
									</td>
								</tr>
								<tr>
									<td class="cart_total_label pt-4">
										<div class="form-check">
											<label class="form-check-label">
												<input type="radio" class="form-check-input input_size" name="payment"
													id="" value="1">
												<span class="checkmark"></span>
												Thanh toán qua Paypal
											</label>
											<p>Thanh toán đơn hàng trước rồi sau đó mới nhận sản phẩm</p>
										</div>
									</td>
								</tr>
							</tbody>
						</table>
						<button type="submit" class="btn btn-fill-out">Đặt hàng</button>
					</div>
				</div>
			</div>
		</div>
	</form>
</section>
@endsection

@section('script')
<script>
	$("#cities").on('change', function(e) {
		e.preventDefault();
		var id = $(this).val();
		$.ajax({
			url: "{{ route('checkout.districts') }}",
			method: 'POST',
			data: {
				id: id,
			},
			success: function(data) {
				$('#districts').find('option:not(:first)').remove();
				$('#wards').find('option:not(:first)').remove();
				$.each(data, function(key, value) {
					$("#districts").append(
						"<option value=" + value.id + ">" + value.name + "</option>"
					);
				});
			}
		});
	});

	$("#districts").on('change', function(e) {
		e.preventDefault();
		var id = $(this).val();
		$.ajax({
			url: "{{ route('checkout.wards') }}",
			method: 'POST',
			data: {
				id: id,
			},
			success: function(data) {
				$('#wards').find('option:not(:first)').remove();
				$.each(data, function(key, value) {
					$("#wards").append(
						"<option value=" + value.id + ">" + value.name + "</option>"
					);
				});
			}
		});
	});
</script>
@endsection