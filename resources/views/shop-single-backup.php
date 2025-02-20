@extends('layouts.site-header')

@section('css')
@parent
<style>
  .modal-dialog {

    width: 360px;

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
</style>
@endsection
@section('page-title', 'Store / ' . $productDetails->name)

@section('content')
</header>
<div class="site-wrap">

  <!-- Login/Register Modal -->
  {{-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <!-- <h5 class="modal-title" id="loginModalLabel">Login or Register</h5> -->
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="nav nav-tabs" id="loginTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login"
                aria-selected="true">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                aria-controls="register" aria-selected="false">Register</a>
            </li>
          </ul>
          <div class="tab-content" id="loginTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
              <form>
                <br>
                <div class="form-group">
                  <input type="email" class="form-control" id="loginEmail" aria-describedby="emailHelp"
                    placeholder="Enter email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="loginPassword" placeholder="Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
              </form>
            </div>
            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
              <form>
                <br>
                <div class="form-group">
                  <input type="email" class="form-control" id="registerEmail" aria-describedby="emailHelp"
                    placeholder="Enter email">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="registerPassword" placeholder="Password">
                </div>
                <div class="form-group">
                  <input type="password" class="form-control" id="confirmPassword" placeholder="Confirm Password">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Register</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div> --}}
  <div class="site-section">
    {{-- <div class="mobileHide">
      LAPTOP
    </div>

    <div class="mobileShow">
      MOBILE
    </div>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
      Show image
    </button> --}}
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">

          <!-- Add image inside the body of modal -->
          <div class="modal-body">
            @foreach($productDetails->images as $image)
            {{-- {{$image->url}} --}}
            @if ($image->url)

            <?php echo $productDetails['image']; ?>
            {{-- <a href="#" data-toggle="#" data-target="#"> --}}
              {{-- <img src="{{ url($image->url) }}" alt="Product Image" style="width:100%;" class="img-fluid p-5"> --}}

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

    <div class="container">
      <div class="row">
        <div class="col-md-5 mr-auto">
          <div class="border text-center" style="width: 300px;border: 1px solid #a7a9af!important; border-radius: 5px;">
            @foreach($productDetails->images as $image)
            {{-- {{$image->url}} --}}
            @if ($image->url)

            <?php echo $productDetails['image']; ?>
            {{-- <a href="#" data-toggle="#" data-target="#"> --}}
              {{-- <img src="{{ url($image->url) }}" alt="Product Image" style="width:100%;" class="img-fluid p-5"> --}}

              <img src="{{ url($image->url) }}" href="#" class="thumbnails" style="width:100%;"
                data-large="{{ url($image->url) }}" />


              {{-- </a> --}}

            @endif
            @endforeach

          </div>
        </div>
        <!-- Modal -->
        <!-- Modal -->
        <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-xl" role="document"
            style="margin-top: 400px;z-index: 1050 !important;padding-top: 60px;">
            <div class="modal-content" style="border: 2px solid #007bff; border-radius: 10px;">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Large Image</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img src="{{ url($image->url) }}" alt="Large Image" style="width:100%;" class="img-fluid" data-zoomable>
              </div>
              {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div> --}}
            </div>
          </div>
        </div>


        <div class="col-md-6">
          <h2 class="text-black">{{$productDetails->name}}
          </h2>
          <p>{{$productDetails->description}}</p>

          <form action="{{ route('shoppingcart.store') }}" method="post">
            <p>

              {{-- <del>Rs.1995.00</del> --}}

              <strong class="text-primary h4">Rs.{{$productDetails->price}}</strong>
            </p>



            <div class="mb-5">
              <input type="hidden" name="product_id" value="{{$productDetails->id}}">
              <input type="hidden" name="product_price" value="{{$productDetails->price}}">

              <div class="input-group mb-3" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center" name="quantity" value="1" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>

            </div>
            {{-- @if($productAlreadyInCart)
            <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary" disabled>Add To
                Cart</button></p>
            <p>Product already in cart.</p>
            @else
            <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button>
            </p>
            @endif --}}

            @if($productAlreadyInCart)
            <p><a href="{{route('cart')}}" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary"
                id="add-to-cart-btn">Go To Cart</a></p>
            {{-- <p id="cart-message" style="display: none;">Product already in cart.</p> --}}
            @else
            <p><button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button>
            </p>
            @endif
            @csrf
          </form>
          <div class="mt-5">
            <ul class="nav nav-pills mb-3 custom-pill" id="pills-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
                  aria-controls="pills-home" aria-selected="true">Ordering Information</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
                  aria-controls="pills-profile" aria-selected="false">Specifications</a>
              </li>

            </ul>
            <div class="tab-content" id="pills-tabContent">
              <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                <table class="table custom-table">
                  <thead>
                    <th>Material</th>
                    <th>Description</th>
                    <th>Packaging</th>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">OTC022401</th>
                      <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                      <td>1 BT</td>
                    </tr>
                    <tr>
                      <th scope="row">OTC022401</th>
                      <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                      <td>144/CS</td>
                    </tr>
                    <tr>
                      <th scope="row">OTC022401</th>
                      <td>Pain Management: Acetaminophen PM Extra-Strength Caplets, 500 mg, 100/Bottle</td>
                      <td>1 EA</td>
                    </tr>

                  </tbody>
                </table>
              </div>
              <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">

                <table class="table custom-table">

                  <tbody>
                    <tr>
                      <td>HPIS CODE</td>
                      <td class="bg-light">999_200_40_0</td>
                    </tr>
                    <tr>
                      <td>HEALTHCARE PROVIDERS ONLY</td>
                      <td class="bg-light">No</td>
                    </tr>
                    <tr>
                      <td>LATEX FREE</td>
                      <td class="bg-light">Yes, No</td>
                    </tr>
                    <tr>
                      <td>MEDICATION ROUTE</td>
                      <td class="bg-light">Topical</td>
                    </tr>
                  </tbody>
                </table>

              </div>

            </div>
          </div>


        </div>
      </div>
    </div>
  </div>

  {{-- <div class="site-section bg-secondary bg-image" style="background-image: url('/images/wheat_2.jpg');">
    <div class="container">
      <div class="row align-items-stretch">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('/images/agri-prod.jpg');">
            <div class="banner-1-inner align-self-center">
              <h2 style="color: #FFF;">Agro Products</h2>
              <p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus
                rem odio voluptatem.
              </p>
            </div>
          </a>
        </div>
        <div class="col-lg-6 mb-5 mb-lg-0">
          <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('/images/agronomist_1.jpg');">
            <div class="banner-1-inner ml-auto  align-self-center">
              <h2 style="color: #FFF;">Rated by Experts</h2>
              <p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae ex ad minus
                rem odio voluptatem.
              </p>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div> --}}
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
  $(document).ready(function(){
    !function(i){function e(i){var e=Math.min(window.innerWidth/i.width,window.innerHeight/i.height);return e}function t(t,n){a||(i(document.body).append(r),a=i("#fullscreencanvas"),s=i("#fullscreenimagearea"),d=i("#closeviewer"),l=i("#fullimageloadingdiv"),d.on("click",function(){i(document.body).removeClass("revealviewer"),s.data("$largeimage").unbind(),s.empty(),l.css("visibility","hidden")}));var o=t.attr("data-scale")||n.scale,c=t.attr("data-large")||n.largeimage||t.attr("src");t.on("click",function(){i(document.body).addClass("revealviewer"),this.getAttribute("data-large")&&l.css("visibility","visible");var t=new Image,n=i(t);n.on("load",function(){var i=e(t);if(s.html('<img src="'+t.src+'" style="width:'+t.width*i+"px; height:"+t.height*i+'px;" />'),l.css("visibility","hidden"),o>1){var n=s.find("img:eq(0)");n.zoomio({scale:o,fixedcontainer:!0})}}),t.src=c,s.data("$largeimage",n)})}var n=window.matchMedia?window.matchMedia("screen and (max-device-width: 680px)"):{matches:!1,addListener:function(){}},o={scale:1},a=null,s=null,d=null,l=null,r='<div id="fullscreencanvas"><div id="fullscreenimagearea"></div></div><div id="fullimageloadingdiv"><div class="spinner"></div></div><div id="closeviewer" title="Close Viewer">Close</div>';i.fn.fullscreenimage=function(e){var a=i.extend({},o,e);return this.each(function(){var e=i(this);return e=e.is("img")?e:e.find("img:eq(0)"),0==e.length||n.matches?!0:void t(e,a)})}}(jQuery);

!function(i){function t(i){return{w:i.width(),h:i.height()}}function e(i,t){return i.offsetParent?i[t]+e(i.offsetParent,t):i[t]}function o(o,c){var r=c||a,u=l?"click":"mouseenter";o.off(u).on(u,function(a){if("visible"!=n.css("visibility")||1!=n.queue("fx").length||f!=o){f=o;var u,h=a,a=h.originalEvent.changedTouches?h.originalEvent.changedTouches[0]:h;if(1==c.fixedcontainer){var v=o.offset();u={left:v.left,top:v.top}}else u={left:e(o.get(0),"offsetLeft"),top:e(o.get(0),"offsetTop")};var p=[a.pageX-u.left,a.pageY-u.top],m=t(o),g=r.w||m.w,b=r.h||m.h;n.stop().css({visibility:"hidden"});var y,w=i.Deferred(),z=o.attr("data-largesrc")||o.data("largesrc")||o.attr("src");o.data("largesrc")&&s.css({width:m.w,height:m.h,left:u.left,top:u.top,visibility:"visible",zIndex:1e4}),n.html('<img src="'+z+'">'),y=n.find("img"),y.get(0).complete?w.resolve():y.on("load",function(){w.resolve()}),w.done(function(){n.css({width:g,height:b,left:u.left,top:u.top});var i=t(n);c.scale&&y.css({width:o.width()*c.scale});var e=t(y);if(s.css({zIndex:9998}),n.stop().css({visibility:"visible",opacity:0}).animate({opacity:1},r.fadeduration,function(){s.css({visibility:"hidden"})}),l){var a=p[0]/m.w*(e.w-i.w),f=p[1]/m.h*(e.h-i.h);n.scrollLeft(a),n.scrollTop(f)}d={$zoomimage:y,offset:u,settings:r,multiplier:[e.w/i.w,e.h/i.h]}}),o.off("mouseleave").on("mouseleave",function(){"resolved"!=w.state()&&(w.reject(),s.css({visibility:"hidden"}))}),h.stopPropagation()}})}var n,s,a={fadeduration:500},d={$zoomimage:null,offset:[,],settings:null,multiplier:[,]},f=i(),l=null!=navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/i);i.fn.zoomio=function(t){var e=i.extend({},a,t);return this.each(function(){var t=i(this);return t=t.is("img")?t:t.find("img:eq(0)"),0==t.length?!0:void o(t,e)})},i(function(){n=i('<div id="zoomiocontainer">').appendTo(document.body),s=i('<div id="zoomioloadingdiv"><div class="spinner"></div></div>').appendTo(document.body),l?(n.addClass("mobileclass"),n.on("touchstart",function(i){i.stopPropagation()}),i(document).on("touchstart.dismisszoomio",function(){d.$zoomimage&&(s.css({visibility:"hidden"}),n.stop().animate({opacity:0},d.settings.fadeduration,function(){i(this).css({visibility:"hidden",left:"-100%",top:"-100%"})}))})):(n.on("mouseenter",function(){}),n.on("mousemove",function(i){var t=d.$zoomimage,e=d.offset,o=[i.pageX-e.left,i.pageY-e.top],n=d.multiplier;t.css({left:-o[0]*n[0]+o[0],top:-o[1]*n[1]+o[1]})}),n.on("mouseleave",function(){s.css({visibility:"hidden"}),n.stop().animate({opacity:0},d.settings.fadeduration,function(){i(this).css({visibility:"hidden",left:"-100%",top:"-100%"})})}))})}(jQuery);


jQuery(function () {
    // Check if the screen width is greater than a certain value (e.g., 768 pixels)
    if (window.innerWidth > 768 ) {
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

        function alignModal(){
            var modalDialog = $(this).find(".modal-dialog");
            
            // Applying the top margin on modal to align it vertically center
            modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
        }
        // Align modal when it is displayed
        $(".modal").on("shown.bs.modal", alignModal);
        
        // Align modal when user resize the window
        $(window).on("resize", function(){
            $(".modal:visible").each(alignModal);
        });   

        $("#imageLink").hover(function(){
    $('#imageModal').modal('show');
  }, function(){
    $('#imageModal').modal('hide');
  });
  document.addEventListener('DOMContentLoaded', function () {
      var zoom = mediumZoom('[data-zoomable]');
    });
    });

    

  // $('#add-to-cart-btn').on('click', function(event) {
  //   event.preventDefault(); // Prevent the default form submission

  //   // Check if the product is already in the cart
  //   var productAlreadyInCart = <?php echo $productAlreadyInCart ? 'true' : 'false'; ?>;

  //   if (productAlreadyInCart) {
  //     // Show the message
  //     $('#cart-message').show();
  //   } else {
  //     // Submit the form
  //     $(this).closest('form').submit();
  //   }
  // });
</script>



@endsection