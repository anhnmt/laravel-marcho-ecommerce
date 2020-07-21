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
                            <h1 class="font-weight-normal">Blog details</h1>
                            <ul>
                                <li class="mx-1"><a href="{{ route('home') }}"><i
                                            class="fal fa-home-alt mr-1"></i>Home</a></li>
                                <li class="mx-1">
                                    <i class="fal fa-chevron-double-right"></i>
                                </li>
                                <li class=" mx-1 active">Blog</li>
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
                    <div class="blog_img">
                        <img src="assets/img/blog/single_blog_1.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="blog_content mb-50">
                        <div class="blog_meta">
                            <span><i class="fad fa-calendar-alt"></i><a href="#">24 Feb, 2020</a></span>
                            <span><i class="fal fa-user"></i><a href="#">By Admin</a></span>
                            
                            <span><i class="fal fa-comment-alt-dots"></i><a href="#">05 Comments</a></span>
                        </div>
                        <p>Salesman and above it there hung a picture that he had recenatly cut out of an illustrated more magazine and housed in a nice, gilded frame. It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered.</p>
                        <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur most a ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempraus, tellus eget condimentum  the rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quaminitys nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. </p>
                        <blockquote>
                            <h4>“ Spread out on the table Samsa was a travelling salesman and above that he had recently cut out of an. ”</h4>
                            <h6>JHON DOE</h6>
                        </blockquote>
                        <p>Gregor then turned to look out the window at the dull weather. Pitifully thin compared with the size of the rest of him, waved about helpslessly as he looked. “What’s happened to me?” he is  thought. It wasn’t a dream. His room, a proper human room although a liittle too small, layout a peacefully between its four familiar.</p>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog_img">
                                    <img src="assets/img/blog/single_blog_2.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog_img">
                                    <img src="assets/img/blog/single_blog_3.jpg" class="img-fluid" alt="">
                                </div>
                            </div>
                        </div>
                        <p>Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur most a ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempraus, tellus eget condimentum  the rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quaminitys nunc, blandit vel, luctus pulvinar, hendrerit id, lorem.</p>
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
                            <p class="d-inline">Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed
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
                        <h4 class="mb-3 head_sidebar">LATEST POST</h4>
                        <div class="post_wrapper mt-5">
                            <div class="post_list">
                                <div class="post_img">
                                    <a href="blog-details.html"><img src="{{asset('assets/img/blog/post_1.png')}}"
                                            class="img-fluid" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3 class="post_title"><a href="#">We want to make sure every dollar you.</a></h3>
                                    <p><i class="fad fa-calendar-alt"></i> 05 January, 2020</p>
                                </div>
                            </div>
                            <div class="post_list">
                                <div class="post_img">
                                    <a href="blog-details.html"><img src="{{asset('assets/img/blog/post_2.png')}}"
                                            class="img-fluid" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3 class="post_title"><a href="#">Google might be have issues with indexing</a>
                                    </h3>
                                    <p><i class="fad fa-calendar-alt"></i> 05 January, 2020</p>
                                </div>
                            </div>
                            <div class="post_list">
                                <div class="post_img">
                                    <a href="blog-details.html"><img src="{{asset('assets/img/blog/post_3.png')}}"
                                            class="img-fluid" alt=""></a>
                                </div>
                                <div class="post_info">
                                    <h3 class="post_title"><a href="#">Main reasons to explan fast business builder</a>
                                    </h3>
                                    <p><i class="fad fa-calendar-alt"></i> 05 January, 2020</p>
                                </div>
                            </div>
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