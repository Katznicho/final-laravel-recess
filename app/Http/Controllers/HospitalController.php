<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HospitalController extends Controller
{
    //
    public function index(){
        // $hospital_list = DB::table('hospitals')
        // ->join('health_officers', 'health_officers.HospitalId', )
        // ->get();
       $hospital_list =  DB::table('health_officers')
        ->join('hospitals', 'health_officers.HospitalId', '=',
         'hospitals.HospitalId')
        ->select('health_officers.HospitalCategory',
        'health_officers.HospitalId','hospitals.HospitalName',
        DB::raw('COUNT(health_officers.HospitalId) as total_officers')
        )
        ->groupBy(
         'health_officers.HospitalId',
         'hospitals.HospitalName',
          'health_officers.HospitalCategory')
       ->get();
       //dd($hospital_list);
        
        if($hospital_list){
            return view('hospitals' ,['hospitals'=>$hospital_list]);
        }
        else{
            $hospital_list = array();
            return view('hospitals' ,['hospitals'=>$hospital_list]);

        }
    
       

    
    }

}
