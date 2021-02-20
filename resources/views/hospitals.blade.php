@extends('layouts.app')

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title text-center">Hospitals</h4>
            </div>
            @if ($hospitals)
            <div class="card-body">
                <div class="">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        HospitalName
                      </th>
                      <th>
                        HospitalCategory
                      </th>
                      <th>
                        TotalOfficers
                      </th>
                      
                    </thead>
                    <tbody>
                        @foreach ($hospitals as $officer)
                        <tr>
                            <td>
                              {{$officer->HospitalName}}
                            </td>
                            <td>
                              {{$officer->HospitalCategory}}
                            </td>
                            <td>
                              {{$officer->total_officers}}
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