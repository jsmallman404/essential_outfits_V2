<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Product</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Add New Product</h1>

        <form id="productForm" enctype="multipart/form-data">
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

            <!-- Image Upload Section -->
            <div class="mb-3">
                <label>Image</label>
                <input type="file" name="image" class="form-control" accept="image/*" id="imageInput">
                <div id="imagePreview" class="mt-2"></div> <!-- For preview -->
            </div>

            <div class="mb-3">
                <label>Sizes & Stock</label>
                <div id="sizes-container"></div>
                <button type="button" class="btn btn-info btn-sm mt-2" onclick="addSizeField()">+ Add Size</button>
            </div>

            <button type="submit" class="btn btn-success">Create Product</button>
        </form>
    </div>

    <script>
document.getElementById('productForm').addEventListener('submit', function(event) {
    event.preventDefault(); // Prevent form from submitting normally

    var formData = new FormData(this);

    // Perform AJAX request using fetch()
    fetch("http://localhost:8000/admin/products", { 
        method: "POST",
        body: formData,
        headers: {
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Dynamic CSRF token
        }
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Error with the server response');
        }
        return response.text(); // You can also return response.json() here, but it’s not necessary
    })
    .then(data => {
        // Redirect to the admin products page after submission
        window.location.href = '/admin/products'; // Redirect directly
    })
    .catch(error => {
        console.error("Error submitting form:", error);
        alert('There was an error submitting the form.');
    });
});



        // Automatically upload image when file is selected (Optional preview)
        document.getElementById("imageInput").addEventListener("change", function() {
            var formData = new FormData();
            formData.append("image", this.files[0]);

            fetch("{{ route('admin.store') }}", { 
                method: "POST",
                body: formData,
                headers: { "X-CSRF-TOKEN": "{{ csrf_token() }}" }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById("imagePreview").innerHTML = 
                        `<img src="${data.imagePath}" width="100px" alt="Uploaded Image">`;
                } else {
                    alert('Error uploading image: ' + data.message);
                }
            })
            .catch(error => console.error("Upload Error:", error));
        });

        // Dynamic size field functionality
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
</body>
</html>
