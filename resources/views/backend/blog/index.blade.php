@extends('layouts.admin')

@section('main')
<div class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Bảng điều khiển</a></li>
					<li class="breadcrumb-item active">Bài viết</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					@can('admin.blog.create')
					<div class="card-header">
						<h3 class="card-title">
							<a href="{{ route('admin.blog.create') }}" class="btn btn-primary">Thêm bài viết</a>
						</h3>
					</div>
					@endcan
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatables" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Ảnh</th>
										<th>Tên</th>
										<th>Đường dẫn</th>
										<th>Trạng thái</th>
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
			"ajax": "{{ route('admin.blog.list') }}",
			"columns": [{
					data: 'id',
					className: 'align-middle text-center',
				},
				{
					data: 'image',
					className: 'align-middle text-center',
					orderable: false,
					searchable: false
				},
				{
					data: 'name',
					className: 'align-middle',
				},
				{
					data: 'slug',
					className: 'align-middle',
				},
				{
					data: 'status',
					className: 'align-middle text-center',
				},
				{
					data: 'action',
					className: 'align-middle text-center',
					orderable: false,
					searchable: false
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