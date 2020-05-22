@extends('layouts.appauth')

@section('title')
Login | Admin
@endsection

@section('content')
<div class="container">
            <div class="row main">
                <div class="panel-heading">
                   <div class="panel-title text-center">
                        <h2 class="title">Admin Login</h2>
                        <hr />
                    </div>
                </div> 
                <div class="main-login main-center">
                    <form class="form-horizontal" method="post" action='{{ url("login/$url") }}'>
                        @csrf
                        <div class="form-group">
                            <label for="email" class="cols-sm-2 control-label">Email</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control form-control @error('email') is-invalid @enderror" name="email" id="email"  placeholder="Enter your Email"/>
                                </div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="cols-sm-2 control-label">Password</label>
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password"  placeholder="Enter your Password"/>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                         <div class="form-group">
                            <!-- <label for="password" class="cols-sm-2 control-label">Password</label> -->
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <input id="demo-form-checkbox" {{ old("remember") ? "checked" : '' }} class="magic-checkbox" type="checkbox"/>
                                    <label for="demo-form-checkbox"> Remember me</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group ">
                            <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Sign in</button>
                        </div>
                        <div class="login-register">
                            <!-- <a href="create_account.php">Create account</a> or <a href="reset_password.php">reset password</a> -->
                         </div>
                    </form>
                </div>
            </div>
        </div>

@endsection



@section('scripts')
@endsection
