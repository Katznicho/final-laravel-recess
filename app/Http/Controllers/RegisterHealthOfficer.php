<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use APP\Models\HealthOfficerModel;
use Illuminate\Support\Facades\DB;

class RegisterHealthOfficer extends Controller
{
    //
    public function index(){
        return view("auth.register_officer"); 
    }
    public function retrieve_officers(){
        return DB::table('health_officers')
        ->join('hospitals', 'health_officers.HospitalId', '=',
         'hospitals.HospitalId')
        ->select('health_officers.HospitalCategory',
        'health_officers.HospitalId',
        DB::raw('COUNT(health_officers.HospitalId) as total_officers')
        )->where('health_officers.HospitalCategory' , '=', 'general')
        ->groupBy(
         'health_officers.HospitalId',
          'health_officers.HospitalCategory')
       ->get();

    }

    public function store(Request $request){
        
        $this->validate($request,
        [
            'officerName'=>'required',
            "officerUserName"=>['required', 'unique:health_officers,OfficerUserName'
            ]
        ]);    
    if(count($this->retrieve_officers())){
        //retreive data
        $result = $this->retrieve_officers();
        //dd($result);

        //change to array
$newarray = array_map(function($object){

       return array("hospitalId"=>$object->HospitalId, 
       "total_officers"=>$object->total_officers);
}, 
$result->toArray());
//print_r($newarray);

//sort associative array
usort($newarray, function ($item1, $item2) {
    return $item1['total_officers'] <=> $item2['total_officers'];
});
//first element and id
$first_element = $newarray[0]['total_officers'];
//id
$id = $newarray[0]["hospitalId"];
if($first_element > 15){
    return back()->with("status", "All general hospitals are full");
}

$hospital_details = DB::table('hospitals')->where('HospitalId', $id)->get();
//print_r($hospital_details);

DB::insert('insert into health_officers (OfficerName,officerUserName, HospitalId)
 values (?, ?,?)', [$request->officerName, $request->officerUserName
  , $hospital_details[0]->HospitalId]);

 return redirect('/officerlist');

       
    }
    else{
        //incase there no users
       $count =  DB::table('hospitals')->where('HospitalCategory', '=', 'general')->get();
       if(count($count)){
           

        DB::insert('insert into health_officers (OfficerName,officerUserName, HospitalId)
        values (?, ?,?)', [$request->officerName, $request->officerUserName
         , $count[0]->HospitalId]);
         return redirect('/officerlist');

       }
       else{
           return back()->with("status", "Hospitals lack data");
       }


    }


    }
    //retrieve hospitals;

}
