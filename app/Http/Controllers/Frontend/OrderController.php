<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $cart = Cart::name('shopping');
        $items = $cart->getItems();
        $subtotal = $cart->getSubtotal();

        // dd($request->all());

        $validator = Validator::make($request->all(), 
            [
                'name' => 'required',
                'email' => 'required|email',
                'phone' => ['required', 'regex:/^[0][3|8|9]\d{8}$/'],
                'city_id' => 'gt:0',
                'district_id' => 'gt:0',
                'ward_id' => 'gt:0',
                'address' => 'required'

            ],
            [
                'name.required' => 'Vui lòng nhập tên của bạn.',
                'email.email' => 'Email bạn nhập không đúng định dạng, vui lòng nhập lại.',
                'email.required' => 'Vui lòng nhập email của bạn.',
                'phone.required' => 'Vui lòng nhập số điện thoại của bạn.',
                'phone.regex' => 'Số điện thoại bạn nhập không đúng định dạng, vui lòng nhập lại.',
                'city_id.gt' => 'Vui lòng chọn thành phố của bạn',
                'district_id.gt' => 'Vui lòng chọn quận huyện của bạn',
                'ward_id.gt' => 'Vui lòng chọn xã phường của bạn',
                'address.required' => 'Vui lòng nhập địa chỉ của bạn',
            ]
        );

        if($validator->fails()) return back()->withInput()->withErrors($validator);

        $request['user_id'] = auth()->user()->id;
        $request['total'] = $subtotal;
        // foreach ($items as  $item) {
        //     $itemDetail = $item->getDetails();
        //     $itemOption = $item->getOptions();
        //     dd($itemDetail);
        // }
        
        try{
            $order = Order::create($request->except(['name', 'email', 'payment']));

            if($order){
                foreach ($items as  $item) {
                    $itemDetail = $item->getDetails();
                    $itemOption = $item->getOptions();
                    if(!$itemOption)
                    {
                        OrderDetail::create([
                            'order_id' => $order->id,
                            'product_id' => $itemDetail->id,
                            'quantity' => $itemDetail->quantity,
                            'price' => $itemDetail->total_price
                        ]);
                    }
                    else
                    {
                        OrderDetail::create([
                            'order_id' => $order->id,
                            'product_id' => $itemDetail->id,
                            'product_attribute_id' => $itemOption['product_attribute_id'],
                            'quantity' => $itemDetail->quantity,
                            'price' => $itemDetail->total_price
                        ]);
                    }
                }
                
            }

            $cart = Cart::name('shopping');
            $cart->clearItems();
            
            return redirect()->route('home')->withSuccess('Thanh toán thành công');
        }

        catch(\Exception $e){
            return back()->withInput()->withErrors('Đặt hàng thất bại, vui lòng thử lại!');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
