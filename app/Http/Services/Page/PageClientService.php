<?php

namespace App\Http\Services\Page;

use App\Models\Page;

class PageClientService
{

    public function getPage($id)
    {
        return Page::where('id', $id)->where('active', 1)->firstOrFail();
    }

}