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
        'content',
        'cat_id',
        'price',
        'active',
        'code',
        'price_sale',        
    ];

    public function product_cat() {
        return $this->hasOne(ProductCat::class, 'id', 'cat_id');
    }

    public function images() {
        return $this->hasMany(Media::class, 'product_id', 'id');
    }

    public function image() {
        return $this->hasOne(Media::class, 'product_id', 'id')->oldest();
    }
}
