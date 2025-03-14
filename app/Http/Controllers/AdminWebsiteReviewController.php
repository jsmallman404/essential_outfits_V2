<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WebsiteReview;

class AdminWebsiteReviewController extends Controller
{
    public function index()
    {
        $reviews = WebsiteReview::orderBy('created_at', 'desc')->get();
        return view('admin.websiteReviews', compact('reviews'));
    }
}