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
        margin-bottom: 10px;
        font-weight: 800;
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
          <div class="col-md-12">
            <div class="card">
              
              <div class="card-header card-header-primary">
                <h4 class="card-title text-center">TotalAmountMonthly  greater
                  than shs{{number_format(50000000,2)}}
                </h4>
              </div>
              @if (count($Amount))
              <div class="card-body">
                  <div class="">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Month
                        </th>
                        <th>
                          TotalAmount
                        </th>
                        <th>
                          PayableAmount
                        </th>
                        <td>
                          Payments
                        </td>
                        <td>
                          ViewPayments
                        </td>
                       
                      </thead>
                      <tbody>
                          @foreach ($Amount as $donor)
                          <tr>
                              <td>
                                {{$donor->Month}}
                              </td>
                              <td>
                                shs{{$donor->Amount}}
                              </td>
                              <td>


                                 @if ((int)$donor->Amount < ((int)100000000))
                                     0
                                 @else
                                    {{(int)$donor->Amount - (int)100000000}}
                                     
                                 @endif
                              </td>
                              <td>
                                @if (((int)$donor->Amount < ((int)100000000)) && !$donor->MonthPaid &&(int)$donor->Amount -(int)100000000 == 0) )
                                <button type="button" 
                                class="btn btn-primary" disabled>NoPayments</button>
                                
        
                                    
                                @else
                                @if ($donor->MonthPaid )
                                <button type="button" 
                                class="btn btn-warning" disabled>PaidAlready</button>

                                    
                                @else
                                <a type="button" href="{{route('money', ['month'=>$donor->Month, 'amount'=>(int)$donor->Amount - ((int)100000000)

                                  ])}}"
                                   
                                 class="btn btn-success">MakePayment</a>
                                    
                                @endif


                                    
                                @endif


                              </td>
                              <td>
                                @if ($donor->MonthPaid)
                                    <button class="btn btn-primary">ViewPayments</button>
                                @endif
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