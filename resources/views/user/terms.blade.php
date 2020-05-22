@extends('user.layouts.master')

@section('title')
     Terms And Conditions | Rucha Samajik Sanstha
@endsection

@section('content')


    <!-- page-title -->
    <section class="page-title centred" style="background-image: url('{{ asset('asset/assets_users/images/background/page-title.jpg')}}');">
        <div class="container">
            <div class="content-box">
                <div class="title">Terms And Conditions</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Terms And Conditions</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- about-style-two -->
    <section class="about-style-two sec-pad">
        <div class="container">
            <div class="sec-title centred">Terms & <span>Conditions</span> </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 about-column">
                    <div class="about-content">
                        <div class="top-content">
                            <div class="text">{!! $termconditioncontent[0]->termsandconditions !!}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-style-two -->

@endsection

@section('scripts')

@endsection
