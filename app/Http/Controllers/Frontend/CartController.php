<?php

namespace App\Http\Controllers\Frontend;

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
        $cart = Cart::name('shopping');
        $items = $cart->getItems();
        $total = $cart->getItemsSubtotal();
        $subtotal = $cart->getSubtotal();
        $action = $cart->sumActionsAmount();
        $quantity = $cart->sumItemsQuantity();

        // dd([
        //     $items,
        //     $total,
        //     $subtotal,
        //     $action,
        // ]);

        return view('frontend.cart', compact(
            'items',
            'total',
            'subtotal',
            'action',
            'quantity',
        ));
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

        $cart = Cart::name('shopping');

        $cart->addItem([
            'model' => $product,
            'id' => $product->id,
            'title' => $product->name,
            'quantity' => $request->quantity,
            'price' => $product->price,
            'options' => $options,
        ]);

        return redirect()->route('cart.index')->withSuccess('Thêm vào giỏ thành công');
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
        // dd($request->all());

        try {
            $cart = Cart::name('shopping');

            $item = $cart
                ->updateItem($id, [
                    'quantity' => $request->get('quantity'),
                ])
                ->getDetails();

            $total = $cart->getTotal();
            $subtotal = $cart->getSubtotal();
            $count = $cart->sumItemsQuantity();

            // dd($item);

            return response()->json([
                'success' => true,
                'msg' => 'Cập nhật giỏ hàng thành công!',
                'item_total' => number_format($item->total_price, 0) . 'đ',
                'cart_total' => number_format($total, 0) . 'đ',
                'cart_subtotal' => number_format($subtotal, 0) . 'đ',
                'cart_count' => number_format($count, 0),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => 'Không thể cập nhật giỏ hàng, hãy thử lại!',
            ]);
        }
    }

    /**
     * Discount the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function discount(Request $request)
    {
        // dd($request->all());

        try {
            $cart = Cart::name('shopping');

            $cart->applyAction([
                'group'      => 'Discount',
                'id'         => 1,
                'title'      => 'Sale 10%',
                'value'      => '-10%',
            ]);

            return redirect()->route('cart.index')->withSuccess('Thêm vào giỏ thành công');
        } catch (\Exception $e) {
            return redirect()->route('cart.index')->withError('Thêm vào giỏ thành công');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::name('shopping');
        $cart->removeItem($id);

        return redirect()->route('cart.index')->withSuccess('Xóa sản phẩm trong giỏ hàng thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function clear()
    {
        $cart = Cart::name('shopping');
        $cart->clearItems();

        return redirect()->route('cart.index')->withSuccess('Xóa giỏ hàng thành công');
    }
}
