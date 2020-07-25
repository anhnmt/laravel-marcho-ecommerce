<?php

namespace App\Http\Controllers\Frontend;

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
        $slider = Slider::all();
        $latest_blog = Blog::latest();

        return view('frontend.home', compact('slider', 'latest_blog'));
    }
}
