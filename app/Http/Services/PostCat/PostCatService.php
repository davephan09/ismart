<?php 

namespace App\Http\Services\PostCat;

use App\Models\post_cat;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PostCatService

{
    public function getParent() 
    {
        return post_cat::where('parent_id', 0)->get();
    }

    public function getAll()
    {
        return post_cat::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            post_cat::create([
                'name' => (string) $request->input('title'),
                'parent_id' => (int) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                'slug' => Str::slug($request->input('title'), '-'),
            ]);

            Session::flash('success', 'Thêm danh mục thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $item)
    {
        if ($request->input('parent_id') != $item->id) {
        $item->name = (string) $request->input('title');
        }
        $item->parent_id = (int) $request->input('parent_id');
        $item->description = (string) $request->input('description');
        $item->content = (string) $request->input('content');
        $item->active = (string) $request->input('active');
        $item->slug = Str::slug($request->input('title'), '-');
        $item->save();

        Session::flash('success', 'Cập nhật thành công danh mục');
        return true;
    }

    public function destroy($request)
    {
        $id = (int) $request->input('id');
        $postCat = post_cat::where('id', $id)->first();
        if ($postCat) {
            return post_cat::where('id', $id)->orWhere('parent_id', $id)->delete();
        } 
        return false;
    }

    public function getPostCat($id)
    {
        return post_cat::where('id', $id)->with('posts')->firstOrFail();
    }
}