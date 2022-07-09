<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCat extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'parent_id',
        'description',
        'content',
        'slug',
        'active',
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'cat_id', 'id');
    }

    public function childrens()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

}
