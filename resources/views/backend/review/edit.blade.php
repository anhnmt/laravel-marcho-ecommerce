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
					<li class="breadcrumb-item"><a href="{{ route('admin.product.review.index', $product->id) }}">Đánh giá</a></li>
					<li class="breadcrumb-item active">Sửa đánh giá</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="edit-form" action="{{ route('admin.product.review.update', [$product->id, $review->id]) }}" method="POST">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label class="required pr-3" for="body">Xếp hạng</label>
										<input type="hidden" id="rating" name="rating" value="5">

										<div class="star d-block d-md-inline mr-4 @if($review->rating == 1) checked @endif" data-star="1">
											<i class="fas fa-star"></i>
										</div>

										<div class="star d-block d-md-inline mr-4 @if($review->rating == 2) checked @endif" data-star="2">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</div>

										<div class="star d-block d-md-inline mr-4 @if($review->rating == 3) checked @endif" data-star="3">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</div>

										<div class="star d-block d-md-inline mr-4 @if($review->rating == 4) checked @endif" data-star="4">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</div>

										<div class="star d-block d-md-inline mr-4 @if($review->rating == 5) checked @endif" data-star="5">
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
											<i class="fas fa-star"></i>
										</div>
									</div>
									<div class="form-group">
										<label class="required" for="body">Đánh giá</label>
										<textarea class="form-control @error('body') is-invalid @enderror" placeholder="Nhập đánh giá" name="body" id="body" rows="5">{{ old('body') ?? old('body', $review->body) }}</textarea>

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
									@can('admin.product.review.update')
									<button type="submit" class="btn btn-success">
										<i class="fal fa-check-circle"></i> Lưu
									</button>
									@endcan
									<a href="{{ route('admin.product.review.index', $product->id) }}" class="btn btn-default">
										<i class="fal fa-save"></i> Quay lại
									</a>
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
<style>
	.star.checked i {
		color: #fec35b;
	}

	.star i {
		color: #ccccce;
	}
	.star:hover{
		cursor: pointer;
	}
</style>
@endsection

@section('script')
<script>
	$(".star").click(function() {
		$(this).parents(".form-group").find(".checked").removeClass("checked");
		$(this).addClass("checked");
		$(this)
			.parents(".form-group")
			.find("#rating")
			.val($(this).data("star"));
		// $(this).data("star");
	});
</script>
@stop