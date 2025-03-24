<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/header2.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <title>Essential Outfits</title>
    <style>

    body {
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
        gap: 30px; 
    }

    #fashion {
    width: 48%; 
    max-width: 600px;
    height: auto;    
    margin-left: -150px; 
    margin-top: -50px; 
}


    .text-container {
        width: 50%;
        margin-left: 120px;
    }

    .text-container h1 {
        margin: 0;
        font-family: Times, serif;
        font-weight: bold;
        font-size: 400%;
        color: #422f01;
    }

    .text-container p {
        font-family: Times, serif;
        font-size: 160%;
        color: #422f01;
        line-height: 1.6;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .about-page main {
            flex-direction: column;
            text-align: center;
        }

        #fashion {
            width: 80%; 
        }

        .text-container {
            width: 90%;
        }
        }

 /* Ensure the entire page takes at least the full viewport height */
body {
    display: flex;
    flex-direction: column;
    min-height: 100vh; 
    margin: 0;
}

/* Ensure the main content takes up all available space */
.container {
    flex: 1;
}

/* Sticky Footer */
.footer {
    background-color: #000;
    color: #fff;
    padding: 20px 0;
    text-align: center;
    font-family: Arial, sans-serif;
    margin-top: auto; 
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

<body class="about-page">
  @include('header')
    <main>
        <img src="images/aboutus.jpg" id="fashion" alt="About Us">
        <div class="text-container">
            <h1>About our Company</h1>
            <p>At Essential Outfits, we’re all about streetwear that speaks to the bold, creative spirit of today’s youth. Our mission is to provide stylish, affordable clothing that empowers you to express your individuality and make a statement wherever you go. Whether you’re hitting the streets or chilling with friends, we’ve got the perfect pieces to elevate your look.</p>
        </div>
    </main>
</body>

@include('footer')

</html>



