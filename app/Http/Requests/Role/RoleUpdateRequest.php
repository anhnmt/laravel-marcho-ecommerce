<?php

namespace App\Http\Requests\Role;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->hasPermissionTo('admin.role.edit') ||  Auth::user()->hasRole('super-admin') ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->route('role')->id;
        return [
            "name" => "required|unique:roles,name,$id,id"
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
