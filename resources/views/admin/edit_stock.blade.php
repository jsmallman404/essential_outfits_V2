<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Stock</title>
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

h1 {
    color: #5a4e3a;
    font-weight: bold;
    text-align: center;
    margin-bottom: 20px;
}

.alert {
    text-align: center;
    font-size: 14px;
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

.form-control {
    border-radius: 8px;
    border: 1px solid #8b7e68;
    padding: 8px;
    text-align: center;
}

.form-control:focus {
    border-color: #6c5f4b;
    box-shadow: 0px 0px 5px rgba(140, 110, 80, 0.5);
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

.btn-secondary {
    background-color: #5a4e3a;
    border: none;
}

.btn-secondary:hover {
    background-color: #483a2b;
}

.table .remove-variant {
    padding: 5px 10px;
    font-size: 13px;
}

    </style>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Edit Stock - {{ $product->name }}</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.updateStock', $product->id) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Size</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="variants-container">
                    @foreach($product->variants as $variant)
                        <tr>
                            <td>
                                <input type="text" name="variants[{{ $variant->id }}][size]" 
                                    value="{{ $variant->size }}" class="form-control">
                            </td>
                            <td>
                                <input type="number" name="variants[{{ $variant->id }}][stock]" 
                                    value="{{ $variant->stock }}" class="form-control">
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm remove-variant" 
                                        data-id="{{ $variant->id }}">Remove</button>
                                <input type="hidden" name="remove_variants[]" value="" class="remove-input">
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" id="add-variant">Add Size</button>
            <button type="submit" class="btn btn-success">Update Stock</button>
        </form>

        <a href="{{ route('admin.products') }}" class="btn btn-secondary mt-3">Back to Products</a>
    </div>

    <script>
        document.getElementById('add-variant').addEventListener('click', function () {
            const container = document.getElementById('variants-container');
            const index = container.children.length;
            const row = document.createElement('tr');
            row.innerHTML = `
                <td><input type="text" name="new_variants[${index}][size]" class="form-control" placeholder="Size"></td>
                <td><input type="number" name="new_variants[${index}][stock]" class="form-control" placeholder="Stock"></td>
                <td><button type="button" class="btn btn-danger btn-sm remove-variant">Remove</button></td>
            `;
            container.appendChild(row);
        });

        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-variant')) {
                let row = e.target.closest('tr');
                let hiddenInput = row.querySelector('.remove-input');
                
                if (hiddenInput) {
                    hiddenInput.value = e.target.getAttribute('data-id');
                }
                
                row.style.display = "none";
            }
        });
    </script>
</body>
</html>