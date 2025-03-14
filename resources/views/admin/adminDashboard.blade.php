<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Admin Dashboard</h1>
        <div class="text-center mt-4">
            <a href="{{ route('admin.products') }}" class="btn btn-primary">Manage Products</a>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Manage Orders</a>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Manage Users</a>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('admin.returns.index') }}" class="btn btn-primary">Manage Returns</a>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('admin.website-reviews.index') }}" class="btn btn-primary">View Website Feedback</a>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
        </div>
    </div>
</body>
</html>