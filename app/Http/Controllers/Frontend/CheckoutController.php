<?php

namespace App\Http\Controllers\Frontend;

use Cart;
use App\Models\City;
use App\Models\District;
use App\Models\Ward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function index()
    {
        $cart = Cart::name('shopping');
        $items = $cart->getItems();
        $total = $cart->getItemsSubtotal();
        $subtotal = $cart->getSubtotal();
        $action = $cart->sumActionsAmount();
        $quantity = $cart->sumItemsQuantity();

        $cities = City::all();

        return view('frontend.checkout', compact(
            'cities',
            'total',
            'subtotal',
            'action',
            'quantity',
        ));
    }

    public function districts(Request $request)
    {
        if ($request->id == 0) return response()->json([]);
        $city = City::find($request->id);
        $districts = $city->districts;

        return response()->json($districts);
    }

    public function wards(Request $request)
    {
        if ($request->id == 0) return response()->json([]);
        $districts = District::find($request->id);
        $wards = $districts->wards;

        return response()->json($wards);
    }
}
