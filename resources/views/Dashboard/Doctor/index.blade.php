@extends('Dashboard.layouts.master')
@section('css')
<!--Internal   Notify -->
<link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
{{trans('Dashboard/main_sidebar_trans.doctors')}}
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
				<div class="my-auto">
					<div class="d-flex">
						<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main_sidebar_trans.doctors')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /  {{trans('Dashboard/main_sidebar_trans.view_all')}} </span>
					</div>
				</div>

			</div>
			<!-- breadcrumb -->
@endsection
@section('content')
@include('Dashboard.messages_alert')
		<!-- row -->
		<div class="row row-sm">
			<!--div-->
			<div class="col-xl-12">
                <div class="card mg-b-20">
					<div class="card-header pb-0">
						<a href="{{route('Doctors.create')}}" class="btn btn-primary" role="button" aria-pressed="true">{{trans('Dashboard/doctor_trans.add_doctor')}}</a>
						<a  id="btn_delete_all" class="modal-effect btn btn-danger" data-effect="effect-scale"  data-toggle="modal">{{trans('Dashboard/doctor_trans.delete_select')}}</a>
					</div>
                <div class="card-body" >
                    <div class="table-responsive" >
                        <table class="table text-md-nowrap p-5"  id="example">
										<thead class="mt-5">      
											<tr class="align-middle">
												<th class="align-middle text-center">#</th>
												<th><input name="select_all"  id="example-select-all"  type="checkbox"/></th>
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.doctor_photo')}}</th>												
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.name')}}</th>												
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.email')}}</th>
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.section')}}</th>
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.phone')}}</th>
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.status')}}</th>
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.appointments')}}</th>
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.created_at')}}</th>
												<th class="align-middle text-center">{{trans('Dashboard/doctor_trans.processes')}}</th>
											</tr>
										</thead>
										<tbody>
											@foreach($Doctors as $doctor)
											<tr>
												<td class="align-middle text-center" >{{$loop->iteration}}</td>
												<td class="align-middle text-center" > <input type="checkbox" name="delete_select" value="{{$doctor->id}}" class="delete_select"></td>
												<td class="align-middle text-center">
													@if($doctor->image)
														<img src="{{asset('Dashboard/img/doctors/'.$doctor->image->filename)}}" height="50px" width="50px" alt="">
													@else
														<img src="{{asset('Dashboard/img/doctor_default.png')}}" height="50px" width="50px" alt="">
													@endif
												</td>
												<td class="align-middle text-center">{{ $doctor->name }}</td>
												<td class="align-middle text-center">{{ $doctor->email }}</td>
												<td class="align-middle text-center">{{ $doctor->section->name}}</td>
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
									</tbody>
								</table>
							</div>
						</div>
					</div>
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
    <!--Internal  Notify js -->
    <script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
    <script src="{{URL::asset('/plugins/notify/js/notifit-custom.js')}}"></script>

    <script>
        $(function() {
            jQuery("[name=select_all]").click(function(source) {
                checkboxes = jQuery("[name=delete_select]");
                for(var i in checkboxes){
                    checkboxes[i].checked = source.target.checked;
                }
            });
        })
    </script>


    <script type="text/javascript">
        $(function () {
            $("#btn_delete_all").click(function () {
                var selected = [];
                $("#example input[name=delete_select]:checked").each(function () {
                    selected.push(this.value);
                });	
				
                if (selected.length > 0) {
					
					$('#btn_delete_all').hid();
                    $('#delete_select').modal('show');
                    $('input[id="delete_select_id"]').val(selected);
                }
            });
        });
    </script>



@endsection