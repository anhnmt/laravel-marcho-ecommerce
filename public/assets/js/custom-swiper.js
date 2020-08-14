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
            1200: {
                slidesPerView: 6,
                spaceBetween: 50,
            },
            992: {
                slidesPerView: 5,
                spaceBetween: 50,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            576: {
                slidesPerView: 4,
                spaceBetween: 20,
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
        breakpoints: {
            1200: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            992: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
            576: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            0: {
                slidesPerView: 2,
                spaceBetween: 20
            },
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
