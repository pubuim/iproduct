<?php

if (empty($app)) {
    require dirname(__DIR__) . '/app/bootstrap.php';
}

// Routing
$app->get('/', 'Web\\Index');
$app->get('/ui', 'Web\\UI');

$app->run();