<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('person_name', function ($attribute, $value) {
            return preg_match('/^[a-zA-Z\s]*$/', $value);
        });

        Validator::extend('username', function ($attribute, $value) {
            return preg_match('/^(?![_.])(?!.*[_.]{2})[a-zA-Z0-9._]+(?<![_.])$/', $value);
        });
    }
}
