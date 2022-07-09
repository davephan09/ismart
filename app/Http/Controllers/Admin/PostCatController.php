<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post_cat\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\PostCat\PostCatService;
use App\Models\post_cat;
use Illuminate\Http\JsonResponse;

class PostCatController extends Controller
{
    protected $postCatService;

    public function __construct(PostCatService $postCatService)
    {
        $this->PostCatService = $postCatService;
    }

    public function create() 
    {
        return view('admin.post_cat.add', [
            'title' => 'Thêm mới danh mục', 
            'postCat' => $this->PostCatService->getParent(),
        ]);
    }

    public function store(CreateFormRequest $request) 
    {
        $this->PostCatService->create($request);
        
        return redirect()->back();
    }

    public function index()
    {
        return view('admin.post_cat.list', [
            'title' => 'Danh sách danh mục',
            'postCat' => $this->PostCatService->getAll(),
        ]);
    }

    public function show(post_cat $item)
    {
        return view('admin.post_cat.edit', [
            'title' => 'Chỉnh sửa danh mục ' . $item->name,
            'item' => $item,
            'postCat' => $this->PostCatService->getParent(),
        ]);
    }

    public function update(post_cat $item, CreateFormRequest $request)
    {
        $this->PostCatService->update($request, $item);
        return redirect('/admin/post_cat/list');
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->PostCatService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục',
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
