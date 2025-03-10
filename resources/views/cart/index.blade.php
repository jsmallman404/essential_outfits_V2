<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!-- Header CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>
<body>
@include('header')
    <div class="container mt-5">
        
        <h2 class="text-center">Shopping Cart</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        @if($cartItems->isEmpty())
            <p class="text-center">Your cart is empty.</p>
            <a href="{{ route('products.index') }}">
                <button class="btn btn-primary">Return to Products</button>
            </a>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Size</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php $total = 0; @endphp
                    @foreach($cartItems as $cartItem)
                        @php 
                            $product = optional($cartItem->product);
                            $variant = optional($cartItem->productVariant);
                            $subtotal = ($product->price ?? 0) * $cartItem->quantity; 
                        @endphp
                        <tr>
                            <td>
                                <img src="{{ asset('storage/images/' . $product->image) }}" width="50" alt="{{ $product->name }}">
                            </td>
                            <td>{{ $product->name ?? 'Unknown Product' }}</td>
                            <td>{{ $variant->size ?? 'N/A' }}</td>
                            <td>£{{ number_format($product->price ?? 0, 2) }}</td>
                            <td>{{ $cartItem->quantity }}</td>
                            <td>£{{ number_format($subtotal, 2) }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Remove</button>
                                </form>
                            </td>
                        </tr>
                        @php $total += $subtotal; @endphp
                    @endforeach
                </tbody>
            </table>
            <h4 class="text-end">Total: £{{ number_format($total, 2) }}</h4>

            <div class="d-flex justify-content-between mt-3">
                <a href="{{ route('products.index') }}" class="btn btn-primary">Continue Shopping</a>
                <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Checkout</button>
                </form>
            </div>
        @endif
    </div>
</body>
</html>