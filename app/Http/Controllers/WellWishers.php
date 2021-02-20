<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WellWishers extends Controller
{
    public function store(Request  $request){

        $this->validate($request,
        [
           'month'=>'required'
        ]);
        //update the database

        DB::update('update donor_names set Displayed = ? where Month = ?', [True, $request->month]);
        

        //update other months
        DB::update('update donor_names set Displayed = ? where Month != ?', [False, $request->month]);

        //redirect back

        //return redirect("/donation");
        $getMonth = DB::select('select * from donor_names where DonorId = ?', [1]);
        $allMonths = DB::table('donor_names')
        ->select('Month')
        ->distinct()->get();
    
        $allMonth = DB::table('donor_names')
        ->select('Month')
        ->where('Month', '=', $request->month)
        ->get();
        $month = '';


        foreach($allMonths as $getMonth){
            if($getMonth->Month == $request->month){
                $month = $getMonth;
            }
        }




        return view("chart.wellwishers", [
            'first_month'=>$getMonth,
            'all_months'=>$allMonths,
            'selected'=>$month

        ]);
        
      

        
    }


    //index graphs
    public function index(){
        $getMonth = DB::select('select * from donor_names where DonorId = ?', [1]);
        //dd($getMonth[0]->Month);
          // dd($getMonth);
        DB::update('update donor_names set Displayed = ? where Month = ?',
         [True, $getMonth[0]->Month]);
         DB::update('update donor_names set Displayed = ? where Month != ?',
         [False, $getMonth[0]->Month]);
        $allMonths = DB::table('donor_names')
        ->select('Month')
        ->distinct()->get();
        $month = DB::table('donor_names')->where('Month', '=', 1);
        //$storeMonth =array();
        //$month =
        $month = '';

        if($getMonth){
            return view("chart.wellwishers", [
                'first_month'=>$getMonth,
                'all_months'=>$allMonths,
                'selected'=>$allMonths[0]

            ]);
        }
        else{
              $getMonth = array();
              $allMonths = array();
              $viewed_month = array();
            
            return view("chart.wellwishers",
            [
                'first_month'=>$getMonth,
                'all_months'=>$allMonths,
                'selected'=>$viewed_month
            ]
        );
        }


    }
    
}
