jQuery(document).ready(function($) {
    $(".single .content--post img").each(function() {
        if ($(this).attr("alt").length > 0) {
            var t = $(this).attr("alt");
            var e = document.createElement("div");
            $(e).addClass("content--post-img");
            var n = document.createElement("div");
            $(n).addClass("content--post-img-caption").html(t);
            $(e).insertBefore($(this));
            $(this).appendTo(e);
            $(n).appendTo(e);
        }
    });
});