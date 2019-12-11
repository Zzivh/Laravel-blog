<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
//use Illuminate\View\View;
use Illuminate\Support\Facades\View;

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
    // 注册完后调用boot
    public function boot()
    {
        Schema::defaultStringLength(191);
        View::composer('layout.sidebar', function ($view) {
            $topics = \App\Topic::all();
            $view->with('topics', $topics);
        });
    }
}
