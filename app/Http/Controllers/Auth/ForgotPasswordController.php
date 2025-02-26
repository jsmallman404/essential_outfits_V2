<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
        public function showLinkRequestForm()
        {
            return view('auth.passwords.email');
        }
        public function sendResetLinkEmail(Request $request)
        {
            $request->validate(['email' => 'required|email|exists:users,email']);
    
            $status = Password::sendResetLink(
                $request->only('email')
            );
    
            return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
        }

    use SendsPasswordResetEmails;
}
