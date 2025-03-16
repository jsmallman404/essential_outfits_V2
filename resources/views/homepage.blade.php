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

  @include('footer')
  
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
