<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function list(Attribute $attribute)
    {
        // $this->attribute = $attribute;

        $attribute_values = AttributeValue::where('attribute_id', $attribute->id)->select('id', 'attribute_id', 'value', 'code');

        return datatables($attribute_values)
            ->addColumn('action', function ($attribute_value) {
                $user = auth()->user();

                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.attribute.value.destroy', [$this->attribute->id, $attribute_value->id]) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';
                if ($user->can('admin.attribute.value.destroy')) {
                    $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';
                } else {
                    $action .= '<span>Không có hành động nào</span>';
                }
                $action .= '</div></form>';

                return $action;
            })
            ->rawColumns(['action'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function index(Attribute $attribute)
    {
        // dd($attribute);
        return view('backend.attribute-value.index', compact('attribute'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Attribute $attribute)
    {
        // dd($attribute->id);

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

        $request['attribute_id'] = $attribute->id;

        AttributeValue::create($request->only('attribute_id', 'value', 'code'));

        return redirect()->route('admin.attribute.value.index', $attribute->id)->withSuccess('Thêm giá trị thuộc tính thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attribute  $attribute
     * @param  \App\AttributeValue  $attribute_value
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attribute $attribute, $attribute_value)
    {
        // dd([$attribute, $attribute_value]);
        $attribute_value = AttributeValue::findOrFail($attribute_value);

        $attribute_value->delete();

        return redirect()->route('admin.attribute.value.index', $attribute->id)->withSuccess('Xoá giá trị thuộc tính thành công');
    }
}
