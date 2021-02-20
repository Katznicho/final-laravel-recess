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
        font-weight: 800;
        margin-bottom: 10px;
    }
</style>

<div class="content">
    <div class="container-fluid">
    <div class="tab">
      Officers in Regional Hospitals and Patients Treated
    </div>
      <div class="col-md-12">
        <div class="card">
          @if (count($regionalOfficers))
          <div class="card-body">
              <div class="">
                <table class="table">
                  <thead class=" text-primary">
                    <th>
                    OfficerName
                    </th>
                    <th>
                      OfficerUserName
                    </th>
                    <th>
                      PatientsTreated
                    </th>
                  </thead>
                  <tbody>
                      @foreach ($regionalOfficers as $donor)
                      <tr>
                          <td>
                            {{$donor->OfficerName}}
                          </td>
                          <td>
                            {{$donor->OfficerUserName}}
                          </td>
                          <td>
                              {{$donor->total_patients}}
                          </td>                              


                        </tr>
                          
                      @endforeach
                    
                  </tbody>
                </table>
                
              </div>
            </div>
              
          @endif
         
        </div>
      </div>
      

      

        <div class="row ">
            @if (count($newpromotions))
            <div class="make-responsive d-flex flex-column " id="remove_alert">
              @foreach ($newpromotions as $promoted)
              <div class="alert alert-success text-center align-center alert-dismissible fade show" role="alert">
                <strong>{{$promoted->OfficerUserName}}</strong>  has been added to waiting list and given a token of 
                shs{{number_format(10000000.0,2)}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endforeach
              @endif
            </div>
      <div class="row">
          @if ($totalPromotions)
              <div class="tab">
                  Total Officers Promoted are {{$totalPromotions}}
              </div>
          @else
          <div class="tab">
            No promoted officers Yet
        </div>
              
          @endif
                    
          <div class="col-md-12">
            <div class="card">
              @if (count($promotions))
              <div class="card-body">
                  <div class="">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                        OfficerUserName
                        </th>
                        <th>
                          Award
                        </th>
                        <th>
                          Pending
                        </th>
                      </thead>
                      <tbody>
                          @foreach ($promotions as $donor)
                          <tr>
                              <td>
                                {{$donor->OfficerUserName}}
                              </td>
                              <td>
                                {{$donor->Award}}
                              </td>
                              <td>
                                  Yes
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
        <script>

            $('.alert').alert()
          </script>
  
@endsection