<?php

if (empty($app)) {
    require dirname(__DIR__) . '/app/bootstrap.php';
}

$app->run();