<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Attribute  $attribute
     * @return \Illuminate\Http\Response
     */
    public function list(Product $product)
    {
        $this->product = $product;

        $product_attributes = $product->product_attributes->all('id', 'value', 'code');
        
        dd($product_attributes);

        return datatables($attribute_values)
            ->addColumn('action', function ($attribute_value) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.attribute.value.destroy', [$this->attribute->id, $attribute_value->id]) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';

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
    public function index(Product $product)
    {
        dd($product);
        return view('backend.product-attribute.index', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function show(ProductAttribute $productAttribute)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductAttribute $productAttribute)
    {
        //
    }
}
