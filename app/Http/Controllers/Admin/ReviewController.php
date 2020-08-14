<?php

namespace App\Http\Controllers\Admin;

use App\Models\Review;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list(Product $product)
    {
        $this->product = $product;
        $reviews = Review::where('product_id', $product->id)->all();

        return datatables($reviews)
            ->addColumn('user', function ($review) {
                return $review->user->name;
            })
            ->addColumn('rating', function ($review) {
                return $review->rating . ' <span><i class="fas fa-star" style="color:#fec35b"></i></span>';
            })
            ->addColumn('action', function ($review) {
                $action = '<form class="delete-form d-flex justify-content-center" action="' . route('admin.product.review.destroy', [$this->product->id, $review->id]) . '" method="POST"><input type="hidden" name="_token" value="' . csrf_token() . '"><input type="hidden" name="_method" value="DELETE"><div class="btn-group">';

                if (auth()->user()->can('admin.product.review.edit'))
                    $action .= '<a href="' . route('admin.product.review.edit', [$this->product->id, $review->id]) . '" class="btn btn-sm btn-warning">Sửa</a> ';

                if (auth()->user()->can('admin.product.review.destroy'))
                    $action .= '<button type="submit" class="btn btn-sm btn-danger">Xoá</button>';

                if ((auth()->user()->cannot('admin.product.review.edit') && auth()->user()->cannot('admin.product.review.destroy')))
                    $action .= "<span>Không có hành động nào</span>";

                $action .= '</div></form>';

                return $action;
                dd($action);
            })
            ->rawColumns(['id', 'user', 'rating', 'body', 'action'])
            ->toJson();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        // dd($product);
        return view('backend.review.index', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Review $review)
    {
        return view('backend.review.edit', compact('product', 'review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
