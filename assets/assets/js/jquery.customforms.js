/*
 * jQuery Custom Forms Plugin 1.0
 * www.ZURB.com
 * Copyright 2010, ZURB
 * Free to use under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 */
jQuery(document).ready(function (b) {
    function g(e) {
        b("form.custom input:" + e).each(function () {
            var c = b(this).hide(),
                a = c.next("span.custom." + e);
            0 === a.length && (a = b('<span class="custom ' + e + '"></span>').insertAfter(c));
            a.toggleClass("checked", c.is(":checked"));
            a.toggleClass("disabled", c.is(":disabled"))
        })
    }

    function h(e) {
        var c = b(e),
            a = c.next("div.custom.dropdown"),
            d = c.find("option"),
            i = 0,
            f;
        if (!c.hasClass("no-custom") && (0 === a.length ? ($customSelectSize = "", b(e).hasClass("small") ? $customSelectSize = "small" : b(e).hasClass("medium") ? $customSelectSize = "medium" : b(e).hasClass("large") ? $customSelectSize = "large" : b(e).hasClass("expand") && ($customSelectSize = "expand"), a = b('<div class="custom dropdown ' + $customSelectSize + '"><a href="#" class="selector"></a><ul></ul></div>"'), d.each(function () {
            f = b("<li>" + b(this).html() + "</li>");
            a.find("ul").append(f)
        }), a.prepend('<a href="#" class="current">' + d.first().html() + "</a>"), c.after(a), c.hide()) : (a.find("ul").html(""), d.each(function () {
            f = b("<li>" + b(this).html() + "</li>");
            a.find("ul").append(f)
        })), a.toggleClass("disabled", c.is(":disabled")), d.each(function (c) {
            if (this.selected) {
                a.find("li").eq(c).addClass("selected");
                a.find(".current").html(b(this).html())
            }
        }), a.find("li").each(function () {
            a.addClass("open");
            b(this).actual("outerWidth") > i && (i = b(this).actual("outerWidth"));
            a.removeClass("open")
        }), !a.is(".small, .medium, .large, .expand"))) a.css("width", i + 18 + "px"), a.find("ul").css("width", i + 16 + "px")
    }
    g("checkbox");
    g("radio");
    b("form.custom select").each(function () {
        h(this)
    })
});
(function (b) {
    function g(c) {
        var a = 0,
            d = c.next();
        $options = c.find("option");
        d.find("ul").html("");
        $options.each(function () {
            $li = b("<li>" + b(this).html() + "</li>");
            d.find("ul").append($li)
        });
        $options.each(function (a) {
            this.selected && (d.find("li").eq(a).addClass("selected"), d.find(".current").html(b(this).html()))
        });
        d.removeAttr("style").find("ul").removeAttr("style");
        d.find("li").each(function () {
            d.addClass("open");
            b(this).outerWidth() > a && (a = b(this).outerWidth());
            d.removeClass("open")
        });
        d.css("width", a + 18 + "px");
        d.find("ul").css("width", a + 16 + "px")
    }

    function h(b) {
        var a = b.prev(),
            d = a[0];
        !1 == a.is(":disabled") && (d.checked = d.checked ? !1 : !0, b.toggleClass("checked"), a.trigger("change"))
    }

    function e(c) {
        var a = c.prev(),
            d = a[0];
        !1 == a.is(":disabled") && (b('input:radio[name="' + a.attr("name") + '"]').each(function () {
            b(this).next().removeClass("checked")
        }), d.checked = d.checked ? !1 : !0, c.toggleClass("checked"), a.trigger("change"))
    }
    b("form.custom span.custom.checkbox").live("click", function (c) {
        c.preventDefault();
        c.stopPropagation();
        h(b(this))
    });
    b("form.custom span.custom.radio").live("click", function (c) {
        c.preventDefault();
        c.stopPropagation();
        e(b(this))
    });
    b("form.custom select").live("change", function () {
        g(b(this))
    });
    b("form.custom label").live("click", function (c) {
        var a = b("#" + b(this).attr("for"));
        0 !== a.length && ("checkbox" === a.attr("type") ? (c.preventDefault(), c = b(this).find("span.custom.checkbox"), h(c)) : "radio" === a.attr("type") && (c.preventDefault(), c = b(this).find("span.custom.radio"), e(c)))
    });
    b("form.custom div.custom.dropdown a.current, form.custom div.custom.dropdown a.selector").live("click", function (c) {
        var a = b(this).closest("div.custom.dropdown"),
            d = a.prev();
        c.preventDefault();
        if (!1 == d.is(":disabled")) return a.toggleClass("open"), a.hasClass("open") ? b(document).bind("click.customdropdown", function () {
            a.removeClass("open");
            b(document).unbind(".customdropdown")
        }) : b(document).unbind(".customdropdown"), !1
    });
    b("form.custom div.custom.dropdown li").live("click", function (c) {
        var a = b(this),
            d = a.closest("div.custom.dropdown"),
            e = d.prev(),
            f = 0;
        c.preventDefault();
        c.stopPropagation();
        a.closest("ul").find("li").removeClass("selected");
        a.addClass("selected");
        d.removeClass("open").find("a.current").html(a.html());
        a.closest("ul").find("li").each(function (b) {
            a[0] == this && (f = b)
        });
        e[0].selectedIndex = f;
        e.trigger("change")
    })
})(jQuery);