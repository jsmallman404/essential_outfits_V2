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
    text-align: center;
    word-wrap: break-word; 
    line-height: 1.2; 
    width: 100%; 
    max-width: 100%; 
    margin: 0 auto; 
    overflow-wrap: break-word; 
    height: 40px; 
    max-height: none; 
}





        .product-info p {
            font-size: 1rem;
            color: #555;
            margin-top: 5px;
            margin-bottom: -5px;
        }



.btn-container {
    display: flex;
    gap: 15px;  
    width: 100%;  
    justify-content: space-evenly;  
    align-items: center;  
}


.btn-container .btn {
    background-color: rgb(0, 0, 0);
    font-weight: bold;
    padding: 10px 20px;  
    font-size: 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    border-radius: 5px;
    min-width: 125px;
    
    box-sizing: border-box;  
    color: #ddd;
}

.flex-fill{
    flex: 1;
}


.btn-container .btn-cart {
    background-color: black;  
}


.btn-container .btn-view {
    background-color: rgb(0, 0, 0);  
}


.btn-container .btn:hover {
    background-color: #333;
}

.btn-container .btn-view:hover {
    background-color: #333;
}





.wishlist-form {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}


.wishlist-btn {
    margin-top: 4px;
    
    

    align-items: center;
    gap: 5px;
    border: none;
    background: none;
    cursor: pointer;
}


.wishlist-btn span {
    font-size: 14px;
    transition: color 0.3s ease;
    color: black;
}


.wishlist-btn i {
    transition: color 0.3s ease;
}


.wishlist-btn:hover i {
    color: red;
}


.wishlist-btn.active {
    display: flex;
    align-items: center;
    gap: 5px;
    
}

.black-button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            
        }
        .black-button:hover {
            background-color: #333;
        }

        html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
}

main {
    flex: 1;
    padding-bottom: 20px; 
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
                        
                        $matchesGender = empty($requestedGenders) || in_array(strtolower(trim($product->gender)), array_map('strtolower', $requestedGenders));
                        
                        
                        $matchesCategory = empty($requestedCategories) || in_array($product->category, $requestedCategories);
                        
                        
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
                                    

                                    @php
                                        $inWishlist = Auth::check() && Auth::user()->wishlist()->where('product_id', $product->id)->exists();
                                    @endphp

<form id="wishlist-form-{{ $product->id }}" action="{{ $inWishlist ? route('wishlist.remove', $product->id) : route('wishlist.add', $product->id) }}" method="POST" class="wishlist-form" data-in-wishlist="{{ $inWishlist ? 'true' : 'false' }}">
    @csrf
    @if($inWishlist)
        @method('DELETE')
    @endif
    <button type="submit" class="wishlist-btn" style="border: none; background: none; cursor: pointer; display: flex; align-items: center; gap: 5px;">
        <i id="wishlist-icon-{{ $product->id }}" class="{{ $inWishlist ? 'fas' : 'far' }} fa-heart" style="font-size: 20px; color: {{ $inWishlist ? 'red' : 'black' }};"></i>
        <span style="font-size: 14px;">
            {{ $inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}
        </span>
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

                                        <div class="btn-container">
        <!-- Add to Cart Button -->
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-fill">
            @csrf
            <button type="submit" class="btn btn-cart">Add To Cart </button>
        </form>

        <!-- View Button -->
        <form action="{{ route('products.show', $product->id) }}" method="GET" class="flex-fill">
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ urlencode($product->name) }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="image" value="{{ urlencode(asset($product->image)) }}">
            <input type="hidden" name="description" value="{{ $product->description }}">
            <input type="hidden" name="logo" value="{{ asset('images/essentiallogo1.png') }}">
            <button type="submit" class="btn btn-view">View</button>
        </form>
    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
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

    document.addEventListener("DOMContentLoaded", function () {
    
    let productTitles = document.querySelectorAll(".product-info h5");

    function adjustFontSize(h5) {
        if (!h5) return;

        let textLength = h5.innerText.trim().length;

        if (textLength > 50) {
            h5.style.fontSize = "0.75rem";
        } else if (textLength > 35) {
            h5.style.fontSize = "0.95rem"; 
        } else if (textLength > 17) {
            h5.style.fontSize = "1.15rem"; 
        } else if (textLength > 16) {
            h5.style.fontSize = "1.5rem";
        } else {
            h5.style.fontSize = "1.5rem"; 
        }
    }

    productTitles.forEach(function (h5) {
        adjustFontSize(h5);
    });

    let observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.type === "childList" || mutation.type === "characterData") {
                productTitles = document.querySelectorAll(".product-info h5"); 
                adjustFontSize(h5);
            }
        });
    });

    let parentContainer = document.querySelector(".product-info").parentNode;

    if (parentContainer) {
        observer.observe(parentContainer, {
            childList: true, 
            subtree: true, 
        });
    } else {
        console.error(" Parent container not found! Check the parent div.");
    }
});

document.addEventListener("DOMContentLoaded", function () {
    let productCards = document.querySelectorAll('.wishlist-btn');

    productCards.forEach(function(wishlistButton) {
        const productId = wishlistButton.querySelector('i').id.split('-')[2];
        const heartIcon = document.querySelector('#wishlist-icon-' + productId);
        const inWishlist = wishlistButton.closest('form').getAttribute('data-in-wishlist') === 'true';

        if (inWishlist) {
            heartIcon.style.color = 'red';
            wishlistButton.classList.add('active');
        } else {
            heartIcon.style.color = 'black';
        }

        heartIcon.addEventListener('mouseover', () => {
            if (!wishlistButton.classList.contains('active')) {
                heartIcon.style.color = 'red';
            }
        });

        heartIcon.addEventListener('mouseout', () => {
            if (!wishlistButton.classList.contains('active')) {
                heartIcon.style.color = 'black';
            }
        });

        heartIcon.addEventListener('click', () => {
            if (wishlistButton.classList.contains('active')) {
                heartIcon.style.color = 'black';
            } else {
                heartIcon.style.color = 'red';
            }
            wishlistButton.classList.toggle('active');
        });
    });
});



</script>
</body>
</html>