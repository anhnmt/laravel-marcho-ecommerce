<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function product(Request $request)
    {
        // dd($request->all());
        $user = auth()->user();
        $categories = Category::all();
        $products = Product::with('attributes')->where('status', 1)
            ->keyword($request)
            ->category($request)
            ->price($request)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('frontend.product', compact('user', 'products', 'categories'));
    }
}
