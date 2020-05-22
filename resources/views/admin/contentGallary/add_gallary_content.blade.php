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
                <h3> Add New Gallary Images </h3>
            </div>

            <div class="card-block">
                <form id="number_form" action="{{ route('gallarycontent.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                               <label class="col-sm-6 col-form-label">Image <span class="text-danger"> 1280 * 960 </span></label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control previewImg" name="image[]" id="image" placeholder="Slider Image File" multiple value="{{ old('image') }}">
                                    @if ($errors->has('image'))
                                    <span class="messages">{{ $errors->first('image') }}</span>
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
                                <label class="col-sm-3"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    <a type="button" href="{{ route('aboutuscontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
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
<script>
CKEDITOR.replace('description');
</script>
@endsection
