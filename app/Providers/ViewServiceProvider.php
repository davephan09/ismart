<?php


namespace App\Providers;

use App\Http\View\Composers\CartComposer;
use App\Http\View\Composers\ProductCatComposer;
use App\Http\View\Composers\ProductHitComposer;
use App\Http\View\Composers\ProductHotComposer;
use App\View\Composers\ProfileComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
 
class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
 
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('product_cat', ProductCatComposer::class);
        View::composer('cart', CartComposer::class);
        View::composer('product_hot', ProductHotComposer::class);
        View::composer('product_hit', ProductHitComposer::class);
    }
}