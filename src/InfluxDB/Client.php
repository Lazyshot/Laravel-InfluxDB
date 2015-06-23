<?php

namespace EvanDarwin\Laravel\InfluxDB;

use InfluxDB\ClientFactory;

class Client
{
    protected $app = null; // The application instance
    protected $config = [];   // The configuration
    protected $client = null; // The client

    /**
     * Creates and parses the InfluxDB client.
     *
     * @param \Illuminate\Foundation\Application $app The Laravel application instance.
     */
    public function __construct($app)
    {
        // Bind the Laravel application instance.
        $this->app = $app;

        // Load the configuration, or empty for default.
        $this->config = $this->uglifyConfiguration(
            $app['config']->get('influxdb', [])
        );

        // Create the client
        $this->client = ClientFactory::create($this->config);
    }

    /**
     * Parses and replaces some of the simplified portions
     * with values compatible with InfluxDB-sdk.
     *
     * @param array $config The client configuration
     *
     * @returns array The updated configuration
     */
    protected function uglifyConfiguration(array $config)
    {
        // Default InfluxDB adapters
        $clientAdapters = [
            'http' => 'InfluxDB\\Adapter\\HttpAdapter',
            'udp'  => 'InfluxDB\\Adapter\\UdpAdapter',
        ];

        $clientFilters = [
            'default' => 'InfluxDB\\Filter\\ColumnsPointsFilter'
        ];

        // Look up adapter name and apply it.
        if (array_key_exists($config['adapter']['name'], $clientAdapters)) {
            $config['adapter']['name'] = $clientAdapters[$config['adapter']['name']];
        }

        // Look up filter name and apply it.
        if (array_key_exists($config['filters']['query']['name'], $clientFilters)) {
            $config['filters']['query']['name'] = $clientFilters[$config['filters']['query']['name']];
        }

        return $config;
    }

    /**
     * Client alias
     */
    public function mark($point, $data, $timePrecision = null)
    {
        return $this->client->mark($point, $data, $timePrecision);
    }

    /**
     * Client alias
     */
    public function query($query, $timePrecision = null)
    {
        return $this->client->query($query, $timePrecision);
    }

    /**
     * Client alias
     */
    public function getDatabases()
    {
        return $this->client->getDatabases();
    }

    /**
     * Client alias
     */
    public function createDatabase($name)
    {
        return $this->client->createDatabase($name);
    }

    /**
     * Client alias
     */
    public function deleteDatabase($name)
    {
        return $this->client->deleteDatabase($name);
    }
}
