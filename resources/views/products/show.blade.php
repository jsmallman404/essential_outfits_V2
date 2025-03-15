<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Show Product</title>

    <style>

body, h1, h2, h3, p, a, div {margin: 0;padding: 0;box-sizing: border-box;}
body {background-color: #ded4c0;font-family: 'Arial', sans-serif;color: #333;}
.view-products-btn {display: inline-block;padding: 0.75rem 1.5rem;font-size: 1rem;color: #ded4c0;background-color: #ded4c0;text-decoration: none;border-radius: 5px;transition: background-color 0.3s ease, transform 0.3s ease;box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);}
.view-products-btn:hover {background-color: #555;transform: scale(1.05);}
@keyframes fadeIn {0% {opacity: 0;transform: translateY(-20px);}100% {opacity: 1;transform: translateY(0);}}
.product-container {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center; /* Center items horizontally */
    align-items: center;   /* Center items vertically */
    max-width: 1000px;
    margin: 0 auto;
    padding: 20px;
    text-align: center;    /* Center text content */
}
.product-card {flex: 1 1 45%;min-width: 300px;background-color: #ded4c0;padding: 20px;border: 1px solid #ddd;border-radius: 8px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);}
.product-card h1 {margin-bottom: 10px;font-size: 24px;}
.product-card img {max-width: 100%;height: auto;margin-bottom: 15px;}
.product-card p {font-size: 16px;font-weight: bold;}
.product-description {flex: 1 1 45%;min-width: 300px;background-color: #ded4c0;padding: 20px;border: 1px solid #ddd;border-radius: 8px;box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);}
.product-description p {font-size: 16px;}


.container {max-width: 600px;margin: 50px auto;background-color: #fff;padding: 20px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
        h1 {text-align: center;color: #333;}
        label {display: block;margin-bottom: 8px;color: #333;}
        input[type="text"], textarea, select {width: 100%;padding: 8px;margin-bottom: 12px;border: 1px solid #ddd;border-radius: 4px;box-sizing: border-box;}
        textarea {height: 100px;}
        .stars {display: flex;justify-content: space-between;width: 180px;margin-bottom: 12px;}
        .star {cursor: pointer;font-size: 24px;color: #FFD700;}
        .button2 {background-color: #4CAF50;color: white;padding: 10px 20px;border: none;border-radius: 4px;cursor: pointer;width: 100%;font-size: 16px;}
        .button2:hover {background-color: #45a049;}
    </style>
</head>
@include('header')
<body>
  <div>
    <style>
      .centered-heading {font-size: 3rem;color: #333;font-weight: bold;text-align: center;}
    </style>
  </div>
  @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          <body>
  <div>
    <style>
      .centered-heading {font-size: 3rem;color: #333;font-weight: bold;text-align: center;}
    </style>
  </div>
  <div class="product-container">
      <div class="product-card">
          @php
  $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
@endphp

@if(is_array($images) && count($images) > 0)
  <div id="productCarousel" class="carousel slide" data-bs-interval="false">
    <div class="carousel-inner">
      @foreach($images as $index => $image)
        <div class="carousel-item @if($index === 0) active @endif">
          <img src="{{ asset('storage/' . ltrim($image, '/')) }}" class="d-block w-100" alt="Product Image">
        </div>
      @endforeach
    </div>
  </div>

  <div class="text-center mt-2">
    <button class="btn btn-secondary me-2" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
      <i class="fas fa-chevron-left"></i> Prev
    </button>
    <button class="btn btn-secondary ms-2" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
      Next <i class="fas fa-chevron-right"></i>
    </button>
  </div>
  <script>
  var productCarousel = document.getElementById('productCarousel');
  var carousel = new bootstrap.Carousel(productCarousel, {
    interval: false,
    ride: false
  });
</script>
@endif
          <p>
            <a href="{{ route('reviews.show', ['id' => $product->id]) }}" style="text-decoration: none; color: inherit;">
                Average Rating: <strong>{{ number_format($averageRating, 1) }}</strong> / 5
                <br>
                @for ($i = 1; $i <= 5; $i++)
                    @if($averageRating >= $i)
                        <i class="fas fa-star" style="color: #FFD700;"></i>
                    @elseif($averageRating >= $i - 0.5)
                        <i class="fas fa-star-half-alt" style="color: #FFD700;"></i>
                    @else
                        <i class="far fa-star" style="color: #FFD700;"></i>
                    @endif
                @endfor
            </a>
          </p>
      </div>
      <div class="product-description">
          <div>
          <h1>{{ $product->name }}</h1>
          </div>
          <h2>£{{ $product->price }}</h2>
          <p>Description: {{ $product->description }}</p>
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
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
@include('footer')

</html>