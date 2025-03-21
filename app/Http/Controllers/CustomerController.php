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

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $validatedData = $request->validate([
            'name' => 'nullable|string|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users', 'email')->ignore($user->id),
            ],
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'post_code' => 'nullable|string|max:10',
        ]);

        $user->update(array_filter($validatedData));

        return redirect()->route('customer.editProfile')->with('success', 'Profile updated successfully.');


        return redirect()->route('customer.editProfile')->with('success', 'Profile updated successfully.');
    }
}