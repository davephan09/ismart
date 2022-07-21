<?php

namespace App\Http\Services\Product;

use App\Models\Media;
use App\Models\Product;
use App\Models\ProductCat;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductService

{
    public function getCat()
    {
        return ProductCat::where('parent_id', '<>', '0')->get();
    }

    protected function isValidPrice($request)
    {
        if (
            $request->input('price') !== 0 && $request->input('price_sale') !== 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') !== 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) {
            return false;
        }

        try {
            $request->except('_token', 'btn-add');
            $newProduct = Product::create($request->all());

            foreach ($request->input('thumb') as $thumb) {
                Media::create([
                    'product_id' => $newProduct->id,
                    'thumb' => $thumb,
                    'name' => basename($thumb),
                ]);
            }

            Session::flash('success', 'Thêm sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm sản phẩm lỗi');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }

    public function get()
    {
        return Product::with('product_cat')->orderByDesc('id')->paginate(10);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice == false) {
            return false;
        }

        try {
            $product->fill($request->input());
            $product->save();
            $newMedia = array();

            //Update new images
            foreach ($request->input('thumb') as $thumb) {
                Media::create([
                    'product_id' => $product->id,
                    'thumb' => $thumb,
                    'name' => basename($thumb),
                ]);
                $newMedia[] = $thumb;
            }

            //Delete old images 
            $images = Media::whereNotIn('thumb', $newMedia)->where('product_id', $product->id)->get();
            foreach ($images as $image) {
                $path = str_replace('storage', 'public', $image->thumb);
                Storage::delete($path);
            }
            Media::whereNotIn('thumb', $newMedia)->where('product_id', $product->id)->delete();

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
        $id = (int)$request->input('id');
        $product = Product::where('id', $id)->first();
        $images = Media::where('product_id', $id)->get();
        if ($product) {
            foreach ($images as $image) {
                $path = str_replace('storage', 'public', $image->thumb);
                Storage::delete($path);
            }
            $product->delete();
            Media::where('product_id', $id)->delete();
            return true;
        }
        return false;
    }
}
