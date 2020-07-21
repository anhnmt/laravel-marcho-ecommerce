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
                            <h1 class="font-weight-normal">Liên hệ</h1>
                            <ul>
                                <li class="mx-1">
                                    <a href="{{ route('home') }}"><i class="fal fa-home-alt mr-1"></i>Trang chủ</a>
                                </li>
                                <li class="mx-1">
                                    <i class="fal fa-angle-right"></i>
                                </li>
                                <li class=" mx-1 active">Liên hệ</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="makp_map pt-140 pb-140">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="map_box">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d10381.0455512832!2d105.78458230666318!3d21.047130859221504!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1593137858213!5m2!1svi!2s" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="makp_contact contact_v1">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="makp_conent_box">
                    <div class="section_titles">
                        <h2>Feel Free Don’t Hesitate To Contact Us</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscingn elit, sed do eiusmod tempor incididunt ut labore etlai dolore magna aliqua. Quis ipsum suspendisse more ultrices gravida.</p>
                    </div>
                    <div class="contact_list">
                        <div class="single_list">
                            <div class="icon">
                                <i class="fal fa-phone-alt"></i>
                            </div>
                            <div class="text">
                                <p><a href="tel:+01234567896">+0-123-456-7896</a></p>
                                <p><a href="tel:+01234567896">+0-123-456-7896</a></p>
                            </div>
                        </div>
                        <div class="single_list">
                            <div class="icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="text">
                                <p>Ranlon Market 789 Road, Market Street, Newyork</p>
                            </div>
                        </div>
                        <div class="single_list">
                            <div class="icon">
                                <i class="fal fa-envelope-open-text"></i>
                            </div>
                            <div class="text">
                                <p><a href="mailto:yourmailaddress@gmail.com">yourmailaddress@gmail.com</a></p>
                                <p><a href="mailto:yourmailaddress@gmail.com">yourmailaddress@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="contact_form">
                    <h4>Contact Form</h4>
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
                                    <input type="text" class="form_control" placeholder="Subject" name="subject" required="">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form_group">
                                    <textarea class="form_control" placeholder="Your comment here" name="message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="button_box">
                                    <button class="makp_btn">Send Message</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection