<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class HomeController extends Controller
{

    /**
     * Show the application.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        dd(Str::Sku('xin chào các bạn'));
        $latest_blog = Blog::latest();

        return view('frontend.home', compact('latest_blog'));
    }
}
