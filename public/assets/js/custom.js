(function ($) {
    "use strict";
    $(".carouselExampleControls").owlCarousel({
        margin: 10,
        loop: true,
    });
    /*===================================*
        BACKGROUND IMAGE JS
	*===================================*/
    /*data image src*/
    $(".background_bg").each(function () {
        var attr = $(this).attr("data-img-src");
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css("background-image", "url(" + attr + ")");
        }
    });

    /*===================================*
        ANIMATION JS
	*===================================*/
    $(function () {
        function ckScrollInit(items, trigger) {
            items.each(function () {
                var ckElement = $(this),
                    AnimationClass = ckElement.attr("data-animation"),
                    AnimationDelay = ckElement.attr("data-animation-delay");

                ckElement.css({
                    "-webkit-animation-delay": AnimationDelay,
                    "-moz-animation-delay": AnimationDelay,
                    "animation-delay": AnimationDelay,
                    opacity: 0,
                });

                var ckTrigger = trigger ? trigger : ckElement;

                ckTrigger.waypoint(
                    function () {
                        ckElement.addClass("animated").css("opacity", "1");
                        ckElement.addClass("animated").addClass(AnimationClass);
                    },
                    {
                        triggerOnce: true,
                        offset: "90%",
                    }
                );
            });
        }

        ckScrollInit($(".animation"));
        ckScrollInit($(".staggered-animation"), $(".staggered-animation-wrap"));
    });

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
    /*-----------------------
		Price Range Slider
	------------------------ */
    var rangeSlider = $(".price-range"),
        minamount = $("#minamount"),
        maxamount = $("#maxamount"),
        minPrice = rangeSlider.data("min"),
        maxPrice = rangeSlider.data("max");
    rangeSlider.slider({
        range: true,
        min: minPrice,
        max: maxPrice,
        values: [minPrice, maxPrice],
        slide: function (event, ui) {
            minamount.html("$" + ui.values[0]);
            maxamount.html("$" + ui.values[1]);
        },
    });
    minamount.html("$" + rangeSlider.slider("values", 0));
    maxamount.html("$" + rangeSlider.slider("values", 1));

    /*-----------------------
		Size Filter
    ------------------------ */
    $(".input_size").click(function () {
        $(this).parents(".list-group-item").find("label").toggleClass("_highlight");
    });
    /*-----------------------
		Nice Select
    ------------------------ */
    $(".nice_select").niceSelect();

    /*-----------------------
        Product List Style
    ------------------------ */
    $(".product_present").click(function () {
        $(this).parents(".view_icon").find(".active").removeClass("active");
        $(this).addClass("active");
        if ($(this).hasClass("product_grid")) {
            $(".product_section")
                .find(".product_list")
                .removeClass("product_list")
                .addClass("product_grid");
        } else {
            $(".product_section")
                .find(".product_grid")
                .removeClass("product_grid")
                .addClass("product_list");
        }
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
    /*-------------------------------
                Choose Star
    ------------------------------ */
    $(".star").click(function () {
        $(this).parents(".star_rating").find(".checked").removeClass("checked");
        $(this).addClass("checked");
    });

    $(".related_products .products").slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 4,
        arrows: true,
    });
    /*-------------------------------
        Plus and minus quantity
    ------------------------------ */
    $(".plus").on("click", function () {
        if ($(this).prev().val()) {
            $(this)
                .prev()
                .val(+$(this).prev().val() + 1);
        }
    });
    $(".minus").on("click", function () {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1)
                $(this)
                    .next()
                    .val(+$(this).next().val() - 1);
        }
    });
    $(".qty").on("change", function () {
        if ($(this).val() <= 0) {
            $(this).val(1);
        }
    });
})(window.jQuery);
