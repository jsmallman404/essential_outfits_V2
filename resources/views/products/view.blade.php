<?php
// Retrieve product details from URL parameters
$product_id = isset($_GET['id']) ? $_GET['id'] : 'Unknown';
$product_name = isset($_GET['name']) ? urldecode($_GET['name']) : 'Unknown Product';
$product_price = isset($_GET['price']) ? $_GET['price'] : 'N/A';
$product_image = isset($_GET['image']) ? urldecode($_GET['image']) : 'placeholder.jpg';
$product_description = isset($_GET['description']) ? htmlspecialchars($_GET['description']) : 'N/A';
?>




<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <style>
/* General Reset */
body, h1, h2, h3, p, a, div {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Body Styling */
body {
    background-color: #ded4c0;
    font-family: 'Arial', sans-serif;
    color: #333;
}

/* Header Styling */
header {
    background-color: #ded4c0; 
    border-bottom: 1px solid #ddd; 
    padding: 10px 20px;
}

.header-content {
    display: flex;
    align-items: center;
    justify-content: space-between;
}


.logo img {
    width: 150px;
    height: auto;
    display: block;
}

/* Navigation Bar Styling */
.nav-buttons {
  display: flex;
  justify-content: center;
  background-color: #ded4c0; /* Light beige background */
  padding: 10px 20px;
  border-bottom: 1px solid #ddd;
}

.nav-buttons .dropdown {
  position: relative; /* Position relative to anchor dropdown content */
  margin: 0 15px; /* Spacing between dropdowns */
}

.nav-buttons a {
  text-decoration: none;
  font-size: 1.2em;
  font-weight: bold;
  color: #555;
  padding: 5px 10px;
  display: block;
  transition: color 0.3s ease, background-color 0.3s ease; /* Smooth transition for hover */
}

.nav-buttons a:hover {
  color: #000; /* Darker text on hover */
  background-color: #f0f0f0; /* Subtle hover effect */
  border-radius: 5px; /* Rounded effect for hover */
}

/* Dropdown Content Styling */
.dropdown-content {
  display: none; /* Hidden by default */
  position: absolute; /* Position relative to parent dropdown */
  top: 100%; /* Position directly below the parent link */
  left: 0;
  background-color: #fff; /* White background */
  box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2); /* Deeper shadow for depth */
  min-width: 200px; /* Minimum dropdown width */
  z-index: 1000; /* High z-index to ensure it is on top */
  border-radius: 8px; /* Rounded corners for modern look */
  overflow: hidden; /* Clip any overflowing child elements */
}

.dropdown-content a {
  padding: 12px 20px; /* Increase padding for spacing */
  font-size: 1em;
  color: #555; /* Neutral text color */
  text-decoration: none;
  display: block; /* Stack items vertically */
  transition: background-color 0.3s ease, color 0.3s ease; /* Smooth hover effect */
}

.dropdown-content a:hover {
  background-color: #ded4c0; /* Highlight color on hover */
  color: #000;
}

/* Show Dropdown Content on Hover */
.dropdown:hover .dropdown-content {
  display: block; /* Show dropdown when hovering over parent */
}

/* Responsive Styling */
@media (max-width: 768px) {
  .nav-buttons {
    flex-direction: column; /* Stack navigation links vertically */
    align-items: flex-start;
    padding: 20px;
  }

  .dropdown {
    margin: 10px 0; /* Add spacing between stacked dropdowns */
  }
}



/* Account Actions */
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
    gap: 5px; /* Space between icon and text */
}

.account-actions a:hover {
    color: #000;
}

.account-actions a i {
    font-size: 16px; /* Icon size */
}

.account-actions .search-bar {
    padding: 5px 10px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f6ef; /* Light beige background for the search bar */
    width: 150px; /* Initial width */
    transition: width 0.3s ease; /* Smooth width change */
}

.account-actions .search-bar:hover {
    width: 250px; /* Expanded width on hover */
}

