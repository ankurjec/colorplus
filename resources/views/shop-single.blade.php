@extends('layouts.site-header')

@section('css')
@parent
<style>
    .product-rating i {
        font-size: 14px;
        color: rgb(255, 196, 0);
    }

    .product-rating i:nth-child(5) {
        color: rgb(146, 146, 146);
    }

    .modal-dialog {

        width: 360px;

    }

    .card-add {
        padding: 8px 14px;
        color: #e55039;
        text-decoration: none;
        border: 1px solid #e55039;
    }

    .card-add:hover {
        background-color: #e55039;
        color: white
    }


    .modal-header {

        background-color: #FFF;

        padding: 1px 16px;

        color: #FFF;

        border-bottom: 1px;

    }

    /* Default styles for the site logo */
    .site-logo {
        display: flex;
        align-items: center;
    }

    .site-logo img {
        margin-right: 10px;
    }

    /* Media query for smaller screens */
    @media (max-width: 768px) {
        .site-logo {
            flex-wrap: nowrap;
            justify-content: center;
            text-align: center;
        }

        .site-logo img {
            margin-right: 2px;
            height: 50px;
            width: 50px;
        }

        #zenith_title {
            font-size: 15px !important;
            margin-left: 5px;
        }


        .site-title {
            font-size: 79px;
            margin-left: 25px;
        }

        /* Add this rule to your CSS stylesheet */
        .modal-lower {
            margin-top: 50px;
            /* Adjust the value as needed */
        }

    }

    .center-align {
        display: table;
        height: 100%;
        overflow: hidden;
        text-align: center;
        width: 100%;
    }

    .center-align .wrapper {
        display: table-cell;
        vertical-align: middle;
        width: 100%;
    }

    .center-align .content {
        display: -moz-inline-stack;
        display: inline-block;
        text-align: left;
    }

    h3 {
        font-family: inherit;
        font-weight: bold;
        color: #CCC;
        font-size: 1.1em;
    }

    img {
        margin: 0 10px;
    }

    /* ddfullscreenimageviewer */
    body.revealviewer {
        overflow: hidden;
    }

    #fullscreencanvas {
        position: fixed;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        visibility: hidden;
        opacity: 0;
        background: white;
        z-index: 9000;
        pointer-events: none;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: opacity .3s, visibility 0s .3s;
    }

    body.revealviewer #fullscreencanvas {
        opacity: 1;
        pointer-events: auto;
        visibility: visible;
        transition: opacity .5s, visibility 0s .0s;
    }

    #fullscreenimagearea {
        max-width: 100%;
        max-height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: -100px;
        /* Adjust the percentage to your preference */
    }

    #fullscreencanvas img {
        max-width: 100%;
        max-height: 100%;
        width: auto;
        height: auto;
        cursor: pointer;
        transition: all .5s;

    }


    div#closeviewer {
        /* Large x close button  */
        width: 35px;
        height: 35px;
        overflow: hidden;
        display: block;
        position: fixed;
        cursor: pointer;
        text-indent: -1000px;
        z-index: 100000;
        top: 10px;
        right: 10px;
    }

    div#closeviewer::before,
    div#closeviewer::after {
        /* render large cross inside close button */
        content: "";
        display: block;
        position: absolute;
        width: 100%;
        height: 6px;
        background: black;
        top: 50%;
        opacity: 0;
        margin-top: -3px;
        -webkit-transform: rotate(0deg);
        transform: rotate(0deg);
        transition: transform .5s, opacity .5s;
    }

    body.revealviewer div#closeviewer::before {
        -webkit-transform: rotate(-45deg);
        transform: rotate(-45deg);
        opacity: 1;
    }

    body.revealviewer div#closeviewer::after {
        -webkit-transform: rotate(-135deg);
        transform: rotate(-135deg);
        opacity: 1;
    }

    /* Loading DIV CSS */
    #fullimageloadingdiv,
    #zoomioloadingdiv {
        position: fixed;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        visibility: hidden;
        overflow: hidden;
        display: flex;
        pointer-events: none;
        z-index: 10000;
        align-items: center;
        justify-content: center;
        background: white;
    }

    #fullimageloadingdiv .spinner {
        width: 40px;
        height: 40px;
        margin: 100px auto;
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    @-webkit-keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0);
        }

        100% {
            -webkit-transform: scale(1.0);
            opacity: 0;
        }
    }

    @keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        100% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
            opacity: 0;
        }
    }

    /* zoomio */
    #zoomiocontainer {
        /* container containing enlarged image (native sized image) */
        position: absolute;
        z-index: 9999;
        overflow: hidden;
        background: white;
        visibility: visible;
    }

    #zoomiocontainer img {
        /* image inside zoom container */
        width: auto;
        height: auto !important;
        position: absolute !important;
        display: block !important;
        cursor: move;
    }

    .disablepointer {
        pointer-events: none;
    }

    #zoomiocontainer.mobileclass {
        /* CSS class added to zoom container on mobile OS */
        overflow: scroll;
        -webkit-overflow-scrolling: touch;
    }

    #zoomioloadingdiv .spinner {
        width: 40px;
        height: 40px;
        margin: 100px auto;
        background-color: #333;
        border-radius: 100%;
        -webkit-animation: sk-scaleout 1.0s infinite ease-in-out;
        animation: sk-scaleout 1.0s infinite ease-in-out;
    }

    @-webkit-keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0);
        }

        100% {
            -webkit-transform: scale(1.0);
            opacity: 0;
        }
    }

    @keyframes sk-scaleout {
        0% {
            -webkit-transform: scale(0);
            transform: scale(0);
        }

        100% {
            -webkit-transform: scale(1.0);
            transform: scale(1.0);
            opacity: 0;
        }
    }


    /* opsional */
    .thumbnails {
        cursor: zoom-in;
        padding: 3rem !important;
        max-width: 100%;
        height: auto;
    }

    .thumbnails:hover {
        cursor: pointer;
        /* Add any other styles you want to apply on hover */
    }


    .mobileShow {
        display: none;
    }

    /* Smartphone Portrait and Landscape */
    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
        .mobileShow {
            display: inline;
        }
    }


    .mobileHide {
        display: inline;
    }

    /* Smartphone Portrait and Landscape */
    @media only screen and (min-device-width : 320px) and (max-device-width : 480px) {
        .mobileHide {
            display: none;
        }
    }


    /* Custom styles to make the modal look like a page */
    .modal-content.page-style {
        border: none;
        border-radius: 0;
        box-shadow: none;
    }

    .modal-header.page-style {
        border-bottom: none;
    }

    .modal-dialog.page-style {
        width: 100%;
        height: 100%;
        margin: 0;
    }

    .modal-body.page-style {
        padding: 0;
    }

    .modal-footer.page-style {
        border-top: none;
    }

    /* .thumbnails:hover,
                                      .zoomio,
                                      .nolargeimg {
                                        cursor: url('https://cdn3.iconfinder.com/data/icons/cursor/100/fb_Cursor_39-512.png') 16 16, auto;
                                      } */


    /* New Code Single Product */
    .single-product-container {
        padding: 0% 8% 0%;
        /* background-color: #b53c29; */
        width: 100vw;
        height: auto;
    }

    .product-img {
        width: 400px;
        height: 500px;
        overflow: hidden;
        border: 1px solid rgb(230, 230, 230);
    }

    .product-img img {
        width: 100%;
        height: auto;
        margin: auto;
        padding: 50px;
    }

    .single-product {
        display: flex;
        gap: 40px;
    }

    .product-desc {
        width: 40%;
    }

    .short-info {
        font-size: 14px;
        line-height: 20px;
        color: gray;
    }

    hr {
        margin: 15px 0px;
        outline: none;
        border-bottom: 1px solid rgb(199, 199, 199);
    }

    .product-brand {
        display: flex;
        flex-direction: column;
        gap: 5px;
    }

    .price-product {
        color: #e55039;
        font-size: 22px;
        font-weight: 600;
        margin-top: 15px;
        margin-bottom: 20px;
    }

    .brand-items {
        font-weight: 500;
    }

    .brand-items span {
        font-size: 14px;
        color: gray;
        font-weight: 400;
    }

    /* .cart-add {
                padding: 12px 18px;
                background-color: #e55039;
                color: white;
                text-decoration: none;
            } */
    button {
        padding: 8px 16px;
        background-color: #e55039;
        color: white;
        text-decoration: none;
        border: 1px solid #e55039;
        border-radius: 5px;
        transition: all .3s ease-in-out
    }

    button:hover {
        background-color: transparent;
        color: #e55039;
    }

    .desc-info {
        width: 100%;
        height: auto;
        margin: 50px auto;
        border: 1px solid gray;
        border-radius: 5px;
        padding: 10px;
    }

    @media screen and (max-width:600px) {
        .single-product {
            flex-direction: column;
        }

        .product-desc {
            width: 100%;
        }

        .product-img {
            width: auto;
            height: auto;
            overflow: hidden;
            border: 1px solid rgb(230, 230, 230);
        }

        .tabContainer {
            flex-direction: column;
        }

    }

    .tabContainer {
        display: flex;
        background-color: cornsilk;
    }

    .tabButton {
        cursor: pointer;
        padding: 10px 20px;
    }

    .tabContent {
        display: none;
        padding: 20px;
        border-radius: 0 0 5px 5px;
        background-color: #f9f9f9;
        width: 100%;
    }

    .tabContent.active {
        display: block;
    }



    /* Table css code */
    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .custom-table th,
    .custom-table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    .custom-table th {
        background-color: #f2f2f2;
    }

    .custom-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
