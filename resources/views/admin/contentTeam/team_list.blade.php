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
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="d-flex justify-content-between" style="padding:10px;">
                            <div>
                                <h5>Team Members</h5>
                            </div>
                            <div>
                                <span class="pull-right btn-group">
                                    <a class="btn btn-sm btn-success" title="Add New Testimonial" href="{{ route('teamcontent.create') }}"><i
                                            class="feather icon-plus"></i></a>
                                </span>
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable-testi" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($teamcontents as $teamcontent)
                                <tr>
                                    <td>{{ $teamcontent->name }}</td>
                                    <td>{{ $teamcontent->position }}</td>
                                    <td>{{ $teamcontent->description }}</td>
                                    <td><img src='{{ asset("public/team/team_images/$teamcontent->image")}}' height="100px" width="100px"></td>
                                    <td>
                                        <a href="{{ route('teamcontent.edit',$teamcontent->id )}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                        
                                        <a type="button" title="Delete Slider" style="cursor:pointer" class="m-r-15 text-muted" data-toggle="modal" data-target="#small-Modal{{$teamcontent->id}}" ><i class="icofont icofont-delete-alt"></i></a>
                                  
                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="small-Modal{{$teamcontent->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="delete-form{{ $teamcontent->id }}" action="{{ route('teamcontent.destroy',$teamcontent->id) }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            <h6 class="modal-title">Are you sure you want to delete this Testimonial record?</h6>
                                                                {{method_field('DELETE')}}  
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-success btn-sm waves-effect">Yes</button>
                                                            <button type="button" class="btn btn-default btn-sm waves-effect " data-dismiss="modal">No</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- Modal Delete --}}
                                    </td>
                                </tr>
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
