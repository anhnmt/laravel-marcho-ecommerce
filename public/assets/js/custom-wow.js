(function ($) {
    "use strict";

    /*===================================*
        ANIMATION JS
	*===================================*/
    var wow = new WOW({
        boxClass: "wow",
        animateClass: "animate__animated",
        offset: 0,
        mobile: true,
        live: true,
    });

    wow.init();
})(window.jQuery);
