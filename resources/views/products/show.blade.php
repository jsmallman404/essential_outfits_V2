@extends('layouts.app')

@section('content')
<div class="container">
    <h2>{{ $product->name }}</h2>
    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
    <p><strong>Price:</strong> £{{ $product->price }}</p>
    <p><strong>Category:</strong> {{ $product->category }}</p>
    <p><strong>Description:</strong> {{ $product->description }}</p>

    <a href="{{ route('cart.add', $product->id) }}" class="btn btn-primary">Add to Cart</a>
    <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
</div>
@endsection
