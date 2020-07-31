<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
        'slug' => 'required|max:255',
        'description' => 'required|max:500',
        'detail' => 'required',
        'price' => 'required',
        'discount' => 'integer|max:100',
        'quantity' => 'required',
        'image' => 'required',
        'category_id' => 'required'
        ];
    }

    public function messages()
    {
       return [ 
        'name.required' => 'Vui lòng nhập tên sản phẩm',
        'name.max' => 'Tên sản phẩm không được dài quá 255 ký tự.',
        'slug.required' => 'Vui lòng nhập đường dẫn',
        'slug.max' => 'Tối đa 255 ký tự',
        'description.required' => 'Vui lòng nhập mô tả',
        'description.max' => 'Tối đa 500 ký tự',
        'price.required' => 'Vui lòng nhập giá sản phẩm',
        'discount.integer' => 'Giá giảm chỉ được nhập số nguyên.',
        'discount.max' => 'Giá giảm tối đa là 100%.',
        'quantity.required' => 'Vui lòng nhập số lượng sản phẩm',
        'detail.required' => 'Vui lòng nhập nội dung.',
        'image.required' => 'Vui lòng chọn hình đại diện.',
        'category_id.integer' => 'Vui lòng chọn danh mục'
        ];
    }
}
