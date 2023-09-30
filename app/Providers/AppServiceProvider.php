<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Notifications\Telegram; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(Telegram::class, function ($app){ 
            return new Telegram(config('bots.tlgr.bot_api_key'));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
