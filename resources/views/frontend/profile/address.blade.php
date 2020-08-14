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
'stand-alone-button',
'jquery-scrollup',
'custom',
'custom-select2',
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
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                @include('layouts.profile_sidebar')
            </div>

            <div class="col-lg-9 col-md-8 mt-md-0 mt-5">
                <div class="tab-content dashboard_content">
                    <div class="card">
                        <div class="card-header">
                            <h3>Địa chỉ của bạn</h3>
                            <span>Cung cấp địa chỉ thuận tiện cho việc mua sắm</span>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('user.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')

                                @if(isset($user->fullAddress))
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="">Tỉnh/Thành phố</label>
                                            <select class="form-control coupon_code_input select2 @error('city_id') is-invalid @enderror" name="city_id" id="cities">
                                                <option value="0">--Tỉnh/Thành phố--</option>

                                                @foreach ($cities as $city)
                                                <option value="{{$city->id}}" {{ (old('city_id') ?? old('city_id', $user->city_id)) == $city->id ? 'selected' : '' }}>
                                                    {{$city->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('city_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Quận/Huyện</label>
                                            <select class="form-control select2 @error('district_id') is-invalid @enderror" name="district_id" id="districts">
                                                <option value="0">--Quận/Huyện--</option>

                                                @foreach ($districts as $district)
                                                <option value="{{$district->id}}" {{ (old('district_id') ?? old('district_id', $user->district_id)) == $district->id ? 'selected' : '' }}>
                                                    {{$district->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('district_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Xã/Phường</label>
                                            <select class="form-control select2 @error('ward_id') is-invalid @enderror" name="ward_id" id="wards">
                                                <option value="0">--Xã/Phường--</option>

                                                @foreach ($wards as $ward)
                                                <option value="{{$ward->id}}" {{(old('ward_id') ?? old('ward_id', $user->ward_id)) == $ward->id ? 'selected' : ''}}>
                                                    {{$ward->name}}</option>
                                                @endforeach
                                            </select>

                                            @error('ward_id')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="">Địa chỉ</label>
                                            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Nhập địa chỉ của bạn ..." aria-describedby="helpId" value="{{ old('address') ?? old('address', $user->address) }}" name="address">

                                            @error('address')
                                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-fill-out">Sửa địa chỉ</button>
                                        </div>

                                    </div>
                                </div>
                                @else
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="user_address">
                                            <div class="alert m-0" role="alert">
                                                <p class="mb-3">
                                                    Bạn hiện chưa đăng kí địa chỉ...
                                                </p>
                                                <div class="form-group @error('city_id') is-invalid @enderror">
                                                    <label for="">Tỉnh/Thành phố</label>
                                                    <select class="form-control coupon_code_input select2 @error('city_id') is-invalid @enderror" name="city_id" id="cities">
                                                        <option value="0">--Tỉnh/Thành phố--</option>

                                                        @foreach ($cities as $city)
                                                        <option value="{{$city->id}}" {{(old('city_id') ?? old('city_id', $user->city_id)) == $city->id ? 'selected' : ''}}>
                                                            {{$city->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('city_id')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group @error('district_id') is-invalid @enderror">
                                                    <label for="">Quận/Huyện</label>
                                                    <select class="form-control select2 @error('district_id') is-invalid @enderror" name="district_id" id="districts">
                                                        <option value="0">--Quận/Huyện--</option>

                                                        @foreach ($districts as $district)
                                                        <option value="{{$district->id}}" {{(old('district_id') ?? old('district_id', $user->district_id)) == $district->id ? 'selected' : ''}}>
                                                            {{$district->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('district_id')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group @error('ward_id') is-invalid @enderror">
                                                    <label for="">Xã/Phường</label>
                                                    <select class="form-control select2 @error('ward_id') is-invalid @enderror" name="ward_id" id="wards">
                                                        <option value="0">--Xã/Phường--</option>

                                                        @foreach ($wards as $ward)
                                                        <option value="{{$ward->id}}" {{(old('ward_id') ?? old('ward_id', $user->ward_id)) == $ward->id ? 'selected' : ''}}>
                                                            {{$ward->name}}</option>
                                                        @endforeach
                                                    </select>

                                                    @error('ward_id')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="">Địa chỉ</label>
                                                    <input type="text" class="form-control coupon_code_input @error('address') is-invalid @enderror" placeholder="Nhập địa chỉ của bạn ..." aria-describedby="helpId" value="{{ old('address') ?? old('address', $user->address) }}" name="address">

                                                    @error('address')
                                                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-fill-out">Lưu địa chỉ</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </form>
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