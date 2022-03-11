<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class, 'product_category_details', 'product_id', 'category_id');
    }

    public function carts()
    {
        return $this->belongsToMany(Cart::class, 'carts');
    }

    public function reviews()
    {
        return $this->hasMany(ProductReview::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function discount()
    {
        return $this->hasOne(Product::class);
    }
}