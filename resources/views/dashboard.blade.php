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
    .tab-red{
        text-align: center;
        background:red;
        color:#fff;
        border-radius: 999px;
        width: 100%;
        padding: 8px;
        font-weight: 800;
    }
    .none{
      display: none;
    }
    .dashboard{
        background-image: url('https://www.sanitationandwaterforall.org/sites/default/files/2020-03/UNI309726.jpg');
        background-size:cover;
        background-repeat: no-repeat;
        height: 100vh;
        width: 100%;
        margin-top: 20px;
    }
    
</style>
    <div class="header ">
        <div class="container">
          <div class="row">
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats  mb-4 mb-xl-0">
                    <div class="card-body card-white">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase font-weight-bold m-2">TotalOfficers</h5>
                                <span  style="color: #fff !important"
                                class="font-weight-bold mb-0 ml-2 ">
                                    @if ($totalOfficers)
                                        {{$totalOfficers}}
                                    @else
                                        0
                                    @endif
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted font-weight-bold p-1text-sm">
                          <a href="{{route("officerlist")}}">SeeMore</a>

                        </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase font-weight-bold m-2">TotalPatients</h5>
                                <span  style="color: #fff !important"
                                class="font-weight-bold mb-0 ml-2 ">
                                    @if ($totalPatients)
                                        {{$totalPatients}}
                                    @else
                                        0
                                    @endif
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted font-weight-bold p-1text-sm">
                            <a href="{{route("patientlist")}}">SeeMore</a>
  
                          </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <div class="d-flex justify-content-evenly">
                                    <h5 class="card-title text-uppercase font-weight-bold m-2">TotalAmount</h5>
                                    <i class="tim-icons icon-money-coins"></i>
                                </div>

                                <span  style="color: #fff !important"
                                class="font-weight-bold mb-0 ml-2 ">
                                    @if ($totalAmount)
                                        shs{{$totalAmount}}
                                    @else
                                        0
                                    @endif
                                </span>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted font-weight-bold p-1text-sm">
                            <a href="{{route("treasury")}}">SeeMore</a>
  
                          </p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-6">
                <div class="card card-stats mb-4 mb-xl-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <h5 class="card-title text-uppercase m-2 font-weight-bold">TotalHospitals</h5>
                                <span  style="color: #fff !important"
                                class="font-weight-bold mb-0 ml-2 ">
                                    @if ($totalHospitals)
                                        {{$totalHospitals}}
                                    @else
                                        0
                                    @endif
                                </span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                    <i class="fas fa-home"></i>
                                </div>
                            </div>
                        </div>
                        <p class="mt-3 mb-0 text-muted font-weight-bold p-1text-sm">
                            <a href="{{route("hospitals")}}">SeeMore</a>
  
                          </p>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

          <div class="dashboard"></div>

                </div>
            </div>
        </div>
    </div>

@endsection
