<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essential Outfits</title>
  <link rel="stylesheet" href="{{ asset('css/brandstyles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
@include('header')

  <section class="slideshow">
    <div class="slideshow-content">
      <h1>Essential Outfits</h1>
      <p>Providing you effortless fashion from the best streetwear brands.</p>
    </div>
    <div class="slideshow-images">
    <img src="{{ asset('images/osb4tt.png') }}" alt="Slide 1" class="active">
    <img src="{{ asset('images/glogang.png') }}" alt="Slide 2">
    <img src="{{ asset('images/jaded.png') }}" alt="Slide 3">
    <img src="{{ asset('images/thuggunnababy.png') }}" alt="Slide 4">
    </div>
  </section>

  <main id="products" class="product-container">
    <h1 class="bestsellers">BESTSELLERS.</h1>
    <div class="row">
        @foreach($bestSellers as $product)
            <div class="col-md-4 mb-4">
                <div class="product-card">
                    @php
                        $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                    @endphp

                    @if(!empty($images) && is_array($images) && isset($images[0]))
                        <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" width="100%" height="300" style="object-fit: cover;">
                    @else
                        <img src="{{ asset('images/default-placeholder.png') }}" width="100%" height="300" style="object-fit: cover;">
                    @endif

                    <div class="product-info">
                        <h2>{{ $product->name }}</h2>
                        <p>£{{ $product->price }}</p>
                        <form action="{{ route('products.show', $product->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100 mb-2">View Details</button>
                        </form>
                        <form method="POST" action="{{ route('wishlist.add', $product->id) }}">
                            @csrf
                            <button class="add-to-wishlist-btn btn btn-outline-dark w-100" data-product="{{ $product->name }}">Add to Wishlist</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>

  @include('footer')
  
  <script>
document.addEventListener("DOMContentLoaded", function () {
    let images = document.querySelectorAll(".slideshow-images img");
    let currentIndex = 0;

    function changeSlide() {
        images[currentIndex].classList.remove("active"); 
        currentIndex = (currentIndex + 1) % images.length;
        images[currentIndex].classList.add("active"); 
    }

    setInterval(changeSlide, 3000); 
});
</script>

</body>
</html>
