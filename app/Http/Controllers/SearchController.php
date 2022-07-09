<?php

namespace App\Http\Controllers;

use App\Http\Services\SearchService;
use Illuminate\Http\Request;

class SearchController extends Controller
{

    protected $search;

    public function __construct(SearchService $search)
    {  
        $this->search = $search;
    }

    public function search(Request $request)
    {
        $products = $this->search->getProducts($request);
        return view('search.index', [
            'products' => $products,
        ]);
    }

    public function ajaxSearch(Request $request)
    {
        $data = $this->search->getProductsAjax($request);
        return $data;
    }
}
