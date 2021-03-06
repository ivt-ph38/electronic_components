<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogUpdateRequest extends FormRequest
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
            'description' => 'required|max:500',
            'image' => 'required',
            'content' => 'required'
        ];

    }

    public function messages()
    {
        return[
            'title.required' => 'Vui lòng nhập tiêu đề',
            'title.max' => 'Tiêu đề tối đa 255 ký tự',
            'description.required' => 'Vui lòng nhập mô tả',
            'description.max' => 'Mô tả tối đa 500 ký tự',
            'image.required' => 'Vui lòng chọn hình đại diện',
            'content.required' => 'Vui lòng nhập nội dung'

        ];
    }
}
