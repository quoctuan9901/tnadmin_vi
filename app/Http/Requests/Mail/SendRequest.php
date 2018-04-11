<?php

namespace App\Http\Requests\Mail;

use Illuminate\Foundation\Http\FormRequest;

class SendRequest extends FormRequest
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
            'txtTo'       => 'required',
            'txtFullname' => 'required',
            'txtSubject'  => 'required'
        ];
    }

    public function messages()
    {
        return [
            'txtTo.required'       => 'Vui lòng nhập mail người gửi đến',
            'txtFullname.required' => 'Vui lòng nhập tên đầy đủ',
            'txtSubject.required'  => 'Vui lòng nhập tiêu đề',
        ];
    }
}
