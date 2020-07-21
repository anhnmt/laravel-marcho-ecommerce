@extends('layouts.admin')

@section('main')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
					<li class="breadcrumb-item"><a href="#/">Người dùng</a></li>
					<li class="breadcrumb-item"><a href="{{ route('admin.role.index') }}">Quyền</a></li>
					<li class="breadcrumb-item active">Chỉnh sửa nhóm quyền</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="create-form" action="{{ route('admin.role.update', $role->id) }}" method="POST">
					@csrf @method('PUT')

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<label class="required" for="name">Tên nhóm quyền</label>
										<input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nhập tên" value="{{$role->name}}">

										@error('name')
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
									<a href="{{ route('admin.role.index') }}" class="btn btn-danger">
										<i class="fal fa-save"></i> Huỷ
									</a>
								</div>
							</div>
						</div>

						<div class="col-lg-12">

							<div class="card">
								<div class="card-body">
									<div class="form-group">
										<div class="row mb-2">
											<label class="required col-lg-4" for="name">Chọn quyền</label>
											<div class="col-lg-4"></div>
											<input id="myInput" class="form-control col-lg-4" placeholder="Search..">
										</div>
										<div class="custom-control custom-switch">
											<input type="checkbox" class="custom-control-input" id="check-all">
											<label class="custom-control-label" for="check-all">Chọn tất cả</label>
										</div>

										<div class="permission-list mt-4" id="myDIV">
											<div class="row">
												@foreach($permissions as $permission)
												<div class="col-lg-3 mb-4">
													<div for="" class="parent-vertical-center" permission="{{$permission->name}}">
														<div class="custom-control custom-switch">
															<input class="custom-control-input" id="{{$permission->id}}" type="checkbox" name="permissions[]" value="{{$permission->name}}" @foreach($permissionsAssigned as $per) {{ $per === $permission->name ? 'checked' : '' }} @endforeach {{ $permission->name == 'admin.dashboard' ? 'disabled' : '' }}>
															<label class="custom-control-label" for="{{$permission->id}}">{{$permission->name}}</label>
														</div>
													</div>
												</div>
												@endforeach
											</div>
										</div>
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
<style>
	label:not(.form-check-label):not(.custom-file-label) {
		font-weight: normal;
	}
</style>
@endsection

@section('script')
<script src="{{ asset('vendor/laravel-filemanager/js/stand-alone-button.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
<script>
	$(function() {
		$('#lfm').filemanager('role');

		$("#myInput").on("keyup", function() {
			var value = $(this).val().toLowerCase();
			$("#myDIV .parent-vertical-center").filter(function() {
				if ($(this).attr('permission').toLowerCase().indexOf(value) > -1) {
					$(this).parents('.col-md-4').show(50);
					$(this).find('input').prop("disabled", false);
				} else {
					$(this).parents('.col-md-4').hide(50);
					$(this).find('input').prop("disabled", true);
				}
			});
		});

		if($('input:checkbox').not("#check-all").prop('checked', true)){
			$('#check-all').prop('checked', true);
		}

		$("#check-all").click(function() {
			$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
@stop