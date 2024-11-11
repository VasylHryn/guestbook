<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Регистрируем middleware
        Route::middleware('admin', AdminMiddleware::class);
    }

    public function register()
    {
        //
    }
}
