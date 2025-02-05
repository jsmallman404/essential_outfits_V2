<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $size = $request->input('size');

        $variant = ProductVariant::where('product_id', $id)->where('size', $size)->first();

        if (!$variant || $variant->stock <= 0) {
            return redirect()->back()->with('error', 'Selected size is out of stock!');
        }

        $cart = session()->get('cart', []);

        $cartKey = $id . '-' . $size;

        if (isset($cart[$cartKey])) {
            $cart[$cartKey]['quantity']++;
        } else {
            $cart[$cartKey] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
                'size' => $size,
                'image' => $product->image,
            ];
        }

        session()->put('cart', $cart);
        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function removeFromCart($key)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$key])) {
            unset($cart[$key]);
            session()->put('cart', $cart);
        }
        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }
}
