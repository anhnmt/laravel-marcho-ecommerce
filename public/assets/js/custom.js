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

Number.prototype.formatMoney = function (
    decPlaces,
    thouSeparator,
    decSeparator
) {
    var n = this,
        decPlaces = isNaN((decPlaces = Math.abs(decPlaces))) ? 2 : decPlaces,
        decSeparator = decSeparator == undefined ? "." : decSeparator,
        thouSeparator = thouSeparator == undefined ? "," : thouSeparator,
        sign = n < 0 ? "-" : "",
        i = parseInt((n = Math.abs(+n || 0).toFixed(decPlaces))) + "",
        j = (j = i.length) > 3 ? j % 3 : 0;
    return (
        sign +
        (j ? i.substr(0, j) + thouSeparator : "") +
        i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + thouSeparator) +
        (decPlaces
            ? decSeparator +
              Math.abs(n - i)
                  .toFixed(decPlaces)
                  .slice(2)
            : "")
    );
};

(function ($) {
    "use strict";

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    
    /*===================================*
        Offcanvas Menu
	*===================================*/
    $('.navbar-toggler').on('click', function() {
        $('body').addClass('block');
        $('#header-navbar').addClass('show');
        $('.overlay').show();
    });

    $('.overlay').on('click', function() {
        $('body').removeClass('block');
        $('#header-navbar').removeClass('show');
        $('.overlay').hide();
    });

    /*===================================*
        Offcanvas Menu
    *===================================*/
    $(".navbar-toggler").on("click", function () {
        $("body").addClass("block");
        $("#header-navbar").addClass("show");
        $(".overlay").show();
        $("#mySidenav").style.width = "250px";
        $("#main").style.marginLeft = "250px";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    });

    $(".overlay").on("click", function () {
        $("body").removeClass("block");
        $("#header-navbar").removeClass("show");
        $(".overlay").hide();
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
                "fixed-top animate__animated animate__slideInDown"
            );
        } else {
            $("header").removeClass(
                "fixed-top animate__animated animate__slideInDown"
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
        $(this)
            .parents(".star_rating")
            .find("#rating")
            .val($(this).data("star"));
        // $(this).data("star");
    });

    /*-------------------------------
        Add To Favorite
    ------------------------------ */
    $(".add-wishlist").on("click", function () {
        var self = this;
        var id = $(self).data("product");
        $(self).toggleClass("active");
        // console.log(id);

        $.ajax({
            url: "/favorite/" + id,
            method: "GET",
        }).done(function (json) {
            console.log(json);
            if (json.success === true) {
                $("#favorite_count").html(json.favoriteCount);

                Swal.fire({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    icon: "success",
                    title: json.msg,
                });
            } else {
                Swal.fire({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    icon: "error",
                    title: json.msg,
                });
            }
        });
    });
})(window.jQuery);
