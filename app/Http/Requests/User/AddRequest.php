<?php

namespace App\Http\Requests\User;

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
            'txtEmail' => 'required|email|unique:users,email',
            'txtPass'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'txtEmail.required' => 'Vui lòng nhập tài khoản email',
            'txtEmail.email'    => 'Email này không đúng hoặc email không đúng định dạng',
            'txtEmail.unique'   => 'Tài khoản email này đã tồn tại, vui lòng tài khoản khác',
            'txtPass.required'  => 'Vui lòng nhập mật khẩu'
        ];
    }
}
