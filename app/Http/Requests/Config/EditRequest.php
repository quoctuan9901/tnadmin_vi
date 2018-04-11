<?php

namespace App\Http\Requests\Config;

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
            'txtNameSite'        => 'required',
            'txtSiteTitle'       => 'required',
            'txtMetaKeywords'    => 'required',
            'txtMetaDescription' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtNameSite.required'        => 'Vui lòng nhập tên trang Web',
            'txtSiteTitle.required'       => 'Vui lòng nhập tiêu đề trang Web',
            'txtMetaKeywords.required'    => 'VUi lòng nhập thẻ từ khóa',
            'txtMetaDescription.required' => 'Vui lòng nhập thẻ mô tả'
        ];
    }
}
