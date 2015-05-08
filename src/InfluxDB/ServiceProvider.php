<?php

namespace EvanDarwin\Laravel\InfluxDB;

use EvanDarwin\Laravel\InfluxDB\Client as LaravelClient;
use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function register()
    {
        // Bind our instance to the IoC container
        $this->app->bindIf('influxdb.client', function ($application) {
            return new LaravelClient($application);
        });
    }

    public function boot()
    {
        // Publish our configuration files
        $this->publishes([
            __DIR__ . '/configs/influxdb.php' => config_path('influxdb.php'),
        ], 'config');
    }
}
