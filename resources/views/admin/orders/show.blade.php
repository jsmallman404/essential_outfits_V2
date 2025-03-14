<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Order #{{ $order->id }} Details</h2>
        <p><strong>User:</strong> {{ $order->user->name }}</p>
        <p><strong>Shipping Details:</strong> </p>
        <p><i>{{ $order->name}}</i></p>
        <p><i>{{$order->address}}</i></p>
        <p><i>{{$order->city}}</i></p>
        <p><i>{{$order->post_code}}</i></p>
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
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>£{{ number_format($item->product->price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


        @if($order->status == 'Pending')
        <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Accept Order</button>
        </form>
        @endif

        @if($order->status == 'Active')
        <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-success">Confrim Shipped</button>
        </form>
        @endif

        @if($order->status == 'Active')
        <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="btn btn-danger">Cancel Order</button>
        </form>
        @endif

        <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>