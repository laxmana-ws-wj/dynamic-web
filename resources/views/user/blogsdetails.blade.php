@extends('user.layouts.master')

@section('title')
Blog Details | Rucha Samajik Sanstha
@endsection

@section('content')

    <!-- page-title -->
    <section class="page-title centred" style="background-image: url('{{ asset('asset/assets_users/images/background/page-title.jpg') }} ');">
        <div class="container">
            <div class="content-box">
                <div class="title">Blog Details</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Blog Details</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- blog-details -->
    <section class="news-section blog-details blog-page sec-pad-2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 content-side">
                    <div class="blog-details-content">
                        <div class="content-style-one">
                            <figure class="img-box"><img src='{{ asset("public/blogs/blog_images/$blog->blog_image")}}' alt=""></figure>
                            <div class="sec-title">{{ $blog->desc_heading }}</div>
                            <div class="date">{{ date("d M Y", strtotime($blog->created_at)) }}</div>
                            <div class="text">
                                <p>{{ $blog->short_desc }}</p>
                            </div>
                        </div>
                        <div class="content-style-two">
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <figure class="img-box"><img src="{{ asset('asset/assets_users/images/resource/10.jpg') }}" alt=""></figure>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <figure class="img-box"><img src="{{ asset('asset/assets_users/images/resource/11.jpg') }}" alt=""></figure>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <figure class="img-box"><img src="{{ asset('asset/assets_users/images/resource/12.jpg') }}" alt=""></figure>
                                </div>
                            </div>
                            
                        </div>
                        <div class="post-share-option clearfix">
                            <ul class="list">
                                <li><a href="#">Child</a></li>
                                <li><a href="#">Education</a></li>
                            </ul>
                            <div class="share">
                                <a href="#"><i class="fa fa-share"></i>Share This</a>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-linkedin"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details end -->


@endsection
@section('scripts')
@endsection
