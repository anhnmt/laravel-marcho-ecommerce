@php
\Assets::addStyles([
'adminlte'
]);

\Assets::addScripts([
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
								</div>
							</div>
						</div>

						<div class="col-lg-4">
							<div class="card">
								<div class="card-header">
									<h5>Xuất bản</h5>
								</div>

								<div class="card-body">
									@can('admin.user.update')
									<button type="submit" class="btn btn-success">
										<i class="fal fa-check-circle"></i> Lưu
									</button>
									@endcan
									<a href="{{ route('admin.user.index') }}" class="btn btn-default">
										<i class="fal fa-save"></i> Quay lại
									</a>
								</div>
							</div>
						</div>
					</div>
					<div class="card">
						<div class="card-body">
							<div class="form-group clearfix">
								<label for="name">Chọn nhóm quyền</label>
								<div class="row">
									<div class="col-12">
										<div class="card-body">
											<div class="tab-content">
												<div class="tab-pane active" id="tab_1">
													<div class="row">
														<input id="myInput" class="form-control col-lg-4 my-sm-2 my-0" placeholder="Search..">
													</div>
													<div class="role-list mt-4" id="myDIV">
														<div class="row">
															@foreach($roles as $role)
															<div class="col-lg-3 mb-4">
																<div for="" class="parent-vertical-center" role="{{$role->name}}">
																	<div class="custom-control custom-switch">
																		<input class="custom-control-input" id="{{$role->id}}" type="checkbox" name="roles[]" value="{{$role->name}}" @foreach($rolesAssigned as $value) {{$role->name == $value ? 'checked' : ''}} @endforeach>
																		<label class="custom-control-label" for="{{$role->id}}">{{$role->name}}</label>
																	</div>
																</div>
															</div>
															@endforeach
														</div>
													</div>
												</div>
											</div>
										</div><!-- /.card-body -->
									</div>
									<!-- /.col -->
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