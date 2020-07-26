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
        $sliders = Slider::all();
        $latest_blog = Blog::latest(3);
        $products = Product::orderBy('id', 'desc')->paginate(6);

        return view('frontend.home', compact('sliders', 'latest_blog', 'products'));
    }
}
