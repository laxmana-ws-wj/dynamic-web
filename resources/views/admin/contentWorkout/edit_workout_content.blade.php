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
                <form id="number_form" action="{{ route('workoutcontent.update',$workoutcontent->id) }}" method="post" autocomplete="off"
                    enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Top Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="top_description" id="top_description" rows="6" placeholder="Top Description" >{{ $workoutcontent->top_description }}</textarea>
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
                                <label class="col-sm-12 col-form-label">Fitness Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="fitness_image" id="fitness_image" placeholder="Image File" value="{{ old('fitness_image') }}">
                                    <input type="hidden" class="form-control" name="old_fitness_image"  value="{{ $workoutcontent->fitness_image }}">
                                    @if ($errors->has('fitness_image'))
                                    <span class="messages">{{ $errors->first('fitness_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="{{asset("public/aboutus/aboutus_images/$workoutcontent->fitness_image")}}" style="height:60px; width:120px">
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <span id="previewImgfitness_image"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Fitness Description</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="fitness_description" id="fitness_description" rows="6" placeholder="Description" >{{$workoutcontent->fitness_description}}</textarea>
                                    @if ($errors->has('fitness_description'))
                                    <span class="messages">{{ $errors->first('fitness_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Mindset Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="mindset_image " id="mindset_image" placeholder="Image File" value="{{ old('mindset_image') }}">
                                    <input type="hidden" class="form-control" name="old_mindset_image"  value="{{ $workoutcontent->mindset_image }}">
                                    @if ($errors->has('mindset_image'))
                                    <span class="messages">{{ $errors->first('mindset_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="{{asset("public/aboutus/aboutus_images/$workoutcontent->mindset_image")}}" style="height:60px; width:120px">
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <span id="previewImgmindset_image"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Mindset Description</label>
                                <div class="col-sm-12">
                                <textarea class="form-control" name="mindset_description" id="mindset_description" rows="6" placeholder="Description" >{{$workoutcontent->mindset_description}}</textarea>
                                    @if ($errors->has('mindset_description'))
                                    <span class="messages">{{ $errors->first('mindset_description') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Mobility Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="mobility_image " id="mobility_image" placeholder="Image File" value="{{ old('mobility_image') }}">
                                    <input type="hidden" class="form-control" name="old_mobility_image"  value="{{ $workoutcontent->mobility_image }}">
                                    
                                    @if ($errors->has('mobility_image'))
                                    <span class="messages">{{ $errors->first('mobility_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="{{asset("public/aboutus/aboutus_images/$workoutcontent->mobility_image")}}" style="height:60px; width:120px" >
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <span id="previewImgmobility_image"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Mobility Description</label>
                                <div class="col-sm-12">
                                <textarea class="form-control" name="mobility_description" id="mobility_description" rows="6" placeholder="Description" >{{$workoutcontent->mobility_description}}</textarea>
                                    @if ($errors->has('mobility_description'))
                                    <span class="messages">{{ $errors->first('mobility_description') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Nutrition Program Image</label>
                                <div class="col-sm-12">
                                    <input type="file" class="form-control" name="nutrition_image" id="nutrition_image" placeholder=" Image File" value="{{ old('nutrition_image') }}">
                                    <input type="hidden" class="form-control" name="old_nutrition_image"  value="{{ $workoutcontent->nutrition_image }}">
                                    @if ($errors->has('nutrition_image'))
                                    <span class="messages">{{ $errors->first('nutrition_image') }}</span>
                                    @endif
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <img src="{{asset("public/aboutus/aboutus_images/$workoutcontent->nutrition_image")}}" style="height:60px; width:120px">
                                        </div>
                                        <div class="col-sm-1"></div>
                                        <div class="col-sm-3">
                                            <span id="previewImgnutrition_image"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">Nutrition Program Description</label>
                                <div class="col-sm-12">
                                <textarea class="form-control" name="nutrition_description" id="nutrition_description" rows="6" placeholder="Description" >{{$workoutcontent->nutrition_description}}</textarea>
                                    @if ($errors->has('nutrition_description'))
                                    <span class="messages">{{ $errors->first('nutrition_description') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label class="col-sm-12"></label>
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    <a type="button" href="{{ route('workoutcontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
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
    CKEDITOR.replace('top_description');

    
// FOR WORKOU CONTENT IMAGE PREVIEW
// Fitness Image
function filePreviewfitness_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImgfitness_image + img').remove();
            $('#previewImgfitness_image').after('<img src="'+e.target.result+'" width="121px" height="60px"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#fitness_image").change(function () {
    filePreviewfitness_image(this);
});

// Mindset Image

function filePreviewmindset_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImgmindset_image + img').remove();
            $('#previewImgmindset_image').after('<img src="'+e.target.result+'" width="121px" height="60px"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#mindset_image").change(function () {
    filePreviewmindset_image(this);
});

// Mobility Image

function filePreviewmobility_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImgmobility_image + img').remove();
            $('#previewImgmobility_image').after('<img src="'+e.target.result+'" width="121px" height="60px"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#mobility_image").change(function () {
    filePreviewmobility_image(this);
});

// Mobility Image

function filePreviewnutrition_image(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#previewImgnutrition_image + img').remove();
            $('#previewImgnutrition_image').after('<img src="'+e.target.result+'" width="121px" height="60px"/>');
        };
        reader.readAsDataURL(input.files[0]);
    }
}
$("#nutrition_image").change(function () {
    filePreviewnutrition_image(this);
});
// FOR WORKOU CONTENT IMAGE PREVIEW
</script>
@endsection
