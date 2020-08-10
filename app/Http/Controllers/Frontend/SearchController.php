<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Blog;
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
        $products = Product::query()
            ->keyword($request)
            ->orderBy('id', 'desc')
            ->paginate(10);

        return view('frontend.product', compact('user', 'products', 'categories'));
    }
    
    public function blog(Request $request)
    {
        $blogs = Blog::query()->keyword($request)->orderBy('id', 'desc')->paginate(8);

        $latest_blog = Blog::orderBy('updated_at', 'desc')->paginate(6);

        $categories = Category::all();

        return view('frontend.blog', compact('blogs', 'latest_blog', 'categories'));
    }
}
