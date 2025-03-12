<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return Items for Order #{{ $order->id }}</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #DCD4C2; /* Matching background color */
        }
    </style>
</head>
<body>
    @include('header')

    <div class="container mt-5">
        <h2 class="text-center">Return Items for Order #{{ $order->id }}</h2>

        <div class="card shadow-sm p-4">
            <form action="{{ route('customer.orders.process_return', $order->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="item_ids" class="form-label"><strong>Select Items to Return:</strong></label>
                    <select name="item_ids[]" id="item_ids" class="form-control" multiple required>
                        @foreach ($order->orderItems as $item)
                            <option value="{{ $item->id }}">
                                {{ optional($item->product)->name ?? 'Deleted Product' }} 
                                @if(optional($item->productVariant)->size)
                                    - Size: {{ $item->productVariant->size }}
                                @endif
                                - £{{ number_format(optional($item->product)->price ?? 0, 2) }}
                            </option>
                        @endforeach
                    </select>
                    <small class="text-muted">Hold Ctrl (Cmd on Mac) to select multiple items.</small>
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label"><strong>Reason for Return:</strong></label>
                    <textarea name="reason" id="reason" class="form-control" rows="3" required></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-undo"></i> Submit Return Request
                    </button>
                </div>
            </form>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('customer.orders') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back to Orders
            </a>
        </div>
    </div>
</body>
</html>