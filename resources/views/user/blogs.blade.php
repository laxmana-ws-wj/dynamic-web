@extends('user.layouts.master')

@section('title')
Blogs | Active Boys
@endsection

@section('content')

    <!-- page-title -->
    <section class="page-title centred" style="background-image: url('{{ asset('asset/assets_users/images/background/page-title.jpg') }} ');">
        <div class="container">
            <div class="content-box">
                <div class="title">Blogs</div>
                <ul class="bread-crumb">
                    <li><a href="index.html">Home</a></li>
                    <li>Blogs</li>
                </ul>
            </div>
        </div>
    </section>
    <!-- page-title end -->


    <!-- blog-gird -->
    <section class="news-section blog-grid blog-page overlay-style-one sec-pad-2">
        <div class="container">
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
                            <h4><a href="{{ route('ourblogs.show',$blog->id) }}"><?php echo ucwords($blog->desc_heading); ?></a></h4>
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
            
           
            <ul class="pagination">
    <!-- Previous Page Link -->
    @if ($blogs->onFirstPage())
        <li class="disabled"><span>&laquo;</span></li>
    @else
        <li><a href="{{ $blogs->previousPageUrl() }}" rel="prev">&laquo;</a></li>
    @endif

    <!-- Pagination Elements -->
    @foreach ($blogs as $element)
        <!-- "Three Dots" Separator -->
        @if (is_string($element))
            <li class="disabled"><span>{{ $element }}</span></li>
        @endif

        <!-- Array Of Links -->
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $blogs->currentPage())
                    <li class="active"><span>{{ $page }}</span></li>
                @else
                    <li><a href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    <!-- Next Page Link -->
    @if ($blogs->hasMorePages())
        <li><a href="{{ $blogs->nextPageUrl() }}" rel="next">&raquo;</a></li>
    @else
        <li class="disabled"><span>&raquo;</span></li>
    @endif
</ul>
        </div>
    </section>
    <!-- blog-grid end -->

@endsection
@section('scripts')
@endsection

