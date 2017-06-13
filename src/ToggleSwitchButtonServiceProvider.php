<?php

namespace Okipa\LaravelToggleSwitchButton\Laravel;

use Illuminate\Support\ServiceProvider;
use Okipa\ToggleSwitchButton;

class ToggleSwitchButtonServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../views', 'toggle_switch_button');
        
        $this->publishes([
            __DIR__ . '/../views' => resource_path('views/toggle_switch_button'),
            __DIR__ . '/../config/toggle_switch_button.php' => config_path('toggle_switch_button.php'),
        ], 'toggle_switch_button');
    }
    /**
     * {@inheritDoc}
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/toggle_switch_button.php', 'toggle_switch_button'
        );
        
        $this->app->singleton('Okipa\ToggleSwitchButton', function ($app) {
            $tableList = $app->make(ToggleSwitchButton::class);
            
            return $tableList;
        });
    }
}
