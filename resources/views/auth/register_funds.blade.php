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
height: 80vh;
background:#ededed;
box-shadow: -1px 4px 20px -6px rgba(0,0,0,0.8);
margin-bottom: 50px;

}
button.btn.btn-primary.mb-3{
    background:#1c478e !important;
    color:#ffffff;
    width:95% !important;
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
</style>
@section('content')
<div class="container">
    <div class="centered">
        <h1 class="text-center color-light mt-4">RegisterFunds</h1>
             <div class="tab " id="none">
                 @if (session('status'))
                 {{
                     session('status')
                 }}
                     
                 @endif
        
             </div>
        <div class="shadow">
            <form class="form" method="post" action="{{ route('donations') }}">
                @csrf
    
                <div class="">
                    <label class="officer">DonorName</label>
                        <div class="form-group mr-5{{ $errors->has('donorName') ? ' has-danger' : '' }}">
                            
                            <input type="text" name="donorName" 
                            
                            class="form-control p-3 {{ $errors->has('donorName') ? ' is-invalid' : '' }}" 
                            placeholder="{{ __('donorName') }}">
                            @include('alerts.feedback', ['field' => 'donorName'])
                        </div>
                        <label class="officer">Amount</label>

                    <div class="form-group mt-2 mr-5{{ $errors->has('amount') ? ' has-danger' : '' }}">
                    
                        <input type="text" placeholder="forexample 1000000 without commas" name="amount" 
                        class="form-control p-3{{ $errors->has('amount') ? ' is-invalid' : '' }}">
                        @include('alerts.feedback', ['field' => 'amount'])
                    </div>
                </div>
                        <label class="officer">Month</label>

                        <div class="form-group mt-2 mr-5{{ $errors->has('month') ? ' has-danger' : '' }}">
                        
                            <input type="date" placeholder="{{ __('month') }}" name="month" 
                            class="form-control  p-3{{ $errors->has('month') ? ' is-invalid' : '' }}">
                            @include('alerts.feedback', ['field' => 'month'])
                        </div>
                        <button type="submit"
                         class="btn btn-primary  mt-2 ml-3 mr-5 mb-3 
                         font-bold">{{ __('RegisterMoney') }}</button>
                         
                    </div>
                    </div>
            </form>
            @include('layouts.footer')
        
    </div>
        </div>
        
    </div>
</div>
<script>
  const getId = document.querySelector('#remove');
  //document.querySelector('.shadow').classList.add('margin-top')
  getId?(
     setTimeout(()=>{
        getId.classList.toggle('remove-alert')
     }, 10000)
  ):null
  
</script>


<script>
    setTimeout(()=>{
        const id = document.getElementById("none");
        id.classList.toggle("none");

    },5000)
</script>
    
@endsection