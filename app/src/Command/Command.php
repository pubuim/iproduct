<?php

namespace Command;

use Pagon\Route\Command as Route;

class Command extends Route
{
    protected function before()
    {
        $this->loadOrm();
    }

    /**
     * Load ORM and database
     */
    protected function loadOrm()
    {
        $this->app->loadOrm();
    }
}