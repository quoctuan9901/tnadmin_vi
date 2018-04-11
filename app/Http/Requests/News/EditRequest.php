<?php

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'txtTitle'           => 'required',
            'chkCategory'        => 'required',
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required'           => 'Vui lòng nhập tiêu đề tin',
            'chkCategory.required'        => 'Vui lòng chọn ít nhất 1 thể loại'
        ];
    }
}
