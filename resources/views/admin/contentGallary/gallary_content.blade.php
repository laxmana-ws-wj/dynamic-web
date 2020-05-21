@extends('admin.layouts.master')

@section('title')
Dashboard | Active Boys
@endsection

@section('content')
<div class="page-wrapper">
    <div class="page-body">

        <div class="card">
            <div class="card-header">
                <div class="row grid-margin">
                    <div class="col-12">
                        <div class="d-flex justify-content-between" style="padding:10px;">
                            <div>
                                <h5>About Us Content</h5>
                            </div>
                            <div>
                                 <span class="pull-right btn-group">
                                    <a class="btn btn-sm btn-success" href="{{ route('gallarycontent.create') }}"><i
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
                    <table id="simpletable" class="table table-striped table-bordered" width="100%">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gallarycontents as $item)
                            <tr>
                            <td width="50%"><img src='{{ asset("gallary/gallary_images/$item->image")}}' height="8px";width="80px"; ></td>
                            <td class="action-icon">
                                <a href="{{ route('gallarycontent.edit',$item->id )}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                <a href="#" class="m-r-15 text-muted"  onClick="event.preventDefault();document.getElementById('delete-form').submit();" ><i class="icofont icofont-delete-alt"></i></a>
                                <form id="delete-form" action="{{ route('gallarycontent.destroy',$item->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    {{method_field('DELETE')}}
                                </form>
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
