<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DonationChart extends BaseChart

{
    protected function getNames(){
        $result = DB::table('donor_names')
        ->where('Displayed', '=', True)
        ->get();
       $getDonerName = array();
       foreach($result as $results){
           array_push($getDonerName, $results->DonorName);
       }
       return $getDonerName;

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
        if(count($this->getNames())){
            return Chartisan::build()
            ->labels($this->getNames())
            ->dataset('WellWishers', $this->getAmount());

        }
        else{
                        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('WellWishers', [1,2,4]);

        }



    }
}