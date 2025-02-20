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

         .price-range {
            display: flex;
            align-items: center;
        }
        .price-range label {
            margin-right: 10px; /* Add some space between label and span */
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
        }

        .pb-3,
        .py-3 {
            padding-bottom: 0rem !important;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
        }

        .card {
            transition: transform 0.3s ease-in-out;
        }

        .card:hover {
            transform: scale(1.05);
        }

        $fireworks--width: 3px;
        $fireworks--height: 3px;
        $fireworks--border: $fireworks--width/2;

        *,
        :before,
        :after {
            box-sizing: border-box;
        }

        body {
            font-family: "Open Sans", sans-serif;
            font-size: 13px;
        }


        .button--full-width {
            min-width: 385px;
        }

        .icon-with-text {
            display: inline-flex;
            align-items: flex-start;
        }

        .icon-with-text__icon {
            flex-shrink: 0;
            margin-right: 8px;
            margin-top: -2px;
        }

        .icon-svg--color-silver {
            fill: $silver;
            color: $silver;
        }

        .icon-svg--color-blue {
            fill: $blue;
            color: $blue;
        }

        .icon-svg {
            display: inline-block;
            vertical-align: middle;
            height: 16px;
            width: 16px;
        }

        .heart-full {
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
        }

        .btn__effect {
            display: inline-block;
            position: relative;
        }

        .effect-group {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform: rotate(25deg);

            .effect {
                display: block;
                position: absolute;
                top: 38%;
                left: 50%;
                width: 20px;
                transform-origin: 0px 2px;

                &:nth-child(2) {
                    transform: rotate(72deg);
                }

                &:nth-child(3) {
                    transform: rotate(72*2deg);
                }

                &:nth-child(4) {
                    transform: rotate(72*3deg);
                }

                &:nth-child(5) {
                    transform: rotate(72*4deg);
                }

                &:before {
                    content: "";
                    display: block;
                    position: absolute;
                    right: 0;
                    border-radius: $fireworks--border;
                    height: $fireworks--height;
                    background: #0090e3;
                }

                &:after {
                    content: "";
                    display: block;
                    position: absolute;
                    top: 10px;
                    right: 10%;
                    border-radius: 50%;
                    width: $fireworks--width;
                    height: $fireworks--height;
                    background: #ff6600;
                    transform: scale(0, 0);
                }
            }
        }

        .active {
            .heart-stroke {
                opacity: 0;
            }

            .heart-full {
                opacity: 1;
            }

            .icon-svg {
                animation: bounceIn 0.5s linear;
            }

            .effect:before {
                animation: fireworkLine 0.5s linear 0.1s;
            }

            .effect:after {
                animation: fireworkPoint 0.5s linear 0.1s;
            }
        }

        .broken-heart {
            position: absolute;
            left: -16px;
            top: 0;
            opacity: 0;

            &--left {
                transform: rotate(0deg);
                transform-origin: 60% 200%;
            }

            &--right {
                transform: rotate(0deg);
                transform-origin: 63% 200%;
            }

            &--crack {
                stroke-dasharray: 15;
                stroke-dashoffset: 15;
            }
        }

        .deactivate {
            .broken-heart {
                opacity: 1;
            }

            .broken-heart--left {
                animation:
                    crackLeft 0.35s cubic-bezier(0.680, -0.550, 0.265, 2.850) 0.15s forwards,
                    hide 0.25s ease-in 0.55s forwards;
            }

            .broken-heart--right {
                animation:
                    crackRight 0.35s cubic-bezier(0.680, -0.550, 0.265, 2.850) 0.15s forwards,
                    hide 0.25s ease-in 0.55s forwards;
            }

            .broken-heart--crack {
                animation:
                    crack 0.2s ease-in forwards;
            }
        }

        .button.one.desktop:not(.active):hover {
            .heart-stroke {
                animation: pulse 1s ease-out infinite;
            }
        }

        .button.one.inactive .heart-full {
            animation: wiltT .5s ease-in forwards;
        }

        .button.two.desktop:not(.active):hover {
            .heart-stroke {
                animation: pulseBlue 1s ease-out infinite;
            }
        }


        @keyframes pulse {
            0% {
                opacity: 1;
                transform-origin: center center;
                transform: scale(1);
            }

            50% {
                opacity: 0.6;
                transform: scale(1.15);
            }

            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes pulseBlue {
            0% {
                transform-origin: center center;
                transform: scale(1);
                fill: $silver;
            }

            50% {
                transform: scale(1.15);
                fill: $blue;
            }

            100% {
                transform: scale(1);
                fill: $silver;
            }
        }

        @keyframes fireworkLine {
            0% {
                right: 20%;
                transform: scale(0, 0);
            }

            25% {
                right: 20%;
                width: 6px;
                transform: scale(1, 1);
            }

            35% {
                right: 0;
                width: 35%;
            }

            70% {
                right: 0;
                width: 4px;
                transform: scale(1, 1);
            }

            100% {
                right: 0;
                transform: scale(0, 0);
            }
        }

        @keyframes fireworkPoint {
            30% {
                transform: scale(0, 0);
            }

            60% {
                transform: scale(1, 1);
            }

            100% {
                transform: scale(0, 0);
            }
        }

        @keyframes bounceIn {
            0% {
                transform: scale(0);
            }

            30% {
                transform: scale(1.25);
            }

            50% {
                transform: scale(0.9);
            }

            70% {
                transform: scale(1.1);
            }

            80% {
                transform: scale(1);
            }
        }

        @keyframes crackLeft {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(-45deg);
            }
        }

        @keyframes crackRight {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(45deg);
            }
        }

        @keyframes crack {
            0% {
                stroke-dasharray: 15;
                stroke-dashoffset: 15;
            }

            80% {
                stroke-dasharray: 15;
                stroke-dashoffset: 0;
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        @keyframes hide {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }

        .button--secondary,
        .button--secondary:visited {
            cursor: pointer;
            display: inline-block;
            min-width: 64px;
            font-family: inherit;
            font-size: inherit;
            line-height: 15px;
            outline: none;
            text-align: center;
            text-decoration: none;
            text-shadow: none;
            transition: background 0.1s linear;
            font-weight: 400;
            color: $blue;
            background: transparent;
            border: none;
            box-shadow: none;
            padding: 15px 15px;
            transition-property: border;
            transition-timing-function: ease-in-out;
            transition-duration: 0.15s;
        }

        /* New Design CSS Code */
        .shop-container {
            width: 100vw;
            height: auto;
            padding: 5% 8% 5%;
            display: flex;
            gap: 20px;
        }

        .side-bar {
            width: 25%;
            background-color: #eeeeee;
            height: auto;
            padding: 20px;
            border-radius: 10px;
            /* box-shadow: var(--box-shadow); */
        }

        .product-section {
            width: 75%;
            /* background-color: #eeeeee; */
            height: auto;
            /* padding: 20px; */
            border-radius: 10px;
        }

        .cat-title {
            padding-bottom: 10px;
            border-bottom: 1px solid white;
            font-size: 16px;
            font-weight: 600;
            margin: 15px 0px;
        }

        .categories li {
            l list-style: none;
            padding: 4px 0px;
            display: flex;
            gap: 10px;
            align-items: center
        }

        .categories li input[type=checkbox] {
            border: none;
            background-color: #b53c29;
        }

        .product-header {
            background-color: #eeeeee;
            width: 100%;
            height: 50px;
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0px 20px;
        }

        .icons-header {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .icons-header p {
            font-size: 14px;
            color: gray;
            margin: auto;
        }

        .dropdown {
            position: relative;
            display: inline-block;
            cursor: pointer;
            background-color: #f9f9f9;
            padding: 5px 10px;
            font-size: 14px;
        }

        .dropdown-list {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            /* box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2); */
            z-index: 1;
            list-style: none;
            padding: 0;
            margin: 0;
            width: 100%;
            left: 0;
            top: 30px;
        }

        .dropdown:hover .dropdown-list {
            display: block;
        }

        .dropdown-list li {
            /* padding: 10px; */
            padding: 5px 10px;
            border-bottom: 1px solid #ddd;
            cursor: pointer;
        }

        .dropdown-list li:hover {
            background-color: #e55039;
            color: white;
        }

        .dropdown-list li:last-child {
            border-bottom: none;
        }

        @media screen and (max-width: 767px) {
            .shop-container {
                flex-direction: column-reverse;
                width: 100%;
            }

            .side-bar,
            .product-section {
                width: 100%;
            }
        }


        .slider-container {
            position: relative;
            width: 100%;
        }

        .slider {
            /* -webkit-appearance: none; */
            width: 100%;
            height: 7px;
            border-radius: 5px;
            background: #d3d3d3;
            outline: none;
            opacity: 0.7;
            -webkit-transition: .2s;
            transition: opacity .2s;
        }

        .slider::-webkit-slider-thumb {
            -webkit-appearance: none;
            appearance: none;
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #e55039;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 15px;
            height: 15px;
            border-radius: 50%;
            background: #e55039;
            cursor: pointer;
        }

        .price-range {
            display: flex;
            /* justify-content: space-around; */
            gap: 10px;
            margin-top: 10px;
        }

        .price-range label {
            font-size: 18px;
            font-weight: 600;
        }

        .filter-btn {
            margin-top: 10px;
        }

        .filter-btn a {
            padding: 6px 16px;
            background-color: #e55039;
            color: white;
            border: none;
            text-decoration: none;
        }

        /* Product Card Code */
        .main-product {
            margin-top: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .product-card {
            width: 250px;
            height: auto;
            padding: 10px;
            overflow: hidden;
            border-radius: 10px;
            border: 1px solid rgb(230, 230, 230);
            cursor: pointer;
        }

        .product-img {
            width: 150px;
            height: 180px;
            overflow: hidden;
            background-color: white;
            margin: auto;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            padding: 15px;
            transform: scale(1);
            object-fit: cover;
            transition: all 0.4s ease-in;
        }

        .product-img img:hover {
            transform: scale(1.2);
        }

        .product-details {
            margin-top: 15px;
        }

        .product-cat {
            font-size: 13px;
            color: gray;
        }

        .product-rating i {
            font-size: 11px;
            color: rgb(255, 196, 0);
        }

        .product-card i:nth-child(5) {
            color: rgb(146, 146, 146);
        }

        /* .product-name {
                font-size: 20px;
                font-weight: 600;
                width: 100;
                text-overflow: hidden;
                white-space: pre;
            } */
        .product-name {
            font-size: 20px;
            font-weight: 600;
            color: #1b1b1b;

        }

        .product-name {
            font-size: 16px;
        }

        .price-btn {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* gap: 60px; */
        }

        .btn-add {
            padding: 5px 10px;
            background-color: #e55039;
            text-decoration: none;
            border-radius: 4px;
            transition: all .3s ease-in-out;
        }

        .btn-add:hover {
            background-color: #b53c29;
        }

        .btn-add a {
            text-decoration: none;
            color: white;
            font-size: 14px;
        }

        .product-price {
            font-size: 18px;
            color: #1b1b1b;
        }

        .main-product {
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            flex-wrap: wrap;
            gap: 15px;
        }


        .product-container {
            padding: 5% 8% 5%;
        }

        .title-heading {
            font-size: 35px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 50px;
        }

        /* Grid and List View CSS Code */
        .grid-view .main-product {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 20px;
            transition: all .5s ease-in;
            width: 100%;
        }

        /* List View */
        .list-view .product-card {
            display: flex;
            margin-bottom: 20px;
            align-items: center;
            transition: all .5s ease-in;
        }

        .list-view .product-img {
            /* flex: 0 0 100px; */
            margin-right: 15px;
        }

        .list-view .product-details {
            flex: 1;
        }

        @media only screen and (max-width:600px) {
            .product-card {
                width: 100%;
            }

            .list-view .product-card {
                width: 100%;
            }
        }
    </style>
@endsection
@section('page-title', 'Shop')

@section('content')


    <div class="site-wrap">

        <!-- Message Container -->
        <div class="message-container">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        {{-- <div class="site-navbar py-2">

    <div class="search-wrap">
      <div class="container">
        <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
        <form action="#" method="post">
          <input type="text" class="form-control" placeholder="Search keyword and hit enter...">
        </form>
      </div>
    </div>

    <div class="container">
      <div class="d-flex align-items-center justify-content-between">
        <a href="/">

          <div class="site-logo">
            <img src="images/z_logo.png" alt="Company Name Logo" href="/" height="75">
            <span id="zenith_title" style="color:rgb(79, 161, 110);font-size:22px;">Zenith Ago Services</span>
          </div>
        </a>
        <div class="main-nav d-none d-lg-block">
          <nav class="site-navigation text-right text-md-center" role="navigation">
            <ul class="site-menu js-clone-nav d-none d-lg-block">
              <li><a href="/">Home</a></li>
              <li class="active"><a href="shop">Store</a></li>
              <li class="has-children">
                <a href="#">Products</a>
                <ul class="dropdown">
                  <li><a href="#">Fertilizers</a></li>
                  <li><a href="#">Medicines</a></li>
                  <li><a href="#">Tools</a></li>
                  <li><a href="#">Seeds</a></li>
                </ul>
              </li>
              <li><a href="about">About</a></li>
              <li><a href="contact">Contact</a></li>
              <li><a href="review">Reviews</a></li>

            </ul>
          </nav>
        </div>
        <div class="icons">
          <a href="#" class="icons-btn d-inline-block" data-toggle="modal" data-target="#myModal"><span
              class="icon-user"></span></a>

          <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
          <a href="cart" class="icons-btn d-inline-block bag">
            <span class="icon-shopping-bag"></span>
            <span class="number">2</span>
          </a>
          <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
              class="icon-menu"></span></a>
        </div>
      </div>
    </div>
  </div> --}}

        <!-- Login/Register Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
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
                                <form>
                                    <br>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="loginEmail"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="loginPassword"
                                            placeholder="Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </form>
                            </div>
                            <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form>
                                    <br>
                                    <div class="form-group">
                                        <input type="email" class="form-control" id="registerEmail"
                                            aria-describedby="emailHelp" placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="registerPassword"
                                            placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="confirmPassword"
                                            placeholder="Confirm Password">
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-light py-3">
            <div class="container">
                <div class="row">
                    {{-- <div class="col-md-12 mb-0"><a href="/">Home</a> <span class="mx-2 mb-0">/</span> <strong
            class="text-black">Store</strong>
          <div class="input-group" style="width: 65%;float:right;">
            <input type="search" placeholder="Search for products or brands.." aria-describedby="button-addon5"
              class="form-control" style="width: 50%;">
            <div class="input-group-append">
              <button id="button-addon5" type="submit" class="btn btn-primary"> <span class="icon-search"> </span>
              </button>
            </div>
          </div>

        </div> --}}
                </div>
            </div>
        </div>
        {{-- {{$request->filter_type}} --}}



        {{-- New Design Code Added --}}
        <div class="shop-container">
            <div class="side-bar">
                <h3 class="cat-title">Product Category</h3>
                <div class="categories">
                    @foreach ($categories as $category)
                        <li><input type="checkbox" />{{ $category->name }}</li>
                    @endforeach
                </div>
                <div class="slider-container">
                    <h3 class="cat-title">Filter by price</h3>
                    <input type="range" min="100" max="1200" value="100" step="10" class="slider"
                        id="price-slider" />
                    <div class="price-range">
                        <label>Price:</label>
                        <span>Rs.100 - Rs.1200</span>

                    </div>
                    <div class="filter-btn"><a href="#">Filter</a></div>
                </div>
            </div>
            <div class="product-section" id="productSection">
                <div class="product-header">
                    <div class="icons-header">
                        <i class="fa-solid fa-grip" onclick="switchView('grid')"
                            style="color: white; background-color: #e55039; padding: 5px; font-size: 14px; cursor: pointer;"></i>
                        <i class="fa-solid fa-list" onclick="switchView('list')"
                            style="color: #e55039; background-color: white; font-size: 14px; padding: 5px; cursor: pointer;"></i>
                        <p>We Found 23 items for you</p>
                    </div>
                    {{-- <div class="dropdown">
                        Sort by: Featured >
                        <div class="dropdown-list">
                            <li>Sort by - 1</li>
                            <li>Sort by - 1</li>
                            <li>Sort by - 1</li>
                        </div>
                    </div> --}}
                </div>

  {{-- <div class="main-product">
                    @foreach ($products as $product)
                        <div class="product-card">
                            <div class="product-img">
                                <a href="{{ route('shop-single', ['productID' => $product->id]) }}" title="{{ $product->name }}">
                                <img src="{{ url($product->images()->first()->url) }}" alt="{{ $product->name }}" />
                                </a>
                            </div>
                            <div class="product-details">
                                <div class="product-cat">Categories</div>
                                <div class="product-rating">
                                </div>
                                <div class="product-name">{{ $product->name }}</div>
                                <div class="price-btn">
                                    <div class="product-price">RS: {{ $product->price }}</div>
                                    <div class="btn-add">
                                        <a href="{{ route('shop-single', ['productID' => $product->id]) }}">
                                            <i class="fa-solid fa-eye"></i> View
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div> 
 --}}




              <div class="main-product">
        @foreach ($products as $product)
            <a href="{{ route('shop-single', ['productID' => $product->id]) }}" class="product-card">
                <div class="product-img">
                    <img src="{{ url($product->images()->first()->url) }}" alt="{{ $product->name }}" />
                </div>
                <div class="product-details">
                  <div class="product-cat">{{ $product->productCategory->name }}</div>
                    <div class="product-rating"></div>
                                <div class="product-name">{{ strlen($product->name) > 20 ?  ucwords(strtolower(substr($product->name, 0, 20))) . '...'  : $product->name }}</div>
                    <div class="price-btn">
                        <div class="product-price"><span style="font-family:Arial;">₹</span> {{ $product->price }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
            </div>
        </div>




        {{-- <div class="site-section bg-secondary bg-image" style="background-image: url('images/wheat_2.jpg');">
            <div class="container">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex"
                            style="background-image: url('images/agri-prod.jpg');">
                            <div class="banner-1-inner align-self-center">
                                <h2 style="color: #FFF;">Agro Products</h2>
                                <p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae
                                    ex ad minus
                                    rem odio voluptatem.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex"
                            style="background-image: url('images/agronomist_1.jpg');">
                            <div class="banner-1-inner ml-auto  align-self-center">
                                <h2 style="color: #FFF;">Rated by Experts</h2>
                                <p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Molestiae
                                    ex ad minus
                                    rem odio voluptatem.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- <footer class="site-footer">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

          <div class="block-7">
            <h3 class="footer-heading mb-4">About Us</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius quae reiciendis distinctio voluptates
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
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>

    <script src="js/main.js"></script>

    <script>
        $(document).ready(function() {
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
        });

        document.addEventListener("DOMContentLoaded", function() {
            var wishlistIcons = document.querySelectorAll('.wishlist-icon');

            wishlistIcons.forEach(function(icon) {
                icon.addEventListener('click', function() {
                    // Toggle the 'disabled' class
                    icon.classList.toggle('disabled');

                    // Change the color to red if the icon is enabled, else reset to the default color
                    icon.style.color = icon.classList.contains('disabled') ? '#ccc' : 'red';
                });
            });
        });

        $(".button").click(function() {
            if ($(this).hasClass("deactivate")) {
                $(this).removeClass("deactivate")
            }
            if ($(this).hasClass("active")) {
                $(this).addClass("deactivate")
            }
            $(this).toggleClass("animate");
            $(this).toggleClass("active");
            $(this).toggleClass("inactive");
        });
    </script>
    {{-- <script>
  function submitWishlistForm() {
      // Get the form element
      var form = document.getElementById('wishlistForm');

      // Submit the form
      form.submit();
  }
</script> --}}

    <script>
        function submitWishlistForm(event, productId) {
            // Prevent the default form submission
            event.preventDefault();

            // Get the form element
            var form = event.target.closest('.wishlist-form');

            // Submit the form
            form.submit();
            console.log($('#heart-icon-' + productId)); // Check if this logs the correct element
            $('#heart-icon-' + productId).css('color', 'red');
            // Make an AJAX request to add the product to the wishlist
            $.ajax({
                type: 'POST',
                url: form.attr('action'),
                data: form.serialize(),
                success: function(response) {
                    // Update the heart icon color based on the success response
                    var heartIcon = form.find('.heart-icon');
                    if (response.success) {
                        // Wishlist addition successful, change to black or red
                        // heartIcon.css('color', 'black'); // or 'red'

                        // Product added successfully, change heart icon color to red
                        console.log(productId); // Check if this logs the correct element

                        $('#heart-icon-' + productId).css('font-color', 'red');
                        $('.message-container').html(
                            '<div class="alert alert-success">Product added to wishlist!</div>');
                    } else {
                        // Wishlist addition failed, handle as needed
                        console.error('Wishlist addition failed');
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }
    </script>


    <script>
        function removeFromWishlist(productId) {
            $.ajax({
                type: 'POST',
                url: '{{ route('wishlist.remove', ['productId' => '__productId__']) }}'.replace('__productId__',
                    productId),
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        // Removal successful
                        $('#heart-icon-' + productId).css('color', '#ccc');
                    } else {
                        // Handle error messages if needed
                        console.error('Error removing from wishlist:', response.message);
                    }
                },
                error: function() {
                    console.error('Error removing from wishlist. Please try again.');
                }
            });
        }
    </script>

  <script>
        function toggleWishlist(productId) {
            // Check if the user is authenticated
            @auth
            // Check if the product is already in the wishlist
            var isInWishlist = $('#heart-icon-' + productId).hasClass('active');

            // Make an AJAX request to add or remove from the wishlist
            $.ajax({
                url: '/wishlist/toggle',
                type: 'POST',
                data: {
                    productId: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    if (response.success) {
                        // Toggle the 'active' class based on the current state
                        $('#heart-icon-' + productId).toggleClass('active', !isInWishlist);
                    } else {
                        console.error('Error toggling wishlist:', response.message);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error toggling wishlist:', error);
                    console.log('Response:', xhr.responseText);
                }
            });
        @else
            // Redirect to login page if user is not authenticated
            window.location.href = '/login';
        @endauth
        }


        // Grid and List Show using JavaScript
        function switchView(viewType) {
            var productSection = document.getElementById('productSection');
            var gridIcon = document.querySelector('.fa-grip');
            var listIcon = document.querySelector('.fa-list');
            var productCards = document.querySelectorAll('.product-card');

            if (viewType === 'grid') {
                productSection.classList.remove('list-view');
                productSection.classList.add('grid-view');
                gridIcon.style.backgroundColor = '#e55039';
                gridIcon.style.color = 'white';
                listIcon.style.backgroundColor = 'white';
                listIcon.style.color = '#e55039';
                productCards.forEach(function(card) {
                    card.style.width = '';
                });
            } else if (viewType === 'list') {
                productSection.classList.remove('grid-view');
                productSection.classList.add('list-view');
                listIcon.style.backgroundColor = '#e55039';
                listIcon.style.color = 'white';
                gridIcon.style.backgroundColor = 'white';
                gridIcon.style.color = '#e55039';
                productCards.forEach(function(card) {
                    card.style.width = '47%';
                });
            }
            if (viewType === 'list' && window.innerWidth <= 600) {
                productCards.forEach(function(card) {
                    card.style.width = '100%';
                });
            }
        }
    </script>
@endsection