<?php

return array(

    'driver' => 'database',
    'lifetime' => 240,
    'expire_on_close' => false,
    'connection' => null,
    'table' => 'sessions',
    'lottery' => array(2, 100),
    'cookie' => 'laravel_recipe',
    'path' => '/',
    'domain' => null,
    'secure' => false,
);
