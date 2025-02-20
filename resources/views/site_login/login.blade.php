@extends('layouts.site-header')

@section('css')
    @parent
    <style>
        .login-container {
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

        .btn-login {
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

        .btn-login:hover {
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

        .remember {
            display: flex;
            font-size: 13px;
            align-items: center;
            justify-content: space-between;
            padding: 5px 0px 5px;
        }

        .rem-check {
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .rem-forgot a {
            text-decoration: none;
            color: black;
            cursor: pointer;
        }

        .rem-forgot a:hover {
            color: var(--primary-color);
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



@section('page-title', 'User Login')
@section('content')

    <div class="login-container">
        <div class="register-form">
            <div class="logo-registration">
                <img src="{{ asset('images/z_logo.png') }}" width="50" height="50" alt="Company Logo" />
                <div class="form-title">Login</div>
            </div>
            <div class="form-content">
                <form method="POST" action="{{ route('sitestore') }}">
                    @csrf
                    <div class="form-input">
                        <label for="email">Email Address*</label>
                        <input type="email" name="email" id="email" placeholder="Your email address" />
                    </div>
                    <div class="form-input">
                        <label for="password">Password*</label>
                        <input type="password" name="password" id="password" placeholder="Enter your password" />
                    </div>
                    <div class="remember">
                        <div class="rem-check">
                            <input type="checkbox" name="remember" id="remember" />
                            <label for="remember">Remember Me</label>
                        </div>
                        <div class="rem-forgot">
                            <a href="#">Forgot Password</a>
                        </div>
                    </div>

                    <button type="submit" class="btn-login">Login</button>
                </form>
                <div class="link-resgiter">Don't have an account? <a href="/user_register">Sign up</a></div>
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
