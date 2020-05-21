<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login | Admin</title>
    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('login-assets/css/bootstrap.min.css') }}" rel="stylesheet">

    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="{{ asset('login-assets/css/nifty.min.css') }}" rel="stylesheet">

    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="http://www.themeon.net/nifty/v2.9.1/css/demo/nifty-demo-icons.min.css" rel="stylesheet">
    <!--=================================================-->
    <!--Demo [ DEMONSTRATION ]-->
    <link href="{{ asset('login-assets/css/demo/nifty-demo.min.css') }}" rel="stylesheet">
    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="{{ asset('login-assets/plugins/pace/pace.min.css') }}" rel="stylesheet">
    <script src="{{ asset('login-assets/plugins/pace/pace.min.js') }}"></script>
    <style>
        span.invalid-feedback {
            color: red;
        }
    </style>
</head>

<body>
    <div id="container" class="cls-container">
        <!-- BACKGROUND IMAGE -->
        <!--===================================================-->
        <div id="bg-overlay" class="bg-img"
            style="background-image: url(http://127.0.0.1:8000/login-assets/img/bg-img/bg-img-3.jpg);"></div>
         <!-- LOGIN FORM -->
    <!--===================================================-->
    <div class="cls-content">
        <div class="cls-content-sm panel">
            <div class="panel-body">
                <div class="mar-ver pad-btm">
                    <h1 class="h3">{{ __('Account Login') }}</h1>
                    <p>Sign In to your account</p>
                </div>
                <form method="POST" action='{{ url("login/$url") }}'>
                    @csrf
                    <div class="form-group">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="email">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="checkbox pad-btm text-left">
                        <input id="demo-form-checkbox" {{ old('remember') ? 'checked' : '' }} class="magic-checkbox"
                            type="checkbox">
                        <label for="demo-form-checkbox">Remember me</label>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Sign In</button>
                </form>
            </div>

            <div class="pad-all">
                <a href="{{ route('password.request') }}" class="btn-link mar-rgt">{{ __('Forgot Your Password?') }}</a>
                <a href="{{ route('register') }}" class="btn-link mar-lft">Create a new account</a>

                <div class="media pad-top bord-top">
                    <div class="pull-right">
                        <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
                        <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
                    </div>
                    <div class="media-body text-left text-bold text-main">
                        Login with
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--===================================================-->
    </div>
    <!--===================================================-->
    </div>
</body>
<script src="{{ asset('login-assets/js/jquery.min.js') }}"></script>
<!--BootstrapJS [ RECOMMENDED ]-->
<script src="{{ asset('login-assets/js/bootstrap.min.js') }}"></script>
<!--NiftyJS [ RECOMMENDED ]-->
<script src="{{ asset('login-assets/js/nifty.min.js') }}"></script>
<!--=================================================-->
<!--Background Image [ DEMONSTRATION ]-->
<script src="{{ asset('login-assets/js/demo/bg-images.js') }}"></script>

</html>
