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
        body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Ensures body takes full height */
        }

        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            flex: 1; /* Pushes footer down */
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
            align-items: center;
        }

        .carousel img {border-radius: 8px;}
        .product-description {padding: 20px;}
        .product-description h1 {font-size: 28px;color: #333;}
        .product-description h2 {font-size: 24px;color: #007bff;}
        .product-description p {font-size: 16px;color: #444;}

        .btn-primary {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .btn-primary:hover {background-color: #45a049;}

        /* Sticky Footer */
        .footer {
            background-color: #1a1a1a;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            margin-top: auto; /* Push footer to bottom */
        }

        .footer-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px;
        }

        .footer h4 {font-size: 1.2rem;color: #f5f5f5;font-weight: bold;}
        .footer p, .footer a {font-size: 1rem;color: #ccc;text-decoration: none;}
        .footer a:hover {color: #fff;text-decoration: underline;}

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

<div class="container mt-5">
    <div class="row">
        <!-- Product Images (Left) -->
        <div class="col-md-6">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            @endif
        </div>

        <!-- Product Details (Right) -->
        <div class="col-md-6">
            <div class="product-description">
                <h1>{{ $product->name }}</h1>
                <h2>£{{ $product->price }}</h2>
                <p>Description: {{ $product->description }}</p>

                <!-- Rating -->
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

                <!-- Size Selection -->
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
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<footer class="footer">
    <div class="footer-container">
        <div class="footer-about">
            <h4>Essential Outfits</h4>
            <p>Providing you effortless fashion from the best streetwear brands.</p>
        </div>
        <div class="footer-contact">
            <h4>Contact Us</h4>
            <p><a href="mailto:queriesessential@gmail.com">Email: essentialsenqueries@gmail.com</a></p>
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

</body>
</html>
