<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $categories = Category::all();
        $products = Product::orderBy('id', 'desc')->paginate(10);

        return view('frontend.product', compact('user', 'products', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // dd($blog->user->getShortName());

        $product = Product::findBySlug($product->slug);
        // dd($product->name);

        $relatedProducts = Product::where([
            ['category_id', $product->category_id],
            ['id', '!=', $product->id],
        ])->orderBy('name', 'desc')->select('id', 'name', 'slug', 'price', 'sale_price', 'image')->take(6)->get();

        $productAttributes = $product->attributes;

        // dd($productAttributes);
        // $comments = $product->comments()->all();

        $latest_blog = Blog::latest();

        $categories = Category::all();

        $user = auth()->user();

        if ($user) {
            $user->avatar = $user->avatar ? $user->avatar : 'assets/img/user2-160x160.jpg';
        }

        return view('frontend.product_detail', compact(
            'user',
            'product',
            'productAttributes',
            'relatedProducts',
            'latest_blog',
            'categories',
        ));
    }
}
