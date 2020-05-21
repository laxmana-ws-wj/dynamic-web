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
                <h3> Add New Faq </h3>
            </div>

            <div class="card-block">
                <form id="number_form" action="{{ route('faqcontent.store') }}" method="post" autocomplete="off" enctype="multipart/form-data" novalidate>
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Question</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" name="faq_question" id="faq_question" placeholder="Faq Question"
                                        value="{{ old('faq_question') }}">
                                    @if ($errors->has('faq_question'))
                                    <span class="messages">{{ $errors->first('faq_question') }}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">Answer</label>
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="faq_answer" id="faq_answer" placeholder="Faq Answer" value="{{ old('faq_answer') }}">
                                    </textarea>
                                    @if ($errors->has('faq_answer'))
                                    <span class="messages">{{ $errors->first('faq_answer') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <button type="submit" class="btn btn-primary m-b-0">Submit</button>
                                    <a type="button" href="{{ route('faqcontent.index') }}" class="btn btn-danger m-b-0">Cancel</a>
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
