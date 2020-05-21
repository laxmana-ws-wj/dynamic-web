@extends('admin.layouts.master')

@section('title')
    Dashboard | Admin
@endsection

@section('content')
    <div class="page-wrapper">
        <div class="page-body">
            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card bg-c-yellow update-card">
                        <div class="card-block">
                            <div class="row align-items-end">
                                <div class="col-8">
                                    Welcome To Our Website
                                </div>
                                <div class="col-4 text-right">
                                    <canvas id="update-chart-1" height="50"></canvas>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
