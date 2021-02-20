<?php

declare(strict_types = 1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PercentageChange extends BaseChart
{
    public $firstMonth =0;
    public $secondMonth = 0;
     protected function getMonth(){
         $allMonth = DB::table('patients_list')
         ->get();
          
         foreach($allMonth as $month){
             $explode = explode('-', $month->DOI)[1];
             if((int)$explode ==1){
                 $this->firstMonth++;
             }
             else if((int)$explode ==2){
                 $this->secondMonth++;
             }

         }
         $change = ($this->secondMonth-$this->firstMonth)/$this->firstMonth;
         return $change;

     }
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['Febraury'])
            ->dataset('Sample', [$this->getMonth()]);
    }
}