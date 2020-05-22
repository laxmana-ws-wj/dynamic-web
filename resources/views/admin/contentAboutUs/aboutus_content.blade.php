@extends('admin.layouts.master')

@section('title')
Dashboard | Active Boys
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-body">

        <div class="card">
            <div class="card-header">
                {{-- <a href="{{ route('move.create')}}" class="btn btn-success btn-round">Add New Move</a> --}}
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="d-flex justify-content-between" style="padding:10px;">
                            <div>
                                <h5>About Us Content</h5>
                            </div>
                            <div>
                               
                                <div class="clearfix"></div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-block">
                <div class="dt-responsive table-responsive">
                    <table id="simpletable" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aboutuscontents as $item)
                            <td>{{$item->title}}</td>
                            <td>{!! $item->description !!}</td>
                            <td><img src="{{ asset("public/aboutus/aboutus_images/$item->image")}}" height="60px";width="60px"; ></td>
                            <td class="action-icon">
                                <a href="{{ route('aboutuscontent.edit',$item->id )}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                {{-- <a href="#" class="m-r-15 text-muted"  onClick="event.preventDefault();document.getElementById('delete-form').submit();" ><i class="icofont icofont-delete-alt"></i></a>
                                <form id="delete-form" action="{{ route('aboutuscontent.destroy',$item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    {{method_field('DELETE')}}
                                </form> --}}
                            </td>
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
