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
                <form id="number_form" action="{{ route('workoutcontent.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Top Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="top_description" id="top_description" placeholder="Top Description">{{ old('top_description') }}</textarea>
                                    @if ($errors->has('top_description'))
                                    <span class="messages">{{ $errors->first('top_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Fitness Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="fitness_image" id="fitness_image" placeholder="Image File" value="{{ old('fitness_image') }}">
                                    @if ($errors->has('fitness_image'))
                                    <span class="messages">{{ $errors->first('fitness_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Fitness Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="fitness_description" id="fitness_description" placeholder="Description" >{{ old('fitness_description') }}</textarea>
                                    @if ($errors->has('fitness_description'))
                                    <span class="messages">{{ $errors->first('fitness_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Mindset Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="mindset_image" id="mindset_image" placeholder="Image File" value="{{ old('mindset_image') }}">
                                    @if ($errors->has('mindset_image'))
                                    <span class="messages">{{ $errors->first('mindset_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Mindset Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="mindset_description" id="mindset_description" placeholder="Description" >{{ old('mindset_description') }}</textarea>
                                    @if ($errors->has('mindset_description'))
                                    <span class="messages">{{ $errors->first('mindset_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Mobility Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="mobility_image" id="mobility_image" placeholder="Image File" value="{{ old('mobility_image') }}">
                                    @if ($errors->has('mobility_image'))
                                    <span class="messages">{{ $errors->first('mobility_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Mobility Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="mobility_description" id="mobility_description" placeholder="Description" >{{ old('mobility_description') }}</textarea>
                                    @if ($errors->has('mobility_description'))
                                    <span class="messages">{{ $errors->first('mobility_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Nutrition Program Image</label>
                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="nutrition_image" id="nutrition_image" placeholder=" Image File" value="{{ old('nutrition_image') }}">
                                    @if ($errors->has('nutrition_image'))
                                    <span class="messages">{{ $errors->first('nutrition_image') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-10 col-form-label">Nutrition Program Description</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="nutrition_description" id="nutrition_description" placeholder="Description" >{{ old('nutrition_description') }}</textarea>
                                    @if ($errors->has('nutrition_description'))
                                    <span class="messages">{{ $errors->first('nutrition_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            
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
CKEDITOR.replace('top_description');
</script>
@endsection
