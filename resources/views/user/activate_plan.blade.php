@extends('user.layouts.master')

@section('title')
Home | Active Boys
@endsection

@section('content')
<div class="plans-banner">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-sm-12 col-xs-12 fitness-image">
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 plans-page">
                        <section class="login">
                            <div class="plans-content">
                                <h4 class="plans-title">SUBSCRIPTION PLAN</h4>
                                <h4 class="plans-sub-title">CHOOSE YOUR COMMITMENT</h4>                      
                                <ul class="nav nav-pills">
                                    @php
                                        $cnt=1;
                                        $plan_id;
                                    @endphp
                                    @foreach ($plans as $plan)
                                    <li class="@if($cnt==1) @php $plan_id = $plan->id @endphp {{ 'active' }}@endif">
                                        <a data-toggle="pill" id="pln_{{$plan->id}}" href="#{{$plan->id}}">
                                            <i class="fa fa-check" aria-hidden="true"></i>
                                            <p class="price">${{$plan->cost}}<span>/mo</span></p>
                                            <p class="description">{{$plan->name}}</p>
                                        </a>
                                    </li>
                                    @php
                                        $cnt++;
                                    @endphp
                                    @endforeach
                                </ul>
                                <div class="tab-content">
                                    @php
                                        $c=1;
                                    @endphp
                                    @foreach ($plans as $plan)
                                    <div id="{{$plan->id}}" class="menu1 tab-pane fade in @if($c==1) {{'active'}} @endif">
                                      <ul class="Planone"><li class="">Includes  7 day free trial.</li>
                                        <li>You won’t be charged until after your free trial.</li>
                                        <li class="description">{!! $plan->description !!}</li>
                                    </ul>
                                    </div>
                                    @php
                                        $c++;
                                    @endphp
                                    @endforeach
                                  </div>
                                  <div class="plans-accordian">
                                            <form role="form" action="{{ route('subscription.create') }}" method="post" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                                                @csrf
                                                <div class="plans-form">
                                                    <div class="padding">
                                                        <div class="row">
                                                            <div class="card">
                                                                <div class="card-header">
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label for="name">Name</label>
                                                                                <input class="form-control" id="name" type="text" placeholder="Enter your name">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group">
                                                                                <label for="ccnumber">Credit Card Number</label>
                                                                                <div class="input-group">
                                                                                    <input class="form-control card-number" type="text" placeholder="0000 0000 0000 0000" size='20' autocomplete="off" id="credit-card" maxlength="19">
                                                                                    <div class="input-group-append">
                                                                                        <span class="input-group-text">
                                                                                            <i class="mdi mdi-credit-card"></i>
                                                                                        </span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="ccmonth">Expiration Month</label>
                                                                            <select class="form-control card-expiry-month" id="ccmonth">
                                                                                <option>1</option>
                                                                                <option>2</option>
                                                                                <option>3</option>
                                                                                <option>4</option>
                                                                                <option>5</option>
                                                                                <option>6</option>
                                                                                <option>7</option>
                                                                                <option>8</option>
                                                                                <option>9</option>
                                                                                <option>10</option>
                                                                                <option>11</option>
                                                                                <option>12</option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="form-group col-sm-4">
                                                                            <label for="ccyear">Expiration Year</label>
                                                                            <select class="form-control card-expiry-year" id="ccyear">

                                                                            </select>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <div class="form-group">
                                                                                <label for="cvv">CVV/CVC</label>
                                                                                <input class="form-control card-cvc" id="cvv" type="text" size='4' placeholder="123">
                                                                                <input type="hidden" id="plan_id" name="plan" value="{{$plan_id}}" maxlength="3">

                                                                            </div>
                                                                        </div>
                                                                        <div class='col-md-12 error form-group hide'>
                                                                            <div class='alert-warning alert'>Please correct the errors and try again.</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-sm-12">
                                                                            <div class="form-group login-button-form">
                                                                                <button type="submit" name="signup" id="login-btn" href="#" class="form-submit btn btn-info btn-lg" value="SIGNUP">
                                                                                    Pay<span class="glyphicon glyphicon-circle-arrow-right"></span>
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
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
        </div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('a[id^="pln_"]').on('click',function(){
            var pln_id = $(this).attr('id');
            var id = pln_id.split('_');
            $('#plan_id').val(id[1]);
        });

        var start = new Date().getFullYear();
        var end = new Date().getFullYear()+ 20;
        var options = "";
        for(var year = start ; year <=end; year++){
        options += "<option>"+ year +"</option>";
        }
        document.getElementById("ccyear").innerHTML = options;
    });
</script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });

    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $.trim($('.card-number').val()),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }

  });

  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error').removeClass('hide').find('.alert').text(response.error.message);
        } else {
            // token contains id, last4, and card type
            var token = response['id'];
            var card_token = response['card']['id'];
            // insert the token into the form so it gets submitted to the server
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.append("<input type='hidden' name='card_token' value='" + card_token + "'/>");
            $form.get(0).submit();
        }
    }

});
$('#credit-card').on('keypress change', function () {
    $(this).val(function (index, value) {
        return value.replace(/\W/gi, '').replace(/(.{4})/g, '$1 ');
    });
});
</script>

@endsection
