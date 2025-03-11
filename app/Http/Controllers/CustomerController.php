<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;

class CustomerController extends Controller
{

    public function edit()
    {
        $user = Auth::user();
        return view('customer.editProfile', compact('user'));
    }

    public function updateProfile(Request $request, $id)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id), // Ensure unique email except for the current user
            ],
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:10',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'city' => $request->city,
            'post_code' => $request->post_code,
        ]);

        return redirect()->route('customer.editProfile')->with('success', 'Profile updated successfully.');
    }
}