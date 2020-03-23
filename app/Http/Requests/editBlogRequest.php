<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editBlogRequest extends FormRequest
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
            "title"=>"required",
            "content"=>"required",
            "img"=>"image"
        ];
    }

    public function messages()
    {
        return [
            "title.required"=>"Tiêu để không được bỏ trống",
            "content.required"=>"Nội dung không được bỏ trống",
            "img.image"=>"File phải là định dạng ảnh"
        ];
    }
}
