<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Product</h1>
        
        <form action="{{ route('admin.updateProduct', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" step="0.01" value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label>Category</label>
                <input type="text" name="category" class="form-control" value="{{ $product->category }}" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select"  value="{{ $product->category }}" required>
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Unisex" {{ old('gender') == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Brand</label>
                <input type="text" name="brand" class="form-control" value="{{ $product->brand }}" required>
            </div>

            <div class="mb-3">
                <label>Color</label>
                <input type="text" name="color" class="form-control" value="{{ $product->color }}" required>
            </div>

            <button type="submit" class="btn btn-success">Update Product</button>
        </form>

        <h3 class="mt-5">Product Images</h3>
        <div class="d-flex flex-wrap">
            @php
                $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
            @endphp

            @if (!empty($images))
                @foreach($images as $image)
                    <div class="m-2">
                        <img src="{{ asset('storage/' . ltrim($image, '/')) }}" width="100">
                        <form action="{{ route('admin.removeProductImage', $product->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="image" value="{{ $image }}">
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </div>
                @endforeach
            @else
                <p>No images uploaded for this product.</p>
            @endif
        </div>

        <h3 class="mt-4">Add New Images</h3>
        <form action="{{ route('admin.addProductImage', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="images[]" class="form-control" multiple>
            <button type="submit" class="btn btn-info mt-2">Add Images</button>
        </form>

        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>