<?php

namespace App\Http\Requests\Manufacturer;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
    public function rules()
    {
        return [
            'txtName'  => 'required|unique:manufacturer,name'
        ];
    }

    public function messages()
    {
        return [
            'txtName.required'  => 'Vui lòng nhập tên nhà sản xuất',
            'txtName.unique'    => 'Tên nhà sản xuất này đã tồn tại, vui lòng nhập tên khác'
        ];
    }
}
