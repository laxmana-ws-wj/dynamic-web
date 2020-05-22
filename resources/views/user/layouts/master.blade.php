<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from html.commonsupport.xyz/2019/Hernando/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 May 2020 03:03:38 GMT -->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title')</title>

<!-- Stylesheets -->
<link href="{{ asset('public/asset/assets_users/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('public/asset/assets_users/css/responsive.css') }}" rel="stylesheet">
<link rel="icon" href="{{ asset('public/asset/assets_users/images/favicon.ico') }}" type="image/x-icon">
<style>
    .page-item.active .page-link {
        position: relative;
    display: inline-block;
    font-size: 18px;
    font-family: 'Open Sans', sans-serif;
    height: 50px;
    font-weight: 600;
    width: 50px;
    line-height: 50px;
    text-align: center;
    border: 1px solid #e5e5e5;
    color: #848484;
    transition: all 500ms ease;
    background-color: #ff5e14!important;
    }

.page-item disabled{
        position: relative;
    display: inline-block;
    font-size: 18px;
    font-family: 'Open Sans', sans-serif;
    height: 50px;
    font-weight: 600;
    width: 50px;
    line-height: 50px;
    text-align: center;
    border: 1px solid #e5e5e5;
    color: #848484;
    transition: all 500ms ease;
    background-color: #ff5e14!important;
    }
</style>
</head>

