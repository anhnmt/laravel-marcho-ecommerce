<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\Product;
use App\Models\ProductAttribute;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Order\Frontend\OrderCreateRequest as OCR;
use App\Http\Requests\Order\Frontend\OrderUpdateRequest as OUR;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('frontend.profile.order', compact('orders'));
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
    public function store(OCR $request)
    {
        $cart = Cart::name('shopping');
        $items = $cart->getItems();
        $subtotal = $cart->getSubtotal();
        $request['user_id'] = auth()->user()->id;
        $request['total'] = $subtotal;

        try {
            $order = Order::create($request->except(['name', 'email', 'payment']));

            if ($order) {
                foreach ($items as  $item) {
                    $itemDetail = $item->getDetails();
                    $itemOption = $item->getOptions();
                    if (!$itemOption) {
                        $orderDetail = OrderDetail::create([
                            'order_id' => $order->id,
                            'product_id' => $itemDetail->id,
                            'quantity' => $itemDetail->quantity,
                            'price' => $itemDetail->total_price
                        ]);

                        if($orderDetail){
                            $oldquan = (int) $orderDetail->product->quantity;
                            $newquan = $oldquan - $itemDetail->quantity;
                            Product::find($orderDetail->product->id)->update(['quantity' => $newquan]);
                        }
                    } else {
                        $orderDetail = OrderDetail::create([
                            'order_id' => $order->id,
                            'product_id' => $itemDetail->id,
                            'product_attribute_id' => $itemOption['product_attribute_id'],
                            'quantity' => $itemDetail->quantity,
                            'price' => $itemDetail->total_price
                        ]);

                        if($orderDetail){
                            $oldquan = (int) $orderDetail->productAttribute->quantity;
                            $newquan = $oldquan - $itemDetail->quantity;
                            ProductAttribute::find($orderDetail->productAttribute->id)->update(['quantity' => $newquan]);
                        }
                    }
                }
            }

            $cart = Cart::name('shopping');
            $cart->clearItems();

            return redirect()->route('user.order.index')->withSuccess('Thanh toán thành công');
        } 

        catch (\Exception $e) 
        {
            return back()->withInput()->withErrors('Đặt hàng thất bại, vui lòng thử lại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($order)
    {
        $order = Order::withTrashed()->find($order);
        $cities = City::all();
        $districts = District::where('parent_code', $order->city_id)->get();
        $wards = Ward::where('parent_code', $order->district_id)->get();
        $orderDetails = $order->orderDetails;
        $order->fullAddress = $order->address . ', ' . $order->ward->path_with_type;
        return view('frontend.profile.order_detail', compact('orderDetails', 'order', 'cities', 'districts', 'wards'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $cities = City::all();
        $districts = District::where('parent_code', $order->city_id)->get();
        $wards = Ward::where('parent_code', $order->district_id)->get();
        $orderDetails = $order->orderDetails;
        $order->fullAddress = $order->address . ', ' . $order->ward->path_with_type;
        return view('frontend.profile.order_detail', compact('orderDetails', 'order', 'cities', 'districts', 'wards'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(OUR $request, Order $order)
    {
        // dd($request->all());

        if($order->update($request->all()))
        {
            return redirect()->route('user.order.show', $order->id)->withSuccess('Cập nhật đơn hàng thành công');
        }

        return redirect()->back()->withInput()->withErrors('Cập nhật đơn hàng thất bại, vui lòng thử lại!');
    }

    public function trash()
    {
        $orders = Order::onlyTrashed()->get();
        return view('frontend.profile.order_cancel', compact('orders'));
    }

    public function cancelOrder(Request $request, Order $order)
    {
        if($order->update($request->all()))
        {
            $order->delete();
            $orderDetails = $order->orderDetails;
            foreach ($orderDetails as $orderDetail) {
                if(isset($orderDetail->product_attribute_id)){
                    $id = $orderDetail->productAttribute->id;
                    $newquan = $orderDetail->productAttribute->quantity + $orderDetail->quantity;
                    ProductAttribute::find($id)->update(['quantity' => $newquan]);
                }else{
                    $id = $orderDetail->product->id;
                    $newquan = $orderDetail->product->quantity + $orderDetail->quantity;
                    Product::find($id)->update(['quantity' => $newquan]);
                }
            }
            return redirect()->route('user.order.index', $order->id)->withSuccess('Cập nhật đơn hàng thành công');
        }

        return redirect()->back()->withInput()->withErrors('Cập nhật đơn hàng thất bại, vui lòng thử lại!');
    }    

}
