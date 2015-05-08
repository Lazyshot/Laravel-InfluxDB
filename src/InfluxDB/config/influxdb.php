<?php

return array(
    /***********************************************************************
     *
     * Laravel InfluxDB Client
     * -----------------------
     *
     * For more information on all of the configuration options, look
     * at the documentation for the actual connector, which can be found
     * at this URL:
     *        https://github.com/corley/influxdb-php-sdk
     *
     * Valid adapter names:
     *        - udp     (for sockets)
     *        - http    (for over HTTP)
     *
     * Valid filter names:
     *        - default (for the default ColumnsPointsFilter)
     *        - other   (reference your own class name)
     *
     ***********************************************************************/

    'adapter' => array(
        "name"    => "udp",
        "options" => array()
    ),
    "options" => array(
        "host" => "localhost"
    ),
    "filters" => array(
        "query" => array(
            "name" => "default"
        )
    )
);
