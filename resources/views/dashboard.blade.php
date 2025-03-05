<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Welcome to Your Dashboard</h2>
        <p>You have successfully registered and logged in.</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>

        <form action="{{ url('/') }}" method="GET">
            <button type="submit" class="btn btn-primary">Go Home</button>
        </form>

        <form action="{{ route('customer.orders') }}" method="GET">
            <button type="submit" class="btn btn-primary">My Orders</button>
        </form>

        <!-- Change Password Button -->
        <form action="{{ route('password.change.form') }}" method="GET">
            <button type="submit" class="btn btn-warning">Change Password</button>
        </form>
    </div>
</body>
</html>
