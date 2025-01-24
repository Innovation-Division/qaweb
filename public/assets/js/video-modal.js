(function ($) {
    $(document).ready(function () {
        $(".video-modal:not(.processed)")
            .addClass("processed")
            .each(function (i, o) {
                var videoModalEl = $(o);
                var videoEl = videoModalEl.find("video");
                var videoSrc = videoModalEl.data("videosrc");
                if (videoEl.length && videoSrc) {
                    videoModalEl.on("shown.bs.modal", function (e) {
                        videoEl.attr("src", videoSrc);
                    });
                    videoModalEl.on("hide.bs.modal", function (e) {
                        videoEl.attr("src", "");
                    });
                }
            });
    });
})(jQuery);
