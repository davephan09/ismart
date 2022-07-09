<?php

namespace App\Http\Services\Page;

use App\Models\Page;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PageService

{

    public function getAll()
    {
        return Page::orderByDesc('id')->paginate(10);
    }

    public function insert($request) 
    {
        try {
            Page::create($request->all());
            Session::flash('success', 'Thêm trang mới thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Lỗi: Thêm trang mới không thành công');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $page)
    {
        try {
            $page->fill($request->input());
            $page->save();
            Session::flash('success', 'Cập nhật trang thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Lỗi: Cập nhật trang không thành công');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $id = (int)$request->input('id');
        $page = Page::where('id', $id)->first();
        if ($page) {
            $page->delete();
            return true;
        }
        return false;
    }
}