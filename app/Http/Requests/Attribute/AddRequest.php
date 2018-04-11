<?php

namespace App\Http\Requests\Attribute;

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
            'txtName' => 'required|unique:attribute,name'
        ];
    }

    public function messages()
    {
        return [
            'txtName.required'  => 'Vui lòng nhập tên thuộc tính',
            'txtName.attribute' => 'Tên thuộc tính này đã tồn tại, vui lòng nhập tên khác'
        ];
    }
}
