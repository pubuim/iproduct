<?php

use Pagon\Route\Rest;
use Pagon\Url;
use Pagon\View;

class Api extends Rest
{
    protected $data = array();

    /**
     * Show error error message
     *
     * @param $message
     */
    protected function error($message)
    {
        $this->output->status(400);
        $this->output->json(array('message' => $message, 'status' => 'ERROR'))->end();
    }

    /**
     * Show ok message
     */
    protected function ok()
    {
        $this->output->status(200);
        $this->output->json(array('status' => 'OK'))->end();
    }

    /**
     * Before
     */
    protected function before()
    {
        $this->loadOrm();
    }

    /**
     * After
     */
    protected function after()
    {
        if (!$this->app->output->body) {
            $this->output->json($this->data);
        }
    }

    /**
     * Load ORM and database
     */
    protected function loadOrm()
    {
        $this->app->loadOrm();
    }
}