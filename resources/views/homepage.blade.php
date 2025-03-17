<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essential Outfits</title>
  <link rel="stylesheet" href="{{ asset('css/brandstyles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

  <style>
   body {
  background-color: #ded4c0 !important;
}
    
/* Bestsellers Heading Styling */
.bestsellers-container {
    text-align: center;
    margin-bottom: 2rem; /* Space between title and products */
}

.bestsellers {
    font-size: 3.5rem; /* Large but professional */
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #333;
    font-family: 'Oswald', sans-serif; /* Modern, urban font */
    border-bottom: 4px solid #795809;
    padding-bottom: 10px;
    display: inline-block;
}

/* Product Container */
.product-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 1.5rem;
    padding: 2rem;
}

/* Grid Layout for Products */
.products-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive grid */
    gap: 20px;
    justify-content: center;
    align-items: start;
    padding: 20px;
}

/* Product Card */
.product-card {
    background-color: #ded4c0;
    border-radius: 10px;
    overflow: hidden;
    width: 100%;
    max-width: 300px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s, box-shadow 0.3s;
    text-align: center;
    padding: 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Fix Image Sizing */
.product-card img {
    width: 100%; /* Ensure full width */
    height: 250px; /* Fixed height for consistency */
    object-fit: cover; /* Ensures the image fills the area without distortion */
    border-radius: 8px;
    transition: transform 0.3s ease-in-out;
}

.product-card:hover img {
    transform: scale(1.05); /* Slight zoom effect on hover */
}

/* Wishlist Button */
.wishlist-btn {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 1.5rem;
    transition: color 0.3s;
}

.wishlist-btn .fa-heart {
    transition: color 0.3s;
}

.wishlist-btn .fas.fa-heart {
    color: red; 
}

.wishlist-btn .far.fa-heart {
    color: black; /* When not in wishlist */
}

/* View Product Button */
.product-info button {
    padding: 0.5rem 1.5rem;
    border: none;
    background-color: #333; /* Match Bestsellers color */
    color: white;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    border-radius: 5px;
    transition: background-color 0.3s, transform 0.2s;
    margin: 5px;
}

.product-info button:hover {
    background-color: #5c4506; /* Darker shade on hover */
    transform: translateY(-2px); /* Subtle lift effect */
}



  </style>
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
  
  <div class="container mt-5">
        <h1 class="text-center">Featured Products</h1>

        <div class="row">
        @foreach($featuredProducts as $product)
    <div class="col-md-4 mb-4">
        <div class="card">
            @php
                $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
            @endphp
            @if(is_array($images) && count($images) > 0)
                <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" class="card-img-top" alt="{{ $product->name }}">
            @else
                <img src="{{ asset('images/default-placeholder.png') }}" class="card-img-top" alt="No Image Available">
            @endif

            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">£{{ number_format($product->price, 2) }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Product</a>
            </div>
        </div>
    </div>
@endforeach
        </div>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".wishlist-btn").click(function (e) {
            e.preventDefault();

            let button = $(this);
            let form = button.closest(".wishlist-form");
            let productId = form.data("product-id");
            let icon = $("#wishlist-icon-" + productId);
            let actionUrl = "/wishlist/toggle/" + productId; // Ensure correct endpoint

            $.ajax({
                url: actionUrl,
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}"
                },
                success: function (response) {
                    if (response.status === "added") {
                        icon.removeClass("far").addClass("fas").css("color", "red");
                    } else if (response.status === "removed") {
                        icon.removeClass("fas").addClass("far").css("color", "black");
                    }
                },
                error: function () {
                    alert("Something went wrong! Please try again.");
                }
            });
        });
    });
</script>


</body>
</html>
