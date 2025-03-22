<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .nav-buttons {
            display: flex;
            justify-content: center;
            background-color: #ded4c0;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .nav-buttons .dropdown {
            position: relative;
            margin: 0 15px;
        }
        .nav-buttons a {
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            color: #555;
            padding: 5px 10px;
            display: block;
            transition: color 0.3s ease, background-color 0.3s ease;
        }
        .nav-buttons a:hover {
            color: #000;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            min-width: 200px;
            z-index: 1000;
            border-radius: 8px;
            overflow: hidden;
        }
        .dropdown-content a {
            padding: 12px 20px;
            font-size: 1em;
            color: #555;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .dropdown-content a:hover {
            background-color: #ded4c0;
            color: #000;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        @media (max-width: 768px) {
            .nav-buttons {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }
            .dropdown {
                margin: 10px 0;
            }
        }
        .account-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .account-actions a {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 14px;
            color: #555;
            transition: color 0.3s ease;
            gap: 5px;
        }
        .account-actions a:hover {
            color: #000;
        }
        .account-actions a i {
            font-size: 16px;
        }
        .account-actions .search-bar {
            padding: 5px 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f6ef;
            width: 150px;
            transition: width 0.3s ease;
        }
        .account-actions .search-bar:hover {
            width: 250px;
        }
        .account-actions .search-bar:focus {
            width: 250px;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #ded4c0;
        }
 
main {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: flex-start;
    gap: 40px; 
    padding: 40px 20px;
    flex-wrap: wrap;
}

.product-container {
        display: flex;
        justify-content: space-between;
        gap: 40px;
        background-color:rgb(255, 255, 255);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
    }
    .product-gallery, .product-description {
        width: 48%;
    }
    .review-btn {
        margin-left: 10px;
    }
    .review-link {
        margin-left: 10px;
        font-size: 0.9em;
        color: #555;
        text-decoration: none;
    }
    .review-link:hover {
        color: #000;
        text-decoration: underline;

    }

    .wishlist-btn {
        margin-top: -25px;
        margin-left: -5px;
    vertical-align: middle;
    display: flex;
    align-items: center;
    gap: 5px;
}
.wishlist-btn span {
    font-size: 14px;
    transition: color 0.3s ease;
}

.wishlist-btn i {
    transition: color 0.3s ease; /* Smooth transition for color change */
}

.wishlist-btn:hover i {
    color: red; /* Turns the heart icon red on hover */
}






.btn, .reviews-btn {
    background-color:rgb(0, 0, 0);
    font-weight: bold;
    width: 100%; 
    padding: 10px 20px; 
    font-size: 16px; 
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px; 
    border-radius: 5px; 
}

.btn-container {
    display: flex;
    gap: 15px; 
}

.flex-fill {
    flex: 1; 
}

.btn:hover, .reviews-btn:hover {
    background-color: #333;
}

.wishlist-btn.active i {
    color: red;
}

    </style>
