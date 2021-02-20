<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    //get pations 
    protected function patient_by_hospitals($category){
        return DB::table('health_officers')
        ->join('patients_list', 'health_officers.OfficerUserName', '=',
         'patients_list.OfficerUserName')
         ->join('hospitals', 'hospitals.HospitalId', '=', 
         'health_officers.HospitalId')
        ->select('health_officers.OfficerName','hospitals.HospitalName',
        'patients_list.*','health_officers.OfficerUserName'
        )->where('health_officers.HospitalCategory' , '=', $category)
       ->get();


    }
    //getTotalPatients
    protected function total_patients(){
        return DB::table('patients_list')->count();
    }


    public function index(){
        //check patient exists
        //print_r($this->patient_general_hospital()->count());
        if(DB::table('patients_list')->count()){
            //for general hospitals
            $patients_general = $this->patient_by_hospitals('general');
            $patient_regional = $this->patient_by_hospitals('regional');
            $patient_national = $this->patient_by_hospitals('national');
            $total = $this->total_patients();

            return view("patientlist",
            ['patients_general'=>$patients_general,
            'patients_regional'=>$patient_regional,
            'patients_national'=>$patient_national,
            'total'=>$total
            ]);

        }
        else{
            //create empty array
            $patients_general = array();
            $patients_regional = array();
            $patients_national = array();
            $patients_total = array();
            return view("patientlist",
            ['patients_general'=>$patients_general,
            'patients_regional'=>$patients_regional,
            'patients_national'=>$patients_national,
            'total'=>$patients_total
            ]
        );
        }
    

    }
}
