@extends('admin.layouts.master')

@section('title')
Dashboard | Active Boys
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-body">

        <div class="card">
            <div class="card-header">
                @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
                @endif
                {{-- <a href="{{ route('move.create')}}" class="btn btn-success btn-round">Add New Move</a> --}}
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="d-flex justify-content-between" style="padding:10px;">
                            <div>
                                <h5>FAQ Content</h5>
                            </div>
                            <div>
                                <span class="pull-right btn-group">
                                    <a class="btn btn-sm btn-success" href="#"><i
                                            class="feather icon-plus"></i></a>
                                    <button type="button" class="btn btn-sm btn-secondary" title="Refresh"><i
                                            class="feather icon-refresh-cw"></i></button>
                                    <button type="button" class="btn btn-sm btn-info" title="Excel Download"><i
                                            class="feather icon-file-text"></i></button>
                                </span>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Question</th>
                                <th>Answer</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>





<style>
    .ypbord {
        border: 1px solid gray;
    }
</style>
@endsection

@section('scripts')
<script>

</script>
@endsection
