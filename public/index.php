<?php

if (empty($app)) {
    require dirname(__DIR__) . '/app/bootstrap.php';
}

// Routing
$app->get('/', 'Web\\Index');
$app->all('/create', 'Web\\Create');
$app->get('/posts/:id', 'Web\\Post');
$app->get('/ui', 'Web\\UI');

$app->run();