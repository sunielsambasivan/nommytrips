jQuery(document).ready(function($) {
    $(".single .content--post img").each(function() {
        if ($(this).attr("alt").length > 0) {
            var t = $(this).attr("alt");
            var n = document.createElement("div");
            $(n).addClass("content--post-img");
            var e = document.createElement("div");
            $(e).addClass("content--post-img-caption").html(t);
            $(n).insertBefore($(this));
            $(this).appendTo(n);
            $(e).appendTo(n);
        }
    });
    var t = function(t) {
        t["dragFlag"] = 0;
        var n = -1;
        var e = -1;
        var a = 10;
        t.addEventListener("mousedown", function(a) {
            t["dragFlag"] = 0;
            n = a.clientX;
            e = a.clientY;
            console.log("X: " + a.clientX + " / Y: " + a.clientY);
        }, false);
        t.addEventListener("mouseup", function(e) {
            console.log("X: " + e.clientX + " / Y: " + e.clientY);
            if (e.clientX > n - a && e.clientX < n + a) {
                t["dragFlag"] = 0;
            } else {
                t["dragFlag"] = 1;
            }
        }, false);
    };
    $(".card--location").each(function() {
        var n = t(this);
        $(this).click(function() {
            window.location.href = $(this).data("url");
        });
    });
});