<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Post\PostClientService;

class PostController extends Controller
{
    protected $postService;

    public function __construct(PostClientService $postService)
    {
        $this->postService = $postService;
    }

    public function index()
    {
        $posts = $this->postService->getListPost();
        return view('post.list', [
            'title' => 'Trang tin tức',
            'posts' => $posts,
        ]);
    }

    public function show($id, $slug)
    {
        $post = $this->postService->getPost($id);
        return view('post.show', [
            'title' => $post->name,
            'post' => $post,
        ]);
    }
}
