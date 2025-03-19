<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .nav-buttons {
            display: flex;
            justify-content: center;
            background-color: #ded4c0;
            padding: 10px 20px;
            border-bottom: 1px solid #ddd;
        }
        .nav-buttons .dropdown {
            position: relative;
            margin: 0 15px;
        }
        .nav-buttons a {
            text-decoration: none;
            font-size: 1.2em;
            font-weight: bold;
            color: #555;
            padding: 5px 10px;
            display: block;
            transition: color 0.3s ease, background-color 0.3s ease;
        }
        .nav-buttons a:hover {
            color: #000;
            background-color: #f0f0f0;
            border-radius: 5px;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2);
            min-width: 200px;
            z-index: 1000;
            border-radius: 8px;
            overflow: hidden;
        }
        .dropdown-content a {
            padding: 12px 20px;
            font-size: 1em;
            color: #555;
            text-decoration: none;
            display: block;
            transition: background-color 0.3s ease, color 0.3s ease;
        }
        .dropdown-content a:hover {
            background-color: #ded4c0;
            color: #000;
        }
        .dropdown:hover .dropdown-content {
            display: block;
        }
        @media (max-width: 768px) {
            .nav-buttons {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px;
            }
            .dropdown {
                margin: 10px 0;
            }
        }
        .account-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .account-actions a {
            display: flex;
            align-items: center;
            text-decoration: none;
            font-size: 14px;
            color: #555;
            transition: color 0.3s ease;
            gap: 5px;
        }
        .account-actions a:hover {
            color: #000;
        }
        .account-actions a i {
            font-size: 16px;
        }
        .account-actions .search-bar {
            padding: 5px 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: #f9f6ef;
            width: 150px;
            transition: width 0.3s ease;
        }
        .account-actions .search-bar:hover {
            width: 250px;
        }
        .account-actions .search-bar:focus {
            width: 250px;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        }
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }
        body {
            display: flex;
            flex-direction: column;
            background-color: #ded4c0;
        }
        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px 0;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .card {
            width: 500px;
            height: auto;
            margin: 0 0 0 0;
            background-color:rgb(255, 255, 255);
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .input {
            width: 450px;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            flex-grow: 1;
        }
        .form-group {
            margin-top: auto;
        }
        .continue  {
            margin-top: 10px;
            display: flex;
            justify-content: flex-end; 
            width: 100%; 
        }
        .black-button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-right: -30px;
        }
        .black-button:hover {
            background-color: #333;
        }
    </style>
</head>
<body>
    <header>
        @include('header')
    </header>

    <main>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                <h2>Forgot Your Password?</h2>
                <h6>Don't worry! Enter your email below, and we'll send you a link to get you back to shopping just the way you like!</h6>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('Email Address') }}</label>
                                <div class="input col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="continue row mb-0">
                                <div class="continue">
                                    <button type="submit" class="black-button btn btn-primary">
                                        {{ __('Continue') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>

    <footer>
        @include('footer')
    </footer>
</body>
</html>
