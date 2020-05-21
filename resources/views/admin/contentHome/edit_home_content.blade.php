@extends('admin.layouts.master')

@section('title')
Edit | Home Content
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
                <h3> Add New Content </h3>
            </div>
            <div class="card-block">
                <form id="number_form" action="{{ route('homecontent.update',$homecontent->id) }}" method="post" autocomplete="off"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title Title" value="{{$homecontent->title}}">
                                    @if ($errors->has('title'))
                                    <span class="messages">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Sub Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="sub_title" id="sub_title" placeholder="Sub Title" value="{{$homecontent->sub_title}}">
                                    @if ($errors->has('sub_title'))
                                    <span class="messages">{{ $errors->first('sub_title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="description" id="description" placeholder="Description">{!! $homecontent->description !!}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="messages">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                               <div class="form-group">
                                <label class="col-sm-3 col-form-label">Our Mission</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="our_mission" id="our_mission" placeholder="Mission">{!! $homecontent->our_mission !!}</textarea>
                                    @if ($errors->has('our_mission'))
                                    <span class="messages">{{ $errors->first('our_mission') }}</span>
                                    @endif
                                </div>
                            </div>
                               <div class="form-group">
                                <label class="col-sm-3 col-form-label">Our Vision</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="our_vision" id="our_vision" placeholder="Vision">{!! $homecontent->our_vision !!}</textarea>
                                    @if ($errors->has('our_vision'))
                                    <span class="messages">{{ $errors->first('our_vision') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Video Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Title Title" value="{{$homecontent->title}}">
                                    @if ($errors->has('title'))
                                    <span class="messages">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control previewImg" name="image" id="image" placeholder="Slider Image File" value="{{ old('image') }}">
                                    <input type="hidden" class="form-control" name="old_image"  value="{{ $homecontent->image }}">
                                    @if ($errors->has('image'))
                                        <span class="messages">{{ $errors->first('image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src='{{asset("home/home_images/$homecontent->image")}}' height="60px";width="60px"; >
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <span id="previewImg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary m-b-0">Update</button>
                                    <a type="button" href="{{ route('aboutuscontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    CKEDITOR.replace('description');
</script>
@endsection
