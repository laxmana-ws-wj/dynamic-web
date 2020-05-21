@extends('user.layouts.master')

@section('title')
    Login | Active Boys
@endsection

@section('content')
<div class="login-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-7 col-sm-12 col-xs-12 fitness-image">
        </div>
        <div class="col-md-5 col-sm-12 col-xs-12 sign-in-page">
          <section class="login">
            <div class="login-content">
              <div class="login-image">
                <div class="action-logo">
                  <figure><img src="{{asset('asset/assets_user/Images/white-logo.png')}}" alt="sing up image"></figure>
                </div>
              </div>
              <div class="sign-in-form">
                @isset($url)
                <form method="POST" class="login-form" action='{{ url("login/$url") }}' aria-label="{{ __('Login') }}"  id="login-form">
                @else
                <form method="POST" class="login-form"action="{{ route('login') }}" aria-label="{{ __('Login') }}"  id="login-form">
                @endisset
                    @csrf
                  <div class="block-field ">
                    <div class="col-sm-12 no-padding ">
                      <div class="col-sm-6 form-group">
                        <i class="fa fa-envelope"></i>
                        <label for="email"></label>
                      <input type="text" name="email" id="email2" placeholder=" Email or Username" value="{{ old('email')}}"/>
                        @if ($errors->has('email'))
                            <span style="color:#d23838;">{{ $errors->first('email') }}</span>
                        @endif
                      </div>
                    </div>
                    <div class="col-sm-12 no-padding">
                      <div class="col-sm-6 form-group">
                        <i class="fa fa-lock"></i>
                        <label for="re-pass"></label>
                        <input type="password" name="password" id="re_pass2" placeholder="Password" />
                        @if ($errors->has('password'))
                            <span style="color:#d23838;">{{ $errors->first('password') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 ">
                    <div class="form-group login-button-form">
                      <button type="submit" name="signup" id="login-btn" href="#"
                        class="form-submit btn btn-info btn-lg" value="SIGNUP">
                        SIGNIN<span class="glyphicon glyphicon-circle-arrow-right"></span>
                      </button>
                    </div>
                  </div>
                  <div class="col-sm-12 ">
                    <div class="form-group">

                      <span class="remember-me">
                        <span class=""><input type="checkbox" name="agree-term" id="agree-term-input"
                            class="agree-term" /></span>
                        <span class="">
                          <p>Remember Me</p>
                        </span>
                        <span class=""><a class="forgotpassword" href="#">Forgot Password</a></span>
                      </span>

                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="footersignup">
                    <p>Don't have an account yet? <a class="signin-txt" href="{{route('register')}}">Sign Up</a></p>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </section>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection
