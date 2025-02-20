@section('css')
    @parent

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid lightgray;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #f7f7f7;
            border: 1px solid white;
        }
    </style>
@endsection

@extends('layouts.site-header')

@section('content')
    <br>

    <div class="container">


        {{-- New Code For My Account with Tailwind CSS --}}
        <div class="w-full h-auto p-4 bg-gray-50 mb-4">
            <div class="flex max-sm:flex-col items-start justify-start gap-[2vw]">
                <div class="w-[25vw] max-sm:w-[100%] max-h-auto p-0">
                    <div>
                        <ul class="list-none" id="tabList">
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white">
                                <a class="block hover:text-white" href="/my_account">My Account</a>
                                </li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white">
                                <a class="block hover:text-white" href="/my_address">Address</a>
                                </li>   
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white"><a
                                    class="block hover:text-white" href="/my_orders">Orders</a></li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white"><a
                                    class="block hover:text-white" href="/my_wishlist">Wishlist</a></li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white"><a
                                    class="block hover:text-white" href="/profile_update">Profile Setting</a></li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white"><a class="hover:text-white"
                                    href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w-[73vw] max-sm:w-[100%] max-h-auto p-4 bg-white border-2">
                    @yield('dashboard-content')
                </div>
            </div>
        </div>
    </div>
    
@endsection
@section('scripts')
    @livewireScripts

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/main.js"></script>
    <script>
        const accountDataRoute = '{{ route('accountdata') }}';
    </script>
    <script>

        // New Tab Code
       /*  document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll('[data-tab]');
            const tabContents = document.querySelectorAll('.tabContent');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabId = tab.getAttribute('data-tab');
                    tabContents.forEach(content => {
                        content.style.display = 'none';
                    });
                    document.getElementById(tabId).style.display = 'block';
                });
            });
        }); */
    </script>
@endsection
