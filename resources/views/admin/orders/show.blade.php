<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 800px;
        }
        h2, h4 {
            color: #5a4e3a;
            font-weight: bold;
            text-align: center;
        }
        .order-info {
            background: #f8f8f8;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .table th {
            background-color: #8b7e68;
            color: white;
            text-align: center;
        }
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        .btn-custom {
            background-color: #8b7e68;
            border: none;
            color: white;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #6c5f4b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Order #{{ $order->id }} Details</h2>

        <div class="order-info">
            <p><strong>User:</strong> {{ $order->user->name }}</p>
            <p><strong>Shipping Details:</strong></p>
            <p><i>{{ $order->name }}</i></p>
            <p><i>{{ $order->address }}</i></p>
            <p><i>{{ $order->city }}, {{ $order->post_code }}</i></p>
            <p><strong>Total Price:</strong> £{{ number_format($order->total_price, 2) }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ $order->status == 'Pending' ? 'warning' : ($order->status == 'Active' ? 'success' : 'danger') }}">
                    {{ $order->status }}
                </span>
            </p>
            <p><strong>Placed At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <h4>Products in Order</h4>
        <table class="table table-bordered table-striped">
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

        <div class="text-center mt-4">
            @if($order->status == 'Pending')
            <form action="{{ route('admin.orders.accept', $order->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">Accept Order</button>
            </form>
            @endif

            @if($order->status == 'Active')
            <form action="{{ route('admin.orders.ship', $order->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-success">Confirm Shipped</button>
            </form>
            <form action="{{ route('admin.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger">Cancel Order</button>
            </form>
            @endif

            <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary">Back to Orders</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
