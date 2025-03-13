<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essential Outfits</title>
  <link rel="stylesheet" href="{{ asset('css/brandstyles.css') }}">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<style>
  .footer2 {
    background-color: #1a1a1a;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    font-family: Arial, sans-serif;
}

.footer2-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px;
}

.footer2-about, .footer2-contact, .footer2-socials {
    flex: 1;
    min-width: 250px;
    margin: 10px;
}

.footer2 h3, .footer2 h4 {
    margin-bottom: 10px;
    font-size: 1.2rem;
    color: #f5f5f5;
}

.footer2 p, .footer2 a {
    font-size: 1rem;
    color: #ccc;
    text-decoration: none;
}

.footer2 a:hover {
    color: #fff;
    text-decoration: underline;
}

.footer2-bottom {
    margin-top: 20px;
    border-top: 1px solid #444;
    padding-top: 10px;
    font-size: 0.9rem;
    color: #888;
}
</style>

</head>
<body>
@include('header')

  <!-- Slideshow Section -->
  <section class="slideshow">
    <div class="slideshow-content">
      <h1>Essential Outfits</h1>
      <p>Providing you effortless fashion from the best streetwear brands.</p>

      <a href="{{ route('products.index') }}" class="view-products-btn">View Products</a>
      
    </div>
    <div class="slideshow-images">
    <img src="{{ asset('images/osb4tt.png') }}" alt="Slide 1" class="active">
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
  

  <footer class="footer2">
    <div class="footer2-container">
      <div class="footer2-about">
        <h4>Essential Outfits</h4>
        <p>Providing you effortless fashion from the best streetwear brands.</p>
      </div>
      <div class="footer2-contact">
        <h4>Contact Us</h4>
        <p> <a href="mailto:queriesessential@gmail.com">Email: essentialsenqueries@gmail.com</a></p>
      </div>
      <div class="footer2-socials">
        <h4>Follow Us</h4>
        <a href="https://instagram.com/essentialoutfits.xyz" target="_blank">Instagram</a>
      </div>
    </div>
    <div class="footer2-bottom">
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
