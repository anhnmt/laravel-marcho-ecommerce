(function ($) {
    "use strict";

    /*===================================*
        SLIDER JS
	*===================================*/
    var swiper_sponssor = new Swiper(".swiper_sponssor", {
        slidesPerView: 2,
        loop: true,
        freeMode: true,
        breakpoints: {
            576: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
            1200: {
                slidesPerView: 6,
                spaceBetween: 50,
            },
        },
    });

    var swiper_related_products = new Swiper(".swiper_related_products", {
        slidesPerView: 4,
        loop: true,
        freeMode: true,
        spaceBetween: 30,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    var galleryThumbs = new Swiper(".gallery-thumbs", {
        loop: true,
        direction: "vertical",
        slidesPerView: 4,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
    });
    var galleryTop = new Swiper(".gallery-top", {
        centeredSlides: true,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: galleryThumbs,
        },
    });
})(window.jQuery);
