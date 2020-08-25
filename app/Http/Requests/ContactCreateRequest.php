<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactCreateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'name' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'phone' =>'required',
            'content' => 'required'
        ];

    }

    public function messages()
    {
        return[
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.max' => 'Tiêu đề tối đa 255 ký tự',
            'name.required' => 'Vui lòng nhập tên',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'content.required' => 'Vui lòng nhập nội dung cần hỗ trợ'

        ];
    }
}
