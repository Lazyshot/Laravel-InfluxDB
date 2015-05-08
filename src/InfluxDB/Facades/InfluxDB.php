<?php

namespace EvanDarwin\Laravel\InfluxDB\Facades;

use Illuminate\Support\Facades\Facade;

class InfluxDB extends Facade
{
    /**
     * Returns the IoC object
     */
    protected static function getFacadeAccessor()
    {
        return "influxdb.client";
    }
}
