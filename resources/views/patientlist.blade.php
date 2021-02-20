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
    
</style>
    <div class="header ">
        <div class="container">
            <div class="header-body text-center ">
                <div class="row ">
                    <div class="col-md-12">
                       <div class="tab md-12 mb-3">
                         @if ($total)
                             TotalPatients<h4 class="color">{{$total}}</h4>
                         @endif
                       </div>
                       <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title text-center">Patients in General Hospitals</h4>
                        </div>
                        @if (count($patients_general))
                        <div class="card-body">
                            <div class="m-2">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    Patient Name
                                  </th>
                                  <th>Officer Name</th>
                                  <th>
                                    Officer User Name
                                  </th>
                                  <th>
                                    Hospital Name
                                  </th>
                                  <th>Date</th>
                                </thead>
                                <tbody>
                                    @foreach ($patients_general as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->PatientName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerUserName}}
                                        </td>
                                        <td>
                                          {{$officer->HospitalName}}
                                        </td>
                                        <td>
                                          {{$officer->DOI}}
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
                          <h4 class="card-title text-center">Patients in Regional Hospitals</h4>
                        </div>
                        @if ($patients_regional)
                        <div class="card-body">
                            <div class="m-2">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    Patient Name
                                  </th>
                                  <th>
                                    Officer Name
                                  </th>
                                  <th>
                                    Officer User Name
                                  </th>
                                  <th>
                                    Hospital Name
                                  </th>
                                  <th>Date</th>
                                </thead>
                                <tbody>
                                    @foreach ($patients_regional as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->PatientName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>

                                        <td>
                                          {{$officer->OfficerUserName}}
                                        </td>
                                        <td>
                                          {{$officer->HospitalName}}
                                        </td>
                                        <td>
                                          {{$officer->DOI}}
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
                          <h4 class="card-title text-center">Patients in National Hospitals</h4>
                        </div>
                        @if (count($patients_general))
                        <div class="card-body">
                            <div class="m-2">
                              <table class="table">
                                <thead class=" text-primary">
                                  <th>
                                    Patietn Name
                                  </th>
                                  <th>Officer Name</th>
                                  <th>
                                    Officer User Name
                                  </th>
                                  <th>
                                    Hospital Name
                                  </th>
                                  <th>Date</th>
                                </thead>
                                <tbody>
                                    @foreach ($patients_national as $officer)
                                    <tr>
                                        <td>
                                          {{$officer->PatientName}}
                                        </td>
                                        <td>
                                          {{$officer->OfficerName}}
                                        </td>
                                          <td>
                                          {{$officer->OfficerUserName}}
                                        </td>
                                        <td>
                                          {{$officer->HospitalName}}
                                        </td>
                                        <td>
                                          {{$officer->DOI}}
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

                    </div>
                </div>

            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
