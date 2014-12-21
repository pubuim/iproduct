<?php

if (empty($app)) {
    require dirname(__DIR__) . '/app/bootstrap.php';
}

// Session for login
$app->add('Session', array('store' => 'File'));

// Routing
$app->get('/', 'Web\Index');
$app->all('/create', 'Web\Create');
$app->get('/search', 'Web\Search');
$app->get('/login/:provider', 'Web\Login');
$app->get('/login/:provider/callback', 'Web\LoginCallback');
$app->all('/posts', 'Web\Posts');
$app->all('/posts/:id(/:op)?', 'Web\Post');
$app->get('/v1/posts', 'Api\Posts');
$app->get('/v1/posts/url_check', 'Api\PostUrlCheck');
$app->all('/v1/posts/:id(/:op)?', 'Api\Post');
$app->get('/ui', 'Web\UI');

$app->run();