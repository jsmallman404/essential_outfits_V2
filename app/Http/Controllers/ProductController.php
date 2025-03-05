<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants', 'images')->get();
        return view('products.index', compact('products'));
    }

    public function adminIndex() {
        $products = Product::with('variants', 'images')->get();
        return view('admin.productsIndex', compact('products'));
    }

    public function create() {
        return view('admin.createProducts');
    }

    public function store(Request $request) {

        /*
        $request -> validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'category' => 'required|string',
            'brand' => 'required|string',
            'color' => 'required|string',
            'sizes' => 'required|array',
            'sizes.*.size' => 'required|string',
            'sizes.*.stock' => 'required|integer|min:0',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); */

        // Create Product
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'brand' => $request->brand,
            'color' => $request->color,
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
    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        
        // Delete associated images
        $images = ProductImage::where('product_id', $id)->get();
        foreach ($images as $image) {
            Storage::disk('public')->delete($image->image_path);
            $image->delete();
        }

        // Delete product
        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }
}
