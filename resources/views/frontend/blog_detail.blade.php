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
                                    <a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Home</a>
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

<section class="login-wrapper all_product_section blog_section blog_details_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_wrapper_content">
                    <div class="blog_content mb-50">

                        <div class="blog_meta">
                            <span><i class="fad fa-calendar-alt"></i><a href="#">24 Feb, 2020</a></span>
                            <span><i class="fal fa-user"></i><a href="#">{{ $blog->user->name }}</a></span>

                            <span><i class="fal fa-comment-alt-dots"></i><a href="#">05 Comments</a></span>
                        </div>

                        <h5 class="mb-3">{{ $blog->name }}</h5>

                        {!! $blog->body !!}

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="blog_post_tag mt-20">
                                    <h6>Tags:</h6>
                                    <a href="#" class="d-inline">Digital</a>
                                    <a href="#" class="d-inline">Marketing</a>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="blog_post_share text-lg-right text-md-right mt-20">
                                    <h6>Share:</h6>
                                    <a href="#" class="facebook"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="#" class="linkedin"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#" class="pinterest"><i class="fab fa-pinterest-p"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="author_box mb-50">
                                <div class="author_img">
                                    <img src="assets/img/blog/author_1.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="author_info">
                                    <h4>JOHN DOE</h4>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, culpa! Cum ducimus optio cupiditate quibusdam architecto non, perferendis iste, expedita eos vero illo earum repudiandae rerum, quia exercitationem. Animi, mollitia.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="post_comment_form mt-20">
                                <div class="title">
                                    <h4>Leave Your Comment</h4>
                                </div>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form_group">
                                                <input type="text" class="form_control" placeholder="Name" name="name" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form_group">
                                                <input type="email" class="form_control" placeholder="E-mail" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form_group">
                                                <textarea class="form_control" placeholder="Your comment here" name="message"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="button_box">
                                                <button class="makp_btn">Post Comment</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                @include('layouts.blog_sidebar')
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.nice-select.min.js')}}"></script>
@endsection