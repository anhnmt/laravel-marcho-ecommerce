<?php

namespace App\Http\Controllers\Admin;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\AttributeValueProductAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProductAttribute\CreateProductAttributeRequest;

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

        $productAttributes = ProductAttribute::where('product_id', $product->id)->orderBy('id', 'desc')->select('id', 'quantity', 'price', 'sale_price', 'default');

        // dd($productAttributes->product->id);

        return datatables($productAttributes)
            ->addColumn('price', function ($productAttribute) {
                return number_format($productAttribute->price, 0) . 'đ';
            })
            ->addColumn('sale_price', function ($productAttribute) {
                return number_format($productAttribute->sale_price, 0) . 'đ';
            })
            ->addColumn('attributeValue', function ($productAttribute) {
                $action = '<ul class="list-unstyled">';

                foreach ($productAttribute->attributesValues as $item) {
                    $action .= '<li>' . $item->attribute->name . ': ' . $item->value . '</li>';
                }

                $action .= '</ul>';

                return $action;
            })
            ->addColumn('action', function ($productAttribute) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.product.attribute.destroy', [$this->product->id, $productAttribute->id]) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';

                if (auth()->user()->can('admin.product.attribute.destroy')) {
                    $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';
                } else {
                    $action .= "<span>Không có hành động nào</span>";
                }

                $action .= '</div></form>';

                return $action;
            })
            ->rawColumns(['attributeValue', 'action'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        // dd($product);
        $attributes = Attribute::all();
        return view('backend.product-attribute.index', compact('product', 'attributes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductAttributeRequest $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $request['product_id'] = $product->id;

            $product_attribute = ProductAttribute::create($request->only(
                'product_id',
                'quantity',
                'price',
                'sale_price',
                'default',
            ));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Thêm thuộc tính sản phẩm không thành công!');
        }

        try {
            // dd($request->attributeValue);
            foreach ($request->attributeValue as $attribute_value_id) {
                AttributeValueProductAttribute::create([
                    'attribute_value_id' => $attribute_value_id,
                    'product_attribute_id' => $product_attribute->id,
                ]);
            }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Thêm giá trị thuộc tính không thành công!');
        }

        DB::commit();

        return redirect()->route('admin.product.attribute.index', $product->id)->withSuccess('Thêm thuộc tính sản phẩm thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductAttribute  $productAttribute
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $productAttribute)
    {
        // dd([$product, $productAttribute]);

        DB::beginTransaction();

        $productAttribute = ProductAttribute::findOrFail($productAttribute);

        // Tìm và xóa trong AttributeValueProductAttribute
        try {
            AttributeValueProductAttribute::where('product_attribute_id', $productAttribute->id)->delete();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Xóa giá trị thuộc tính không thành công!');
        }

        // Tìm và xóa trong ProductAttribute
        try {
            $productAttribute->delete();
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Xóa thuộc tính sản phẩm không thành công!');
        }

        DB::commit();

        return redirect()->route('admin.product.attribute.index', $product->id)->withSuccess('Xoá thuộc tính sản phẩm thành công');
    }
}
