<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
        Blade::if('admin', function () {

            $user = auth()->user();

            if (auth()->user() && $exists = $user->roles()->where('name', 'admin')->exists()) {
                return 1;
            }
            return 0;
        });

        Blade::if('member', function () {

            $user = auth()->user();

            if (auth()->user() && $exists = $user->roles()->where('name', 'member')->exists()) {
                return 1;
            }
            return 0;
        });
    }


}
