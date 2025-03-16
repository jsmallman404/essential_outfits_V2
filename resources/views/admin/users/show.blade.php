<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit User</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            max-width: 600px;
        }
        h1 {
            color: #5a4e3a;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            border: none;
            box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            padding: 20px;
        }
        .btn-custom {
            background-color: #8b7e68;
            border: none;
            color: white;
            padding: 10px 15px;
            font-size: 14px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
        }
        .btn-custom:hover {
            background-color: #6c5f4b;
            transform: scale(1.05);
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #8b7e68;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User Details</h1>

        <form action="{{ route('admin.updateUser', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $user->name }}</h4>
                    <p class="text-center"><strong>Email:</strong> {{ $user->email }}</p>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" value="{{ $user->address ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ $user->city ?? '' }}">
                    </div>
                    <div class="mb-3">
                        <label for="post_code" class="form-label">Post Code</label>
                        <input type="text" class="form-control" id="post_code" name="post_code" value="{{ $user->post_code ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select" id="role" name="role">
                            <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-custom">Update User</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Back to Users</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
</body>
</html>
