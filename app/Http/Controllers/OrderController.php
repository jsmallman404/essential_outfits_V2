<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{

    public function customerOrders(){
        $user = Auth::user();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();

        return view('customer.orders.index', compact('orders'));
    }

    public function customerOrderDetails($id) {
        $order = Order::with([
            'orderItems.productVariant', 
            'returnRequests.orderItem.productVariant'
        ])
        ->where('id', $id)
        ->where('user_id', Auth::id())
        ->firstOrFail();

        return view('customer.orders.show', compact('order'));
    }


    public function cancelOrder($id) {
        $order = Order::where('id', $id)->where('user_id', Auth::id())->firstOrFail();

        if ($order->status !== 'Pending') {
            return redirect()->route('customer.orders')->with('error', 'Only pending orders can be cancelled.');
        }

        $order->status = 'Cancelled';
        $order->save();

        return redirect()->route('customer.orders')->with('success', 'Order has been cancelled.');
    }
}
