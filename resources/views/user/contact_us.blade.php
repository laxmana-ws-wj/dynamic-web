@extends('user.layouts.master')

@section('title')
    Contact Us | Rucha Samajik Sanstha
@endsection

@section('content')



    <!-- page-title -->
    <section class="page-title centred" style="background-image: url('{{ asset('asset/assets_users/images/background/page-title.jpg') }} ');">
        <div class="container">
            <div class="content-box">
                <div class="title">Contact Us</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- contact-section -->
    <section class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 contact-column">
                    @foreach ($contactuscontent as $item)
                    <div class="contact-info">
                        <div class="contact-title">Get In Touch</div>
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                <div class="left-column single-info centred">
                                    <div class="icon-box"><i class="flaticon-map"></i></div>
                                    <h5>Address</h5>
                                    <div class="text">{{ $item->our_address}}</div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 column">
                                <div class="right-column single-info">
                                    <div class="icon-box"><i class="flaticon-mail"></i></div>
                                    <h5>Email</h5>
                                    <div class="text">{{ $item->our_email}}</div>
                                </div>
                                <div class="right-column single-info">
                                    <div class="icon-box"><i class="flaticon-phone-call-1"></i></div>
                                    <h5>Phone No</h5>
                                    <div class="text">+91 {{ $item->call_us_now_1}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 contact-column">
                    <div class="contact-form-area">
                        <div class="contact-title">Send Us A Message</div>
                        @if(session()->has('message'))
                           <div class="alert alert-success" id="mydiv" role="alert">{{ session()->get('message') }}
                            </div>
                        @endif
                        
                        <p>If you have any comments, questions or queries, you can contact us by filling out the information below:</p>
                        <form id="contact-form" name="contact_form" class="default-form" action="{{ route('contact.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label>Name *</label>
                                    <input type="text" name="uname" value="" required="">
                                    @if ($errors->has('uname'))
                                        <span id="uname_error" style="color:#D79150 ;">{{ $errors->first('uname') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                    <label>Email *</label>
                                    <input type="email" name="email" value="" required="">
                                    @if ($errors->has('email'))
                                        <span id="email_error" style="color:#D79150 ;">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <label>Subject</label>
                                    <input type="text" name="subject" value="" required="">
                                    @if ($errors->has('subject'))
                                        <span id="subject_error" style="color:#D79150 ;">{{ $errors->first('subject') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <label>Messsage</label>
                                    <textarea name="message" required=""></textarea>
                                    @if ($errors->has('message'))
                                        <span id="subject_error" style="color:#D79150 ;">{{ $errors->first('message') }}</span>
                                    @endif
                                </div>
                                <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                    <button type="submit" class="theme-btn" data-loading-text="Please wait...">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-section end -->


    <!-- google-map -->
    <section class="google-map-section">
        <div class="google-map-area">
        @foreach ($contactuscontent as $links)
        <iframe src="{{ $links->map_link }}" width="100%"  height="350px"frameborder="0" style="border:1;margin-bottom: -8px" allowfullscreen="" ></iframe>
        @endforeach
        </div>
    </section>
    <!-- google-map end -->

@endsection

@section('scripts')

@endsection