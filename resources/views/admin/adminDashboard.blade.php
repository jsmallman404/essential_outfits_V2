<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
        }
        .dashboard-container {
            max-width: 600px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            color: #5a4e3a;
            font-weight: bold;
        }
        .btn-custom {
            background-color: #8b7e68;
            border: none;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            display: block;
            width: 100%;
        }
        .btn-custom:hover {
            background-color: #6c5f4b;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center">
        <div class="dashboard-container text-center">
            <h1>Admin Dashboard</h1>
            <div class="mt-4">
                <a href="{{ route('admin.products') }}" class="btn btn-custom">Manage Products</a>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.orders.index') }}" class="btn btn-custom">Manage Orders</a>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.users.index') }}" class="btn btn-custom">Manage Users</a>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.returns.index') }}" class="btn btn-custom">Manage Returns</a>
            </div>
            <div class="mt-3">
                <a href="{{ route('admin.website-reviews.index') }}" class="btn btn-custom">View Website Feedback</a>
            </div>
            <div class="mt-3">
                <a href="{{ route('dashboard') }}" class="btn btn-custom">Back to Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
