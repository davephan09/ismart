<?php

namespace App\Http\Services\Post;

use App\Models\post_cat;
use App\Models\Post;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class PostService

{

    public function getAll()
    {
        return Post::with('post_cat')->orderByDesc('id')->paginate(10);
    }

    public function getCat()
    {
        return post_cat::where('parent_id', '<>', '0')->get();
    }

    public function insert($request)
    {
        try {
            Post::create($request->all());
            Session::flash('success', 'Thêm bài viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Lỗi: Thêm bài viết không thành công');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function update($request, $post)
    {
        try {
            $post->fill($request->input());
            $post->save();
            Session::flash('success', 'Chỉnh sửa bài viết thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Lỗi: Chỉnh sửa bài viết không thành công');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function destroy($request)
    {
        $post = Post::where('id', (int)$request->input('id'))->first();
        if ($post) {
            $path = str_replace('storage', 'public', $post->thumb);
            Storage::delete($path);
            $post->delete();
            return true;
        }
        return false;
    }

    public function search($request)
    {
        if ($request->s) {
        $key = $request->s;
        return Post::where('name', 'like', '%'.$key.'%')
            ->with('post_cat')
            ->orderByDesc('id')
            ->paginate(10);
        }
    }
}