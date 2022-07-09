<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'summary',
        'content',
        'active',
        'thumb',
        'cat_id',
    ];

    public function post_cat() {
        return $this->hasOne(post_cat::class, 'id', 'cat_id');
    }
}
