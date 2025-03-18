@extends('layouts.app')

@section('content')

<style>
body {
    background-color: #ded4c0 !important;
    margin: 0;
    padding: 0;
    width: 100vw;
    min-height: 100vh;
    overflow-x: hidden;
    display: flex;
    flex-direction: column;
}

.container {
    flex: 1;
    padding: 20px;
    background-color: #ded4c0; /* Ensure container also has the background color */
    max-width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px; /* Added space between product cards */
    width: 100%;
    flex-grow: 1;
}

.wishlist-card {
    background: #ded4c0; /* Changed product card background color */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    text-align: center;
    padding: 15px;
    margin: 10px; /* Added margin to separate cards */
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 300px; /* Fixed width for uniformity */
}

.wishlist-card:hover {
    transform: scale(1.05);
}

.card-img-top {
    width: 100%;
    height: 250px; /* Fixed height to ensure consistency */
    object-fit: cover;
    border-radius: 8px;
    display: block;
}

.card-body {
    padding: 15px;
    width: 100%;
    text-align: center;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    flex-grow: 1;
}

.btn {
    padding: 10px 15px;
    border-radius: 5px;
    font-size: 14px;
    font-weight: bold;
    transition: background 0.3s, transform 0.2s;
}

.btn-primary {
    background-color: #007bff;
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.1);
}

.btn-danger {
    background-color: #dc3545;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #a71d2a;
    transform: scale(1.1);
}

 </style>

@include('header')

<div class="container">
    <h2>My Wishlist</h2>
    
    @if($wishlistItems->isEmpty())
        <p class="wishlist-empty">Your wishlist is empty. Start adding your favorite products!</p>
    @else
        <div class="row">
            @foreach($wishlistItems as $wishlistItem)
                <div class="col-md-4 mb-4">
                    <div class="wishlist-card">
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
                            
                            <a href="{{ url('/products?product_id=' . $wishlistItem->product->id) }}" class="btn btn-primary">
    View Product
</a>



                            <!-- Remove from Wishlist -->
                            <form action="{{ route('wishlist.remove', $wishlistItem->product->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

@endsection
