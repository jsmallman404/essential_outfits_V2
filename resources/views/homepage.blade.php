<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essential Outfits</title>
  <link rel="stylesheet" href="{{ asset('css/brandstyles.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
  <!-- Header Section -->
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
      <a href="/brands/Nike.html">Nike</a>
      <a href="/brands/adidas.html">Adidas</a>
      <a href="/brands/Jordan.html">Jordan</a>
      <a href="/brands/The North Face.html">The north face</a>
      <a href="/brands/Under Armour.html">Under armor</a>
      <a href="/brands/Vans.html">Vans</a>
      <a href="/brands/Osbatt.html">Osbatt</a>
      <a href="/brands/Racerworldwide.html">Racer worldwide</a>
      <a href="/brands/Glogangworldwide.html">Glogang worldwide</a>
      <a href="/brands/Glofwang.html">Glofwang</a>
      <a href="/brands/9inedouble0we.html">9inedouble0we</a>
      <a href="/brands/Jadeddldn.html">Jadedldn</a>
    <a href="{{ route('brands.nike') }}">Nike</a>
            <a href="{{ route('brands.adidas') }}">Adidas</a>
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
 

    <!-- Added Contact and About buttons -->

    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
    <a href="{{ route('about') }}">About Us</a>

</nav>



      <!-- Account and Cart Actions -->
      <div class="account-actions">
        <input type="text" class="search-bar" placeholder="Search">
        <a href="racer worldwide/wishlist.html" class="wishlist">
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

  <!-- Slideshow Section -->
  <section class="slideshow">
    <div class="slideshow-content">
      <h1>Essential Outfits</h1>
      <p>Providing you effortless fashion from the best streetwear brands.</p>
      <a href="#products" class="view-products-btn">View Products</a>
    </div>
    <div class="slideshow-images">
    <img src="{{ asset('images/osb4tt.png') }}" alt="Slide 1">
    <img src="{{ asset('images/glogang.png') }}" alt="Slide 2">
    <img src="{{ asset('images/jaded.png') }}" alt="Slide 3">
    <img src="{{ asset('images/thuggunnababy.png') }}" alt="Slide 4">
    </div>
  </section>

  <!-- Main Product Display Section -->
  <main id="products" class="product-container">
    <h1 class="bestsellers">BESTSELLERS.</h1>
    <div class="product-card">
      <img src="images/blackbomber.png" alt="Product 1">
      <div class="product-info">
        <h2>Racer Worldwide - Black Waxed Bomber</h2>
        <p>£120</p>
        <button>View Details</button>
        <button class="add-to-wishlist-btn" data-product="Racer Worldwide - Black Waxed Bomber">Add to Wishlist</button>
      </div>
    </div>
    <div class="product-card">
      <img src="images/marlyn.png" alt="Product 2">
      <div class="product-info">
        <h2>OSBATT - Marlyn T-Shirt 4th Anniversary Edition</h2>
        <p>£45</p>
        <button>View Details</button>
        <button class="add-to-wishlist-btn" data-product="Racer Worldwide - Black Patch Hoodie">Add to Wishlist</button>
      </div>
    </div>
    <div class="product-card">
      <img src="images/jadedhoodie.png" alt="Product 3">
      <div class="product-info">
        <h2> Jaded London - Deep Red Fade Mini Monster Hoodie        </h2>
        <p>£68 £63</p>
        <button>View Details</button>
        <button class="add-to-wishlist-btn" data-product="Racer Worldwide - Cargo Coated Pants">Add to Wishlist</button>
      </div>
    </div>
  </main>
  

  <footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h3>Essential Outfits</h3>
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
  <script>
document.addEventListener("DOMContentLoaded", function () {
    let images = document.querySelectorAll(".slideshow-images img");
    let currentIndex = 0;

    function changeSlide() {
        images[currentIndex].classList.remove("active"); // Remove active class from current image
        currentIndex = (currentIndex + 1) % images.length; // Move to next image
        images[currentIndex].classList.add("active"); // Show new active image
    }

    setInterval(changeSlide, 3000); // Change image every 3 seconds
});
</script>

</body>
</html>
