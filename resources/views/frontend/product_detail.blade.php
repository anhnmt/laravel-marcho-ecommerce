@php
\Assets::addStyles([
'swiper',
'select2',
'select2-bootstrap4',
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'swiper',
'select2',
'jquery-scrollup',
'custom',
'custom-swiper',
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
                            <h1 class="font-weight-normal">Tất cả sản phẩm</h1>
                            <ul>
                                <li class="mx-1">
                                    <a href="{{ route('home') }}">
                                        <i class="fal fa-home-alt mr-1"></i>Trang chủ
                                    </a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
                                <li class=" mx-1 active">Chi tiết sản phẩm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="login-wrapper all_product_section product_detai_section">
    <div class="container">
        <div class="head_product_detail">
            <div class="row">
                <div class="col-lg-7">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="swiper-container gallery-thumbs" style="height: 500px;">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img loading="lazy" src="{{ asset($product->image) }}" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy" src="{{ asset($product->image) }}" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy" src="{{ asset($product->image) }}" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy" src="{{ asset($product->image) }}" alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy" src="{{ asset($product->image) }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 text-center">
                                    <div class="swiper-container gallery-top" style="height: 500px;">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <img loading="lazy"
                                                    src="{{ asset(str_replace('thumbs/', '', $product->image)) }}"
                                                    alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy"
                                                    src="{{ asset(str_replace('thumbs/', '', $product->image)) }}"
                                                    alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy"
                                                    src="{{ asset(str_replace('thumbs/', '', $product->image)) }}"
                                                    alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy"
                                                    src="{{ asset(str_replace('thumbs/', '', $product->image)) }}"
                                                    alt="">
                                            </div>
                                            <div class="swiper-slide">
                                                <img loading="lazy"
                                                    src="{{ asset(str_replace('thumbs/', '', $product->image)) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <!-- Add Arrows -->
                                        <div class="swiper-button-next swiper-button-white"></div>
                                        <div class="swiper-button-prev swiper-button-white"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <form action="{{ route('cart.store') }}" method="POST">
                        @csrf

                        <h5 class="product_name">{{ $product->name }}</h5>
                        <div class="product_info">
                            <div class="row">
                                <div class="left col-md-6">
                                    @if($product->sale_price)
                                    <p class="product_sale_price d-inline">{{ number_format($product->sale_price, 0) }}đ
                                    </p>
                                    <span class="product_price d-inline">{{ number_format($product->price, 0) }}đ</span>
                                    @else
                                    <p class="product_sale_price d-inline">{{ number_format($product->price, 0) }}đ</p>
                                    <span class="product_price d-inline"></span>
                                    @endif
                                </div>
                                <div class="right d-flex col-md-6 justify-content-end">
                                    <div class="star_rating d-inline">
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                    <span class="product_quantity_review">({{ $reviews->count() }})</span>
                                </div>
                            </div>
                        </div>
                        <div class="product_review mt-4">
                            <p class="title">Mô tả</p>
                            <p class="content">{{ $product->description }}</p>
                        </div>
                        <div class="product-attribute">
                            @if($productAttributes->isNotEmpty())
                            <div class="attribute mt-3">
                                <p class="title">Tùy chọn</p>
                                <div class="form-group">
                                    <select name="productAttribute" id="productAttribute" class="form-control select2">
                                        @foreach($productAttributes as $productAttribute)
                                        <option value="{{ $productAttribute->id }}">
                                            @foreach($productAttribute->attributesValues as $value)
                                            {{ $value->attribute->name }} : {{ ucwords($value->value) }}
                                            @endforeach
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="attribute mt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="title">SKU</p>
                                        <p class="title">Danh mục</p>
                                        <p class="title">Nhãn</p>
                                        <p class="title">Chia sẻ</p>
                                    </div>
                                    <div class="col-8">
                                        <p>{{ $product->sku }}</p>
                                        <p>{{ $product->category->name }}</p>
                                        <p>Thời trang | Đàn ông | Lịch lãm</p>
                                        <p class="product_sharing">
                                            <a href=""><i class="fab fa-facebook-f"></i></a>
                                            <a href=""><i class="fab fa-twitter"></i></a>
                                            <a href=""><i class="fab fa-instagram"></i></a>
                                            <a href=""><i class="fab fa-pinterest-p"></i></a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product_action mt-4">
                            <div class="quantity">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                            <input type="hidden" id="product_quantity"
                                value="{{ $productAttributes->isNotEmpty() ? $productAttributes->first()->quantity : $product->quantity }}">
                            <input type="hidden" name="product" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-fill-out filter_btn">Thêm vào giỏ</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row body_product_detail pt-5">
            <div class="col-12">
                <h3>HOME</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua.</p>
            </div>
        </div>

        @if ($reviews->count() > 0)
        <div class="row blog_details_section">
            <div class="col-12">
                <div class="comment_box">
                    <div class="quantity_comment my-4">
                        <h3>{{ $reviews->count() }} Đánh Giá</h3>
                    </div>

                    <ul class="list_none comment_list">
                        @foreach ($reviews as $review)
                        <li class="comment_info">
                            <div class="d-flex justify-content-between">
                                <div class="comment_user">
                                    <img loading="lazy"
                                        src="{{ asset($review->user->avatar ? $review->user->avatar : 'assets/img/user2-160x160.jpg') }}"
                                        alt="user2" class="rounded-circle">
                                </div>
                                <div class="comment_content">
                                    <div class="d-flex">
                                        <div class="meta_data">
                                            <h6><a href="#">{{ $review->user->name }}</a></h6>

                                            <div class="comment-time">
                                                <div class="star_rating d-inline-block pr-2">
                                                    @switch($review->rating)
                                                    @case(1)
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    @break
                                                    @case(2)
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    @break
                                                    @case(3)
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    @break
                                                    @case(4)
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star"></i>
                                                    @break
                                                    @case(5)
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    @break
                                                    @default
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    <i class="fas fa-star checked"></i>
                                                    @endswitch
                                                </div>

                                                {{ $review->created_at->ago() }}
                                            </div>
                                        </div>
                                    </div>
                                    <p>{{ $review->body }}</p>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <div class="foot_product_detail pt-5" id="review_section">
            <form action="{{ route('product.review.store', $product->id) }}" method="POST">
                @csrf

                <h4 class="title">
                    <span class="underline">Thêm</span> nhận xét của bạn
                </h4>

                <div class="choose_star">
                    <div class="d-inline">
                        <span>Đánh giá</span>
                        <div class="star_rating d-md-inline mt-2 ml-md-5 pl-md-2">
                            <input type="hidden" id="rating" name="rating" value="5">

                            <div class="star d-inline mr-4" data-star="1">
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="star d-inline mr-4" data-star="2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="star d-inline mr-4" data-star="3">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="star d-inline mr-4" data-star="4">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>

                            <div class="star d-inline mr-4 checked" data-star="5">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-review mt-4">
                    <div class="contact_form">
                        <div class="row">
                            <div class="col-lg-12">
                                @if($user ?? '')
                                <div class="form-group form_group">
                                    <img loading="lazy" src="{{asset($user->avatar)}}" width="40px" alt="user4"
                                        class="rounded-circle">
                                    <span>{{ $user->name }}</span>
                                </div>
                                @else
                                <div class="form-group form_group">
                                    <span class="text-danger">Vui lòng đăng nhập để bình luận</span>
                                </div>
                                @endif

                                <div class="form_group">
                                    <textarea class="form_control" placeholder="Đánh giá của bạn..."
                                        name="body"></textarea>
                                </div>

                                <div class="button_box">
                                    <button type="submit" class="btn btn-fill-out">Để lại đánh giá</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="related_products mt-5 pt-5">
            <div class="text-center">
                <h1>Sản phẩm liên quan</h1>
            </div>

            <div class="swiper_related_products swiper-container products mt-5">
                <div class="swiper-wrapper">
                    @foreach($relatedProducts as $product)
                    <div class="swiper-slide product_section">
                        <div class="card">
                            <div class="row">
                                <div class="product_image col-md-4 col-sm-12 col-12">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <img loading="lazy"
                                            src="{{ asset(str_replace('thumbs/', '', $product->image)) }}"
                                            class="card-img card-img-list" alt="">
                                    </a>

                                    <div class="product_item">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <a class="add-wishlist @if($user && $user->favorited($product->id)) active @endif"
                                                data-product="{{ $product->id }}">
                                                <i class="fal fa-heart"></i>
                                            </a>
                                            <a class="add-cart">
                                                <i class="fal fa-shopping-bag"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                    <a href="{{ route('product.show', $product->slug) }}">
                                        <h4 class="card-title">{{ $product->name }}</h4>
                                    </a>
                                    <span class="price mr-5">
                                        @if($product->sale_price)
                                        <span class="new">{{ number_format($product->sale_price, 0) }}đ</span>
                                        <span class="old">{{ number_format($product->price, 0) }}đ</span>
                                        @else
                                        <span class="new">{{ number_format($product->price, 0) }}đ</span>
                                        @endif
                                    </span>
                                    <div class="star_rating d-inline-block">
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star checked"></i>
                                        <i class="fas fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- Add Arrows -->
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>

    </div>
</section>
@stop

@section('script')
<script>
    /*-------------------------------
        Plus and minus quantity
	------------------------------ */
    $(function() {

        $(".plus").on("click", function() {
            var self = this;
            var qty = $(self).closest("div.quantity").find(".qty");
            var maxQty = $('#product_quantity').val();

            if (parseInt(qty.val()) < parseInt(maxQty)) {
                qty.val(+parseInt(qty.val()) + 1);
                $(self).closest("div.quantity").find(".minus").attr("disabled", false);
                //Trigger change event
                qty.trigger("change");
            } else {
                $(self).attr("disabled", true);
            }
        });

        $(".minus").on("click", function() {
            var self = this;

            var qty = $(self).closest("div.quantity").find(".qty");

            if (parseInt(qty.val()) < 2) {
                $(self).attr("disabled", true);
            } else {
                qty.val(+parseInt(qty.val()) - 1);
                $(self).closest("div.quantity").find(".plus").attr("disabled", false);
                //Trigger change event
                qty.trigger("change");
            }
        });

        $(".qty").on("change", debounce(function(e) {
            var self = this;
            var maxQty = $('#product_quantity').val();

            if (parseInt($(self).val()) <= 0 || isNaN($(self).val())) {
                $(self).val(1);
            }

            if (parseInt($(self).val()) > maxQty) {
                $(self).val(maxQty);
            }

            $(".plus").attr("disabled", false);
            $(".minus").attr("disabled", false);
        }, 300));

        $('#productAttribute').on('select2:select', function(e) {
            var data = e.params.data;
            var id = data.id;
            // console.log(id);

            $(".qty").trigger("change");
            $(".plus").attr("disabled", true);
            $(".minus").attr("disabled", true);

            $.ajax({
                "url": "/product-attribute/" + id,
                "method": "GET",
            }).done(function(json) {
                console.log(json);
                $(".plus").attr("disabled", false);
                $(".minus").attr("disabled", false);

                if (json.success === true) {
                    $('#product_quantity').val(json.quantity);
                    if (json.sale_price) {
                        $('.product_sale_price').html(parseInt(json.sale_price).formatMoney(0) + 'đ');
                        $('.product_price').html(parseInt(json.price).formatMoney(0) + 'đ');
                    } else {
                        $('.product_sale_price').html(parseInt(json.price).formatMoney(0) + 'đ');
                        $('.product_price').html('');
                    }
                } else {
                    Swal.fire({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        icon: "error",
                        title: json.msg,
                    });
                }
            });
        });
    });
</script>
@endsection