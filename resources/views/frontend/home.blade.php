@extends('layouts.master')

@section('main')
<section class="slider_section slide_medium shop_banner_slider staggered-animation-wrap">
	<div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-ride="carousel">
		<div class="carousel-inner">
			@foreach($sliders as $slider)
			<div class="carousel-item {{ $loop->first ? 'active' : '' }} background_bg" data-img-src="{{ asset(str_replace('thumbs/', '', $slider->image)) }}">
				<div class="banner_slide_content">
					<div class="container">
						<!-- STRART CONTAINER -->
						<div class="row">
							<div class="col-lg-7 col-9">
								<div class="banner_content overflow-hidden">
									<h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">{{ $slider->body }}</h5>
									<h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">{{ $slider->name }}</h2>
									<a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ $slider->link }}" data-animation="slideInLeft" data-animation-delay="1.5s">Xem Ngay</a>
								</div>
							</div>
						</div>
					</div><!-- END CONTAINER-->
				</div>
			</div>
			@endforeach
		</div>
		<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
			<i class="far fa-chevron-left"></i>
		</a>
		<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
			<i class="far fa-chevron-right"></i>
		</a>
	</div>
</section>

<section class="feature_section py-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="grid_item">
					<div class="grid_inner_item">
						<div class="makp_icon">
							<i class="fal fa-shipping-fast"></i>
						</div>
						<div class="makp_content">
							<h3><a href="serice-details.html">Free Shipping & Return</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="grid_item">
					<div class="grid_inner_item">
						<div class="makp_icon">
							<i class="fal fa-history"></i>
						</div>
						<div class="makp_content">
							<h3><a href="serice-details.html">30 Days Return</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="grid_item">
					<div class="grid_inner_item">
						<div class="makp_icon">
							<i class="fal fa-hand-holding-heart"></i>
						</div>
						<div class="makp_content">
							<h3><a href="serice-details.html">24/7 Strong Support</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<hr class="mt-5 clearfix">
	</div>
</section>

<section class="trending_item">

</section>

<section class="product_section py-5">
	<div class="container">
		<div class="row justify-content-center py-4">
			<div class="col-lg-8">
				<div class="section_title text-center">
					<h2>Sản Phẩm Nổi Bật</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
				</div>
			</div>
		</div>
		<div class="row pb-4">
			<div class="col-lg-12">
				<div class="row">
					@foreach($products as $product)
					<div class="col-lg-4 col-md-6 col-sm-12">
						<div class="card">
							<div class="product_image">
								<img src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" class="card-img-top" alt="">

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
							<div class="product_info card-body text-center">
								<div class="star_rating d-inline-block">
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star checked"></i>
									<i class="fas fa-star"></i>
								</div>
								<a href="{{ route('product.show', $product->slug) }}">
									<h5 class="card-title mt-2">{{ $product->name }}</h5>
								</a>
								<span class="price mt-2">
									@if($product->sale_price)
									<span class="new">{{ $product->sale_price }}đ</span>
									<span class="old">{{ $product->price }}đ</span>
									@else
									<span class="new">{{ $product->price }}đ</span>
									@endif
								</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</section>

<section class="blog_section bg_gray py-5">
	<div class="container">
		<div class="row justify-content-center py-4">
			<div class="col-lg-8">
				<div class="section_title text-center">
					<h2>Tin tức</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
				</div>
			</div>
		</div>
		<div class="row pb-4">
			@if($latest_blog ?? '')
			@foreach ($latest_blog as $blog)
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="grid_item wow animate__slideInUp" data-wow-delay=".1s">
					<div class="grid_inner_item">
						<div class="blog_img">
							<a href="{{ route('blog.show', $blog->slug) }}">
								<img src="{{ asset(str_replace('thumbs/', '', $blog->image)) }}" class="img-fluid" alt="">
							</a>
						</div>
						<div class="blog_info">
							<p>January 19, 2020 by Admin</p>
							<h3>
								<a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->name }}</a>
							</h3>
						</div>
					</div>
				</div>
			</div>
			@endforeach
			@endif
		</div>
	</div>
</section>

<section class="testimonial_section">

</section>

<section class="banner_section bg_light_blue p-0">
	<div class="container">
		<div class="row align-items-center flex-row-reverse">
			<div class="col-md-6 offset-md-1">
				<div class="medium_divider d-none d-md-block clearfix"></div>
				<div class="trand_banner_text text-center text-md-left">
					<div class="heading_s1 mb-3">
						<span class="sub_heading">New season trends!</span>
						<h2>Best Summer Collection</h2>
					</div>
					<h5 class="mb-4">Sale Get up to 50% Off</h5>
					<a href="shop-left-sidebar.html" class="btn btn-fill-out rounded-0">Shop Now</a>
				</div>
				<div class="medium_divider clearfix"></div>
			</div>
			<div class="col-md-5">
				<div class="text-center">
					<img src="assets/img/banner/banner.png" alt="">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="sponssor_logo py-5">
	<div class="container">
		<div class="row">
			<div class="slick_sponssor col-12">
				<div class="item">
					<img src="assets/img/sponssor/sponssor_1.png" alt="" />
				</div>
				<div class="item">
					<img src="assets/img/sponssor/sponssor_2.png" alt="" />
				</div>
				<div class="item">
					<img src="assets/img/sponssor/sponssor_3.png" alt="" />
				</div>
				<div class="item">
					<img src="assets/img/sponssor/sponssor_4.png" alt="" />
				</div>
				<div class="item">
					<img src="assets/img/sponssor/sponssor_5.png" alt="" />
				</div>
				<div class="item">
					<img src="assets/img/sponssor/sponssor_6.png" alt="" />
				</div>
			</div>
		</div>
	</div>
</section>
@stop