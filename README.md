# Laravel-InfluxDB

Laravel-InfluxDB is a Laravel 5 provider that wraps the [influxdb-php-sdk](https://github.com/corley/influxdb-php-sdk) project.

## Installation

Install via composer:
```sh
$ composer require evandarwin/laravel-influxdb:dev-master
```

And then edit your `config/app.php` configuration file to add the service provider and the alias.

```php
<?php

return array(
  'providers' => [
    // ...
    'EvanDarwin\Laravel\InfluxDB\ServiceProvider'
  ],

  'aliases' => [
    'InfluxDB' => 'EvanDarwin\Laravel\InfluxDB\Facades\InfluxDB'
  ]
);
```

You then need to publish our configuration file.

```sh
$ php artisan vendor:publish
```

## Usage

Laravel-InfluxDB provides the same API as **influxdb-php-sdk**.
