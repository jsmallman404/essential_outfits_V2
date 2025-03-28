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
    max-width: 600px;
}

h1 {
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

.btn-info {
    background-color: #17a2b8;
    border: none;
    color: white;
}

.btn-info:hover {
    background-color: #138496;
}

.btn-danger {
    background-color: #d9534f;
    border: none;
}

.btn-danger:hover {
    background-color: #c9302c;
}

#imagePreview {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

#imagePreview img {
    width: 100px;
    height: auto;
    border-radius: 8px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
}

.size-entry {
    display: flex;
    align-items: center;
    gap: 10px;
}

.size-input {
    width: 100px !important;
}

#loadingMessage {
    text-align: center;
    font-size: 16px;
    font-weight: bold;
}

    </style>
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
                <input type="number" name="price" step="0.01">
            </div>

            <div class="mb-3">
                <label>Category</label>
                <input type="text" name="category" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender" class="form-select" required>
                    <option value="">Select Gender</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Unisex" {{ old('gender') == 'Unisex' ? 'selected' : '' }}>Unisex</option>
                </select>
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
                <label>Images</label>
                <input type="file" name="images[]" class="form-control" accept="image/*" id="imageInput" multiple>
                <div id="imagePreview" class="mt-2 d-flex flex-wrap"></div>
            </div>

            <div class="mb-3">
                <label>Sizes & Stock</label>
                <div id="sizes-container"></div>
                <button type="button" class="btn btn-info btn-sm mt-2" onclick="addSizeField()">+ Add Size</button>
            </div>

            <button type="submit" class="btn btn-success" id="submitBtn">Create Product</button>
            <div id="loadingMessage" class="text-info mt-2" style="display: none;">Processing...</div>
        </form>
    </div>

    <script>
        document.getElementById('productForm').addEventListener('submit', function(event) {
            event.preventDefault();

            var formData = new FormData(this);
            var submitBtn = document.getElementById("submitBtn");
            var loadingMessage = document.getElementById("loadingMessage");

            submitBtn.disabled = true;
            loadingMessage.style.display = "block";

            fetch("{{ route('admin.products.store') }}", { 
                method: "POST",
                body: formData,
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    window.location.href = '/admin/products';
                } else {
                    throw new Error(data.message || 'Unknown error');
                }
            })
            .catch(error => {
                console.error("Error submitting form:", error);
                alert('Error submitting the form: ' + error.message);
            })
            .finally(() => {
                submitBtn.disabled = false;
                loadingMessage.style.display = "none";
            });
        });

        document.getElementById("imageInput").addEventListener("change", function(event) {
            var previewContainer = document.getElementById("imagePreview");
            previewContainer.innerHTML = ''; 

            Array.from(event.target.files).forEach(file => {
                var reader = new FileReader();
                reader.onload = function(e) {
                    var imgElement = document.createElement("img");
                    imgElement.src = e.target.result;
                    imgElement.classList.add("m-2");
                    imgElement.style.width = "100px";
                    previewContainer.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            });
        });

        function addSizeField() {
            const sizesContainer = document.getElementById('sizes-container');
            const index = document.querySelectorAll('.size-entry').length;

            const newSize = document.createElement('div');
            newSize.classList.add('mb-2', 'size-entry');
            newSize.innerHTML = `
                <input type="text" name="sizes[${index}][size]" class="form-control d-inline-block w-25 size-input" placeholder="Size (e.g. S, M, L)" required>
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