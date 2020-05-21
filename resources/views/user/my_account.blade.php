@extends('user.layouts.master')

@section('title')
Home | Active Boys
@endsection

@section('content')
<div class="my-account-banner banner">
    <div class="banner-txt">
        <div class="container">
            <h2 class="account-heading">MY ACCOUNT</h2>
        </div>
    </div>
</div>

<div class="my-account-tab-section">

    <div class="container">

        <ul class="nav nav-tabs account-tab">
            <li class="active"><a data-toggle="tab" href="#home"><i class="fa fa-arrow-circle-right"></i>Profile Info</a></li>
            {{-- <li><a data-toggle="tab" href="#menu1"><i class="fa fa-arrow-circle-right"></i>Billing</a></li> --}}
            <li><a data-toggle="tab" href="#menu2"><i class="fa fa-arrow-circle-right"></i>My Plan</a></li>
            <li><a data-toggle="tab" href="#menu3"><i class="fa fa-arrow-circle-right"></i>Payment</a></li>
        </ul>

        <div class="tab-content account-content">
            <div id="home" class="tab-pane fade in active">
                <form action="{{ route('myAccountUpdate')}}" method="POST" class="profile-form" id="profile-form" enctype="multipart/form-data" >
                    {{ csrf_field() }}
                    <input type="hidden" name="id" id="id" placeholder="ID" value="{{ $users->id }}" />
                    <div class="small-12 medium-2 large-2 columns">
                        <div class="circle">
                            <span id="previewImg" >
                                @if($users->profile_pic != '')
                                <img  src="public/profile_pic/{{ $users->profile_pic }}">
                                @else
                                <img src="public/profile_pic/default-user-profile-image-png-6.png">
                                @endif
                            </span>
                        </div>
                        <div class="p-image">
                            <i class="fa fa-camera upload-button"></i>
                            <input class="file-upload previewImg" type="file" accept="image/*" name="profile_pic"/>
                            <input type="hidden" value="{{ $users->profile_pic }}" name="old_profile_pic" >
                        </div>
                    </div>
                    <div class="col-sm-12 inline-field no-padding">
                        <div class="col-sm-4 form-group">
                            <i class="fa fa-user"></i>
                            <label for="fname"></label>
                            <input type="text" name="fname" id="fname" placeholder="First Name"
                                value="{{ $users['fname'] }}" required />
                            @if ($errors->has('fname'))
                            <span id="fname_error" style="color:#D79150;">{{ $errors->first('fname') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-4 form-group">
                            <i class="fa fa-user"></i>
                            <label for="lname"></label>
                            <input type="text" name="lname" id="lname" placeholder="Last Name"
                                value="{{ $users['lname'] }}" required />
                            @if ($errors->has('lname'))
                            <span id="lname_error" style="color:#D79150;">{{ $errors->first('lname') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-4 form-group ">
                            <i class="fa fa-home"></i>
                            <label for="address"></label>
                            <input type="text" name="address" id="address" placeholder="Address Name"
                                value="{{ $users['address'] }}" required />
                            @if ($errors->has('address'))
                            <span id="address_error" style="color:#D79150;">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 inline-field no-padding ">
                        <div class="col-md-4 col-sm-4 col-xs-12 form-group">
                            <i class="fa fa-phone"></i>
                            <label for="contact_no" class="required"></label>
                            <input type="text" name="contact_no" id="contact_no" placeholder="Contact Number"
                                value="{{ $users['contact_no'] }}" />
                            @if ($errors->has('contact_no'))
                            <span id="contact_no_error" style="color:#D79150;">{{ $errors->first('contact_no') }}</span>
                            @endif
                        </div>
                        <div class="col-md-8 col-sm-8 col-xs-12 form-group no-padding">
                            <div class="form-radio">
                                <div class="col-md-3 col-sm-3 col-xs-4 no-padding">
                                    <i class="gender-icon fa fa-mars-double"></i>
                                    <label for="gender" class="radio-label"> Gender:</label>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-4 no-padding">
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" id="male" @if($users["gender"]==1 ) checked
                                            @endif value="1">
                                        <label for="male">Male</label>
                                    </div>
                                </div>
                                <div class="col-md-3 col-sm-3 col-xs-4 no-padding">
                                    <div class="form-radio-item">
                                        <input type="radio" name="gender" id="female" @if($users["gender"]==0 ) checked
                                            @endif value="0">
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
                                <label for="dob"><i class="zmdi zmdi-email"></i></label>
                                <input type="dob" name="dob" id="dob" placeholder="Date of Birth"
                                    value="{{ $users['dob'] }}" />
                                @if ($errors->has('dob'))
                                <span id="dob_error" style="color:#D79150;">{{ $errors->first('dob') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-3 form-group">
                            <div class="form-group">
                                <i class="fa fa-users"></i>
                                <label for="age"></label>
                                <input type="text" name="age" id="age" placeholder="Age" value="{{ $users['age'] }}" />
                                @if ($errors->has('age'))
                                <span id="age_error" style="color:#D79150;">{{ $errors->first('age') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-3 form-group">
                            <i class="fa fa-tasks"></i>
                            <label for="weight"></label>
                            <input type="text" name="weight" id="weight" placeholder="Weight"
                                value="{{ $users['weight'] }}" />
                            @if ($errors->has('weight'))
                            <span id="weight_error" style="color:#D79150;">{{ $errors->first('weight') }}</span>
                            @endif
                        </div>
                        <div class="col-sm-3 form-group">
                            <i class="fa fa-microchip"></i>
                            <label for="height"></label>
                            <input type="text" name="height" id="height" placeholder="Height"
                                value="{{ $users['height'] }}" />
                            @if ($errors->has('height'))
                            <span id="height_error" style="color:#D79150;">{{ $errors->first('height') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 inline-field no-padding">
                        <div class="col-sm-6 form-group">
                            <i class="fa fa-envelope"></i>
                            <label for="email"></label>
                            <input type="email" name="email" id="email" placeholder=" Email"
                                value="{{ $users['email'] }}" readonly/>
                            @if ($errors->has('email'))
                            <span id="email_error" style="color:#D79150;">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group update-button">
                            <button type="submit" name="update" id="update-btn" href="#"
                                class="form-update btn btn-info btn-lg">
                                UPDATE
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            {{-- <div id="menu1" class="tab-pane fade">
                <form class="creditly-card-form">
                    <section class="creditly-wrapper">
                        <div class="credit-card-wrapper">
                            <div class="first-row form-group">

                                <div class="col-sm-8 controls">
                                    <label class="col-sm-12  no-padding control-label">Card Number</label>

                                    <input class="number credit-card-number form-control" type="text" name="number"
                                        inputmode="numeric" autocomplete="cc-number" autocompletetype="cc-number"
                                        x-autocompletetype="cc-number"
                                        placeholder="&#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149; &#149;&#149;&#149;&#149;">
                                </div>

                                <div class="col-sm-4 controls">
                                    <label class="col-sm-12 no-padding control-label">CVV</label>

                                    <input class="security-code form-control" · inputmode="numeric" type="text"
                                        name="security-code" placeholder="&#149;&#149;&#149;">
                                </div>
                            </div>

                            <div class="card-type"></div>
                        </div>
                    </section>
                    <div class="card-button">
                        <button type="submit" name="update" id="card-btn" href="#" class=" btn btn-info btn-lg"
                            value="SIGNUP"> UPDATE </button>
                    </div>
                </form>
            </div> --}}
            <div id="menu2" class="tab-pane fade">
                <div class="dvplan">
                    @if(count($subscriptions))
                    @foreach($subscriptions as $subscription)
                    <p><span class="plan-date"><i class="fa fa-dot-circle-o"></i>Active Plan:</span>
                    <span class="plan-date" style="padding-left: 2%;font-size: 15px; font-weight: 500;">{{ $subscription['plan_name'] }}</span></p>
                    <p> <span class="plan-date"><i class="fa fa-dot-circle-o"></i>Activation Date:</span>
                        <span class="plan-date" style="padding-left: 2%;font-size: 15px; font-weight: 500;">{{ $subscription['starts_at'] }}</span></p>
                    <p><span class="plan-date"><i class="fa fa-dot-circle-o"></i>Expiry Date:</span>
                        <span class="plan-date" style="padding-left: 2%;font-size: 15px; font-weight: 500;">{{ $subscription['ends_at'] }}</span></p>
                    @endforeach
                    @else
                    <p><span class="plan-date"><i class="fa fa-dot-circle-o"></i>No Plan Selected</span></p>
                    @endif
                </div>

                <div class="form-group plan-button">
                    {{-- <button type="submit" name="update" id="update-btn" href="#" class="form-update btn btn-info btn-lg"
                        value="SIGNUP">
                        UPDATE
                    </button> --}}

                </div>
            </div>
            <div id="menu3" class="tab-pane fade">
                <div class="table-responsive">
                    <table class="table payment-table">
                        <thead>
                            <tr>
                                <th class="pay-label">AMOUNT</th>
                                <th class="pay-label">DATE</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($paymenthistorys) > 0)
                            @foreach ($paymenthistorys as $item)
                            <tr>
                                <td>$ {{ number_format($item['amount'], 2, '.', ',') }}</td>
                                <td>{{ $item['created_at']}}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="2" class="text-center"><span>No Payement History.</span></td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@section('scripts')
<script>
    // Preview Image Before Uploading
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $("#previewImg img").remove();
            $('#previewImg').after('<img src="'+e.target.result+'" height="500px" width="500px"/> ');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(".previewImg").change(function () {
    filePreview(this);
});
// Preview Image Before Uploading
</script>
@endsection
