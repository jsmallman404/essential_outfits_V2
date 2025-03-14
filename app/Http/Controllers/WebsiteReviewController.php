<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteReview;

class WebsiteReviewController extends Controller
{
    public function create()
    {
        return view('website_reviews.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating'  => 'required|integer|min:1|max:5',
            'comment' => 'required|string|max:1000',
        ]);

        WebsiteReview::create($request->only('rating', 'comment'));

        return redirect()->back()->with('success', 'Thank you for your review!');
    }
}
