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
    ),
    'passport' => array(
        'weibo' => array(
            'key'            => '4001143741',
            'secret'         => 'ae6c0c7599e22f2fe0eb7726666cee32',
            'callback_url'   => '/login/weibo/callback',
            'strategy_class' => 'SinaWeibo'
        )
    )
);