<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        \View::composer('*', function ($view){
            $menu = Cache::rememberForever('menu', function (){
                return Category::where('parent_id', 0)->get();
            });

            $view->with(['menu'=> collect($menu)]);
        });
        \View::composer('*', function ($view){
            $submenu = Cache::rememberForever('submenu', function (){
                return Category::where('parent_id', '!=', 0)->get();
            });

            $view->with(['submenu'=> collect($submenu)]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
