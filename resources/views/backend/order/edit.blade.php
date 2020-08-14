@php
\Assets::addStyles([
'select2',
'select2-bootstrap4',
'adminlte'
]);

\Assets::addScripts([
'select2',
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
					<li class="breadcrumb-item"><a href="{{ route('admin.order.index') }}">Đơn hàng</a></li>
					<li class="breadcrumb-item active">Sửa đơn hàng</li>
				</ol>
			</div>
		</div>
	</div>
</div>

<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<form id="edit-form" action="{{ route('admin.order.update', $order->id) }}" method="POST">
					@csrf
					@method('PUT')

					<div class="row">
						<div class="col-lg-8">
							<div class="card">
								<div class="card-header">
									<h5>Thông tin người đặt</h5>
								</div>
								<div class="card-body">
									<div class="user_info row">
										<span for=""
											class="font-weight-bold col-4 d-flex align-items-center">Tên:</span>
										<span class="col-8 d-flex align-items-center">{{$order->orderUser->name}}</span>
									</div>
									<div class="user_info row mt-3">
										<span for=""
											class="font-weight-bold col-4 d-flex align-items-center">Email:</span>
										<span
											class="col-8 d-flex align-items-center">{{$order->orderUser->email}}</span>
									</div>
									<div class="user_info row mt-3">
										<span for="" class="font-weight-bold col-4 d-flex align-items-center">Số điện
											thoại:</span>
										<span class="col-8 d-flex align-items-center">{{$order->phone}}</span>
									</div>
									<div class="user_info row mt-3">
										<span for="" class="font-weight-bold col-4 d-flex align-items-center">Địa
											chỉ:</span>
										<span class="col-8 d-flex align-items-center">{{$order->fullAddress}}</span>
									</div>
									<div class="user_info row mt-3">
										<span for="" class="font-weight-bold col-4 d-flex align-items-center">Lời
											nhắn:</span>
										<span
											class="col-8 d-flex align-items-center">{{$order->note ?? 'Không có lời nhắn'}}</span>
									</div>
									<div class="user_info row mt-3">
										<span class="font-weight-bold col-4 d-flex align-items-center">Ngày
											đặt:</span>
										<span class="col-8 d-flex align-items-center">{{ $order->created_at }}</span>
									</div>
								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<h5>Chi tiết đơn hàng</h5>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
														<th>Ảnh</th>
														<th>Tên sản phẩm</th>
														<th>Số lượng</th>
														<th>Tổng tiền</th>
													</tr>
												</thead>
												@foreach ($orderDetails as $orderDetail)
												<tbody>
													<tr>
														<td class="product-thumbnail">
															<a href="#">
																<img src="{{ asset(str_replace('thumbs/', '', $orderDetail->product->image)) }}"
																	alt="product1" width="70px" height="70px">
															</a>
														</td>
														<td>
															{{$orderDetail->product->name}}
															@if ($orderDetail->productAttribute)
															<p>
																@foreach($orderDetail->productAttribute->attributesValues as
																$option)
																<span class="badge badge-danger">
																	{{ $option->code }}
																</span>
																@endforeach
															</p>
															@endif
														</td>
														<td>{{ $orderDetail->quantity }}</td>
														<td>{{ number_format($orderDetail->price, 0) }}đ</td>
													</tr>
												</tbody>
												@endforeach
											</table>
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
									@can('admin.order.update')
									<button type="submit" class="btn btn-success">
										<i class="fal fa-check-circle"></i> Lưu
									</button>
									@endcan
									<a href="{{ route('admin.order.index') }}" class="btn btn-default">
										<i class="fal fa-save"></i> Quay lại
									</a>
								</div>
							</div>

							<div class="card">
								<div class="card-header">
									<h5>Đơn hàng #{{ $order->id }}</h5>
								</div>

								<div class="card-body">
									<div class="form-group">
										<label for="">Trạng thái đơn hàng</label>
										<select class="form-control select2" name="status">
											<option value="0" {{ $order->status == 0 ? 'selected' : '' }} {{ $order->status > 0 ? 'disabled' : '' }}>Đang xử lí</option>
											<option value="1" {{ $order->status == 1 ? 'selected' : '' }} {{ $order->status > 1 ? 'disabled' : '' }}>Đã xử lí</option>
											<option value="2" {{ $order->status == 2 ? 'selected' : '' }} {{ $order->status > 2 ? 'disabled' : '' }}>Đang giao hàng</option>
											<option value="3" {{ $order->status == 3 ? 'selected' : '' }}>Đã giao hàng</option>
										</select>
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
		$('.select2').select2();
	})
</script>
@stop