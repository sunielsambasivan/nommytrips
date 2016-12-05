jQuery(document).ready(function($) {
    $(".single .content--post img").each(function() {
        if ($(this).attr("alt").length > 0) {
            var e = $(this).attr("alt");
            var t = document.createElement("div");
            $(t).addClass("content--post-img");
            var n = document.createElement("div");
            $(n).addClass("content--post-img-caption").html(e);
            $(t).insertBefore($(this));
            $(this).appendTo(t);
            $(n).appendTo(t);
        }
    });
    var e = function(e) {
        var t = -1;
        var n = -1;
        var a = 10;
        e.addEventListener("mousedown", function(a) {
            e.dragFlag = 0;
            t = a.clientX;
            n = a.clientY;
        }, false);
        e.addEventListener("mouseup", function(o) {
            if (o.clientX > t - a && o.clientX < t + a && o.clientY > n - a && o.clientY < n + a) {
                e.dragFlag = 0;
            } else {
                e.dragFlag = 1;
            }
        }, false);
    };
    $(".card--location").each(function() {
        var t = e(this);
        $(this).click(function() {
            if (!this.dragFlag) {
                window.location.href = $(this).data("url");
            }
        });
    });
    var t = function() {
        var e = document.createElement("style");
        e.appendChild(document.createTextNode(""));
        document.head.appendChild(e);
        console.log(e.sheet.cssRules);
        e.sheet.insertRule("body{background: #9988ee;}", 0);
        return e.sheet;
    }();
    $(".has-tip").each(function() {
        if ($(this).data("match-bg")) {
            var e = $(this).children(".fa").css("color");
            var n = $(this).data("toggle");
            console.log(n);
            $("#" + n).css({
                "background-color": e
            });
            t.insertRule("#" + n + "::before{border-color: transparent transparent " + e + ";}", 0);
        }
    });
});