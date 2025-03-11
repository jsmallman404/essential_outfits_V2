<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductVariant;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('variants')->get();
        return view('products.index', compact('products'));
    }

    public function adminIndex() {
        $products = Product::with('variants') -> get();
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]); */


        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products','public');
        }

        $product = Product::create ([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'brand' => $request->brand,
            'color' => $request->color,
            'image' => $imagePath ?? 'No Image'
        ]);

        foreach ($request->sizes as $size) {
            ProductVariant::create([
                'product_id' => $product -> id,
                'size' => $size['size'],
                'stock' => $size['stock']
            ]);
        }

        return redirect() -> route('admin.products') -> with('success','Product created successfully');

    }

    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('success', 'Product deleted successfully.');
    }

    public function show($id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found.');
    }

    return view('products.show', compact('product'));
}

}
