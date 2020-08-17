<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentCreateRequest extends FormRequest
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
        'content' => 'required',
        'name' => 'required|max:255',
        'email' => 'email|required|max:255',
        ];
    }

    public function messages()
    {
       return [ 
        'content.required' => 'Nội dung comment không được để trống',
        'name.required' => 'Tên không được để trống',
        'name.max' => 'Tên không được dài quá 255 ký tự',
        'email.required' => 'Email không được để trống',
        'email.max' => 'Email không được dài quá 255 ký tự',
        'email.email' => 'Bạn phải nhập địa chỉ email',
        ];
    }
}
