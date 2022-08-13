<?php

namespace App\Http\View\Composers;

use App\Models\Product;
use Illuminate\View\View;

class ProductHitComposer
{

    public function compose(View $view)
    {
        $products = Product::where('active', 1)
            ->select('id', 'name', 'price', 'price_sale')
            ->with('image')
            ->whereBetween('price_sale', [10000000, 30000000])
            ->limit(6)
            ->orderByDesc('id')
            ->get();
        $view->with('products', $products);
    }

}