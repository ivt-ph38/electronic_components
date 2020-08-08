<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
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
            'name' => 'required|max:255',
            'phone' => 'required|max:15',
            'address' => 'required|max:255',
            'email' => 'email|required|max:255',
        ];

    }

    public function messages()
    {
        return[
            'name.required' => 'Vui lòng nhập họ tên',
            'name.max' => 'Họ tên tối đa 255 ký tự',
            'address.required' => 'Vui lòng nhập địa chỉ',
            'address.max' => 'Địa chỉ tối đa 255 ký tự',
            'phone.required' => 'Vui lòng nhập số điện thoại',
            'phone.max' => 'Số điện thoại tối đa 15 ký tự',
            'email.required' => 'Vui lòng nhập email',
            'email.email' => 'Bạn phải nhập email',
            'email.max' => 'Email tối đa 255 ký tự'

        ];
    }
}
