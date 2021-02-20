@extends('layouts.app', ['class' => 'register-page', 'page' => __('Register Page'), 'contentClass' => 'register-page'])

@section('content')
<style>
 button.btn.btn-primary.btn-lg.btn-round{
    background:#1c478e !important;
    color:#ffffff;
}
h4.card-title.text-center{
    color:#fff!important;
    font-weight:900;
    font-style: italic;
}
</style>
    <div class="row">
        <div class="col-md-5 ml-auto bg-dark">
            <div class="info-area info-horizontal mt-5">
            

                <i>
                    <h1>Covid 19  MEASURES</h1>
                    </i> 
                <div class="description">
                    <h2 class="info-title ">{{ __('MEASURE 1') }}</h2>
                    <i>
                        <h4 class="description ml-3 text-light ">
                            Wear a mask Always
                          </h4>
                    </i>
                    
                </div>
            </div>
            <div class="info-area info-horizontal">
                <div class="description">
                    <h2 class="info-title">MEASURE 2</h2>
                    <i>
                        <h4 class="description ml-3">
                            Wash Hands Always
                        </h4>
                        </i>
                </div>
            </div>
            <div class="info-area info-horizontal">
            
                <div class="description">
                    <h2 class="info-title">Measure 3</h2>
                    <i> 
                       
                        <h4 class="description ml-3">

                            Keep a distance Always
                            </h4>
                    </i>
                    
                </div>
            </div>
        </div>
        <div class="col-md-7 mr-auto">
            <div class="card card-register card-dark">
                <div class="card-header">
                    <h4 class="card-title text-center mt-3">Register</h4>
                </div>
                <form class="form" method="post" action="{{ route('register') }}">
                    @csrf

                    <div class="card-body">
                        
                     <label for="name" style="text-align: center;" class="ml-5 font-weight-bold">
                        <h6>Name</h6>
                    </label>
                        <div class="mb-3{{ $errors->has('name') ? ' has-danger' : '' }}">
                           
                            <input type="text" style="border-color: #fff !important"
                             name="name" class="form-control p-3
                            {{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}">
                            @include('alerts.feedback', ['field' => 'name'])
                        </div>


                        <label for="name" style="text-align: center;" class="ml-5 font-weight-bold">
                            <h6>Email</h6>
                        </label>
                        <div class="mb-3{{ $errors->has('email') ? ' has-danger' : '' }}">
                            <input type="email" name="email" style="border-color: #fff !important"
                            class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}">
                            @include('alerts.feedback', ['field' => 'email'])
                        </div>
                        <label for="name" style="text-align: center;" class="ml-5 font-weight-bold">
                            <h6>Role</h6>
                        </label>
                        <div class=" mb-3{{ $errors->has('role') ? ' has-danger' : '' }}">
                            <select name="role" id="Role" 
                            style="border-color: #fff !important; background:#000 !important"
                            class="form-control">
                                <option value="Director">Director</option>
                                <option value="Admin">Administrator</option>
                            </select>
                            @include('alerts.feedback', ['field' => 'role'])
                        </div>
                        <label for="name" style="text-align: center;" class="ml-5 font-weight-bold">
                            <h6>Password</h6>
                        </label>
                        <div class=" mb-3{{ $errors->has('password') ? ' has-danger' : '' }}">
        
                            <input type="password" name="password" 
                            style="border-color: #fff !important"
                            class="form-control p-3{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}">
                            @include('alerts.feedback', ['field' => 'password'])
                        </div>

                        <label for="password_confirmation" style="text-align: center;" class="ml-5 font-weight-bold">
                            <h6>ConfirmPassword</h6>
                        </label>
                        <div class="mb-4">
                            <input type="password" name="password_confirmation" 
                             
                            class="form-control p-3"
                            style="border-color: #fff !important"
                             placeholder="{{ __('Confirm Password') }}">
                        <div class="form-check text-left">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox">
                                <span class="form-check-sign"></span>
                                {{ __('I agree to the') }}
                                <a href="#">{{ __('terms and conditions') }}</a>.
                            </label>
                        </div>
                    </div>
                    <div class="card-footer d-flex flex-column">
                        <button type="submit" class="btn btn-primary btn-round btn-lg">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
