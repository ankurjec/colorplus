<!DOCTYPE html>
<html lang="en">

<head>
    <title>COLOR PLUS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favlogo.ico') }}">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}?v=1.3">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/panzoom@5.4.0/dist/panzoom.min.css">

    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    {{-- Footer CSS Page Link --}}
    <link rel="stylesheet" href="{{ asset('css/Footer.css') }}">
    {{-- Contact Us CSS Link --}}
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}?v=1.5">
    <!-- Line Awesome CDN (icon8) -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" />
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- Swipper Js CDN Link -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


    {{-- Animation Boostrap AOS --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
            extend: {
              colors: {
                clifford: "#da373d",
              },
            },
          },
        };
      </script>



    @section('css')
    <style>
        .ui-datepicker {
            font-family: Arial, sans-serif;
            font-size: 14px;
            border: 1px solid #ccc;
            background-color: #f5f5f5;
            color: #333;
        }

        .ui-datepicker-header {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px;
        }

        .ui-datepicker-title {
            font-size: 18px;
        }

        .ui-datepicker-prev,
        .ui-datepicker-next {
            background-color: #007bff;
            color: #fff;
            border-radius: 50%;
            padding: 5px;
            font-size: 12px;
            line-height: 1;
        }

        .ui-datepicker-prev:hover,
        .ui-datepicker-next:hover {
            background-color: #0056b3;
            cursor: pointer;
        }

        .ui-datepicker-calendar {
            background-color: #fff;
        }

        .ui-state-default {
            background-color: #fff;
            color: #333;
            border: none;
        }

        .ui-state-default:hover {
            background-color: #f0f0f0;
            cursor: pointer;
        }

        .ui-datepicker-current-day {
            background-color: #007bff;
            color: #fff;
        }

        .ui-datepicker-unselectable .ui-state-default {
            color: #ccc;
            cursor: default;
        }

        .ui-datepicker-buttonpane {
            background-color: #f5f5f5;
            border-top: 1px solid #ccc;
            margin-top: 10px;
            padding-top: 10px;
            text-align: right;
        }

        .ui-datepicker-close {
            background-color: #007bff;
            color: #fff;
            padding: 5px 10px;
            border-radius: 3px;
            border: none;
            font-size: 14px;
            cursor: pointer;
        }

        .ui-datepicker-close:hover {
            background-color: #0056b3;
        }

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

            .item img {
                transition: transform 0.3s ease-in-out;
            }

            .hover-zoom {
                transition: transform 0.3s ease-in-out;
            }



            #zenith_title {
                font-size: 15px !important;
                margin-left: 5px;
            }

            .icons-btn+.icons-btn {
                margin-right: 30px;
            }

            .icon-gap {
                margin-right: 5px;
            }

            .site-title {
                font-size: 79px;
                margin-left: 25px;
            }
        }

        .header {
            background: rgb(0, 178, 255);
            color: #fff;
        }

        #lblCartCount {
            font-size: 14px;
            background: #ff0000;
            color: #fff;
            padding: 0 5px;
            vertical-align: top;
            margin-left: -9px;
        }

        .badge {
            padding-left: 2px;
            padding-right: 19px;
            -webkit-border-radius: 9px;
            -moz-border-radius: 9px;
            border-radius: 9px;
        }

        .label-warning[href],
        .badge-warning[href] {
            background-color: #c67605;
        }

        .footer-title {
            font-size: 20px;
            font-weight: 600;
        }

        .subscribe-form input {
            width: 100%;
            padding: 8px 13px !important;
            border: none;
            outline: none;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 2px 0px;
            border-radius: 5px;
        }

        h3 {
            color: #1f1f1f !important;
        }

        .site-wrap::before {
            background-color: white !important;
        }

        .swiper {
            width: 100%;
            height: 100px;
        }
        .slider-offer {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }



    </style>
    @show
    @livewireStyles
</head>

