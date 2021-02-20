<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficerListController extends Controller
{
    //
public function index(){
    $officer_list = DB::table('health_officers')
    ->join('hospitals', 'health_officers.HospitalId', '=',
     'hospitals.HospitalId')
    ->select('health_officers.HospitalCategory',
    'hospitals.HospitalName', 'health_officers.OfficerName', 
    'health_officers.OfficerUserName'
    )
   ->get();

   
return view('officer_list' ,['officerlist'=>$officer_list]);

}
	
}
