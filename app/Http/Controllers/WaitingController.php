<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WaitingController extends Controller
{
    //
    public $promotions = array();
    public function retrieve_officers(){
        return DB::table('health_officers')
        ->join('patients_list', 'health_officers.OfficerUserName', '=',
         'patients_list.OfficerUserName')
        ->select('health_officers.OfficerName',
        'health_officers.HospitalId',
        'health_officers.OfficerUserName',
        'health_officers.OfficerUserName',
        'health_officers.OfficerId',
        DB::raw('COUNT(patients_list.OfficerUserName) as total_patients')
        )->where('health_officers.HospitalCategory' , '=', "regional")
        ->groupBy(
         'health_officers.OfficerUserName',
         'health_officers.HospitalId',
         'health_officers.OfficerId',
          'health_officers.OfficerName', 'health_officers.OfficerUserName')
       ->get();
        }
          //convert to an array
    protected function convert_array($array_elements){
        return array_map(function($object){
            return $object;
     },$array_elements->toArray());
    

    }
    protected function filter_regional_hospital($officer_array){
        return array_filter($officer_array , function($elements){
            if($elements->total_patients >=3){

                //dd($elements);
                //dd($elements);
               if(count(DB::table("promotions")->where("OfficerUserName", '=', $elements->OfficerUserName)->get())){
                   return ;
               }
               else{
                DB::insert('insert into promotions
                (OfficerId ,OfficerUserName, Award, Pending) values (?, ?, ?, ?)', 
                [$elements->OfficerId, $elements->OfficerUserName, '10000000', True]);

                // $Amount = DB::select("select sum(Amount) as totalAmount from funds");
            

                
                  //dd($newpromoted);  
            
                $newpromoted = DB::table('promotions')->where("OfficerId", "=", $elements->OfficerId)->get();
                    foreach($newpromoted as $promote){
                        array_push($this->promotions, $promote);
                    }

               }


            }
         });
         

    }
    public function index(){
        if(count($this->retrieve_officers())){
           $convert_to_array = $this->convert_array($this->retrieve_officers());
          // dd($convert_to_array);
           $this->filter_regional_hospital($convert_to_array);
           $newpromoted = DB::table('promotions')->get();
           //dd($this->promotions);
           $regionalOfficers = $this->retrieve_officers();
            return view("waitinglist", ['promotions'=>$newpromoted , 
            "newpromotions"=>$this->promotions,
            'regionalOfficers'=>$regionalOfficers,
            "totalPromotions"=>count($newpromoted)]);

        }
        else{
          
            return view("waitinglist", ['promotions'=>$this->promotions, 
            "newpromotions"=>$this->promotions,
            'regionalOfficers'=>$regionalOfficers,
            'totalPromotions'=>count($this->promotions)]);

        }
        
    }
    
}
