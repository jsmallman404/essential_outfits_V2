<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Orders</title>
    <link rel="stylesheet" href="{{ asset('css/brandstyles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        background-color: #ded4c0 !important;
    }
</style>

<body>
    @include('header')

    <div class="container mt-5">
        <h2 class="text-center">My Orders</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($orders->isEmpty())
            <p class="text-center mt-4">You have no orders yet.</p>
            <div class="text-center mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-primary">
                    <i class="fas fa-shopping-bag"></i> Shop Now
                </a>
            </div>
        @else
            <div class="d-flex justify-content-center">
                <div class="table-responsive w-75">
                    <table class="table table-striped table-hover text-center align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>Order #</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Placed At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>#{{ $order->id }}</td>
                                <td>£{{ number_format($order->total_price, 2) }}</td>
                                <td>
                                    <span class="badge 
                                        @if($order->status == 'Pending') bg-warning 
                                        @elseif($order->status == 'Active') bg-success 
                                        @elseif($order->status == 'Canceled') bg-danger 
                                        @elseif($order->status == 'Return Requested') bg-warning
                                        @endif">
                                        {{ $order->status }}
                                    </span>
                                </td>
                                <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('customer.orders.show', $order->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> View
                                    </a>

                                    @if($order->status == 'Pending')
                                    <form action="{{ route('customer.orders.cancel', $order->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to cancel this order?');">
                                            <i class="fas fa-times"></i> Cancel
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</body>
</html>