<?php

namespace App\Http\Requests\Profile;

use Illuminate\Foundation\Http\FormRequest;

class FrontendProfileRequest extends FormRequest
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
        $id = auth()->user()->id;
        if (request()->exists('password') == true)
            return [
                'oldpass' => 'required|password:web',
                'password' => 'required|min:8',
                'passconfirm' => 'required|same:password',
            ];
        if (request()->exists('address') == true)
            return [
                'city_id' => 'gt:0|exists:cities,id',
                'district_id' => 'gt:0|exists:districts,id',
                'ward_id' => 'gt:0|exists:wards,id',
                'address' => 'required'
            ];
        return [
            'name' => 'required',
            'email' => "required|unique:users,email,$id,id",

        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        if (request()->exists('password') == true)
            return [
                'oldpass.required' => 'Vui lòng nhập mật khẩu cũ',
                'oldpass.password' => 'Mật khẩu không khớp',
                'password.required' => 'Vui lòng nhập mật khẩu mới',
                'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
                'passconfirm.required' => 'Vui lòng nhập lại mật khẩu mới',
                'passconfirm.same' => 'Mật khẩu xác nhận không chính xác',
            ];
        if (request()->exists('address') == true)
            return [
                'city_id.gt' => 'Vui lòng chọn thành phố của bạn',
                'district_id.gt' => 'Vui lòng chọn quận huyện của bạn',
                'ward_id.gt' => 'Vui lòng chọn xã phường của bạn',
                'city_id.exists' => 'Thành phố bạn chọn không tồn tại',
                'district_id.exists' => 'Quận huyện bạn chọn không tồn tại',
                'ward_id.exists' => 'Xã phường bạn chọn không tồn tại',
                'address.required' => 'Vui lòng nhập địa chỉ của bạn',
            ];
        return [
            'name.required' => 'Vui lòng nhập tên của bạn',
            'email.required' => 'Vui lòng nhập email của bạn',
            'email.unique' => 'Email này đã được sử dụng, vui lòng chọn email khác',
        ];
    }
}
