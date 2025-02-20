@extends('layouts.site-header')

@section('css')
    @parent
    <style>
        .reg-container {
            padding: 5% 8% 5%;
            width: 100vw;
            /* height: 100vh; */
            height: auto;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .register-form {
            width: 400px;
            height: auto;
            /* background-color: #e55039; */
            padding: 25px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        .register-form img {
            display: flex;
            align-items: center;
        }

        .form-input {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 5px;
        }

        .form-input label {
            font-size: 13px;
        }

        .form-input input {
            padding: 10px 10px;
            border-radius: 5px;
            box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;
            border: none;
            margin-bottom: 10px;
        }

        .btn-register {
            width: 100%;
            background-color: var(--primary-color);
            color: white;
            outline: none;
            border: none;
            padding: 10px 10px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-register:hover {
            background-color: var(--secondary-color);
        }

        .logo-registration {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            flex-direction: column;
        }

        .form-title {
            font-size: 20px;
            font-weight: 500;
        }

        .link-resgiter {
            text-align: center;
            font-size: 13px;
            padding: 5px 0px 0px;
        }

        .link-resgiter a {
            font-size: 14px;
            font-weight: 500;
            color: #b53c29;
            text-decoration: none;
        }
    </style>
@endsection



@section('page-title', 'User Registration')
@section('content')

    <div class="reg-container">
        <div class="register-form">
            <div class="logo-registration">
                <img src="{{ asset('images/z_logo.png') }}" width="50" height="50" alt="Company Logo" />
                <div class="form-title">Registration</div>
            </div>
            <div class="form-content">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-input">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" placeholder="Your Name" />
                    </div>
                    <div class="form-input">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email" placeholder="Your Email" />
                    </div>
                    <div class="form-input">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password" />
                    </div>
                    <div class="form-input">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm Password" />
                    </div>
                    <button type="submit" class="btn-register">Register</button>
                </form>
                <div class="link-resgiter">Have an account? <a href="/user_login">Sign up</a></div>
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

    <script></script>
@endsection
