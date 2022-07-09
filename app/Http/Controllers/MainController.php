<?php

namespace App\Http\Controllers;

use App\Http\Services\Product\ProductClientService;
use App\Http\Services\ProductCat\ProductCatService;
use Illuminate\Http\Request;
use App\Http\Services\Slider\SliderService;

class MainController extends Controller
{

    protected $slider;
    protected $productCat;
    protected $product;

    public function __construct(SliderService $slider, ProductCatService $productCat, ProductClientService $product)
    {
        $this->slider = $slider;
        $this->productCat = $productCat;
        $this->product = $product;
    }

    public function index()
    {
        return view('home', [
            'title' => 'iSmart Việt Nam | Mua hàng online giá tốt',
            'sliders' => $this->slider->show(),
            'productCats' => $this->productCat->show(),
            'products' =>$this->product->get(),
            'allProductCats' => $this->productCat->getAllCat(),
        ]);
    }
}
