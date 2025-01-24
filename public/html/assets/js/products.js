(function ($) {

    $(document).ready(function() {

        // Add delay before calling changeStickyBarState to make sure value for top style property is computed properly
        setTimeout(function() {
            $("#know-more-sticky").changeStickyBarState();
        }, 300);

        $(window).scroll(function() {
            $("#know-more-sticky").changeStickyBarState();
        });
        $(window).resize(function() {
            $("#know-more-sticky").changeStickyBarState();
        });

    });

    $.fn.changeStickyBarState = function() {
        var _this = $(this);
        var targetEl = document.getElementsByClassName("know-more-content");
        if (targetEl && _this) {
            var headerEl = $("header");
            var offset = 0;
            if (headerEl.length) {
                offset = headerEl[0].offsetHeight;
                _this.css("top", offset);
            } else {
                _this.css("top", 0);
            }
            if ((targetEl[0].getBoundingClientRect().top - offset) <= 0) {
                _this.addClass("on");
            } else {
                _this.removeClass("on");
            }
        }
    }

})(jQuery);