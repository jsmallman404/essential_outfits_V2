<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <!-- Add FontAwesome in your admin panel -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

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
        }
        h2 {
            color: #5a4e3a;
            font-weight: bold;
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
        .table {
            margin-top: 20px;
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
        .form-select {
            max-width: 250px;
            margin: auto;
            border: 1px solid #8b7e68;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <h2>All Orders</h2>

        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-custom">Back to Dashboard</a>
        </div>

        <form method="GET" action="{{ route('admin.orders.index') }}" class="mb-3 mt-3 text-center">
            <select name="status" class="form-select" onchange="this.form.submit()">
                <option value="">All Orders</option>
                <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                <option value="Active" {{ request('status') == 'Active' ? 'selected' : '' }}>Active</option>
                <option value="Shipped" {{ request('status') == 'Shipped' ? 'selected' : '' }}>Shipped</option>
                <option value="Cancelled" {{ request('status') == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </form>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>Placed At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>£{{ number_format($order->total_price, 2) }}</td>
                    <td>
                    <span class="badge bg-{{ $order->status == 'Pending' ? 'warning' : ($order->status == 'Active' || $order->status == 'Shipped' ? 'success' : 'danger') }}">
                    {{ $order->status }}
                        </span> 
                    </td>
                    <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-custom">View</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center">
            {{ $orders->links() }}
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('footer')
</html>
