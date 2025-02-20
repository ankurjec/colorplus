@extends('layouts.site-header')

@section('css')
    @parent
    <style>
        .error-container{
        padding: 5% 8% 5%;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100vw;
        height: auto;
    }
    .error-details img{
        width: 400px;
        height: auto;
    }
    .error-details{
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
    }
    .error-details .error-title{
        font-size: 54px;
        font-weight: 600;
        color: #e55054;
        text-align: center;
    }
    .btn-error{
        background-color: #e55054;
        color: white;
        padding: 10px 18px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: all .3s ease-in-out;
    }
    .btn-error:hover{
        /* border: 1px solid #b32f33; */
        color: #ffffff;
        background-color: #b32f33;
    }
    .btn-error a{
        text-decoration: none;
        color: white;
    }
    @media screen and (max-width:600px) {
      .error-details img{
        width: 200px;
        height: auto;
    }
    .error-title{
      line-height: 3.5rem;
    }
    }

    </style>
@endsection



@section('page-title', '404 Error')
@section('content')


    <div class="site-section">
        <div class="error-container">
        <div class="error-details">
            <img src="{{ asset('images/jaconda-17.gif') }}" alt="">
            <h2 class="error-title">Page Not Found!</h2>
            <button class="btn-error"><a href="/">Back to Home</a></button>
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
