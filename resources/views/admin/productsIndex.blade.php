<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Products</title>
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
        }
        h1 {
            color: #5a4e3a;
            font-weight: bold;
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
        .product-img {
            border-radius: 8px;
            box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
        }
        .btn-sm {
            font-size: 13px;
            padding: 6px 12px;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <h1 class="text-center">Manage Products</h1>

        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-custom">Back to Dashboard</a>
        </div>

        <div class="text-center my-4">
            <a href="{{ route('admin.createProduct') }}" class="btn btn-success">Add New Product</a>
        </div>

        <div class="row mb-3">
            <div class="col-md-12">
                <form action="{{ route('admin.products') }}" method="GET" class="d-flex">
                    <input type="text" name="search" class="form-control me-2" placeholder="Search products..." value="{{ request('search') }}">
                    <button type="submit" class="btn btn-outline-primary">Search</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Gender</th>
                    <th>Brand</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Sizes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>
                            @php
                                $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                            @endphp
                            @if(is_array($images) && count($images) > 0)
                                <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" width="50" class="product-img">
                            @endif
                        </td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->category }}</td>
                        <td>{{ $product->gender }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->color }}</td>
                        <td>£{{ $product->price }}</td>
                        <td>
                            @foreach($product->variants as $variant)
                                {{ $variant->size }} ({{ $variant->stock }} left)<br>
                            @endforeach
                        </td>
                        <td>
                            <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>   
                            <a href="{{ route('admin.editStock', $product->id) }}" class="btn btn-warning btn-sm">Stock</a>
                            <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf    
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
@include('footer')
</html>
