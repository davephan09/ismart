<?php

namespace App\Http\Services\ProductCat;

use App\Helpers\Helper;
use App\Models\Product;
use App\Models\ProductCat;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ProductCatService

{
    public function getParent()
    {
        return ProductCat::where('parent_id', 0)->get();
    }

    public function getAll()

    {
        return ProductCat::orderbyDesc('id')->paginate(20);
    }

    public function create($request)
    {
        try {
            ProductCat::create([
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
        $postCat = ProductCat::where('id', $id)->first();
        if ($postCat) {
            return ProductCat::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function show()                  //get những danh mục sản phẩm chính
    {
        return ProductCat::where('active', 1)->where('parent_id', 0)->get();
    }

    public function getAllCat()             //get tất cả danh mục sản phẩm
    {
        return ProductCat::where('active', 1)->get();
    }

    public function getId($id)
    {
        return ProductCat::where('id', $id)->where('active', 1)->firstOrFail();
    }

    public function getProduct($productCat)     //Query list products theo category    
    {
        if ($productCat->parent_id == 0) {
            $cats = $productCat->childrens;
            $catId = array();
            foreach ($cats as $cat) {
                $catId[] = $cat->id;
            }
            $products = Product::whereIn('cat_id', $catId)->with('image')->where('active', 1);

            return $products;
        } else {
            $products = $productCat->products()->with('image')->where('active', 1);
            return $products;
        }
    }

    public function getParentCat($productCat)           //Query Parent category
    {
        $parentId = $productCat->parent_id;
        if ($parentId != 0) {
            return ProductCat::where('active', 1)->where('id', $parentId)->first();
        }
    }
}
