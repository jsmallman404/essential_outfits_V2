<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer - Edit Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <style>
        body {
            background-color: #ded4c0;
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            flex-grow: 1;
        }
        .content-wrapper {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
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
        .btn-back {
            margin-bottom: 15px;
            background-color: #6c757d;
            color: white;
        }
        .btn-back:hover {
            background-color: #5a6268;
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
        .form-control {
            border-radius: 8px;
            border: 1px solid #8b7e68;
        }
    </style>
</head>
<body>
    @include('header')
    <div class="content-wrapper">
        <div class="container">
            <a href="javascript:history.back()" class="btn btn-back btn-sm">&larr; Back</a>
            <h1 class="text-center">Edit Your Profile</h1>

            <form action="{{ route('customer.updateProfile', auth()->user()->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">{{ auth()->user()->name }}</h4>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ auth()->user()->address ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control" id="city" name="city" value="{{ auth()->user()->city ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="post_code" class="form-label">Post Code</label>
                            <input type="text" class="form-control" id="post_code" name="post_code" value="{{ auth()->user()->post_code ?? '' }}">
                        </div>
                        <button type="submit" class="btn btn-custom w-100">Save Changes</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary w-100 mt-2">Back to Dashboard</a>
                    </div>
                </div>
            </form>
        </div> 
    </div> 
    @include('footer')
</body>
</html>
