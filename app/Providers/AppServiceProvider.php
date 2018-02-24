<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\DuskServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        $this->loadBladeExtensions();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local', 'testing')) {
            $this->app->register(DuskServiceProvider::class);
        }
    }

    private function loadBladeExtensions()
    {
        $this->ifRole();
    }

    private function ifRole()
    {
        Blade::if('role', function ($roles) {
            $user = auth()->user();
            if (!$user) {
                return false;
            }
            if (!is_array($roles)) {
                $roles = [$roles];
            }
            return $user->hasAnyRole($roles);
        });
    }
}
