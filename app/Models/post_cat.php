<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post_cat extends Model
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

    public function posts() {
        return $this->hasMany(Post::class, 'cat_id', 'id');
    }
}
