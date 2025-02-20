@extends('layouts.dashboard-layout')

@section('page-title', 'My Address')

@section('dashboard-content')

    <div>
        <div class="flex w-full gap-2 max-sm:flex-col items-center justify-between mt-2">
            <div class="w-[49%] max-sm:w-[100%] bg-gray-50 border-2 p-2">
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-location-dot" style="font-size: 25px"></i>
                    <div class="flex flex-col text-gray-700 leading-5 gap-1 text-[14px]">
                        Agro Zenith Sciences<br />505, Block-5, Srping Valley, Guwahati,
                        Assam 781013
                    </div>
                </div>
            </div>
            <div class="w-[49%] max-sm:w-[100%] bg-gray-50 border-2 p-2">
                <div class="flex items-start gap-2">
                    <i class="fa-solid fa-location-dot" style="font-size: 25px"></i>
                    <div class="flex flex-col text-gray-700 leading-5 gap-1 text-[14px]">
                        Agro Zenith Sciences<br />505, Block-5, Srping Valley, Guwahati,
                        Assam 781013
                    </div>
                </div>
            </div>
        </div>
        <div>
            <button class="mt-2 text-white bg-slate-500 px-4 py-2 cursor-pointer rounded-md hover:bg-slate-600">Add
                New Address</button>
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

    <script></script>
@endsection
