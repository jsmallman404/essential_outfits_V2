<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store - Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

    <style>
        body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
        h2 {
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            color: #795809;
        }
        .product-card {
            background-color: #ded4c0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .product-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .product-info {
            padding: 1rem;
            text-align: center;
        }
        .product-info h5 {
            font-size: 1.5rem;
            font-weight: bold;
        }
        .product-info p {
            font-size: 1rem;
            color: #555;
        }
        .product-info button {
            padding: 0.5rem 1.5rem;
            border: none;
            background-color: #222;
            color: #ded4c0;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 100%;
        }
        .product-info button:hover {
            background-color: #444;
        }
        .view-cart-btn {
            display: block;
            text-align: center;
            margin-top: 2rem;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <h2>Clothing Collection</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="product-card">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top">
                        <div class="product-info">
                            <h5>{{ $product->name }}</h5>
                            <p>£{{ $product->price }}</p>
                            <p><strong>Category:</strong> {{ $product->category }}</p>

                            <!-- Wishlist Button -->
                         <a href="{{ route('wishlist.index') }}" class="wishlist-btn" data-product-id="{{ $product->id }}">
                           <i class="fas fa-heart"></i>
                         </a>
                            
                            <form action="{{ route('cart.add', $product->id) }}" method="POST">
                                @csrf
                                <label for="variant_id">Select Size:</label>
                                <select name="variant_id" class="form-control mb-2" required>
                                    @foreach($product->variants as $variant)
                                        <option value="{{ $variant->id }}">
                                            {{ $variant->size }} ({{ $variant->stock }} left)
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn">Add to Cart</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="view-cart-btn">
            <a href="{{ route('cart.index') }}" class="btn btn-warning">View Cart</a>
        </div>
    </div>
</body>
</html>