<!-- page wrapper -->
<body class="boxed_wrapper">


    <!-- .preloader -->
    <div class="preloader"></div>
    <!-- /.preloader -->


    <!-- Main Header -->
    <header class="main-header header-style-two">
        <!-- header-top -->
        <div class="header-top bg-box">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-4 col-sm-12 column">
                        <div class="top-left">
                            <ul class="social-content">
                                <li>Follow Us:</li>
                                @php
                                    $socials = \App\Contactuscontent::all();
                                @endphp
                                @foreach ($socials as $social)
                                <li><a href="{{ $social->fb_link }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $social->tw_link }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $social->li_link }}"><i class="fa fa-linkedin"></i></a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 column">
                        <div class="top-right">
                            <ul class="right-content">
                                
                                @php
                                    $contacts = \App\Contactuscontent::all();
                                @endphp
                                @foreach ($contacts as $contact)
                                
                                <li><a href="#"><i class="fa fa-phone"></i>Call: +91 {{ $contact->call_us_now_1 }}</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i>Email:  {{ $contact->our_email }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- header-top end -->

        <!-- header-bottom -->
        <div class="header-bottom">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-12 col-sm-12 column">
                         @php
                            $logos = \App\Contactuscontent::all();
                        @endphp
                        @foreach ($logos as $logo)
                        <figure class="logo-box"><a href="{{url('/')}}"><img src='{{ asset("public/logo/logo_images/$logo->image")}}' alt=""></a></figure>
                        @endforeach
                        
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 menu-column">
                        <div class="menu-area">
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="{{ (request()->is('/')) ? 'current' : '' }}"><a href="{{url('/')}}">Home</a>
                                        
                                        </li>
                                        <li class="{{ (request()->is('about_us')) ? 'current' : '' }}"><a href="{{route('about_us')}}">About</a></li>
                                        <li class="{{ (request()->is('ourgallary')) ? 'current' : '' }}"><a href="{{ route('ourgallary.index') }}">Gallary</a>
                                           
                                        </li>
                                        <li class="{{ (request()->is('whyus')) ? 'current' : '' }}"><a href="{{ route('whyus.index')}}">Why Us</a>
                                        </li>  
                                        <li class="{{ (request()->is('ourblogs*')) ? 'current' : '' }}"><a href="{{ route('ourblogs.index') }}">Blog</a>
                                        </li>                              
                                        <li class="{{ (request()->is('contact*')) ? 'current' : '' }}"><a href="{{ route('contact.index') }}">Contact Us</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 clearfix column">
                        <ul class="nav-right pull-right">
                            <li class="donate-box"><button class="donate-box-btn">Donate Now</button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><!-- header-bottom end -->


        <!--Sticky Header-->
        <div class="sticky-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12 column">
                        @php
                            $logos = \App\Contactuscontent::all();
                        @endphp
                        @foreach ($logos as $logo)
                        <figure class="logo-box"><a href="{{url('/')}}"><img src='{{ asset("public/logo/logo_images/$logo->image")}}' alt=""></a></figure>
                        @endforeach
                    </div>
                    <div class="col-lg-8 col-md-12 col-sm-12 menu-column">
                        <div class="menu-area">
                            <nav class="main-menu navbar-expand-lg">
                                <div class="navbar-header">
                                    <!-- Toggle Button -->      
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    </button>
                                </div>
                                <div class="navbar-collapse collapse clearfix">
                                    <ul class="navigation clearfix">
                                        <li class="{{ (request()->is('/')) ? 'current' : '' }} dropdown"><a href="{{url('/')}}">Home</a>
                                            
                                        </li>
                                        <li class="{{ (request()->is('about_us')) ? 'current' : '' }}"><a href="{{route('about_us')}}">About</a></li>
                                        <li class="{{ (request()->is('ourgallary')) ? 'current' : '' }}"><a href="{{ route('ourgallary.index') }}">Gallary</a>
                                           
                                        </li>
                                        <li class="{{ (request()->is('whyus')) ? 'current' : '' }}"><a href="{{ route('whyus.index') }}">Why Us</a>
                                            
                                        </li>  
                                        <li class="{{ (request()->is('ourblogs*')) ? 'current' : '' }}"><a href="{{ route('ourblogs.index') }}">Blog</a>
                                           
                                        </li>                              
                                        <li class="{{ (request()->is('contact*')) ? 'current' : '' }}"><a href="{{ route('contact.index') }}">Contact</a></li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- sticky-header end -->
    </header>
    <!-- End Main Header -->


   

    @yield('content')
    <!-- main-footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-12 footer-column">
                        <div class="logo-widget footer-widget">
                            @php
                                $logos = \App\Contactuscontent::all();
                                @endphp
                            @foreach ($logos as $logo)
                            <figure class="logo-box"><a href="{{url('/')}}"><img src='{{ asset("public/logo/logo_images/$logo->footer_logo")}}' alt=""></a></figure>
                            @endforeach
                            <div class="text">
                                @php
                                    $descriptions = \App\Contactuscontent::all();
                                @endphp
                                @foreach ($descriptions as $desc)
                                <p>{{ $desc->description }}</p>
                                @endforeach
                            </div>
                            <ul class="footer-social">
                                 @php
                                    $socialfooters = \App\Contactuscontent::all();
                                @endphp
                                @foreach ($socialfooters as $socialfooter)
                                <li><a href="{{ $social->fb_link }}"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ $social->tw_link }}"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ $social->li_link }}"><i class="fa fa-linkedin"></i></a></li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 offset-lg-2 footer-column">
                        <div class="service-widget footer-widget">
                            <div class="footer-title">Services</div>
                            <ul class="list">
                                @php
                                    $services = \App\Service::all();
                                @endphp
                                @foreach($services as $service)
                                <li><a href="#">{{ $service->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 footer-widget">
                        <div class="contact-widget footer-widget">
                            <div class="footer-title">Contacts</div>
                            <div class="text">
                                @php
                                    $data = \App\Contactuscontent::all();
                                @endphp
                                @foreach ($data as $item)
                                <p>{{ $item->our_address }}</p>
                                <p>+91 {{ $item->call_us_now_1 }}</p>
                                <p>{{ $item->our_email }}</p>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- main-footer end -->


    <!-- footer-bottom -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 column">
                    <div class="copyright"><a href="#">Brandingpune.com</a> &copy; {{ date('Y') }} All Right Reserved</div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 column">
                    <ul class="footer-nav">
                        <li><a href="{{ route('termsandconditions.index') }}">Terms of Service</a></li>
                        <li><a href="{{ route('termsandconditions.index') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bottome end -->

<!--Scroll to top-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="fa fa-long-arrow-up"></span>
</button>



<!--jquery js -->
<script src="{{ asset('public/asset/assets_users/js/jquery.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/bootstrap.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/wow.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/validation.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/jquery.fancybox.pack.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/asset/assets_users/js/SmoothScroll.js') }}"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlLSfYUZBM6jiYELVALDypJH2QOm2H6S4"></script>
<!-- <script src="{{ asset('public/asset/assets_users/js/html5lightbox/html5lightbox.js') }}"></script> -->
<script src="{{ asset('public/asset/assets_users/js/gmaps.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/map-helper.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/isotope.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/jquery-ui.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/jquery.appear.j') }}s"></script>
<script src="{{ asset('public/asset/assets_users/js/jquery.countTo.js') }}"></script>
<!-- main-js -->
<script src="{{ asset('public/asset/assets_users/js/nouislider.js') }}"></script>
<script src="{{ asset('public/asset/assets_users/js/imagezoom.js') }}"></script> 
<script src="{{ asset('public/asset/assets_users/js/script.js') }}"></script>

</body><!-- End of .page_wrapper -->

<!-- Mirrored from html.commonsupport.xyz/2019/Hernando/index-2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 May 2020 03:05:35 GMT -->
</html>
<script type="text/javascript">
  
$(window).load(function() {
    $('.pagination').addClass('centred clearfix');
});

setTimeout(function() {
    $('#mydiv').fadeOut('fast');
}, 8000); // <-- time in milliseconds

</script>