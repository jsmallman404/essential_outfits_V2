<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store - Products</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
        .black-button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: -30px;
        }
        .black-button:hover {
            background-color: #333;
        }
        
    </style>
</head>
<body>
    <header>
        @include('header')
    </header>
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        
        <div class="d-flex justify-content-end mb-3">
            <form method="GET" action="{{ route('products.index') }}">

                @foreach(request()->except('sort') as $key => $value)
                    @if(is_array($value))
                        @foreach($value as $item)
                            <input type="hidden" name="{{ $key }}[]" value="{{ $item }}">
                        @endforeach
                    @else
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                    @endif
                @endforeach
                <label for="sort" class="me-2">Sort By:</label>
                <select name="sort" id="sort" class="form-select d-inline w-auto" onchange="this.form.submit()">
                    <option value="">Select</option>
                    <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Price: Low to High</option>
                    <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Price: High to Low</option>
                </select>
            </form>
        </div>

        <div class="row">
<div class="col-md-3">
    <div class="filter-menu p-3 mb-4 bg-light rounded">
        <h4>Filter Products</h4>
        <form id="filterForm" action="{{ route('products.index') }}" method="GET">
            @php
                $requestedGenders = request()->query('gender', []);
                if (!is_array($requestedGenders)) {
                    $requestedGenders = $requestedGenders ? [$requestedGenders] : [];
                }
                $requestedCategories = (array) request()->query('categories', []);
                $requestedBrands = (array) request()->query('brands', []);
                
                // Apply existing filters to count dynamically
                $filteredGenderCounts = $products->filter(function ($product) use ($requestedCategories, $requestedBrands) {
                    return (empty($requestedCategories) || in_array($product->category, $requestedCategories)) &&
                           (empty($requestedBrands) || in_array($product->brand, $requestedBrands));
                })->groupBy('gender')->map->count();
            @endphp
            <div class="mb-3">
                <label class="form-label">Gender</label>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="gender[]" value="Male" id="genderMale" 
                           {{ in_array('Male', $requestedGenders) ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderMale">
                        Male ({{ $filteredGenderCounts['Male'] ?? 0 }})
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="gender[]" value="Female" id="genderFemale" 
                           {{ in_array('Female', $requestedGenders) ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderFemale">
                        Female ({{ $filteredGenderCounts['Female'] ?? 0 }})
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="gender[]" value="Unisex" id="genderUnisex" 
                           {{ in_array('Unisex', $requestedGenders) ? 'checked' : '' }}>
                    <label class="form-check-label" for="genderUnisex">
                        Unisex ({{ $filteredGenderCounts['Unisex'] ?? 0 }})
                    </label>
                </div>
            </div>

            @php
                $filteredCategoryCounts = $products->filter(function ($product) use ($requestedGenders, $requestedBrands) {
                    return (empty($requestedGenders) || in_array($product->gender, $requestedGenders)) &&
                           (empty($requestedBrands) || in_array($product->brand, $requestedBrands));
                })->groupBy('category')->map->count();
            @endphp
            <div class="mb-3">
                <label class="form-label">Categories</label>
                @foreach($categories as $category)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="categories[]" 
                               value="{{ $category->category }}" 
                               id="category_{{ $category->category }}"
                               {{ is_array(request('categories')) && in_array($category->category, request('categories')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="category_{{ $category->category }}">
                            {{ $category->category }} ({{ $filteredCategoryCounts[$category->category] ?? 0 }})
                        </label>
                    </div>
                @endforeach
            </div>

            @php
                $filteredBrandCounts = $products->filter(function ($product) use ($requestedGenders, $requestedCategories) {
                    return (empty($requestedGenders) || in_array($product->gender, $requestedGenders)) &&
                           (empty($requestedCategories) || in_array($product->category, $requestedCategories));
                })->groupBy('brand')->map->count();
            @endphp
            <div class="mb-3">
                <label class="form-label">Brands</label>
                @foreach($brands as $brand)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="brands[]" 
                               value="{{ $brand->brand }}" 
                               id="brand_{{ $brand->brand }}"
                               {{ is_array(request('brands')) && in_array($brand->brand, request('brands')) ? 'checked' : '' }}>
                        <label class="form-check-label" for="brand_{{ $brand->brand }}">
                            {{ $brand->brand }} ({{ $filteredBrandCounts[$brand->brand] ?? 0 }})
                        </label>
                    </div>
                @endforeach
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
            <button type="button" id="clearFilters" class="black-button btn btn-primary w-50">Clear Filters</button>
        </div>
    </div>
</div>

<script>
    document.getElementById('filterForm').addEventListener('change', function() {
        this.submit();
    });
    document.getElementById('clearFilters').addEventListener('click', function() {
        window.location.href = "{{ route('products.index') }}";
    });
</script>
            <div class="col-md-9">
                @php
                    $requestedGenders = request()->query('gender');
                    if (!is_array($requestedGenders)) {
                        $requestedGenders = $requestedGenders ? [$requestedGenders] : [];
                    }
                    $requestedCategories = (array) request()->query('categories', []);
                    $requestedBrands = (array) request()->query('brands', []);
                    
                    $filteredProducts = $products->filter(function ($product) use ($requestedGenders, $requestedCategories, $requestedBrands) {
                        // Ensure gender filtering works (case insensitive)
                        $matchesGender = empty($requestedGenders) || in_array(strtolower(trim($product->gender)), array_map('strtolower', $requestedGenders));
                        
                        // Ensure category filtering works
                        $matchesCategory = empty($requestedCategories) || in_array($product->category, $requestedCategories);
                        
                        // Ensure brand filtering works
                        $matchesBrand = empty($requestedBrands) || in_array($product->brand, $requestedBrands);
                        
                        return $matchesGender && $matchesCategory && $matchesBrand;
                    });
                    
                    if (request('sort') == 'price_asc') {
                        $filteredProducts = $filteredProducts->sortBy('price');
                    } elseif (request('sort') == 'price_desc') {
                        $filteredProducts = $filteredProducts->sortByDesc('price');
                    }
                @endphp
                <div class="row">
                    @foreach($filteredProducts as $product)
                        <div class="col-md-4 mb-4">
                            <div class="product-card">
                                @php
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
                                                @php
                                                    $stockText = '';
                                                    if ($variant->stock == 0) {
                                                        $stockText = '<span style="color: red; font-weight: bold;">- Out of Stock</span>';
                                                    } elseif ($variant->stock < 5) {
                                                        $stockText = ' - Only ' . $variant->stock . ' Left';
                                                    }
                                                @endphp
                                                <option value="{{ $variant->id }}">
                                                    {{ $variant->size }} {!! $stockText !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn">Add to Cart</button>
                                    </form>

                                    <form action="{{ route('products.show', $product->id) }}" method="GET">
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
    @include('footer')
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