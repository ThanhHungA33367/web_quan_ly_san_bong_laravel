<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Http\Requests\StoreBillRequest;
use App\Http\Requests\UpdateBillRequest;
use App\Models\Calendar;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('manager.bill.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getData()
    {
        return Datatables::of(Bill::query()
            ->join('fields','id_field','=','fields.id')
            ->select('bills.*','fields.name as fieldname','fields.type as fieldtype')
            ->where('bills.status','=','1'))->make(true);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBillRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBillRequest $request)
    {
        $id_calendar = $request->id_time_schedule;
        $object = Calendar::where('id','=',$id_calendar)->first();
        $bill = new Bill();
        $bill['name'] = $request->name;
        $bill['phone'] = $request->phone;
        $bill['code_order'] =  $request->code_order;
        $bill['time_start'] = $request->date_schedule.' '. date('H:i:s',strtotime($object->time_start)) ;
        $bill['time_end'] = $request->date_schedule.' '.date('H:i:s',strtotime($object->time_end));
        $bill['id_field'] = $object->id_field;
        $bill['price'] = $object->price;
        $bill['status'] = 0;
        $bill->save();

//        $date = date('Y-m-d', strtotime($request->date));
//        $time_stamp_start = $date.' '.$request->time_start.':00';
//        $time_stamp_end = $date.' '.$request->time_end.':00';
//        $price = strtok($request->price, '.');
//        $bill = new Bill();
//        $bill->fill($request->except(['_token']));
//        $bill['status'] = 0;
//        $bill['time_start'] = $time_stamp_start;
//        $bill['time_end'] = $time_stamp_end;
//        $bill['price'] = $price;
//        $bill->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBillRequest  $request
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBillRequest $request, Bill $bill)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        //
    }
}
