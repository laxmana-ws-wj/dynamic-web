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
                <form id="number_form" action="{{ route('slidercontent.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Slider Title</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="slider_title" id="title" placeholder="Slider Title"
                                        value="{{ old('slider_title') }}">
                                    @if ($errors->has('slider_title'))
                                    <span class="messages">{{ $errors->first('slider_title') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Slider Description</label>
                                <div class="col-sm-12">
                                    {{-- <input type="text" class="form-control" name="slider_desc" id="slider_desc" placeholder="Slider Description" value="{{ old('slider_desc') }}"> --}}
                                    <textarea class="form-control" name="slider_desc" id="slider_desc" rows="6" placeholder="Slider Description">{{ old('slider_desc') }}</textarea>
                                    @if ($errors->has('slider_desc'))
                                    <span class="messages">{{ $errors->first('slider_desc') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label"> Bg Image <span class="text-danger"> 1920 * 880 </span></label>

                                <div class="col-sm-12">
                                    <input type="file" class="form-control previewImg" name="bg_image" id="bg_image" placeholder="Slider Image File" value="{{ old('bg_image') }}">
                                    @if ($errors->has('bg_image'))
                                    <span class="messages">{{ $errors->first('bg_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
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
                                    <button type="submit" class="btn btn-primary  m-b-0">Submit</button>
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
