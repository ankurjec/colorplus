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

        .tab-content .tab-pane {
            border: 1px solid rgb(187, 183, 183);
            /* Adjust the border thickness and color as needed */
            border-radius: 10px;
            /* Adjust the border radius to create curved corners */
            padding: 1px;
            /* Add some padding to the content for better spacing */
            background-color: #f7f7f7;
            /* Optional: Add a background color for the tab content */
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
@section('page-title', 'My Account')

@section('content')
    <br>

    <div class="container">


        {{-- New Code For My Account with Tailwind CSS --}}
        <div class="w-full h-auto p-4 bg-gray-50 mb-4">
            <div class="flex max-sm:flex-col items-start justify-start gap-[2vw]">
                <div class="w-[25vw] max-sm:w-[100%] max-h-auto p-0">
                    <div>
                        <ul class="list-none" id="tabList">
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white" data-tab="tab1">
                                <a class="hover:text-white" href="#">My Account</a>
                                {{-- <a class="nav-link" href="{{ route('myorders') }}">Account</a> --}}
                                </li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white" data-tab="tab2"><a
                                    class="hover:text-white" href="#">Address</a></li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white" data-tab="tab3"><a
                                    class="hover:text-white" href="#">Orders</a></li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white" data-tab="tab4"><a
                                    class="hover:text-white" href="#">Wishlist</a></li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white" data-tab="tab5"><a
                                    class="hover:text-white" href="#">Profile Setting</a></li>
                            <li class="p-2 cursor-pointer hover:bg-slate-400 hover:text-white"><a class="hover:text-white"
                                    href="#">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="w-[73vw] max-sm:w-[100%] max-h-auto p-4 bg-white border-2">
                    <div class="tabContent" id="tab1">
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
                        <hr class="mt-4 h-1">
                    </div>
                    <div class="tabContent" id="tab2">
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
                                <button
                                    class="mt-2 text-white bg-slate-500 px-4 py-2 cursor-pointer rounded-md hover:bg-slate-600">Add
                                    New Address</button>
                            </div>
                        </div>
                        <hr class="mt-4 h-1">
                    </div>
                    <div class="tabContent" id="tab3">
                        {{-- <div>
                            Your Order is Empty!
                        </div> --}}
                        <div class="mt-2 border-2 p-4">
                            <div class="flex items-center justify-between border-b-2 pb-4">
                                <div class="text-[14px] font-medium">
                                    <div> Order Id: 0123<span class="text-green-500"> Shipped</span></div>
                                    <div>Date: 12 july 2023</div>
                                </div>
                                <div class="text-blue-500 text-[14px] "><a href="#" class="hover:text-blue-700">Order
                                        Details</a></div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div>

                                    <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                        style="height: 120px; width: 120px;">

                                </div>
                                <div>
                                    <div>Product Name</div>
                                    <div>Qty: 1</div>
                                    <div>Price: 123</div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 border-2 p-4">
                            <div class="flex items-center justify-between border-b-2 pb-4">
                                <div class="text-[14px] font-medium">
                                    <div> Order Id: 0123<span class="text-green-500"> Shipped</span></div>
                                    <div>Date: 12 july 2023</div>
                                </div>
                                <div class="text-blue-500 text-[14px] "><a href="#" class="hover:text-blue-700">Order
                                        Details</a></div>
                            </div>
                            <div class="flex items-center gap-2">
                                <div>

                                    <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                        style="height: 120px; width: 120px;">

                                </div>
                                <div>
                                    <div>Product Name</div>
                                    <div>Qty: 1</div>
                                    <div>Price: 123</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tabContent" id="tab4">
                        {{-- <div>
                            Your Wishlist is Empty!
                        </div> --}}
                        <div class="mt-10">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <div class="flex items-center gap-2 max-sm:flex-col">
                                                <div>

                                                    <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                                        style="height: 120px; width: 120px;">

                                                </div>
                                                <div class="max-sm:hidden">
                                                    <div>Product Name</div>
                                                    <div>Qty: 1</div>
                                                    <div>Price: 123</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button><i class="fa-solid fa-trash-can"
                                                    style="font-size: 22px; color: #e55039"></i></button>&nbsp;
                                            <button><i class="fa-solid fa-cart-plus"
                                                    style="font-size: 22px; color: #e55039"></i></i></button>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>
                                            <div class="flex items-center gap-2 max-sm:flex-col">
                                                <div>

                                                    <img src="{{ asset('images/product_01.png') }}" alt="Product Image"
                                                        style="height: 120px; width: 120px;">

                                                </div>
                                                <div class="max-sm:hidden">
                                                    <div>Product Name</div>
                                                    <div>Qty: 1</div>
                                                    <div>Price: 123</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <button><i class="fa-solid fa-trash-can"
                                                    style="font-size: 22px; color: #e55039"></i></button>&nbsp;
                                            <button><i class="fa-solid fa-cart-plus"
                                                    style="font-size: 22px; color: #e55039"></i></i></button>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tabContent" id="tab5">
                        <div>
                            <form method="post" action="{{ route('profile.updatesiteuser') }}" class="mt-6 space-y-6">
                                @csrf
                                @method('patch')
                                <div>
                                    <label>Name</label>
                                    <input class="form-control" type="text" id="account-name" name="name"
                                        value="{{ $user->name }}" required autofocus autocomplete="name" />
                                </div>
                                <div>
                                    {{-- <x-input-label for="email" :value="__('Email')" /> --}}
                                    <label for="email">Email</label>
                                    <input class="form-control" type="text" id="account-email" name="email"
                                        value="{{ $user->email }}" readonly required autocomplete="email" />
                                    <div class="flex items-center gap-4">
                                        <br>
                                        <button type="submt" class="btn btn-primary">SAVE</button>
                                        @if (session('status') === 'profile-updated')
                                            <p x-data="{ show: true }" x-show="show" x-transition
                                                x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600 dark:text-gray-400">
                                                {{ __('Saved.') }}</p>
                                        @endif
                                    </div>
                            </form>
                            <div>
                                <form method="post" action="{{ route('profile.updatesiteuserpass') }}"
                                    class="mt-6 space-y-6">
                                    @csrf
                                    @method('patch')
                                    <label>Current Password</label>
                                    <input class="form-control" type="text" name="current_password" required autofocus
                                        autocomplete="current_password" />
                            </div>

                            <div>
                                <label>New Password</label>
                                <input class="form-control" type="text" name="password" required autofocus
                                    autocomplete="password" />
                            </div>
                            <br>
                            <button type="submt" class="btn btn-primary">UPDATE PASSWORD</button>
                            </form>
                        </div>
                    </div>
                    {{-- <div class="tabContent" id="tab6">
                        Logout
                    </div> --}}
                </div>
            </div>
        </div>


        <!-- Tabs navs -->
        {{-- <ul class="nav nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('myorders') }}">Account</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tabs-2" role="tab">Orders</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('wishlist') }}">Wishlist</a>
            </li>

        </ul> --}}

        <!-- Tab panes -->
        {{-- <div class="tab-content">
            <div class="tab-pane active" id="tabs-2" role="tabpanel">


                <div class="list-group" id="user_table">
                    <div id="table_data">
                        @livewire('order-pagination')
                    </div>
                </div>
            </div>
        </div> --}}
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
        // Function to handle the tab click event
        function handleAccountTabClick() {
            // Get the tab content element
            const accountTabContent = document.getElementById('tabs-2');

            // Check if the account data has already been loaded
            if (!accountTabContent.classList.contains('data-loaded')) {
                console.log('Fetching account data...');
                // Fetch the CSRF token
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                console.log('CSRF Token:', csrfToken);

                // Fetch the account data using Ajax
                fetch(accountDataRoute, {
                        method: 'GET',
                        headers: {
                            'X-CSRF-TOKEN': csrfToken,
                            'Content-Type': 'application/json',
                            'Accept': 'application/json'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Account data fetched:', data);
                        // Update the tab content with the fetched account data
                        // document.getElementById('account-name').textContent = 'Name: ' + data.name;
                        // document.getElementById('account-email').textContent = 'Email: ' + data.email;
                        document.getElementById('account-name').value = data.name;
                        document.getElementById('account-email').value = data.email;
                        // document.getElementById('account-address').textContent = 'Address: ' + data.address;

                        // Add a class to mark the tab content as loaded
                        accountTabContent.classList.add('data-loaded');
                    })
                    .catch(error => console.error('Error fetching account data:', error));
            }
        }


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
