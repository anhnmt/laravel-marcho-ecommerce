@extends('layouts.admin')

@section('main')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
					<li class="breadcrumb-item active">Giá trị thuộc tính</li>
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
					@if($attribute_value ?? '')
					<form id="create-form" action="{{ route('admin.attribute.value.update', [ $attribute, $attribute_value ]) }}" method="POST">
						@csrf
						@method('PUT')

						<div class="card-body">
							<div class="form-group">
								<label class="required" for="value">Giá trị</label>
								<input type="text" class="form-control @error('value') is-invalid @enderror" name="value" id="value" placeholder="Nhập giá trị" value="{{ $attribute_value->value }}">

								@error('value')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="code">Code (Để trống sẽ tự động tạo)</label>
								<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="Nhập dường dẫn" value="{{ $attribute_value->code }}">

								@error('code')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>

							@can('admin.attribute.value.update')
							<button type="submit" class="btn btn-success">
								<i class="fal fa-check-circle"></i> Lưu
							</button>
							@endcan
							<a href="{{ route('admin.attribute.index') }}" class="btn btn-default">
								<i class="fal fa-save"></i> Quay lại
							</a>
						</div>
					</form>
					@else
					<form id="create-form" action="{{ route('admin.attribute.value.store', $attribute->id) }}" method="POST">
						@csrf
						<div class="card-body">
							<div class="form-group">
								<label class="required" for="value">Giá trị</label>
								<input type="text" class="form-control @error('value') is-invalid @enderror" name="value" id="value" placeholder="Nhập giá trị">

								@error('value')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>

							<div class="form-group">
								<label for="code">Code (Để trống sẽ tự động tạo)</label>
								<input type="text" class="form-control @error('code') is-invalid @enderror" name="code" id="code" placeholder="Nhập dường dẫn">

								@error('code')
								<span class="invalid-feedback" role="alert">{{ $message }}</span>
								@enderror
							</div>

							@can('admin.attribute.value.store')
							<button type="submit" class="btn btn-success">
								<i class="fal fa-check-circle"></i> Lưu
							</button>
							@endcan
							<a href="{{ route('admin.attribute.index') }}" class="btn btn-default">
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
										<th>Giá trị</th>
										<th>Code</th>
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

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
@stop

@section('script')
<!-- DataTables -->
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<!-- SweetAlert2 -->
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>

@if(session('success'))
<script>
	$(function() {
		Swal.fire({
			toast: true,
			position: "top-end",
			showConfirmButton: false,
			timer: 3000,
			icon: "success",
			title: "{{ session('success') }}",
		});
	});
</script>
@endif

<script>
	$.fn.dataTable.ext.errMode = 'throw';

	$(function() {
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		$('#datatables').DataTable({
			"paging": true,
			"ordering": true,
			"autoWidth": false,
			"responsive": true,
			"serverSide": true,
			"ajax": "{{ route('admin.attribute.value.list', $attribute->id) }}",
			"columns": [{
					data: 'id',
					className: 'align-middle text-center',
				},
				{
					data: 'value',
					className: 'align-middle',
				},
				{
					data: 'code',
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