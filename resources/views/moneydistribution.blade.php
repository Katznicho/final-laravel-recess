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
    }
    .tab-remain{
        text-align: center;
        background:#1c478e;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 10px;
        font-weight: 900;
    }
    
</style>
    <div class="header ">
        <div class="container">
            <div class="header-body text-center ">
              <div class="tab-remain md-12 mb-3">
                @if ($treasury_amount ?? '')
                  Amount remaining :  shs<h4>{{$treasury_amount}}<h4>
                    after {{$default?? ''}} payments
                @endif
            
          </div>
                <div class="">
                        
                                            
                    <div class="col-md-12">
                       <div class="tab md-12 mb-3">
    
                             MonthlySalary 
                             @if ($default ?? '')
                                 <b>{{$default ?? ''}}</b> according to shs {{$payamount}}
                             @endif
                         
                       </div>

                       
                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">GeneralOfficers</h4>
                        </div>
                        @if (count($officers_general))
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                    Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_general as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerRole}}
                                        </td>
                                        <td>
                                            <small
                                          style="font-weight: bold"
                                          >shs</small>
                                          {{$officer->MonthlySalary}}
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
              
                      


                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">StaffOfficers</h4>
                        </div>
                        @if (count($staff))
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    StaffName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                  Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($staff as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->name}}
                                        </td>
                                        <td>
                                          {{$officer->role}}
                                        </td>
                                        <td>
                                            <small
                                          style="font-weight: bold"
                                          >shs</small>
                                          {{$officer->monthlysalary}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                            
                        @endif

                       
                      </div>
                          
                       
                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">RegionalOfficers</h4>
                        </div>
                        @if ($officers_regional)
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                    Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_regional as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerRole}}
                                        </td>
                                        <td>
                                          <small
                                          style="font-weight: bold"
                                          >shs</small>{{$officer->MonthlySalary}}
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
              
                       
                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">NationalOfficers</h4>
                        </div>
                        @if (count($officers_general))
                        <div class="card-body">
                            <div class="table-responsive">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    OfficerName
                                  </th>
                                  <th>
                                    OfficerRole
                                  </th>
                                  <th>
                                  Amount
                                  </th>
                                </thead>
                                <tbody>
                                    @foreach ($officers_national as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerRole}}
                                        </td>
                                        <td>
                                            <small
                                          style="font-weight: bold"
                                          >shs</small>
                                          {{$officer->MonthlySalary}}
                                        </td>
                                        
                                       
                                      </tr>
                                        
                                    @endforeach
                                  
                                </tbody>
                              </table>
                              
                            </div>
                          </div>
                            
                        @endif

                       
                      </div>
                      @include('layouts.footer');

                    </div>
              
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

