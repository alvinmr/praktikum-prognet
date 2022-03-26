<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductUserController extends Controller
{
    public function show(Product $product)
    {
        $reviews = $product->reviews()->get();
        $reviewCount = $product->reviews()->count();
        $rate = [
            '1' => $reviews->where('rate', 1)->count(),
            '2' => $reviews->where('rate', 2)->count(),
            '3' => $reviews->where('rate', 3)->count(),
            '4' => $reviews->where('rate', 4)->count(),
            '5' => $reviews->where('rate', 5)->count(),
        ];
        $isHasReview = $product->reviews()->where('user_id', auth()->user()->id)->count() > 0;
        return view('user.product.show', compact('product', 'reviews', 'rate', 'reviewCount', 'isHasReview'));
    }

    public function storeReview(Request $request, Product $product)
    {
        if ($product->reviews()->where('user_id', auth()->user()->id)->count() > 0) return redirect()->back();

        $request->validate([
            'content' => 'required|min:10',
            'rating' => 'required|numeric|min:1|max:5',
        ]);

        $product->reviews()->create([
            'user_id' => auth()->user()->id,
            'content' => $request->content,
            'rate' => $request->rating,
        ]);
        return redirect()->back();
    }

    public function buyNow(Product $product)
    {
        return view('user.transaction.buy-now', compact('product'));
    }
}