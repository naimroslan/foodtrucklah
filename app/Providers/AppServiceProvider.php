<?php

namespace App\Providers;

use App\category;
use Illuminate\Support\ServiceProvider;
use View;

class AppServiceProvider extends ServiceProvider
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
        View::composer('frontend.include.banner', function ($view)
        {
           $view->with('categories', category::where('category_status', 1)->get() );
        });

        View::composer('frontend.include.dish', function ($view)
        {
            $view->with('categories', category::where('category_status', 1)->get() );
        });
    }
}
