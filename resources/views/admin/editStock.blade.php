<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<script>
    function addSizeField() {
        const sizesContainer = document.getElementById('sizes-container');
        const index = document.querySelectorAll('.size-entry').length; // Get current count

        const newSize = document.createElement('div');
        newSize.classList.add('mb-2', 'size-entry');
        newSize.innerHTML = `
            <input type="text" name="sizes[${index}][size]" class="form-control d-inline-block w-25" placeholder="Size (e.g. S, M, L)" required>
            <input type="number" name="sizes[${index}][stock]" class="form-control d-inline-block w-25" placeholder="Stock" min="0" required>
            <button type="button" class="btn btn-danger btn-sm" onclick="removeSizeField(this)">Remove</button>
        `;
        sizesContainer.appendChild(newSize);
    }

    function removeSizeField(button) {
        button.parentElement.remove();
    }
</script>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Add New Product</h1>

        <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Price</label>
                <input type="number" name="price" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Category</label>
                <input type="text" name="category" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Brand</label>
                <input type="text" name="brand" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Color</label>
                <input type="text" name="color" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="mb-3">
                <label>Sizes & Stock</label>
                <div id="sizes-container"></div>
                <button type="button" class="btn btn-info btn-sm mt-2" onclick="addSizeField()">+ Add Size</button>
            </div>

            <button type="submit" class="btn btn-success">Create Product</button>
        </form>
    </div>
</body>
</html>