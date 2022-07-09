<?php

namespace App\Http\Services\Post;

use App\Models\Post;

class PostClientService
{

    public function getListPost()
    {
        return Post::where('active', 1)
            ->with('post_cat')
            ->paginate(20);
    }

    public function getPost($id)
    {
        return Post::where('id', $id)
            ->with('post_cat')
            ->firstOrFail();
    }

}