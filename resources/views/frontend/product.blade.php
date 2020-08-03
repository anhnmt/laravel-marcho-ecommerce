@php
\Assets::addStyles([
'animate',
'bootstrap',
'fontawesome',
'jquery-ui',
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'owlcarousel',
'slick',
'waypoints',
'jquery-scrollup',
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
                            <h1 class="font-weight-normal">Sản phẩm</h1>
                            <ul>
                                <li class="mx-1">
                                    <a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
                                <li class=" mx-1 active">Sản phẩm</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="login-wrapper all_product_section">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-12 col-12 col-lg-4">
                @include('layouts.product_sidebar')
            </div>

            <div class="col-md-8 col-sm-12 col-12 col-lg-8">
                <div class="widget_box search_widget mb-55 option_product">
                    <div class="row">
                        <div class="col-6">
                            <div class="view_icon float-left">
                                <span class="mr-2">View </span>
                                <a href="#/" class="product_grid active product_present"><i class="fas fa-th mr-2"></i></a>
                                <a href="#/" class="product_list product_present"><i class="far fa-list mr-2"></i></a>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <span>Sort By </span>
                            <select class="nice_select">
                                <option value="1">Default</option>
                                <option value="2">Newest</option>
                            </select>
                            <span>Show </span>
                            <select class="nice_select">
                                <option>9</option>
                                <option value="1">12</option>
                                <option value="2">24</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="product_section">
                    <div class="row pb-4">
                        <div class="col-lg-12">
                            <div class="tab-pane fade show active product_grid" id="product-all" role="tabpanel">
                                <div class="row">
                                    @foreach ($products as $product)
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">

                                                    <a href="{{ route('product.show', $product->slug) }}">
                                                        <img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" class="card-img card-img-list" alt="">
                                                    </a>

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
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
                                                        <h4 class="card-title">
                                                            {{ $product->name }}
                                                        </h4>
                                                    </a>
                                                    <span class="price mr-5">
                                                        @if($product->sale_price)
                                                        <span class="new">{{ $product->sale_price }}đ</span>
                                                        <span class="old">{{ $product->price }}đ</span>
                                                        @else
                                                        <span class="new">{{ $product->price }}đ</span>
                                                        @endif
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>{{ $product->description }}</p>
                                                    </div>
                                                    <button class="btn filter_btn">Thêm vào giỏ</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="_pagination d-flex justify-content-center ">
                    {{$products->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection