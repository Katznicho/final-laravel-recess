<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonthsChart extends BaseChart
{

    protected function getDate(){
        $result = DB::table('donor_names')
        ->where('Displayed', '=', True)
        ->get();
        //print_r($result);
       $getDonorMonth = array();
       foreach($result as $results){
           array_push($getDonorMonth, $results->Date);
       }
    
       return $getDonorMonth;

   }


   protected function getAmount(){
      $result = DB::table('donor_names')
      ->where('Displayed', '=', True)
      ->get();
      $getAmount = array();
      foreach($result as $results){
          array_push($getAmount,$results->Amount);
      }
      return $getAmount;
   }

    public function handler(Request $request): Chartisan
    {

        if(count($this->getAmount())){
            // return Chartisan::build()
            // ->labels($this->getDate())
            // ->dataset('Months', $this->getAmount());
            
            return Chartisan::build()
            ->labels($this->getDate())
            ->dataset('Months', $this->getAmount());
        }
        else{
            return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Months', [1, 2, 3]);

        }

    }
}