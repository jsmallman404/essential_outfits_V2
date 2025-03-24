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



#star-rating {
  display: flex;
  justify-content: center;
  align-items: center;
  gap: 5px; 
  margin-bottom: 15px;
  width: 100%;
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



h2 {
  margin-bottom: 20px;
  font-size: 24px;
  color: #333;
}




.button-container {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 10px;
}

.button2 {
  flex: 1;
  padding: 10px 15px;
  font-size: 16px;
  background-color:rgb(0, 0, 0);
  color: white;
  border: none;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.3s ease;
}

.button2:hover {
  background-color: #333;
}



.button3 {
  flex: 1;
  padding: 10px 15px;
  font-size: 16px;
  background-color:rgb(0, 0, 0);
  color: white;
  border: none;
  border-radius: 5px;
  text-align: center;
  text-decoration: none;
  transition: background-color 0.3s ease;
  width: 100%;
  margin-top: 10px;
}

.button3:hover {
  background-color: #333;
}



.alert-success {
  color: #155724;
  background-color: #d4edda;
  padding: 10px;
  margin-top: 10px;
  border-radius: 4px;
  text-align: center;
  
}

h2{
  font-size: 35px;
}

    </style>
</head>

<body>
  @include('header')
<div class="container">
    <h1>Contact Us</h1>
    <p>Email: essentialsenqueries@gmail.com</p>
    <p>Phone: +44 7713345678</p>

    <form action="{{ route('contact.submit') }}" method="POST">
        @csrf
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" class="button3">Send</button>

    </form>

</div>



<div class="container mt-5">
  <h2 class="text-center">Review Our Website</h2>
  @if(session('review_success'))
    <div class="alert alert-success">{{ session('review_success') }}</div>
  @endif
  <form id="review-form" action="{{ route('website-reviews.store') }}" method="POST">

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
      <label for="comment">Comment:</label>
      <textarea name="comment" id="comment" required></textarea>
    </div>

    <!-- Button container added here -->
    <div class="button-container">
      <button type="submit" class="button2" id="submit-btn">Submit Review</button>
      <a href="{{ url('/admin/website-reviews') }}" class="button2">
        View Website Reviews
      </a>
    </div>
  </form>
  
  @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif




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

</body>

@include('footer')

</html>
