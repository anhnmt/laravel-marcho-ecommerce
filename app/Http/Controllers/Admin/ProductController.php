<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $categories = Product::select(['id', 'name', 'slug', 'sku', 'image', 'status']);
        return datatables($categories)
            ->addColumn('image', function ($product) {
                $product->image = $product->image ? $product->image : 'assets/img/placeholder.png';
                return '<img height="70px" width="70px" src="' . asset($product->image) . '"/>';
            })
            ->addColumn('status', function ($product) {
                return $product->status === 1 ? '<span class="badge badge-success">Kích hoạt</span>' : '<span class="badge badge-warning">Bản nháp</span>';
            })
            ->addColumn('action', function ($product) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.product.destroy', $product->id) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';
                if(auth()->user()->can('admin.product.attribute.index'))
                $action .= '<a href="' . route('admin.product.attribute.index', $product->id) . '" class="btn btn-sm btn-success">Thuộc tính</a>';
                if(auth()->user()->can('admin.product.edit'))
                $action .= '<a href="' . route('admin.product.edit', $product->id) . '" class="btn btn-sm btn-warning">Sửa</a> ';
                if(auth()->user()->can('admin.product.destroy'))
                $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';

                if((auth()->user()->can('admin.product.edit') && auth()->user()->can('admin.product.destroy') && auth()->user()->can('admin.admin.product.attribute.index')) == false)  
                $action .= "<span>Không có hành động nào</span>";

                $action .= '</div></form>';

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
        return view('backend.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        $attibutes = Attribute::get();
        $attibute_values = AttributeValue::get();
        return view('backend.product.create', compact('categories', 'attibutes', 'attibute_values'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:products,name',
            'slug' => 'nullable|unique:products,slug',
            'sku' => 'nullable|unique:products,sku',
            'image' => 'nullable',
            'description' => 'nullable',
            'body' => 'nullable',
            'quantity' => 'required|integer',
            'price' => 'required|numeric',
            'sale_price' => 'nullable|numeric',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'name.unique' => 'Tên sản phẩm đã tồn tại',
            'slug.unique' => 'Slug đã tồn tại',
            'sku.unique' => 'SKU đã tồn tại',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
            'price.required' => 'Vui lòng nhập giá sản phẩm',
            'price.numeric' => 'Giá tiền phải là kiểu số',
            'sale_price.numeric' => 'Giá khuyến mãi phải là kiểu số',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        Product::create($request->all());

        return redirect()->route('admin.product.index')->withSuccess('Thêm sản phẩm thành công');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all(); 
        $product->image = asset($product->image ? $product->image : 'assets/img/placeholder.png');

        return view('backend.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'slug' => 'nullable|string',
            'sku' => 'nullable|string',
            'image' => 'nullable',
            'description' => 'nullable',
            'body' => 'nullable',
            'quantity' => 'required|integer',
            'status' => 'boolean',
        ], [
            'name.required' => 'Vui lòng nhập tên danh mục',
            'status.boolean' => 'Trạng thái phải là true hoặc false',
            'quantity.required' => 'Vui lòng nhập số lượng',
            'quantity.integer' => 'Số lượng phải là số nguyên',
        ]);

        if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }

        $product->update($request->all());

        return redirect()->route('admin.product.index')->withSuccess('Cập nhật sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.product.index')->withSuccess('Xoá sản phẩm thành công');
    }
}
