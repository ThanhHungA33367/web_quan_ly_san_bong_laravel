<?php

namespace App\Http\Controllers;


use App\Models\Bill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class OrderController extends Controller
{
    public function index(Request $request)
    {

        $search = $request->get('q');
        $data1 = Bill::where('bills.name','like','%' .$search. '%')
            ->join('fields','id_field','=','fields.id')
            ->where('id_manager','=',Auth::id())
            ->where('bills.status','=','0')
            ->select('bills.*','fields.name as fieldname');
        if($request->date_from !== null && $request->date_to !== null) {
            $data1->WhereBetween('time_start', array($request->date_from, $request->date_to));
        }
        $data=$data1->paginate(2)->appends(['q' => $search]);
        return view('manager.order.pending_order', [
            'data' => $data,
            'search'=>$search
        ]);
    }
    public function approve(Request $request)
    {
        $search = $request->get('q');
        Bill::where('id','=',$request->id)
            ->update(['status'=> 1]);
        $data = Bill::where('bills.status','=',1)
            ->join('fields','id_field','=','fields.id')
            ->where('id_manager','=',Auth::id())
            ->select('bills.*','fields.name as fieldname')
            ->paginate(2)->appends(['q' => $search]);
        return view('manager.order.approved_order', [
            'data' => $data,
            'search'=>$search,
        ]);
    }
    public function cancel(Request $request)
    {
        Bill::destroy($request->id);
    }


}
