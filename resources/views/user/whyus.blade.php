@extends('user.layouts.master')

@section('title')
     Why Us | Rucha Samajik Sanstha
@endsection

@section('content')


    <!-- page-title -->
    <section class="page-title centred" style="background-image: url('{{ asset('asset/assets_users/images/background/page-title.jpg')}}');">
        <div class="container">
            <div class="content-box">
                <div class="title">Why Us</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Why Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- about-style-two -->
    <section class="about-style-two sec-pad">
        <div class="container">
            @foreach($whyuscontents as $whyuscontent)
            <div class="sec-title centred">{!! $whyuscontent->title !!}</div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 about-column">
                    <div class="about-content">
                        <div class="top-content">
                            <div class="title"></div>
                            <div class="text">{{ $whyuscontent->description }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 img-column">
                    <figure class="img-box"><img src='{{ asset("public/whyus/whyus_images/$whyuscontent->image") }}' alt=""></figure>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- about-style-two -->


    <!-- fact-counter -->
    <section class="counter-style-two counter-style-three overlay-bg" style="background-image: url('{{ asset('asset/assets_users/images/background/counter.jpg') }}');">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-item">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="12500">0</span></div>
                        </article>
                        <div class="text">Donations</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-item">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="640">0</span></div>
                        </article>
                        <div class="text">Volunteers Reached</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-item">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="320">0</span></div>
                        </article>
                        <div class="text">Success Missions</div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 counter-column">
                    <div class="single-item">
                        <article class="column wow fadeIn" data-wow-duration="0ms">
                        <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="970">0</span></div>
                        </article>
                        <div class="text">Projects Done</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- fact-counter end -->

@endsection

@section('scripts')

@endsection
