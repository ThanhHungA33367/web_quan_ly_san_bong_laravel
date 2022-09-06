<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Field;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {

        $provinces = Province::all();
        $search = $request->get('q');
        $data = Field::where('name','like','%' .$search. '%')->paginate(10)->appends(['q' => $search]);
        return view('page.welcome', [
            'data' => $data,
            'search'=>$search,
            'provinces' => $provinces,

        ]);
    }
    public function getDistrict($provincesId)
    {

        $districts = District::where('province_id','=',$provincesId)->get();
        return view('page.select_districts', [
            'data' => $districts,

        ]);
    }
    public function show($id)
    {

        $data = Field::where('fields.id','=',$id )->get();
        $schedule = Calendar::where('id_field','=',$id )->get();
        $price_min = Calendar::where('id_field','=',$id )->min('price');
        $price_max = Calendar::where('id_field','=',$id )->max('price');
        return view('page.detail', [
            'data' => $data,
            'schedule' => $schedule,
            'price_min'=>$price_min,
            'price_max'=>$price_max,
        ]);
    }
    public function show_modal(Request $request)
    {
        $date_schedule = $request->date_schedule;
        $object = Calendar::where('id','=',$request->id_time_schedule)->first();
        return view('page.modal_set_schedule', [
            'object' => $object,
            'date_schedule' => $date_schedule,
        ]);
    }

}