<body>

    <div class="top-header">
        <div class="icon-top">
            {{-- <div class="call-icon">
                <i class="las la-phone-volume"></i>
                <div>01234 56789</div>
            </div> --}}
        </div>
        {{-- <div class="icon-top swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide slider-offer">
                    <div>Get 20 <i class="fas fa-percentage"></i> OFF on our selected items</div>
                </div>
                <div class="swiper-slide slider-offer">
                    <i class="las la-percentage"></i>
                    <div>Get 50% OFF on our selected items</div>
                </div>
            </div>
        </div> --}}


        <div class="icon-top swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide slider-offer">
                    <div>Get 20 <i class="fas fa-percentage"></i> OFF on our selected items</div>
                </div>
                <div class="swiper-slide slider-offer">
                    {{-- <i class="las la-percentage"></i> --}}
                    <div>Get 20 <i class="fas fa-percentage"></i>  OFF on our selected items</div>
                </div>
            </div>
        </div>
    
        <div class="lan-dropdown">
            <select class="lan-item">
                <option class="lang-list">Eng</option>
                <option class="lang-list">Hin</option>
                <option class="lang-list">Ass</option>
            </select>
        </div>
    </div>
    <div class="main-header">
        <div class="logo">
            <a href="/">
                <img src="{{ asset('images/z_logo.png') }}" alt="Zenith Agro Sciences" />
            </a>
        </div>
        <div class="nav-menu">
            <ul class="nav-list">
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Store</a></li>
                {{-- <li><a href="#">Categories</a></li> --}}
                <li><a href="/about">About</a></li>
                <li><a href="/contact">Contact</a></li>
            </ul>
        </div>
        <div class="right-menu">
            {{-- <div class="cart">
                <a href="{{ route('cart') }}">
                    <i class="las la-shopping-cart"></i>
                </a>
                <span id='lblCartCount'>{{ $cartCount }}</span>
                <div>Cart</div>
            </div> --}}
            <livewire:cart-counter />
            {{-- <div class="cart">
                <a href="/cart">
                    <livewire:cart-counter />
                </a>
                <span>01</span>
                <div>Cart</div>
            </div> --}}

            <div class="profile-link">
                <a href="/user_login">
                    <i class="fa-solid fa-user"></i>
                    <div class="account">Account</div>
                </a>
            </div>
            <div class="mobile-menu" onclick="toggleMenu()">
                <i class="fa-solid fa-bars"></i>
            </div>
        </div>
    </div>
    @if (session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (session()->has('msg'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('msg') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade show">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    {{-- <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">@yield('page-title')</strong>
                </div>
            </div>
        </div>
    </div> --}}

    <?php
    // Get the base URL dynamically
    // $base_url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
  
    // $current_url = $base_url . $_SERVER['REQUEST_URI'];
    
    // if ($current_url !== 'http://127.0.0.1:8000/') {
        if(request()->url() !== route('index')){

    ?>
    <div class="bg-light py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-0">
                    <a href="{{ url('/') }}">Home</a> <span class="mx-2 mb-0">/</span>
                    <strong class="text-black">@yield('page-title')</strong>
                </div>
            </div>
        </div>
    </div>
    <?php
    }
    ?>


    {{-- <div class="container">
        @yield('content')
    </div> --}}
    @yield('content')

    {{-- <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

                    <div class="block-7">
                        <h3 class="footer-heading mb-4">About Us</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis
                            distinctio voluptates
                            sed dolorum excepturi iure eaque, aut unde.</p>
                    </div>

                </div>
                <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
                    <h3 class="footer-heading mb-4">Quick Links</h3>
                    <ul class="list-unstyled">
                        <li><a href="#">Supplements</a></li>
                        <li><a href="#">Vitamins</a></li>
                        <li><a href="#">Diet &amp; Nutrition</a></li>
                        <li><a href="#">Tea &amp; Coffee</a></li>
                    </ul>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="block-5 mb-5">
                        <h3 class="footer-heading mb-4">Contact Info</h3>
                        <ul class="list-unstyled">
                            <li class="address">203 Fake St. Mountain View, San Francisco, California, USA</li>
                            <li class="phone"><a href="tel://23923929210">+2 392 3929 210</a></li>
                            <li class="email">emailaddress@domain.com</li>
                        </ul>
                    </div>


                </div>
            </div>
            <div class="row pt-5 mt-5 text-center">
                <div class="col-md-12">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made
                        with <i class="icon-heart" aria-hidden="true"></i> by us
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>

            </div>
        </div>
    </footer> --}}
    {{-- New Footer Added --}}
    {{-- <footer>
        <div class="footer-section">
            <!-- Footer Column One -->
            <div class="footer-one">
                <div class="footer-logo">
                    <img src="{{ asset('images/z_logo.png') }}" width="60" height="60" alt="" />
                    <h3 class="footer-title">Zenith Agro Science</h3>
                </div>
                <div class="footer-content">
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque
                        voluptas omnis quae error fugit
                    </p>
                </div>
                <div class="footer-location">
                    <i class="fa-solid fa-location-dot"></i>
                    <p>ST Green, Gotanagar, PNGB Road, Guwahati - 11</p>
                </div>
                <div class="footer-email">
                    <i class="fa-solid fa-envelope"></i>
                    <p>example@domain.com</p>
                </div>
                <div class="footer-call">
                    <i class="fa-solid fa-phone"></i>
                    <p>01234 56789</p>
                </div>
            </div>
            <!-- Footer Col Two -->
            <div class="footer-two">
                <h3 class="footer-title">Company</h3>
                <div class="footer-links">
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Delivery Information</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Contact Us</a></li>
                    <li><a href="#">Support Center</a></li>
                </div>
            </div>
            <!-- Footer Col Three -->
            <div class="footer-three">
                <h3 class="footer-title">Subscribe Our Newsletter</h3>
                <div class="subscribe-form">
                    <input type="text" placeholder="Your Email Address" />
                    <div class="send-mail"><i class="fa-regular fa-paper-plane"></i></div>
                </div>
                <div class="social-links">
                    <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                    <a href="#"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#"><i class="fa-brands fa-behance"></i></a>
                </div>
            </div>
        </div>
        <!-- Copyright Footer -->
        <div class="copyright-footer">
            <p>
                ©2024 <span><a href="/">Zenith Agro Sciences</a></span>, All rights reserved.
            </p>
        </div>
    </footer> --}}

    @yield('scripts')
    <script>
        // AOS.init();

        // Mobile Menu Open
        function toggleMenu() {
            var navMenu = document.querySelector('.nav-menu');
            navMenu.classList.toggle('show');
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/panzoom@5.4.0/dist/panzoom.min.js"></script>
    <!-- Swipper Js script Link -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    {{-- Animation AOS CDN --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const swiper = new Swiper('.swiper', {
                loop: true,
                autoplay: {
                    delay: 3000,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        });
    </script>

    @livewireScripts

</body>

</html>