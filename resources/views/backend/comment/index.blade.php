@php
\Assets::addStyles([
'datatables-bs4',
'adminlte'
]);

\Assets::addScripts([
'datatables',
'datatables-bs4',
'datatables-responsive',
'datatables-responsive-bs4',
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
					<li class="breadcrumb-item active">Bình luận</li>
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
					<div class="card-body">
						<div class="table-responsive">
							<table id="datatables" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th>ID</th>
										<th>Tên người dùng</th>
										<th>Nội dung</th>
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

@section('script')
<script>
	$(function() {
		$.fn.dataTable.ext.errMode = 'throw';

		$('#datatables').DataTable({
			"paging": true,
			"ordering": true,
			"autoWidth": false,
			"responsive": true,
			"serverSide": true,
			"ajax": "{{ route('admin.comment.list', $blog->id) }}",
			"order": [
				[0, 'desc']
			],
			"columns": [{
					data: 'id',
					className: 'align-middle text-center',
				},
				{
					data: 'user',
					className: 'align-middle',
				},
				{
					data: 'body',
					className: 'align-middle',
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