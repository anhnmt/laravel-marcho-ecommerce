<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Models\Favorite;
use App\Http\Controllers\Controller;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function list()
    {
        $user = auth()->user();
        $favorites = $user->favorites;

        return datatables($favorites)
            ->addColumn('image', function ($favorite) {
                $thumb_url = $favorite->image ? $favorite->image : 'assets/img/placeholder.png';
                return '<img loading="lazy" height="70px" width="70px" src="' . $thumb_url . '"/>';
            })
            ->addColumn('price', function ($productAttribute) {
                return number_format($productAttribute->price, 0) . 'đ';
            })
            ->addColumn('status', function ($favorite) {
                $action = '<a href="' . route('product.show', $favorite->slug) . '" class="btn btn-sm btn-fill-out">Xem sản phẩm</a>';

                return $action;
            })
            ->addColumn('action', function ($favorite) {
                $action = '<button class="btn remove-favorite" data-product="' . $favorite->id . '"><i class="fal fa-times"></i></button>';

                return $action;
            })
            ->rawColumns(['image', 'status', 'action'])
            ->toJson();
    }

    public function index()
    {
        $user = auth()->user();
        $favorites = $user->favorites;

        return view('frontend.favorite');
    }

    /**
     * Favorite a particular post
     *
     * @param  Product $product
     * @return Response
     */
    public function favorite(Product $product)
    {
        try {
            $user = auth()->user();

            if ($user->favorited($product->id)) {
                $user->favorites()->detach($product->id);

                return response()->json([
                    'success' => true,
                    'msg' => 'Bỏ thích sản phẩm thành công.',
                    'favoriteCount' => $user->favorites()->count(),
                ]);
            }

            $user->favorites()->attach($product->id);

            return response()->json([
                'success' => true,
                'msg' => 'Thích sản phẩm thành công.',
                'favoriteCount' => $user->favorites()->count(),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'msg' => 'Có lỗi xảy ra, vui lòng thử lại.',
            ]);
        }
    }
}
