<?php

namespace Web;

use Pagon\Route\Rest;
use Pagon\Url;
use Pagon\View;

class Web extends Rest
{
    protected $_tpl_layout = 'layout.php';
    protected $_tpl = '';

    protected $config = array('config' => null);
    protected $title = 'iProduct';

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
        if (!$this->app->output->body && $this->_tpl) {
            $this->render($this->_tpl);
        }
    }

    /**
     * Disable layout
     */
    protected function disableLayout()
    {
        $this->_tpl_layout = false;
    }

    /**
     * Render template
     *
     * @param $tpl
     */
    protected function render($tpl)
    {
        $body = new View(
            $tpl,
            get_object_vars($this) + $this->app->locals,
            array('dir' => $this->app->views)
        );

        if ($this->_tpl_layout) {
            $this->app->render($this->_tpl_layout, array('body' => $body->render()) + get_object_vars($this));
        } else {
            $this->output->body($body->render());
        }
    }

    /**
     * Load ORM and database
     */
    protected function loadOrm()
    {
        $this->app->loadOrm();
    }

    /**
     * Redirect the page
     *
     * @param $uri
     */
    protected function redirect($uri)
    {
        $this->output->redirect(Url::to($uri))->end();
    }
}