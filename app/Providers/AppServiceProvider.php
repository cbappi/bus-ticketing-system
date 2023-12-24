<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use App\Rules\MaxTicketsRule;

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
        Validator::extend('max_tickets', function ($attribute, $value, $parameters, $validator) {
            $tripId = $parameters[0] ?? null;
            return (new MaxTicketsRule($tripId))->passes($attribute, $value);
        });

        //max_tickets
    }
}
