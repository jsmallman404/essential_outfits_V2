<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
     <!-- Font Awesome for Icons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

     <!-- Header CSS -->
     <link rel="stylesheet" href="{{ asset('css/header.css') }}">
</head>

<body>
@include('header')
    <div class="container mt-4">
        <h2>Welcome {{ auth()->user()->name }} to Your Dashboard</h2>
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
        <form action="{{ route('customer.editProfile') }}" method="GET">
            <button type="submit" class="btn btn-primary">Edit Details</button>
        </form>
        <form action="{{ route('password.change') }}" method="GET">
            <button type="submit" class="btn btn-warning">Change Password</button>
        </form>
        @if(auth()->check() && auth()->user()->role == 'admin')
        <form action="{{ route('admin.dashboard') }}" method="GET">
            <button type="submit" class="btn btn-warning">Admin</button>
        </form>
        @endif
</form>
    </div>
</body>
</html>