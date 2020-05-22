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
                <h3> Edit Team Member </h3>
            </div>

            <div class="card-block">
                <form id="number_form" action="{{ route('teamcontent.update',$teamcontent->id) }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Name"
                                        value="{{ $teamcontent->name }}">
                                    @if ($errors->has('name'))
                                    <span class="messages">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Position</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="position" id="position" placeholder="position"
                                        value="{{ $teamcontent->position }}">
                                    @if ($errors->has('position'))
                                    <span class="messages">{{ $errors->first('position') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-6 col-form-label">Image <span class="text-danger"> 290 * 300 </span></label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control previewImg" name="image" id="image" placeholder="image"
                                        value="{{ old('image')}}">
                                        <input type="hidden" class="form-control" name="old_team_image" id="old_team_image"  value="{{ $teamcontent->image }}" />
                                        @if ($errors->has('image'))
                                            <span class="messages">{{ $errors->first('image') }}</span>
                                        @endif
                                        <br>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <img src='{{asset("public/team/team_images/$teamcontent->image")}}' style="height:60px;width:120px">
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
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="description" id="description" placeholder="Description" value="{{ old('description') }}" rows="8">{{ $teamcontent->description }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="messages">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3"></label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary m-b-0">Update</button>
                                    <a type="button" href="{{ route('teamcontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
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
