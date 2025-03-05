<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'price', 'category', 'color', 'brand', 'image'];

    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // Multiple images 
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}

