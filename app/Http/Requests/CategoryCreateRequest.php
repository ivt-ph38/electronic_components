<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
        'name' => 'unique:categories|required|max:255',
        'parent_id' => 'required|numeric'
        ];
    }

    public function messages()
    {
       return [ 
        'name.unique' => 'Tên danh mục bị trùng',
        'name.required' => 'Vui lòng nhập tên danh mục',
        'name.max' => 'Tên danh mục không được dài quá 255 ký tự.',
        'parent_id.required' => 'Vui lòng chọn danh mục',
        'parent_id.numeric' => 'Danh mục được chọn phải có id là số',
        ];
    }
}
