@php
\Assets::addStyles([
'font-roboto-quicksand',
'select2',
'select2-bootstrap4',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'select2',
'custom-select2',
'custom',
]);
@endphp

@extends('layouts.master')

@section('main')
<div class="custom-container">
    <section class="makp_breadcrumb bg_image">
        <div class="banner">
            <div class="bg_overlay"></div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb_content text-center">
                            <h1 class="font-weight-normal">Trang cá nhân</h1>
                            <ul>
                                <li class="mx-1">
                                    <a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
                                <li class=" mx-1 active">Trang cá nhân</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="profile_section my-5 py-5">
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 mb-5">
                    <div class="dashboard_menu">
                        @include('layouts.profile_sidebar')
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tab-content dashboard_content mb-5">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h5>Đơn hàng #{{$order->id}}</h5>
                                                <span class="order_detail_title">Ngày đặt: {{$order->created_at}}</span>
                                                <span class="d-block order_detail_title">
                                                    Trạng thái:
                                                    @if ($order->status == 0)
                                                    {{'Đang xử lí'}}
                                                    @elseif($order->status == 1)
                                                    {{'Đã xử lí'}}
                                                    @elseif($order->status == 2)
                                                    {{'Đang giao hàng'}}
                                                    @elseif($order->status == 3)
                                                    {{'Đã giao hàng'}}
                                                    @else
                                                    {{'Đã huỷ'}}
                                                    @endif
                                                </span>
                                            </div>
                                            <div class="col-lg-6 d-flex align-items-center justify-content-end">
                                                <h5><span class="order_detail_title">Tổng cộng: </span>
                                                    {{ number_format($order->total, 0) }}đ</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content dashboard_content mb-5">
                        <div class="card">
                            <div class="card-header">
                                <h3>Chi tiết đơn hàng</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
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
                                                            alt="product1">
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
                                                <td class="font-weight-bold">
                                                    {{ number_format($orderDetail->price, 0) }}đ</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            @if($order->status == 0)
                            <div class="card-footer text-right">
                                <form action="{{ route('user.order.cancel', $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="4">
                                    <button type="submit" class="btn btn-fill-line">Huỷ đơn hàng</button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="tab-content dashboard_content mb-5">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h3>Thông tin người đặt</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="user_info">
                                            <span class=" d-flex align-items-center">{{auth()->user()->name}}</span>
                                        </div>
                                        <div class="user_info mt-3">
                                            <span class=" d-flex align-items-center">{{auth()->user()->email}}</span>
                                        </div>
                                        <div class="user_info mt-3">
                                            <span class=" d-flex align-items-center">{{$order->phone}}</span>
                                        </div>
                                        <div class="user_info mt-3">
                                            <span class=" d-flex align-items-center">{{$order->fullAddress}}</span>
                                        </div>
                                        @if ($order->status == 0)
                                        <!-- Button trigger modal -->
                                        <div class="text-right mt-4">
                                            <button type="button" class="btn btn-fill-out" data-toggle="modal"
                                                data-target="#exampleModal">
                                                Sửa
                                            </button>
                                        </div>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('user.order.update', $order->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('put')
                                                        <div class="modal-header">
                                                            <h3 class="modal-title" id="exampleModalLabel">Chỉnh sửa
                                                                thông tin
                                                                người
                                                                đặt</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Tên</label>
                                                                <input type="text" class="form-control"
                                                                    placeholder="Nhập tên của bạn ..."
                                                                    aria-describedby="helpId"
                                                                    value="{{auth()->user()->name}}" name="name"
                                                                    disabled>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Email</label>
                                                                <input type="email" class="form-control"
                                                                    placeholder="Nhập email của bạn ..."
                                                                    aria-describedby="helpId"
                                                                    value="{{auth()->user()->email}}" name="email"
                                                                    disabled>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Số điện thoại</label>
                                                                <input type="text"
                                                                    class="form-control @error('phone') is-invalid @enderror"
                                                                    placeholder="Nhập số điện thoại của bạn ..."
                                                                    aria-describedby="helpId" name="phone"
                                                                    value="{{ old('phone') ?? old('phone', $order->phone) }}">

                                                                @error('phone')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group @error('city_id') is-invalid @enderror">
                                                                <label for="">Tỉnh/Thành phố</label>
                                                                <select
                                                                    class="form-control select2 @error('city_id') is-invalid @enderror"
                                                                    name="city_id" id="cities">
                                                                    <option value="0">--Tỉnh/Thành phố--</option>

                                                                    @foreach ($cities as $city)
                                                                    <option value="{{$city->id}}"
                                                                        {{(old('city_id') ?? old('city_id', $order->city_id)) == $city->id ? 'selected' : ''}}>
                                                                        {{$city->name}}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('city_id')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group @error('district_id') is-invalid @enderror">
                                                                <label for="">Quận/Huyện</label>
                                                                <select
                                                                    class="form-control select2 @error('district_id') is-invalid @enderror"
                                                                    name="district_id" id="districts">
                                                                    <option value="0">--Quận/Huyện--</option>

                                                                    @foreach ($districts as $district)
                                                                    <option value="{{$district->id}}"
                                                                        {{(old('district_id') ?? old('district_id', $order->district_id)) == $district->id ? 'selected' : ''}}>
                                                                        {{$district->name}}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('district_id')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group @error('ward_id') is-invalid @enderror">
                                                                <label for="">Xã/Phường</label>
                                                                <select
                                                                    class="form-control select2 @error('ward_id') is-invalid @enderror"
                                                                    name="ward_id" id="wards">
                                                                    <option value="0">--Xã/Phường--</option>

                                                                    @foreach ($wards as $ward)
                                                                    <option value="{{$ward->id}}"
                                                                        {{(old('ward_id') ?? old('ward_id', $order->ward_id)) == $ward->id ? 'selected' : ''}}>
                                                                        {{$ward->name}}</option>
                                                                    @endforeach
                                                                </select>

                                                                @error('ward_id')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="">Địa chỉ</label>
                                                                <input type="text"
                                                                    class="form-control @error('address') is-invalid @enderror"
                                                                    placeholder="Nhập địa chỉ của bạn ..."
                                                                    aria-describedby="helpId"
                                                                    value="{{ old('address') ?? old('address', $order->address) }}"
                                                                    name="address">

                                                                @error('address')
                                                                <span class="invalid-feedback"
                                                                    role="alert">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="" class="required">Lời nhắn</label>
                                                                <textarea class="form-control" name="note" rows="5"
                                                                    placeholder="Ghi chú của bạn...">{{$order->note}}</textarea>
                                                            </div>
                                                        </div>

                                                        <div class="modal-footer">
                                                            <button class="btn btn-fill-line" data-dismiss="modal">Quay
                                                                lại</button>
                                                            <button type="submit" class="btn btn-fill-out">Lưu thay
                                                                đổi</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mt-md-0 mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>Tổng cộng</h4>
                                        <div class="sub-total-head">
                                            <div class="sub_total">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span>Tạm tính</span>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <span>{{number_format($order->total, 0)}}đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="sub_total">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <span>Phí vận chuyển</span>
                                                    </div>
                                                    <div class="col-6 text-right">
                                                        <span>0đ</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-total-foot mt-2">
                                            <div class="sub_total mb-3">
                                                <div class="row">
                                                    <div class="col-8">
                                                        <h6>Tổng cộng(Bao gồm VAT)</h6>
                                                    </div>
                                                    <div class="col-4 text-right">
                                                        <h6>{{number_format($order->total, 0)}}đ</h6>
                                                    </div>
                                                </div>
                                            </div>

                                            <span class="pt-5 mt-5">Thanh toán bằng hình thức
                                                <h6 class="d-inline">Thanh toán khi nhận hàng</h6>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script>
    $("#cities").on('change', function(e) {
		e.preventDefault();
		var id = $(this).val();
		$.ajax({
			url: "{{ route('checkout.districts') }}",
			method: 'POST',
			data: {
				id: id,
			},
			success: function(data) {
				$('#districts').find('option:not(:first)').remove();
				$('#wards').find('option:not(:first)').remove();
				$.each(data, function(key, value) {
					$("#districts").append(
						"<option value=" + value.id + ">" + value.name + "</option>"
					);
				});
			}
		});
	});

	$("#districts").on('change', function(e) {
		e.preventDefault();
		var id = $(this).val();
		$.ajax({
			url: "{{ route('checkout.wards') }}",
			method: 'POST',
			data: {
				id: id,
			},
			success: function(data) {
				$('#wards').find('option:not(:first)').remove();
				$.each(data, function(key, value) {
					$("#wards").append(
						"<option value=" + value.id + ">" + value.name + "</option>"
					);
				});
			}
		});
	});
</script>
@endsection