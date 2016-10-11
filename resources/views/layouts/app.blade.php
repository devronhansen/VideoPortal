<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TSBW Video Portal</title>

    <!-- Fonts -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}

    <link rel="stylesheet" href="/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/googlefont-lato.css">
    <!-- Styles -->
    {{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
              integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">--}}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    {{-- <style>
         body {
             font-family: 'Lato';
         }

         .fa-btn {
             margin-right: 6px;
         }
     </style>--}}
    @yield('style')
</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                TSBW Video Portal
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                {{-- <li><a href="{{ url('/home') }}">Home</a></li> --}}
                <li><a href="{{ url('video') }}">Alle Videos</a></li>
                <li><a href="{{ url('about') }}">Über uns</a></li>
                <li><a href="{{ url('contact') }}">Kontakt</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Einloggen</a></li>
                    <li><a href="{{ url('/register') }}">Registrieren</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="/profile/{{Auth::user()->id}}"><i class="fa fa-btn fa-user"></i> Profil</a></li>
                            @if(Auth::user()->isAdmin)
                                <li><a href="{{ url('/posts') }}"><i class="fa fa-btn fa-archive"></i> Admin Ansicht</a>
                                </li>
                                <li><a href="{{ url('/categories') }}"><i class="fa fa-bars"></i></i> Kategorien</a>
                                </li>
                                <li><a href="{{ url('/user') }}"><i class="fa fa-users"></i></i> User</a>
                                </li>
                            @endif
                            <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i> Ausloggen</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>

@if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success:</strong> {{Session::get('success')}}
    </div>
@endif

@if(Session::has('error'))
    <div class="alert alert-danger" role="alert">
        <strong>Error:</strong> {{Session::get('error')}}
    </div>
@endif

@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <strong>Errors:</strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
    @yield('content')
</div>
<!-- JavaScripts -->
<script src="/javascript/jquery.min.js"></script>
<script src="/javascript/bootstrap.min.js"></script>
<script type="text/javascript">
    /**
     * jquery.matchHeight-min.js v0.6.0
     * http://brm.io/jquery-match-height/
     * License: MIT
     */
    (function (c) {
        var n = -1, f = -1, g = function (a) {
            return parseFloat(a) || 0
        }, r = function (a) {
            var b = null, d = [];
            c(a).each(function () {
                var a = c(this), k = a.offset().top - g(a.css("margin-top")), l = 0 < d.length ? d[d.length - 1] : null;
                null === l ? d.push(a) : 1 >= Math.floor(Math.abs(b - k)) ? d[d.length - 1] = l.add(a) : d.push(a);
                b = k
            });
            return d
        }, p = function (a) {
            var b = {byRow: !0, property: "height", target: null, remove: !1};
            if ("object" === typeof a)return c.extend(b, a);
            "boolean" === typeof a ? b.byRow = a : "remove" === a && (b.remove = !0);
            return b
        }, b = c.fn.matchHeight =
                function (a) {
                    a = p(a);
                    if (a.remove) {
                        var e = this;
                        this.css(a.property, "");
                        c.each(b._groups, function (a, b) {
                            b.elements = b.elements.not(e)
                        });
                        return this
                    }
                    if (1 >= this.length && !a.target)return this;
                    b._groups.push({elements: this, options: a});
                    b._apply(this, a);
                    return this
                };
        b._groups = [];
        b._throttle = 80;
        b._maintainScroll = !1;
        b._beforeUpdate = null;
        b._afterUpdate = null;
        b._apply = function (a, e) {
            var d = p(e), h = c(a), k = [h], l = c(window).scrollTop(), f = c("html").outerHeight(!0), m = h.parents().filter(":hidden");
            m.each(function () {
                var a = c(this);
                a.data("style-cache", a.attr("style"))
            });
            m.css("display", "block");
            d.byRow && !d.target && (h.each(function () {
                var a = c(this), b = "inline-block" === a.css("display") ? "inline-block" : "block";
                a.data("style-cache", a.attr("style"));
                a.css({
                    display: b,
                    "padding-top": "0",
                    "padding-bottom": "0",
                    "margin-top": "0",
                    "margin-bottom": "0",
                    "border-top-width": "0",
                    "border-bottom-width": "0",
                    height: "100px"
                })
            }), k = r(h), h.each(function () {
                var a = c(this);
                a.attr("style", a.data("style-cache") || "")
            }));
            c.each(k, function (a, b) {
                var e = c(b), f = 0;
                if (d.target)f =
                        d.target.outerHeight(!1); else {
                    if (d.byRow && 1 >= e.length) {
                        e.css(d.property, "");
                        return
                    }
                    e.each(function () {
                        var a = c(this), b = {display: "inline-block" === a.css("display") ? "inline-block" : "block"};
                        b[d.property] = "";
                        a.css(b);
                        a.outerHeight(!1) > f && (f = a.outerHeight(!1));
                        a.css("display", "")
                    })
                }
                e.each(function () {
                    var a = c(this), b = 0;
                    d.target && a.is(d.target) || ("border-box" !== a.css("box-sizing") && (b += g(a.css("border-top-width")) + g(a.css("border-bottom-width")), b += g(a.css("padding-top")) + g(a.css("padding-bottom"))), a.css(d.property,
                            f - b))
                })
            });
            m.each(function () {
                var a = c(this);
                a.attr("style", a.data("style-cache") || null)
            });
            b._maintainScroll && c(window).scrollTop(l / f * c("html").outerHeight(!0));
            return this
        };
        b._applyDataApi = function () {
            var a = {};
            c("[data-match-height], [data-mh]").each(function () {
                var b = c(this), d = b.attr("data-mh") || b.attr("data-match-height");
                a[d] = d in a ? a[d].add(b) : b
            });
            c.each(a, function () {
                this.matchHeight(!0)
            })
        };
        var q = function (a) {
            b._beforeUpdate && b._beforeUpdate(a, b._groups);
            c.each(b._groups, function () {
                b._apply(this.elements,
                        this.options)
            });
            b._afterUpdate && b._afterUpdate(a, b._groups)
        };
        b._update = function (a, e) {
            if (e && "resize" === e.type) {
                var d = c(window).width();
                if (d === n)return;
                n = d
            }
            a ? -1 === f && (f = setTimeout(function () {
                q(e);
                f = -1
            }, b._throttle)) : q(e)
        };
        c(b._applyDataApi);
        c(window).bind("load", function (a) {
            b._update(!1, a)
        });
        c(window).bind("resize orientationchange", function (a) {
            b._update(!0, a)
        })
    })(jQuery);
    (function () {
        $(function () {
            $('.thumbnail').matchHeight({
                byRow: true,
                property: 'height',
                target: null,
                remove: false
            });
        });
    })();
</script>
<script src="/javascript/action.js"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

@yield('scripts')
</body>
</html>
