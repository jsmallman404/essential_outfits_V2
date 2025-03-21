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
        }
        .auth-card {
            width: 500px;
            height: auto;
            margin: 20px 0 0 0;
            background-color:rgb(255, 255, 255);
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .auth-card input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color:rgb(255, 255, 255);
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .auth-card input:focus {
            border-color: #4a90e2;
            outline: none;
            box-shadow: 0 0 5px rgba(74, 144, 226, 0.5);
        }
        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 5px;
            margin: 0;
            padding: 0;
        }
        input[type="checkbox"] {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            width: 16px;
            height: 16px;
            border: 1px solid #555;
            border-radius: 4px;
            background-color: #fff;
            margin: 0;
            margin-top: 10px;
            padding: 0;
            cursor: pointer;
        }
        input[type="checkbox"]:checked {
            background-color: #4a90e2;
            border-color: #4a90e2;
        }
        input[type="checkbox"]:checked::after {
            content: '\2713';
            font-size: 12px;
            color: white;
            display: block;
            text-align: center;
            line-height: 16px;
        }



        .register {
        margin-top: 20px;
    display: flex;
    justify-content: space-between; 
    width: 100%; 
}

        .black-button {
            background-color: black;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
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
    <div class="auth-card">

    <h2>Haven't got a account yet?</h2>
    <h4>Get signed up now!</h4>


    <x-authentication-card>
                <x-slot name="logo">
                    {{ null }}
                </x-slot>
    
        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" onsubmit="return validatePassword();">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" onkeyup="checkPasswordStrength()" />
                <div id="password-strength-message" style="margin-top: 5px;"></div>
                <small>Password must contain at least one number, one symbol, and be at least 8 characters long.</small>
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="register">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('customer.editProfile') }}" style="color: black; text-decoration: none; margin-right: 0px;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">

                    {{ __('Already registered?') }}
                </a>

                <x-button class="black-button ms-4">
                    
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>


        </div>

    </main>


    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const passwordInput = document.getElementById("password");
        const strengthMessage = document.getElementById("password-strength-message");

        passwordInput.addEventListener("keyup", function () {
            const password = passwordInput.value;
            let strength = "Weak";
            let color = "red";

            const hasNumber = /\d/.test(password);
            const hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
            const isLongEnough = password.length >= 8;

            if (isLongEnough && hasNumber && hasSymbol) {
                strength = "Strong";
                color = "green";
            } else if (isLongEnough && (hasNumber || hasSymbol)) {
                strength = "Medium";
                color = "orange";
            }

            strengthMessage.textContent = `Password Strength: ${strength}`;
            strengthMessage.style.color = color;
        });
    });
    
    function validatePassword() {
        const password = document.getElementById("password").value;
        const strengthMessage = document.getElementById("password-strength-message");
        const hasNumber = /\d/.test(password);
        const hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password);
        const isLongEnough = password.length >= 8;

        if (!isLongEnough || !hasNumber || !hasSymbol) {
            strengthMessage.textContent = "Password must be at least 8 characters long and include at least one number and one special character.";
            strengthMessage.style.color = "red";
            return false;
        }

        return true;
    }
</script>


    <footer>
        @include('footer')
    </footer>
</body>
</html>
