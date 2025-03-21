<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteReview;

class AdminWebsiteReviewController extends Controller
{
    public function index()
    {
        $reviews = WebsiteReview::orderBy('created_at', 'desc')->get();
        $averageWebsiteRating = WebsiteReview::avg('rating') ?? 0;
        return view('admin.websiteReviews', compact('reviews', 'averageWebsiteRating'));
    }
}