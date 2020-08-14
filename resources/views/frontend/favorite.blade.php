@php
\Assets::addStyles([
'font-roboto-quicksand',
'datatables-bs4',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'datatables',
'datatables-bs4',
'datatables-responsive',
'datatables-responsive-bs4',
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
							<h1 class="font-weight-normal">Sản phẩm yêu thích</h1>
							<ul>
								<li class="mx-1">
									<a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
								</li>
								<li class="mx-1">
									<i class="fal fa-angle-right"></i>
								</li>
								<li class=" mx-1 active">Sản phẩm yêu thích</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

<section class="cart_section my-md-5 my-0 py-5">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="table-responsive shop_cart_table">
					<table id="datatables" class="table table-bordered table-hover">
						<thead>
							<tr>
								<th class="product-thumbnail">Ảnh</th>
								<th class="product-name">Sản phẩm</th>
								<th class="product-price">Đơn giá</th>
								<th class="product-subtotal">Thêm vào giỏ</th>
								<th class="product-remove">Xóa</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection

@section('script')
<script>
	$(function() {
		$.fn.dataTable.ext.errMode = 'throw';

		$('#datatables').DataTable({
			"paging": true,
			"ordering": true,
			"autoWidth": false,
			"responsive": true,
			"serverSide": true,
			"ajax": "{{ route('favorite.list') }}",
			"order": [
				[1, 'desc']
			],
			"columns": [{
					"data": 'image',
					"className": 'align-middle text-center',
					"orderable": false,
					"searchable": false
				},
				{
					"data": 'name',
					"className": 'align-middle',
				},
				{
					"data": 'price',
					"className": 'align-middle',
				},
				{
					"data": 'status',
					"className": 'align-middle',
				},
				{
					"data": 'action',
					"className": 'align-middle text-center',
					"orderable": false,
					"searchable": false
				},
			],
			"language": {
				"emptyTable": `
					<div class="alert text-center m-0" role="alert">
						<p class="mb-3">
							Bạn chưa thích sản phẩm nào.
						</p>

						<a href="http://marcho.test/product" class="btn btn-fill-out px-3 py-2">Mua
							ngay</a>
					</div>
				`,
				"oPaginate": {
					"sPrevious": '<i class="fal fa-angle-left"></i>',
					"sNext": '<i class="fal fa-angle-right"></i>',
					"sFirst": '<i class="fal fa-angle-double-left"></i>',
					"sLast": '<i class="fal fa-angle-double-right"></i>'
				}
			}
		}).on('click', '.remove-favorite', debounce(function(event) {
			var self = this;
			var id = $(self).data("product");
			$(self).closest("tr").remove();

			$.ajax({
				url: "/favorite/" + id,
				method: "GET",
			}).done(function(json) {
				if (json.success === true) {
					Swal.fire({
						toast: true,
						position: "top-end",
						showConfirmButton: false,
						timer: 3000,
						icon: "success",
						title: json.msg,
					});

					$('#favorite_count').html(json.favoriteCount);
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