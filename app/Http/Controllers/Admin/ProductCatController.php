<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post_cat\CreateFormRequest;
use Illuminate\Http\Request;
use App\Http\Services\ProductCat\ProductCatService;
use App\Models\ProductCat;
use Illuminate\Http\JsonResponse;


class ProductCatController extends Controller
{
    protected $productCatService;
    public function __construct(ProductCatService $productCatService)
    {
        return $this->ProductCatService = $productCatService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product_cat.list', [
            'title' => 'Danh sách danh mục sản phẩm',
            'productCat' => $this->ProductCatService->getAll(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product_cat.add', [
            'title' => 'Thêm danh mục sản phẩm',
            'productCat' => $this->ProductCatService->getParent(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->ProductCatService->create($request);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCat $item)
    {
        return view('admin.product_cat.edit', [
            'title' => 'Chỉnh sửa danh mục ' . $item->name,
            'item' => $item,
            'productCat' => $this->ProductCatService->getParent(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductCat $item, CreateFormRequest $request)
    {
        $result = $this->ProductCatService->update($request, $item);
        if ($result) {
            return redirect('/admin/product_cat/list');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request): JsonResponse
    {
        $result = $this->ProductCatService->destroy($request);
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
