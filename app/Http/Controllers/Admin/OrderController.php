<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $orders = Order::withTrashed()->get();

        return datatables($orders)
            ->addColumn('user', function ($order) {
                return $order->orderUser->name;
            })
            ->addColumn('phone', function ($order) {
                return $order->phone;
                
            })
            ->addColumn('address', function ($order) {
                return $order->address . ', ' . $order->ward->path_with_type;
            })
            ->addColumn('total', function ($order) {
                return number_format($order->total, 0) . 'đ';
                
            })
            ->addColumn('status', function ($order) {
                if($order->status === 0) return '<span>Đang xử lí</span>';
                if($order->status === 1) return '<span>Đã xử lí</span>';
                if($order->status === 2) return '<span>Đang giao hàng</span>';
                if($order->status === 3) return '<span>Đã giao hàng</span>';
                if($order->status === 4) return '<span>Đã huỷ</span>';
                
            })
            ->addColumn('action', function ($order) {
                if (auth()->user()->can('admin.order.edit') && $order->status !== 4)
                    return '<a href="' . route('admin.order.edit', $order->id) . '" class="btn btn-sm btn-warning">Sửa</a> ';
                else
                    return "<span>Không có hành động nào</span>";
            })
            ->rawColumns(['id', 'user', 'phone', 'address', 'total', 'status', 'action'])
            ->toJson();
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.order.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $orderDetails = $order->orderDetails;
        $order->fullAddress = $order->address . ', ' . $order->ward->path_with_type;
        return view('backend.order.edit', compact('order', 'orderDetails'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if($order->update($request->all()))
        {
            return redirect()->route('admin.order.index')->withSuccess('Cập nhật đơn hàng thành công');
        }
        return back()->withInput()->withErrors('Cập nhật đơn hàng thất bại, vui lòng thử lại!');
    }
}
