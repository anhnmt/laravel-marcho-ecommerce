function debounce(func, wait) {
    var timeout;

    return function () {
        var context = this,
            args = arguments;

        var executeFunction = function () {
            func.apply(context, args);
        };

        clearTimeout(timeout);
        timeout = setTimeout(executeFunction, wait);
    };
}

(function ($) {
    "use strict";

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    /*===================================*
        BACKGROUND IMAGE JS
	*===================================*/
    $(".background_bg").each(function () {
        var attr = $(this).attr("data-img-src");
        if (typeof attr !== typeof undefined && attr !== false) {
            $(this).css("background-image", "url(" + attr + ")");
        }
    });

    /*===================================*
        MENU JS
	*===================================*/
    //Main navigation scroll spy for shadow
    $(window).on("scroll", function () {
        var scroll = $(window).scrollTop();

        if (scroll >= 150) {
            $("header").addClass(
                "fixed-top animated backInDown"
            );
        } else {
            $("header").removeClass(
                "fixed-top animated backInDown"
            );
        }
    });

    /*-----------------------
		Size Filter
    ------------------------ */
    $(".input_size").click(function () {
        $(this)
            .parents(".list-group-item")
            .find("label")
            .toggleClass("_highlight");
    });

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
        Choose Star
    ------------------------------ */
    $(".star").click(function () {
        $(this).parents(".star_rating").find(".checked").removeClass("checked");
        $(this).addClass("checked");
    });

    /*-------------------------------
        Add To Favorite
    ------------------------------ */
    $(".add-wishlist").on("click", function () {
        var self = this;
        var id = $(self).data("product");
        $(self).toggleClass("active");
        console.log(id);
    });
})(window.jQuery);
