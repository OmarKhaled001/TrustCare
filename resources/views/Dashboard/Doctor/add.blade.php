@extends('Dashboard.layouts.master')
@section('css')
<!--- Internal Select2 css-->
<link href="{{URL::asset('Dashboadr/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
    <!--Internal   Notify -->
    <link href="{{URL::asset('dashboard/plugins/notify/css/notifIt.css')}}" rel="stylesheet"/>
@endsection
@section('title')
    {{trans('Dashboard/doctor_trans.add_doctor')}}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main_sidebar_trans.doctors')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /  {{trans('Dashboard/doctor_trans.add_doctor')}} </span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

@include('Dashboard.messages_alert')

			
					<div class="col-lg-12 col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12">
										<div class="bg-gray-200 p-4">
											<form action="{{ route('Doctors.store') }}" method="post" autocomplete="off" enctype="multipart/form-data">
												{{ csrf_field() }}
												<div class="main-profile-overview">
													<div class="main-img-user profile-user">
															<img src="{{Url::asset('Dashboard/img/doctor_default.png')}}"  alt="" id="output">
														<label class="fas fa-camera profile-edit" for="image" ></label>
														<input type="file" accept="image/*" name="photo" id="image" style="display: none;" onchange="loadFile(event)">
													</div>
												</div>
												<div class="form-group  ">
													<label for="name"> {{trans('Dashboard/doctor_trans.name')}}</label>
													<input class="form-control" placeholder="{{trans('Dashboard/doctor_trans.place_name')}}" type="text" name="name">
												</div>
												<div class="form-group  ">
													<label for="email"> {{trans('Dashboard/doctor_trans.email')}}</label>
													<input class="form-control" placeholder="{{trans('Dashboard/doctor_trans.place_email')}}" type="text" name="email">
												</div>
												<div class="form-group  ">
													<label for="password"> {{trans('Dashboard/doctor_trans.password')}}</label>
													<input class="form-control" placeholder="{{trans('Dashboard/doctor_trans.place_password')}}" type="password" name="password">
												</div>
												<div class="form-group  ">
													<label for="phone"> {{trans('Dashboard/doctor_trans.phone')}}</label>
													<input class="form-control" placeholder="{{trans('Dashboard/doctor_trans.place_phone')}}" type="text" name="phone" >
												</div>
												<div class="form-group  ">
													<label for="section"> {{trans('Dashboard/doctor_trans.section')}}</label>
													<select name="section_id" class="form-control SlectBox" >
														<option value="" selected disabled>{{trans('Dashboard/doctor_trans.place_section')}}</option>
														@foreach($sections as $section)
														<option value="{{$section->id}}">{{$section->name}}</option>
														@endforeach
													</select>
												</div>
												<div class="form-group  ">
													<label for="section"> {{trans('Dashboard/doctor_trans.appointments')}}</label>
													<select name="appointment_id" class="form-control testselect2" >
														<option value="" selected disabled>{{trans('Dashboard/doctor_trans.place_appointments')}} </option>
														@foreach($appointments as $appointment)
														<option value="{{$appointment->id}}">{{$appointment->name}}</option>
														@endforeach													
													</select>
												</div>

												<button type="submit" class=" btn btn-primary d-block">{{trans('Dashboard/sections_trans.add')}}</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /row -->

@endsection
@section('js')
<script>
	var loadFile = function(event) {
		var output = document.getElementById('output');
		output.src = URL.createObjectURL(event.target.files[0]);
		output.onload = function() {
			URL.revokeObjectURL(output.src) // free memory
		}
	};
</script>
<!--Internal  Select2 js -->
<script src="{{URL::asset('Dashboadr/plugins/select2/js/select2.min.js')}}"></script>
<!-- Form-layouts js -->
<script src="{{URL::asset('Dashboadr/js/form-layouts.js')}}"></script>
<!--Internal  Notify js -->
<script src="{{URL::asset('dashboard/plugins/notify/js/notifIt.js')}}"></script>
@endsection