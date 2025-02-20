@extends('layouts.site-header')

@section('css')
    @parent
@endsection



@section('page-title', 'Order Failed')
@section('content')

    <div class="w-full h-screen flex flex-col items-center justify-center">
        <div class="w-[160px] h-[160px] mb-4">
            <img src="{{ asset('images/icon-failed.png') }}" alt="" />
        </div>
        <div class="text-3xl font-semibold">Order Failed!</div>
        <div class="text-md">We are unbale to process your order at this time.</div>
        <div class="flex gap-3 mt-2">
            <button class=" text-[#e55039] rounded-md font-medium border-[#e55039] border-[1px] px-4 py-2 hover:bg-[#e55039] hover:text-white transition-all delay-25">Homepage</button>
            <button class="bg-[#e55039] hover:bg-[#b53c29] hover:border-[#b53c29] rounded-md font-medium text-white border-[#e55039] border-2 px-4 py-2">Try Again</button>
        </div>
        <div class="mt-2 text-gray-400 hover:text-gray-600 font-normal">
            <a href="#">Need Help?</a>
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
