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
      <div class="row">
        <div class="tab">Officers in General Hospitals adn Patients Treated</div>
        @if (count($generalOfficers))
        <div class="col-md-12">
          <div class="card">
            <div class="card-body mt-4">
                <div class="mt-3">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                      OfficerName
                      </th>
                      <th>
                        OfficerUserName
                      </th>
                      <th>
                        NumberOfPatients
                      </th>
                    </thead>
                    <tbody>
                        @foreach ($generalOfficers as $donor)
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
        
            
        @else
            
        @endif


      </div>

        <div class="row ">
            @if (count($newpromotions))
            <div class="make-responsive d-flex flex-column " id="remove_alert">
              @foreach ($newpromotions as $promoted)
              <div class="alert alert-success text-center align-center alert-dismissible fade show" role="alert">
                <strong>{{$promoted->OfficerUserName}}</strong>  has been promoted to regional hospital
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @endforeach
              @endif
            </div>
      <div class="row">
          @if ($totalPromotions)
              <div class="tab mb-2">
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
              <div class="card-body mt-4">
                  <div class="mt-3">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                        OfficerName
                        </th>
                        <th>
                          OfficerUserName
                        </th>
                        <th>
                          HospitalName
                        </th>
                        <th>
                          HospitalCategory
                        </th>
                      </thead>
                      <tbody>
                          @foreach ($promotions as $donor)
                          <tr>
                              <td>
                                {{$donor->OfficerName}}
                              </td>
                              <td>
                                {{$donor->OfficerUserName}}
                              </td>
                              <td>
                                {{$donor->HospitalName}}
                              </td>
                              <td>
                                  {{$donor->HospitalCategory}}
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