@extends('layouts.master')

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/nice-select.css') }}">
@endsection

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
                                    <a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Home</a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
                                <li class=" mx-1 active">Shop</li>
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
                <div class="makp_sidebar product_sidebar">
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-4 head_sidebar">SEARCH</h4>
                        <form>
                            <div class="form_group">
                                <input type="text" class="form_control" placeholder="Enter your keyword...">
                                <button class="search_btn"><i class="fal fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-5 head_sidebar">PRICE FILTER</h4>
                        <div class="price-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="0" data-max="999">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                    style="left: 0%;"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"
                                    style="left: 100%;"></span>
                                <div class="ui-slider-range ui-corner-all ui-widget-header"
                                    style="left: 0%; width: 100%;"></div>
                            </div>
                            <div class="range-slider pd-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="price-input pt-1">
                                            <p>Price: <span id="minamount"> </span> - <span id="maxamount"> </span> </p>
                                        </div>
                                    </div>
                                    <div class="col-md-6 d-flex justify-content-end">
                                        <button class="btn filter_btn">FILTER</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-3 head_sidebar">COLOR FILTER</h4>
                        <div class="color_filter">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="row active">
                                        <div class="col-md-6 col-sm-6">
                                            <p>Blue(15)</p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                                            <label for=""></label>
                                        </div>
                                    </div>

                                </li>
                                <li class="list-group-item">
                                    <div class="row active">
                                        <div class="col-md-6 col-sm-6">
                                            <p>Red(09)</p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                                            <label for="" id="red"></label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row active">
                                        <div class="col-md-6 col-sm-6">
                                            <p>Green(28)</p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                                            <label for="" id="green"></label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row active">
                                        <div class="col-md-6 col-sm-6">
                                            <p>Orange(11)</p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                                            <label for="" id="orange"></label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row active">
                                        <div class="col-md-6 col-sm-6">
                                            <p>Black(05)</p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                                            <label for="" id="black"></label>
                                        </div>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-6">
                                            <p>Purple(21)</p>
                                        </div>
                                        <div class="col-md-6 col-sm-6 d-flex justify-content-end sidebar_color">
                                            <label for="" id="purple"></label>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-4 head_sidebar">SIZE FILTER</h4>
                        <div class="size_filter mt-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label _highlight">
                                            <input type="checkbox" class="form-check-input input_size" name="" id=""
                                                value="checkedValue" checked>
                                            <span class="checkmark"></span>
                                            X-small
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input input_size" name="" id=""
                                                value="checkedValue">
                                            <span class="checkmark"></span>
                                            Small
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input input_size" name="" id=""
                                                value="checkedValue">
                                            <span class="checkmark"></span>
                                            Medium
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input input_size" name="" id=""
                                                value="checkedValue">
                                            <span class="checkmark"></span>
                                            Large
                                        </label>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="form-check">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input input_size" name="" id=""
                                                value="checkedValue">
                                            <span class="checkmark"></span>
                                            XXl
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-4 head_sidebar">CATEGORY</h4>
                        <div class="product_category">
                            <ul class="list-group">
                                @foreach($categories as $category)
                                <li class="list-group-item mt-2">
                                    <a href="#/">
                                        <div class="row">
                                            <span class="col-md-6">{{$category->name}}</span>
                                            <span class="text-md-right col-md-6">{{$category->products->count()}}</span>
                                        </div>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-4 head_sidebar">Popular Tags</h4>
                        <div class="pop_tags">
                            <span class="_tags mb-2 mr-2">Sweet shirt</span>
                            <span class="_tags mb-2 mr-2 active">Man Accessories</span>
                            <span class="_tags mb-2 mr-2">Fashion</span>
                            <span class="_tags mb-2 mr-2">Polo</span>
                            <span class="_tags mb-2 mr-2">T-shirt</span>
                            <span class="_tags mb-2 mr-2">Jewellery</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-12 col-lg-8">
                <div class="widget_box search_widget mb-55 option_product">
                    <div class="row">
                        <div class="col-6">
                            <div class="view_icon float-left">
                                <span class="mr-2">View </span>
                                <a href="#/" class="product_grid active product_present"><i
                                        class="fas fa-th mr-2"></i></a>
                                <a href="#/" class="product_list product_present"><i class="far fa-list mr-2"></i></a>
                            </div>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <span>Sort By </span>
                            <select>
                                <option value="1">Default</option>
                                <option value="2">Newest</option>
                            </select>
                            <span>Show </span>
                            <select>
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
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="product_grid_item col-12 mb-55">
                                        <div class="card">
                                            <div class="row">
                                                <div class="product_image col-md-4 col-sm-12 col-12">
                                                    <img src="{{ asset('assets/img/product/product_1.jpg') }}"
                                                        class="card-img card-img-list" alt="">

                                                    <div class="product_item">
                                                        <div class="d-flex align-items-center justify-content-center">
                                                            <a class="add-wishlist">
                                                                <i class="fal fa-heart"></i>
                                                            </a>
                                                            <a class="add-cart">
                                                                <i class="fal fa-shopping-bag"></i>
                                                            </a>
                                                            <a class="product-search">
                                                                <i class="fal fa-search"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product_info card-body col-md-8 col-sm-12 col-12 pl-4 pr-5">
                                                    <h4 class="card-title"><a href="">Baby Girls Dress Designs</a></h4>
                                                    <span class="price mr-5">
                                                        <span class="new">$79.99</span>
                                                        <span class="old">$99.99</span>
                                                    </span>
                                                    <div class="star_rating d-inline-block">
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star checked"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="product_description">
                                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                                            Eveniet at ullam earum velit</p>
                                                    </div>
                                                    <button class="btn filter_btn">Add to cart</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="_pagination">
                    <ul class="pagination d-flex justify-content-lg-center pt-4">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection