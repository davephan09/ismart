<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\PostRequest;
use App\Http\Services\Post\PostService;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected $post;
    public function __construct(PostService $post)
    {
        return $this->PostService = $post;
    }

    public function index()
    {
        return view('admin.posts.list', [
            'title' => 'Danh sách bài viết',
            'posts' => $this->PostService->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.posts.add', [
            'title' => 'Thêm bài viết',
            'postCat' => $this->PostService->getCat(),
        ]);
    }

    public function store(PostRequest $request)
    {
        $this->PostService->insert($request);
        return redirect()->back();
    }

    public function show(Post $post)
    {
        return view('admin.posts.edit', [
            'title' => 'Chỉnh sửa bài viết',
            'post' => $post,
            'postCat' => $this->PostService->getCat(),
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $result = $this->PostService->update($request, $post);

        if ($result) {
            return redirect('/admin/posts/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->PostService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài viết thành công.',
            ]); 
        }
        return response()->json(['error' => true]);
    }

    public function search(Request $request)
    {
        $posts = $this->PostService->search($request);
        if ($posts) {
        return view('admin.posts.list', [
            'title' => 'Danh sách bài viết',
            'posts' => $posts,
        ]);
        }
    }
}
