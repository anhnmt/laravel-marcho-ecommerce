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
    public function index(Request $request)
    {
        $blogs = Blog::where('status', 1)
            ->keyword($request)
            ->orderBy('id', 'desc')
            ->paginate(8);

        $latest_blog = Blog::orderBy('updated_at', 'desc')->paginate(6);
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

        $comments = $blog->comments()->all();

        $latest_blog = Blog::orderBy('updated_at', 'desc')->paginate(6);

        $categories = Category::all();

        $user = auth()->user();

        if (auth()->check()) {
            $user->avatar = $user->avatar ? $user->avatar : 'assets/img/user2-160x160.jpg';
        }

        return view('frontend.blog_detail', compact('user', 'blog', 'latest_blog', 'categories', 'comments'));
    }
}
