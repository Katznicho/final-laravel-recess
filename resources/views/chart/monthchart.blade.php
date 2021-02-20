
@extends('layouts.app')

@section('content')
<style>
        .footer{
        margin-top: 4rem;
        padding: 10px;
        text-align: center;
    }
    .tab{
        text-align: center;
        background:#000;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    
    .footer>a{
        text-decoration:none;

        cursor: pointer;
        font-weight: bold;
    }
    
</style>
<div class="layout">
      <!-- Chart's container -->
      <div class="">
        <div class="col-md-12 mt-3 mb-3">
          <p class="tab">GraphsDisplay</p>
      </div>


      <form method="POST" action="{{ route('donation') }}" class="m-2">
        @csrf
    
        <div class="form-group  ">
          <div class="form-group">
            <label for="role" style="font-weight: bold; text-align:center; margin-left:20px"
            class="text-center">{{ __('SelectMonth') }}</label>
            <div class="col-md-12">
                <select name="month" id="" class="form-control" 
                style="background: #000 !important; color:#fff !important">
                  @if (count($all_months))
                  @foreach ($all_months as $month)
                  <option 
                  style="color:#fff !important"
                  value={{ $month->Month }}>{{ $month->Month }}</option>
              @endforeach
                  @endif
                  
    
                </select>
                
                @error('month')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
    
            </div>
        </div>
        <div class="form-group ml-6 mt-2 d-flex flex-column">
                <button type="submit" class="btn btn-success">
                    {{ __('DisplayMonth') }}
                </button>
            
        </div>
    </form> 
        



        <div class="">
          <div class="col-md-12 mt-3 mb-3">
            <p class="tab">A Graph of Donations in
               @if($selected)
                 {{$selected->Month}}
               @endif
              </p> 
             

             
        </div>
        <div id="months" style="height: 400px; background:#fff"></div>
          
      </div>  
      @include('layouts.footer')
</div>
<!-- Charting library -->
<script  src="https://unpkg.com/chart.js@2.9.3/dist/Chart.min.js"></script>
<!-- Chartisan -->
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

 <script>
        

   const chart2 = new Chartisan({
     el: '#months',
     url: "@chart('months_chart')",
     hooks:new ChartisanHooks()
            .beginAtZero()
            .responsive()
           .colors()
           .legend({position:"top"})
           .datasets([{type:"bar", 
           label:"Date(MM-DAY-YEAR)",
           borderColor:"red",
           backgroundColor:" #7b9fe0",
           hoverBackgroundColor:" #f27c8d",
           barPercentage: 0.6,
           minBarLength: 2,
           axis:true
           }])
           
   });
 </script>

 <script>
   
 </script>
    
@endsection





