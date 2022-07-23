<?php

use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\Users\LoginController;
use App\Http\Controllers\Admin\PostCatController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProductCatController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\UploadController;
use Illuminate\Support\Facades\Route;

Route::get('admin/users/login', [LoginController::class, 'index'])->name('admin/login');
Route::post('admin/users/login/store', [LoginController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [MainController::class, 'index'])->name('admin');
        Route::get('main', [MainController::class, 'index']);

        Route::prefix('users')->group(function() {
            Route::get('edit', [MainController::class, 'show']);
            Route::post('edit', [MainController::class, 'update']);
            Route::get('logout', [MainController::class, 'logout']);
        });

        #Page
        Route::prefix('pages')->group(function () {
            Route::get('add', [PageController::class, 'create']);
            Route::post('add', [PageController::class, 'store']);
            Route::get('list', [PageController::class, 'index']);
            Route::get('edit/{page}', [PageController::class, 'show']);
            Route::post('edit/{page}', [PageController::class, 'update']);
            Route::delete('destroy', [PageController::class, 'destroy']);
        });

        #Post Category
        Route::prefix('post_cat')->group(function() {
            Route::get('add', [PostCatController::class, 'create']);
            Route::post('add', [PostCatController::class, 'store']);
            Route::get('list', [PostCatController::class, 'index']);
            Route::get('edit/{item}', [PostCatController::class, 'show']);
            Route::post('edit/{item}', [PostCatController::class, 'update']);
            Route::delete('destroy', [PostCatController::class, 'destroy']);
        });

        #Post
        Route::prefix('posts')->group(function () {
            Route::get('add', [PostController::class, 'create']);
            Route::post('add', [PostController::class, 'store']);
            Route::get('list', [PostController::class, 'index']);
            Route::get('edit/{post}', [PostController::class, 'show']);
            Route::post('edit/{post}', [PostController::class, 'update']);
            Route::delete('destroy', [PostController::class, 'destroy']);
            Route::get('search', [PostController::class, 'search']);
        });

        #Product Category
        Route::prefix('product_cat')->group(function () {
            Route::get('add', [ProductCatController::class, 'create']);
            Route::post('add', [ProductCatController::class, 'store']);
            Route::get('list', [ProductCatController::class, 'index']);
            Route::get('edit/{item}', [ProductCatController::class, 'show']);
            Route::post('edit/{item}', [ProductCatController::class, 'update']);
            Route::delete('destroy', [ProductCatController::class, 'destroy']);
        });

        #Product
        Route::prefix('products')->group(function () {
            Route::get('add', [ProductController::class, 'create']);
            Route::post('add', [ProductController::class, 'store']);
            Route::get('list', [ProductController::class, 'index']);
            Route::get('edit/{product}', [ProductController::class, 'show']);
            Route::post('edit/{product}', [ProductController::class, 'update']);
            Route::delete('destroy', [ProductController::class, 'destroy']);
            Route::get('search', [ProductController::class, 'search']);
        });

        #Upload
        Route::post('upload/services', [UploadController::class, 'store']);
        Route::post('uploads/services', [UploadController::class, 'multi_store']);

        #Slider
        Route::prefix('sliders')->group(function () {
            Route::get('add', [SliderController::class, 'create']);
            Route::post('add', [SliderController::class, 'store']);
            Route::get('list', [SliderController::class, 'index']);
            Route::get('edit/{slider}', [SliderController::class, 'show']);
            Route::post('edit/{slider}', [SliderController::class, 'update']);
            Route::delete('destroy', [SliderController::class, 'destroy']);
        });

        #Cart
        Route::prefix('carts')->group(function () {
            Route::get('list', [CartController::class, 'index']);
            Route::get('show/{customer}', [CartController::class, 'show']);
            Route::get('search', [CartController::class, 'search']);
        });
    });
});

#Main
Route::get('/', [App\Http\Controllers\MainController::class, 'index']);

#Product
Route::get('danh-muc/{id}-{slug}.html', [App\Http\Controllers\ProductCatController::class, 'index']);
Route::get('san-pham/{id}-{slug}.html', [App\Http\Controllers\ProductController::class, 'index']);

#Cart
Route::post('add-cart', [App\Http\Controllers\CartController::class, 'index']);
Route::get('carts', [App\Http\Controllers\CartController::class, 'show']);
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'update']);
Route::get('carts/delete/{id}', [App\Http\Controllers\CartController::class, 'remove']);
Route::get('checkout', [App\Http\Controllers\CartController::class, 'checkout']);
Route::post('checkout', [App\Http\Controllers\CartController::class, 'addCart']);

Route::get('add-cart/{id}', [App\Http\Controllers\CartController::class, 'addToCart']);
Route::get('checkout/{id}', [App\Http\Controllers\CartController::class, 'addToCheckout']);

#Page
Route::get('{id}-{slug}.html', [App\Http\Controllers\PageController::class, 'show']);

#Post
Route::prefix('blog')->group(function () {
    Route::get('/', [App\Http\Controllers\PostController::class, 'index']);
    Route::get('{slug}/{id}.html', [App\Http\Controllers\PostCatController::class, 'show']);
    Route::get('{id}-{slug}.html', [App\Http\Controllers\PostController::class, 'show']);
});

#Search
Route::get('search', [App\Http\Controllers\SearchController::class, 'search']);
Route::get('ajax-search-product', [App\Http\Controllers\SearchController::class, 'ajaxSearch']);