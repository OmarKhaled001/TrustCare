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
	{{trans('Dashboard/main_sidebar_trans.sections')}}
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">{{trans('Dashboard/main_sidebar_trans.sections')}}</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> /  {{trans('Dashboard/main_sidebar_trans.view_all')}} </span>
						</div>
					</div>

				</div>
				<!-- breadcrumb -->
@endsection

@section('content')
@include('Dashboard.messages_alert')
				<!-- row -->
				<div class="row row-sm">
					<div class="col-xl-12">
						<div class="card">
							<div class="card-header pb-0">
				
								<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add">
									{{trans('Dashboard/sections_trans.add_section')}}
								</button>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table class="table text-md-nowrap" id="example1">
										<thead>
											<tr>
												<th class=" align-middle text-center ">#</th>
												<th class=" align-middle text-center">{{trans('Dashboard/sections_trans.name_section')}}</th>
												<th class=" align-middle text-center">{{trans('Dashboard/sections_trans.description')}}</th>
												<th class=" align-middle text-center"> {{trans('Dashboard/sections_trans.created_at')}}</th>
												<th class=" align-middle text-center">{{trans('Dashboard/sections_trans.processes')}}</th>
											</tr>
										</thead>
										<tbody>
											@foreach ($sections as $section)
											<tr>
												<td class="align-middle text-center">{{$loop->iteration}}</td>
												<td class="align-middle text-center"><a href="{{route('Sections.show',$section->id)}}">{{ $section->name }}</a></td>
												<td class="align-middle text-center">{{\Str::limit($section->description, 50)  }}</td>
												<td class="align-middle text-center">{{ $section->created_at->diffForHumans() }}</td>
												<td class="align-middle text-center">
													<a class="modal-effect btn btn-sm btn-info m-1" data-effect="effect-scale"  data-toggle="modal" href="#edit{{$section->id}}"><i class="las la-pen"></i></a>
													<a class="modal-effect btn btn-sm btn-danger m-1" data-effect="effect-scale"  data-toggle="modal" href="#delete{{$section->id}}"><i class="las la-trash"></i></a>												
												</td>
											</tr>
											@include('Dashboard.Sections.edit')
											@include('Dashboard.Sections.delete')
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- row closed -->
				@include('Dashboard.Sections.add')

			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')

@endsection