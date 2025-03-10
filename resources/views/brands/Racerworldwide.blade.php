<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Racer Worldwide Collection</title>
  <link rel="stylesheet" href="{{ asset('css/brandstyles.css') }}" />
</head>
<body>
  <!-- Header -->
  <header>
    <div class="header-content">
      <!-- Logo -->
      <div class="logo">
        <a href="/">
          <img src="{{ asset('images/essentiallogo1.png') }}" alt="Essential Outfits Logo">
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
        <div class="dropdown">
          <a href="#">Brands</a>
          <div class="dropdown-content">
            <a href="{{ route('brands.Nike') }}">Nike</a>
            <a href="{{ route('brands.adida') }}">Adidas</a>
            <a href="{{ route('brands.jordan') }}">Jordan</a>
            <a href="{{ route('brands.northface') }}">The North Face</a>
            <a href="{{ route('brands.underarmour') }}">Under Armor</a>
            <a href="{{ route('brands.vans') }}">Vans</a>
            <a href="{{ route('brands.osbatt') }}">Osbatt</a>
            <a href="{{ route('brands.racerworldwide') }}">Racer worldwide</a>
            <a href="{{ route('brands.glogangworldwide') }}">Glogang worldwide</a>
            <a href="{{ route('brands.glofwang') }}">Glofwang</a>
            <a href="{{ route('brands.9inedouble0we') }}">9inedouble0we</a>
            <a href="{{ route('brands.jadeddldn') }}">Jadedldn</a>
          </div>
        </div>
        <div class="dropdown">
          <a href="#">Sale</a>
          <div class="dropdown-content">
            <a href="/sale/clearance">Clearance</a>
            <a href="/sale/discount">Discount</a>
            <a href="/sale/new">New Arrivals</a>
          </div>
        </div>

        <!-- Added Contact and About buttons -->
        <a href="/contact.html" class="nav-link">Contact</a>
        <a href="{{ route('products.about') }}" class="nav-link">About</a>
      </nav>

      <!-- Account and Cart Actions -->
      <div class="account-actions">
        <input type="text" class="search-bar" placeholder="Search">
        <a href="{{ route('cart.index') }}" class="wishlist">
          <i class="fas fa-heart"></i> Wishlist
        </a>
        <a href="{{ route('cart.index') }}" class="cart">
          <i class="fas fa-shopping-cart"></i> Cart
        </a>
        <a href="{{ route('login') }}" class="nav-link">
          <i class="fas fa-user"></i> my account
        </a>
      </div>
    </div>
  </header>

  <!-- Slideshow Section -->
  <div class="slideshow" style="position: relative; z-index: -1">
    <div class="slideshow-images">
      <img src="{{ asset('images/Racerworldwide banner.jpg') }}" alt="Racer Worldwide Banner">
    </div>
    <div class="slideshow-content">
      <h1>Racer Worldwide Collection</h1>
      <p>Experience the speed of style.</p>
    </div>
  </div>

  <!-- Products Section -->
  <main class="product-container">
    <div class="product-card">
      <img src="{{ asset('images/Racerworldwide man.jpg') }}" alt="Racer Worldwide for Men">
      <div class="product-info">
        <h2>Racer Worldwide for Men</h2>
        <button>View Products</button>
      </div>
    </div>
    <div class="product-card">
      <img src="{{ asset('images/Racerworldwide woman.jpg') }}" alt="Racer Worldwide for Women">
      <div class="product-info">
        <h2>Racer Worldwide for Women</h2>
        <button>View Products</button>
      </div>
    </div>
    <div class="product-card">
      <img src="{{ asset('images/All Racerworldwide.webp') }}" alt="All Racer Worldwide">
      <div class="product-info">
        <h2>All Racer Worldwide</h2>
        <button>View Products</button>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer style="
    background-color: rgb(15, 5, 5);
    padding: 40px 20px;
    text-align: center;
    margin-top: 50px;
    border-top: 1px solid #eee;
    font-family: Arial, sans-serif;
  ">
    <div style="max-width: 800px; margin: 0 auto;">
      <h3 style="color: #ffffff; margin-bottom: 10px;">Essential Outfits</h3>
      <p style="color: #cccccc; margin-bottom: 25px;">Providing you effortless fashion from the best streetwear brands.</p>
      
      <div style="margin-bottom: 25px;">
        <h4 style="color: #ffffff; margin-bottom: 10px;">Contact Us</h4>
        <p style="color: #cccccc;">Email: essentialsenquiries@gmail.com</p>
      </div>
      
      <div style="margin-bottom: 25px;">
        <h4 style="color: #ffffff; margin-bottom: 10px;">Follow Us</h4>
        <a href="#" style="color: #cccccc; text-decoration: none;">Instagram</a>
      </div>
      
      <p style="color: #cccccc; font-size: 14px; margin-top: 20px;">© 2024 Essential Outfits. All Rights Reserved.</p>
    </div>
  </footer>
</body>
</html>
