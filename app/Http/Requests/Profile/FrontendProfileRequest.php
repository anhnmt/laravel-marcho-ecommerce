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
        if(request()->exists('password') == false)
            return [
                'name' => 'required',
                'email' => "required|unique:users,email,$id,id",
            ];
        return[
            'oldpass' => 'required|password:web',
            'password' => 'required|min:8',
            'passconfirm' => 'required|same:password',
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        if(request()->exists('password') == false)
            return [
                'name.required' => 'Vui lòng nhập tên của bạn',
                'email.required' => 'Vui lòng nhập email của bạn',
                'email.unique' => 'Email này đã được sử dụng, vui lòng chọn email khác',
            ];
        return[
            'oldpass.required' => 'Vui lòng nhập mật khẩu cũ',
            'oldpass.password' => 'Mật khẩu không khớp',
            'password.required' => 'Vui lòng nhập mật khẩu mới',
            'password.min' => 'Mật khẩu tối thiểu 8 kí tự',
            'passconfirm.required' => 'Vui lòng nhập lại mật khẩu mới',
            'passconfirm.same' => 'Mật khẩu xác nhận không chính xác',
        ];
    }
}
