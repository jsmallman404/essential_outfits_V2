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
  
  <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

  <style>
    
    body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            margin-top: 50px;
        }
       
        .row {
    display: flex;
    justify-content: center; 
   
    width: 100%; 
    padding: 20px;
}

.product-container {
    display: flex;
    justify-content: center; 
    align-items: flex-start; 
    flex-wrap: wrap; 
    gap: 20px;
    padding: 20px;
    width: 100%; 
    box-sizing: border-box; 
}

.product-card {
    width: 100%; 
    max-width: 300px; 
    margin: 0 auto; 
}


        .product-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
        }
        .product-card img {
            width: 100%;
            height: 300px;
            object-fit: cover;
        }
        .product-info {
            padding: 1rem;
            text-align: center;
            
        }
        .product-info h5 {
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





        .product-info p {
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
    min-width: 125px;
    
    box-sizing: border-box;  
    color: #ddd;
}

.flex-fill{
    flex: 1;
}


.btn-container .btn-cart {
    background-color: black;  
    
    padding: 10px 18px;

}


.btn-container .btn-view {
    background-color: rgb(0, 0, 0);  
}


.btn-container .btn:hover {
    background-color: #333;
}

.btn-container .btn-view:hover {
    background-color: #333;
}





.wishlist-form {
    display: flex;
    justify-content: center;
    align-items: center;
    width: 100%;
}


.wishlist-btn {
    margin-top: 4px;
    
    

    align-items: center;
    gap: 5px;
    border: none;
    background: none;
    cursor: pointer;
}


.wishlist-btn span {
    font-size: 14px;
    transition: color 0.3s ease;
    color: black;
}


.wishlist-btn i {
    transition: color 0.3s ease;
}


.wishlist-btn:hover i {
    color: red;
}


.wishlist-btn.active {
    display: flex;
    align-items: center;
    gap: 5px;
    
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

  <main >
    <h1 class="bestsellers text-center mb-4">BESTSELLERS</h1>
    <div class="row">
                @foreach($bestSellers as $product)
                        <div class="col-md-4 mb-4">
                            <div class="product-card">
                                @php
                                    $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                                @endphp

                                @if(!empty($images) && is_array($images) && isset($images[0]))
                                    <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" width="100" height="100" style="object-fit: cover;">
                                @else
                                    <img src="{{ asset('images/default-placeholder.png') }}" width="100" height="100" style="object-fit: cover;">
                                @endif

                                <div class="product-info">
                                    <h5>{{ $product->name }}</h5>
                                    <p>£{{ $product->price }}</p>
                                    

                                    @php
                                        $inWishlist = Auth::check() && Auth::user()->wishlist()->where('product_id', $product->id)->exists();
                                    @endphp

<form id="wishlist-form-{{ $product->id }}" action="{{ $inWishlist ? route('wishlist.remove', $product->id) : route('wishlist.add', $product->id) }}" method="POST" class="wishlist-form" data-in-wishlist="{{ $inWishlist ? 'true' : 'false' }}">
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
                                                        $stockText = '<span style="color: red; font-weight: bold;">- Out of Stock</span>';
                                                    } elseif ($variant->stock < 5) {
                                                        $stockText = ' - Only ' . $variant->stock . ' Left';
                                                    }
                                                @endphp
                                                <option value="{{ $variant->id }}">
                                                    {{ $variant->size }} {!! $stockText !!}
                                                </option>
                                            @endforeach
                                        </select>

                                        <div class="btn-container">
        
        <form action="{{ route('cart.add', $product->id) }}" method="POST" class="flex-fill">
            @csrf
            <button type="submit" class="btn btn-cart">Add To Cart </button>
        </form>

        
        <form action="{{ route('products.show', $product->id) }}" method="GET" class="flex-fill">
            <input type="hidden" name="id" value="{{ $product->id }}">
            <input type="hidden" name="name" value="{{ urlencode($product->name) }}">
            <input type="hidden" name="price" value="{{ $product->price }}">
            <input type="hidden" name="image" value="{{ urlencode(asset($product->image)) }}">
            <input type="hidden" name="description" value="{{ $product->description }}">
            <input type="hidden" name="logo" value="{{ asset('images/essentiallogo1.png') }}">
            <button type="submit" class="btn btn-view">View</button>
        </form>
    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
</main>

 
<button class="chat-toggle"><i class="fas fa-comment"></i></button>


<div class="chat-container">
  <div class="chat-header">
    Chat Assistant
    <button class="chat-minimize" title="Minimize Chat">
      <i class="fas fa-minus"></i>
    </button>

  </div>
  <div class="chat-messages"></div>
  <div class="chat-input">
    <input type="text" id="chat-input-text" placeholder="Ask me anything...">
    <button onclick="sendMessage()">Send</button>
  </div>
</div>

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

<script>

function showGreetingMessage() {
    let chatBox = document.querySelector(".chat-messages");
    let greetingMessage = document.createElement("div");
    greetingMessage.classList.add("bot-message");

    const namePart = loggedInUserName ? `${loggedInUserName}, ` : "";
    greetingMessage.innerHTML = `Hello ${namePart}👋 Welcome to <strong>Essential Outfits</strong>.<br>
    Check out our <a href="/products" style="color:#007bff;text-decoration:underline;">Products Page</a> for the latest streetwear drops!`;

    chatBox.appendChild(greetingMessage);
    chatBox.scrollTop = chatBox.scrollHeight;
}


document.querySelector(".chat-toggle").addEventListener("click", function () {
    let chatContainer = document.querySelector(".chat-container");
    let chatBox = document.querySelector(".chat-messages");

    if (chatContainer.classList.contains("show")) {
        chatContainer.classList.remove("show");
        setTimeout(() => chatContainer.style.display = "none", 300);
    } else {
        chatContainer.style.display = "flex";
        setTimeout(() => {
            chatContainer.classList.add("show");
            
            if (chatBox.childElementCount === 0) {

                showGreetingMessage(); //  Show greeting only if chat is empty
            }
        }, 10);
    }
});


function sendMessage() {
    let inputField = document.getElementById("chat-input-text");
    let message = inputField.value.trim();
    if (!message) return;

    let chatBox = document.querySelector(".chat-messages");
    let userMessage = document.createElement("div");
    userMessage.classList.add("user-message");
    userMessage.textContent = message;
    chatBox.appendChild(userMessage);

    inputField.value = "";

    
    setTimeout(() => {
        let botResponse = document.createElement("div");
        botResponse.classList.add("bot-message");

        let response = generateResponse(message);

        if (typeof response === "string") {
            botResponse.textContent = response;
        } else {
            botResponse.appendChild(response);
        }

        chatBox.appendChild(botResponse);
        chatBox.scrollTop = chatBox.scrollHeight;
    }, 1000);
}


function generateResponse(userMessage) {
    let message = userMessage.toLowerCase();

    if (message.includes("hello") || message.includes("hi")) {
    return `Hello${loggedInUserName ? ` ${loggedInUserName}` : ""}! How can I assist you with your shopping today?`;
    } else if (message.includes("order")) {
        return "You can check your order status in your account section.";
    } else if (message.includes("bestseller")) {
        return "Our top-selling item is the Racer Worldwide Black Waxed Bomber!";
    } else if (message.includes("discount") || message.includes("sale")) {
        return "We have a sale coming soon! Stay tuned for updates.";
    } else if (message.includes("return")) {
        return "You can return the item in next 14 days.";
    } else if (message.includes("about") || message.includes("essential outfits")) {
        let responseContainer = document.createElement("div");
        responseContainer.innerHTML = "Essential Outfits is a street-style clothing website providing you effortless fashion from the best streetwear brands.";

        let aboutButton = document.createElement("button");
        aboutButton.textContent = "About Us";
        aboutButton.style.cssText = "background:#007bff;color:white;padding:5px 10px;margin-top:5px;border:none;border-radius:5px;cursor:pointer;";
        aboutButton.onclick = function () {
            window.location.href = "/about"; 
        };

        responseContainer.appendChild(document.createElement("br"));
        responseContainer.appendChild(aboutButton);

        return responseContainer;
    } else {
        let responseContainer = document.createElement("div");
        responseContainer.innerHTML = "I'm not sure about that. Contact our team for help.";

        let contactButton = document.createElement("button");
        contactButton.textContent = "Contact Support";
        contactButton.style.cssText = "background:#ff4500;color:white;padding:5px 10px;margin-top:5px;border:none;border-radius:5px;cursor:pointer;";
        contactButton.onclick = function () {
            window.location.href = "/contact"; 
        };

        responseContainer.appendChild(document.createElement("br"));
        responseContainer.appendChild(contactButton);

        return responseContainer;
    }
}

document.getElementById("chat-input-text").addEventListener("keypress", function (event) {
    if (event.key === "Enter") {
        sendMessage();
    }
});


window.addEventListener("load", function () {
    const chatContainer = document.querySelector(".chat-container");
    const chatBox = document.querySelector(".chat-messages");

 
    chatContainer.style.display = "flex";

    
    setTimeout(() => {
        chatContainer.classList.add("show");

        
        if (chatBox.childElementCount === 0) {
            setTimeout(() => {
                showGreetingMessage();
            }, 300);
        }
    }, 500);
});



document.addEventListener("DOMContentLoaded", function () {
    
    let productTitles = document.querySelectorAll(".product-info h5");

    function adjustFontSize(h5) {
        if (!h5) return;

        let textLength = h5.innerText.trim().length;

        if (textLength > 50) {
            h5.style.fontSize = "0.75rem";
        } else if (textLength > 35) {
            h5.style.fontSize = "0.95rem"; 
        } else if (textLength > 17) {
            h5.style.fontSize = "1.15rem"; 
        } else if (textLength > 16) {
            h5.style.fontSize = "1.5rem";
        } else {
            h5.style.fontSize = "1.5rem"; 
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

document.addEventListener("DOMContentLoaded", function () {
    let productCards = document.querySelectorAll('.wishlist-btn');

    productCards.forEach(function(wishlistButton) {
        const productId = wishlistButton.querySelector('i').id.split('-')[2];
        const heartIcon = document.querySelector('#wishlist-icon-' + productId);
        const inWishlist = wishlistButton.closest('form').getAttribute('data-in-wishlist') === 'true';

        if (inWishlist) {
            heartIcon.style.color = 'red';
            wishlistButton.classList.add('active');
        } else {
            heartIcon.style.color = 'black';
        }

        heartIcon.addEventListener('mouseover', () => {
            if (!wishlistButton.classList.contains('active')) {
                heartIcon.style.color = 'red';
            }
        });

        heartIcon.addEventListener('mouseout', () => {
            if (!wishlistButton.classList.contains('active')) {
                heartIcon.style.color = 'black';
            }
        });

        heartIcon.addEventListener('click', () => {
            if (wishlistButton.classList.contains('active')) {
                heartIcon.style.color = 'black';
            } else {
                heartIcon.style.color = 'red';
            }
            wishlistButton.classList.toggle('active');
        });
    });
});





document.addEventListener("DOMContentLoaded", function () {
    const chatMinimize = document.querySelector(".chat-minimize");
    const chatContainer = document.querySelector(".chat-container");

    if (chatMinimize && chatContainer) {
        chatMinimize.addEventListener("click", function () {
            chatContainer.classList.remove("show");
            setTimeout(() => {
                chatContainer.style.display = "none";
            }, 300);
        });
    }
});



</script>

<script>
    const loggedInUserName = @json(auth()->check() ? auth()->user()->name : null);
</script>


</body>
</html>
