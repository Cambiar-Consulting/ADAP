<?php

namespace App\Providers;

use App\Services\HtmlExtended;
use Illuminate\Support\ServiceProvider;
use Spatie\Html\Html;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(Html::class, HtmlExtended::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
