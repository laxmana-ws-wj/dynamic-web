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
                <h3> Add New Content </h3>
            </div>
            <div class="card-block">
                <form id="number_form" action="{{ route('slidercontent.update',$slidercontent->id) }}" method="post" autocomplete="off"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Slider Title</label>
                                <div class="col-sm-12">
                                    <input type="hidden" class="form-control" name="id" id="id" placeholder="Slider Title"
                                    value="{{$slidercontent->id }}">
                                    <input type="text" class="form-control" name="slider_title" id="title" placeholder="Slider Title"
                                        value="{{$slidercontent->slider_title }}">
                                    @if ($errors->has('slider_title'))
                                    <span class="messages">{{ $errors->first('slider_title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Slider Description</label>
                                <div class="col-sm-12">
                                    {{-- <input type="text" class="form-control" name="slider_desc" id="slider_desc" placeholder="Slider Description" value="{{ $slidercontent->slider_desc}}"> --}}
                                    <textarea class="form-control" name="slider_desc" id="slider_desc" rows="6" placeholder="Slider Description">{{ $slidercontent->slider_desc}}</textarea>
                                    @if ($errors->has('slider_desc'))
                                    <span class="messages">{{ $errors->first('slider_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Bg Image <span class="text-danger"> 1920 * 880 </span></label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control previewImg" name="bg_image" id="bg_image" placeholder="Slider Image File" value="{{ old('bg_image') }}">
                                    <input type="hidden" class="form-control" name="old_bg_image"  value="{{ $slidercontent->bg_image }}">
                                    @if ($errors->has('bg_image'))
                                    <span class="messages">{{ $errors->first('bg_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="{{asset("public/slider/slider_images/$slidercontent->bg_image")}}" height="60px";width="60px"; >
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
                                    <button type="submit" class="btn btn-primary  m-b-0">Update</button>
                                    <a type="button" href="{{ route('slidercontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
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

@endsection
