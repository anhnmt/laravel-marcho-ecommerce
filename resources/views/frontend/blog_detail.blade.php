@php
\Assets::addStyles([
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'select2',
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

<section class="login-wrapper all_product_section blog_section blog_details_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_wrapper_content">
                    <div class="blog_content mb-50">

                        <div class="blog_meta">
                            <span>
                                <i class="fad fa-calendar-alt"></i>
                                <a href="#">
                                    {{ $blog->created_at->format('d-m-Y') }}
                                </a>
                            </span>
                            <span><i class="fal fa-user"></i><a href="#">{{ $blog->user->name }}</a></span>

                            <span>
                                <i class="fal fa-comment-alt-dots"></i>
                                <a href="#comment_section">
                                    {{ $comments->count() }} Bình Luận
                                </a>
                            </span>
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
                                    <img loading="lazy" src="{{asset('assets/img/user1-128x128.jpg')}}" class="img-fluid" alt="">
                                </div>
                                <div class="author_info">
                                    <h4>JOHN DOE</h4>
                                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officia, culpa! Cum
                                        ducimus optio cupiditate quibusdam architecto non, perferendis iste, expedita
                                        eos vero illo earum repudiandae rerum, quia exercitationem. Animi, mollitia.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if ($comments->count() > 0)
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="comment_box mb-50">
                                <div class="quantity_comment my-4">
                                    <h3>{{ $comments->count() }} Bình Luận</h3>
                                </div>

                                <ul class="list_none comment_list">
                                    @foreach ($comments as $comment)
                                    <li class="comment_info">
                                        <div class="d-flex justify-content-between">
                                            <div class="comment_user">
                                                <img loading="lazy" src="{{ asset($comment->user->avatar ? $comment->user->avatar : 'assets/img/user2-160x160.jpg') }}" alt="user2" class="rounded-circle">
                                            </div>
                                            <div class="comment_content">
                                                <div class="d-flex">
                                                    <div class="meta_data">
                                                        <h6><a href="#">{{ $comment->user->name }}</a></h6>
                                                        <div class="comment-time">{{ $comment->created_at->ago() }}</div>
                                                    </div>
                                                    <div class="ml-auto">
                                                        <a href="#" class="comment-reply"><i class="fas fa-reply-all"></i>Reply</a>
                                                    </div>
                                                </div>
                                                <p>{{ $comment->body }}</p>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif

                    <div class="row" id="comment_section">
                        <div class="col-lg-12">
                            <div class="post_comment_form mt-20">
                                <div class="title">
                                    <h4>Để lại bình luận của bạn</h4>
                                </div>
                                <form action="{{ route('blog.comment.store', $blog->id) }}" method="POST">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-12">
                                            @if($user ?? '')
                                            <div class="form-group form_group">
                                                <img loading="lazy" src="{{asset($user->avatar)}}" width="40px" alt="user4" class="rounded-circle">
                                                <span>{{ $user->name }}</span>
                                            </div>
                                            @else
                                            <div class="form-group form_group">
                                                <span class="text-danger">Vui lòng đăng nhập để bình luận</span>
                                            </div>
                                            @endif
                                            <div class="form-group form_group">
                                                <textarea class="form-control form_control @error('body') is-invalid @enderror" placeholder="Viết bình luận của bạn ở đây" name="body"></textarea>

                                                @error('body')
                                                <span class="invalid-feedback" role="alert">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="button_box">
                                                @if(auth()->check())
                                                <button class="makp_btn">Đăng bình luận</button>
                                                @else
                                                <a href="{{ route('login') }}" class="makp_btn">Đăng nhập ngay</a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mt-md-0 mt-5">
                @include('layouts.blog_sidebar')
            </div>
        </div>
    </div>
</section>
@endsection