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


.image-container {
    max-width: 400px;
    width: 100%;
}


.product-image {
    width: 100%;
    height: auto;
    border-radius: 12px;
    border: 1px solid #ddd;
}


.container {
    max-width: 500px;
    width: 100%;
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}


h1 {
    font-size: 24px;
    margin-bottom: 20px;
}


#star-rating {
    display: flex;
    gap: 5px;
    margin-top: 8px;
}


.star {
    font-size: 24px;
    color: #ccc;
    cursor: pointer;
    transition: color 0.2s ease-in-out;
}


.star:hover,
.star.hover,
.star.active {
    color: #f7d74e; 
}


textarea {
    width: 100%;
    height: 120px;
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #ccc;
    resize: none;
    outline: none;
}



.button2 {
    background-color: #4caf50;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background-color 0.2s;
}

.button2:hover {
    background-color: #45a049;
}


@media (max-width: 768px) {
    main {
        flex-direction: column;
        align-items: center;
        gap: 20px;
    }

    .image-container, .container {
        width: 100%;
    }
}



@media (max-width: 768px) {
    .container {
        padding: 15px;
    }

    h1 {
        font-size: 20px;
    }

    .star {
        font-size: 20px;
    }

    .button2 {
        width: 100%;
    }
}

.review-container {
    display: flex;
    justify-content: center;
    align-items: center;
    
    gap: 40px; 
    padding: 40px 20px;
}

.image-container {
    flex: 0 0 400px; 
    display: flex;
    justify-content: center;
    
    
    margin-top: 40px; 


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


@media (max-width: 768px) {
    .review-container {
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


.button2 {
            background-color: black;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .button2:hover {
            background-color: #333;
        }





    </style>
</head>
<body>
    <header>
        @include('header')
    </header>

    <main>
    <div class="review-container">
       
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

     
        <div class="container mt-5">
            <h1 class="text-center">Submit a Review for {{ $product->name }}</h1>
            
            <form action="{{ route('reviews.store') }}" method="POST"id="review-form">
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
    <button type="submit" class="button2" id="submit-btn">Submit Review</button>
</div>
            </form>
        </div>
    </div>
    
    <script>

const stars = document.querySelectorAll('#star-rating .star');
const ratingInput = document.getElementById('rating');
const reviewForm = document.querySelector('form');
const commentInput = document.getElementById('comment');
const form = document.getElementById('review-form');


stars.forEach(star => {
    star.addEventListener('mouseover', () => {
        const ratingValue = star.getAttribute('data-value');
        
        stars.forEach((s, index) => {
            if (index < ratingValue) {
                s.classList.add('hover');
            } else {
                s.classList.remove('hover');
            }
        });
    });

    star.addEventListener('mouseout', () => {
        stars.forEach(s => {
            s.classList.remove('hover');
        });
    });

    
    star.addEventListener('click', () => {
        const ratingValue = star.getAttribute('data-value');
        ratingInput.value = ratingValue;
        
        stars.forEach(s => s.classList.remove('active'));
        
        for (let i = 0; i < ratingValue; i++) {
            stars[i].classList.add('active');
        }
    });
});

document.getElementById('submit-btn').addEventListener('click', function(event) { 
    event.preventDefault();  
    if (!commentInput.value){
        alert("Please provide a Comment")
        
    }
    if (ratingInput.value == 0){
        alert("Please Provide a Rating")     
    }

    if(commentInput.value && ratingInput.value > 0  ){
        form.submit();  
    }
    


});

    </script>
    </main>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
