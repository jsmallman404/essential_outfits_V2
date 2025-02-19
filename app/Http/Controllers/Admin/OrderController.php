<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index(Request $request) {
        $status = $request->query('status');
        $orders = Order::when($status, function ($query) use ($status) {
            return $query->where('status', $status);
        })->orderBy('created_at','desc')->paginate(10);

        return view('admin.orders.index', compact('orders', "status"));
    }
    public function show(Order $order)
    {
        return view('admin.orders.show', compact('order'));
    }

    public function accept(Order $order)
    {
        if ($order->status === 'Pending') {
            $order->update(['status' => 'Active']);
            return redirect()->back()->with('success', 'Order accepted successfully.');
        }

        return redirect()->back()->with('error', 'Order cannot be accepted.');
    }

    public function cancel(Order $order)
    {
        if ($order->status === 'Active') {
            $order->update(['status' => 'Cancelled']);
            return redirect()->back()->with('success', 'Order canceled successfully.');
        }

        return redirect()->back()->with('error', 'Order cannot be canceled.');
    }
}
