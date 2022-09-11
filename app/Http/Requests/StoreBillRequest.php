<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBillRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules() :array
    {
        return [
            'name' => 'bail||required||',
            'phone'=> 'bail||required||min:10||max:12||regex:/(0)[0-9]{9}/'
        ];
    }
    public function messages() : array
    {
        return [
            'required' => 'Bạn chưa điền :attribute',
            'phone.min' => 'Bạn phải nhập tối thiểu 10 kí tự',
            'phone.max' => 'Bạn chỉ được nhập tối đa 12 kí tự',
            'phone.regex' => 'Bạn sai số điện thoại',
        ];
    }
    public function attributes(){
        return [
            'name' => 'Tên',
            'phone' => 'Số điện thoại',

        ];

    }
}
