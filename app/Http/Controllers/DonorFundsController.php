<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DonorModel;
use Illuminate\Support\Facades\DB;

class DonorFundsController extends Controller
{
    //
    protected function  extract_month($array_month, $number){
        foreach($array_month as $months=>$value){
            if((int)$value=== (int)$number)
            return $months;
        }
        return ;
     }
     
    public function index(){
        return view('auth.register_funds');
    }

    public function store(Request $request){
        $this->validate($request,
        ['amount'=>'required',
        'month'=>'required',
        'donorName'=>'required'
        ]
    );
    
    //array of months
    $array_of_months = ['January'=>'1', 'February'=>'2', 'March'=>'3', 'April'=>'4',
    'May'=>'5', 'June'=>'6', 'July'=>'7', 'August'=>'8', 
    'September'=>'9', 'October'=>'10', 'November'=>'11', 'December'=>'12'];

   
    $expode = explode("-", $request->month, 3)[1];
    //dd($expode);
    $getMonth = $this->extract_month($array_of_months, $expode);
    //echo $getMonth;

    //checkdb
    $checker = DB::table('funds')->where('Month', '=', $getMonth)->get();
    //print_r($checker);
    if(count($checker)){
        
        //echo 'AM her in the databasae';
        //aupdate the column
        $Amount = DB::select('select Amount from funds where Month = ?', [$getMonth]);
        //print_r($Amount[0]->Amount);


        //loop
        $myAmount = "";
        foreach($Amount as $needed_amount){
                $myAmount = $needed_amount->Amount;
        }
        echo $myAmount;
        //add on amount
        $sum_amount = $request->amount + $myAmount;
        //update Amount table
        DB::update('update funds set Amount = ? where Month = ?', [$sum_amount, $getMonth]);

        //insert the donor name table
        // $newDate = \Carbon\Carbon::createFromFormat('m/d/y', $request->month)
        // ->format('Y-m-d');


        DB::insert('insert into donor_names 
        (DonorName, Amount, Month, Date) values (?, ?,?, ?)', 
        [$request->donorName, $request->amount, $getMonth,
          $request->month]);


        //redirect donor list
        return redirect("/donorlist");







    }
    else{

        // $newDate = \Carbon\Carbon::createFromFormat('m/d/y', $request->month)
        //             ->format('Y-m-d');
        // echo 'First day : 
        // '. date("Y-m-01", strtotime($newDate)).' - Last day : '. date("Y-m-t", strtotime($newDate));

        DB::insert('insert into donor_names 
        (DonorName, Amount, Month, Date) values (?, ?,?, ?)', 
        [$request->donorName, $request->amount, $getMonth,
          $request->month]);

          DB::insert('insert into funds (Amount, Month) 
          values (?, ?)', [$request->amount, $getMonth]);
            return redirect("/donorlist");
    }
    
    }
}

