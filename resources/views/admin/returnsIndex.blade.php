<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Returns</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Manage Returns</h1>

        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
        </div>

        <div class="text-center mb-4">
            <a href="{{ route('admin.returns.index', ['filter' => 'all']) }}" class="btn btn-secondary {{ $filter == 'all' ? 'active' : '' }}">All Returns</a>
            <a href="{{ route('admin.returns.index', ['filter' => 'requested']) }}" class="btn btn-warning {{ $filter == 'requested' ? 'active' : '' }}">Requested</a>
            <a href="{{ route('admin.returns.index', ['filter' => 'accepted']) }}" class="btn btn-success {{ $filter == 'accepted' ? 'active' : '' }}">Accepted</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Return ID</th>
                    <th>Order ID</th>
                    <th>Item</th>
                    <th>Reason</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($returns as $return)
                    <tr>
                        <td>{{ $return->id }}</td>
                        <td>{{ $return->order_id }}</td>
                        <td>
                            @php
                                $product = optional($return->orderItem->product);
                            @endphp
                            @if($product)
                                {{ $product->name }}
                            @else
                                <span class="text-muted">Deleted Product</span>
                            @endif
                        </td>
                        <td>{{ $return->reason }}</td>
                        <td>
                            <span class="badge bg-{{ $return->status == 'Pending' ? 'warning' : ($return->status == 'Accepted' ? 'success' : 'danger') }}">
                                {{ $return->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.returns.show', $return->id) }}" class="btn btn-info btn-sm">Manage Return</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center">
            {{ $returns->links() }}
        </div>
    </div>
</body>
</html>