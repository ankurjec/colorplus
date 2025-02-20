@extends('layouts.site-header')
@section('page-title', 'My Account')
@section('css')
@parent

<style>
    @media (max-width: 767px) {
        #content-container {
            padding: 10px;
            /* Adjust as needed */
        }
    }

    .modal-dialog {

        width: 360px;

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
@endsection



@section('content')
<br>

<div class="container" id="content-container">
    <!-- Tabs navs -->

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Account</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('accountdata')}}">Orders</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('wishlist')}}">Wishlist</a>
        </li>

    </ul><!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="tabs-1" role="tabpanel">
            <div class="list-group" id="user_table">
                <div id="table_data">
                    <form method="post" action="{{ route('profile.updatesiteuser') }}" class="mt-6 space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <label>Name</label>

                            <input class="form-control" type="text" id="account-name" name="name"
                                value="{{$user->name}}" required autofocus autocomplete="name" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <input class="form-control" type="text" id="account-email" name="email"
                                value="{{$user->email}}" readonly required autocomplete="email" />
                            <div class="flex items-center gap-4">
                                <br>

                                <button type="submt" class="btn btn-primary">SAVE</button>
                                @if (session('status') === 'profile-updated')
                                <p x-data="{ show: true }" x-show="show" x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
                                @endif
                            </div>
                    </form>

                    <div>
                        <form method="post" action="{{ route('profile.updatesiteuserpass') }}" class="mt-6 space-y-6">
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
</script>
@endsection