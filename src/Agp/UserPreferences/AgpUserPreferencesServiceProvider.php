<?php

namespace Agp\UserPreferences;

use Illuminate\Support\ServiceProvider;

class AgpUserPreferencesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/Routes/web.php');
    }

    public function register()
    {
        $this->loadViewsFrom(__DIR__ . '/Views', 'UserPreferences');
    }
}
