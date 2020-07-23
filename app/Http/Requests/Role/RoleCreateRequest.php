<?php

namespace App\Http\Requests\Role;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RoleCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('admin.role.create') ||  Auth::user()->hasRole('super-admin') ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "name" => "required|unique:roles"
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "Tên nhóm quyền không được để trống",
            "name.unique" => "Tên nhóm quyền đã tồn tại",
        ];
    }
}
