<!DOCTYPE html>
<html>
<head>
    <title>Essential Outfits</title>
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
     <!-- Font Awesome for Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!-- Header CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">

</head>
<body class="about-page">
    @include('header')
    <main>
        <div class="text-container">
            <header>
                <h1 class="header-text">About our</h1>
                <h1 class="header-text">Company</h1>
            </header>
            <p>At Essential Outfits, we’re all about streetwear that speaks to the bold, creative spirit of today’s youth. Our mission is to provide stylish, affordable clothing that empowers you to express your individuality and make a statement wherever you go. Whether you’re hitting the streets or chilling with friends, we’ve got the perfect pieces to elevate your look.</p>
        </div>
        <img src="images/aboutus.jpg" id="fashion">
    </main>
</body>
</html>
