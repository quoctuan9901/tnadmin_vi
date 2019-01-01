<?php

namespace App\Http\Requests\Page;

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
            'txtPage'           => 'required|unique:pages,name',
        ];
    }

    public function messages()
    {
        return [
            'txtPage.required'           => 'Vui lòng nhập tên trang',
            'txtPage.unique'             => 'Tên trang này đã tồn tại, vui lòng nhập tên trang khác',
        ];
    }
}
