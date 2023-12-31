@extends('Dashboard.layouts.master2')
@section('css')
<style>
.loginform{display: none;};
</style>
@section('title')
    {{trans('Dashboard/login_trans.sign_in')}}
@endsection
<!-- Sidemenu-respoansive-tabs css -->
<link href="{{URL::asset('Dashboard/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid position-relative">
	<div class="row no-gutter">
		<!-- The image half -->
		<div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
			<div class="row wd-100p mx-auto text-center">
				<div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
					<img src="{{URL::asset('Dashboard/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
				</div>
			</div>
		</div>
		<!-- The content half -->
		<div class="col-md-6 col-lg-6 col-xl-5 bg-white ">
					<div class="row p-2">
						<ul id="lang" class="nav position-fixed ">
							<li class="">
								<div class="dropdown  nav-itemd-none d-md-flex">
									<a href="#" class="d-flex  nav-item nav-link pl-0 country-flag1" data-toggle="dropdown"
									   aria-expanded="false">
										@if (App::getLocale() == 'ar')
											<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
													src="{{URL::asset('Dashboard/img/flags/egypt_flag.jpg')}}" alt="img"></span>
											<strong
												class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
										@else
											<span class="avatar country-Flag mr-0 align-self-center bg-transparent"><img
													src="{{URL::asset('Dashboard/img/flags/us_flag.jpg')}}" alt="img"></span>
											<strong
												class="mr-2 ml-2 my-auto">{{ LaravelLocalization::getCurrentLocaleName() }}</strong>
										@endif
										<div class="my-auto">
										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-left dropdown-menu-arrow" x-placement="bottom-end">
										@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
											<a class="dropdown-item" rel="alternate" hreflang="{{ $localeCode }}"
											   href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
												@if($properties['native'] == "English")
													<i class="flag-icon flag-icon-us"></i>
												@elseif($properties['native'] == "العربية")
													<i class="flag-icon flag-icon-eg"></i>
												@endif
												{{ $properties['native'] }}
											</a>
										@endforeach
									</div>
								</div>
							</li>
						</ul>
					</div>
					<div class="login d-flex align-items-center py-2">
						<!-- Demo content-->
						<div class="container p-0">
							<div class="row">
								<div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
									<div class="card-sigin">
										<div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{URL::asset('Dashboard/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28 mx-1"> </h1>
										
										</div>
										<div class="card-sigin">
											<div class="main-signup-header">
												<h2 class="my-2 fw-bold">{{ trans('Dashboard/login_trans.Welcome') }}</h2>
												<label>{{ trans('Dashboard/login_trans.Select_Enter') }}</label>
												<select class="form-select"  id="sectionChooser">
													<option value="" selected disabled>{{ trans('Dashboard/login_trans.Choose_list') }}</option>
													<option value="admin">{{ trans('Dashboard/login_trans.admin') }}</option>
													<option value="user">{{ trans('Dashboard/login_trans.user') }}</option>
												</select>
												@if ($errors->any())
												<div class="alert alert-danger my-3" role="alert">{{$errors->first()}}</div>
												@elseif (Session::has('message'))
												<div class="alert alert-success my-3 " role="alert">{{ Session::get('message')}}</div>
												@endif
												{{--form user--}}
												<div class="loginform" id="user">
													<h3 class="my-3 fw-bold">{{ trans('Dashboard/login_trans.user') }} </h3>
													<form method="POST" action="{{ route('login.user') }}">
														@include('Dashboard.User.auth.form')
													</form>
													{{-- <div class="main-signin-footer mt-5">
														<p><a href="">Forgot password?</a></p>
														<p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
													</div> --}}
												</div>
												{{--form admin--}}
												<div class="loginform" id="admin">
													<h3 class="my-3 fw-bold"> {{ trans('Dashboard/login_trans.admin') }}</h3>
													<form method="POST" action="{{ route('login.admin') }}">
														@include('Dashboard.User.auth.form')
													</form>
													{{-- <div class="main-signin-footer mt-5">
														<p><a href="">Forgot password?</a></p>
														<p>Don't have an account? <a href="{{ url('/' . $page='signup') }}">Create an Account</a></p>
													</div> --}}
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div><!-- End -->
					</div>
				</div><!-- End -->
			</div>
		</div>
@endsection
@section('js')
<script>
	$('#sectionChooser').change(function(){
		var myID = $(this).val();
		$('.loginform').each(function(){
			myID === $(this).attr('id') ? $(this).show() : $(this).hide();
		});
	});
</script>
@endsection