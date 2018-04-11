<?php

namespace App\Http\Requests\Banner;

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
            'txtName'     => 'required|unique:banner,name',
            'sltPosition' => 'required',
            'txtImage'    => 'required',
            'txtAlt'      => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtName.required'     => 'Vui lòng nhập tên Banner',
            'txtName.unique'       => 'Tên Banner này đã tồn tại, vui lòng nhập tên khác',
            'sltPosition.required' => 'Vui lòng chọn vị trí banner',
            'txtImage.required'    => 'Vui lòng chọn 1 hình',
            'txtAlt.required'      => 'Vui lòng nhập chú thích hình'
        ];
    }
}