</style>
@endsection
{{-- @section('page-title', 'Store / ' . ucwords(strtolower($productDetails->name))) --}}


@section('page-title')
{!! '<a href="' . route('shop') . '">Store</a> / ' . ucwords(strtolower($productDetails->name)) !!}
@endsection

@section('content')
</header>
<div class="site-wrap">

    <div class="site-section">

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <!-- Add image inside the body of modal -->
                    <div class="modal-body">
                        @foreach ($productDetails->images as $image)
                        {{-- {{$image->url}} --}}
                        @if ($image->url)
                        <?php echo $productDetails['image']; ?>
                        {{-- <a href="#" data-toggle="#" data-target="#"> --}}
                            {{-- <img src="{{ url($image->url) }}" alt="Product Image" style="width:100%;"
                                class="img-fluid p-5"> --}}

                            <img src="{{ url($image->url) }}" href="#" class="thumbnails" style="width:100%;"
                                data-large="{{ url($image->url) }}" />


                            {{-- </a> --}}
                        @endif
                        @endforeach
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>

        {{-- New Product Code --}}
        <div class="single-product-container">
            <div class="single-product">
                @foreach ($productDetails->images as $image)
                @if ($image->url)
                <div class="product-img">
                    <img src="{{ url($image->url) }}" alt="">
                </div>
                @endif
                @endforeach
                <div class="product-desc">
                    {{-- <h3 class="product-name">{{ ucwords(strtolower($productDetails->name)) }}</h3> --}}
                    <h3 class="text-2xl font-bold mb-2">{{ ucwords(strtolower($productDetails->name)) }}</h3>


                    <div class="short-info">
                        {{ strip_tags($productDetails->details) }}
                    </div>
                    <hr class="w-[80%] my-2">

                    <div class="flex items-center gap-6 my-2">
                        <div class="product-rating">
                            <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                                class="fa-solid fa-star"></i>
                        </div>
                        <div class="review"><a href="#">75 Review</a></div>
                    </div>
                    <div class="product-brand">
                        <div class="brand-items">Store: <span>Zenith Agro Science</span></div>

                    </div>
                    <hr>
                    <div class="product-brand">
                        <div class="brand-items">

                            {{-- Brand: <span>Zenith Agro Science</span> --}}
                        </div>
                    </div>
                    <form action="{{ route('shoppingcart.store') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $productDetails->id }}" />
                        <input type="hidden" name="quantity" value="1" />
                        
                        <div class="price-product">
                            <span style='font-family:Arial; color: black;'>&#8377;{{ $productDetails->discount_amount ?? $productDetails->price }}</span>
                            @if(isset($productDetails->discount_amount))
                            <span>
                                <del class="text-red">&#8377;{{ $productDetails->price }}</del>
                                <span class="text-white bg-[#e55039] p-1 text-[14px]">{{ round($productDetails->discount_percentage) }}% OFF</span>
                            </span>
                            @endif
                        </div>
                    
                        @if ($productAlreadyInCart)
                        <p>
                            <a href="{{ route('cart') }}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary cart-add">
                                Go To Cart
                            </a>
                        </p>
                        <p id="cart-message" style="display: none;">Product already in cart.</p>
                        @else
                        <div style="display: flex; gap: 10px;">
                            <button type="submit" class="card-add">Add To Cart</button>
                            <a href="{{ route('design.create', ['product_id' => $productDetails->id]) }}" class="create-design btn btn-secondary">
                                Create Your Design
                            </a>
                        </div>
                        @endif
                    </form>
                    

                </div>

            </div>
            <div class="desc-info">
                <div class="tabContainer">
                    <div class="tabButton" onclick="openTab('tab1')">Description</div>
                </div>

                <div id="tab1" class="tabContent active">

                    <hr>
                    <p>
                        {{ strip_tags(html_entity_decode($productDetails->description)) }}
                    </p>
                </div>

                <div id="tab2" class="tabContent">
                    <table class="table custom-table">
                        <thead>

                        </thead>
                        <tbody>
                            <tr>

                            </tr>
                            <tr>

                            </tr>
                            <tr>

                            </tr>

                        </tbody>
                    </table>
                </div>

                <div id="tab3" class="tabContent">
                    <table class="table custom-table">

                        <tbody>
                            <tr>

                            </tr>
                            <tr>

                            </tr>
                            <tr>

                            </tr>
                            <tr>

                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <script src="/js/jquery-3.3.1.min.js"></script>
    <script src="/js/jquery-ui.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/panzoom@5.4.0/dist/panzoom.min.js"></script>

    <script src="/js/main.js"></script>

    <script>
        $(document).ready(function() {
                ! function(i) {
                    function e(i) {
                        var e = Math.min(window.innerWidth / i.width, window.innerHeight / i.height);
                        return e
                    }

                    function t(t, n) {
                        a || (i(document.body).append(r), a = i("#fullscreencanvas"), s = i("#fullscreenimagearea"), d =
                            i("#closeviewer"), l = i("#fullimageloadingdiv"), d.on("click", function() {
                                i(document.body).removeClass("revealviewer"), s.data("$largeimage").unbind(), s
                                    .empty(), l.css("visibility", "hidden")
                            }));
                        var o = t.attr("data-scale") || n.scale,
                            c = t.attr("data-large") || n.largeimage || t.attr("src");
                        t.on("click", function() {
                            i(document.body).addClass("revealviewer"), this.getAttribute("data-large") && l.css(
                                "visibility", "visible");
                            var t = new Image,
                                n = i(t);
                            n.on("load", function() {
                                var i = e(t);
                                if (s.html('<img src="' + t.src + '" style="width:' + t.width * i +
                                        "px; height:" + t.height * i + 'px;" />'), l.css("visibility",
                                        "hidden"), o > 1) {
                                    var n = s.find("img:eq(0)");
                                    n.zoomio({
                                        scale: o,
                                        fixedcontainer: !0
                                    })
                                }
                            }), t.src = c, s.data("$largeimage", n)
                        })
                    }
                    var n = window.matchMedia ? window.matchMedia("screen and (max-device-width: 680px)") : {
                            matches: !1,
                            addListener: function() {}
                        },
                        o = {
                            scale: 1
                        },
                        a = null,
                        s = null,
                        d = null,
                        l = null,
                        r =
                        '<div id="fullscreencanvas"><div id="fullscreenimagearea"></div></div><div id="fullimageloadingdiv"><div class="spinner"></div></div><div id="closeviewer" title="Close Viewer">Close</div>';
                    i.fn.fullscreenimage = function(e) {
                        var a = i.extend({}, o, e);
                        return this.each(function() {
                            var e = i(this);
                            return e = e.is("img") ? e : e.find("img:eq(0)"), 0 == e.length || n.matches ? !
                                0 : void t(e, a)
                        })
                    }
                }(jQuery);

                ! function(i) {
                    function t(i) {
                        return {
                            w: i.width(),
                            h: i.height()
                        }
                    }

                    function e(i, t) {
                        return i.offsetParent ? i[t] + e(i.offsetParent, t) : i[t]
                    }

                    function o(o, c) {
                        var r = c || a,
                            u = l ? "click" : "mouseenter";
                        o.off(u).on(u, function(a) {
                            if ("visible" != n.css("visibility") || 1 != n.queue("fx").length || f != o) {
                                f = o;
                                var u, h = a,
                                    a = h.originalEvent.changedTouches ? h.originalEvent.changedTouches[0] : h;
                                if (1 == c.fixedcontainer) {
                                    var v = o.offset();
                                    u = {
                                        left: v.left,
                                        top: v.top
                                    }
                                } else u = {
                                    left: e(o.get(0), "offsetLeft"),
                                    top: e(o.get(0), "offsetTop")
                                };
                                var p = [a.pageX - u.left, a.pageY - u.top],
                                    m = t(o),
                                    g = r.w || m.w,
                                    b = r.h || m.h;
                                n.stop().css({
                                    visibility: "hidden"
                                });
                                var y, w = i.Deferred(),
                                    z = o.attr("data-largesrc") || o.data("largesrc") || o.attr("src");
                                o.data("largesrc") && s.css({
                                        width: m.w,
                                        height: m.h,
                                        left: u.left,
                                        top: u.top,
                                        visibility: "visible",
                                        zIndex: 1e4
                                    }), n.html('<img src="' + z + '">'), y = n.find("img"), y.get(0).complete ?
                                    w.resolve() : y.on("load", function() {
                                        w.resolve()
                                    }), w.done(function() {
                                        n.css({
                                            width: g,
                                            height: b,
                                            left: u.left,
                                            top: u.top
                                        });
                                        var i = t(n);
                                        c.scale && y.css({
                                            width: o.width() * c.scale
                                        });
                                        var e = t(y);
                                        if (s.css({
                                                zIndex: 9998
                                            }), n.stop().css({
                                                visibility: "visible",
                                                opacity: 0
                                            }).animate({
                                                opacity: 1
                                            }, r.fadeduration, function() {
                                                s.css({
                                                    visibility: "hidden"
                                                })
                                            }), l) {
                                            var a = p[0] / m.w * (e.w - i.w),
                                                f = p[1] / m.h * (e.h - i.h);
                                            n.scrollLeft(a), n.scrollTop(f)
                                        }
                                        d = {
                                            $zoomimage: y,
                                            offset: u,
                                            settings: r,
                                            multiplier: [e.w / i.w, e.h / i.h]
                                        }
                                    }), o.off("mouseleave").on("mouseleave", function() {
                                        "resolved" != w.state() && (w.reject(), s.css({
                                            visibility: "hidden"
                                        }))
                                    }), h.stopPropagation()
                            }
                        })
                    }
                    var n, s, a = {
                            fadeduration: 500
                        },
                        d = {
                            $zoomimage: null,
                            offset: [, ],
                            settings: null,
                            multiplier: [, ]
                        },
                        f = i(),
                        l = null != navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i);
                    i.fn.zoomio = function(t) {
                        var e = i.extend({}, a, t);
                        return this.each(function() {
                            var t = i(this);
                            return t = t.is("img") ? t : t.find("img:eq(0)"), 0 == t.length ? !0 : void o(t,
                                e)
                        })
                    }, i(function() {
                        n = i('<div id="zoomiocontainer">').appendTo(document.body), s = i(
                            '<div id="zoomioloadingdiv"><div class="spinner"></div></div>').appendTo(
                            document.body), l ? (n.addClass("mobileclass"), n.on("touchstart", function(i) {
                            i.stopPropagation()
                        }), i(document).on("touchstart.dismisszoomio", function() {
                            d.$zoomimage && (s.css({
                                visibility: "hidden"
                            }), n.stop().animate({
                                opacity: 0
                            }, d.settings.fadeduration, function() {
                                i(this).css({
                                    visibility: "hidden",
                                    left: "-100%",
                                    top: "-100%"
                                })
                            }))
                        })) : (n.on("mouseenter", function() {}), n.on("mousemove", function(i) {
                            var t = d.$zoomimage,
                                e = d.offset,
                                o = [i.pageX - e.left, i.pageY - e.top],
                                n = d.multiplier;
                            t.css({
                                left: -o[0] * n[0] + o[0],
                                top: -o[1] * n[1] + o[1]
                            })
                        }), n.on("mouseleave", function() {
                            s.css({
                                visibility: "hidden"
                            }), n.stop().animate({
                                opacity: 0
                            }, d.settings.fadeduration, function() {
                                i(this).css({
                                    visibility: "hidden",
                                    left: "-100%",
                                    top: "-100%"
                                })
                            })
                        }))
                    })
                }(jQuery);


                jQuery(function() {
                    // Check if the screen width is greater than a certain value (e.g., 768 pixels)
                    if (window.innerWidth > 768) {
                        $('img.thumbnails').fullscreenimage({
                            scale: 2
                        });

                        $('.zoomio').zoomio({
                            fadeduration: 100,
                            maxwidth: '60%', // Adjust the width as per your requirement
                            lightbox: true,
                        });

                        $('.nolargeimg').zoomio({
                            w: '500px',
                            h: '400px'
                        });
                    }
                });

                // jQuery(function ($) {
                //     $('.thumbnails').zoomio({
                //         fadeduration: 200,
                //         lightbox: false,
                //         scale: 3, // Adjust the scale factor as needed
                //         beforezoomin: function () {
                //             $(this).css({
                //                 'max-width': 'none',
                //                 'width': '800px',
                //                 'height': 'auto'
                //             });
                //         },
                //         afterzoomout: function () {
                //             $(this).css({
                //                 'max-width': '',
                //                 'width': '800px',
                //                 'height': ''
                //             });
                //         }
                //     });
                // });
                // jQuery(function ($) {
                //     $('.thumbnails').zoomio({
                //         fadeduration: 200,
                //         lightbox: false,
                //         scale: 2, // Adjust the scale factor as needed
                //         w: '1900px', // Set the fixed width for the enlarged image
                // // h: '1200px',

                //         beforezoomin: function () {
                //             $(this).css({
                //                 'max-width': 'none',
                //                 'width': 'auto',
                //                 'height': 'auto'
                //             });
                //         },
                //         afterzoomout: function () {
                //             $(this).css({
                //                 'max-width': '',
                //                 'width': '',
                //                 'height': ''
                //             });
                //         },
                //         onzoom: function () {
                //             var zoomedWidth = $(this).width() * 5; // Assuming scale is 2, adjust accordingly
                //             var frameWidth = zoomedWidth + 920; // Adjust the frame width as needed

                //             $(this).css({
                //                 'width': frameWidth + 'px',
                //                 'box-shadow': '0 0 10px rgba(0, 0, 0, 0.5)', // Optional: Add box shadow
                //             });
                //         }
                //     });
                // });


                // jQuery(function ($) {
                //     $('img.thumbnails').fullscreenimage({
                //         scale: 2
                //     });

                //     $('.thumbnails').zoomio({
                //         fadeduration: 500,
                //         beforezoomin: function () {
                //             $(this).css('max-width', '60%'); // Adjust the width as per your requirement
                //         },
                //         afterzoomout: function () {
                //             $(this).css('max-width', ''); // Reset max-width after zoom out
                //         }
                //     });

                //     $('.nolargeimg').zoomio({
                //         w: '500px',
                //         h: '400px'
                //     });
                // });

                function alignModal() {
                    var modalDialog = $(this).find(".modal-dialog");

                    // Applying the top margin on modal to align it vertically center
                    modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
                }
                // Align modal when it is displayed
                $(".modal").on("shown.bs.modal", alignModal);

                // Align modal when user resize the window
                $(window).on("resize", function() {
                    $(".modal:visible").each(alignModal);
                });

                $("#imageLink").hover(function() {
                    $('#imageModal').modal('show');
                }, function() {
                    $('#imageModal').modal('hide');
                });
                document.addEventListener('DOMContentLoaded', function() {
                    var zoom = mediumZoom('[data-zoomable]');
                });
            });





            // Footer Description tab change JS
            function openTab(tabName) {
                var i, tabContent, tabButton;

                tabContent = document.getElementsByClassName("tabContent");
                for (i = 0; i < tabContent.length; i++) {
                    tabContent[i].style.display = "none";
                }

                tabButton = document.getElementsByClassName("tabButton");
                for (i = 0; i < tabButton.length; i++) {
                    tabButton[i].style.backgroundColor = "#0000";
                }

                document.getElementById(tabName).style.display = "block";
                event.currentTarget.style.backgroundColor = "#f9f9f9";
                // event.currentTarget.style.backgroundColor = "#D3D3D3"; 
            }
    </script>



    @endsection