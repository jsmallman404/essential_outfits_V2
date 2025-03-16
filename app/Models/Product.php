<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'category',
        'color',
        'brand',
        'gender',
        'images',
        'is_featured'
    ];
    protected $casts = [
        'images' => 'array',
        'price' => 'decimal:2'
    ];
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}