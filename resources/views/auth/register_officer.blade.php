@extends('layouts.app')

<style>
    .centered{
        display: grid;
        place-items: center;
        height: 100vh;
        width:100%;
        background-color:#000;
        box-shadow: -1px 4px 20px -9px rgba(0,0,0,0.8);
    }
    .shadow{
width:90%;
height: 60vh;
background:#ededed;
box-shadow: -1px 4px 20px -6px rgba(0,0,0,0.8);
margin-bottom: 50px;

}
button.btn.btn-primary.btn-lg.btn-block.mb-3{
    background:#1c478e !important;
    color:#ffffff;
}
input.form-control{
    /* border:3px solid #000; */
    margin-left: 20px;
    margin-right: 20px;
    color:#000 !important;


}
.officer{
    margin-top: 10px !important;
    font-weight: 900;
    text-align: center;
    margin-left: 20px !important;
}
.tab{
   color:#ffffff;
   font-weight: bold;
   padding: 15px;
   border-radius: 999px;
}
.none{
    display: none;
}
.officer{
    text-align: center !important;
}
label{
    text-align: center !important;
}
</style>
@section('content')
<div class="container">
    <div class="centered">
        <h1 class="text-center color-light mt-5">RegisterOfficer</h1>
             <div class="tab " id="none">
                 @if (session('status'))
                 {{
                     session('status')
                 }}
                     
                 @endif
        
             </div>
        <div class="shadow">
           
            <form class="form" method="post" action="{{ route('registerofficer') }}">
                @csrf
    
                <div class="">
                    <label class="officer text-center ml-5">Name</label>
                        <div class="form-group mr-5{{ $errors->has('officerName') ? ' has-danger' : '' }}">
                            
                            <input type="text" name="officerName" 
                            
                            class="form-control p-3 {{ $errors->has('officerName') ? ' is-invalid' : '' }}" 
                            placeholder="{{ __('officerName') }}">
                            @include('alerts.feedback', ['field' => 'officerName'])
                        </div>
                        <label class="officer text-center ml-5">UserName</label>

                        <div class="form-group mt-2 mr-5{{ $errors->has('officerUserName') ? ' has-danger' : '' }}">
                        
                            <input type="officerUserName" placeholder="{{ __('officerUserName') }}" name="officerUserName" 
                            class="form-control p-3{{ $errors->has('officerUserName') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'officerUserName'])
                        </div>
                    </div>
                    <div class="mt-3  p-3">
                        <button type="submit" href=""
                         class="btn btn-primary btn-lg btn-block mb-3 
                         font-bold">{{ __('RegisterOfficer') }}</button>
                         
                    </div>
                </div>
            </form>
            @include('layouts.footer')
        
    </div>
        </div>
        
    </div>
</div>
<script>
    setTimeout(()=>{
        const id = document.getElementById("none");
        id.classList.toggle("none");

    },5000)
</script>
    
@endsection