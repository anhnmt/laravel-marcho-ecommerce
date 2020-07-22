@extends('layouts.admin')

@section('main')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
					<li class="breadcrumb-item"><a href="#/">Người dùng</a></li>
					<li class="breadcrumb-item active">Chỉnh sửa quyền của người dùng</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="create-form" action="{{ route('admin.user.update', $user->id) }}" method="POST">
					@csrf @method('PUT')

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label class="required" for="name">Tên người dùng</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nhập tên" value="{{$user->name}}" disabled>
									</div>
									<div class="form-group clearfix">
										<label for="name">Chọn nhóm quyền</label>
										<div class="row">
											<div class="col-12">
												<!-- Custom Tabs -->
												<div class="card">
													<div class="card-header d-flex p-0">
														<ul class="nav nav-pills p-2">
															<li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">Nhóm quyền</a></li>
															<li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Quyền</a></li>
														</ul>
													</div><!-- /.card-header -->
													<div class="card-body">
														<div class="tab-content">
															<div class="tab-pane active" id="tab_1">
																
															</div>
															<!-- /.tab-pane -->
															<div class="tab-pane" id="tab_2">
																The European languages are members of the same family. Their separate existence is a myth.
																For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
																in their grammar, their pronunciation and their most common words. Everyone realizes why a
																new common language would be desirable: one could refuse to pay expensive translators. To
																achieve this, it would be necessary to have uniform grammar, pronunciation and more common
																words. If several languages coalesce, the grammar of the resulting language is more simple
																and regular than that of the individual languages.
															</div>
															<!-- /.tab-pane -->
														</div>
														<!-- /.tab-content -->
													</div><!-- /.card-body -->
												</div>
												<!-- ./card -->
											</div>
											<!-- /.col -->
										</div>
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
									<a href="{{ route('admin.user.index') }}" class="btn btn-danger">
										<i class="fal fa-save"></i> Huỷ
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
	#th_firstchild {
		vertical-align: middle;
		position: relative;
	}

	#th_firstchild .form-check-input {
		top: 50%;
		transform: translateY(-50%);
	}

	#th_firstchild {
		border-bottom: 1px solid #dee2e6;
		padding-bottom: 11px;
	}
</style>

@endsection

@section('script')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
	$(function() {
		$('#lfm').filemanager('user');
	});
</script>
@stop