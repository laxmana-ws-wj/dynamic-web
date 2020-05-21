
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
                                <h5>Contact Us Content</h5>
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
                                <th>Contact1</th>
                                <th>Contact2</th>
                                <th>Email Address</th>
                                <th>Address</th>
                                <th>Map Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($contact_us_content as $contactUscontent)
                            <tr>
                                {{-- id, call_us_now_1, call_us_now_2, our_email, our_address, created_at, updated_at --}}
                                <td>{{ $contactUscontent->call_us_now_1 }}</td>
                                <td>{{ $contactUscontent->call_us_now_2 }}</td>
                                <td>{{ $contactUscontent->our_email }}</td>
                                <td>{{ $contactUscontent->our_address }}</td>
                                <td> {{ $contactUscontent->map_link }}</td>
                                <td class="action-icon">
                                    <a href="{{ route('contactuscontent.edit', $contactUscontent->id )}}" class="m-r-15 text-muted" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"><i class="icofont icofont-ui-edit"></i></a>
                                    {{-- <a href="#" class="m-r-15 text-muted"  onClick="event.preventDefault();document.getElementById('delete-form').submit();" ><i class="icofont icofont-delete-alt"></i></a>
                                    <form id="delete-form" action="{{ route('contactuscontent.destroy',$contactUscontent->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        {{method_field('DELETE')}}
                                    </form> --}}
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
