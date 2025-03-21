<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
{
    $bestSellers = Product::select('products.*', DB::raw('SUM(order_items.quantity) as total_sold'))
        ->join('product_variants', 'product_variants.product_id', '=', 'products.id')
        ->join('order_items', 'order_items.product_variant_id', '=', 'product_variants.id')
        ->groupBy('products.id')
        ->orderByDesc('total_sold')
        ->take(3)
        ->get();

    return view('homepage', compact('bestSellers'));
}
}