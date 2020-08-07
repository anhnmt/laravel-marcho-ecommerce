@php
\Assets::addStyles([
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'jquery-scrollup',
'custom',
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
						@if ($quantity > 0)
						<tbody>
							@foreach($items as $item)
							@php
							$itemDetail = $item->getDetails();
							$itemOption = $item->getOptions();
							@endphp
							<tr id="{{ $item->getHash() }}">
								<td class="product-thumbnail">
									<a href="{{ route('product.show', $itemDetail->model->slug) }}">
										<img loading="lazy" src="{{ asset(str_replace('thumbs/', '', $itemDetail->model->image)) }}" alt="product1">
									</a>
								</td>
								<td class="product-name" data-title="Product">
									<a href="{{ route('product.show', $itemDetail->model->slug) }}">
										{{ $itemDetail->title }}

										@if ($itemOption)
										<p>
											@foreach($itemOption as $option)
											@if (is_array($option))
											<span class="badge badge-danger">
												{{ $option['code'] }}
											</span>
											@endif
											@endforeach
										</p>
										@endif
									</a>
								</td>
								@php
								$product_quantity = $itemDetail->model->quantity;
								if(isset($itemOption['product_attribute_id'])) {
								$productAttribute = \App\Models\ProductAttribute::find($itemOption['product_attribute_id']);
								$product_quantity= $productAttribute->quantity;
								}
								@endphp
								<td class="product-price" data-title="Price">{{ number_format($itemDetail->price, 0) }}đ
								</td>
								<td class="product-quantity" data-title="Quantity">
									<div class="quantity">
										<input type="button" value="-" class="minus">
										<input type="text" name="quantity" value="{{ $itemDetail->quantity }}" title="Qty" class="qty" size="4">
										<input type="button" value="+" class="plus">
										<input type="hidden" class="product_quantity" value="{{ $product_quantity }}">
									</div>
								</td>
								<td class="product-subtotal" data-title="Total">
									{{ number_format($itemDetail->total_price, 0) }}đ</td>
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
										<div class="col-md-6 mb-3 mb-md-0 text-md-left">
											<div class="fix_btn_line_fill d-inline-block">
												<form action="{{ route('cart.clear') }}" method="POST">
													@csrf
													<button type="submit" class="btn btn-fill-line">Xóa giỏ
														hàng</button>
												</form>
											</div>
										</div>

										<div class="col-md-6 text-left text-md-right">
											<a href="{{ route('product.index') }}" class="btn btn-fill-out">Tiếp tục mua
												sắm</a>
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

										<a href="{{ route('product.index') }}" class="btn btn-fill-out px-3 py-2">Mua
											ngay</a>
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
							<button type="submit" class="btn btn-fill-out" @if ($quantity <=0) disabled @endif>Áp dụng</button>
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
									<td id="cart_subtotal" class="cart_total_amount">{{ number_format($total, 0) }}đ
									</td>
								</tr>
								<tr>
									<td class="cart_total_label">Mã giảm giá</td>
									<td class="cart_total_amount">{{ number_format($action, 0) }}đ</td>
								</tr>
								<tr>
									<td class="cart_total_label">Tất cả</td>
									<td id="cart_total" class="cart_total_amount">
										<strong>{{ number_format($subtotal, 0) }}đ</strong></td>
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
<script>
	/*-------------------------------
        Plus and minus quantity
	------------------------------ */
	$(function() {
		$(".plus").on("click", function() {
			var self = this;
			var qty = $(self).closest("tr").find(".qty");
			var maxQty = $(self).closest("tr").find(".product_quantity").val();

			if (parseInt(qty.val()) < parseInt(maxQty)) {
				qty.val(+parseInt(qty.val()) + 1);
				$(self).closest("tr").find(".minus").attr("disabled", false);
				//Trigger change event
				qty.trigger("change");
			} else {
				$(self).attr("disabled", true);
			}
		});

		$(".minus").on("click", function() {
			var self = this;

			var qty = $(self).closest("tr").find(".qty");

			if (parseInt(qty.val()) < 2) {
				$(self).attr("disabled", true);
			} else {
				qty.val(+parseInt(qty.val()) - 1);
				$(self).closest("tr").find(".plus").attr("disabled", false);
				//Trigger change event
				qty.trigger("change");
			}
		});

		$(".qty").on("change", debounce(function(e) {
			var self = this;
			var maxQty = $(self).closest("tr").find(".product_quantity").val();

			if (parseInt($(self).val()) <= 0 || isNaN($(self).val())) {
				$(self).val(1);
			}

			if (parseInt($(self).val()) > maxQty) {
				$(self).val(maxQty);
			}

			$(self).closest("tr").find(".plus").attr("disabled", false);
			$(self).closest("tr").find(".minus").attr("disabled", false);

			var id = $(self).closest("tr").attr('id');
			var qty = $(self).val();
			var total = $(self).closest("tr").find(".product-subtotal");

			$.ajax({
				"url": "cart/update/" + id,
				"method": "POST",
				"data": {
					"quantity": qty,
				}
			}).done(function(json) {
				// console.log(json);

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
		}, 300));
	});
</script>
@endsection