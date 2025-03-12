<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    
    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    
    <!-- Header CSS -->
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    
    <style>
        body {
            background-color: #ded4c0; /* Background color */
        }
        .dashboard-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .dashboard-container h2 {
            color: #333;
            margin-bottom: 20px;
        }
        .dashboard-container p {
            color: #555;
            font-size: 16px;
        }
        .button-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 20px;
        }
        .button-group button {
            width: 100%;
        }
    </style>
</head>

<body>

    @include('header')

    <div class="dashboard-container">
        <h2>Welcome to Your Dashboard</h2>
        <p>You have successfully registered and logged in.</p>

        <div class="button-group">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Logout</button>
            </form>

            <form action="{{ url('/') }}" method="GET">
                <button type="submit" class="btn btn-primary"><i class="fas fa-home"></i> Go Home</button>
            </form>

            <form action="{{ route('customer.orders') }}" method="GET">
                <button type="submit" class="btn btn-primary"><i class="fas fa-shopping-bag"></i> My Orders</button>
            </form>

            <form action="{{ route('password.change') }}" method="GET">
                <button type="submit" class="btn btn-warning"><i class="fas fa-key"></i> Change Password</button>
            </form>
        </div>

    </div>

</body>
</html>
