<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        return view('wishlist.index'); // Ensure this view exists in resources/views/wishlist/index.blade.php
    }
}

