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
							<h1 class="font-weight-normal">Giỏ Hàng</h1>
							<ul>
								<li class="mx-1">
									<a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
								</li>
								<li class="mx-1">
									<i class="fal fa-angle-right"></i>
								</li>
								<li class=" mx-1 active">Giỏ hàng</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<section class="cart_section my-5 py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive shop_cart_table">
					<table class="table">
						<thead>
							<tr>
								<th class="product-thumbnail">Ảnh</th>
								<th class="product-name">Sản phẩm</th>
								<th class="product-price">Đơn giá</th>
								<th class="product-quantity">Số lượng</th>
								<th class="product-subtotal">Tổng</th>
								<th class="product-remove">Xóa</th>
							</tr>
						</thead>
						@if (count($items) > 0)
						<tbody>
							@foreach($items as $item)
							@php
							//dd($item->getDetails())
							$itemDetail = $item->getDetails();
							@endphp
							<tr id="{{ $item->getHash() }}">
								<td class="product-thumbnail"><a href="#"><img src="{{ asset(str_replace('thumbs/', '', $itemDetail->model->image)) }}" alt="product1"></a></td>
								<td class="product-name" data-title="Product">
									<a href="{{ route('product.show', $itemDetail->model->slug) }}">{{ $itemDetail->title }}</a>
								</td>
								<td class="product-price" data-title="Price">{{ number_format($itemDetail->price, 0) }}đ</td>
								<td class="product-quantity" data-title="Quantity">
									<div class="quantity">
										<input type="button" value="-" class="minus">
										<input type="text" name="quantity" value="{{ $itemDetail->quantity }}" title="Qty" class="qty" size="4">
										<input type="button" value="+" class="plus">
									</div>
								</td>
								<td class="product-subtotal" data-title="Total">{{ number_format($itemDetail->total_price, 0) }}đ</td>
								<td class="product-remove" data-title="Remove">
									<form action="{{ route('cart.destroy', $item->getHash()) }}" method="POST">
										@csrf
										<button class="btn" type="submit"><i class="fal fa-times"></i></button>
									</form>
								</td>
							</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6" class="px-0 mt-5 pt-5">
									<div class="row no-gutters">
										<div class="col-lg-4 col-md-6 mb-3 mb-md-0 text-md-left">
											<div class="fix_btn_line_fill d-inline-block">
												<form action="{{ route('cart.clear') }}" method="POST">
													@csrf
													<button type="submit" class="btn btn-fill-line">Xóa giỏ hàng</button>
												</form>
											</div>
										</div>

										<div class="col-lg-8 col-md-6 text-left text-md-right">
											<a href="{{ route('home') }}" class="btn btn-fill-out">Tiếp tục mua sắm</a>
										</div>
									</div>
								</td>
							</tr>
						</tfoot>
						@else
						<tbody>
							<tr>
								<td colspan="6" class="px-0 mt-5">
									<div class="alert text-center m-0" role="alert">
										<p class="mb-3">
											Giỏ hàng của bạn còn trống.
										</p>

										<a href="{{ route('home') }}" class="btn btn-fill-out px-3 py-2">Mua ngay</a>
									</div>
								</td>
							</tr>
						</tbody>
						@endif
					</table>
				</div>
			</div>
		</div>
		<div class="row mt-5 pt-5">
			<div class="col-md-6">
				<div class="border p-3 p-md-4">
					<form action="{{ route('cart.discount') }}" method="POST">
						@csrf

						<div class="heading_s1 mb-3">
							<h6>Mã giảm giá</h6>
						</div>
						<div class="mt-3">
							<div class="form_group">
								<input type="text" class="form_control coupon_code_input" placeholder="Nhập mã giảm giá..." name="coupon">
							</div>
						</div>
						<div class="text-right">
							<button type="submit" class="btn btn-fill-out" @if ($quantity <= 0) disabled @endif>Áp dụng</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-md-6">
				<div class="border p-3 p-md-4">
					<div class="heading_s1 mb-3">
						<h6>Tổng chi phí</h6>
					</div>
					<div class="table-responsive">
						<table class="table">
							<tbody>
								<tr>
									<td class="cart_total_label">Tổng tiền sản phẩm</td>
									<td id="cart_subtotal" class="cart_total_amount">{{ number_format($total, 0) }}đ</td>
								</tr>
								<tr>
									<td class="cart_total_label">Mã giảm giá</td>
									<td class="cart_total_amount">{{ number_format($action, 0) }}đ</td>
								</tr>
								<tr>
									<td class="cart_total_label">Tất cả</td>
									<td id="cart_total" class="cart_total_amount"><strong>{{ number_format($subtotal, 0) }}đ</strong></td>
								</tr>
							</tbody>
						</table>
					</div>
					<a href="{{ route('checkout.index') }}" class="btn btn-fill-out @if ($quantity <= 0) disabled @endif">Thanh toán ngay</a>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
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

@if(session('error'))
<script>
	$(function() {
		Swal.fire({
			toast: true,
			position: "top-end",
			showConfirmButton: false,
			timer: 3000,
			icon: "error",
			title: "{{ session('error') }}",
		});
	});
</script>
@endif

<script>
	/*-------------------------------
        Plus and minus quantity
	------------------------------ */
	$(function() {
		$(".plus").on("click", function() {
			var qty = $(this).closest("tr").find(".qty");
			if (qty.val()) {
				qty.val(+qty.val() + 1);
				$(this).closest("tr").find(".minus").attr("disabled", false);
				//Trigger change event
				qty.trigger("change");
			}
		});

		$(".minus").on("click", function() {
			var qty = $(this).closest("tr").find(".qty");
			if (qty.val() <= 1) {
				$(this).attr("disabled", true);
			} else {
				qty.val(+qty.val() - 1);
				//Trigger change event
				qty.trigger("change");
			}
		});

		$(".qty").on("change", function() {
			var self = this;

			if ($(self).val() <= 0) {
				$(self).val(1);
			}

			var id = $(self).closest("tr").attr('id');
			var qty = $(self).val();
			var total = $(self).closest("tr").find(".product-subtotal");

			$(self).attr("disabled", true);
			$(self).closest("tr").find(".plus").attr("disabled", true);
			$(self).closest("tr").find(".minus").attr("disabled", true);

			$.ajax({
				"url": "cart/update/" + id,
				"method": "POST",
				"data": {
					// "_token": "{{ csrf_token() }}",
					"quantity": qty,
				}
			}).done(function(json) {
				// console.log(json);
				$(self).attr("disabled", false);
				$(self).closest("tr").find(".plus").attr("disabled", false);
				$(self).closest("tr").find(".minus").attr("disabled", false);

				if (json.success === true) {
					total.html(json.item_total);
					$('#cart_subtotal').html(json.cart_subtotal);
					$('#cart_total > strong').html(json.cart_total);
					$('#cart_count').html(json.cart_count);
				} else {
					Swal.fire({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						icon: "error",
						title: json.msg,
					});
				}
			});
		});
	});
</script>
@endsection