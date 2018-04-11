<?php

namespace App\Http\Requests\Role;

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
            'txtName' => 'required|unique:role,name',
            'chkRole' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtName.required' => 'Vui lòng nhập tên vai trò',
            'txtName.unique'   => 'Tên Vai Trò này đã tồn tại, vui lòng nhập tên khác',
            'chkRole.required' => 'Vui lòng chọn ít nhất 1 vai trò',
        ];
    }
}
