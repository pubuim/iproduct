<?php

define('APP_DIR', __DIR__);
define('ROOT_DIR', dirname(APP_DIR));

require dirname(__DIR__) . '/vendor/autoload.php';

use Pagon\Pagon;

// Create application
$app = Pagon::create(__DIR__ . '/config/default.php');

// Get current mode
$mode = $app->mode();

// Mount current dir as root dir
$app->mount(APP_DIR);
$app->mount('public', ROOT_DIR . '/public');

// Load mode config depends on ENV
if (is_file($conf_file = __DIR__ . '/config/' . $mode . '.php')) {
    $app->append(include($conf_file));
}

$app->inject('loadOrm', function () use ($app) {
    $config = $app->database;
    ORM::configure(buildDsn($config));
    ORM::configure('username', $config['username']);
    ORM::configure('password', $config['password']);
    Model::$auto_prefix_models = '\\Model\\';
});

$app->share('pdo', function ($app) {
    $config = $app->database;
    return new PDO(buildDsn($config), $config['username'], $config['password'], $config['options']);
});

return $app;
/**
 * build Dsn string
 *
 * @param array $config
 * @return string
 */
function buildDsn(array $config)
{
    return sprintf('%s:host=%s;port=%s;dbname=%s;charset=%s', $config['type'], $config['host'], $config['port'], $config['dbname'], $config['charset'] ? $config['charset'] : 'utf8');
}

return $app;