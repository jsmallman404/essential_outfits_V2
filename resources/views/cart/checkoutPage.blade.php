<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">

    <script>
        function toggleCardDetails() {
            var cardDetails = document.getElementById("card-details");
            if (document.getElementById("card").checked) {
                cardDetails.style.display = "block";
                document.getElementById("card_number").setAttribute("required", "true");
                document.getElementById("expiry_date").setAttribute("required", "true");
                document.getElementById("cvv").setAttribute("required", "true");
            } else {
                cardDetails.style.display = "none";
                document.getElementById("card_number").removeAttribute("required");
                document.getElementById("expiry_date").removeAttribute("required");
                document.getElementById("cvv").removeAttribute("required");
            }
        }
    </script>
</head>
@include('header')
<body>


<div class="container mt-5">
    <h2 class="text-center">Checkout</h2>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('cart.checkout') }}" method="POST">
        @csrf

        <h4>Shipping Details</h4>
        <div class="card p-3 mb-4">
        <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city ?? '' }}" required>
            </div>
            <div class="mb-3">
                <label for="post_code" class="form-label">Post Code</label>
                <input type="text" class="form-control" id="post_code" name="post_code" value="{{ auth()->user()->post_code ?? '' }}" required>
            </div>
        </div>

        <h4>Order Summary</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Size</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
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
                            @php
                            $images = is_array($product->images) ? $product->images : json_decode($product->images, true);
                            @endphp
                            @if(is_array($images) && count($images) > 0)
                            <img src="{{ asset('storage/' . ltrim($images[0], '/')) }}" width="50" alt="{{ $product->name }}">
                            @else
                            <img src="{{ asset('storage/images/default.jpg') }}" width="50" alt="{{ $product->name }}">
                            @endif
                        </td>
                        <td>{{ $product->name ?? 'Unknown Product' }}</td>
                        <td>{{ $variant->size ?? 'N/A' }}</td>
                        <td>£{{ number_format($product->price ?? 0, 2) }}</td>
                        <td>{{ $cartItem->quantity }}</td>
                        <td>£{{ number_format($subtotal, 2) }}</td>
                    </tr>
                    @php $total += $subtotal; @endphp
                @endforeach
            </tbody>
        </table>

        <h4 class="text-end">Total: £{{ number_format($total, 2) }}</h4>

        
        <h4>Payment Details</h4>
        <div class="card p-3 mb-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="card" value="card" checked onclick="toggleCardDetails()">
                <label class="form-check-label" for="card">Credit/Debit Card</label>
                <p class="text-muted mt-2">Your payment details are not saved with us for security reasons.</p>
            </div>
            <div id="card-details" style="display: block;" class="mt-3">
                <div class="mb-3">
                    <label for="card_number" class="form-label">Card Number</label>
                    <input type="text" class="form-control" id="card_number" name="card_number" placeholder="1234 5678 9012 3456" required>
                </div>
                <div class="mb-3">
                    <label for="expiry_date" class="form-label">Expiry Date</label>
                    <input type="text" class="form-control" id="expiry_date" name="expiry_date" placeholder="MM/YY" required>
                </div>
                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" placeholder="123" required>
                </div>
            </div>
        </div>


        <div class="d-flex justify-content-between mt-3">
            <a href="{{ route('cart.index') }}" class="btn btn-secondary">Back to Cart</a>
            <form action="{{ route('cart.checkout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Place Order</button>
            </form>
        </div>
    </form>
</div>
@include('footer')

</body>
</html>