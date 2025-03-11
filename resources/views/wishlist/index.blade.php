@extends('layouts.app')

@section('content')
<div class="container">
    <h2>My Wishlist</h2>
    @if($wishlistItems->isEmpty())
        <p>Your wishlist is empty.</p>
    @else
        <div class="row">
            @foreach($wishlistItems as $wishlistItem)
                <div class="col-md-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $wishlistItem->product->image) }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $wishlistItem->product->name }}</h5>
                            <p class="card-text">£{{ $wishlistItem->product->price }}</p>
                            <a href="{{ route('product.show', $wishlistItem->product->id) }}" class="btn btn-primary">View Product</a>

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
