@extends('admin.layouts.master')

@section('title')
Dashboard | Rucha Samajik Sanstha
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
                                <h5>Home Content</h5>
                            </div>
                            <div>
                                {{-- <span class="pull-right btn-group">
                                    <a class="btn btn-sm btn-success" href="{{route('homecontent.create')}}"><i
                                            class="feather icon-plus"></i></a>
                                    <button type="button" class="btn btn-sm btn-secondary" title="Refresh"><i
                                            class="feather icon-refresh-cw"></i></button>
                                    <button type="button" class="btn btn-sm btn-info" title="Excel Download"><i
                                            class="feather icon-file-text"></i></button>
                                </span> --}}
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
                                <th>Sub Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($homecontents as $item)
                            <td>{{$item->title}}</td>
                            <td>{{$item->sub_title}}</td>
                            <td>{!! $item->description !!}</td>
                            <td><img src='{{ asset("public/home/home_images/$item->image")}}' height="60px";width="60px"; ></td>
                            <td class="action-icon">
                                <a href="{{ route('homecontent.edit',$item->id )}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                {{-- <a href="#" class="m-r-15 text-muted"  onClick="event.preventDefault();document.getElementById('delete-form').submit();" ><i class="icofont icofont-delete-alt"></i></a>
                                <form id="delete-form" action="{{ route('homecontent.destroy',$item->id) }}" method="POST" style="display: none;">
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
