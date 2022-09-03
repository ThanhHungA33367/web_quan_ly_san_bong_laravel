<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index(){

        $a = array();

        for($i = 0; $i < 7; $i++){
            $data = Bill::query()
                ->where('time_start','like','%'.date("Y-m-d", strtotime('-'. $i .' days')).'%')
                ->where('status','=','1')
                ->sum('price');
            $a[] = $data;
        }

        return view('manager.statistic.revenue_7days',[
           'data'=> $a,
            ]);

   }
   public function index_revenue_months(){
       return view('manager.statistic.revenue_months');

   }
}
