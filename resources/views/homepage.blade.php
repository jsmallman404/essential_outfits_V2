<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Essential Outfits</title>
  <link rel="stylesheet" href="{{ asset('css/brandstyles.css') }}">
  <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('css/chat.css') }}">

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

  <main id="products" class="product-container">
    <h1 class="bestsellers">BESTSELLERS.</h1>
    <div class="product-card">
      <img src="images/blackbomber.png" alt="Product 1">
      <div class="product-info">
        <h2>Racer Worldwide - Black Waxed Bomber</h2>
        <p>£120</p>
        <button>View Details</button>
        <button class="add-to-wishlist-btn" data-product="Racer Worldwide - Black Waxed Bomber">Add to Wishlist</button>
      </div>
    </div>
    <div class="product-card">
      <img src="images/marlyn.png" alt="Product 2">
      <div class="product-info">
        <h2>OSBATT - Marlyn T-Shirt 4th Anniversary Edition</h2>
        <p>£45</p>
        <button>View Details</button>
        <button class="add-to-wishlist-btn" data-product="Racer Worldwide - Black Patch Hoodie">Add to Wishlist</button>
      </div>
    </div>
    <div class="product-card">
      <img src="images/jadedhoodie.png" alt="Product 3">
      <div class="product-info">
        <h2> Jaded London - Deep Red Fade Mini Monster Hoodie        </h2>
        <p>£68 £63</p>
        <button>View Details</button>
        <button class="add-to-wishlist-btn" data-product="Racer Worldwide - Cargo Coated Pants">Add to Wishlist</button>
      </div>
    </div>
  </main>

  <!-- Chatbot Button -->
<button class="chat-toggle"><i class="fas fa-comment"></i></button>

<!-- Chatbot Window -->
<div class="chat-container">
  <div class="chat-header">Chat Assistant</div>
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
        images[currentIndex].classList.remove("active"); // Remove active class from current image
        currentIndex = (currentIndex + 1) % images.length; // Move to next image
        images[currentIndex].classList.add("active"); // Show new active image
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
            // Clear previous messages if needed: chatBox.innerHTML = "";
            if (chatBox.childElementCount === 0) {
                showGreetingMessage(); // 👈 Show greeting only if chat is empty
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

    // Get Response
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

// Generate Response Function
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

// Auto-show chatbot 
window.addEventListener("load", function () {
    const chatContainer = document.querySelector(".chat-container");
    const chatBox = document.querySelector(".chat-messages");

 
    chatContainer.style.display = "flex";

    // Animate it in
    setTimeout(() => {
        chatContainer.classList.add("show");

        // Only show greeting if the chat is empty
        if (chatBox.childElementCount === 0) {
            setTimeout(() => {
                showGreetingMessage();
            }, 300);
        }
    }, 500);
});

</script>

<script>
    const loggedInUserName = @json(auth()->check() ? auth()->user()->name : null);
</script>


</body>
</html>
