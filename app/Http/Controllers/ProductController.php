<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
 change-password
use App\Models\ProductImage;


use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants', 'images')->get();
        return view('products.index', compact('products'));
    }

change-password
    public function adminIndex() {
        $products = Product::with('variants', 'images')->get();

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
change-password
            'sizes' => 'required|array',
            'sizes.*.size' => 'required|string',
            'sizes.*.stock' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); */

        // Create Product

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
change-password
        ]);

        // Handle Multiple Images Upload
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');

                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $path,
                ]);
            }
        }

        // Store Variants
        foreach ($request->sizes as $size) {
            ProductVariant::create([
                'product_id' => $product->id,
                'size' => $size['size'],
                'stock' => $size['stock']
            ]);
        }

        return redirect()->route('admin.products')->with('success', 'Product created successfully');
    }

    // Search Function 
    public function search(Request $request)
    {
        $query = $request->input('query'); // Get user input

        $products = Product::where('name', 'LIKE', "%{$query}%")
                    ->orWhere('description', 'LIKE', "%{$query}%")
                    ->orWhere('category', 'LIKE', "%{$query}%")
                    ->orWhere('brand', 'LIKE', "%{$query}%")
                    ->with('images', 'variants') // Include images & variants in search results
                    ->get();

        return view('products.index', compact('products', 'query')); // Pass query back to view

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
change-password
        
        // Delete associated images
        $images = ProductImage::where('product_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Delete product


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
