<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store - Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <style>

header {
    background-color: #ded4c0; 
    border-bottom: 1px solid #ddd; 
    padding: 10px 20px;
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
}


.logo img {
    width: 150px;
    height: auto;
    display: block;
}

/* Navigation Bar Styling */
.nav-buttons {
  display: flex;
  justify-content: center;
  background-color: #ded4c0; /* Light beige background */
  padding: 10px 20px;
  border-bottom: 1px solid #ddd;
}

.nav-buttons .dropdown {
  position: relative; /* Position relative to anchor dropdown content */
  margin: 0 15px; /* Spacing between dropdowns */
}

.nav-buttons a {
  text-decoration: none;
  font-size: 1.2em;
  font-weight: bold;
  color: #555;
  padding: 5px 10px;
  display: block;
  transition: color 0.3s ease, background-color 0.3s ease; /* Smooth transition for hover */
}

.nav-buttons a:hover {
  color: #000; /* Darker text on hover */
  background-color: #f0f0f0; /* Subtle hover effect */
  border-radius: 5px; /* Rounded effect for hover */
}

/* Dropdown Content Styling */
.dropdown-content {
  display: none; /* Hidden by default */
  position: absolute; /* Position relative to parent dropdown */
  top: 100%; /* Position directly below the parent link */
  left: 0;
  background-color: #fff; /* White background */
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); /* Deeper shadow for depth */
  min-width: 200px; /* Minimum dropdown width */
  z-index: 1000; /* High z-index to ensure it is on top */
  border-radius: 8px; /* Rounded corners for modern look */
  overflow: hidden; /* Clip any overflowing child elements */
}

.dropdown-content a {
  padding: 12px 20px; /* Increase padding for spacing */
  font-size: 1em;
  color: #555; /* Neutral text color */
  text-decoration: none;
  display: block; /* Stack items vertically */
  transition: background-color 0.3s ease, color 0.3s ease; /* Smooth hover effect */
}

.dropdown-content a:hover {
  background-color: #ded4c0; /* Highlight color on hover */
  color: #000;
}

/* Show Dropdown Content on Hover */
.dropdown:hover .dropdown-content {
  display: block; /* Show dropdown when hovering over parent */
}

/* Responsive Styling */
@media (max-width: 768px) {
  .nav-buttons {
    flex-direction: column; /* Stack navigation links vertically */
    align-items: flex-start;
    padding: 20px;
  }

  .dropdown {
    margin: 10px 0; /* Add spacing between stacked dropdowns */
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
    gap: 5px; /* Space between icon and text */
}

.account-actions a:hover {
    color: #000;
}

.account-actions a i {
    font-size: 16px; /* Icon size */
}

.account-actions .search-bar {
    padding: 5px 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f6ef; /* Light beige background for the search bar */
    width: 150px; /* Initial width */
    transition: width 0.3s ease; /* Smooth width change */
}

.account-actions .search-bar:hover {
    width: 250px; /* Expanded width on hover */
}

.account-actions .search-bar:focus {
    width: 250px; /* Expand on focus */
    outline: none; /* Remove default focus outline for a cleaner look */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Optional shadow for focus */
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
<header>
        <div class="header-content">
      <!-- Logo -->
      <div class="logo">
        <a href="{{ url('/') }}">
          <img src="images/essentiallogo1.png" alt="Logo">
        </a>
      </div>

 <!-- Navigation Bar -->
<nav class="nav-buttons">
  <div class="dropdown">
    <a href="{{ route('products.index') }}">Men</a>
    <div class="dropdown-content">
      <a href="/men/shopall">Shop All</a>
      <a href="/men/Jackets&coats">Jackets & Coats</a>
      <a href="/men/Hoodies">Hoodies</a>
      <a href="/men/Sweatshit">Sweatshits</a>
      <a href="/men/T-shirts">T-shirts</a>
      <a href="/men/Tracksuit Bottoms">Tracksuit Bottoms</a>
      <a href="/men/Jeans">Jeans</a>
      <a href="/men/shoes">Shoes</a>
    </div>
  </div>
  <div class="dropdown">
    <a href="#">Women</a>
    <div class="dropdown-content">
      <a href="/women/shopall">Shop All</a>
      <a href="/women/Jackets&coats">Jackets & Coats</a>
      <a href="/women/Hoodies">Hoodies</a>
      <a href="/women/Sweatshit">Sweatshits</a>
      <a href="/women/T-shirts">T-shirts</a>
      <a href="/women/Tracksuit Bottoms">Tracksuit Bottoms</a>
      <a href="/women/Jeans">Jeans</a>
      <a href="/women/shoes">Shoes</a>
    </div>
  </div>
  <div class="dropdown">
    <a href="#">Accessories</a>
    <div class="dropdown-content">
      <a href="/accessories/Shopall">Shop All</a>
      <a href="/accessories/men">Men accessories</a>
      <a href="/accessories/women">Women accessories</a>
    </div>
  </div>

 

    <!-- Added Contact and About buttons -->

    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
    <a href="{{ route('about') }}">About Us</a>

</nav>



      <!-- Account and Cart Actions -->
      <div class="account-actions">
      <form action="{{ route('products.index') }}" method="GET">
        <input type="text" class="search-bar" name="search" placeholder="Search products..." required>
        <button type="submit"><i class="fas fa-search"></i></button>
     </form>

        <a href="{{ route('wishlist.index') }}" class="wishlist">
          <i class="fas fa-heart"></i>
        </a>
        
        <a href="{{ route('cart.index') }}" class="cart">
          <i class="fas fa-shopping-cart"></i> 
        </a>

        <a href="{{ route('login') }}" class="nav-link">
          <i class="fas fa-user"></i> my account
        </a>
      </div>
    </div>
                
</header>
<body>

    <div class="container">
        <h2>Clothing Collection</h2>
        
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

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

<form id="wishlist-form-{{ $product->id }}" action="{{ $inWishlist ? route('wishlist.remove', $product->id) : route('wishlist.add', $product->id) }}" 
      method="POST" style="display: inline;" class="wishlist-form">
    @csrf
    @if($inWishlist)
        @method('DELETE')
    @endif
    <button type="submit" class="wishlist-btn" style="border: none; background: none; cursor: pointer;">
        <i id="wishlist-icon-{{ $product->id }}" class="{{ $inWishlist ? 'fas' : 'far' }} fa-heart" 
           style="font-size: 24px; color: {{ $inWishlist ? 'red' : 'black' }};"></i>
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
                            </form>
                            <form action="{{ route('products.show', $product->id) }}" method="GET" target="_blank">
    <input type="hidden" name="id" value="{{ $variant->id }}">
    <input type="hidden" name="name" value="{{ urlencode($product->name) }}">
    <input type="hidden" name="price" value="{{ $product->price }}">
    <input type="hidden" name="image" value="{{ urlencode(asset($product->image)) }}">
    <input type="hidden" name="description" value="{{$product->description}}">
    <input type="hidden" name="logo" value="{{ asset('images/essentiallogo1.png') }}">
    <button type="submit" class="btn btn-primary w-100">View</button>
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

<footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h4>Essential Outfits</h4>
        <p>Providing you effortless fashion from the best streetwear brands.</p>
      </div>
      <div class="footer-contact">
        <h4>Contact Us</h4>
        <p> <a href="mailto:queriesessential@gmail.com">Email: essentialsenqueries@gmail.com</a></p>
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





</html>
