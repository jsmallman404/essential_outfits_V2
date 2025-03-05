<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 change-password
    <title>Clothing Store - Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Include jQuery -->

    <title>Your Page Title</title>
    <style>
/* General Reset */
body, h1, h2, h3, p, a, div {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    background-color: #ded4c0;
    font-family: 'Arial', sans-serif;
    color: #333;
}

/* Header Styling */
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


/* Slideshow Section */
.slideshow {
    position: relative;
    width: 100%;
    height: 80vh; /* Full viewport height */
    overflow: hidden;
  }
  
  .slideshow-images {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }
  
  .slideshow-images img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover; /* Ensures the image covers the area without distortion */
    opacity: 0; /* Initially hidden */
    transition: opacity 1s ease-in-out; /* Smooth fade transition */
  }
  
  .slideshow-images img.active {
    opacity: 1; /* Show active image */
  }
  
  .slideshow-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    z-index: 2; /* Ensures content is above the images */
    color: #ded4c0;
    animation: fadeIn 2s ease-out; /* Fade-in animation for text */
  }
  
  .slideshow-content h1 {
    font-size: 3.5rem;
    font-weight: bold;
    margin-bottom: 1rem;
    text-shadow: 3px 3px 8px rgba(0, 0, 0, 0.7); /* Shadow for better visibility */
  }
  
  .slideshow-content p {
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
    text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7); /* Shadow for better visibility */
  }
  
  .view-products-btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    color: #ded4c0;
    background-color: #000; /* Black button */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5); /* Shadow for pop effect */
  }
  
  .view-products-btn:hover {
    background-color: #555; /* Darker shade on hover */
    transform: scale(1.05); /* Slight scale effect on hover */
  }
  
  /* Background Overlay */
  .slideshow::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5); /* Dark overlay for text visibility */
    z-index: 1;
  }
  
  /* Animation for Text */
  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  
  /* Optional: Prevent text from overlapping during loading */
  .slideshow-content {
    pointer-events: none;
  }

  .product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
    padding: 2rem;
  }
  
  .product-card {
    background-color: #ded4c0;
    border-radius: 10px;
    overflow: hidden;
    width: 300px;
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
  
  .product-info h2 {
    font-size: 1.2rem;
    margin-bottom: 0.5rem;
  }
  
  .product-info p {
    font-size: 1rem;
    color: #555;
    margin-bottom: 1rem;
  }
  
  .product-info button {
    padding: 0.5rem 1.5rem;
    border: none;
    background-color: #222;
    color: #ded4c0;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s;
  }
  
  .product-info button:hover {
    background-color: #444;
  }
  .bestsellers {
    text-align: center;
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 1rem;
    color: #795809;
  }

    </style>

</head>









<header>
  <div class="header-content">
    <!-- Logo -->
    <div class="logo">
      <a href="homepage.html">
        <img src="images/essentiallogo1.png" alt="Logo">
      </a>
            

    </div>

    <!-- Navigation Bar -->
    <nav class="nav-buttons">
      <div class="dropdown">
        <a href="#">Men</a>
        <div class="dropdown-content">
          <a href="MensShopAll.html">Shop All</a>
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
          <a href="/accessories/men">Men's Accessories</a>
          <a href="/accessories/women">Women's Accessories</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="#">Brands</a>
        <div class="dropdown-content">
          <a href="/brands/Nike.html">Nike</a>
          <a href="/brands/adidas.html">Adidas</a>
          <a href="/brands/Jordan.html">Jordan</a>
          <a href="/brands/The North Face.html">The North Face</a>
          <a href="/brands/Under Armour.html">Under Armour</a>
          <a href="/brands/Vans.html">Vans</a>
          <a href="/brands/Osbatt.html">Osbatt</a>
          <a href="/brands/Racerworldwide.html">Racer Worldwide</a>
          <a href="/brands/Glogangworldwide.html">Glogang Worldwide</a>
          <a href="/brands/Glofwang.html">Glofwang</a>
          <a href="/brands/9inedouble0we.html">9inedouble0we</a>
          <a href="/brands/Jadeddldn.html">Jadedldn</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="#">Sale</a>
        <div class="dropdown-content">
          <a href="/sale/clearance">Men's Sales</a>
          <a href="/sale/discount">Women's Sales</a>
          <a href="/sale/new">All Sales</a>
        </div>
      </div>
      <!-- Added Contact and About buttons -->
      <a href="/contact.html" class="nav-link">Contact</a>
      <a href="/about.html" class="nav-link">About Us</a>
    </nav>

    <!-- Account and Cart Actions -->
    <div class="account-actions">
      <input type="text" class="search-bar" placeholder="Search">
      <a href="racer worldwide/wishlist.html" class="wishlist">
        <i class="fas fa-heart"></i> Wishlist
      </a>
      <a href="cart.html" class="cart">
        <i class="fas fa-shopping-cart"></i> Cart
      </a>
      <a href="login.html" class="signup-login">
        <i class="fas fa-user"></i> My Account
      </a>
    </div>
  </div>
</header>



<div>
  <h2 class="centered-heading">Shop All Mens</h2>
  <style>
    .centered-heading {
      font-size: 3rem; /* Adjust size as needed */
      color: #333; /* Change to your desired color */
      font-weight: bold;
      text-align: center;
    }
  </style>


</div>

@if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

change-password
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <!-- Image Carousel for Multiple Images -->
                        @if ($product->images->count() > 0)
                            <div id="carousel-{{ $product->id }}" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    @foreach ($product->images as $key => $image)
                                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                            <img src="{{ asset('storage/' . $image->image_path) }}" class="d-block w-100">
                                        </div>
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $product->id }}" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $product->id }}" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                </button>
                            </div>
                        @else
                            <img src="{{ asset('storage/default.png') }}" class="card-img-top"> <!-- Default image -->
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">£{{ $product->price }}</p>
                            <p class="card-text"><strong>Category:</strong> {{ $product->category }}</p>

                            <form action="{{ route('cart.add', $product->id) }}" method="POST">

<main id="products" class="product-container">
@foreach($products as $product)
  <div class="product-card">
  <img src="{{ asset($product->image) }}" class="product-card img">

    <div class="product-info">
      
      <h2 >{{ $product->name }}</h2>
  
      <p>£{{ $product->price }}</p>
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
                                <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                            </form>
change-password
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('cart.index') }}" class="btn btn-warning">View Cart</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> <!-- Include Bootstrap JS -->
</body>
</html>

                          </div>
  </div>
  @endforeach
</main>  
</html>

