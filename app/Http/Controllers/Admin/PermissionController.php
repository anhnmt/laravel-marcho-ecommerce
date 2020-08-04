<?php

namespace App\Http\Controllers\Admin;

use App\Models\Permission;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function list()
    {
        $permissions = Permission::select('id', 'name', 'guard_name');

        return datatables($permissions)
            ->addColumn('action', function ($permission) {
                if(auth()->user()->can('admin.permission.destroy'))
                return '<button data-delete="' . $permission->id . '" class="btn btn-sm btn-danger"><i class="far fa-trash"></i></button>';
                else{
                return '<span>Không có hành động nào</span>';
                }
            })
            ->rawColumns(['action'])
            ->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permission.index')->withSuccess('Xoá quyền thành công');
    }
}
