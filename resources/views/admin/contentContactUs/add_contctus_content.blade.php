
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
                <form id="number_form" action="{{ route('contactuscontent.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Contact Us Now 1</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact_us_1" id="contact_us_1" placeholder="Contact Us Now 1"
                                        value="{{ old('contact_us_1') }}">
                                    @if ($errors->has('contact_us_1'))
                                    <span class="messages">{{ $errors->first('contact_us_1') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Contact Us Now 2</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="contact_us_2" id="contact_us_2" placeholder="Contact Us Now 2" value="{{ old('contact_us_2') }}">
                                    @if ($errors->has('contact_us_2'))
                                    <span class="messages">{{ $errors->first('contact_us_2') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Our Email Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="our_email" id="our_email" placeholder="Our Email" value="{{ old('our_email') }}">
                                    @if ($errors->has('our_email'))
                                    <span class="messages">{{ $errors->first('our_email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Our Address</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="our_address" id="our_address" placeholder="Our Address" value="{{ old('our_address') }}" >
                                    @if ($errors->has('our_address'))
                                    <span class="messages">{{ $errors->first('our_address') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Map Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="map_link" id="map_link" placeholder="map_link" value="{{ old('map_link') }}">
                                    @if ($errors->has('map_link'))
                                    <span class="messages">{{ $errors->first('map_link') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0 pull-right">Submit</button>
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
