<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductAttribute;
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
        $product = Product::findBySlug($product->slug);
        // dd($product->name);

        $relatedProducts = Product::where([
            ['category_id', $product->category_id],
            ['id', '!=', $product->id],
        ])
        ->orderBy('name', 'desc')
        ->select('id', 'name', 'slug', 'price', 'sale_price', 'image')
        ->take(10)->get();

        $productAttributes = $product->attributes;

        if ($productAttributes->isNotEmpty()) {
            $product->price = $productAttributes->first()->price;
            $product->sale_price = $productAttributes->first()->sale_price;
        }

        // dd($productAttributes);

        $latest_blog = Blog::orderBy('updated_at', 'desc')->paginate(6);

        $categories = Category::all();

        $user = auth()->user();

        if ($user) {
            $user->avatar = $user->avatar ? $user->avatar : 'assets/img/user2-160x160.jpg';
        }

        $reviews = $product->reviews()->all();

        return view('frontend.product_detail', compact(
            'user',
            'product',
            'productAttributes',
            'relatedProducts',
            'latest_blog',
            'categories',
            'reviews',
        ));
    }

    public function quantity(ProductAttribute $productAttribute)
    {
        // dd($productAttribute);
        try {
            return response()->json([
                'success' => true,
                'msg' => 'Lấy thông tin thuộc tính sản phẩm thành công',
                'quantity' => $productAttribute->quantity,
                'price' => $productAttribute->price,
                'sale_price' => $productAttribute->sale_price,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => 'Có lỗi xảy ra, vui lòng thử lại',
            ]);
        }
    }
}
