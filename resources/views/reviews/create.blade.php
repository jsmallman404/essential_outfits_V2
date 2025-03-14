<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit a Review for {{ $product->name }}</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Additional styling to match Order Details page */
        .button2 {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        .button2:hover {
            background-color: #45a049;
        }
        label {
            font-weight: bold;
            margin-top: 10px;
        }
        textarea, select, input[type="text"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        /* Star Rating Styles */
        #star-rating .star {
            font-size: 24px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.3s;
        }
        #star-rating .star.selected {
            color: #FFD700;
        }
    </style>
</head>
<body>
    @include('header')
    
    <div class="container mt-5">
        <h1 class="text-center">Submit a Review for {{ $product->name }}</h1>
        
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->id }}">
            
            <div class="mb-3">
                <label for="rating">Rating:</label>
                <div id="star-rating">
                    <i class="fas fa-star star" data-value="1"></i>
                    <i class="fas fa-star star" data-value="2"></i>
                    <i class="fas fa-star star" data-value="3"></i>
                    <i class="fas fa-star star" data-value="4"></i>
                    <i class="fas fa-star star" data-value="5"></i>
                </div>
                <input type="hidden" name="rating" id="rating" value="0" required>
            </div>
            
            <div class="mb-3">
                <label for="comment">Comment:</label>
                <textarea name="comment" id="comment" required></textarea>
            </div>
            
            <div class="text-center">
                <button type="submit" class="button2">Submit Review</button>
            </div>
        </form>
    </div>
    
    <script>
        // JavaScript to handle star rating selection
        const stars = document.querySelectorAll('#star-rating .star');
        const ratingInput = document.getElementById('rating');
        
        stars.forEach(star => {
            star.addEventListener('click', () => {
                const ratingValue = star.getAttribute('data-value');
                ratingInput.value = ratingValue;
                
                // Remove "selected" class from all stars
                stars.forEach(s => s.classList.remove('selected'));
                
                // Add "selected" class to stars up to the clicked star
                for (let i = 0; i < ratingValue; i++) {
                    stars[i].classList.add('selected');
                }
            });
        });
    </script>
</body>
</html>