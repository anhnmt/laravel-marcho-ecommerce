(function ($) {
    "use strict";

    /*===================================*
        SLIDER JS
	*===================================*/
    $(".slick_sponssor").slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 5,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

    /*-------------------------------
        Slick Slider for Product Image
    ------------------------------ */
    $(".slider-for").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: ".slider-nav",
        infinite: true,
        speed: 300,
    });

    $(".slider-nav").slick({
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        asNavFor: ".slider-for",
        dots: false,
        focusOnSelect: true,
        vertical: true,
        arrows: true,
        prevArrow:
            '<span class="prev"><i class="fa fa-angle-up" aria-hidden="true"></i></span>',
        nextArrow:
            '<span class="next"><i class="fa fa-angle-down" aria-hidden="true"></i></span>',
    });

    $(".related_products .products").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
    });
})(window.jQuery);
