<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <title>Essential Outfits</title>
    <style>

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

    
    
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ded4c0;
        }

        .about-page main {
            display: flex;
            align-items: center;
            justify-content: flex-start;
            max-width: 80%;
            margin: 50px auto;
            gap: 30px; /* More spacing between image and text */
        }

        #fashion {
            width: 40%; /* Ensures the image takes up 40% of the width */
            max-width: 400px;
            height: auto;
            border-radius: 10px; /* Slightly rounded corners for style */
        }

        .text-container {
            width: 50%;
        }

        .text-container h1 {
            margin: 0;
            font-size: 2.2em;
            color: #333;
        }

        .text-container p {
            font-size: 1.1em;
            color: #555;
            line-height: 1.6;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .about-page main {
                flex-direction: column;
                text-align: center;
            }

            #fashion {
                width: 80%; /* Makes image larger on smaller screens */
            }

            .text-container {
                width: 90%;
            }
        }

        .footer {
    margin-top: 50px;
    background-color: #1a1a1a;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    font-family: Arial, sans-serif;
}

.footer-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px;
}

.footer-about, .footer-contact, .footer-socials {
    flex: 1;
    min-width: 250px;
    margin: 10px;
}

.footer h3, .footer h4 {
    margin-bottom: 10px;
    font-size: 1.2rem;
    color: #f5f5f5;
    font-weight: bold;
}

.footer p, .footer a {
    font-size: 1rem;
    color: #ccc;
    text-decoration: none;
}

.footer a:hover {
    color: #fff;
    text-decoration: underline;
}

.footer-bottom {
    margin-top: 20px;
    border-top: 1px solid #444;
    padding-top: 10px;
    font-size: 0.9rem;
    color: #888;
}






    </style>
</head>
<header>
        <div class="header-content">
      <!-- Logo -->
      <div class="logo">
        <a href="{{ url('/') }}">
          <img src="images/essentiallogo1.png" alt="Logo">
        </a>
      </div>

 <!-- Navigation Bar -->
<nav class="nav-buttons">
  <div class="dropdown">
    <a href="{{ route('products.index') }}">Men</a>
    <div class="dropdown-content">
      <a href="/men/shopall">Shop All</a>
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
      <a href="/accessories/men">Men accessories</a>
      <a href="/accessories/women">Women accessories</a>
    </div>
  </div>

 

    <!-- Added Contact and About buttons -->

    <a href="{{ route('contact') }}" class="nav-link">Contact</a>
    <a href="{{ route('about') }}">About Us</a>

</nav>



      <!-- Account and Cart Actions -->
      <div class="account-actions">
        <input type="text" class="search-bar" placeholder="Search">

        <a href="{{ route('wishlist.index') }}" class="wishlist">
          <i class="fas fa-heart"></i>
        </a>
        
        <a href="{{ route('cart.index') }}" class="cart">
          <i class="fas fa-shopping-cart"></i> 
        </a>

        <a href="{{ route('login') }}" class="nav-link">
          <i class="fas fa-user"></i> my account
        </a>
      </div>
    </div>
                
</header>
<body class="about-page">
    <main>
        <img src="images/aboutus.jpg" id="fashion" alt="About Us">
        <div class="text-container">
            <h1>About our Company</h1>
            <p>At Essential Outfits, we’re all about streetwear that speaks to the bold, creative spirit of today’s youth. Our mission is to provide stylish, affordable clothing that empowers you to express your individuality and make a statement wherever you go. Whether you’re hitting the streets or chilling with friends, we’ve got the perfect pieces to elevate your look.</p>
        </div>
    </main>
</body>


<footer class="footer">
    <div class="footer-container">
      <div class="footer-about">
        <h4>Essential Outfits</h4>
        <p>Providing you effortless fashion from the best streetwear brands.</p>
      </div>
      <div class="footer-contact">
        <h4>Contact Us</h4>
        <p> <a href="mailto:queriesessential@gmail.com">Email: essentialsenqueries@gmail.com</a></p>
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




</html>



