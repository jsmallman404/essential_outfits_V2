<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Middleware\CheckAdmin;

use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(CheckAdmin::class);
    }

    
    public function dashboard() {
        return view('admin.adminDashboard');
    }

    public function index(Request $request)
{
    $query = User::query();

    if ($request->has('search') && !empty($request->search)) {
        $query->where(function ($q) use ($request) {
            $q->where('name', 'like', '%' . $request->search . '%')
              ->orWhere('email', 'like', '%' . $request->search . '%');
        });
    }
    $users = $query->paginate(10);
    return view('admin.users.index', compact('users'));
}

    public function viewUser($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }

    public function updateUser(Request $request, $id)
{
    $user = User::findOrFail($id);

    $validated = $request->validate([
        'post_code' => 'nullable|string|max:15',
        'address' => 'nullable|string|max:255',
        'city' => 'nullable|string|max:255',
        'role' => 'required|in:user,admin',
    ]);

    $user->update([
        'address' => $request->input('address'),
        'post_code' => $request->input('post_code'),
        'city' => $request->input('city'),
        'role' => $request->input('role')
    ]);

    return redirect()->route('admin.users.index')->with('success', 'User details updated successfully.');
}

    // Function to update the is_featured column
    public function updateFeatured(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->is_featured = $request->has('is_featured'); 
        $product->save();

        return redirect()->back()->with('success', 'Featured products updated successfully!');
    }
}
