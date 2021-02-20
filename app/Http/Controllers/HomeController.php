<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    //create an 
    //send promoted
    protected function totals($table){
        return DB::table($table)->count();
    }
    //totalAMount
    protected function totalAmount(){
        return DB::select("select sum(Amount) as totalAmount from funds");
    }
    public function index(){

        $totalPatients = 0;
        $totalOfficers = 0;
        $totalHospitals = 0;
        $totalAmount = 0;
        //dd($this->totalAmount()[0]->totalAmount);
        if($this->totalAmount()){
            $totalAmount = $this->totalAmount()[0]->totalAmount;
        }
        if($this->totals("patients_list")){
            $totalPatients = $this->totals("patients_list");
        }
        if($this->totals("health_officers")){
            $totalOfficers = $this->totals("health_officers");
        }
        if($this->totals("hospitals")){
            $totalHospitals = $this->totals("hospitals");
        }



        return view("dashboard", ["totalOfficers"=>$totalOfficers, 'totalHospitals'=>$totalHospitals, 'totalPatients'=>$totalPatients,
        'totalAmount'=>number_format($totalAmount, 2)]);
    }

    
}