</head>
<body>
    <header>
        @include('header')
    </header>

    <main>
    <div class="container mt-5">
        <div class="product-container">
            
            <div class="product-gallery">
                @php
                    $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                @endphp

                @if(is_array($images) && count($images) > 0)
                    <img id="mainImage" src="{{ asset('storage/' . ltrim($images[0], '/')) }}" class="large-image d-block w-100" alt="Main Product Image">

                    <div class="thumbnails d-flex justify-content-center mt-2">
                        @foreach($images as $index => $image)
                            <img src="{{ asset('storage/' . ltrim($image, '/')) }}" class="thumbnail mx-1" onclick="changeImage(this)" style="width: 70px; height: auto; cursor: pointer; border-radius: 5px;">
                        @endforeach
                    </div>
                @endif
            </div>

            
            <div class="product-description">
                <h1>{{ $product->name }}</h1>
                <h2>£{{ $product->price }}</h2>
                <p>Description: {{ $product->description }}</p>

                
                <p>
                    
                        Average Rating: <strong>{{ number_format($averageRating, 1) }}</strong> / 5
                        <br>
                        @for ($i = 1; $i <= 5; $i++)
                            @if($averageRating >= $i)
                                <i class="star fas fa-star" style="color: #FFD700;"></i>
                            @elseif($averageRating >= $i - 0.5)
                                <i class="star fas fa-star-half-alt" style="color: #FFD700;"></i>
                            @else
                                <i class="star far fa-star" style="color: #FFD700;"></i>
                            @endif
                        @endfor
                    
                    <a href="{{ route('reviews.show', ['id' => $product->id]) }}" class="review-link">Look at reviews?</a>
                </p>

                
                @php
                    $inWishlist = Auth::check() && Auth::user()->wishlist()->where('product_id', $product->id)->exists();
                @endphp
                <form id="wishlist-form-{{ $product->id }}" action="{{ $inWishlist ? route('wishlist.remove', $product->id) : route('wishlist.add', $product->id) }}" method="POST" style="display: inline; margin-left: 10px; margin-top: -10px;" class="wishlist-form">
    @csrf
    @if($inWishlist)
        @method('DELETE')
    @endif
    <button type="submit" class="wishlist-btn" style="border: none; background: none; cursor: pointer; display: flex; align-items: center; gap: 5px;">
        <i id="wishlist-icon-{{ $product->id }}" class="{{ $inWishlist ? 'fas' : 'far' }} fa-heart" style="font-size: 20px; color: {{ $inWishlist ? 'red' : 'black' }};"></i>
        <span style="font-size: 14px;">
            {{ $inWishlist ? 'Remove from Wishlist' : 'Add to Wishlist' }}
        </span>
    </button>
</form>

                
                <form action="{{ route('cart.add', $product->id) }}" method="POST">
                    @csrf
                    <label for="variant_id">Select Size:</label>
                    <select name="variant_id" class="form-control mb-2" required>
                        @foreach($product->variants as $variant)
                            @php
                                $stockText = '';
                                if ($variant->stock == 0) {
                                    $stockText = '<span style="color: red; font-weight: bold;">Out of Stock</span>';
                                } elseif ($variant->stock < 5) {
                                    $stockText = 'Only ' . $variant->stock . ' Left';
                                }
                            @endphp
                            <option value="{{ $variant->id }}">
                                {{ $variant->size }} {!! $stockText !!}
                            </option>
                        @endforeach
                    </select>
                    <div class="btn-container d-flex gap-3">
    
    <button type="submit" class="btn btn-primary btn-lg flex-fill">Add to Cart</button>

   
    <a href="{{ route('reviews.show', ['id' => $product->id]) }}" class="btn btn-primary btn-lg flex-fill" style="text-decoration: none; display: flex; justify-content: center; align-items: center;">
        Reviews
    </a>
</div>
</form>
            </div>
        </div>
    </div>

    <script>
        function changeImage(element) {
            document.getElementById('mainImage').src = element.src;
        }




        const heartIcon = document.querySelector('#wishlist-icon-{{ $product->id }}'); // Get the heart icon
const wishlistButton = document.querySelector('.wishlist-btn'); // Get the wishlist button

// Hover effect to change the heart icon color to red when mouse is over it
heartIcon.addEventListener('mouseover', () => {
    heartIcon.style.color = 'red'; // Change the heart icon to red
});

// Mouseout effect to revert back to the original color when mouse leaves the icon
heartIcon.addEventListener('mouseout', () => {
    if (!wishlistButton.classList.contains('active')) {
        heartIcon.style.color = 'black'; // Reset the color back to black
    }
});

// Click effect to toggle the active class and change the heart icon color
heartIcon.addEventListener('click', () => {
    if (wishlistButton.classList.contains('active')) {
        heartIcon.style.color = 'black'; // If already active, remove red color
    } else {
        heartIcon.style.color = 'red'; // If not active, set to red
    }
    wishlistButton.classList.toggle('active'); // Toggle active class to track if it's in wishlist
});

    </script>
</main>


    <footer>
        @include('footer')
    </footer>
</body>
</html>
