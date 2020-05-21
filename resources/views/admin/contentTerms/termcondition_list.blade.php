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
                {{-- <a href="{{ route('termconditioncontent.create')}}" class="btn btn-success btn-round">Add New Terms & Conditions</a> --}}
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="d-flex justify-content-between" style="padding:10px;">
                            <div>
                                <h5>Term & Condition Contents</h5>
                            </div>
                            {{-- <div>
                                <span class="pull-right btn-group">
                                    <a class="btn btn-sm btn-success" href="{{ route('termconditioncontent.create') }}"><i
                                            class="feather icon-plus"></i></a>
                                    <button type="button" class="btn btn-sm btn-secondary" title="Refresh"><i
                                            class="feather icon-refresh-cw"></i></button>
                                    <button type="button" class="btn btn-sm btn-info" title="Excel Download"><i
                                            class="feather icon-file-text"></i></button>
                                </span>
                                <div class="clearfix"></div>

                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Terms & Conditions</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php 
                                $i = 1;
                            @endphp
                            @foreach($termconditioncontents as $termconditioncontent)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{!! $termconditioncontent->termsandconditions !!}</td>
                                <td>
                                        <a href="{{ route('termconditioncontent.edit',$termconditioncontent->id )}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                        {{-- <a href="#" class="m-r-15 text-muted"  onClick="event.preventDefault();document.getElementById('delete-form').submit();" ><i class="icofont icofont-delete-alt"></i></a>
                                        <form id="delete-form" action="{{ route('termconditioncontent.destroy',$termconditioncontent->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form> --}}
                                    </td>
                            </tr>
                            @php
                             $i++
                            @endphp
                            @endforeach
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
