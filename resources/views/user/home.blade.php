@extends('user.layouts.master')

@section('title')
    Home | Rucha Samajik Sanstha
@endsection

@section('content')
 <!--Main Slider-->
    <section class="main-slider slider-style-two">
        <div class="main-slider-carousel owl-carousel owl-theme slide-nav">
        @php
            $i = 1;
        @endphp
        @foreach($slidercontents as $slidercontent)
            <div class="slide" style="background-image:url('{{asset("public/slider/slider_images/$slidercontent->bg_image")}}') ">
                <div class="container">
                    <div class="content">
                        <h1>{!! $slidercontent->slider_title !!}</h1>
                        <div class="text">{!! $slidercontent->slider_desc !!}</div>
                        <div class="donate-box"><button class="donate-box-btn theme-btn">Donate Now</button></div>
                    </div>
                </div>
            </div>
        @php
            $i++;
        @endphp
        @endforeach
           
        </div>
    </section>
    <!--End Main Slider-->


    <!-- feature-section -->
    <div class="feature-style-two">
        <div class="container-fluid">
            <div class="feature-content">
                <div class="row">
                    @foreach($services as $service)
                    <div class="col-lg-6 col-md-6 col-sm-12 feature-column">
                        <div class="feature-content-two" style="background-image: url('{{ asset("public/service/service_images/$service->image") }}');">
                            <div class="icon-box wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms"><i class="{{ $service->icon }}"></i></div>
                            <div class="title"><a href="#">{{ $service->title }}</a></div>
                            <div class="text">{{ $service->description }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- feature-section -->


    <!-- about-style-two -->
    <section class="about-style-two sec-pad">
        <div class="container">
            @foreach($homecontents as $homecontent)
            <div class="sec-title centred">{!! $homecontent->title !!}</div>
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 about-column">
                    <div class="about-content">
                        <div class="top-content">
                            <div class="title">{{ $homecontent->sub_title }}</div>
                            <div class="text">
                                {!! $homecontent->description !!}
                            </div>
                        </div>
                        <div class="lower-content">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="single-item">
                                        <div class="number">01</div>
                                        <h4><a href="#">Our Mission</a></h4>
                                        <div class="text">{!! $homecontent->our_mission !!}</div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 column">
                                    <div class="single-item">
                                        <div class="number">02</div>
                                        <h4><a href="#">Our Vision</a></h4>
                                        <div class="text">{!! $homecontent->our_vision !!}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 img-column">
                    <figure class="img-box"><img src='{{ asset("public/home/home_images/$homecontent->image") }}' alt=""></figure>
                </div>
            </div>
            @endforeach
        </div>
    </section>
    <!-- about-style-two -->


    <!-- form-section -->
    <section class="form-section">
        <div class="container-fluid clearfix">
            <div class="video-gallery overlay-bg" style="background-image: url('{{ asset('public/asset/assets_users/images/background/video.jpg') }}');">
                <div class="overlay-gallery">
                    <div class="icon-holder">
                        <div class="icon wow zoomIn" data-wow-delay="300ms" data-wow-duration="1500ms">
                            <a class="html5lightbox" title="Video" href="https://youtu.be/yVb0mfmMV9w"><i class="fa fa-play"></i></a> 
                        </div>
                    </div>    
                </div>
            </div>
            <div class="form-content">
                <div class="content-box">
                    <div class="title">We Need Your Help</div>
                    <div class="text">Lorem ipsum dolor sit amet consectetur.</div>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>Donate for</label>
                                <select class="custom-select-box">
                                    <option selected="selected">I Want to Donate for</option>
                                    <option>I Want to Donate 00</option>
                                    <option>I Want to Donate 01</option>
                                    <option>I Want to Donate 02</option>
                                    <option>I Want to Donate 03</option>
                                </select>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12 form-group">
                                <label>Currency</label>
                                <select class="custom-select-box">
                                    <option selected="selected">USD - U.S. Dollars</option>
                                    <option>$1000</option>
                                    <option>$2000</option>
                                    <option>$3000</option>
                                    <option>$4000</option>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Donate for</label>
                                <select class="custom-select-box">
                                    <option selected="selected">I Want to Donate for</option>
                                    <option>I Want to Donate 00</option>
                                    <option>I Want to Donate 01</option>
                                    <option>I Want to Donate 02</option>
                                    <option>I Want to Donate 03</option>
                                </select>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <label>Payment Type</label>
                                <div class="checkbox">
                                    <label>
                                        <input type="radio" name="radio" checked="checked">
                                        <span>One Time</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="radio">
                                        <span>Recurring</span>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                                <div class="link"><button type="submit" class="theme-btn">Get Started</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- form-section -->

    <!-- cta-section -->
    <section class="cta-section cta-style-two overlay-bg" style="background-image: url('{{ asset('public/asset/assets_users/images/background/cta-bg-2.jpg') }} ');">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-12 col-sm-12 cta-column">
                    <div class="content-box">
                        <div class="title">Become A Volunteer</div>
                        <div class="text">Join your hand with us for a better life and beautiful future</div>
                        <div class="donate-box"><button class="donate-box-btn theme-btn">Donate Now</button></div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 counter-column">
                    <div class="fact-counter centred">
                        <div class="counter-content clearfix">
                            <div class="single-counter-content">
                                <article class="column wow fadeIn" data-wow-duration="0ms">
                                    <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="12500">0</span></div>
                                </article>
                                <div class="text">Donations</div>
                            </div>
                            <div class="single-counter-content">
                                <article class="column wow fadeIn" data-wow-duration="0ms">
                                    <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="640">0</span></div>
                                </article>
                                <div class="text">Volunteers Reached</div>
                            </div>
                            <div class="single-counter-content">
                                <article class="column wow fadeIn" data-wow-duration="0ms">
                                    <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="320">0</span></div>
                                </article>
                                <div class="text">Success Missions</div>
                            </div>
                            <div class="single-counter-content">
                                <article class="column wow fadeIn" data-wow-duration="0ms">
                                    <div class="count-outer"><span class="count-text" data-speed="1500" data-stop="970">0</span></div>
                                </article>
                                <div class="text">Projects Done</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- cta-section end -->


    <!-- volunteer-section -->
    <section class="volunteer-section centred">
        <div class="container">
            <div class="sec-title centred">Our Volunteer</div>
            <div class="title-text centred">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmo</div>
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 volunteer-column">
                    <div class="single-volunteer-content">
                        <figure class="img-box"><a href="#"><img src="{{ asset('public/asset/assets_users/images/resource/volunteer-1.png') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h4><a href="#">Lauren Davis</a></h4>
                            <div class="text">Volunteer</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 volunteer-column">
                    <div class="single-volunteer-content">
                        <figure class="img-box"><a href="#"><img src="{{ asset('public/asset/assets_users/images/resource/volunteer-2.png') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h4><a href="#">Heather Matthews</a></h4>
                            <div class="text">Volunteer</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 volunteer-column">
                    <div class="single-volunteer-content">
                        <figure class="img-box"><a href="#"><img src="{{ asset('public/asset/assets_users/images/resource/volunteer-3.png') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h4><a href="#">Layla Owen</a></h4>
                            <div class="text">Volunteer</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 volunteer-column">
                    <div class="single-volunteer-content">
                        <figure class="img-box"><a href="#"><img src="{{ asset('public/asset/assets_users/images/resource/volunteer-4.png') }}" alt=""></a></figure>
                        <div class="lower-content">
                            <h4><a href="#">Cameron Rogers</a></h4>
                            <div class="text">Volunteer</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- volunteer-section end -->


    <!-- testimonial-style-two -->
    <section class="testimonial-style-two centred">
        <div class="container">
            <div class="content-box">
                <div class="single-item-carousel">
                    @foreach($testimonialcontents as $testimonialcontent)
                    <div class="content">
                        <figure class="thumb-box"><img src='{{ asset("public/testimonials/testimonial_image/$testimonialcontent->image") }}' alt=""></figure>
                        <div class="text">{{ $testimonialcontent->description }}</div>
                        <div class="author">
                            <div class="author-name">{{ $testimonialcontent->name }}</div>
                            <div class="title">{{ $testimonialcontent->company_name }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial-style-two end -->


    <!-- news-section -->
    <section class="news-section overlay-style-one sec-pad">
        <div class="container">
            <div class="sec-title centred">Latest Blogs</div>
            <div class="title-text centred">Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmo</div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-6 col-sm-12 news-column">
                    <div class="single-news-content inner-box">
                        <figure class="image-box">
                            <img src='{{ asset("public/blogs/blog_images/$blog->blog_image")}}' alt="">
                            <!--Overlay Box-->
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="content">
                                        <a href="{{ route('ourblogs.show',$blog->id) }}" class="link"><i class="icon fa fa-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </figure>
                        <div class="lower-content">
                            <h4><a href="blog-details.html">{{ $blog->desc_heading }}</a></h4>
                            <div class="time">{{ date("d M Y", strtotime($blog->created_at)) }}</div>
                            <div class="text">
                                <p>{{ $blog->short_desc }}</p>
                            </div>
                            <div class="link"><a href="{{ route('ourblogs.show',$blog->id) }}" class="theme-btn-two">Read More</a></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- news-section end -->

@endsection

@section('scripts')

@endsection
