<?php

if (empty($app)) {
    require dirname(__DIR__) . '/app/bootstrap.php';
}

// Routing
$app->get('/', 'Web\\Index');
$app->all('/create', 'Web\\Create');
$app->get('/posts/:id', 'Web\\Post');
$app->get('/v1/posts', 'Api\\Posts');
$app->get('/v1/posts/url_check', 'Api\\PostUrlCheck');
$app->get('/v1/posts/:id', 'Api\\Post');
$app->get('/ui', 'Web\\UI');

$app->run();