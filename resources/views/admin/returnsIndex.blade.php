<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Returns</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
            max-width: 900px;
        }
        h1 {
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
        .filter-buttons .btn {
            margin-right: 5px;
            border-radius: 8px;
            transition: 0.3s;
        }
        .filter-buttons .btn.active {
            font-weight: bold;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
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
        .alert {
            text-align: center;
        }
        .pagination {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <h1>Manage Returns</h1>

        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-custom">Back to Dashboard</a>
        </div>

        <div class="text-center mb-4 filter-buttons">
            <a href="{{ route('admin.returns.index', ['filter' => 'all']) }}" 
               class="btn btn-secondary {{ $filter == 'all' ? 'active' : '' }}">All Returns</a>
            <a href="{{ route('admin.returns.index', ['filter' => 'requested']) }}" 
               class="btn btn-warning {{ $filter == 'requested' ? 'active' : '' }}">Requested</a>
            <a href="{{ route('admin.returns.index', ['filter' => 'accepted']) }}" 
               class="btn btn-success {{ $filter == 'accepted' ? 'active' : '' }}">Accepted</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
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
                            <a href="{{ route('admin.returns.show', $return->id) }}" class="btn btn-info btn-sm">Manage</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center pagination">
            {{ $returns->links() }}
        </div>
    </div>
</body>
@include('footer')
</html>
