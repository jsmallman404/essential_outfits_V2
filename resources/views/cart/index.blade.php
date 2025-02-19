<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
</head>
<body>
    <div class="container mt-5">
       <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/essentiallogo1.png') }}" alt="Your Brand Logo" height="50">
        </a>

        <div class="mb-3">
          <button class="btn btn-secondary" onclick="history.back()">← Back</button>
        </div>

        <h2 class="text-center">Shopping Cart</h2>

        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert-danger">{{ session('error') }}</div>
        @endif

        @if(empty($cart))
            <p class="text-center">Your cart is empty.</p>
            <a href="{{ route('products.index') }}">
            <button class="btn btn-primary">Return to Products</button> </a>
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
                    @foreach($cart as $key => $item)
                        @php $subtotal = $item['price'] * $item['quantity']; @endphp
                        <tr>
                            <td><img src="{{ asset('images/' . $item['image']) }}" width="50"></td>
                            <td>{{ $item['name'] }}</td>
                            <td>{{ $item['size'] }}</td>
                            <td>£{{ $item['price'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>£{{ number_format($subtotal, 2) }}</td>
                            <td>
                                <a href="{{ route('cart.remove', $key) }}" class="btn-danger">Remove</a>
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