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
								<th class="product-thumbnail">&nbsp;</th>
								<th class="product-name">Product</th>
								<th class="product-price">Price</th>
								<th class="product-quantity">Quantity</th>
								<th class="product-subtotal">Total</th>
								<th class="product-remove">Remove</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="product-thumbnail"><a href="#"><img
											src="{{ asset('uploads/products/product2.jpg') }}" alt="product1"></a></td>
								<td class="product-name" data-title="Product"><a href="#">Blue Dress For
										Woman</a></td>
								<td class="product-price" data-title="Price">$45.00</td>
								<td class="product-quantity" data-title="Quantity">
									<div class="quantity">
										<input type="button" value="-" class="minus">
										<input type="text" name="quantity" value="2" title="Qty" class="qty"
											size="4">
										<input type="button" value="+" class="plus">
									</div>
								</td>
								<td class="product-subtotal" data-title="Total">$90.00</td>
								<td class="product-remove" data-title="Remove"><a href="#"><i class="fal fa-times"></i></a></td>
							</tr>
							<tr>
								<td class="product-thumbnail"><a href="#"><img
											src="{{ asset('uploads/products/product1.jpg') }}" alt="product2"></a></td>
								<td class="product-name" data-title="Product"><a href="#">Lether Gray Tuxedo</a>
								</td>
								<td class="product-price" data-title="Price">$55.00</td>
								<td class="product-quantity" data-title="Quantity">
									<div class="quantity">
										<input type="button" value="-" class="minus">
										<input type="text" name="quantity" value="1" title="Qty" class="qty"
											size="4">
										<input type="button" value="+" class="plus">
									</div>
								</td>
								<td class="product-subtotal" data-title="Total">$55.00</td>
								<td class="product-remove" data-title="Remove"><a href="#"><i class="fal fa-times"></i></a></td>
							</tr>
							<tr>
								<td class="product-thumbnail"><a href="#"><img
											src="{{ asset('uploads/products/product3.jpg') }}" alt="product3"></a></td>
								<td class="product-name" data-title="Product"><a href="#">woman full sliv
										dress</a></td>
								<td class="product-price" data-title="Price">$68.00</td>
								<td class="product-quantity" data-title="Quantity">
									<div class="quantity">
										<input type="button" value="-" class="minus">
										<input type="text" name="quantity" value="3" title="Qty" class="qty"
											size="4">
										<input type="button" value="+" class="plus">
									</div>
								</td>
								<td class="product-subtotal" data-title="Total">$204.00</td>
								<td class="product-remove" data-title="Remove"><a href="#"><i class="fal fa-times"></i></a></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="6" class="px-0 mt-5 pt-5">
									<div class="row no-gutters">

										<div class="col-lg-4 col-md-6 mb-3 mb-md-0 text-md-left">
											<div class="fix_btn_line_fill d-inline-block">
												<button class="btn btn-line-fill btn-sm" type="submit">Xóa giỏ hàng</button>
											</div>
										</div>
										<div class="col-lg-8 col-md-6 text-left text-md-right">
											<a href="#" class="btn btn-fill-out">Tiếp tục mua sắm</a>
										</div>
									</div>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
		<div class="row mt-5 pt-5">
			<div class="col-md-6">
				<div class="border p-3 p-md-4">
					<div class="heading_s1 mb-3">
						<h6>Coupon code</h6>
					</div>
					<div class="col-lg-12 mt-3">
						<div class="form_group">
							<input type="text" class="form_control coupon_code_input" placeholder="Nhập mã giảm giá..." name="subject">
						</div>
					</div>
					<div class="text-right">
						<a href="#" class="btn btn-fill-out">Áp dụng</a>
					</div>
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
									<td class="cart_total_amount">$349.00</td>
								</tr>
								<tr>
									<td class="cart_total_label">Phí ship</td>
									<td class="cart_total_amount">Miễn phí ship</td>
								</tr>
								<tr>
									<td class="cart_total_label">Tất cả</td>
									<td class="cart_total_amount"><strong>$349.00</strong></td>
								</tr>
							</tbody>
						</table>
					</div>
					<a href="#" class="btn btn-fill-out">Proceed To CheckOut</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

{{-- @section('style')
<style>
.cart_section .shop_cart_table .table {
    margin: 0;
}
.cart_section .woocommerce-cart th, .woocommerce-cart td {
    border: none;
    border-top: 1px solid #dee2e6;
}
.cart_section .woocommerce-cart th, .woocommerce-cart td {
    border: none;
    border-top: 1px solid #dee2e6;
}
.cart_section .shop_cart_table th, .shop_cart_table td, .wishlist_table th, .wishlist_table td {
    vertical-align: middle;
    text-align: center;
}
.cart_section .shop_cart_table th.product-name, .shop_cart_table td.product-name, .wishlist_table th.product-name, .wishlist_table td.product-name {
    text-align: left;
    text-transform: capitalize;
}
.cart_section .shop_cart_table td.product-price, .shop_cart_table td.product-subtotal {
    font-weight: 600;
}
.cart_section button{
	border:none;
	text-transform:uppercase;
    color: #fff;
    background-color: rgb(254 55 81);
    box-shadow: 0px 3px 4px 0px rgba(255, 17, 48, 0.3);
}
.cart_section .coupon{
	border:1px solid #ece7e7;
	padding:30px;
	margin-top: 80px
}
.cart_section .subtotal{
	padding: 10px 0px;
}
.cart_section .subtotal span{
	float: left;
	color:#000
}
.cart_section .subtotal .cart_price{
	float: right;
	color:red
}
</style>
@endsection --}}