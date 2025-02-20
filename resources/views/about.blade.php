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
        }

        /* New code for About us page */
        .about-container {
            padding: 5% 8% 5%;
        }

        .about-titles {
            width: 100%;
            text-align: center;
            margin-bottom: 40px;
        }

        .about-titles h3 {
            font-size: 28px;
        }

        .about-titles p {
            width: 40%;
            text-align: center;
            margin: auto;
        }

        .video-popup {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
        }

        .video-popup hr {
            width: 100%;
            outline: none;
            color: #1b1b1b;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-20px);
            }

            60% {
                transform: translateY(-10px);
            }
        }

        .animated-bounce {
            animation: bounce 1s infinite;
        }

        .about-details {
            display: flex;
            /* align-items: center; */
            gap: 20px;
            margin-top: 40px;
            width: 100%
        }
        .about-img{
            width: 50%
        }
        .about-img img {
            object-fit: cover;
            /* width: 500px !important; */
            height: auto;
        }

        .about-content {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            width: 50%
        }

        .about-content h2 {
            text-transform: uppercase;
            font-size: 35px;
            font-weight: 700;
        }

        .schoolbell-regular {
            font-family: "Schoolbell", cursive;
            font-weight: 600;
            font-style: bold;
            font-size: 24px;
        }
        img, video{
            max-width: 0;
        }
        @media screen and (max-width: 600px) {
            .about-details {
                flex-direction: column;
                width: 100%
            }
            .about-img{
                width: 100%;
            }

            .about-img img {
                width: 100%;
            }

            .about-titles h3 {
                line-height: 1.9rem;
                margin-bottom: 20px;
                color: #e55039 !important;
            }

            .about-titles p {
                width: 100%;
                text-align: center;
                line-height: 1.3rem;

            }
            .about-content{
                width: 100%;
                margin-bottom: 60px;
            }

            .video-popup {
                gap: 10px;
            }
        }

        .shipping-cards {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 4% 8% 0%;
            flex-wrap: wrap;
            gap: 10px;
        }

        .card-ship {
            width: 260px;
            height: 150px;
            background-color: rgb(255, 244, 244);
            border-radius: 5px;
            padding: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            transform: translateY(-50px);
            transition: opacity 0.5s ease, ;
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

        /* Team Section CSS Code */
        .team-container {
            width: 100%;
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 40px;
        }

        .profile-card {
            position: relative;
            font-family: sans-serif;
            width: 220px;
            height: 220px;
            background: #fff;
            padding: 30px;
            border-radius: 50%;
            box-shadow: 0 0 22px #3336;
            transition: .6s;
            margin: 0 25px;
        }

        .profile-card:hover {
            border-radius: 10px;
            height: 260px;
        }

        .profile-card .img {
            position: relative;
            width: 100%;
            height: 100%;
            transition: .6s;
            z-index: 99;
        }

        .profile-card:hover .img {
            transform: translateY(-60px);
        }

        .img img {
            width: 100%;
            border-radius: 50%;
            box-shadow: 0 0 22px #3336;
            transition: .6s;
        }

        .profile-card:hover img {
            border-radius: 10px;
        }

        .caption {
            text-align: center;
            transform: translateY(-80px);
            opacity: 0;
            transition: .6s;
        }

        .profile-card:hover .caption {
            opacity: 1;
        }

        .caption h3 {
            font-size: 21px;
            font-family: sans-serif;
        }

        .caption p {
            font-size: 15px;
            color: #0c52a1;
            font-family: sans-serif;
            margin: 2px 0 9px 0;
        }

        .caption .social-links a {
            color: #333;
            margin-right: 15px;
            font-size: 21px;
            transition: .6s;
        }

        .social-links a:hover {
            color: #0c52a1;
        }

        .team-section {
            text-align: center;
            margin-top: 40px;
        }

        .team-section h2 {
            font-size: 50px;
            /* margin-bottom: 50px; */
        }

        .team-section p {
            margin-bottom: 50px;
        }

        .about-details {
            display: flex;
            /* align-items: center; */
            gap: 20px;
            margin-top: 40px;
            width: 100%
        }
        .about-img{
            width: 50%
        }
        .about-img img {
            object-fit: cover;
            /* width: 500px !important; */
            height: auto;
        }
        .about-content {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            width: 50%
        }
        .about-content h2 {
            text-transform: uppercase;
            font-size: 35px;
            font-weight: 700;
        }
        .schoolbell-regular {
            font-family: "Schoolbell", cursive;
            font-weight: 600;
            font-style: bold;
            font-size: 24px;
        }
        img, video{
            max-width: 0;
        }
        @media screen and (max-width: 600px) {
            .about-details {
                flex-direction: column;
                width: 100%
            }
            .about-img{
                width: 100%;
            }
            .about-img img {
                width: 100%;
            }
            .about-titles h3 {
                line-height: 1.9rem;
                margin-bottom: 20px;
                color: #E55039 !important;
            }
            .about-titles p {
                width: 100%;
                text-align: center;
                line-height: 1.3rem;
            }
            .about-content{
                width: 100%;
                margin-bottom: 60px;
            }
            .video-popup {
                gap: 10px;
            }
        }
    </style>
@endsection

@extends('layouts.site-header')
@section('page-title', 'About us')

@section('content')

    <div class="site-wrap">


        {{-- New code for about us page --}}
        <div class="about-container">
            <div class="about-titles">
                <h3 class="text-2xl font-bold">SINCE 1982 OUR STORY</h3>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci unde
                    quia sint id aperiam, labore non voluptate quibusdam voluptatum
                    dolorem hic numquam.
                </p>
            </div>
            <div class="video-popup">
                <hr />
                <a href="https://vimeo.com/channels/staffpicks/93951774"><i class="fa-solid fa-circle-play animated-bounce"
                        style="font-size: 90px; cursor: pointer"></i></a>
                <hr />
            </div>
            <div class="about-details">
                <div class="about-img">
                    <img src={{ asset('images/bb/aboutimg.jpg') }} alt="" />
                </div>
                <div class="about-content">
                    <h2>Story about us</h2>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique
                        labore adipisci esse incidunt laboriosam ratione eveniet perferendis
                        doloribus repellat. In obcaecati ipsum provident? Iure iusto in a
                        necessitatibus repellendus deserunt. incidunt laboriosam ratione
                        eveniet perferendis doloribus repellat. In obcaecati ipsum
                        provident? Iure iusto in a necessitatibus repellendus deserunt.
                        incidunt laboriosam ratione eveniet perferendis doloribus repellat.
                    </p>
                    <div class="schoolbell-regular">Zenith Agro Science</div>
                </div>
            </div>
        </div>
        <div class="shipping-cards">
            <div class="card-ship">
                <i class="fa-solid fa-boxes-packing" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
                <h3 class="ship-title">Delivery in 5 Days</h3>
                <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
            <div class="card-ship">
                <i class="fa-solid fa-headset" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
                <h3 class="ship-title">Delivery in 5 Days</h3>
                <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
            <div class="card-ship">
                <i class="fa-solid fa-truck" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
                <h3 class="ship-title">Delivery in 5 Days</h3>
                <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
            <div class="card-ship">
                <i class="fa-solid fa-credit-card" style="font-size: 34px; color: #1b1b1b; margin-bottom: 4px;"></i>
                <h3 class="ship-title">Delivery in 5 Days</h3>
                <p class="ship-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit</p>
            </div>
        </div>

        {{-- Team Section --}}
        <div class="team-section">
            <h2>Meet The Team</h2>
            <p>Meet our team of professionals to serve you </p>
            <div class="team-container">
                <div class="profile-card">
                    <div class="img">
                        <img
                            src="https://1.bp.blogspot.com/-8c7QTLoyajs/YLjr2V6KYRI/AAAAAAAACO8/ViVPQpLWVM0jGh3RZhh-Ha1-1r3Oj62wQCNcBGAsYHQ/s16000/team-1-3.jpg">
                    </div>
                    <div class="caption">
                        <h3>Vin Diesel</h3>
                        <p>Founder</p>
                        {{-- <div class="social-links">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div> --}}
                    </div>
                </div>
                <div class="profile-card">
                    <div class="img">
                        <img
                            src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg">
                    </div>
                    <div class="caption">
                        <h3>David Corner</h3>
                        <p>Project Manager</p>
                        {{-- <div class="social-links">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div> --}}
                    </div>
                </div>
                <div class="profile-card">
                    <div class="img">
                        <img
                            src="https://1.bp.blogspot.com/-AO5j2Y9lzME/YLjr3mxiqAI/AAAAAAAACPE/KAaYYTtQTrgBE3diTbxGoc4U4fCGx-C2gCNcBGAsYHQ/s16000/team-1-4.jpg">
                    </div>
                    <div class="caption">
                        <h3>Tom Cruise</h3>
                        <p>Designer</p>
                        {{-- <div class="social-links">
                            <a href="#"><i class="fab fa-facebook"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                        </div> --}}
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

        {{-- <div class="site-blocks-cover inner-page" style="background-image: url('images/wheat_1.jpg');">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mx-auto align-self-center">
                        <div class=" text-center">
                            <h1 style="color:rgb(45, 53, 60)">About Us</h1>
                            <p style="color:rgb(45, 53, 60)">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum
                                obcaecati
                                natus iure voluptatum eveniet harum recusandae ducimus saepe.</p>ˀ
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="site-section bg-light custom-border-bottom" data-aos="fade">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6">
                        <div class="block-16">
                            <figure>
                                <img src="images/agri-prod.jpg" alt="Image placeholder" class="img-fluid rounded">
                                <a href="https://vimeo.com/channels/staffpicks/93951774"
                                    class="play-button popup-vimeo"><span class="icon-play"></span></a>

                            </figure>
                        </div>
                    </div>
                    <div class="col-md-1"></div>
                    <div class="col-md-5">


                        <div class="site-section-heading pt-3 mb-4">
                            <h2 class="text-black">How We Started</h2>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius repellat, dicta at laboriosam,
                            nemo
                            exercitationem itaque eveniet architecto cumque, deleniti commodi molestias repellendus quos
                            sequi hic
                            fugiat
                            asperiores illum. Atque, in, fuga excepturi corrupti error corporis aliquam unde nostrum quas.
                        </p>
                        <p>Accusantium dolor ratione maiores est deleniti nihil? Dignissimos est, sunt nulla illum autem in,
                            quibusdam
                            cumque recusandae, laudantium minima repellendus.</p>

                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="site-section bg-light custom-border-bottom" data-aos="fade">
            <div class="container">
                <div class="row mb-5">
                    <div class="col-md-6 order-md-2">
                        <div class="block-16">
                            <figure>
                                <img src="images/wheat_2.jpg" alt="Image placeholder" class="img-fluid rounded">
                                <a href="https://vimeo.com/channels/staffpicks/93951774"
                                    class="play-button popup-vimeo"><span class="icon-play"></span></a>

                            </figure>
                        </div>
                    </div>
                    <div class="col-md-5 mr-auto">
                        <div class="site-section-heading pt-3 mb-4">
                            <h2 class="text-black">We Are Trusted Company</h2>
                        </div>
                        <p class="text-black">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius repellat,
                            dicta at
                            laboriosam, nemo
                            exercitationem itaque eveniet architecto cumque, deleniti commodi molestias repellendus quos
                            sequi hic
                            fugiat
                            asperiores illum. Atque, in, fuga excepturi corrupti error corporis aliquam unde nostrum quas.
                        </p>
                        <p class="text-black">Accusantium dolor ratione maiores est deleniti nihil? Dignissimos est, sunt
                            nulla illum
                            autem in, quibusdam
                            cumque recusandae, laudantium minima repellendus.</p>
                    </div>
                </div>
            </div>
        </div> --}}

        {{-- <div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                        <div class="icon mr-4 align-self-start">
                            <span class="icon-truck text-primary"></span>
                        </div>
                        <div class="text">
                            <h2>Free Shipping</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                                accumsan
                                tincidunt fringilla.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon mr-4 align-self-start">
                            <span class="icon-refresh2 text-primary"></span>
                        </div>
                        <div class="text">
                            <h2>Free Returns</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                                accumsan
                                tincidunt fringilla.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon mr-4 align-self-start">
                            <span class="icon-help text-primary"></span>
                        </div>
                        <div class="text">
                            <h2>Customer Support</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus at iaculis quam. Integer
                                accumsan
                                tincidunt fringilla.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


        {{-- <div class="site-section bg-light custom-border-bottom" data-aos="fade">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-md-7 site-section-heading text-center pt-4">
                        <h2>The Team</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-6 mb-5">

                        <div class="block-38 text-center">
                            <div class="block-38-img">
                                <div class="block-38-header">
                                    <img src="images/person_1.jpg" alt="Image placeholder" class="mb-4">
                                    <h3 class="block-38-heading h4">Elizabeth Graham</h3>
                                    <p class="block-38-subheading">CEO/Co-Founder</p>
                                </div>
                                <div class="block-38-body">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit
                                        distinctio
                                        recusandae doloribus ut fugit officia voluptate soluta. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-5">
                        <div class="block-38 text-center">
                            <div class="block-38-img">
                                <div class="block-38-header">
                                    <img src="images/person_2.jpg" alt="Image placeholder" class="mb-4">
                                    <h3 class="block-38-heading h4">Jennifer Greive</h3>
                                    <p class="block-38-subheading">Co-Founder</p>
                                </div>
                                <div class="block-38-body">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit
                                        distinctio
                                        recusandae doloribus ut fugit officia voluptate soluta. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-5">
                        <div class="block-38 text-center">
                            <div class="block-38-img">
                                <div class="block-38-header">
                                    <img src="images/person_3.jpg" alt="Image placeholder" class="mb-4">
                                    <h3 class="block-38-heading h4">Patrick Marx</h3>
                                    <p class="block-38-subheading">Marketing</p>
                                </div>
                                <div class="block-38-body">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit
                                        distinctio
                                        recusandae doloribus ut fugit officia voluptate soluta. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 mb-5">
                        <div class="block-38 text-center">
                            <div class="block-38-img">
                                <div class="block-38-header">
                                    <img src="images/person_4.jpg" alt="Image placeholder" class="mb-4">
                                    <h3 class="block-38-heading h4">Mike Coolbert</h3>
                                    <p class="block-38-subheading">Sales Manager</p>
                                </div>
                                <div class="block-38-body">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae aut minima nihil sit
                                        distinctio
                                        recusandae doloribus ut fugit officia voluptate soluta. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}


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
    </script>

@endsection
