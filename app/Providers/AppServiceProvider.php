<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

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
        // Force HTTPS for generated URLs when in production or when FORCE_HTTPS=true
        if (env('FORCE_HTTPS', false) || (config('app.url') && str_starts_with(config('app.url'), 'https')) ) {
            URL::forceScheme('https');
        }
    }
}
