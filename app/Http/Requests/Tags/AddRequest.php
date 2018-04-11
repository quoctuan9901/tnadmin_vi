<?php

namespace App\Http\Requests\Tags;

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
            'txtTag'             => 'required|unique:tags,tags'
        ];
    }

    public function messages()
    {
        return [
            'txtTag.required'             => 'Vui lòng nhập tên thẻ',
            'txtTag.unique'               => 'Tên thẻ này đã tồn tại, vui lòng nhập tên khác'
        ];
    }
}
