@extends('layouts.app', 
['class' => 'login-page', 'contentClass' => 'login-page'])


@section('content')
<style>
img{
    object-fit:contain !important;
}
button.btn.btn-primary.btn-lg.btn-block.mb-3{
    background:#1c478e !important;
    color:#ffffff;
}
</style>
    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
    
        <form class="form" method="post" action="{{ route('login') }}">
            @csrf

            <div class="card card-login card-dark mb-5">
                <div class="card-header">
                    <img src="https://www.eu-cord.org/2015/wp-content/uploads/2020/04/covid-19.jpg
                    " alt="" class="mb-5">
                    <i>
                        <h1 class="card-title text-center "style="color:#fff !important;" >{{ __('Log in') }}</h1>
                    </i>

                </div>
                <div class="card-body">
 
                     <label for="email" style="text-align: center;" class="ml-5 font-weight-bold">
                        <h6>Email</h6>
                    </label>
                    <div class="mb-4{{ $errors->has('email') ? ' has-danger' : '' }}">
                        <input type="email" name="email" 
                        style="border-color: #fff !important"
                        class="form-control p-4{{ $errors->has('email') ? ' is-invalid' : '' }}" 
                        placeholder="{{ __('Email') }}">
                        @include('alerts.feedback', ['field' => 'email'])
                    </div>
                    <label for="email" style="text-align: center;" class="ml-5 font-weight-bold">
                        <h6>Password</h6>
                    </label>
                    <div class="{{ $errors->has('password') ? ' has-danger' : '' }}">
            
                        <input type="password" placeholder="{{ __('Password') }}" 
                        style="border-color: #fff !important"
                        name="password" 
                        class="form-control p-4{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'password'])
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" href=""
                     class="btn btn-primary btn-lg btn-block mb-3 font-bold">{{ __('Login') }}</button>
                    <div class="pull-left">
                        <h6>
                            <a href="{{ route('register') }}" 
                            class="link footer-link">{{ __('Create Account') }}</a>
                        </h6>
                    </div>
                    <div class="pull-right">
                        <h6>
                            <a href="{{ route('password.request') }}" 
                            class="link footer-link">{{ __('Forgot password?') }}</a>
                        </h6>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
