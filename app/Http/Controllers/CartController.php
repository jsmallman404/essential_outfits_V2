<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the user's cart items.
     */
    public function addToCart(Request $request, $id)
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to add items to your cart.');
    }

    $variant = ProductVariant::where('product_id', $id)
        ->where('id', $request->input('variant_id'))
        ->first();

    if (!$variant || $variant->stock <= 0) {
        return redirect()->back()->with('error', 'Selected product variant is out of stock!');
    }

    // Check if item already exists in the cart
    $cartItem = Cart::where('user_id', $user->id)
        ->where('product_variant_id', $variant->id)
        ->first();

    if ($cartItem) {
        // Update quantity if already in cart
        $cartItem->quantity += 1;
        $cartItem->save();
    } else {
        // Add new item to the cart
        Cart::create([
            'user_id' => $user->id,
            'product_id' => $id,
            'product_variant_id' => $variant->id, // ✅ Storing variant ID instead of size
            'quantity' => 1,
        ]);
    }

    return redirect()->route('cart.index')->with('success', 'Product added to cart!');
}

public function index()
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to view your cart.');
    }

    $cartItems = Cart::where('user_id', $user->id)->with('productVariant')->get();
    return view('cart.index', compact('cartItems'));
}

    /**
     * Remove a product from the cart.
     */
    public function removeFromCart($id)
    {
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login')->with('error', 'You must be logged in to remove items from your cart.');
        }

        $cartItem = Cart::where('user_id', $user->id)->where('id', $id)->first();
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
        }

        return redirect()->route('cart.index')->with('error', 'Item not found in your cart.');
    }

    /**
     * Checkout: Create an order and move cart items into the order.
     */
    public function checkout()
{
    $user = Auth::user();
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to checkout.');
    }

    $cartItems = Cart::where('user_id', $user->id)->with('productVariant')->get();
    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    // Create a new order
    $order = new Order();
    $order->user_id = $user->id;
    $order->total_price = $cartItems->sum(function ($cartItem) {
        return $cartItem->product->price * $cartItem->quantity;
    });
    $order->status = 'Pending';
    $order->save();

    // Move cart items to order items and update stock
    foreach ($cartItems as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->productVariant->product_id,
            'product_variant_id' => $cartItem->product_variant_id,
            'quantity' => $cartItem->quantity
        ]);

        // Reduce stock
        $variant = ProductVariant::where('id', $cartItem->product_variant_id)->first();
        if ($variant) {
            $variant->stock -= $cartItem->quantity;
            $variant->save();
        }
    }

    // Clear the cart
    Cart::where('user_id', $user->id)->delete();

    return redirect()->route('dashboard')->with('success', 'Order placed successfully!');
}
}