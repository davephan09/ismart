<?php

namespace App\Http\Services;

use App\Models\Product;

class SearchService
{

    public function getProducts($request)
    {
        return Product::where('name', 'like', '%'. $request->s . '%')
            ->where('active', 1)
            ->with('images')
            ->orderByDesc('id')
            ->paginate(20);
    }

    public function getProductsAjax($request)
    {
        if ($request->key) {
            $key = $request->key;
            $query = Product::where('name', 'like', '%'.$key.'%')
                ->with('image')
                ->orderByDesc('id')
                ->get();
            return $query;
        }
    }

}