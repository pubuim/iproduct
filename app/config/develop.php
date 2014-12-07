<?php
/**
 *
 * This file is used to be define the config which cause different by environment, such as database, redis, memcache, api service and so on.
 *
 * This `develop` config will be load when `PAGON_ENV` environment variable is not set or set to `develop`.
 *
 */

error_reporting(E_ALL & ~E_NOTICE);

return array(
    'debug'    => true,
    'database' => array(
        'type'     => 'mysql',
        'host'     => '127.0.0.1',
        'port'     => '3306',
        'dbname'   => 'iproduct',
        'username' => 'root',
        'password' => '',
        'charset'  => 'utf8',
        'options'  => array()
    )
);