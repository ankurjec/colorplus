<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Add your common head meta tags, stylesheets, and scripts here -->

    <!DOCTYPE html>
<html lang="en">

<head>
    <title>Cart</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">

    <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">


    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
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
    </style>
    @livewireStyles()
</head>
<body>
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

    <div class="container">
        @yield('content')
    </div>

</footer>
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
</script>
@livewireScripts()
</body>

</html>
</body>
</html>