.account-actions .search-bar:focus {
    width: 250px; /* Expand on focus */
    outline: none; /* Remove default focus outline for a cleaner look */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Optional shadow for focus */
}



  
  .view-products-btn {
    display: inline-block;
    padding: 0.75rem 1.5rem;
    font-size: 1rem;
    color: #ded4c0;
    background-color: #000; /* Black button */
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease, transform 0.3s ease;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5); /* Shadow for pop effect */
  }
  
  .view-products-btn:hover {
    background-color: #555; /* Darker shade on hover */
    transform: scale(1.05); /* Slight scale effect on hover */
  }
  

  /* Animation for Text */
  @keyframes fadeIn {
    0% {
      opacity: 0;
      transform: translateY(-20px);
    }
    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  .product-container {
    display: flex;
    flex-wrap: wrap; /* Allows content to wrap when space is tight */
    gap: 20px; /* Adds space between items */
    justify-content: space-between; /* Distribute space between the card and the description */
    max-width: 1000px; /* Optional: limits the max width of the container */
    margin: 0 auto; /* Centers the product container horizontally */
    padding: 20px;
}

.product-card {
    flex: 1 1 45%; /* Makes the product card take up 45% of the container width */
    min-width: 300px; /* Ensures the card doesn't shrink too much */
    background-color: #f9f9f9; /* Light background color */
    padding: 20px;
    border: 1px solid #ddd; /* Border around the product card */
    border-radius: 8px; /* Rounded corners for the card */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Adds subtle shadow for effect */
}

.product-card h1 {
    margin-bottom: 10px; /* Adds space between title and image */
    font-size: 24px; /* Adjust title font size */
}

.product-card img {
    max-width: 100%;
    height: auto;
    margin-bottom: 15px; /* Adds space below the image */
}

.product-card p {
    font-size: 16px;
    font-weight: bold;
}

.product-description {
    flex: 1 1 45%; /* Makes the description take up 45% of the container width */
    min-width: 300px;
    background-color: #f9f9f9; /* Light background for description */
    padding: 20px;
    border: 1px solid #ddd; /* Border around the description */
    border-radius: 8px; /* Rounded corners for description */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for effect */
}

.product-description p {
    font-size: 16px; /* Font size for description */
}


    </style>
</head>









<header>
  <div class="header-content">
    <!-- Logo -->
    <div class="logo">
      <a href="homepage.html">
        <img src="images/essentiallogo1.png" alt="Logo">
      </a>
            

    </div>

    <!-- Navigation Bar -->
    <nav class="nav-buttons">
      <div class="dropdown">
        <a href="#">Men</a>
        <div class="dropdown-content">
          <a href="MensShopAll.html">Shop All</a>
          <a href="/men/Jackets&coats">Jackets & Coats</a>
          <a href="/men/Hoodies">Hoodies</a>
          <a href="/men/Sweatshit">Sweatshits</a>
          <a href="/men/T-shirts">T-shirts</a>
          <a href="/men/Tracksuit Bottoms">Tracksuit Bottoms</a>
          <a href="/men/Jeans">Jeans</a>
          <a href="/men/shoes">Shoes</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="#">Women</a>
        <div class="dropdown-content">
          <a href="/women/shopall">Shop All</a>
          <a href="/women/Jackets&coats">Jackets & Coats</a>
          <a href="/women/Hoodies">Hoodies</a>
          <a href="/women/Sweatshit">Sweatshits</a>
          <a href="/women/T-shirts">T-shirts</a>
          <a href="/women/Tracksuit Bottoms">Tracksuit Bottoms</a>
          <a href="/women/Jeans">Jeans</a>
          <a href="/women/shoes">Shoes</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="#">Accessories</a>
        <div class="dropdown-content">
          <a href="/accessories/Shopall">Shop All</a>
          <a href="/accessories/men">Men's Accessories</a>
          <a href="/accessories/women">Women's Accessories</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="#">Brands</a>
        <div class="dropdown-content">
          <a href="/brands/Nike.html">Nike</a>
          <a href="/brands/adidas.html">Adidas</a>
          <a href="/brands/Jordan.html">Jordan</a>
          <a href="/brands/The North Face.html">The North Face</a>
          <a href="/brands/Under Armour.html">Under Armour</a>
          <a href="/brands/Vans.html">Vans</a>
          <a href="/brands/Osbatt.html">Osbatt</a>
          <a href="/brands/Racerworldwide.html">Racer Worldwide</a>
          <a href="/brands/Glogangworldwide.html">Glogang Worldwide</a>
          <a href="/brands/Glofwang.html">Glofwang</a>
          <a href="/brands/9inedouble0we.html">9inedouble0we</a>
          <a href="/brands/Jadeddldn.html">Jadedldn</a>
        </div>
      </div>
      <div class="dropdown">
        <a href="#">Sale</a>
        <div class="dropdown-content">
          <a href="/sale/clearance">Men's Sales</a>
          <a href="/sale/discount">Women's Sales</a>
          <a href="/sale/new">All Sales</a>
        </div>
      </div>
      <!-- Added Contact and About buttons -->
      <a href="/contact.html" class="nav-link">Contact</a>
      <a href="/about.html" class="nav-link">About Us</a>
    </nav>

    <!-- Account and Cart Actions -->
    <div class="account-actions">
      <input type="text" class="search-bar" placeholder="Search">
      <a href="racer worldwide/wishlist.html" class="wishlist">
        <i class="fas fa-heart"></i> Wishlist
      </a>
      <a href="cart.html" class="cart">
        <i class="fas fa-shopping-cart"></i> Cart
      </a>
      <a href="login.html" class="signup-login">
        <i class="fas fa-user"></i> My Account
      </a>
    </div>
  </div>
</header>



<div>
  <h2 class="centered-heading">Shop All Mens</h2>
  <style>
    .centered-heading {
      font-size: 3rem; /* Adjust size as needed */
      color: #333; /* Change to your desired color */
      font-weight: bold;
      text-align: center;
    }
  </style>


</div>

@if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
<body>

<div class="product-container">
    <div class="product-card">
        <h1><?php echo htmlspecialchars($product_name); ?></h1>
        <img src="<?php echo htmlspecialchars($product_image); ?>" alt="Product Image" style="max-width: 300px;">
        <p>Price: £<?php echo htmlspecialchars($product_price); ?></p>
    </div>

    <div class="product-description">
        <p>Description: <?php echo htmlspecialchars($product_description); ?></p>
    </div>
</div>


    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
        }
        input[type="text"], textarea, select {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        textarea {
            height: 100px;
        }
        .stars {
            display: flex;
            justify-content: space-between;
            width: 180px;
            margin-bottom: 12px;
        }
        .star {
            cursor: pointer;
            font-size: 24px;
            color: #FFD700;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>


<div class="container">
    <h1>Submit Your Review</h1>
    <form id="reviewForm" action="#" method="post">
        <label for="name">Your Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="stars">Rating:</label>
        <div class="stars" id="stars">
            <span class="star" onclick="rate(1)">&#9733;</span>
            <span class="star" onclick="rate(2)">&#9733;</span>
            <span class="star" onclick="rate(3)">&#9733;</span>
            <span class="star" onclick="rate(4)">&#9733;</span>
            <span class="star" onclick="rate(5)">&#9733;</span>
        </div>

        <label for="description">Review Description:</label>
        <textarea id="description" name="description" required></textarea>

        <button type="submit">Submit Review</button>
    </form>

    <div class="reviews" id="reviews">
        <h2>Customer Reviews</h2>
        <!-- Reviews will be dynamically added here -->
    </div>
</div>

<script>
    let rating = 0;

    // Rate function to change star color on click
    function rate(starCount) {
        rating = starCount;
        const stars = document.querySelectorAll('.star');
        stars.forEach((star, index) => {
            if (index < starCount) {
                star.style.color = '#FFD700'; // Gold color for selected stars
            } else {
                star.style.color = '#ddd'; // Light grey color for unselected stars
            }
        });
    }

    // Handle form submission and display the review
    document.getElementById("reviewForm").addEventListener("submit", function(event) {
        event.preventDefault();  // Prevent the form from submitting the usual way
        
        // Get the values from the form
        const name = document.getElementById("name").value;
        const description = document.getElementById("description").value;

        if (name && description && rating > 0) {
            // Create a new review element
            const review = document.createElement("div");
            review.classList.add("review");

            const reviewContent = `
                <h3>${name}</h3>
                <p class="stars-view">Rating: ${'★'.repeat(rating)}${'☆'.repeat(5 - rating)}</p>
                <p>${description}</p>
            `;

            review.innerHTML = reviewContent;

            // Append the new review to the reviews section
            document.getElementById("reviews").appendChild(review);

            // Clear the form
            document.getElementById("reviewForm").reset();
            rating = 0;

            // Reset stars after submission (set all to default grey color)
            const stars = document.querySelectorAll('.star');
            stars.forEach(star => star.style.color = '#ddd');
        } else {
            alert("Please fill out all fields and provide a rating.");
        }
    });
</script>

</script>
</body>
</html>
