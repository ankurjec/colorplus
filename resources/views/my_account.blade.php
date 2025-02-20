@extends('layouts.dashboard-layout')

@section('page-title', 'My Account')

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

@section('dashboard-content')

    <div class="flex items-center gap-2">
        <div>
            <i class="fa-solid fa-circle-user" style="font-size: 50px;"></i>
        </div>
        <div>
            <h3 class="text-xl font-semibold">User Name</h3>
            <div class="flex gap-2 text-[12px]">
                <p class="font-medium">Email: <span class="font-normal">user@email.com</span></p>
                <p class="font-medium">Phone: <span class="font-normal">12345 67890</span></p>
            </div>
            <div class="text-[14px]"><a href="#">Edit Profile</a></div>
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
        document.addEventListener("DOMContentLoaded", function() {
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
        });
    </script>
@endsection
