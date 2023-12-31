@extends('Dashboard.layouts.master')
@section('title')
    {{trans('Dashboard/main_sidebar_trans.services')}}@stop
@section('css')
    <!--Internal   Notify -->
    <link href="{{URL::asset('Dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main_sidebar_trans.services')}}</h4><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/main_sidebar_trans.single_service')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    @include('Dashboard.messages_alert')
    <!-- row -->
    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
                            {{trans('Dashboard/services.add_service')}}
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap align-middle text-center" id="example1">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('Dashboard/services.name')}}</th>
                                <th>{{trans('Dashboard/services.price')}}</th>
                                <th>{{trans('Dashboard/doctor_trans.status')}}</th>
                                <th>{{trans('Dashboard/services.description')}}</th>
                                <th>{{trans('Dashboard/sections_trans.created_at')}}</th>
                                <th>{{trans('Dashboard/sections_trans.processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($services as $service)
                                <tr>
                                    <td >{{$loop->iteration}}</td>
                                    <td >{{$service->name}}</td>
                                    <td >{{$service->price}}</td>
                                    <td >
                                        {{$service->status == 1 ? trans('Dashboard/doctor_trans.enabled'):trans('Dashboard/doctor_trans.not_enabled')}} <span class="badge  bg-{{$service->status == 1 ? 'success':'danger'}} "> </span>
                                    </td>
                                    <td> {{ Str::limit($service->description, 50) }}</td>
                                    <td>{{ $service->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a class="modal-effect btn btn-sm btn-info" data-effect="effect-scale" data-toggle="modal" href="#edit{{$service->id}}"><i class="las la-pen"></i></a>
                                        <a class="modal-effect btn btn-sm btn-danger" data-effect="effect-scale" data-toggle="modal" href="#delete{{$service->id}}"><i class="las la-trash"></i></a>
                                    </td>
                                </tr>

                                @include('Dashboard.Services.Single Service.edit')
                                @include('Dashboard.Services.Single Service.delete')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    @include('Dashboard.Services.Single Service.add')
    <!-- /row -->

    </div>
    <!-- row closed -->

    <!-- Container closed -->

    <!-- main-content closed -->
@endsection
@section('js')
    <script src="{{URL::asset('Dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>
@endsection
