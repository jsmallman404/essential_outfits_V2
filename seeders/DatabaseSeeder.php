<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\ProductVariant;

class DatabaseSeeder extends Seeder
{

    public function run(): void     {
       
        $product1 = Product::create([
            'name' => 'Men’s T-Shirt',
            'description' => 'A stylish cotton T-shirt',
            'price' => 19.99,
            'category' => 'T-shirts',
            'color' => "Black",
            'brand' => 'Nike',
            'image' => 'tshirt.jpg',
        ]);

        ProductVariant::insert([
            ['product_id' => $product1->id, 'size' => 'S', 'stock' => 10],
            ['product_id' => $product1->id, 'size' => 'M', 'stock' => 15],
            ['product_id' => $product1->id, 'size' => 'L', 'stock' => 5],
        ]);

        $product2 = Product::create([
            'name' => 'Women’s Jeans',
            'description' => 'Slim fit blue jeans',
            'price' => 49.99,
            'color' => "Black",
            'brand' => 'Nike',
            'category' => 'Jeans',
            'image' => 'jeans.jpg',
        ]);

        ProductVariant::insert([
            ['product_id' => $product2->id, 'size' => 'M', 'stock' => 8],
            ['product_id' => $product2->id, 'size' => 'L', 'stock' => 12],
            ['product_id' => $product2->id, 'size' => 'XL', 'stock' => 6],
        ]);
    }
}
