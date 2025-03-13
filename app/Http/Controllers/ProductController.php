<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show($id)
{
    $product = Product::findOrFail($id); // Fetch the product or return 404
    return view('products.show', compact('product'));
}

public function index(Request $request)
{
    $query = Product::query();
    
    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where('name', 'LIKE', "%{$searchTerm}%")
              ->orWhere('description', 'LIKE', "%{$searchTerm}%");
    }

    if ($request->has('product_id')) {
        $query->where('id', $request->input('product_id'));
    }

    $products = $query->get();

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
            'images' => [] 
        ]);
        if ($request->hasFile('images')) {
            $imagePaths = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('products', 'public');
                $imagePaths[] = $path;
            }
            $product->update(['images' => $imagePaths]);
        }

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
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('admin.editProduct', compact('product'));
}
public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category' => 'required|string',
        'brand' => 'required|string',
        'color' => 'required|string',
    ]);

    $product->update($validated);

    return redirect()->route('admin.products')->with('success', 'Product updated successfully.');
}
public function addImage(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $validated = $request->validate([
        'images.*' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $imagePaths = $product->images ?? [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $path = $image->store('products', 'public');
            $imagePaths[] = $path;
        }
    }

    $product->update(['images' => $imagePaths]);

    return redirect()->back()->with('success', 'Images added successfully.');
}
public function removeImage(Request $request, $id)
{
    $product = Product::findOrFail($id);
    $imageToRemove = $request->input('image');

    $images = array_filter($product->images, function ($image) use ($imageToRemove) {
        return $image !== $imageToRemove;
    });

    Storage::disk('public')->delete($imageToRemove);
    $product->update(['images' => array_values($images)]);

    return redirect()->back()->with('success', 'Image removed successfully.');
}


}

