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
					<li class="breadcrumb-item"><a href="{{ route('admin.blog.comment.index', $blog->id) }}">Đánh giá</a></li>
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
				<form id="edit-form" action="{{ route('admin.blog.comment.update', [$blog->id, $comment->id]) }}" method="POST">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label class="required" for="body">Đánh giá</label>
										<textarea class="form-control @error('body') is-invalid @enderror" placeholder="Nhập đánh giá" name="body" id="body" rows="5">{{ old('body') ?? old('body', $comment->body) }}</textarea>

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
									@can('admin.blog.comment.update')
									<button type="submit" class="btn btn-success">
										<i class="fal fa-check-circle"></i> Lưu
									</button>
									@endcan
									<a href="{{ route('admin.blog.comment.index', $blog->id) }}" class="btn btn-default">
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