@php
\Assets::addStyles([
'swiper',
'owlcarousel',
'owlcarousel-theme',
'font-roboto-quicksand',
'custom-style',
'custom-responsive',
]);

\Assets::addScripts([
'owlcarousel',
'swiper',
'waypoints',
'jquery-scrollup',
'custom',
'custom-waypoints',
'custom-owlcarousel',
'custom-swiper',
]);
@endphp

@extends('layouts.master')

@section('main')
<section class="slider_section slide_medium shop_banner_slider">
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
									<h5 class="mb-3 font-weight-light ez-animate" data-animation="animate__slideInLeft" data-animation-delay="0.5s">{{ $slider->body }}</h5>
									<h2 class=" ez-animate" data-animation="animate__slideInLeft" data-animation-delay="1s">{{ $slider->name }}</h2>
									<a class="btn btn-fill-out rounded-0 text-uppercase ez-animate" href="{{ $slider->link }}" data-animation="animate__slideInLeft" data-animation-delay="1.5s">Xem Ngay</a>
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

<section class="feature_section py-md-5 py-0 d-md-block d-none">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="grid_item ez-animate" data-animation="animate__fadeIn" data-animation-delay="0.2s">
					<div class="grid_inner_item">
						<div class="makp_icon">
							<i class="fal fa-shipping-fast"></i>
						</div>
						<div class="makp_content">
							<h3><a href="#/">Miễn Phí Vận chuyển</a></h3>
							<p>Chúng tôi miễn mọi chi phí vận chuyển trên toàn quốc</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="grid_item ez-animate" data-animation="animate__fadeIn" data-animation-delay="0.5s">
					<div class="grid_inner_item">
						<div class="makp_icon">
							<i class="fal fa-history"></i>
						</div>
						<div class="makp_content">
							<h3><a href="#/">30 Ngày Đổi Trả</a></h3>
							<p>Miễn phí đổi trả trong vòng 30 ngày kể từ khi nhận được sản phẩm</p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 col-sm-12">
				<div class="grid_item ez-animate" data-animation="animate__fadeIn" data-animation-delay="0.8s">
					<div class="grid_inner_item">
						<div class="makp_icon">
							<i class="fal fa-hand-holding-heart"></i>
						</div>
						<div class="makp_content">
							<h3><a href="#/">Hỗ Trợ 24/7</a></h3>
							<p>Chúng tôi luôn lắng nghe và giải đáp mọi thắc mắc của khách hàng</p>
						</div>
					</div>
				</div>
			</div>
		</div>

		<hr class="mt-5 clearfix">
	</div>
</section>

<section class="trending_item">

	<hr class="mt-5 clearfix d-md-none d-block">
</section>

<section class="product_section py-md-5 py-0 ez-animate" data-animation="animate__fadeInUp">
	<div class="container">
		<div class="row justify-content-center py-4">
			<div class="col-lg-8">
				<div class="section_title text-center">
					<h2>Sản Phẩm Nổi Bật</h2>
					<p class="line-clamp">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod</p>
				</div>
			</div>
		</div>
		<div class="row pb-4">
			<div class="col-lg-12">
				<div class="row">
					@foreach($products as $product)
					<div class="col-lg-3 col-md-6 col-6">
						<div class="card card-shadow">
							<div class="product_image">
								<a href="{{ route('product.show', $product->slug) }}">
									<img loading="lazy" src="{{ asset(str_replace('thumbs/', '', $product->image)) }}" class="card-img-top" alt="">
								</a>

								<div class="product_item">
									<div class="d-flex align-items-center justify-content-center">
										<a class="add-wishlist @if($user && $user->favorited($product->id)) active @endif" data-product="{{ $product->id }}">
											<i class="fal fa-heart"></i>
										</a>
										<a href="{{ route('product.show', $product->slug) }}" class="add-cart">
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
									<h5 class="card-title mt-2 line-clamp">{{ $product->name }}</h5>
								</a>
								<span class="price mt-2">
									@if($product->sale_price)
									<span class="new">{{ number_format($product->sale_price, 0) }}đ</span>
									<span class="old">{{ number_format($product->price, 0) }}đ</span>
									@else
									<span class="new">{{ number_format($product->price, 0) }}đ</span>
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

<section class="blog_section bg_gray py-md-5 py-0 ez-animate" data-animation="animate__fadeInUp">
	<div class="container">
		<div class="row justify-content-center py-4">
			<div class="col-lg-8">
				<div class="section_title text-center">
					<h2>Tin tức</h2>
					<p class="line-clamp">Nơi chia sẻ những bí quyết mặc đẹp hữu ích, mẹo làm đẹp, khơi gợi cảm hứng thời trang trong bạn.</p>
				</div>
			</div>
		</div>
		<div class="row pb-4">
			@if($latest_blog ?? '')
			@foreach ($latest_blog as $blog)
			<div class="col-lg-3 col-md-6 col-6">
				<div class="grid_item">
					<div class="grid_inner_item">
						<div class="blog_img">
							<a href="{{ route('blog.show', $blog->slug) }}">
								<img loading="lazy" src="{{ asset(str_replace('thumbs/', '', $blog->image)) }}" class="img-fluid" alt="">
							</a>
						</div>
						<div class="blog_info">
							<p>
								<i class="fad fa-calendar-alt"></i>
								{{ $blog->created_at->format('d-m-Y') }}
							</p>
							<h3>
								<a class="line-clamp" href="{{ route('blog.show', $blog->slug) }}">{{ $blog->name }}</a>
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
					<div class="heading_s1 my-4">
						<span class="sub_heading">Xu hướng mùa mới!!</span>
						<h2>Bộ sưu tập mùa hè đẹp nhất</h2>
					</div>
					<h5 class="mb-4">Giảm giá lên đến 30%</h5>
					<a href="{{ route('product.index') }}" class="btn btn-fill-out rounded-0">Mua ngay</a>
				</div>
				<div class="medium_divider clearfix"></div>
			</div>
			<div class="col-md-5">
				<div class="text-center">
					<img loading="lazy" src="{{ asset('assets/img/banner/banner.png') }}" alt="">
				</div>
			</div>
		</div>
	</div>
</section>

<section class="sponssor_logo my-md-4 my-0 py-5">
	<div class="swiper_sponssor swiper-container">
		<div class="swiper-wrapper">
			<div class="swiper-slide">
				<img loading="lazy" src="{{ asset('assets/img/sponssor/sponssor_1.png') }}" alt="" />
			</div>
			<div class="swiper-slide">
				<img loading="lazy" src="{{ asset('assets/img/sponssor/sponssor_2.png') }}" alt="" />
			</div>
			<div class="swiper-slide">
				<img loading="lazy" src="{{ asset('assets/img/sponssor/sponssor_3.png') }}" alt="" />
			</div>
			<div class="swiper-slide">
				<img loading="lazy" src="{{ asset('assets/img/sponssor/sponssor_4.png') }}" alt="" />
			</div>
			<div class="swiper-slide">
				<img loading="lazy" src="{{ asset('assets/img/sponssor/sponssor_5.png') }}" alt="" />
			</div>
			<div class="swiper-slide">
				<img loading="lazy" src="{{ asset('assets/img/sponssor/sponssor_6.png') }}" alt="" />
			</div>
		</div>
	</div>
</section>
@stop