<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PostCat\PostCatService;

class PostCatController extends Controller
{
    protected $postCatService;

    public function __construct(PostCatService $postCatService)
    {
        $this->postCatService = $postCatService;
    }

    public function show($slug, $id)
    {
        $postCat = $this->postCatService->getPostCat($id);
        return view('post_cat.list', [
            'title' => $postCat->name,
            'postCat' => $postCat,
            'posts' => $postCat->posts()->where('active', 1)->paginate(20),
        ]);
    }
}
