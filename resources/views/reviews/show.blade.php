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
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 40px 20px;
}

.top-container {
    display: flex;
    justify-content: center; 
    align-items: center; 
    gap: 20px; 
    padding: 40px 20px;
    flex-wrap: wrap;
    max-width: 900px; 
    margin: 0 auto; 
}

.image-container {
    display: flex;
    justify-content: center; 
    align-items: center; 
    flex: 0 0 400px;
}

.product-image {
    width: 400px;
    height: 400px;
    object-fit: cover;
    border-radius: 12px;
    border: 1px solid #ddd;
}

.container {
    flex: 0 0 500px;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

    #star-rating {
        display: flex;
        justify-content: center;
        gap: 5px;
        margin-top: 8px;
    }

    .star {
        font-size: 24px;
        color: #ccc;
        cursor: pointer;
        transition: color 0.2s ease-in-out;
    }

    .star.active {
        color: #f7d74e;
    }

    @media (max-width: 768px) {
        .top-container {
            flex-direction: column;
            gap: 20px;
        }

        .image-container, .container {
            width: 100%;
            flex: 0 0 auto;
        }

        .product-image {
            width: 100%;
            height: auto;
        }
    }
.text-center {
    text-align: center;
}


.product-rating {
    margin-bottom: 30px;
    font-size: 1.5em;
}

.product-rating .average-rating {
    font-weight: bold;
}

.product-rating .stars {
    margin-top: 10px;
}

.product-rating .stars i {
    font-size: 1.2em;
    color: #FFD700;
}


.button2 {
    background-color:rgb(0, 0, 0);
    color: #fff;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.button2:hover {
    background-color: #333;
}

.button2.mt-2 {
    margin-top: 10px;
}


.reviews-container {
    max-height: 500px; 
    overflow-y: auto;
    padding-right: 10px;
}


.review-box {
    background-color: #f9f9f9;
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 15px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.review-box p {
    margin: 5px 0;
}

.review-box .fas,
.review-box .far {
    color: #FFD700;
}

.review-box .review-user {
    font-weight: bold;
    font-size: 1.1em;
}

.review-box .review-comment {
    margin-top: 10px;
    font-size: 1em;
    color: #333;
}


.reviews-container::-webkit-scrollbar {
    width: 8px;
}

.reviews-container::-webkit-scrollbar-thumb {
    background-color: #ddd;
    border-radius: 10px;
}

.reviews-container::-webkit-scrollbar-thumb:hover {
    background-color: #bbb;
}

.reviews-container::-webkit-scrollbar-track {
    background-color: #f1f1f1;
}


.review-section {
    max-width: 900px; 
    width: 100%;
    margin: 40px auto; 
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}




    </style>
</head>
<body>
    <header>
        @include('header')
    </header>

    <main>
    <div class="top-container">
        <div class="image-container">
            @php
                $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
            @endphp

            @if(!empty($images) && is_array($images) && isset($images[0]))
                <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" alt="{{ $product->name }}" class="product-image">
            @else
                <img src="{{ asset('images/default-placeholder.png') }}" alt="Default Image" class="product-image">
            @endif

            
        </div>

        <div class="container">
            <h1 class="text-center">{{ $product->name }}</h1>
            <p class="text-center">
                Average Rating: <strong>{{ number_format($averageRating, 1) }}</strong> / 5
                <br>
                <div id="star-rating">
                    @for ($i = 1; $i <= 5; $i++)
                        @if($averageRating >= $i)
                            <i class="fas fa-star star active" data-value="{{ $i }}"></i>
                        @elseif($averageRating >= $i - 0.5)
                            <i class="fas fa-star-half-alt star active" data-value="{{ $i }}"></i>
                        @else
                            <i class="far fa-star star" data-value="{{ $i }}"></i>
                        @endif
                    @endfor
                </div>
            </p>
            <div class="text-center mb-4">
            <a href="{{ route('reviews.create', ['id' => $product->id]) }}" class="button2">Submit a Review</a>
            <a href="{{ route('products.show', ['id' => $product->id]) }}" class="button2 mt-2">Back to Product</a>
        </div>
        </div>
    </div>

    <div class="container mt-5 review-section">
        <h2 class="text-center">Customer Reviews</h2>
        @foreach ($reviews as $review)
            <div class="review-box">
                <strong>{{ $review->user->name }}</strong>
                <p>Rating: {{ $review->rating }} / 5</p>
                <p>
                    @for ($i = 1; $i <= 5; $i++)
                        @if($review->rating >= $i)
                            <i class="fas fa-star" style="color: #FFD700;"></i>
                        @else
                            <i class="far fa-star" style="color: #FFD700;"></i>
                        @endif
                    @endfor
                </p>
                <p>{{ $review->comment }}</p>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('reviewChart').getContext('2d');
        var reviewChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
                datasets: [{
                    label: 'Number of Reviews',
                    data: @json($reviewCounts),
                    backgroundColor: ['red', 'orange', 'yellow', 'lightgreen', 'green']
                }]
            }
        });
    </script>
    </main>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
