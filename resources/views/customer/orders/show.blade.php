@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Order #{{ $order->id }} Details</h2>
    <p><strong>Total Price:</strong> £{{ number_format($order->total_price, 2) }}</p>
    <p><strong>Status:</strong> {{ $order->status }}</p>
    <p><strong>Placed At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>

    <h4>Products in Order</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
            <tr>
                <td>{{ optional($item->product)->name ?? 'Deleted Product' }}</td>
                <td>{{ $item->quantity }}</td>
                <td>£{{ number_format(optional($item->product)->price ?? 0, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($order->status == 'Pending')
    <form action="{{ route('customer.orders.cancel', $order->id) }}" method="POST" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Cancel Order</button>
    </form>
    @endif

    <a href="{{ route('customer.orders') }}" class="btn btn-secondary">Back to Orders</a>
</div>
@endsection