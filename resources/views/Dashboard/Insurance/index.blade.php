@extends('Dashboard.layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
{{trans('Dashboard/main_sidebar_trans.insurance')}}
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main_sidebar_trans.services')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/main_sidebar_trans.insurance')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.messages_alert')

    <!-- row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('Insurance.create')}}" class="btn btn-primary">{{trans('Dashboard/insurance_trans.add_insurance')}}</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap text-center" id="example1">
                            <thead>
                            <tr class="table-secondary">
                                <th>#</th>
                                <th >{{trans('Dashboard/insurance_trans.company_code')}}</th>
                                <th >{{trans('Dashboard/insurance_trans.company_name')}}</th>
                                <th >{{trans('Dashboard/insurance_trans.discount_percentage')}}</th>
                                <th >{{trans('Dashboard/insurance_trans.insurance_bearing_percentage')}}</th>
                                <th >{{trans('Dashboard/insurance_trans.status')}}</th>
                                <th >{{trans('Dashboard/insurance_trans.notes')}}</th>
                                <th >{{trans('Dashboard/insurance_trans.processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($insurances as $insurance)
                                <tr>
                                    <td>{{$loop->iteration }}</td>
                                    <td>{{$insurance->insurance_code}}</td>
                                    <td>{{$insurance->name}}</td>
                                    <td>{{$insurance->discount_percentage}}</td>
                                    <td>{{$insurance->company_rate}}</td>
                                    <td>
                                        {{$insurance->status == 1 ? trans('Dashboard/doctor_trans.enabled'):trans('Dashboard/doctor_trans.not_enabled')}} <span class="badge  bg-{{$insurance->status == 1 ? 'success':'danger'}} "> </span>

                                    </td>
                                    <td>{{$insurance->notes}}</td>
                                    <td>
                                        <a href="{{route('Insurance.edit',$insurance->id)}}" class="modal-effect btn btn-sm btn-info m-1"><i class="fas fa-edit"></i></a>
                                        <button class="modal-effect btn btn-sm btn-danger m-1" data-toggle="modal" data-target="#Deleted{{$insurance->id}}"><i class="fas fa-trash"></i>
                                        </button>

                                    </td>
                                 @include('Dashboard.Insurance.Deleted')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')

    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

@endsection
