<?php

namespace App\Http\Requests\Post;

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
            'txtTitle'           => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtTitle.required'           => 'Vui lòng nhập tiêu đề bài đăng'
        ];
    }
}
