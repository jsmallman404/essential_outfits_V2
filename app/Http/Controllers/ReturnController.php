<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\ReturnRequest;

class ReturnController extends Controller
{
    public function showReturnPage($orderId) {
        $order = Order::with('orderItems.productVariant')->findOrFail($orderId);
        return view('customer.orders.returns', compact('order'));
    }

    public function processReturn(Request $request, $orderId) {
        $request->validate([
            'item_ids' => 'required|array',
            'item_ids.*' => 'exists:order_items,id',
            'reason' => 'required|string|max:255',
        ]);

        foreach ($request->item_ids as $itemId) {
            ReturnRequest::create([
                'order_id' => $orderId,
                'order_item_id' => $itemId,
                'reason' => $request->reason,
                'status' => 'Pending',
            ]);
        }

        $order = Order::findOrFail($orderId);
        $order->update(['status' => 'Return Requested']);

        return redirect()->route('customer.orders')->with('success', 'Return request submitted successfully.');
    }
}
