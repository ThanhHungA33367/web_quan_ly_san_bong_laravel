<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Field;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $data1 = Field::query();
        if ($request->provinces !== null ) {
            $data1->where('id_province', '=', $request->provinces);
        }
        if ($request->provinces !== null && $request->districts !== null) {
            $data1->where('id_province', '=', $request->provinces)
            ->where('id_district', '=', $request->districts);
        }
        if ($request->provinces !== null && $request->districts !== null && $request->wards !== null) {
            $data1->where('id_province', '=', $request->provinces)
                ->where('id_district', '=', $request->districts)
                ->where('id_ward', '=', $request->wards);
        }
            $data = $data1->paginate(10);

        $provinces = Province::all();
        return view('page.welcome', [
            'data' => $data,
            'provinces'=>$provinces,

        ]);
    }
    public function getDistrict($provincesId)
    {

        $districts = District::where('province_id','=',$provincesId)->get();
        return view('page.select_districts', [
            'data' => $districts,

        ]);
    }
    public function getWard($districtsId)
    {

        $wards = Ward::where('district_id','=',$districtsId)->get();
        return view('page.select_wards', [
            'data' => $wards,

        ]);
    }
    public function show($id)
    {
        $data = Field::where('fields.id','=',$id)
            ->join('provinces','id_province','=','provinces.id')
            ->join('districts','id_district','=','districts.id')
            ->join('wards','id_ward','=','wards.id')
            ->select('provinces.name as provincesname','districts.name as districtsname','wards.name as wardsname','fields.*')
            ->get();
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
