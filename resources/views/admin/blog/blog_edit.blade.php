@extends('admin.layouts.master')

@section('title')
Dashboard | Active Boys
@endsection

@section('content')
<style>
    .messages {
        color: red;
    }
</style>
<div class="page-wrapper">
    <div class="page-body">

        <div class="card">
            <div class="card-header">
                <h3> Edit Blog </h3>
            </div>

            <div class="card-block">
                <form id="number_form" action="{{ route('blog.update',$blog->id) }}" method="post" autocomplete="off"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Blog Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="desc_heading" id="desc_heading" placeholder="Name" value="{{ $blog->desc_heading }}">
                                    @if ($errors->has('desc_heading'))
                                    <span class="messages">{{ $errors->first('desc_heading') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <br>
                                <br>
                                <br>
                                <br>
                                <label class="col-sm-12 col-form-label">Long Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control " name="long_desc" id="long_desc" rows="10" placeholder="Long description upto 2000 charecter's." >{{ $blog->long_desc }}</textarea>
                                    @if ($errors->has('long_desc'))
                                    <span class="messages">{{ $errors->first('long_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Image <span class="text-danger"> 330 * 190 </span></label>
                                <div class="col-sm-12">
                                    
                                    <input type="file" class="form-control previewImg" name="blog_image" id="blog_image"  value="{{ $blog->blog_image }}" />
                                    <input type="hidden" class="form-control" name="old_blog_image" id="blog_image"  value="{{ $blog->blog_image }}" />
                                    @if ($errors->has('blog_image'))
                                    <span class="messages">{{ $errors->first('blog_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src='{{asset("public/blogs/blog_images/$blog->blog_image")}}' class="blog-images" height="60px";width="60px"; >
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <span id="previewImg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Short Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control " name="short_desc" id="short_desc" rows="10" placeholder="Short description upto 200 charecter's." >{{ $blog->short_desc }}</textarea>
                                    @if ($errors->has('short_desc'))
                                    <span class="messages">{{ $errors->first('short_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">Update</button>
                                    <a type="button" href="{{ route('blog.index') }}" class="btn btn-danger m-b-0">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        </div>



    </div>
</div>
@endsection

@section('scripts')
<script>
  $("input[type='file']").change(function () {
    $('#blog_image').text(this.value.replace(/C:\\fakepath\\/i, ''))
})
</script>

<style>

</style>
@endsection
