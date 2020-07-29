<?php

namespace App\Http\Controllers\Frontend;

use Vanthao03596\HCVN\Models\City;
use Vanthao03596\HCVN\Models\District;
use Vanthao03596\HCVN\Models\Ward;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function index(){
        $cities = City::all();
        return view('frontend.checkout', compact('cities'));
    }
    
    public function districts(Request $request){
        if($request->id == 0) return response()->json([]);
        $city = City::find($request->id);
        $districts = $city->districts;
        return response()->json($districts);
    }
    
    public function wards(Request $request){
        if($request->id == 0) return response()->json([]);
        $districts = District::find($request->id);
        $wards = $districts->wards;
        return response()->json($wards);
    }
}
