@php
\Assets::addStyles([
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'nice-select',
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

<section class="login-wrapper all_product_section blog_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog_wrapper_content">
                    <div class="row">
                        @foreach ($blogs as $blog)
                        <div class="col-md-6 col-sm-12 pb-5">
                            <div class="grid_item wow animate__slideInUp">
                                <div class="grid_inner_item">
                                    <div class="blog_img">
                                        <a href="{{ route('blog.show', $blog->slug) }}">
                                            <img loading="lazy" src="{{ asset(str_replace('thumbs/', '', $blog->image)) }}" class="img-fluid" alt="{{ $blog->name }}">
                                        </a>
                                    </div>
                                    <div class="blog_info">
                                        <p>
                                            <i class="fad fa-calendar-alt"></i>
                                            {{ $blog->created_at->format('d-m-Y') }}
                                        </p>
                                        <h3>
                                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->name }}</a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="_pagination">
                    <div class="d-flex justify-content-center pt-4">
                        {{ $blogs->links() }}
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                @include('layouts.blog_sidebar')
            </div>
        </div>
    </div>
</section>
@endsection