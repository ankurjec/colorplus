@extends('layouts.site-header')

@section('css')
@parent
<style>
  /* #proceed {
    color: #FFF;
    background-color: #ca2e45;
    border-color: #51eaea;
} */
</style>
@endsection

        

    @section('page-title', 'Cart')
    @section('content')

        {{-- <div class="site-section"> --}}

            <div id="overlay" style="display: none;"></div>

            <div class="container">
                <livewire:cart />
            </div>
        {{-- </div> --}}

        {{-- <div class="site-section bg-secondary bg-image" style="background-image: url('images/wheat_2.jpg');">
            <div class="container">
                <div class="row align-items-stretch">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex"
                            style="background-image: url('images/agri-prod.jpg');">
                            <div class="banner-1-inner align-self-center">
                                <h2 style="color: #FFF;">Agro Products</h2>
                                <p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Molestiae ex ad minus rem odio voluptatem.
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <a href="#" class="banner-1 h-100 d-flex"
                            style="background-image: url('images/agronomist_1.jpg');">
                            <div class="banner-1-inner ml-auto  align-self-center">
                                <h2 style="color: #FFF;">Rated by Experts</h2>
                                <p style="color: #FFF;">Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                                    Molestiae ex ad minus rem odio voluptatem.
                                </p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div> --}}


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

<script>
    function openModal() {
        // This function is called when the button is clicked and the user is not authenticated.
        // It will open the modal with the id "loginModal".
        $('#myModal').modal('show');
        
    }

    // function closeModal() {
    //     var modal = document.getElementById('loginModal');
     


    //         var modal = document.getElementById('loginModal');
    //     modal.style.display = 'none';
    //     document.getElementById("overlay").style.display = "none";
    // }

    // function closeModal() {
    //     // var modal = document.getElementById('loginModal');
    //     // modal.style.display = 'none';

    //     // // Hide the overlay when closing the modal
    //     // var overlay = document.getElementById('overlay');
    //     // overlay.style.display = 'none';
    //     var modal = document.getElementById('loginModal');
    //     if (event.target === modal) {
    //         closeModal();
    //     }
    
    // }

    // // Listen for clicks outside the modal to close it
    // window.onclick = function(event) {
    //     var modal = document.getElementById('loginModal');
    //     if (event.target === modal) {
    //         closeModal();
    //     }
    // };
        // Optionally, remove an overlay if present
    //     var overlay = document.getElementById('modalOverlay');
    //     if (overlay) {
    //         overlay.style.display = 'none';
    //     }
    // }

    // function closeModal() {
    //     var modal = document.getElementById('loginModal');
    //     modal.style.display = 'none';

    //     // Remove the overlay when closing the modal
    //     document.getElementById("overlay").style.display = "none";

    // }
</script>

    @endsection