<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function product_reviews()
    {
        return $this->hasMany(Review::class, 'product_id', 'shopify_id');
    }
}
