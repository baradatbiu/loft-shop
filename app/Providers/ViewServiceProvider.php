<?php

namespace App\Providers;

use App\Box;
use App\Category;
use Illuminate\Support\Facades\Route;
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
        // Using Closure based composers...
        View::composer('sidebar.categories', function ($view) {
            $categories = Category::all();
            $route = Route::current();
            $name = Route::currentRouteName();
            if ($name === 'game.category') {
                $currentCategoryId = $route->parameters['id'];
            } else {
                $currentCategoryId = 0;
            }
            $view->with(['categories' => $categories, 'id' => $currentCategoryId]);
        });

        View::composer('layouts.header', function ($view) {
            $view->with(['boxSize' => Box::query()->where('user_id', \Auth::id())->count()]);
        });
    }
}
