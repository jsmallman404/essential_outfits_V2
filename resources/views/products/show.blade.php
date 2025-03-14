<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
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


        .footer {
    margin-top: 50px;
    background-color: #1a1a1a;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    font-family: Arial, sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px;
}

.footer-about, .footer-contact, .footer-socials {
    flex: 1;
    min-width: 250px;
    margin: 10px;
}

.footer h3, .footer h4 {
    margin-bottom: 10px;
    font-size: 1.2rem;
    color: #f5f5f5;
    font-weight: bold;
}

.footer p, .footer a {
    font-size: 1rem;
    color: #ccc;
    text-decoration: none;
}

.footer a:hover {
    color: #fff;
    text-decoration: underline;
}

.footer-bottom {
    margin-top: 20px;
    border-top: 1px solid #444;
    padding-top: 10px;
    font-size: 0.9rem;
    color: #888;
}
    </style>
</head>
@include('header')
<body>
  <div>
    <h2 class="centered-heading">Shop All Mens</h2>
    <style>
      .centered-heading {font-size: 3rem;color: #333;font-weight: bold;text-align: center;}
    </style>
  </div>
  @if(session('success'))
              <div class="alert alert-success">{{ session('success') }}</div>
          @endif
          <body>
  <div>
    <h2 class="centered-heading">Product: {{ $product->name }}</h2>
    <style>
      .centered-heading {font-size: 3rem;color: #333;font-weight: bold;text-align: center;}
    </style>
  </div>
  <div class="product-container">
      <div class="product-card">
          <h1>{{ $product->name }}</h1>
          @php
            $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
          @endphp
          @if(is_array($images) && count($images) > 0)
  <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      @foreach($images as $index => $image)
        <div class="carousel-item @if($index === 0) active @endif">
          <img src="{{ asset('storage/' . ltrim($image, '/') ) }}" class="d-block w-100" alt="Product Image">
        </div>
      @endforeach
    </div>
  </div>
  <div class="carousel-arrows mt-2 text-center">
    <button class="btn btn-secondary me-2" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
      <i class="fas fa-chevron-left"></i> Prev Img
    </button>
    <button class="btn btn-secondary" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
      Next Img <i class="fas fa-chevron-right"></i>
    </button>
  </div>
@endif
          <p>Price: £{{ $product->price }}</p>
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
          <p>Description: {{ $product->description }}</p>
      </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h4>Essential Outfits</h4>
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



</html>