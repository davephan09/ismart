<?php

namespace App\Http\Services;

use App\Models\Media;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UploadService

{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                // $pathFull = 'uploads/' . date("Y/m/d");
                // $name = $request->file('file')->getClientOriginalName();
                // $request->file('file')->storeAs(
                //     'public/' . $pathFull,
                //     $name
                // );

                // return '/storage/' . $pathFull . '/' . $name;

                $image_name = $request->file('file');

                $uploadFileUrl = Cloudinary::upload($image_name->getRealPath())->getSecurePath();

                return $uploadFileUrl;

            } catch (\Exception $err) {
                return false;
            }
        }
    }

    public function multi_store($request)
    {
        try {
            $thumbs = array();
            for ($i = 0; $i < $request->TotalFiles; $i++) {

                if ($request->hasFile('files' . $i)) {
                    $file = $request->file('files' . $i);
                    // $pathFull = 'uploads/product/' . date("Y/m/d");
                    // $name = $file->getClientOriginalName();
                    // $file->storeAs(
                    //     'public/' . $pathFull,
                    //     $name
                    // );

                    // $thumbs[] = '/storage/' . $pathFull . '/' . $name;
                    $thumbs[] = Cloudinary::upload($file->getRealPath())->getSecurePath();
                }
            }

            return $thumbs;
        } catch (\Exception $err) {
            return false;
        }
        // } return false;
        // $files = [];
        // if ($request->hasfile('file[]')) {

        //     foreach ($request->file('file[]') as $file) {
        //         $pathFull = 'uploads/product/' . date("Y/m/d");
        //         $name = $file->getClientOriginalName();
        //         // $name = time().rand(1,100).'.'.$file->extension();
        //         // $file->move(public_path('files'), $name);  
        //         $file->storeAs(
        //             'public/' . $pathFull,
        //             $name
        //         );
        //         $files[] = $name;
        //     }
        // }



        // $file= new Media();
        // $file->filenames = $files;
        // $file->save();
    }

    // public function multi_upload($request)
    // {
    //     try {
    //         foreach ($request->input('thumb[]') as $thumb) {
    //             Media::create([
    //                 'thumb' => $thumb,
    //                 'product_id' => (int) $request->input('id'),
    //             ]);
    //         }

    //         foreach ($request->input('nameThumb[]') as $name) {
    //             Media::create([
    //                 'name' => $name,
    //             ]);
    //         }

    //         Session::flash('success', 'Thêm sản phẩm thành công');
    //     } catch (\Exception $err) {
    //         Session::flash('error', 'Loi');
    //         Log::info($err->getMessage());
    //         return false;
    //     }
    // }
}
