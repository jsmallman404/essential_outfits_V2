<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Manage Products</h1>
        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
        </div>

        <div class="text-center mb-4">
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
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
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
                                <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" width="50">
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
                            <a href="{{ route('admin.editProduct', $product->id) }}" class="btn btn-primary btn-sm">Edit Product</a>   
                            <a href="{{ route('admin.editStock', $product->id) }}" class="btn btn-warning btn-sm">Edit Stock</a>
                            <form action="{{ route('admin.deleteProduct', $product->id) }}" method="POST" style="display: inline-block;">
                                @csrf    
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this product?');">
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
</html>