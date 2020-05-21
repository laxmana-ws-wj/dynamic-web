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
                <h3> Edit Content </h3>
            </div>

            <div class="card-block">
                <form id="number_form" action="{{ route('contactuscontent.update',$contactuscontent->id) }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                         <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control previewImg" name="image" id="image" placeholder="Slider Image File" value="{{ old('image') }}">
                                    <input type="hidden" class="form-control" name="old_image"  value="{{ $contactuscontent->image }}">
                                    @if ($errors->has('image'))
                                        <span class="messages">{{ $errors->first('image') }}</span>
                                    @endif
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src='{{asset("public/logo/logo_images/$contactuscontent->image")}}' height="60px";width="60px"; >
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <span id="previewImg"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                             <div class="form-group">
                                <label class="col-sm-6 col-form-label">Facebook Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="fb_link" id="fb_link" placeholder="Facebook Link"
                                        value="{{ $contactuscontent->fb_link }}">
                                    @if ($errors->has('fb_link'))
                                    <span class="messages">{{ $errors->first('fb_link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Twiter Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="tw_link" id="tw_link" placeholder="Twiter Link"
                                        value="{{ $contactuscontent->tw_link }}">
                                    @if ($errors->has('tw_link'))
                                    <span class="messages">{{ $errors->first('tw_link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Linkden Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="li_link" id="li_link" placeholder="Twiter Link"
                                        value="{{ $contactuscontent->li_link }}">
                                    @if ($errors->has('li_link'))
                                    <span class="messages">{{ $errors->first('li_link') }}</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Map Link</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="map_link" id="map_link" placeholder="Map Link" value="{{ $contactuscontent->map_link }}">
                                    @if ($errors->has('map_link'))
                                    <span class="messages">{{ $errors->first('map_link') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Contact 1</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="contact_us_1" id="contact_us_1" placeholder="Contact Us Now 1"
                                        value="{{ $contactuscontent->call_us_now_1 }}">
                                    @if ($errors->has('contact_us_1'))
                                    <span class="messages">{{ $errors->first('contact_us_1') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Contact 2</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="contact_us_2" id="contact_us_2" placeholder="Contact Us Now 2" value="{{ $contactuscontent->call_us_now_2 }}">
                                    @if ($errors->has('contact_us_2'))
                                    <span class="messages">{{ $errors->first('contact_us_2') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Email</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="our_email" id="our_email" placeholder="Our Email" value="{{ $contactuscontent->our_email }}"  >
                                    @if ($errors->has('our_email'))
                                    <span class="messages">{{ $errors->first('our_email') }}</span>
                                    @endif
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="col-sm-6 col-form-label">Address</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="our_address" id="our_address" placeholder="Our Address" rows="8">{{ $contactuscontent->our_address }}</textarea>
                                    @if ($errors->has('our_address'))
                                    <span class="messages">{{ $errors->first('our_address') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            
                        <div class="form-group">
                                <label class="col-sm-6 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="description" id="description" placeholder="Description" rows="6">{{ $contactuscontent->description }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="messages">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    <a type="button" href="{{ route('contactuscontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="row">
                        <label class="col-sm-2"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection
