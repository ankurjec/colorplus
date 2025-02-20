<!DOCTYPE html>
<html lang="en">

<head>
    <title>ZENITH AGRO SCIENCES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/favicon.ico') }}">

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

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/panzoom@5.4.0/dist/panzoom.min.css">


    <link rel="stylesheet" href="{{asset('css/Footer.css')}}">
    <!-- Line Awesome CDN (icon8) -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/line-awesome/1.3.0/line-awesome/css/line-awesome.min.css" />
    <!-- Font Awesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />


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
                /* Adjust the margin as needed */
            }

            .icon-gap {
                margin-right: 5px;
                /* Adjust the margin as needed */
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
    </style>
    @show
    @livewireStyles
</head>

<body>

    <!-- Add your header content here -->
    <header>
        <div class="site-navbar py-2">

            <div class="search-wrap">
                <div class="container">
                    <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
                    <form action="{{ route('search') }}" method="post">
                        @csrf


                        <input type="text" name="search_item" class="form-control"
                            placeholder="Search keyword and hit enter...">
                    </form>
                </div>
            </div>

            <div class="container">
                <div class="d-flex align-items-center justify-content-between">
                    <a href="/">

                        <div class="site-logo">
                            <img src="{{ asset('images/z_logo.png') }}" alt="Company Name Logo" href="/" height="75">
                            <span id="zenith_title" style="color:rgb(79, 161, 110);font-size:22px;">Zenith Agro
                                Sciences</span>
                        </div>
                    </a>
                    <div class="main-nav d-none d-lg-block">
                        <nav class="site-navigation text-right text-md-center" role="navigation">
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="http://127.0.0.1:8000/shop">Store</a></li>
                                <li class="has-children">
                                    <a href="#">Products</a>
                                    <ul class="dropdown">
                                        <li><a href="#">Fertilizers</a></li>
                                        <li><a href="#">Medicines</a></li>
                                        <li><a href="#">Tools</a></li>
                                        <li><a href="#">Seeds</a></li>

                                    </ul>
                                </li>
                                <li><a href="/about">About</a></li>
                                <li><a href="/contact">Contact</a></li>
                                <li><a href="/review">Reviews</a></li>

                            </ul>
                        </nav>
                    </div>
                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-heart" viewBox="0 0 16 16">
                        <path
                            d="M8 14s6-3.33 6-7a4-4 0 0 0-8 0c0-3.67 6-7 6-7S2.33 4 2.33 8a4 4 0 0 0 8 0c0 3.67-6 7-6 7z" />
                    </svg> --}}

                    <div class="icons">
                        @if(!auth()->check())
                        <a href="#" class="icons-btn d-inline-block" data-toggle="modal" data-target="#myModal">
                            {{-- <span class="icon-user-plus"></span> --}}

                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-add" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                <path
                                    d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                            </svg> --}}

                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-fill-add" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                <path
                                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path
                                    d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4" />
                            </svg>

                        </a>
                        @else
                        <a href="{{ route(" sitelogout.store") }}" title="Logout" class="icons-btn d-inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                <path fill-rule="evenodd"
                                    d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                <path fill="black" fill-rule="evenodd"
                                    d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                            </svg>

                        </a>
                        &nbsp;
                        <!-- Add non-breaking space for gap -->
                        &nbsp;&nbsp;
                        <a href="/accountdata" class="icons-btn d-inline-block">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                <path
                                    d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664z" />
                            </svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-person-fill" viewBox="0 0 16 16" style="margin-bottom: 5px;">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>



                        </a>



                        </a>
                        @endif

                        {{-- &nbsp;
                        <!-- Add non-breaking space for gap -->
                        &nbsp;&nbsp; --}}
                        {{-- <a href="#" class="icons-btn d-inline-block js-search-open">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                            </svg>
                        </a> --}}
                        &nbsp;
                        <!-- Add non-breaking space for gap -->
                        &nbsp;&nbsp;
                        <livewire:cart-counter />
                        &nbsp;
                        <!-- Add non-breaking space for gap -->
                        <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none">
                            <span class="icon-menu"></span>
                        </a>
                    </div>

                </div>
            </div>
        </div>


        <!-- Login/Register Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
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
                                <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab"
                                    aria-controls="login" aria-selected="true">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab"
                                    aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="loginTabContent">
                            <div class="tab-pane fade show active" id="login" role="tabpanel"
                                aria-labelledby="login-tab">
                                <form method="POST" action="{{ route('sitestore') }}">
                                    @csrf
                                    <br>
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" id="loginEmail"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" id="loginPassword"
                                            placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf
                                    <br>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="" name="name"
                                            placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="registerEmail" name="email"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="registerPassword"
                                            name="password" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="confirmPassword"
                                            name="password_confirmation" placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>
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
    <footer>
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
                ©2024 <span><a href="#">Zenith Agro Sciences</a></span>, All rights reserved.
            </p>
        </div>
    </footer>

    @yield('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/panzoom@5.4.0/dist/panzoom.min.js"></script>


    @livewireScripts

</body>

</html>