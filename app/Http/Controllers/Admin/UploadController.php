<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use Illuminate\Http\Request;
use App\Http\Services\UploadService;

class UploadController extends Controller
{

    protected $upload;
    public function __construct(UploadService $upload)
    {
        $this->upload = $upload;
    }

    public function store(Request $request)
    {
        $result = $this->validate($request, ['file' => 'image|mimes:jpeg,png,jpg,gif,svg|max:10000',], [
            'file.image' => 'File upload phải là file ảnh',
            'file.nimes' => 'File upload phải là jpeg, png, jpg, gif, svg',
            'file.max' => 'File không lớn hơn 10000',
        ]);
        if ($result) {
            $url = $this->upload->store($request);
            if ($url !== false) {
                return response()->json([
                    'error' => false,
                    'url' => $url,
                ]);
            }
            return response()->json(['error' => true]);
        } 
        return response()->json(['error' => true]);
    }

    public function multi_store(Request $request)
    {
        // $result = $this->validate($request, ['files.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1000000',], [
        //     'files.*.image' => 'File upload phải là file ảnh',
        //     'files.*.nimes' => 'File upload phải là jpeg, png, jpg, gif, svg',
        //     'files.*.max' => 'File không lớn hơn 1000000',
        // ]);
        // $result = $request->validate([
        //     'files' => 'required',
        //     'files.*' => 'mimes:csv,txt,xlx,xls,pdf'
        //     ]);
        if ($request->TotalFiles > 0) {
            $thumbs = $this->upload->multi_store($request);
            // $thumbs = $request;
            // dd($request);
            if ($thumbs !== false) {
                return response()->json([
                    'error' => false,
                    'thumbs' => $thumbs,
                ]);
            }
            return response()->json(['error' => true]);
        } 
        return response()->json(['error' => true]);
    }

}
