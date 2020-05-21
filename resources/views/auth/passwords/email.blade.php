@extends('user.layouts.master')

@section('title')
    Forgot Password | Perform30
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
                        <div class="sign-in-form">
                            <form method="POST" action="{{ route('password.email') }}"
                                aria-label="{{ __('Reset Password') }}" id="login-form" class="login-form">
                                @csrf
                                <div class="block-field ">
                                    <div class="col-sm-12 no-padding ">
                                        <div class="col-sm-6 form-group">
                                            <i class="fa fa-envelope"></i>
                                            <label for="email"></label>
                                            <input id="text" type="email" name="email"
                                                value="{{ old('email') }}" placeholder="Enter Email"/>
                                            @if ($errors->has('email'))
                                            <span style="color:#D79150;">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="col-sm-12 ">
                                    <div class="form-group login-button-form">
                                        <button type="submit" name="signup" id="login-btn" href="#"
                                            class="form-submit btn btn-info btn-lg" value="SIGNUP">
                                            {{ __('Send Password Reset Link') }}<span
                                                class="glyphicon glyphicon-circle-arrow-right"></span>
                                        </button>
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
