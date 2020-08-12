<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BannerCreateRequest extends FormRequest
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
        'name' => 'required',
        'link' => 'required',
        'image' => 'required',
        ];
    }

    public function messages()
    {
       return [ 
        'name.required' => 'Vui lòng nhập tên baner',
        'link.required' => 'Vui lòng nhập link liên kết',
        'image.required' => 'Vui lòng chọn banner',
        ];
    }
}
