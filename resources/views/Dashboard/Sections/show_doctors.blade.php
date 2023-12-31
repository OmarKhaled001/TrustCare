@extends('Dashboard.layouts.master')
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('Dashboard/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('Dashboard/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!-- Internal Data table css -->
<link href="{{URL::asset('Dashboard/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
<!--Internal   Notify -->
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection

@section('title')
    {{$section->name}} 
@stop

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{$section->name}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{trans('Dashboard/main_sidebar_trans.view_all')}}</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row opened -->
    <div class="row">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-md-nowrap" id="example1"">
                            <thead>
                                <tr class="align-middle">
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">{{trans('Dashboard/doctor_trans.name')}}</th>												
                                    <th class="align-middle text-center">{{trans('Dashboard/doctor_trans.email')}}</th>
                                    <th class="align-middle text-center">{{trans('Dashboard/doctor_trans.phone')}}</th>
                                    <th class="align-middle text-center">{{trans('Dashboard/doctor_trans.status')}}</th>
                                    <th class="align-middle text-center">{{trans('Dashboard/doctor_trans.appointments')}}</th>
                                    <th class="align-middle text-center">{{trans('Dashboard/doctor_trans.created_at')}}</th>
                                    <th class="align-middle text-center">{{trans('Dashboard/doctor_trans.processes')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($doctors as $doctor)
                            <tr>
                                <td class="align-middle text-center" >{{$loop->iteration}}</td>
                                <td class="align-middle text-center">{{ $doctor->name }}</td>
                                <td class="align-middle text-center">{{ $doctor->email }}</td>
                                <td class="align-middle text-center">{{ $doctor->phone }}</td>
                                <td class="align-middle text-center">
                                    {{$doctor->status == 1 ? trans('Dashboard/doctor_trans.enabled'):trans('Dashboard/doctor_trans.not_enabled')}} <span class="badge  bg-{{$doctor->status == 1 ? 'success':'danger'}} "> </span>
                                </td>
                                <td class="align-middle text-center">{{ $doctor->appointment->name  }}</td>
                                <td class="align-middle text-center">{{ $doctor->created_at->diffForHumans() }}</td>
                                <td class="align-middle text-center">
                                    <div class="dropdown">
                                        <button aria-expanded="false" aria-haspopup="true" class="btn ripple btn-primary btn-sm" data-toggle="dropdown" type="button"><i class="fa-solid fa-gears fa-l" style="color: #ffffff;"></i></i></button>
                                        <div class="dropdown-menu tx-12">
                                            <a class="dropdown-item" href="{{route('Doctors.edit',$doctor->id)}}"><i class="fa-solid fa-pen" style="color: #0416b9;"></i>&nbsp;&nbsp; {{trans('Dashboard/doctor_trans.update_data')}} </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_password{{$doctor->id}}"><i class="fa-solid fa-key " style="color: #008000;"></i>&nbsp;&nbsp;{{ trans('Dashboard/doctor_trans.update_password') }} </a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#update_status{{$doctor->id}}"><i class="fa-solid fa-bolt" style="color: #c49124;"></i>&nbsp;&nbsp;{{ trans('Dashboard/doctor_trans.status_change') }}</a>
                                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete{{$doctor->id}}"><i class="fa-solid fa-trash" style="color: #c40000;"></i>&nbsp;&nbsp;{{ trans('Dashboard/doctor_trans.delete_doctor') }}</a>
                                        </div>
                                    </div>												
                                </td>
                            </tr>
                            @include('Dashboard.Doctor.delete')
                            @include('Dashboard.Doctor.delete_select')
                            @include('Dashboard.Doctor.update_password')
                            @include('Dashboard.Doctor.update_status')
                            @endforeach
                            </tbody>
                        </table>
                    </div><!-- bd -->
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->
    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection