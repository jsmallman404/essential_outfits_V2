<header>
        <div class="header-content">
      <!-- Logo -->
      <div class="logo">
        <a href="/">
        <img src="{{ asset('images/essentiallogo1.png') }}" alt="Logo">
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
  <a href="{{ route('products.index') }}">Shop All</a>
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
    <i class="fas fa-user"></i> 
    {{ Auth::check() ? Auth::user()->name : 'Signup/login' }}
    </a>
      </div>
    </div>
                
</header>
