<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromotionsController extends Controller
{
      public $promotions = array();
      //count officers
    public function total_officers($category){
        return DB::table('health_officers')
        ->join('hospitals', 'health_officers.HospitalId', '=',
         'hospitals.HospitalId')
        ->select('health_officers.HospitalCategory',
        'health_officers.HospitalId',
        DB::raw('COUNT(health_officers.HospitalId) as total_officers')
        )->where('health_officers.HospitalCategory' , '=', $category)
        ->groupBy(
         'health_officers.HospitalId',
          'health_officers.HospitalCategory')
       ->get();
    
    }

    //getofficers
    public function retrieve_officers(){
        return DB::table('health_officers')
        ->join('patients_list', 'health_officers.OfficerUserName', '=',
         'patients_list.OfficerUserName')
        ->select('health_officers.OfficerName','health_officers.HospitalId',
        'health_officers.OfficerUserName',
        DB::raw('COUNT(patients_list.OfficerUserName) as total_patients')
        )->where('health_officers.HospitalCategory' , '=', "general")
        ->groupBy(
         'health_officers.OfficerName',
         'health_officers.HospitalId',
           'health_officers.OfficerUserName')
       ->get();
        }
          //convert to an array
    protected function convert_array($array_elements){
        return array_map(function($object){
            return $object;
     },$array_elements->toArray());
    

    }

    //filter array
    protected function filter_officers($officer_array){
     return array_filter($officer_array , function($elements){
         if($elements->total_patients >=3){
             //dd($elements);
             //return $elements;
           $officers_regional =  $this->convert_array($this->total_officers("regional"));
           
           $converted_to_array =  array_map(function($object){
            return  array('HospitalCategory'=>$object->HospitalCategory,
            'HospitalId'=>$object->HospitalId, 
          'total_officers'=>$object->total_officers,
          )
          ;
},$officers_regional);
           
            usort($converted_to_array, function ($item1, $item2) {
                return $item1['total_officers'] <=> $item2['total_officers'];
            });
            

               if($converted_to_array[0]['total_officers']<100){
                   //insert to db here
                   $id = $converted_to_array[0]['HospitalId'];
                   
                   $OfficerUserName = $elements->OfficerUserName;
                   //dd($OfficerUserName);
                  DB::update('update health_officers
                     set HospitalId = ?,
                     OfficerRole = ?,
                     HospitalCategory = ?,
                     IsPromoted =?
                      where OfficerUserName = ?', [$id,'senior officer','regional', True,  $OfficerUserName]);            

               }
               $get_updated = 
               DB::table('health_officers')->where('OfficerUserName', '=', $OfficerUserName)->get();
              //print_r($get_updated);

               foreach($get_updated as $updated){
                   array_push($this->promotions,$updated );

               }
               
         }
      });
    }
    public function index(){
        if(count($this->total_officers("general"))){
            //dd($this->total_officers("general"));
            $converted = $this->convert_array($this->retrieve_officers());
            $promoted = DB::table('health_officers')
                            ->join('hospitals', 'hospitals.HospitalId','=',
                             'health_officers.HospitalId')
                             ->select("health_officers.*", 'hospitals.*')
            ->where("IsPromoted", "=", True)->get();
            //$promoted = DB::table('health_officers')->where("IsPromoted", "=", True)
             $this->filter_officers($converted);
            // dd($this->retrieve_officers());
            return view ("promotions", 
        ["newpromotions"=>$this->promotions,
        'totalPromotions'=>count($promoted),
         "promotions"=>$promoted, 'generalOfficers'=>$this->retrieve_officers()]);

        }
        else{
            
            $promoted = array();
            $generalOfficers = array();
            
            return view ("promotions", ["promotions"=>$promoted , "newpromotions"=>$this->promotions, 
            'totalPromotions'=>count($this->promotions), 'generalOfficers'=>$generalOfficers]);
        }

    }
}
