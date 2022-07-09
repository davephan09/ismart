<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Page\PageRequest;
use App\Http\Services\Page\PageService;
use App\Models\Page;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PageController extends Controller
{
    protected $page;
    public function __construct(PageService $page)
    {
        return $this->pageService = $page;
    }

    public function index()
    {
        return view('admin.pages.list', [
            'title' => 'Danh sách trang',
            'pages' => $this->pageService->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.pages.add', [
            'title' => 'Thêm trang mới',
        ]);
    }

    public function store(PageRequest $request)
    {
        $this->pageService->insert($request);
        return redirect()->back();
    }

    public function show(Page $page)
    {
        return view('admin.pages.edit', [
            'title' => 'Chỉnh sửa trang',
            'page' => $page,
        ]);
    }

    public function update(PageRequest $request, Page $page)
    {
        $result = $this->pageService->update($request, $page);
        if ($result) {
            return redirect('/admin/pages/list');
        }

        return redirect()->back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->pageService->destroy($request);

        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa bài viết thành công',
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
