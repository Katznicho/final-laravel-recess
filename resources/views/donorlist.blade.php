@extends('layouts.app')

@section('content')
<style>
  .tab{
        text-align: center;
        background:#000;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 900;
        margin-bottom: 10px
    }
</style>

<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          @if ($sum)
               <div class="container">
                   <div class="tab">
                     TotalAmount  :  shs 
                     {{ '   '. $sum }}
                   </div>
               </div>
                  
              @endif
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-center">DonorList</h4>
            </div>
            @if ($donorlist)
            <div class="card-body">
                <div class="m-2">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        DonorName
                      </th>
                      <th>
                        Amount
                      </th>
                      <th>
                        Month
                      </th>
                    </thead>
                    <tbody>
                        @foreach ($donorlist as $donor)
                        <tr>
                            <td>
                              {{$donor->DonorName}}
                            </td>
                            <td>
                              {{$donor->Amount}}
                            </td>
                            <td>
                              {{$donor->Month}}
                            </td>
                            
                           
                          </tr>
                            
                        @endforeach
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
                
            @endif
           
          </div>



          @include('layouts.footer')
        </div>
  
@endsection