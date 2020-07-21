@extends('layouts.blog')

@section('blog')
<div class="blog_wrapper_content">
    <div class="row">
        @foreach ($blogs as $blog)
        <div class="col-md-6 col-sm-12 pb-5">
            <div class="grid_item wow animate__slideInUp">
                <div class="grid_inner_item">
                    <div class="blog_img">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <img src="{{ asset(str_replace('thumbs/', '', $blog->image)) }}" class="img-fluid" alt="{{ $blog->name }}">
                        </a>
                    </div>
                    <div class="blog_info">
                        <p>
                            <i class="fad fa-calendar-alt"></i>
                            {{ $blog->created_at->diffForHumans() }}
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
@endsection