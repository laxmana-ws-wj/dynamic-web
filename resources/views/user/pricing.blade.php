@extends('user.layouts.master')

@section('title')
    Home | Active Boys
@endsection

@section('content')

<div class="about-us-banner banner">
    <div class="banner-txt">
        <div class="container">
            <h2 class="functional-main-heading">Pricing</h2>
        </div>
    </div>
</div>

<div class="pricing-table-section">
    <h2 class="workout-title">OUR <span class="black-title">MEMBERSHIP</span></h2>
    <br>
    <br>
    <div class="price-table">
        <div class="container">
        @foreach($pricings as $pricing)
            <div class="col-xs-12 col-md-4 col-sm-4 column @if($pricing->name == '7 Day Free Trial') Beginner-Plan @elseif($pricing->name == 'Monthly')  Premium-Plan @elseif($pricing->name == 'Yearly') Ultimate-Plan @endif">
                <div class="colum-price @if($pricing->name == 'Monthly') premium-col @endif">
                    <div class="price-plan-info">
                        <div class="price-img">
                            <img class="" src='{{asset("public/$pricing->plan_image")}}'>
                        </div>
                        <div class="price-monthly-plan @if($pricing->name == 'Monthly') red-plan @endif">
                            <h3 class="price">${{ $pricing->cost}}</h3>
                            <p>{{ $pricing->name}}</p>
                        </div>
                    </div>
                    <div class="col-memership">
                        <ul class="pricing-info">
                            <li class="pricing-header">{{ $pricing->name}}</li>
                            <hr class="plan-border">
                            {!! $pricing->description !!}
                            <li class="learn-more-btn price-btn">
                                <a href="{{route('register')}}" class="btn btn-default learn-btn-txt">Read More</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection

@section('scripts')



@endsection
