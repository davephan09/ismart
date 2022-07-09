<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;

class SliderController extends Controller
{
    protected $slider;

    public function __construct(SliderService $slider)
    {
        $this->slider = $slider;
    }

    public function index()
    {
        return view('admin.sliders.list', [
            'title' => 'Danh sách Slider',
            'sliders' => $this->slider->getAll(),
        ]);
    }

    public function create()
    {
        return view('admin.sliders.add', [
            'title' => 'Thêm Slider mới',

        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
            'active' => 'required',
        ]);

        $this->slider->insert($request);

        return redirect()->back();
    }

    public function show(Slider $slider)
    {
        return view('admin.sliders.edit', [
            'title' => 'Chỉnh sửa Slider ' . $slider->name,
            'slider' => $slider,

        ]);
    }

    public function update(Request $request, Slider $slider)
    {
        $this->validate($request, [
            'name' => 'required',
            'thumb' => 'required',
            'url' => 'required',
            'active' => 'required',
        ]);

        $result = $this->slider->update($request, $slider);

        if ($result) {
            return redirect('/admin/sliders/list');
        }
        return redirect()->back();
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->slider->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công Slider',
            ]);
        }
        return response()->json([
            'error' => true,
        ]);
    }
}
