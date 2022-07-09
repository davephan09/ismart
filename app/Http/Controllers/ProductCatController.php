<?php

namespace App\Http\Controllers;

use App\Http\Services\ProductCat\ProductCatService;
use Illuminate\Http\Request;

class ProductCatController extends Controller
{

    protected $productCat;

    public function __construct(ProductCatService $productCat)
    {
        $this->productCat = $productCat;
    }

    public function index(Request $request, $id, $slug)
    {
        $productCat = $this->productCat->getId($id);
        $parentCat = $this->productCat->getParentCat($productCat);

        if (isset($request->r_price)) {
            $priceSort = $request->r_price;

            if ($priceSort == 1) {
                $products = $this->productCat->getProduct($productCat)->where('price_sale', '<', 1000000)->paginate(20)->appends(request()->query());
            } elseif ($priceSort == 2) {
                $products = $this->productCat->getProduct($productCat)->whereBetween('price_sale', [1000000, 5000000])->paginate(20)->appends(request()->query());
            } elseif ($priceSort == 3) {
                $products = $this->productCat->getProduct($productCat)->whereBetween('price_sale', [5000000, 10000000])->paginate(20)->appends(request()->query());
            } elseif ($priceSort == 4) {
                $products = $this->productCat->getProduct($productCat)->whereBetween('price_sale', [10000000, 20000000])->paginate(20)->appends(request()->query());
            } elseif ($priceSort == 5) {
                $products = $this->productCat->getProduct($productCat)->where('price_sale', '>', 20000000)->paginate(20)->appends(request()->query());
            }
        } else {

            if (isset($request->sort_by)) {
                $sortBy = $request->sort_by;

                if ($sortBy == 'a-z') {
                    $products = $this->productCat->getProduct($productCat)->orderBy('name')->paginate(20)->appends(request()->query());
                } elseif ($sortBy == 'z-a') {
                    $products = $this->productCat->getProduct($productCat)->orderByDesc('name')->paginate(20)->appends(request()->query());
                } elseif ($sortBy == 'asc') {
                    $products = $this->productCat->getProduct($productCat)->orderBy('price_sale')->paginate(20)->appends(request()->query());
                } elseif ($sortBy == 'desc') {
                    $products = $this->productCat->getProduct($productCat)->orderByDesc('price_sale')->paginate(20)->appends(request()->query());
                }
            } else {
                $products = $this->productCat->getProduct($productCat)->paginate(20)->appends(request()->query());
                // dd($products);
            }
        }

        return view('product_cat.product_cat', [
            'title' => $productCat->name,
            'products' => $products,
            'productCat' => $productCat,
            'parentCat' => $parentCat,
        ]);
    }
}
