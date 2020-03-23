<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addUserRequest extends FormRequest
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
            "email"=>"required|email|unique:user,email",
            "password"=>"required|min:6",
            "full_name"=>"required|min:6",
            "avatar"=>"image"
        ];
    }

    public function messages()
    {
        return [
            "email.required"=>"Email không được bỏ trống",
            "email.email"=>"Email không đúng định dạng",
            "email.unique"=>"Email đã tồn tại",
            "password.required"=>"Password không được bỏ trống",
            "password.min"=>"Password không được ít hơn 6 ký tự",
            "full_name.required"=>"Họ tên không được bỏ trống",
            "full_name.min"=>"Họ tên không được ít hơn 6 ký tự",
            "avatar.image"=>"File phải là định dạng ảnh",

        ];
    }
}
