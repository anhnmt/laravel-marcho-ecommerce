<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $attributes = Attribute::select(['id', 'name', 'slug']);

        return datatables($attributes)
            ->addColumn('action', function ($attribute) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.attribute.destroy', $attribute->id) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';
                
                $action .= '<a href="' . route('admin.attribute.value.index', $attribute->id) . '" class="btn btn-sm btn-success">Giá trị</a>';
                $action .= '<a href="' . route('admin.attribute.edit', $attribute->id) . '" class="btn btn-sm btn-warning">Sửa</a>';
                $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';

                $action .= '</div></form>';

                return $action;
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
        return view('backend.attribute.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attribute.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:attributes,name',
            'slug' => 'nullable|unique:attributes,slug',
        ], [
            'name.required' => 'Vui lòng nhập tên thuộc tính',
            'name.unique' => 'Tên thuộc tính đã tồn tại',
            'slug.unique' => 'Đường dẫn đã tồn tại',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return redirect()->route('admin.attribute.index')->withSuccess('Thêm thuộc tính thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(Attribute $attribute)
    {
        return view('backend.attribute.edit', compact('attribute'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attribute $attribute)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'nullable|string',
        ], [
            'name.required' => 'Vui lòng nhập tên thuộc tính',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $attribute->update($request->all());

        return redirect()->route('admin.attribute.index')->withSuccess('Cập nhật thuộc tính thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute)
    {
        $attribute->delete();

        return redirect()->route('admin.attribute.index')->withSuccess('Xoá thuộc tính thành công');
    }
}
