<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Http\Requests\StoreCalendarRequest;
use App\Http\Requests\UpdateCalendarRequest;
use App\Models\Field;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $data = Field::where('id_manager','=',Auth::id())->get();
        return view('manager.field.calendar', [
            'data' => $data,
        ]);

    }
    public function index_calendar()
    {
        $data =  Field::where('id_manager','=',Auth::id())->get();
        return view('manager.field.calendar_index',[
            'data'=> $data,
            ]
        );
    }
    public function index_calendar_show($id)
    {
        $data = Calendar::where('id_field','=',$id)->where('id_manager','=',Auth::id())->get();
        return view('manager.field.calendar_index_show_table',[
                'data'=> $data,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $data = Field::where('id_manager','=',Auth::id())->get();
        return view('manager.field.calendar', [
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCalendarRequest  $request
     *
     * @return string
     */
    public function store(Request $request)
    {
        $time_stamp_start =date("Y-m-d").' '.$request->time_start.':00';
        $time_stamp_end = date("Y-m-d").' '.$request->time_end.':00';
        $calendar = new Calendar();
        $calendar->fill($request->except(['_token']));
        $calendar['time_start'] = $time_stamp_start;
        $calendar['time_end'] = $time_stamp_end;
        $calendar->save();
        return $this->show($calendar['id_field']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $object = Calendar::where('id_field','=',$id)->get();
        return view('manager.field.show_calendar', [
            'object' => $object,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calendar  $calendar
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $object = Calendar::where('id','=',$id)->first();
        return view('manager.field.modal_calendar_edit',[
            'object' => $object
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCalendarRequest  $request
     * @param  \App\Models\Calendar  $calendar
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $time_stamp_start = date("Y-m-d").' '.$request->time_start.':00';
        $time_stamp_end = date("Y-m-d").' '.$request->time_end.':00';
        $update = Calendar::where('id', $request->id)
            ->update([
                'time_start' => $time_stamp_start,
                'time_end' =>$time_stamp_end,
                'price' =>$request->price,
            ]);
        return $this->index_calendar_show($request->id_field);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Calendar  $calendar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Calendar::destroy($id);
    }
}
