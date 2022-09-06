<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatisticController extends Controller
{
    public function index(){

        $a = array();

        for($i = 0; $i < 7; $i++){
            $data = Bill::query()
                ->join('fields','fields.id','=','id_field')
                ->where('fields.id_manager','=',Auth::id())
                ->where('time_start','like','%'.date("Y-m-d", strtotime('-'. $i .' days')).'%')
                ->where('bills.status','=','1')
                ->sum('price');
            $a[] = $data;
        }

        return view('manager.statistic.revenue_7days',[
           'data'=> $a,
            ]);

   }
   public function index_revenue_months(){
       $a = array();

       for($i = 0; $i < 12; $i++){
           $data = Bill::query()
               ->join('fields','fields.id','=','id_field')
               ->where('fields.id_manager','=',Auth::id())
               ->whereMonth('time_start','like','%'.$i.'%')
               ->where('bills.status','=','1')
               ->sum('price');
           $a[] = $data;

       }

       return view('manager.statistic.revenue_months',[
           'data' => $a
       ]);

   }
}
