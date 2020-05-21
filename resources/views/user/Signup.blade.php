@extends('user.layouts.master')

@section('title')
Register | Active Boys
@endsection

@section('content')
<div class="signup-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-7 col-sm-12 col-xs-12 fitness-image" style="">
            </div>
            <div class="col-md-5 col-sm-12 col-xs-12 signup-form" style="">
                <section class="signup">
                    <div class="signup-content">
                        <div class="signup-image">
                            <div class="action-logo">
                                <figure><img src="{{asset('asset/assets_user/Images/white-logo.png')}}" alt="sing up image">
                                </figure>
                            </div>
                        </div>
                        <div class="signup-form">
                            <h2 class="form-title">Register Here....</h2>

                            @isset($url)
                            <form method="POST" class="register-form" id="register-form"
                                action='{{ url("register/$url") }}' aria-label="{{ __('Register') }}">
                                @else
                                <form method="POST" class="register-form" id="register-form"
                                    action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                                    @endisset
                                    @csrf
                                    <div class="col-sm-12 inline-field no-padding">
                                        <div class="col-sm-4 form-group">
                                            <i class="fa fa-user"></i>
                                            <label for="firstname"></label>
                                            <input type="text" name="fname" id="firstname" placeholder="First Name" value="{{ old('fname') }}">
                                            @if ($errors->has('fname'))
                                                <span id="firstname_error" style="color:#d23838;">{{ $errors->first('fname') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            <i class="fa fa-user"></i>
                                            <label for="lastname"></label>
                                            <input type="text" name="lname" id="lastname" placeholder="Last Name" value="{{ old('lname') }}">
                                            @if ($errors->has('lname'))
                                                <span id="firstname_error" style="color:#d23838;">{{ $errors->first('lname') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-4 form-group ">
                                            <i class="fa fa-home"></i>
                                            <label for="address"></label>
                                            <input type="text" name="address" id="address" placeholder="Address Name" value="{{ old('address') }}">
                                            @if ($errors->has('address'))
                                                <span id="firstname_error" style="color:#d23838;">{{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 inline-field no-padding ">
                                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                                            <i class="fa fa-phone"></i>
                                            <label for="phone_number" class="required"></label>
                                            <input type="text" name="contact_no" id="phone_number"placeholder="Contact Number" value="{{ old('contact_no') }}"/>
                                            @if ($errors->has('contact_no'))
                                                <span id="firstname_error" style="color:#d23838;">{{ $errors->first('contact_no') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12 form-group no-padding">
                                            <div class="form-radio">
                                                <div class="col-md-3 col-sm-3 col-xs-4 no-padding">
                                                    <i class="gender-icon fa fa-mars-double" style=""></i>
                                                    <label for="gender" class="radio-label"> Gender:</label>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 no-padding">
                                                    <div class="form-radio-item">
                                                        <input type="radio" name="gender" value="1" checked id="male">
                                                        <label for="male">Male</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-3 col-sm-3 col-xs-4 no-padding">
                                                    <div class="form-radio-item">
                                                        <input type="radio" name="gender" value="0" id="female" >
                                                        <label for="female">Female</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 inline-field no-padding">
                                        <div class="col-sm-3 form-group">
                                            <div class="form-group clearfix ">
                                                <i class="fa fa-calendar"></i>
                                                <label for="date-of-birth"><i class="zmdi zmdi-email"></i></label>
                                                <input type="dob" name="dob" id="date-of-birth" placeholder="Date of Birth" value="{{ old('dob') }}"/>
                                                @if ($errors->has('dob'))
                                                    <span id="firstname_error" style="color:#d23838;">{{ $errors->first('dob') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <div class="form-group">
                                                <i class="fa fa-users"></i>
                                                <label for="age"></label>
                                                <input type="text" name="age" id="age" placeholder="Age" value="{{ old('age') }}"/>
                                                @if ($errors->has('age'))
                                                    <span id="firstname_error" style="color:#d23838;">{{ $errors->first('age') }}</span>
                                                 @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <i class="fa fa-tasks"></i>
                                            <label for="weight"></label>
                                            <input type="text" name="weight" id="weight" placeholder="Weight" value="{{ old('weight') }}"/>
                                            @if ($errors->has('weight'))
                                                <span id="firstname_error" style="color:#d23838;">{{ $errors->first('weight') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-3 form-group">
                                            <i class="fa fa-microchip"></i>
                                            <label for="height"></label>
                                            <input type="text" name="height" id="height" placeholder="Height" value="{{ old('height') }}" />
                                            @if ($errors->has('height'))
                                                <span id="firstname_error" style="color:#d23838;">{{ $errors->first('height') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 inline-field no-padding">
                                        <div class="col-sm-6 form-group">
                                            <i class="fa fa-envelope"></i>
                                            <label for="email"></label>
                                        <input type="text" name="email" id="email" placeholder=" Email" value="{{ old('email') }}" />
                                            @if ($errors->has('email'))
                                                <span id="firstname_error" style="color:#d23838;">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <i class="fa fa-lock"></i>
                                                <label for="pass"></label>
                                                <input type="password" name="password" id="pass" placeholder="Password" />
                                                @if ($errors->has('password'))
                                                    <span id="firstname_error" style="color:#d23838;">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <i class="fa fa-lock"></i>
                                                <label for="re-pass"></label>
                                                <input type="password" name="password_confirmation" id="re_pass" placeholder="Confirm Password" />
                                                @if ($errors->has('password_confirmation'))
                                                    <span id="firstname_error" style="color:#d23838;">{{ $errors->first('password_confirmation') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 no-padding">
                                        <div class="form-group">
                                            <span class="agree-term">
                                                <span class=""><input type="checkbox" name="agree-term" id="agree-term-input" class="agree-term" /></span>
                                                <span class=""><p>Agree to Terms of service</p></span>
                                            </span>
                                            @if ($errors->has('agree-term'))
                                                <br><span id="firstname_error" style="color:#d23838;">{{ $errors->first('agree-term') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-sm-12 ">
                                        <div class="form-group form-button">
                                            <button type="submit" name="signup" id="signup-btn" class="form-submit btn btn-info btn-lg" value="SIGNUP">
                                                SIGNUP<span class="glyphicon glyphicon-circle-arrow-right"></span>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="footersignin">
                                            <p>Already have an account? <a class="signin-txt" href="{{route('login')}}">Sign In</a></p>
                                        </div>
                                    </div>
                                </form>
                        </div>
                    </div>
            </div>

            </section>
        </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection
