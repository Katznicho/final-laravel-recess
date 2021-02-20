@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        {{-- <div class="col-md-12">
          <form action=""></form>
        </div> --}}
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-center">Officers</h4>
            </div>
            @if ($officerlist)
            <div class="card-body">
                <div class="">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Officer Name
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
                        @foreach ($officerlist as $officer)
                        <tr>
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
                              {{$officer->HospitalCategory}}
                            </td>
                            
                           
                          </tr>
                            
                        @endforeach
                      
                    </tbody>
                  </table>
                  
                </div>
              </div>
                
            @endif
            @include('layouts.footer')
           
          </div>
        </div>
  
@endsection