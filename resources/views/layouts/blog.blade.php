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
                            <h1 class="font-weight-normal">Tin tức</h1>
                            <ul>
                                <li class="mx-1">
                                    <a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
                                <li class=" mx-1 active">Tin tức</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="login-wrapper all_product_section blog_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                @yield('blog')
            </div>
            <div class="col-lg-4">
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
                    <div class="widget_box search_widget mb-55 text-center">
                        <div class="admin_box">
                            <img src="{{asset('assets/img/admin_1.jpg')}}" class="img-fluid" alt="">
                            <p>Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed
                                fringilla mauris sit</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fab fa-pinterest-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-3 head_sidebar">MỚI ĐĂNG</h4>
                        <div class="post_wrapper">
                            @foreach ($latest_blog as $blog)
                            <div class="post_list">
                                <div class="row no-gutters">
                                    <div class="col-4 pr-2 post_img">
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            <img src="{{ asset(str_replace('thumbs/', '', $blog->image)) }}" class="img-fluid" alt="{{ $blog->name }}">
                                        </a>
                                    </div>
                                    <div class="col-8 post_info">
                                        <p>
                                            <i class="fad fa-calendar-alt"></i>
                                            {{ $blog->created_at->diffForHumans() }}
                                        </p>
                                        <h3 class="post_title"><a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->name }}</a></h3>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="widget_box search_widget mb-55">
                        <h4 class="mb-4 head_sidebar">CATEGORY</h4>
                        <div class="product_category">
                            <ul class="list-group">
                                <li class="list-group-item mt-2">
                                    <div class="row">
                                        <span class="col-md-6">Woman</span>
                                        <span class="text-md-right col-md-6">48</span>
                                    </div>
                                </li>
                                <li class="list-group-item mt-2">
                                    <div class="row">
                                        <span class="col-md-6">Man</span>
                                        <span class="text-md-right col-md-6">69</span>
                                    </div>
                                </li>
                                <li class="list-group-item mt-2 active">
                                    <div class="row">
                                        <span class="col-md-6">Sale Products</span>
                                        <span class="text-md-right col-md-6">92</span>
                                    </div>
                                </li>
                                <li class="list-group-item mt-2">
                                    <div class="row">
                                        <span class="col-md-6">Fashion</span>
                                        <span class="text-md-right col-md-6">121</span>
                                    </div>
                                </li>
                                <li class="list-group-item mt-2">
                                    <div class="row">
                                        <span class="col-md-6">Hot Dresses</span>
                                        <span class="text-md-right col-md-6">52</span>
                                    </div>
                                </li>
                                <li class="list-group-item mt-2">
                                    <div class="row">
                                        <span class="col-md-6">Accessories</span>
                                        <span class="text-md-right col-md-6">83</span>
                                    </div>
                                </li>
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
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
@endsection