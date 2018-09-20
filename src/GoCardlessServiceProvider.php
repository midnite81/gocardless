<?php

namespace Midnite81\GoCardless;

use Illuminate\Support\ServiceProvider;
use Midnite81\GoCardless\Contracts\Services\Client;
use Midnite81\GoCardless\Services\Client as ConcreteClient;

class GoCardlessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/gocardless.php' => config_path('gocardless.php')
        ]);

        $this->mergeConfigFrom(__DIR__ . '/../config/gocardless.php', 'gocardless');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Client::class, ConcreteClient::class);
        $this->app->alias(Client::class, 'gocardless');
    }
}
