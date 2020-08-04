@php
\Assets::addStyles([
'datatables-bs4',
'select2',
'select2-bootstrap4',
'adminlte'
]);

\Assets::addScripts([
'datatables',
'datatables-bs4',
'datatables-responsive',
'datatables-responsive-bs4',
'select2',
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
					<li class="breadcrumb-item active">Thuộc tính sản phẩm</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-4">
				<div class="card">
					@if($product_attribute ?? '')
					<form id="create-form" action="{{ route('admin.product.attribute.update', [ $product, $product_attribute ]) }}" method="POST">
						@csrf
						@method('PUT')

						<div class="card-body">
							<div class="form-group">
								<label class="required" for="value">Giá trị</label>
								<input type="text" class="form-control @error('value') is-invalid @enderror" name="value" id="value" placeholder="Nhập giá trị" value="{{ $product_attribute->value }}">

								@error('value')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="code">Code (Để trống sẽ tự động tạo)</label>
								<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="Nhập dường dẫn" value="{{ $product_attribute->code }}">

								@error('code')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>

							@can('admin.product.attribute.update')
							<button type="submit" class="btn btn-success">
								<i class="fal fa-check-circle"></i> Lưu
							</button>
							@endcan
							<a href="{{ route('admin.product.index') }}" class="btn btn-default">
								<i class="fal fa-save"></i> Quay lại
							</a>
						</div>
					</form>
					@else
					<form id="create-form" action="{{ route('admin.product.attribute.store', $product->id) }}" method="POST">
						@csrf

						<div class="card-body">
							<div class="form-group">
								<label>Thuộc tính <span class="text text-danger">*</span></label>
								<select name="attribute[]" id="attribute" class="select2" multiple="multiple" data-placeholder="Chọn thuộc tính" style="width: 100%;">
									@foreach($attributes as $attribute)
									<option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
									@endforeach
								</select>
							</div>

							@foreach($attributes as $attribute)
							<div class="attribute form-group hidden" id="attributeForm{{ $attribute->id }}">
								<label for="attribute{{ $attribute->id }}">{{ $attribute->name }}</label>
								@if(!$attribute->values->isEmpty())
								<select name="attributeValue[]" id="attributeValue{{ $attribute->id }}" class="form-control select2" style="width: 100%;" disabled>
									@foreach($attribute->values as $attr)
									<option value="{{ $attr->id }}">{{ $attr->value }}</option>
									@endforeach
								</select>
								@endif
							</div>
							@endforeach

							<div class="form-group">
								<label for="quantity">Số lượng <span class="text text-danger">*</span></label>
								<input type="text" name="quantity" id="quantity" class="form-control @error('quantity') is-invalid @enderror" placeholder="Nhập số lượng" disabled>

								@error('quantity')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="price">Giá tiền</label>
								<input type="text" name="price" id="price" class="form-control @error('price') is-invalid @enderror" placeholder="Nhập giá tiền" disabled>

								@error('price')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="sale_price">Giá khuyến mãi</label>
								<input type="text" name="sale_price" id="sale_price" class="form-control @error('sale_price') is-invalid @enderror" placeholder="Nhập giá khuyến mãi" disabled>

								@error('sale_price')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group">
								<label for="default">Mặc định</label>
								<select name="default" id="default" class="form-control select2">
									<option value="1" selected>Có</option>
									<option value="0">Không</option>
								</select>
							</div>

							@can('admin.product.attribute.store')
							<button type="submit" class="btn btn-success">
								<i class="fal fa-check-circle"></i> Lưu
							</button>
							@endcan
							<a href="{{ route('admin.product.index') }}" class="btn btn-default">
								<i class="fal fa-save"></i> Quay lại
							</a>
						</div>
					</form>
					@endif
				</div>
			</div>

			<div class="col-lg-8">
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatables" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Thuộc tính</th>
										<th>Số lượng</th>
										<th>Giá tiền</th>
										<th>Giá khuyến mãi</th>
										<th>Mặc định</th>
										<th>Hành động</th>
									</tr>
								</thead>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop

@section('script')
<script>
	$(function() {
		$.fn.dataTable.ext.errMode = 'throw';
		//Initialize Select2 Elements
		$('.select2').select2();

		$('#attribute').on('change', function() {
			var attributeId = $(this).val();

			$('.attribute.form-group').addClass('hidden');

			if (attributeId.length > 0) {
				attributeId.forEach(function(element, index) {
					$('#attributeForm' + element).removeClass('hidden');
					$('#attributeValue' + element).attr('disabled', false);
				});

				$('#quantity').attr('disabled', false);
				$('#price').attr('disabled', false);
				$('#sale_price').attr('disabled', false);
				$('#default').attr('disabled', false);
				$('#btnCreate').attr('disabled', false);
			} else {
				$('#quantity').attr('disabled', true);
				$('#price').attr('disabled', true);
				$('#sale_price').attr('disabled', true);
				$('#default').attr('disabled', true);
				$('#btnCreate').attr('disabled', true);
			}

		});

		$('#datatables').DataTable({
			"paging": true,
			"ordering": true,
			"autoWidth": false,
			"responsive": true,
			"serverSide": true,
			"ajax": "{{ route('admin.product.attribute.list', $product->id) }}",
			"order": [
				[0, 'desc']
			],
			"columns": [{
					data: 'id',
					className: 'align-middle text-center',
				},
				{
					data: 'attributeValue',
					className: 'align-middle',
				},
				{
					data: 'quantity',
					className: 'align-middle',
				},
				{
					data: 'price',
					className: 'align-middle',
				},
				{
					data: 'sale_price',
					className: 'align-middle',
				},
				{
					data: 'default',
					className: 'align-middle',
				},
				{
					data: 'action',
					className: 'align-middle text-center',
					orderable: false,
					searchable: false,
				},
			]
		}).on('submit', '.delete-form', function(event) {
			event.preventDefault();

			Swal.fire({
				title: 'Xác nhận xoá?',
				text: "Bạn sẽ không thể khôi phục dữ liệu!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Đồng ý!',
				cancelButtonText: 'Huỷ!',
			}).then((result) => {
				if (result.value) {
					event.currentTarget.submit();
				}
			});
		});
	});
</script>
@stop