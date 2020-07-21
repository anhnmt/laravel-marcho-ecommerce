<?php

namespace App\Http\Controllers\Admin;

use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $attribute_values = AttributeValue::select(['id', 'value', 'code']);

        return datatables($attribute_values)
            ->addColumn('action', function ($attribute_value) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.attribute-value.destroy', $attribute_value->id) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE">';
                
                $action .= '<a href="' . route('admin.attribute-value.edit', $attribute_value->id) . '" class="btn btn-sm btn-warning">Sửa</a> ';
                $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';

                $action .= '</form>';

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
        return view('backend.attribute-value.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.attribute-value.index');
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
            'value' => 'required|string|unique:attribute_values,value',
            'code' => 'nullable|unique:attribute_values,code',
        ], [
            'value.required' => 'Vui lòng nhập giá trị thuộc tính',
            'value.unique' => 'Giá trị thuộc tính đã tồn tại',
            'code.unique' => 'Code đã tồn tại',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        return redirect()->route('admin.attribute-value.index')->withSuccess('Thêm giá trị thuộc tính thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function edit(AttributeValue $attribute_value)
    {
        // dd($attribute_value);
        return view('backend.attribute-value.index', compact('attribute_value'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AttributeValue $attribute_value)
    {
        $validator = Validator::make($request->all(), [
            'value' => 'required|string',
            'code' => 'nullable|string',
        ], [
            'value.required' => 'Vui lòng nhập giá trị thuộc tính',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $attribute_value->update($request->all());

        return redirect()->route('admin.attribute-value.index')->withSuccess('Cập nhật giá trị thuộc tính thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(AttributeValue $attribute_value)
    {
        $attribute_value->delete();

        return redirect()->route('admin.attribute-value.index')->withSuccess('Xoá giá trị thuộc tính thành công');
    }
}
