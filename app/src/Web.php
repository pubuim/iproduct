<?php

use Pagon\Route\Rest;
use Pagon\View;

class Web extends Rest
{
    protected $_tpl_layout = 'layout.php';
    protected $_tpl = '';

    protected $config = array('config' => null);
    protected $title = 'iProduct';

    protected function after()
    {
        if (!$this->app->output->body && $this->_tpl) {
            $this->render($this->_tpl);
        }
    }

    protected function render($tpl)
    {
        $body = new View(
            $tpl,
            get_object_vars($this) + $this->app->locals,
            array('dir' => $this->app->views)
        );

        $this->app->render($this->_tpl_layout, array('body' => $body->render()) + get_object_vars($this));
    }
}