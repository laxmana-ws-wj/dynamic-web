<!DOCTYPE html>
<html lang="en">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>@yield('title')</title>


    <!--[if lt IE 10]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">

    <link rel="icon" href="https://colorlib.com//polygon/adminty/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/bootstrap/css/bootstrap.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/icon/feather/css/feather.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/pages/j-pro/css/demo.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/pages/j-pro/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/pages/j-pro/css/j-forms.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/pages/data-table/css/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/css/jquery.mCustomScrollbar.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/pages/advance-elements/css/bootstrap-datetimepicker.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets//bower_components/bootstrap-daterangepicker/css/daterangepicker.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/datedropper/css/datedropper.min.css')}}" />
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    {{-- PNOTIFY CSS --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/pnotify/css/pnotify.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/pnotify/css/pnotify.brightthemeadmin.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/pnotify/css/pnotify.buttons.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/pnotify/css/pnotify.history.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/bower_components/pnotify/css/pnotify.mobile.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/pages/pnotify/notify.css') }}">
    {{-- PNOTIFY CSS --}}
</head>

<body>

    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
                <div class="ring">
                    <div class="frame"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="feather icon-menu"></i>
                        </a>
                    <a href="{{ url('/admin/dashboard') }}">
                            <img class="img-fluid" src="{{asset('asset/assets_user/Images/Logo-4.png')}}" alt="Theme-Logo"  style="height: 60px; width:60px"/>
                        </a>
                        <a class="mobile-options">
                            <i class="feather icon-more-horizontal"></i>
                        </a>
                    </div>
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                        </ul>
                        <ul class="nav-right">
                            <li class="user-profile header-notification">
                                <div class="dropdown-primary dropdown">
                                    <div class="dropdown-toggle" data-toggle="dropdown">
                                        <img src="{{ asset('public/profile_pic/default-user-profile-image-png-6.png') }}" class="img-radius"
                                            alt="User-Profile-Image">
                                    <span>{{ auth()->user()->name }}</span>
                                        <i class="feather icon-chevron-down"></i>
                                    </div>
                                    <ul class="show-notification profile-notification dropdown-menu"
                                        data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                        <li>
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="feather icon-log-out"></i> Logout
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel"></div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="{{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
                                    <a href="{{ url('/admin/dashboard') }}">
                                        <span class="pcoded-micon"><i class="fa fa-dashboard"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="pcoded-hasmenu {{ (request()->is('admin/slidercontent*') ||request()->is('admin/homecontent*')||request()->is('admin/aboutuscontent*')||request()->is('admin/faqcontent*') ||request()->is('admin/testimonialcontent*') ||request()->is('admin/termconditioncontent*') ||request()->is('admin/weareherecontent*') ||request()->is('admin/workoutcontent*') ||request()->is('admin/contactuscontent*') ||request()->is('admin/blog*')) ? 'active pcoded-trigger' : '' }}">
                                        <a href="javascript:void(0)">
                                            <span class="pcoded-micon"><i class="fa fa-gear"></i></span>
                                            <span class="pcoded-mtext">CMS</span>
                                        </a>
                                        <ul class="pcoded-submenu">
                                            <li class="{{ (request()->is('admin/slidercontent*')) ? 'active' : '' }}">
                                                <a href="{{route('slidercontent.index')}}">
                                                    <span class="pcoded-mtext">Slider</span>
                                                </a>
                                            </li>
                                             <li class="{{ (request()->is('admin/homecontent*')) ? 'active' : '' }}">
                                                <a href="{{route('homecontent.index')}}">
                                                    <span class="pcoded-mtext">Home Contents</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/aboutuscontent*')) ? 'active' : '' }}">
                                                <a href="{{route('aboutuscontent.index')}}">
                                                    <span class="pcoded-mtext">About Us</span>
                                                </a>
                                            </li>
                                             <li class="{{ (request()->is('admin/gallary*')) ? 'active' : '' }}">
                                                <a href="{{route('gallarycontent.index')}}">
                                                    <span class="pcoded-mtext">Gallary</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/faqcontent*')) ? 'active' : '' }}">
                                                <a href="{{route('faqcontent.index')}}">
                                                    <span class="pcoded-mtext">FAQ</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/testimonialcontent*')) ? 'active' : '' }}">
                                                <a href="{{route('testimonialcontent.index')}}">
                                                    <span class="pcoded-mtext">Testimonial</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/termconditioncontent*')) ? 'active' : '' }}">
                                                <a href="{{route('termconditioncontent.index')}}">
                                                    <span class="pcoded-mtext">Terms & Condition</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/weareherecontent*')) ? 'active' : '' }}">
                                                <a href="{{route('weareherecontent.index')}}">
                                                    <span class="pcoded-mtext">We are here</span>
                                                </a>
                                            </li>
                                            
                                            <li class="{{ (request()->is('admin/contactuscontent*')) ? 'active' : '' }}">
                                                <a href="{{route('contactuscontent.index')}}">
                                                    <span class="pcoded-mtext">Contact Us</span>
                                                </a>
                                            </li>
                                            <li class="{{ (request()->is('admin/blog*')) ? 'active' : '' }}">
                                                <a href="{{ route('blog.index') }}">
                                                    <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                                    <span class="pcoded-mtext">Blog</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">

                                @yield('content')
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="{{ asset('asset/admin_assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/jquery/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/jquery-ui/js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/popper.js/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/bootstrap/js/bootstrap.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/j-pro/js/jquery.ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/j-pro/js/jquery.maskedinput.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/j-pro/js/jquery-cloneya.min.js')}}"></script>

    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/jquery-slimscroll/js/jquery.slimscroll.js')}}"></script>

    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/modernizr/js/modernizr.js')}}"></script>

    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/chart.js/js/Chart.js')}}"></script>

    <script src="{{ asset('asset/admin_assets/assets/pages/widget/amchart/amcharts.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/assets/pages/widget/amchart/serial.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/assets/pages/widget/amchart/light.js') }}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/assets/js/jquery.mCustomScrollbar.concat.min.js') }}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/js/SmoothScroll.js') }}"></script>

    <script src="{{ asset('asset/admin_assets/bower_components/datatables.net/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/assets/pages/data-table/js/jszip.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/assets/pages/data-table/js/pdfmake.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/assets/pages/data-table/js/vfs_fonts.js')}}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"    type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"    type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js')}}"    type="text/javascript"></script>
    <script src="{{ asset('asset/admin_assets/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"    type="text/javascript"></script>

    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/i18next/js/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/jquery-i18next/js/jquery-i18next.min.js')}}"></script>

    <script src="{{ asset('asset/admin_assets/assets/pages/data-table/js/data-table-custom.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/j-pro/js/custom/cloned-form.js')}}"></script>
    <script src="{{ asset('asset/admin_assets/assets/js/pcoded.min.js')}}" type="text/javascript"></script>

    <script src="{{ asset('asset/admin_assets/assets/js/vartical-layout.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/dashboard/custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/js/script.min.js')}}"></script>

    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/icon/ion-icon/css/ionicons.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/icon/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/icon/icofont/css/icofont.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('asset/admin_assets/assets/icon/feather/css/feather.css')}}">

    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/advance-elements/custom-picker.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/advance-elements/moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/spectrum/js/spectrum.js')}}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/bootstrap-daterangepicker/js/daterangepicker.js')}}"></script>

    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/datedropper/js/datedropper.min.js')}}"></script>
    <script src="{{ asset('asset/admin_assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/rocket-loader.min.js')}}"></script>
   {{-- PNOTIFY JS --}}
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.desktop.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.confirm.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.callbacks.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.animate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.history.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.mobile.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/bower_components/pnotify/js/pnotify.nonblock.js') }}"></script>
    <script type="text/javascript" src="{{ asset('asset/admin_assets/assets/pages/pnotify/notify.js') }}"></script>
    {{-- PNOTIFY JS --}}
    @yield('scripts')
</body>
<script>
  // Success notification
        @if(session()->has('message'))
                new PNotify({
                    text: "{{ session()->get('message') }}",
                    icon: 'icofont icofont-info-circle',
                    type: 'success'
                }); 
        @endif
        @if(session()->has('errormsg'))
                new PNotify({
                    text: "{{ session()->get('errormsg') }}",
                    type: 'error'
                }); 
        @endif
    $('#simpletable').dataTable( {
    "columnDefs": [
            { "width": "20%", "targets": 0 }
        ]
    });

    $('#simpletable-testi').dataTable( {
        "columnDefs": [
                { "width": "20%", "targets": [0,1] }
            ]
    });
CKEDITOR.replace('faq_answer');
CKEDITOR.replace('termsandconditions');
CKEDITOR.replace('plan_description');
CKEDITOR.replace('our_vision');
CKEDITOR.replace('our_mission');
// Preview Image Before Uploading
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImg + img').remove();
            $('#previewImg').after('<img src="'+e.target.result+'" width="121px" height="60px"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$(".previewImg").change(function () {
    filePreview(this);
});
// Preview Image Before Uploading
</script>  
</html>
