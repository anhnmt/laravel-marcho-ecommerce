<div class="makp_sidebar product_sidebar">
    <div class="widget_box search_widget mb-5">
        <h4 class="mb-4 head_sidebar">SEARCH</h4>
        <form>
            <div class="form_group">
                <input type="text" class="form_control" placeholder="Enter your keyword...">
                <button class="btn-fill-out search_btn"><i class="fal fa-search"></i></button>
            </div>
        </form>
    </div>
    
    <div class="widget_box search_widget mb-5">
        <h4 class="head_sidebar">MỚI ĐĂNG</h4>
        <div class="post_wrapper">
            @foreach ($latest_blog as $blog)
            <div class="post_list">
                <div class="row no-gutters">
                    <div class="col-4 pr-2 post_img">
                        <a href="{{ route('blog.show', $blog->slug) }}">
                            <img loading="lazy" src="{{ asset(str_replace('thumbs/', '', $blog->image)) }}" class="img-fluid" alt="{{ $blog->name }}">
                        </a>
                    </div>
                    <div class="col-8 post_info">
                        <p>
                            <i class="fad fa-calendar-alt"></i>
                            {{ $blog->created_at->diffForHumans() }}
                        </p>
                        <h3 class="post_title">
                            <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->name }}</a>
                        </h3>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="widget_box search_widget mb-5">
        <h4 class="mb-4 head_sidebar">DANH MỤC</h4>
        <div class="product_category">
            <ul class="list-group">
                @foreach ($categories as $category)
                <li class="list-group-item mt-2">
                    <div class="row">
                        <span class="col-md-6">{{ $category->name }}</span>
                        <span class="text-md-right col-md-6">48</span>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="widget_box search_widget mb-5">
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