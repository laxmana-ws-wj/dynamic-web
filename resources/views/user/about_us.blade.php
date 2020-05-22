@extends('user.layouts.master')

@section('title')
     About Us | Rucha Samajik Sanstha
@endsection

@section('content')


    <!-- page-title -->
    <section class="page-title centred" style="background-image: url('{{ asset('asset/assets_users/images/background/page-title.jpg')}}');">
        <div class="container">
            <div class="content-box">
                <div class="title">About Us</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>About</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- about-style-two -->
    <section class="about-style-two sec-pad">
        <div class="container">
            @foreach($aboutuscontents as $aboutuscontent)
            <div class="sec-title centred">{!! $aboutuscontent->title !!}</div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 about-column">
                    <div class="about-content">
                        <div class="top-content">
                            <div class="text">{!! $aboutuscontent->description !!}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 img-column">
                    <figure class="img-box"><img src='{{ asset("public/aboutus/aboutus_images/$aboutuscontent->image") }}' alt=""></figure>
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


    <!-- team-section -->
    <section class="team-section overlay-style-two sec-pad centred">
        <div class="container">
            <div class="sec-title centred">Our Volunteer</div>
            <div class="title-text centred">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmo</div>
            <div class="team-content">
                <div class="row">
                    @foreach($teamcontents as $teamcontent)
                    <div class="col-lg-4 col-md-6 col-sm-12 team-column">
                        <div class="single-team-content single-item">
                            <div class="image img-box">
                                <figure><img src='{{ asset("public/team/team_images/$teamcontent->image") }}' alt=""></figure>
                                <div class="overlay">
                                    <a class="link-btn" href="#">
                                        <i class="fa fa-link"></i>
                                    </a>                                
                                </div>
                            </div>
                            <div class="lower-content">
                                <h4><a href="#">{{ $teamcontent->name }}</a></h4>
                                <div class="title">{{ $teamcontent->position }}</div>
                                <div class="text">{{ $teamcontent->description }}</div>
                                <!-- <ul class="social">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-vimeo"></i></a></li>
                                </ul> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- team-section end -->

@endsection

@section('scripts')

@endsection
