@extends('user.layouts.master')

@section('title')
    Gallary | Rucha Samajik Sanstha
@endsection

@section('content')


    <!-- page-title -->
    <section class="page-title centred" style="background-image: url('{{ asset('asset/assets_users/images/background/page-title.jpg') }} ');">
        <div class="container">
            <div class="content-box">
                <div class="title">Gallary</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Gallary</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- portfolio-section -->
    <section class="portfolio-section">
        <div class="container">
            <div class="sortable-masonry mixed-gallery-section">
               <!--  <ul class="filter-tabs filter-btns post-filter centred">
                    <li class="active filter" data-role="button" data-filter=".all">All</li>
                    <li class="filter" data-role="button" data-filter=".children">Children</li>
                    <li class="filter" data-role="button" data-filter=".volunteer">Volunteer</li>
                    <li class="filter" data-role="button" data-filter=".donate">Donate</li>
                </ul> -->
                <div class="row items-container clearfix">
                    @foreach($gallaries as $gallarie)
                    <div class="col-lg-4 col-md-6 col-sm-12 masonry-item all">
                        <div class="single-portfolio-content">
                            <figure class="img-box">
                                <img src='{{ asset("public/gallary/gallary_images/$gallarie->image") }}' alt="">
                                <!-- <div class="text">Provide clean water all over syria.</div> -->
                            </figure>
                            <div class="overlay-box">
                                <div class="overlay-inner">
                                    <div class="overlay-content">
                                        <!-- <h3>Provide clean water all over syria.</h3> -->
                                        <a href="#"><i class="flaticon-right-arrow"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <ul class="pagination centred clearfix">
                    <!-- Previous Page Link -->
                    @if ($gallaries->onFirstPage())
                        <li class="disabled"><span>&laquo;</span></li>
                    @else
                        <li><a href="{{ $gallaries->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                    @endif

                    <!-- Pagination Elements -->
                    @foreach ($gallaries as $element)
                        <!-- "Three Dots" Separator -->
                        @if (is_string($element))
                            <li class="disabled"><span>{{ $element }}</span></li>
                        @endif

                        <!-- Array Of Links -->
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $gallaries->currentPage())
                                    <li class="active"><span>{{ $page }}</span></li>
                                @else
                                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <!-- Next Page Link -->
                    @if ($gallaries->hasMorePages())
                        <li><a href="{{ $gallaries->nextPageUrl() }}" rel="next">&raquo;</a></li>
                    @else
                        <li class="disabled"><span>&raquo;</span></li>
                    @endif
                </ul>
                <!-- portfolio-section end -->
        </div>
    </section>
                
    

@endsection

@section('scripts')

@endsection