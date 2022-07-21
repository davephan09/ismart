<?php

namespace App\Http\Services\Product;

use App\Models\Media;
use App\Models\Product;

class ProductClientService
{
    const LIMIT = 8;

    public function get()               //Show list sản phẩm trên home
    {
        return Product::where('active', 1)
            ->orderByDesc('id')
            ->with('image')
            ->get();
    }

    public function show($id)
    {
        return Product::where('id', $id)
            ->where('active', 1)
            ->with('product_cat')
            ->firstOrFail();
    }

    public function getImages($id)      //Query list Images của sản phẩm
    {
        return Media::where('product_id', $id)->get();
    }

    public function more($id)           //Query list sản phẩm tương tự
    {
        return Product::select('id', 'name', 'price', 'price_sale')
                ->where('active', 1)
                ->where('id', '!=', $id)
                ->orderByDesc('id')
                ->limit(8)
                ->with('images')
                ->get();
    }

}