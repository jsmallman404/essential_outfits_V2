<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a list of the customer's orders.
     */
    public function customerOrders()
    {
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('customer.orders.index', compact('orders'));
    }

    /**
     * Display the details of a specific order.
     */
    public function customerOrderDetails($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        return view('customer.orders.show', compact('order'));
    }

    /**
     * Allow the customer to cancel an order if it is still pending.
     */
    public function cancelOrder($id)
    {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($order->status !== 'Pending') {
            return redirect()->route('customer.orders')->with('error', 'Only pending orders can be canceled.');
        }

        $order->status = 'Canceled';
        $order->save();

        return redirect()->route('customer.orders')->with('success', 'Order has been canceled.');
    }
}
