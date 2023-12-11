$(function() {
    $(".header").after('<div id="m-nav" class="m-nav"><div class="m-wrap"></div><div id="m-btn" class="m-btn"><i class="fa fa-remove"></i></div>');
    $(".sub-menu").before('<em class="dot"><i class="fa fa-angle-down"></i></em>');
    $(".container .nav").clone(false).appendTo(".m-wrap");
    $(".m-btn").click(function() {
        $("#m-nav").toggleClass("m-open").siblings("#m-nav").removeClass("m-open");
        $("#mask").slideToggle(0).siblings("#mask").slideToggle(0);
        $("body").toggleClass("open").siblings("body").removeClass("open")
    });
    $(".dot").click(function(d) {
        h($(this), ".ul-subcates");
        d.stopPropagation()
    });

    function h(h, d) {
        h.next().slideToggle();
        h.parent().siblings().find(".fa").removeClass("open");
        h.parent().siblings().find(d).slideUp();
        var dT = h.find(".fa");
        if (dT.hasClass("open")) {
            dT.removeClass("open")
        } else {
            dT.addClass("open")
        }
    }
    $(".nav-bar li").hover(function() {
        $(this).addClass("on")
    }, function() {
        $(this).removeClass("on")
    });
    $(".s-btn").on("click", function() {
        var h = $(this);
        if (h.hasClass("off")) {
            h.removeClass("fa-search off").addClass("fa-remove no");
            $(".s-form").slideToggle(200)
        } else {
            h.removeClass("fa-remove no").addClass("fa-search off");
            $(".s-form").slideToggle(100)
        }
    });
    $("#mask").click(function() {
        $(this).hide();
        $(".search-bg").hide();
        $("#m-nav").removeClass("m-open");
        $("body").removeClass("open")
    })
});
jQuery(document).ready(function(h) {
    var d = h("#nav-box").attr("data-type");
    h(".nav>li").each(function() {
        try {
            var dT = h(this).attr("id");
            if ("index" == d) {
                if (dT == "nvabar-item-index") {
                    h("#nvabar-item-index").addClass("active")
                }
            } else if ("category" == d) {
                var a = h("#nav-box").attr("data-infoid");
                if (a != null) {
                    var e = a.split(" ");
                    for (var eE = 0; eE < e.length; eE++) {
                        if (dT == "navbar-category-" + e[eE]) {
                            h("#navbar-category-" + e[eE] + "").addClass("active")
                        }
                    }
                }
            } else if ("article" == d) {
                var a = h("#nav-box").attr("data-infoid");
                if (a != null) {
                    var e = a.split(" ");
                    for (var eE = 0; eE < e.length; eE++) {
                        if (dT == "navbar-category-" + e[eE]) {
                            h("#navbar-category-" + e[eE] + "").addClass("active")
                        }
                    }
                }
            } else if ("page" == d) {
                var a = h("#nav-box").attr("data-infoid");
                if (a != null) {
                    if (dT == "navbar-page-" + a) {
                        h("#navbar-page-" + a + "").addClass("active")
                    }
                }
            } else if ("tag" == d) {
                var a = h("#nav-box").attr("data-infoid");
                if (a != null) {
                    if (dT == "navbar-tag-" + a) {
                        h("#navbar-tag-" + a + "").addClass("active")
                    }
                }
            }
        } catch (h) {}
    });
    h("#nav-box").delegate("a", "click", function() {
        h(".nav>li").each(function() {
            h(this).removeClass("active")
        });
        if (h(this).closest("ul") != null && h(this).closest("ul").length != 0) {
            if (h(this).closest("ul").attr("id") == "munavber") {
                h(this).addClass("active")
            } else {
                h(this).closest("ul").closest("li").addClass("active")
            }
        }
    })
});
(function(h) {
    if (typeof Object.create !== "function") {
        Object.create = function(h, d) {
            if (typeof h !== "object" && typeof h !== "function") {
                throw new TypeError("Object prototype may only be an Object: " + h)
            } else if (h === null) {
                throw new Error("This browser's implementation of Object.create is a shim and doesn't support 'null' as the first argument.")
            }
            if (typeof d != "undefined") throw new Error("This browser's implementation of Object.create is a shim and doesn't support a second argument.");

            function dT() {}
            dT.prototype = h;
            return new dT
        }
    }
    var d = function(h, dT) {
        if (dT.length >= h.length) {
            return h.apply(h, dT)
        }
        return function() {
            if (arguments.length == 0) arguments = [null];
            return d(h, dT.concat([].slice.apply(arguments)))
        }
    };
    var dT = function(h) {
        if (typeof h != "function") return null;
        return function() {
            if (arguments.length == 0) arguments = [null];
            return d(h, [].slice.apply(arguments))
        }
    };
    var a = function() {
        var h = arguments;
        return function(d) {
            for (var dT = 0; dT < h.length; dT++) {
                if (typeof h[dT] == "function") {
                    d = h[dT].call(null, d)
                }
            }
            return d
        }
    };
    var e = dT(function(h, d) {
        return String.prototype.match.call(d, h) || []
    });
    var eE = dT(function(h, d, dT) {
        return String.prototype.replace.call(dT, h, d)
    });
    var g = eE(/^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g, "");
    var I = dT(function(h, d, dT, a) {
        if (!F(h)) h = false;
        if (!F(d)) d = "0";
        a = parseInt(a);
        if (!A(a)) a = a + "";
        var e = dT - a.length;
        var eE = "";
        while (eE.length < e) {
            eE += d
        }
        eE = eE.substring(0, e);
        return h ? a + eE : eE + a
    });
    var c = dT(function(h, d) {
        switch (h) {
            case "array":
                return Object.prototype.toString.call(d) === "[object Array]";
                break;
            case "object":
                return Object.prototype.toString.call(d) === "[object Object]";
                break;
            case "regexp":
                return Object.prototype.toString.call(d) === "[object RegExp]";
                break;
            default:
                return typeof d == h
        }
    });
    var L = c("object");
    var b = c("function");
    var A = c("string");
    var cb = c("number");
    var cW = c("boolean");
    var gg = c("array");
    var f = c("regexp");
    var F = function(h) {
        return h != null
    };
    var da = function(h) {
        if (!F(h)) return true;
        if (gg(h)) h = h.toString();
        if (A(h)) return g(h).length === 0;
        if (L(h)) {
            for (var d in h) {
                if (h.hasOwnProperty(d)) {
                    return false
                }
            }
            return true
        }
        if (Math.abs(h - 0) === 0) return true;
        return false
    };
    var eb = function(h) {
        return !da(h)
    };
    var fT = dT(function(h, d) {
        return document.documentElement[h] || document.body[h] || 0
    });
    var gd = dT(function(h, d) {
        return fT("clientWidth", "") >= h
    });
    var cG = a(e(/(iPhone|iPod|ios|iPad)/i), eb);
    var bL = a(e(/Android/i), eb);
    var dD = a(e(/(phone|pad|pod|iPhone|iPod|ios|iPad|Android|Mobile|BlackBerry|IEMobile|MQQBrowser|JUC|Fennec|wOSBrowser|BrowserNG|WebOS|Symbian|Windows Phone)/i), eb);
    var ae = function() {
        var h = navigator.userAgent;
        if (cG(h)) return "ios";
        if (bL(h)) return "android";
        if (dD(h)) return "mobile";
        return false
    };
    var eA = function(h) {
        var d;
        if (L(h)) {
            d = {};
            for (var dT in h) {
                if (h.hasOwnProperty(dT)) {
                    d[dT] = this.deepCopy(h[dT])
                }
            }
        } else {
            d = h
        }
        return d
    };
    var cK = function(h) {
        var d = [];
        if (L(h)) {
            for (var dT in h) {
                if (h.hasOwnProperty(dT)) {
                    if (L(h[dT])) {
                        d.push(this.toArray(h[dT]))
                    } else {
                        d.push(h[dT])
                    }
                }
            }
        } else {
            d.push(h)
        }
        return d
    };
    var fD = function(h) {
        return JSON.stringify(h)
    };
    var dV = function(h) {
        var d;
        try {
            d = JSON.parse(h)
        } catch (h) {
            d = null;
            console.dir(h)
        }
        return d
    };
    var ga = e(/^\d{4}[-\/][01]\d[-\/][0-3]\d(\s+[0-2]\d(:[0-5]\d(:[0-5]\d)?)?)?/gi);
    var cf = function(h, d, dT) {
        if (!A(d) || !A(dT) || !ga(d) || !ga(dT)) {
            console.dir("date format is wrong");
            return null
        }
        d = new Date(eE(/\-/g, "/", d)).getTime();
        dT = new Date(eE(/\-/g, "/", dT)).getTime();
        if (isNaN(d) || isNaN(dT)) {
            console.dir("date format is wrong");
            return null
        }
        var a = dT - d;
        var e = 1;
        switch (h) {
            case "week":
                e = 7 * 24 * 3600 * 1e3;
                break;
            case "day":
                e = 24 * 3600 * 1e3;
                break;
            case "hour":
                e = 3600 * 1e3;
                break;
            case "minute":
                e = 60 * 1e3;
                break;
            case "second":
                e = 1e3;
                break;
            default:
                e = 1
        }
        return Math.floor(a / e)
    };
    var ai = function(h) {
        var d, dT = new RegExp("(^| )" + h + "=([^;]*)(;|$)");
        if (d = document.cookie.match(dT)) {
            return decodeURIComponent(d[2])
        }
        return ""
    };
    var ci = function(h, d, dT, a) {
        if (!F(dT)) dT = 1;
        dT = dT - 0;
        if (isNaN(dT)) dT = 1;
        if (!F(a)) {
            path = ";path=/"
        } else {
            path = ""
        }
        var e = new Date;
        e.setTime(e.getTime() + dT * 24 * 60 * 60 * 1e3);
        var eE = "expires=" + e.toUTCString();
        document.cookie = h + "=" + encodeURIComponent(d) + "; " + eE + path
    };
    var cI = function(h) {
        ci(h, "", -1)
    };
    var dT_ = function() {
        return true
    };
    var i = function() {
        return false
    };
    var j = function(h) {
        return function() {
            return h
        }
    };
    var k = function(h) {
        var d;
        return function() {
            return d || (d = h.apply(d, arguments))
        }
    };
    var l = {
        curry: dT,
        flow: a,
        of: j,
        getSingle: k,
        returnFalse: i,
        returnTrue: dT_,
        match: e,
        replace: eE,
        deepCopy: eA,
        toArray: cK,
        jsonEncode: fD,
        jsonDecode: dV,
        lpad: I(),
        rpad: I(true),
        getCookie: ai,
        setCookie: ci,
        delCookie: cI,
        isObject: L,
        isString: A,
        isBoolean: cW,
        isNumber: cb,
        isArray: gg,
        isFunction: b,
        isRegExp: f,
        isExist: F,
        isEmpty: da,
        isNotEmpty: eb,
        dateDiff: cf,
        clientWidthBigThen: gd,
        getDocument: fT
    };
    var l = Object.create(l);
    l.trim = g;
    l.isMobile = ae;
    l.sm = gd(768);
    l.md = gd(992);
    l.lg = gd(1200);
    l.st = fT("scrollTop");
    l.ct = fT("clientHeight");
    l.cl = fT("clientWidth");
    h.orz = l
})(window);
(function(h) {
    orz.isjQuery = function(h) {
        return h instanceof jQuery
    };
    orz.isScrolling = function() {
        if (h("body").hasClass("scrolling")) return true;
        return false
    };
    orz.startScroll = function(d) {
        h("body").addClass("scrolling");
        if (orz.isjQuery(d)) {
            d.trigger("startScroll")
        }
    };
    orz.endScroll = function(d) {
        h("body").removeClass("scrolling");
        if (orz.isjQuery(d)) {
            d.trigger("endScroll")
        }
    }
})(jQuery);
(function(h) {
    orz.scrollTo = function(d, dT, a) {
        if (orz.isMobile()) return;
        if (orz.isScrolling()) return;
        if (!orz.isjQuery(d)) return;
        var e = d;
        if (e.length < 1) return;
        var eE = h(this);
        var g = dT - 0;
        var I = 1e3;
        var c = orz.st();
        var dT = e.offset();
        var L = dT.top;
        if (!isNaN(g)) L = L + g;
        var b = Math.abs(c - L);
        if (isNaN(a) || a <= 0) a = I * b / 4e3;
        orz.startScroll(eE);
        h("html,body").animate({
            scrollTop: L
        }, a, function() {
            orz.endScroll(eE)
        });
        return false
    }
})(jQuery);
jQuery(function(h) {
    function d(h) {
        var d = h.attr("data-href");
        if (!d) {
            d = h.attr("href")
        }
        var dT = d.split("#");
        var a = location.href;
        var e = a.split("#");
        if (dT[0] && dT[0] != e[0]) {
            return ""
        }
        return dT.pop()
    }
    h("body").on("click", ".auto-scroll", function() {
        if (orz.isMobile()) return;
        if (orz.isScrolling()) return;
        var dT = d(h(this));
        if (!dT) return;
        var a = h("#" + dT);
        if (a.length < 1) return;
        var e = h(this);
        var eE = h(this).attr("data-offset") - 0;
        var g = h(this).attr("data-speed") - 0;
        orz.scrollTo(a, eE, g);
        return false
    })
});
(function(h) {
    var d = h(".part");
    if (d.length < 1) return;
    var dT = [];

    function a() {
        d.each(function() {
            var d = h(this).offset();
            dT.push(Math.floor(d.top))
        })
    }

    function e(d) {
        var dT = h("#goto dd");
        var a = h("#goto dt");
        if (dT.length < 1) return;
        var e = dT.outerHeight();
        if (!dT.eq(d).hasClass("current")) {
            dT.removeClass("current");
            dT.eq(d).addClass("current");
            a.animate({
                top: e * d + (dT.outerHeight() - a.outerHeight()) / 2 + 1
            }, 50)
        }
    }

    function eE() {
        var h = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        var a = Math.ceil(h + 78);
        var eE = 0;
        for (var g = 0; g < dT.length; g++) {
            if (a >= dT[g]) {
                eE = g
            } else {
                break
            }
        }
        if (eE < 0) eE = 0;
        if (!d.eq(eE).hasClass("current")) {
            d.removeClass("current");
            d.eq(eE).addClass("current");
            e(eE)
        }
    }
    a();
    setTimeout(eE, 0);
    h(window).on("scroll", eE)
})(jQuery);
(function(h) {
    var d = h(".quick-nav");
    if (d.length < 1) return;
    var dT = d.children(".content-sidebar");
    if (dT.length < 1) return;
    var a = d.parent();
    if (a.length < 1) return;
    var e = 0,
        eE = 0,
        g = 0;

    function I() {
        var h = d.offset();
        e = h.top;
        eE = e + a.height();
        c()
    }

    function c() {
        g = dT.height()
    }

    function L() {
        dT.removeClass("fixed");
        dT.removeClass("absolute")
    }

    function b() {
        var h = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop || 0;
        if (h <= e) {
            L()
        }
        if (h >= eE - g) {
            dT.removeClass("fixed");
            dT.addClass("absolute");
            return
        }
        if (h < eE - g && h > e) {
            dT.removeClass("absolute");
            dT.addClass("fixed")
        }
    }
    var A = h(".content-sidebar dl");
    if (A.length < 1) return;
    var cb = h(".part");
    if (cb.length < 1) return;
    var cW = [];
    cb.each(function() {
        var d = h(this).attr("data-title");
        var dT = h(this).attr("id");
        if (d && dT) {
            cW.push({
                title: d,
                id: dT
            })
        }
    });
    var gg = "";
    gg += '<dt><span class="show-list"></span></dt>';
    for (var f = 0; f < cW.length; f++) {
        gg += '<dd><a href="#' + cW[f].id + '" class="auto-scroll" rel="nofollow" data-offset="-78" data-speed=500>' + cW[f].title + "</a></dd>"
    }
    A.html(gg);
    I();
    b();
    h(window).on("resize", I);
    h(window).on("scroll", b);
    window.onload = function() {
        I()
    }
})(jQuery);
(function(h) {
    var d = h(".focus");
    if (d.length < 1) return;
    var dT = d.children("a");
    if (dT.length < 1) return;
    dT.each(function(d) {
        var dT = d % 4;
        h(this).css("animation-delay", dT * .1 + "s")
    });

    function a() {
        dT.toggleClass("hide");
        setTimeout(a, 5e3)
    }
    setTimeout(a, 5e3)
})(jQuery);
(function(h) {
    var d = h(".primary-menus");
    if (d.length < 1) return;
    var dT = d.find(".selects");
    if (dT.length < 1) return;
    var a = dT.children("li");
    if (a.length < 1) return;
    var e = d.find(".search");
    var eE = e.find(".s").val();
    a.on("click", function() {
        var d = h(this).attr("data-target");
        if (d) {
            a.removeClass("current");
            h(this).addClass("current");
            e.addClass("hidden");
            e.filter("#" + d).removeClass("hidden");
            e.filter("#" + d).find(".s").trigger("focusin")
        }
    });
    e.find(".s").on("focusin", function() {
        if (h(this).val() == eE) {
            h(this).val("")
        }
    });
    e.find(".s").on("focusout", function() {
        var d = h(this).val();
        if (orz.isEmpty(d)) {
            d = eE
        }
        e.find(".s").val(d)
    })
})(jQuery);
(function(h) {
    h("input.s").on("focusin", function() {
        h(this).select()
    })
})(jQuery);
$(function() {
    var h = $("#flink a");
    h.addClass("fa fa-star-o")
});
$(function() {
    $(window).scroll(function() {
        var h = $(window).scrollTop();
        if (h > 1) {
            $("#backtop").fadeIn().css({
                bottom: "170px"
            });
            $("#quick_submit").fadeIn().css({
                bottom: "220px"
            })
        } else {
            $("#backtop").fadeOut();
            $("#quick_submit").fadeOut()
        }
    });
    $("#backtop").click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 300);
        $(this).animate({
            bottom: "1500px"
        }, 500)
    })
});
$(document).ready(function() {
    var h = document.location;
    $("#divNavBar a").each(function() {
        if (this.href == h.toString().split("#")[0]) {
            $(this).addClass("on");
            return false
        }
    })
})
/*!* jquery.tooltip.js 0.0.1 - https://github.com/yckart/jquery.tooltip.js*/
;
(function(h, d, dT) {
    var a = "tooltip",
        e = {
            fade: false,
            fallback: "",
            align: "autoTop",
            html: false,
            attr: "title",
            trigger: {
                show: "ontouchend" in dT ? "touchstart" : "mouseenter",
                hide: "ontouchend" in dT ? "touchend" : "mouseleave"
            },
            delay: {
                show: 0,
                hide: 0
            }
        };

    function eE(a, eE) {
        eE = h.extend({}, e, eE);
        var g = h(a),
            I;
        g.on("tooltip:show " + eE.trigger.show, function() {
            h.data(this, "cancel.tooltip", true);
            var a = h.data(this, "active.tooltip");
            if (!a) {
                a = h('<div class="tooltip"><div class="tooltip-inner"/></div>').css({
                    position: "absolute",
                    zIndex: 1e5
                });
                h.data(this, "active.tooltip", a)
            }
            if (g.attr("title") || typeof g.attr("original-title") !== "string") {
                g.attr("original-title", g.attr("title") || "").removeAttr("title")
            }
            var e;
            if (typeof eE.attr === "string") {
                e = g.attr(eE.attr === "title" ? "original-title" : eE.attr)
            } else {
                if (typeof eE.attr == "function") {
                    e = eE.attr.call(this)
                }
            }
            a.find(".tooltip-inner")[eE.html ? "html" : "text"](e || eE.fallback);
            var c = h.extend({}, g.offset(), {
                width: this.offsetWidth,
                height: this.offsetHeight
            });
            a[0].className = "tooltip";
            a.remove().css({
                top: 0,
                left: 0,
                opacity: 0
            }).appendTo(dT.body);
            var L = a[0].offsetWidth,
                b = a[0].offsetHeight,
                A = eE.align === "autoTop" ? c.top > h(dT).scrollTop() + h(d).height() / 2 ? "t" : "b" : c.left > h(dT).scrollLeft() + h(d).width() / 2 ? "l" : "r";
            switch (eE.align.charAt(0) === "a" ? A : eE.align.charAt(0)) {
                case "b":
                    a.css({
                        top: c.top + c.height,
                        left: c.left + c.width / 2 - L / 2
                    }).addClass("tooltip-bottom");
                    break;
                case "t":
                    a.css({
                        top: c.top - b,
                        left: c.left + c.width / 2 - L / 2
                    }).addClass("tooltip-top");
                    break;
                case "l":
                    a.css({
                        top: c.top + c.height / 2 - b / 2,
                        left: c.left - L
                    }).addClass("tooltip-left");
                    break;
                case "r":
                    a.css({
                        top: c.top + c.height / 2 - b / 2,
                        left: c.left + c.width
                    }).addClass("tooltip-right");
                    break
            }
            clearTimeout(I);
            a.stop().delay(eE.delay.show).fadeTo(eE.fade ? eE.fade.duration : 0, eE.fade.opacity || .8, eE.fade.complete)
        });
        g.on("tooltip:hide " + eE.trigger.hide, function() {
            h.data(this, "cancel.tooltip", false);
            var d = this;
            I = setTimeout(function() {
                if (h.data(d, "cancel.tooltip")) {
                    return
                }
                var dT = h.data(d, "active.tooltip");
                if (eE.fade) {
                    dT.stop().fadeTo(eE.fade.duration, 0, function() {
                        dT.remove();
                        if (eE.fade.complete) {
                            eE.fade.complete(true)
                        }
                    })
                } else {
                    dT.remove()
                }
            }, eE.delay.hide)
        })
    }
    h.fn[a] = function(d) {
        return this.each(function() {
            if (!h.data(this, "plugin_" + a)) {
                h.data(this, "plugin_" + a, new eE(this, d))
            }
        })
    }
})(jQuery, window, document);
! function(h, d) {
    ! function() {
        for (var h = 0, dT = ["ms", "moz", "webkit", "o"], a = 0; a < dT.length && !d.requestAnimationFrame; ++a) d.requestAnimationFrame = d[dT[a] + "RequestAnimationFrame"], d.cancelAnimationFrame = d[dT[a] + "CancelAnimationFrame"] || d[dT[a] + "CancelRequestAnimationFrame"];
        d.requestAnimationFrame || (d.requestAnimationFrame = function(dT) {
            var a = (new Date).getTime(),
                e = Math.max(0, 16 - (a - h)),
                eE = d.setTimeout(function() {
                    dT(a + e)
                }, e);
            return h = a + e, eE
        }), d.cancelAnimationFrame || (d.cancelAnimationFrame = function(h) {
            clearTimeout(h)
        })
    }();
    var dT = {
        POS_SCHEME_STATIC: 100,
        POS_SCHEME_FIXED: 200,
        POS_SCHEME_ABSOLUTE: 300,
        create: function(h, d) {
            return "undefined" == typeof d && (d = {}), Object.create(dT).init(h, d)
        },
        init: function(h, a) {
            return this.constructor = dT, this.window = d, this.element = h, this.container = h.parentNode, this.posScheme = dT.POS_SCHEME_STATIC, this.isTicking = !1, this.threshold = null, this.options = a, this.boundingBoxHeight = null, this.latestKnownScrollY = this.window.pageYOffset, this.validateContainerPosScheme(), this.setOffsetTop(), this.setOffsetBottom(), this.calcThreshold(), this.setElementWidth(), this.setBoundingBoxHeight(), this.createPlaceholder(), this.subscribeToWindowScroll(), this
        },
        validateContainerPosScheme: function() {
            var h = this.container.style.position;
            "relative" != h && "absolute" != h && (this.container.style.position = "relative")
        },
        setOffsetTop: function() {
            if ("number" == typeof this.options.offsetTop && this.options.offsetTop >= 0) this.offsetTop = this.options.offsetTop;
            else {
                var h = parseInt(this.window.getComputedStyle(this.container).borderTopWidth, 10),
                    d = parseInt(this.window.getComputedStyle(this.container).paddingTop, 10);
                this.offsetTop = h + d
            }
        },
        setOffsetBottom: function() {
            var h = parseInt(this.window.getComputedStyle(this.container).borderBottomWidth, 10),
                d = parseInt(this.window.getComputedStyle(this.container).paddingBottom, 10);
            this.offsetBottom = h + d
        },
        calcThreshold: function() {
            this.threshold = this.getElementDistanceFromDocumentTop() - this.offsetTop
        },
        setElementWidth: function() {
            var h = this.window.getComputedStyle(this.element).width;
            this.element.style.width = h
        },
        setBoundingBoxHeight: function(h) {
            this.boundingBoxHeight = this.element.getBoundingClientRect().height, h === !0 && (this.placeholder.style.height = this.boundingBoxHeight + "px")
        },
        createPlaceholder: function() {
            var h = document.createElement("DIV"),
                d = this.element.getBoundingClientRect().width + "px",
                dT = this.boundingBoxHeight + "px",
                a = this.window.getComputedStyle(this.element).margin,
                e = this.window.getComputedStyle(this.element).float;
            h.style.display = "none", h.style.width = d, h.style.height = dT, h.style.margin = a, h.style.float = e, this.container.insertBefore(h, this.element), this.placeholder = h
        },
        subscribeToWindowScroll: function() {
            this.window.addEventListener("scroll", this.onScroll.bind(this))
        },
        onScroll: function() {
            this.isTicking || (this.latestKnownScrollY = this.window.pageYOffset, this.window.requestAnimationFrame(this.update.bind(this)), this.isTicking = !0)
        },
        isStatic: function() {
            return this.posScheme === dT.POS_SCHEME_STATIC
        },
        makeStatic: function() {
            this.element.style.position = "static", this.placeholder.style.display = "none", this.posScheme = dT.POS_SCHEME_STATIC
        },
        isFixed: function() {
            return this.posScheme === dT.POS_SCHEME_FIXED
        },
        makeFixed: function() {
            this.element.style.bottom = null, this.element.style.position = "fixed", this.element.style.top = this.offsetTop + "px", this.placeholder.style.display = "block", this.posScheme = dT.POS_SCHEME_FIXED
        },
        isAbsolute: function() {
            return this.posScheme === dT.POS_SCHEME_ABSOLUTE
        },
        makeAbsolute: function() {
            this.element.style.top = null, this.element.style.position = "absolute", this.element.style.bottom = this.offsetBottom + "px", this.placeholder.style.display = "block", this.posScheme = dT.POS_SCHEME_ABSOLUTE
        },
        update: function() {
            this.isTicking = !1, this.isBelowThreshold() ? this.isStatic() || this.makeStatic() : this.canStickyFitInContainer() ? this.isFixed() || this.makeFixed() : this.isAbsolute() || this.makeAbsolute()
        },
        isBelowThreshold: function() {
            return this.latestKnownScrollY < this.threshold ? !0 : !1
        },
        canStickyFitInContainer: function() {
            return this.getAvailableSpaceInContainer() >= this.boundingBoxHeight
        },
        getAvailableSpaceInContainer: function() {
            return this.container.getBoundingClientRect().bottom - this.offsetBottom - this.offsetTop
        },
        getElementDistanceFromDocumentTop: function() {
            var h = this.isStatic() ? this.element : this.placeholder,
                d = this.latestKnownScrollY + h.getBoundingClientRect().top;
            return d
        },
        refresh: function() {
            this.calcThreshold(), this.setBoundingBoxHeight(!0)
        }
    };
    h.fn.positionSticky = function(d) {
        return this.each(function() {
            var a = h(this),
                e = a.data("positionSticky");
            e || a.data("positionSticky", e = dT.create(this, d)), "string" == typeof d && e[d]()
        })
    }
}(jQuery, window);