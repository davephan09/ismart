<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Product\ProductClientService;
use App\Http\Services\ProductCat\ProductCatService;

class ProductController extends Controller
{
    
    protected $productService;
    protected $productCatService;

    public function __construct(ProductClientService $productService, ProductCatService $productCatService)
    {
        $this->productService = $productService;
        $this->productCatService = $productCatService;
    }

    public function index($id = '', $slug = '')
    {
        $product = $this->productService->show($id);
        $images = $this->productService->getImages($id);
        $mainImage = $images->first();
        $parentCat = $this->productCatService->getParentCat($product->product_cat);
        $productsMore = $this->productService->more($id);
        // dd($parentCat);

        return view('product.product', [
            'title' => $product->name,
            'product' => $product,
            'mainImage' => $mainImage,
            'images' => $images,
            'productsMore' => $productsMore,
            'parentCat' => $parentCat,
        ]);
    }

}
