<?php

namespace App\Http\Requests\Login;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'txtEmail'   => 'required|email',
            'txtPass'    => 'required',
            'txtLock'    => 'required|regex:/^'.env('LOGIN_KEY').'$/',
            'txtCaptcha' => 'required|captcha'
        ];
    }

    public function messages()
    {
        return [
            'txtEmail.required'   => 'Vui lòng nhập email',
            'txtEmail.email'      => 'Đây không phải là email',
            'txtPass.required'    => 'Vui lòng nhập mật khẩu',
            'txtLock.required'    => 'Vui lòng nhập mã khóa',
            'txtLock.regex'       => 'Mã khóa không đúng',
            'txtCaptcha.required' => 'Vui lòng nhập mã Captcha',
            'txtCaptcha.captcha'  => 'Mã Captcha không đúng'
        ];
    }
}
