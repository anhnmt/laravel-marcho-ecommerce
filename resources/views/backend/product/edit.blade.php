@extends('layouts.admin')

@section('main')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>
					<li class="breadcrumb-item active">Sửa sản phẩm</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="create-form" action="{{ route('admin.product.update', $product->id) }}" method="POST">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label class="required" for="name">Tên</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nhập tên" value="{{ $product->name }}">

										@error('name')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="slug">Đường dẫn (Để trống sẽ tự động tạo)</label>
										<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Nhập dường dẫn" value="{{ $product->slug }}">

										@error('slug')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="sku">SKU</label>
										<input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" placeholder="Nhập SKU" value="{{ $product->sku }}">

										@error('sku')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="description">Mô tả</label>
										<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" placeholder="Nhập mô tả">{{ $product->description }}</textarea>


										@error('description')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="description">Nội dung</label>
										<textarea class="form-control @error('content') is-invalid @enderror" name="content" id="content" rows="10" placeholder="Nhập mô tả">{{ $product->content }}</textarea>

										@error('content')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5>Xuất bản</h5>
								</div>

								<div class="card-body">
									<button type="submit" class="btn btn-success">
										<i class="fal fa-check-circle"></i> Lưu
									</button>
									<a href="{{ route('admin.product.index') }}" class="btn btn-danger">
										<i class="fal fa-save"></i> Huỷ
									</a>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h5>Giá sản phẩm</h5>
								</div>

								<div class="card-body">
									<div class="form-group">
										<label class="required" for="price">Giá tiền</label>
										<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Nhập giá tiền" value="{{ $product->price }}">

										@error('price')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="sale_price">Giá khuyến mãi</label>
										<input type="text" class="form-control @error('sale_price') is-invalid @enderror" name="sale_price" id="sale_price" placeholder="Nhập giá khuyến mãi" value="{{ $product->sale_price }}">

										@error('sale_price')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h5>Trạng thái</h5>
								</div>

								<div class="card-body">
									<select class="form-control @error('status') is-invalid @enderror" name="status" id="status">
										<option value="1" {{ $product->status ? 'selected' : ''}}>Kích hoạt</option>
										<option value="0" {{ $product->status ? '' : 'selected'}}>Bản nháp</option>
									</select>

									@error('status')
									<span class="invalid-feedback" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h5>Danh mục</h5>
								</div>

								<div class="card-body">
									<select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
										@foreach($categories as $category)
										<option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : ''}}>{{ $category->name }}</option>
										@endforeach
									</select>

									@error('category_id')
									<span class="invalid-feedback" role="alert">{{ $message }}</span>
									@enderror
								</div>
							</div>
							<div class="card">
								<div class="card-header">
									<h5>Hình ảnh</h5>
								</div>

								<div class="card-body">
									<div class="input-group">
										<span class="input-group-btn">
											<a id="lfm" data-input="image" data-preview="holder" data-type="category" class="btn btn-primary text-white">
												<i class="fal fa-camera"></i> Chọn ảnh
											</a>
											<button type="button" id="remove_img" class="btn btn-danger text-white">
												<i class="fal fa-trash-alt"></i> Xoá
											</button>
										</span>
										<input class="form-control @error('image') is-invalid @enderror" type="hidden" name="image" id="image" value="{{ $product->image }}">

										@error('image')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div id="holder" style="margin-top:15px;max-height:100px;">
										<img src="{{ $product->image }}" style="height: 100px;">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
@stop

@section('style')
<!-- summernote -->
<link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.css') }}">
@stop

@section('script')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
	$(function() {
		// Define function to open filemanager window
		var lfm = function(options, cb) {
			var route_prefix = (options && options.prefix) ? options.prefix : '/admin/filemanager';
			window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
			window.SetUrl = cb;
		};

		// Define LFM summernote button
		var LFMButton = function(context) {
			var ui = $.summernote.ui;
			var button = ui.button({
				contents: '<i class="note-icon-picture"></i> ',
				tooltip: 'Insert image with filemanager',
				click: function() {

					lfm({
						type: 'image',
						prefix: '/admin/filemanager'
					}, function(lfmItems, path) {
						lfmItems.forEach(function(lfmItem) {
							context.invoke('insertImage', lfmItem.url);
						});
					});

				}
			});
			return button.render();
		};

		// Summernote
		$('#content').summernote({
			height: 300, //set editable area's height
			toolbar: [
				['style', ['style']],
				['font', ['bold', 'underline', 'clear']],
				['fontname', ['fontname']],
				['color', ['color']],
				['para', ['ul', 'ol', 'paragraph']],
				['table', ['table']],
				['insert', ['link', 'lfm']],
				['view', ['fullscreen', 'codeview', 'help']],
			],
			buttons: {
				lfm: LFMButton
			}
		});

		$('#lfm').filemanager('product');

		$('#remove_img').click(function(e) {
			if ($('#image').val()) {
				$('#image').val('');
				$('#holder').html('');
			}
		});
	});
</script>
@stop