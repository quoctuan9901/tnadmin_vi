<?php

namespace App\Http\Requests\Contact;

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
            'txtName'  => 'required|unique:contact,name'
        ];
    }

    public function messages()
    {
        return [
            'txtName.required'  => 'Vui lòng nhập tên liên hệ',
            'txtName.unique'    => 'Tên liên hệ này đã tồn tại, vui lòng chọn tên khác'
        ];
    }
}
