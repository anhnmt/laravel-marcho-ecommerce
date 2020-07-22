@extends('layouts.admin')

@section('main')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin.product.index') }}">Sản phẩm</a></li>
					<li class="breadcrumb-item active">Thêm sản phẩm</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">

		<div class="row">
			<div class="col-12">
				<!-- Nav tabs -->
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<a class="nav-item nav-link active" id="product-info-tab" data-toggle="tab" href="#product-info" role="tab" aria-controls="product-info" aria-selected="true">Thông tin</a>
						<a class="nav-item nav-link" id="product-attribute-tab" data-toggle="tab" href="#product-attribute" role="tab" aria-controls="product-attribute" aria-selected="false">Thuộc tính</a>
					</div>
				</nav>

				<div class="tab-content" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="product-info" role="tabpanel" aria-labelledby="product-info-tab">
						<form id="create-form" action="{{ route('admin.product.store') }}" method="POST">
							@csrf

							<div class="row">
								<div class="col-lg-8">
									<div class="card">
										<div class="card-body">
											<div class="form-group">
												<label class="required" for="name">Tên</label>
												<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nhập tên">

												@error('name')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</div>
											
											<div class="form-group">
												<label for="slug">Đường dẫn (Để trống sẽ tự động tạo)</label>
												<input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" placeholder="Nhập dường dẫn">

												@error('slug')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</div>

											<div class="form-group">
												<label for="sku">SKU (Để trống sẽ tự động tạo)</label>
												<input type="text" class="form-control @error('sku') is-invalid @enderror" name="sku" id="sku" placeholder="Nhập SKU">

												@error('sku')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</div>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<h5>Hình ảnh thumbnail</h5>
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
												<input class="form-control @error('image') is-invalid @enderror" type="hidden" name="image" id="image">

												@error('image')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</div>
											<div id="holder" style="margin-top:15px;max-height:100px;"></div>
										</div>
									</div>

									<div class="card">
										<div class="card-header">
											<h5>Nội dung & mô tả</h5>
										</div>

										<div class="card-body">
											<div class="form-group">
												<label for="description">Mô tả</label>
												<textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="3" placeholder="Nhập mô tả"></textarea>

												@error('description')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</div>

											<div class="form-group">
												<label for="body">Nội dung</label>
												<textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="30" placeholder="Nhập mô tả"></textarea>

												@error('body')
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
												<input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" placeholder="Nhập giá tiền">

												@error('price')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</div>
											<div class="form-group">
												<label for="sale_price">Giá khuyến mãi</label>
												<input type="text" class="form-control @error('sale_price') is-invalid @enderror" name="sale_price" id="sale_price" placeholder="Nhập giá khuyến mãi">

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
												<option value="1" selected>Kích hoạt</option>
												<option value="0">Bản nháp</option>
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
												<option value="{{ $category->id }}">{{ $category->name }}</option>
												@endforeach
											</select>

											@error('category_id')
											<span class="invalid-feedback" role="alert">{{ $message }}</span>
											@enderror
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="product-attribute" role="tabpanel" aria-labelledby="product-attribute-tab">
						<div class="card">
							<div class="card-header">
								<h5>Thuộc tính sản phẩm</h5>
							</div>

							<div class="card-body">
								<table class="table">
									<thead>
										<tr>
											<th></th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td scope="row"></td>
											<td>
												<select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
													@foreach($attibutes as $attibute)
													<option value="{{ $attibute->id }}">{{ $attibute->name }}</option>
													@endforeach
												</select>

												@error('category_id')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</td>
											<td>
												<select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
													@foreach($attibute_values as $attibute_value)
													<option value="{{ $attibute_value->id }}">{{ $attibute_value->value }}</option>
													@endforeach
												</select>

												@error('category_id')
												<span class="invalid-feedback" role="alert">{{ $message }}</span>
												@enderror
											</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
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
			PopupCenter('/admin/filemanager?type=product', "FileManager", 900, 600);
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
		$('#body').summernote({
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
	});
</script>
@stop