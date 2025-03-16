<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store - Products</title>
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

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
        }
        .product-info p {
            font-size: 1rem;
            color: #555;
        }
        .product-info button {
            padding: 0.5rem 1.5rem;
            border: none;
            background-color: #222;
            color: #ded4c0;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
            width: 100%;
        }
        .product-info button:hover {
            background-color: #444;
        }
        .view-cart-btn {
            display: block;
            text-align: center;
            margin-top: 2rem;
        }


        .container {
    width: 90%;
    max-width: 600px;
    background: white;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    text-align: center;
    margin-top: 80px; /* Adjusted to prevent overlap with top nav */
}

/* Form Inputs */
input, textarea {
    width: 100%;
    padding: 12px;
    margin-top: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    background-color: #f9f6ef;
    color: #333;
    outline: none;
}

textarea {
    resize: vertical;
    height: 100px;
}

/* Submit Button */
.button2 {
    width: 100%;
    padding: 12px;
    background-color: #333;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 18px;
    cursor: pointer;
    transition: all 0.3s ease;
    margin-top: 15px;
}

.button2:hover {
    background-color: #555;
}

/* ================================
   Success Message
================================ */
.alert-success {
    margin-top: 20px;
    color: green;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
    background: #eaffea;
    border: 1px solid green;
}

/* ================================
   Responsive Design
================================ */
@media (max-width: 768px) {
    .container {
        width: 95%;
        padding: 20px;
    }

    h1 {
        font-size: 24px;
    }

    .top-nav {
        flex-direction: row;
        gap: 10px;
        padding: 8px 0;
    }

    .nav-button {
        font-size: 14px;
        padding: 8px 12px;
    }
}



#star-rating .star {
    font-size: 24px;
    color: #ddd; /* default unselected color */
    cursor: pointer;
    transition: color 0.3s;
}

#star-rating .star.selected {
    color: #FFD700; /* gold color for selected stars */
}


/* review buton */
.btn-reviews {
    background-color: #8b7e68; /* Taupe/Brown color */
    color: white;
    padding: 10px 15px;
    font-size: 16px;
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
    text-decoration: none;
    display: inline-block;
}

.btn-reviews:hover {
    background-color: #6c5f4b;
    transform: scale(1.05);
}

    </style>
</head>

<body>
  @include('header')
<div class="container">
    <h1>Contact Us</h1>
    <p>Email: queriesessential@gmail.com</p>
    <p>Phone: +44 7713345678</p>

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" class="button2">Send</button>

    </form>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

</div>
<!-- Add this section after your existing contact form markup -->
<div class="container mt-5">
  <h2 class="text-center">Review Our Website</h2>
  @if(session('review_success'))
    <div class="alert alert-success">{{ session('review_success') }}</div>
  @endif
  <form action="{{ route('website-reviews.store') }}" method="POST">
    @csrf
    <div class="mb-3 text-center">
      <label for="rating" class="form-label">Rating:</label>
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
      <label for="comment" class="form-label">Comment:</label>
      <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary w-100">Submit Review</button>
    <a href="{{ url('/admin/website-reviews') }}" class="btn-reviews">
    <i class="fas fa-star"></i> View Website Reviews
</a>
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
      stars.forEach(s => s.classList.remove('selected'));
      for (let i = 0; i < ratingValue; i++) {
        stars[i].classList.add('selected');
      }
    });
  });
</script>

</body>

@include('footer')

</html>
