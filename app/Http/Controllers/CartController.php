<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
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

    public function checkout(Request $request)
{

    $user = Auth::user();  
    if (!$user) {
        return redirect()->route('login')->with('error', 'You must be logged in to checkout.');
    }

    $cartItems = Cart::where('user_id', $user->id)->get();
    if ($cartItems->isEmpty()) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    $order = new Order();
    $order->user_id = $user->id;
    $order->total_price = $cartItems->sum(function ($cartItem) {
        return $cartItem->product->price * $cartItem->quantity;
    });
    $order->status = 'Pending';
    $order->save();

    foreach ($cartItems as $cartItem) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $cartItem->product_id,
            'quantity' => $cartItem->quantity,
            'price' => $cartItem->product->price,
        ]);
    }

    Cart::where('user_id', $user->id)->delete();
    return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
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
