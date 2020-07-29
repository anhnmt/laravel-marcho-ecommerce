<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $cart = Cart::restore($userId);

        // dd($cart->content());

        $items = Cart::content();
        $total = Cart::total();
        $subtotal = Cart::subtotal();

        // dd([
        //     $items,
        //     $total,
        //     $subtotal,
        // ]);

        return view('frontend.cart', compact(
            'items',
            'total',
            'subtotal',
        ));
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
        // dd($request->all());

        $product = Product::find($request->product);

        if ($product->attributes()->count() > 0) {
            $productAttr = $product->attributes()->where('default', 1)->first();

            if (isset($productAttr->sale_price)) {
                $product->price = $productAttr->price;

                if (!is_null($productAttr->sale_price)) {
                    $product->price = $productAttr->sale_price;
                }
            }
        }

        $options = [];
        if ($request->has('productAttribute')) {
            $attr = ProductAttribute::find($request->productAttribute);
            $product->price = $attr->price;

            $options['product_attribute_id'] = $request->productAttribute;
            $options['attribute_value'] = $attr->attributesValues->toArray();
        }

        // dd($product->image);

        $userId = auth()->user()->id;
        $cart = Cart::store($userId);

        Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'qty' => $request->quantity,
            'price' => $product->price,
            'weight' => 0,
            'options' => $options,
        ])->associate('App\Models\Product');

        return redirect()->route('cart.index')->withSuccess('Thêm vào giỏ thành công');
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        $userId = auth()->user()->id;
        $cart = Cart::instance($userId);
        $cart->remove($rowId);

        return redirect()->route('cart.index')->withSuccess('Xóa sản phẩm trong giỏ hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        $userId = auth()->user()->id;
        $cart = Cart::instance($userId);
        $cart->destroy();

        return redirect()->route('cart.index')->withSuccess('Xóa giỏ hàng thành công');
    }
}
