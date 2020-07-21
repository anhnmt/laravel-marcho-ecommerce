<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
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
        
        $blogs = Blog::paginate(10);

        $latest_blog = Blog::orderBy('id', 'desc')->take(3)->get();

        // dd($latest_blog);

        return view('frontend.blog', compact('blogs', 'latest_blog'));
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

        return view('frontend.blog_detail', compact('blog'));
    }
}
