@extends('user.layouts.master')

@section('title')
    Reset Password | Perform30
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
                            <form method="POST" action="{{ route('password.update') }}" id="login-form"
                                class="login-form">
                                @csrf
                                <input type="hidden" name="token" value="{{ $token }}">
                                <div class="block-field ">
                                    <div class="col-sm-12 no-padding ">
                                        <div class="col-sm-6 form-group">
                                            <i class="fa fa-envelope"></i>
                                            <label for="email"></label>
                                            <input id="email" type="email" name="email"
                                                value="{{ $email ?? old('email') }}" readonly
                                                autocomplete="email" autofocus />
                                            @error('email')
                                            <span style="color:#d23838;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="block-field ">
                                    <div class="col-sm-12 no-padding ">
                                        <div class="col-sm-6 form-group">
                                            <i class="fa fa-lock"></i>
                                            <label for="re-pass"></label>
                                            <input id="password" type="password" name="password"
                                                placeholder="New Password" autocomplete="new-password" />
                                            @error('password')
                                            <span style="color:#D79150;">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="block-field ">
                                    <div class="col-sm-12 no-padding ">
                                        <div class="col-sm-6 form-group">
                                            <i class="fa fa-lock"></i>
                                            <label for="re-pass"></label>
                                            <input id="password-confirm" type="password"
                                                name="password_confirmation" placeholder="Confirm Password"
                                                autocomplete="new-password" />
                                            {{-- @error('password')
                                            <span style="color:#d23838;">{{ $message }}</span>
                                            @enderror --}}
                                        </div>
                                    </div>

                                </div>

                                <div class="col-sm-12 ">
                                    <div class="form-group login-button-form">
                                        <button type="submit" name="signup" id="login-btn" href="#"
                                            class="form-submit btn btn-info btn-lg" value="SIGNUP">
                                            {{ __('Reset Password') }}<span
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
