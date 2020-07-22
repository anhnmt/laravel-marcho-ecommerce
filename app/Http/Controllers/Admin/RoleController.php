<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function list()
    {
        $roles = Role::select(['id', 'name', 'guard_name']);
        return datatables($roles)
            ->addColumn('action', function ($role) {
                $action = '<form class="delete-form" action="' . route('admin.role.destroy', $role->id) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE">';
                
                $action .= '<a href="' . route('admin.role.edit', $role->id) . '" class="btn btn-sm btn-warning">Sửa</a> ';
                if($role->name !=  'super-admin')
                $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';

                $action .= '</form>';

                return $action;
            })
            ->rawColumns(['image', 'status', 'action'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('backend.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $permissions = $request->permissions;
        $role = Role::create($request->only('name'));
        if($role){
            $role->syncPermissions($permissions);
            return redirect()->route('admin.role.index')->withSuccess('Thêm nhóm quyền thành công!');
        };
        
        return redirect()->back()->with('Thêm nhóm quyền thất bại');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $permissionsAssigned = $role->getPermissionNames();
        return view('backend.role.edit', compact('role', 'permissions', 'permissionsAssigned'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $permissions = $request->permissions;
        if($role->update($request->only('name'))){
            $role->syncPermissions($permissions);
            return redirect()->route('admin.role.index')->withSuccess('Sửa nhóm quyền thành công!');
        };
        
        return redirect()->back()->with('Sửa nhóm quyền thất bại');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->delete()) return redirect()->route('admin.role.index')->with('Xóa nhóm quyền thành công');

        return redirect()->back()->with('Xóa nhóm quyền thất bại');

    }
}
