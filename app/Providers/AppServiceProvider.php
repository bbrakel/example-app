<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::preventLazyLoading(! app()->isProduction());

        View::composer('layouts.stacked', function ($view): void {
            foreach (__('nav.main') as $key => $value) {
                $routes[] = [
                    'uri' => "/{$key}",
                    'title' => __("nav.main.{$key}"),
                ];
            }

            $view->with([
                'current' => Route::getCurrentRoute(),
                'routes' => Collection::make($routes),
            ]);
        });
    }
}
