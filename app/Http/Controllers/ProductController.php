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
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string',
        'brand' => 'required|string',
        'color' => 'required|string',
        'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'sizes' => 'nullable|array',
        'sizes.*.size' => 'required|string',
        'sizes.*.stock' => 'required|integer|min:0',
    ]);

    try {
        // Create the product first
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'],
            'category' => $validated['category'],
            'brand' => $validated['brand'],
            'color' => $validated['color'],
            'images' => [] // Default empty array
        ]);

        // Handle Multiple Image Uploads
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public'); // Store in 'storage/app/public/products'
                $imagePaths[] = $path;
            }
            $product->update(['images' => $imagePaths]); // Use update() instead of save()
        }

        // Handle Sizes & Stock
        if (!empty($validated['sizes'])) {
            foreach ($validated['sizes'] as $sizeData) {
                $product->variants()->create([
                    'size' => $sizeData['size'],
                    'stock' => $sizeData['stock']
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Product added successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()], 500);
    }
}

public function destroy($id)
{
    $product = Product::findOrFail($id);

    if (!empty($product->images)) {
        foreach ($product->images as $imagePath) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    $product->delete();

    return redirect()->back()->with('success', 'Product deleted successfully.');
}

    public function updateStock(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->has('remove_variants')) {
            ProductVariant::whereIn('id', $request->remove_variants)->delete();
        }

        
        // ✅ Update existing variants
        if ($request->has('variants')) {
            foreach ($request->variants as $variantId => $variantData) {
                $variant = ProductVariant::find($variantId);
                if ($variant) {
                    $variant->update([
                        'size' => $variantData['size'],
                        'stock' => $variantData['stock'],
                    ]);
                }
            }
        }
    
        // ✅ Add new variants
        if ($request->has('new_variants')) {
            foreach ($request->new_variants as $newVariant) {
                if (!empty($newVariant['size']) && isset($newVariant['stock'])) {
                    ProductVariant::create([
                        'product_id' => $product->id,
                        'size' => $newVariant['size'],
                        'stock' => $newVariant['stock'],
                    ]);
                }
            }
        }
    
        return redirect()->route('admin.products')->with('success', 'Stock updated successfully!');
    }

    public function editStock($id)
{
    $product = Product::with('variants')->find($id);

    if (!$product) {
        abort(404, 'Product Not Found');
    }

    return view('admin.edit_stock', compact('product'));
}
}

