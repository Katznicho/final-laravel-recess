<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PercentageChange extends Controller
{
    //
    protected function retrieveMonths(){
        $months = DB::table('patients_list')->get();
        $array_of_months = array();
        foreach($months as $month){
           $explode = explode("-", $month->DOI)[1];
            switch($explode){
                case 1:
                    in_array("January", $array_of_months)? Null:array_push($array_of_months, "January");
                    break;
                case 2:
                    in_array("Febrauary", $array_of_months)? Null:array_push($array_of_months, "Febrauary");
                    break;
                case 3:
                    in_array("March", $array_of_months)? Null:array_push($array_of_months, "March");
                    break;
                case 4:
                    in_array("April", $array_of_months)? Null:array_push($array_of_months, "April");
                    break;
                 case 5:
                    in_array("May", $array_of_months)? Null:array_push($array_of_months, "May");
                    break;
                case 6:
                    in_array("June", $array_of_months)? Null:array_push($array_of_months, "Febrauary");
                    break;
                case 7:
                    in_array("July", $array_of_months)? Null:array_push($array_of_months, "July");
                    break;
                case 8:
                     in_array("August", $array_of_months)? Null:array_push($array_of_months, "August");
                    break;
                 case 9:
                    in_array("September", $array_of_months)? Null:array_push($array_of_months, "September");
                    break;
                 case 10:
                    in_array("October", $array_of_months)? Null:array_push($array_of_months, "October");
                    break;
                case 11:
                    in_array("November", $array_of_months)? Null:array_push($array_of_months, "November");
                    break;
                case 12:
                    in_array("December", $array_of_months)? Null:array_push($array_of_months, "December");
                    break;
                    
            }

        }
        return $array_of_months;

    }
    
    public function index(){

        //$this->getMonth();
        if($this->retrieveMonths()){
            return view("chart.percentage", ['months'=>$this->retrieveMonths(),
            'selected'=>'Febrauary'
            ]);

        }
        else{
            return view("chart.percentage",['months'=>array()]);

        }
        
    }
  public function store(Request $request){
      //dd($request);
    return view("chart.percentage", ['months'=>$this->retrieveMonths(),
    'selected'=>$request->month
    ]);

  }
}
