@extends('layouts.site-header')

@section('css')
    @parent
    <style>
        @media only screen and (max-width: 768px) {
            .owl-carousel {
                display: flex;
                flex-direction: column; /* Arrange items vertically */
                justify-content: flex-start; /* Align items at the top */
                align-items: center; /* Center items horizontally */
                /* margin-bottom: -190px; */
            }

            .owl-item.active {
                margin-right: 80px;
            }
        }
        .owl-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            box-sizing: border-box;
        }
.owl-next,.owl-prev{
    font-size: 54px;
}
        .icon-arrow_back,
        .icon-arrow_forward {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 10px 15px;
            cursor: pointer;
            outline: none;
            transition: background 0.3s;
        }

        .icon-arrow_back:hover,
        .icon-arrow_forward:hover {
            background: rgba(255, 255, 255, 0.8);
        }

        .icon-arrow_back {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 10px 15px;
            margin-right: -90px !important;
        }

        .icon-arrow_forward {
            background-color: #007bff;
            color: #fff;
            border: 1px solid #007bff;
            border-radius: 5px;
            padding: 10px 15px;
            /* margin-right: 18px; */
        }

        .image-link:hover .hover-zoom {
            transform: scale(1.1);
            transition: transform 0.3s ease;
            /* Add a smooth transition effect */

        }

        /* For a single line */
        .single-line-clamp {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }

        .popular-products {

            width: 80%;
            height: auto;
            padding: 5% 8% 5%;
            padding-top: 1px !important;
            background-color: white !important;
            display: flex;
            align-items: center;
            /* justify-content: space-between; */
            gap: 2px !important;
            justify-content: space-between !important;
        }

        .main-product {
            gap: 4px !important;
        }

        .my-block {
            background-image: url('images/ricefield2.jpg');
            background-size: cover;
            background-position: center;
            text-align: center;
            padding: 50px 0;
            /* opacity: 0.9; */
            /* Adjust the padding to decrease height */
        }

        .site-block-cover-content {
            max-width: 600px;
            /* Adjust the max-width to your liking */
            margin: 0 auto;

        }

        @media (max-width: 768px) {
            .my-block {
                padding: 50px 0;
                /* Adjust the padding for smaller screens */
            }

            .site-block-cover-content {
                max-width: 100%;
                /* Full width on smaller screens */
            }
        }

        .product_img {
            width: 15%;
            aspect-ratio: 3/2;
            object-fit: contain;
            mix-blend-mode: color-burn;
        }

        .title-section h2 {
            padding-left: 10px;
            padding-bottom: 10px;
            padding-top: 20px;

            display: inline-block;
            border: none;
            color: #000;
            font-weight: 600;
            font-size: 22px;
            font-family: inter_semi_bold, fallback-inter_semi_bold, Arial, sans-serif;
        }

        .icon-arrow_forward {
            background-color: #007bff;
            /* Set your desired background color */
            color: #fff;
            /* Set your desired text color */
            border: 1px solid #007bff;
            /* Set your desired border color */
            border-radius: 5px;
            /* Set your desired border radius */
            padding: 10px 15px;
            /* Set your desired padding */
            /* margin-right: 18px; */
            /* Add margin for spacing */
        }

        .icon-arrow_back {
            background-color: #007bff;
            /* Set your desired background color */
            color: #fff;
            /* Set your desired text color */
            border: 1px solid #007bff;
            /* Set your desired border color */
            border-radius: 5px;
            /* Set your desired border radius */
            padding: 10px 15px;
            /* Set your desired padding */
            margin-right: -90px !important;
            /* Add margin for spacing */
        }

        .site-wrap {
            background-color: white !important;
        }

        @media (max-width: 767px) {
            .carousel-inner .carousel-item>div {
                display: none;
            }

            .carousel-inner .carousel-item>div:first-child {
                display: block;
            }
        }

        .carousel-inner .carousel-item.active,
        .carousel-inner .carousel-item-next,
        .carousel-inner .carousel-item-prev {
            display: flex;
        }

        /* medium and up screens */
        @media (min-width: 768px) {

            .carousel-inner .carousel-item-end.active,
            .carousel-inner .carousel-item-next {
                transform: translateX(25%);
            }

            .carousel-inner .carousel-item-start.active,
            .carousel-inner .carousel-item-prev {
                transform: translateX(-25%);
            }
        }

        .carousel-inner .carousel-item-end,
        .carousel-inner .carousel-item-start {
            transform: translateX(0);
        }

        /* .carousel-control-next-icon, .carousel-control-prev-icon {
                                                                                    display: inline-block;
                                                                                    width: 20px;
                                                                                    height: 20px;
                                                                                    background: red no-repeat center center;
                                                                                    background-size: 100% 100%;
                                                                                } */
        .carousel-control-prev-icon {
            background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='red' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");

        }

        .carousel-control-next-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='red' viewBox='0 0 8 8'%3E%3Cpath d='M2.75 0l-1.5 1.5 2.5 2.5-2.5 2.5 1.5 1.5 4-4-4-4z'/%3E%3C/svg%3E");
        }

        .owl-nav .owl-prev,
        {
        background-image: url("data:image/svg+xml;charset=utf-8,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='red' viewBox='0 0 8 8'%3E%3Cpath d='M5.25 0l-4 4 4 4 1.5-1.5-2.5-2.5 2.5-2.5-1.5-1.5z'/%3E%3C/svg%3E");

        }


        /* Hero Section CSS Code from Asfakur */
        .hero-section {
            padding: 0% 8% 0%;
            width: 100vw;
            height: 500px;
            margin-bottom: 20px;
            /* background-color: #e55039; */
            position: relative;
        }

        .hero-section img {
            width: 100%;
            border-radius: 10px;
            height: 100%;
            margin-top: 10px;
        }

        .hero-content {
            width: 40%;
            position: absolute;
            top: 30%;
            margin-left: 8%;
            animation: fade-down 0.5s 0.4s backwards;
        }

        .hero-content p {
            color: white;
            font-size: 20px;
            margin-bottom: 5px;
        }

        .hero-content a {
            margin-top: 20px;
        }

        .hero-content h2 {
            color: white;
            font-family: var(--heading-font);
            font-size: 60px;
            line-height: 4rem;
            letter-spacing: 2px;
            margin-bottom: 10px;
        }

        .shop-btn {
            background-color: var(--primary-color);
            padding: 10px 25px;
            border: none;
            color: white;
            font-size: 18px;
            border-radius: 50px;
            cursor: pointer;
            margin-top: 10px !important;
        }

        .shop-btn:hover {
            background-color: var(--secondary-color);
            box-shadow: var(--box-shadow);
        }

        /* Hero Section Responsive Code */
        @media only screen and (max-width: 600px) {
            .hero-section {
                width: 100vw;
                height: 250px;
                padding: 0%;
            }

            .hero-section img {
                width: 100%;
                height: 100%;
                object-fit: cover;
            }

            .hero-content {
                width: 100vw;
                height: 250px;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 0% 4% 0%;
                margin: auto;
            }

            .hero-content p {
                text-align: center;
                font-size: 14px;
            }

            .hero-content h2 {
                font-size: 40px;
                text-align: center;
                line-height: 40px;
                letter-spacing: normal;
            }

            .hero-content {
                top: 26%;
            }

            .shop-btn {
                background-color: var(--primary-color);
                padding: 8px 20px;
                border: none;
                color: white;
                font-size: 14px;
                border-radius: 50px;
                cursor: pointer;
            }
        }

        /* Banner Card Section CSS Code */
        .card-banners {
            padding: 5% 8% 5%;
            display: flex;
            justify-content: space-between !important;
            /* flex-wrap: wrap; */
            gap: 20px;
        }

        .img-card {
            width: 340px;
            height: 220px;
            background-color: rgb(206, 255, 239);
            border-radius: 10px;
            position: relative;
            /* transform: translateY(-100%);
                                        transition: all ease 0.5s; */
        }

        /* .img-card:nth-of-type(even) {
                                        transform: translateY(100%);
                                        opacity: 0;
                                    }

                                    .img-card:nth-of-type(odd) {
                                        transform: translateY(-100%);
                                        opacity: 0;
                                    }

                                    .img-card.show {
                                        transform: translateY(0%);
                                        opacity: 1;
                                    } */

        .img-card img {
            width: 100%;
            height: 100%;
            border-radius: 10px;
        }

        .card-content {
            position: absolute;
            top: 60px;
            left: 0;
            padding-left: 20px;
        }

        .card-content p {
            font-size: 18px;
            font-weight: 600;
            width: 60%;
            line-height: 26px;
        }

        .card-content button {
            padding: 10px 20px;
            background-color: #e55039;
            border: none;
            border-radius: 50px;
            margin-top: 10px;
        }

        .card-content button:hover {
            background-color: #b53c29;
        }

        .card-content button a {
            color: white;
            text-decoration: none;
        }

        @media only screen and (max-width: 768px) {
            .card-ship {
                width: calc(50% - 5px);
            }

            .img-card {
                width: 220px;
                height: 150px;
            }

            .img-card img {
                width: 100%;
                height: 100%;
            }

            .card-content {
                top: 25px;
            }

            .card-content p {
                font-size: 14px;
                font-weight: 600;
                width: 70%;
                line-height: 18px;
            }

            .card-content button {
                padding: 2px 6px;
                background-color: #e55039;
                border: none;
                margin-top: 10px;
            }

            .card-content button a {
                color: white;
                text-decoration: none;
                font-size: 12px;
            }
        }

        @media only screen and (max-width: 600px) {
                .card-ship {
                    width: calc(50% - 5px);
                }

                .card-banners {
                    flex-wrap: wrap;
                    justify-content: center;
                    align-items: center;
                }

                .img-card {
                    width: 100%;
                    height: 100%;
                }

                .card-content {
                    top: 60px;
                }

                .card-content p {
                    font-size: 22px;
                    font-weight: 600;
                    width: 70%;
                    line-height: 28px;
                }

                .card-content button {
                    padding: 8px 12px;
                    background-color: #e55039;
                    border: none;
                    margin-top: 10px;
                }

                .card-content button a {
                    color: white;
                    text-decoration: none;
                    font-size: 12px;
                }
            }


        /* Shipping Card CSS Code */
        .shipping-cards {
            display: flex;
            align-items: flex-start;
            justify-content: space-between;
            padding: 5% 8% 5%;
            /* flex-wrap: wrap; */
            gap: 10px;
        }
        @media screen and (max-width: 768px) {
            .shipping-cards{
                flex-wrap: wrap;
                justify-content: space-evenly;
            }
        }

        .card-ship {
            width: calc(50% - 5px);
            max-width: 260px;
            height: 150px;
            background-color: rgb(255, 244, 244);
            border-radius: 5px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            opacity: 0;
            transform: translateY(-50px);
            transition: opacity 0.5s ease;
        }

        .card-ship:nth-child(1) {
            animation: fade-down 0.3s forwards 0.6s;
        }

        .card-ship:nth-child(2) {
            animation: fade-down 0.4s forwards 0.7s;
        }

        .card-ship:nth-child(3) {
            animation: fade-down 0.5s forwards 0.8s;
        }

        .card-ship:nth-child(4) {
            animation: fade-down 0.6s forwards 0.9s;
        }

        .ship-title {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 4px;
        }

        .ship-desc {
            font-size: 13px;
            line-height: 16px;
            text-align: center;
            color: gray;
        }


        @media only screen and (max-width: 600px) {
            .card-ship {
                width: calc(50% - 5px);
            }
        }

        /* Subscribe Section CSS Code */
        .subscribe-container {
            width: 100%;
            padding: 5% 8% 5%;
        }

        .form-subs {
            width: 100%;
            height: 200px;
            background-color: rgb(172, 221, 205);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px;
        }

        .subs-details {
            display: flex;
            flex-direction: column;
            gap: 3px;
            width: 45%;
        }

        .subs-title {
            font-size: 22px;
            font-weight: 600;
            line-height: 1.8rem;
        }

        .subs-input {
            position: relative;
        }

        .subs-input input {
            padding: 14px 10px;
            width: 100%;
            border-radius: 50px;
            outline: none;
            border: none;
        }

        .subs-input button {
            padding: 14px 18px;
            border-radius: 50PX;
            outline: none;
            border: none;
            background-color: #b53c29;
            color: white;
            cursor: pointer;
            position: absolute;
            top: 0;
            right: 0;
            box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px,
                rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
            transition: all .3s ease-in;
        }

        .subs-input button:hover {
            background-color: #e55039;
        }

        .subs-image {
            width: 200px;
            height: 200px;
        }

        .subs-image img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .site-section {
            padding: 2.5em 0;
            padding-right: 23px;
        }

        @media only screen and (max-width: 600px) {
            .form-subs {
                flex-direction: column;
                height: auto;
                padding: 20px
            }

            .subs-image {
                width: 100%;
                margin-top: 30px
            }

            .subs-details {
                width: 100%;
            }
        }

        /* New Code Popular Products */
        .popular-products {
            width: 100%;
            height: auto;
            padding: 5% 8% 5%;
            background-color: aliceblue;
            display: flex;
            align-items: center;
            justify-content: space-between !important;
            gap: 15px;
        }
        @media only screen and (max-width: 768px){
            .popular-products{
                flex-wrap: wrap;
                justify-content: space-evenly
            }
            .product-card{
                flex-wrap: wrap;
                justify-content: space-evenly;
                margin-bottom: 10px;

            }
        }

        .product-card {
            width: 280px;
            height: auto;
            padding: 10px;
            background-color: rgb(248, 248, 248);
            overflow: hidden;
            border-radius: 10px;
            text-align: center;
            border: 1px solid rgb(230, 230, 230);
            cursor: pointer;
        }

        .product-img {
            width: 100%;
            height: 200px;
            overflow: hidden;
            background-color: white;
            position: relative;
        }

        .product-img img {
            width: 100%;
            height: 100%;
            transform: scale(1);
            object-fit: contain;
        }

        .product-img img:hover {
            transform: scale(1.2);
            transition: all 0.4s ease-in;
        }

        .add-to-cart {
            margin-top: -30px;
            z-index: 999;
            position: relative;
            margin-bottom: 10px;
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

        .product-name {
            font-size: 20px;
            font-weight: 600;
            color: #1b1b1b;
            margin-top: 15px;

        }
        .product-name-2{
            font-size: 20px;
            font-weight: 600;
            color: #1b1b1b;
            margin-top: 15px;
        }

        .product-price {
            font-size: 18px;
            color: #1b1b1b;
        }

        .image-link {
            text-decoration: none;
            color: inherit;
        }

        @media only screen and (max-width: 600px) {
            .popular-products {
                padding: 5% 5%;
                flex-wrap: wrap;
                justify-content: space-between;
                gap: 10px;
            }

            .product-card {
                width: calc(50% - 7px);
                padding: 5px;
                height: auto;
                margin-bottom: 7px;
            }

            .product-img {
                height: 150px;
            }

            .product-img img {
                height: 70%;
            }

            .product-name {
                font-size: 16px;
            }

            .product-price {
                font-size: 14px;
            }
        }




        /* Testnomial Css Code */
        .testnomial-container {
            padding: 5% 8% 5%;
        }

        .test-heading {
            max-width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .test-heading h3 {
            font-size: 26px;
        }

        .test-heading p {
            width: 40vw;
            text-align: center;
            opacity: 70%;
            line-height: 1.5rem;
        }

        .test-cards {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
            margin-top: 20px;
        }

        .test-card {
            width: 335px;
            height: auto;
            padding: 30px;
            box-shadow: rgba(0, 0, 0, 0.05) 0px 6px 24px 0px, rgba(0, 0, 0, 0.08) 0px 0px 0px 1px;
            border-radius: 10px;
            margin: 10px;
        }

        .card-heading {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .card-info {
            font-size: 12px;
            font-weight: 300;
            line-height: 18px;
            opacity: 80%;
        }

        .card-profile {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 20px;
        }

        .card-profile img {
            width: 50px;
        }

        .profile-name {
            font-size: 16px;
            font-weight: 500;
        }

        .profile-info {
            font-size: 14px;
            font-weight: 300;
            opacity: 70%;
        }

        .card-profile-info {
            display: flex;
            flex-direction: column;
            line-height: 10px;
            justify-content: start;
            align-content: center;
            gap: 10px;
        }

        .card-profile-img {
            width: 30px;
            height: 30px;
        }

        @media only screen and (max-width: 600px) {

            /* .test-card {
                            width: 250px;
                            height: auto;
                        } */
            .test-card {
                width: 290px;
                height: auto;
                margin: 0 auto;
            }




            .test-headingn h3 {
                font-size: 15px;
            }

            .test-heading p {
                width: 100vw;
            }


            .title-section p {
                width: 100%;
            }
        }

        .popular-heading h3 {
            font-size: 26px;
            text-align: center;
        }

        .title-new-arrival {
            font-size: 26px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 50px;
        }

        /* Fade in and out animation */
        @keyframes fade-down {
            0% {
                opacity: 0;
                transform: translateY(-30px) scale(0.9);
            }

            100% {
                opacity: 1;
                transform: translateY(0px) sclae(1);
            }
        }


        body {
            overflow-x: hidden;
        }

        @keyframes fade-up {
            0% {
                opacity: 0;
                transform: translateY(30px) scale(0.9);
            }

            100% {
                opacity: 1;
                transform: translateY(0px) sclae(1);
            }
        }
    </style>
@endsection

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="site-wrap">

        <section class="hero-section">
            <img src="{{ asset('images/ricefield.jpg') }}" alt="" data-aos="fade-up"
                data-aos-anchor-placement="top-bottom" />
            <div class="hero-content">
                <p>Effective crop Treatments, new solutions daily</p>
                <h2 style="font-weight: 430;">Welcome to Zenith Agro Sciences</h2>
                <a href="/shop" class="shop-btn">Shop More</a>
            </div>
        </section>

        {{-- Banner Card Section --}}
        <div class="card-banners">
            <div class="img-card" data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
                <img src="{{ asset('images/bb/banner-1.png') }}" alt="" />
                <div class="card-content">
                    <p>Your One-Stop Agri-Shop</p>
                    <button><a href="{{route('shop')}}">Shop Now</a></button>
                </div>
            </div>
            <div class="img-card" data-aos="fade-zoom-in" data-aos-easing="ease-in-back" data-aos-delay="300"
                data-aos-offset="0">
                <img src="{{ asset('images/bb/banner-2.png') }}" alt="" />
                <div class="card-content">
                    <p>Cultivate with Confidence</p>
                    <button><a href="{{route('shop')}}">Shop Now</a></button>
                </div>
            </div>
            <div class="img-card" data-aos="fade-left">
                <img src="{{ asset('images/bb/banner-3.png') }}" alt="" />
                <div class="card-content">
                    <p>The Farmer’s Marketplace</p>
                    <button><a href="{{route('shop')}}">Shop Now</a></button>
                </div>
            </div>
        </div>

        {{-- New Code Popular --}}
        <div class="site-section">
            <div class="title-new-arrival">
                <h3 data-aos="fade-bottom">Popular Products</h3>
            </div>

            <div class="popular-products">

                <?php $count = 0; ?>
                <?php foreach ($popular_products as $product): ?>
                <?php if ($count >= 4) {
                    break;
                } ?>
                <a href="{{ route('shop-single', ['productID' => $product->id]) }}" class="image-link">

                    <div class="product-card">
                        <div class="product-img">
                            @foreach ($product->images->take(1) as $image)
                                @if ($image->url)
                                    <img src="{{ url($image->url) }}" alt="" />
                                @endif
                            @endforeach
                        </div>
                        {{-- <a href="{{ route('shop-single', ['productID' => $product->id]) }}" class="image-link"> --}}

                        <div class="add-to-cart">
                            <i class="fa-solid fa-bucket"
                                style="
                    font-size: 25px;
                    padding: 15px;
                    background-color: white;
                    border: 1px solid #e55039;
                    border-radius: 50px;
                    color: #e55039;
                    cursor: pointer;
                  "></i>
                        </div>
                
                {{-- <div class="product-cat">Categories</div> --}}
                <div class="product-rating">
                    <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i
                        class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                </div>
                <div class="product-name">@php
                    $words = explode(' ', $product->name);
                    if (count($words) > 2) {
                        echo $words[0] . ' ' . $words[1] . ' ...';
                    } else {
                        echo $product->name;
                    }
                @endphp</div>
                <div class="product-price">
                    
                    <span style='font-family:Arial;'>&#8377;</span>{{ $product->price }}

                </div>
            </div>
        </a>
            <?php $count++; ?>
            <?php endforeach; ?>
        </div>
    </div>
 
    <div class="site-section">
        <div class="title-new-arrival">
            <h3 data-aos="fade-bottom">New Arrival</h3>
        </div>
        <div class="main-product">

            <div class="nonloop-block-3 owl-carousel" id="owl-carousel">
                @foreach ($new_products as $product)
                    <div class="product-card">
                        <a href="{{ route('shop-single', ['productID' => $product->id]) }}">
                            @foreach ($product->images->take(1) as $image)
                                <div class="product-img">
                                    <img src="{{ url($image->url) }}" alt="" />
                                 
                                </div>
                            @endforeach

                            <div class="product-details">
                                <div class="product-rating">
                                </div>
                                <div class="product-name-2">
                                    {{ strlen($product->name) > 20 ? '...' . ucwords(strtolower(substr($product->name, 0, 20))) : $product->name }}
                                </div>
                                <div class="price-btn">
                                    <div class="product-price"><span style='font-family:Arial;'>&#8377;</span>{{ $product->price }}</div>
                                    <div class="btn-add">
                                        <a href="{{ route('shop-single', ['productID' => $product->id]) }}">
                                            {{-- <i class="fa-solid fa-eye"></i>  --}}
                                        </a>
                                    </div>
                                </div>
                            </div>
                    </div>

                    </a>
                @endforeach
            </div>

        </div>
    </div>
    </div>
    </div>

  

    <div class="site-section">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase">Great Words From People</h2>

                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 no-direction owl-carousel" id="owl-carousel">

                        <div class="test-card">
                            <h4 class="card-heading">"Lorem ipsum dolor sit amet"</h4>
                            <p class="card-info">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore
                                illum laudantium harum, possimus quae itaque sint enim amet sequi
                            </p>
                            <div class="card-profile">
                                <img src="{{ asset('images/profile.png') }}" alt="Profile Testnomial Image"
                                    style="width: 60px; height:60px;" />
                                <div class="card-profile-info">
                                    <p class="profile-name">Shopie More</p>
                                    <p class="profile-info">CEO at WebFlow Agency</p>
                                </div>
                            </div>
                        </div>
                        <div class="test-card">
                            <h4 class="card-heading">"Lorem ipsum dolor sit amet"</h4>
                            <p class="card-info">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore
                                illum laudantium harum, possimus quae itaque sint enim amet sequi
                            </p>
                            <div class="card-profile">
                                <img src="{{ asset('images/profile.png') }}" alt="Profile Testnomial Image"
                                    style="width: 60px; height:60px;" />
                                <div class="card-profile-info">
                                    <p class="profile-name">Shopie More</p>
                                    <p class="profile-info">CEO at WebFlow Agency</p>
                                </div>
                            </div>
                        </div>
                        <div class="test-card">
                            <h4 class="card-heading">"Lorem ipsum dolor sit amet"</h4>
                            <p class="card-info">
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tempore
                                illum laudantium harum, possimus quae itaque sint enim amet sequi
                            </p>
                            <div class="card-profile">
                                <img src="{{ asset('images/profile.png') }}" alt="Profile Testnomial Image"
                                    style="width: 60px; height:60px;" />
                                <div class="card-profile-info">
                                    <p class="profile-name">Shopie More</p>
                                    <p class="profile-info">CEO at WebFlow Agency</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="shipping-cards" data-aos="zoom-out-up">
        <div class="card-ship">
            <i class="fa-solid fa-boxes-packing" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
            <h3 class="ship-title">Fast Orders, Faster Harvests</h3>
            <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
        </div>
        <div class="card-ship">
            <i class="fa-solid fa-headset" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
            <h3 class="ship-title">24/7 Customer Support</h3>
            <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
        </div>
        <div class="card-ship">
            <i class="fa-solid fa-truck" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
            <h3 class="ship-title">Delivery in 5 Days</h3>
            <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
        </div>
        <div class="card-ship">
            <i class="fa-solid fa-credit-card" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
            <h3 class="ship-title">Easy Returns</h3>
            <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
        </div>
    </div>
    <!-- Subscription Section -->
    <div class="subscribe-container">
        <div class="form-subs">
            <div class="subs-details">
                <h3 class="subs-title" data-aos="fade-left">
                    Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.
                </h3>
                <p class="subs-desc">Lorem ipsum dolor sit amet.</p>
                <div class="subs-input" data-aos="fade-up" data-aos-anchor-placement="bottom-center">
                    <input type="text" placeholder="Your Email Addresses">
                    <button>Subscribe</button>
                </div>
            </div>
            <div class="subs-image">
                <img src="{{ asset('images/products-banner.png') }}" alt="">
            </div>
        </div>

    </div>

    </div>
@endsection
@section('scripts')
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
                modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
            }
            $(".modal").on("shown.bs.modal", alignModal);
            $(window).on("resize", function() {
                $(".modal:visible").each(alignModal);
            });
        });
        let items = document.querySelectorAll('.carousel .carousel-item')
        items.forEach((el) => {
            const minPerSlide = 4
            let next = el.nextElementSibling
            for (var i = 1; i < minPerSlide; i++) {
                if (!next) {
                    // wrap carousel by using first child
                    next = items[0]
                }
                let cloneChild = next.cloneNode(true)
                el.appendChild(cloneChild.children[0])
                next = next.nextElementSibling
            }
        })
        $('#owl-carousel').owlCarousel({
            rtl: true,
            loop: true,
            margin: 3,
            autoplay: true,
            autoplayTimeout: 4000,
            nav: true, // Enable navigation keys

            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 4
                }
            },
            navText: ["<", ">"]
        });
    </script>
@endsection
