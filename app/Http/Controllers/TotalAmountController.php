<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TotalAmountController extends Controller
{
    //
    public function index(){
        $donorlist = DB::table('donor_names')->get();
	$Amount = DB::table('funds')
	->where('Amount','>',50000000)
	->get();
	$TotalAmount = DB::table('funds')
	->select('Amount')
	->get();
	$sum = 0.0;
	
	foreach($TotalAmount as $newAmount){
		$new = (float)$newAmount->Amount;
		$sum += $new;

	}
	//dd($sum);
     $formated = number_format($sum ,2);
     return view('treasury', ['donorlist' =>$donorlist, 'Amount'=>$Amount, 'sum'=>$formated]);

	

    }
}
