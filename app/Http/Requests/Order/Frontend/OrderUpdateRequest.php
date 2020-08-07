<?php

namespace App\Http\Requests\Order\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class OrderUpdateRequest extends FormRequest
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
            'phone' => ['required', 'regex:/^[0][3|8|9]\d{8}$/'],
            'city_id' => 'gt:0|exists:cities,id',
            'district_id' => 'gt:0|exists:districts,id',
            'ward_id' => 'gt:0|exists:wards,id',
            'address' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'Vui lòng nhập số điện thoại của bạn.',
            'phone.regex' => 'Số điện thoại bạn nhập không đúng định dạng, vui lòng nhập lại.',
            'city_id.gt' => 'Vui lòng chọn thành phố của bạn',
            'district_id.gt' => 'Vui lòng chọn quận huyện của bạn',
            'ward_id.gt' => 'Vui lòng chọn xã phường của bạn',
            'city_id.exists' => 'Thành phố bạn chọn không tồn tại',
            'district_id.exists' => 'Quận huyện bạn chọn không tồn tại',
            'ward_id.exists' => 'Xã phường bạn chọn không tồn tại',
            'address.required' => 'Vui lòng nhập địa chỉ của bạn',
        ];
    }
}
