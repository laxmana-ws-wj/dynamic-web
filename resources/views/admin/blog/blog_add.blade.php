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
                <h3> Add New Blog </h3>
            </div>

            <div class="card-block">
                <form id="number_form" action="{{ route('blog.store') }}" method="post" autocomplete="off"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Blog Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="desc_heading" id="desc_heading" placeholder="Heading" value="{{ old('blog_name') }}">
                                    @if ($errors->has('blog_name'))
                                    <span class="messages">{{ $errors->first('blog_name') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Short Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control " name="short_desc" id="short_desc" rows="10" value="" placeholder="Short description upto 200 charecter's." value="{{ old('short_desc') }}"></textarea>
                                    @if ($errors->has('short_desc'))
                                    <span class="messages">{{ $errors->first('short_desc') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Image <span class="text-danger"> 330 * 190 </span></label>
                                
                                <div class="col-sm-12">
                                    <input type="file" class="form-control previewImg" name="blog_image" id="blog_image" placeholder="Blog Image File" value="{{ old('blog_image') }}">
                                    @if ($errors->has('blog_image'))
                                    <span class="messages">{{ $errors->first('blog_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <span id="previewImg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                
                                <div class="col-sm-12">
                                    <label class="col-sm-12 col-form-label">Long Description</label>
                                    <textarea class="form-control " name="long_desc" id="long_desc" value="" placeholder="Long description upto 2000 charecter's." rows="10" value="{{ old('long_desc') }}"></textarea>
                                    @if ($errors->has('long_desc'))
                                    <span class="messages">{{ $errors->first('long_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
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
    // $("#logo_selected_class").on('focus',function(){ $('.modal-icon').modal('show');});
    // $(".outer-ellipsis").on('click',function(){
    //     var font_class=($(this).children().attr('class'));
    //     $('#logo_selected_class').val(font_class);
    //     $('.modal-icon').modal('hide');
    // });
</script>

<style>
   
</style>
@endsection
