<?php


namespace App\Http\Services\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class SliderService

{
    public function getAll()
    {
        return Slider::orderBy('sort_by', 'ASC')->paginate(20);
    }

    public function insert($request)
    {
        try {
            Slider::create($request->input());
            Session::flash('success', 'Thêm slider mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Lỗi: Thêm slider mới không thành công');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }

    public function update($request, $slider)
    {
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function destroy($request)
    {
        $slider = Slider::where('id', $request->input('id'))->first();
        if ($slider) {
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }

    public function show() 
    {
        return Slider::where('active', 1)->orderBy('sort_by','ASC')->get();
    }
}