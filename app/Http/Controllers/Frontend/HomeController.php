<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Blog;
use App\Models\Slider;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $sliders = Slider::all();
        $latest_blog = Blog::orderBy('updated_at', 'desc')->paginate(4);
        $products = Product::orderBy('updated_at', 'desc')->paginate(8);

        return view('frontend.home', compact('user', 'sliders', 'latest_blog', 'products'));
    }
}
