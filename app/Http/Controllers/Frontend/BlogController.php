<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $blogs = Blog::paginate(8);

        $latest_blog = Blog::latest();

        $categories = Category::all();

        // dd($latest_blog);

        return view('frontend.blog', compact('blogs', 'latest_blog', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        // dd($blog->user->getShortName());
        
        $blog = Blog::findBySlug($blog->slug);

        $latest_blog = Blog::latest();

        $categories = Category::all();

        return view('frontend.blog_detail', compact('blog', 'latest_blog', 'categories'));
    }
}
