<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFieldRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() :bool
    {
        return true;
    }


    public function rules() :array
    {
        return [
            'name'=> 'bail||required||min:5',
            'phone'=> 'bail||required||min:10||max:12||regex:/(0)[0-9]{9}/',
            'address'=> 'required',
            'type'=> 'required||in:Sân 7,Sân 11',
            'size'=> 'required',
            'image'=> 'required',
            'time_open'=> 'required',
            'time_close'=> 'required',
        ];
    }
    public function messages(): array
    {
        return [
            'required' => 'Bạn chưa điền :attribute',
            'name.min' => 'Tên sân tối thiểu phải 5 kí tự',
            'phone.min' => 'Bạn phải nhập tối thiểu 10 kí tự',
            'phone.max' => 'Bạn chỉ được nhập tối đa 12 kí tự',
            'phone.regex' => 'Bạn sai số điện thoại',


        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên',
            'phone' => 'Số điện thoại',
            'address' => 'Địa chỉ',
            'type' => 'Ảnh',
            'size' => 'Kích thước',
            'image' => 'Ảnh',
            'time_open' => 'Thời gian bắt đầu',
            'time_close' => 'Thời gian kết thúc',

        ];

    }
}
