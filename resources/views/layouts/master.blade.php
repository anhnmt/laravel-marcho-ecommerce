<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - Marcho Shop</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Custom Style -->
    {!! \Assets::renderHeader() !!}

    @yield('style')
</head>

<body>
    <header>
        <div class="container">
            <nav class="menu_bar navbar navbar-expand-lg align-items-center justify-content-between">
                <div class="d-flex justify-content-center my-md-0 my-2 col-sm-auto col-xs-12">
                    <a class="header_logo navbar-brand" href="{{ route('home') }}">
                        <img loading="lazy" class="logo d-inline-block align-middle" src="{{ asset('assets/img/logo.svg') }}" alt="">
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="header-navbar">
                    <ul class="header_menu navbar-nav">
                        <li class="nav-item {{ (request()->routeIs('home')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('home') }}"><i class="fad fa-home-lg-alt"></i> Trang chủ</a>
                        </li>
                        <li class="nav-item {{ (request()->routeIs('product*')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('product.index') }}"><i class="far fa-tshirt"></i> Sản phẩm</a>
                        </li>
                        <li class="nav-item {{ (request()->routeIs('blog.*')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('blog.index') }}"><i class="fal fa-newspaper"></i> Tin tức</a>
                        </li>
                        <li class="nav-item {{ (request()->routeIs('contact.*')) ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('contact.index') }}"><i class="fal fa-phone"></i> Liên hệ</a>
                        </li>
                        <li class="nav-item {{ (request()->routeIs('cart.*')) ? 'active' : '' }} d-lg-none">
                            <a class="nav-link" href="{{ route('cart.index') }}"><i class="fal fa-shopping-cart"></i> Giỏ hàng</a>
                        </li>
                        <li class="nav-item {{ (request()->routeIs('favorite.*')) ? 'active' : '' }} d-lg-none">
                            <a class="nav-link" href="{{ route('favorite.index') }}"><i class="fal fa-heart"></i> Sản phẩm yêu thích</a>
                        </li>
                        @if(auth()->check())
                        <li class="nav-item {{ (request()->routeIs('user.*')) ? 'active' : '' }} d-lg-none">
                            <a class="nav-link" href="{{ route('user.profile') }}"><i class="fal fa-user"></i> Trang cá nhân</a>
                        </li>
                        <li class="nav-item d-lg-none">
                            <a class="nav-link" onclick="document.getElementById('logout-form').submit();"><i class="fal fa-sign-out-alt"></i> Đăng xuất</a>
                        </li>
                        @else
                        <li class="nav-item {{ (request()->routeIs('login')) ? 'active' : '' }} d-lg-none">
                            <a class="nav-link" href="{{ route('login') }}"><i class="fal fa-sign-in-alt"></i> Đăng nhập</a>
                        </li>
                        <li class="nav-item {{ (request()->routeIs('register')) ? 'active' : '' }} d-lg-none">
                            <a class="nav-link" href="{{ route('register') }}"><i class="fal fa-user-plus"></i> Đăng ký</a>
                        </li>
                        @endif
                    </ul>
                </div>

                @php
                $user = auth()->user();
                $cart = Cart::name('shopping');
                $cartCount = $cart->sumItemsQuantity();
                $favoriteCount = $user ? $user->favorites()->count() : 0;
                @endphp
                <div class="navbar-nav header_icon flex-row align-items-center col-sm-auto col-xs-12">
                    <a class="nav-item nav-link navbar-toggler" href="#" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fal fa-bars"></i>
                    </a>
                    <a class="nav-item nav-link icon_love" href="{{ route('favorite.index') }}">
                        <i class="fal fa-heart"></i>
                        <span id="favorite_count" class="wishlist_count">{{ $favoriteCount }}</span>
                    </a>
                    <a class="nav-item nav-link icon_cart" href="{{ route('cart.index') }}">
                        <i class="fal fa-shopping-cart"></i>
                        <span id="cart_count" class="cart_count">{{ $cartCount }}</span>
                    </a>
                    @if(auth()->check())
                    <a class="nav-item nav-link user_header dropdown" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img loading="lazy" src="{{ asset($user->avatar ? auth()->user()->avatar : 'assets/img/user2-160x160.jpg') }}" alt="" class="rounded-circle img-fluid" width="35px" height="35px">
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @can('admin.dashboard')
                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">Trang quản trị</a>
                        @endcan

                        @can('admin.dashboard')
                        <a class="dropdown-item" href="{{ route('admin.profile') }}">Trang cá nhân</a>
                        @endcan

                        @cannot('admin.dashboard')
                        <a class="dropdown-item" href="{{ route('user.profile') }}">Trang cá nhân</a>
                        @endcan

                        <div class="dropdown-divider"></div>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fal fa-sign-out"></i> Đăng xuất
                            </button>
                        </form>
                    </div>
                    @else
                    <a class="nav-item nav-link" href="{{ route('login') }}" title="Đăng nhập">
                        <i class="fal fa-user-circle"></i>
                    </a>
                    @endif
                </div>
            </nav>
        </div>
    </header>

    <div id="app">
        @yield('main')
    </div>

    <footer class="bg_gray pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="address col-md-3">
                    <h5 class="my-3">
                        <img loading="lazy" class="logo d-inline-block align-middle" src="{{ asset('assets/img/logo.svg') }}" alt="">
                    </h5>
                    <p>
                        No. 342 - London Oxford Street,<br />
                        012 United States<br />
                        Youremail@gmail.com<br />
                        +0283 838 8393
                    </p>
                </div>

                <hr class="clearfix w-100 d-md-none">

                <div class="col-md-2">
                    <h5 class="section_title my-3">Liên kết</h5>

                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('home') }}">Trang chủ</a>
                        </li>
                        <li>
                            <a href="{{ route('product.index') }}">Sản phẩm</a>
                        </li>
                        <li>
                            <a href="{{ route('blog.index') }}">Tin tức</a>
                        </li>
                        <li>
                            <a href="{{ route('contact.index') }}">Liên hệ</a>
                        </li>
                        <li>
                            <a href="{{ route('user.order.index') }}">Đơn hàng của tôi</a>
                        </li>
                    </ul>
                </div>

                <hr class="clearfix w-100 d-md-none">

                <div class="col-md-2">
                    <h5 class="section_title my-3">Tài khoản</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="{{ route('user.profile') }}">Tài khoản của tôi</a>
                        </li>
                        <li>
                            <a href="{{ route('cart.index') }}">Giỏ hàng</a>
                        </li>
                        <li>
                            <a href="{{ route('favorite.index') }}">Yêu thích</a>
                        </li>
                        <li>
                            <a href="{{ route('login') }}">Đăng nhập</a>
                        </li>
                        <li>
                            <a href="{{ route('register') }}">Đăng ký</a>
                        </li>
                    </ul>
                </div>

                <hr class="clearfix w-100 d-md-none">

                <div class="subscribe col-md-5">
                    <h5 class="section_title my-3">Theo dõi tin tức mới nhất</h5>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida.</p>

                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="email" placeholder="Your email address" name="email" required="">
                        <button class="btn my-2 my-sm-0" type="submit">subscribe</button>
                    </form>
                </div>
            </div>

            <hr>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p class="copyright mb-md-0 text-center text-md-left">© 2020 CodeAstrology. All Rights Reserved.</p>
                    </div>
                    <div class="col-md-6">
                        <ul class="footer_payment text-center text-md-right">
                            <li>
                                <a href="#">
                                    <img loading="lazy" src="{{ asset('assets/img/payment/visa.png') }}" alt="visa">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img loading="lazy" src="{{ asset('assets/img/payment/discover.png') }}" alt="discover">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img loading="lazy" src="{{ asset('assets/img/payment/master_card.png') }}" alt="master_card">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img loading="lazy" src="{{ asset('assets/img/payment/paypal.png') }}" alt="paypal">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img loading="lazy" src="{{ asset('assets/img/payment/amarican_express.png') }}" alt="amarican_express">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="overlay"></div>

    <!-- Custom Script -->
    {!! \Assets::renderFooter() !!}

    @yield('script')

    @if(session('success'))
    <script>
        $(function() {
            Swal.fire({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
                icon: "success",
                title: "{{ session('success') }}",
            });
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        $(function() {
            Swal.fire({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
                icon: "error",
                title: "{{ session('error') }}",
            });
        });
    </script>
    @endif
</body>

</html>