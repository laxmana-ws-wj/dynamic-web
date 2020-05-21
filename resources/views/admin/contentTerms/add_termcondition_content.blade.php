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
                <h3> Add Term & Condition </h3>
            </div>
            <div class="card-block">
                <form id="number_form" action="{{ route('termconditioncontent.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Terms & Conditions</label>
                                <div class="col-sm-12">
                                    <textarea rows="20" class="form-control" name="termsandconditions" id="termsandconditions" placeholder="Terms & Conditions" value="{{ old('termsandconditions') }}">
                                    </textarea>
                                    @if ($errors->has('termsandconditions'))
                                    <span class="messages">{{ $errors->first('termsandconditions') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary m-b-0 pull-right">Submit</button>
                                    <a type="button" href="{{ route('termconditioncontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
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
