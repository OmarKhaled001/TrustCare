@csrf
<div class="form-group">
    <label>{{ trans('Dashboard/login_trans.email') }} </label>
    <input  class="form-control" placeholder="{{ trans('Dashboard/login_trans.placeholder_email') }} " type="email" name="email" :value="old('email')" required autofocus>
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>
<div class="form-group">
    <label>{{ trans('Dashboard/login_trans.password') }} </label> 
    <input class="form-control" placeholder="{{ trans('Dashboard/login_trans.placeholder_password') }} "   type="password"name="password" required autocomplete="current-password" >
    <x-input-error :messages="$errors->get('password')" class="mt-2" />
</div>
<button type="submit" class="btn btn-main-primary btn-block">{{ trans('Dashboard/login_trans.sign_in') }} </button>
{{-- <div class="row row-xs">
    <div class="col-sm-6">
        <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
    </div>
    <div class="col-sm-6 mg-t-10 mg-sm-t-0">
        <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
    </div>
</div> --}}