(function ($) {
    "use strict";

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
})(window.jQuery);
