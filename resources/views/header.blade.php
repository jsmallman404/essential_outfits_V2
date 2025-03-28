<header>
    <div class="header-content">
      <div class="logo">
        <a href="/">
        <img src="{{ asset('images/essentiallogo1.png') }}" alt="Logo">
        </a>
      </div>

      @php
          $categories = \App\Models\Product::select('category', 'gender')->distinct()->get();
          $brands = \App\Models\Product::select('brand')->distinct()->get();
      @endphp

      <nav class="nav-buttons">
        <div class="dropdown">
          <a href="{{ route('products.index', ['gender' => 'Male']) }}">Mens</a>
          <div class="dropdown-content">
            @foreach($categories as $category)
              @if($category->gender === 'Male' || $category->gender === 'Unisex')
                <a href="{{ route('products.index', ['gender' => 'Male', 'categories[]' => $category->category]) }}">{{ $category->category }}</a>
              @endif
            @endforeach
          </div>
        </div>
        
        <div class="dropdown">
          <a href="{{ route('products.index', ['gender' => 'Female']) }}">Womens</a>
          <div class="dropdown-content">
            @foreach($categories as $category)
              @if($category->gender === 'Female' || $category->gender === 'Unisex')
                <a href="{{ route('products.index', ['gender' => 'Female', 'categories[]' => $category->category]) }}">{{ $category->category }}</a>
              @endif
            @endforeach
          </div>
        </div>

        <div class="dropdown">
          <a href="#">Brands</a>
          <div class="dropdown-content">
            @foreach($brands as $brand)
              <a href="{{ route('products.index', ['brands[]' => $brand->brand]) }}">{{ $brand->brand }}</a>
            @endforeach
          </div>
        </div>
        <a href="{{ route('products.index') }}">All Products</a>
        <a href="{{ route('contact') }}" class="nav-link">Contact</a>
        <a href="{{ route('about') }}">About Us</a>
      </nav>

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
