<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Return</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Manage Return Request</h1>

        <div class="text-center mb-4">
            <a href="{{ route('admin.returns.index') }}" class="btn btn-primary">Back to Returns</a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="card-title">Return ID: {{ $returnRequest->id }}</h5>
                <p><strong>Order ID:</strong> {{ $returnRequest->order_id }}</p>

                <div class="d-flex align-items-center">
                    @php
                        $product = optional($returnRequest->orderItem->product);
                    @endphp
                    @if($product)
                        <p class="mb-0"><strong>Product:</strong> {{ $product->name }}</p>
                    @else
                        <p class="text-muted"><strong>Product:</strong> Deleted Product</p>
                    @endif
                </div>

                <p><strong>Reason:</strong> {{ $returnRequest->reason }}</p>
                <p><strong>Status:</strong> 
                    <span class="badge bg-{{ 
                        $returnRequest->status == 'Pending' ? 'warning' : 
                        ($returnRequest->status == 'Accepted' ? 'success' : 
                        ($returnRequest->status == 'Item Received' ? 'primary' : 'danger')) }}">
                        {{ $returnRequest->status }}
                    </span>
                </p>

                <div class="text-center">
                    @if($returnRequest->status == 'Pending')
                        <form action="{{ route('admin.returns.accept', $returnRequest->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-success btn-lg">Accept Return</button>
                        </form>
                    @endif

                    @if($returnRequest->status == 'Accepted')
                        <form action="{{ route('admin.returns.received', $returnRequest->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg">Mark as Item Received</button>
                        </form>
                    @endif

                    <form action="{{ route('admin.returns.reject', $returnRequest->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-danger btn-lg">Reject Return</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>