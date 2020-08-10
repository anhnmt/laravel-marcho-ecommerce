<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Product $product)
    {
        $request['user_id'] = auth()->user()->id;
        $request['product_id'] = $product->id;

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'rating' => 'required|numeric|between:1,5',
            'body' => 'required|string',
        ], [
            'rating.required' => 'Vui lòng đánh giá trước khi đăng',
            'body.required' => 'Vui lòng viết bình luận trước khi đăng',
        ]);

        if ($validator->fails()) {
            return redirect()->to(
                url()->previous() . '#review_section'
            )->withInput()->withErrors($validator);
        }

        Review::create($request->only('user_id', 'product_id', 'rating', 'body'));

        return redirect()->route('product.show', $product->slug)->withSuccess('Đăng bình luận thành công');
    }
}
