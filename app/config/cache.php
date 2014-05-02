<?php

return array(

    // How long to cache pages
    'page-minutes' => 60,

    'driver' => 'database',
    'path' => storage_path().'/cache',
    'connection' => null,
    'table' => 'cache',
    'memcached' => array(

        array('host' => '127.0.0.1', 'port' => 11211, 'weight' => 100),

    ),
    'prefix' => '',
);
