@extends('user.layouts.master')

@section('title')
    Home | Active Boys
@endsection

@section('content')
<div class="terms-and-conditions-banner banner">
    <div class="banner-txt">
        <div class="container">
            <h2 class="functional-main-heading">TERMS AND CONDITIONS</h2>

        </div>
    </div>
</div>

<div class="term-and-condition-section">
    <div class="container">
        <h2 class="workout-title">TERMS <span class="black-title">AND CONDITIONS</span></h2>
        <hr class="red-border">
        <br>
        <div class="term-content">
        
            {!! $termconditioncontent[0]->termsandconditions !!}
        </div>
       
        
    </div>

</div>

@endsection

@section('scripts')

@endsection
