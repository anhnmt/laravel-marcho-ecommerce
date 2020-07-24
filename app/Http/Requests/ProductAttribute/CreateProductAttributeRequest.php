<?php

namespace App\Http\Requests\ProductAttribute;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductAttributeRequest extends FormRequest
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
            'quantity' => 'required|integer',
            'price' => 'nullable|numeric',
            'sale_price' => 'nullable|numeric',
            'default' => 'boolean',
        ];
    }

    public function messages()
    {
        return [
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'price.numeric' => 'Giá tiền phải là kiểu số',
            'sale_price.numeric' => 'Giá khuyến mãi phải là kiểu số',
            'default.boolean' => 'Trạng thái phải là true hoặc false',
        ];
    }
}
