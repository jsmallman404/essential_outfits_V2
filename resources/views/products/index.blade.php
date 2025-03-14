<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store - Products</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .nav-buttons {
            display: flex;
            justify-content: center;
            background-color: #ded4c0;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .nav-buttons .dropdown {
            position: relative;
            margin: 0 15px;
        }
        .nav-buttons a {
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            color: #555;
            padding: 5px 10px;
            display: block;
            transition: color 0.3s ease, background-color 0.3s ease;
        }
        .nav-buttons a:hover {
            color: #000;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        /* Dropdown Content Styling */
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            min-width: 200px;
            z-index: 1000;
            border-radius: 8px;
            overflow: hidden;
        }
        .dropdown-content a {
            padding: 12px 20px;
            font-size: 1em;
            color: #555;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .dropdown-content a:hover {
            background-color: #ded4c0;
            color: #000;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        /* Responsive Styling */
        @media (max-width: 768px) {
            .nav-buttons {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }
            .dropdown {
                margin: 10px 0;
            }
        }
        /* Account Actions */
        .account-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .account-actions a {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 14px;
            color: #555;
            transition: color 0.3s ease;
            gap: 5px;
        }
        .account-actions a:hover {
            color: #000;
        }
        .account-actions a i {
            font-size: 16px;
        }
        .account-actions .search-bar {
            padding: 5px 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f6ef;
            width: 150px;
            transition: width 0.3s ease;
        }
        .account-actions .search-bar:hover {
            width: 250px;
        }
        .account-actions .search-bar:focus {
            width: 250px;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
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
        .footer {
            margin-top: 50px;
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-family: Arial, sans-serif;
        }
        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
        }
        .footer-about, .footer-contact, .footer-socials {
            flex: 1;
            min-width: 250px;
            margin: 10px;
        }
        .footer h3, .footer h4 {
            margin-bottom: 10px;
            font-size: 1.2rem;
            color: #f5f5f5;
            font-weight: bold;
        }
        .footer p, .footer a {
            font-size: 1rem;
            color: #ccc;
            text-decoration: none;
        }
        .footer a:hover {
            color: #fff;
            text-decoration: underline;
        }
        .footer-bottom {
            margin-top: 20px;
            border-top: 1px solid #444;
            padding-top: 10px;
            font-size: 0.9rem;
            color: #888;
        }
    </style>
</head>
<body>
    <header>
        @include('header')
    </header>
    <div class="container">
        <h2 class="text-center">All Products</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-3">
    <div class="filter-menu p-3 mb-4 bg-light rounded">
        <h4>Filter Products</h4>
        <form id="filterForm" action="{{ route('products.index') }}" method="GET">
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select">
                    <option value="">All Categories</option>
                    <option value="Men" {{ request('category') == 'Men' ? 'selected' : '' }}>Men</option>
                    <option value="Women" {{ request('category') == 'Women' ? 'selected' : '' }}>Women</option>
                    <option value="Accessories" {{ request('category') == 'Accessories' ? 'selected' : '' }}>Accessories</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="min_price" class="form-label">Min Price</label>
                <input type="number" name="min_price" id="min_price" class="form-control" placeholder="0" value="{{ request('min_price') }}">
            </div>
            <div class="mb-3">
                <label for="max_price" class="form-label">Max Price</label>
                <input type="number" name="max_price" id="max_price" class="form-control" placeholder="1000" value="{{ request('max_price') }}">
            </div>
        </form>
        <div class="d-flex gap-2">
            <button type="button" id="clearFilters" class="btn btn-primary w-50">Clear Filters</button>
        </div>
    </div>
</div>
            <div class="col-md-9">
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="product-card">
                                @php
                                    // Decode JSON if it's stored as a JSON string
                                    $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                                @endphp

                                @if(!empty($images) && is_array($images) && isset($images[0]))
                                    <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" width="100" height="100" style="object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-placeholder.png') }}" width="100" height="100" style="object-fit: cover;">
                                @endif

                                <div class="product-info">
                                    <h5>{{ $product->name }}</h5>
                                    <p>£{{ $product->price }}</p>
                                    <p><strong>Category:</strong> {{ $product->category }}</p>

                                    @php
                                        $inWishlist = Auth::check() && Auth::user()->wishlist()->where('product_id', $product->id)->exists();
                                    @endphp

                                    <form id="wishlist-form-{{ $product->id }}" action="{{ $inWishlist ? route('wishlist.remove', $product->id) : route('wishlist.add', $product->id) }}" method="POST" style="display: inline;" class="wishlist-form">
                                        @csrf
                                        @if($inWishlist)
                                            @method('DELETE')
                                        @endif
                                        <button type="submit" class="wishlist-btn" style="border: none; background: none; cursor: pointer;">
                                            <i id="wishlist-icon-{{ $product->id }}" class="{{ $inWishlist ? 'fas' : 'far' }} fa-heart" style="font-size: 24px; color: {{ $inWishlist ? 'red' : 'black' }};"></i>
                                        </button>
                                    </form>

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

                                    <form action="{{ route('products.show', $product->id) }}" method="GET" target="_blank">
                                        <input type="hidden" name="id" value="{{ $product->id }}">
                                        <input type="hidden" name="name" value="{{ urlencode($product->name) }}">
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                        <input type="hidden" name="image" value="{{ urlencode(asset($product->image)) }}">
                                        <input type="hidden" name="description" value="{{ $product->description }}">
                                        <input type="hidden" name="logo" value="{{ asset('images/essentiallogo1.png') }}">
                                        <button type="submit" class="btn btn-primary w-100">View</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="view-cart-btn">
            <a href="{{ route('cart.index') }}" class="btn btn-warning">View Cart</a>
        </div>
    </div>
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-about">
                <h4>Essential Outfits</h4>
                <p>Providing you effortless fashion from the best streetwear brands.</p>
            </div>
            <div class="footer-contact">
                <h4>Contact Us</h4>
                <p><a href="mailto:queriesessential@gmail.com">Email: essentialsenqueries@gmail.com</a></p>
            </div>
            <div class="footer-socials">
                <h4>Follow Us</h4>
                <a href="https://instagram.com/essentialoutfits.xyz" target="_blank">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Essential Outfits. All Rights Reserved.</p>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    document.getElementById('filterForm').addEventListener('change', function() {
        this.submit();
    });
    document.getElementById('clearFilters').addEventListener('click', function() {
        window.location.href = "{{ route('products.index') }}";
    });
</script>
</body>
</html>