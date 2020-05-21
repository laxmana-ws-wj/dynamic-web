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
                {{-- <a href="{{ route('testimonialcontent.create')}}" class="btn btn-success btn-round">Add New Testimonial</a> --}}
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="d-flex justify-content-between" style="padding:10px;">
                            <div>
                                <h5>Testimonial Content</h5>
                            </div>
                            <div>
                                <span class="pull-right btn-group">
                                    <a class="btn btn-sm btn-success" title="Add New Testimonial" href="{{ route('testimonialcontent.create') }}"><i
                                            class="feather icon-plus"></i></a>
                                    {{-- <button type="button" class="btn btn-sm btn-secondary" title="Refresh"><i
                                            class="feather icon-refresh-cw"></i></button>
                                    <button type="button" class="btn btn-sm btn-info" title="Excel Download"><i
                                            class="feather icon-file-text"></i></button> --}}
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
                                <th>Company Name</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($testimonialcontents as $testimonialcontent)
                                <tr>
                                    <td>{{ $testimonialcontent->name }}</td>
                                    <td>{{ $testimonialcontent->company_name }}</td>
                                    <td>{{ $testimonialcontent->description }}</td>
                                    <td><img src='{{ asset("public/testimonials/testimonial_image/$testimonialcontent->image")}}' height="100px" width="100px"></td>
                                    <td>
                                        <a href="{{ route('testimonialcontent.edit',$testimonialcontent->id )}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                        {{-- <a href="#" class="m-r-15 text-muted"  onClick="event.preventDefault();document.getElementById('delete-form').submit();" ><i class="icofont icofont-delete-alt"></i></a>
                                        <form id="delete-form" action="{{ route('testimonialcontent.destroy',$testimonialcontent->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            {{method_field('DELETE')}}
                                        </form> --}}
                                        <a type="button" title="Delete Slider" style="cursor:pointer" class="m-r-15 text-muted" data-toggle="modal" data-target="#small-Modal{{$testimonialcontent->id}}" ><i class="icofont icofont-delete-alt"></i></a>
                                  
                                        {{-- Modal Delete --}}
                                        <div class="modal fade" id="small-Modal{{$testimonialcontent->id}}" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title"></h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="delete-form{{ $testimonialcontent->id }}" action="{{ route('testimonialcontent.destroy',$testimonialcontent->id) }}" method="POST">
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
