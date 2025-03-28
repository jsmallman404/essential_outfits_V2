<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function show($id) {
    $product = Product::findOrFail($id);
    $reviews = ProductReview::where('product_id', $id)->get();
    $averageRating = $reviews->avg('rating') ?? 0;

    return view('products.show', compact('product', 'averageRating'));
}

public function index(Request $request)
{
    $query = Product::query();
    
    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where(function($q) use ($searchTerm) {
            $q->where('name', 'LIKE', "%{$searchTerm}%")
              ->orWhere('description', 'LIKE', "%{$searchTerm}%");
        });
    }
    
    if ($request->has('product_id')) {
        $query->where('id', $request->input('product_id'));
    }
    
    if ($request->filled('categories') && is_array($request->categories)) {
        $query->whereIn('category', $request->categories);
    }
    
    if ($request->filled('gender') && is_array($request->gender)) {
        $query->whereIn('gender', $request->gender);
    }
    if ($request->filled('brands') && is_array($request->brands)) {
        $query->whereIn('brand', $request->brands);
    }
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    $products = $query->get();
    $categories = Product::select('category')->distinct()->get();
    $brands = Product::select('brand')->distinct()->get();

    $genderCounts = Product::select('gender', DB::raw('count(*) as count'))
        ->groupBy('gender')
        ->get();

    $categoryCounts = Product::select('category', DB::raw('count(*) as count'))
        ->groupBy('category')
        ->get();

    $brandCounts = Product::select('brand', DB::raw('count(*) as count'))
        ->groupBy('brand')
        ->get();

    return view('products.index', compact('products', 'categories', 'brands', 'genderCounts', 'categoryCounts', 'brandCounts'));
}

public function adminIndex(Request $request)
{
    $query = Product::query();

    if ($request->filled('search')) {
        $searchTerm = $request->input('search');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'LIKE', "%{$searchTerm}%")
              ->orWhere('description', 'LIKE', "%{$searchTerm}%")
              ->orWhere('color', 'LIKE', "%{$searchTerm}%")
              ->orWhere('gender', 'LIKE', "%{$searchTerm}%")
              ->orWhere('brand', 'LIKE', "%{$searchTerm}%");
        });
    }

    $products = $query->get();

    return view('admin.productsIndex', compact('products'));
}

    public function create() {
        return view('admin.createProducts');
    }

    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'brand' => 'required|string',
            'gender' => 'required|string',
            'color' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'sizes' => 'nullable|array',
            'sizes.*.size' => 'required|string',
            'sizes.*.stock' => 'required|integer|min:0',
        ]);

        try {
            $product = Product::create([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? null,
                'price' => $validated['price'],
                'category' => $validated['category'],
                'brand' => $validated['brand'],
                'gender' => $validated['gender'],
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

    public function destroy($id) {
        $product = Product::findOrFail($id);

        if (!empty($product->images)) {
            foreach ($product->images as $imagePath) {
                Storage::disk('public')->delete($imagePath);
            }
        }

        $product->delete();

        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function getTotalSold($productId)
{
    $totalSold = \DB::table('products')
        ->join('product_variants', 'product_variants.product_id', '=', 'products.id')
        ->join('order_items', 'order_items.product_variant_id', '=', 'product_variants.id')
        ->where('products.id', $productId)
        ->sum('order_items.quantity');

    return $totalSold;
}

    public function updateStock(Request $request, $id) {
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

    public function editStock($id) {
        $product = Product::with('variants')->find($id);

        if (!$product) {
            abort(404, 'Product Not Found');
        }

        return view('admin.edit_stock', compact('product'));
    }
    public function edit($id) {
        $product = Product::findOrFail($id); 
        return view('admin.editProduct', compact('product')); 
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => ['required', 'numeric', 'min:0'],
            'category' => 'required|string',
            'gender' => 'required|string',
            'brand' => 'required|string',
            'color' => 'required|string',
            'images.*' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);
    
        try {
            $product = Product::findOrFail($id);
            
            if ($request->hasFile('images')) {
                $imagePaths = [];
                foreach ($request->file('images') as $image) {
                    $path = $image->store('products', 'public');
                    $imagePaths[] = $path;
                }
                $existingImages = json_decode($product->images, true) ?? [];
                $product->images = json_encode(array_merge($existingImages, $imagePaths));
            }
    
            $product->update([
                'name' => $validated['name'],
                'description' => $validated['description'] ?? $product->description,
                'price' => $validated['price'],
                'category' => $validated['category'],
                'gender' => $validated['gender'],
                'brand' => $validated['brand'],
                'color' => $validated['color'],
                'images' => $product->images,
            ]);
    
            return redirect()->route('admin.products')->with('success', 'Product updated successfully!');
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Product not found.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update product: ' . $e->getMessage());
        }
    }
    public function addImage(Request $request, $id) {
        $validated = $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        try {
            $product = Product::findOrFail($id);

            $existingImages = is_array($product->images) ? $product->images : json_decode($product->images, true) ?? [];

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('products', 'public');
                    $existingImages[] = $path;
                }
            }
            $product->update([
                'images' => json_encode($existingImages),
            ]);

            return redirect()->back()->with('success', 'Image(s) added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to add images: ' . $e->getMessage());
        }
    }

    public function removeImage(Request $request, $id) {
        try {
            $product = Product::findOrFail($id);

            $existingImages = is_array($product->images) ? $product->images : json_decode($product->images, true) ?? [];

            $imageToRemove = $request->input('image');

            if (in_array($imageToRemove, $existingImages)) {
                Storage::disk('public')->delete($imageToRemove);
                $existingImages = array_diff($existingImages, [$imageToRemove]); 
            }

            $product->update(['images' => json_encode(array_values($existingImages))]);

            return redirect()->back()->with('success', 'Image removed successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to remove image: ' . $e->getMessage());
        }
    }
}

