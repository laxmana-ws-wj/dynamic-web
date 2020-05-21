@extends('user.layouts.master')

@section('title')
    Home | Active Boys
@endsection

@section('content')
<div class="terms-and-conditions-banner banner">
    <div class="banner-txt">
        <div class="container">
            <h2 class="functional-main-heading">FAQ</h2>

        </div>
    </div>
</div>

<div class="term-and-condition-section">
    <div class="container">
        <div class="accordion-content">
            <h2 class="workout-title">FREQUENTLY <span class="black-title">ASKED QUESTIONS</span></h2>
            <hr class="red-border">
           
            @if(count($faqcontents) > 0)
            @foreach($faqcontents as $faqcontent)
                <button class="accordion">{{ $faqcontent->faq_question }}</button>
                <div class="panel">
                {!! $faqcontent->faq_answer !!}
                </div>
            @endforeach
            @else
            <p class="text-center"><h2 class="text-center">No Faq's Found!</h2></p>
            @endif
        </div>
    </div>

</div>

@endsection

@section('scripts')

@endsection

