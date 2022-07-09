<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\Page\PageClientService;

class PageController extends Controller
{

    protected $pageService;

    public function __construct(PageClientService $pageService)
    {
        $this->pageService = $pageService;      
    }

    public function show($id = '', $slug = '')
    {
        $page = $this->pageService->getPage($id);
        return view('page.show', [
            'page' => $page,
        ]);
    }
}
