<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductReview;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductReviewController extends Controller
{
    public function show($id)
    {
        $product = Product::findOrFail($id);
        $reviews = ProductReview::where('product_id', $id)->get();
        $averageRating = $reviews->avg('rating') ?? 0;

        $reviewCounts = [
            1 => $reviews->where('rating', 1)->count(),
            2 => $reviews->where('rating', 2)->count(),
            3 => $reviews->where('rating', 3)->count(),
            4 => $reviews->where('rating', 4)->count(),
            5 => $reviews->where('rating', 5)->count(),
        ];

        return view('reviews.show', compact('product', 'reviews', 'averageRating', 'reviewCounts'));
    }

    public function create($id)
    {
        $product = Product::findOrFail($id);
        return view('reviews.create', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        ProductReview::create([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return redirect()->route('reviews.show', ['id' => $request->product_id])
            ->with('success', 'Review submitted successfully.');
    }
}
