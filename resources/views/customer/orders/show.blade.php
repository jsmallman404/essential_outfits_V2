<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order #{{ $order->id }} Details</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <!-- Include Header -->
    @include('header')

    <div class="container mt-5">
        <h2 class="text-center">Order #{{ $order->id }} Details</h2>

        <div class="card shadow-sm p-4">
            <p><strong>Total Price:</strong> £{{ number_format($order->total_price, 2) }}</p>
            <p><strong>Status:</strong> 
                <span class="badge 
                    @if($order->status == 'Pending') bg-warning 
                    @elseif($order->status == 'Active') bg-success 
                    @elseif($order->status == 'Canceled') bg-danger
                    @elseif($order->status == 'Return Requested') bg-warning
                    @endif">
                    {{ $order->status }}
                </span>
            </p>
            <p><strong>Placed At:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
        </div>

        <h4 class="mt-4">Products in Order</h4>
        <div class="table-responsive">
            <table class="table table-striped table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Product</th>
                        <th>Size</th>
                        <th>Quantity</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order->orderItems as $item)
                    <tr>
                        <td>{{ optional($item->product)->name ?? 'Deleted Product' }}</td>
                        <td>{{ optional($item->productVariant)->size ?? 'N/A' }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>£{{ number_format(optional($item->product)->price ?? 0, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if($order->status == 'Active')
            <div class="text-center mt-3">
                <a href="{{ route('customer.orders.returns', $order->id) }}" class="btn btn-warning">
                    <i class="fas fa-undo"></i> Return Item
                </a>
            </div>
        @endif

        @if($order->status == 'Pending')
            <div class="text-center mt-3">
                <form action="{{ route('customer.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-times"></i> Cancel Order
                    </button>
                </form>
            </div>
        @endif

        <!-- Show Return Requests if Status is "Return Requested" -->
        @if($order->status == 'Return Requested' && $order->returnRequests->where('order_id', $order->id)->count() > 0)
    <h4 class="mt-5 text-center">Return Requests</h4>
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Product</th>
                    <th>Size</th>
                    <th>Reason</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->returnRequests->where('order_id', $order->id) as $return)
                <tr>
                    <td>{{ optional($return->orderItem->product)->name ?? 'Deleted Product' }}</td>
                    <td>{{ optional($return->orderItem->productVariant)->size ?? 'N/A' }}</td>
                    <td>{{ $return->reason }}</td>
                    <td>
                        <span class="badge 
                            @if($return->status == 'Pending') bg-warning 
                            @elseif($return->status == 'Accepted') bg-success 
                            @elseif($return->status == 'Rejected') bg-danger 
                            @elseif($return->status == 'Item Received') bg-primary 
                            @endif">
                            {{ $return->status }}
                        </span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

        <div class="text-center mt-4">
            <a href="{{ route('customer.orders') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>
    </div>
</body>
</html>