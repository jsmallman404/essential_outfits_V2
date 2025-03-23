<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store - Products</title>
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
        body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            margin-top: 50px;
            
        }
        h2 {
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            color: #795809;
        }


        html, body {
    height: 100%;
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
}

main {
    flex: 1;
    padding-bottom: 20px; 
}
.product-card {
            background-color: #ded4c0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .product-card img {
    width: 100%;             
    height: auto;            
    aspect-ratio: 1 / 1;     
    object-fit: cover;       
}

        .card-body {
            padding: 1rem;
            text-align: center;
            
        }
        .card-body h5 {
    font-size: 1.5rem; 
    font-weight: bold;
    text-align: center;
    word-wrap: break-word; 
    line-height: 1.2; 
    width: 100%; 
    max-width: 100%; 
    margin: 0 auto; 
    overflow-wrap: break-word; 
    height: 40px; 
    max-height: none; 
}





        .card-body p {
            font-size: 1rem;
            color: #555;
            margin-top: 5px;
            margin-bottom: -5px;
        }



.btn-container {
    display: flex;
    gap: 15px;  
    width: 100%;  
    justify-content: space-evenly;  
    align-items: center;  
    margin-top: 5px;
}


.btn-container .btn {
    background-color: rgb(0, 0, 0);
    font-weight: bold;
    padding: 10px 20px;  
    font-size: 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
    border-radius: 5px;
    min-width: 150px;
    
    box-sizing: border-box;  
    color: #ddd;
}

.flex-fill{
    flex: 1;
}


.btn-container .btn-remove {
    background-color: black;  
}


.btn-container .btn-view {
    background-color: rgb(0, 0, 0);  
}


.btn-container .btn-remove:hover {
    background-color: #333;
}

.btn-container .btn-view:hover {
    background-color: #333;
}

.black-button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            
        }
        .black-button:hover {
            background-color: #333;
        }



    </style>
</head>
<body>
    <header>
        @include('header')
    </header>
    <main>
    <div class="container">
        <h2>My Wishlist</h2>
        @if($wishlistItems->isEmpty())
    <p class="wishlist-empty" style="text-align: center; margin-top: 20px;">Your wishlist is empty. Start adding your favourite products!</p>
    <div style="text-align: center; margin-top: 15px;">
        <a href="{{ route('products.index') }}" class="black-button btn btn-dark" style="padding: 10px 20px; font-size: 1rem; border-radius: 5px; text-decoration: none;">
            View Products
        </a>
    </div>
        @else
            <div class="row">
                @foreach($wishlistItems as $wishlistItem)
                    <div class="col-md-4 mb-4">
                        <div class="product-card">
                            @php
                                $images = is_array($wishlistItem->product->images) ? $wishlistItem->product->images : json_decode($wishlistItem->product->images, true);
                            @endphp
                            @if(!empty($images) && is_array($images) && isset($images[0]))
                                <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" width="100" height="100" style="object-fit: cover;">
                            @else
                                <img src="{{ asset('images/default-placeholder.png') }}" width="100" height="100" style="object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $wishlistItem->product->name }}</h5>
                                <p class="card-text">£{{ $wishlistItem->product->price }}</p>
                                <div class="btn-container">
                                    <a href="{{ route('product.details', ['id' => $wishlistItem->product->id]) }}" class="btn btn-view">
                                        View Product
                                    </a>
                                    <form action="{{ route('wishlist.remove', $wishlistItem->product->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class=" btn btn-remove">Remove</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    </main>
    @include('footer')
    <script>

document.addEventListener("DOMContentLoaded", function () {
    
    let productTitles = document.querySelectorAll(".card-title ");

    function adjustFontSize(h5) {
        if (!h5) return;

        let textLength = h5.innerText.trim().length;

        if (textLength > 50) {
            h5.style.fontSize = "0.95rem";
        } else if (textLength > 35) {
            h5.style.fontSize = "1.15rem"; 
        } else if (textLength > 17) {
            h5.style.fontSize = "1.35rem"; 
        } else if (textLength > 16) {
            h5.style.fontSize = "1.7rem";
        } else {
            h5.style.fontSize = "1.7rem"; 
        }
    }

    productTitles.forEach(function (h5) {
        adjustFontSize(h5);
    });

    let observer = new MutationObserver(function (mutations) {
        mutations.forEach(function (mutation) {
            if (mutation.type === "childList" || mutation.type === "characterData") {
                productTitles = document.querySelectorAll(".product-info h5"); 
                adjustFontSize(h5);
            }
        });
    });

    let parentContainer = document.querySelector(".product-info").parentNode;

    if (parentContainer) {
        observer.observe(parentContainer, {
            childList: true, 
            subtree: true, 
        });
    } else {
        console.error(" Parent container not found! Check the parent div.");
    }
});

    </script>
</body>
</html>
