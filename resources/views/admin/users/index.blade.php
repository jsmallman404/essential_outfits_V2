<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
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
            max-width: 800px;
        }
        h1 {
            color: #5a4e3a;
            font-weight: bold;
            text-align: center;
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
        .input-group {
            max-width: 500px;
            margin: auto;
        }
        .table th {
            background-color: #8b7e68;
            color: white;
            text-align: center;
        }
        .table td {
            vertical-align: middle;
            text-align: center;
        }
        .alert {
            text-align: center;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="container">
        <h1>Manage Users</h1>
        
        <div class="text-center mt-4">
            <a href="{{ route('admin.dashboard') }}" class="btn btn-custom">Back to Dashboard</a>
        </div>

        <form action="{{ route('admin.users.index') }}" method="GET" class="my-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request()->query('search') }}">
                <button class="btn btn-custom" type="submit">Search</button>
            </div>
        </form>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('admin.viewUser', $user->id) }}" class="btn btn-info btn-sm">View</a>
                            <form action="{{ route('admin.deleteUser', $user->id) }}" method="POST" style="display: inline-block;">
                                @csrf    
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            {{ $users->links() }}
        </div>
    </div>
</body>
@include('footer')
</html>
