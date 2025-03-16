<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
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
    max-width: 700px;
}

h1, h3 {
    color: #5a4e3a;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.form-control, .form-select {
    border-radius: 8px;
    border: 1px solid #8b7e68;
    padding: 10px;
}

.form-control:focus, .form-select:focus {
    border-color: #6c5f4b;
    box-shadow: 0px 0px 5px rgba(140, 110, 80, 0.5);
}

label {
    font-weight: bold;
    color: #5a4e3a;
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

.btn-danger {
    background-color: #d9534f;
    border: none;
}

.btn-danger:hover {
    background-color: #c9302c;
}

.btn-info {
    background-color: #17a2b8;
    border: none;
    color: white;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-secondary {
    background-color: #5a4e3a;
    border: none;
}

.btn-secondary:hover {
    background-color: #483a2b;
}

.image-container {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.image-container img {
    width: 100px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}

.image-container form {
    display: inline-block;
    text-align: center;
}

    </style>
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