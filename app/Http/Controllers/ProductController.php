<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')->get();
        return view('products.index', compact('products'));
    }

    public function adminIndex()
    {
        $products = Product::with('variants')->get();
        return view('admin.productsIndex', compact('products'));
    }

    public function create()
    {
        return view('admin.createProducts');
    }

    public function store(Request $request)
    {
        // ✅ Validate Request
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'brand' => 'required|string',
            'color' => 'required|string',
            'sizes' => 'nullable|array',
            'sizes.*.size' => 'required_with:sizes|string',
            'sizes.*.stock' => 'required_with:sizes|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        // ✅ Handle Image Upload (Only if the file is present)
        $imagePath = 'No Image'; // Default image path
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName); // Store in public/images
            $imagePath = 'images/' . $imageName; // Save relative path in DB
        }

        // ✅ Create Product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'brand' => $request->brand,
            'color' => $request->color,
            'image' => 'images/' . $imageName,  // Store relative path
        ]);

        // ✅ Handle Product Variants if Sizes are provided
        if ($request->has('sizes')) {
            foreach ($request->sizes as $size) {
                ProductVariant::create([
                    'product_id' => $product->id,
                    'size' => $size['size'],
                    'stock' => $size['stock'],
                ]);
            }
        }


        // ✅ Return JSON Response if it's an AJAX request
        if ($request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Product created successfully!',
                'imagePath' => asset($imagePath ?? 'images/no-image.jpg') // Fallback image if no image was uploaded
            ]);
        }
    
        // If it's a regular HTTP request, perform the redirect
        return redirect()->route('admin.products')->with('success', 'Product created successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // ✅ Delete Image from Storage
        if ($product->image && $product->image !== 'No Image') {
            // Remove the image from the 'images' folder
            $imagePath = public_path($product->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // ✅ Delete Product
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
