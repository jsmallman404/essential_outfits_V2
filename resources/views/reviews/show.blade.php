<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews for {{ $product->name }}</title>
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
        .review-box {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    @include('header')

    <div class="container mt-5">
        <h1 class="text-center">Reviews for {{ $product->name }}</h1>
        <p class="text-center">
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
        </p>
        <div class="text-center mb-4">
            <a href="{{ route('reviews.create', ['id' => $product->id]) }}" class="button2">Submit a Review</a>
            <a href="{{ route('products.show', ['id' => $product->id]) }}" class="button2 mt-2">Back to Product</a>
        </div>

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
</body>
</html>