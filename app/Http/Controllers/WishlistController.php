<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Show wishlist page
    public function index()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please login to view your wishlist.');
    }

    $wishlistItems = Wishlist::where('user_id', Auth::id())->with('product')->get();

    return view('wishlist.index', compact('wishlistItems'));
}


    // Add product to wishlist
    public function addToWishlist(Request $request, $productId)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add items to your wishlist.');
        }
    
        $user = Auth::user();
    
        // Check if product exists
        $product = Product::find($productId);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }
    
        // Check if product is already in the wishlist
        $existing = Wishlist::where('user_id', $user->id)->where('product_id', $productId)->first();
        if ($existing) {
            return redirect()->back()->with('info', 'Product is already in your wishlist.');
        }
    
        // Add to wishlist
        Wishlist::create([
            'user_id' => $user->id,
            'product_id' => $productId
        ]);
    
        return redirect()->back()->with('success', 'Product added to wishlist!');
    }

    public function removeFromWishlist($productId)
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'Please login to modify your wishlist.');
    }

    $wishlistItem = Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->first();

    if (!$wishlistItem) {
        return redirect()->back()->with('error', 'Item not found in wishlist.');
    }

    $wishlistItem->delete();

    return redirect()->back()->with('success', 'Product removed from wishlist.');
}

    
    
}
          
