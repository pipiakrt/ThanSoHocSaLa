<?php

namespace App\Http\Requests\Api\Product;

use App\Http\Requests\Api\FormRequest;

class Store extends FormRequest
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
            'slug' => 'required|unique:products|max:255',
            'image' => 'required|max:255',
            'description' => 'required|max:65535',
            'content' => 'required|max:4294967295',
            'status' => 'required|numeric',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => 'Tên không để trống',
            'slug.required' => 'Đường dẫn đã tồn tại',
        ];
    }
}
