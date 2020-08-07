@php
\Assets::addStyles([
'adminlte'
]);

\Assets::addScripts([
'stand-alone-button',
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
					<li class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Slider</a></li>
					<li class="breadcrumb-item active">Sửa slider</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="create-form" action="{{ route('admin.slider.update', $slider->id) }}" method="POST">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label class="required" for="name">Tên</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nhập tên" value="{{ $slider->name }}">

										@error('name')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="link">Đường dẫn trỏ tới</label>
										<input type="text" class="form-control @error('link') is-invalid @enderror" name="link" id="link" placeholder="Nhập dường dẫn" value="{{ $slider->link }}">

										@error('link')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>
									<div class="form-group">
										<label for="body">Mô tả</label>
										<textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="3" placeholder="Nhập mô tả">{{ $slider->body }}</textarea>

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
									@can('admin.slider.store')
									<button type="submit" class="btn btn-success">
										<i class="fal fa-check-circle"></i> Lưu
									</button>
									@endcan
									<a href="{{ route('admin.slider.index') }}" class="btn btn-default">
										<i class="fal fa-save"></i> Quay lại
									</a>
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
									<h5>Hình ảnh</h5>
								</div>

								<div class="card-body">
									<div class="input-group">
										<span class="input-group-btn">
											<a id="lfm" data-input="image" data-preview="holder" class="btn btn-primary text-white" data-type="slider">
												<i class="fal fa-camera"></i> Chọn ảnh
											</a>
											<button type="button" id="remove_img" class="btn btn-danger text-white">
												<i class="fal fa-trash-alt"></i> Xoá
											</button>
										</span>
                    
										<input class="form-control @error('image') is-invalid @enderror" type="hidden" name="image" id="image" value="{{ $slider->image }}">

										@error('image')
										<span class="invalid-feedback" role="alert">{{ $message }}</span>
										@enderror
									</div>

									<div id="holder" style="margin-top:15px">
										<img loading="lazy" src="{{ asset($slider->image) }}">
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

@section('script')
<script>
	$(function() {
		$('#lfm').filemanager('slider');
	});
</script>
@stop