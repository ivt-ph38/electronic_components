<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'address' => 'required|max:255',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập Họ và Tên',
            'name.max' => 'Họ và tên không quá 255 ký tự',
            'password.required' => 'Mật khẩu là trường bắt buộc',
            'password.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
            'password.confirmed' => 'Xác nhận mật khẩu không đúng',
            'address.required' => 'Vui lòng nhập địa chỉ'
        ];    
    }
}
