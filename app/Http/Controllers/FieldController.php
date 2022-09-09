<?php

namespace App\Http\Controllers;

use App\Models\Field;
use App\Http\Requests\StoreFieldRequest;
use App\Http\Requests\UpdateFieldRequest;
use HoangPhi\VietnamMap\Models\District;
use HoangPhi\VietnamMap\Models\Province;
use HoangPhi\VietnamMap\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('q');
        $data = Field::where('name','like','%' .$search. '%')->where('id_manager','=',Auth::id())->paginate(2)->appends(['q' => $search]);
        return view('manager.field.view_field.index', [
            'data' => $data,
            'search'=>$search
        ]);
    }
    public function getDistrict($provincesId)
    {
        $districts = District::where('province_id','=',$provincesId)->get();
        return view('manager.field.create_field.select_districts',[
           'data'=> $districts,
        ]);
    }
    public function getWard($districtsId)
    {
        $wards = Ward::where('district_id','=',$districtsId)->get();
        return view('manager.field.create_field.select_wards',[
            'data'=> $wards,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $province = Province::all();
        return view('manager.field.create_field.create',[
            'province' => $province,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFieldRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFieldRequest $request)
    {
        $path = Storage::disk('public')->putFile('avatars', $request->file('image'));
        $field = new Field();
        $field->fill($request->validated());
        $field['image'] = $path;
        $field['id_province'] = $request->province;
        $field['id_district'] = $request->district;
        $field['id_ward'] = $request->ward;
        $field['id_manager'] = Auth::id();
        $field->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function show(Field $field)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $object = Field::where('id','=',$id)->first();
        return view('manager.field.view_field.modal_field_edit', [
            'object' => $object,
        ]);



    }

    /**
     * Update the specified resource in storage.
     *
     *
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $path = Storage::disk('public')->putFile('avatars', $request->file('image'));
        $field = Field::find($id);
        $field->fill($request->except(['_token','_method']));
        $time_stamp_open = date("Y-m-d").' '.$request->time_open.':00';
        $time_stamp_close = date("Y-m-d").' '.$request->time_close.':00';
        $field['image'] = $path;
        $field['time_open'] = $time_stamp_open;
        $field['time_close'] = $time_stamp_close;
        $field->save();
        return redirect()->route('field.index')->with('message', 'Sửa thành công!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Field  $field
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        Field::destroy($id);
    }
}
