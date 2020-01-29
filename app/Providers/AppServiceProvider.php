<?php

namespace App\Providers;

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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $databaseFile = config('database.connections.sqlite.database');
        if (!file_exists($databaseFile)) {
            file_put_contents($databaseFile, '');
        }
    }
}
