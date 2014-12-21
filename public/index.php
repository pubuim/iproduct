<?php

if (empty($app)) {
    require dirname(__DIR__) . '/app/bootstrap.php';
}

// Routing
$app->get('/', 'Web\Index');
$app->all('/create', 'Web\Create');
$app->get('/search', 'Web\Search');
$app->all('/posts/:id(/:op)?', 'Web\Post');
$app->get('/v1/posts', 'Api\Posts');
$app->get('/v1/posts/url_check', 'Api\PostUrlCheck');
$app->all('/v1/posts/:id(/:op)?', 'Api\Post');
$app->get('/ui', 'Web\UI');

$app->run();